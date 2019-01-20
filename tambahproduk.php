<div class="container w-75 mb-5">
	<div class="row">
		<div class="col-12 col-md-6 col-lg-6 mt-5">
			<h4 class="text-success mb-5"><strong>Tambah Produk</strong></h4>
		</div>
	</div>
	
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nama">Nama Produk :</label>
			<input type="text" class="form-control" id="nama" name="nama" required="Nama tidak boleh kosong">
		</div>
		<div class="form-group">
			<label for="gender">Jenis Produk : (<i>Sayuran, Buah, Bumbu, Bijian/Kacang, Beras</i>)</label>
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
			<input type="number" class="form-control" id="berat" name="berat" required="Tidak boleh kosong">
		</div>
		<div class="form-group">
			<label for="jumlah">Jumlah :   <i>/Kg</i></label>
			<input type="number" class="form-control" id="jumlah" name="jumlah" required="Tidak boleh kosong">
		</div>
		<div class="form-group">
			<label for="beli">Minimum Beli :  <i>Kg</i></label>
			<input type="number" class="form-control" id="beli" name="minimbeli" required="Tidak boleh kosong">
		</div>
		<div class="form-group">
			<label for="harga">Harga :  <i>Rp.</i></label>
			<input type="number" class="form-control" id="harga" name="harga" required="Tidak boleh kosong">
		</div>
		<div class="form-group">
			<label for="deskripsi">Deskripsi :</label>
			<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
		</div>
		
		<div class="form-group">
			<label>Foto :</label>
			<input type="file" class="form-control-file border" name="foto">
		</div>

		<div class="form-group">
			<input class="btn btn-success btn-block" type="submit" name="simpan" value="SIMPAN">
		</div>
	</form>
</div>
<?php 
if (isset($_POST['simpan']))
{

	$nama=$_POST['nama'];
	$kategori=$_POST['kategori'];
	$berat=$_POST['berat'];
	$jumlah=$_POST['jumlah'];
	$deskripsi=$_POST['deskripsi'];
	$harga=$_POST['harga'];
	$minimbeli=$_POST['minimbeli'];

	$fotoproduk=$_FILES['foto']['name'];
	$lokasi=$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "img-produk/".$fotoproduk);

	//$cek="SELECT ternak.id_user FROM ternak, pelanggan WHERE ternak.id_user=pelanggan.id_user AND (ternak.id_user=$data[id_user])";


	$con=mysqli_query($koneksi, "INSERT INTO produk(id_user,nama_produk,kd_kategori,berat,jumlah,harga,foto,minimum_beli,deskripsi) VALUES('$data[id_user]','$nama','$kategori','$berat','$jumlah','$harga','$fotoproduk','$minimbeli','$deskripsi');") or die("error");
	
	echo "<script>alert('Produk berhasil ditambahkan');</script>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=profil&page=produkku'>";
	
}
?>