<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style4.css">
    <title>Tambah Barang Baru</title>
</head>
<body>
<h1  align=center>Barang Baru</h1>
<div class="form">
    <h2  align=center>Tambah Barang Baru</h2>
    <center><form action="add_data_barang.php" method="post" name="form1">
    <table class="tabel" border="1" width="75%" align=center>
            <tr> 
                <td>Kode barang</td>
                <td><input type="text" name="Kode_Barang"></td>
            </tr>
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="Nama_Barang"></td>
            </tr>
            <tr> 
                <td>Merek</td>
                <td><input type="text" name="Merek"></td>
            </tr>
            <tr> 
                <td>Kondisi</td>
                <td><input type="text" name="Kondisi"></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="Harga"></td>
            </tr>
            <tr> 
                <td>ID Supplier</td>
                <td><input type="text" name="Id_Supplier"></td>
    </table>
    <br/>
    <input type="submit" name="Submit" value="Tambahkan">
    </form><center>
</div>
    <center><?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $Kode_Barang = $_POST['Kode_Barang'];
        $Nama_Barang = $_POST['Nama_Barang'];
        $Merek = $_POST['Merek'];
        $Kondisi = $_POST['Kondisi'];
        $Harga = $_POST['Harga'];
        $Id_Supplier = $_POST['Id_Supplier'];
        

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO barang_elektronik(Kode_Barang,Nama_Barang,Merek,Kondisi,Harga,Id_Supplier) VALUES('$Kode_Barang','$Nama_Barang','$Merek','$Kondisi','$Harga','$Id_Supplier')");
        // Show message when user added
        echo "<p> <font color=white font face='verdana' size='5pt'>Barang Berhasil Ditambahkan!</font> </p>";
    }
    ?><center>
    <br/>
    <center><input type="button" class="button" value="Tampilkan Data Barang" onclick="location.href='view_data_barang.php'"/></center><br><br>
	<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
    </body>
</html>