<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {
	private $data;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
	}

	public function index(){		

	}
	
	public function application(){
		$this->load->view('section_header');
		$this->load->view('application_form');
		$this->load->view('section_footer');
	}

	public function update($id=null){

	}

	public function delete($id=null){
		
	}
}


