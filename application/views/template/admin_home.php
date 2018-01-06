<!DOCTYPE html>
<html>
<head>
	<title>toeic</title>
</head>
<body>
	<a href="<?php echo base_url("welcome/tambah_user"); ?>">+ Tambah User</a>
	<br>
	<table border="1">
		<thead>
			<tr>
				<th>Username</th>
				<th>Nama</th>
				<th>Kontak</th>
				<th>NPM</th>
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
	<br>

	<a href="<?php echo base_url("welcome/tambah_periode"); ?>">+ Tambah Periode</a>
	<br>
	<table border="1">
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Jumlah</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($periode as $item) {
				?>
				<tr>
					<td><?php echo $item->tanggal; ?></td>
					<td><?php echo $this->m_welcome->ambil_jumlah_pendaftar($item->id); ?></td>
					<td><a href="<?php echo base_url("welcome/ubah_periode/" . $item->id); ?>">Update</a> | <a onclick="konfirmasi2(<?php echo $item->id; ?>)">Delete</a></td>
				</tr>
				<?php
			} ?>
		</tbody>
	</table>
	<br>

	<table border="1">
		<thead>
			<tr>
				<th>Nama</th>
				<th>NPM</th>
				<th>Periode</th>
				<th>KTP</th>
				<th>Kwitansi</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pendaftar as $item) {
				?>
				<tr>
					<td><?php echo $item->nama; ?></td>
					<td><?php echo $item->npm; ?></td>
					<td><?php echo $item->username; ?></td>
					<td><?php echo $item->tanggal; ?></td>
					<?php
					if (file_exists("uploads/bukti_ktp/" . $item->id .".jpg")) {
						?>
						<td>
							<a href="<?php echo base_url("uploads/bukti_ktp/" . $item->id . ".jpg"); ?>"><img height="200px" width="350px" src="<?php echo base_url("uploads/bukti_ktp/" . $item->id . ".jpg"); ?>"></a>
						</td>
						<?php
					} else {
						?>
						<td>
							<a href="<?php echo base_url("uploads/bukti_ktp/0.jpg"); ?>"><img height="200px" width="350px" src="<?php echo base_url("uploads/bukti_ktp/0.jpg"); ?>"></a>
						</td>
						<?php
					}
					?>
					<?php
					if (file_exists("uploads/bukti_kwitansi/" . $item->id .".jpg")) {
						?>
						<td>
							<a href="<?php echo base_url("uploads/bukti_kwitansi/" . $item->id . ".jpg"); ?>"><img height="200px" width="350px" src="<?php echo base_url("uploads/bukti_kwitansi/" . $item->id . ".jpg"); ?>"></a>
						</td>
						<?php
					} else {
						?>
						<td>
							<a href="<?php echo base_url("uploads/bukti_kwitansi/0.jpg"); ?>"><img height="200px" width="350px" src="<?php echo base_url("uploads/bukti_kwitansi/0.jpg"); ?>"></a>
						</td>
						<?php
					}
					?>
					<td>
						<?php
						if ($item->status == null) {
							$keterangan = "Menunggu Persetujuan";
						} elseif ($item->status == 0) {
							$keterangan = "Ditolak";
						} else {
							$keterangan = "Diterima";
						}
						echo $keterangan;
						?>
					</td>
					<td>
						<a href="<?php echo base_url("welcome/terima_pendaftar/" . $item->id); ?>">Terima</a>
						<a href="<?php echo base_url("welcome/tolak_pendaftar/" . $item->id); ?>">Tolak</a>
						<a href="<?php echo base_url("welcome/tunggu_pendaftar/" . $item->id); ?>">Tunggu</a>
					</td>
				</tr>
				<?php
			} ?>
		</tbody>
	</table>
	<br>
	<a href="<?php echo base_url("logout"); ?>">Logout</a>
</body>
</html>

<script type="text/javascript">
function konfirmasi(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url("welcome/hapus_user/"); ?>" + id;
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