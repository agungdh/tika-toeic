<!DOCTYPE html>

<html>
  <head>

    <?php $this->load->view('template/meta'); ?>
  </head>

  <body class="hold-transition login-page">
   
    <div class="login-box">
     
      <div class="login-logo">
        <a><b>Update User</b></a>
        <br>
        <a href="<?php echo base_url(); ?>">Aplikasi Pendaftaran Test TOEIC <br> berbasis Web</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Isi Data</p>


<form method="post" action="<?php echo base_url("welcome/aksi_ubah_user"); ?>">     
<input type="hidden"
name="id_user" value="<?php echo $user->id; ?>">     Username : <input
readonly type="text" name="username" value="<?php echo $user->username;
?>"><br>     Nama : <input type="text" name="nama" value="<?php echo
$user->nama; ?>"><br>  
NPM : <input type="text" name="npm" value="<?php echo
$user->npm; ?>"><br>     Kontak : <input type="text" name="kontak"
value="<?php echo $user->kontak; ?>"><br>     <a href="<?php echo base_url();
?>">Kembali</a>     <a href="<?php echo
base_url("welcome/ubah_password/".$user->id); ?>">Ubah Password</a>     <input
type="submit" name="submit" value="Submit"> </form>
