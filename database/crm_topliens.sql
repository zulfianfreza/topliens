-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Jan 2023 pada 12.07
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_topliens`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aspek`
--

CREATE TABLE `tbl_aspek` (
  `id_aspek` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_aspek`
--

INSERT INTO `tbl_aspek` (`id_aspek`, `nama`) VALUES
(1, 'Aspek Ketepatan Waktu'),
(2, 'Aspek Efisiensi'),
(3, 'Aspek Penampilan'),
(4, 'Aspek Kesopanan dan Keramahan'),
(5, 'Aspek Pengetahuan'),
(6, 'Aspek Keahlian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bobot`
--

CREATE TABLE `tbl_bobot` (
  `id_bobot` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_bobot`
--

INSERT INTO `tbl_bobot` (`id_bobot`, `kode`, `keterangan`) VALUES
(1, 'ST', 'Sangat Terpenuhi'),
(2, 'T', 'Terpenuhi'),
(3, 'CT', 'Cukup Terpenuhi'),
(4, 'TT', 'Tidak Terpenuhi'),
(5, 'STT', 'Sangat Tidak Terpenuhi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_info_perusahaan`
--

CREATE TABLE `tbl_info_perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_info_perusahaan`
--

INSERT INTO `tbl_info_perusahaan` (`id`, `nama`, `isi`) VALUES
(1, 'deskripsi', 'CV. Topliens Tekhnik adalah salah satu perusahaan yang bergerak dalam bidang elektronik dan memiliki jasa seperti perbaikan barang dan jasa pembersihan.\r\n\r\nLokasi: Ruko Kramatwatu, Jl. Raya Serang No. 17A, Kota Serang, Banten.\r\n\r\nInformasi Jasa :\r\n- Jasa Perbaikan Barang Elektronik\r\n- Jasa Pembersihan Air Conditioner\r\n- Jasa Perbaikan Spare Part Elektronik'),
(2, 'info_layanan', 'Informasi Jasa :\r\n- Jasa Perbaikan Barang Elektronik\r\n- Jasa Pembersihan Air Conditioner\r\n- Jasa Perbaikan Spare Part Elektronik\r\n\r\nInformasi Jual - Beli \r\nJual :\r\n- Air Conditioner\r\n- Kulkas\r\n- Mesin Cuci\r\n- dll');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jawaban`
--

CREATE TABLE `tbl_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_kuisioner` int(11) NOT NULL,
  `id_pertanyaan` varchar(5) NOT NULL,
  `jawaban` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_jawaban`
--

INSERT INTO `tbl_jawaban` (`id_jawaban`, `id_kuisioner`, `id_pertanyaan`, `jawaban`) VALUES
(81, 12, 'V1', 'SB'),
(82, 12, 'V2', 'SB'),
(83, 12, 'V3', 'KB'),
(84, 12, 'V4', 'SB'),
(85, 12, 'V5', 'KB'),
(86, 12, 'V6', 'SB'),
(87, 12, 'V7', 'SB'),
(88, 12, 'V8', 'SB'),
(89, 13, 'V1', 'SB'),
(90, 13, 'V2', 'SB'),
(91, 13, 'V3', 'KB'),
(92, 13, 'V4', 'SB'),
(93, 13, 'V5', 'SB'),
(94, 13, 'V6', 'SB'),
(95, 13, 'V7', 'SB'),
(96, 13, 'V8', 'SB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kuisioner`
--

CREATE TABLE `tbl_kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kuisioner`
--

INSERT INTO `tbl_kuisioner` (`id_kuisioner`, `username`, `tanggal`) VALUES
(12, '10118100', '2023-01-03 09:58:24'),
(13, '10118170', '2023-01-03 09:58:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pertanyaan`
--

CREATE TABLE `tbl_pertanyaan` (
  `id_pertanyaan` varchar(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `id_aspek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pertanyaan`
--

INSERT INTO `tbl_pertanyaan` (`id_pertanyaan`, `pertanyaan`, `id_aspek`) VALUES
('V1', 'Bagaimana penampilan yang dimiliki oleh karyawan jasa perbaikan', 3),
('V2', 'Apakah prosedur untuk menggunakan layanan jasa perbaikan sangat mudah digunakan', 6),
('V3', 'Apakah pengetahuan serta wawasan yang dimiliki oleh karyawan sangat mudah di pahami serta mengetahui mengenai permasalahan terhadap kerusakan', 5),
('V4', 'Bagaimana kecepatan karyawan jasa perbaikan barang ini', 1),
('V5', 'Apakah informasi yang didapatkan mengenai kejelasan dan kepastian karyawan sangat berguna', 5),
('V6', 'Bagaimana kedisiplinan serta tanggung jawab yang diberikan oleh karyawan jasa perbaikan kepada customer', 4),
('V7', 'Apakah karyawan selalu menerapkan keamanan dalam melakukan jasa perbaikan barang', 4),
('V8', 'Bagaimana mengenai biaya yang dikeluarkan oleh customer apakah sesuai dengan jasa perbaikan yang digunakan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_handphone` varchar(16) NOT NULL,
  `role` enum('customer','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `no_handphone`, `role`) VALUES
(1, 'Admin', 'admin', '26875f4883b3e7df8060324368567b4a', '', 'admin'),
(4, 'Julian Reza', '10118170', 'e10adc3949ba59abbe56e057f20f883e', '', 'customer'),
(5, 'Jo', '10118160', '674f33841e2309ffdd24c85dc3b999de', '', 'customer'),
(6, 'Adam Berriz', '10118100', '1d7c2923c1684726dc23d2901c4d8157', '', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indeks untuk tabel `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `tbl_info_perusahaan`
--
ALTER TABLE `tbl_info_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_kuisioner` (`id_kuisioner`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indeks untuk tabel `tbl_kuisioner`
--
ALTER TABLE `tbl_kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indeks untuk tabel `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `id_aspek` (`id_aspek`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  MODIFY `id_aspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_info_perusahaan`
--
ALTER TABLE `tbl_info_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `tbl_kuisioner`
--
ALTER TABLE `tbl_kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD CONSTRAINT `tbl_jawaban_ibfk_1` FOREIGN KEY (`id_kuisioner`) REFERENCES `tbl_kuisioner` (`id_kuisioner`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jawaban_ibfk_2` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tbl_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD CONSTRAINT `tbl_pertanyaan_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `tbl_aspek` (`id_aspek`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
