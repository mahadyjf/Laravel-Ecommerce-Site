-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 04:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-com`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$htPOLGhbz84rbRbdvxDNiubQJG.NC4XcCY7gNH/fhxByc0VpKeIN2', '2022-02-22 08:23:36', '2022-02-22 10:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wordpress', '1652598864.png', 1, 1, '2022-03-09 08:09:18', '2022-05-15 01:14:24'),
(6, 'HTML', '1652598878.png', 1, 1, '2022-05-15 01:14:38', '2022-05-15 01:14:38'),
(7, 'CSS', '1652598889.png', 1, 1, '2022-05-15 01:14:49', '2022-05-15 01:14:49'),
(8, 'JAVA', '1652598902.png', 1, 1, '2022-05-15 01:15:02', '2022-05-15 01:15:02'),
(9, 'Jquery', '1652598933.png', 1, 1, '2022-05-15 01:15:33', '2022-05-15 01:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('Reg','Not-Reg') NOT NULL,
  `qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_type`, `qty`, `product_id`, `product_attr_id`, `added_on`) VALUES
(4, 15, 'Reg', 1, 1, 1, '2022-05-31 01:53:29'),
(5, 15, 'Reg', 1, 4, 5, '2022-05-31 01:53:32'),
(6, 15, 'Reg', 1, 4, 5, '2022-05-31 02:08:13'),
(7, 14, 'Reg', 1, 4, 5, '2022-05-31 02:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `category_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home` int(11) NOT NULL,
  `status` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `parent_category_id`, `category_img`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Sports', 'sports', 0, '1652505752.jpg', 1, 1, '2022-02-23 06:59:20', '2022-05-23 10:21:14'),
(8, 'Kids', 'kids', 4, '1652505789.jpg', 1, 1, '2022-02-23 07:51:53', '2022-05-23 10:21:00'),
(15, 'Bags', 'bags', 16, '1652505835.jpg', 1, 1, '2022-05-13 23:23:55', '2022-05-26 05:04:01'),
(16, 'Women', 'women', 0, '1652505929.jpg', 1, 1, '2022-05-13 23:25:29', '2022-05-26 05:03:48'),
(17, 'Men', 'Men', 0, NULL, 1, 1, '2022-05-26 05:01:03', '2022-05-26 05:03:24'),
(18, 'Furniture', 'Furniture', 0, NULL, 1, 1, '2022-05-26 05:02:09', '2022-05-26 05:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 1, '2022-02-24 05:49:48', '2022-03-19 07:30:36'),
(3, 'Blue', 1, '2022-02-24 05:50:44', '2022-02-24 05:50:48'),
(4, 'Green', 1, '2022-02-24 05:51:04', '2022-02-24 05:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Value','Per') COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amt` int(11) NOT NULL,
  `is_one_time` int(11) NOT NULL,
  `status` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `type`, `min_order_amt`, `is_one_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jan', 'jan2022', '121', 'Value', 0, 0, 1, '2022-02-23 10:22:37', '2022-02-24 03:55:14'),
(3, 'Fab', 'fab2022', '140', 'Value', 0, 0, 1, '2022-02-23 10:32:14', '2022-02-24 03:55:12'),
(4, 'New Coupon', 'marce18', '100', 'Per', 0, 1, 1, '2022-03-19 06:55:08', '2022-03-19 06:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(255) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `is_verify` int(11) NOT NULL,
  `is_forgot_password` int(11) NOT NULL,
  `rand_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `address`, `city`, `state`, `zip`, `company`, `gstin`, `status`, `is_verify`, `is_forgot_password`, `rand_id`, `created_at`, `updated_at`) VALUES
