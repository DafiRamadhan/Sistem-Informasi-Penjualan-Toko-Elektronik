<?php
// Create database connection using config file
include 'config.php';

// Fetch all users data from database
if (isset($_POST['kata_kunci'])) {
    $kata_kunci=trim($_POST['kata_kunci']);
    $sql="select * from supplier where Id_Supplier like '%".$kata_kunci."%' or Nama_Supplier like '%".$kata_kunci."%' or Lokasi like '%".$kata_kunci."%'  or Email like '%".$kata_kunci."%' order by Id_Supplier asc";

}else {
    $sql="select * from supplier order by Id_Supplier asc";
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<title>Data Supplier</title>
</head>
<body>
<br/>
<h1 align=center>Daftar Data Supplier</h1>
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
        <th>ID Supplier</th> <th>Nama Supplier</th> <th>Lokasi</th> <th>Email</th> <th>Edit / Delete</th>
    </tr>
    <?php 
    $result=mysqli_query($koneksi,$sql);
    while($data_supplier = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$data_supplier['Id_Supplier']."</td>";
        echo "<td>".$data_supplier['Nama_Supplier']."</td>";
        echo "<td>".$data_supplier['Lokasi']."</td>";
        echo "<td>".$data_supplier['Email']."</td>";
        echo "<td><a href='edit_data_supplier.php?Id_Supplier=$data_supplier[Id_Supplier]'>Edit</a> | <a href='delete_data_supplier.php?Id_Supplier=$data_supplier[Id_Supplier]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    <br><br><br><br><br><br><br><br>
    <center><input type="button" class="button" value="Tambah Supplier Baru" onclick="location.href='add_data_supplier.php'"/></center><br><br>
	<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
	</body>
</html>