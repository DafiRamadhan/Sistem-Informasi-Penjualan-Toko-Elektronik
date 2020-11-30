<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style4.css">
    <title>Tambah Pelanggan Baru</title>
</head>
<body>
<br/>
<h1  align=center>Pelanggan Baru</h1>

<div class="form">
    <h2  align=center>Tambah Data Pelanggan</h2>
    <center><form action="add_data_pelanggan.php" method="post" name="form1">
    <table class="tabel" border="1" width="75%" align=center>
            <tr> 
                <td>ID Pelanggan</td>
                <td><input type="text" name="Id_Pelanggan"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="Alamat"></td>
            </tr>
            <tr> 
                <td>Nomor Telepon</td>
                <td><input type="text" name="No_Telp"></td>
            </tr>
            <tr> 
                <td>Tanggal Lahir</td>
                <td><input type="date" name="Tgl_Lahir"></td>
            </tr>
            <tr> 
                <td>Kode Barang</td>
                <td><input type="text" name="Kode_Barang"></td>
    </table>
    <br/>
    <input type="submit" name="Submit" value="Tambahkan">
    </form><center>
</div>
    <center><?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $Id_Pelanggan = $_POST['Id_Pelanggan'];
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $No_Telp = $_POST['No_Telp'];
        $Tgl_Lahir = $_POST['Tgl_Lahir'];
        $Kode_Barang = $_POST['Kode_Barang'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO pelanggan(Id_Pelanggan,Nama,Alamat,No_Telp,Tgl_Lahir,Kode_Barang) VALUES('$Id_Pelanggan','$Nama','$Alamat','$No_Telp','$Tgl_Lahir','$Kode_Barang')");

        // Show message when user added
        echo "<p> <font color=white font face='verdana' size='5pt'>Pelanggan Berhasil Ditambahkan!</font> </p>";
    }
    ?><center>
    <br/>
    <center><input type="button" class="button" value="Tampilkan Data Pelanggan" onclick="location.href='view_data_pelanggan.php'"/></center><br><br>
	<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
    </body>
</html>