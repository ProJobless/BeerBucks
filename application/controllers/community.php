<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	public function index(){	

		$data['view'] = 'community';

		$this->load->view('includes/template', $data);

	}

	public function addFriend($user2ID){

		if($this->user_model->addFriend($user2ID)){

			$data['user']      =   $this->user_model->getUser($user2ID);
			$data['message']   =   'Friend request sent.';
			$data['friends']   =   $this->user_model->getFriends($user2ID);
			$data['view']      =   'user';

			$this->load->view('includes/template', $data);

		}else{

			$data['user']      =   $this->user_model->getUser($user2ID);
			$data['message']   =   'Request has already been sent.';
			$data['friends']   =   $this->user_model->getFriends($user2ID);
			$data['view']      =   'user';

			$this->load->view('includes/template', $data);

		}

	}

	public function people(){

		$data['users']   =   $this->user_model->getUsers();
		$data['view']    =   'community_people';
		
		$this->load->view('includes/template', $data);

	}

	// public function user($user2ID = 0){	

	// 	if($user2ID != $this->session->userdata('userID') && $user2ID){

	// 		if($this->user_model->checkFriendship($user2ID)){
	// 			$data['friendCheck'] = false;	
	// 		}else{
	// 			$data['friendCheck'] = true;	
	// 		}

	// 		$data['comments']   =   $this->user_model->getComments($user2ID);

	// 		$data['user']       =   $this->user_model->getUser($user2ID);
	// 		$data['friends']    =   $this->user_model->getFriends($user2ID);
	// 		$data['view']       =   'user';

	// 		$this->load->view('includes/template', $data);
			
	// 	}else{
	// 		redirect('profile');
	// 	}

	// }

}