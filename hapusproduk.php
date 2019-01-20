<?php 
$hapusproduk=$koneksi->query("SELECT * FROM produk WHERE kd_produk='$_GET[id]'");
$hapus=$hapusproduk->fetch_assoc();
$fotoproduk = $hapus['foto'];
if (file_exists("img-produk/$fotoproduk")) 
{
	unlink("img-produk/$fotoproduk");
}

$koneksi->query("DELETE FROM produk WHERE kd_produk='$_GET[id]'");
echo "<script>alert('Produk sudah dihapus');</script>";
echo "<script>location='index.php?halaman=profil&page=produkku';</script>";
?>