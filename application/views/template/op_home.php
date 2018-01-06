<!DOCTYPE html>
<html>
<head>
	<title>TOEIC</title>
</head>
<body>
	<p>Kategori : <?php foreach ($kategori as $item) {
		?>
		<a href="<?php echo base_url('kategori/produk/'.$item->id) ?>"><?php echo $item->kategori; ?></a> | 
		<?php
	} ?></p>
	<br>
	<a href="<?php echo base_url("transaksi_op"); ?>">Transaksi</a>
	<br>
	<a href="<?php echo base_url("keranjang"); ?>">Keranjang</a>
	<br>
	<a href="<?php echo base_url("logout"); ?>">Logout</a>
</body>
</html>