<?php
class M_register extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function daftar($username, $password, $nama, $npm, $kontak, $level){
		$sql = "INSERT INTO user
				SET username = ?,
				password = ?,
				nama = ?,
				npm = ?,
				kontak = ?,
				level = ?";
		$this->db->query($sql, array($username, $password, $nama, $npm, $kontak, $level));
	}
}
?>