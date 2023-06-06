-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2021 at 10:51 AM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pers2956_dbperpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `no_telp_admin` varchar(15) NOT NULL,
  `alamat_admin` text NOT NULL,
  `foto_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `role`, `email_admin`, `password_admin`, `no_telp_admin`, `alamat_admin`, `foto_admin`) VALUES
(1, 'admin', 'ADMIN', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '081432732981', '', 'default.jpg'),
(3, 'Bambang', 'ADMIN', 'Bambang@gmail.com', 'fef33560a643e5b1a18bd3f6282f196e', '0831765423', 'Jl. Kadaka No.9', '67a62dbbb2fbe621e2fb89814039cc03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(100) NOT NULL,
  `penerbit_buku` varchar(100) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `edisi_majalah` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `sampul_buku` text NOT NULL,
  `file_ebook` text NOT NULL,
  `jenis_buku` varchar(30) NOT NULL,
  `rak_buku` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_terbit`, `edisi_majalah`, `sinopsis`, `stok_buku`, `sampul_buku`, `file_ebook`, `jenis_buku`, `rak_buku`, `tanggal_masuk`) VALUES
(9, '75728776', 'Pendidikan Islam', 'farman', 'ihsadioh', 2017, '', 'asdadasdasdasdasd', 0, 'Pendidikan-Islam-11627878946.jpg', 'Pendidikan-Islam-21627878946.pdf', 'E-Book', '', '2021-08-02'),
(10, '93287813', 'Selalu Sehat', 'Ernold', 'media angkasa', 2020, '', 'asdads', 9, 'Selalu-Sehat-11627880314.jpg', '', 'Buku', '12', '2021-08-02'),
(12, '57770628', 'Judul Ebookk', 'Penulis Ebook', 'Penerbit Ebook', 2021, '', 'hello guys', 0, 'Judul-Ebookk-11627972789.png', 'Judul-Ebookk-21627972789.pdf', 'E-Book', '', '2021-08-03'),
(13, '34365281', 'Judul Jurnal', 'Penulis Jurnal', 'Penerbit Jurnal', 2012, '', 'hello guys', 0, 'Judul-Jurnal-11627972850.png', '', 'Jurnal', 'A13', '2021-08-03'),
(14, '13096627', 'Judul Majalah', '', 'Penerbit Majalah', 2020, 'Edisi 1', '', 12, 'Judul-Majalah-11627973782.png', '', 'Majalah', 'A13', '2021-08-03'),
(15, '21850407', 'Judul Jurnal', 'Penulis Jurnal', 'Penerbit Jurnal', 2000, '', 'abstrak', 1, 'Judul-Jurnal-11627974162.png', '', 'Jurnal', 'A12', '2021-08-03'),
(16, '571840034', 'Buku Paket Matematika', 'Mamang Sutarman', 'PT.Jayaa', 2012, '', 'acak', 2, 'Buku-Paket-Matematika-11627976094.png', '', 'Buku', '2', '2021-08-03'),
(17, '48302843', '[object HTMLInputElement]', '[object HTMLInputElement]', 'PT.Jayaa', 2020, '', 'sds', 0, 'object-HTMLInputElement-11627976169.png', 'object-HTMLInputElement-21627976169.pdf', 'E-Book', '', '2021-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `kode_detail_peminjaman` varchar(20) NOT NULL,
  `id_peminjaman` varchar(20) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `status_dikembalikan` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `kode_detail_peminjaman`, `id_peminjaman`, `kode_buku`, `status_dikembalikan`) VALUES
