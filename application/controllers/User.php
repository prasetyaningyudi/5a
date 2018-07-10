<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	private $data;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->helper('url');			
		$this->load->database();
	}

	public function index(){
		$this->load->model('user_model');
		$result = $this->user_model->get_user();
		foreach($result as $row){
			$a = $row->CREATE_DATE;
			$a = strtotime($a)-2*60*60;
			var_dump($a);
			$a = date("Y-m-d h:i:s A", $a);
			var_dump($a);
		}
		echo "<br>";

		date_default_timezone_set("Asia/Dhaka");
		echo date('d-m-Y h:i:s A');
		echo "<br>";
		date_default_timezone_set("Asia/Tokyo");
		echo date('d-m-Y h:i:s A');
		echo "<br>";
		
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML('<h1>Hello world!</h1>');
		$mpdf->Output();		

	}
	
	public function create(){

	}

	public function update($id=null){

	}

	public function delete($id=null){
		
	}
}


