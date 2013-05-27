<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {	

	function __construct(){
		parent:: __construct();

	}

	public function index (){	

		//Tells template to load the home view.
		$data['view'] = 'home';

		//Load template
		$this->load->view('includes/template', $data);

	}

}