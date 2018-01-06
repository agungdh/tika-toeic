<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_register');
	}

	function index() {
		$this->load->view('template/register');
	}

	function aksi()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$npm = $this->input->post('npm');
		$kontak = $this->input->post('kontak');
		$level = 1;

		// echo $username . "<br>";
		// echo $password . "<br>";
		// echo $nama . "<br>";
		// echo $email . "<br>";
		// echo $level . "<br>";

		$this->m_register->daftar($username, $password, $nama, $npm, $kontak, $level);

		redirect(base_url("?register=1"));
	}

}
