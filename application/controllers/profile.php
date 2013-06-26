<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();

	}

	public function index (){	

		if($this->session->userdata('userID')) {

			$data['friends']   =   $this->user_model->getFriends($this->session->userdata('userID'));
			$data['view']      =   'profile';

			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';

			$this->load->view('includes/template', $data);

		}
		
	}

	public function activity (){	

		if($this->session->userdata('userID')) {

			$data['view'] = 'profile_activity';
			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';
			$this->load->view('includes/template', $data);

		}
		
	}

	public function parties (){	

		if($this->session->userdata('userID')) {

			$data['parties']   =   $this->user_model->getUserParties($this->session->userdata('userID'));
			$data['view']      =   'profile_parties';

			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';

			$this->load->view('includes/template', $data);

		}
		
	}

	public function friends (){	

		if($this->session->userdata('userID')) {

			$data['friends']   =   $this->user_model->getFriends($this->session->userdata('userID'));
			$data['view']      =   'profile_friends';

			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';

			$this->load->view('includes/template', $data);

		}
		
	}

	public function comments (){	

		if($this->session->userdata('userID')) {

			$data['comments']   =   $this->user_model->getComments();
			$data['view']       =   'profile_comments';

			$this->load->view('includes/template', $data);

		}else{

			$data['view'] = 'login';
			
			$this->load->view('includes/template', $data);

		}
		
	}

	public function comment (){

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'comment',
				'label' => 'Comment',
				'rules' => 'trim|required|min_length[3]|max_length[400]|xss_clean'
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

}