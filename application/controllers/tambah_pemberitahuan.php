<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_pemberitahuan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_tambah_pemberitahuan');
		$this->load->model('m_welcome');
	}

	function ubah_pemberitahuan($id) {
		$data['pemberitahuan'] = $this->m_welcome->ambil_data_pemberitahuan2($id);
		$this->load->view("template/ubah_pemberitahuan", $data);
	}

	function aksi_ubah_pemberitahuan() {
		$isi = $this->input->post('isi');
		$id_pemberitahuan = $this->input->post('id_pemberitahuan');

		$this->m_welcome->ubah_pemberitahuan($isi, $id_pemberitahuan);

		redirect(base_url());		
	}
}
?>