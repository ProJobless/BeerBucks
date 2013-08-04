<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter extends CI_Controller{

	private $connection;

	function __construct(){

		parent::__construct();

		$this->load->helper('cookie');
        $this->load->model('authentication_model');
        $this->load->library('twitteroauth');
        $this->config->load('twitter');
        $this->load->model('app_model'); 

        if($this->session->userdata('access_token') && $this->session->userdata('access_token_secret')){
            $this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'), $this->session->userdata('access_token'),  $this->session->userdata('access_token_secret'));
        }elseif($this->session->userdata('request_token') && $this->session->userdata('request_token_secret')){
            $this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'), $this->session->userdata('request_token'), $this->session->userdata('request_token_secret'));
        }else{
            $this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'));
        }

	}
	
	public function auth(){

		$this->session->keep_flashdata('referer');

		if($this->session->userdata('access_token') && $this->session->userdata('access_token_secret')){
			
			redirect('login');
			$this->reset_session();

		}else{
			
			if($this->session->userdata('request_token') || $this->session->userdata('request_token_secret')){

				redirect('login');
				$this->reset_session();

			}
			
			$request_token = $this->connection->getRequestToken(base_url('index.php/twitter/callback'));

			$this->session->set_userdata('request_token', $request_token['oauth_token']);
			$this->session->set_userdata('request_token_secret', $request_token['oauth_token_secret']);
			
			if($this->connection->http_code == 200){

				$url = $this->connection->getAuthorizeURL($request_token);
				redirect($url);

			}else{
				
				redirect(base_url('/'));
				
			}

		}

	}
	
	public function callback() {

		if($this->input->get('oauth_token') && $this->session->userdata('request_token') !== $this->input->get('oauth_token')){
			
			redirect(base_url('index.php/twitter/auth'));

		}else{

			$access_token = $this->connection->getAccessToken($this->input->get('oauth_verifier'));
		
			if ($this->connection->http_code == 200){

				$this->session->set_userdata('access_token', $access_token['oauth_token']);
				$this->session->set_userdata('access_token_secret', $access_token['oauth_token_secret']);
				$this->session->set_userdata('twitter_user_id', $access_token['user_id']);
				$this->session->set_userdata('twitter_screen_name', $access_token['screen_name']);

				$this->session->unset_userdata('request_token');
				$this->session->unset_userdata('request_token_secret');

				$twitterImg = $this->app_model->getTwitterImage();

				if($this->authentication_model->twitter($access_token, $twitterImg)){
					
					if($this->session->flashdata('referer')){
					
						redirect($this->session->flashdata('referer'));

					}else{

						redirect('profile');

					}
				}
			
			}else{

				$this->reset_session();
				redirect(base_url('index.php/login'));

			}

		}

	}
	
	public function post($in_reply_to){

		$message = $this->input->post('message');

		if(!$message || mb_strlen($message) > 140 || mb_strlen($message) < 1){
			// Restrictions error. Notification here.
			redirect(base_url('/'));

		}else{

			if($this->session->userdata('access_token') && $this->session->userdata('access_token_secret')){

				$content = $this->connection->get('account/verify_credentials');

				if(isset($content->error)){
					// Most probably, authentication problems. Begin authentication process again.
					$this->reset_session();
					redirect(base_url('index.php/twitter/auth'));

				}else{

					$data = array(
						'status'                  =>   $message,
						'in_reply_to_status_id'   =>   $in_reply_to
					);

					$result = $this->connection->post('statuses/update', $data);

					if(!isset($result->error)){
						redirect(base_url('/'));
					}else{
						redirect(base_url('/'));
					}

				}
			}else{
				// User is not authenticated.
				redirect(base_url('index.php/twitter/auth'));
			}

		}

	}

	private function reset_session(){

		$this->session->unset_userdata('access_token');
		$this->session->unset_userdata('access_token_secret');
		$this->session->unset_userdata('request_token');
		$this->session->unset_userdata('request_token_secret');
		$this->session->unset_userdata('twitter_user_id');
		$this->session->unset_userdata('twitter_screen_name');

	}

}