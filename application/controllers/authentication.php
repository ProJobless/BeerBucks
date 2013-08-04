<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('authentication_model');
	}

	public function index (){	

		$data['view'] = 'login';
		$this->load->view('includes/template', $data);

	}

	public function signup(){

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'alpha_dash|trim|required|min_length[3]|max_length[20]|xss_clean'
			), 
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email|xss_clean'
			), 
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required|md5|xss_clean'
			)
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){

			$data['view'] = 'login';
			//$data['error'] = 'Please enter your username, email, and password.';

			$this->load->view('includes/template', $data);

		}else{

			if(!$this->authentication_model->signup()){

				$data['view'] = 'login';
				$data['error'] = 'Username or email already used.';

				$this->load->view('includes/template', $data);

			}else{

				if($this->session->flashdata('referer')){
					
					redirect($this->session->flashdata('referer'));

				}else{

					redirect('profile');

				}
				
			}

		}

	}

	public function login (){

		$this->load->library('form_validation');

		$config = array(
			array(
				'field'   =>   'loginEmail',
				'label'   =>   'Email',
				'rules'   =>   'trim|required|valid_email|xss_clean'
			), 
			array(
				'field'   =>   'loginPass',
				'label'   =>   'Password',
				'rules'   =>   'trim|required|md5|xss_clean'
			)
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){

			$data['view']         =   'login';
			$data['loginError']   =   'Please enter email and password.';

			$this->load->view('includes/template', $data);

		}else{

			if(!$this->authentication_model->login()){

				$data['view']         =   'login';
				$data['loginError']   =   'Username or password incorrect.';

				$this->load->view('includes/template', $data);

			}else{

				if($this->session->flashdata('referer')){

					redirect($this->session->flashdata('referer'));

				}else{

					redirect('profile');

				}

			}

		}

	}

	public function facebook() {

		$this->load->library('fbconnect');

		$data = array(
			'redirect_uri'   =>   site_url('authentication/handleFacebookLogin'),
			'scope'          =>   'email'
		);

		redirect($this->fbconnect->getLoginUrl($data));
    
    }

    public function handleFacebookLogin(){

		$this->load->library('fbconnect');

		if($this->fbconnect->user){

			$fbUser = $this->fbconnect->user;

			if($this->authentication_model->facebook($fbUser)){

				if($this->session->flashdata('referer')){
					
					redirect($this->session->flashdata('referer'));

				}else{

					redirect('profile');

				}

			}

		}

	}

}