<form enctype="multipart/form-data" action="<?php echo base_url("welcome/aksi_upload_bukti_ktp"); ?>" method="post">
	<input type="hidden" name="id_pendaftar" value="<?php echo $id_pendaftar ?>">
	<?php 
	if (file_exists("uploads/bukti_ktp/" . $id_pendaftar .".jpg")) {
		?>
		<a href="<?php echo base_url("uploads/bukti_ktp/" . $id_pendaftar . ".jpg"); ?>"><img height="200px" width="350px" src="<?php echo base_url("uploads/bukti_ktp/" . $id_pendaftar . ".jpg"); ?>"></a>
		<br>
		<?php
	}
	?>
	Gambar : <input type="file" name="file">
	<br>
	<input type="submit" name="submit" value="Submit">
</form>

<a href="<?php echo base_url(); ?>">Kembali</a>

<?php 
if ($this->input->get('file_kosong') == 1) {
  ?>
  <script type="text/javascript">
    alert('File kosong !!!');
  </script>
  <?php
}
?>

<?php 
if ($this->input->get('upload_gagal') == 1) {
  ?>
  <script type="text/javascript">
    alert('Upload gagal !!!');
  </script>
  <?php
}
?>

<?php 
if ($this->input->get('file_kebesaran') == 1) {
  ?>
  <script type="text/javascript">
    alert('Ukuran file terlalu besar !!!');
  </script>
  <?php
}
?>

<?php 
if ($this->input->get('ekstensi_salah') == 1) {
  ?>
  <script type="text/javascript">
    alert('Ekstensi file salah !!!');
  </script>
  <?php
}
?>
