<section>
	<div class="container">
		<div class="row">
			<?php 
				if (isset($_GET['cari'])) {
				  	$cari = $_GET['cari'];
				  	$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk like '%".$cari."%' ");
            	echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=cari&cari=$cari'>";		
				}
			?>
		</div>
	</div>
</section>
<div class="container" style="margin-top: 70px;">
	<div class="row mx-auto">
	<div id="ideal" class="carousel slide" data-ride="carousel" style="margin-top: 10px;">
	  <ul class="carousel-indicators">
	    <li data-target="#ideal" data-slide-to="0" class="active"></li>
	    <li data-target="#ideal" data-slide-to="1"></li>
	    <li data-target="#ideal" data-slide-to="2"></li>
	  </ul>
	  
	  
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="img/banner1.png" alt="ideal-1" width="1000" height="300">
	    </div>
	    <div class="carousel-item">
	      <img src="img/banner2.png" alt="ideal-2" width="1100" height="500">
	    </div>
	    <div class="carousel-item">
	      <img src="img/banner3.png" alt="ideal-3" width="1100" height="500">
	    </div>
	  </div>
	  
	 
	  <a class="carousel-control-prev" href="#ideal" data-slide="prev">
	    <span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#ideal" data-slide="next">
	    <span class="carousel-control-next-icon"></span>
	  </a>
	</div>
</div>
</div>

  
<div class="container mx-auto" style="margin-top: 10px;">
	<div class="card mb-5">
	    <div class="card-header bg-success">
	    	<div class="clearfix">
              <span class="float-left">  
                <h5 class="text-white"><strong>Produk Terbaru</strong></h5>
              </span>
              <span class="float-right">
                <a href="index.php?halaman=cari" class="text-white">Selengkapnya <i class="fas fa-angle-double-right fa-sm"></i></a>
              </span>
          </div>
	    </div>
	    <div class="card-body">
	    	<div class="row">
	    	<?php $produk = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kd_produk DESC LIMIT 12"); ?>
	    	<?php while ($perproduk=$produk->fetch_assoc()) { ?>
	    	<div class="col-12 col-md-6 col-lg-3" style="padding-bottom:15px; ; margin-top: 7px;">
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
	    				<a class="link-text" href="index.php?halaman=detail&id=<?php echo $perproduk['kd_produk'];?>">
	    					<h6 class="link-text text-success"><strong> <?php echo $perproduk['nama_produk']; ?></strong></h6></a>
	    					<h6 style="color:orange"> Rp. <?php echo number_format($perproduk['harga']);?>,- /Kg</h6>
	    					<h6 class="text-secondary">Minimum Pembelian <?php echo number_format($perproduk['minimum_beli']);?> Kg</h6>

	    				</div>
	    			</div>
	    		</div>
	    		<?php } ?>	
	    	</div>
	    </div> 
  </div>


  <div class="card mb-5">
	    <div class="card-header bg-success">
	    	<div class="clearfix">
              <span class="float-left">  
                <h5 class="text-white"><strong>Sayuran Terbaru</strong></h5>
              </span>
              <span class="float-right">
                <a href="index.php?halaman=cari" class="text-white">Selengkapnya <i class="fas fa-angle-double-right fa-sm"></i></a>
              </span>
          </div>
	    </div>
	    <div class="card-body">
	    	<div class="row">
	    	<?php $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE kd_kategori='1' ORDER BY kd_produk DESC LIMIT 8");?>
	    	<?php while ($perproduk=$produk->fetch_assoc()) { ?>
	    	<div class="col-12 col-md-6 col-lg-3" style="padding-bottom:15px; ; margin-top: 7px;">
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
	    </div> 
  </div>


  <div class="card mb-5">
	    <div class="card-header bg-success">
	    	<div class="clearfix">
              <span class="float-left">  
                <h5 class="text-white"><strong>Buah-Buahan Terbaru</strong></h5>
              </span>
              <span class="float-right">
                <a href="index.php?halaman=cari" class="text-white">Selengkapnya <i class="fas fa-angle-double-right fa-sm"></i></a>
              </span>
          </div>
	    </div>
	    <div class="card-body">
	    	<div class="row">
	    	<?php $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE kd_kategori='2' ORDER BY kd_produk DESC LIMIT 8");?>
	    	<?php while ($perproduk=$produk->fetch_assoc()) { ?>
	    	<div class="col-12 col-md-6 col-lg-3" style="padding-bottom:15px; ; margin-top: 7px;">
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
	    </div> 
  </div>
</div>



