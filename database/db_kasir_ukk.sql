-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 10:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir_ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelians`
--

CREATE TABLE `detail_pembelians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_beli` int(65) NOT NULL,
  `jumlah_produk` varchar(255) NOT NULL,
  `subtotal` decimal(65,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pembelians`
--

INSERT INTO `detail_pembelians` (`id`, `id_pembelian`, `id_produk`, `nama_produk`, `harga_beli`, `jumlah_produk`, `subtotal`, `created_at`, `updated_at`) VALUES
(12, 4, 3, 'Lifeboy', 3000, '220', '650000.00', '2024-03-02 04:08:21', '2024-03-02 04:09:29'),
(13, 4, 4, 'Nuvo', 3500, '290', '1015000.00', '2024-03-02 04:11:03', '2024-03-02 04:11:03'),
(14, 4, 1, 'Dettol', 5000, '110', '550000.00', '2024-03-02 04:11:28', '2024-03-02 04:11:43'),
(17, 5, 1, 'Dettol', 5000, '90', '450000.00', '2024-03-02 04:18:21', '2024-03-02 04:18:21'),
(18, 5, 3, 'Lifeboy', 3500, '20', '55000.00', '2024-03-02 04:23:48', '2024-03-02 04:24:23'),
(19, 6, 4, 'Nuvo', 3500, '100', '350000.00', '2024-03-02 20:03:56', '2024-03-02 20:03:56');

