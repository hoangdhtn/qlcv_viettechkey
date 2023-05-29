-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 29, 2023 lúc 07:28 AM
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

--
-- Đang đổ dữ liệu cho bảng `baocao`
--

INSERT INTO `baocao` (`id`, `id_nguoigui`, `tieude`, `thoihan`, `noidung`, `created_at`, `updated_at`) VALUES
(1, 1, 'BBBB', '2023-01-07', 'BBBBB', '2023-01-06 19:45:15', '2023-01-06 19:45:15');

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

--
-- Đang đổ dữ liệu cho bảng `filebaocao`
--

INSERT INTO `filebaocao` (`id`, `id_baocao`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '1673059515-BT THCS thuận nam 2.pdf', '2023-01-06 19:45:15', '2023-01-06 19:45:15');

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

--
-- Đang đổ dữ liệu cho bảng `filephanhoibaocao`
--

INSERT INTO `filephanhoibaocao` (`id`, `id_phanhoibaocao`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', '1675048101-BT THCS TÂN THÀNH s.pdf', '2023-01-29 20:08:21', '2023-01-29 20:08:21');

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
(17, '2022_07_27_022412_filephanhoicongvan', 14),
(18, '2022_12_22_074036_create_baocao_table', 0),
(19, '2022_12_22_074036_create_congvan_table', 0),
(20, '2022_12_22_074036_create_failed_jobs_table', 0),
(21, '2022_12_22_074036_create_filebaocao_table', 0),
(22, '2022_12_22_074036_create_filecongvan_table', 0),
(23, '2022_12_22_074036_create_filephanhoibaocao_table', 0),
(24, '2022_12_22_074036_create_model_has_permissions_table', 0),
(25, '2022_12_22_074036_create_model_has_roles_table', 0),
(26, '2022_12_22_074036_create_nguoinhanbaocao_table', 0),
(27, '2022_12_22_074036_create_nguoinhancongvan_table', 0),
(28, '2022_12_22_074036_create_password_resets_table', 0),
(29, '2022_12_22_074036_create_permissions_table', 0),
(30, '2022_12_22_074036_create_personal_access_tokens_table', 0),
(31, '2022_12_22_074036_create_phanhoibaocao_table', 0),
(32, '2022_12_22_074036_create_phanhoicongvan_table', 0),
(33, '2022_12_22_074036_create_phongbans_table', 0),
(34, '2022_12_22_074036_create_phongban_user_table', 0),
(35, '2022_12_22_074036_create_roles_table', 0),
(36, '2022_12_22_074036_create_role_has_permissions_table', 0),
(37, '2022_12_22_074036_create_users_table', 0),
(38, '2022_12_22_074037_add_foreign_keys_to_model_has_permissions_table', 0),
(39, '2022_12_22_074037_add_foreign_keys_to_model_has_roles_table', 0),
(40, '2022_12_22_074037_add_foreign_keys_to_phongban_user_table', 0),
(41, '2022_12_22_074037_add_foreign_keys_to_role_has_permissions_table', 0),
(42, '2023_03_29_070843_create_table_log_setting', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'App\\Models\\User', 9),
(8, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(8, 'App\\Models\\User', 12),
(8, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(8, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 25),
(8, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 27),
(8, 'App\\Models\\User', 28),
(8, 'App\\Models\\User', 29),
(8, 'App\\Models\\User', 30),
(8, 'App\\Models\\User', 31),
(8, 'App\\Models\\User', 32),
(8, 'App\\Models\\User', 33),
(2, 'App\\Models\\User', 34),
(2, 'App\\Models\\User', 35),
(2, 'App\\Models\\User', 36),
(2, 'App\\Models\\User', 37),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 39),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41),
(2, 'App\\Models\\User', 42),
(2, 'App\\Models\\User', 43),
(2, 'App\\Models\\User', 44),
(2, 'App\\Models\\User', 45),
(2, 'App\\Models\\User', 46),
(2, 'App\\Models\\User', 47),
(2, 'App\\Models\\User', 48);

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

--
-- Đang đổ dữ liệu cho bảng `nguoinhanbaocao`
--

INSERT INTO `nguoinhanbaocao` (`id`, `id_baocao`, `id_nguoinhan`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(2, 1, 29, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(3, 1, 32, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(4, 1, 14, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(5, 1, 34, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(6, 1, 16, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(7, 1, 17, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(8, 1, 18, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(9, 1, 19, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(10, 1, 20, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(11, 1, 21, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(12, 1, 22, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(13, 1, 23, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(14, 1, 24, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(15, 1, 25, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(16, 1, 9, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(17, 1, 38, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(18, 1, 39, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(19, 1, 40, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(20, 1, 41, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(21, 1, 42, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(22, 1, 43, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(23, 1, 44, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(24, 1, 45, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(25, 1, 46, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(26, 1, 47, '1', '2023-01-06 19:45:15', '2023-01-29 20:08:21'),
(27, 1, 11, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(28, 1, 27, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(29, 1, 35, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(30, 1, 36, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(31, 1, 37, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(32, 1, 48, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(33, 1, 10, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(34, 1, 12, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(35, 1, 15, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(36, 1, 26, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(37, 1, 28, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(38, 1, 30, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(39, 1, 31, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15'),
(40, 1, 33, '0', '2023-01-06 19:45:15', '2023-01-06 19:45:15');

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

--
-- Đang đổ dữ liệu cho bảng `phanhoibaocao`
--

INSERT INTO `phanhoibaocao` (`id`, `id_baocao`, `id_nguoigui`, `tieude`, `noidung`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 1, 47, 'AAAA', 'AAAAAAAAAA', '0', '2023-01-29 20:08:21', '2023-01-29 20:08:21');

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
(1, 9, 4),
(2, 10, 8),
(4, 12, 8),
(5, 13, 1),
(6, 14, 2),
(7, 15, 8),
(8, 16, 3),
(9, 17, 3),
(10, 18, 3),
(11, 19, 3),
(12, 11, 5),
(13, 20, 3),
(14, 21, 3),
(15, 22, 3),
(16, 23, 3),
(17, 24, 3),
(18, 25, 3),
(19, 26, 8),
(20, 27, 5),
(21, 28, 8),
(22, 29, 1),
(23, 30, 8),
(24, 31, 8),
(25, 32, 1),
(26, 33, 8),
(27, 34, 2),
(28, 35, 5),
(29, 36, 5),
(30, 37, 5),
(31, 38, 4),
(32, 39, 4),
(33, 40, 4),
(34, 41, 4),
(35, 42, 4),
(36, 43, 4),
(37, 44, 4),
(38, 45, 4),
(39, 46, 4),
(40, 47, 4),
(41, 48, 7);

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
-- Cấu trúc bảng cho bảng `table_log_setting`
--

CREATE TABLE `table_log_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_log_setting`
--

INSERT INTO `table_log_setting` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Người dùng ADMIN VTK đã đăng nhập hệ thống', '2023-03-29 00:29:18', '2023-03-29 00:29:18'),
(2, 'Người dùng ADMIN VTK đã đăng nhập hệ thống', '2023-03-29 00:30:09', '2023-03-29 00:30:09'),
(3, 'Người dùng ADMIN VTK đã thoát hệ thống', '2023-03-29 00:30:15', '2023-03-29 00:30:15'),
(4, 'Người dùng ADMIN VTK đã đăng nhập hệ thống', '2023-03-29 02:16:53', '2023-03-29 02:16:53'),
(5, 'Người dùng ADMIN VTK đã đăng nhập hệ thống', '2023-03-29 18:39:17', '2023-03-29 18:39:17');

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
(1, 'ADMIN', 'ADMIN VTK', NULL, 'adminvtk', 'admin@admin.com', 1, NULL, '$2y$10$1Haoc1OPgCbdr9AfmOxpxO7I7UTSs0nKLuqbpqfSs4pKFujLd7A56', '7nrLvXOx3wgb6t5Q6awnTjWL9QMLFM7SxxraxR44ipMCS95gZqAM8UMstwAw', '2022-06-12 11:06:22', '2022-07-11 01:14:43'),
(9, 'Nguyễn Thành Lê', 'Trường Tiểu học số 1 An Hòa', NULL, 'leanhoa1al@gmail.com', 'leanhoa1al@gmail.com', 1, NULL, '$2y$10$29wpEbmhNTiuMrINxLR8rO1.RyhXwsMwM41h1c0vApVEU0Q700fSS', NULL, '2023-01-02 20:24:35', '2023-01-02 20:24:35'),
(10, 'Nguyễn Anh Khương', 'Nguyễn Anh Khương', NULL, 'khuongna@anlao.binhdinh.gov.vn', 'khuongna@anlao.binhdinh.gov.vn', 1, NULL, '$2y$10$9AhRi.ogQrgXkOMLFCNjtO0YdShBuxZ4mmDv8KjWrvfFmWppsL0DK', NULL, '2023-01-02 20:28:12', '2023-01-02 20:28:12'),
(11, 'Huỳnh Xuân Tấn', 'Trường PTDTBT An Lão', '+84 985803234', 'tanptdtbttrunghung@gmail.com', 'tanptdtbttrunghung@gmail.com', 1, NULL, '$2y$10$LXldPYCZ5oriTyl28YLFMOvkaQmgOmSuSIihI6u5vw407ZG206hdS', NULL, '2023-01-02 20:29:05', '2023-01-02 20:58:01'),
(12, 'Trần Văn Trinh', 'Trần Văn Trinh', NULL, 'trinhpgd', 'Trinhnguyenhai2008@gmail.com', 1, NULL, '$2y$10$OWze8m/s3FsiD1D4OgJ2wulRUWrPW9npD.gQAnuJnFszLtH136m/a', NULL, '2023-01-02 20:31:06', '2023-01-02 20:31:06'),
(13, 'Nguyễn Văn Hà', 'Nguyễn Văn Hà', '+84 982875122', 'hapgd', 'hapgdanlao@gmail.com', 1, NULL, '$2y$10$D5zLu.TNM9G5vBpWeHGgYO3ll3t8x99tbMd3JfIQtLxWytcqwF7TC', NULL, '2023-01-02 20:32:01', '2023-01-02 20:32:01'),
(14, 'Thị Út PGD', 'Thị Út PGD', NULL, 'utpgd', 'ut123@gmail.com', 1, NULL, '$2y$10$wMBP3PFD.fQqhoNbTlABjuLuvVh8FBq4hcLYXERxTtRHe6z30s6K6', NULL, '2023-01-02 20:33:12', '2023-01-02 20:33:12'),
(15, 'Nguyễn Thanh Phương', 'Nguyễn Thanh Phương', NULL, 'phuongpgd', 'tphuong_anlao@yahoo.com.vn', 1, NULL, '$2y$10$Um9ZjHv/uUOYXjv6Ood5T.SZjQKbiiAxrMQb.gGtEbUCnpqVn5tqa', NULL, '2023-01-02 20:35:42', '2023-01-02 20:35:42'),
(16, 'Trường Mầm non An Hòa', 'Trường Mầm non An Hòa', '+84 2563878082', 'mnah', 'mnsonca@pgdanlao.edu.vn', 1, NULL, '$2y$10$WrL0e/WEZ7CUZW1Z/R2Yqer31OufcziahOwWF6MnhG7rsMWm6hp8a', NULL, '2023-01-02 20:36:41', '2023-01-02 20:36:41'),
(17, 'Trường mầm non Huyện An Lão', 'Trường mầm non Huyện An Lão', '+84 2563875324', 'mnhuyen', 'mnhuyen@pgdanlao.edu.vn', 1, NULL, '$2y$10$/uLWzbBn9ZgruHlnHVpnBuBC1RMjP5Ivp4OIFxJgiOGBTqWKbcS2u', NULL, '2023-01-02 20:37:30', '2023-01-02 20:37:30'),
(18, 'Trường mẫu giáo An Trung', 'Trường mẫu giáo An Trung', '+84 2563875046', 'mgantrung', 'antrungmaugiao@gmail.com', 1, NULL, '$2y$10$K/3aA78vmcLah3Yx4fS72.UE4Tp6knlmSKIkN1Y5VPuSxn74Kip6S', NULL, '2023-01-02 20:38:22', '2023-01-02 20:38:22'),
(19, 'Trường Mầm non An Tân', 'Trường Mầm non An Tân', NULL, 'mgantan', 'mgantan@pgdanlao.edu.vn', 1, NULL, '$2y$10$dR/tktHTTmRHR95/YVPESuLh.cOk2cbfES5rFN5Zlq6SolvC1wsxK', NULL, '2023-01-02 20:39:21', '2023-01-02 20:39:21'),
(20, 'Trường mẫu giáo An Vinh', 'Trường mẫu giáo An Vinh', '+84 962839346', 'mganvinh', 'mganvinh@pgdanlao.edu.vn', 1, NULL, '$2y$10$t./cKOOhVwwdKjfSW6fqj.ebMh0nHl.oQEkhxiC9gA7lYAv0D5nOu', NULL, '2023-01-03 00:38:46', '2023-01-03 00:38:46'),
(21, 'Trường mẫu giáo An Toàn', 'Trường mẫu giáo An Toàn', '+84 986821099', 'mgantoan', 'mgantoan@pgdanlao.edu.vn', 1, NULL, '$2y$10$4awKzKdEKyf4TZGQvbxPWuWJDeQxwkz48wpna7rwJOgIAyOpraF1y', NULL, '2023-01-03 00:39:58', '2023-01-03 00:39:58'),
(22, 'Trường mẫu giáo An Nghĩa', 'Trường mẫu giáo An Nghĩa', '+84 986153691', 'mgannghia', 'trieuannghia@gmail.com', 1, NULL, '$2y$10$F4Hk2YNr5fKE28Nrw2xR4uKZkp1tbBTnYhfUTYBqu9JGZrOlC4q7q', NULL, '2023-01-03 00:40:54', '2023-01-03 00:40:54'),
(23, 'Trường mẫu giáo An Dũng', 'Trường mẫu giáo An Dũng', '+84 979510302', 'mgandung', 'mgandungal@gmail.com', 1, NULL, '$2y$10$pNXSco7omwsKBXX8z/DQ7eSoZDd3Qatu8xRFYKV/UgSMGy4BXEIp.', NULL, '2023-01-03 00:41:31', '2023-01-03 00:41:31'),
(24, 'Trường mẫu giáo An Quang', 'Trường mẫu giáo An Quang', '+84 944717478', 'mganquang', 'mganquang@gmail.com', 1, NULL, '$2y$10$ry8yVMuU5GugSYcKiefN.OaCMXhuIuXLJsdf6FlA1Kd7pe78zTlpS', NULL, '2023-01-03 00:42:24', '2023-01-03 00:42:24'),
(25, 'Trường mẫu giáo An Hưng', 'Trường mẫu giáo An Hưng', '+84 1684936920', 'mganhung', 'mganhung@pgdanlao.edu.vn', 1, NULL, '$2y$10$CBnRmN5kun0V5SNi4AFkSeUHTlOjqkcQJHYxo5S3bUEBqtXRQd1nK', NULL, '2023-01-03 00:43:03', '2023-01-03 00:43:03'),
(26, 'Nữ PGD', 'Nữ PGD', '+84 363459296', 'nupgd', 'ngocnupgd@gmail.com', 1, NULL, '$2y$10$vz.iAW4MKad4J/yfGMRo3.SvlY7I.4GXF/zORiNsHbH/RjMrCydbC', NULL, '2023-01-03 00:47:57', '2023-01-03 00:47:57'),
(27, 'Hiệu trưởng PTDTBT Đinh Ruối', 'Hiệu trưởng PTDTBT Đinh Ruối', NULL, 'htptdtbtdinhruoi', 'htptdtbtdinhruoi@pgdanlao.edu.vn', 1, NULL, '$2y$10$OWf2C4mpHGhf9AJ2ZOaN2OqnlZmYJ2hLfON4a4w4FnjShZNErkXiy', NULL, '2023-01-03 00:49:03', '2023-01-03 00:49:03'),
(28, 'Đình Luyện', 'Đình Luyện', '+84 2563506345', 'luyenpgd', 'luyenvd@yahoo.com.vn', 1, NULL, '$2y$10$QYd.UKyUlrOefGvTYQeSB.WrR6wtiZEdnSk/z7iA8Q8RGi/akOCrS', NULL, '2023-01-03 00:49:55', '2023-01-03 00:49:55'),
(29, 'Bích Lộc', 'Bích Lộc', NULL, 'locpgd', 'bichlocthcsat@yahoo.com.vn', 1, NULL, '$2y$10$SO1j.7JG7XIrE5/ufhwxCOwjPrvxPMTq545xuvGG0ovh6aBLxVcx.', NULL, '2023-01-03 19:43:46', '2023-01-03 19:43:46'),
(30, 'Chừng', 'Chừng', NULL, 'chungpgd', 'vanchungat@yahoo.com.vn', 1, NULL, '$2y$10$VzyoJZ80fUoMqS8ScU/rSuk0oTP0U1OTRrbafv3oI4Bc/4QIpX3K2', NULL, '2023-01-03 19:44:23', '2023-01-03 19:44:23'),
(31, 'Ngọc Mến', 'Ngọc Mến', NULL, 'menpgd', 'ngocmen.aval@gmail.com', 1, NULL, '$2y$10$tZO22Nt5doBmAjWGdEBsDeOWurRsaLZlsvyLmhO4QdnFqTNJqMAvy', NULL, '2023-01-03 19:45:01', '2023-01-03 19:45:01'),
(32, 'ThànhPGD', 'ThànhPGD', NULL, 'thanhpgd', 'lethanhpgdanlao@gmail.com', 1, NULL, '$2y$10$9bDXVofO0hgk5u0dHjvWb.wS/9NJuzqOQluya.WowlVQpnF2XCWJC', NULL, '2023-01-03 19:45:34', '2023-01-03 19:45:34'),
(33, 'Lan MN', 'Lan MN', '+84 969950581', 'lanmn', 'lanpgdanlao@gmail.com', 1, NULL, '$2y$10$WIC9BpoKV.ZAadPX0W6n.eSY.B91mTsYzhiR3BRH64PABXY3b5NmS', NULL, '2023-01-03 19:46:28', '2023-01-03 19:46:28'),
(34, 'phiếu', 'phiếu', NULL, 'phieual', 'phieu_anlao@yahoo.com.vn', 1, NULL, '$2y$10$BJKoP7xrCLC5eL2vFKtY1.I.Yk/1JkDZ.K6AgS2h.8ATR6QnNptzK', NULL, '2023-01-03 19:47:34', '2023-01-03 19:47:34'),
(35, 'Trường THCS An Hòa', 'Trường THCS An Hòa', NULL, 'thcsanhoa', 'thcsanhoa@pgdanlao.edu.vn', 1, NULL, '$2y$10$I0ZNrDnERxHxxKH.SJvgP.Q7kgfnjhX6HNrQdduXuT5LAsHxWb.xi', NULL, '2023-01-03 19:48:17', '2023-01-03 19:48:17'),
(36, 'THCS An Tân', 'THCS An Tân', '+84 562878488', 'thcsantan', 'thcsantan@pgdanlao.edu.vn', 1, NULL, '$2y$10$ug09Or/UgYoz1ZftClEtmeVeL3eHuif/VFezgzf62MspEbM8Vb4ny', NULL, '2023-01-03 19:48:45', '2023-01-03 19:49:36'),
(37, 'Trường PTDTBT Đinh Ruối', 'Trường PTDTBT Đinh Ruối', NULL, 'ptdtbtdinhruoi', 'ptdtbtdinhruoi@pgdanlao.edu.vn', 1, NULL, '$2y$10$8tvEx1VFygbwzpssqzbzi.iVAvOnpRssyvHHcurbnEq7bhp5pAjwK', NULL, '2023-01-03 19:49:20', '2023-01-03 19:49:20'),
(38, 'Trường Tiểu học An Vinh', 'Trường Tiểu học An Vinh', NULL, 'thanvinh', 'thanvinh@pgdanlao.edu.vn', 1, NULL, '$2y$10$g08sKJzCR2ociqGbOz7SXuJelGrKgjH9SCku2iyt/pJeiggmoUKA.', NULL, '2023-01-03 19:50:25', '2023-01-03 19:50:25'),
(39, 'Trường Tiểu học An Toàn', 'Trường Tiểu học An Toàn', '+84 1635559596', 'thantoan', 'thantoan@pgdanlao.edu.vn', 1, NULL, '$2y$10$29hbgCWGsxTraPheBrMuaeL1KxIVYWrKOPjZYmMXU3thgNE9MCyxe', NULL, '2023-01-03 19:50:57', '2023-01-03 19:50:57'),
(40, 'Trường Tiểu học An Nghĩa', 'Trường Tiểu học An Nghĩa', NULL, 'thannghia', 'thannghia@pgdanlao.edu.vn', 1, NULL, '$2y$10$X3mVKtmwDTMdvKk32yMk9OEY7wvpO8xAL0HfjKzqAcc3pMvSHEyvK', NULL, '2023-01-03 19:51:22', '2023-01-03 19:51:22'),
(41, 'thanquang', 'thanquang', NULL, 'thanquang', 'thanquang@pgdanlao.edu.vn', 1, NULL, '$2y$10$9uH7CVUJadbRtdGfAJaRZOXA4/IQTIXqC8xqzgGIoJTC3AwNa4gse', NULL, '2023-01-03 19:52:11', '2023-01-03 19:52:11'),
(42, 'Trường Tiểu học An Dũng', 'Trường Tiểu học An Dũng', NULL, 'thandung', 'thandung@pgdanlao.edu.vn', 1, NULL, '$2y$10$ay5AnmMUf2tVRMqdA3dnseTbnzITkZutEIA246jIer4spkKCuatmO', NULL, '2023-01-03 19:52:41', '2023-01-03 19:52:41'),
(43, 'Trường Tiểu học An Hưng', 'Trường Tiểu học An Hưng', '+84 984180421', 'thanhung', 'thanhung@pgdanlao.edu.vn', 1, NULL, '$2y$10$Un6M4o7Fk4a7OoIXP6VbZ..IbERmYyA3R1JCGXZL/B6J0adZyTlnK', NULL, '2023-01-03 19:53:22', '2023-01-03 19:53:22'),
(44, 'Trường Tiểu học số 2 An Hòa', 'Trường Tiểu học số 2 An Hòa', NULL, 'thanhoa2', 'anhoa2al@gmail.com', 1, NULL, '$2y$10$85UpIXdWqA9xPANdgpFEXeUCiBhvQb8fOyQfjyVMJj3F1KwP.4VhW', NULL, '2023-01-03 19:53:58', '2023-01-03 19:53:58'),
(45, 'Trường Tiểu học An Tân', 'Trường Tiểu học An Tân', NULL, 'thantan', 'thantan@pgdanlao.edu.vn', 1, NULL, '$2y$10$af6uSM5BFYwhVmmK9x2b/OgihSoNMq8T0l5TUhfKvS4BeR18qEU7W', NULL, '2023-01-03 19:54:27', '2023-01-03 19:54:27'),
(46, 'Trường Tiểu học Thị trấn', 'Trường Tiểu học Thị trấn', NULL, 'ththitran', 'ththitran@pgdanlao.edu.vn', 1, NULL, '$2y$10$0B3oXDCqjeoHV1TfhnpuO.GMXnCJd7.oWmM4wAzjvpAA26bmGYpqK', NULL, '2023-01-03 19:55:02', '2023-01-03 19:55:02'),
(47, 'TH An Trung', 'TH An Trung', '+84 563875301', 'thantrung', 'thantrung@pgdanlao.edu.vn', 1, NULL, '$2y$10$zWOvWHt4wJyZHJwfsn/0puVnHOmYSVNo1jDvr50lijj4mEeJlcZ/S', NULL, '2023-01-03 19:55:36', '2023-01-03 19:55:36'),
(48, 'Văn Thư PGD', 'Văn Thư PGD', NULL, 'vanthu', 'vanthu@gmail.com', 1, NULL, '$2y$10$9mwU0QRXsJGumM5EZkwfCO.8LvClbnSspnxNLOQdkoi83hmACuMny', NULL, '2023-01-03 19:56:49', '2023-01-03 19:56:49');

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
-- Chỉ mục cho bảng `table_log_setting`
--
ALTER TABLE `table_log_setting`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `congvan`
--
ALTER TABLE `congvan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `filebaocao`
--
ALTER TABLE `filebaocao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `filecongvan`
--
ALTER TABLE `filecongvan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `filephanhoibaocao`
--
ALTER TABLE `filephanhoibaocao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `nguoinhanbaocao`
--
ALTER TABLE `nguoinhanbaocao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `nguoinhancongvan`
--
ALTER TABLE `nguoinhancongvan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phanhoicongvan`
--
ALTER TABLE `phanhoicongvan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phongbans`
--
ALTER TABLE `phongbans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phongban_user`
--
ALTER TABLE `phongban_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `table_log_setting`
--
ALTER TABLE `table_log_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
