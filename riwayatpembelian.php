<div class="container">
	<h2>Riwayat Pembelian</h2>	
	<br>
	<input class="form-control" id="myInput" type="text" placeholder="Cari riwayat beli ...">
	<br/>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>No Pembelian</th>
				<th>Tanggal Pembelian</th>
				<th>Total Beli</th>
				<th>Alamat Pengiriman</th>
				<th>Status</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody id="myTable">
			<?php $nomor=1; ?>
			<?php 
				$hal=10;
				$page=isset($_GET["hal"]) ? (int)$_GET["hal"] : 1;
				$mulai=($page > 1) ? ($page * $hal) - $hal : 0;
				$qriwayat=mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_user='$data[id_user]'");
				$total = mysqli_num_rows($qriwayat);
				$pages = ceil($total/$hal);
				$query1 = mysqli_query($koneksi,"SELECT * FROM pembelian WHERE id_user='$data[id_user]' LIMIT $mulai, $hal");

				$nomor=$mulai+1;

				while($riwayatbeli=$query1->fetch_assoc()) {
			 ?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $riwayatbeli['id_pembelian']; ?></td>
				<td><?php echo $riwayatbeli['tanggal_pembelian']; ?></td>
				<td>Rp. <?php echo number_format($riwayatbeli['total_pembelian']); ?>,-</td>
				<td><?php echo $riwayatbeli['alamat_pengiriman']; ?></td>
				<td><?php echo $riwayatbeli['status_pembelian']; ?></td>
				<td>
					<a href="index.php?halaman=nota&id=<?php echo $riwayatbeli['id_pembelian']; ?>" class="text-primary" title="Nota"><i class="fas fa-sticky-note fa-lg"></i></a> <br/>
					<a href="index.php?halaman=profil&page=konfirmasipembayaran&id=<?php echo $riwayatbeli['id_pembelian']; ?>" class="text-success" title="Pembayaran"><i class="fas fa-money-bill-alt fa-lg"></i></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
	
	
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<div class="clearfix">
				<span class="float-right">
					<ul class="pagination pagination-sm">
						<li class="page-item"><a class="page-link" href="#">Previous</a></li>
						<?php for ($i=1; $i<=$pages; $i++){ ?>
						<li class="page-item"><a class="page-link" href="index.php?halaman=profil&page=pembelian&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php } ?>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>
				</span>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<!--<?php //echo "<pre>";
	//print_r($data);
	//echo "</pre>";

 ?> !-->