<?php 
$qdata = mysqli_query($koneksi, "SELECT * FROM produk JOIN user ON produk.id_user=user.id_user JOIN kategori ON produk.kd_kategori=kategori.kd_kategori WHERE produk.kd_produk='$_GET[id]' ");
$qpetani=$qdata->fetch_assoc();

?>

<div class="container w-75 mx-auto mb-5">
	<div class="row">
		<div class="col-12 col-md-6 col-lg-6 mt-5">
			<h4 class="text-success"><strong>Ubah Produk</strong></h4>
		</div>
	</div>
	
	<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nama">Nama :</label>
				<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $qpetani['nama_produk']; ?>">
			</div>
			<div class="form-group">
			  <label for="gender">Jenis Produk: (<i>Sayuran, Buah-buahan, Bumbu, Lain-lain</i>)</label>
			  	<select class="form-control" id="kategori" name="kategori" required="Tidak boleh kosong">
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
	      	</div>
			<div class="form-group mt-3">
				<label for="berat">Berat :   <i>/Kg</i></label>
				<input type="number" class="form-control" id="berat" name="berat" value="<?php echo $qpetani['berat']; ?>">
			</div>

			<div class="form-group">
				<label for="jumlah">Jumlah : <i>Kg</i></label>
				<input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $qpetani['jumlah']; ?>">
			</div>
			<div class="form-group">
				<label for="beli">Minimum Beli :  <i>Kg</i></label>
				<input type="number" class="form-control" id="beli" name="beli" value="<?php echo $qpetani['minimum_beli']; ?>">
			</div>
			<div class="form-group">
				<label for="harga">Harga :  <i>Rp.</i></label>
				<input type="number" class="form-control" id="harga" name="harga" value="<?php echo $qpetani['harga']; ?>">
			</div>
			<div class="form-group">
				<label for="deskripsi">Deskripsi :</label>
				<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo $qpetani['deskripsi']; ?></textarea>
			</div>
			<div class="form-group">
				<img src="img-produk/<?php echo $qpetani['foto']; ?>" width="200">
			</div>
			<div class="form-group">
				<label>Foto :</label>
				<input type="file" class="form-control-file border" name="foto">
			</div>

			<div class="form-group">
				<input class="btn btn-success btn-block" type="submit" name="edit" value="SIMPAN">
			</div>
		</form>
</div>
<?php 
	if (isset($_POST["edit"])) {
		$img_produk=$_FILES['foto']['name'];
		$lokasifoto=$_FILES['foto']['tmp_name'];
	
			if (!empty($lokasifoto)) {
				move_uploaded_file($lokasifoto, "img-produk/$img_produk");

				$query=mysqli_query($koneksi,"UPDATE produk SET nama_produk='$_POST[nama]',kd_kategori='$_POST[kategori]',berat='$_POST[berat]',jumlah='$_POST[jumlah]',harga='$_POST[harga]',foto='$img_produk',minimum_beli='$_POST[beli]',deskripsi='$_POST[deskripsi]' WHERE kd_produk='$qpetani[kd_produk]'");
			}else{
				$query=mysqli_query($koneksi,"UPDATE produk SET nama_produk='$_POST[nama]',kd_kategori='$_POST[kategori]',berat='$_POST[berat]',jumlah='$_POST[jumlah]',harga='$_POST[harga]',minimum_beli='$_POST[beli]',deskripsi='$_POST[deskripsi]' WHERE kd_produk='$qpetani[kd_produk]'");
			}
				
			echo "<script>alert('Data produk berhasil diubah');</script>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=profil&page=produkku'>";	
		
	}
?>