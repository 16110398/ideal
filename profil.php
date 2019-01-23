<?php 
  if(!isset($_SESSION['pelanggan'])) {
     header('location:login.php'); 
  } else { 
     $data = $_SESSION['pelanggan']; 
  }
  require_once 'cek.php';
?>
<div class="container-fluid" style="margin-top: 95px; margin-bottom: 50px;">
  <div class="row">
    
  </div>
  <div class="row">
    <div class="col-12 col-md-3 col-lg-3 mb-1">
      <div class="card">

        <div class="container">
        <div class="row">
          <div class="col-12 mt-3">
             <img class="rounded-circle mx-auto d-block img-fluid" src="foto_user/<?php echo $data['foto_user']; ?>" height="150" width="150">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-12">
            <a href="index.php?halaman=profil" style="text-decoration: none;"><h6 class="text-dark"><i class="fas fa-user"></i>  <strong>Akun Saya</strong></h6></a>
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h6 class="text-success"><i class="fas fa-id-card"></i>  <strong><?php echo $data['nama']; ?></strong></h6>
            <hr>
          </div>
        </div>
         <div class="row">
          <div class="col-12">
            <h6 class="text-success"><i class="fas fa-phone"></i>  <?php echo $data['telepon']; ?></h6>
            <hr>
          </div>
        </div>
         <div class="row">
          <div class="col-12">
            <h6 class="text-success"><i class="fas fa-envelope"></i></i>  <?php echo $data['email']; ?></h6>
            <hr>
          </div>
        </div>
         <div class="row">
          <div class="col-12">
            <h6 class="text-success"><i class="fas fa-map-marker-alt"></i>  <?php echo $data['alamat']; ?></h6>
            <hr>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-12">
            <h6 class="text-dark"><strong>Produk Saya</strong></h6>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <a class="text-success" href="index.php?halaman=profil&page=produkku" style="text-decoration: none;"><strong><i class="fas fa-tags"></i> Produk</strong></a>
          </div>
        </div>
        <hr>
        <div class="row mb-3">
          <div class="col-12">
            <h6 class="text-dark"><strong>Transaksi Saya</strong></h6>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <a class="text-success" href="index.php?halaman=profil&page=produkku" style="text-decoration: none;"><strong><i class="far fa-money-bill-alt"></i> Transaksi Penjualan</strong></a>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <a class="text-success" href="index.php?halaman=profil&page=pembelian" style="text-decoration: none;"><strong><i class="far fa-money-bill-alt"></i> Transaksi Pembelian</strong></a>
          </div>
        </div>
        

        <hr>
         <div class="row mb-3">
          <div class="col-12">
            <h6 class="text-dark"><strong>Kotak Masuk</strong></h6>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <a class="text-success" href="index.php?halaman=profil&page=pesan" style="text-decoration: none;"><strong><i class="fas fa-envelope"></i> Pesan</strong></a>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <a class="text-success" href="index.php?halaman=profil&page=komentar" style="text-decoration: none;"><strong><i class="fas fa-comment-dots"></i> Komentar</strong></a>
          </div>
        </div>

      </div>
      </div>
    </div>

    <div class="col-12 col-md-9 col-lg-9">
      <div class="card h-100">
          <div class="container mt-4">
              <?php 
                if (isset($_GET['page'])) 
                {
                  if ($_GET['page']=="edit") {
                    include 'editprofil.php';
                  }
                  if ($_GET['page']=="editproduk") {
                    include 'editproduk.php';
                  }
                  if ($_GET['page']=="tambahproduk") {
                    include 'tambahproduk.php';
                  }
                  if ($_GET['page']=="produkku") {
                    include 'produksaya.php';
                  }
                  if ($_GET['page']=="hapusproduk") {
                    include 'hapusproduk.php';
                  }
                  if ($_GET['page']=="pembelian") {
                    include 'riwayatpembelian.php';
                  }
                  if ($_GET['page']=="penjualan") {
                    include 'riwayatpenjualan.php';
                  }
                   if ($_GET['page']=="konfirmasipembayaran") {
                    include 'konfirmasip.php';
                  }

                }else{
                  include 'myprofil.php';
                }

               ?>
          </div>
      </div>
    </div>

  </div>
</div>


