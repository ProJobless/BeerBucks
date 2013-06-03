<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {	

	function __construct(){
		parent:: __construct();

	}

	public function index (){	

		$data['view'] = 'profile';
		$this->load->view('includes/template', $data);

	}

	public function user ($userID){	

		$data['view'] = 'profile';
		$this->load->view('includes/template', $data);

	}

	public function edit (){	

		$data['view'] = 'edit';
		$this->load->view('includes/template', $data);

	}

}