<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('settings_model');

	}

	public function index (){

		$data['view'] = 'settings';
		$this->load->view('includes/template', $data);

	}

	public function do_upload (){
		if($_FILES['userfile']['name']){
			$imageID = uniqid();

			$config['upload_path'] = './uploads/profile';
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

				$data['view'] = 'settings';
				$data['error'] = 'There was a problem uploading your image.';
				$this->load->view('includes/template', $data);

			}else{

				$data = array('upload_data' => $this->upload->data());

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
			}

		}

	}

}