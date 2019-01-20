<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'ideals';
$koneksi = mysqli_connect($server,$username,$password,$database);

if (mysqli_connect_errno()) {
	echo "Gagal konek ke database :".mysqli_connect_errno();
}else{
	//echo "koneksi sukses";
}
?>