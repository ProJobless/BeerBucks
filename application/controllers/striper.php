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

		}else{

			redirect('join');

		}

	}

	public function collect($partyID = 0){

		if($this->session->userdata('userID')){

			if($this->party_model->checkUser($partyID) && $this->party_model->checkCollected($partyID)){
			
				$amount      =   $this->party_model->getAmount($partyID);
				$currency    =   'USD';
				$recipient   =   $this->party_model->getRecipientID($partyID);

				$response = json_decode($this->stripe->transfer_create($amount, $currency, $recipient));

				if(isset($response->id)){
					$this->party_model->changeCollected($partyID);
					$this->session->set_flashdata('success',"Funds are being sent to your bank account.");
					redirect("party/attending/$partyID");
				}else{
					$this->session->set_flashdata('error',"There was a problem collecting your funds. Please try again.");
					redirect("party/attending/$partyID");
				}

			}else{

				$this->session->set_flashdata('error',"Funds have already been sent to your bank account.");
				redirect("party/attending/$partyID");

			}

		}else{

			redirect('join');

		}

	}

}