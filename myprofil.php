<div class="container my-3 ml-3">
	<h2>Selamat datang, <?php echo $data['nama']; ?></h2>
</div>
<br>
<div class="container my-3 ml-3">
	<h5>Profil Saya</h5>
	<p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
	<hr>
	<br>
	<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label for="nama">Nama :</label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
				</div>
				<div class="form-group">
					<label for="gender">Jenis Kelamin :</label>
				</div>
				<div class="form-check-inline">
					<label class="form-check-label" for="men">
						<input type="radio" class="form-check-input" id="men" name="jenis_kelamin" value="Laki-laki" checked>Laki-laki
					</label>
				</div>
				<div class="form-check-inline">
					<label class="form-check-label" for="women">
						<input type="radio" class="form-check-input" id="women" name="jenis_kelamin" value="Perempuan">Perempuan
					</label>
				</div>
				<div class="form-group">
					<br>
					<label for="email">Email :</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>">
				</div>
				<div class="form-group">
					<label for="pass">Password :</label>
					<input type="password" class="form-control" id="pass" name="password"  required="Masukan password"  placeholder="Masukan password">
				</div>
				<div class="form-group">
					<label for="telepon">Telepon :</label>
					<input type="number" class="form-control" id="telepon" name="telepon"  required="Masukkan telepon" value="<?php echo $data['telepon']; ?>">
				</div>
				<div class="form-group">
					<label for="alamat">Alamat :</label>
					<textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $data['alamat']; ?></textarea>
				</div>
			</div>

			
			<div class="col-6">
				<div class="card border-top-0 border-right-0 border-bottom-0 rounded-0">
					<div class="form-group ml-3 my-1">
						<img src="foto_user/<?php echo $data['foto_user'] ?>" width="200">
					</div>
					<div class="form-group ml-3">
						<label>Foto :</label>
						<input type="file" class="form-control-file border" name="foto_user">
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-5 mx-auto">
			<input class="btn btn-success btn-block" type="submit" name="edit" value="UBAH PROFIL">
		</div>
	</form>
</div>
<?php 
if (isset($_POST['edit']))
{
	$img_profil=$_FILES['foto_user']['name'];
	$lokasifoto=$_FILES['foto_user']['tmp_name'];
	
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$alamat=$_POST['alamat'];
	$telepon=$_POST['telepon'];
	//jika foto dirubah
	if(!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "foto_user/$img_profil");

		$query=mysqli_query($koneksi, "UPDATE user SET id_user='$data[id_user]',nama='$nama',email='$email',password='$password',jenis_kelamin='$jenis_kelamin',foto_user='$img_profil',alamat='$alamat',telepon='$telepon' WHERE id_user='$data[id_user]'") or die ("error");
	}
	else
	{
		$query=mysqli_query($koneksi, "UPDATE user SET id_user='$data[id_user]',nama='$nama',email='$email',password='$password',jenis_kelamin='$jenis_kelamin',alamat='$alamat',telepon='$telepon' WHERE id_user='$data[id_user]'") or die ("error");

	}
	echo "<script>alert('Data profil berhasil diubah');</script>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=profil&pages=myprofil'>";

}

?>