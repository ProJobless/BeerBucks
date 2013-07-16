<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->library("pagination");
		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();
	}

	public function index (){	

		// if($this->session->userdata('userID')) {

		// 	$userID             =   $this->session->userdata('userID');
		// 	$data['friends']    =   $this->user_model->getFriends($userID);
		// 	$data['parties']    =   $this->user_model->getUserParties($userID);
		// 	$data['activity']   =   $this->user_model->sortActivity($data['friends'], $data['parties']);
		// 	$data['view']       =   'profile';

		// 	$this->load->view('includes/template', $data);

		// }else{

		// 	redirect('join');

		// }
		// 
		redirect('profile/activity');
		
	}

	public function activity (){	

		if($this->session->userdata('userID')) {

			$userID             =   $this->session->userdata('userID');

			$config = array();
	        $config["base_url"]      =   base_url()."/index.php/profile/activity";
	        $config["total_rows"]    =   $this->user_model->getActivityCount($userID);
	        $config["per_page"]      =   8;
	        $config["uri_segment"]   =   3;

	        $this->pagination->initialize($config);

	        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
	        $data["links"]     =   $this->pagination->create_links();

			$data['activity']   =   $this->user_model->getActivity($userID, $config["per_page"], $page);
			$data['view']       =   'profile';

			$this->load->view('includes/template', $data);

		}else{

			redirect('join');

		}
		
	}

	public function parties (){	

		if($this->session->userdata('userID')) {

			$userID            =   $this->session->userdata('userID');

			$config = array();
	        $config["base_url"]      =   base_url()."/index.php/profile/parties";
	        $config["total_rows"]    =   $this->user_model->getPartyCount($userID);
	        $config["per_page"]      =   6;
	        $config["uri_segment"]   =   3;

	        $this->pagination->initialize($config);

	        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
	        $data["links"]     =   $this->pagination->create_links();

			$data['parties']   =   $this->user_model->getUserParties($userID, $config["per_page"], $page);
			$data['view']      =   'profile_parties';

			$this->load->view('includes/template', $data);

		}else{

			redirect('join');

		}
		
	}

	public function friends (){	

		if($this->session->userdata('userID')) {

			$userID            =   $this->session->userdata('userID');

			$config = array();
	        $config["base_url"]      =   base_url()."/index.php/profile/friends";
	        $config["total_rows"]    =   $this->user_model->getFriendCount($userID);
	        $config["per_page"]      =   6;
	        $config["uri_segment"]   =   3;

	        $this->pagination->initialize($config);

	        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
	        $data["links"]     =   $this->pagination->create_links();

			$data['friends']   =   $this->user_model->getFriends($userID, $config["per_page"], $page);
			$data['view']      =   'profile_friends';

			$this->load->view('includes/template', $data);

		}else{

			redirect('join');

		}
		
	}

	public function comments (){	

		if($this->session->userdata('userID')) {

			$userID            =   $this->session->userdata('userID');

			$config = array();
	        $config["base_url"]      =   base_url()."/index.php/profile/comments";
	        $config["total_rows"]    =   $this->user_model->getCommentCount($userID);
	        $config["per_page"]      =   8;
	        $config["uri_segment"]   =   3;

	        $this->pagination->initialize($config);

	        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
	        $data["links"]     =   $this->pagination->create_links();

			$data['comments']   =   $this->user_model->getComments(0, $config["per_page"], $page);
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

				redirect('profile/comments');

			}else{

				redirect('join');

			}

		}else{

			redirect('profile/comments');

		}

	}

	public function reportComment($commentID = 0){

		if($commentID){

			if($this->session->userdata('userID')) {

				if($this->user_model->reportComment($commentID)){
					redirect('profile/comments');
				}

			}else{

				redirect('join');

			}

		}else{

			redirect('profile/comments');

		}
		
	}

	public function acceptFriend($friendshipID, $user2ID){

		if($this->user_model->acceptFriend($friendshipID, $user2ID)){

			// $data['friendReqs']   =   $this->user_model->checkForFriendRequests();
			// $data['view']         =   'profile_alerts';
			// $data['success']      =   'Friend added.';

			// $this->load->view('includes/template', $data);
			
			redirect('profile');

		}else{

			// $data['friendReqs']   =   $this->user_model->checkForFriendRequests();
			// $data['view']         =   'profile_alerts';
			// $data['error']        =   'Problem adding friend.';

			// $this->load->view('includes/template', $data);
			
			redirect('profile');

		}

	}

	public function declineFriend($friendshipID){

		if($this->user_model->declineFriend($friendshipID)){

			// $data['friendReqs']   =   $this->user_model->checkForFriendRequests();
			// $data['view']         =   'profile_alerts';
			// $data['success']      =   'Friend request denied.';

			// $this->load->view('includes/template', $data);
			
			redirect('profile');

		}else{

			// $data['friendReqs']   =   $this->user_model->checkForFriendRequests();
			// $data['view']         =   'profile_alerts';
			// $data['error']      =   'Problem denying friend request.';

			// $this->load->view('includes/template', $data);
			
			redirect('profile');
			
		}

	}

	public function alerts(){
		
		$data['friendReqs'] = $this->user_model->checkForFriendRequests();
		$data['view'] = 'profile_alerts';
		$this->load->view('includes/template', $data);

	}

	public function ajaxDeleteComment(){

		$commentID = $_POST['commentID'];

		echo json_encode($this->user_model->deleteComment($commentID));
	}

	public function ajaxComment(){

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

			echo json_encode(false);

		}else{
			
			echo json_encode($this->user_model->postComment());

		}

	}

}