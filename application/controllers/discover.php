<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('party_model');
		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();
	}

	public function index (){	

		$data['parties']   =   $this->party_model->getParties();
		$data['view']      =   'discover';

		$this->load->view('includes/template', $data);

	}

	public function nearYou(){

		$data['parties']   =   $this->party_model->getParties();
		$data['view']      =   'discover_nearyou';

		$this->load->view('includes/template', $data);

	}

	public function Upcoming(){

		$data['parties']   =   $this->party_model->getParties();
		$data['view']      =   'discover_upcoming';

		$this->load->view('includes/template', $data);

	}

	public function Completed(){

		$data['parties']   =   $this->party_model->getCompleted();
		$data['view']      =   'discover_completed';
		
		$this->load->view('includes/template', $data);

	}

}