<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {	

	function __construct(){
		parent:: __construct();

        $this->session->keep_flashdata('referer');

	}

	public function index (){	

		$sData = array(
            //User Session Data
            'userID'                 =>   null,
            'email'                  =>   null,
            'username'               =>   null,
            'dateOfReg'              =>   null,
            'profileImage'           =>   null,
            'facebookID'             =>   null,
            'bio'                    =>   null,
            'timezone'               =>   null,
            'alerts'                 =>   null,
            'feedback'               =>   null,
            'views'                  =>   null,
            'comments'               =>   null,
            'contributions'          =>   null,
            'parties'                =>   null,
            //Party Session Data
            'title'                  =>   null,
            'description'            =>   null,
            'location'               =>   null,
            'partyLocation'          =>   null,
            'partyLat'               =>   null,
            'partyLng'               =>   null,
            'address'                =>   null,
            'start'                  =>   null,
            'end'                    =>   null,
            'goal'                   =>   null,
            'img_name'               =>   null,
            //Twitter Session Data
            'access_token'           =>   null,
            'access_token_secret'    =>   null,
            'request_token'          =>   null,
            'request_token_secret'   =>   null,
            'twitter_user_id'        =>   null,
            'twitter_screen_name'    =>   null,
            //Geo Location Data
            'geoLocation'            =>   null,
            'userLat'                =>   null,
            'userLng'                =>   null,
        );

        $this->session->unset_userdata($sData);

		if($this->session->userdata('userID')) {

			$data['view'] = 'profile';
			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';
			$this->load->view('includes/template', $data);

		}

	}

}