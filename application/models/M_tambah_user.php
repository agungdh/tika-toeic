<?php
class M_welcome extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}
	
	function ambil_data_user(){
		$sql = "SELECT * 
				FROM user";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}

	function ambil_user_id($id){
		$sql = "SELECT * 
				FROM user
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$row = $query->row();
		return $row;
	}

function tambah_user($username, $password, $nama, $npm, $kontak, $level){
		$sql = "INSERT INTO user
				SET username = ?,
				password = ?,
				nama = ?,
				npm = ?,
				kontak = ?,
				level = ?";
		$this->db->query($sql, array($username, $password, $nama, $npm, $kontak, $level));
	}
	function ambil_data_pendaftar_user($id_user){
		$sql = "SELECT pn.id, pn.id_periode, pn.id_user, pn.status, u.username, u.nama, u.level, pr.tanggal
				FROM pendaftaran pn, periode pr, user u
				WHERE pn.id_periode = pr.id
				AND pn.id_user = u.id
				AND pn.id_user = ?
				ORDER BY pn.id DESC";
		$query = $this->db->query($sql, array($id_user));
		$row = $query->result();
		return $row;
	}
function hapus_user($id){
		$sql = "DELETE FROM user
				WHERE id = ?";
		$this->db->query($sql, array($id));
	}
function ubah_user($nama, $id_user){
		$sql = "UPDATE user
				SET nama = ?
				WHERE id = ?";
		$this->db->query($sql, array($nama, $id_user));
	}
		function ubah_password($password, $id_user){
		$sql = "UPDATE user
				SET password = ?
				WHERE id = ?";
		$this->db->query($sql, array($password, $id_user));
	}
	
	}
?>