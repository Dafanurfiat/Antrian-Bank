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
-- Database: `antrianku`
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
(1, 'selesai', 'A', '18:14:26', '18:14:39'),
(2, 'selesai', 'B', '18:14:36', '18:14:41'),
(3, 'selesai', 'A', '18:15:58', '18:18:40'),
(4, 'selesai', 'A', '23:21:57', '18:22:55'),
(5, 'selesai', 'B', '00:22:42', '18:22:58'),
(6, 'dilayani', 'A', '00:55:47', '19:02:38'),
(7, 'dilayani', 'B', '00:56:09', '19:02:40'),
(8, 'selesai', 'C', '00:57:01', '19:02:42'),
(9, 'mengantri', '', '01:18:14', '00:00:00'),
(10, 'mengantri', '', '18:14:58', '00:00:00'),
(11, 'mengantri', '', '21:54:31', '00:00:00'),
(12, 'mengantri', '', '23:42:58', '00:00:00'),
(13, 'mengantri', '', '22:38:52', '00:00:00'),
(14, 'mengantri', '', '22:29:08', '00:00:00'),
(15, 'mengantri', '', '22:29:21', '00:00:00'),
(16, 'mengantri', '', '18:55:56', '00:00:00');

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
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
