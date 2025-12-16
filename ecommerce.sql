-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 07:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Drinkware', 'drinkware', NULL, '2025-11-19 09:24:45', '2025-11-19 09:24:45'),
(2, 'Ceramic Mugs', 'ceramic-mugs', 1, '2025-11-19 09:29:08', '2025-11-19 09:29:08'),
(3, 'Travel Mugs', 'travel-mugs', 1, '2025-11-19 09:29:57', '2025-11-19 09:29:57'),
(8, 'apparel', 'apparel', NULL, '2025-11-22 10:38:40', '2025-11-22 10:38:40'),
(9, 'Clothing & Apparel', 'clothing-apparel', NULL, '2025-11-22 10:39:31', '2025-11-22 10:39:31'),
(10, 'T Shirts', 't-shirts', 9, '2025-11-22 10:39:43', '2025-11-22 10:39:43'),
(11, 'Bags & Backpacks', 'bags-backpacks', NULL, '2025-11-22 11:28:15', '2025-11-22 11:28:15'),
(12, 'Tote Bags', 'tote-bags', 11, '2025-11-22 11:28:31', '2025-11-22 11:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'saas', 'saas', 'admin@gmail.com', '03002425897', 'xzxz', '2025-12-13 14:47:34', '2025-12-13 14:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_18_194404_create_categories_table', 2),
(5, '2025_11_18_153551_create_roles_table', 6),
(6, '2025_11_19_160847_create_products_table', 7),
(7, '2025_11_19_160850_create_product_images_table', 8),
(8, '2025_11_19_160859_create_product_colors_table', 9),
(9, '2025_11_19_160905_create_product_tabs_table', 10),
(10, '2025_11_19_160917_create_product_tab_rows_table', 11),
(11, '2025_11_19_160924_create_product_prices_table', 12),
(13, '2025_11_19_182647_add_section_to_product_tabs_table', 14),
(14, '2025_11_19_172520_create_product_tab_cells_table', 15),
(15, '2025_12_09_190721_add_special_offer_and_popular_fields_to_products_table', 16),
(16, '2025_12_13_175514_create_contacts_table', 17),
(17, '2025_12_13_195221_add_color_fields_to_product_colors_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `item_number` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `item_size` varchar(255) DEFAULT NULL,
  `imprint_area` varchar(255) DEFAULT NULL,
  `other_specs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`other_specs`)),
  `is_special_offer` tinyint(1) NOT NULL DEFAULT 0,
  `is_popular` tinyint(1) NOT NULL DEFAULT 0,
  `special_price_before` decimal(10,2) DEFAULT NULL,
  `special_price_after` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `item_number`, `description`, `material`, `item_size`, `imprint_area`, `other_specs`, `is_special_offer`, `is_popular`, `special_price_before`, `special_price_after`, `created_at`, `updated_at`) VALUES
(3, 2, 'ds', 'qw', '21', '21', '21', '1221', NULL, 0, 1, NULL, NULL, '2025-11-20 13:37:59', '2025-12-09 15:04:05'),
(4, 2, 'test', '2121', 'addassad', 'testtesttesttest', '21', '2121', NULL, 0, 0, NULL, NULL, '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(5, 2, 'sasa', '212112', '12', '12', '12', '12', NULL, 0, 0, NULL, NULL, '2025-11-22 08:33:12', '2025-11-22 08:33:12'),
(6, 10, 'nike drop sholder', 'XYZ600', 'sasasasa', 'Cotton Canvas', '20\"W x 15\"H x 5\"D', '12\"W x 10\"H', NULL, 0, 1, NULL, NULL, '2025-11-22 10:52:00', '2025-12-10 10:41:33'),
(8, 12, 'Canvas Jumbo Tote w/ Bottom3333333333333333333', 'IB60033', 'Quality Weight:	12oz33\r\nHandle Size:	23\"\r\nGusset:	Bottom: Yes   Side: No', '100% Cotton Canvas33', '20\"W x 15\"H x 5\"D33', '12\"W x 10\"H33', NULL, 0, 1, NULL, NULL, '2025-11-22 12:00:01', '2025-12-10 10:41:32'),
(9, 1, 'dsds', 'dsds', 'sd', 'dsds', 'dsds', 'ds', NULL, 0, 0, NULL, NULL, '2025-11-23 09:59:59', '2025-11-23 09:59:59'),
(10, 1, 'xsdsa', 'assa', 'sasa', 'assa', 'sa', 'sasa', NULL, 0, 0, NULL, NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(11, 12, 'sasa', 'IB600333', 'cxcx', '100% Cotton Canvas33', '20\"W x 15\"H x 5\"D33', '12\"W x 10\"H33', NULL, 0, 0, NULL, NULL, '2025-11-25 10:45:59', '2025-11-25 10:53:22'),
(12, 12, 'Canvas Jumbo Tote w/ Bottom Gusset', 'TB600', '12oz, Canvas, 100% Cotton, Jumbo tote with bottom gusset soft web handles. Reinforced at stress points.', '100% Cotton Canvas', '20\"W x 15\"H x 5\"D', '12\"W x 10\"H (Note: Imprint size can be bigger on this product with an upcharge; please do contact customer service for details).', NULL, 1, 1, 4000.00, 5000.00, '2025-12-09 11:53:59', '2025-12-11 10:58:38'),
(13, 12, 'test121', 'IB60033', 's', '100% Cotton Canvas33', '20\"W x 15\"H x 5\"D', '12\"W x 10\"H (Note: Imprint size can be bigger on this product with an upcharge; please do contact customer service for details).', NULL, 0, 0, NULL, NULL, '2025-12-13 12:21:35', '2025-12-13 12:21:35'),
(14, 12, 'Canvas Jumbo Tote w/ Bottom Gusset', 'IB600', '12oz, Canvas, 100% Cotton, Jumbo tote with bottom gusset soft web handles. Reinforced at stress points.', '100% Cotton Canvas', '20\"W x 15\"H x 5\"D', '12\"W x 10\"H', NULL, 0, 0, NULL, NULL, '2025-12-13 13:29:10', '2025-12-13 13:36:50'),
(15, 12, 'test13', 'IB60033', 'asssa', '100% Cotton Canvas33', '20\"W x 15\"H x 5\"D33', '12\"W x 10\"H (Note: Imprint size can be bigger on this product with an upcharge; please do contact customer service for details).', NULL, 0, 0, NULL, NULL, '2025-12-13 15:17:07', '2025-12-13 15:17:07'),
(16, 12, 'Canvas Big Tote Bag with Velcro Closure', 'TB1200', '12oz, Canvas, 100% Cotton large tote bag with velcro closure self-fabric handles & bottom gusset. Reinforced at stress points.', '100% Cotton Canvas', '23\"W x 17\"H x 6\"D', '12\"W x 12\"H (Note: Imprint size can be bigger on this product with an upcharge; please do contact customer service for details).', NULL, 0, 0, NULL, NULL, '2025-12-15 13:17:42', '2025-12-15 13:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(10) NOT NULL,
  `color_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_name`, `color_code`, `color_image`, `created_at`, `updated_at`) VALUES
(4, 3, 'red', '', 'color_images/B8Y2OzG3bMZI1p5yFJgyzwp80ohD41A1kB52x15E.png', '2025-11-20 13:37:59', '2025-11-20 13:37:59'),
(5, 4, 'red', '', 'color_images/eTZtb1XLMhNNL9YEBvxoAURz1KpKAZ4cJQ47wsNn.jpg', '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(6, 4, 'purple', '', 'color_images/mMysfdT8ORjnnRcdSSu4wTWJK38APiF2BhQvaTil.jpg', '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(7, 5, 'red', '', 'color_images/2ovGz1YRDvfDcNDKBa2u8ZX441qEJIbL1BFzu2Wo.png', '2025-11-22 08:33:15', '2025-11-22 08:33:15'),
(8, 6, 'red', '', 'color_images/QVriJcPt8M7XzTlR35y7qKGw0TeSy8YuqgLTGNAW.jpg', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(9, 6, 'black', '', 'color_images/2DJ1PdzrL15akLiO0l5aWaoIKPn1PrVObuTUytIl.jpg', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(10, 6, 'purple', '', 'color_images/fdyHM5zwrTJSPnf62w1dOXZlB3yGREKFn9Ws7jIb.jpg', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(15, 8, 'red', '', 'color_images/Uq2ibysPQBTtQAGGffVGiI2YkCKpZZbDp4Ld2lD7.jpg', '2025-11-22 12:00:01', '2025-11-22 12:00:01'),
(16, 8, 'lime green', '', 'color_images/iDXz3tnl8NEt06qzSqwwx38iZqoVhcisZhMZIq90.jpg', '2025-11-22 12:00:01', '2025-11-22 12:00:01'),
(17, 8, 'Navy', '', 'color_images/sbakiXhUBQfEplc7GMFnp09Nae5wJdB3Vtb7HGWl.jpg', '2025-11-22 12:00:01', '2025-11-22 12:00:01'),
(18, 8, 'black', '', 'color_images/0DljyyxlEjd6rgS8HWGOJYfhJUVdTwJGH7xqD2wT.jpg', '2025-11-22 12:00:01', '2025-11-22 12:00:01'),
(19, 8, 'light pink', '', 'color_images/yzKulnGLGKOvEid8StbXYEKMhCXvLFbSRocOqFTT.jpg', '2025-11-22 12:00:01', '2025-11-22 12:00:01'),
(20, 8, '333', '', 'color_images/K9FwmYbeRGOazMAmJMXnqAEh3nPgVbhe8voLmqYS.jpg', '2025-11-23 08:48:58', '2025-11-23 08:48:58'),
(21, 9, 'dsds', '', 'color_images/XXdEF0nUs0cTfFC7RIUBvziLHTZqNnwOxx4smoXt.jpg', '2025-11-23 09:59:59', '2025-11-23 09:59:59'),
(22, 10, 'sasa', '', 'color_images/UEu80eLbIujQUdyirwb4Yg7TrPnN6IojVteZHfh1.jpg', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(23, 11, '#b11b1b', '', 'color_images/gCsZqtNzQ54t0BjOuVENJhN0I04L6mHTCLcUj0Ra.jpg', '2025-11-25 10:46:00', '2025-11-25 10:46:00'),
(24, 11, '#0fc22d', '', 'color_images/QRHGT4KBe1LLxt49LB3Bu6bp5iC7iAPpVs7i5hOb.png', '2025-11-25 10:46:00', '2025-11-25 10:46:00'),
(25, 11, '#dccb09', '', 'color_images/rLiczQ0IMPMcIaQNaxokxGLJ5EKMQwbzzNZ0g035.jpg', '2025-11-25 10:46:00', '2025-11-25 10:53:22'),
(27, 12, '#000000', '', 'color_images/abpUkNXQhw9p4FS5LYC2AHEGq33YStXOfJRcdsbc.jpg', '2025-12-09 11:54:12', '2025-12-09 11:54:12'),
(28, 12, '#ff0000', '', 'color_images/6qAxyhPQoPDUijvOacyK5ITWeEVX8t6mArYBviIb.jpg', '2025-12-09 11:54:12', '2025-12-09 11:54:12'),
(29, 12, '#ffdfb3', '', 'color_images/X3XDJAP43s2ANHtfeXP0TAVlviavWPWLDWvOK1pL.jpg', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(30, 12, '#030f35', '', 'color_images/wQnDIYG3MtVbHn2M67sV6xIEmL7qkgvCX7Na4605.jpg', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(31, 12, '#1f036d', '', 'color_images/QvsVDYFZEavzOX6dOsFG43oohSKfvCDk5ogWjLYS.jpg', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(32, 13, '#000000', '', 'color_images/luA1CZyj1QgYPU6ya8S8X8o0K3KVmEefuyBbbsQX.png', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(33, 13, '#ff0a0a', '', 'color_images/pP0Q11Em6HfU6ohVYcJzzeh8pn1EeCXiq7h1DnxR.jpg', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(34, 14, '#000000', '', 'color_images/7CUhuL1vXm2WUpF0Pg2FaVTbsVx23kU5pD8VHHBJ.jpg', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(35, 14, '#990000', '', 'color_images/icUeadpXVPPxy2aiwfb8l3TRZGyfEhk8DLkRkUow.jpg', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(36, 14, '#222ba5', '', 'color_images/faedeGwbPoREhjV0tHGvuwCMCPwvaLriD5JwwtCX.jpg', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(37, 14, '#000000', '', 'color_images/0E2XodbssJMd2Ky9DFAd1BW3zjqfLkweY6aKeQpe.jpg', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(38, 14, '#67c7e9', '', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(39, 14, '#b28394', '', 'color_images/B3LMQwYk9nevlzkL6mUNHEhfte6aYGAUBpdipCwR.jpg', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(40, 14, '#fbff00', '', 'color_images/wmlXCc4BEK1DegWhA09D3iH5JxEIMyv5M9TyIqJX.jpg', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(41, 15, 'Black', '#000000', 'color_images/MiUANgcR50jQxQ3Zsk3ZP0sLUfZmDN4JPCFAaYaI.jpg', '2025-12-13 15:17:07', '2025-12-13 15:27:21'),
(42, 15, 'Navy', '#100566', 'color_images/Skq6yGPmMiTAXzhmkE1gV9xNKmcwu9vTR6g3NVrJ.jpg', '2025-12-13 15:17:07', '2025-12-13 15:27:21'),
(43, 15, 'Red', '#bd0000', 'color_images/gZRcseP88sXKK2F1zynMwlpXjbPjCwuIg6vhkTdg.jpg', '2025-12-13 15:17:07', '2025-12-13 15:27:21'),
(44, 15, 'yellow', '#f9e876', 'color_images/iVRyaGFmMHGOP1OG1rTjCDIoH8ghy8I66fTyjkeE.jpg', '2025-12-13 15:17:37', '2025-12-13 15:17:37'),
(45, 16, 'Black', '#000000', 'color_images/Ruhj7vizNRkkJ8jqbo688X7EvmcvuXEPPIQk62TR.jpg', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(46, 16, 'yellow', '#ffe11f', 'color_images/x5QjWnyDGCycky3vLgj5rqvJ9D38EK1Dn8PtoWpg.jpg', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(47, 16, 'Pink', '#f9dcdc', 'color_images/nB2YHm99PQDxdhCtqR0YZO6XfV0AZD5nrSmfX0Jx.jpg', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(48, 16, 'Navy', '#042a53', 'color_images/Um2RV2ps1Ks4LjWIQlBGGaNuJvlRQUauHdVKxc1p.jpg', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(49, 16, 'Royal', '#1c5797', 'color_images/neicWQMGOTLl5zd1z4ufBFYdwAdk1apBT7u2O0Zc.jpg', '2025-12-15 13:17:44', '2025-12-15 13:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(3, 3, 'product_images/b6nmzFzVrAFy0LGpkc0rbWzawnYHbpIAXcZb0JSn.png', '2025-11-20 13:38:00', '2025-11-20 13:38:00'),
(4, 4, 'product_images/vtYHJp0UPbK66jdvsfCppCcmsQpZDf2uLlprECoC.jpg', '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(5, 5, 'product_images/o26uYeVK6iQxoY0MoKgSoiZDzuPfmwuVmaB9Qkhx.jpg', '2025-11-22 08:33:15', '2025-11-22 08:33:15'),
(6, 6, 'product_images/oCuVswpviwRh6cALwdgxcbPfthaHkcRpcCxZa4Ap.jpg', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(8, 8, 'product_images/NbVz3RNLmzhtnWTiPtbagX0HGxrOvdKVoePx5eCC.jpg', '2025-11-22 12:00:01', '2025-11-22 12:00:01'),
(9, 9, 'product_images/j6A7UbJKEpoa4jykjKGb5DWphS9qZalaDJEcamxu.png', '2025-11-23 09:59:59', '2025-11-23 09:59:59'),
(10, 10, 'product_images/kg8WPBGYdBI9KJbNkZnQWTDp5Uu3I0Op14sPZ5An.png', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(11, 11, 'product_images/gjkkpoK8Sq0LUZsWnVKr02cG0VL0kjBgHAWIhyE0.png', '2025-11-25 10:46:00', '2025-11-25 10:46:00'),
(12, 12, 'product_images/1SGbaGqdI2cfjREm6iYunRNraHlWZ91jiy3AjUlQ.jpg', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(13, 13, 'product_images/wTg4qunvFjESRpOMnpNXoe0idqoevXxfLS10t1W3.jpg', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(14, 14, 'product_images/w4o1BzKG5O6eplp4JJiJBKJLXslnlJMOsUa3AE3x.jpg', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(15, 15, 'product_images/9m8s8ZY1Mijs96tI660O5BxJoEuvS0w1foySgbSv.jpg', '2025-12-13 15:17:07', '2025-12-13 15:17:07'),
(16, 16, 'product_images/wpsPFERL8mJWVgFhnsltgCQWY62jjFLxFd2mYn8v.jpg', '2025-12-15 13:17:44', '2025-12-15 13:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_id`, `type`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, '2121', 778, 556.00, '2025-11-20 13:38:00', '2025-11-20 13:38:00'),
(2, 4, '12', 21, 12.00, '2025-11-20 13:52:18', '2025-11-20 13:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_tabs`
--

CREATE TABLE `product_tabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL DEFAULT 'top',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tabs`
--

INSERT INTO `product_tabs` (`id`, `product_id`, `title`, `section`, `created_at`, `updated_at`) VALUES
(5, 3, 'Product Description', 'bottom', '2025-11-20 13:38:00', '2025-11-20 13:38:00'),
(7, 4, 'blank', 'top', '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(10, 5, 'assa', 'top', '2025-11-22 08:33:15', '2025-11-22 08:33:15'),
(11, 5, 'Product Description', 'bottom', '2025-11-22 08:33:15', '2025-11-22 08:33:15'),
(12, 6, 'SPOT PRINTING', 'top', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(13, 6, 'HEAT TRANSFER', 'top', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(14, 6, 'Product Description', 'bottom', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(15, 6, 'Additional Charges', 'bottom', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(16, 6, 'Packing Information', 'bottom', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(32, 9, 'assa', 'top', '2025-11-23 09:59:59', '2025-11-23 09:59:59'),
(33, 8, '333', 'top', '2025-11-23 10:08:47', '2025-11-23 10:54:20'),
(34, 8, 'dsds', 'top', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(35, 8, '3333', 'bottom', '2025-11-23 10:08:47', '2025-11-23 10:54:20'),
(36, 8, 'ds', 'bottom', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(37, 8, 'dsds', 'bottom', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(38, 8, 'dsds', 'bottom', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(39, 8, '333', 'top', '2025-11-23 10:54:20', '2025-11-23 10:54:20'),
(40, 8, '333', 'bottom', '2025-11-23 10:54:20', '2025-11-23 10:54:20'),
(41, 8, '444444', 'top', '2025-11-23 11:01:59', '2025-11-23 11:01:59'),
(42, 8, '444', 'bottom', '2025-11-23 11:01:59', '2025-11-23 11:01:59'),
(44, 10, 'sassaassa', 'top', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(45, 10, 'sassa', 'top', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(46, 10, 'sasa', 'bottom', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(47, 10, 'sasasa', 'bottom', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(48, 10, 'sasasasa', 'bottom', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(49, 10, 'sasa', 'bottom', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(50, 10, 'tab', 'top', '2025-11-23 11:17:35', '2025-11-23 11:17:35'),
(51, 10, 'new tab', 'top', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(52, 10, 'new tab', 'bottom', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(53, 11, 'qwwqwq', 'top', '2025-11-25 10:46:00', '2025-11-25 10:46:00'),
(54, 11, 'Product Description', 'bottom', '2025-11-25 10:46:00', '2025-11-25 10:46:00'),
(55, 12, 'SPOT PRINTING', 'top', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(56, 12, 'HEAT TRANSFER', 'top', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(57, 12, 'BLANK', 'top', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(58, 12, 'Additional Information', 'bottom', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(59, 12, 'Additional Charges', 'bottom', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(60, 12, 'Shipping Info', 'bottom', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(61, 13, 'SPOT PRINTING', 'top', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(62, 13, 'Blank', 'top', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(63, 13, 'Product Description', 'bottom', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(64, 13, 'Additional Information', 'bottom', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(65, 14, 'SPOT PRINTING', 'top', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(66, 14, 'HEAT TRANSFER', 'top', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(67, 14, 'Blank', 'top', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(68, 14, 'Additional Information', 'bottom', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(69, 14, 'Additional Charges', 'bottom', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(70, 14, 'Shipping Info', 'bottom', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(71, 15, 'SPOT PRINTING', 'top', '2025-12-13 15:17:07', '2025-12-13 15:17:07'),
(72, 15, 'Product Description', 'bottom', '2025-12-13 15:17:07', '2025-12-13 15:17:07'),
(73, 16, 'SPOT PRINTING', 'top', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(74, 16, 'Blank', 'top', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(75, 16, 'Product Description', 'bottom', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(76, 16, 'Additional Information', 'bottom', '2025-12-15 13:17:44', '2025-12-15 13:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_tab_cells`
--

CREATE TABLE `product_tab_cells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `row_id` bigint(20) UNSIGNED NOT NULL,
  `column_name` int(11) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tab_cells`
--

INSERT INTO `product_tab_cells` (`id`, `row_id`, `column_name`, `value`, `created_at`, `updated_at`) VALUES
(3, 5, 0, '67', '2025-11-20 13:38:00', '2025-11-20 13:38:00'),
(23, 10, 0, '1', '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(24, 10, 1, '1', '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(25, 10, 2, '1', '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(26, 10, 3, '1', '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(35, 14, 0, '1', '2025-11-22 08:33:15', '2025-11-22 08:33:15'),
(36, 15, 0, '2', '2025-11-22 08:33:15', '2025-11-22 08:33:15'),
(37, 16, 0, '72', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(38, 16, 1, '288', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(39, 16, 2, '300', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(40, 16, 3, '500', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(41, 16, 4, '600', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(42, 16, 5, '1000', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(43, 16, 6, '2000', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(44, 17, 0, '1', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(45, 17, 1, '2', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(46, 17, 2, '3', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(47, 17, 3, '4', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(48, 17, 4, '5', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(49, 17, 5, '6', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(50, 17, 6, '7', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(51, 18, 0, '2', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(52, 18, 1, '4', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(53, 18, 2, '6', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(54, 18, 3, '8', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(55, 18, 4, '10', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(56, 18, 5, '12', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(57, 18, 6, '14', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(58, 19, 0, '1', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(59, 19, 1, '2', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(60, 19, 2, '3', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(61, 19, 3, '4', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(62, 19, 4, '5', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(63, 19, 5, '6', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(64, 19, 6, '7', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(65, 20, 0, '3', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(66, 20, 1, '5', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(67, 20, 2, '7', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(68, 20, 3, '9', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(69, 20, 4, '11', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(70, 20, 5, '13', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(71, 20, 6, '16', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(72, 21, 0, '20\"W X 15\"H X 5\" Bottom Gusset', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(73, 22, 0, 'Cotton Canvas', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(74, 23, 0, 'XYZ600', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(75, 24, 0, 'Jumbo Tote Bag', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(76, 25, 0, '5', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(77, 26, 0, '10', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(78, 27, 0, '20', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(79, 28, 0, '1', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(80, 28, 1, '2', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(81, 29, 0, '3', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(82, 29, 1, '4', '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(217, 87, 0, 'sa', '2025-11-23 09:59:59', '2025-11-23 09:59:59'),
(218, 88, 0, '33', '2025-11-23 10:08:47', '2025-11-23 10:54:20'),
(219, 88, 1, '333', '2025-11-23 10:08:47', '2025-11-23 10:54:20'),
(220, 88, 2, '333', '2025-11-23 10:08:47', '2025-11-23 10:54:20'),
(221, 89, 0, 'ds', '2025-11-23 10:08:47', '2025-11-23 11:05:43'),
(222, 89, 1, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(223, 89, 2, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(224, 90, 0, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(225, 90, 1, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(226, 90, 2, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(227, 91, 0, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(228, 91, 1, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(229, 92, 0, '333', '2025-11-23 10:08:47', '2025-11-23 10:54:20'),
(230, 92, 1, '3333', '2025-11-23 10:08:47', '2025-11-23 10:54:20'),
(231, 93, 0, 'ds', '2025-11-23 10:08:47', '2025-11-23 11:01:59'),
(232, 94, 0, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(233, 95, 0, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(234, 96, 0, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(235, 97, 0, 'ds', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(236, 98, 0, 'sd', '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(237, 99, 0, '33333333333', '2025-11-23 11:04:37', '2025-11-23 11:04:37'),
(238, 99, 238, '3333333333333', '2025-11-23 11:05:10', '2025-11-23 11:05:10'),
(239, 99, 239, '333333333333333333', '2025-11-23 11:05:10', '2025-11-23 11:05:10'),
(240, 99, 240, 'new clmn', '2025-11-23 11:06:20', '2025-11-23 11:06:20'),
(245, 106, 0, 'sasasasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(246, 107, 0, '2121', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(247, 108, 0, 'xzxz', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(248, 109, 0, 'sasasas', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(249, 110, 0, 'sa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(250, 111, 0, 'sasaas', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(251, 111, 1, 'sasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(252, 112, 0, 'sa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(253, 112, 1, 'sasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(254, 113, 0, 'sasasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(255, 114, 0, 'sasasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(256, 115, 0, 'sasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(257, 116, 0, 'sasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(258, 116, 1, 'sa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(259, 117, 0, 'sasasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(260, 117, 1, 'sasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(261, 118, 0, 'sasa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(262, 119, 0, 'sa', '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(272, 106, 245, 'sasasasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(273, 107, 246, '2121', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(274, 108, 247, 'xzxz', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(275, 109, 248, 'sasasas', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(276, 110, 249, 'sa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(277, 111, 250, 'sasaas', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(278, 111, 251, 'sasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(279, 112, 252, 'sa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(280, 112, 253, 'sasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(281, 113, 254, 'sasasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(282, 114, 255, 'sasasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(283, 115, 256, 'sasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(284, 116, 257, 'sasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(285, 116, 258, 'sa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(286, 117, 259, 'sasasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(287, 117, 260, 'sasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(288, 118, 261, 'sasa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(289, 119, 262, 'sa', '2025-11-23 12:01:48', '2025-11-23 12:01:48'),
(353, 106, 272, 'sasasasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(354, 107, 273, '2121', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(355, 108, 274, 'xzxz', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(356, 109, 275, 'sasasas', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(357, 110, 276, 'sa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(358, 111, 277, 'sasaas', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(359, 111, 278, 'sasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(360, 112, 279, 'sa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(361, 112, 280, 'sasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(362, 113, 281, 'sasasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(363, 114, 282, 'sasasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(364, 115, 283, 'sasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(365, 116, 284, 'sasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(366, 116, 285, 'sa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(367, 117, 286, 'sasasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(368, 117, 287, 'sasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(369, 118, 288, 'sasa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(370, 119, 289, 'sa', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(371, 122, 0, 'new tab', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(372, 122, 1, 'new tab', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(373, 123, 0, 'new tab', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(374, 123, 1, 'new tab', '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(375, 124, 0, '1', '2025-11-25 10:46:00', '2025-11-25 10:46:00'),
(376, 125, 0, 'TB600', '2025-11-25 10:46:00', '2025-11-25 10:46:00'),
(377, 124, 375, '1', '2025-11-25 10:53:22', '2025-11-25 10:53:22'),
(378, 125, 376, 'TB600', '2025-11-25 10:53:22', '2025-11-25 10:53:22'),
(379, 124, 377, '1', '2025-11-25 10:57:23', '2025-11-25 10:57:23'),
(380, 125, 378, 'TB600', '2025-11-25 10:57:23', '2025-11-25 10:57:23'),
(381, 126, 0, '72', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(382, 126, 1, '288', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(383, 126, 2, '500', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(384, 126, 3, '1000', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(385, 126, 4, '2000', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(386, 126, 5, '3000', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(387, 127, 0, '$6.45', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(388, 127, 1, '$5.65', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(389, 127, 2, '$5.31', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(390, 127, 3, '$5.15', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(391, 127, 4, '$4.96', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(392, 127, 5, '$4.85', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(393, 128, 0, '$7.74', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(394, 128, 1, '$6.90', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(395, 128, 2, '$6.56', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(396, 128, 3, '$6.40', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(397, 128, 4, '$6.21', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(398, 128, 5, '$6.10', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(399, 129, 0, '$1.81', '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(400, 129, 1, '$1.31', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(401, 129, 2, '$1.06', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(402, 129, 3, '$0.94', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(403, 129, 4, '$0.81', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(404, 129, 5, '$0.71', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(405, 130, 0, '$0.50', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(406, 130, 1, '$0.38', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(407, 130, 2, '$0.35', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(408, 130, 3, '$0.30', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(409, 130, 4, '$0.25', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(410, 130, 5, '$0.20', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(411, 131, 0, '100', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(412, 131, 1, '250', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(413, 131, 2, '500', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(414, 131, 3, '1000', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(415, 131, 4, '2000', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(416, 131, 5, '3000', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(417, 132, 0, '$10.50', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(418, 132, 1, '$9.56', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(419, 132, 2, '$9.23', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(420, 132, 3, '$9.08', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(421, 132, 4, '$9.04', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(422, 132, 5, '$9.00', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(423, 133, 0, '$11.33', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(424, 133, 1, '$10.40', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(425, 133, 2, '$10.06', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(426, 133, 3, '$9.92', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(427, 133, 4, '$9.88', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(428, 133, 5, '$9.83', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(429, 134, 0, '$3.98', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(430, 135, 0, '$4.76', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(431, 136, 0, 'TB600', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(432, 137, 0, 'Canvas Jumbo Tote w/ Bottom Gusset', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(433, 138, 0, '12oz, Canvas, 100% Cotton, Jumbo tote with bottom gusset soft web handles. Reinforced at stress points.', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(434, 139, 0, 'Lime, Chocolate, Light Pink, Yellow, White, Dark Gray, Natural, Black, Navy, Red, Royal', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(435, 140, 0, '20\"W x 15\"H x 5\"D', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(436, 141, 0, '14\"W x 10\"H', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(437, 142, 0, '100% Cotton Canvas', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(438, 143, 0, 'Call for pricing', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(439, 144, 0, 'Call for pricing', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(440, 145, 0, '$ 75.00 (V) / Hour', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(441, 146, 0, '$ 25.00 (V)', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(442, 148, 0, '72 pcs', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(443, 149, 0, '28.44 lbs', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(444, 150, 0, '21.5\" x 16.5\" x 8\"', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(445, 151, 0, 'Pakistan', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(446, 152, 0, 'USA', '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(447, 126, 381, '72', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(448, 126, 382, '288', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(449, 126, 383, '500', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(450, 126, 384, '1000', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(451, 126, 385, '2000', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(452, 126, 386, '3000', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(453, 127, 387, '$6.45', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(454, 127, 388, '$5.65', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(455, 127, 389, '$5.31', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(456, 127, 390, '$5.15', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(457, 127, 391, '$4.96', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(458, 127, 392, '$4.85', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(459, 128, 393, '$7.74', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(460, 128, 394, '$6.90', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(461, 128, 395, '$6.56', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(462, 128, 396, '$6.40', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(463, 128, 397, '$6.21', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(464, 128, 398, '$6.10', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(465, 129, 399, '$1.81', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(466, 129, 400, '$1.31', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(467, 129, 401, '$1.06', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(468, 129, 402, '$0.94', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(469, 129, 403, '$0.81', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(470, 129, 404, '$0.71', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(471, 130, 405, '$0.50', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(472, 130, 406, '$0.38', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(473, 130, 407, '$0.35', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(474, 130, 408, '$0.30', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(475, 130, 409, '$0.25', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(476, 130, 410, '$0.20', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(477, 131, 411, '100', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(478, 131, 412, '250', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(479, 131, 413, '500', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(480, 131, 414, '1000', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(481, 131, 415, '2000', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(482, 131, 416, '3000', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(483, 132, 417, '$10.50', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(484, 132, 418, '$9.56', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(485, 132, 419, '$9.23', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(486, 132, 420, '$9.08', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(487, 132, 421, '$9.04', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(488, 132, 422, '$9.00', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(489, 133, 423, '$11.33', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(490, 133, 424, '$10.40', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(491, 133, 425, '$10.06', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(492, 133, 426, '$9.92', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(493, 133, 427, '$9.88', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(494, 133, 428, '$9.83', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(495, 134, 429, '$3.98', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(496, 135, 430, '$4.76', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(497, 136, 431, 'TB600', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(498, 137, 432, 'Canvas Jumbo Tote w/ Bottom Gusset', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(499, 138, 433, '12oz, Canvas, 100% Cotton, Jumbo tote with bottom gusset soft web handles. Reinforced at stress points.', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(500, 139, 434, 'Lime, Chocolate, Light Pink, Yellow, White, Dark Gray, Natural, Black, Navy, Red, Royal', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(501, 140, 435, '20\"W x 15\"H x 5\"D', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(502, 141, 436, '14\"W x 10\"H', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(503, 142, 437, '100% Cotton Canvas', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(504, 143, 438, 'Call for pricing', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(505, 144, 439, 'Call for pricing', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(506, 145, 440, '$ 75.00 (V) / Hour', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(507, 146, 441, '$ 25.00 (V)', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(508, 148, 442, '72 pcs', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(509, 149, 443, '28.44 lbs', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(510, 150, 444, '21.5\" x 16.5\" x 8\"', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(511, 151, 445, 'Pakistan', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(512, 152, 446, 'USA', '2025-12-11 10:58:38', '2025-12-11 10:58:38'),
(513, 153, 0, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(514, 153, 1, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(515, 153, 2, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(516, 153, 3, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(517, 153, 4, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(518, 154, 0, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(519, 154, 1, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(520, 154, 2, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(521, 154, 3, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(522, 154, 4, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(523, 155, 0, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(524, 155, 1, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(525, 155, 2, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(526, 155, 3, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(527, 155, 4, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(528, 156, 0, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(529, 157, 0, '1', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(530, 158, 0, 'TB600', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(531, 159, 0, 'Canvas Jumbo Tote w/ Bottom Gusset', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(532, 160, 0, '12oz, Canvas, 100% Cotton, Jumbo tote with bottom gusset soft web handles. Reinforced at stress points.', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(533, 161, 0, 'wqw', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(534, 162, 0, 'Call for pricing', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(535, 163, 0, '12', '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(536, 164, 0, '10', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(537, 164, 1, '20', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(538, 164, 2, '30', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(539, 164, 3, '40', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(540, 165, 0, '$5', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(541, 165, 1, '$10', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(542, 165, 2, '$15', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(543, 165, 3, '$20', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(544, 166, 0, '$8', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(545, 166, 1, '$16', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(546, 166, 2, '$24', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(547, 166, 3, '$32', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(548, 167, 0, '100', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(549, 167, 1, '250', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(550, 167, 2, '500', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(551, 167, 3, '1000', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(552, 168, 0, '$4', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(553, 168, 1, '$8', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(554, 168, 2, '$12', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(555, 168, 3, '$16', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(556, 169, 0, '$3.98', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(557, 170, 0, '$4.76', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(558, 171, 0, 'TB600', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(559, 172, 0, 'Canvas Jumbo Tote w/ Bottom Gusset', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(560, 173, 0, '12oz, Canvas, 100% Cotton, Jumbo tote with bottom gusset soft web handles. Reinforced at stress points.', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(561, 174, 0, 'Lime, Chocolate, Light Pink, Yellow, White, Dark Gray, Natural, Black, Navy, Red, Royal', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(562, 175, 0, 'Call for pricin', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(563, 176, 0, 'Call for pricing', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(564, 177, 0, '$ 75.00 (V) / Hour', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(565, 178, 0, '72 pcs', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(566, 179, 0, '28.44 lbs', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(567, 180, 0, '21.5\" x 16.5\" x 8\"', '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(568, 164, 536, '10', '2025-12-13 13:36:50', '2025-12-13 13:36:50'),
(569, 164, 537, '20', '2025-12-13 13:36:50', '2025-12-13 13:36:50'),
(570, 164, 538, '30', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(571, 164, 539, '40', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(572, 165, 540, '$5', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(573, 165, 541, '$10', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(574, 165, 542, '$15', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(575, 165, 543, '$20', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(576, 166, 544, '$8', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(577, 166, 545, '$16', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(578, 166, 546, '$24', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(579, 166, 547, '$32', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(580, 167, 548, '100', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(581, 167, 549, '250', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(582, 167, 550, '500', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(583, 167, 551, '1000', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(584, 168, 552, '$4', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(585, 168, 553, '$8', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(586, 168, 554, '$12', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(587, 168, 555, '$16', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(588, 169, 556, '$3.98', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(589, 170, 557, '$4.76', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(590, 171, 558, 'TB600', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(591, 172, 559, 'Canvas Jumbo Tote w/ Bottom Gusset', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(592, 173, 560, '12oz, Canvas, 100% Cotton, Jumbo tote with bottom gusset soft web handles. Reinforced at stress points.', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(593, 174, 561, 'Lime, Chocolate, Light Pink, Yellow, White, Dark Gray, Natural, Black, Navy, Red, Royal', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(594, 175, 562, 'Call for pricin', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(595, 176, 563, 'Call for pricing', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(596, 177, 564, '$ 75.00 (V) / Hour', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(597, 178, 565, '72 pcs', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(598, 179, 566, '28.44 lbs', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(599, 180, 567, '21.5\" x 16.5\" x 8\"', '2025-12-13 13:36:51', '2025-12-13 13:36:51'),
(600, 181, 0, '1', '2025-12-13 15:17:07', '2025-12-13 15:17:07'),
(601, 181, 1, '1', '2025-12-13 15:17:07', '2025-12-13 15:17:07'),
(602, 181, 600, '1', '2025-12-13 15:17:37', '2025-12-13 15:17:37'),
(603, 181, 601, '1', '2025-12-13 15:17:37', '2025-12-13 15:17:37'),
(604, 181, 602, '1', '2025-12-13 15:27:21', '2025-12-13 15:27:21'),
(605, 181, 603, '1', '2025-12-13 15:27:21', '2025-12-13 15:27:21'),
(606, 183, 0, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(607, 183, 1, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(608, 183, 2, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(609, 183, 3, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(610, 183, 4, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(611, 183, 5, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(612, 184, 0, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(613, 184, 1, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(614, 184, 2, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(615, 184, 3, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(616, 184, 4, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(617, 184, 5, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(618, 185, 0, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(619, 185, 1, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(620, 185, 2, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(621, 185, 3, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(622, 185, 4, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(623, 185, 5, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(624, 186, 0, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(625, 186, 1, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(626, 187, 0, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(627, 187, 1, '1', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(628, 188, 0, 'TB600', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(629, 189, 0, 'Canvas Jumbo Tote w/ Bottom Gusset', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(630, 190, 0, '12oz, Canvas, 100% Cotton, Jumbo tote with bottom gusset soft web handles. Reinforced at stress points.', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(631, 191, 0, 'Lime, Chocolate, Light Pink, Yellow, White, Dark Gray, Natural, Black, Navy, Red, Royal', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(632, 192, 0, '21', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(633, 193, 0, '10', '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(634, 194, 0, '20', '2025-12-15 13:17:44', '2025-12-15 13:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_tab_rows`
--

CREATE TABLE `product_tab_rows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tab_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tab_rows`
--

INSERT INTO `product_tab_rows` (`id`, `tab_id`, `label`, `value`, `created_at`, `updated_at`) VALUES
(5, 5, 'wqqw', NULL, '2025-11-20 13:38:00', '2025-11-20 13:38:00'),
(10, 7, 'wqqw', NULL, '2025-11-20 13:52:18', '2025-11-20 13:52:18'),
(14, 10, 'sa', NULL, '2025-11-22 08:33:15', '2025-11-22 08:33:15'),
(15, 11, 'ass', NULL, '2025-11-22 08:33:15', '2025-11-22 08:33:15'),
(16, 12, 'quantity', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(17, 12, 'Natural', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(18, 12, 'Red', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(19, 13, 'Quantity', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(20, 13, 'One Color', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(21, 14, 'Size', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(22, 14, 'Material', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(23, 14, 'Item Number', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(24, 14, 'Item Name', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(25, 15, 'additional color', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(26, 15, 'setup charges', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(27, 15, 'location charges', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(28, 16, 'abc', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(29, 16, 'wqwq', NULL, '2025-11-22 10:52:01', '2025-11-22 10:52:01'),
(87, 32, 'sasa', NULL, '2025-11-23 09:59:59', '2025-11-23 09:59:59'),
(88, 33, '3333', NULL, '2025-11-23 10:08:47', '2025-11-23 10:54:20'),
(89, 33, 'sdds', NULL, '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(90, 34, 'dsds', NULL, '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(91, 34, 'dsds', NULL, '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(92, 35, '33', NULL, '2025-11-23 10:08:47', '2025-11-23 10:54:20'),
(93, 35, 'dsds', NULL, '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(94, 36, 'sd', NULL, '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(95, 36, 'ds', NULL, '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(96, 36, 'dsds', NULL, '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(97, 37, 'ds', NULL, '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(98, 38, 'ds', NULL, '2025-11-23 10:08:47', '2025-11-23 10:08:47'),
(99, 33, '33333333333333333333', NULL, '2025-11-23 11:01:59', '2025-11-23 11:01:59'),
(100, 39, '333333', NULL, '2025-11-23 11:01:59', '2025-11-23 11:01:59'),
(101, 35, '4444', NULL, '2025-11-23 11:01:59', '2025-11-23 11:01:59'),
(102, 40, '333', NULL, '2025-11-23 11:01:59', '2025-11-23 11:01:59'),
(103, 33, '55555', NULL, '2025-11-23 11:04:37', '2025-11-23 11:04:37'),
(106, 44, 'sasasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(107, 44, '2121', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(108, 44, 'xzxzxz', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(109, 45, 'sasasasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(110, 45, 'assa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(111, 46, 'sasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(112, 46, 'sasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(113, 47, 'sasasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(114, 47, 'saas', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(115, 47, 'sasasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(116, 48, 'sasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(117, 48, 'sasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(118, 49, 'sasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(119, 49, 'sasa', NULL, '2025-11-23 11:16:42', '2025-11-23 11:16:42'),
(122, 51, 'new tab', NULL, '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(123, 52, 'new tab', NULL, '2025-11-23 12:47:39', '2025-11-23 12:47:39'),
(124, 53, 'Quantity', NULL, '2025-11-25 10:46:00', '2025-11-25 10:46:00'),
(125, 54, 'wqqw', NULL, '2025-11-25 10:46:00', '2025-11-25 10:46:00'),
(126, 55, 'Quantity', NULL, '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(127, 55, 'Natural', NULL, '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(128, 55, 'Colors', NULL, '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(129, 55, 'Add Location', NULL, '2025-12-09 11:54:13', '2025-12-09 11:54:13'),
(130, 55, 'Add Color', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(131, 56, 'Quantity', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(132, 56, 'Natural', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(133, 56, 'Colors', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(134, 57, 'Natural :', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(135, 57, 'Colors :', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(136, 58, 'Item No.', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(137, 58, 'item Name', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(138, 58, 'Description', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(139, 58, 'Available Colors', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(140, 58, 'Product Size', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(141, 58, 'Max. Imprint Area', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(142, 58, 'Quality / Material', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(143, 59, 'Drop Ship Charge', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(144, 59, 'Single Poly Bag', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(145, 59, 'Artwork Charges', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(146, 59, 'PMS Match', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(147, 59, 'Metallic Ink & Glow Ink	$ 0.19 (V)', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(148, 60, 'Qty / Box', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(149, 60, 'Box Weight', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(150, 60, 'Box Dimensions', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(151, 60, 'Country of Origin', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(152, 60, 'Decorated in', NULL, '2025-12-09 11:54:14', '2025-12-09 11:54:14'),
(153, 61, 'Quantity', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(154, 61, 'Natural', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(155, 61, 'Color', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(156, 62, 'Natural', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(157, 62, 'color', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(158, 63, 'Item No.', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(159, 63, 'Item Name', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(160, 63, 'Description', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(161, 64, 'additional color', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(162, 64, 'Single Poly Bag', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(163, 64, 'location charges', NULL, '2025-12-13 12:21:37', '2025-12-13 12:21:37'),
(164, 65, 'Quantity', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(165, 65, 'Natural', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(166, 65, 'Color', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(167, 66, 'Quantity', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(168, 66, 'Natural', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(169, 67, 'Natural :', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(170, 67, 'Colors :', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(171, 68, 'Item No.', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(172, 68, 'Item Name', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(173, 68, 'Description', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(174, 68, 'Available Colors', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(175, 69, 'Drop Ship Charge', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(176, 69, 'Single Poly Bag', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(177, 69, 'Artwork Charges', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(178, 70, 'Qty / Box', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(179, 70, 'Box Weight', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(180, 70, 'Box Dimensions', NULL, '2025-12-13 13:29:10', '2025-12-13 13:29:10'),
(181, 71, 'Quantity', NULL, '2025-12-13 15:17:07', '2025-12-13 15:17:07'),
(182, 72, 'wqqw', NULL, '2025-12-13 15:17:07', '2025-12-13 15:17:07'),
(183, 73, 'Quantity', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(184, 73, 'Natural', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(185, 73, 'Color', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(186, 74, 'Natural', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(187, 74, 'Colors', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(188, 75, 'Item No.', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(189, 75, 'Material', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(190, 75, 'Description', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(191, 75, 'Item Name', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(192, 76, 'Drop Ship Charge', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(193, 76, 'Single Poly Bag', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44'),
(194, 76, 'Artwork Charges', NULL, '2025-12-15 13:17:44', '2025-12-15 13:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2025-11-18 11:48:10', '2025-11-18 11:48:10'),
(2, 'User', '2025-11-18 11:48:10', '2025-11-18 11:48:10'),
(5, 'xzxz', '2025-11-18 12:17:14', '2025-11-18 12:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hJNYlleTZjcfwBLOcJke1uTaE5yt9yHTJAnHBbrS', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMFFNQ3hGU215Tm9rbnY1WjBjTmFUdXdITE96ZUxPMnA0V21PUzFoMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1765805082),
('U7FDPUwVzpa44QEr0aNZpO2iJEs4J1dzmrUiL2Xy', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibDdRaUZidEh3Y3JvMEFtZDhuVFNZeGE3TVllMHVnRUR6WkRZQWIxTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXRhaWwvMTYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1765823267);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$s8MVu1B9NpTubAm5tX.u6OcoPN3YBCOLi5RemgdWsVuu0tWtd25yO', NULL, 1, '2025-11-18 11:48:11', '2025-11-25 11:53:30');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_prices_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tabs`
--
ALTER TABLE `product_tabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tabs_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tab_cells`
--
ALTER TABLE `product_tab_cells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tab_cells_row_id_foreign` (`row_id`);

--
-- Indexes for table `product_tab_rows`
--
ALTER TABLE `product_tab_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tab_rows_tab_id_foreign` (`tab_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_tabs`
--
ALTER TABLE `product_tabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product_tab_cells`
--
ALTER TABLE `product_tab_cells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=635;

--
-- AUTO_INCREMENT for table `product_tab_rows`
--
ALTER TABLE `product_tab_rows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD CONSTRAINT `product_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tabs`
--
ALTER TABLE `product_tabs`
  ADD CONSTRAINT `product_tabs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tab_cells`
--
ALTER TABLE `product_tab_cells`
  ADD CONSTRAINT `product_tab_cells_row_id_foreign` FOREIGN KEY (`row_id`) REFERENCES `product_tab_rows` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tab_rows`
--
ALTER TABLE `product_tab_rows`
  ADD CONSTRAINT `product_tab_rows_tab_id_foreign` FOREIGN KEY (`tab_id`) REFERENCES `product_tabs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
