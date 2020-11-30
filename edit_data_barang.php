<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $Kode_Barang = $_POST['Kode_Barang'];
    $Nama_Barang = $_POST['Nama_Barang'];
    $Merek = $_POST['Merek'];
    $Kondisi = $_POST['Kondisi'];
    $Harga = $_POST['Harga'];
    $Id_Supplier = $_POST['Id_Supplier'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE barang_elektronik SET Nama_Barang='$Nama_Barang',Merek='$Merek',Kondisi='$Kondisi',Harga='$Harga',Id_Supplier='$Id_Supplier' WHERE Kode_Barang=$Kode_Barang");

    // Redirect to homepage to display updated user in list
    header("Location: view_data_barang.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$Kode_Barang = $_GET['Kode_Barang'];

// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM barang_elektronik WHERE Kode_Barang=$Kode_Barang");

while($data_barang = mysqli_fetch_array($result))
{
    $Nama_Barang = $data_barang['Nama_Barang'];
    $Merek = $data_barang['Merek'];
    $Kondisi = $data_barang['Kondisi'];
    $Harga = $data_barang['Harga'];
    $Id_Supplier = $data_barang['Id_Supplier'];
}
?>
<!DOCTYPE html>
<html>
<head>  
    <link rel="stylesheet" type="text/css" href="style5.css">
    <title>Edit Data Barang</title>
</head>
<body>
<h1  align=center>Update Data Barang</h1>
<div class="form">
    <h2  align=center>Edit Data Barang</h2>
    <center><form name="update_form1" method="post" action="edit_data_barang.php">
    <table class="tabel" border="1" width="75%" align=center>
            <tr> 
                <td>Kode Barang</td>
                <td><input type="text" readonly="readonly" name="Kode_Barang" value=<?php echo $_GET['Kode_Barang'];?>></td>
            </tr>
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="Nama_Barang" value="<?php echo $Nama_Barang;?>"></td>
            </tr>
            <tr> 
                <td>Merek</td>
                <td><input type="text" name="Merek" value="<?php echo $Merek;?>"></td>
            </tr>
            <tr> 
                <td>Kondisi</td>
                <td><input type="text" name="Kondisi" value="<?php echo $Kondisi;?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="Harga" value="<?php echo $Harga;?>"></td>
            </tr>
            <tr>
                <td>ID Supplier</td>
                <td><input type="text" name="Id_Supplier" value=<?php echo $Id_Supplier;?>></td>
    </table>
    <br/>
    <input type="submit" name="update" value="Update">
    </form><center>
</div>
<br/>
<center><input type="button" class="button" value="Tampilkan Data Barang" onclick="location.href='view_data_barang.php'"/></center><br><br>
<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
</body>
</html>