<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	private $_table1 = "USER";

    public function __construct(){
		parent::__construct();
    }

	public function get_user($filters=null){
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
	}
}