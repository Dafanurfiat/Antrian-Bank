-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 06:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrianku2`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `nomor` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `loket` char(1) NOT NULL,
  `datang` time NOT NULL,
  `dilayani` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`nomor`, `status`, `loket`, `datang`, `dilayani`) VALUES
(1, 'selesai', 'A', '01:18:58', '19:25:36'),
(2, 'selesai', 'B', '01:25:18', '19:25:38'),
(3, 'selesai', 'C', '19:46:11', '17:06:48'),
(4, 'selesai', 'B', '19:56:32', '17:06:50'),
(5, 'selesai', 'A', '19:57:33', '17:06:51'),
(6, 'selesai', 'C', '20:19:50', '17:06:52'),
(7, 'selesai', 'C', '20:39:50', '17:07:25'),
(8, 'selesai', 'C', '21:54:38', '17:07:53'),
(9, 'selesai', 'C', '23:41:48', '17:08:01'),
(10, 'selesai', 'C', '00:02:23', '17:08:22'),
(11, 'selesai', 'C', '22:21:26', '17:09:31'),
(12, 'selesai', 'C', '22:24:11', '17:09:39'),
(13, 'selesai', 'C', '22:44:02', '17:09:51'),
(14, 'selesai', 'A', '23:20:36', '17:20:53'),
(15, 'selesai', 'A', '23:20:39', '17:21:46'),
(16, 'dilayani', 'A', '23:20:41', '17:22:59'),
(17, 'dilayani', 'B', '23:20:42', '17:24:16'),
(18, 'selesai', 'C', '23:20:44', '17:24:20'),
(19, 'dilayani', 'C', '23:20:46', '17:26:39'),
(20, 'mengantri', '', '23:49:43', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`username`, `password`) VALUES
('root', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
