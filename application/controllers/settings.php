<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('settings_model');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	public function index (){

		if($this->session->userdata('userID')) {

			$data['view'] = 'settings';

			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';

			$this->load->view('includes/template', $data);

		}

	}

	public function do_upload (){

		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required|min_length[3]|max_length[20]'
			), 
			array(
				'field' => 'bio',
				'label' => 'Bio',
				'rules' => 'trim|min_length[5]|max_length[145]'
			), 
			array(
				'field' => 'location',
				'label' => 'Location',
				'rules' => 'trim|min_length[5]|max_length[100]'
			),
			array(
				'field' => 'timezone',
				'label' => 'Timezone',
				'rules' => 'trim|min_length[3]|max_length[100]'
			)
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){

			$data['view']    =   'settings';
			$data['error']   =   'Please fix the errors';

			$this->load->view('includes/template', $data);

		}else{

			if($_FILES['userfile']['name']){

				$imageID                   =   uniqid();
				$config['upload_path']     =   './uploads/profile';
				$config['allowed_types']   =   'gif|jpg|png|jpeg';
				$config['max_size']	       =   '2048';
				$config['max_width']       =   '0';
				$config['max_height']      =   '0';
				$config["file_name"]       =   $imageID;
				$config["overwrite"]       =   true;
				$config["remove_spaces"]   =   true;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload()){

					$error           =   array('error' => $this->upload->display_errors());
					$data['view']    =   'settings';
					$data['error']   =   'There was a problem uploading your image.';

					$this->load->view('includes/template', $data);

				}else{

					$data    =   array('upload_data' => $this->upload->data());
					$sData   =   array('profileImage' => $data['upload_data']['file_name']);

					$this->session->set_userdata($sData);

					$result = $this->settings_model->editUser();

					if($result){

						$data['view'] = 'settings';

						$this->load->view('includes/template', $data);

					}
				}

			}else{

				$result = $this->settings_model->editUser();

				if($result){

					$data['view'] = 'settings';

					$this->load->view('includes/template', $data);

				}else{

					$data['view']    =   'settings';
					$data['error']   =   'Username already exists';

					$this->load->view('includes/template', $data);

				}

			}

		}

	}

}