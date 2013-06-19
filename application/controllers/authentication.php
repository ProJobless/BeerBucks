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
				'rules' => 'trim|required|min_length[3]|max_length[20]|xss_clean'
			), 
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email'
			), 
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required|md5'
			)
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){

			$data['view'] = 'login';
			$data['joinError'] = 'Please enter your username, email, and password.';

			$this->load->view('includes/template', $data);

		}else{

			$result = $this->authentication_model->signup();

			if(!$result){

				$data['view'] = 'login';
				$data['joinError'] = 'Username or email already used.';

				$this->load->view('includes/template', $data);

			}else{
				redirect('profile');
			}

		}

	}

	public function login (){

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email'
			), 
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required|md5'
			)
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){

			$data['view'] = 'login';
			$data['error'] = 'Please enter email and password.';

			$this->load->view('includes/template', $data);

		}else{

			$result = $this->authentication_model->login();

			if(!$result){

				$data['view'] = 'login';
				$data['error'] = 'Username or password incorrect.';

				$this->load->view('includes/template', $data);

			}else{
				redirect('profile');
			}

		}

	}

	public function facebook() {

		$this->load->library('fbconnect');

		$data = array(
			'redirect_uri' => site_url('authentication/handleFacebookLogin'),
			'scope' => 'email'
		);

		redirect($this->fbconnect->getLoginUrl($data));
    
    }

    public function handleFacebookLogin(){

		$this->load->library('fbconnect');

		if($this->fbconnect->user){

			$fbUser = $this->fbconnect->user;

			if($this->authentication_model->facebook($fbUser)){

				redirect('profile');

			}

		}

	}

}