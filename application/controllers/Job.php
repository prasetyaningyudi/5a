<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {
	private $data;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
		$this->load->model('job_model');
		$this->load->model('lowongan_model');
		$this->load->model('lokasi_model');
	}

	public function index(){		

	}
	
	public function application(){
		if(isset($_POST['submit'])){
			date_default_timezone_set("Asia/Jakarta");
			
			$file_name1 = date('Y-m-d-h-i-sa').'_'.$_FILES['cv']['name'];
			$file_size =$_FILES['cv']['size'];
			$file_tmp =$_FILES['cv']['tmp_name'];
			$file_type=$_FILES['cv']['type'];
			move_uploaded_file($file_tmp, FCPATH . "assets/files/".$file_name1);
			$link_cv = base_url()."assets/files/".$file_name1;
			
			$file_name2 = date('Y-m-d-h-i-sa').'_'.$_FILES['photo']['name'];
			$file_size =$_FILES['photo']['size'];
			$file_tmp =$_FILES['photo']['tmp_name'];
			$file_type=$_FILES['photo']['type'];			
			move_uploaded_file($file_tmp, FCPATH . "assets/images/".$file_name2);
			$link_photo = base_url()."assets/images/".$file_name2;

			if(isset($_POST['cek_1'])){
				$cek_1 = $_POST['cek_1'];
			}else{
				$cek_1 = 'off';
			}
			if(isset($_POST['cek_2'])){
				$cek_2 = $_POST['cek_2'];
			}else{
				$cek_2 = 'off';
			}
			if(isset($_POST['cek_3'])){
				$cek_3 = $_POST['cek_3'];
			}else{
				$cek_3 = 'off';
			}
			if(isset($_POST['cek_4'])){
				$cek_4 = $_POST['cek_4'];
			}else{
				$cek_4 = 'off';
			}			
			$this->data['insert1'] = array(
				'NAMA' => $_POST['nama'],
				'TELEPON' => $_POST['telepon'],
				'EMAIL' => $_POST['email'],
				'ALAMAT' => $_POST['alamat'],
				'JENIS_KELAMIN' => $_POST['jenis_kelamin'],
				'TEMPAT_LAHIR' => $_POST['tempat_lahir'],
				'TANGGAL_LAHIR' => $_POST['tanggal_lahir'],
				'STATUS_PERNIKAHAN' => $_POST['status'],
				'CEK_1' => $cek_1,
				'CEK_2' => $cek_2,
				'CEK_3' => $cek_3,
				'CEK_4' => $cek_4,
				'LINK_CV' => $link_cv,
				'LINK_PHOTO' => $link_photo,
				'LOWONGAN_ID' => $_POST['posisi_lowongan'],
				'LOKASI_TES_ID' => $_POST['lokasi_tes'],
			);	

			$last_id = $this->job_model->insert_pelamar($this->data['insert1']);
			//var_dump($this->data['insert1']);echo '<br>';
			
			$this->data['insert2'] = array(
				'TINGKAT' => $_POST['tingkat'],
				'UNIVERSITAS' => $_POST['universitas'],
				'FAKULTAS' => $_POST['fakultas'],
				'JURUSAN' => $_POST['jurusan'],
				'IPK' => $_POST['ipk'],
				'AWAL_PENDIDIKAN' => $_POST['awal_pendidikan'],
				'AKHIR_PENDIDIKAN' => $_POST['akhir_pendidikan'],
				'PELAMAR_ID' => $last_id,
			);
			$this->job_model->insert_pendidikan($this->data['insert2']);
			//var_dump($this->data['insert2']);echo '<br>';	

			if($_POST['perusahaan'] != ''){		
				$this->data['insert3'] = array(
					'NAMA_PERUSAHAAN' => $_POST['perusahaan'],
					'POSISI' => $_POST['posisi'],
					'AWAL_KERJA' => $_POST['awal_kerja'],
					'AKHIR_KERJA' => $_POST['akhir_kerja'],
					'PELAMAR_ID' => $last_id,
				);
				$this->job_model->insert_pengalaman($this->data['insert3']);
				//var_dump($this->data['insert3']);echo '<br>';
			}
			
			redirect('job/applicant/'.$last_id);
		}else{
			$filter = array();
			$filter1 = array();
			$filter[] = "STATUS_POSISI = '1'";
			$filter1[] = "STATUS_LOKASI = '1'";
			$this->data['result'] = $this->lowongan_model->get_lowongan($filter);
			$this->data['result1'] = $this->lokasi_model->get_lokasi($filter1);
			
			$this->load->view('section_header');
			$this->load->view('application_form', $this->data);
			$this->load->view('section_footer');			
		}
	}
	
	public function applicant($id=null){
		if($id != null){
			$filter = array();
			$filter[] = "A.ID = ".$id;
			$this->data['result'] = $this->job_model->get_pelamar($filter);
			
			$this->load->view('section_header');
			$this->load->view('applicant_view', $this->data);
			$this->load->view('section_footer');			
		}else{
			$this->data['result'] = $this->job_model->get_pelamar();
			$this->load->view('section_header');
			$this->load->view('applicant_all_view', $this->data);
			$this->load->view('section_footer');			
		}
			
	}

	public function update($id=null){

	}

	public function delete($id=null){
		
	}
}


