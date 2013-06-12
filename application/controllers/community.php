<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends CI_Controller {	

	function __construct(){
		parent:: __construct();

	}

	public function index (){	

		$data['view'] = 'community';
		$this->load->view('includes/template', $data);

	}

}