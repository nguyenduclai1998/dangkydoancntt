-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 01:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan`
--

-- --------------------------------------------------------

--
-- Table structure for table `chuyennganh`
--

CREATE TABLE `chuyennganh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenchuyennganh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chuyennganh`
--

INSERT INTO `chuyennganh` (`id`, `tenchuyennganh`, `mota`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hệ thống thông tin', 'Hệ thống thông tin', 'he-thong-thong-tin', '2020-04-28 01:49:11', '2020-04-28 01:49:11'),
(2, 'Truyền thông mạng máy tính', 'Truyền thông mạng máy tính', 'truyen-thong-mang-may-tinh', '2020-04-28 01:49:23', '2020-04-28 01:49:23'),
(3, 'Điện tử viễn thông', 'Điện tử viễn thông', 'dien-tu-vien-thong', '2020-04-28 01:49:37', '2020-04-28 01:49:37'),
(4, 'Cơ điện tử', 'Cơ điện tử', 'co-dien-tu', '2020-04-28 01:49:47', '2020-04-28 01:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `detai`
--

CREATE TABLE `detai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tendetai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chuyennganh_id` bigint(20) UNSIGNED NOT NULL,
  `linhvuc_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detai`
--

INSERT INTO `detai` (`id`, `tendetai`, `mota`, `slug`, `user_id`, `chuyennganh_id`, `linhvuc_id`, `created_at`, `updated_at`) VALUES
(3, 'Xây dựng phần mềm quản lý khối lượng giảng dạy của giảng viên khoa CNTT –Trường Đại học X', 'Xây dựng phần mềm quản lý khối lượng giảng dạy của giảng viên khoa CNTT –Trường Đại học X', 'xay-dung-phan-mem-quan-ly-khoi-luong-giang-day-cua-giang-vien-khoa-cntt-truong-dai-hoc-x-1588070027', 1, 2, 1, '2020-04-28 03:33:47', '2020-04-28 03:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `dexuatdetai`
--

CREATE TABLE `dexuatdetai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tendetai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chuyennganh_id` bigint(20) UNSIGNED NOT NULL,
  `linhvuc_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `linhvuc`
--

CREATE TABLE `linhvuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenlinhvuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `linhvuc`
--

INSERT INTO `linhvuc` (`id`, `tenlinhvuc`, `mota`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Thiết kế web', 'Thiết kế web', 'thiet-ke-web', '2020-04-28 02:20:41', '2020-04-28 02:52:43'),
(2, 'Lập trình Android', 'Lập trình Android', 'lap-trinh-android', '2020-04-28 02:20:53', '2020-04-28 02:20:53'),
(4, 'Lập trình IOS', 'Lập trình IOS', 'lap-trinh-ios', '2020-04-28 02:53:06', '2020-04-28 02:54:11');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_28_074926_create_table_table', 1),
(5, '2020_04_28_083314_create_relationship_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguyenvong1`
--

CREATE TABLE `nguyenvong1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `detai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detaidexuat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `linhvuc_id` bigint(20) UNSIGNED NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguyenvong2`
--

CREATE TABLE `nguyenvong2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `detai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detaidexuat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `linhvuc_id` bigint(20) UNSIGNED NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rolename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `rolename`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên', NULL, NULL),
(2, 'Giáo viên', NULL, NULL),
(3, 'Sinh viên', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thongtin`
--

CREATE TABLE `thongtin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sdt` bigint(20) DEFAULT NULL,
  `masv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thongtin`
--

