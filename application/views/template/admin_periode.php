<!DOCTYPE html>
<html>
<head>
	<title>TOEIC</title>
</head>
<body>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue> DATA PERIODE PENDAFTARAN TEST TOEIC LAB BAHASA POLINELA </font></strong></h4></font></strong></h4>
  </div>
  <div class="form-group">
<a href="<?php echo base_url("adm_periode/tambah_periode"); ?>""><button class="btn btn-success">+ Tambah Periode </button></a>
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
					<td><?php echo $this->m_periode->ambil_jumlah_pendaftar($item->id); ?></td>
					<td><a href="<?php echo base_url("adm_periode/ubah_periode/" . $item->id); ?>">Update</a> | <a onclick="konfirmasi2(<?php echo $item->id; ?>)">Delete</a></td>
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
function konfirmasi2(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url("adm_periode/hapus_periode/"); ?>" + id;
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
