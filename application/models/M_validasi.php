<?php
class M_validasi extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}
	function ambil_data_pendaftar(){
		$sql = "SELECT pn.id, pn.id_periode, pn.id_user, pn.status, u.npm, u.nama, u.level, pr.tanggal
				FROM pendaftaran pn, periode pr, user u
				WHERE pn.id_periode = pr.id
				AND pn.id_user = u.id
				ORDER BY pn.id DESC";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}

	function ambil_data_pendaftar_user($id_user){
		$sql = "SELECT pn.id, pn.id_periode, pn.id_user, pn.status, u.npm, u.nama, u.level, pr.tanggal
				FROM pendaftaran pn, periode pr, user u
				WHERE pn.id_periode = pr.id
				AND pn.id_user = u.id
				AND pn.id_user = ?
				ORDER BY pn.id DESC";
		$query = $this->db->query($sql, array($id_user));
		$row = $query->result();
		return $row;
	}
	function ambil_id_periode_dari_id_pendaftar($id_pendaftar){
		$sql = "SELECT id_periode
				FROM pendaftaran
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_pendaftar));
		$row = $query->row();
		return $row->id_periode;
	}
	function ambil_jumlah_pendaftar($id_periode){
		$sql = "SELECT count(*) hasil FROM pendaftaran
				WHERE id_periode = ?
				AND status = 1";
		$query = $this->db->query($sql, array($id_periode));
		$row = $query->row();
		return $row->hasil;
	}
	function terima_pendaftar($id_pendaftar){
		$sql = "UPDATE pendaftaran
				SET status = 1
				WHERE id = ?";
		$this->db->query($sql, array($id_pendaftar));
	}

	function tolak_pendaftar($id_pendaftar){
		$sql = "UPDATE pendaftaran
				SET status = 0
				WHERE id = ?";
		$this->db->query($sql, array($id_pendaftar));
	}

	function tunggu_pendaftar($id_pendaftar){
		$sql = "UPDATE pendaftaran
				SET status = null
				WHERE id = ?";
		$this->db->query($sql, array($id_pendaftar));
	}


}
?>
