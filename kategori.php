<div class="row my-2">
	<?php
	$kd_kategori = $_GET["id"];
	$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE kd_kategori='$kd_kategori' ORDER BY kd_produk");?>
	<?php while ($perproduk=$produk->fetch_assoc()) { ?>
	<div class="col-12 col-md-6 col-lg-4" style="padding-bottom:15px; ; margin-top: 7px;">
		<div class="img-thumbnail kontainer shadow bg-white rounded">
			<a href="index.php?halaman=detail&id=<?php echo $perproduk['kd_produk'];?>">
				<div class="card-body" style="text-align:center; overflow:hidden; padding:0;">

					<img class="image img-fluid mx-auto" alt="Responsive image" style="height:250px; width:250px ;  "; src="img-produk/<?php echo $perproduk['foto'];?>"> 
					<div class="middle">
						<div class="tombol">Lihat Detail</div>
					</div>

				</a>
			</div>
		</div>
		<div class="card-footer text-center">
			<div class="caption">
				<a class="link-text" href="detail_produk.php?id=<?php echo $perproduk['kd_produk'];?>">
					<h6 class="link-text text-success"><strong> <?php echo $perproduk['nama_produk']; ?></strong></h6></a>
					<h6 style="color:orange"> Rp. <?php echo number_format($perproduk['harga']);?>,- /Kg</h6>
					<h6 class="text-secondary">Minimum Pembelian <?php echo number_format($perproduk['minimum_beli']);?> Kg</h6>

				</div>
			</div>
		</div>
		<?php } ?>	
	</div>

