<form method="post" action="<?php echo base_url("user/aksi_ubah_pemberitahuan"); ?>">
	<input type="hidden" name="id_pemberitahuan" value="<?php echo $pemberitahuan->id_pemberitahuan; ?>">
	Isi : <input readonly type="text" name="isi" value="<?php echo $pemberitahuan->isi; ?>"><br>
	<a href="<?php echo base_url(); ?>">Kembali</a>
	<input type="submit" name="submit" value="Submit">
</form>