<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_welcome');
	}

	function index()
	{		
		if ($this->session->login != true) {
			$this->load->view("template/halaman_login");
		} else {
			switch ($this->session->level) {
				case 0:
					$data['user'] = $this->m_welcome->ambil_data_user();
					$data['periode'] = $this->m_welcome->ambil_data_periode();
					$data['pendaftar'] = $this->m_welcome->ambil_data_pendaftar();
					$data['pemberitahuan'] = $this->m_welcome->ambil_data_pemberitahuan();
					//$this->load->view("template/admin_home", $data);
					$this->load->view("template/template", array("isi"=>"template/halaman_utama","data"=>$data));		
					break;
				
				case 1:
					$data['periode'] = $this->m_welcome->ambil_data_periode();
					$data['pendaftar'] = $this->m_welcome->ambil_data_pendaftar_user($this->session->id);
					//$this->load->view("template/user_home", $data);

					$data['pemberitahuan_peserta'] = $this->m_welcome->ambil_data_pemberitahuan();
					$this->load->view("template/template", array("isi"=>"template/halaman_utama_peserta","data"=>$data));		
					// var_dump($data['pendaftaran']);
					break;
								
				default:
					redirect(base_url('logout'));
					break;
			}
		}
	}

	function tambah_user() {
		$this->load->view("user/tambah");
	}

	function upload_bukti_pendaftar_ktp($id_pendaftar) {
		$data['id_pendaftar'] = $id_pendaftar;
		$this->load->view("upload/ktp", $data);
	}

	function aksi_upload_bukti_ktp(){
		if ($_FILES['file']['size']==0) {
			redirect(base_url('welcome/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar") . '?file_kosong=1'));	
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
						redirect(base_url('welcome/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar") . '?upload_gagal=1'));	
					}
				}else{
						// echo 'UKURAN FILE TERLALU BESAR';
						redirect(base_url('welcome/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar") . '?file_kebesaran=1'));	
				}
			}else{
						// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
						redirect(base_url('welcome/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar") . '?ekstensi_salah=1'));	
			}

		redirect(base_url('welcome/upload_bukti_pendaftar_ktp/' . $this->input->post("id_pendaftar")));	
	}


	function upload_bukti_pendaftar_kwitansi($id_pendaftar) {
		$data['id_pendaftar'] = $id_pendaftar;
		$this->load->view("upload/kwitansi", $data);
	}

	function aksi_upload_bukti_kwitansi(){
		if ($_FILES['file']['size']==0) {
			redirect(base_url('welcome/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar") . '?file_kosong=1'));	
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
						redirect(base_url('welcome/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar") . '?upload_gagal=1'));	
					}
				}else{
						// echo 'UKURAN FILE TERLALU BESAR';
						redirect(base_url('welcome/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar") . '?file_kebesaran=1'));	
				}
			}else{
						// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
						redirect(base_url('welcome/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar") . '?ekstensi_salah=1'));	
			}

		redirect(base_url('welcome/upload_bukti_pendaftar_kwitansi/' . $this->input->post("id_pendaftar")));	
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

	function aksi_tambah_user() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');

		$this->m_welcome->tambah_user($username, $password, $nama, 1);

		redirect(base_url());		
	}

	function tunggu_pendaftar($id_pendaftar) {
		$this->m_welcome->tunggu_pendaftar($id_pendaftar);

		redirect(base_url());		
	}

	function terima_pendaftar($id_pendaftar) {
		$id_periode = $this->m_welcome->ambil_id_periode_dari_id_pendaftar($id_pendaftar);
		$jumlah_pendaftar = $this->m_welcome->ambil_jumlah_pendaftar($id_periode);
		// echo $jumlah_pendaftar;
		if ($jumlah_pendaftar < 25) {
			$this->m_welcome->terima_pendaftar($id_pendaftar);

			redirect(base_url());		
		} else {
			redirect(base_url("?error=jumlah_pendaftar"));		
		}
	}

	function tolak_pendaftar($id_pendaftar) {
		$this->m_welcome->tolak_pendaftar($id_pendaftar);

		redirect(base_url());		
	}

	function tambah_periode() {
		$this->load->view("periode/tambah");
	}

	function aksi_tambah_periode() {
		$periode = $this->input->post('periode');

		$this->m_welcome->tambah_periode($periode);

		redirect(base_url());		
	}

	function ubah_user($id) {
		$data['user'] = $this->m_welcome->ambil_user_id($id);

		$this->load->view("template/ubah", $data);
	}

	function ubah_pemberitahuan($id) {
		$data['pemberitahuan'] = $this->m_welcome->tampil_pemberitahuan($id);
		$this->load->view("view/template/halaman_utama", $data);
	}

	

	function aksi_ubah_user() {
		$nama = $this->input->post('nama');
		$npm = $this->input->post('npm');
		$kontak = $this->input->post('kontak');
		$id_user = $this->input->post('id_user');

		 //echo  $id_user, $nama,$kontak, $npm;

		$this->m_welcome->ubah_user($nama, $npm, $kontak, $id_user);

		redirect(base_url('user'));		
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

		redirect(base_url());		
	}

	function hapus_user($id) {
		$this->m_welcome->hapus_user($id);

		redirect(base_url());
	}

	function hapus_periode($id) {
		$this->m_welcome->hapus_periode($id);

		redirect(base_url());
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
			redirect(base_url("welcome/ubah_password/".$id_user."?error=2"));	
		}

		if ($password != $ulang_password) {
			redirect(base_url("welcome/ubah_password/".$id_user."?error=1"));
		}

		$this->m_welcome->ubah_password(md5($password), $id_user);

		redirect(base_url());
	}


}
