<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $Id_Pelanggan = $_POST['Id_Pelanggan'];
    $Nama = $_POST['Nama'];
    $Alamat = $_POST['Alamat'];
    $No_Telp = $_POST['No_Telp'];
    $Tgl_Lahir = $_POST['Tgl_Lahir'];
    $Kode_Barang = $_POST['Kode_Barang'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE pelanggan SET Nama='$Nama',Alamat='$Alamat',No_Telp='$No_Telp',Tgl_Lahir='$Tgl_Lahir',Kode_Barang='$Kode_Barang' WHERE Id_Pelanggan=$Id_Pelanggan");

    // Redirect to homepage to display updated user in list
    header("Location: view_data_pelanggan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$Id_Pelanggan = $_GET['Id_Pelanggan'];

// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE Id_Pelanggan=$Id_Pelanggan");

while($data_pelanggan = mysqli_fetch_array($result))
{
    $Nama = $data_pelanggan['Nama'];
    $Alamat = $data_pelanggan['Alamat'];
    $No_Telp = $data_pelanggan['No_Telp'];
    $Tgl_Lahir = $data_pelanggan['Tgl_Lahir'];
    $Kode_Barang = $data_pelanggan['Kode_Barang'];
}
?>
<!DOCTYPE html>
<html>
<head>  
    <link rel="stylesheet" type="text/css" href="style5.css">
    <title>Edit Data Pelanggan</title>
</head>
<body>
<h1  align=center>Update Data Pelanggan</h1>
<div class="form">
    <h2  align=center>Edit Data Pelanggan</h2>
    <center><form name="update_form1" method="post" action="edit_data_pelanggan.php">
    <table class="tabel" border="1" width="75%" align=center>
            <tr> 
                <td>ID Pelanggan</td>
                <td><input type="text" readonly="readonly" name="Id_Pelanggan" value=<?php echo $_GET['Id_Pelanggan'];?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="Nama" value="<?php echo $Nama;?>"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="Alamat" value="<?php echo $Alamat;?>"></td>
            </tr>
            <tr> 
                <td>Nomor Telepon</td>
                <td><input type="text" name="No_Telp" value="<?php echo $No_Telp;?>"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="Tgl_Lahir" value=<?php echo $Tgl_Lahir;?>></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="Kode_Barang" value=<?php echo $Kode_Barang;?>></td>
    </table>
    <br/>
    <input type="submit" name="update" value="Update">
    </form><center>
</div>
<br/>
<center><input type="button" class="button" value="Tampilkan Data Pelanggan" onclick="location.href='view_data_pelanggan.php'"/></center><br><br>
<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
</body>
</html>