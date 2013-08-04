<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {	

	function __construct(){
		parent:: __construct();
		
		$this->load->model('app_model'); 
		$this->load->model('user_model');
		$this->load->model('party_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	public function index (){
		
		$userLocation            =   unserialize(base64_decode($this->app_model->userLocation()));
		$data['tweets']          =   $this->app_model->getTweets();
		$data['view']            =   'home';
		$data['userLocation']    =   $userLocation;
		$data['featured']        =   $this->party_model->getFeaturedParties(8,0);
		$data['donations']       =   array();
		$totalDonations          =   array();
		$data['attending']       =   array();

		if(isset($data['featured'][0])){
			foreach ($data['featured'] as $party)
				$data['donations'][$party['party_id']] = $this->party_model->getDonations($party['party_id']);
		
			foreach ($data['donations'] as $key=>$don) {
				$amount = 0;
				$donators = array();

				if(isset($don[0]))
					foreach ($don as $d){
						$amount += $d['amount'];
			
						if(!in_array($d['username'], $donators))
							array_push($donators, $d['username']);
					}
					
				$totalDonations[$key]      =   $amount;
				$data['attending'][$key]   =   $donators;

			}

			foreach ($data['featured'] as $k=>$party){

				$percent = $totalDonations[$party['party_id']]/$party['goal'] >= 1 ? 1 : $totalDonations[$party['party_id']]/$party['goal'];

				array_push($data['featured'][$k], $percent);
				array_push($data['featured'][$k], $totalDonations[$party['party_id']]);
				array_push($data['featured'][$k], $data['attending'][$party['party_id']]);
			}
		}

		$this->load->view('includes/template', $data);

	}

}