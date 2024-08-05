-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2024 at 05:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `grooming`
--

CREATE TABLE `grooming` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPaket` int(3) NOT NULL,
  `idOngkir` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `mulai` int(1) NOT NULL,
  `selesai` int(1) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `bukti` text DEFAULT NULL,
  `statusPembayaran` int(1) NOT NULL DEFAULT 0,
  `totalBiaya` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `progres` int(1) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grooming`
--

INSERT INTO `grooming` (`id`, `idUser`, `idPaket`, `idOngkir`, `jenis`, `mulai`, `selesai`, `deskripsi`, `foto`, `bukti`, `statusPembayaran`, `totalBiaya`, `alamat`, `link_maps`, `tanggal`, `jam`, `progres`, `createdAt`, `updatedAt`) VALUES
(14, 4, 2, 1, 'Kanggo ora', 1, 2, 'Tidak ada catatan', NULL, 'a70c3fafbbb5e0576240645b863ba8ee.png', 1, 110000, 'Tegal selatan cak', 'https://maps.app.goo.gl/ffUozM5L88T93G5j6', '2024-08-05', '10:00:00', 1, '2024-08-05 02:54:44', '2024-08-05 03:13:52'),
(15, 4, 2, 1, 'lll', 1, 2, 'lklk', NULL, NULL, 0, 110000, 'lglg', 'lkglk', '2024-08-07', '12:00:00', 0, '2024-08-05 03:04:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grooming`
--
ALTER TABLE `grooming`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grooming`
--
ALTER TABLE `grooming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
