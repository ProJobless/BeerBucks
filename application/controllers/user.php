<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	function _remap($method){

		$param_offset = 2;

		if ( ! method_exists($this, $method)){
			$param_offset = 1;
			$method = 'index';
		}

		$params = array_slice($this->uri->rsegment_array(), $param_offset);
		call_user_func_array(array($this, $method), $params);

	} 

	public function index($user2ID = 0){	

		// if($user2ID != $this->session->userdata('userID') && $user2ID){

		// 	if($this->user_model->checkFriendship($user2ID)){
		// 		$data['friendCheck'] = false;	
		// 	}else{
		// 		$data['friendCheck'] = true;	
		// 	}

		// 	$data['viewCount']   =   $this->user_model->userViewCount($user2ID);
		// 	$data['friends']     =   $this->user_model->getFriends($user2ID);
		// 	$data['parties']     =   $this->user_model->getUserParties($user2ID);
		// 	$data['activity']    =   $this->user_model->sortActivity($data['friends'], $data['parties']);
		// 	$data['user']        =   $this->user_model->getUser($user2ID);
		// 	$data['view']        =   'user';
			
		// 	$data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');
			
		// }else{

		// 	redirect('community/people');

		// }
		redirect("user/activity/$user2ID");

	}

	public function activity($user2ID = 0){	

		if($user2ID != $this->session->userdata('userID') && $user2ID){

			if($this->user_model->checkFriendship($user2ID)){
				$data['friendCheck'] = false;	
			}else{
				$data['friendCheck'] = true;	
			}

			$data['viewCount']   =   $this->user_model->userViewCount($user2ID);
			$data['friends']     =   $this->user_model->getFriends($user2ID);
			$data['parties']     =   $this->user_model->getUserParties($user2ID);
			$data['activity']    =   $this->user_model->sortActivity($data['friends'], $data['parties']);
			$data['user']        =   $this->user_model->getUser($user2ID);
			$data['view']        =   'user';
			
			$data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');
			
		}else{

			redirect('community/people');

		}
		
	}

	public function parties($user2ID = 0){	

		if($user2ID != $this->session->userdata('userID') && $user2ID){

			if($this->user_model->checkFriendship($user2ID)){
				$data['friendCheck'] = false;	
			}else{
				$data['friendCheck'] = true;	
			}

			$data['user']      =   $this->user_model->getUser($user2ID);
			$data['parties']   =   $this->user_model->getUserParties($user2ID);
			$data['view']      =   'user_parties';

			$data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');
			
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

			$data['user']      =   $this->user_model->getUser($user2ID);
			$data['friends']   =   $this->user_model->getFriends($user2ID);
			$data['view']      =   'user_friends';

			$data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');
			
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

			$data['comments']   =   $this->user_model->getComments($user2ID);
			$data['user']       =   $this->user_model->getUser($user2ID);
			$data['user2']      =   $user2ID;
			$data['friends']    =   $this->user_model->getFriends($user2ID);
			$data['view']       =   'user_comments';

			$data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');
			
		}else{

			redirect('profile');

		}
		
	}

	public function comment ($user2ID = 0){

		if($this->session->userdata('userID')){

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

					redirect("user/comments/$user2ID");

				}else{
					
					$result = $this->user_model->postComment($user2ID);

					if($result){

						redirect("user/comments/$user2ID");

					}

				}

			}else{

				redirect('profile');

			}

		}else{

			redirect('join');

		}

	}

	public function deleteComment($commentID = 0, $user2ID = 0){

		if($this->session->userdata('userID')){

			if($user2ID != $this->session->userdata('userID') && $user2ID){

				$this->user_model->deleteComment($commentID);

				if($this->user_model->checkFriendship($user2ID)){
					$data['friendCheck'] = false;	
				}else{
					$data['friendCheck'] = true;	
				}

				$data['comments']   =   $this->user_model->getComments($user2ID);
				$data['user']       =   $this->user_model->getUser($user2ID);
				$data['user2']      =   $user2ID;
				$data['friends']    =   $this->user_model->getFriends($user2ID);
				$data['view']       =   'user_comments';

				$data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');


			}else{

				redirect('profile');

			}

		}else{

			redirect('join');

		}

	}

	public function ajaxDeleteComment(){

		$commentID = $_POST['commentID'];

		echo json_encode($this->user_model->deleteComment($commentID));
	}

	public function ajaxComment(){

		$user2ID = $_POST['user2ID'];

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
			
			echo json_encode($this->user_model->postComment($user2ID));

		}

	}

}