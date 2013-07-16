<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->library("pagination");
		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	public function index(){	

		$data['view'] = 'community';

		$this->load->view('includes/template', $data);

		redirect('community/featured');

	}

	public function featured(){

		$data['view'] = 'community';

		$this->load->view('includes/template', $data);
		
	}

	public function people(){

		$config = array();
        $config["base_url"]      =   base_url()."/index.php/community/people";
        $config["total_rows"]    =   $this->user_model->getCount();
        $config["per_page"]      =   8;
        $config["uri_segment"]   =   3;

        $this->pagination->initialize($config);

        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["links"]     =   $this->pagination->create_links();
		$data['users']     =   $this->user_model->getUsers($config["per_page"], $page);
		$data['view']      =   'community_people';
		
		$this->load->view('includes/template', $data);

	}

	public function addFriend($user2ID = 0){

		if($user2ID != $this->session->userdata('userID') && $this->user_model->checkForUser($user2ID)){

			if($this->user_model->addFriend($user2ID)){

				// $config = array();
		  //       $config["base_url"]      =   base_url()."/index.php/user/activity/".$user2ID;
		  //       $config["total_rows"]    =   $this->user_model->getActivityCount($user2ID);
		  //       $config["per_page"]      =   8;
		  //       $config["uri_segment"]   =   4;

		  //       $this->pagination->initialize($config);

		  //       $page              =   $this->uri->segment(4) ? $this->uri->segment(4) : 0;
		  //       $data["links"]     =   $this->pagination->create_links();

				// if($this->user_model->checkFriendship($user2ID)) $data['friendCheck'] = false; else $data['friendCheck'] = true;	
				
				// $data['viewCount']   =   $this->user_model->userViewCount($user2ID);
				// $data['activity']   =   $this->user_model->getActivity($user2ID, $config["per_page"], $page);
				// $data['user']        =   $this->user_model->getUser($user2ID);
				// $data['view']        =   'user';
				// $data['success']    =   'Friend request sent.';

				// $data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');
				
				redirect("user/$user2ID");

			}else{

				// $config = array();
		  //       $config["base_url"]      =   base_url()."/index.php/user/activity/".$user2ID;
		  //       $config["total_rows"]    =   $this->user_model->getActivityCount($user2ID);
		  //       $config["per_page"]      =   8;
		  //       $config["uri_segment"]   =   4;

		  //       $this->pagination->initialize($config);

		  //       $page              =   $this->uri->segment(4) ? $this->uri->segment(4) : 0;
		  //       $data["links"]     =   $this->pagination->create_links();

				// if($this->user_model->checkFriendship($user2ID)) $data['friendCheck'] = false; else $data['friendCheck'] = true;	
				
				// $data['viewCount']   =   $this->user_model->userViewCount($user2ID);
				// $data['activity']   =   $this->user_model->getActivity($user2ID, $config["per_page"], $page);
				// $data['user']        =   $this->user_model->getUser($user2ID);
				// $data['view']        =   'user';
				// $data['error']      =   'Request has already been sent.';

				// $data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');

				redirect("user/$user2ID");
			}

		}else{

			redirect('community/people');

		}

	}

	public function removeFriend($user2ID = 0){

		if($user2ID != $this->session->userdata('userID') && $this->user_model->checkForUser($user2ID)){

			if($this->user_model->removeFriend($user2ID)){

				// $config = array();
		  //       $config["base_url"]      =   base_url()."/index.php/user/activity/".$user2ID;
		  //       $config["total_rows"]    =   $this->user_model->getActivityCount($user2ID);
		  //       $config["per_page"]      =   8;
		  //       $config["uri_segment"]   =   4;

		  //       $this->pagination->initialize($config);

		  //       $page              =   $this->uri->segment(4) ? $this->uri->segment(4) : 0;
		  //       $data["links"]     =   $this->pagination->create_links();

				// if($this->user_model->checkFriendship($user2ID)) $data['friendCheck'] = false; else $data['friendCheck'] = true;	
				
				// $data['viewCount']   =   $this->user_model->userViewCount($user2ID);
				// $data['activity']   =   $this->user_model->getActivity($user2ID, $config["per_page"], $page);
				// $data['user']        =   $this->user_model->getUser($user2ID);
				// $data['view']        =   'user';
				// $data['success']    =   'Friend removed.';

				// $data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');
				
				redirect("user/$user2ID");

			}else{

				// $config = array();
		  //       $config["base_url"]      =   base_url()."/index.php/user/activity/".$user2ID;
		  //       $config["total_rows"]    =   $this->user_model->getActivityCount($user2ID);
		  //       $config["per_page"]      =   8;
		  //       $config["uri_segment"]   =   4;

		  //       $this->pagination->initialize($config);

		  //       $page              =   $this->uri->segment(4) ? $this->uri->segment(4) : 0;
		  //       $data["links"]     =   $this->pagination->create_links();

				// if($this->user_model->checkFriendship($user2ID)) $data['friendCheck'] = false; else $data['friendCheck'] = true;	
				
				// $data['viewCount']   =   $this->user_model->userViewCount($user2ID);
				// $data['activity']   =   $this->user_model->getActivity($user2ID, $config["per_page"], $page);
				// $data['user']        =   $this->user_model->getUser($user2ID);
				// $data['view']        =   'user';

				// $data['user'] ? $this->load->view('includes/template', $data) : redirect('community/people');

				redirect("user/$user2ID");
				
			}

		}else{

			redirect('community/people');

		}


	}

}