-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 05:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_pemesanan`
--

CREATE TABLE `history_pemesanan` (
  `id` bigint(20) NOT NULL,
  `kode` varchar(200) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `prosess` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_pemesanan`
--

INSERT INTO `history_pemesanan` (`id`, `kode`, `tanggal`, `prosess`, `id_user`) VALUES
(32, 'ORD00001', '2020-04-12 06:04:35', 'Order diterima & prosess design', 4),
(33, 'ORD00001', '2020-04-12 06:05:28', 'Proses layout', 5),
(34, 'ORD00001', '2020-04-12 06:05:52', 'Proses Print', 7),
(35, 'ORD00001', '2020-04-12 06:06:08', 'Proses Press', 10),
(36, 'ORD00001', '2020-04-12 06:06:20', 'Proses Cutting', 11),
(37, 'ORD00001', '2020-04-12 06:06:32', 'Proses Jahit', 14),
(38, 'ORD00001', '2020-04-12 06:06:57', 'Proses Finishing', 13),
(39, 'ORD00001', '2020-04-12 06:07:07', 'Order selesai & siap diambil', 13),
(40, 'ORD00002', '2020-04-12 06:12:23', 'Order diterima & prosess design', 4),
(41, 'ORD00003', '2020-04-12 06:13:11', 'Order diterima & prosess design', 4),
(42, 'ORD00004', '2020-04-12 06:14:29', 'Order diterima & prosess design', 4);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT '0',
  `alamat` varchar(100) DEFAULT '0',
  `notelp` varchar(100) DEFAULT '0',
  `username` varchar(100) DEFAULT '0',
  `password` text DEFAULT NULL,
  `status` enum('Desain','Layout','Print','Press','Cutting','Jahit','Finishing') DEFAULT NULL COMMENT 'status karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `alamat`, `notelp`, `username`, `password`, `status`) VALUES
(2, 'bandi suhadi', 'magersari', '2390489', 'bandi', '827ccb0eea8a706c4c34a16891f84e7b', 'Layout'),
(3, 'banu', 'gurah', '02398', 'banu', '827ccb0eea8a706c4c34a16891f84e7b', 'Desain'),
(4, 'hari', 'gurah', '023990', 'hari', '827ccb0eea8a706c4c34a16891f84e7b', 'Desain'),
(5, 'jaka', 'gurah', '29038490', 'jaka', '827ccb0eea8a706c4c34a16891f84e7b', 'Layout'),
(6, 'nindi', 'gurah', '02390', 'nindi', '827ccb0eea8a706c4c34a16891f84e7b', 'Print'),
(7, 'soni', 'gurah', '023948', 'soni', '827ccb0eea8a706c4c34a16891f84e7b', 'Print'),
(9, 'jamal', 'gurah', '223904', 'jamal', '827ccb0eea8a706c4c34a16891f84e7b', 'Press'),
(10, 'haris', 'magersari', '2034809', 'haris', '827ccb0eea8a706c4c34a16891f84e7b', 'Press'),
(11, 'edwin', 'magersari', '2033849', 'edwin', '827ccb0eea8a706c4c34a16891f84e7b', 'Cutting'),
(12, 'riski', 'gruah', '09234890', 'riski', '827ccb0eea8a706c4c34a16891f84e7b', 'Jahit'),
(13, 'aziz', 'magersari', '123489', 'aziz', '827ccb0eea8a706c4c34a16891f84e7b', 'Finishing'),
(14, 'ajun', 'gurah', '20389', 'ajun', '827ccb0eea8a706c4c34a16891f84e7b', 'Jahit');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `kode` varchar(200) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL COMMENT 'pembuat pemesanan',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'karyawan yang sedang mengerjakan pemesanan',
  `customer` varchar(100) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `bahan` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `prosess` varchar(100) DEFAULT NULL,
  `tanggal_masuk` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `status_selesai` enum('y','n') DEFAULT 'n',
  `status_hapus` enum('y','n') DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `kode`, `id_user`, `id_karyawan`, `customer`, `jenis`, `bahan`, `jumlah`, `prosess`, `tanggal_masuk`, `tanggal_selesai`, `catatan`, `gambar`, `status_selesai`, `status_hapus`) VALUES
(10, 'ORD00001', 1, 13, 'haris', 'Jersey 1 Set', 'Benzema', '15', 'Order selesai & siap diambil', '2020-04-12 06:04:35', '2020-04-12 06:07:07', 'harap cepat di selesaikan', 'jersey1.jpg', 'y', 'n'),
(11, 'ORD00002', 1, 4, 'jimi', 'Jersey Atasan', 'Micro UV', '10', 'Proses design', '2020-04-12 06:12:23', NULL, 'warna sesuai design', 'jersey2.jpg', 'n', 'y'),
(12, 'ORD00003', 1, 4, 'mirna', 'Jersey Atasan', 'Waffel', '50', 'Proses design', '2020-04-12 06:13:11', NULL, 'ukuran all xl, warna sesuai design', 'jersey3.jpg', 'n', 'n'),
(13, 'ORD00004', 1, 4, 'herman', 'Jersey 1 Set', 'Licra', '12', 'Proses design', '2020-04-12 06:14:29', NULL, 'harap cepat di prosess', 'jersey4.jpg', 'n', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `telp_satu` varchar(150) DEFAULT NULL,
  `telp_dua` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `link_fb` varchar(150) DEFAULT NULL,
  `link_ig` varchar(150) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `telp_satu`, `telp_dua`, `email`, `alamat`, `link_fb`, `link_ig`, `deskripsi`) VALUES
(1, '0123', '382457', 'deva@gamil.com', 'gurah kediri', '#', '#', 'halo halo');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `gambar` text DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gambar`, `judul`, `deskripsi`, `link`) VALUES
(5, 'chelseabg.jpg', 'Chelsea Jersey Premium', 'Jersey terbaru chelsea FC kini hadiri di toko kami, preorder sekarang', ''),
(6, 'chelseabg2.jpg', 'Chelsea Jersey', 'Jersey kwalitas permium, siap kirim ke seluruh indonesia, minat klik link di bawah ini', '#'),
(7, 'mubg.jpg', 'MU Jersey', 'Ready stok, siap kirim seluruh indonesia, grosir maupun ecer, bisa juga di custom sablon, minat ? klik link dibawah', '#');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` enum('Super Admin','Admin','Programmer') DEFAULT 'Admin',
  `telp` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `status`, `telp`, `alamat`) VALUES
(1, 'deva satrio damara', 'devasatrio', '827ccb0eea8a706c4c34a16891f84e7b', 'Programmer', '14045', 'gurah kediri'),
(4, 'admin satu', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', '0823847', 'gurah magersari'),
(6, 'super admin', 'superadmin', '827ccb0eea8a706c4c34a16891f84e7b', 'Super Admin', '0238490', 'gurah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_pemesanan`
--
ALTER TABLE `history_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_pemesanan`
--
ALTER TABLE `history_pemesanan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
