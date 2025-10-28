-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 02:42 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_adm` varchar(80) NOT NULL,
  `alamat_adm` varchar(255) NOT NULL,
  `no_telp_adm` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `username`, `password`, `nama_adm`, `alamat_adm`, `no_telp_adm`) VALUES
(1, 'admin', 'admin', 'nama', 'alamat', 'nomor');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brg` int(11) NOT NULL,
  `id_jns` int(11) NOT NULL,
  `id_mrk` int(11) NOT NULL,
  `harga_brg` int(11) NOT NULL,
  `stok_brg` int(11) NOT NULL,
  `deskrip` varchar(180) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `id_jns`, `id_mrk`, `harga_brg`, `stok_brg`, `deskrip`, `gambar`) VALUES
(140, 1, 1, 26000, 11, 'rangkaian baja ringan kanal c kencana memiliki diameter 80 cm dan 75 cm,\r\ninovasi terbaru untuk kanal c kencana adalah dengan adanya rusuk pangku yang berfungsi untuk menguat saat ', 'brosur-kencana.jpg'),
(141, 1, 2, 15000, 7, 'kanal c tata memiliki ukuran C75x35 x1mm dengan panjang 8m', 'cnp-1_tata.jpg'),
(142, 2, 1, 17000, 18, 'rangkaian hollow dari Kencana memiliki bahan kuat serta rusuk pangku yang memperkuat saat pemasangan.', 'hollow.jpg'),
(143, 3, 2, 12000, 28, 'reng tata meiliki ketebalan yang pas, tidak mudah bengkok, dan mudah untuk pemasangan.', 'fb5_tata.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jns` int(11) NOT NULL,
  `nama_jns` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jns`, `nama_jns`) VALUES
(1, 'kanal c'),
(2, 'hollow'),
(3, 'reng');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_mrk` int(11) NOT NULL,
  `nama_mrk` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_mrk`, `nama_mrk`) VALUES
(1, 'kencana'),
(2, 'tata');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pem` int(11) NOT NULL,
  `id_pel` int(11) NOT NULL,
  `tanggal_pem` date NOT NULL,
  `total_pem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pem`, `id_pel`, `tanggal_pem`, `total_pem`) VALUES
(1, 2, '2019-07-13', 67000);

-- --------------------------------------------------------

--
-- Table structure for table `pemb_brg`
--

CREATE TABLE `pemb_brg` (
  `id_pem_brg` int(11) NOT NULL,
  `id_pem` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_prof` int(11) NOT NULL,
  `nama_prof` varchar(80) NOT NULL,
  `alamat_prof` varchar(255) NOT NULL,
  `no_telp_prof` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_prof`, `nama_prof`, `alamat_prof`, `no_telp_prof`) VALUES
(1, 'rahmat', 'jalan\"', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_prom` int(11) NOT NULL,
  `img_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_sup` int(11) NOT NULL,
  `nama_sup` varchar(80) NOT NULL,
  `alamat_sup` varchar(225) NOT NULL,
  `no_telp_sup` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_sup`, `nama_sup`, `alamat_sup`, `no_telp_sup`) VALUES
(1, 'rahmat alfi', 'jl.jalan_sendiri', '081234565638');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_pel` int(11) NOT NULL,
  `nama_pel` varchar(80) NOT NULL,
  `alamat_pel` varchar(225) NOT NULL,
  `no_telp_pel` varchar(13) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pel`, `nama_pel`, `alamat_pel`, `no_telp_pel`, `username`, `password`) VALUES
(1, 'tyas', '', '', '', ''),
(2, 'tyas', 'jl. telaga indah II Ganting', '081331350292', 'tyas19', '170845');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD KEY `id_jns` (`id_jns`,`id_mrk`),
  ADD KEY `id_mrk` (`id_mrk`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jns`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_mrk`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pem`);

--
-- Indexes for table `pemb_brg`
--
ALTER TABLE `pemb_brg`
  ADD PRIMARY KEY (`id_pem_brg`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_prof`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_prom`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_sup`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemb_brg`
--
ALTER TABLE `pemb_brg`
  MODIFY `id_pem_brg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_prom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_jns`) REFERENCES `jenis` (`id_jns`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_mrk`) REFERENCES `merek` (`id_mrk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
