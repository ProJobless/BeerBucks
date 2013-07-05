<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	public function index (){	

		if($this->session->userdata('userID')) {

			redirect('profile/activity');

		}else{

			redirect('join');

		}
		
	}

	public function activity (){	

		if($this->session->userdata('userID')) {

			$userID             =   $this->session->userdata('userID');
			$data['friends']    =   $this->user_model->getFriends($userID);
			$data['parties']    =   $this->user_model->getUserParties($userID);
			$data['activity']   =   $this->user_model->sortActivity($data['friends'], $data['parties']);
			$data['view']       =   'profile';

			$this->load->view('includes/template', $data);

		}else{

			redirect('join');

		}
		
	}

	public function parties (){	

		if($this->session->userdata('userID')) {

			$userID            =   $this->session->userdata('userID');
			$data['parties']   =   $this->user_model->getUserParties($userID);
			$data['view']      =   'profile_parties';

			$this->load->view('includes/template', $data);

		}else{

			redirect('join');

		}
		
	}

	public function friends (){	

		if($this->session->userdata('userID')) {

			$data['friends']   =   $this->user_model->getFriends($this->session->userdata('userID'));
			$data['view']      =   'profile_friends';

			$this->load->view('includes/template', $data);

		}else{

			redirect('join');

		}
		
	}

	public function comments (){	

		if($this->session->userdata('userID')) {

			$data['comments']   =   $this->user_model->getComments();
			$data['view']       =   'profile_comments';

			$this->load->view('includes/template', $data);

		}else{

			redirect('join');

		}
		
	}

	public function comment (){

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

			redirect('profile/comments');

		}else{
			
			$result = $this->user_model->postComment();

			if($result){

				redirect('profile/comments');

			}

		}

	}

	public function deleteComment($commentID = 0){
		
		if($commentID){

			if($this->session->userdata('userID')) {

				$this->user_model->deleteComment($commentID);

				$data['success']    =   'Comment was deleted.';
				$data['comments']   =   $this->user_model->getComments();
				$data['view']       =   'profile_comments';

				$this->load->view('includes/template', $data);

			}else{

				redirect('join');

			}

		}else{

			redirect('profile/comments');

		}

	}

	public function acceptFriend($friendshipID){

		if($this->user_model->acceptFriend($friendshipID)){

			$data['friendReqs']   =   $this->user_model->checkForFriendRequests();
			$data['view']         =   'profile_alerts';
			$data['success']      =   'Friend added.';

			$this->load->view('includes/template', $data);

		}else{

			$data['friendReqs']   =   $this->user_model->checkForFriendRequests();
			$data['view']         =   'profile_alerts';
			$data['error']        =   'Problem adding friend.';

			$this->load->view('includes/template', $data);

		}

	}

	public function declineFriend($friendshipID){

		if($this->user_model->declineFriend($friendshipID)){

			$data['friendReqs']   =   $this->user_model->checkForFriendRequests();
			$data['view']         =   'profile_alerts';
			$data['success']      =   'Friend request denied.';

			$this->load->view('includes/template', $data);

		}else{

			$data['friendReqs']   =   $this->user_model->checkForFriendRequests();
			$data['view']         =   'profile_alerts';
			$data['error']      =   'Problem denying friend request.';

			$this->load->view('includes/template', $data);
			
		}

	}

}