(1, 'Mahady', 'mahady@gmail.com', 21365468, 'mahady', 'Dhaka, Badda, B-039', 'Dhaka', 'badda', '3900', 'mahady\'s idea', 'ffff', 1, 0, 0, '', '2022-03-27 10:37:31', '2022-03-27 04:51:38'),
(9, 'HTML', 'qwert4@gmail.com', 214566596, 'eyJpdiI6Iko4Q1ViQmw0cEh4cE1FL3A4S290YVE9PSIsInZhbHVlIjoib01UYlpsWnA2c0srQmZNYkcxYUhVQT09IiwibWFjIjoiMjQ5ODQ4N2I3MmI1OTIzZmFlNjQyNGYyYzc3ZTNkMGVlMzAyYmZiZThjNWUwYjk5NzFmOTVjMTI5MzFiYzQ4NyIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '', '2022-05-26 21:12:33', '2022-05-26 21:12:33'),
(10, 'CSS', 'qwert2@gmail.com', 214566596, 'eyJpdiI6Imp0d2daOThSNnBmWVBSeDFpNTIxV1E9PSIsInZhbHVlIjoieVc0Z2p0dlo0VkFydllIVmtpZE9Gdz09IiwibWFjIjoiZTBmNTMyNGFjMWU3N2FmMGFkM2E4MjU2MjMxZDM1MDI5OTg1MDMzZThlOGVhNmU3ZjY5N2FiMDFmNTk0MTkyMyIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '2022-05-27 22:23:11', '2022-05-27 22:23:11'),
(14, 'Fahim', 'mahadyj5@gmail.com', 214566596, 'eyJpdiI6IlVGUHJUOURxMXZ0TG5ta3NvSzRPUUE9PSIsInZhbHVlIjoiRVFERUh6ZWZndE5oM0FQT0VvWXJHQT09IiwibWFjIjoiZDk0MjU0MWE2YmRkMzZmMTQzYWNkZTEzYmUzZDU4NmI0YzJiNTI1NTg1MmQ3NDZhYWM1ZjFjM2IxZWE3ZWYwYSIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '', '2022-05-29 20:35:56', '2022-05-29 20:35:56'),
(15, 'Jaman', 'mahadyjf@gmail.com', 1876748718, 'eyJpdiI6IkNTb3Vaa2RRVHFDL1M0c2xGSGlMQ0E9PSIsInZhbHVlIjoiRHNjYjc2bGI3T1dXbU93RlVCZVdMQT09IiwibWFjIjoiYTI4ZmRjOWY5ZjlhNjI0N2QwMDZhZTQ5OWUyY2MyYmZjN2EwYTNiYTI2NDk2NTI4NTFjZDRmN2FiNmQxMWMwNSIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '', '2022-05-29 21:48:54', '2022-05-29 21:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `image`, `btn_text`, `btn_link`, `status`, `created_at`, `updated_at`) VALUES
(1, '1653296299.jpg', 'Shop Now', 'http://google.com', 1, '2022-05-23 02:58:19', '2022-05-23 02:58:53'),
(2, '1653296749.jpg', 'Shop Now', 'http://google.com', 1, '2022-05-23 02:59:55', '2022-05-23 03:05:53'),
(3, '1653296416.jpg', 'Shop Now', 'http://google.com', 1, '2022-05-23 03:00:16', '2022-05-28 10:24:24'),
(4, '1653297640.jpg', 'SHOP NOW', 'http://google.com', 1, '2022-05-23 03:06:15', '2022-05-23 03:20:45'),
(5, '1653296801.jpg', 'SHOP NOW', 'http://google.com', 1, '2022-05-23 03:06:41', '2022-05-23 03:20:45');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_02_22_071234_create_admins_table', 1),
(3, '2022_02_22_152054_create_categories_table', 2),
(4, '2022_02_23_154223_create_coupons_table', 3),
(5, '2022_02_24_101836_create_sizes_table', 4),
(6, '2022_02_24_113422_create_colors_table', 5),
(7, '2022_02_24_134127_create_products_table', 6),
(8, '2022_03_09_134004_create_brands_table', 7),
(9, '2022_03_19_141741_create_taxes_table', 8),
(11, '2022_03_27_100912_create_customers_table', 9),
(13, '2022_05_23_060518_create_home_banners_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'photo',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technical_specification` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uses` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `is_promo` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `is_discounted` int(11) DEFAULT NULL,
  `is_tranding` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `image`, `slug`, `brand_id`, `model`, `short_desc`, `desc`, `keywords`, `technical_specification`, `uses`, `warranty`, `lead_time`, `tax_id`, `is_promo`, `is_featured`, `is_discounted`, `is_tranding`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'test', '1652597613.png', 'test', 1, 'test', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their</p>', 'test', 'test', 'test', 'test', '2-3', 1, 1, 1, 0, 1, 1, '2022-03-09 09:53:07', '2022-05-28 10:21:26'),
(3, 17, 'Polo T-Shirt', '1652510547.png', 'polo_t-shirt', 1, 'polo', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their</p>', NULL, NULL, 'polo', 'polo', '2-3', 1, 0, 1, 0, 0, 1, '2022-05-14 00:42:27', '2022-05-26 05:04:51'),
(4, 3, 'Premium quality Cotton', '1653390115.jpg', 'cotton_polo_t_shirt', 6, 'Polo T-shirt', '<ul>\r\n	<li>Product Type: Polo</li>\r\n	<li>Main Material: Cotton</li>\r\n	<li>Soft and smooth fabric</li>\r\n</ul>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<ul>\r\n	<li>including versions of Lorem Ipsum.</li>\r\n	<li>including versions of Lorem Ipsum.</li>\r\n	<li>including versions of Lorem Ipsum.</li>\r\n	<li>including versions of Lorem Ipsum.</li>\r\n</ul>', 'Cotton Polo T-shirt', NULL, '1 years', 'N/A', '3-4 Days', 1, 0, 1, 0, 1, 1, '2022-05-24 05:01:55', '2022-05-26 05:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `products_attr`
--

CREATE TABLE `products_attr` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `mrp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `attr_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_attr`
--

INSERT INTO `products_attr` (`id`, `products_id`, `sku`, `mrp`, `price`, `size_id`, `color_id`, `qty`, `attr_image`) VALUES
(1, 1, 'test', 333, 222, 2, 1, 33, '317508365.jpg'),
(3, 1, 'test', 33, 33, 3, 1, 33, '890869837.png'),
(4, 3, 'polo', 3333, 3333, NULL, NULL, 55, NULL),
(5, 4, 'Premium', 1000, 900, 2, 4, 50, '835370532.jpg'),
(6, 4, 'Premium2', 1000, 900, 3, 3, 50, '121551499.jpg'),
(7, 4, 'Premium3', 1000, 900, 3, 4, 50, '858344741.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_img`
--

CREATE TABLE `products_img` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_img`
--

INSERT INTO `products_img` (`id`, `products_id`, `image`) VALUES
(1, 1, '539244098.png'),
(3, 3, '178137019.png'),
(4, 4, '840607631.jpg'),
(5, 4, '154662263.jpg'),
(6, 4, '432289333.jpg'),
(7, 4, '634942710.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(2, 'XL', 1, '2022-02-24 04:38:46', '2022-02-24 05:23:34'),
(3, 'XXL', 1, '2022-02-24 04:38:52', '2022-02-24 05:23:40'),
(5, 'M', 1, '2022-02-24 04:39:12', '2022-02-24 05:23:42'),
(6, 'L', 1, '2022-02-24 04:39:20', '2022-02-24 05:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `taxs`
--

CREATE TABLE `taxs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxs`
--

INSERT INTO `taxs` (`id`, `tax_value`, `tax_des`, `status`, `created_at`, `updated_at`) VALUES
(1, '12', 'GST-12%', 1, '2022-03-19 09:41:28', '2022-03-19 09:57:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attr`
--
ALTER TABLE `products_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_img`
--
ALTER TABLE `products_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxs`
--
ALTER TABLE `taxs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_attr`
--
ALTER TABLE `products_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products_img`
--
ALTER TABLE `products_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taxs`
--
ALTER TABLE `taxs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
