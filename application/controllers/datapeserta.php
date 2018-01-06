<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapeserta extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_datapeserta');
	}

	function index(){
		$data['peserta'] = $this->m_datapeserta->ambilUserLulus();
		$this->load->view("template/template", array("isi"=>"template/datauser","data"=>$data));
	}

}