<?php
class M_datapeserta extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

function ambilUserLulus(){
		$sql = "SELECT pn.id, pn.id_user, pn.id_periode, pn.status, pr.tanggal, u.nama, u.kontak, u.npm
				FROM pendaftaran pn, periode pr, user u
				WHERE status = 1
				AND pn.id_periode = pr.id
				AND pn.id_user = u.id";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}


}