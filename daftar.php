<?php 
session_start();
require_once 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Ideal</title>
	<link rel="icon" type="image/png" href="icon/logod-2.png">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
	  	/*Button*/
			.border-p{
			    border-top: 1px solid;
			    color: #e1e1e1;
			    background: #fff;
			    margin-top: 30px;
			    width: 400px;
			}

			.daftarp{
			    text-align: center;
			    color: #bdbcbc;
			    width: 50px;
			    margin: 10px auto 0;
			    background: #fff;
			    position: relative;
			    bottom: 23px;
			    margin-left: 175px;
			}
			.btndaftar{
			    width: 400px;
			    height: 45px;
			    font-size: 18px;
			}

			.btnloginsosmed{
			    background: #eee;
			}

			.btnloginsosmed:hover{
			    background: #eee;
			    color: #00c300;
			}
		
	  </style>
</head>
<body>
	<div class="row" style="margin-top: 15px;">
		<img class="mx-auto" src="icon/logod-2.png" style="width: 100px; height: 100px;">	
	</div>
	<h4 style="color:#00c300; text-align: center; margin-top: 15px;"><strong>Daftar Akun Ideal</strong></h4>
	<div class="row" style="margin-bottom: 10px;">
		<div style="align-items: center;" class="col-xs-12 col-md-4 col-lg-4 card shadow p-3 mb-5 bg-white rounded mx-auto">
		<form method="post">
			<div class="form-group">
				<label for="nama">Nama :</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap anda" required="Masukkan Nama">
			</div>
			<div class="form-group">
			  <label for="gender">Jenis Kelamin :</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="option" id="men" value="Laki-laki">
				<label class="form-check-label" for="men">Laki-laki</label>
				</div>
				<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="option" id="women" value="Perempuan">
				<label class="form-check-label" for="women">Perempuan</label>
			</div>
			<div class="form-group">
				<br>
				<label for="email">Email :</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda" required="Masukkan email">
			</div>
			<div class="form-group">
				<label for="pass">Password :</label>
				<input type="password" class="form-control" id="pass" name="password" placeholder="Masukkan password anda" required="Masukan password">
			</div>
			<div class="form-group">
				<label for="telepon">Telepon :</label>
				<input type="number" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" required="Masukkan telepon">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat :</label>
				<textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
			</div>
			<div class="form-group">
				<p>Dengan klik daftar, kamu telah menyetujui <a style="color:green;" href="#">Aturan Penggunaan</a> dan <a style="color:green;" href="#">Kebijakan Privasi</a> dari Ideal</p>
				<input class="btn btn-success btn-block" type="submit" name="daftar" value="DAFTAR">
			</div>
		</form>
		<div class="border-p"></div>
				<p class="daftarp"> ATAU </p>
			<div>
				<a href="daftarfb.php" style="text-decoration: none;"><button class="btn btn-default btn-block btndaftar btnloginsosmed" style="margin-bottom:10px;"><img src="icon/fblogo.png" style="float:left;">Daftar dengan Facebook</button></a>

				<a href="#" style="text-decoration: none;"><button class="btn btn-default btn-block btndaftar btnloginsosmed" "><img src="icon/glogo.png" style="float:left;">Daftar dengan Google</button></a>
				<p style="margin-left:70px;">Sudah punya akun? <a style="color:green;" href="login.php">Silahkan Login</a></p>
			</div>
		</div>
		<?php 
			if (isset($_POST['daftar'])) {
				$con=mysqli_query($koneksi, "INSERT INTO user (nama, email, password, jenis_kelamin,alamat,telepon) VALUES ('$_POST[nama]','$_POST[email]','$_POST[password]','$_POST[option]','$_POST[alamat]','$_POST[telepon]')");
				echo "<script>alert('Daftar sukses!');</script>";
				echo "<meta http-equiv='refresh' content='1;url=login.php'>";
			}
		 ?>

	</div>
</body>
</html>