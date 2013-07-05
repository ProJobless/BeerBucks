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

	public function addFriend($user2ID = 0){

		if($user2ID != $this->session->userdata('userID') && $this->user_model->checkForUser($user2ID)){

			if($this->user_model->addFriend($user2ID)){

				if($this->user_model->checkFriendship($user2ID)){
					$data['friendCheck'] = false;	
				}else{
					$data['friendCheck'] = true;	
				}

				$data['user']       =   $this->user_model->getUser($user2ID);
				$data['friends']    =   $this->user_model->getFriends($user2ID);
				$data['parties']    =   $this->user_model->getUserParties($user2ID);
				$data['activity']   =   $this->user_model->sortActivity($data['friends'], $data['parties']);
				$data['success']    =   'Friend request sent.';
				$data['view']       =   'user';

				$this->load->view('includes/template', $data);

			}else{

				if($this->user_model->checkFriendship($user2ID)){
					$data['friendCheck'] = false;	
				}else{
					$data['friendCheck'] = true;	
				}

				$data['user']       =   $this->user_model->getUser($user2ID);
				$data['friends']    =   $this->user_model->getFriends($user2ID);
				$data['parties']    =   $this->user_model->getUserParties($user2ID);
				$data['activity']   =   $this->user_model->sortActivity($data['friends'], $data['parties']);
				$data['error']      =   'Request has already been sent.';
				$data['view']       =   'user';

				$this->load->view('includes/template', $data);

			}

		}else{

			redirect('community/people');

		}

	}

	public function removeFriend($user2ID = 0){

		if($user2ID != $this->session->userdata('userID') && $this->user_model->checkForUser($user2ID)){

			if($this->user_model->removeFriend($user2ID)){

				if($this->user_model->checkFriendship($user2ID)){
					$data['friendCheck'] = false;	
				}else{
					$data['friendCheck'] = true;	
				}

				$data['user']       =   $this->user_model->getUser($user2ID);
				$data['friends']    =   $this->user_model->getFriends($user2ID);
				$data['parties']    =   $this->user_model->getUserParties($user2ID);
				$data['activity']   =   $this->user_model->sortActivity($data['friends'], $data['parties']);
				$data['success']    =   'Friend removed.';
				$data['view']       =   'user';

				$this->load->view('includes/template', $data);

			}else{

				if($this->user_model->checkFriendship($user2ID)){
					$data['friendCheck'] = false;	
				}else{
					$data['friendCheck'] = true;	
				}

				$data['user']       =   $this->user_model->getUser($user2ID);
				$data['friends']    =   $this->user_model->getFriends($user2ID);
				$data['parties']    =   $this->user_model->getUserParties($user2ID);
				$data['activity']   =   $this->user_model->sortActivity($data['friends'], $data['parties']);
				$data['view']       =   'user';

				$this->load->view('includes/template', $data);

			}

		}else{

			redirect('community/people');

		}


	}

	public function people(){

		$data['users']   =   $this->user_model->getUsers();
		$data['view']    =   'community_people';
		
		$this->load->view('includes/template', $data);

	}

}