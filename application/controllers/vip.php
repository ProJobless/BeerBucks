<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vip extends CI_Controller {	

	function __construct(){
		parent:: __construct();
		
		$this->load->model('app_model'); 
		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	public function index (){
		if($this->session->userdata('userID') == '51c18a5e65394'){
			$data['view']     =   'vip';
			$this->load->view('includes/template', $data);
		}

	}

}