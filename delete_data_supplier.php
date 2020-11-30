<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$Id_Supplier = $_GET['Id_Supplier'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM supplier WHERE Id_Supplier=$Id_Supplier");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:view_data_supplier.php");
?>
