<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$Kode_Barang = $_GET['Kode_Barang'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM barang_elektronik WHERE Kode_Barang=$Kode_Barang");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:view_data_barang.php");
?>
