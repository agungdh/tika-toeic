<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_user');
	}

	function index(){
		// $data['periode'] = 'ini usernya lohh';
		$data['user'] = $this->m_user->ambil_data_user();
		$this->load->view("template/template", array("isi"=>"template/admin_users","data"=>$data));
		//$this->load->view("template/admin_users", $data);
	}

	function tambah_user(){

		$this->load->view("user/tambah");
	}

	function aksi_tambah_user() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');

		$this->m_user->tambah_user($username, $password, $nama, 0);

		redirect(base_url("user"));		
	}

	function hapus_user($id) {
		$this->m_user->hapus_user($id);

		redirect(base_url("user"));
	}
}
function ubah_user($id) {
		$data['user'] = $this->m_user->ambil_user_id($id);

		$this->load->view("user/ubah", $data);
	}
	function aksi_ubah_user($nama,$npm,$kontak,$id_user) {
		$nama = $this->input->post('nama');
		$npm = $this->input->post('npm');
		$kontak	 = $this->input->post('kontak');
		$id_user = $this->input->post('id_user');

		$this->m_user->ubah_user($nama, $npm, $kontak, $id_user);

		redirect(base_url("user"));		
	}

	function ubah_password($id) {
		$data['id_user'] = $id;
		$this->load->view("user/ubah_password", $data);	
	}

	function aksi_ubah_password() {
		$password = $this->input->post('password');
		$ulang_password = $this->input->post('ulang_password');
		$id_user = $this->input->post('id_user');

		if ($password == "" || $ulang_password == "" ) {
			redirect(base_url("user/ubah_password/".$id_user."?error=2"));	
		}

		if ($password != $ulang_password) {
			redirect(base_url("user/ubah_password/".$id_user."?error=1"));
		}

		$this->m_welcome->ubah_password(md5($password), $id_user);

		redirect(base_url("user"));
	}