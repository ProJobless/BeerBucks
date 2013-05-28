<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('authentication_model');
	}

	public function index (){	

		//Tells template to load the discover view.
		$data['view'] = 'login';

		//Load template
		$this->load->view('includes/template', $data);

	}

	public function signup(){

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|min_length[5]|max_length[20]'
			), 
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			), 
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[5]|max_length[20]'
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
				redirect('home');
			}
		}
	}

	public function login (){

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			), 
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
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
				redirect('home');
			}
		}
	}
}