<?php 
if ($this->input->get('error') == 1) {
?>
<script type="text/javascript">
	alert('Password Tidak Sama !!!');
</script>
<?php
}
?>

<?php 
if ($this->input->get('error') == 2) {
?>
<script type="text/javascript">
	alert('Ada Data Kosong !!!');
</script>
<?php
}
?>

<form action="<?php echo base_url('welcome/aksi_ubah_password') ?>" method="post">
	<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
	Password : <input type="password" name="password"><br>
	Ulangi Password : <input type="password" name="ulang_password"><br>
	<input type="submit" name="submit" value="Submit">
</form>