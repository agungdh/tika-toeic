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
				<th>Periode</th>
				<th>Nilai</th>
			<?php if ($this->session->level != 1) {
				?>
				<th>Upload</th>
				<?php
				}
				?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($periode as $item) {
				?>
				<tr>
					<td><?php echo $item->tanggal; ?></td>
					<td>
					<?php
						if (file_exists("uploads/nilai/".$item->id.".pdf")) {
					?>
					<a target='_blank' href="<?php echo base_url("uploads/nilai/".$item->id.".pdf"); ?>">Download</a>  </td>
					<?php
						} else  {
							echo "Nilai belum di upload";
						}
					?>
			<?php if ($this->session->level != 1) {
				?>
				
					<td>
						<form enctype="multipart/form-data" method="post" action="<?php echo base_url("uploadnilai/upload"); ?>">
							<input type="file" name="file">
							<input type="hidden" name="periode" value="<?php echo $item->id; ?>">
							<input type="submit" name="submit" value="Upload">
						</form>
					</td>
				<?php
				}
				?>
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
