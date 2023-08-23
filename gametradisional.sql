-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 04:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gametradisional`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` longtext NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `foto`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Sukma Ambarwati', 'app/Admin/avatar.jpg', 'sukma@gmail.com', '$2y$10$McMEW2jrGv1/fCrb4lCYBemagu2E6OtPpiCg.ISiPiruCLWc8SK9K', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeri_permainan`
--

CREATE TABLE `galeri_permainan` (
  `id` int(11) NOT NULL,
  `id_permainan` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri_permainan`
--

INSERT INTO `galeri_permainan` (`id`, `id_permainan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'app/Galeripermainan/168389447465.jpg', '2023-05-12 19:27:54', '2023-05-12 19:27:54'),
(2, 1, 'app/Galeripermainan/168389447473.jpg', '2023-05-12 19:27:54', '2023-05-12 19:27:54'),
(3, 1, 'app/Galeripermainan/168389447431.jpg', '2023-05-12 19:27:54', '2023-05-12 19:27:54'),
(4, 1, 'app/Galeripermainan/168389447475.jpg', '2023-05-12 19:27:54', '2023-05-12 19:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `pertanyaan` longtext NOT NULL,
  `a` longtext NOT NULL,
  `b` longtext NOT NULL,
  `c` longtext NOT NULL,
  `d` longtext NOT NULL,
  `jawaban` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `id_kuis` int(11) NOT NULL,
  `skor` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permainan`
--

CREATE TABLE `permainan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal_daerah` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permainan`
--

INSERT INTO `permainan` (`id`, `nama`, `asal_daerah`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Bola Keranjang / bahasa Gayo = tipak rege ( sepak raga (sepak takraw)', 'ACEH', '<div>Bola keranjang atau bahasa Gayo di-sebut dengan tipak rege merupakan sejenis permainan bola yang dibuat dari rotan belah yang dipergunakan pada permainan sepak raga (sepak takraw). Permainan ini sudah jarang sekali dilakukan. Pada bola keran&shy;jang diikat rumbai-rumbai kain yang berwarna merah, putih, dan hitam, sebanyak 15 helai. Zaman masa da&shy;hulu, sepak raga merupakan sejenis permainan rakyat. Permainan ini san&shy;gat digemari oleh anak-anak, rem&shy;aja/pemuda maupun orang-orang dewasa. Mereka memanfaatkan waktu-waktu senggangnya dengan permainan ini.</div>\r\n<div>&nbsp;</div>\r\n<div>\r\n<div>Sepak takraw merupakan olahraga yang konon berasal dari zaman Kesultanan Malaka 1402-1511. Sepak takraw memiliki nama lain, sepak raga. Dalam permainan, ada dua tim yang saling berhadapan. Masing-masing kelompok terdiri dari tiga orang. Dan mereka tak boleh menyentuh bola dengan tangan, hanya menggunakan kaki.</div>\r\n<div>&nbsp;</div>\r\n<div>Kini, sepak takraw telah memilki asosiasi internasional bernama ISTAF dan terdaftar dalam kategori pertandingan SEA Games serta Asian Games. Lapangan sepak takraw sendiri berukuran dua kali lapangan bulutangkis. Dengan pembatas kedua tim mirip net pada badminton. Yang spesial, olahraga ini menggunakan bola khusus dari rotan.</div>\r\n</div>\r\n<div>&nbsp;</div>', '2023-05-12 19:27:54', '2023-05-12 19:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `nama`, `avatar`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Rajuandi', 'app/Player/-1685880442-1izsw.jpg', 'rajuandi@gmail.com', '$2y$10$McMEW2jrGv1/fCrb4lCYBemagu2E6OtPpiCg.ISiPiruCLWc8SK9K', '2023-06-04 19:07:22', '2023-06-04 19:07:22'),
(3, 'Dedi Wahyudi', 'app/Player/-1685926214-hMI4I.png', 'dedi@gmail.com', '$2y$10$xIcdl9pg3p1Yy6EEdtoLHeytIFChXBMgku9Wa0FXSh0Ps5EuMBfD6', '2023-06-05 07:50:15', '2023-06-05 07:50:15'),
(4, 'Dede', 'app/Player/-1685927582-HoBBy.png', 'Ggg', '$2y$10$L5tvpc7/mbKI8IUhvP64UuJ8ohR.BNQS5NH2XO57nGiFeIqB5fEEy', '2023-06-05 08:13:02', '2023-06-05 08:13:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_permainan`
--
ALTER TABLE `galeri_permainan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permainan`
--
ALTER TABLE `permainan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri_permainan`
--
ALTER TABLE `galeri_permainan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permainan`
--
ALTER TABLE `permainan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
