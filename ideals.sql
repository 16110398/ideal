-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 01:28 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideals`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` int(25) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
(1, 'Sayuran'),
(2, 'Buah-Buahan'),
(3, 'Produk Organik'),
(4, 'Bijian dan Kacang'),
(5, 'Bumbu dan Rempah'),
(6, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `id_pengirimk` int(50) NOT NULL,
  `kd_produk` int(50) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(50) NOT NULL,
  `id_pembelian` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `no_rekening` int(50) NOT NULL,
  `jumlah_bayar` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `no_rekening`, `jumlah_bayar`, `tanggal`, `bukti`) VALUES
(5, 1, 'Nurma Surya Putri', 'BNI', 264127889, 600000, '2019-01-21', '20181217_182905.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(50) NOT NULL,
  `id_user` int(25) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(50) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `tanggal_pembelian`, `total_pembelian`, `alamat_pengiriman`, `status_pembelian`) VALUES
(1, 5, '2019-01-02', 560000, 'Bangunjiwo, Kasihan, Bantul 55184', 'sudah dibayar'),
(2, 5, '2019-01-02', 100000, 'Bangunjiwo, Kasihan, Bantul 55184', 'pending'),
(3, 5, '2019-01-02', 1280000, 'Bangunjiwo, Kasihan, Bantul 55184', 'pending'),
(4, 1, '2019-01-02', 350000, 'Bangunjiwo, Kasihan, Bantul 55184', 'pending'),
(5, 1, '2019-01-02', 280000, '', 'pending'),
(6, 5, '2019-01-02', 1280000, '', 'pending'),
(7, 5, '2019-01-17', 150000, '', 'pending'),
(8, 5, '2019-01-18', 300000, '', 'pending'),
(9, 5, '2019-01-18', 200000, '', 'pending'),
(10, 5, '2019-01-18', 150000, '', 'pending'),
(11, 5, '2019-01-18', 150000, '', 'pending'),
(12, 5, '2019-01-18', 150000, '', 'pending'),
(13, 5, '2019-01-18', 300000, '', 'pending'),
(14, 5, '2019-01-18', 150000, '', 'pending'),
(15, 1, '2019-01-18', 50000, '', 'pending'),
(16, 1, '2019-01-18', 150000, '', 'pending'),
(17, 1, '2019-01-18', 50000, '', 'pending'),
(18, 1, '2019-01-18', 100000, '', 'pending'),
(19, 1, '2019-01-18', 2000000, '', 'pending'),
(20, 1, '2019-01-18', 50000, '', 'pending'),
(21, 5, '2019-01-18', 2000000, '', 'pending'),
(22, 5, '2019-01-18', 500000, '', 'pending'),
(23, 5, '2019-01-19', 250000, '', 'pending'),
(24, 5, '2019-01-19', 25000, '', 'pending'),
(25, 5, '2019-01-20', 50000, '', 'pending'),
(26, 5, '2019-01-20', 200000, '', 'pending'),
(27, 5, '2019-01-21', 275000, '', 'pending'),
(28, 5, '2019-01-21', 200000, 'Donotirto RT 07, Bangunjiwo, Kasihan, Bantul, D.I Yogyakarta 55184', 'pending'),
(29, 5, '2019-01-21', 200000, 'Kaloran, Temanggung, Jawa Tengah', 'pending'),
(30, 5, '2019-01-21', 50000, 'Kaloran, Temanggung, Jawa Tengah', 'pending'),
(31, 5, '2019-01-21', 150000, 'Kaloran, Temangggung, Jawa Tengah', 'pending'),
(32, 5, '2019-01-21', 100000, 'Kaloran, Temanggung, Jawa Tengah', 'pending'),
(33, 1, '2019-01-21', 50000, 'Donotirto, Bangunjiwo, Kasihan, Bantul 55184', 'pending'),
(34, 1, '2019-01-21', 2000000, 'Donotirto, Bangunjiwo, Kasihan, Bantul 55184', 'pending'),
(35, 5, '2019-01-23', 500000, 'tttt', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(50) NOT NULL,
  `id_pembelian` int(50) NOT NULL,
  `kd_produk` int(30) NOT NULL,
  `jumlah_produk` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `berat` int(50) NOT NULL,
  `subberat` int(50) NOT NULL,
  `subharga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `kd_produk`, `jumlah_produk`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 20, 40, '', 0, 1, 0, 0),
(2, 1, 19, 40, '', 0, 1, 0, 0),
(3, 2, 16, 50, '', 0, 1, 0, 0),
(4, 3, 20, 40, 'Manggis', 7000, 1, 400, 280000),
(5, 3, 18, 50, 'Kiwi', 20000, 1, 500, 1000000),
(6, 4, 16, 50, 'Brokoli Putih', 2000, 1, 50, 100000),
(7, 4, 17, 50, 'Frambos', 5000, 1, 50, 250000),
(8, 5, 20, 40, 'Manggis', 7000, 1, 40, 280000),
(9, 6, 18, 50, 'Kiwi', 20000, 1, 50, 1000000),
(10, 6, 20, 40, 'Manggis', 7000, 1, 40, 280000),
(11, 7, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(12, 8, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(13, 8, 27, 1, 'Bibit Mangga Organik', 150000, 2, 2, 150000),
(14, 9, 24, 20, 'Bayam Merah', 10000, 5, 100, 200000),
(15, 10, 27, 1, 'Bibit Mangga Organik', 150000, 2, 2, 150000),
(16, 11, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(17, 12, 30, 10, 'Kangkung', 5000, 1, 10, 50000),
(18, 12, 24, 10, 'Bayam Merah', 10000, 5, 50, 100000),
(19, 13, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(20, 13, 27, 1, 'Bibit Mangga Organik', 150000, 2, 2, 150000),
(21, 14, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(22, 15, 21, 10, 'Manggis', 5000, 1, 10, 50000),
(23, 16, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(24, 17, 21, 10, 'Manggis', 5000, 1, 10, 50000),
(25, 18, 23, 10, 'Bayam', 10000, 1, 10, 100000),
(26, 19, 25, 10, 'Kacang Mete', 200000, 1, 10, 2000000),
(27, 20, 30, 10, 'Kangkung', 5000, 1, 10, 50000),
(28, 21, 25, 10, 'Kacang Mete', 200000, 1, 10, 2000000),
(29, 22, 21, 10, 'Manggis', 5000, 1, 10, 50000),
(30, 22, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(31, 22, 24, 10, 'Bayam Merah', 10000, 5, 50, 100000),
(32, 22, 22, 10, 'Bawang Merah', 20000, 1, 10, 200000),
(33, 23, 23, 10, 'Bayam', 10000, 1, 10, 100000),
(34, 23, 24, 10, 'Bayam Merah', 10000, 5, 50, 100000),
(35, 23, 30, 10, 'Kangkung', 5000, 1, 10, 50000),
(36, 24, 31, 5, 'Bayam Merah', 5000, 1, 5, 25000),
(37, 25, 30, 10, 'Kangkung', 5000, 1, 10, 50000),
(38, 26, 30, 10, 'Kangkung', 5000, 1, 10, 50000),
(39, 26, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(40, 27, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(41, 27, 31, 5, 'Bayam Merah', 5000, 1, 5, 25000),
(42, 27, 24, 10, 'Bayam Merah', 10000, 5, 50, 100000),
(43, 28, 22, 10, 'Bawang Merah', 20000, 1, 10, 200000),
(44, 29, 22, 10, 'Bawang Merah', 20000, 1, 10, 200000),
(45, 30, 21, 10, 'Manggis', 5000, 1, 10, 50000),
(46, 31, 28, 10, 'Frambos', 15000, 1, 10, 150000),
(47, 32, 24, 10, 'Bayam Merah', 10000, 5, 50, 100000),
(48, 33, 30, 10, 'Kangkung', 5000, 1, 10, 50000),
(49, 34, 25, 10, 'Kacang Mete', 200000, 1, 10, 2000000),
(50, 35, 30, 100, 'Kangkung', 5000, 1, 100, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `id_pengirim` int(50) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `id_pengirim`, `nama_pengirim`, `isi_pesan`) VALUES
(1, 4, 5, 'Nurma Surya', 'test'),
(5, 1, 5, 'Nurma Surya', 'g'),
(8, 4, 5, 'Nurma Surya', 'fffff'),
(9, 4, 5, 'Nurma Surya', 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `kd_kategori` int(50) NOT NULL,
  `berat` varchar(25) NOT NULL,
  `jumlah` varchar(25) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `minimum_beli` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `id_user`, `nama_produk`, `kd_kategori`, `berat`, `jumlah`, `harga`, `foto`, `minimum_beli`, `deskripsi`) VALUES
(21, 1, 'Manggis', 2, '1', '30', '5000', 'manggis.jpg', '10', 'manggis yang sangat enak. berkhasiat dan bisa dikonsumsi kapanpun dan dimanapun'),
(22, 4, 'Bawang Merah', 5, '1', '30', '20000', 'bawangmerah.jpg', '10', 'Bawang Merah lokal'),
(24, 9, 'Bayam Merah', 1, '5', '100', '10000', 'bayammerah.jpg', '10', 'bayam merah lokal'),
(25, 7, 'Kacang Mete', 4, '1', '500', '20000', 'kacangmete.jpg', '10', 'kacang mete kualitas super'),
(26, 8, 'Salad buah', 6, '1', '20', '35000', 'saladbuah.jpg', '2', 'salad buah segar'),
(27, 5, 'Mangga Organik', 3, '2', '30', '80000', 'tanamanmangga.jpg', '1', 'Jual bibit mangga organik'),
(28, 4, 'Frambos', 2, '1', '30', '15000', 'frambos.jpg', '10', 'frambos kualitas premium'),
(30, 5, 'Kangkung', 1, '1', '200', '5000', 'kangkung.JPG', '10', 'Jual Sayur Kangkung Segar'),
(31, 5, 'Bayam Merah', 1, '1', '100', '5000', 'bayammerah.jpg', '5', 'kangkung segar'),
(32, 1, 'Brokoli Hijau', 1, '1', '150', '5000', 'brokoli.jpg', '10', 'Jual Brokoli Segar'),
(33, 1, 'Terong Segar', 1, '1', '250', '2000', 'terong.jpg', '15', 'Jual Terong Segar'),
(34, 1, 'Lobak Putih', 1, '1', '100', '5000', 'lobakputih.jpg', '10', 'Jual Lobak Putih');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `jenis_kelamin`, `foto_user`, `alamat`, `telepon`) VALUES
(1, 'Wawan', 'wawan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Laki-laki', 'wawan.png', 'Kasihan, Bantul, D.I Yogyakarta', '08988741766'),
(4, 'Listyawan', 'listyawan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Laki-laki', 'listyawan.png', 'Kasihan, Bantul', '085725813121'),
(5, 'Nurma Surya', 'nurma@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Perempuan', 'nurma.jpg', 'Kaloran, Temanggung, Jawa Tengah', '085729447145'),
(6, 'Murni', 'murni@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Perempuan', 'murni.png', 'Ngaglik, Sleman', '08754617466'),
(7, 'Ria', 'ria@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Perempuan', 'ria.png', 'Wonogiri, Wonogiri', '087456123478'),
(8, 'Ridho', 'ridho@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Laki-laki', 'ridho.png', 'Tebo, Jambi', '0874562478'),
(9, 'Rezha', 'rezha@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Laki-laki', 'rezha.png', 'Sleman', '087451268715');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `id_pembelian` (`id_pembelian`,`kd_produk`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`),
  ADD KEY `kd_kategori` (`kd_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kd_kategori` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kd_produk` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
