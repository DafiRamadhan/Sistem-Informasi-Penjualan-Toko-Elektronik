<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$Id_Pelanggan = $_GET['Id_Pelanggan'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE Id_Pelanggan=$Id_Pelanggan");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:view_data_pelanggan.php");
?>
