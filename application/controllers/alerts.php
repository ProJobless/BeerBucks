<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alerts extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('user_model'); 
		$data['alerts'] = $this->user_model->checkAlerts();
	}

	public function index (){

		$data['friendReqs'] = $this->user_model->checkForFriendRequests();
		$data['view'] = 'profile_alerts';
		$this->load->view('includes/template', $data);

	}

}