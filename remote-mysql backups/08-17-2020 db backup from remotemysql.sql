-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2020 at 02:04 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dNkgnMHIt3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `business_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin1@gmail.com', NULL, '$2y$10$yk3rp8CM4gjrMnWoy6iFROsoJLY0320fMhAVtZ152SFgnMoRUfWsa', 'fJXr7aqmP6p34BeSxe7ewmC4bSU54WY4RJHIAmIYPbzhNDQG1eh9nGC7tN5H', '2020-08-15 12:30:36', '2020-08-15 12:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookables`
--

CREATE TABLE `bookables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `bookable_template_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookables`
--

INSERT INTO `bookables` (`id`, `admin_id`, `business_id`, `bookable_template_id`, `name`, `image`, `description`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'Avengers: Endgame', '1597629664.jpg', 'Avengers: Endgame is a superhero movie based on the Marvel Comics superhero team the Avengers, produced by Marvel Studios and set for distribution by Walt Disney Studios Motion Pictures.', '2020-09-01 09:00:00', '2020-09-01 12:00:00', '2020-08-17 02:01:04', '2020-08-17 02:01:04'),
(2, 1, 1, 3, 'Train to Busan', '1597630548.jpg', 'Train to Busan is a harrowing zombie horror-thriller that follows a group of terrified passengers fighting their way through a countrywide viral outbreak, trapped ...', '2020-09-01 14:30:00', '2020-09-01 16:30:00', '2020-08-17 02:15:48', '2020-08-17 02:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `bookable_templates`
--

CREATE TABLE `bookable_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `children` longtext COLLATE utf8mb4_unicode_ci,
  `bookable` longtext COLLATE utf8mb4_unicode_ci,
  `total_bookable` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookable_templates`
--

INSERT INTO `bookable_templates` (`id`, `name`, `notes`, `category`, `admin_id`, `business_id`, `children`, `bookable`, `total_bookable`, `created_at`, `updated_at`) VALUES
(2, 'Cinema 1', 'Cinema 1 with 80 seats', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":10,\"row\":10}]', '{\"c_1_1\":{\"name\":\"a1\",\"price\":\"100\"},\"c_1_2\":{\"name\":\"a2\",\"price\":\"100\"},\"c_1_3\":{\"name\":\"a3\",\"price\":\"100\"},\"c_1_4\":{\"name\":\"a4\",\"price\":\"100\"},\"c_1_10\":{\"name\":\"a8\",\"price\":\"100\"},\"c_1_9\":{\"name\":\"a7\",\"price\":\"100\"},\"c_1_8\":{\"name\":\"a6\",\"price\":\"100\"},\"c_1_7\":{\"name\":\"a5\",\"price\":\"100\"},\"c_1_11\":{\"name\":\"b1\",\"price\":\"100\"},\"c_1_12\":{\"name\":\"b2\",\"price\":\"100\"},\"c_1_13\":{\"name\":\"b3\",\"price\":\"100\"},\"c_1_14\":{\"name\":\"b4\",\"price\":\"100\"},\"c_1_17\":{\"name\":\"b5\",\"price\":\"100\"},\"c_1_18\":{\"name\":\"b6\",\"price\":\"100\"},\"c_1_19\":{\"name\":\"b7\",\"price\":\"100\"},\"c_1_20\":{\"name\":\"b8\",\"price\":\"100\"},\"c_1_30\":{\"name\":\"c8\",\"price\":\"100\"},\"c_1_29\":{\"name\":\"c7\",\"price\":\"100\"},\"c_1_28\":{\"name\":\"c6\",\"price\":\"100\"},\"c_1_27\":{\"name\":\"c5\",\"price\":\"100\"},\"c_1_21\":{\"name\":\"c1\",\"price\":\"100\"},\"c_1_22\":{\"name\":\"c2\",\"price\":\"100\"},\"c_1_23\":{\"name\":\"c3\",\"price\":\"100\"},\"c_1_24\":{\"name\":\"c4\",\"price\":\"100\"},\"c_1_37\":{\"name\":\"d5\",\"price\":\"100\"},\"c_1_38\":{\"name\":\"d6\",\"price\":\"100\"},\"c_1_39\":{\"name\":\"d7\",\"price\":\"100\"},\"c_1_40\":{\"name\":\"d8\",\"price\":\"100\"},\"c_1_34\":{\"name\":\"d4\",\"price\":\"100\"},\"c_1_33\":{\"name\":\"d3\",\"price\":\"100\"},\"c_1_32\":{\"name\":\"d2\",\"price\":\"100\"},\"c_1_31\":{\"name\":\"d1\",\"price\":\"100\"},\"c_1_41\":{\"name\":\"e1\",\"price\":\"100\"},\"c_1_42\":{\"name\":\"e2\",\"price\":\"100\"},\"c_1_43\":{\"name\":\"e3\",\"price\":\"100\"},\"c_1_44\":{\"name\":\"e4\",\"price\":\"100\"},\"c_1_47\":{\"name\":\"e5\",\"price\":\"100\"},\"c_1_48\":{\"name\":\"e6\",\"price\":\"100\"},\"c_1_49\":{\"name\":\"e7\",\"price\":\"100\"},\"c_1_50\":{\"name\":\"e8\",\"price\":\"100\"},\"c_1_51\":{\"name\":\"f1\",\"price\":\"100\"},\"c_1_52\":{\"name\":\"f2\",\"price\":\"100\"},\"c_1_53\":{\"name\":\"f3\",\"price\":\"100\"},\"c_1_54\":{\"name\":\"f4\",\"price\":\"100\"},\"c_1_57\":{\"name\":\"f5\",\"price\":\"100\"},\"c_1_58\":{\"name\":\"f6\",\"price\":\"100\"},\"c_1_59\":{\"name\":\"f7\",\"price\":\"100\"},\"c_1_60\":{\"name\":\"f8\",\"price\":\"100\"},\"c_1_70\":{\"name\":\"g8\",\"price\":\"100\"},\"c_1_69\":{\"name\":\"g7\",\"price\":\"100\"},\"c_1_68\":{\"name\":\"g6\",\"price\":\"100\"},\"c_1_67\":{\"name\":\"g5\",\"price\":\"100\"},\"c_1_64\":{\"name\":\"g4\",\"price\":\"100\"},\"c_1_63\":{\"name\":\"g3\",\"price\":\"100\"},\"c_1_62\":{\"name\":\"g2\",\"price\":\"100\"},\"c_1_61\":{\"name\":\"g1\",\"price\":\"100\"},\"c_1_71\":{\"name\":\"h1\",\"price\":\"100\"},\"c_1_72\":{\"name\":\"h2\",\"price\":\"100\"},\"c_1_73\":{\"name\":\"h3\",\"price\":\"100\"},\"c_1_74\":{\"name\":\"h4\",\"price\":\"100\"},\"c_1_77\":{\"name\":\"h5\",\"price\":\"100\"},\"c_1_79\":{\"name\":\"h7\",\"price\":\"100\"},\"c_1_80\":{\"name\":\"h8\",\"price\":\"100\"},\"c_1_78\":{\"name\":\"h6\",\"price\":\"100\"},\"c_1_81\":{\"name\":\"i1\",\"price\":\"100\"},\"c_1_82\":{\"name\":\"i2\",\"price\":\"100\"},\"c_1_83\":{\"name\":\"i3\",\"price\":\"100\"},\"c_1_84\":{\"name\":\"i4\",\"price\":\"100\"},\"c_1_87\":{\"name\":\"i5\",\"price\":\"100\"},\"c_1_88\":{\"name\":\"i6\",\"price\":\"100\"},\"c_1_89\":{\"name\":\"i7\",\"price\":\"100\"},\"c_1_90\":{\"name\":\"i8\",\"price\":\"100\"},\"c_1_91\":{\"name\":\"j1\",\"price\":\"100\"},\"c_1_92\":{\"name\":\"j2\",\"price\":\"100\"},\"c_1_93\":{\"name\":\"j3\",\"price\":\"100\"},\"c_1_94\":{\"name\":\"j4\",\"price\":\"100\"},\"c_1_97\":{\"name\":\"j5\",\"price\":\"100\"},\"c_1_98\":{\"name\":\"j6\",\"price\":\"100\"},\"c_1_99\":{\"name\":\"j7\",\"price\":\"100\"},\"c_1_100\":{\"name\":\"j8\",\"price\":\"100\"}}', 80, '2020-08-17 01:41:01', '2020-08-17 01:55:24'),
(3, 'Cinema 2', 'Cinema 2 with 64 seats', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":10,\"row\":10}]', '{\"c_1_1\":{\"name\":\"a1\",\"price\":\"120\"},\"c_1_2\":{\"name\":\"a2\",\"price\":\"120\"},\"c_1_3\":{\"name\":\"a3\",\"price\":\"120\"},\"c_1_4\":{\"name\":\"a4\",\"price\":\"120\"},\"c_1_10\":{\"name\":\"a8\",\"price\":\"120\"},\"c_1_9\":{\"name\":\"a7\",\"price\":\"120\"},\"c_1_8\":{\"name\":\"a6\",\"price\":\"120\"},\"c_1_7\":{\"name\":\"a5\",\"price\":\"120\"},\"c_1_11\":{\"name\":\"b1\",\"price\":\"120\"},\"c_1_12\":{\"name\":\"b2\",\"price\":\"120\"},\"c_1_13\":{\"name\":\"b3\",\"price\":\"120\"},\"c_1_14\":{\"name\":\"b4\",\"price\":\"120\"},\"c_1_17\":{\"name\":\"b5\",\"price\":\"120\"},\"c_1_18\":{\"name\":\"b6\",\"price\":\"120\"},\"c_1_19\":{\"name\":\"b7\",\"price\":\"120\"},\"c_1_20\":{\"name\":\"b8\",\"price\":\"120\"},\"c_1_30\":{\"name\":\"c8\",\"price\":\"120\"},\"c_1_29\":{\"name\":\"c7\",\"price\":\"120\"},\"c_1_28\":{\"name\":\"c6\",\"price\":\"120\"},\"c_1_27\":{\"name\":\"c5\",\"price\":\"120\"},\"c_1_21\":{\"name\":\"c1\",\"price\":\"120\"},\"c_1_22\":{\"name\":\"c2\",\"price\":\"120\"},\"c_1_23\":{\"name\":\"c3\",\"price\":\"120\"},\"c_1_24\":{\"name\":\"c4\",\"price\":\"120\"},\"c_1_37\":{\"name\":\"d5\",\"price\":\"120\"},\"c_1_38\":{\"name\":\"d6\",\"price\":\"120\"},\"c_1_39\":{\"name\":\"d7\",\"price\":\"120\"},\"c_1_40\":{\"name\":\"d8\",\"price\":\"120\"},\"c_1_34\":{\"name\":\"d4\",\"price\":\"120\"},\"c_1_33\":{\"name\":\"d3\",\"price\":\"120\"},\"c_1_32\":{\"name\":\"d2\",\"price\":\"120\"},\"c_1_31\":{\"name\":\"d1\",\"price\":\"120\"},\"c_1_70\":{\"name\":\"e7\",\"price\":\"120\"},\"c_1_69\":{\"name\":\"e7\",\"price\":\"120\"},\"c_1_68\":{\"name\":\"e6\",\"price\":\"120\"},\"c_1_67\":{\"name\":\"e5\",\"price\":\"120\"},\"c_1_64\":{\"name\":\"e4\",\"price\":\"120\"},\"c_1_71\":{\"name\":\"f1\",\"price\":\"120\"},\"c_1_72\":{\"name\":\"f2\",\"price\":\"120\"},\"c_1_73\":{\"name\":\"f3\",\"price\":\"120\"},\"c_1_74\":{\"name\":\"f4\",\"price\":\"120\"},\"c_1_77\":{\"name\":\"f5\",\"price\":\"120\"},\"c_1_79\":{\"name\":\"f7\",\"price\":\"120\"},\"c_1_80\":{\"name\":\"f7\",\"price\":\"120\"},\"c_1_78\":{\"name\":\"f6\",\"price\":\"120\"},\"c_1_81\":{\"name\":\"g1\",\"price\":\"120\"},\"c_1_82\":{\"name\":\"g2\",\"price\":\"120\"},\"c_1_83\":{\"name\":\"g3\",\"price\":\"120\"},\"c_1_84\":{\"name\":\"g4\",\"price\":\"120\"},\"c_1_87\":{\"name\":\"g5\",\"price\":\"120\"},\"c_1_88\":{\"name\":\"g6\",\"price\":\"120\"},\"c_1_89\":{\"name\":\"g7\",\"price\":\"120\"},\"c_1_90\":{\"name\":\"g7\",\"price\":\"120\"},\"c_1_91\":{\"name\":\"h1\",\"price\":\"120\"},\"c_1_92\":{\"name\":\"h2\",\"price\":\"120\"},\"c_1_93\":{\"name\":\"h3\",\"price\":\"120\"},\"c_1_94\":{\"name\":\"h4\",\"price\":\"120\"},\"c_1_97\":{\"name\":\"h5\",\"price\":\"120\"},\"c_1_98\":{\"name\":\"h6\",\"price\":\"120\"},\"c_1_99\":{\"name\":\"h7\",\"price\":\"120\"},\"c_1_100\":{\"name\":\"h7\",\"price\":\"120\"},\"c_1_61\":{\"name\":\"e1\",\"price\":\"120\"},\"c_1_62\":{\"name\":\"e2\",\"price\":\"120\"},\"c_1_63\":{\"name\":\"e3\",\"price\":\"120\"}}', 64, '2020-08-17 02:01:46', '2020-08-17 02:11:01'),
(4, 'Cinema 3', 'Cinema 3 with 64 seats', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":10,\"row\":10}]', '{\"c_1_1\":{\"name\":\"a1\",\"price\":\"120\"},\"c_1_2\":{\"name\":\"a2\",\"price\":\"120\"},\"c_1_3\":{\"name\":\"a3\",\"price\":\"120\"},\"c_1_4\":{\"name\":\"a4\",\"price\":\"120\"},\"c_1_10\":{\"name\":\"a8\",\"price\":\"120\"},\"c_1_9\":{\"name\":\"a7\",\"price\":\"120\"},\"c_1_8\":{\"name\":\"a6\",\"price\":\"120\"},\"c_1_7\":{\"name\":\"a5\",\"price\":\"120\"},\"c_1_11\":{\"name\":\"b1\",\"price\":\"120\"},\"c_1_12\":{\"name\":\"b2\",\"price\":\"120\"},\"c_1_13\":{\"name\":\"b3\",\"price\":\"120\"},\"c_1_14\":{\"name\":\"b4\",\"price\":\"120\"},\"c_1_17\":{\"name\":\"b5\",\"price\":\"120\"},\"c_1_18\":{\"name\":\"b6\",\"price\":\"120\"},\"c_1_19\":{\"name\":\"b7\",\"price\":\"120\"},\"c_1_20\":{\"name\":\"b8\",\"price\":\"120\"},\"c_1_30\":{\"name\":\"c8\",\"price\":\"120\"},\"c_1_29\":{\"name\":\"c7\",\"price\":\"120\"},\"c_1_28\":{\"name\":\"c6\",\"price\":\"120\"},\"c_1_27\":{\"name\":\"c5\",\"price\":\"120\"},\"c_1_21\":{\"name\":\"c1\",\"price\":\"120\"},\"c_1_22\":{\"name\":\"c2\",\"price\":\"120\"},\"c_1_23\":{\"name\":\"c3\",\"price\":\"120\"},\"c_1_24\":{\"name\":\"c4\",\"price\":\"120\"},\"c_1_37\":{\"name\":\"d5\",\"price\":\"120\"},\"c_1_38\":{\"name\":\"d6\",\"price\":\"120\"},\"c_1_39\":{\"name\":\"d7\",\"price\":\"120\"},\"c_1_40\":{\"name\":\"d8\",\"price\":\"120\"},\"c_1_34\":{\"name\":\"d4\",\"price\":\"120\"},\"c_1_33\":{\"name\":\"d3\",\"price\":\"120\"},\"c_1_32\":{\"name\":\"d2\",\"price\":\"120\"},\"c_1_31\":{\"name\":\"d1\",\"price\":\"120\"},\"c_1_70\":{\"name\":\"e7\",\"price\":\"120\"},\"c_1_69\":{\"name\":\"e7\",\"price\":\"120\"},\"c_1_68\":{\"name\":\"e6\",\"price\":\"120\"},\"c_1_67\":{\"name\":\"e5\",\"price\":\"120\"},\"c_1_64\":{\"name\":\"e4\",\"price\":\"120\"},\"c_1_71\":{\"name\":\"f1\",\"price\":\"120\"},\"c_1_72\":{\"name\":\"f2\",\"price\":\"120\"},\"c_1_73\":{\"name\":\"f3\",\"price\":\"120\"},\"c_1_74\":{\"name\":\"f4\",\"price\":\"120\"},\"c_1_77\":{\"name\":\"f5\",\"price\":\"120\"},\"c_1_79\":{\"name\":\"f7\",\"price\":\"120\"},\"c_1_80\":{\"name\":\"f7\",\"price\":\"120\"},\"c_1_78\":{\"name\":\"f6\",\"price\":\"120\"},\"c_1_81\":{\"name\":\"g1\",\"price\":\"120\"},\"c_1_82\":{\"name\":\"g2\",\"price\":\"120\"},\"c_1_83\":{\"name\":\"g3\",\"price\":\"120\"},\"c_1_84\":{\"name\":\"g4\",\"price\":\"120\"},\"c_1_87\":{\"name\":\"g5\",\"price\":\"120\"},\"c_1_88\":{\"name\":\"g6\",\"price\":\"120\"},\"c_1_89\":{\"name\":\"g7\",\"price\":\"120\"},\"c_1_90\":{\"name\":\"g7\",\"price\":\"120\"},\"c_1_91\":{\"name\":\"h1\",\"price\":\"120\"},\"c_1_92\":{\"name\":\"h2\",\"price\":\"120\"},\"c_1_93\":{\"name\":\"h3\",\"price\":\"120\"},\"c_1_94\":{\"name\":\"h4\",\"price\":\"120\"},\"c_1_97\":{\"name\":\"h5\",\"price\":\"120\"},\"c_1_98\":{\"name\":\"h6\",\"price\":\"120\"},\"c_1_99\":{\"name\":\"h7\",\"price\":\"120\"},\"c_1_100\":{\"name\":\"h7\",\"price\":\"120\"},\"c_1_61\":{\"name\":\"e1\",\"price\":\"120\"},\"c_1_62\":{\"name\":\"e2\",\"price\":\"120\"},\"c_1_63\":{\"name\":\"e3\",\"price\":\"120\"}}', 64, '2020-08-17 03:29:12', '2020-08-17 03:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `admin_id`, `name`, `address`, `google_map`, `details`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Market Market Cinema', 'Taguig City', NULL, NULL, '2020-08-15 12:30:35', '2020-08-15 12:30:35');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_21_025914_create_businesses_table', 1),
(5, '2019_12_21_025915_create_admins_table', 1),
(6, '2019_12_21_031120_create_admin_password_resets', 1),
(7, '2019_12_28_095728_create_bookable_templates_table', 1),
(8, '2019_12_30_125338_create_bookables_table', 1),
(9, '2020_01_02_055755_create_payments_table', 1),
(10, '2020_01_02_055756_create_reservations_table', 1),
(11, '2020_01_05_032304_create_tag_tables', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookable_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `bookable_id`, `admin_id`, `user_id`, `total`, `method`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 2, 500, 'online_payment', '2020-08-17 02:56:17', '2020-08-17 02:56:17'),
(2, 2, NULL, 2, 240, 'online_payment', '2020-08-17 03:05:36', '2020-08-17 03:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `bookable_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bookable_item_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `payment_id`, `bookable_id`, `admin_id`, `user_id`, `bookable_item_name`, `cell_id`, `price`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 2, 'f4', 'c_1_54', 100, 'SQR0G3Ua', '2020-08-17 02:56:18', '2020-08-17 02:56:18'),
(2, 1, 1, NULL, 2, 'f3', 'c_1_53', 100, 'xxBL6i7m', '2020-08-17 02:56:19', '2020-08-17 02:56:19'),
(3, 1, 1, NULL, 2, 'f7', 'c_1_59', 100, 'tBB8Cubh', '2020-08-17 02:56:19', '2020-08-17 02:56:19'),
(4, 1, 1, NULL, 2, 'f6', 'c_1_58', 100, '1mjXObPi', '2020-08-17 02:56:20', '2020-08-17 02:56:20'),
(5, 1, 1, NULL, 2, 'f5', 'c_1_57', 100, 'LgRXdNHT', '2020-08-17 02:56:21', '2020-08-17 02:56:21'),
(6, 2, 2, NULL, 2, 'e3', 'c_1_63', 120, '7f6CdcZ5', '2020-08-17 03:05:37', '2020-08-17 03:05:37'),
(7, 2, 2, NULL, 2, 'e4', 'c_1_64', 120, 'mo5fK5ww', '2020-08-17 03:05:38', '2020-08-17 03:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`tag_id`, `taggable_type`, `taggable_id`) VALUES
(1, 'Admin', 3),
(1, 'App\\Admin', 1),
(2, 'App\\Admin', 1),
(3, 'App\\Admin', 1),
(4, 'App\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` json NOT NULL,
  `slug` json NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `type`, `order_column`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"bookable_schedule\"}', '{\"en\": \"bookable-schedule\"}', NULL, 1, '2020-08-15 12:30:36', '2020-08-15 12:30:36'),
(2, '{\"en\": \"bookable_template\"}', '{\"en\": \"bookable-template\"}', NULL, 2, '2020-08-15 12:30:37', '2020-08-15 12:30:37'),
(3, '{\"en\": \"staff\"}', '{\"en\": \"staff\"}', NULL, 3, '2020-08-15 12:30:37', '2020-08-15 12:30:37'),
(4, '{\"en\": \"verify_ticket\"}', '{\"en\": \"verify-ticket\"}', NULL, 4, '2020-08-15 12:30:38', '2020-08-15 12:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credits` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `email_verified_at`, `password`, `credits`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ryan bang', 'Makati', 'udomoo31@gmail.com', NULL, '$2y$10$3aP00ddptasQ8dnNLdgYpu8CL9oj81an/GI6IBMYG.bPq4YIvx/B.', 0, NULL, '2020-08-15 12:25:56', '2020-08-15 12:28:29'),
(2, 'user1', NULL, 'user1@gmail.com', NULL, '$2y$10$MmvyRgCzmN3LSOTd78YReen5MPbq.jb0gK7cO1K4W55Ljncy1Kf8S', 260, 'B3MB8Jj8Iq7a2UABQAQG5NtROhDMPZ7kzHNfKBtQgk8oScSliWBZqnOcfVDR', '2020-08-17 02:39:50', '2020-08-17 03:05:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_business_id_foreign` (`business_id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `bookables`
--
ALTER TABLE `bookables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookables_admin_id_foreign` (`admin_id`),
  ADD KEY `bookables_business_id_foreign` (`business_id`),
  ADD KEY `bookables_bookable_template_id_foreign` (`bookable_template_id`);

--
-- Indexes for table `bookable_templates`
--
ALTER TABLE `bookable_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookable_templates_admin_id_foreign` (`admin_id`),
  ADD KEY `bookable_templates_business_id_foreign` (`business_id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_bookable_id_foreign` (`bookable_id`),
  ADD KEY `payments_admin_id_foreign` (`admin_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservations_code_unique` (`code`),
  ADD KEY `reservations_payment_id_foreign` (`payment_id`),
  ADD KEY `reservations_bookable_id_foreign` (`bookable_id`),
  ADD KEY `reservations_admin_id_foreign` (`admin_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`),
  ADD KEY `taggables_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookables`
--
ALTER TABLE `bookables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookable_templates`
--
ALTER TABLE `bookable_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`);

--
-- Constraints for table `bookables`
--
ALTER TABLE `bookables`
  ADD CONSTRAINT `bookables_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `bookables_bookable_template_id_foreign` FOREIGN KEY (`bookable_template_id`) REFERENCES `bookable_templates` (`id`),
  ADD CONSTRAINT `bookables_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`);

--
-- Constraints for table `bookable_templates`
--
ALTER TABLE `bookable_templates`
  ADD CONSTRAINT `bookable_templates_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `bookable_templates_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `payments_bookable_id_foreign` FOREIGN KEY (`bookable_id`) REFERENCES `bookables` (`id`),
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `reservations_bookable_id_foreign` FOREIGN KEY (`bookable_id`) REFERENCES `bookables` (`id`),
  ADD CONSTRAINT `reservations_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
