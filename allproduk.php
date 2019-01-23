<div class="row my-2">
	<?php 
	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		$hal=15;
		$page=isset($_GET["hal"]) ? (int)$_GET["hal"] : 1;
		$mulai=($page > 1) ? ($page * $hal) - $hal : 0;
		$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk like '%".$cari."%' ");
		$total = mysqli_num_rows($produk);
		$pages = ceil($total/$hal);
		$produk2 = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk like '%".$cari."%' LIMIT $mulai, $hal ");
		
	}else{
		$hal=15;
		$page=isset($_GET["hal"]) ? (int)$_GET["hal"] : 1;
		$mulai=($page > 1) ? ($page * $hal) - $hal : 0;
		$produk = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kd_produk DESC");
		$total = mysqli_num_rows($produk);
		$pages = ceil($total/$hal);

		$produk2 = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kd_produk DESC LIMIT $mulai, $hal");
	}
	?>
	<?php 
	require_once 'produk2.php';
	?>
</div>

