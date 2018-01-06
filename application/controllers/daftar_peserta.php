<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class daftar_peserta extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_welcome');
	}

	function index(){
		// $data['periode'] = 'ini usernya lohh';
		$data['periode'] = $this->m_welcome->ambil_data_periode();
		$data['pendaftar'] = $this->m_welcome->ambil_data_pendaftar_user($this->session->id);
		$this->load->view("template/template", array("isi"=>"template/user_daftar","data"=>$data));
		//$this->load->view("template/admin_users", $data);
	}

	function daftar_periode($id_periode) {
		$jumlah_pendaftar = $this->m_welcome->ambil_jumlah_pendaftar($id_periode);
		// echo $jumlah_pendaftar;
		if ($jumlah_pendaftar < 25) {
			$this->m_welcome->daftar_periode($this->session->id, $id_periode, null);

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

		$this->m_welcome->tambah_periode($periode);

		redirect(base_url("daftar_peserta"));		
	}
	function ubah_periode($id) {
		$data['periode'] = $this->m_welcome->ambil_periode_id($id);
		// var_dump($data['periode']);
		$this->load->view("periode/ubah", $data);
	}
function aksi_ubah_periode() {
		$tanggal = $this->input->post('periode');
		$id_periode = $this->input->post('id_periode');

		$this->m_welcome->ubah_periode($tanggal, $id_periode);

		redirect(base_url("daftar_peserta"));		
	}
	function hapus_periode($id) {
		$this->m_welcome->hapus_periode($id);

		redirect(base_url("daftar_peserta"));

		}
function upload_bukti_pendaftar_ktp($id_pendaftar) {
		$data['id_pendaftar'] = $id_pendaftar;
		$this->load->view("upload/ktp", $data);
	}

	function aksi_upload_bukti_ktp(){
		if ($_FILES['file']['size']==0) {
			redirect(base_url('validasi/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar") . '?file_kosong=1'));	
		}
		
			$ekstensi_diperbolehkan	= array('jpg','png','bmp');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			//awal
			//tengah
			//akhir
			//end() -> akhir
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5242880){			
					if(move_uploaded_file($file_tmp, 'uploads/bukti_ktp/'.$this->input->post('id_pendaftar').'.jpg')){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						// echo 'GAGAL MENGUPLOAD FILE';
						redirect(base_url('validasi/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar") . '?upload_gagal=1'));	
					}
				}else{
						// echo 'UKURAN FILE TERLALU BESAR';
						redirect(base_url('validasi/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar") . '?file_kebesaran=1'));	
				}
			}else{
						// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
						redirect(base_url('validasi/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar") . '?ekstensi_salah=1'));	
			}

		redirect(base_url('validasi/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar")));	
	}


	function upload_bukti_pendaftar_kwitansi($id_pendaftar) {
		$data['id_pendaftar'] = $id_pendaftar;
		$this->load->view("upload/kwitansi", $data);
	}

	function aksi_upload_bukti_kwitansi(){
		if ($_FILES['file']['size']==0) {
			redirect(base_url('validasi/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar") . '?file_kosong=1'));	
		}
		
			$ekstensi_diperbolehkan	= array('jpg','png','bmp');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			//awal
			//tengah
			//akhir
			//end() -> akhir
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5242880){			
					if(move_uploaded_file($file_tmp, 'uploads/bukti_kwitansi/'.$this->input->post('id_pendaftar').'.jpg')){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						// echo 'GAGAL MENGUPLOAD FILE';
						redirect(base_url('validasi/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar") . '?upload_gagal=1'));	
					}
				}else{
						// echo 'UKURAN FILE TERLALU BESAR';
						redirect(base_url('validasi/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar") . '?file_kebesaran=1'));	
				}
			}else{
						// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
						redirect(base_url('validasi/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar") . '?ekstensi_salah=1'));	
			}

		redirect(base_url('validasi/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar")));	
	}
	function tunggu_pendaftar($id_pendaftar) {
		$this->m_welcome->tunggu_pendaftar($id_pendaftar);

		redirect(base_url('daftar_peserta'));		
	}

	function terima_pendaftar($id_pendaftar) {
		$id_periode = $this->m_welcome->ambil_id_periode_dari_id_pendaftar($id_pendaftar);
		$jumlah_pendaftar = $this->m_welcome->ambil_jumlah_pendaftar($id_periode);
		// echo $jumlah_pendaftar;
		if ($jumlah_pendaftar < 25) {
			$this->m_validasi->terima_pendaftar($id_pendaftar);

			redirect(base_url('daftar_peserta'));		
		} else {
			redirect(base_url("?error=jumlah_pendaftar"));		
		}
	}

	function tolak_pendaftar($id_pendaftar) {
		$this->m_welcome->tolak_pendaftar($id_pendaftar);

		redirect(base_url('daftar_peserta'));		

}

}
