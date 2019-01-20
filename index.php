<?php 
session_start();
require_once 'koneksi.php';


if(isset($_SESSION['pelanggan'])) {
  $data = $_SESSION['pelanggan']; 
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tempat Jual Beli Sayuran Terpercaya | Ideal.id</title>
	<link rel="icon" type="image/png" href="icon/logod-2.png">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/style.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="icon/fontawesome/css/all.css">
	<style>
  	.carousel-inner img {
      width: 100%;
      height: 100%;
 	}
 	</style>
</head>
<body>
 
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php"><img src="icon/logod-2.png" width="40px" title="Ideals.id"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-lg-4 ml-xl-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle my-2 ml-lg-5 ml-xl-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="index.php?halaman=cari&pages=kategori&id=1">Sayur Segar</a>
          <a class="dropdown-item" href="index.php?halaman=cari&pages=kategori&id=2">Buah-Buahan</a>
          <a class="dropdown-item" href="index.php?halaman=cari&pages=kategori&id=5">Bumbu dan Rempah</a>
          <a class="dropdown-item" href="index.php?halaman=cari&pages=kategori&id=3">Produk Organik</a>
          <a class="dropdown-item" href="index.php?halaman=cari&pages=kategori&id=4">Bijian dan Kacang</a>
          <a class="dropdown-item" href="index.php?halaman=cari&pages=kategori&id=6">Lain-lain</a>
        </div>
      </li>
    </ul>
     <form class="mx-3 my-auto d-inline w-50 ml-lg-4">
        <div class="input-group">
          <input type="text" class="form-control border" placeholder="Cari Sayuran ...?" name="cari">
      </div>
    </form>

   <ul class="navbar-nav ">
    <?php if(isset($_SESSION["pelanggan"])): ?>
      <li class="nav-item my-2 ml-lg-3 mr-lg-3">  
        <a href="index.php?halaman=profil&page=tambahproduk" class="btn btn-danger btn-sm my-1" type="submit" title="Jual Produk"><i class="fas fa-plus"></i> Jual Produk</a>  
      </li>
    <?php else: ?> 
      <li class="nav-item my-2 ml-lg-5 mr-lg-4">  
        <a href="login-petani.php" class="btn btn-danger btn-sm my-1" type="submit" title="Jual Produk"><i class="fas fa-plus"></i> Jual Produk</a>  
      </li>
    <?php endif ?> 

      <li class="nav-item dropdown">
        <a class="nav-link mr-2 my-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-shopping-cart fa-lg text-success"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
          <?php if (isset($_SESSION['keranjang'])): ?>
            
          <a class="dropdown-item" href="index.php?halaman=keranjang">
            <table class="table">
              <tbody>
                <?php foreach ($_SESSION['keranjang'] as $kd_produk => $jumlah): ?>
                  <?php $qkeranjang=mysqli_query($koneksi,"SELECT * FROM produk WHERE kd_produk='$kd_produk'"); 
                  $belanja=$qkeranjang->fetch_assoc();
                  $jumlahbeli=$belanja['minimum_beli']*$jumlah;
                  $subharga=$belanja['harga']*$jumlahbeli;

                  ?>
                  <tr>
                    <td><img height="50px" width="50px" src="img-produk/<?php echo $belanja['foto']; ?>"></td>
                    <td><?php echo $belanja['nama_produk']; ?></td>

                    <td><?php echo $jumlahbeli; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?>,-</td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </a>
          <?php else: ?>
          <a class="dropdown-item" href="#">Keranjang Kosong</a>
          <?php endif ?>
          <div class="dropdown-divider"></div>
          <a type="submit" class="btn btn-success mx-auto btn-block" href="index.php?halaman=checkout" style="border-radius:0;">Checkout</a>
        </div>
      </li>

    <?php if(isset($_SESSION["pelanggan"])): ?>
      <li class="nav-item my-3 mr-sm-3">
        <a href="#" class="text-success" type="submit" title="Pesan Masuk"><i class="fas fa-comments fa-lg"></i></a>
      </li>
      <li class="nav-item my-3 mr-sm-3">
        <a href="#" class="text-success border-0" type="submit" title="Pemberitahuan"><i class="fas fa-bell fa-lg"></i></a>
      </li>
       <?php else: ?> 
      <li class="nav-item my-1 ml-lg-1 ml-xl-1">
        <a href="daftar.php" class="btn btn-outline-warning btn-sm my-2 ml-lg-4 ml-xl-4" type="submit">Daftar</a>
      </li>
      <?php endif ?> 

      <?php if(isset($_SESSION["pelanggan"])): ?>
      <li class="nav-item dropdown">
        <a class="nav-link ml-lg-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="ml-lg-3 ml-xl-3" src="img/farmer.png" width="40px" title="Akun Saya">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
          <a class="dropdown-item" href="index.php?halaman=profil"><img class="rounded-circle" src="foto_user/<?php echo $data['foto_user']; ?>" height="50px" width="50px">
          <p><strong><?php echo $data["nama"]; ?></strong></p></a> 
          <a class="dropdown-item" href="index.php?halaman=profil">
          <p class="small">Lihat Profil</p></a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?halaman=profil&page=tambahproduk">Tambah Produk</a>
            <a class="dropdown-item" href="index.php?halaman=profil&page=produkku">Transaksi Penjualan</a>
            <a class="dropdown-item" href="index.php?halaman=profil&page=pembelian">Transaksi Pembelian</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Dompetku :</a>
            <a class="dropdown-item text-success" href="#">Rp. 0,-</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
      <?php else: ?> 
      <li class="nav-item my-1 ml-lg-1 ml-xl-1">
        <a href="login.php" class="btn btn-outline-success btn-sm my-2" type="submit" title="Login">Login</a>
      </li>
       <?php endif ?> 
    </ul>
  </div>
  </div>
</nav>


	<?php 
  if (isset($_GET['halaman'])) {
    if ($_GET['halaman']=="cari") {
      include 'detail_cari.php';

    }elseif($_GET['halaman']=="detail") {
      include 'detail_produk.php';

    }elseif($_GET['halaman']=="keranjang") {
      include 'keranjang.php';

    }elseif($_GET['halaman']=="petani") {
      include 'seller.php';

    }elseif($_GET['halaman']=="profil") {
      include 'profil.php';

    }elseif($_GET['halaman']=="checkout") {
      include 'checkout.php';

    }elseif($_GET['halaman']=="nota") {
      include 'nota.php';
    }
     elseif($_GET['halaman']=="tentang-ideal") {
      include 'tentang_ideal.php';
    }
     elseif($_GET['halaman']=="fq") {
      include 'FQ.php';
    }
    elseif($_GET['halaman']=="cara-jual") {
      include 'cara_jual.php';
    }
     elseif($_GET['halaman']=="cara-beli") {
      include 'cara_beli.php';
    }
    elseif($_GET['halaman']=="sk") {
      include 'sk.php';
    }
     elseif($_GET['halaman']=="tambahproduk") {
      include 'tambahproduk.php';
    }

  }
  else
  {
    include 'home.php';
  }

   ?>


<div class="container-fluid bg-light">
  <div class="row mx-auto">
    <div class="col-12 col-md-6 col-lg-3">
      <img src="icon/logod-2.png" width="70">
    </div>
    <div class="col-12 col-md-6 col-lg-3">
      <h6 class="my-1">Jasa Pengiriman :</h6>
    </div>
    <div class="col-12 col-md-6 col-lg-3 my-3">
      <img src="icon/bank.png" title="rekening bersama" style="width: 270px; height: 30px;">
    </div>
    <div class="col-12 col-md-6 col-lg-3 panelfootersosmed mx-auto">
      <h6 class="my-1 ml-sm-5">Ikuti Kami :</h6>
       <ul class="ml-sm-5">
            <li><a class="mr-sm-1" rel="follow" target="_blank" href="#"><img alt="facebook Ideals" title="Facebook Ideal" src="icon/facebook.png" width="30px"></a></li>

            <li><a class="mr-sm-1" rel="follow" target="_blank" href="#"><img alt="twitter Ideals" title="Twitter Ideals" src="icon/twitter.png" width="30px"></a></li>

            <li><a class="mr-sm-1" rel="follow" target="_blank" href="#"><img alt="instagram Ideals" title="Instagram Ideals" src="icon/instagram.png" width="30px"></a></li>

            <li><a class="mr-sm-1" rel="follow" target="_blank" href="#"><img alt="youtube Ideals" title="Youtube Ideals" src="icon/youtube.png" width="30px"></a></li>

            <li><a class="mr-sm-1" rel="follow" target="_blank" href="#"><img alt="google plus Ideals" title="Google Plus Ideals" src="icon/google-plus.png" width="30px"></a></li>
          </ul>
    </div>
  </div>
</div>
<div class="container-fluid bg-success">
  <div class="row mx-auto" style="padding-top: 10px">
    <div class="col-12 col-md-6 col-lg-3 my-1">
      <h5 class="text-white"><strong>Tentang Kami</strong></h5>
      <p class="text-justify text-white"><strong>Ideal.id</strong> 
      merupakan marketplace jual beli sayuran di Indonesia. Ideals.id, membantu memberdayakan petani dan pengusaha yang bergerak dibidang pertanian untuk mempromosikan hasil pertaniannya.</p>
      
    </div>
    <div class="col-12 col-md-6 col-lg-3 my-1">
    <h5 class="text-white ml-sm-5"><strong>Panduan Umum</strong></h5>
      <ul class="navbar-nav ml-sm-5">
        <li><a class="text-white" style="text-decoration: none;" href="index.php?halaman=tentang-ideal">Tentang Ideal.id</a></li>
        <li><a class="text-white" style="text-decoration: none;" href="index.php?halaman=fq">FAQ</a></li>
        <li><a class="text-white" style="text-decoration: none;" href="index.php?halaman=cara-jual">Cara Jual Barang</a></li>
        <li><a class="text-white" style="text-decoration: none;" href="index.php?halaman=cara-beli">Cara Beli Barang</a></li>
        <li><a class="text-white" style="text-decoration: none;" href="">Tentang Akun Premium</a></li>
        <li><a class="text-white" style="text-decoration: none; color: white" href="index.php?halaman=sk">Syarat dan Ketentuan</a></li>
      </ul>
    </div>
    <div class="col-12 col-md-6 col-lg-3 my-1">
    <h5 class="text-white ml-sm-3"><strong>Hubungi Kami</strong></h5>      
      <ul class="navbar-nav ml-sm-3">
        <li><a class="text-white" style="text-decoration: none;" href=""><i class="fas fa-envelope"></i> info@ideals.id</a></li>
        <li><a class="text-white" style="text-decoration: none;" href=""><i class="fab fa-facebook"></i> ideals.id</a></li>
        <li><a class="text-white" style="text-decoration: none;" href=""><i class="fab fa-instagram"></i> ideals.id</a></li>
        <li><a class="text-white" style="text-decoration: none;" href=""><i class="fab fa-twitter-square"></i> ideals.id</a></li>
        <li><a class="text-white" style="text-decoration: none;" href=""><i class="fab fa-whatsapp-square"></i> 08988741766</a></li>
        <li><a class="text-white" style="text-decoration: none;" href=""><i class="fab fa-youtube"></i> ideals.id</a></li>
      </ul>
    </div>
    <div class="col-12 col-md-6 col-lg-3 my-1">
      <h5 style="color: white"><strong>Download Aplikasi</strong></h5>
      <img src="img/coming_soon_googleplay.png" width="200">
    </div>
  </div>
</div>
<div class="container-fluid bg-light">
  <div class="row">
    <div class="col">
      <p class="my-3 mx-auto">&copy; 2018 Ideal.id</p>
    </div>
  </div>
</div>

</body>
</html>