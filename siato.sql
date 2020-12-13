-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2019 pada 15.06
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siato`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_histories`
--

CREATE TABLE `barang_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(11) UNSIGNED NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_histories`
--

INSERT INTO `barang_histories` (`id`, `id_supplier`, `tanggal_masuk`, `created_at`, `updated_at`) VALUES
(1, 2, '2019-05-07', '2019-05-06 12:58:11', '2019-05-06 12:58:11'),
(2, 1, '2019-05-14', '2019-05-13 18:15:45', '2019-05-13 18:15:45'),
(3, 2, '2019-05-14', '2019-05-13 18:17:36', '2019-05-13 18:17:36'),
(4, 2, '2019-05-14', '2019-05-13 18:18:56', '2019-05-13 18:18:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabangs`
--

CREATE TABLE `cabangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_cabang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_cabang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cabangs`
--

INSERT INTO `cabangs` (`id`, `nama_cabang`, `alamat_cabang`, `created_at`, `updated_at`) VALUES
(1, 'Babarsari', 'Jalan Babarsari No.90', NULL, NULL),
(2, 'Gejayan', 'Jalan Afandi No.69', NULL, NULL),
(3, 'Samigaluh', 'Jalan Gowok No.69', NULL, NULL),
(4, 'Ganjuran', 'Jalan Ganjuran No.89', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_customer` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_customer` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_customer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `nama_customer`, `kontak_customer`, `alamat_customer`, `created_at`, `updated_at`) VALUES
(1, 'brenda lenak', '082271086816', 'Jalan Garuni d77', '2019-04-09 00:45:09', '2019-04-09 00:45:09'),
(3, 'excel', '876541234565', 'babarsari', '2019-04-09 01:02:58', '2019-04-29 00:06:58'),
(10, 'resa', '123456789012', 'seturan', '2019-04-09 01:43:05', '2019-04-09 01:43:05'),
(11, 'sdaf', '123456789012', 'sadf', '2019-04-09 01:43:59', '2019-04-09 01:43:59'),
(12, 'brenda new', '123456789012', 'sidera', '2019-04-11 07:54:25', '2019-04-11 07:54:25'),
(13, 'Resa', '085812345678', 'Perumnas Seturan', '2019-04-14 05:35:15', '2019-04-14 05:35:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_details`
--

CREATE TABLE `history_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang_history` int(11) UNSIGNED NOT NULL,
  `id_sparepart` int(11) UNSIGNED NOT NULL,
  `satuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `history_details`
--

INSERT INTO `history_details` (`id`, `id_barang_history`, `id_sparepart`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, '2019-05-06 13:20:29', '2019-05-06 13:20:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) UNSIGNED NOT NULL,
  `no_polisi` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `id_customer`, `no_polisi`, `merk`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 1, 'H4088AA', 'honda', 'matic', '2019-04-13 15:00:55', '2019-04-13 15:00:55'),
(2, 1, 'DN1234XX', 'honda', 'matic', '2019-04-13 15:01:25', '2019-04-13 15:01:25'),
(3, 13, 'AB5161ZK', 'Honda Vario', 'matic', '2019-04-14 05:36:02', '2019-04-14 05:36:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan_details`
--

CREATE TABLE `kendaraan_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(11) UNSIGNED NOT NULL,
  `id_pegawai` int(11) UNSIGNED NOT NULL,
  `id_kendaraan` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendaraan_details`
--

INSERT INTO `kendaraan_details` (`id`, `id_penjualan`, `id_pegawai`, `id_kendaraan`, `created_at`, `updated_at`) VALUES
(7, 20, 2, 1, '2019-05-19 08:13:42', '2019-05-19 08:13:42'),
(8, 20, 8, 1, '2019-05-19 08:15:40', '2019-05-19 08:15:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('administrator@siato.com', '$2y$10$egTJ0/p1s8bzOJK6przRU.UzGWp8PgxYR2Lnf2.Q4jlez6LNmcsU2', '2019-04-07 03:05:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_transactions`
--

CREATE TABLE `pembayaran_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(11) UNSIGNED NOT NULL,
  `id_cabang` int(11) UNSIGNED NOT NULL,
  `id_penjualan_detail` int(11) UNSIGNED DEFAULT NULL,
  `id_service_detail` int(10) UNSIGNED DEFAULT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `waktu_pembayaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_biaya` double(8,2) NOT NULL,
  `diskon` double(8,2) NOT NULL,
  `total_akhir` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran_transactions`
--

INSERT INTO `pembayaran_transactions` (`id`, `id_penjualan`, `id_pegawai`, `id_cabang`, `id_penjualan_detail`, `id_service_detail`, `tanggal_pembayaran`, `waktu_pembayaran`, `total_biaya`, `diskon`, `total_akhir`, `created_at`, `updated_at`) VALUES
(6, 19, 2, 2, 29, 8, '2019-05-20', '2019-05-20 15:23:09', 0.00, 2222.00, 0.00, '2019-05-20 08:23:09', '2019-05-20 08:23:09'),
(7, 20, 2, 2, 29, 8, '2019-05-20', '2019-05-20 15:28:05', 100000.00, 2222.00, 0.00, '2019-05-20 08:28:05', '2019-05-20 08:28:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan_details`
--

CREATE TABLE `pengadaan_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pengadaan` int(11) UNSIGNED NOT NULL,
  `id_sparepart` int(11) UNSIGNED NOT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengadaan_details`
--

INSERT INTO `pengadaan_details` (`id`, `id_pengadaan`, `id_sparepart`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 4, 6, 'box', '2019-05-13 17:52:15', '2019-05-13 17:52:15'),
(2, 4, 8, 'box', '2019-05-18 11:57:44', '2019-05-18 11:57:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan_transactions`
--

CREATE TABLE `pengadaan_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(11) UNSIGNED NOT NULL,
  `tanggal_pengadaan` date NOT NULL,
  `status_cetak` enum('SUDAH CETAK','BELUM CETAK') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengadaan_transactions`
--

INSERT INTO `pengadaan_transactions` (`id`, `id_supplier`, `tanggal_pengadaan`, `status_cetak`, `created_at`, `updated_at`) VALUES
(4, 2, '2019-05-07', 'BELUM CETAK', '2019-05-06 17:36:47', '2019-05-06 17:36:47'),
(5, 1, '2019-06-18', 'BELUM CETAK', '2019-06-18 08:17:15', '2019-06-18 08:17:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_details`
--

CREATE TABLE `penjualan_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(11) UNSIGNED NOT NULL,
  `id_sparepart` int(11) UNSIGNED NOT NULL,
  `jumlah_sparepart` int(11) NOT NULL,
  `harga_sparepart` double(8,2) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan_details`
--

INSERT INTO `penjualan_details` (`id`, `id_penjualan`, `id_sparepart`, `jumlah_sparepart`, `harga_sparepart`, `sub_total`, `created_at`, `updated_at`) VALUES
(29, 19, 5, 1, 160000.00, 160000.00, '2019-05-20 03:10:15', '2019-05-20 03:10:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_transactions`
--

CREATE TABLE `penjualan_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) UNSIGNED NOT NULL,
  `id_pegawai` int(11) UNSIGNED NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('PROSES','SELESAI') COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_sparepart` double(10,2) NOT NULL,
  `biaya_service` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `kode_transaksi` varchar(15) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan_transactions`
--

INSERT INTO `penjualan_transactions` (`id`, `id_customer`, `id_pegawai`, `tanggal_transaksi`, `waktu_transaksi`, `status`, `biaya_sparepart`, `biaya_service`, `created_at`, `updated_at`, `kode_transaksi`) VALUES
(19, 13, 2, '2019-05-09', '2019-05-20 10:10:15', 'PROSES', 160000.00, 0.00, '2019-05-09 08:38:28', '2019-05-20 03:10:15', 'SP-09051990'),
(20, 10, 3, '2019-05-19', '2019-05-19 15:15:55', 'PROSES', 0.00, 100000.00, '2019-05-19 07:45:06', '2019-05-19 08:15:55', 'JS-200519007'),
(21, 3, 4, '2019-06-18', '2019-06-18 14:38:10', 'PROSES', 0.00, 0.00, '2019-06-18 07:38:10', '2019-06-18 07:38:10', 'SP-29062023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'customer service', NULL, NULL),
(3, 'kasir', NULL, NULL),
(4, 'mekanik', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saless`
--

CREATE TABLE `saless` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(11) UNSIGNED NOT NULL,
  `nama_sales` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_sales` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `saless`
--

INSERT INTO `saless` (`id`, `id_supplier`, `nama_sales`, `kontak_sales`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tukijo', '08975387264', '2019-04-25 03:16:46', '2019-04-25 03:16:46'),
(2, 3, 'Lorde', '08163746523', '2019-04-25 03:17:01', '2019-04-25 03:17:01'),
(3, 2, 'Kevin', '08764537289', '2019-04-25 03:17:16', '2019-04-25 03:17:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_service` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_service` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `nama_service`, `harga_service`, `created_at`, `updated_at`) VALUES
(3, 'ganti ban dalam', 40000.00, '2019-04-11 09:51:36', '2019-04-11 09:51:36'),
(4, 'Body Repair', 20000.00, '2019-05-16 09:39:21', '2019-05-16 09:39:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_details`
--

CREATE TABLE `service_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_service` int(11) UNSIGNED NOT NULL,
  `id_penjualan` int(11) UNSIGNED NOT NULL,
  `id_kendaraan_details` int(11) UNSIGNED NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah_service` int(11) DEFAULT NULL,
  `harga_service` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `service_details`
--

INSERT INTO `service_details` (`id`, `id_service`, `id_penjualan`, `id_kendaraan_details`, `sub_total`, `created_at`, `updated_at`, `jumlah_service`, `harga_service`) VALUES
(7, 3, 20, 7, 80000.00, '2019-05-19 08:13:54', '2019-05-19 08:13:54', NULL, 40000),
(8, 4, 20, 7, 20000.00, '2019-05-19 08:15:55', '2019-05-19 08:15:55', NULL, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spareparts`
--

CREATE TABLE `spareparts` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_sparepart` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sparepart` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_sparepart` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_sparepart` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_lokasi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` double(8,2) NOT NULL,
  `harga_beli` double(8,2) NOT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimal` int(11) NOT NULL,
  `gambar_sparepart` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `spareparts`
--

INSERT INTO `spareparts` (`id`, `kode_sparepart`, `nama_sparepart`, `merk_sparepart`, `tipe_sparepart`, `kode_lokasi`, `harga_jual`, `harga_beli`, `satuan`, `stock`, `stock_minimal`, `gambar_sparepart`, `created_at`, `updated_at`) VALUES
(5, 'CH-002', 'Rantai', 'Indoparts', 'Rantai Baja', 'RAK-002', 160000.00, 150000.00, 'pack', 25, 5, 'gambar_spareparts/i6XEuwTmEoWle8W2rblTWoFBAhWnLGG3GJDYMXeP.jpeg', '2019-04-07 17:22:15', '2019-04-07 17:22:15'),
(6, 'BS-009', 'Busi', 'Daytona', 'Iridium', 'RAK-009', 75000.00, 70000.00, 'buah', 30, 6, 'gambar_spareparts/TCEmz7qtCW38x03ZjlN2mdvFFTi6Tsk7YH8N6JDM.jpeg', '2019-04-07 17:22:51', '2019-04-07 17:22:51'),
(7, 'GR-934', 'Gear Belakang', 'SSS', 'Universal', 'RAK-934', 220000.00, 200000.00, 'buah', 26, 7, 'gambar_spareparts/hNkNXYzLOyzPF0nHl2BoPxuMFy6mnx1cKvmiUMcL.jpeg', '2019-04-07 17:24:21', '2019-04-07 17:24:21'),
(8, 'KL-642', 'Klakson Motor', 'Denso', 'Universal', 'RAK-642', 65000.00, 55000.00, 'pack', 20, 4, 'gambar_spareparts/eOyDWmH8MmszWZGIncyw58FLPpRtsMjy671fZWTN.jpeg', '2019-04-07 17:25:17', '2019-04-07 17:25:17'),
(9, 'BS-889', 'Busi', 'Denso', 'Universal', 'RAK-32', 80000.00, 76000.00, 'piece', 30, 7, 'gambar_spareparts/zNG7pR2xzi4mozfoBonTYtX22gKW07tFpCT05DZG.jpeg', '2019-04-25 00:31:50', '2019-04-25 00:31:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_supplier` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supplier` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_supplier` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `alamat_supplier`, `kontak_supplier`, `created_at`, `updated_at`) VALUES
(1, 'P.T Bintang Racing Team', 'Jl. Raya sentul 15, RT. 04 Rw. 01 kel. Sentul kec. Babakan Madang\r\nCibinong - Bogor, 16810', '02187908958', '2019-04-25 03:14:01', '2019-04-25 03:14:01'),
(2, 'P.T Indoparts', 'Jl. Gatot Subroto Km.8 Kav.8 No.18,\r\nManis Jaya, Jatiuwung, Tangerang 15136', '02155650101', '2019-04-25 03:14:51', '2019-04-25 03:15:06'),
(3, 'P.T Daytona Azia', 'Jl. Flores III Blok C3-3, Kawasan Industri MM2100\r\nCikarang Barat, Bekasi 17845 Indonesia', '02189983135', '2019-04-25 03:16:22', '2019-04-25 03:16:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_role` int(11) UNSIGNED NOT NULL,
  `id_cabang` int(10) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pegawai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_pegawai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_per_minggu` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_role`, `id_cabang`, `nama_pegawai`, `email`, `password`, `alamat_pegawai`, `kontak_pegawai`, `gaji_per_minggu`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'Brenda', 'brenda@siato.com', '$2y$10$w2HZ6H7HBsMjXCkwrw3Xb.eTh/O2u2QlXw/cZdsrni11dUUR7Suo.', 'Kledokan, No.90', '0892451231', 80000.00, '2019-04-07 17:20:08', '2019-04-07 17:20:08'),
(3, 3, 3, 'Elia', 'elia@siato.com', '$2y$10$F4A3KYZYEPZptFd7h8avzOYE/3ZCr46IAWikrKG9B5iuhT7jEiTU.', 'Godean, No.80', '0892456731', 60000.00, '2019-04-07 17:20:08', '2019-04-07 17:20:08'),
(4, 4, 4, 'Excel', 'excel@siato.com', '$2y$10$5AQ5pWC4d7Ren9vbj6UsJufnt2jiyqy0WIzjHtwZ01UxANQRoQTI2', 'Maguwo, No.69', '0856213765', 90000.00, '2019-04-07 17:20:08', '2019-04-07 17:20:08'),
(8, 3, 4, 'william', 'william@siato.com', '$2y$10$80qBXWumw6EFk2j66/8OhesCKmG5VfgWP2Zq6JIhXSkxVHAznkp1K', 'Kaliurang Km.10', '087240913', 70000.00, '2019-04-08 07:40:45', '2019-04-08 07:40:45'),
(9, 2, 1, 'asdda', 'test@siato.com', '$2y$10$gic5pYATg21BWPHAMC.UZOxuBgeGuyREO.E29pWEjPNgYr0Gc6gTi', 'dasdqw', '4324238', 432423.00, '2019-04-08 07:59:13', '2019-04-08 07:59:13'),
(12, 3, 2, 'POLWAN', 'polwan@gmail.com', '$2y$10$X4IezO6GYt3el8iMNiqnROVQlowLomIjbuYWFlF4izJvBFDIqwvS2', 'Jalan Gejayan No.10', '089073628173', 150000.00, '2019-05-20 09:51:23', '2019-05-20 09:51:23'),
(13, 1, 1, 'admin', 'administrator@siato.com', '$2y$10$0rUrQq5AvWO5v300mdPKMuh2/IOIr8olZyVWb7/6vLQzRz11yNWa.', 'Babarsari', '08567289853', 20000.00, '2019-05-20 11:19:33', '2019-05-20 11:19:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_histories`
--
ALTER TABLE `barang_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_histories_id_supplier_index` (`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_details`
--
ALTER TABLE `history_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_details_id_barang_history_index` (`id_barang_history`),
  ADD KEY `history_details_id_sparepart_index` (`id_sparepart`),
  ADD KEY `id_sparepart` (`id_sparepart`),
  ADD KEY `id_barang_history` (`id_barang_history`);

--
-- Indeks untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kendaraans_id_customer_index` (`id_customer`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `kendaraan_details`
--
ALTER TABLE `kendaraan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kendaraan_details_kode_transaksi_penjualan_index` (`id_penjualan`),
  ADD KEY `kendaraan_details_id_pegawai_index` (`id_pegawai`),
  ADD KEY `kendaraan_details_id_kendaraan_index` (`id_kendaraan`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembayaran_transactions`
--
ALTER TABLE `pembayaran_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_transactions_id_pegawai_index` (`id_pegawai`),
  ADD KEY `pembayaran_transactions_id_cabang_index` (`id_cabang`),
  ADD KEY `pembayaran_transactions_id_penjualan_index` (`id_penjualan_detail`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_cabang` (`id_cabang`),
  ADD KEY `id_penjualan` (`id_penjualan_detail`),
  ADD KEY `id_service_detail` (`id_service_detail`),
  ADD KEY `id_penjualan_2` (`id_penjualan`);

--
-- Indeks untuk tabel `pengadaan_details`
--
ALTER TABLE `pengadaan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengadaan_details_id_pengadaan_index` (`id_pengadaan`),
  ADD KEY `pengadaan_details_id_sparepart_index` (`id_sparepart`),
  ADD KEY `id_pengadaan` (`id_pengadaan`),
  ADD KEY `id_sparepart` (`id_sparepart`);

--
-- Indeks untuk tabel `pengadaan_transactions`
--
ALTER TABLE `pengadaan_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengadaan_transactions_id_supplier_index` (`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_details_id_penjualan_index` (`id_penjualan`),
  ADD KEY `penjualan_details_id_sparepart_index` (`id_sparepart`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_sparepart` (`id_sparepart`);

--
-- Indeks untuk tabel `penjualan_transactions`
--
ALTER TABLE `penjualan_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_transactions_id_customer_index` (`id_customer`),
  ADD KEY `penjualan_transactions_id_pegawai_index` (`id_pegawai`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saless`
--
ALTER TABLE `saless`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saless_id_supplier_index` (`id_supplier`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service_details`
--
ALTER TABLE `service_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_details_id_service_index` (`id_service`),
  ADD KEY `service_details_id_penjualan_index` (`id_penjualan`),
  ADD KEY `service_details_id_kendaraan_details_index` (`id_kendaraan_details`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_kendaraan_details` (`id_kendaraan_details`);

--
-- Indeks untuk tabel `spareparts`
--
ALTER TABLE `spareparts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_index` (`id_role`),
  ADD KEY `users_id_cabang_index` (`id_cabang`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_histories`
--
ALTER TABLE `barang_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cabangs`
--
ALTER TABLE `cabangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `history_details`
--
ALTER TABLE `history_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kendaraan_details`
--
ALTER TABLE `kendaraan_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_transactions`
--
ALTER TABLE `pembayaran_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengadaan_details`
--
ALTER TABLE `pengadaan_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengadaan_transactions`
--
ALTER TABLE `pengadaan_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `penjualan_transactions`
--
ALTER TABLE `penjualan_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `saless`
--
ALTER TABLE `saless`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `service_details`
--
ALTER TABLE `service_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `spareparts`
--
ALTER TABLE `spareparts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_histories`
--
ALTER TABLE `barang_histories`
  ADD CONSTRAINT `barang_histories_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`);

--
-- Ketidakleluasaan untuk tabel `history_details`
--
ALTER TABLE `history_details`
  ADD CONSTRAINT `history_details_ibfk_1` FOREIGN KEY (`id_sparepart`) REFERENCES `spareparts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_details_ibfk_2` FOREIGN KEY (`id_barang_history`) REFERENCES `barang_histories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD CONSTRAINT `kendaraans_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Ketidakleluasaan untuk tabel `kendaraan_details`
--
ALTER TABLE `kendaraan_details`
  ADD CONSTRAINT `kendaraan_details_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kendaraan_details_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kendaraan_details_ibfk_3` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan_transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran_transactions`
--
ALTER TABLE `pembayaran_transactions`
  ADD CONSTRAINT `pembayaran_transactions_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_transactions_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_transactions_ibfk_3` FOREIGN KEY (`id_penjualan_detail`) REFERENCES `penjualan_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_transactions_ibfk_4` FOREIGN KEY (`id_service_detail`) REFERENCES `service_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_transactions_ibfk_5` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan_transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengadaan_details`
--
ALTER TABLE `pengadaan_details`
  ADD CONSTRAINT `pengadaan_details_ibfk_1` FOREIGN KEY (`id_sparepart`) REFERENCES `spareparts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengadaan_details_ibfk_2` FOREIGN KEY (`id_pengadaan`) REFERENCES `pengadaan_transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengadaan_transactions`
--
ALTER TABLE `pengadaan_transactions`
  ADD CONSTRAINT `pengadaan_transactions_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  ADD CONSTRAINT `penjualan_details_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan_transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_details_ibfk_2` FOREIGN KEY (`id_sparepart`) REFERENCES `spareparts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan_transactions`
--
ALTER TABLE `penjualan_transactions`
  ADD CONSTRAINT `penjualan_transactions_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `penjualan_transactions_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Ketidakleluasaan untuk tabel `saless`
--
ALTER TABLE `saless`
  ADD CONSTRAINT `saless_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`);

--
-- Ketidakleluasaan untuk tabel `service_details`
--
ALTER TABLE `service_details`
  ADD CONSTRAINT `service_details_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_details_ibfk_2` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan_transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_details_ibfk_3` FOREIGN KEY (`id_kendaraan_details`) REFERENCES `kendaraan_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `cabangs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
