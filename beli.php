<?php 
session_start();
$kd_produk = $_GET['id'];

if (isset($_SESSION['keranjang'][$kd_produk])) 
{
	$_SESSION['keranjang'][$kd_produk]+=1;
}
else
{
	$_SESSION['keranjang'][$kd_produk] = 1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='index.php?halaman=keranjang';</script>";

?>