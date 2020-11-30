<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style4.css">
    <title>Tambah Transaksi Baru</title>
</head>
<body>
<br/>
<h1  align=center>Transaksi Baru</h1>
    <div class="form">
        <h2  align=center>Tambah Data Transaksi</h2>
        <center><form action="add_data_transaksi.php" method="post" name="form1">
        <table class="tabel" border="1" width="75%" align=center>
                <tr> 
                    <td>ID Transaksi</td>
                    <td><input type="text" name="Id_Transaksi"></td>
                </tr>
                <tr> 
                    <td>Tanggal Pembelian</td>
                    <td><input type="date" name="Tgl_Pembelian"></td>
                </tr>
                <tr> 
                    <td>Jumlah Pembelian</td>
                    <td><input type="text" name="Jml_Pembelian"></td>
                </tr>
                <tr> 
                    <td>ID Pelanggan</td>
                    <td><input type="text" name="Id_Pelanggan"></td>
                </tr>
                <tr> 
                    <td>Kode Barang</td>
                    <td><input type="text" name="Kode_Barang"></td>
            </table>
            <br><br>
            <input type="submit" name="Submit" value="Tambahkan">
        </form><center>
    </div>
    <center><?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $Id_Transaksi = $_POST['Id_Transaksi'];
        $Tgl_Pembelian = $_POST['Tgl_Pembelian'];
        $Jml_Pembelian = $_POST['Jml_Pembelian'];
        $Id_Pelanggan = $_POST['Id_Pelanggan'];
        $Kode_Barang = $_POST['Kode_Barang'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO detail_transaksi(Id_Transaksi,Tgl_Pembelian,Jml_Pembelian,Id_Pelanggan,Kode_Barang) VALUES('$Id_Transaksi','$Tgl_Pembelian','$Jml_Pembelian','$Id_Pelanggan','$Kode_Barang')");

        // Show message when user added
        echo "<p> <font color=white font face='verdana' size='5pt'>Transaksi Berhasil Ditambahkan!</font> </p>";
    }
    ?><center>
    <br/>
    <center><input type="button" class="button" value="Tampilkan Data Transaksi" onclick="location.href='view_data_transaksi.php'"/></center><br><br>
	<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
    </body>
</html>