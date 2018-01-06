<?php
class M_periode extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

function ambil_data_periode(){
		$sql = "SELECT *
				FROM periode";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}

	function ambil_periode_id($id){
		$sql = "SELECT * 
				FROM periode
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$row = $query->row();
		return $row;

	}
	function ambil_jumlah_pendaftar($id_periode){
		$sql = "SELECT count(*) hasil FROM pendaftaran
				WHERE id_periode = ?
				AND status = 1";
		$query = $this->db->query($sql, array($id_periode));
		$row = $query->row();
		return $row->hasil;
	}
	function daftar_periode($id_user, $id_periode, $status){
		$sql = "INSERT INTO pendaftaran
				SET id_user = ?,
				id_periode = ?,
				status = ?";
		$this->db->query($sql, array($id_user, $id_periode, $status));
	}

	function hapus_periode($id_periode){
		$sql = "DELETE FROM pendaftaran
				WHERE id_periode = ?";
		$this->db->query($sql, array($id_periode));

		$sql = "DELETE FROM periode
				WHERE id = ?";
		$this->db->query($sql, array($id_periode));

		
	}

	
	function ambil_id_periode_dari_id_pendaftar($id_pendaftar){
		$sql = "SELECT id_periode
				FROM pendaftaran
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_pendaftar));
		$row = $query->row();
		return $row->id_periode;
	}

	function tambah_periode($periode){
		$sql = "INSERT INTO periode
				SET tanggal = ?";
		$this->db->query($sql, array($periode));
	}
	function ubah_periode($tanggal, $id_periode){
		$sql = "UPDATE periode
				SET tanggal = ?
				WHERE id = ?";
		$this->db->query($sql, array($tanggal, $id_periode));
	}

}