--
-- Triggers `detail_pembelians`
--
DELIMITER $$
CREATE TRIGGER `delete_stok_from_produks` AFTER DELETE ON `detail_pembelians` FOR EACH ROW BEGIN
	UPDATE produks SET stok = stok - old.jumlah_produk
    WHERE id = old.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_harga_beli` AFTER INSERT ON `detail_pembelians` FOR EACH ROW BEGIN
	UPDATE produks SET harga_beli = new.harga_beli
    WHERE id = new.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_stok_to_produks` AFTER INSERT ON `detail_pembelians` FOR EACH ROW BEGIN
	UPDATE produks SET stok = stok + new.jumlah_produk
    WHERE id = new.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_harga_beli` AFTER UPDATE ON `detail_pembelians` FOR EACH ROW BEGIN
	UPDATE produks SET harga_beli = new.harga_beli
    WHERE id = new.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_to_produks` AFTER UPDATE ON `detail_pembelians` FOR EACH ROW BEGIN
	UPDATE produks SET stok = stok - old.jumlah_produk
    WHERE id = old.id_produk;
    
    UPDATE produks SET stok = stok + new.jumlah_produk
    WHERE id = new.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualans`
--

CREATE TABLE `detail_penjualans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penjualan` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah_produk` varchar(255) NOT NULL,
  `subtotal` decimal(65,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_penjualans`
--

INSERT INTO `detail_penjualans` (`id`, `id_penjualan`, `id_produk`, `nama_produk`, `jumlah_produk`, `subtotal`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 'Dettol', '100', '1500000.00', '2024-03-02 04:38:22', '2024-03-02 04:38:22'),
(5, 2, 3, 'Lifeboy', '150', '600000.00', '2024-03-02 04:39:38', '2024-03-02 04:39:38'),
(6, 2, 4, 'Nuvo', '100', '400000.00', '2024-03-02 04:40:19', '2024-03-02 04:40:19'),
(7, 3, 1, 'Dettol', '400', '6000000.00', '2024-03-02 04:41:58', '2024-03-02 04:41:58'),
(8, 4, 3, 'Lifeboy', '5', '20000.00', '2024-03-02 15:14:41', '2024-03-02 15:14:41'),
(9, 5, 1, 'Dettol', '10', '150000.00', '2024-03-02 15:15:20', '2024-03-02 15:15:20'),
(10, 6, 1, 'Dettol', '50', '750000.00', '2024-03-02 15:16:06', '2024-03-02 15:16:06'),
(11, 7, 1, 'Dettol', '10', '150000.00', '2024-03-02 15:48:09', '2024-03-02 15:48:09'),
(12, 8, 1, 'Dettol', '5', '75000.00', '2024-03-02 21:08:50', '2024-03-02 21:08:50');

--
-- Triggers `detail_penjualans`
--
DELIMITER $$
CREATE TRIGGER `delete_stok_from_detailpenjualan` AFTER DELETE ON `detail_penjualans` FOR EACH ROW BEGIN
	UPDATE produks SET stok = stok + old.jumlah_produk
    WHERE id = old.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_stok_to_detailpenjualan` AFTER INSERT ON `detail_penjualans` FOR EACH ROW BEGIN
	UPDATE produks SET stok = stok - new.jumlah_produk
    WHERE id = new.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_to_detailpenjualan` AFTER UPDATE ON `detail_penjualans` FOR EACH ROW BEGIN
	UPDATE produks SET stok = stok + old.jumlah_produk
    WHERE id = old.id_produk;
    
    UPDATE produks SET stok = stok - new.jumlah_produk
    WHERE id = new.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Sabun', '2024-03-02 03:02:07', '2024-03-02 03:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_27_121313_create_kategoris_table', 1),
(6, '2024_01_27_121314_create_pelanggans_table', 1),
(7, '2024_01_27_121333_create_produks_table', 1),
(8, '2024_01_27_121412_create_penjualans_table', 1),
(9, '2024_01_27_121601_create_detail_penjualans_table', 1),
(10, '2024_02_03_082146_create_suppliers_table', 1),
(11, '2024_03_02_092355_create_pembelians_table', 1),
(12, '2024_03_02_092404_create_detail_pembelians_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama_pelanggan`, `jenis_kelamin`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Bambang', 'Laki-Laki', 'Jl. Anggrek', '081234567852', '2024-03-02 13:34:34', '2024-03-02 13:34:34'),
(2, 'Salma', 'Perempuan', 'Jl. Merdeka', '08765234566', '2024-03-02 15:54:08', '2024-03-02 15:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_harga` decimal(65,2) NOT NULL,
  `bayar` decimal(65,2) NOT NULL,
  `kembali` decimal(65,2) NOT NULL,
  `id_supplier` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id`, `tanggal_pembelian`, `total_harga`, `bayar`, `kembali`, `id_supplier`, `nama_supplier`, `id_user`, `nama_kasir`, `created_at`, `updated_at`) VALUES
(4, '2024-03-01', '2215000.00', '2220000.00', '5000.00', NULL, NULL, 1, 'Admin', '2024-03-02 04:07:57', '2024-03-02 04:38:55'),
(5, '2024-03-02', '505000.00', '510000.00', '5000.00', NULL, NULL, 1, 'Admin', '2024-03-02 04:13:30', '2024-03-02 04:35:42'),
(6, '2024-03-03', '350000.00', '0.00', '0.00', 1, 'Dede', 1, 'Admin', '2024-03-02 20:03:45', '2024-03-02 20:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `penjualans`
--

CREATE TABLE `penjualans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `total_harga` decimal(65,2) NOT NULL,
  `bayar` decimal(65,2) NOT NULL,
  `kembali` decimal(65,2) NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualans`
--

INSERT INTO `penjualans` (`id`, `tanggal_penjualan`, `total_harga`, `bayar`, `kembali`, `id_pelanggan`, `nama_pelanggan`, `id_user`, `nama_kasir`, `created_at`, `updated_at`) VALUES
(2, '2024-02-19', '2500000.00', '2500000.00', '0.00', NULL, NULL, 1, 'Admin', '2024-03-02 04:18:39', '2024-03-02 04:40:36'),
(3, '2024-02-21', '6000000.00', '6000000.00', '0.00', NULL, NULL, 1, 'Admin', '2024-03-02 04:40:57', '2024-03-02 04:42:17'),
(4, '2024-02-27', '20000.00', '50000.00', '30000.00', NULL, NULL, 1, 'Admin', '2024-03-02 13:57:49', '2024-03-02 15:14:50'),
(5, '2024-03-01', '150000.00', '200000.00', '50000.00', NULL, NULL, 1, 'Admin', '2024-03-02 13:57:55', '2024-03-02 15:15:36'),
(6, '2024-03-02', '750000.00', '800000.00', '50000.00', 1, 'Bambang', 1, 'Admin', '2024-03-02 13:58:01', '2024-03-02 15:16:42'),
(7, '2024-03-02', '150000.00', '200000.00', '50000.00', 1, 'Bambang', 2, 'Kasir', '2024-03-02 15:46:02', '2024-03-02 15:48:41'),
(8, '2024-03-03', '75000.00', '100000.00', '25000.00', 2, 'Salma', 2, 'Kasir', '2024-03-02 21:07:52', '2024-03-02 21:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_beli` int(65) NOT NULL DEFAULT 0,
  `harga_jual` decimal(65,2) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `stok` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_kategori`, `nama_produk`, `harga_beli`, `harga_jual`, `satuan`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Sabun', 'Dettol', 5000, '15000.00', 'Botol', '425', '2024-03-02 03:08:52', '2024-03-02 03:08:52'),
(3, 'Sabun', 'Lifeboy', 3500, '4000.00', 'Pcs', '645', '2024-03-02 03:39:47', '2024-03-02 03:57:54'),
(4, 'Sabun', 'Nuvo', 3500, '4000.00', 'Pcs', '300', '2024-03-02 03:40:29', '2024-03-02 03:40:29'),
(5, 'Sabun', 'Lux', 3700, '4000.00', 'Pcs', '750', '2024-03-02 15:51:10', '2024-03-02 15:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `jenis_kelamin`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Dede', 'Laki-Laki', 'Jl. Mawar', '087652345662', '2024-03-02 13:35:23', '2024-03-02 13:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `role` enum('Admin','Petugas') NOT NULL,
  `usia` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `email`, `password`, `jenis_kelamin`, `role`, `usia`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$GjhMDtfYxip7nGb6JY.6d.e2A17AY2z7ioH8RTHVQGV0Hpeg4/dem', 'Laki-laki', 'Admin', '25', NULL, '2024-03-02 02:30:57', '2024-03-02 20:55:30'),
(2, 'Kasir', 'kasir', 'kasir@gmail.com', '$2y$10$.bOV0eURkgNO37YNQd1PROSrDLKaac3iKQAb2w79hbKdn5e3TV1ZC', 'Perempuan', 'Petugas', '22', NULL, '2024-03-02 15:29:27', '2024-03-02 15:29:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pembelians_id_pembelian_foreign` (`id_pembelian`),
  ADD KEY `detail_pembelians_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_penjualans_id_penjualan_foreign` (`id_penjualan`),
  ADD KEY `detail_penjualans_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelians_id_supplier_foreign` (`id_supplier`),
  ADD KEY `pembelians_id_user_foreign` (`id_user`);

--
-- Indexes for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualans_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `penjualans_id_user_foreign` (`id_user`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  ADD CONSTRAINT `detail_pembelians_id_pembelian_foreign` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelians_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  ADD CONSTRAINT `detail_penjualans_id_penjualan_foreign` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualans_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD CONSTRAINT `pembelians_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelians_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD CONSTRAINT `penjualans_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
