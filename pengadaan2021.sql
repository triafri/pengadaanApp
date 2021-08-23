-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 05:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengadaan2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `email`, `alamat`, `password`, `status`, `token`, `created_at`, `updated_at`) VALUES
(3, 'Mimin', 'mimin@mail.com', 'Jl. Kenangan n0 5', 'eyJpdiI6IkZrc1FDbVpSRzAyN205amtlUnAwb3c9PSIsInZhbHVlIjoibURyMFJpUkwzMUhQUFF1bGxyaWZsVFU4bXAzZWlleTdHXC9YblZncmJNYUU9IiwibWFjIjoiNDAyMWFhZDE5MzkyODY1ZDA0NDI1Yzg4MGU0YmEzYTY0YzM5NWE0OWE5NWI2NGEwZGUzNmVjOTY4ZWEzNDY5OCJ9', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF9hZG1pbiI6M30.FGbKtAd1lzxQoC1BSBfS-XWX9AuU7N5Vn7OOtXpms98', '2021-08-03 19:07:44', '2021-08-18 21:53:34'),
(4, 'Admin 2', 'admin2@mail.com', 'Jl Singadireja', 'eyJpdiI6ImRrXC9ySGJLMnVFNlpoS1E0SnI3U2hnPT0iLCJ2YWx1ZSI6Ink2MndZQ0k5cVAyY3BPeFFcL3hyelhMcTlWa1ZTTVNLWmlTS2luYmJONHFnPSIsIm1hYyI6ImJiYTlmYWVmZDRmYWJmZjJmMTExNTQ1MWQxYTgxODFhMDkyM2VkZTU0MDViNjhkODA0ZmRjZmM5NWI1MzI3ODQifQ==', 1, NULL, '2021-08-03 19:36:48', '2021-08-03 19:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `laporan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `id_pengajuan`, `id_suplier`, `laporan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'public/laporan/dC5ZJcbbAHPmmH8eTKjCGifTgAxZ7NgjfXDD6eUn.pdf', '2021-08-09 19:35:48', '2021-08-09 19:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengadaan`
--

CREATE TABLE `tbl_pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `anggaran` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengadaan`
--

INSERT INTO `tbl_pengadaan` (`id_pengadaan`, `nama_pengadaan`, `deskripsi`, `gambar`, `anggaran`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Seragam PDL', 'https://www.google.com/search?q=seragam+pdl+pol+pp&sxsrf=ALeKk00ejI9vUeLYg6AthboLQ-TBunbTsQ:1628474579962&source=lnms&tbm=isch&sa=X&ved=2ahUKEwid0_TG7KLyAhUJQH0KHV-6A2IQ_AUoAXoECAEQAw&biw=1366&bih=667', 'public/gambar/sdVpMGCOnAlcFZVkb7LojL9RbbijN2RXkOGwDjks.jpg', 125000000, 1, '2021-08-04 20:42:31', '2021-08-09 02:19:34'),
(3, 'Laptop', 'https://www.google.com/search?q=laptop+pavilion+gaming+15&source=lmns&tbm=shop&bih=667&biw=1366&hl=id&sa=X&ved=2ahUKEwiNnsfj7qLyAhUM53MBHZhWDuUQ_AUoAXoECAEQAQ', 'public/gambar/i8BdjOKsrlZrVUmojaZtXkqz7Wz6RsbHliEDADo2.jpg', 28000000, 1, '2021-08-08 19:14:09', '2021-08-09 02:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `anggaran` double NOT NULL,
  `proposal` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `id_suplier`, `id_pengadaan`, `anggaran`, `proposal`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 123000000, 'public/proposal/yxh5e2ettMiU9T5qhjE6PlcrNXm2rdn3zinowLso.pdf', 2, '2021-08-09 00:57:33', '2021-08-11 18:55:02'),
(2, 1, 3, 27000000, 'public/proposal/s8NvnzGV0uNyLqxVdywdv0BU0b3aAGdLWXBDxSwA.pdf', 2, '2021-08-09 03:28:26', '2021-08-09 03:33:06'),
(3, 2, 3, 26000000, 'public/proposal/HLxfbAXrUp9Ih9w6jBOePLJL8xiybhD7o28bX4Mj.pdf', 2, '2021-08-15 22:07:35', '2021-08-15 22:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_usaha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_npwp` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`id_suplier`, `nama_usaha`, `email`, `alamat`, `no_npwp`, `password`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'PT. TRiartha Gading', 'triartha@mail.com', 'Jl. Wira Husada No. 10 Kawasan KIM', '12345678', 'eyJpdiI6Im13am5Tc2dKcCtcL05XYkV1M0ZRdEp3PT0iLCJ2YWx1ZSI6IkZlaEpBNGE3cmE2YnZoNDU4VVNwREE9PSIsIm1hYyI6ImYzMTBjMjNmZDY4NmI0YzJkNmViYzc0NmI3MzYyYjA0MDA0NjNmMGNhMWJlMjdjZjJkNDhhMzE4Njk4ZTc2YzcifQ==', 1, 'keluar', '2021-08-19 03:25:10', '2021-08-18 20:25:10'),
(2, 'PT. Maju Lancar Sekali', 'maju@mail.com', 'JL. Bharata', '129238472', 'eyJpdiI6InlWcDFNT2JXeU9sbzhiaWtyVzNVMVE9PSIsInZhbHVlIjoiajdaRVB6cnNlWVwvSzk5RUpJUEExYnFhUUswbWg3WGt1ZkxNT0lnaU9weWs9IiwibWFjIjoiOTAxMjNkYTcwNGMxNWM1N2NmZmZmYWJhOTdmZjkzNzZhN2MxZjZkNzNlOGEyMTZhN2UyMmE0NzkwZjk3ZDc4MSJ9', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF9zdXBsaWVyIjoyfQ.MBC0QfFdE7KG4zx4StghY53vloeAfHusYI80O3fN8OM', '2021-08-18 02:51:10', '2021-08-17 19:51:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
