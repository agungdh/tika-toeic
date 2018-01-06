<!DOCTYPE html>
<html>
<head>
	<title>TOEIC</title>
</head>
<body>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue> LAKUKAN PENDAFTARAN DENGAN TANGGAL DIBAWAH INI, QUOTA MAX 25 ORANG: </font></strong></h4>
  </div>
	<table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
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
					<td><a onclick="konfirmasi(<?php echo $item->id; ?>)"><button class="btn btn-success">Daftar</button></a></td>
				</tr>
				<?php
			} ?>
		</tbody>
	</table>
	<br>
<h4><strong><font color=blue> UPLOAD BUKTI PEMBAYARAN DAN KTP KEMUDIAN TUNGGU KONFIRMASI: </font></strong></h4>
	<table border="1">
		<thead>
			<tr>
				<th>Periode</th>
				<th>KTP</th>
				<th>Kwitansi</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pendaftar as $item) {
				?>
				<tr>
					<td><?php echo $item->tanggal; ?></td>
					<?php
					if (file_exists("uploads/bukti_ktp/" . $item->id .".jpg")) {
						?>
						<td>
							<a href="<?php echo base_url("uploads/bukti_ktp/" . $item->id . ".jpg"); ?>"><img height="200px" width="350px" src="<?php echo base_url("uploads/bukti_ktp/" . $item->id . ".jpg"); ?>"></a>
							<br>
							<a href="<?php echo base_url("welcome/upload_bukti_pendaftar_ktp/" . $item->id); ?>">Upload KTP</a>
						</td>
						<?php
					} else {
						?>
						<td>
							<a href="<?php echo base_url("uploads/bukti_ktp/0.jpg"); ?>"><img height="200px" width="350px" src="<?php echo base_url("uploads/bukti_ktp/0.jpg"); ?>"></a>
							<br>
							<a href="<?php echo base_url("welcome/upload_bukti_pendaftar_ktp/" . $item->id); ?>">Upload KTP</a>
						</td>
						<?php
					}
					?>
					<?php
					if (file_exists("uploads/bukti_kwitansi/" . $item->id .".jpg")) {
						?>
						<td>
							<a href="<?php echo base_url("uploads/bukti_kwitansi/" . $item->id . ".jpg"); ?>"><img height="200px" width="350px" src="<?php echo base_url("uploads/bukti_kwitansi/" . $item->id . ".jpg"); ?>"></a>
							<br>
							<a href="<?php echo base_url("welcome/upload_bukti_pendaftar_kwitansi/" . $item->id); ?>">Upload Kwitansi</a>
						</td>
						<?php
					} else {
						?>
						<td>
							<a href="<?php echo base_url("uploads/bukti_kwitansi/0.jpg"); ?>"><img height="200px" width="350px" src="<?php echo base_url("uploads/bukti_kwitansi/0.jpg"); ?>"></a>
							<br>
							<a href="<?php echo base_url("welcome/upload_bukti_pendaftar_kwitansi/" . $item->id); ?>">Upload Kwitansi</a>
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
				</tr>
				<?php
			} ?>
		</tbody>
	</table>
	<br>

</body>
</html>

<?php
if ($this->input->get('error') == 'jumlah_pendaftar') {
	?>
	<script type="text/javascript">
		alert('Jumlah pendaftar sudah 25 !!!');
	</script>
	<?php
}
?>

<script type="text/javascript">
function konfirmasi(id) {
  if (confirm("Yakin daftar ?")) {
    window.location = "<?php echo base_url("welcome/daftar_periode/"); ?>" + id;
  }
}
</script>
