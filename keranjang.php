<!--<?php 
//session_start();
//echo "<pre>";
//print_r($_SESSION['keranjang']);
//echo "</pre>"
?>!-->
<?php 

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
	echo "<script>alert('keranjang kosong, silahkan belanja dulu!');</script>";
	echo "<script>location='index.php?halaman=cari';</script>";
}

?>
<section>
	<div class="container" style="margin-top: 180px; margin-bottom: 160px;">
		<h1>Keranjang Belanja</h1>
		<hr/>
		<table class="table table-bordered" width="500" border="1">
			<thead class="bg-light">
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga Satuan /Kg</th>
					<th>Jumlah</th>
					<th>Subharga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php foreach ($_SESSION['keranjang'] as $kd_produk => $jumlah): ?>
					<?php $qkeranjang=mysqli_query($koneksi,"SELECT * FROM produk WHERE kd_produk='$kd_produk'"); 
					$belanja=$qkeranjang->fetch_assoc();
					$jumlahbeli=$jumlah;
					$subharga=$belanja['harga']*$jumlahbeli;
					
 			//echo "<pre>";
 			//print_r($belanja);
 			//echo "</pre>";
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $belanja['nama_produk']; ?></td>
						<td>Rp. <?php echo number_format($belanja['harga']); ?>,-</td>
						<td><?php echo $jumlah; ?> Kg</td>
						<td><?php echo number_format($subharga); ?></td>
						<td>
							<a title="hapus" href="hapuskeranjang.php?id=<?php echo $kd_produk; ?>"><i class="fas fa-trash-alt fa-lg"></i></a>
						</td>
					</tr>
					<?php $no++; ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<div class="clearfix">
			<span class="float-left"><a class="btn btn-success btn-sm" href="index.php?halaman=cari">Lanjutkan Belanja</a></span>
			<span class="float-right"><a class="btn btn-danger btn-sm" href="index.php?halaman=checkout">Checkout</a></span>
		</div>
	</div>
</section>