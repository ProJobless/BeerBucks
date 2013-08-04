<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacy_Policy extends CI_Controller {	

	function __construct(){
		parent:: __construct();
		

	}

	public function index (){
		
		$data['view'] = 'privacy_policy';
		$this->load->view('includes/template', $data);

	}

}