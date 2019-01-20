<div class="row my-2">
	<?php 
	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk like '%".$cari."%' ");
		
	}else{
		$produk = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kd_produk DESC");
	}
	?>
	<?php 
	require_once 'produk2.php';
	?>
</div>