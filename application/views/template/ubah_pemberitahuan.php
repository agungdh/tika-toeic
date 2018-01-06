<!DOCTYPE html>

<html>
  <head>

    <?php $this->load->view('template/meta'); ?>
  </head>

  <body class="hold-transition login-page">
   
    <div class="login-box">
     
      <div class="login-logo">
        <a><b>Update Pemberitahuan</b></a>
        <br>
        <a href="<?php echo base_url(); ?>">Aplikasi Pendaftaran Test TOEIC <br> berbasis Web</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Isi Pemberitahuan</p>
<form method="post" action="<?php echo base_url("Tambah_pemberitahuan/aksi_ubah_pemberitahuan"); ?>">
	id : <input readonly type="text" name="id_pemberitahuan" value="<?php echo $pemberitahuan->id_pemberitahuan; ?>"><br>

	Isi : <input type="text" name="isi" value="<?php echo $pemberitahuan->isi; ?>"><br>
	<a href="<?php echo base_url(); ?>">Kembali</a>
	<input type="submit" name="submit" value="Submit">
</form>