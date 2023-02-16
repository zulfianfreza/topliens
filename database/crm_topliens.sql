-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Feb 2023 pada 14.40
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
(6, 'Aspek Keahlian'),
(7, 'Aspek Keamanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_evaluasi`
--

CREATE TABLE `tbl_evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `id_pertanyaan` varchar(5) NOT NULL,
  `evaluasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_evaluasi`
--

INSERT INTO `tbl_evaluasi` (`id_evaluasi`, `id_pertanyaan`, `evaluasi`) VALUES
(1, 'V1', 'UNSUR PELAYANAN PADA \"Bagaimana penampilan yang dimiliki oleh karyawan jasa perbaikan\" HARUS DI EVALUASI,DIPERBAIKI, DAN DITINGKATKAN LAGI DENGAN CARA MENERAPKAN ATURAN SOP \r\nTERHADAP PAKAIAN DAN PENAMPILAN YANG DIMILIKI OLEH PERUSAHAAN DENGAN HARAPAN TIDAK MEMBAHAYAKAN CUSTOMER DAN MEMBERIKAN RASA KEPERCAYAAN CUSTOMER YANG MELAKUKAN JASA PERBAIKAN.'),
(2, 'V2', 'UNSUR PELAYANAN PADA \"Apakah prosedur untuk menggunakan layanan jasa perbaikan sangat mudah digunakan\" HARUS DI EVALUASI DAN DIPERBAIKI DENGAN CARA MEMBERIKAN \r\nPROSEDUR YANG LEBIH MUDAH DIPAHAMI OLEH CUSTOMER YAITU DENGAN MEMBERIKAN KONFIRMASI KEJELASAN KETERSEDIAAN KARYAWAN SEHINGGA MEMBUAT CUSTOMER TIDAK MENUNGU TERLALU LAMA\r\nDENGAN MENAMBAH JUMLAH KARYAWAN.'),
(3, 'V3', 'UNSUR PELAYANAN PADA \"Apakah pengetahuan serta wawasan yang dimiliki oleh karyawan sangat mudah di pahami serta mengetahui mengenai permasalahan terhadap kerusakan\"\r\nHARUS DI EVALUASI SERTA DI TINGKATKAN KEMBALI MENGENAI PENGETAHUAN DAN WAWASAN YANG DIMILIKI OLEH KARYAWAN DENGAN CARA MEMBERIKAN PELATIHAN TERHADAP HAL HAL YANG DIBINGGUNGKAN \r\nOLEH KARYAWAN DENGAN KASUS YANG DIBERIKAN DALAM PELATIHAN ULANG.'),
(5, 'V5', 'UNSUR PELAYANAN PADA \"Apakah informasi yang didapatkan mengenai kejelasan dan kepastian karyawan sangat berguna\" HARUS DI EVALUASI DENGAN CARA MEMBERIKAN INFORMASI DAN KEPASTIAN YANG LEBIH MENDETAIL KEPADA CUSOMER \r\nDENGAN MEMBERIKAN HARAPAN KEPADA CUSTOMER BAHWA INFORMASI YANG DI DAPATKAN SESUAI DENGAN YANG DI BERIKAN'),
(6, 'V6', 'UNSUR PELAYANAN PADA \"Bagaimana kedisiplinan serta tanggung jawab yang diberikan oleh karyawan jasa perbaikan kepada customer\" HARUS DI EVALUASI SERTA DITINGKATKAN KEMBALI \r\nRASA BERTANGGUNG JAWAB DAN KEDISIPLINAN KARYAWAN TERHADAP CUSTOMER DENGAN CARA MEMBERIKAN PELATIHAN MENGENAI RASA BERTANGGUNG JAWAB DAN KEDISIPLINAN.'),
(7, 'V7', 'UNSUR PELAYANAN PADA \" Apakah karyawan selalu menerapkan keamanan dalam melakukan jasa perbaikan barang\" HARUS DI EVALUASI UNTUK MENINGKATKAN PROSEDUR KEMANAN DALAM MELAKUKAN JASA PERBAIKAN BARANG DENGAN CARA\r\nMENERAPKAN DAN MEMPERTEGAS KARYAWAN UNTUK MELAKSANAKAN PROSEDUR SOP YANG DIMILIKI PERUSAHAAN SEHINGGA TIDAK MEMBAHAYAKAN KEAMANAN KARYAWAN ATAUPUN CUSTOMER YANG MELAKUKAN JASA PERBAIKAN.'),
(9, 'V4', 'UNSUR PELAYANAN PADA \"Bagaimana kecepatan karyawan jasa perbaikan barang ini\" HARUS DI EVALUASI DAN DIPERBAIKI DENGAN CARA MEMBERIKAN SANKSI/TEGURAN APABILA MELAKUKAN KETERLAMBATAN WAKTU\r\nSELAMA 30 MENIT DENGAN JANJI YANG TELAH DIBERIKAN KEPADA CUSTOMER.'),
(11, 'V8', 'UNSUR PELAYANAN PADA \" Bagaimana mengenai biaya yang dikeluarkan oleh customer apakah sesuai dengan jasa perbaikan yang digunakan\" HARUS DI EVALUASI UNTUK MENINGKATKAN KEPERCAYAAN CUSTOMER DAN CUSTOMER BARU\r\nDENGAN MEMBERIKAN HARGA YANG SESUAI NAMUN DIJELASKAN KEMBALI MENGENAI RINCIAN KERUSAKAN YANG DI PERBAIKI SEHINGGA MEMBUAT CUSTOMER PERCAYA AKAN BIAYA YANG DIKELUARKAN SESUAI DENGAN KERUSAKAN YANG DI ALAMI.');

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
(1, 'deskripsi', 'CV. Topliens Tekhnik adalah salah satu perusahaan yang bergerak dalam bidang elektronik dan memiliki jasa seperti perbaikan barang dan jasa pembersihan.\r\n\r\nLokasi: Ruko Kramatwatu, Jl. Raya Serang No. 17A, Kota Serang, Banten.\r\n\r\nInformasi Jasa :\r\n- Jasa Perbaikan Barang Elektronik\r\n- Jasa Pembersihan Air Conditioner\r\n- Jasa Perbaikan Spare Part Elektronik\r\n\r\nInformasi Jual - Beli\r\nJual :\r\n- Air Conditioner\r\n- Kulkas\r\n- Mesin Cuci'),
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
(96, 13, 'V8', 'SB'),
(97, 14, 'V1', 'KB'),
(98, 14, 'V2', 'KB'),
(99, 14, 'V3', 'KB'),
(100, 14, 'V4', 'SB'),
(101, 14, 'V5', 'KB'),
(102, 14, 'V6', 'SB'),
(103, 14, 'V7', 'KB'),
(104, 14, 'V8', 'KB'),
(105, 15, 'V1', 'SB'),
(106, 15, 'V2', 'SB'),
(107, 15, 'V3', 'SB'),
(108, 15, 'V4', 'SB'),
(109, 15, 'V5', 'SB'),
(110, 15, 'V6', 'SB'),
(111, 15, 'V7', 'SB'),
(112, 15, 'V8', 'KB'),
(113, 16, 'V1', 'SB'),
(114, 16, 'V2', 'SB'),
(115, 16, 'V3', 'KB'),
(116, 16, 'V4', 'SB'),
(117, 16, 'V5', 'SB'),
(118, 16, 'V6', 'SB'),
(119, 16, 'V7', 'SB'),
(120, 16, 'V8', 'SB'),
(121, 17, 'V1', 'SB'),
(122, 17, 'V2', 'SB'),
(123, 17, 'V3', 'SB'),
(124, 17, 'V4', 'SB'),
(125, 17, 'V5', 'SB'),
(126, 17, 'V6', 'SB'),
(127, 17, 'V7', 'KB'),
(128, 17, 'V8', 'SB'),
(129, 18, 'V1', 'SB'),
(130, 18, 'V2', 'KB'),
(131, 18, 'V3', 'SB'),
(132, 18, 'V4', 'KB'),
(133, 18, 'V5', 'SB'),
(134, 18, 'V6', 'SB'),
(135, 18, 'V7', 'SB'),
(136, 18, 'V8', 'SB'),
(137, 19, 'V1', 'SB'),
(138, 19, 'V2', 'SB'),
(139, 19, 'V3', 'SB'),
(140, 19, 'V4', 'SB'),
(141, 19, 'V5', 'SB'),
(142, 19, 'V6', 'SB'),
(143, 19, 'V7', 'SB'),
(144, 19, 'V8', 'SB'),
(145, 20, 'V1', 'KB'),
(146, 20, 'V2', 'SB'),
(147, 20, 'V3', 'SB'),
(148, 20, 'V4', 'SB'),
(149, 20, 'V5', 'SB'),
(150, 20, 'V6', 'SB'),
(151, 20, 'V7', 'SB'),
(152, 20, 'V8', 'SB'),
(153, 21, 'V1', 'SB'),
(154, 21, 'V2', 'SB'),
(155, 21, 'V3', 'SB'),
(156, 21, 'V4', 'SB'),
(157, 21, 'V5', 'KB'),
(158, 21, 'V6', 'SB'),
(159, 21, 'V7', 'SB'),
(160, 21, 'V8', 'SB'),
(161, 22, 'V1', 'SB'),
(162, 22, 'V2', 'SB'),
(163, 22, 'V3', 'SB'),
(164, 22, 'V4', 'SB'),
(165, 22, 'V5', 'SB'),
(166, 22, 'V6', 'SB'),
(167, 22, 'V7', 'SB'),
(168, 22, 'V8', 'SB'),
(169, 23, 'V1', 'SB'),
(170, 23, 'V2', 'SB'),
(171, 23, 'V3', 'SB'),
(172, 23, 'V4', 'SB'),
(173, 23, 'V5', 'SB'),
(174, 23, 'V6', 'SB'),
(175, 23, 'V7', 'SB'),
(176, 23, 'V8', 'SB'),
(177, 24, 'V1', 'SB'),
(178, 24, 'V2', 'SB'),
(179, 24, 'V3', 'SB'),
(180, 24, 'V4', 'KB'),
(181, 24, 'V5', 'SB'),
(182, 24, 'V6', 'SB'),
(183, 24, 'V7', 'SB'),
(184, 24, 'V8', 'SB'),
(185, 25, 'V1', 'SB'),
(186, 25, 'V2', 'SB'),
(187, 25, 'V3', 'SB'),
(188, 25, 'V4', 'SB'),
(189, 25, 'V5', 'SB'),
(190, 25, 'V6', 'SB'),
(191, 25, 'V7', 'SB'),
(192, 25, 'V8', 'SB'),
(193, 26, 'V1', 'SB'),
(194, 26, 'V2', 'SB'),
(195, 26, 'V3', 'SB'),
(196, 26, 'V4', 'SB'),
(197, 26, 'V5', 'KB'),
(198, 26, 'V6', 'SB'),
(199, 26, 'V7', 'SB'),
(200, 26, 'V8', 'SB'),
(201, 27, 'V1', 'SB'),
(202, 27, 'V2', 'KB'),
(203, 27, 'V3', 'SB'),
(204, 27, 'V4', 'KB'),
(205, 27, 'V5', 'SB'),
(206, 27, 'V6', 'SB'),
(207, 27, 'V7', 'SB'),
(208, 27, 'V8', 'SB'),
(209, 28, 'V1', 'KB'),
(210, 28, 'V2', 'SB'),
(211, 28, 'V3', 'SB'),
(212, 28, 'V4', 'SB'),
(213, 28, 'V5', 'SB'),
(214, 28, 'V6', 'SB'),
(215, 28, 'V7', 'SB'),
(216, 28, 'V8', 'SB'),
(217, 29, 'V1', 'SB'),
(218, 29, 'V2', 'SB'),
(219, 29, 'V3', 'SB'),
(220, 29, 'V4', 'SB'),
(221, 29, 'V5', 'SB'),
(222, 29, 'V6', 'SB'),
(223, 29, 'V7', 'SB'),
(224, 29, 'V8', 'SB'),
(225, 30, 'V1', 'SB'),
(226, 30, 'V2', 'KB'),
(227, 30, 'V3', 'SB'),
(228, 30, 'V4', 'SB'),
(229, 30, 'V5', 'SB'),
(230, 30, 'V6', 'SB'),
(231, 30, 'V7', 'SB'),
(232, 30, 'V8', 'KB'),
(233, 31, 'V1', 'KB'),
(234, 31, 'V2', 'SB'),
(235, 31, 'V3', 'KB'),
(236, 31, 'V4', 'SB'),
(237, 31, 'V5', 'SB'),
(238, 31, 'V6', 'SB'),
(239, 31, 'V7', 'SB'),
(240, 31, 'V8', 'SB'),
(241, 32, 'V1', 'KB'),
(242, 32, 'V2', 'SB'),
(243, 32, 'V3', 'SB'),
(244, 32, 'V4', 'SB'),
(245, 32, 'V5', 'SB'),
(246, 32, 'V6', 'KB'),
(247, 32, 'V7', 'SB'),
(248, 32, 'V8', 'KB'),
(249, 33, 'V1', 'SB'),
(250, 33, 'V2', 'SB'),
(251, 33, 'V3', 'SB'),
(252, 33, 'V4', 'KB'),
(253, 33, 'V5', 'SB'),
(254, 33, 'V6', 'SB'),
(255, 33, 'V7', 'SB'),
(256, 33, 'V8', 'SB'),
(257, 34, 'V1', 'SB'),
(258, 34, 'V2', 'SB'),
(259, 34, 'V3', 'SB'),
(260, 34, 'V4', 'SB'),
(261, 34, 'V5', 'SB'),
(262, 34, 'V6', 'SB'),
(263, 34, 'V7', 'SB'),
(264, 34, 'V8', 'SB'),
(265, 35, 'V1', 'SB'),
(266, 35, 'V2', 'SB'),
(267, 35, 'V3', 'KB'),
(268, 35, 'V4', 'SB'),
(269, 35, 'V5', 'KB'),
(270, 35, 'V6', 'SB'),
(271, 35, 'V7', 'SB'),
(272, 35, 'V8', 'SB'),
(273, 36, 'V1', 'SB'),
(274, 36, 'V2', 'SB'),
(275, 36, 'V3', 'SB'),
(276, 36, 'V4', 'SB'),
(277, 36, 'V5', 'SB'),
(278, 36, 'V6', 'SB'),
(279, 36, 'V7', 'SB'),
(280, 36, 'V8', 'SB'),
(281, 37, 'V1', 'SB'),
(282, 37, 'V2', 'SB'),
(283, 37, 'V3', 'SB'),
(284, 37, 'V4', 'SB'),
(285, 37, 'V5', 'SB'),
(286, 37, 'V6', 'SB'),
(287, 37, 'V7', 'SB'),
(288, 37, 'V8', 'SB'),
(289, 38, 'V1', 'SB'),
(290, 38, 'V2', 'SB'),
(291, 38, 'V3', 'KB'),
(292, 38, 'V4', 'SB'),
(293, 38, 'V5', 'SB'),
(294, 38, 'V6', 'SB'),
(295, 38, 'V7', 'SB'),
(296, 38, 'V8', 'KB'),
(297, 39, 'V1', 'SB'),
(298, 39, 'V2', 'SB'),
(299, 39, 'V3', 'SB'),
(300, 39, 'V4', 'SB'),
(301, 39, 'V5', 'SB'),
(302, 39, 'V6', 'SB'),
(303, 39, 'V7', 'SB'),
(304, 39, 'V8', 'SB'),
(305, 40, 'V1', 'SB'),
(306, 40, 'V2', 'SB'),
(307, 40, 'V3', 'SB'),
(308, 40, 'V4', 'SB'),
(309, 40, 'V5', 'SB'),
(310, 40, 'V6', 'SB'),
(311, 40, 'V7', 'SB'),
(312, 40, 'V8', 'SB'),
(313, 41, 'V1', 'SB'),
(314, 41, 'V2', 'KB'),
(315, 41, 'V3', 'SB'),
(316, 41, 'V4', 'SB'),
(317, 41, 'V5', 'SB'),
(318, 41, 'V6', 'SB'),
(319, 41, 'V7', 'SB'),
(320, 41, 'V8', 'SB');

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
(12, '00702', '2023-01-03 09:58:24'),
(13, '00700', '2023-01-03 09:58:54'),
(14, '00703', '2023-01-14 15:00:47'),
(15, '00704', '2023-01-15 13:18:37'),
(16, '00705', '2023-01-15 13:18:54'),
(17, '00706', '2023-01-15 13:19:12'),
(18, '00707', '2023-01-15 13:19:29'),
(19, '00708', '2023-01-15 13:19:44'),
(20, '00709', '2023-01-15 13:22:14'),
(21, '00710', '2023-01-15 13:22:45'),
(22, '00711', '2023-01-15 13:33:33'),
(23, '00712', '2023-01-15 13:34:11'),
(24, '00713', '2023-01-15 13:34:35'),
(25, '00714', '2023-01-15 13:40:59'),
(26, '00715', '2023-01-15 13:41:16'),
(27, '00716', '2023-01-15 13:41:31'),
(28, '00717', '2023-01-15 13:41:48'),
(29, '00718', '2023-01-15 13:42:08'),
(30, '00719', '2023-01-15 19:46:12'),
(31, '00720', '2023-01-15 19:46:29'),
(32, '00721', '2023-01-15 19:46:43'),
(33, '00722', '2023-01-15 19:46:58'),
(34, '00723', '2023-01-15 19:47:21'),
(35, '00724', '2023-01-15 19:51:34'),
(36, '00725', '2023-01-15 19:51:50'),
(37, '00726', '2023-01-15 19:52:08'),
(38, '00727', '2023-01-15 19:52:22'),
(39, '00728', '2023-01-15 19:52:36'),
(40, '00729', '2023-01-15 19:52:50'),
(41, '00730', '2023-01-15 19:53:04');

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
('V2', 'Apakah prosedur untuk menggunakan layanan jasa perbaikan sangat mudah digunakan', 2),
('V3', 'Apakah pengetahuan serta wawasan yang dimiliki oleh karyawan sangat mudah di pahami serta mengetahui mengenai permasalahan terhadap kerusakan', 6),
('V4', 'Bagaimana kecepatan karyawan jasa perbaikan barang ini', 1),
('V5', 'Apakah informasi yang didapatkan mengenai kejelasan dan kepastian karyawan sangat berguna', 5),
('V6', 'Bagaimana kedisiplinan serta tanggung jawab yang diberikan oleh karyawan jasa perbaikan kepada customer', 4),
('V7', 'Apakah karyawan selalu menerapkan keamanan dalam melakukan jasa perbaikan barang', 7),
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
(4, 'Julian Reza', '00700', 'e10adc3949ba59abbe56e057f20f883e', '', 'customer'),
(5, 'Jo', '00701', '674f33841e2309ffdd24c85dc3b999de', '', 'customer'),
(6, 'Adam Berriz', '00702', '1d7c2923c1684726dc23d2901c4d8157', '', 'customer'),
(7, 'Albert Rotinaluhu', '00703', '6c5bc43b443975b806740d8e41146479', '', 'customer'),
(8, 'Bagus Setiawan', '00704', '3d49d3840e69d771b002185ab08a3c25', '', 'customer'),
(9, 'Ayus Saubi', '00705', '2dff7556401d7068e6923843e16596e2', '', 'customer'),
(10, 'Gilang Bhaskara', '00706', '6e8fdc10c6519f6a5ba58ce1c2f63567', '', 'customer'),
(11, 'Rizki Septa', '00707', '970c32deefc825e243f988dba68252ee', '', 'customer'),
(12, 'Jo Chrisandy', '00708', '02700d2daa54fdefb1aead5f285befc3', '', 'customer'),
(13, 'Hanifa Islamawati', '00709', '44113d01f18afa2fcac1e578bc32751c', '', 'customer'),
(14, 'M. Yunus', '00710', '5552a5f4f934692fc78a295563abd4f3', '', 'customer'),
(15, 'Siti Romlah', '00711', '18b85cc71c38df5c273f3f1236ae59a6', '', 'customer'),
(16, 'Anisa Ishak', '00712', '309e1b1b25d6d5759d253651eead1222', '', 'customer'),
(17, 'Dian Ayu', '00713', '25d1c4ac54299480894bb5c0d01bae89', '', 'customer'),
(18, 'Cipta Dewi', '00714', '284463331cbcc2fb7a3d994a04c73f5d', '08128929829', 'customer'),
(19, 'Langit Amirullah', '00715', '7f7073cec7cd3b1042a1a08beeea3159', '089722987298', 'customer'),
(20, 'Senja Azkia', '00716', '86d723881df2c2eba78993c62f68ba2b', '08127876876', 'customer'),
(21, 'Naqiah Khoirunnisa', '00717', '578e1fe008738b5549c2d438d800be06', '08963876863', 'customer'),
(22, 'Asep Saepuloh', '00718', 'd0cebb754cdb7e1a0b071b5b9ea15ce1', '08911987938', 'customer'),
(23, 'Adam Julian', '00719', 'ea51d31eb6bd44a42f6e28ec1a4ce506', '08968763876', 'customer'),
(24, 'M. Farhan', '00720', 'bda2627ccb00fd9daecfbe28f965584b', '08129879872', 'customer'),
(25, 'Siti Assyifa', '00721', '69a9998d58a2aa3b9c7c4ce9cd95add3', '08568876876', 'customer'),
(26, 'Yoga Simbolon', '00722', '5e0ac8031f88cfadc63444d1c783be4e', '08968728763', 'customer'),
(27, 'M. Yusril', '00723', 'b25b21fc4f708fc51d789bae1fc178d3', '08993868763', 'customer'),
(28, 'Siti Rahma', '00724', 'dd4518b7e335353acd35c074d626f32c', '08966387678', 'customer'),
(29, 'Rizki Dwi', '00725', 'edc7ae6aaf4d71d4c7b1be9f57def074', '08128768762', 'customer'),
(30, 'Agus Zabran', '00726', 'dfc2edcc6ec750777dbda2f4e291eaaf', '08122876876', 'customer'),
(31, 'Fajar Yusrin', '00727', 'e008389b46065ea87f8e395a520daeba', '08968768768', 'customer'),
(32, 'Reza Pratama', '00728', 'e66d3e0225739f3c9913bbbb983d91a2', '08287687622', 'customer'),
(33, 'M. Ruslan', '00729', '6819ca5323059519e543c2413e87338b', '08992287686', 'customer'),
(34, 'Deni Afrianto', '00730', '953f50463cbe1f514b0afaaae2b8f6ce', '08122888722', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indeks untuk tabel `tbl_evaluasi`
--
ALTER TABLE `tbl_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`);

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
  ADD PRIMARY KEY (`id_kuisioner`),
  ADD KEY `username` (`username`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  MODIFY `id_aspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_evaluasi`
--
ALTER TABLE `tbl_evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_info_perusahaan`
--
ALTER TABLE `tbl_info_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT untuk tabel `tbl_kuisioner`
--
ALTER TABLE `tbl_kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
-- Ketidakleluasaan untuk tabel `tbl_kuisioner`
--
ALTER TABLE `tbl_kuisioner`
  ADD CONSTRAINT `tbl_kuisioner_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD CONSTRAINT `tbl_pertanyaan_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `tbl_aspek` (`id_aspek`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
