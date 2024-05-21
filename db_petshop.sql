-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2024 at 10:01 AM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(7) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kategori_id`, `nama_barang`, `deskripsi`, `harga`, `stok`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'Royal Canin 1Kg', 'Royal Canin untuk pakan kucing berat 1 Kilogram\r\n', 12000, 2, '2024-03-19 12:29:42', '2024-05-21 02:29:28'),
(2, 1, 'Kandang Macan', 'Kandang untuk anak macan ukuran 2m x 2m', 1000000, 0, '2024-03-19 12:39:20', '2024-05-21 02:29:28'),
(14, 2, 'Royal Canin 2Kg', 'Royal Canin untuk pakan kucing berat 2 Kilogram\r\n', 22000, 5, '2024-03-19 12:29:42', '2024-05-09 14:46:48'),
(15, 1, 'Kandang Kucing Kanggora', 'Kandang untuk kucing Kanggora ukuran 1m x 1m', 450000, 17, '2024-05-09 14:02:02', '2024-05-09 14:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `idBarang`, `gambar`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'af14a1d7b4cf967fce8461a0c9fd66c5.png', '2024-03-19 12:38:09', NULL),
(3, 2, 'fa6abbcf542ecbcb0d3f56cdbbfb98d7.png', '2024-05-04 07:15:36', NULL),
(18, 14, 'af14a1d7b4cf967fce8461a0c9fd66c5.png', '2024-03-19 12:38:09', NULL),
(19, 15, 'fa6abbcf542ecbcb0d3f56cdbbfb98d7.png', '2024-05-04 07:15:36', '2024-05-09 14:03:28');

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
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grooming`
--

