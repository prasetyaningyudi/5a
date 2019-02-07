<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {
	
	private $_table1 = "pelamar";
	private $_table2 = "pendidikan";
	private $_table3 = "pengalaman_kerja";
	private $_table4 = "lowongan";
	private $_table5 = "lokasi_tes";

    public function __construct(){
		parent::__construct();
    }

/* 	public function get_user($filters=null){
		$sql = "SELECT * FROM " . $this->_table1;
		$sql .= " WHERE 1=1";
		if(isset($filters)){
			foreach ($filters as $filter) {
				$sql .= " AND " . $filter;
			}
		}
		$sql .= " ORDER BY ID ASC";
		//var_dump($sql); die;
		
		$query = $this->db->query($sql);
		$result = $query->result();
		//var_dump($result); die;		
		return $result;	
	} */
	
	public function insert_pelamar($data){
		$this->db->insert($this->_table1, $data);
		return $this->db->insert_id();
	}
	
	public function insert_pendidikan($data){
		$this->db->insert($this->_table2, $data);
		return $this->db->insert_id();
	}
	
	public function insert_pengalaman($data){
		$this->db->insert($this->_table3, $data);
		return $this->db->insert_id();		
	}
	
	public function get_pelamar($filters=null, $limit=null){
		$sql = "SELECT A.*, B.TINGKAT, B.UNIVERSITAS, B.FAKULTAS, B.JURUSAN, B.IPK, B.AWAL_PENDIDIKAN, B.AKHIR_PENDIDIKAN, B.PELAMAR_ID, C.NAMA_PERUSAHAAN, 
				C.POSISI, C.AWAL_KERJA, C.AKHIR_KERJA, C.PELAMAR_ID, D.POSISI_LOWONGAN, E.NAMA_LOKASI FROM " . $this->_table1 . " A LEFT JOIN " . 
				$this->_table2 . " B ON A.ID=B.PELAMAR_ID LEFT JOIN " . $this->_table3 . " C ON A.ID= C.PELAMAR_ID LEFT JOIN " . $this->_table4 . " D ON A.LOWONGAN_ID=D.ID LEFT JOIN " . $this->_table5 . " E ON A.LOKASI_TES_ID=E.ID ";
		$sql .= " WHERE 1=1 ";
		if(isset($filters) and $filters != null){
			foreach ($filters as $filter) {
				$sql .= " AND " . $filter;
			}
		}
		$sql .= " ORDER BY A.ID DESC";
		if(isset($limit) and $limit != null){
			$sql .= " LIMIT ".$limit[0]." OFFSET ".$limit[1];
		}		
		//var_dump($sql); die;
		
		$query = $this->db->query($sql);
		$result = $query->result();
		//var_dump($result); die;		
		return $result;			
	}
	
	public function get_pelamar_download($filters=null, $limit=null){
		$sql = "SELECT A.ID, A.NAMA, A.TELEPON, A.EMAIL, A.ALAMAT, A.JENIS_KELAMIN, A.TEMPAT_LAHIR, A.TANGGAL_LAHIR, A.STATUS_PERNIKAHAN, A.CEK_1, A.CEK_2, A.CEK_3, A.CEK_4, A.LINK_CV, A.LINK_PHOTO, A.LINK_IJAZAH, A.LINK_TRANSKRIP, A.CREATE_DATE, B.TINGKAT TINGKAT_PENDIDIKAN, B.UNIVERSITAS, B.FAKULTAS, B.JURUSAN, B.IPK, B.AWAL_PENDIDIKAN, B.AKHIR_PENDIDIKAN, C.NAMA_PERUSAHAAN, C.POSISI, C.AWAL_KERJA, C.AKHIR_KERJA, D.POSISI_LOWONGAN, E.NAMA_LOKASI FROM " . $this->_table1 . " A LEFT JOIN " . 
				$this->_table2 . " B ON A.ID=B.PELAMAR_ID LEFT JOIN " . $this->_table3 . " C ON A.ID= C.PELAMAR_ID LEFT JOIN " . $this->_table4 . " D ON A.LOWONGAN_ID=D.ID LEFT JOIN " . $this->_table5 . " E ON A.LOKASI_TES_ID=E.ID ";
		$sql .= " WHERE 1=1 ";
		if(isset($filters) and $filters != null){
			foreach ($filters as $filter) {
				$sql .= " AND " . $filter;
			}
		}
		$sql .= " ORDER BY A.ID DESC";
		if(isset($limit) and $limit != null){
			$sql .= " LIMIT ".$limit[0]." OFFSET ".$limit[1];
		}			
		//var_dump($sql); die;
		
		$query = $this->db->query($sql);
		$result = $query->result();
		//var_dump($result); die;		
		return $result;			
	}	
}