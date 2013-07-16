<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Controller {	

	function __construct(){
		parent:: __construct();

		$this->load->library("pagination");
		$this->load->model('party_model');
		$this->load->model('user_model');
		$data['alerts'] = $this->user_model->checkAlerts();
	}

	public function index (){	

		// $data['parties']   =   $this->party_model->getParties();
		// $data['view']      =   'discover';

		// $this->load->view('includes/template', $data);
		redirect('discover/featured');

	}

	public function featured(){

		$config = array();
        $config["base_url"]      =   base_url()."/index.php/discover/featured";
        $config["total_rows"]    =   $this->party_model->getCount();
        $config["per_page"]      =   8;
        $config["uri_segment"]   =   3;

        $this->pagination->initialize($config);

        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["links"]     =   $this->pagination->create_links();
		$data['parties']   =   $this->party_model->getParties($config["per_page"], $page);
		$data['view']      =   'discover';

		$this->load->view('includes/template', $data);

	}

	public function nearYou(){

		$config = array();
        $config["base_url"]      =   base_url()."/index.php/discover/nearYou";
        $config["total_rows"]    =   $this->party_model->getCount();
        $config["per_page"]      =   8;
        $config["uri_segment"]   =   3;

        $this->pagination->initialize($config);

        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["links"]     =   $this->pagination->create_links();
		$data['parties']   =   $this->party_model->getNearParties($config["per_page"], $page);
		$data['view']      =   'discover_nearyou';

		$this->load->view('includes/template', $data);

	}

	public function Upcoming(){

		$config = array();
        $config["base_url"]      =   base_url()."/index.php/discover/upcoming";
        $config["total_rows"]    =   $this->party_model->getCount();
        $config["per_page"]      =   8;
        $config["uri_segment"]   =   3;

        $this->pagination->initialize($config);

        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["links"]     =   $this->pagination->create_links();
		$data['parties']   =   $this->party_model->getUpcomingParties($config["per_page"], $page);
		$data['view']      =   'discover_upcoming';

		$this->load->view('includes/template', $data);

	}

	public function Completed(){

		$config = array();
        $config["base_url"]      =   base_url()."/index.php/discover/completed";
        $config["total_rows"]    =   $this->party_model->getCompletedCount();
        $config["per_page"]      =   8;
        $config["uri_segment"]   =   3;

        $this->pagination->initialize($config);

        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["links"]     =   $this->pagination->create_links();
		$data['parties']   =   $this->party_model->getCompleted($config["per_page"], $page);
		$data['view']      =   'discover_completed';
		
		$this->load->view('includes/template', $data);

	}

	public function Search(){

		$config = array();
        $config["base_url"]      =   base_url()."/index.php/discover/search";
        $config["total_rows"]    =   $this->party_model->getCount();
        $config["per_page"]      =   8;
        $config["uri_segment"]   =   3;

        $this->pagination->initialize($config);

        $page              =   $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["links"]     =   $this->pagination->create_links();
		$data['parties']   =   $this->party_model->getSearchResults($config["per_page"], $page);
		$data['view']      =   'discover_search';
		
		$this->load->view('includes/template', $data);


	}

}