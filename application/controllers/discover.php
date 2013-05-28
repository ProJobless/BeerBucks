<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Controller {	

	function __construct(){
		parent:: __construct();

	}

	public function index (){	

		//Tells template to load the discover view.
		$data['view'] = 'discover';

		//Load template
		$this->load->view('includes/template', $data);

	}

}