INSERT INTO `thongtin` (`id`, `ngaysinh`, `sdt`, `masv`, `gioitinh`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 1, '2020-04-28 01:48:59', '2020-04-28 01:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenbaiviet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chuyennganh_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 3,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lai Nguyễn Đức', 'kenchivas1998@gmail.com', NULL, '$2y$10$YiIs1u/hZd0TKm2EsYuF0uWFXPUWmnxFPMJFg4ABZ.YN3uG1drRTm', 1, NULL, '2020-04-28 01:48:59', '2020-04-28 01:48:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuyennganh`
--
ALTER TABLE `chuyennganh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detai`
--
ALTER TABLE `detai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detai_user_id_foreign` (`user_id`),
  ADD KEY `detai_chuyennganh_id_foreign` (`chuyennganh_id`),
  ADD KEY `detai_linhvuc_id_foreign` (`linhvuc_id`);

--
-- Indexes for table `dexuatdetai`
--
ALTER TABLE `dexuatdetai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dexuatdetai_user_id_foreign` (`user_id`),
  ADD KEY `dexuatdetai_chuyennganh_id_foreign` (`chuyennganh_id`),
  ADD KEY `dexuatdetai_linhvuc_id_foreign` (`linhvuc_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linhvuc`
--
ALTER TABLE `linhvuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguyenvong1`
--
ALTER TABLE `nguyenvong1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguyenvong1_user_id_foreign` (`user_id`),
  ADD KEY `nguyenvong1_detai_id_foreign` (`detai_id`),
  ADD KEY `nguyenvong1_detaidexuat_id_foreign` (`detaidexuat_id`),
  ADD KEY `nguyenvong1_linhvuc_id_foreign` (`linhvuc_id`);

--
-- Indexes for table `nguyenvong2`
--
ALTER TABLE `nguyenvong2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguyenvong2_user_id_foreign` (`user_id`),
  ADD KEY `nguyenvong2_detai_id_foreign` (`detai_id`),
  ADD KEY `nguyenvong2_detaidexuat_id_foreign` (`detaidexuat_id`),
  ADD KEY `nguyenvong2_linhvuc_id_foreign` (`linhvuc_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thongtin`
--
ALTER TABLE `thongtin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thongtin_user_id_foreign` (`user_id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tintuc_user_id_foreign` (`user_id`),
  ADD KEY `tintuc_chuyennganh_id_foreign` (`chuyennganh_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chuyennganh`
--
ALTER TABLE `chuyennganh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detai`
--
ALTER TABLE `detai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dexuatdetai`
--
ALTER TABLE `dexuatdetai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `linhvuc`
--
ALTER TABLE `linhvuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nguyenvong1`
--
ALTER TABLE `nguyenvong1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguyenvong2`
--
ALTER TABLE `nguyenvong2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thongtin`
--
ALTER TABLE `thongtin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detai`
--
ALTER TABLE `detai`
  ADD CONSTRAINT `detai_chuyennganh_id_foreign` FOREIGN KEY (`chuyennganh_id`) REFERENCES `chuyennganh` (`id`),
  ADD CONSTRAINT `detai_linhvuc_id_foreign` FOREIGN KEY (`linhvuc_id`) REFERENCES `linhvuc` (`id`),
  ADD CONSTRAINT `detai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `dexuatdetai`
--
ALTER TABLE `dexuatdetai`
  ADD CONSTRAINT `dexuatdetai_chuyennganh_id_foreign` FOREIGN KEY (`chuyennganh_id`) REFERENCES `chuyennganh` (`id`),
  ADD CONSTRAINT `dexuatdetai_linhvuc_id_foreign` FOREIGN KEY (`linhvuc_id`) REFERENCES `linhvuc` (`id`),
  ADD CONSTRAINT `dexuatdetai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `nguyenvong1`
--
ALTER TABLE `nguyenvong1`
  ADD CONSTRAINT `nguyenvong1_detai_id_foreign` FOREIGN KEY (`detai_id`) REFERENCES `detai` (`id`),
  ADD CONSTRAINT `nguyenvong1_detaidexuat_id_foreign` FOREIGN KEY (`detaidexuat_id`) REFERENCES `dexuatdetai` (`id`),
  ADD CONSTRAINT `nguyenvong1_linhvuc_id_foreign` FOREIGN KEY (`linhvuc_id`) REFERENCES `linhvuc` (`id`),
  ADD CONSTRAINT `nguyenvong1_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `nguyenvong2`
--
ALTER TABLE `nguyenvong2`
  ADD CONSTRAINT `nguyenvong2_detai_id_foreign` FOREIGN KEY (`detai_id`) REFERENCES `detai` (`id`),
  ADD CONSTRAINT `nguyenvong2_detaidexuat_id_foreign` FOREIGN KEY (`detaidexuat_id`) REFERENCES `dexuatdetai` (`id`),
  ADD CONSTRAINT `nguyenvong2_linhvuc_id_foreign` FOREIGN KEY (`linhvuc_id`) REFERENCES `linhvuc` (`id`),
  ADD CONSTRAINT `nguyenvong2_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `thongtin`
--
ALTER TABLE `thongtin`
  ADD CONSTRAINT `thongtin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_chuyennganh_id_foreign` FOREIGN KEY (`chuyennganh_id`) REFERENCES `chuyennganh` (`id`),
  ADD CONSTRAINT `tintuc_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
