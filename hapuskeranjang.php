<?php 
session_start();

$kd_produk = $_GET['id'];
unset($_SESSION['keranjang'][$kd_produk]);

echo "<script>alert('produk dihapus dari keranjang');</script>";
echo "<script>location='index.php?halaman=keranjang';</script>";

 ?>