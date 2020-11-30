<!DOCTYPE html>
<html>
<head>
	<title>Login - Sistem Informasi Toko Elektronik</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<br/>
	<br/>
	<center><h2>Login Administrator</h2></center>	
	<br/>
	<center><?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout!";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin!";
		}
	}
	?><center>
    <div class="login">
	<br/>
	    <form method="post" action="login.php">
		    <div>
			    <div>
                    <label>Username :</label>
				    <td><input type="text" name="username" placeholder="Masukkan username"></td>
                </div>
                <br/>
			    <div>
                    <label>Password :</label>
				    <td><input type="password" name="password" placeholder="Masukkan password"></td>
                </div>
			    <div>
				    <td></td>
				    <td></td>
				    <td><input type="submit" value="LOGIN" class="tombol"></td>
                </div>
            </div>			
        </form>
    </div>
</body>
</html>