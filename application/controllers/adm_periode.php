<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adm_periode extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_periode');
	}

	function test(){
		$this->m_periode->tikuspesek();
	}

	function index(){
		// $data['periode'] = 'ini usernya lohh';
		//$data['periode'] = $this->m_periode->ambil_data_periode();
		//$this->load->view("template/admin_periode", $data);
		$data['periode'] = $this->m_periode->ambil_data_periode();
		$this->load->view("template/template", array("isi"=>"template/admin_periode","data"=>$data));
	}

	function daftar_periode($id_periode) {
		$jumlah_pendaftar = $this->m_periode->ambil_jumlah_pendaftar($id_periode);
		// echo $jumlah_pendaftar;
		if ($jumlah_pendaftar < 25) {
			$this->m_periode->daftar_periode($this->session->id, $id_periode, null);

			redirect(base_url());		
		} else {
			redirect(base_url("?error=jumlah_pendaftar"));		
		}
	}

	function tambah_periode() {
		$this->load->view("periode/tambah");
	}

	function aksi_tambah_periode() {
		$periode = $this->input->post('periode');

		$this->m_periode->tambah_periode($periode);

		redirect(base_url("adm_periode"));		
	}
	function ubah_periode($id) {
		$data['periode'] = $this->m_periode->ambil_periode_id($id);
		// var_dump($data['periode']);
		$this->load->view("periode/ubah", $data);
	}
function aksi_ubah_periode() {
		$tanggal = $this->input->post('periode');
		$id_periode = $this->input->post('id_periode');

		$this->m_periode->ubah_periode($tanggal, $id_periode);

		redirect(base_url("adm_periode"));		
	}
	function hapus_periode($id) {
		$this->m_periode->hapus_periode($id);

		redirect(base_url("adm_periode"));

}
}