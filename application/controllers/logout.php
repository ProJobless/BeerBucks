<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('authentication_model');
	}

	public function index (){	

		$sData = array(
			'userID' => null,
			'email' => null,
			'username' => null,
            'dateOfReg' => null,
            'profileImage' => null,
            'facebookID' => null,
            'bio' => null,
            'timezone' => null,
            'title' => null,
        	'description' => null,
            'location' => null,
            'partyLocation' => null,
			'address' => null,
            'start' => null,
            'end' => null,
            'goal' => null,
            'img_name' => null,
            'access_token' => null,
            'access_token_secret' => null,
            'request_token' => null,
            'request_token_secret' => null,
            'twitter_user_id' => null,
            'twitter_screen_name' => null,
            'alerts' => null,
            
    	);

    	$this->session->unset_userdata($sData);

		redirect('home');

	}

}