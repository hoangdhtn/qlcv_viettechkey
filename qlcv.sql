-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 22, 2022 lúc 07:33 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlcv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

CREATE TABLE `baocao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nguoigui` bigint(20) NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoihan` date NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congvan`
--

CREATE TABLE `congvan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nguoigui` bigint(255) NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `filebaocao`
--

CREATE TABLE `filebaocao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_baocao` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `filecongvan`
--

CREATE TABLE `filecongvan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_congvan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `filephanhoibaocao`
--

CREATE TABLE `filephanhoibaocao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_phanhoibaocao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_15_162653_create_permission_tables', 2),
(6, '2022_07_08_063912_phongbans', 3),
(7, '2022_07_08_064153_user_phongban', 4),
(8, '2022_07_09_015903_phong_ban_user', 5),
(9, '2022_07_13_063543_congvan', 6),
(10, '2022_07_13_064823_filecongvan', 7),
(11, '2022_07_18_005313_phanhoicongvan', 8),
(12, '2022_07_19_080144_baocao', 9),
(13, '2022_07_19_081215_filebaocao', 10),
(14, '2022_07_19_081501_nguoinhanbaocao', 11),
(15, '2022_07_19_083715_phanhoibaocao', 12),
(16, '2022_07_19_085512_phanhoibaocao', 13),
(17, '2022_07_27_022412_filephanhoicongvan', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(8, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoinhanbaocao`
--

CREATE TABLE `nguoinhanbaocao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_baocao` int(11) NOT NULL,
  `id_nguoinhan` bigint(20) NOT NULL,
  `trangthai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoinhancongvan`
--

CREATE TABLE `nguoinhancongvan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_congvan` int(11) NOT NULL,
  `id_nguoinhan` bigint(20) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$5Ckd7P1.94lIn6H1ZJ4hOe4lMWAXetTqYFHeStQyI8h9qns43NUJ6', '2022-06-12 11:21:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add user', 'web', '2022-06-15 09:51:50', '2022-06-15 09:51:50'),
(2, 'edit user', 'web', '2022-06-15 09:52:21', '2022-06-15 09:52:21'),
(3, 'delete user', 'web', '2022-06-15 09:52:35', '2022-06-15 09:52:35'),
(4, 'publish user', 'web', '2022-06-15 09:53:04', '2022-06-15 09:53:04'),
(5, 'edit information', 'web', '2022-06-16 07:09:11', '2022-06-16 07:09:11'),
(6, 'add role', 'web', '2022-06-19 09:18:51', '2022-06-19 09:18:51'),
(7, 'edit role', 'web', '2022-06-19 09:19:10', '2022-06-19 09:19:10'),
(8, 'delete role', 'web', '2022-06-19 09:19:21', '2022-06-19 09:19:21'),
(9, 'add permission', 'web', '2022-06-19 09:19:46', '2022-06-19 09:19:46'),
(11, 'delete permission', 'web', '2022-06-19 09:20:10', '2022-06-19 09:20:10'),
(14, 'add phongban', 'web', '2022-07-08 00:09:43', '2022-07-08 00:09:43'),
(15, 'edit phongban', 'web', '2022-07-08 00:09:53', '2022-07-08 00:09:53'),
(16, 'delete phongban', 'web', '2022-07-08 00:10:03', '2022-07-08 00:10:03'),
(17, 'publish phongban', 'web', '2022-07-08 00:10:10', '2022-07-08 00:10:10'),
(18, 'add congvan', 'web', '2022-07-13 00:00:20', '2022-07-13 00:00:20'),
(19, 'delete congvan', 'web', '2022-07-13 00:00:29', '2022-07-13 00:00:29'),
(20, 'edit congvan', 'web', '2022-07-13 00:00:37', '2022-07-13 00:00:37'),
(21, 'add baocao', 'web', '2022-07-31 18:24:28', '2022-07-31 18:24:28'),
(22, 'delete baocao', 'web', '2022-07-31 18:24:37', '2022-07-31 18:24:37'),
(23, 'edit baocao', 'web', '2022-07-31 18:24:48', '2022-07-31 18:24:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoibaocao`
--

CREATE TABLE `phanhoibaocao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_baocao` int(11) NOT NULL,
  `id_nguoigui` bigint(20) NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoicongvan`
--

CREATE TABLE `phanhoicongvan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_congvan` int(11) NOT NULL,
  `id_nguoigui` bigint(20) NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongbans`
--

CREATE TABLE `phongbans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongbans`
--

INSERT INTO `phongbans` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lãnh đạo Phòng GD&ĐT', 'Lãnh đạo Phòng GD&ĐT', NULL, '2022-07-12 23:29:50'),
(2, 'Kế toán - Tài chính - CSVC', 'Kế toán - Tài chính - CSVC', NULL, NULL),
(3, 'Các trường Mầm non', 'Các trường Mầm non', NULL, NULL),
(4, 'Các trường Tiểu học', 'Các trường Tiểu học', NULL, NULL),
(5, 'Các trường THCS', 'Các trường THCS', NULL, NULL),
(6, 'Công Đoàn PGD', 'Công Đoàn PGD', NULL, NULL),
(7, 'Văn thư - Thủ quỹ PGD', 'Văn thư - Thủ quỹ PGD', NULL, NULL),
(8, 'Chuyên môn PGD', 'Chuyên môn PGD', NULL, NULL),
(9, 'Hành chính - Tổng hợp', 'Hành chính - Tổng hợp', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban_user`
--

CREATE TABLE `phongban_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phongban_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban_user`
--

INSERT INTO `phongban_user` (`id`, `user_id`, `phongban_id`) VALUES
(3, 3, 1),
(7, 7, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'user', 'web', '2022-06-16 07:09:11', '2022-06-16 07:09:11'),
(4, 'super admin', 'web', '2022-06-19 06:57:59', '2022-06-19 06:57:59'),
(7, 'quan tri', 'web', '2022-07-08 00:10:33', '2022-07-08 00:10:33'),
(8, 'phong giao duc', 'web', '2022-07-08 01:28:13', '2022-07-08 01:28:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(6, 7),
(7, 7),
(8, 7),
(9, 7),
(11, 7),
(14, 7),
(15, 7),
(16, 7),
(17, 7),
(18, 7),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(14, 8),
(15, 8),
(16, 8),
(17, 8),
(18, 8),
(19, 8),
(20, 8),
(21, 8),
(22, 8),
(23, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_dislay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `name_dislay`, `phone`, `username`, `email`, `enabled`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'ADMIN VTK', NULL, 'adminvtk', 'admin@admin.com', 1, NULL, '$2y$10$1Haoc1OPgCbdr9AfmOxpxO7I7UTSs0nKLuqbpqfSs4pKFujLd7A56', '6rPBQTAqidzaJ0tFo7BUTcfZ20FRpIalMCulBKaA29wJCppCIVTZZjU9IAIe', '2022-06-12 11:06:22', '2022-07-11 01:14:43'),
(2, 'user', 'User VTK', '', 'uservtk', 'user@user.com', 1, NULL, '$2y$10$1Haoc1OPgCbdr9AfmOxpxO7I7UTSs0nKLuqbpqfSs4pKFujLd7A56', NULL, '2022-06-16 06:56:04', '2022-06-16 06:56:04'),
(3, 'Phạm Huy Hoàng', 'Người dùng VTK', '0338275859', 'phhvtk', 'hoang@gmail.com', 1, NULL, '$2y$10$VmWTuctOWRVIs9GsisXSnOu2oknJr0mUSMF7RQBx4zZXzRY7RFHyK', NULL, '2022-06-17 02:51:27', '2022-12-21 23:58:54'),
(7, 'admin123123', 'Trường Chu Văn An', NULL, 'thptcva', 'admin@chanleviet.com', 1, NULL, '$2y$10$1Haoc1OPgCbdr9AfmOxpxO7I7UTSs0nKLuqbpqfSs4pKFujLd7A56', NULL, '2022-07-10 19:26:58', '2022-07-11 01:14:14');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `congvan`
--
ALTER TABLE `congvan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `filebaocao`
--
ALTER TABLE `filebaocao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `filecongvan`
--
ALTER TABLE `filecongvan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `filephanhoibaocao`
--
ALTER TABLE `filephanhoibaocao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `nguoinhanbaocao`
--
ALTER TABLE `nguoinhanbaocao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoinhancongvan`
--
ALTER TABLE `nguoinhancongvan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phanhoibaocao`
--
ALTER TABLE `phanhoibaocao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanhoicongvan`
--
ALTER TABLE `phanhoicongvan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phongbans`
--
ALTER TABLE `phongbans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phongban_user`
--
ALTER TABLE `phongban_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phongban_user_user_id_index` (`user_id`),
  ADD KEY `phongban_user_phongban_id_index` (`phongban_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baocao`
--
ALTER TABLE `baocao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `congvan`
--
ALTER TABLE `congvan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `filebaocao`
--
ALTER TABLE `filebaocao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `filecongvan`
--
ALTER TABLE `filecongvan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `filephanhoibaocao`
--
ALTER TABLE `filephanhoibaocao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nguoinhanbaocao`
--
ALTER TABLE `nguoinhanbaocao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nguoinhancongvan`
--
ALTER TABLE `nguoinhancongvan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phanhoibaocao`
--
ALTER TABLE `phanhoibaocao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phanhoicongvan`
--
ALTER TABLE `phanhoicongvan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phongbans`
--
ALTER TABLE `phongbans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phongban_user`
--
ALTER TABLE `phongban_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phongban_user`
--
ALTER TABLE `phongban_user`
  ADD CONSTRAINT `phongban_user_phongban_id_foreign` FOREIGN KEY (`phongban_id`) REFERENCES `phongbans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phongban_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
