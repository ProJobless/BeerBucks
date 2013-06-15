<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {	

	function __construct(){
		parent:: __construct();
	}

	public function index (){

		$this->load->model('app_model'); 
		$userLocation = unserialize(base64_decode($this->app_model->userLocation()));

		$data['view'] = 'home';
		$data['userLocation'] = $userLocation;

		$this->load->view('includes/template', $data);

	}

}