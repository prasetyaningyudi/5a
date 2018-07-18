<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {
	private $data;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		$this->load->model('lowongan_model');
	}

	public function index(){
		$this->data['result'] = $this->lowongan_model->get_lowongan();
		$this->load->view('section_header');
		$this->load->view('lowongan_view', $this->data);
		$this->load->view('section_footer');			
	}
	
	public function insert(){
		if(isset($_POST['submit'])){
			$this->data['insert'] = array(
				'POSISI_LOWONGAN' => $_POST['posisi_lowongan'],
			);
			$this->lowongan_model->insert_lowongan($this->data['insert']);			
			redirect('lowongan/');
		}else{
			$this->load->view('section_header');
			$this->load->view('lowongan_form');
			$this->load->view('section_footer');			
		}
	}

	public function update_status($id=null){
		if($id != null){
			$filter = array();
			$filter[] = "ID = ". $id;
			
			$result = $this->lowongan_model->get_lowongan($filter);
			if($result != null){
				foreach($result as $item){
					$status = $item->STATUS_POSISI;
				}
				if($status == '1'){
					$new_status = '0';
				}else if($status == '0'){
					$new_status = '1';
				}
				$this->lowongan_model->update_lowongan($new_status, $id);
				redirect('lowongan/');
			}
		}
		
	}

	public function delete($id=null){
		
	}
}