INSERT INTO `grooming` (`id`, `idUser`, `idPaket`, `idOngkir`, `jenis`, `mulai`, `selesai`, `deskripsi`, `foto`, `bukti`, `statusPembayaran`, `totalBiaya`, `alamat`, `link_maps`, `createdAt`, `updatedAt`) VALUES
(12, 2, 2, 2, 'nasd', 1, 2, 'oklnlkasd', '71f39b5ed52e551a6dd43da117044ecd.png', '202fe7ab94542bb0a10ccfba9b6cb308.png', 1, 130000, 'onono', 'https://maps.app.goo.gl/QLhmtp6xM87X3rUCA', '2024-05-21 07:05:08', '2024-05-21 07:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `createdAt`, `updatedAt`) VALUES
(1, 'Kandang', '2024-03-19 12:21:23', NULL),
(2, 'Makanan', '2024-03-19 12:21:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `total` int(3) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `idUser`, `idBarang`, `total`, `status`, `createdAt`, `updatedAt`) VALUES
(5, 2, 2, 1, 1, '2024-04-30 09:49:20', '2024-05-10 02:01:12'),
(12, 2, 14, 4, 1, '2024-04-30 12:54:38', '2024-05-10 02:01:16'),
(13, 3, 15, 2, 1, '2024-05-09 14:04:20', '2024-05-09 14:46:48'),
(14, 3, 14, 3, 1, '2024-05-09 14:07:50', '2024-05-09 14:46:48'),
(15, 2, 2, 1, 1, '2024-05-21 01:21:28', '2024-05-21 02:29:28'),
(16, 2, 1, 4, 1, '2024-05-21 01:21:36', '2024-05-21 02:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id`, `kecamatan`, `harga`, `createdAt`, `updatedAt`) VALUES
(1, 'Tegal Selatan', 10000, '2023-06-08 05:50:57', '2024-05-21 01:27:28'),
(2, 'Tegal Timur', 30000, '2023-06-08 05:51:06', '2024-05-21 01:27:54'),
(3, 'Jatibarang', 60000, '2023-06-08 05:51:16', '2024-05-21 01:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idKeranjang` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `idOngkir` int(11) DEFAULT NULL,
  `metodePembayaran` int(1) NOT NULL,
  `statusPembayaran` int(1) NOT NULL DEFAULT 0,
  `buktiPembayaran` text DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `idKhusus` varchar(29) NOT NULL,
  `totalBiaya` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `idUser`, `idKeranjang`, `alamat`, `link_maps`, `catatan`, `idOngkir`, `metodePembayaran`, `statusPembayaran`, `buktiPembayaran`, `jam`, `idKhusus`, `totalBiaya`, `createdAt`, `updatedAt`) VALUES
(1, 2, 5, 'Tegal Selatan', NULL, 'Biasa ouw', NULL, 3, 1, '8e8a4dc68a64b6bbd51fb2c163d57f63.jpg', NULL, '2-20240506214832', 1088000, '2024-04-30 14:48:32', '2024-05-10 02:01:28'),
(2, 2, 12, 'Tegal Selatan', NULL, 'Biasa ouw', NULL, 3, 1, '8e8a4dc68a64b6bbd51fb2c163d57f63.jpg', NULL, '2-20240506214832', 1088000, '2024-04-30 14:48:32', '2024-05-10 02:01:36'),
(5, 3, 13, 'Gas', NULL, 'gas', NULL, 2, 1, '1d6c208f2677c389dc5f69129d1d058c.jpeg', NULL, '3-20240509214648', 966000, '2024-05-09 14:46:48', '2024-05-10 01:35:55'),
(6, 3, 14, 'Gas', NULL, 'gas', NULL, 2, 1, '1d6c208f2677c389dc5f69129d1d058c.jpeg', NULL, '3-20240509214648', 966000, '2024-05-09 14:46:48', '2024-05-10 01:35:55'),
(9, 2, 15, 'Jl. kita solusi', 'https://maps.app.goo.gl/kfXNj43J1kRwFncNA', 'Taruh ada di kursi depan', 2, 2, 0, NULL, NULL, '2-20240521092928', 1078000, '2024-05-21 02:29:28', NULL),
(10, 2, 16, 'Jl. kita solusi', 'https://maps.app.goo.gl/kfXNj43J1kRwFncNA', 'Taruh ada di kursi depan', 2, 2, 0, NULL, NULL, '2-20240521092928', 1078000, '2024-05-21 02:29:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(3) NOT NULL,
  `namaPaket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `namaPaket`, `harga`, `createdAt`, `updatedAt`) VALUES
(1, 'Grooming Basic Small', 50000, '2024-05-21 03:19:35', '2024-05-21 03:21:36'),
(2, 'Grooming Premium Large', 100000, '2024-05-21 03:21:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progres`
--

CREATE TABLE `progres` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idKhusus` varchar(29) NOT NULL,
  `status` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `progres`
--

INSERT INTO `progres` (`id`, `idUser`, `idKhusus`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 3, '3-20240509214648', 'Sedang diproses', '2024-05-10 01:35:55', NULL),
(2, 3, '3-20240509214648', 'Sedang diantar', '2024-05-10 01:53:47', NULL),
(3, 3, '3-20240509214648', 'Sudah diterima pembeli', '2024-05-10 01:54:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `idUser`, `idBarang`, `rating`, `review`, `createdAt`) VALUES
(1, 2, 2, 4, 'Bagus, semoga awet buat macan saya', '2024-04-30 13:34:16'),
(2, 2, 2, 5, 'Kedua kalinya, sangat memuaskan belanja disini, tq min', '2024-05-09 13:36:35'),
(3, 2, 14, 4, 'Enak..', '2024-05-09 13:38:32'),
(4, 3, 15, 3, 'Bagus, tp kekecilan buat 10 kucing, bintang 3 dulu ya hehe', '2024-05-09 14:49:36'),
(5, 3, 14, 5, 'Kucing saya dokoh, mantap', '2024-05-09 14:50:38'),
(6, 2, 1, 5, 'Kucingnya doyan banget', '2024-05-21 04:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `noHp` varchar(14) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `alamat` text DEFAULT NULL,
  `role` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `noHp`, `password`, `image`, `alamat`, `role`, `is_active`, `created_at`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$7pyTCt1Y3lkAo4duy7Y8YekrA2.lkYPVVfNMgsEv7HQ3DEMyyiyde', 'default.jpg', NULL, 1, 1, '2023-03-07 04:17:36'),
(2, 'Ilham Syah', 'ilham@gmail.com', '081912340981', '$2y$10$cfpT5/laPHn0.hA2XAmJPO1WzQ64b8o.L8BC1LoqtoqOvdvMPvp0i', 'default.jpg', 'Wong Tegal', 2, 1, '2024-05-04 09:31:30'),
(3, 'Putra', 'putra@gmail.com', '081912340981', '$2y$10$cfpT5/laPHn0.hA2XAmJPO1WzQ64b8o.L8BC1LoqtoqOvdvMPvp0i', 'default.jpg', NULL, 2, 1, '2024-05-04 09:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grooming`
--
ALTER TABLE `grooming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progres`
--
ALTER TABLE `progres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `grooming`
--
ALTER TABLE `grooming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `progres`
--
ALTER TABLE `progres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
