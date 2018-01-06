<form method="post" action="<?php echo base_url("user/aksi_ubah_user"); ?>">
	<input type="hidden" name="id_user" value="<?php echo $user->id; ?>">
	Username : <input readonly type="text" name="username" value="<?php echo $user->username; ?>"><br>
	Nama : <input type="text" name="nama" value="<?php echo $user->nama; ?>"><br>
	Kontak : <input type="text" name="kontak" value="<?php echo $user->kontak; ?>"><br>
	<a href="<?php echo base_url(); ?>">Kembali</a>
	<a href="<?php echo base_url("welcome/ubah_password/".$user->id); ?>">Ubah Password</a>
	<input type="submit" name="submit" value="Submit">
</form>