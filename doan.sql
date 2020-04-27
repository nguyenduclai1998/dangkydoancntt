-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 09:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

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
-- Table structure for table `cauhoi`
--

CREATE TABLE `cauhoi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `detai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detaidexuat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chuyennganh`
--

CREATE TABLE `chuyennganh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenchuyennganh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyennganh`
--

INSERT INTO `chuyennganh` (`id`, `tenchuyennganh`, `mota`, `slug`, `created_at`, `updated_at`) VALUES
(10, 'Truyền thông mạng máy tính', 'Truyền thông mạng máy tính', 'truyen-thong-mang-may-tinh', '2020-04-20 06:14:26', '2020-04-20 06:14:26'),
(11, 'Điện tử viễn thông', 'Điện tử viễn thông', 'dien-tu-vien-thong', '2020-04-20 06:18:38', '2020-04-20 06:18:38'),
(13, 'Cơ điện tử', 'Cơ điện tử', 'co-dien-tu', '2020-04-20 17:56:08', '2020-04-20 17:56:08'),
(14, 'Hệ thống thông tin', 'Hệ thống thông tin', 'he-thong-thong-tin', '2020-04-23 20:40:01', '2020-04-23 20:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `detai`
--

CREATE TABLE `detai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tendetai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chuyennganh_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detai`
--

INSERT INTO `detai` (`id`, `tendetai`, `mota`, `slug`, `user_id`, `chuyennganh_id`, `created_at`, `updated_at`) VALUES
(1, 'Đề tài tốt nghiệp', 'Đề tài tốt nghiệp', 'de-tai-tot-nghiep-1587477719', 1, 11, '2020-04-20 19:29:00', '2020-04-21 07:01:59'),
(5, 'Sử dụng mã nguồn mở NukeViet và Moodle xây dựng website cho khoa Công nghệ Thông Tin', 'Sử dụng mã nguồn mở NukeViet và Moodle xây dựng website cho khoa Công nghệ Thông Tin', 'su-dung-ma-nguon-mo-nukeviet-va-moodle-xay-dung-website-cho-khoa-cong-nghe-thong-tin-1587438882', 1, 11, '2020-04-20 20:14:42', '2020-04-20 20:14:42'),
(6, 'Xây dựng phần mềm quản lý khối lượng giảng dạy của giảng viên khoa CNTT –Trường Đại học X', NULL, 'xay-dung-phan-mem-quan-ly-khoi-luong-giang-day-cua-giang-vien-khoa-cntt-truong-dai-hoc-x-1587438893', 1, 10, '2020-04-20 20:14:53', '2020-04-20 20:14:53'),
(7, 'Xây dựng phần mềm hỗ trợ quản lý nhân sự tại khoa Công nghệ Thông tin – Trường Đại học X', 'Xây dựng phần mềm hỗ trợ quản lý nhân sự tại khoa Công nghệ Thông tin – Trường Đại học X', 'xay-dung-phan-mem-ho-tro-quan-ly-nhan-su-tai-khoa-cong-nghe-thong-tin-truong-dai-hoc-x-1587438909', 1, 11, '2020-04-20 20:15:09', '2020-04-20 20:15:09'),
(8, 'Xây dựng Website hỗ trợ học tập cho sinh viên Khoa CNTT – Trường Đại X', NULL, 'xay-dung-website-ho-tro-hoc-tap-cho-sinh-vien-khoa-cntt-truong-dai-x-1587438916', 1, 10, '2020-04-20 20:15:16', '2020-04-20 20:15:16'),
(10, 'Xây dựng phần mềm quản lý phòng thực hành tin học khoa CNTT- Trường Đại học X', 'Xây dựng phần mềm quản lý phòng thực hành tin học khoa CNTT- Trường Đại học X', 'xay-dung-phan-mem-quan-ly-phong-thuc-hanh-tin-hoc-khoa-cntt-truong-dai-hoc-x-1587438932', 1, 13, '2020-04-20 20:15:32', '2020-04-20 20:15:32'),
(11, 'Xây dựng phần mềm hỗ trợ công tác phân công coi chấm thi khoa CNTT Trường ĐH X', 'Xây dựng phần mềm hỗ trợ công tác phân công coi chấm thi khoa CNTT Trường ĐH X', 'xay-dung-phan-mem-ho-tro-cong-tac-phan-cong-coi-cham-thi-khoa-cntt-truong-dh-x-1587438952', 1, 10, '2020-04-20 20:15:52', '2020-04-20 20:15:52'),
(12, 'Xây dựng CSDL và công cụ quản lý khách sạn phục vụ cho công ty du lịch', 'Xây dựng CSDL và công cụ quản lý khách sạn phục vụ cho công ty du lịch', 'xay-dung-csdl-va-cong-cu-quan-ly-khach-san-phuc-vu-cho-cong-ty-du-lich-1587439010', 1, 11, '2020-04-20 20:16:50', '2020-04-20 20:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `dexuatdetai`
--

CREATE TABLE `dexuatdetai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tendetai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` int(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chuyennganh_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ketquadangky`
--

