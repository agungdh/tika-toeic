<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peserta extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_validasi');
	}

	function index(){
		// $data['periode'] = 'ini usernya lohh';
		//$data['pendaftar'] = $this->m_validasi->ambil_data_pendaftar();
		//$this->load->view("template/v_validasi", $data);
		$data['pendaftar'] = $this->m_validasi->ambil_data_pendaftar('where status = 1');
		$this->load->view("template/template", array("isi"=>"template/v_peserta","data"=>$data));
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
		$this->m_validasi->tunggu_pendaftar($id_pendaftar);

		redirect(base_url('validasi'));		
	}

	function terima_pendaftar($id_pendaftar) {
		$id_periode = $this->m_validasi->ambil_id_periode_dari_id_pendaftar($id_pendaftar);
		$jumlah_pendaftar = $this->m_validasi->ambil_jumlah_pendaftar($id_periode);
		// echo $jumlah_pendaftar;
		if ($jumlah_pendaftar < 25) {
			$this->m_validasi->terima_pendaftar($id_pendaftar);

			redirect(base_url('validasi'));		
		} else {
			redirect(base_url("?error=jumlah_pendaftar"));		
		}
	}

	function tolak_pendaftar($id_pendaftar) {
		$this->m_validasi->tolak_pendaftar($id_pendaftar);

		redirect(base_url('validasi'));		
	}
}