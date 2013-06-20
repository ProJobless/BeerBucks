<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Controller {	

	function __construct(){
		parent:: __construct();

	}

	public function index (){	

		$data['view'] = 'join';
		$this->load->view('includes/template', $data);

	}

}