<?php
class M_welcome extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}
	
	function ambil_data_pemberitahuan(){
		$sql = "SELECT * 
				FROM pemberitahuan";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}