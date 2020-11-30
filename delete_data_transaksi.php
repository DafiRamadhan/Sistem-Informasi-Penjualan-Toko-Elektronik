<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$Id_Transaksi = $_GET['Id_Transaksi'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM detail_transaksi WHERE Id_Transaksi=$Id_Transaksi");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:view_data_transaksi.php");
?>
