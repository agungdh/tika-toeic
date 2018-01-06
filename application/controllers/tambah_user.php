<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_tambah_user');
	}

	function tambah_user() {
		$this->load->view("user/tambah");
	}
	}
	?>