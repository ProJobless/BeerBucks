<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {	

	function __construct(){
		parent:: __construct();

	}

	public function index (){	

		if($this->session->userdata('userID')) {

			$data['view'] = 'profile';
			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';
			$this->load->view('includes/template', $data);

		}

	}

}