(3, 'BOK-1540-0001', 'PJM-3062-0001', '75728776', 'N'),
(4, 'BOK-1540-0002', 'PJM-3062-0002', '75728776', 'N'),
(5, 'BOK-1540-0002', 'PJM-3062-0002', '93287813', 'N'),
(6, 'BOK-1540-0003', 'PJM-3062-0003', '21850407', 'Y'),
(7, 'BOK-1540-0003', 'PJM-3062-0003', '571840034', 'Y'),
(8, 'BOK-1540-0004', 'PJM-3062-0004', '13096627', 'N'),
(9, 'BOK-1540-0005', 'PJM-3062-0005', '13096627', 'Y'),
(10, 'BOK-1540-0006', 'PJM-3062-0006', '571840034', 'N'),
(11, 'BOK-1540-0007', 'PJM-3062-0007', '571840034', 'N'),
(12, 'BOK-1540-0008', 'PJM-3062-0008', '21850407', 'Y'),
(13, 'BOK-1540-0009', 'PJM-3062-0009', '571840034', 'Y'),
(14, 'BOK-1540-0010', 'PJM-3062-0010', '21850407', 'Y'),
(15, 'BOK-1540-0010', 'PJM-3062-0010', '13096627', 'Y'),
(16, 'BOK-1540-0010', 'PJM-3062-0010', '21850407', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengembalian`
--

CREATE TABLE `detail_pengembalian` (
  `id_detail_pengembalian` int(11) NOT NULL,
  `id_pengembalian` varchar(30) NOT NULL,
  `kode_buku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengembalian`
--

INSERT INTO `detail_pengembalian` (`id_detail_pengembalian`, `id_pengembalian`, `kode_buku`) VALUES
(3, 'PGM-3062-0001', '75728776'),
(4, 'PGM-3062-0002', '21850407'),
(5, 'PGM-3062-0002', '571840034'),
(6, 'PGM-3062-0003', '571840034'),
(7, 'PGM-3062-0004', '21850407'),
(8, 'PGM-3062-0005', '571840034'),
(9, 'PGM-3062-0005', '571840034'),
(10, 'PGM-3062-0005', '571840034'),
(11, 'PGM-3062-0006', '13096627'),
(12, 'PGM-3062-0007', '571840034'),
(13, 'PGM-3062-0008', '21850407'),
(14, 'PGM-3062-0009', '21850407'),
(15, 'PGM-3062-0009', '13096627'),
(16, 'PGM-3062-0009', '21850407');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengembalian_temp`
--

CREATE TABLE `detail_pengembalian_temp` (
  `id_detail_pengembalian` int(11) NOT NULL,
  `id_pengembalian` char(50) NOT NULL,
  `kode_buku` varchar(30) NOT NULL,
  `session_id` char(100) NOT NULL,
  `id_detail_peminjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_download`
--

CREATE TABLE `history_download` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(20) DEFAULT NULL,
  `kode_member` varchar(20) DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_download`
--

INSERT INTO `history_download` (`id`, `kode_buku`, `kode_member`, `tgl`) VALUES
(28, '75728776', 'KMB00000001', '2021-08-03'),
(29, '57770628', 'KMB00000001', '2021-08-03'),
(30, '48302843', 'KMB00000001', '2021-08-03'),
(31, '57770628', 'KMB00000007', '2021-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `kode_member` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `no_telp_member` varchar(15) NOT NULL,
  `email_member` varchar(50) NOT NULL,
  `password_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `foto_member` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `kode_member`, `role`, `nama_member`, `no_telp_member`, `email_member`, `password_member`, `alamat_member`, `foto_member`) VALUES
(1, 'KMB00000001', 'MEMBER', 'member', '081555355574', 'member@gmail.com', 'a510166163833c79aa703646f59c04bb', 'Malang', 'thumb-1920-10075502.jpg'),
(2, 'KMB00000002', 'MEMBER', 'Wahyu Pras', '', 'wahyu@gmail.com', 'fceb859bfd516de3b294034f838cf4aa', 'malang', 'levi-s-the-trucker-jacket-87999_1.jpg'),
(4, 'KMB00000004', 'MEMBER', 'Gusti Ananda', '', 'anandagin30@gmail.com', '681c9bd292695229d3979629872b14c2', 'Jl.Raya Nyalaran Gg.1/No.10', '806064616acab71c00dc790012dc96d6.jpg'),
(5, 'KMB00000005', 'MEMBER', 'Ernold ', '1234567890', 'ernold.moch@gmail.com', '85064efb60a9601805dcea56ec5402f7', 'ds balongan', 'sodayo.png'),
(6, 'KMB00000006', 'MEMBER', 'Mario', '082245158708', 'mario10@gmail.com', 'aeb34368c5d53aee32431b5386f71c56', 'Jl.Raya Nyalaran Gg.1/No.10', 'Bumbu_Gulai.png'),
(7, 'KMB00000007', 'MEMBER', 'ernold', '123456789', 'ern@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'ds setren', 'asli.jpg'),
(8, 'KMB00000008', 'MEMBER', 'Ernold ', '1234567890', 'ernold@gmail.com', 'a2dd88666b7739fb241ee87401eb3618', 'ds balongan', '28156119_433110113790139_1261047903284101120_n_(2).jpg'),
(9, 'KMB00000009', 'MEMBER', 'Gusti Ananda', '', 'anandagin30@gmail.com', 'd79e755467ace53cdca4bb9f06540436', 'Jl.Raya Nyalaran Gg.1/No.10', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(20) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `kode_member` varchar(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_peminjaman`, `kode_member`, `nama_admin`, `tgl_pengembalian`) VALUES
('PJM-3062-0001', '2021-08-03', 'KMB00000002', '1', '2021-08-10'),
('PJM-3062-0002', '2021-08-03', 'KMB00000002', '1', '2021-08-10'),
('PJM-3062-0003', '2021-08-03', 'KMB00000001', '1', '2021-08-10'),
('PJM-3062-0004', '2021-08-03', 'KMB00000001', '1', '2021-08-10'),
('PJM-3062-0005', '2021-08-03', 'KMB00000001', '1', '2021-08-10'),
('PJM-3062-0006', '2021-08-03', 'KMB00000004', '1', '2021-08-10'),
('PJM-3062-0007', '2021-08-03', 'KMB00000004', '1', '2021-08-10'),
('PJM-3062-0008', '2021-08-03', 'KMB00000005', '1', '2021-08-10'),
('PJM-3062-0009', '2021-08-05', 'KMB00000005', '1', '2021-08-12'),
('PJM-3062-0010', '2021-08-23', 'KMB00000008', '1', '2021-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `id_pengembalian` varchar(30) NOT NULL,
  `id_peminjaman` varchar(20) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_pengembalian`, `id_peminjaman`, `tgl_dikembalikan`, `id_admin`) VALUES
(1, 'PGM-3062-0001', 'PJM-3062-0001', '2021-08-03', 0),
(2, 'PGM-3062-0002', 'PJM-3062-0003', '2021-08-03', 0),
(3, 'PGM-3062-0003', 'PJM-3062-0007', '2021-08-03', 0),
(4, 'PGM-3062-0004', 'PJM-3062-0003', '2021-08-04', 0),
(5, 'PGM-3062-0005', 'PJM-3062-0003', '2021-08-05', 0),
(6, 'PGM-3062-0006', 'PJM-3062-0005', '2021-08-05', 0),
(7, 'PGM-3062-0007', 'PJM-3062-0009', '2021-08-05', 0),
(8, 'PGM-3062-0008', 'PJM-3062-0008', '2021-08-23', 0),
(9, 'PGM-3062-0009', 'PJM-3062-0010', '2021-08-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `perpus`
--

CREATE TABLE `perpus` (
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpus`
--

INSERT INTO `perpus` (`nama`, `alamat`, `telp`) VALUES
('Perpustakaan', 'Jl.Semanggi Barat No.10', '08135127698');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `id_buku` varchar(20) NOT NULL,
  `id_peminjaman` int(20) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `nama_admin` (`nama_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `id_peminjaman` (`id_peminjaman`) USING BTREE,
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD PRIMARY KEY (`id_detail_pengembalian`),
  ADD KEY `pengembalian` (`id_pengembalian`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `detail_pengembalian_temp`
--
ALTER TABLE `detail_pengembalian_temp`
  ADD PRIMARY KEY (`id_detail_pengembalian`);

--
-- Indexes for table `history_download`
--
ALTER TABLE `history_download`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_buku` (`kode_buku`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `kode_member` (`kode_member`) USING BTREE;

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD KEY `id_member` (`kode_member`) USING BTREE,
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `nama_admin` (`nama_admin`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengembalian` (`id_pengembalian`),
  ADD KEY `peminjaman_id` (`id_peminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  MODIFY `id_detail_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_pengembalian_temp`
--
ALTER TABLE `detail_pengembalian_temp`
  MODIFY `id_detail_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `history_download`
--
ALTER TABLE `history_download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`);

--
-- Constraints for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD CONSTRAINT `buku_code` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`),
  ADD CONSTRAINT `pengembalian` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id_pengembalian`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `Kode_ibfk_1` FOREIGN KEY (`kode_member`) REFERENCES `member` (`kode_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
