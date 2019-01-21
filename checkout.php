<!--<?php 
	//session_start();
	//require_once 'cek.php';
	//require_once 'koneksi.php';
?>!-->
<?php
if(!isset($_SESSION['pelanggan'])) {
	echo "<script>alert('Silahkan login dulu');</script>";
	echo "<script>location='login.php';</script>";
}

?>
<?php 

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
	echo "<script>alert('keranjang kosong, silahkan belanja dulu!');</script>";
	echo "<script>location='index.php?halaman=cari';</script>";
}

?>
<section>
	<div class="container" style="margin-top: 160px; margin-bottom: 160px;">
		<div>
			<div class="alert alert-danger">
				<strong>Perhatian!</strong> Produk yang anda beli belum termasuk ongkos kirim. Silahkan hubungi penjual untuk biaya pengiriman. Terimakasih.
			</div>
		</div>
		<h2>Daftar Belanja</h2>
		<hr/>
		<table class="table table-bordered" width="500" border="1">
			<thead class="bg-light">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Harga Satuan /Kg</th>
					<th>Jumlah</th>
					<th>Subharga</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php $totalbelanja = 0; ?>
				<?php foreach ($_SESSION['keranjang'] as $kd_produk => $jumlah): ?>
					<?php $qkeranjang=mysqli_query($koneksi,"SELECT * FROM produk WHERE kd_produk='$kd_produk'"); 
					$belanja=$qkeranjang->fetch_assoc();
					$jumlahbeli=$belanja['minimum_beli']*$jumlah;
					$subharga=$belanja['harga']*$jumlahbeli;
 			//echo "<pre>";
 			//print_r($belanja);
 			//echo "</pre>";
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $belanja['nama_produk']; ?></td>
						<td>Rp. <?php echo number_format($belanja['harga']); ?>,-</td>
						<td><?php echo $jumlahbeli; ?></td>
						<td><?php echo number_format($subharga); ?></td>

					</tr>
					<?php $no++; ?>
					<?php $totalbelanja+=$subharga; ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja) ?></th>
				</tr>
			</tfoot>
		</table>
		<form method="post">
			<div class="row">
				<div class="col-md-3">
					<input class="form-control" type="text" title="nama pembeli" readonly value="<?php echo $_SESSION['pelanggan']['nama']; ?>">
				</div>
				<div class="col-md-3">
					<input class="form-control" type="text" title="no telepon" readonly value="<?php echo $_SESSION['pelanggan']['telepon']; ?>">
				</div>
				<div class="col-md-6">
					<textarea class="form-control" name="alamat_pengiriman" title="alamat pengiriman" placeholder="Masukan alamat pengiriman lengkap dengan kode pos!" required="Masukan alamat" rows="2"></textarea>
				</div>
			</div>
			<div class="clearfix">
				<span class="float-right">
					<input class="btn btn-success btn-sm mt-2 float-left" type="submit" name="bayar" value="BAYAR SEKARANG">
				</span>
			</div>
		</form>
		<?php 
		if(isset($_POST['bayar'])){

			$idpembeli = $_SESSION['pelanggan']['id_user'];
			$tanggal_pembelian= date('Y-m-d');
			$alamat_pengiriman=$_POST['alamat_pengiriman'];
			$totalbeli=$totalbelanja;

			$query=mysqli_query($koneksi,"INSERT INTO pembelian (id_user,tanggal_pembelian,total_pembelian,alamat_pengiriman) VALUES ('$idpembeli','$tanggal_pembelian','$totalbeli','$alamat_pengiriman')") or die("error");

			$id_pembelian_barusan = $koneksi->insert_id;

			foreach ($_SESSION['keranjang'] as $kd_produk => $jumlah_produk) 
			{
				
				$query1=mysqli_query($koneksi,"SELECT * FROM produk WHERE kd_produk='$kd_produk'");
				$produk=$query1->fetch_assoc();
				$nama_produk=$produk['nama_produk'];
				$berat_produk=$produk['berat'];
				$harga_produk=$produk['harga'];
				$jumlahbeli=$produk['minimum_beli']*$jumlah_produk;
				$subberat = $produk['berat']*$jumlahbeli;
				$subharga = $produk['harga']*$jumlahbeli;
				$query2=mysqli_query($koneksi,"INSERT INTO pembelian_produk (id_pembelian,kd_produk,jumlah_produk,nama,berat,harga,subberat,subharga) VALUES ('$id_pembelian_barusan','$kd_produk','$jumlahbeli','$nama_produk','$berat_produk','$harga_produk','$subberat','$subharga')") or die("error");
			}

			unset($_SESSION['keranjang']);

			echo "<script>alert('Pembelian sukses!');</script>";
			echo "<script>location='index.php?halaman=nota&id=$id_pembelian_barusan';</script>";

		}

		?>
	</div>
</section>

<!--<?php //print_r($_SESSION['pelanggan']) ?>
 <?php //print_r($_SESSION['keranjang']) ?> !-->