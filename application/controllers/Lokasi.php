<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
	private $data;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		$this->load->model('lokasi_model');
	}

	public function index(){
		$this->data['result'] = $this->lokasi_model->get_lokasi();
		$this->load->view('section_header');
		$this->load->view('lokasi_view', $this->data);
		$this->load->view('section_footer');			
	}
	
	public function insert(){
		if(isset($_POST['submit'])){
			$this->data['insert'] = array(
				'NAMA_LOKASI' => $_POST['nama_lokasi'],
			);
			$this->lokasi_model->insert_lokasi($this->data['insert']);			
			redirect('lokasi/');
		}else{
			$this->load->view('section_header');
			$this->load->view('lokasi_form');
			$this->load->view('section_footer');			
		}
	}

	public function update_status($id=null){
		if($id != null){
			$filter = array();
			$filter[] = "ID = ". $id;
			
			$result = $this->lokasi_model->get_lokasi($filter);
			if($result != null){
				foreach($result as $item){
					$status = $item->STATUS_LOKASI;
				}
				if($status == '1'){
					$new_status = '0';
				}else if($status == '0'){
					$new_status = '1';
				}
				$this->lokasi_model->update_lokasi($new_status, $id);
				redirect('lokasi/');
			}
		}
		
	}

	public function delete($id=null){
		
	}
}


