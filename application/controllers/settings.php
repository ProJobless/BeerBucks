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

		redirect('settings/profile');

	}

	public function profile(){

		if($this->session->userdata('userID')) {

			$data['view'] = 'settings';

			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';

			$this->load->view('includes/template', $data);

		}

	}

	public function editProfile (){

		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'alpha_dash|trim|required|min_length[3]|max_length[20]|xss_clean'
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
				'rules' => 'trim|min_length[1]|max_length[100]'
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

					$data    =   array('upload_data'    =>   $this->upload->data());
					$sData   =   array('profileImage'   =>   $data['upload_data']['file_name']);

					$this->session->set_userdata($sData);

					$result = $this->settings_model->editUser();

					if($result){

						$data['view']      =   'settings';
						$data['success']   =   'Information successfully updated.';

						$this->load->view('includes/template', $data);

					}
				}

			}else{

				$result = $this->settings_model->editUser();

				if($result){

					$data['view']      =   'settings';
					$data['success']   =   'Information successfully updated.';
					
					$this->load->view('includes/template', $data);

				}else{

					$data['view']    =   'settings';
					$data['error']   =   'Username already exists';

					$this->load->view('includes/template', $data);

				}

			}

		}

	}

	public function account(){

		if($this->session->userdata('userID')) {

			$data['recipient']    =   $this->user_model->getRecipient();
			$data['view']         =   'settings_account';

			if($this->session->flashdata('success')) 
				$data['success'] = $this->session->flashdata('success');

			if($this->session->flashdata('error')) 
				$data['error'] = $this->session->flashdata('error');

			$this->session->set_flashdata('recipientID', $data['recipient'][0]['recipient_id']);

			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';

			$this->load->view('includes/template', $data);

		}

	}

	public function editAccount(){

		$config = array(
			array(
				'field'   =>   'name',
				'label'   =>   'Name',
				'rules'   =>   'trim|required|min_length[2]'
			), 
			array(
				'field'   =>   'email',
				'label'   =>   'Email',
				'rules'   =>   'trim|required|valid_email'
			), 
			array(
				'field'   =>   'accountToken',
				'label'   =>   'Bank Account',
				'rules'   =>   'trim|required|min_length[2]'
			)
		);

		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == false){

			$data['recipient']    =   $this->user_model->getRecipient();
			$data['view']         =   'settings_account';
			$data['error']        =   'Please fix the errors';
			
			$this->load->view('includes/template', $data);

		}else{

			$this->load->library('stripe.php');

			$name          =   $this->input->post('name');
			$type          =   'individual';
			$token         =   $this->input->post('accountToken');
			$email         =   $this->input->post('email');
			$description   =   "BeerBucks user's account details.";
			$recipientID   =   $this->session->flashdata('recipientID');
			
			//User already had bank account added and didn't attempt to change it, update other information.
			if($token == 'false'){
					
				$newData = array();

				if($name)
					$newData['name'] = $name;
				if($email)
					$newData['email'] = $email;

				$response = json_decode($this->stripe->recipient_update($recipientID, $newData));

				$this->user_model->updateRecipientInfo($name, $email);

				$this->session->set_flashdata('success', 'Account settings successfully updated.');

				redirect('settings/account');
				
			}else{

				if($recipientID){

					$newData = array();

					if($name)
						$newData['name'] = $name;
					if($email)
						$newData['email'] = $email;

					$newData['bank_account'] = $token;

					$response = json_decode($this->stripe->recipient_update($recipientID, $newData));

					if(isset($response->id)){

						if($this->user_model->addRecipient($response, $name, $email)){

							$this->session->set_flashdata('success', 'Account settings successfully updated.');

							redirect('settings/account');

						}

					}else if(isset($response->failure_message)){

						$this->session->set_flashdata('error', $response->failure_message);

						redirect('settings/account');

					}else if(isset($response->error)){

						$this->session->set_flashdata('error', $response->error->message);

						redirect('settings/account');

					}

				} else{

					$response = json_decode($this->stripe->recipient_create($name, $type, NULL, $token, $email, $description));

					if(isset($response->id)){

						if($this->user_model->addRecipient($response, $name, $email)){

							$this->session->set_flashdata('success', 'Account settings successfully updated.');

							redirect('settings/account');

						}

					}else if(isset($response->failure_message)){

						$this->session->set_flashdata('error', $response->failure_message);

						redirect('settings/account');

					}else if(isset($response->error)){

						$this->session->set_flashdata('error', $response->error->message);

						redirect('settings/account');

					}
				}

			}

		}

	}

	public function services(){

		redirect('settings/profile');

	}

	public function subscription(){

		redirect('settings/profile');

	}

}