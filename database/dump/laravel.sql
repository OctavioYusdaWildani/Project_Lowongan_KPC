-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2025 at 12:22 AM
-- Server version: 5.7.39
-- PHP Version: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_psikotests`
--

CREATE TABLE `akun_psikotests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun_psikotests`
--

INSERT INTO `akun_psikotests` (`id`, `nama`, `email`, `password`, `jadwal`, `created_at`, `updated_at`) VALUES
(1, 'haina', 'guest@example.com', '$2y$12$bYKMGfynuErGIh.0g/TYEOPzoxrPRz4.5rclDM30XhhtZlUnv/tfC', '2025-07-18 09:11:00', '2025-07-17 18:11:21', '2025-07-17 18:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_captcha_3e4738c2299d455465ac4bff96b6ddf2', 'a:6:{i:0;s:1:\"n\";i:1;s:1:\"7\";i:2;s:1:\"n\";i:3;s:1:\"b\";i:4;s:1:\"t\";i:5;s:1:\"y\";}', 1753409078),
('laravel_cache_captcha_5a20c07c04ecb99234546f11deee7263', 'a:6:{i:0;s:1:\"j\";i:1;s:1:\"2\";i:2;s:1:\"f\";i:3;s:1:\"y\";i:4;s:1:\"z\";i:5;s:1:\"h\";}', 1753409173),
('laravel_cache_captcha_60fec9a33612c35a9b8caa52fc842a23', 'a:6:{i:0;s:1:\"g\";i:1;s:1:\"a\";i:2;s:1:\"2\";i:3;s:1:\"n\";i:4;s:1:\"t\";i:5;s:1:\"t\";}', 1753407279),
('laravel_cache_captcha_758e49ad4385ff1ddee5d5693b646b92', 'a:6:{i:0;s:1:\"x\";i:1;s:1:\"g\";i:2;s:1:\"9\";i:3;s:1:\"z\";i:4;s:1:\"u\";i:5;s:1:\"t\";}', 1753408817),
('laravel_cache_captcha_76590aa2dd22502c9d23a77d01ccdb18', 'a:6:{i:0;s:1:\"c\";i:1;s:1:\"7\";i:2;s:1:\"e\";i:3;s:1:\"c\";i:4;s:1:\"j\";i:5;s:1:\"c\";}', 1753409152),
('laravel_cache_captcha_946da62a13d48b52e37da335e03df25c', 'a:6:{i:0;s:1:\"u\";i:1;s:1:\"r\";i:2;s:1:\"a\";i:3;s:1:\"q\";i:4;s:1:\"d\";i:5;s:1:\"x\";}', 1753409073),
('laravel_cache_captcha_98f33d4668ac6d8fb2805997e3caadc2', 'a:6:{i:0;s:1:\"8\";i:1;s:1:\"t\";i:2;s:1:\"t\";i:3;s:1:\"f\";i:4;s:1:\"m\";i:5;s:1:\"6\";}', 1753409147),
('laravel_cache_captcha_9c3f3869d573583d566cee6bdcd67e1a', 'a:6:{i:0;s:1:\"f\";i:1;s:1:\"n\";i:2;s:1:\"r\";i:3;s:1:\"q\";i:4;s:1:\"r\";i:5;s:1:\"z\";}', 1753409048),
('laravel_cache_captcha_a378dc6f3df7237510d6f9b5ea2e1e32', 'a:6:{i:0;s:1:\"h\";i:1;s:1:\"q\";i:2;s:1:\"b\";i:3;s:1:\"p\";i:4;s:1:\"p\";i:5;s:1:\"9\";}', 1753407044),
('laravel_cache_captcha_ab7b59f850dc33c3538071dc26b4a103', 'a:6:{i:0;s:1:\"u\";i:1;s:1:\"c\";i:2;s:1:\"7\";i:3;s:1:\"t\";i:4;s:1:\"2\";i:5;s:1:\"b\";}', 1753409157),
('laravel_cache_captcha_bd47a4d143673c6a6725715f3ae90e4e', 'a:6:{i:0;s:1:\"c\";i:1;s:1:\"8\";i:2;s:1:\"z\";i:3;s:1:\"9\";i:4;s:1:\"f\";i:5;s:1:\"g\";}', 1753409058),
('laravel_cache_captcha_bed3623f8510c5ca2171417101573731', 'a:6:{i:0;s:1:\"e\";i:1;s:1:\"g\";i:2;s:1:\"m\";i:3;s:1:\"g\";i:4;s:1:\"j\";i:5;s:1:\"h\";}', 1753409084),
('laravel_cache_captcha_c78fe0ce7029693cf8dd5a423730238c', 'a:6:{i:0;s:1:\"6\";i:1;s:1:\"r\";i:2;s:1:\"t\";i:3;s:1:\"t\";i:4;s:1:\"8\";i:5;s:1:\"4\";}', 1753409096),
('laravel_cache_captcha_cd2eb5005efd83018aa5279fa0f18114', 'a:6:{i:0;s:1:\"f\";i:1;s:1:\"y\";i:2;s:1:\"9\";i:3;s:1:\"u\";i:4;s:1:\"b\";i:5;s:1:\"n\";}', 1753409150),
('laravel_cache_captcha_e3b08790b733ecd2dcbec5a3cf74c6b4', 'a:6:{i:0;s:1:\"b\";i:1;s:1:\"x\";i:2;s:1:\"g\";i:3;s:1:\"4\";i:4;s:1:\"d\";i:5;s:1:\"g\";}', 1753409075);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lamarans`
--

