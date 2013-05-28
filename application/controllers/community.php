<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends CI_Controller {	

	function __construct(){
		parent:: __construct();

	}

	public function index (){	

		//Tells template to load the discover view.
		$data['view'] = 'community';

		//Load template
		$this->load->view('includes/template', $data);

	}

}