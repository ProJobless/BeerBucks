<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Striper extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->library('stripe.php');

	}

	public function index (){	

		$token = $this->input->post('stripeToken');
		//echo $this->stripe->customer_list();
		echo $this->stripe->charge_card(90000, $token, 'idk yo');

	}

}