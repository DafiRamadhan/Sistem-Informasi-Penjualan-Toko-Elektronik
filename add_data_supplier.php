<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style4.css">
    <title>Tambah Supplier Baru</title>
</head>
<body>
<h1  align=center>Supplier Baru</h1>
<div class="form"><br><br><br>
    <h2  align=center>Tambah Supplier Baru</h2>
    <center><form action="add_data_supplier.php" method="post" name="form1">
    <table class="tabel" border="1" width="75%" align=center>
            <tr> 
                <td>ID Supplier</td>
                <td><input type="text" name="Id_Supplier"></td>
            </tr>
            <tr> 
                <td>Nama Supplier</td>
                <td><input type="text" name="Nama_Supplier"></td>
            </tr>
            <tr> 
                <td>Lokasi</td>
                <td><input type="text" name="Lokasi"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="Email"></td>
    </table>
    <br/>
    <br><br><input type="submit" name="Submit" value="Tambahkan">
    </form><center>
</div>
    <center><?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $Id_Supplier = $_POST['Id_Supplier'];
        $Nama_Supplier = $_POST['Nama_Supplier'];
        $Lokasi = $_POST['Lokasi'];
        $Email = $_POST['Email'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO supplier(Id_Supplier,Nama_Supplier,Lokasi,Email) VALUES('$Id_Supplier','$Nama_Supplier','$Lokasi','$Email')");

        // Show message when user added
        echo "<p> <font color=white font face='verdana' size='5pt'>Supplier Berhasil Ditambahkan!</font> </p>";
    }
    ?><center>
    <br/>
    <center><input type="button" class="button" value="Tampilkan Data Supplier" onclick="location.href='view_data_supplier.php'"/></center><br><br>
	<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
    </body>
</html>