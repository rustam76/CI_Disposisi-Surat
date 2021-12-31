-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 11:36 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `dinas`
--

CREATE TABLE `dinas` (
  `nip_dinas` int(11) NOT NULL,
  `nama_dinas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dinas`
--

INSERT INTO `dinas` (`nip_dinas`, `nama_dinas`) VALUES
(1234, 'andi');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `kd_surat` int(11) NOT NULL,
  `nip_sub` int(11) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `batas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `kd_surat`, `nip_sub`, `ket`, `batas`) VALUES
(8, 12, 8, 'ket', '2021-11-18 13:51:15'),
(9, 1, 8, 'ket', '2021-11-18 13:55:37'),
(10, 900, 8, 'baca', '2021-11-18 14:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `kd_pos` int(11) NOT NULL,
  `kd_surat` text NOT NULL,
  `nip_dinas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`kd_pos`, `kd_surat`, `nip_dinas`) VALUES
(1, '1', 1234),
(2, '1', 1234),
(3, '12', 1234),
(4, 'kirim', 8),
(5, '00900', 1234),
(6, 'qw2', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `nip_sub` int(11) NOT NULL,
  `nama_sub` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`nip_sub`, `nama_sub`) VALUES
(8, 'sandi haruna'),
(9, 'rustam');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `kd_surat` varchar(100) NOT NULL,
  `nm_surat` varchar(100) NOT NULL,
  `perihal` varchar(1000) NOT NULL,
  `tgl_surat` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`kd_surat`, `nm_surat`, `perihal`, `tgl_surat`, `file`, `status`) VALUES
('009', 'ads', 'kamu', '2021-11-17', 'SURAT_PERNYATAAN.pdf', 1),
('12', 'qwerty', 'pantauan satgas', '2021-11-18', 'tes7.pdf', 1),
('qw2', 'Tomo Yamashita', 'yttyr', '2021-11-18', 'tes5.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nim` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nim`, `email`, `password`, `role_id`) VALUES
(1, 'ADMIN', '1', 'gelato123@gmail.com', '$2y$10$mKi8aT0SgGRPpWb0fccMlObAGuMSNZTPp6AALVSbPAwZnbw360fqG', 1),
(2, 'sigit', '51', 'sigit@gmail.com', '$2y$10$87bHwJBiXM6NXkdfJrHUdO4CaGOE3IEEHX9pQ5Yr6oQWKQo9M.z1q', 2),
(3, 'rew12', '123', 'aku@gmail.com', '$2y$10$aW.ahYveu.Vvl5vfSm6WY.hatoJBG/jDerMIgcjwouRNXsf9dO7xW', 3),
(4, 'Rian', '1234', 'iccangpalang@gmail.com', '$2y$10$x3N/tXMJUllfxKmetcTC3.e6TFNlepl36wbiHsZhTJ2/SAgr0jM..', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`nip_dinas`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`kd_pos`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`nip_sub`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`kd_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `kd_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
