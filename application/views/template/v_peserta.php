<!DOCTYPE html>
<html>
<head>
	<title>TOEIC</title>
</head>
<body>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue> DATA PESERTA TEST TOEIC LAB BAHASA POLINELA </font></strong></h4></font></strong></h4>
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
					<td><?php echo $item->username; ?></td>
					<td><?php echo $item->tanggal; ?></td>
					
				</tr>
				<?php
			} ?>
		</tbody>
	</table>
	<br>
	<a href="<?php echo base_url("logout"); ?>">Logout</a>
</body>
</html>

</script>

</script>
</div>