<!DOCTYPE html>
<html>
<head>
	<title>TOEIC</title>
</head>
<body>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue> DATA USER </font></strong></h4></font></strong></h4>
  </div>
  <div class="form-group">
    </div>
	<table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Nama</th>
				<th>NPM</th>
				<th>Periode</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($peserta as $item) {
				?>
				<tr>
					<td><?php echo $item->nama; ?></td>
					<td><?php echo $item->npm; ?></td>
					<td><?php echo $item->tanggal; ?></td>
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
