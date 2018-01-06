
<!DOCTYPE html>
<html>
<head>
	<title>TOEIC</title>
</head>
<body>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue> DATA USER PENDAFTARAN TEST TOEIC LAB BAHASA POLINELA </font></strong></h4></font></strong></h4>
  </div>
 
<!-- <?php echo $periode; ?> -->
	
	<div class="form-group">
	<a href="<?php echo base_url("user/tambah_user"); ?>">
      <button class="btn btn-success">+ Tambah User Admin</button></a>
    </div>
	<table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Username</th>
				<th>Nama</th>
				<th>Npm</th>
				<th>Kontak</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user as $item) {
				if ($item->level == 0) { $level = "Admin"; } elseif ($item->level == 1) { $level = "Mahasiswa"; } else { return; }
				?>
				<tr>
					<td><?php echo $item->username; ?></td>
					<td><?php echo $item->nama; ?></td>
					<td><?php echo $item->npm; ?></td>
					<td><?php echo $item->kontak; ?></td>
					<td><?php echo $level; ?></td>
					<td><a href="<?php echo base_url("welcome/ubah_user/" . $item->id); ?>">Update</a> | <a onclick="konfirmasi(<?php echo $item->id; ?>)">Delete</a></td>
				</tr>
				<?php
			} ?>
		</tbody>
	</table>
	 </div>
	<br>
</body>
</html>

<script type="text/javascript">
function konfirmasi(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url("user/hapus_user/"); ?>" + id;
  }
}
</script>

<script type="text/javascript">
function konfirmasi2(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url("welcome/hapus_periode/"); ?>" + id;
  }
}
</script>

<?php
if ($this->input->get('error') == 'jumlah_pendaftar') {
	?>
	<script type="text/javascript">
		alert('Jumlah pendaftar sudah 25 !!!');
	</script>
	<?php
}
?>