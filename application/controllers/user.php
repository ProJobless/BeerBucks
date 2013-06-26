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

		if($user2ID != $this->session->userdata('userID') && $user2ID){

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

	public function parties($user2ID = 0){	

		if($user2ID != $this->session->userdata('userID') && $user2ID){

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

	public function friends($user2ID = 0){	

		if($user2ID != $this->session->userdata('userID') && $user2ID){

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

	public function comments($user2ID = 0){	

		if($user2ID != $this->session->userdata('userID') && $user2ID){

			if($this->user_model->checkFriendship($user2ID)){
				$data['friendCheck'] = false;	
			}else{
				$data['friendCheck'] = true;	
			}

			$data['comments'] = $this->user_model->getComments($user2ID);
			$data['user'] = $this->user_model->getUser($user2ID);
			$data['user2'] = $user2ID;
			$data['friends'] = $this->user_model->getFriends($user2ID);
			$data['view'] = 'user_comments';
			$this->load->view('includes/template', $data);
			
		}else{

			redirect('profile');

		}
		
	}

	public function comment ($user2ID = 0){

		if($user2ID != $this->session->userdata('userID') && $user2ID){

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

				redirect('user/comments/$user2ID');

			}else{
				
				$result = $this->user_model->postComment($user2ID);

				if($result){

					redirect("user/comments/$user2ID");

				}

			}

		}else{

			redirect('profile');

		}

	}

}