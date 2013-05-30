<?php

class Upload extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('party_model');
	}

	function index(){
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload(){

		$sData = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );

		$this->session->set_userdata($sData);


		if($this->input->post('back')){

			$data['view'] = 'start';
			$this->load->view('includes/template', $data);

		}else if($this->input->post('upload')){
			$imageID = uniqid();

			$config['upload_path'] = './uploads/party';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '100';
			$config['min_width']  = '220';
			$config['min_height']  = '220';
			$config['max_width']  = '3264';
			$config['max_height']  = '2248';
			$config["file_name"]  = $imageID;
			$config["overwrite"] = true;

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
}