CREATE TABLE `ketquadangky` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `detai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detaidexuat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trangthai` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_03_034330_create_role_table', 1),
(5, '2020_04_03_034441_create_thongtin_table', 1),
(6, '2020_04_03_034504_create_chuyennganh_table', 1),
(7, '2020_04_03_034527_create_detai_table', 1),
(8, '2020_04_03_034547_create_dexuatdetai_table', 1),
(9, '2020_04_03_034620_create_ketquadangky_table', 1),
(10, '2020_04_04_023539_create_cauhoi_table', 1),
(11, '2020_04_04_023651_create_traloicauhoi_table', 1),
(12, '2020_04_04_033556_create_updatetable_table', 1),
(13, '2020_04_05_124037_create_tintuc_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rolename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `rolename`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Guest', NULL, NULL),
(3, 'Giáo viên', NULL, NULL),
(4, 'Sinh viên', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thongtin`
--

CREATE TABLE `thongtin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sdt` bigint(20) DEFAULT NULL,
  `masv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtin`
--

INSERT INTO `thongtin` (`id`, `ngaysinh`, `sdt`, `masv`, `gioitinh`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 1, '2020-04-18 07:47:08', '2020-04-18 07:47:08'),
(2, NULL, NULL, NULL, NULL, NULL, 2, '2020-04-18 07:51:20', '2020-04-18 07:51:20'),
(3, NULL, NULL, NULL, NULL, NULL, 3, '2020-04-18 07:56:40', '2020-04-18 07:56:40'),
(4, NULL, NULL, NULL, NULL, NULL, 4, '2020-04-18 18:09:14', '2020-04-18 18:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenbaiviet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chuyennganh_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traloicauhoi`
--

CREATE TABLE `traloicauhoi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cauhoi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lai Nguyễn Đức', 'kenchivas1998@gmail.com', NULL, '$2y$10$e6vg3EPmHSfHuUjxfHrhLuHUIVhQzQdxak784zFKcETe9x.L5Ks.q', 1, NULL, '2020-04-18 07:47:08', '2020-04-18 07:47:08'),
(2, 'Lai Nguyễn Đức', 'nguyenduclai.utt@gmail.com', NULL, '$2y$10$jwofFw.0L5mwEvMbfFrG3.tSTqN1t45jJDw11R68X3nZNUDCPCGeC', 2, NULL, '2020-04-18 07:51:20', '2020-04-18 07:51:20'),
(3, 'Lai Nguyễn Đức', 'kenchivas199@gmail.com', NULL, '$2y$10$gpbd52yA2rGaSH.K6lWqO.nlwf0o6MFzuy8sZXlbK1ZX/p6DobwDm', 2, NULL, '2020-04-18 07:56:40', '2020-04-18 07:56:40'),
(4, 'Lai Nguyễn Đức', 'kenchivas19989@gmail.com', NULL, '$2y$10$x.RnIIjDWZ8MYTuln9VNnO5tOKojX2HR.A1ewCsLIXcv6dXiakiS6', 2, NULL, '2020-04-18 18:09:14', '2020-04-18 18:09:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cauhoi_user_id_foreign` (`user_id`),
  ADD KEY `cauhoi_detai_id_foreign` (`detai_id`),
  ADD KEY `cauhoi_detaidexuat_id_foreign` (`detaidexuat_id`);

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
  ADD KEY `detai_chuyennganh_id_foreign` (`chuyennganh_id`);

--
-- Indexes for table `dexuatdetai`
--
ALTER TABLE `dexuatdetai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dexuatdetai_user_id_foreign` (`user_id`),
  ADD KEY `dexuatdetai_chuyennganh_id_foreign` (`chuyennganh_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ketquadangky`
--
ALTER TABLE `ketquadangky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ketquadangky_detai_id_foreign` (`detai_id`),
  ADD KEY `ketquadangky_detaidexuat_id_foreign` (`detaidexuat_id`),
  ADD KEY `ketquadangky_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `tintuc_chuyennganh_id_foreign` (`chuyennganh_id`),
  ADD KEY `tintuc_user_id_foreign` (`user_id`);

--
-- Indexes for table `traloicauhoi`
--
ALTER TABLE `traloicauhoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `traloicauhoi_cauhoi_id_foreign` (`cauhoi_id`),
  ADD KEY `traloicauhoi_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chuyennganh`
--
ALTER TABLE `chuyennganh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detai`
--
ALTER TABLE `detai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `ketquadangky`
--
ALTER TABLE `ketquadangky`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thongtin`
--
ALTER TABLE `thongtin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `traloicauhoi`
--
ALTER TABLE `traloicauhoi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_detai_id_foreign` FOREIGN KEY (`detai_id`) REFERENCES `detai` (`id`),
  ADD CONSTRAINT `cauhoi_detaidexuat_id_foreign` FOREIGN KEY (`detaidexuat_id`) REFERENCES `dexuatdetai` (`id`),
  ADD CONSTRAINT `cauhoi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `detai`
--
ALTER TABLE `detai`
  ADD CONSTRAINT `detai_chuyennganh_id_foreign` FOREIGN KEY (`chuyennganh_id`) REFERENCES `chuyennganh` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `dexuatdetai`
--
ALTER TABLE `dexuatdetai`
  ADD CONSTRAINT `dexuatdetai_chuyennganh_id_foreign` FOREIGN KEY (`chuyennganh_id`) REFERENCES `chuyennganh` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dexuatdetai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ketquadangky`
--
ALTER TABLE `ketquadangky`
  ADD CONSTRAINT `ketquadangky_detai_id_foreign` FOREIGN KEY (`detai_id`) REFERENCES `detai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ketquadangky_detaidexuat_id_foreign` FOREIGN KEY (`detaidexuat_id`) REFERENCES `dexuatdetai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ketquadangky_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thongtin`
--
ALTER TABLE `thongtin`
  ADD CONSTRAINT `thongtin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_chuyennganh_id_foreign` FOREIGN KEY (`chuyennganh_id`) REFERENCES `chuyennganh` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tintuc_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `traloicauhoi`
--
ALTER TABLE `traloicauhoi`
  ADD CONSTRAINT `traloicauhoi_cauhoi_id_foreign` FOREIGN KEY (`cauhoi_id`) REFERENCES `cauhoi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `traloicauhoi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
