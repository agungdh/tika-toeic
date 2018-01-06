<?php
class M_welcome extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_data_pemberitahuan2($id){
		$sql = "SELECT * 
				FROM pemberitahuan
				WHERE id_pemberitahuan = ?";
		$query = $this->db->query($sql, array($id));
		$row = $query->row();
		return $row;
	}

	public function tampil_pemberitahuan()
	{
		return $this->db->get('pemberitahuan');
	}
	
	function ambil_data_pemberitahuan(){
		$sql = "SELECT * 
				FROM pemberitahuan";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
	function ambil_data_user(){
		$sql = "SELECT * 
				FROM user";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}

	function ambil_data_periode(){
		$sql = "SELECT *
				FROM periode";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}

	function ambil_data_pendaftar(){
		$sql = "SELECT pn.id, pn.id_periode, pn.id_user, pn.status, u.username, u.nama, u.level, pr.tanggal
				FROM pendaftaran pn, periode pr, user u
				WHERE pn.id_periode = pr.id
				AND pn.id_user = u.id
				ORDER BY pn.id DESC";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
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

	function ambil_jumlah_pendaftar($id_periode){
		$sql = "SELECT count(*) hasil FROM pendaftaran
				WHERE id_periode = ?
				AND status = 1";
		$query = $this->db->query($sql, array($id_periode));
		$row = $query->row();
		return $row->hasil;
	}

	function ambil_user_id($id){
		$sql = "SELECT * 
				FROM user
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$row = $query->row();
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

	function ambil_periode_id($id){
		$sql = "SELECT * 
				FROM periode
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$row = $query->row();
		return $row;
	}

	function hapus_user($id){
		$sql = "DELETE FROM user
				WHERE id = ?";
		$this->db->query($sql, array($id));
	}

	function daftar_periode($id_user, $id_periode, $status){
		$sql = "INSERT INTO pendaftaran
				SET id_user = ?,
				id_periode = ?,
				status = ?";
		$this->db->query($sql, array($id_user, $id_periode, $status));
	}

	function hapus_periode($id){
		$sql = "DELETE FROM periode
				WHERE id = ?";
		$this->db->query($sql, array($id));
	}

	function tambah_user($username, $password, $nama, $level){
		$sql = "INSERT INTO user
				SET username = ?,
				password = ?,
				nama = ?,
				level = ?";
		$this->db->query($sql, array($username, $password, $nama, $level));
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

	function ubah_user($nama, $npm, $kontak, $id_user){
		$sql = "UPDATE user
				SET nama = ?,
				npm = ?,
				kontak = ?
				WHERE id = ?";
		$this->db->query($sql, array($nama, $npm, $kontak, $id_user));
	}

	function ubah_password($password, $id_user){
		$sql = "UPDATE user
				SET password = ?
				WHERE id = ?";
		$this->db->query($sql, array($password, $id_user));
	}

	function ubah_periode($tanggal, $id_periode){
		$sql = "UPDATE periode
				SET tanggal = ?
				WHERE id = ?";
		$this->db->query($sql, array($tanggal, $id_periode));
	}
	function ubah_pemberitahuan($isi, $id_pemberitahuan){
		$sql = "UPDATE pemberitahuan
				SET isi = ?
				WHERE id_pemberitahuan = ?";
		$this->db->query($sql, array($isi, $id_pemberitahuan));
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
