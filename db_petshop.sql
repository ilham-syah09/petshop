-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2024 pada 02.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `barang`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kategori_id`, `nama_barang`, `deskripsi`, `harga`, `stok`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'Cat Choize 800gram', 'makanan kucing \r\n', 15000, 27, '2024-03-19 12:29:42', '2024-05-30 07:52:51'),
(2, 1, 'Kandang Kucing ukuran standar 60x40x50', 'Kandang hewan ukuran 60X40X50', 150000, 8, '2024-03-19 12:39:20', '2024-05-30 07:52:39'),
(14, 2, 'whiskas', 'whiskas makanan kucing 800gram \r\n', 30000, 40, '2024-03-19 12:29:42', '2024-05-30 07:53:04'),
(16, 1, 'pet cargo', 'kandang hewan peliharaan', 85000, 10, '2024-05-30 07:48:22', '2024-05-30 07:52:25'),
(17, 2, 'Royal Canin Puppy Giant', 'makanan untuk anjing', 20000, 30, '2024-05-30 07:50:09', '2024-05-30 07:51:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id`, `idBarang`, `gambar`, `createdAt`, `updatedAt`) VALUES
(20, 2, 'd5ab523a8ef901ecae999caf2b290eac.jpg', '2024-05-30 07:44:35', NULL),
(21, 14, 'f615bffbd0cb07389367719f3ca663c1.jpg', '2024-05-30 07:48:54', NULL),
(22, 17, '99f3693d4a5d498b7157f79ecb71580d.jpg', '2024-05-30 07:50:40', NULL),
(23, 16, '3942054e646067a433449138ce704bf2.jpg', '2024-05-30 07:50:57', NULL),
(24, 1, '125fcfdaaf04e06bd084f08c5dee9a4f.jpg', '2024-05-30 07:51:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `grooming`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `createdAt`, `updatedAt`) VALUES
(1, 'Kandang', '2024-03-19 12:21:23', NULL),
(2, 'Makanan', '2024-03-19 12:21:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `total` int(3) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id`, `kecamatan`, `harga`, `createdAt`, `updatedAt`) VALUES
(1, 'Adiwerna', 15000, '2023-06-08 05:50:57', '2024-06-03 10:56:03'),
(2, 'Tegal', 20000, '2023-06-08 05:51:06', '2024-06-03 10:56:37'),
(3, 'Jatibarang', 15000, '2023-06-08 05:51:16', '2024-06-03 10:55:31'),
(5, 'Slawi', 5000, '2024-06-03 10:54:26', '2024-06-03 10:54:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int(3) NOT NULL,
  `namaPaket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `namaPaket`, `harga`, `createdAt`, `updatedAt`) VALUES
(1, 'Grooming Basic Small', 50000, '2024-05-21 03:19:35', '2024-05-21 03:21:36'),
(2, 'Grooming Premium Large', 100000, '2024-05-21 03:21:22', NULL),
(4, 'Grooming Basic Large', 60000, '2024-05-30 07:56:17', NULL),
(5, 'Grooming Medicate Small', 65000, '2024-05-30 07:56:38', NULL),
(6, 'Grooming Medicate Large', 75000, '2024-05-30 07:56:56', NULL),
(7, 'Grooming Treatment Small', 75000, '2024-05-30 07:57:43', NULL),
(8, 'Grooming Treatment Large', 85000, '2024-05-30 07:58:17', NULL),
(9, 'Grooming Premium Small', 85000, '2024-05-30 07:58:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `progres`
--

CREATE TABLE `progres` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idKhusus` varchar(29) NOT NULL,
  `status` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `noHp`, `password`, `image`, `alamat`, `role`, `is_active`, `created_at`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$7pyTCt1Y3lkAo4duy7Y8YekrA2.lkYPVVfNMgsEv7HQ3DEMyyiyde', 'default.jpg', NULL, 1, 1, '2023-03-07 04:17:36'),
(4, 'Ramantyo Pangestu', 'ramantyo10@gmail.com', NULL, '$2y$10$BeG35hGzfwTiJGxsjwSeoevbN6NgRZ0.HN4ImD8x.EQa/vY/atBLu', 'default.jpg', NULL, 2, 1, '2024-05-30 07:59:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'ramantyo10@gmail.com', '0RgWeH4JB0loTg0J1QD4X+1595ejia8/vjOusVUTGOc=', 1717055977),
(2, 'ramantyo16@gmail.com', 'a/A+o8KOv+D1mdtNN+I54FgwaEye3lncNjhKXgXTZ6M=', 1717131159);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `grooming`
--
ALTER TABLE `grooming`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `progres`
--
ALTER TABLE `progres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `grooming`
--
ALTER TABLE `grooming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `progres`
--
ALTER TABLE `progres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
