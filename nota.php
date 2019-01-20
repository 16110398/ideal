
<section>
	<div class="container" style="margin-top: 160px; margin-bottom: 180px;">
		<h2>Nota Pembelian</h2>
		<hr>
		<?php 
		$query = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN user ON pembelian.id_user=user.id_user WHERE pembelian.id_pembelian='$_GET[id]'");
		$nota = $query->fetch_assoc();
		?>

		<div class="row">
			<div class="col-md-4">
				<h4>Pembelian</h4>
				<strong>No. Pembelian : <?php echo $nota['id_pembelian']; ?></strong>
				<p>
					Tanggal : <?php echo $nota['tanggal_pembelian']; ?><br>
					Total   : Rp. <?php echo number_format($nota['total_pembelian']); ?>,-
				</p>
			</div>

			<div class="col-md-4">
				<h4>Pelanggan</h4>
				<strong><?php echo $nota['nama']; ?></strong><br>
				<p>
					<?php echo $nota['telepon']; ?><br>
					<?php echo $nota['email']; ?>
				</p>
			</div>

			<div class="col-md-4">
				<h4>Pengiriman</h4>
				<p><strong>Alamat </strong>: <?php echo $nota['alamat']; ?></p>
			</div>
		</div>
		<table class="table table-bordered" width="500" border="1">
			<thead class="bg-light">
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Berat</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subberat</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $conquery=mysqli_query($koneksi,"SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
				<?php while ($detail=$conquery->fetch_assoc()){ ?>

				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $detail['nama']; ?></td>
					<td><?php echo $detail['berat']; ?> Kg</td>
					<td>Rp. <?php echo number_format ($detail['harga']); ?>,-</td>
					<td><?php echo $detail['jumlah_produk']; ?></td>
					<td><?php echo $detail['subberat']; ?> Kg</td>
					<td>Rp. <?php echo number_format ($detail['subharga']); ?>,-</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
		<div class="row">
			<div class="col-md-7">
				<div class="alert alert-info">
					Silahkan melakukan pembayaran sebesar <strong>Rp. <?php echo number_format($nota['total_pembelian']); ?>,-</strong> ke nomor rekening <strong>BNI 0264659916/BRI 04252774164/Mandiri 032874151/BCA 057465646</strong> a.n <strong>Ideals.id</strong>
				</div>
			</div>
			
		</div>
	</div>
</section>


 <?php 
echo "<pre>";
print_r($detail);
echo "</pre>";

  ?>
