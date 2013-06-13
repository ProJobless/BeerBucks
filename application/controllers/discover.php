<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('party_model');
	}

	public function index (){	

		$data['parties'] = $this->party_model->getParties();
		$data['view'] = 'discover';
		$this->load->view('includes/template', $data);

	}
	public function party($partyID){

		echo $partyID;

	}

}