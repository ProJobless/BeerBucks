<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('party_model');

	}

	public function index (){	

		if($this->session->userdata('userID')) {

			$data['view'] = 'start';
			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'join';
			$this->load->view('includes/template', $data);

		}

	}

	public function basic (){

		if($this->input->post() == false){

			$data['view'] = 'start';
			$data['error'] = 'You must accept the terms before continuing.';
			$this->load->view('includes/template', $data);

		}else{

			$sData = array(
                'tos' => 1,
            );

    		$this->session->set_userdata($sData);

			$data['view'] = 'start_basic';
			$this->load->view('includes/template', $data);

		}

	}

	public function do_upload(){

		$sData = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );

		$this->session->set_userdata($sData);


		if($this->input->post('back')){

			$data['view'] = 'start';
			$this->load->view('includes/template', $data);

		}else if($_FILES['userfile']['name']){
			$imageID = uniqid();

			$config['upload_path'] = './uploads/party';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '2048';
			$config['min_width']  = '220';
			$config['min_height']  = '220';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$config["file_name"]  = $imageID;
			$config["overwrite"] = true;
			$config["remove_spaces"] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());

				$data['view'] = 'start_basic';
				$data['error'] = 'There was a problem uploading your image.';
				$this->load->view('includes/template', $data);
			}
			else{
				$data = array('upload_data' => $this->upload->data());

				$sData = array(
		            'img_name' => $data['upload_data']['file_name']
		        );

				$this->session->set_userdata($sData);

				$data['view'] = 'start_basic';
				$data['error'] = 'There was a problem uploading your image.';
				$this->load->view('includes/template', $data);
			}

		}else{

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
					'rules' => 'trim|required|min_length[5]|max_length[200]'
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
	}

	public function review (){

		$sData2 = array(
            'partyLocation' => $this->input->post('partyLocation'),
			'address' => $this->input->post('address'),
            'start' => $this->input->post('start'),
            'end' => $this->input->post('end'),
            'goal' => $this->input->post('goal')
        );

		$this->session->set_userdata($sData2);

		if($this->input->post('back')){

			$data['view'] = 'start_basic';
			$this->load->view('includes/template', $data);

		}else{

			$this->load->library('form_validation');

			$config = array(
				array(
					'field' => 'partyLocation',
					'label' => 'partyLocation',
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

				$data['view'] = 'start_review';
				$this->load->view('includes/template', $data);

			}

		}

	}

	public function finish (){

		if($this->input->post('back')){

			$data['view'] = 'start_details';
			$this->load->view('includes/template', $data);

		}else{

			$result = $this->party_model->newParty();

            if(!$result){

            	$data['view'] = 'start_review';
            	$data['error'] = 'There was a problem, try again. If the problem continues please email support.';
				$this->load->view('includes/template', $data);

            }else{

	            $sData2 = array(
	            	'title' => null,
	            	'description' => null,
		            'partyLocation' => null,
					'address' => null,
		            'start' => null,
		            'end' => null,
		            'goal' => null,
		            'img_name' => null
		        );

				$this->session->set_userdata($sData2);

				$data['view'] = 'home';
				$this->load->view('includes/template', $data);

            }

		}

	}

}