CREATE TABLE `lamarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ptk_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengalaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa_asing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keahlian_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psikotest` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'melamar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lamarans`
--

INSERT INTO `lamarans` (`id`, `ptk_id`, `user_id`, `nama_lengkap`, `pendidikan`, `jenis_kelamin`, `usia`, `pengalaman`, `bahasa_asing`, `keahlian_khusus`, `psikotest`, `email`, `telepon`, `cv_path`, `images`, `status`, `created_at`, `updated_at`) VALUES
(5, 2, NULL, 'alif', 's2', 'Perempuan', '25', 'banyak', 'belanda', 'IT', 0, 'aliefyan@gmail.com', '081122334455', 'cv/p3qT8VVzLgk9mwi5ZbO43a9HcKrxUcGkcri6EEdq.pdf', '[\"lamaran_images/IrIitH6r0cPkmoYhk65ppR81UrJZwfPKZHHKYxJX.png\"]', 'diproses', '2025-07-15 18:08:20', '2025-07-15 18:10:11'),
(6, 10, NULL, 'vio', 's2', 'Perempuan', '23', 'ada', 'semua bahasa', 'multitaalenta', 0, 'guest@example.com', '0822222222', 'cv/OGTSKyaaf1y9zGYitUEXZhQaQOFL5ea6hKMw4qDl.pdf', '[\"lamaran_images/9aHKECVrfLFYRQo1sbyyVLLn64mwh3mTSL2wlLGN.jpg\"]', 'melamar', '2025-07-24 18:22:51', '2025-07-24 18:22:51'),
(7, 10, NULL, 'vio', 's2', 'Perempuan', '23', 'ada', 'semua bahasa', 'multitaalenta', 0, 'guest@example.com', '0822222222', 'cv/LUwmLoPD2ML1bbZrs40ZmXfPkoQQR56Zf2nCO1ym.pdf', '[\"lamaran_images/mwueEWvMA5KTs03kLDNFzLwgrSOwoIlUaxhLCysT.jpg\"]', 'diproses', '2025-07-24 18:29:41', '2025-07-24 18:31:55'),
(8, 2, NULL, 'vio00', 's2', 'Perempuan', '23', 'ada', 'semua bahasa', 'multitaalenta', 0, 'vio@gmail.com', '0822222222', 'cv/nHZF9PUkWYbGhzcqy7NvmYgyLBnQG2GFMt0Fhgsl.pdf', '[\"lamaran_images/zd4WdUe2XaH16Phcgk9dQ1t6ib0YRMKuWJDMIycK.jpg\"]', 'diproses', '2025-07-24 18:33:36', '2025-07-24 18:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2025_06_02_022148_create_ptks_table', 1),
(3, '2025_06_02_032233_create_cache_table', 1),
(4, '2025_06_05_021759_create_applies_table', 1),
(5, '2025_06_09_063531_create_psikotests_table', 1),
(6, '2025_06_10_025527_create_akun_psikotests_table', 1),
(7, '2025_06_16_080006_create_telegram_users_table', 1),
(8, '2025_07_11_023309_add_rekrutmen_status_to_users_table', 1),
(9, '2025_07_11_024947_add_status_to_applies_table', 1),
(10, '2025_07_14_031730_add_status_to_applies_table', 2),
(11, '2025_07_15_024241_add_user_id_to_ptks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `psikotests`
--

CREATE TABLE `psikotests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `answers` json NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ptks`
--

CREATE TABLE `ptks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `Jumlah_tenaga_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_permintaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_karyawan` enum('bulanan','harian','kontrak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengalaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa_asing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keahlian_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tes_buta_warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian_singkat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `struktur_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permintaan` enum('penggantian','penambahan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'penggantian',
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_manager` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status_director` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status_hr` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `reject_reason_manager` text COLLATE utf8mb4_unicode_ci,
  `reject_reason_director` text COLLATE utf8mb4_unicode_ci,
  `reject_reason_hr` text COLLATE utf8mb4_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ptks`
--

INSERT INTO `ptks` (`id`, `unit`, `jabatan`, `tanggal_permintaan`, `Jumlah_tenaga_kerja`, `jumlah_permintaan`, `departemen`, `status_karyawan`, `pendidikan`, `jenis_kelamin`, `usia`, `pengalaman`, `bahasa_asing`, `keahlian_khusus`, `Tes_buta_warna`, `uraian_singkat`, `struktur_organisasi`, `permintaan`, `alasan`, `image`, `status_manager`, `status_director`, `status_hr`, `reject_reason_manager`, `reject_reason_director`, `reject_reason_hr`, `is_published`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'resin', 'manager', '2025-07-15', '2', '1', 'IT', 'kontrak', 's1', 'Perempuan', '23', '1 tahun', 'belanda', 'Fullstack', 'perlu', 'ada banyak', 'struktur_organisasi/Yf7WoIJNOiZbVD0GdKPh2X6y9vJKIEDxB1ZiHkCP.png', 'penggantian', 'ga ada alasan banyak', NULL, 'approved', 'approved', 'approved', NULL, NULL, NULL, 1, '2025-07-15 23:13:38', '2025-07-15 18:00:44', NULL),
(3, 'Cat', 'asisten', '2025-07-11', '4', '2', 'marketing', 'bulanan', 's2', 'Laki-laki', '25', '3 tahun', 'belanda', 'finance', 'perlu', 'ada', 'struktur_organisasi/Yf7WoIJNOiZbVD0GdKPh2X6y9vJKIEDxB1ZiHkCP.png', 'penggantian', 'ga ada alasan', NULL, 'rejected', 'pending', 'pending', 'g mood', NULL, NULL, 0, '2025-07-13 23:13:38', '2025-07-17 20:14:34', NULL),
(4, 'resin', 'manager', '2025-07-15', '2', '1', 'IT', 'kontrak', 's1', 'Perempuan', '23', '1 tahun', 'belanda', 'Fullstack', 'perlu', 'ada banyak', 'struktur_organisasi/Yf7WoIJNOiZbVD0GdKPh2X6y9vJKIEDxB1ZiHkCP.png', 'penggantian', 'ga ada alasan banyak', NULL, 'approved', 'approved', 'approved', NULL, NULL, NULL, 1, '2025-07-15 23:13:38', '2025-07-17 19:59:04', NULL),
(5, 'Cat', 'asisten', '2025-07-11', '4', '2', 'marketing', 'bulanan', 's2', 'Laki-laki', '25', '3 tahun', 'belanda', 'finance', 'perlu', 'ada', 'struktur_organisasi/Yf7WoIJNOiZbVD0GdKPh2X6y9vJKIEDxB1ZiHkCP.png', 'penggantian', 'ga ada alasan', NULL, 'rejected', 'pending', 'pending', 'maap ya', NULL, NULL, 0, '2025-07-13 23:13:38', '2025-07-17 20:15:23', NULL),
(6, 'resin', 'manager', '2025-07-15', '2', '1', 'IT', 'kontrak', 's1', 'Perempuan', '23', '1 tahun', 'belanda', 'Fullstack', 'perlu', 'ada banyak', 'struktur_organisasi/Yf7WoIJNOiZbVD0GdKPh2X6y9vJKIEDxB1ZiHkCP.png', 'penggantian', 'ga ada alasan banyak', NULL, 'approved', 'rejected', 'pending', NULL, 'tidak perlu', NULL, 0, '2025-07-15 23:13:38', '2025-07-17 20:10:57', NULL),
(7, 'resin', 'manager', '2025-07-24', '2', '1', 'accounting', 'kontrak', 's1', 'Perempuan', '23', '1 tahun', 'belanda', 'Fullstack', 'perlu', 'ada banyak', 'struktur_organisasi/Yf7WoIJNOiZbVD0GdKPh2X6y9vJKIEDxB1ZiHkCP.png', 'penggantian', 'ga ada alasan banyak', NULL, 'approved', 'approved', 'approved', NULL, 'tidak perlu', NULL, 1, '2025-07-15 23:13:38', '2025-07-24 02:11:28', NULL),
(8, 'resin', 'manager', '2025-07-24', '2', '1', 'accounting', 'kontrak', 's1', 'Perempuan', '23', '1 tahun', 'belanda', 'Fullstack', 'perlu', 'ada banyak', 'struktur_organisasi/Yf7WoIJNOiZbVD0GdKPh2X6y9vJKIEDxB1ZiHkCP.png', 'penggantian', 'ga ada alasan banyak', NULL, 'pending', 'pending', 'pending', NULL, 'tidak perlu', NULL, 0, '2025-07-15 23:13:38', '2025-07-17 20:10:57', NULL),
(9, 'Resin', 'sekretaris', '2025-07-25', '8', '1', 'HRD', 'bulanan', 's1', 'Laki-laki', '23', 'fresh graduate', 'inggris', 'komunikasi', 'tidak_perlu', 'ada', 'struktur_organisasi/BnGKOEAOVjnN7gnfEb2xEMNLv6LwzwnvcOwthvvC.jpg', 'penggantian', '2', 'ptk_images/WXWYXduWBnxhit807h7EjsmLXL4sNoj3VtSJJS9m.jpg', 'pending', 'pending', 'pending', NULL, NULL, NULL, 0, '2025-07-24 18:11:23', '2025-07-24 18:11:23', 2),
(10, 'Resin', 'sekretaris', '2025-07-25', '8', '1', 'HRD', 'bulanan', 's1', 'Laki-laki', '23', 'fresh graduate', 'inggris', 'komunikasi', 'perlu', 'ada', 'struktur_organisasi/t1vIQFPCiXHqHGPjVVMcG0qJWgIjh8iUuTDpIK8v.jpg', 'penggantian', '2', 'ptk_images/PO6nXlHW9V057JSnDqLHaIPuSMGuSBTvw9fCwEVe.jpg', 'approved', 'approved', 'approved', NULL, NULL, NULL, 1, '2025-07-24 18:17:00', '2025-07-24 18:20:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9mQx7utdqt97mccxFYu118x0wFsFzA2FkiUnTksd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXRUOEpOckt6djFwbTJjN241bWxFb0t4QjhnRkl5OU5BaHIxUDNrWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753533639),
('YHgI0FIwEJddiGjr7DMA4AZmx0BMhL4GF4IoTQBb', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSFJja1JGTDdPQ3MxZUpqZ2pZMnQzZDI0S1I1T2tpc2VOY2dRZmE2dSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvc3RhZmYtZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1753433582);

-- --------------------------------------------------------

--
-- Table structure for table `telegram_users`
--

CREATE TABLE `telegram_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_id` bigint(20) NOT NULL,
  `role` enum('department_manager','director','hr_manager') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('guest','staff','department_manager','director','hr_manager') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rekrutmen_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'apply'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `rekrutmen_status`) VALUES
(1, 'Guest User', 'guest@example.com', NULL, '$2y$12$YdiYzdA.BJfkrBYKhDBhe.unzqtBI4Qa5Kn1EFmzmd60Zozo.MK/i', 'guest', NULL, '2025-07-13 21:51:43', '2025-07-13 21:51:43', 'apply'),
(2, 'Staff User', 'staff@example.com', NULL, '$2y$12$Wq8FoJFb.Y/YKpHzS0NRnebZUjXWxzoDk38C9j2I7MVUyC.h/vIuO', 'staff', NULL, '2025-07-13 21:51:43', '2025-07-13 21:51:43', 'apply'),
(3, 'Manager User', 'manager@example.com', NULL, '$2y$12$Ehd1DaxcMzLyULcRXEgSp.C451c7xd30d1ac7d5Xl0Cj0ZJhqJ.eO', 'department_manager', NULL, '2025-07-13 21:51:44', '2025-07-13 21:51:44', 'apply'),
(4, 'Aliefyan', 'aliefyan@gmail.com', NULL, '$2y$12$zqseFHN7SgHluJbJq6OkPufMNWMjDWpknWPzD5cDnHIVnubDcwdHa', 'guest', NULL, '2025-07-13 21:51:44', '2025-07-13 21:51:44', 'apply'),
(5, 'Director User', 'director@example.com', NULL, '$2y$12$F1io7gLvW1Jjynb0vEjBd.Y2yhAWABi2rpA40laB5471737YEdUzy', 'director', NULL, '2025-07-13 21:51:45', '2025-07-13 21:51:45', 'apply'),
(6, 'HR Manager User', 'hrmanager@example.com', NULL, '$2y$12$SOLB0/iwsqgMTwc7nsVY0OCd2H4dpd7dZc/iEEbyySDfnn2XIbq/C', 'hr_manager', NULL, '2025-07-13 21:51:45', '2025-07-13 21:51:45', 'apply'),
(7, 'AliefHR', 'aliefhakim1807@gmail.com', NULL, '$2y$12$cRmOioEjrD3GK3cmdXcb1.CWuN/8j2PKCVAjouZJXlTwho5mIyucu', 'hr_manager', NULL, '2025-07-13 21:51:45', '2025-07-13 21:51:45', 'apply'),
(8, 'vio', 'vio@gmail.com', NULL, '$2y$12$TTib27o5wvWCek.2oDr3veWdDWwfaLwP/xg3xcWkPr6COjVhkQq5e', 'guest', NULL, '2025-07-24 18:21:37', '2025-07-24 18:21:37', 'apply');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_psikotests`
--
ALTER TABLE `akun_psikotests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akun_psikotests_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `lamarans`
--
ALTER TABLE `lamarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lamarans_ptk_id_foreign` (`ptk_id`),
  ADD KEY `lamarans_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `psikotests`
--
ALTER TABLE `psikotests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `psikotests_user_id_foreign` (`user_id`);

--
-- Indexes for table `ptks`
--
ALTER TABLE `ptks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `telegram_users`
--
ALTER TABLE `telegram_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telegram_users_chat_id_unique` (`chat_id`);

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
-- AUTO_INCREMENT for table `akun_psikotests`
--
ALTER TABLE `akun_psikotests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lamarans`
--
ALTER TABLE `lamarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `psikotests`
--
ALTER TABLE `psikotests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ptks`
--
ALTER TABLE `ptks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `telegram_users`
--
ALTER TABLE `telegram_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lamarans`
--
ALTER TABLE `lamarans`
  ADD CONSTRAINT `lamarans_ptk_id_foreign` FOREIGN KEY (`ptk_id`) REFERENCES `ptks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lamarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `psikotests`
--
ALTER TABLE `psikotests`
  ADD CONSTRAINT `psikotests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
