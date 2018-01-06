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
        <p class="login-box-msg">Tambah User</p>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue> TAMBAH USER TEST TOEIC LAB BAHASA POLINELA </font></strong></h4></font></strong></h4>

<form method="post" action="<?php echo base_url("user/aksi_tambah_user"); ?>">
	Username : <input type="text" name="username"><br>
	Password : <input type="password" name="password"><br>
	Nama : <input type="text" name="nama"><br>
	Kontak : <input type="text" name="kontak"><br>
	<a href="<?php echo base_url("user"); ?>">Kembali</a>
	<input type="submit" name="submit" value="Submit">
</form>