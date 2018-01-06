<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uploadnilai extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_uploadnilai');
	}

	function index(){
		$data['periode'] = $this->m_uploadnilai->ambilPeriode();
		$this->load->view("template/template", array("isi"=>"template/uploadnilai","data"=>$data));
	}

		function upload(){
		if ($_FILES['file']['size']==0) {
			redirect(base_url('uploadnilai?file_kosong=1'));	
		}
		
			$ekstensi_diperbolehkan	= array('pdf');
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
					if(move_uploaded_file($file_tmp, 'uploads/nilai/'.$this->input->post('periode').'.pdf')){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						// echo 'GAGAL MENGUPLOAD FILE';
						redirect(base_url('uploadnilai?upload_gagal=1'));	
					}
				}else{
						// echo 'UKURAN FILE TERLALU BESAR';
						redirect(base_url('uploadnilai?file_kebesaran=1'));	
				}
			}else{
						// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
						redirect(base_url('uploadnilai?ekstensi_salah=1'));	
			}

		redirect(base_url('uploadnilai'));	
	}

}