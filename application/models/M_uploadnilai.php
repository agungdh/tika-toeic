<?php
class M_uploadnilai extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

function ambilPeriode(){
		$sql = "SELECT *
				FROM periode";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}


}