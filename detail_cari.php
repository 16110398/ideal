<div class="container mb-5" style="margin-top: 85px">	               
  <ul class="breadcrumb">
    <li class="breadcrumb-item "><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active ">Produk</li>
  </ul>

  <?php 
    if (isset($_GET['cari'])) {
     $cari = $_GET['cari'];
     echo "<h5 class='text-success'><strong>Hasil Pencarian : $cari</strong></h5>";
  }
  ?>


	<div class="row my-2">
		<div class="col-12 col-md-3 col-lg-3">
			<div class="my-1">

   				<form class="form-group mx-auto" method="post">
   					<label for="sel1">Filter Produk : </label>
						<select class="form-control" name="id_filter" onchange="this.form.submit();">
							<?php 
								$query="SELECT * FROM kategori";
								$qkategori=mysqli_query($koneksi, $query);
								while ($kategori=mysqli_fetch_array($qkategori)) {
									?>
									<option value="<?php echo $kategori['kd_kategori'];?>"><?php echo $kategori['nama_kategori']; ?></option>
									<?php
								}
							?>
						</select>
   					<label for="sel2">Urutkan : </label>
						<select class="form-control" name="id_urutan" onchange="this.form.submit();">
						   <option>Terbaru</option>
						   <option>Terlama</option>
						   <option>Harga Tertinggi</option>
						   <option>Harga Terendah</option>
						</select>
   				</form>
			</div>
		</div>
		<div class="col-12 col-md-9 col-lg-9">
			<?php 
			if (isset($_GET['pages'])) {
				if ($_GET['pages']=="kategori") {
					include 'kategori.php';
				}

			}
			else
			{
				include 'allproduk.php';
			}

			?>

		</div>

	</div>

<ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
    <?php for ($i=1; $i<=$pages; $i++){ ?>
	<li class="page-item"><a class="page-link" href="index.php?halaman=cari&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	<?php } ?>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
  </ul>
</div>
