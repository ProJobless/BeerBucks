<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Party extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('party_model');
		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();
	}

	public function index (){	

		$data['parties']   =   $this->party_model->getParties();
		$data['view']      =   'discover';

		$this->load->view('includes/template', $data);

	}

	public function attending($partyID = 0){

		if($partyID){

			$data['partyID']   =   $partyID;
			$data['party']     =   $this->party_model->getParty($partyID);
			$data['view']      =   'party';

			$this->load->view('includes/template', $data);

		}else{

			$data['parties']   =   $this->party_model->getParties();
			$data['view']      =   'discover';

			$this->load->view('includes/template', $data);

		}

	}

	public function comments($partyID = 0){

		if($partyID){

			$data['comments']   =   $this->party_model->getComments($partyID);
			$data['partyID']    =   $partyID;
			$data['party']      =   $this->party_model->getParty($partyID);
			$data['view']       =   'party_comments';

			$this->load->view('includes/template', $data);

		}else{

			$data['parties']   =   $this->party_model->getParties();
			$data['view']      =   'discover';

			$this->load->view('includes/template', $data);

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

					redirect('user/comments/$partyID');

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

}