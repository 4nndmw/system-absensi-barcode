-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2023 at 10:54 PM
-- Server version: 8.0.34-0ubuntu0.23.04.1
-- PHP Version: 8.1.12-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nik` int NOT NULL,
  `nama_pegawai` varchar(111) NOT NULL,
  `gambar` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nik`, `nama_pegawai`, `gambar`) VALUES
(12345, 'ananda', '64f5edd19356e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_absensi`
--

CREATE TABLE `table_absensi` (
  `nik` int NOT NULL,
  `nama_pegawai` varchar(111) NOT NULL,
  `absen` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `table_absensi`
--
ALTER TABLE `table_absensi`
  ADD KEY `nik` (`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_absensi`
--
ALTER TABLE `table_absensi`
  ADD CONSTRAINT `table_absensi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pegawai` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
