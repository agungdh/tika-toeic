<!DOCTYPE html>

<html>
  <head>

    <?php $this->load->view('template/meta'); ?>
  </head>

  <body class="hold-transition login-page">
   
    <div class="login-box">
     
      <div class="login-logo">
        
        <br>
        <a href="<?php echo base_url(); ?>">Aplikasi Pendaftaran Test TOEIC <br> berbasis Web</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Tambah Periode</p>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue> TAMBAH PERIODE TEST TOEIC LAB BAHASA POLINELA </font></strong></h4></font></strong></h4>
<form method="post" action="<?php echo base_url('adm_periode/aksi_tambah_periode'); ?>">
	Periode : <input type="text" name="periode">
	<input type="submit" name="submit" value="Submit">
</form>