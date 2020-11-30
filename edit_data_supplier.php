<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $Id_Supplier = $_POST['Id_Supplier'];
    $Nama_Supplier = $_POST['Nama_Supplier'];
    $Lokasi = $_POST['Lokasi'];
    $Email = $_POST['Email'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE supplier SET Nama_Supplier='$Nama_Supplier',Lokasi='$Lokasi',Email='$Email' WHERE Id_Supplier=$Id_Supplier");

    // Redirect to homepage to display updated user in list
    header("Location: view_data_supplier.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$Id_Supplier = $_GET['Id_Supplier'];

// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM supplier WHERE Id_Supplier=$Id_Supplier");

while($data_supplier = mysqli_fetch_array($result))
{
    $Nama_Supplier = $data_supplier['Nama_Supplier'];
    $Lokasi = $data_supplier['Lokasi'];
    $Email = $data_supplier['Email'];
}
?>
<!DOCTYPE html>
<html>
<head>  
    <link rel="stylesheet" type="text/css" href="style5.css">
    <title>Edit Data Supplier</title>
</head>
<body>
<h1  align=center>Update Data Supplier</h1>
<div class="form"><br>
    <br><h2  align=center>Edit Data Supplier</h2><br>
    <center><form name="update_form1" method="post" action="edit_data_supplier.php">
    <table class="tabel" border="1" width="75%" align=center>
            <tr> 
                <td>ID Supplier</td>
                <td><input type="text" readonly="readonly" name="Id_Supplier" value=<?php echo $_GET['Id_Supplier'];?>></td>
            </tr>
            <tr> 
                <td>Nama Supplier</td>
                <td><input type="text" name="Nama_Supplier" value="<?php echo $Nama_Supplier;?>"></td>
            </tr>
            <tr> 
                <td>Lokasi</td>
                <td><input type="text" name="Lokasi" value="<?php echo $Lokasi;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="Email" value="<?php echo $Email;?>"></td>
    </table>
    <br/>
    <br><br><input type="submit" name="update" value="Update">
    </form><center>
</div>
<br/>
<center><input type="button" class="button" value="Tampilkan Data Supplier" onclick="location.href='view_data_supplier.php'"/></center><br><br>
<center><input type="button" class="button" value="Kembali ke Dashboard" onclick="location.href='homepage.php'"/></center><br>
</body>
</html>