<?php 
if ($this->input->get('error') == 1) {
?>
<script type="text/javascript">
	alert('Login GAGAL !!!');
</script>
<?php
}
?>

<?php 
if ($this->input->get('register') == 1) {
?>
<script type="text/javascript">
	alert('Pendaftaran BERHASIL !!!');
</script>
<?php
}
?>

<form method="post" action="<?php echo base_url("login"); ?>">
	<h3>Login</h3>
	<br>
	Username : <input type="text" name="username">
	<br>
	Password : <input type="password" name="password">
	<br>
	<input type="submit" name="Submit" value="Submit">
</form>

<br>
<a href="<?php echo base_url("register") ?>">Register</a>