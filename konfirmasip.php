<?php 
	$idpembelian = $_GET['id'];
	$qpembelian = mysqli_query($koneksi,"SELECT * FROM pembelian WHERE id_pembelian='$idpembelian'");
	$datapembelian=$qpembelian->fetch_assoc();

	$id_pelanggan_beli = $datapembelian['id_user'];

	$id_pelanggan_login = $_SESSION['pelanggan']['id_user'];

	if ($id_pelanggan_login !==$id_pelanggan_beli) {
		echo "<script>alert('Anda tidak memiliki akses!');</script>";
		echo "<script>location='index.php?halaman=profil&page=pembelian';</script>";
		exit();
	}
 ?>

 <!--<?php 
 	//echo "<pre>";
 	//print_r($datapembelian);
 	//print_r($_SESSION);
 	//echo "</pre>";
  ?> !-->
<div class="container ml-5 my-4">
	<h2 class="ml-4">Konfirmasi Pembayaran</h2>
	<br>
	<div class="alert alert-info w-50 ml-4">
		<p><b>Kirim bukti pembayaran anda disini :</b></p>
	</div>
	

	<form method="post" enctype="multipart/form-data" class="form-group w-50 ml-4">
		<hr>
		<label>No Rekening : </label>
		<input type="text" class="form-control" name="norekening" required="Masukkan Rekening">
		<label>Bank : </label>
		<input type="text" class="form-control" name="bank" required="Masukkan Bank">
		<label>Nama : </label>
		<input type="text" class="form-control" name="nama" required="Masukkan nama">
		<label>Jumlah Bayar : </label>
		<input type="number" class="form-control" name="jml" required="Masukkan jumlah bayar">
		<label>Bukti Transfer : </label><br>
		<label><i class="text-danger">Bukti transfer harus .JPG maksimal 5MB</i></label>
		<input type="file" class="form-control-file border" name="bukti">
		<br>
		<button type="submit" name="kirim" class="btn btn-success btn-block">KIRIM</button>
	</form>
</div>

<?php 
	if (isset($_POST["kirim"])) {

		$bukti = $_FILES["bukti"]["name"];
		$lokasibukti = $_FILES["bukti"]["tmp_name"];
		$namafiks = date("YmdHis").$bukti;
		move_uploaded_file($lokasibukti, "bukti_transfer/$bukti");

		$nama=$_POST["nama"];
		$bank=$_POST["bank"];
		$no_rekening=$_POST["norekening"];
		$jumlah_bayar=$_POST["jml"];
		$tanggal = date("Y-m-d");

		$querypembayaran=mysqli_query($koneksi, "INSERT INTO pembayaran(id_pembelian,nama,bank,no_rekening,jumlah_bayar,tanggal,bukti) VALUES ('$idpembelian','$nama','$bank','$no_rekening','$jumlah_bayar','$tanggal','$bukti')") or die ("error");

		$querypembayaran1=mysqli_query($koneksi,"UPDATE pembelian SET status_pembelian='sudah dibayar' WHERE id_pembelian='$idpembelian' ");

		echo "<script>alert('Pembayaran sukses!');</script>";
			echo "<script>location='index.php?halaman=profil&page=pembelian';</script>";

	}


 ?>