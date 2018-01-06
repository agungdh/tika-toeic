<?php
class M_tambah_pemberitahuan extends CI_Model{	
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

	function ambil_pemberitahuan_id($id){
		$sql = "SELECT * 
				FROM pemberitahuan
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$row = $query->row();
		return $row;
	}

function ubah_pemberitahuan($isi, $id_pemberitahuan){
		$sql = "UPDATE pemberitahuan
				SET isi = ?
				WHERE id_pemberitahuan = ?";
		$this->db->query($sql, array($isi, $id_pemberitahuan));
	}
	
	}
?>