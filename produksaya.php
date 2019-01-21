<div class="container">
  <div class="clearfix">
    <span class="float-left"><h2>Dagangan Saya</h2></span>
    <span class="float-right"><a href="index.php?halaman=profil&page=tambahproduk" class="btn btn-success btn-sm">Jualan Produk</a></span>
  </div>
  
  <br>
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#allternak">Semua Produk</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#terjual">Produk terjual</a>
    </li>
  </ul>

  
  <div class="tab-content">
    <div id="allternak" class="container tab-pane active"><br>
      <h3>Produk Saya</h3>
      <div class="row">
        <?php 
        $produk = mysqli_query($koneksi, "SELECT * FROM produk JOIN user ON produk.id_user=user.id_user WHERE produk.id_user='$data[id_user]' "); ?>
        <?php while ($perproduk=$produk->fetch_assoc()) { ?>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3" style="padding-bottom:15px; ; margin-top: 7px;">
          <div class="card bg-white border">
            <div class="kontainer bg-white rounded">
              
              <div class="card-body line" style="text-align:center; overflow:hidden; padding:0;">
                <img class="image img-fluid mx-auto" alt="responsive image" style="height:150px; width:100% ;" src="img-produk/<?php echo $perproduk['foto'];?>"> 
                <div class="middle">
                  <a class="text-success" href="index.php?halaman=detail&id=<?php echo $perproduk['kd_produk'];?>" title="Lihat"><i class="fas fa-eye fa-lg"></i></a>
                  <a class="ml-2 mr-2" href="index.php?halaman=profil&page=editproduk&id=<?php echo $perproduk['kd_produk'];?>" title="Edit"><i class="fas fa-edit fa-lg"></i></a>
                  <a class="text-danger" href="index.php?halaman=profil&page=hapusproduk&id=<?php echo $perproduk['kd_produk'];?>" title="Hapus"><i class="fas fa-trash-alt fa-lg"></i></a>
                </div>                           
              </div>
            </div>
            <div class="card-footer text-center">
              <div class="caption">
                <a class="link-text" href="index.php?halaman=detail&id=<?php echo $perproduk['kd_ternak'];?>">
                  <h6 class="link-text text-success"><strong> <?php echo $perproduk['nama_produk']; ?></strong></h6></a>
                  <h6 style="color:orange"> Rp. <?php echo number_format($perproduk['harga']);?>,- /Kg</h6>
                  <h6 class="text-secondary">Jumlah Stok <?php echo number_format($perproduk['jumlah']);?> Kg</h6>
                </div>
              </div>  
            </div>
          </div>    
          <?php } ?>  
        </div><!-- row!-->                
      </div>
      <div id="terjual" class="container tab-pane fade"><br>
        <h4>Produk Terjual</h4>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No_Pembelian</th>
              <th>Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Alamat Pengiriman</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
