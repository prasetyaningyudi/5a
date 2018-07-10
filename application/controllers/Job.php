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
		if(isset($_POST['submit'])){
			var_dump($_POST['nama']);echo"<br>";
			var_dump($_POST['telepon']);echo"<br>";
			var_dump($_POST['alamat']);echo"<br>";
			var_dump($_POST['jenis_kelamin']);echo"<br>";
			var_dump($_POST['tempat_lahir']);echo"<br>";
			var_dump($_POST['tanggal_lahir']);echo"<br>";
			var_dump($_POST['status']);echo"<br>";
			var_dump($_FILES['cv']);echo"<br>";
			var_dump($_FILES['photo']);echo"<br>";
			var_dump($_POST['tingkat']);echo"<br>";
			var_dump($_POST['jurusan']);echo"<br>";
			var_dump($_POST['awal_pendidikan']);echo"<br>";
			var_dump($_POST['akhir_pendidikan']);echo"<br>";
			if(isset($_POST['cek_1'])){
				var_dump($_POST['cek_1']);echo"<br>";
			}
			if(isset($_POST['cek_2'])){
				var_dump($_POST['cek_2']);echo"<br>";
			}
			if(isset($_POST['cek_3'])){
				var_dump($_POST['cek_3']);echo"<br>";
			}
			if(isset($_POST['cek_4'])){
				var_dump($_POST['cek_4']);echo"<br>";
			}
			var_dump($_POST['submit']);echo"<br>";
		}else{
			$this->load->view('section_header');
			$this->load->view('application_form');
			$this->load->view('section_footer');			
		}
	}

	public function update($id=null){

	}

	public function delete($id=null){
		
	}
}


