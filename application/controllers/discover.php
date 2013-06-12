<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('party_model');
	}

	public function index (){	

		$data['partys'] = $this->party_model->getPartys();
		$data['view'] = 'discover';
		$this->load->view('includes/template', $data);

	}

}