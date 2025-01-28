-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2025 pada 14.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `nomor` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `loket` char(1) NOT NULL,
  `datang` time NOT NULL,
  `dilayani` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `antrian`
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
(16, 'selesai', 'A', '23:20:41', '17:22:59'),
(17, 'selesai', 'B', '23:20:42', '17:24:16'),
(18, 'selesai', 'C', '23:20:44', '17:24:20'),
(19, 'selesai', 'C', '23:20:46', '17:26:39'),
(20, 'selesai', 'A', '23:49:43', '12:01:00'),
(21, 'selesai', 'A', '18:54:42', '12:01:03'),
(22, 'selesai', 'A', '18:58:25', '12:01:14'),
(23, 'mengantri', '', '19:35:50', '00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`username`, `password`) VALUES
('root', 'root');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
