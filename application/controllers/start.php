<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {	

	function __construct(){
		parent:: __construct();

	}

	public function index (){	

		//Tells template to load the discover view.
		$data['view'] = 'start';

		//Load template
		$this->load->view('includes/template', $data);

	}

	public function basic (){

		if($this->input->post() == false){

			$data['view'] = 'start';
			$data['error'] = 'You must accept the terms before continuing.';

			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'start_basic';
			$this->load->view('includes/template', $data);

		}

	}

	public function details (){

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'trim|required|min_length[5]|max_length[50]'
			), 
			array(
				'field' => 'description',
				'label' => 'Description',
				'rules' => 'trim|required|min_length[5]|max_length[145]'
			)
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){

			$data['view'] = 'start_basic';
			$data['error'] = 'Please fill out all the information.';

			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'start_details';
			$this->load->view('includes/template', $data);

		}

	}

	public function review (){

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'location',
				'label' => 'Location',
				'rules' => 'trim|required|min_length[5]|max_length[50]'
			), 
			array(
				'field' => 'address',
				'label' => 'Address',
				'rules' => 'trim|required|min_length[5]|max_length[50]'
			), 
			array(
				'field' => 'start',
				'label' => 'Start',
				'rules' => 'trim|required|min_length[5]|max_length[145]'
			),
			array(
				'field' => 'end',
				'label' => 'End',
				'rules' => 'trim|required|min_length[5]|max_length[145]'
			),
			array(
				'field' => 'goal',
				'label' => 'Goal',
				'rules' => 'trim|required|min_length[2]|max_length[7]'
			)
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){

			$data['view'] = 'start_details';
			$data['error'] = 'Please fill out all the information.';

			$this->load->view('includes/template', $data);

		}else{

			if($this->session->userdata('username')){
				echo 'review';
				$data['view'] = 'review';
				$this->load->view('includes/template', $data);
			}else{
				echo 'account';
				$data['view'] = 'account';
				$this->load->view('includes/template', $data);
			}

			

		}

	}

}