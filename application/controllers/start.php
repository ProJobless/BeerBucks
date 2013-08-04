<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('party_model');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

		$refSegments = basename($_SERVER['REQUEST_URI']);
       	$this->session->set_flashdata('referer', $refSegments);

	}

	public function index (){	

		if($this->session->userdata('userID')) {

			$data['view'] = 'start';
			$this->load->view('includes/template', $data);

		}else{

			redirect('join');

		}

	}

	public function basic (){

		if($this->session->userdata('userID')) {

			if($this->input->post() && $this->input->server('REQUEST_METHOD') == 'POST'){

				$sData = array('tos' => 1);

	    		$this->session->set_userdata($sData);

	    		$data['view'] = 'start_basic';

				$this->load->view('includes/template', $data);

			}else if($this->input->server('REQUEST_METHOD') == 'POST'){

				$data['error']   =   'You must accept the terms before continuing.';
				$data['view']    =   'start';

				$this->load->view('includes/template', $data);

			}else{

				$data['view'] = 'start_basic';

				$this->load->view('includes/template', $data);
			}

		}else{

			redirect('join');

		}

	}

	public function details(){

		if($this->session->userdata('userID')) {

			if($this->input->post() && $this->input->server('REQUEST_METHOD') == 'POST'){

				if($this->input->post('title'))
						$sData['title'] = $this->input->post('title');

				if($this->input->post('description'))
					$sData['description'] = $this->input->post('description');

				if($this->input->post('description') || $this->input->post('title'))
					$this->session->set_userdata($sData);
			}

			//User clicked go back, taking them to the previous step: start_basic.
			if($this->input->post('back')){
				redirect('start');
			}

			//User submitted form normally, clicking to go to the next step: start_details.
			else if(!$this->input->post()){
				$data['view'] = 'start_details';

				$this->load->view('includes/template', $data);

			}

			//User submitted form by uploading an image.
			else if($_FILES['userfile']['name']){

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

				//Upload failed redirect to same page with error.
				if (!$this->upload->do_upload()){

					$error           =   array('error' => $this->upload->display_errors());
					$data['view']    =   'start_basic';
					$data['error']   =   'There was a problem uploading your image.';

					$this->load->view('includes/template', $data);

				}
				//Upload was successfull. Success message already sent.
				else{

					$data    =   array('upload_data' => $this->upload->data());
					$sData   =   array('img_name' => $data['upload_data']['file_name']);

					$this->session->set_userdata($sData);

					$data['view']    =   'start_basic';

					$this->load->view('includes/template', $data);
				}

			}else{

				//User submitted form but did not upload an image.
				if(!$this->session->userdata('img_name')){

					$data['view']    =   'start_basic';
					$data['error']   =   'Please upload an image for your party';

					$this->load->view('includes/template', $data);

				}

				//User submitted form with an image, validate other fields.
				else{

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

						$data['view']    =   'start_basic';
						$data['error']   =   'Please fill out all the information.';

						$this->load->view('includes/template', $data);

					}else{

						$sData = array(
				            'title'         =>   $this->input->post('title'),
				            'description'   =>   $this->input->post('description')
				        );

						$this->session->set_userdata($sData);

						redirect('start/details');
			
					}

				}

			}

		}else{

			redirect('join');

		}

	}

	public function account(){

		if($this->session->userdata('userID')) {

			if($this->input->server('REQUEST_METHOD') == 'POST'){

				$check = false;

				if($this->input->post('partyLocation')){
					$sData['partyLocation'] = $this->input->post('partyLocation');
					$check = true;
				}
				if($this->input->post('address')){
					$sData['address'] = $this->input->post('address');
					$check = true;
				}
				if($this->input->post('start')){
					$sData['start'] = $this->input->post('start');
					$check = true;
				}
				if($this->input->post('end')){
					$sData['end'] = $this->input->post('end');
					$check = true;
				}
				if($this->input->post('goal')){
					$sData['goal'] = $this->input->post('goal');
					$check = true;
				}
				if($this->input->post('partyLat')){
					$sData['partyLat'] = $this->input->post('partyLat');
					$check = true;
				}
				if($this->input->post('partyLng')){
					$sData['partyLng'] = $this->input->post('partyLng');
					$check = true;
				}

				if($check) $this->session->set_userdata($sData);

			}

			if($this->input->post('back')){

				redirect('start/basic');

			}else if(!$this->input->post()){

				$data['recipient']    =   $this->user_model->getRecipient();
				$data['view']         =   'start_account';

				$this->session->set_flashdata('recipientID', $data['recipient'][0]['recipient_id']);

				$this->load->view('includes/template', $data);

			}else{
					
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


				$date1   =   new DateTime(date('Y-m-d H:i:s', time()));
	            $date2   =   new DateTime($this->session->userdata('start'));
	            $date3   =	 new DateTime($this->session->userdata('end'));

	            if($date1 > $date2){

	            	$data['view']    =   'start_details';
					$data['error']   =   "The party you're planning should probably be sometime in the future..";

					$this->load->view('includes/template', $data);

				}else if($date2 > $date3){
				
					$data['view']    =   'start_details';
					$data['error']   =   "How's your party gonna end before it starts?";

					$this->load->view('includes/template', $data);

				}else{
					
					if($this->form_validation->run() == false){

						$data['view']    =   'start_details';
						$data['error']   =   'Please fill out all the information.';

						$this->load->view('includes/template', $data);

					}else{

						redirect('start/account');

					}

				}
				
			}

		}else{

			redirect('join');

		}

	}

	public function review (){

		if($this->session->userdata('userID')) {

			if($this->input->post('back')){

				redirect('start/details');
			
			}else if(!$this->input->post()){

				$data['view'] = 'start_review';

				$this->load->view('includes/template', $data);

			}else{

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
					$data['view']         =   'start_account';
					
					$this->session->set_flashdata('recipientID', $data['recipient'][0]['recipient_id']);

					$this->load->view('includes/template', $data);

				}else{

					$this->load->library('stripe.php');

					$name          =   $this->input->post('name');
					$type          =   'individual';
					$token         =   $this->input->post('accountToken');
					$email         =   $this->input->post('email');
					$description   =   "BeerBucks user's account details.";
					$recipientID   =   $this->session->flashdata('recipientID');

					if($token == 'false'){

						$newData = array();

						if($name)
							$newData['name'] = $name;
						if($email)
							$newData['email'] = $email;

						$response = json_decode($this->stripe->recipient_update($recipientID, $newData));

						$this->user_model->updateRecipientInfo($name, $email);

						$this->session->set_flashdata('success', 'Account settings successfully updated.');

						redirect('start/review');
						
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

									redirect('start/account');

								}

							}else if(isset($response->failure_message)){

								$this->session->set_flashdata('error', $response->failure_message);

								redirect('start/account');

							}else if(isset($response->error)){

								$this->session->set_flashdata('error', $response->error->message);

								redirect('start/account');

							}

						}else{

							$response = json_decode($this->stripe->recipient_create($name, $type, NULL, $token, $email, $description));

							if(isset($response->id)){

								if($this->user_model->addRecipient($response, $name, $email)){

									$this->session->set_flashdata('success', 'Account settings successfully updated.');

									redirect('start/review');

								}

							}else if(isset($response->failure_message)){

								$this->session->set_flashdata('error', $response->failure_message);

								redirect('start/account');

							}else if(isset($response->error)){

								$this->session->set_flashdata('error', $response->error->message);

								redirect('start/account');

							}

						}

					}

				}

			}

		}else{

			redirect('join');

		}

	}

	public function finish (){

		if($this->session->userdata('userID')) {

			if($this->input->post('back')){

				redirect('start/account');

			}else{

				$pData = array(
					$this->session->userdata('title'),
					$this->session->userdata('description'),
					$this->session->userdata('partyLocation'),
					$this->session->userdata('address'),
					$this->session->userdata('start'),
					$this->session->userdata('end'),
					$this->session->userdata('goal'),
					$this->session->userdata('img_name'),
					$this->session->userdata('partyLat'),
					$this->session->userdata('partyLng'),
				);

				$testData = $this->checkIfTheyAreAllStillThere($pData);

				if(!$testData){

					$data['view']    =   'start';
					$data['error']   =   'Problem starting party. Please try again.';

					$this->load->view('includes/template', $data);

				}else{

					$result = $this->party_model->newParty();

		            if(!$result){

		            	$data['view']    =   'start_review';
		            	$data['error']   =   'There was a problem, try again. If the problem continues please email support.';
						
						$this->load->view('includes/template', $data);

		            }else{

			            $sData2 = array(
			            	'title'           =>   null,
			            	'description'     =>   null,
				            'partyLocation'   =>   null,
							'address'         =>   null,
				            'start'           =>   null,
				            'end'             =>   null,
				            'goal'            =>   null,
				            'img_name'        =>   null,
				            'partyLat'        =>   null,
				            'partyLng'        =>   null,
				        );

						$this->session->set_userdata($sData2);

						redirect('party/' . $result, 'refresh');

		            }

	        	}

			}

		}else{

			redirect('join');

		}

	}

	public function checkIfTheyAreAllStillThere($pData){

		$track = 0;

        foreach($pData as $data){

        	$track ++;

	        if(count($pData) == $track && strlen($data) > 0){
	        	return true;
	        } else if(strlen($data) < 1){
	        	return false;
	        }

		}

	}

}