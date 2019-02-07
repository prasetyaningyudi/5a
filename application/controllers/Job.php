<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Job extends CI_Controller {
	private $data;
	private $_objPHPExcel;
	
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
			
			$file_name3 = date('Y-m-d-h-i-sa').'_'.$_FILES['ijazah']['name'];
			$file_size =$_FILES['ijazah']['size'];
			$file_tmp =$_FILES['ijazah']['tmp_name'];
			$file_type=$_FILES['ijazah']['type'];			
			move_uploaded_file($file_tmp, FCPATH . "assets/files/".$file_name3);
			$link_ijazah = base_url()."assets/files/".$file_name3;

			$file_name4 = date('Y-m-d-h-i-sa').'_'.$_FILES['transkrip']['name'];
			$file_size =$_FILES['transkrip']['size'];
			$file_tmp =$_FILES['transkrip']['tmp_name'];
			$file_type=$_FILES['transkrip']['type'];			
			move_uploaded_file($file_tmp, FCPATH . "assets/files/".$file_name4);
			$link_transkrip = base_url()."assets/files/".$file_name4;			

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
				'LINK_IJAZAH' => $link_ijazah,
				'LINK_TRANSKRIP' => $link_transkrip,
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
	
	public function applicant($id=null, $offset=null){
		if($offset == 'null' or $offset == null){
			$offset = '0';
		}
		$limit = array('1', $offset);
		if($id == 'null'){
			$id = null;
		}
		if($id != null){
			$filter = array();
			$filter[] = "A.ID = ".$id;
			$this->data['result'] = $this->job_model->get_pelamar($filter);
			
			$this->load->view('section_header');
			$this->load->view('applicant_view', $this->data);
			$this->load->view('section_footer');			
		}else{
			$this->data['result'] = $this->job_model->get_pelamar(null, $limit);
			$this->data['offset'] = $offset;
			$this->load->view('section_header');
			$this->load->view('applicant_all_view', $this->data);
			$this->load->view('section_footer');			
		}
			
	}

	public function download($offset=null){
		if($offset == null){
			$offset = '0';
		}
		$limit = array('1', $offset);		
		$data = $this->job_model->get_pelamar_download(null, $limit);
		$i = 0;
		$content = array();		
		$subbody = array();
		foreach ($data as $value) {
			foreach($value as $key => $val){
				if($i == 0){
					$subbody[]	= $key;
				}
			}
			$i++;				
			if($i > 0){
				break;
			}	
		}
		$content[] = $subbody;
		
		foreach ($data as $value) {
			$subbody = array();
			foreach($value as $val){
				$subbody[]	= $val;
			}
			$content[] = $subbody;
		}		
		PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
		$this->_objPHPExcel = new PHPExcel();
		$title = 'Data Pelamar';
		$titleXLS = $title.'.xlsx';
		$this->_objPHPExcel->getProperties()->setCreator("SITP - DJPBN - KEMENKEU")
									 ->setLastModifiedBy("SITP - DJPBN - KEMENKEU")
									 ->setTitle($title)
									 ->setSubject($title)
									 ->setDescription($title)
									 ->setKeywords("sitp omspan xls")
									 ->setCategory("sitp omspan xls");		

		//$pdf->set_html($this->set_pdf_header());
		
		
		//$this->set_html();

		// This method has several options
		$this->_objPHPExcel->setActiveSheetIndex(0);
		$this->_objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$this->_objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
		

		$this->placing_data($content);
		
		//Generate Output
		$objWriter = PHPExcel_IOFactory::createWriter($this->_objPHPExcel, "Excel2007");
		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition: attachment;filename=\"$titleXLS\"");
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($this->_objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;							 
	}
	
	public function placing_data($data){
		$this->_objPHPExcel->getActiveSheet()->setCellValue('A1', 'DATA PELAMAR');
		$cursor_a = 'A';
		$cursor_b = '3';
		
		foreach($data as $value){
			$current_cursor_a = $cursor_a;
			foreach($value as $val){
				$this->_objPHPExcel->getActiveSheet()->setCellValue($cursor_a++.$cursor_b, $val);
			}	
			$cursor_a = $current_cursor_a;
			$cursor_b++;
		}				
	}
}


