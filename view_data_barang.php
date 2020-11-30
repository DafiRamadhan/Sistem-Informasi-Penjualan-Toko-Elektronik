<?php
// Create database connection using config file
include 'config.php';

// Fetch all users data from database
if (isset($_POST['kata_kunci'])) {
    $kata_kunci=trim($_POST['kata_kunci']);
    $sql="select * from barang_elektronik where Kode_Barang like '%".$kata_kunci."%' or Nama_Barang like '%".$kata_kunci."%' or Merek like '%".$kata_kunci."%'  or Kondisi like '%".$kata_kunci."%' or Harga like '%".$kata_kunci."%'  or Id_Supplier like '%".$kata_kunci."%' order by Kode_Barang asc";

}else {
    $sql="select * from barang_elektronik order by Kode_Barang asc";
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<title>Data Barang Elektronik</title>
</head>
<body>
<br/>
<h1 align=center>Daftar Data Barang Elektronik</h1>
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
    <table class="tabel" border="1" width="1300px" align=center>
    <tr>
        <th>Kode Barang</th> <th>Nama Barang</th> <th>Merek</th> <th>Kondisi</th> <th>Harga</th> <th>ID Supplier</th> <th>Edit / Delete</th>
    </tr>
    <?php  
    $result=mysqli_query($koneksi,$sql);
    while($data_barang = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$data_barang['Kode_Barang']."</td>";
        echo "<td>".$data_barang['Nama_Barang']."</td>";
        echo "<td>".$data_barang['Merek']."</td>";
        echo "<td>".$data_barang['Kondisi']."</td>";
        echo "<td>".$data_barang['Harga']."</td>";
        echo "<td>".$data_barang['Id_Supplier']."</td>";    
        echo "<td><a href='edit_data_barang.php?Kode_Barang=$data_barang[Kode_Barang]'>Edit</a> | <a href='delete_data_barang.php?Kode_Barang=$data_barang[Kode_Barang]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    <br><br><br><br><br><br><br><br>
    <center><input type="button" class="button" value="Tambah Barang Baru" onclick="location.href='add_data_barang.php'"/></center><br><br>
	<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
	</body>
</html>