<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('authentication_model');
	}

	public function index (){	

		//Tells template to load the discover view.
		$data['view'] = 'login';

		//Load template
		$this->load->view('includes/template', $data);

		$sessLogout = array('isLoggedIn' => 0);

		$sessData = array(
    			'userID' => null,
    			'email' => null,
    			'username' => null,
    			'isLoggedIn' => 0
    	);

    	$this->session->unset_userdata($sessData);

		redirect('home');

	}

}