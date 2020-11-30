<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<title>Dashboard - Sistem Informasi Toko Elektronik</title>
</head>
<body>
	<h1 align=center>Sistem Informasi Penjualan Toko Elektronik</h1>

	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	?>

	<h2 align=center>Selamat datang, <?php echo $_SESSION['username']; ?>! Anda telah login.</h2>
	<div class="menu">
		<br/>
		<h3 align=center>Pilih Menu Di Bawah Untuk Ditampilkan</h3>
		<br/>
		<center><input type="button" class="button" value="Tampilkan Data Transaksi" onclick="location.href='view_data_transaksi.php'"/></center><br>
		<center><input type="button" class="button" value="Tampilkan Data Pelanggan" onclick="location.href='view_data_pelanggan.php'"/></center><br>
		<center><input type="button" class="button" value="Tampilkan Data Barang Elektronik" onclick="location.href='view_data_barang.php'"/></center><br>
		<center><input type="button" class="button" value="Tampilkan Data Supplier" onclick="location.href='view_data_supplier.php'"/></center><br>
		<center><input type="button" class="button" value="Tampilkan Rincian Data Penjualan (Untuk Toko)" onclick="location.href='view_penjualan_toko.php'"/></center><br>
		<center><input type="button" class="button" value="Tampilkan Rincian Data Penjualan (Untuk Supplier)" onclick="location.href='view_penjualan_supplier.php'"/></center><br>
		<br/>
	</div>
	<center><input type="button" class="button2" value="Logout" onclick="location.href='logout.php'"/></center><br>


</body>
</html>