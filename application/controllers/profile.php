<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	public function index (){	

		if($this->session->userdata('userID')) {

			$data['friends'] = $this->user_model->getFriends($this->session->userdata('userID'));
			$data['view'] = 'profile';
			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';
			$this->load->view('includes/template', $data);

		}
		
	}

}