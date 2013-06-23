<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	public function index(){	

		redirect('community/people');

	}

	public function activity($user2ID){	

		if($user2ID != $this->session->userdata('userID')){

			if($this->user_model->checkFriendship($user2ID)){
				$data['friendCheck'] = false;	
			}else{
				$data['friendCheck'] = true;	
			}

			$data['user'] = $this->user_model->getUser($user2ID);
			$data['friends'] = $this->user_model->getFriends($user2ID);
			$data['view'] = 'user';
			$this->load->view('includes/template', $data);
			
		}else{

			redirect('profile');

		}
		
	}

	public function parties($user2ID){	

		if($user2ID != $this->session->userdata('userID')){

			if($this->user_model->checkFriendship($user2ID)){
				$data['friendCheck'] = false;	
			}else{
				$data['friendCheck'] = true;	
			}

			$data['user'] = $this->user_model->getUser($user2ID);
			$data['parties'] = $this->user_model->getUserParties($user2ID);
			$data['view'] = 'user_parties';
			$this->load->view('includes/template', $data);
			
		}else{

			redirect('profile');

		}
		
	}

	public function friends($user2ID){	

		if($user2ID != $this->session->userdata('userID')){

			if($this->user_model->checkFriendship($user2ID)){
				$data['friendCheck'] = false;	
			}else{
				$data['friendCheck'] = true;	
			}

			$data['user'] = $this->user_model->getUser($user2ID);
			$data['friends'] = $this->user_model->getFriends($user2ID);
			$data['view'] = 'user_friends';
			$this->load->view('includes/template', $data);
			
		}else{

			redirect('profile');

		}
		
	}

	public function comments($user2ID){	

		if($user2ID != $this->session->userdata('userID')){

			if($this->user_model->checkFriendship($user2ID)){
				$data['friendCheck'] = false;	
			}else{
				$data['friendCheck'] = true;	
			}

			$data['user'] = $this->user_model->getUser($user2ID);
			$data['friends'] = $this->user_model->getFriends($user2ID);
			$data['view'] = 'user_comments';
			$this->load->view('includes/template', $data);
			
		}else{

			redirect('profile');

		}
		
	}

}