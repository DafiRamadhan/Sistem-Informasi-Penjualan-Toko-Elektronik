<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $Id_Transaksi = $_POST['Id_Transaksi'];
    $Tgl_Pembelian = $_POST['Tgl_Pembelian'];
    $Jml_Pembelian = $_POST['Jml_Pembelian'];
    $Id_Pelanggan = $_POST['Id_Pelanggan'];
    $Kode_Barang = $_POST['Kode_Barang'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE detail_transaksi SET Tgl_Pembelian='$Tgl_Pembelian',Jml_Pembelian='$Jml_Pembelian',Id_Pelanggan='$Id_Pelanggan',Kode_Barang='$Kode_Barang' WHERE Id_Transaksi=$Id_Transaksi");

    // Redirect to homepage to display updated user in list
    header("Location: view_data_transaksi.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$Id_Transaksi = $_GET['Id_Transaksi'];

// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM detail_transaksi WHERE Id_Transaksi=$Id_Transaksi");

while($data_transaksi = mysqli_fetch_array($result))
{
    $Tgl_Pembelian = $data_transaksi['Tgl_Pembelian'];
    $Jml_Pembelian = $data_transaksi['Jml_Pembelian'];
    $Id_Pelanggan = $data_transaksi['Id_Pelanggan'];
    $Kode_Barang = $data_transaksi['Kode_Barang'];
}
?>
<!DOCTYPE html>
<html>
<head>  
    <link rel="stylesheet" type="text/css" href="style5.css">
    <title>Edit Data Transaksi</title>
</head>
<body>
<h1  align=center>Update Data Transaksi</h1>
<div class="form"><br>
    <h2  align=center>Edit Data Transaksi</h2>
    <center><form name="update_form1" method="post" action="edit_data_transaksi.php">
    <table class="tabel" border="1" width="75%" align=center>
            <tr> 
                <td>ID Transaksi</td>
                <td><input type="text" readonly="readonly" name="Id_Transaksi" value=<?php echo $_GET['Id_Transaksi'];?>></td>
            </tr>
            <tr> 
                <td>Tanggal Pembelian</td>
                <td><input type="date" name="Tgl_Pembelian" value=<?php echo $Tgl_Pembelian;?>></td>
            </tr>
            <tr> 
                <td>Jumlah Pembelian</td>
                <td><input type="text" name="Jml_Pembelian" value=<?php echo $Jml_Pembelian;?>></td>
            </tr>
            <tr> 
                <td>ID Pelanggan</td>
                <td><input type="text" name="Id_Pelanggan" value=<?php echo $Id_Pelanggan;?>></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="Kode_Barang" value=<?php echo $Kode_Barang;?>></td>
    </table>
    <br/>
    <br><input type="submit" name="update" value="Update">
    </form><center>
</div>
<br/>
<center><input type="button" class="button" value="Tampilkan Data Transaksi" onclick="location.href='view_data_transaksi.php'"/></center><br><br>
<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
</body>
</html>