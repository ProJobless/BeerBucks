<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_party extends CI_Controller {	

	function __construct(){
		parent:: __construct();
		
		$this->load->model('party_model');
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$data['alerts'] = $this->user_model->checkAlerts();
	}


	public function index ($partyID = 0){	

		if($this->party_model->checkUser($partyID)){

			$data['partyID']   =   $partyID;
			$data['party']     =   $this->party_model->getParty($partyID);
			$data['view']      =   'party_edit';

			$this->load->view('includes/template', $data);

		}else{

			redirect('discover');

		}

	}

	public function information ($partyID = 0){	

		if($this->party_model->checkUser($partyID)){

			$data['partyID']   =   $partyID;
			$data['party']     =   $this->party_model->getParty($partyID);
			$data['view']      =   'party_edit';

			$this->load->view('includes/template', $data);

		}else{

			redirect('discover');

		}

	}

	public function edit_information($partyID = 0){

		if($this->party_model->checkUser($partyID)){

			if($_FILES['userfile']['name']){

				$imageID                   =   uniqid();
				$config['upload_path']     =   './uploads/party';
				$config['allowed_types']   =   'gif|jpg|png|jpeg';
				$config['max_size']	       =   '2048';
				$config['max_width']       =   '0';
				$config['max_height']      =   '0';
				$config["file_name"]       =   $imageID;
				$config["overwrite"]       =   true;
				$config["remove_spaces"]   =   true;

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){

					$error             =   array('error' => $this->upload->display_errors());
					$data['error']     =   'There was a problem uploading your image.';
					$data['partyID']   =   $partyID;
					$data['party']     =   $this->party_model->getParty($partyID);
					$data['view']      =   'party_edit';

					$this->load->view('includes/template', $data);


				}else{

					$config = array(
						array(
							'field'   =>   'title',
							'label'   =>   'Title',
							'rules'   =>   'trim|required|min_length[5]|max_length[50]'
						), 
						array(
							'field'   =>   'description',
							'label'   =>   'Description',
							'rules'   =>   'trim|required|min_length[5]|max_length[200]'
						)
					);

					$this->form_validation->set_rules($config);

					if($this->form_validation->run() == false){

						$data = array('upload_data' => $this->upload->data());					
						$this->party_model->updateImage($partyID, $data['upload_data']['file_name']);

						$data['partyID']   =   $partyID;
						$data['party']     =   $this->party_model->getParty($partyID);
						$data['view']      =   'party_edit';

						$this->load->view('includes/template', $data);

					}else{

						$data = array('upload_data' => $this->upload->data());					
						$this->party_model->updateImage($partyID, $data['upload_data']['file_name']);
						$this->party_model->updateInfo($partyID);

						$data['partyID']   =   $partyID;
						$data['party']     =   $this->party_model->getParty($partyID);
						$data['view']      =   'party_edit';
						$data['success']   =   'Information successfully updated.';

						$this->load->view('includes/template', $data);

					}					

				}

			}else{

				$config = array(
					array(
						'field'   =>   'title',
						'label'   =>   'Title',
						'rules'   =>   'trim|required|min_length[5]|max_length[50]'
					), 
					array(
						'field'   =>   'description',
						'label'   =>   'Description',
						'rules'   =>   'trim|required|min_length[5]|max_length[200]'
					)
				);

				$this->form_validation->set_rules($config);

				if($this->form_validation->run() == false){

					$data['error']     =   'Please fill out all the information.';
					$data['partyID']   =   $partyID;
					$data['party']     =   $this->party_model->getParty($partyID);
					$data['view']      =   'party_edit';

					$this->load->view('includes/template', $data);

				}else{

					$this->party_model->updateInfo($partyID);

					$data['partyID']   =   $partyID;
					$data['party']     =   $this->party_model->getParty($partyID);
					$data['success']   =   'Information successfully updated.';
					$data['view']      =   'party_edit';

					$this->load->view('includes/template', $data);

				}

			}

		}else{

			redirect('discover');

		}

	}

	public function details($partyID = 0){

		if($this->party_model->checkUser($partyID)){

			$data['partyID']   =   $partyID;
			$data['party']     =   $this->party_model->getParty($partyID);
			$data['view']      =   'party_edit_details';

			$this->load->view('includes/template', $data);

		}else{

			redirect('discover');

		}

	}

	public function edit_details($partyID = 0){

		if($this->party_model->checkUser($partyID)){

			$config = array(
				array(
					'field'   =>   'partyLocation',
					'label'   =>   'partyLocation',
					'rules'   =>   'trim|required|min_length[5]|max_length[50]'
				), 
				array(
					'field'   =>   'address',
					'label'   =>   'Address',
					'rules'   =>   'trim|required|min_length[5]|max_length[50]'
				), 
				array(
					'field'   =>   'start',
					'label'   =>   'Start',
					'rules'   =>   'trim|required|min_length[5]|max_length[145]'
				),
				array(
					'field'   =>   'end',
					'label'   =>   'End',
					'rules'   =>   'trim|required|min_length[5]|max_length[145]'
				),
				array(
					'field'   =>   'goal',
					'label'   =>   'Goal',
					'rules'   =>   'trim|required|min_length[2]|max_length[7]'
				)
			);

			$this->form_validation->set_rules($config);

			if($this->form_validation->run() == false){

				$data['partyID']   =   $partyID;
				$data['party']     =   $this->party_model->getParty($partyID);
				$data['view']      =   'party_edit_details';
				$data['error']     =   'Please fill out all the information.';

				$this->load->view('includes/template', $data);

			}else{

				$this->party_model->updateDetails($partyID);

				$data['partyID']   =   $partyID;
				$data['party']     =   $this->party_model->getParty($partyID);
				$data['view']      =   'party_edit_details';
				$data['success']   =   'Information successfully updated.';

				$this->load->view('includes/template', $data);

			}
	

		}else{

			redirect('discover');

		}

	}

	public function updates($partyID = 0){

		if($this->party_model->checkUser($partyID)){

			$data['partyID']   =   $partyID;
			$data['party']     =   $this->party_model->getParty($partyID);
			$data['view']      =   'party_edit_updates';

			$this->load->view('includes/template', $data);


		}else{

			redirect('discover');

		}

	}

	public function update($partyID = 0){

		if($this->party_model->checkUser($partyID)){

			$config = array(
				array(
					'field'   =>   'updateTitle',
					'label'   =>   'Update Title',
					'rules'   =>   'trim|required|min_length[5]|max_length[25]'
				), 
				array(
					'field'   =>   'update',
					'label'   =>   'Update',
					'rules'   =>   'trim|required|min_length[5]|max_length[1000]'
				)
			);

			$this->form_validation->set_rules($config);

			if($this->form_validation->run() == false){

				$data['partyID']   =   $partyID;
				$data['party']     =   $this->party_model->getParty($partyID);
				$data['view']      =   'party_edit_updates';
				$data['error']     =   'Please fill out all the information.';

				$this->load->view('includes/template', $data);

			}else{

				$this->party_model->addUpdate($partyID);

				$data['partyID']   =   $partyID;
				$data['party']     =   $this->party_model->getParty($partyID);
				$data['view']      =   'party_edit_updates';
				$data['success']   =   'Update successfully added.';

				$this->load->view('includes/template', $data);

			}


		}else{

			redirect('discover');

		}

	}

}