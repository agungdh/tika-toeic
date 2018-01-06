<!DOCTYPE html>
<html>
<head>
	<title>TOEIC</title>
</head>
<body>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue> DATA VALIDASI PENDAFTARAN TEST TOEIC LAB BAHASA POLINELA </font></strong></h4></font></strong></h4>
  </div>
<table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
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
						<a href="<?php echo base_url("validasi/terima_pendaftar/" . $item->id); ?>"><button class="btn btn-success">Terima</button></a>
						<a href="<?php echo base_url("validasi/tolak_pendaftar/" . $item->id); ?>"><button class="btn btn-success">Tolak</button></a>
						<a href="<?php echo base_url("validasi/tunggu_pendaftar/" . $item->id); ?>"><button class="btn btn-success">Tunggu</button></a>
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
</div>
<?php
if ($this->input->get('error') == 'jumlah_pendaftar') {
	?>
	<script type="text/javascript">
		alert('Jumlah pendaftar sudah 25 !!!');
	</script>
	<?php
}
?>