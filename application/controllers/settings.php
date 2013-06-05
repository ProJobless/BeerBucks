<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {	

	function __construct(){
		parent:: __construct();

	}

	public function index (){

		//Tells template to load the settings view.
		$data['view'] = 'settings';

		//Load template
		$this->load->view('includes/template', $data);

	}

}