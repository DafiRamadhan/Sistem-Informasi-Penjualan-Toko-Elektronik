<?php
// Create database connection using config file
include 'config.php';

// Fetch all users data from database
if (isset($_POST['kata_kunci'])) {
    $kata_kunci=trim($_POST['kata_kunci']);
    $sql="select * from penjualan where Id_Transaksi like '%".$kata_kunci."%' or Tgl_Pembelian like '%".$kata_kunci."%' or Nama like '%".$kata_kunci."%'  or Alamat like '%".$kata_kunci."%' or No_Telp like '%".$kata_kunci."%'  or Nama_Barang like '%".$kata_kunci."%'  or Merek like '%".$kata_kunci."%' or Kondisi like '%".$kata_kunci."%'  or Jml_Pembelian like '%".$kata_kunci."%' or Harga like '%".$kata_kunci."%' order by Id_Transaksi asc";

}else {
    $sql="select * from penjualan order by Id_Transaksi asc";
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<title>Data Rincian Penjualan (Toko)</title>
</head>
<body>
<br/>
<h1 align=center>Data Rincian Penjualan (Untuk Toko)</h1>
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
    <table class="tabel" border="1" width="1400px" align=center>
    <tr>
        <th>ID Transaksi</th> <th>Tanggal Pembelian</th> <th>Nama</th> <th>Alamat</th> <th>Nomor Telepon</th> <th>Nama Barang</th> <th>Merek</th> <th>Kondisi</th> <th>Jumlah Pembelian</th> <th>Harga</th>
    </tr>
    <?php  
    $result=mysqli_query($koneksi,$sql);
    while($data_penjualan = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$data_penjualan['Id_Transaksi']."</td>";
        echo "<td>".$data_penjualan['Tgl_Pembelian']."</td>";
        echo "<td>".$data_penjualan['Nama']."</td>";
        echo "<td>".$data_penjualan['Alamat']."</td>";
        echo "<td>".$data_penjualan['No_Telp']."</td>";
        echo "<td>".$data_penjualan['Nama_Barang']."</td>";
        echo "<td>".$data_penjualan['Merek']."</td>";
        echo "<td>".$data_penjualan['Kondisi']."</td>";
        echo "<td>".$data_penjualan['Jml_Pembelian']."</td>";
        echo "<td>".$data_penjualan['Harga']."</td>";       
    }
    ?>
    </table>
    <br><br><br><br><br><br><br><br>
	<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
	</body>
</html>