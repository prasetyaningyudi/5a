<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {
	
	private $_table1 = "PELAMAR";
	private $_table2 = "PENDIDIKAN";
	private $_table3 = "PENGALAMAN_KERJA";

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
		$this->db->insert('PELAMAR', $data);
		return $this->db->insert_id();
	}
	
	public function insert_pendidikan($data){
		$this->db->insert('PENDIDIKAN', $data);
		return $this->db->insert_id();
	}
	
	public function insert_pengalaman($data){
		$this->db->insert('PENGALAMAN_KERJA', $data);
		return $this->db->insert_id();		
	}
}