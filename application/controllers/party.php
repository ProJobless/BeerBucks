<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Party extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->library("pagination");
		$this->load->model('party_model');
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$data['alerts'] = $this->user_model->checkAlerts();
		
	}
	
	function _remap($method){

		$param_offset = 2;

		if ( ! method_exists($this, $method)){
			$param_offset = 1;
			$method = 'index';
		}

		$params = array_slice($this->uri->rsegment_array(), $param_offset);
		call_user_func_array(array($this, $method), $params);

	} 

	public function index ($partyID = 0){	

		redirect("party/attending/$partyID");

	}

	public function attending($partyID = 0){

		if($partyID){
			$totalDonated = 0;

			$config = array();
	        $config["base_url"]      =   base_url()."/index.php/party/attending/".$partyID;
	        $config["total_rows"]    =   $this->party_model->getAttendingCount($partyID);
	        $config["per_page"]      =   6;
	        $config["uri_segment"]   =   4;

	        $this->pagination->initialize($config);

	        $page              =   $this->uri->segment(4) ? $this->uri->segment(4) : 0;
	        $data["links"]     =   $this->pagination->create_links();

			$data['party']       =   $this->party_model->getParty($partyID);
			$data['donations']   =   $this->party_model->getDonations($partyID);
			$data['attending']   =   $this->party_model->getAttending($partyID, $config["per_page"], $page);

			if(isset($data['donations'][0]))
				foreach ($data['donations'] as $don) $totalDonated += $don['amount'];

			$data['totalDonated']   =   $totalDonated;
			$data['percent']        =   $totalDonated/$data['party'][0]['goal'] >= 1 ? 1 : $totalDonated/$data['party'][0]['goal'];

			if(isset($data['donations'][0]))
				foreach ($data['donations'] as $at) if($at['user_id'] == $this->session->userdata('userID')) 
					$data['donated'] = true;

			if($this->session->flashdata('success')) 
				$data['success'] = $this->session->flashdata('success');

			if($this->session->flashdata('error')) 
				$data['error'] = $this->session->flashdata('error');

			$data['collected']   =   $this->party_model->checkCollected($partyID);
			$data['partyID']     =   $partyID;
			$data['view']        =   'party';

			$data['party'] ? $this->load->view('includes/template', $data) : redirect('discover');

		}else{

			redirect('discover');

		}

	}

	public function comments($partyID = 0){

		if($partyID){

			$totalDonated = 0;

			$config = array();
	        $config["base_url"]      =   base_url()."/index.php/party/comments/".$partyID;
	        $config["total_rows"]    =   $this->party_model->getCommentsCount($partyID);
	        $config["per_page"]      =   6;
	        $config["uri_segment"]   =   4;

	        $this->pagination->initialize($config);

	        $page              =   $this->uri->segment(4) ? $this->uri->segment(4) : 0;
	        $data["links"]     =   $this->pagination->create_links();

			$data['party']       =   $this->party_model->getParty($partyID);
			$data['donations']   =   $this->party_model->getDonations($partyID);
			
			if(isset($data['donations'][0]))
				foreach ($data['donations'] as $don) $totalDonated += $don['amount'];

			$data['totalDonated']   =   $totalDonated;
			$data['percent']        =   $totalDonated/$data['party'][0]['goal'] >= 1 ? 1 : $totalDonated/$data['party'][0]['goal'];

			if(isset($data['donations'][0]))
				foreach ($data['donations'] as $at) if($at['user_id'] == $this->session->userdata('userID')) 
					$data['donated'] = true;

			if($this->session->flashdata('success')) 
				$data['success'] = $this->session->flashdata('success');

			if($this->session->flashdata('error')) 
				$data['error'] = $this->session->flashdata('error');

			$data['comments']    =   $this->party_model->getComments($partyID, $config["per_page"], $page);
			$data['collected']   =   $this->party_model->checkCollected($partyID);
			$data['partyID']     =   $partyID;
			$data['view']        =   'party_comments';
			
			$data['party'] ? $this->load->view('includes/template', $data) : redirect('discover');


		}else{

			redirect('discover');

		}

	}

	public function comment ($partyID = 0){

		if($this->session->userdata('userID')){

			if($partyID) {

				$this->load->library('form_validation');

				$config = array(
					array(
						'field'   =>   'comment',
						'label'   =>   'Comment',
						'rules'   =>   'trim|required|min_length[3]|max_length[400]|xss_clean'
					)
				);

				$this->form_validation->set_rules($config);

				if($this->form_validation->run() == false){

					redirect("party/comments/$partyID");

				}else{
					
					$result = $this->party_model->postComment($partyID);

					if($result){

						redirect("party/comments/$partyID");

					}

				}

			}else{

				redirect('discover');

			}

		}else{

			redirect('join');

		}

	}

	public function deleteComment($commentID = 0, $partyID = 0){
		
		if($this->session->userdata('userID')){

			if($partyID) {

				$this->party_model->deleteComment($commentID);

				$data['success']    =   'Comment was deleted.';
				$data['comments']   =   $this->party_model->getComments($partyID);
				$data['partyID']    =   $partyID;
				$data['party']      =   $this->party_model->getParty($partyID);
				$data['view']       =   'party_comments';

				$data['party'] ? $this->load->view('includes/template', $data) : redirect('discover');

			}else{

				redirect('discover');

			}

		}else{

			redirect('join');

		}

	}

	public function reportComment($commentID = 0, $partyID = 0){

		if($this->session->userdata('userID')){

			if($partyID) {

				$this->party_model->reportComment($commentID);

				redirect("party/comments/$partyID");

			}else{

				redirect('discover');

			}

		}else{

			redirect('join');

		}
		
	}

	public function updates($partyID = 0){

		if($partyID) {

			$totalDonated = 0;

			$config = array();
	        $config["base_url"]      =   base_url()."/index.php/party/updates/".$partyID;
	        $config["total_rows"]    =   $this->party_model->getUpdatesCount($partyID);
	        $config["per_page"]      =   6;
	        $config["uri_segment"]   =   4;

	        $this->pagination->initialize($config);

	        $page              =   $this->uri->segment(4) ? $this->uri->segment(4) : 0;
	        $data["links"]     =   $this->pagination->create_links();

			$data['party']       =   $this->party_model->getParty($partyID);
			$data['donations']   =   $this->party_model->getDonations($partyID);
			
			if(isset($data['donations'][0]))
				foreach ($data['donations'] as $don) $totalDonated += $don['amount'];

			$data['totalDonated']   =   $totalDonated;
			$data['percent']        =   $totalDonated/$data['party'][0]['goal'] >= 1 ? 1 : $totalDonated/$data['party'][0]['goal'];

			if(isset($data['donations'][0]))
				foreach ($data['donations'] as $at) if($at['user_id'] == $this->session->userdata('userID')) 
					$data['donated'] = true;

			if($this->session->flashdata('success')) 
				$data['success'] = $this->session->flashdata('success');

			if($this->session->flashdata('error')) 
				$data['error'] = $this->session->flashdata('error');

			$data['updates']     =   $this->party_model->getUpdates($partyID, $config["per_page"], $page);
			$data['partyID']     =   $partyID;
			$data['collected']   =   $this->party_model->checkCollected($partyID);
			$data['view']        =   'party_updates';
			
			$data['party'] ? $this->load->view('includes/template', $data) : redirect('discover');

		}else{

			redirect('discover');

		}

	}

	public function deleteUpdate($updateID = 0, $partyID = 0){

		if($this->session->userdata('userID')){

			if($partyID) {

				$this->party_model->deleteUpdate($updateID);

				$data['updates']   =   $this->party_model->getUpdates($partyID);
				$data['partyID']   =   $partyID;
				$data['party']     =   $this->party_model->getParty($partyID);
				$data['view']      =   'party_updates';

				$data['party'] ? $this->load->view('includes/template', $data) : redirect('discover');				

			}else{

				redirect('discover');

			}

		}else{

			redirect('join');

		}

	}

	public function ajaxDeleteComment(){

		$commentID = $_POST['commentID'];

		echo json_encode($this->party_model->deleteComment($commentID));
	}

	public function ajaxComment(){

		$user2ID = $_POST['user2ID'];

		$this->load->library('form_validation');

		$config = array(
			array(
				'field'   =>   'comment',
				'label'   =>   'Comment',
				'rules'   =>   'trim|required|min_length[3]|max_length[400]|xss_clean'
			)
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){

			echo json_encode(false);

		}else{
			
			echo json_encode($this->party_model->postComment($user2ID));

		}

	}

}