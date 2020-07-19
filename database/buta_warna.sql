-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2020 at 02:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buta_warna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `kata_sandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `kata_sandi`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pemeriksaan`
--

CREATE TABLE `hasil_pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `kode_test` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_test` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_pemeriksaan`
--

INSERT INTO `hasil_pemeriksaan` (`id_pemeriksaan`, `kode_test`, `id_user`, `tanggal_test`) VALUES
(17, '25Feb2020145816', 1, '2020-02-25'),
(18, '25Feb2020150018', 1, '2020-02-25'),
(19, '03Mar2020030238', 1, '2020-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_sementara`
--

CREATE TABLE `hasil_sementara` (
  `id_hasil_sementara` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_sementara`
--

INSERT INTO `hasil_sementara` (`id_hasil_sementara`, `id_user`, `id_penyakit`, `jawaban`) VALUES
(916, 1, 1, 1),
(917, 1, 2, 1),
(918, 1, 2, 1),
(919, 1, 2, 1),
(920, 1, 2, 1),
(921, 1, 2, 1),
(922, 1, 2, 1),
(923, 1, 1, 1),
(924, 1, 1, 1),
(925, 1, 2, 1),
(926, 1, 2, 1),
(927, 1, 1, 1),
(928, 1, 2, 1),
(929, 1, 1, 1),
(930, 1, 1, 1),
(931, 1, 1, 1),
(932, 1, 1, 1),
(933, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_test`
--

CREATE TABLE `hasil_test` (
  `id_hasil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `kode_test` varchar(100) NOT NULL,
  `presentase_hasil` decimal(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_test`
--

INSERT INTO `hasil_test` (`id_hasil`, `id_user`, `id_penyakit`, `kode_test`, `presentase_hasil`) VALUES
(106, 1, 1, '25Feb2020145816', '0.0'),
(107, 1, 2, '25Feb2020145816', '0.0'),
(108, 1, 1, '25Feb2020150018', '0.0'),
(109, 1, 2, '25Feb2020150018', '0.0'),
(110, 1, 1, '25Feb2020151246', '50.0'),
(111, 1, 2, '25Feb2020151246', '75.0'),
(112, 1, 1, '25Feb2020151339', '0.0'),
(113, 1, 2, '25Feb2020151339', '50.0'),
(114, 1, 1, '25Feb2020151458', '50.0'),
(115, 1, 2, '25Feb2020151458', '75.0'),
(116, 1, 1, '25Feb2020151612', '0.0'),
(117, 1, 1, '25Feb2020151756', '0.0'),
(118, 1, 1, '25Feb2020151807', '0.0'),
(119, 1, 1, '25Feb2020151842', '50.0'),
(120, 1, 1, '25Feb2020151909', '0.0'),
(121, 1, 1, '25Feb2020151933', '75.0'),
(122, 1, 1, '25Feb2020153025', '75.0'),
(123, 1, 1, '03Mar2020030238', '21.0');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `defenisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `defenisi`) VALUES
(1, 'Buta Warna', 'Buta warna merah adalah'),
(2, 'Buta warna hijau', 'buta warna hijau adalah');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `soal` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_penyakit`, `soal`, `jawaban`) VALUES
(33, 1, 'circle-cropped (12).png', '45'),
(34, 2, 'circle-cropped (1).png', '1'),
(35, 2, 'circle-cropped (5).png', '42'),
(36, 2, 'circle-cropped (2).png', '2'),
(37, 2, 'circle-cropped.png', '74'),
(38, 2, 'circle-cropped (3).png', '3'),
(39, 2, 'circle-cropped (4).png', '16'),
(40, 1, 'merah-6.png', '6'),
(41, 1, 'circle-cropped (16).png', '8'),
(42, 2, 'circle-cropped (13).png', '5'),
(44, 2, 'circle-cropped (14).png', '6'),
(45, 1, 'circle-cropped (18).png', '57'),
(46, 2, 'circle-cropped (15).png', '15'),
(51, 1, 'circle-cropped (19).png', '96'),
(54, 1, 'circle-cropped (8).png', '12'),
(58, 1, 'circle-cropped (17).png', '29'),
(60, 1, 'circle-cropped (7).png', '6'),
(64, 1, 'circle-cropped (21).png', '97');

-- --------------------------------------------------------

--
-- Table structure for table `sementara`
--

CREATE TABLE `sementara` (
  `id_sementara` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sementara`
--

INSERT INTO `sementara` (`id_sementara`, `id_user`, `id_pertanyaan`, `jawaban_user`) VALUES
(963, 1, 33, 4),
(964, 1, 34, 4),
(965, 1, 35, 4),
(966, 1, 36, 4),
(967, 1, 37, 4),
(968, 1, 38, 4),
(969, 1, 39, 4),
(970, 1, 40, 4),
(971, 1, 41, 4),
(972, 1, 42, 4),
(973, 1, 44, 4),
(974, 1, 45, 4),
(975, 1, 46, 4),
(976, 1, 51, 4),
(977, 1, 54, 4),
(978, 1, 58, 4),
(979, 1, 60, 4),
(980, 1, 64, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kata_sandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `tgl_lahir`, `no_hp`, `alamat`, `kata_sandi`) VALUES
(1, 'yefta', '2020-02-04', '082292888306', 'jl. Raya', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `hasil_sementara`
--
ALTER TABLE `hasil_sementara`
  ADD PRIMARY KEY (`id_hasil_sementara`);

--
-- Indexes for table `hasil_test`
--
ALTER TABLE `hasil_test`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `sementara`
--
ALTER TABLE `sementara`
  ADD PRIMARY KEY (`id_sementara`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hasil_sementara`
--
ALTER TABLE `hasil_sementara`
  MODIFY `id_hasil_sementara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=934;

--
-- AUTO_INCREMENT for table `hasil_test`
--
ALTER TABLE `hasil_test`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sementara`
--
ALTER TABLE `sementara`
  MODIFY `id_sementara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=981;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
