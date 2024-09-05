-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 27 Des 2023 pada 04.56
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `responsiwd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bandara`
--

CREATE TABLE `bandara` (
  `idbandara` int(100) NOT NULL,
  `namabandara` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bandara`
--

INSERT INTO `bandara` (`idbandara`, `namabandara`, `lokasi`) VALUES
(1000, 'Soekarno–Hatta International Airport', 'Banten(Tangerang)\r\n'),
(1001, 'Ngurah Rai International Airport', 'Bali(Denpasar)'),
(1002, 'Bandar Udara Internasional Sultan Hasanuddin', 'Sulawesi Selatan(Makasar)'),
(1003, 'Halim Perdanakusuma Airport', 'DKI Jakarta(Jakarta)'),
(1004, 'Yogyakarta International Airport', 'Yogyakarta(Kulon Progo)'),
(1005, 'Kualanamu International Airport', 'Medan(Sumatra Utara)'),
(1006, 'Sultan Syarif Kasim II International Airport', 'Riau(Pekanbaru)'),
(1007, 'Sultan Thaha Airport', 'Taman Rimbo(Jambi)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keberangkatan`
--

CREATE TABLE `keberangkatan` (
  `idkeberangkatan` int(100) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `kota_asal` varchar(50) DEFAULT NULL,
  `kota_tujuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keberangkatan`
--

INSERT INTO `keberangkatan` (`idkeberangkatan`, `jam`, `tanggal`, `kota_asal`, `kota_tujuan`) VALUES
(1, '07:00:00', '2023-12-28', 'Yogyakarta(Kulon Progo)', 'Taman Rimbo(Jambi)'),
(2, '07:00:00', '2023-12-28', 'Yogyakarta(Kulon Progo)', 'DKI Jakarta(Jakarta)'),
(3, '07:00:00', '2023-12-28', 'Bali(Denpasar)', 'Banten(Tangerang)'),
(4, '07:00:00', '2023-12-28', 'Banten(Tangerang)', 'Riau(Pekanbaru)'),
(5, '10:00:00', '2023-12-30', 'Riau(Pekanbaru)', 'DKI Jakarta(Jakarta)'),
(6, '10:00:00', '2023-12-30', 'Taman Rimbo(Jambi)', 'Yogyakarta(Kulon Progo)'),
(7, '10:00:00', '2023-12-30', 'Sulawesi Selatan(Makasar)', 'Banten(Tangerang)'),
(8, '10:00:00', '2023-12-30', 'Yogyakarta(Kulon Progo)', 'Taman Rimbo(Jambi)'),
(9, '12:00:00', '2023-12-30', 'Yogyakarta(Kulon Progo)', 'Riau(Pekanbaru)'),
(11, '12:00:00', '2023-12-30', 'Bali(Denpasar)', 'Sulawesi Selatan(Makasar)'),
(12, '12:00:00', '2023-12-30', 'Taman Rimbo(Jambi)', 'Sulawesi Selatan(Makasar)'),
(13, '15:00:00', '2023-12-29', 'Riau(Pekanbaru)', 'Sulawesi Selatan(Makasar)'),
(14, '15:00:00', '2023-12-27', 'DKI Jakarta(Jakarta)', 'Banten(Tangerang)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `peran` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `peran`) VALUES
(1, 'vinast', '181', 'Admin'),
(2, 'admin', '210cf7aa5e2682c9c9d4511f88fe2789', 'Admin'),
(3, 'didik', '181', 'User'),
(4, 'user', 'ef7d9bb8ab1d658266294bfbb1937c6a', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawat`
--

CREATE TABLE `pesawat` (
  `idpesawat` int(100) NOT NULL,
  `namapesawat` varchar(200) NOT NULL,
  `jenis` enum('Penumpang','Cargo') NOT NULL,
  `kapasitas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesawat`
--

INSERT INTO `pesawat` (`idpesawat`, `namapesawat`, `jenis`, `kapasitas`) VALUES
(1100, 'Garuda Indonesia', 'Penumpang', 40),
(1102, 'Lion Air', 'Penumpang', 36),
(1103, 'Citilink', 'Penumpang', 36),
(1104, 'Batik Air', 'Penumpang', 36),
(1105, 'Indonesia AirAsia', 'Penumpang', 40),
(1106, 'Super Air Jett', 'Penumpang', 40),
(1107, 'Pelita Air', 'Cargo', 50),
(1108, 'Wings Air', 'Cargo', 50),
(1109, 'TransNusa', 'Cargo', 40),
(1110, 'Nam Air', 'Cargo', 35);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bandara`
--
ALTER TABLE `bandara`
  ADD PRIMARY KEY (`idbandara`);

--
-- Indeks untuk tabel `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD PRIMARY KEY (`idkeberangkatan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`idpesawat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bandara`
--
ALTER TABLE `bandara`
  MODIFY `idbandara` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT untuk tabel `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `idkeberangkatan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2107;

--
-- AUTO_INCREMENT untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `idpesawat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
