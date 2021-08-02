-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 02, 2021 lúc 07:24 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cachecategories', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":1:{s:8:\"\0*\0items\";a:5:{i:0;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Dell\";s:4:\"slug\";s:17:\"<p>Hello Dell</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-25 13:11:47\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Dell\";s:4:\"slug\";s:17:\"<p>Hello Dell</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-25 13:11:47\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:2;s:4:\"name\";s:4:\"Acer\";s:4:\"slug\";s:17:\"<p>Hello Acer</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-25 13:13:30\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:2;s:4:\"name\";s:4:\"Acer\";s:4:\"slug\";s:17:\"<p>Hello Acer</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-25 13:13:30\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:3;s:4:\"name\";s:4:\"Asus\";s:4:\"slug\";s:17:\"<p>Hello Asus</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";s:19:\"2021-06-12 10:34:04\";s:10:\"updated_at\";s:19:\"2021-06-25 13:13:53\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:3;s:4:\"name\";s:4:\"Asus\";s:4:\"slug\";s:17:\"<p>Hello Asus</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";s:19:\"2021-06-12 10:34:04\";s:10:\"updated_at\";s:19:\"2021-06-25 13:13:53\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:4;s:4:\"name\";s:7:\"MacBook\";s:4:\"slug\";s:20:\"<p>Hello MacBook</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";s:19:\"2021-06-12 10:35:36\";s:10:\"updated_at\";s:19:\"2021-06-25 13:14:18\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:4;s:4:\"name\";s:7:\"MacBook\";s:4:\"slug\";s:20:\"<p>Hello MacBook</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";s:19:\"2021-06-12 10:35:36\";s:10:\"updated_at\";s:19:\"2021-06-25 13:14:18\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:5;s:4:\"name\";s:2:\"Hp\";s:4:\"slug\";s:15:\"<p>Hello Hp</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";s:19:\"2021-06-12 13:24:31\";s:10:\"updated_at\";s:19:\"2021-06-25 13:15:07\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:5;s:4:\"name\";s:2:\"Hp\";s:4:\"slug\";s:15:\"<p>Hello Hp</p>\";s:9:\"parent_id\";i:1;s:5:\"depth\";i:1;s:10:\"created_at\";s:19:\"2021-06-12 13:24:31\";s:10:\"updated_at\";s:19:\"2021-06-25 13:15:07\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}', 1627738750);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `depth`, `created_at`, `updated_at`) VALUES
(1, 'Dell', '<p>Hello Dell</p>', 1, 1, NULL, '2021-06-25 06:11:47'),
(2, 'Acer', '<p>Hello Acer</p>', 1, 1, NULL, '2021-06-25 06:13:30'),
(3, 'Asus', '<p>Hello Asus</p>', 1, 1, '2021-06-12 03:34:04', '2021-06-25 06:13:53'),
(4, 'MacBook', '<p>Hello MacBook</p>', 1, 1, '2021-06-12 03:35:36', '2021-06-25 06:14:18'),
(5, 'Hp', '<p>Hello Hp</p>', 1, 1, '2021-06-12 06:24:31', '2021-06-25 06:15:07');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `source` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `disk`, `path`, `product_id`, `source`, `created_at`, `updated_at`) VALUES
(1, 'may-tinh-asus.jpg', 'public', 'images/may-tinh-asus.jpg', 15, NULL, '2021-06-14 07:25:54', '2021-06-14 07:25:54'),
(2, 'may-tinh-acer.jpg', 'public', 'images/may-tinh-acer.jpg', 16, NULL, '2021-06-15 23:10:30', '2021-06-15 23:10:30'),
(3, 'may-tinh-acer.jpg', 'public', 'images/may-tinh-acer.jpg', 12, NULL, '2021-06-15 23:46:27', '2021-06-15 23:46:27'),
(5, 'may-tinh-dell.jpg', 'public', 'images/may-tinh-dell.jpg', 13, NULL, '2021-06-18 02:58:54', '2021-06-18 02:58:54'),
(6, 'Macjpg.jpg', 'public', 'images/Macjpg.jpg', 17, NULL, '2021-06-19 08:24:27', '2021-06-19 08:24:27'),
(7, 'sam-sung-s8.jpg', 'public', 'images/sam-sung-s8.jpg', 18, NULL, '2021-06-21 07:24:22', '2021-06-21 07:24:22'),
(11, 'dell xps.jpg', 'public', 'images/dell xps.jpg', 22, NULL, '2021-06-25 06:26:06', '2021-06-25 06:26:06'),
(12, 'may-tinh-acer.jpg', 'public', 'images/may-tinh-acer.jpg', 23, NULL, '2021-06-25 07:44:14', '2021-06-25 07:44:14'),
(13, 'cong_nghe_1.jpg', 'public', 'images/cong_nghe_1.jpg', 24, NULL, '2021-06-29 06:34:41', '2021-06-29 06:34:41'),
(14, 'dell xps.jpg', 'public', 'images/dell xps.jpg', 25, NULL, '2021-07-10 05:32:37', '2021-07-10 05:42:31'),
(15, 'macbook_air.jpg', 'public', 'images/macbook_air.jpg', 26, NULL, '2021-07-12 07:35:23', '2021-07-12 07:35:23'),
(16, 'cong_nghe_1.jpg', 'public', 'images/cong_nghe_1.jpg', 27, NULL, '2021-07-18 01:52:55', '2021-07-18 01:52:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_rating`
--

CREATE TABLE `images_rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images_rating`
--

INSERT INTO `images_rating` (`id`, `rating_id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, 8, 'cong_nghe_1.jpg', 'images_rating/cong_nghe_1.jpg', '2021-07-16 23:20:52', '2021-07-16 23:20:52'),
(2, 8, 'cong_nghe_2.jpg', 'images_rating/cong_nghe_2.jpg', '2021-07-16 23:20:52', '2021-07-16 23:20:52'),
(3, 8, 'cong_nghe_3.jpg', 'images_rating/cong_nghe_3.jpg', '2021-07-16 23:20:52', '2021-07-16 23:20:52'),
(4, 9, 'sam-sung-s8.jpg', 'images_rating/sam-sung-s8.jpg', '2021-07-17 06:51:52', '2021-07-17 06:51:52'),
(5, 9, 'yale.jpg', 'images_rating/yale.jpg', '2021-07-17 06:51:52', '2021-07-17 06:51:52'),
(6, 10, 'connan.jpg', 'images_rating/connan.jpg', '2021-07-17 07:04:43', '2021-07-17 07:04:43'),
(7, 10, 'cong_nghe_1.jpg', 'images_rating/cong_nghe_1.jpg', '2021-07-17 07:04:43', '2021-07-17 07:04:43'),
(8, 11, 'dell xps.jpg', 'images_rating/dell xps.jpg', '2021-07-17 07:07:10', '2021-07-17 07:07:10'),
(9, 11, 'dlcovid.jpg', 'images_rating/dlcovid.jpg', '2021-07-17 07:07:10', '2021-07-17 07:07:10'),
(10, 12, 'Macjpg.jpg', 'images_rating/Macjpg.jpg', '2021-07-18 01:48:59', '2021-07-18 01:48:59'),
(11, 12, 'may-tinh-acer.jpg', 'images_rating/may-tinh-acer.jpg', '2021-07-18 01:48:59', '2021-07-18 01:48:59');

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
(7, '2021_05_30_132942_create_products_table', 2),
(8, '2021_05_30_133129_create_images_table', 2),
(9, '2021_05_30_133138_create_categories_table', 2),
(10, '2021_06_03_131729_user_infor_table', 3),
(11, '2021_06_03_133544_create_userinfors_table', 4),
(12, '2021_06_03_150548_create_orders_table', 4),
(16, '2021_06_03_150613_create_order_product_table', 5),
(23, '2014_10_12_200000_add_two_factor_columns_to_users_table', 6),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 6),
(25, '2021_06_07_123638_create_sessions_table', 6),
(26, '2021_06_14_141106_add_disk_column_images_table', 7),
(27, '2021_06_19_083544_add_avtar_user', 8),
(28, '2021_06_24_143404_create_cache_table', 9),
(29, '2021_07_04_063451_add_talbe_rating', 10),
(30, '2021_07_04_064214_add_column_talbe_rating', 11),
(31, '2021_07_04_065802_create_ratings_table', 12),
(32, '2021_07_06_082711_add_column_users', 13),
(33, '2021_07_06_135239_create_add_order', 14),
(34, '2021_07_12_141743_add_table_notification', 15),
(35, '2021_07_17_060736_add_table_images_rating', 16),
(36, '2021_07_17_155817_add_table_statistical', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(2, 22, 'đã đánh giá một sản phẩm', '2021-07-12 08:46:51', '2021-07-12 08:46:51'),
(3, 1, 'đã đặt hàng mới một sản phẩm mau vào xử lí nhanh !!', '2021-07-12 08:51:47', '2021-07-12 08:51:47'),
(4, 1, 'đã đánh giá một sản phẩm', '2021-07-12 08:53:06', '2021-07-12 08:53:06'),
(5, 22, 'đã đánh giá một sản phẩm', '2021-07-16 09:45:26', '2021-07-16 09:45:26'),
(6, 5, 'đã đánh giá một sản phẩm', '2021-07-16 23:20:52', '2021-07-16 23:20:52'),
(7, 5, 'đã đánh giá một sản phẩm', '2021-07-17 06:51:52', '2021-07-17 06:51:52'),
(8, 5, 'đã đánh giá một sản phẩm', '2021-07-17 07:04:43', '2021-07-17 07:04:43'),
(9, 22, 'đã đánh giá một sản phẩm', '2021-07-17 07:07:10', '2021-07-17 07:07:10'),
(10, 2, 'đã đặt hàng mới một sản phẩm mau vào xử lí nhanh !!', '2021-07-18 01:47:35', '2021-07-18 01:47:35'),
(11, 2, 'đã đánh giá một sản phẩm', '2021-07-18 01:48:59', '2021-07-18 01:48:59'),
(12, 22, 'đã tạo mới một sản phẩm', '2021-07-18 01:52:55', '2021-07-18 01:52:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT '\'\\\'Không có ghi chú\\\'\'',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `total`, `created_at`, `updated_at`, `phone`, `product_id`, `user_id`, `qty`, `status`, `content`, `address`) VALUES
(3, 'Trần Đình Nghĩa', 29, '2021-07-06 07:59:59', '2021-07-07 09:06:32', '904373670', 22, 22, 3, 4, 'Không có ghi chú', 'Đa Hội-Châu Khê-Từ Sơn-Bắc Ninh'),
(4, 'Trần Đình Nghĩa', 7000000, '2021-07-07 09:04:52', '2021-07-07 09:06:26', '904373670', 23, 22, 1, 4, 'Mong Shop Giao nhanh hộ!!', 'Tokyo'),
(5, 'Bùi Xuân Xép', 15000000, '2021-07-07 09:13:11', '2021-07-17 10:20:30', '9035249', 13, 7, 1, 4, 'Shop giao hàng vào ngày bao nhiêu ạ', 'Tân Dân - Nhật Bản'),
(7, 'Trần Đình Nghĩa', 16800000, '2021-07-08 08:23:43', '2021-07-17 19:29:31', '0904373670', 15, 22, 2, 5, NULL, 'Tokyo'),
(8, 'Không Có Tên', 25000000, '2021-07-12 08:51:47', '2021-07-17 21:14:53', '0903486353', 26, 1, 1, 4, NULL, 'Tokyo-Nhật Bản'),
(9, 'Trần Đình Nghĩa', 25000000, '2021-07-18 01:47:35', '2021-07-18 01:58:08', '0904373670', 26, 2, 1, 3, 'Ghi chú', 'Bắc Ninh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_price` int(11) NOT NULL DEFAULT 1,
  `price_sales` int(11) NOT NULL DEFAULT 1,
  `discount_persent` int(11) NOT NULL DEFAULT 1,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_more` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `origin_price`, `price_sales`, `discount_persent`, `content`, `content_more`, `user_id`, `category_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'Máy tính Acer', 'may-tinh-acer', 10000000, 7000000, 1, NULL, NULL, 22, 2, 1, '2021-06-12 03:36:42', '2021-06-12 03:36:42', NULL),
(13, 'Máy tính Dell', 'may-tinh-dell', 20000000, 15000000, 1, NULL, NULL, 22, 1, 0, '2021-06-12 06:15:03', '2021-06-25 06:16:14', NULL),
(15, 'Máy tính Asus', 'may-tinh-asus', 10000000, 8400000, 1, NULL, NULL, 22, 3, 1, '2021-06-14 07:25:54', '2021-06-25 06:16:45', NULL),
(16, 'Máy tính Acer', 'may-tinh-acer', 20000000, 15000000, 1, NULL, NULL, 22, 2, 2, '2021-06-15 23:10:30', '2021-06-25 06:16:31', NULL),
(17, 'MacBook', 'macbook', 29000000, 25000000, 1, '<p>Mac Book dùng rất là ok</p>', NULL, 10, 4, 1, '2021-06-19 08:24:27', '2021-06-19 08:24:27', NULL),
(22, 'Dell XPS', 'dell-xps', 20000000, 15000000, 1, NULL, NULL, 1, 1, 0, '2021-06-25 06:26:06', '2021-07-18 01:55:17', NULL),
(23, 'Acer 2000', 'acer-2000', 10000000, 7000000, 1, NULL, NULL, 1, 2, 1, '2021-06-25 07:44:14', '2021-06-25 08:29:22', NULL),
(24, 'Trần Đình Nghĩa', 'tran-dinh-nghia', 20000000, 15000000, 1, NULL, NULL, 1, 1, 0, '2021-06-29 06:34:41', '2021-07-18 01:55:17', NULL),
(25, 'Acer API PRO', 'acer-api-pro', 20000000, 15000000, 1, NULL, '{\"Hệ điều hành\":\"Window\",\"RAM\":\"4GB\"}', 22, 2, 0, '2021-07-10 05:32:37', '2021-07-10 05:42:31', NULL),
(26, 'MacBook Air 2000', 'macbook-air-2000', 29000000, 25000000, 1, NULL, '{\"Hệ điều hành\":\"MacBook và Windows\",\"RAM\":\"16GB\",\"Cân\":\"10kg\"}', 22, 4, 0, '2021-07-12 07:35:23', '2021-07-17 19:09:59', NULL),
(27, 'MacBook PRO 2000', 'macbook-pro-2000', 20000000, 15000000, 1, '<p>ádasdsa</p>', '{\"Hệ điều hành\":\"IOS\",\"RAM\":\"16GB\"}', 22, 4, 1, '2021-07-18 01:52:55', '2021-07-18 01:52:55', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `rating`, `content`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 'Sản phẩm tuyệt vời!!', 24, NULL, '2021-07-04 06:04:52', '2021-07-04 06:04:52'),
(2, 22, 1, 'Máy dùng cũng được :(((', 15, NULL, '2021-07-04 08:07:19', '2021-07-04 08:07:19'),
(3, 22, 5, 'Sản phẩm pơ con mẹ nó phệch', 24, NULL, '2021-07-11 07:54:20', '2021-07-11 07:54:20'),
(4, 22, 1, 'Sản phẩm này dùng cũng tạm ^-^~!', 23, NULL, '2021-07-11 07:57:15', '2021-07-11 07:57:15'),
(5, 22, 5, 'Hàng chất lượng cao.Sử dụng rất mượt và thích', 26, NULL, '2021-07-12 08:46:51', '2021-07-12 08:46:51'),
(6, 1, 5, 'Sản phẩm quá tuyệt vời', 26, NULL, '2021-07-12 08:53:06', '2021-07-12 08:53:06'),
(7, 22, 4, 'Hello', 12, 'images_rating/cong_nghe_2.jpg', '2021-07-16 09:45:26', '2021-07-16 09:45:26'),
(8, 5, 5, 'Sản phẩm tuyệt vời làm sao', 17, NULL, '2021-07-16 23:20:51', '2021-07-16 23:20:51'),
(9, 5, 5, 'Sản phẩm hơn cả mong đợi ^-^!!!', 26, NULL, '2021-07-17 06:51:52', '2021-07-17 06:51:52'),
(10, 5, 3, 'Sản phẩm cũng đc', 16, NULL, '2021-07-17 07:04:43', '2021-07-17 07:04:43'),
(11, 22, 2, 'Sản phẩm dùng tệ quá!!', 17, NULL, '2021-07-17 07:07:10', '2021-07-17 07:07:10'),
(12, 2, 3, 'Đánh giá', 22, NULL, '2021-07-18 01:48:58', '2021-07-18 01:48:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CietyYjMguhXHyrvZMTHmOcSKdrdbNkMY9Iujtjh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiemJnSExXZzRpdFlIVnNXbXp4SXZCYkNrYURXWE5hWmIwVng5OFpsSyI7czo1OiJsb2dpbiI7czoxMjoiTmdoaWFkaGRrMTIzIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Nob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6InVzZXJfaWQiO3M6MjoiMTUiO3M6OToidXNlcl9uYW1lIjtzOjE1OiJUcmFuIERpbmggTmdoaWEiO30=', 1624196726);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statisticals`
--

CREATE TABLE `statisticals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `sale` int(11) NOT NULL,
  `profit` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statisticals`
--

INSERT INTO `statisticals` (`id`, `order_date`, `sale`, `profit`, `quantity`, `total_order`, `created_at`, `updated_at`) VALUES
(1, '2021-07-08', 2000000, NULL, NULL, NULL, NULL, NULL),
(2, '2021-07-18', 40000000, NULL, NULL, NULL, '2021-07-17 10:30:44', '2021-07-17 21:14:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT 1,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `phone`, `address`, `role`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trần Đình Nghĩa', 'avtar-user/connan.jpg', NULL, 'Bac Ninh', 3, 'trandinhnghia1@gmail.com', NULL, '$2y$10$5E2O8513cJGcnKxAsYE/i.Fnvx6wg80RhzD1CXB1DDtYBn9dqXglq', NULL, NULL, NULL, NULL, '2021-06-19 08:12:11', NULL),
(2, 'Nghia2', NULL, NULL, 'Bac Ninh', 1, 'trandinhnghia2@gmail.com', NULL, '$2y$10$xWrXWOfsagXwgYUV3S7mOO.wUVhh6ikVEWtPNe0NUS27TxhbYaAQ6', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Nghia4', NULL, NULL, 'Bac Ninh', 1, 'trandinhnghia4@gmail.com', NULL, '$2y$10$bf.xDB0SQX/ZTeHUmKLPuuZMskSDMK9IVAat8dTsd6MtmWDxCmUDa', NULL, NULL, NULL, NULL, '2021-07-05 06:35:37', NULL),
(5, 'Nghia5', NULL, NULL, 'Bac Ninh', 1, 'trandinhnghia5@gmail.com', NULL, '$2y$10$dMfRAd7EaWdHjaPrMwZp/ucJpSa4tjxHsO2CjC.5jgkHwrNaEKZfy', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Nghia6', NULL, NULL, 'Bac Ninh', 1, 'trandinhnghia6@gmail.com', NULL, '$2y$10$kjxaoMy5UlHovAcHH7LO/urzrWeqaog7WXpXVDEZoYIzyD/yZdZsi', NULL, NULL, NULL, NULL, '2021-06-29 07:41:17', NULL),
(8, 'Nghia8', NULL, NULL, 'Bac Ninh', 1, 'trandinhnghia8@gmail.com', NULL, '$2y$10$UyUOBLRAc63DMG71d.GeZuAgRCca12YjwvfwA4ANoBOdfQ.M4ytDa', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Nghia9', NULL, NULL, 'Bac Ninh', 1, 'trandinhnghia9@gmail.com', NULL, '$2y$10$Y9x8O2DMHXYQDYZykF0p5evBeR94WWJnuG7fxNLAo0/QWZnQAYpoK', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Nghia10', 'avtar-user/6.jpg', NULL, 'Bac Ninh', 2, 'trandinhnghia10@gmail.com', NULL, '$2y$10$BD62erUXHU1WJgzbaEVYvuyzQesIjgn1xZiuc.8g8rfDdVRxPZVl.', NULL, NULL, NULL, NULL, '2021-06-19 08:21:52', NULL),
(22, 'Kirito', 'avtar-user/kirito.jpg', '123456789', 'Nhật Bản', 3, 'riot@rito.zingme', NULL, '$2y$10$oluoPtfU1gJiRxaszR17Vub8as4puo4H84GAq2avkZawaLRKCBWSy', NULL, NULL, NULL, '2021-06-09 02:22:26', '2021-06-21 09:11:52', NULL),
(26, 'Kirito', NULL, NULL, NULL, 1, 'kirito@gmail.com', NULL, '$2y$10$QEhqMfAUv9zJwKiFYUdqkOXTVh1Wpk/JsQLHzt8mmsHBf1erQgFFO', NULL, NULL, NULL, '2021-06-09 02:43:12', '2021-06-09 02:43:12', NULL),
(27, 'Asuna', NULL, NULL, NULL, 1, 'asuna@gmail.com', NULL, '$2y$10$NgMnEqQ1P0q5Sc4U02UAC.lRu2LSizTNpa3mTGNsuugWvTVai.dX2', NULL, NULL, NULL, '2021-06-09 03:02:22', '2021-06-09 03:02:22', NULL),
(29, 'Toán rời rạc', NULL, NULL, NULL, 1, 'trr@gmail.com', NULL, '$2y$10$mGa3UQklUzqY7G8BVTJcu.W9QyR97o1Q/1uiu2jpWBFEiGISMThV2', NULL, NULL, NULL, '2021-06-09 03:05:40', '2021-06-09 03:05:40', NULL),
(30, 'Trần Đình Nghĩa', NULL, NULL, NULL, 2, 'trandinhnghia123@gmail.com', NULL, '$2y$10$0Rt5zTIvfqAmf8XxhoHHEObsVA07Mcx09.b6q5/ixBdvGzhDsmNm2', NULL, NULL, NULL, '2021-06-09 05:54:14', '2021-06-22 02:32:22', NULL),
(31, 'Trần Thị Trang', NULL, NULL, NULL, 1, 'trang@gmail.com', NULL, '$2y$10$FN2RnMN0etGmJVpCxBbEH.dtG8rB2Dt78UtSieeeAPHFcG7PL/d3O', NULL, NULL, NULL, '2021-06-09 05:58:14', '2021-06-09 05:58:14', NULL),
(33, 'Nguyễn Thanh Liêm', NULL, NULL, NULL, 1, 'ntl@gmai.com', NULL, '$2y$10$S72fsdw5LsDiVByZ6vQ7fOOGFZQhFKwgTW1MOeY/PvJV1TdgNUtUa', NULL, NULL, NULL, '2021-06-21 07:57:07', '2021-06-21 07:57:07', NULL),
(35, 'Trần Đình Nghĩa', NULL, NULL, NULL, 1, 'tmd123@gmail.com', NULL, '$2y$10$ExkYmth8HVprvwqPerhjR./b/0Rlf/Hknc/Y1cpGY4BuxlRHdBWw6', NULL, NULL, NULL, '2021-06-21 08:44:41', '2021-06-21 08:44:41', NULL),
(36, 'Trần Đình Nghĩa', NULL, NULL, NULL, 1, 'tmd3@gmail.com', NULL, '$2y$10$lvgfrJ/55fHaMSO6778BUuJXmgQXJxhV7tm/tgqM1VTXRvk3ROLwq', NULL, NULL, NULL, '2021-06-21 08:48:28', '2021-06-21 08:48:28', NULL),
(39, 'Nghia Zolo', NULL, '111111', 'VietNammese', 1, 'zolo2@gmail.com', NULL, '$2y$10$87GrUtZ5ARlh/2PznW8BLOOAtGA8fb6StgEOW4JsqwPWiziPaO1Ka', NULL, NULL, NULL, '2021-06-21 09:00:50', '2021-06-21 09:00:50', NULL),
(43, 'Trần Đình Nghĩa', NULL, NULL, NULL, 2, 'trandinhnghia555@gmail.com', NULL, '$2y$10$rEZ/amHYbIx89zuqRAdPeuWfAJ1aX7UKBXTbGpTwx2R4vuL/WHSsy', NULL, NULL, NULL, '2021-06-26 05:08:07', '2021-06-26 05:08:07', NULL),
(45, 'Lạc Long Quân', NULL, NULL, NULL, 2, 'laclongquan@gmail.com', NULL, '$2y$10$XCylt/WzloafuN8iJT3JKej4crMJhwKeFsZVbs9ivKHLjNxP/bRBS', NULL, NULL, NULL, '2021-07-17 18:37:16', '2021-07-17 18:37:16', NULL),
(46, 'Toán rời rạc', NULL, NULL, NULL, 2, 'trandinhnghia7@gmail.com', NULL, '$2y$10$sfjR5ohrx6jtTV7EInvs6uispZ7h55FRCnXIG8rf1uYd9wbdqBRqi', NULL, NULL, NULL, '2021-07-18 01:56:12', '2021-07-18 01:56:12', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_infor`
--

CREATE TABLE `user_infor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_infor`
--

INSERT INTO `user_infor` (`id`, `address`, `phone`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Bac Ninh', '0904373670', 1, NULL, NULL),
(2, 'Bac Ninh', '0904373670', 2, NULL, NULL),
(4, 'Bac Ninh', '0904373670', 4, NULL, NULL),
(5, 'Bac Ninh', '0904373670', 5, NULL, NULL),
(6, 'Bac Ninh', '0904373670', 6, NULL, NULL),
(8, 'Bac Ninh', '0904373670', 8, NULL, NULL),
(9, 'Bac Ninh', '0904373670', 9, NULL, NULL),
(10, 'Bac Ninh', '0904373670', 10, NULL, NULL),
(11, 'JaPan', '113', 26, '2021-06-09 02:43:12', '2021-06-09 02:43:12'),
(12, 'JaPan', '112', 27, '2021-06-09 03:02:22', '2021-06-09 03:02:22'),
(13, 'HVNN', '456789', 29, '2021-06-09 03:05:40', '2021-06-09 03:05:40'),
(14, 'Tu Son', '0904373670', 30, '2021-06-09 05:54:14', '2021-06-09 05:54:14'),
(15, 'Tu Son', '111111', 31, '2021-06-09 05:58:14', '2021-06-09 05:58:14'),
(17, 'Thanh Hóa', '09035249', 33, '2021-06-21 07:57:07', '2021-06-21 07:57:07'),
(18, 'Tokyo', '0904373670', 22, '2021-06-21 08:15:25', '2021-06-21 09:18:50'),
(20, 'Viet Nam', '113112', 35, '2021-06-21 08:44:41', '2021-06-21 08:44:41'),
(21, 'Tu Son', '111111', 36, '2021-06-21 08:48:28', '2021-06-21 08:48:28'),
(23, 'VietNammese', '111111', 39, '2021-06-21 09:00:50', '2021-06-21 09:00:50'),
(27, 'Từ Sơn', '0904373670', 43, '2021-06-26 05:08:07', '2021-06-26 05:08:07'),
(28, 'Việt Nam', '123456789', 45, '2021-07-17 18:37:17', '2021-07-17 18:37:17'),
(29, 'America', '0904373670', 46, '2021-07-18 01:56:13', '2021-07-18 01:56:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images_rating`
--
ALTER TABLE `images_rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `statisticals`
--
ALTER TABLE `statisticals`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_infor`
--
ALTER TABLE `user_infor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `images_rating`
--
ALTER TABLE `images_rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `statisticals`
--
ALTER TABLE `statisticals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `user_infor`
--
ALTER TABLE `user_infor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
