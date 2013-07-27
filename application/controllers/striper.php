<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Striper extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->library('stripe.php');
		$this->load->model('party_model');

	}

	public function index (){	

		if($this->session->userdata('userID')){
			
			$token     =   $this->input->post('stripeToken');
			$amount    =   $this->input->post('amount')*100;
			$partyID   =   $this->input->post('party_id');
			$label     =   $amount/100;

			$response = json_decode($this->stripe->charge_card($amount, $token, 'User donated to a party.'));

			if(isset($response->paid)){

				$this->party_model->addDonation($response, $partyID, $label);
				$this->session->set_flashdata('success',"You successfully donated $$label to the party.");
				redirect('party/attending/'.$partyID);

			}else if(isset($response->failure_message)){

				$this->session->set_flashdata('error', $response->failure_message);
				redirect('party/attending/'.$partyID);

			}else if(isset($response->error)){

				$this->session->set_flashdata('error', $response->error->type);
				redirect('party/attending/'.$partyID);

			}else{

				$this->session->set_flashdata('error','There was a problem while trying to donate. Please try again.');
				redirect('party/attending/'.$partyID);

			}

		}

	}

}