<?php
// Create database connection using config file
include 'config.php';

// Fetch all users data from database
if (isset($_POST['kata_kunci'])) {
    $kata_kunci=trim($_POST['kata_kunci']);
    $sql="select * from pelanggan where Id_Pelanggan like '%".$kata_kunci."%' or Nama like '%".$kata_kunci."%' or Alamat like '%".$kata_kunci."%'  or No_Telp like '%".$kata_kunci."%' or Tgl_Lahir like '%".$kata_kunci."%'  or Kode_Barang like '%".$kata_kunci."%' order by Id_Pelanggan asc";

}else {
    $sql="select * from pelanggan order by Id_Pelanggan asc";
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<title>Data Pelanggan</title>
</head>
<body>
<br/>
<h1 align=center>Daftar Data Pelanggan</h1>
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
        <th>ID Pelanggan</th> <th>Nama</th> <th>Alamat</th> <th>Nomor Telepon</th> <th>Tanggal Lahir</th> <th>Kode Barang</th> <th>Edit / Delete</th>
    </tr>
    <?php  
    $result=mysqli_query($koneksi,$sql);
    while($data_pelanggan = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$data_pelanggan['Id_Pelanggan']."</td>";
        echo "<td>".$data_pelanggan['Nama']."</td>";
        echo "<td>".$data_pelanggan['Alamat']."</td>";
        echo "<td>".$data_pelanggan['No_Telp']."</td>";
        echo "<td>".$data_pelanggan['Tgl_Lahir']."</td>";
        echo "<td>".$data_pelanggan['Kode_Barang']."</td>";    
        echo "<td><a href='edit_data_pelanggan.php?Id_Pelanggan=$data_pelanggan[Id_Pelanggan]'>Edit</a> | <a href='delete_data_pelanggan.php?Id_Pelanggan=$data_pelanggan[Id_Pelanggan]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    <br><br><br><br><br><br><br><br>
    <center><input type="button" class="button" value="Tambah Pelanggan Baru" onclick="location.href='add_data_pelanggan.php'"/></center><br><br>
	<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
	</body>
</html>