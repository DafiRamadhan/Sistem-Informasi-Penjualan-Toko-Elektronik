<?php
// Create database connection using config file
include 'config.php';

// Fetch all users data from database
if (isset($_POST['kata_kunci'])) {
    $kata_kunci=trim($_POST['kata_kunci']);
    $sql="select * from detail_transaksi where Id_Transaksi like '%".$kata_kunci."%' or Tgl_Pembelian like '%".$kata_kunci."%' or Jml_Pembelian like '%".$kata_kunci."%'  or Id_Pelanggan like '%".$kata_kunci."%' or Kode_Barang like '%".$kata_kunci."%' order by Id_Transaksi asc";

}else {
    $sql="select * from detail_transaksi order by Id_Transaksi asc";
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<title>Data Transaksi</title>
</head>
<body>
<br/>
<h1 align=center>Daftar Data Transaksi</h1>
<br/>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <table class="pencarian" border="1" width="20%" align=center>
            <tr>
            <td>Pencarian:</td>
            <?php
            $kata_kunci="";
            if (isset($_POST['kata_kunci'])) {
                $kata_kunci=$_POST['kata_kunci'];
            }
            ?>
            <td><input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>"></td>
            <td><input type="submit" class="cari" value="Cari"></td>
        </table>
    </form>
    <table class="tabel" border="1" width="1000px" align=center>
    <tr>
        <th>ID Transaksi</th> <th>Tanggal Pembelian</th> <th>Jumlah Pembelian</th> <th>ID Pelanggan</th> <th>Kode Barang</th> <th>Edit / Delete</th>
    </tr>
    <?php  
    $result=mysqli_query($koneksi,$sql);
    while($data_transaksi = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$data_transaksi['Id_Transaksi']."</td>";
        echo "<td>".$data_transaksi['Tgl_Pembelian']."</td>";
        echo "<td>".$data_transaksi['Jml_Pembelian']."</td>";
        echo "<td>".$data_transaksi['Id_Pelanggan']."</td>";
        echo "<td>".$data_transaksi['Kode_Barang']."</td>";    
        echo "<td><a href='edit_data_transaksi.php?Id_Transaksi=$data_transaksi[Id_Transaksi]'>Edit</a> | <a href='delete_data_transaksi.php?Id_Transaksi=$data_transaksi[Id_Transaksi]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    <br><br><br><br><br><br><br><br>
    <center><input type="button" class="button" value="Tambah Transaksi Baru" onclick="location.href='add_data_transaksi.php'"/></center><br><br>
	<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
	</body>
</html>