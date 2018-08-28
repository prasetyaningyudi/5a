<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {
	
	private $_table1 = "lokasi_tes";

    public function __construct(){
		parent::__construct();
    }

	public function get_lokasi($filters=null){
		$sql = "SELECT * FROM " . $this->_table1;
		$sql .= " WHERE 1=1";
		if(isset($filters) and $filters != null){
			foreach ($filters as $filter) {
				$sql .= " AND " . $filter;
			}
		}
		$sql .= " ORDER BY NAMA_LOKASI ASC";
		//var_dump($sql); die;
		
		$query = $this->db->query($sql);
		$result = $query->result();
		//var_dump($result); die;		
		return $result;	
	}
	
	public function insert_lokasi($data){
		$this->db->insert($this->_table1, $data);
		return $this->db->insert_id();
	}
	
	public function update_lokasi($data, $id){
		//var_dump($data);die;
		$this->db->set('STATUS_LOKASI', $data);
		$this->db->where('ID', $id);
		$this->db->update($this->_table1);
	}
	
}