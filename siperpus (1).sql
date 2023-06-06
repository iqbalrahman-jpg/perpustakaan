-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 07:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siperpus`
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
(3, 'Bambang', 'ADMIN', 'Bambang@gmail.com', 'fef33560a643e5b1a18bd3f6282f196e', '0831765423', 'Jl. Kadaka No.9', '67a62dbbb2fbe621e2fb89814039cc03.jpg'),
(5, 'superadmin', 'ADMIN', 'superadmin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '08999999999', 'yusd', '');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(100) NOT NULL,
  `nim_penulis` varchar(25) DEFAULT NULL,
  `penerbit_buku` varchar(100) DEFAULT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `edisi_majalah` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `sampul_buku` text NOT NULL,
  `file_ebook` text NOT NULL,
  `jenis_buku` varchar(30) NOT NULL,
  `rak_buku` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `isbn` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul_buku`, `penulis_buku`, `nim_penulis`, `penerbit_buku`, `tahun_terbit`, `edisi_majalah`, `sinopsis`, `stok_buku`, `sampul_buku`, `file_ebook`, `jenis_buku`, `rak_buku`, `tanggal_masuk`, `isbn`) VALUES
(1, '19510822', 'Making Video as a Promotional Media Of Ardial Pusa', 'Annisa Dwiyanti', 'F31191444', '', 2022, '', 'Making Video as a Promotional Media Of Ardial Pusat Oleh-Oleh Khas Banyuwangi', 0, '3.jpeg', '', 'Tugas Akhir', 'TA001', '2022-11-22', ''),
(2, '19587456', 'Sinta:Sejarah Ing Wisata Pembuatan Story Telling D', 'Aditya Intan Ratnasari', 'F31191557', NULL, 2022, '', 'Sinta:Sejarah Ing Wisata Pembuatan Story Telling Destinasi Wisata di Kota Yogyakarta', 0, '4.jpeg', '', 'Laporan PKL', 'PKL001', '2022-11-22', ''),
(3, '61889367', 'Career Paths: Information Technology Students Boo', 'Virginia Evans, Jenny Dooley, Stanley Wright', NULL, 'Express Publishing', 2011, '', 'Career Paths: Information Technology Students Book', 4, 'Career-Paths-Information-Technology-Students-Book-11669179523.png', '', 'Buku Umum', 'U99', '2022-11-23', '  978-1-3992-0578-8'),
(4, '32201760', 'majalah', '', NULL, 'penerbit', 2022, '101', '', 0, 'majalah-11669194307.png', '', 'Majalah', 'M10', '2022-11-23', NULL),
(5, '19599956', 'komik', 'penulis komik', NULL, 'penerbit komik', 2022, '', 'komikkkkk', 0, 'komik-11669265297.jpeg', '', 'Komik', '', '2022-11-24', '00000000'),
(6, '90555526', 'novel', 'penulis novel', NULL, 'penerbit novel', 2022, '', 'novel', 0, 'novel-11669266585.jpeg', '', 'Novel', '', '2022-11-24', '00000000');

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
(1, 'BOK-1540-0001', 'PJM-3062-0025', '19587456', 'N'),
(37, 'BOK-1540-0002', 'PJM-3062-0002', '61889367', 'Y'),
(38, 'BOK-1540-0003', 'PJM-3062-0003', '32201760', 'Y');

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
(23, 'PGM-3062-0002', '61889367'),
(24, 'PGM-3062-0003', '32201760');

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
(31, '57770628', 'KMB00000007', '2021-08-09'),
(32, '75728776', 'KMB00000010', '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `kode_member` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `nim_member` varchar(25) NOT NULL,
  `no_telp_member` varchar(15) NOT NULL,
  `email_member` varchar(50) NOT NULL,
  `password_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `foto_member` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `kode_member`, `role`, `nama_member`, `nim_member`, `no_telp_member`, `email_member`, `password_member`, `alamat_member`, `foto_member`) VALUES
(1, 'KMB00000001', 'MEMBER', 'mem', 'F0000000000', '081555355574', 'member@gmail.com', '3fe6da58cd6cfe558fcf188a19c76842', 'Malang', 'thumb-1920-10075502.jpg'),
(2, 'KMB00000002', 'MEMBER', 'Wahyu Pras', '', '', 'wahyu@gmail.com', 'fceb859bfd516de3b294034f838cf4aa', 'malang', 'levi-s-the-trucker-jacket-87999_1.jpg'),
(4, 'KMB00000004', 'MEMBER', 'Gusti Ananda', '', '', 'anandagin30@gmail.com', '681c9bd292695229d3979629872b14c2', 'Jl.Raya Nyalaran Gg.1/No.10', '806064616acab71c00dc790012dc96d6.jpg'),
(5, 'KMB00000005', 'MEMBER', 'Ernold ', '', '1234567890', 'ernold.moch@gmail.com', '85064efb60a9601805dcea56ec5402f7', 'ds balongan', 'sodayo.png'),
(6, 'KMB00000006', 'MEMBER', 'Mario', '', '082245158708', 'mario10@gmail.com', 'aeb34368c5d53aee32431b5386f71c56', 'Jl.Raya Nyalaran Gg.1/No.10', 'Bumbu_Gulai.png'),
(7, 'KMB00000007', 'MEMBER', 'ernold', '', '123456789', 'ern@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'ds setren', 'asli.jpg'),
(8, 'KMB00000008', 'MEMBER', 'Ernold ', '', '1234567890', 'ernold@gmail.com', 'a2dd88666b7739fb241ee87401eb3618', 'ds balongan', '28156119_433110113790139_1261047903284101120_n_(2).jpg'),
(9, 'KMB00000009', 'MEMBER', 'Gusti Ananda', '', '', 'anandagin30@gmail.com', 'd79e755467ace53cdca4bb9f06540436', 'Jl.Raya Nyalaran Gg.1/No.10', 'default.jpg'),
(10, 'KMB00000010', 'MEMBER', 'je', '', '08999999', 'jj@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'huih', '311763954_634882394813371_1312006251816473313_n.jpg'),
(12, 'KMB00000011', 'MEMBER', 'member', '', '', 'jeje@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jalanjalan', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(20) NOT NULL,
  `tgl_peminjaman` datetime NOT NULL,
  `kode_member` varchar(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `tgl_pengembalian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_peminjaman`, `kode_member`, `nama_admin`, `tgl_pengembalian`) VALUES
('PJM-3062-0001', '2021-08-03 00:00:00', 'KMB00000002', '1', '2021-08-09 17:00:00'),
('PJM-3062-0002', '2022-11-24 09:18:50', 'KMB00000001', '5', '2022-11-29 17:00:00'),
('PJM-3062-0003', '2022-11-24 15:23:10', 'KMB00000010', '5', '2022-11-29 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `id_pengembalian` varchar(30) NOT NULL,
  `id_peminjaman` varchar(20) NOT NULL,
  `tgl_dikembalikan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_pengembalian`, `id_peminjaman`, `tgl_dikembalikan`, `id_admin`) VALUES
(1, 'PGM-3062-0001', 'PJM-3062-0001', '2021-08-02 17:00:00', 0),
(19, 'PGM-3062-0002', 'PJM-3062-0002', '2022-11-23 17:00:00', 0),
(20, 'PGM-3062-0003', 'PJM-3062-0003', '2022-11-24 08:23:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `perpus`
--

CREATE TABLE `perpus` (
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpus`
--

INSERT INTO `perpus` (`nama`, `alamat`, `telp`) VALUES
('READING CORNER', 'JURUSAN BAHASA KOMUNIKASI DAN PARIWISATA POLITEKNIK NEGERI JEMBER', '');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  MODIFY `id_detail_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `detail_pengembalian_temp`
--
ALTER TABLE `detail_pengembalian_temp`
  MODIFY `id_detail_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `history_download`
--
ALTER TABLE `history_download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
