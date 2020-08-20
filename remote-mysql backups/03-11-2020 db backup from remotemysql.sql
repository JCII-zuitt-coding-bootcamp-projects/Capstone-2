-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2020 at 05:31 AM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgTKwMD8MQ`
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
(1, 1, 'Admin1 John', 'admin1@gmail.com', NULL, '$2y$10$0G0PcQJobG9xLuwpS.GaRuiD41PttAlIYH.Ca7pWrRPZbmnhqhrfO', NULL, '2020-01-06 01:05:08', '2020-01-06 01:05:08'),
(2, 1, 'Admin 2 Jerome', 'admin2@gmail.com', NULL, '$2y$10$oJy/o3QIrMxsUt5vQqAh6OIhQtNOsu4xcuszMk51ZvWFFeGvQYazS', NULL, '2020-01-06 02:19:56', '2020-02-17 03:00:44'),
(3, 2, 'Admin 1 CJ', 'admin1nba@gmail.com', NULL, '$2y$10$7ZZbObIci8eCy6aAjiCZbufuQHy0aO.wH5x3HrqMXUBafIlCfL8Ai', NULL, '2020-01-06 05:53:31', '2020-01-06 05:54:11'),
(4, 3, 'Admin 1 SM aura cinema', 'smadmin1@gmail.com', NULL, '$2y$10$pirjHs8z3WxtPZmzw46FceGqZVFtAroP5MXh74qAKcseRFaHYuBqi', NULL, '2020-01-06 07:56:43', '2020-01-06 07:56:43'),
(5, 3, 'Admin 2 SM aura', 'smadmin2@gmail.com', NULL, '$2y$10$5PkzW1PG9VC1tsjLvOxvIOmwgKOonI/a3aB5sN0Lm51tXJiEiOkN2', NULL, '2020-01-06 07:58:54', '2020-01-06 07:58:54'),
(6, 1, 'Miss Chris', 'mc@sample.com', NULL, '$2y$10$RMkemrBkieEDYt8e/0QsmOFFusTzniLbK7Ud8Wt33MKNYfnrqIZBq', '2fU6PWa7K2G5HxrWAJAyC7D9ksGw6tEPw4YHDPKxpuzLAm3dZUn4HPlpMZ8s', '2020-01-07 07:47:36', '2020-01-07 07:47:36'),
(7, 4, 'I Test', 'test@gmail.com', NULL, '$2y$10$qLjdw7xDB5pWn8Ca7xWoWOAeSZqJapdsUBoiAuEI6Vwckb7NTGNmC', NULL, '2020-02-13 12:40:27', '2020-02-13 12:40:27'),
(8, 5, 'Admin 1', 'aura@gmail.com', NULL, '$2y$10$2QTyCT86EkSCfYeUCGumn.s.vewn3xG82LBSPqoXiwCZXrg41a8kS', NULL, '2020-02-14 07:10:38', '2020-02-14 07:10:38'),
(9, 6, 'To delete', 'delete@gmail.com', NULL, '$2y$10$aFTxlaU4s3jYwR3AakEa7uOWydSluGo0TaeWk48I1.LPAs1ALfg5K', NULL, '2020-02-17 03:23:06', '2020-02-17 03:23:06'),
(10, 6, 'Delete 2', 'delete2@gmail.com', NULL, '$2y$10$LrMqPNjQ.GuKscuORDkP2.kQOMIBeP9hZwJfnnoQ8LFCcXx0D9Su2', NULL, '2020-02-17 03:39:16', '2020-02-17 03:39:16');

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
(1, 1, 1, 1, 'Avengers: Endgame', '1578275064.jpg', 'After Thanos, an intergalactic warlord, disintegrates half of the universe, the Avengers must reunite and assemble again to reinvigorate their trounced allies and restore balance.', '2020-03-01 13:00:00', '2020-03-01 16:00:00', '2020-01-06 01:44:24', '2020-01-06 01:44:24'),
(3, 1, 1, 3, 'Deadpool 2', '15782754.jpg', 'Deadpool protects a young mutant Russell from the authorities and gets thrown in prison. However, he escapes and forms a team of mutants to prevent a time-travelling mercenary from killing Russell.', '2020-03-02 09:00:00', '2020-03-02 11:00:00', '2020-01-06 02:58:17', '2020-01-06 02:58:17');

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
(1, 'Cinema 1', 'Cinema 1 with 90 seats', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":11,\"row\":10}]', '{\"c_1_1\":{\"name\":\"A1\",\"price\":\"200\"},\"c_1_2\":{\"name\":\"A2\",\"price\":\"200\"},\"c_1_3\":{\"name\":\"A3\",\"price\":\"200\"},\"c_1_5\":{\"name\":\"A4\",\"price\":\"200\"},\"c_1_6\":{\"name\":\"A5\",\"price\":\"200\"},\"c_1_7\":{\"name\":\"A6\",\"price\":\"200\"},\"c_1_9\":{\"name\":\"A7\",\"price\":\"200\"},\"c_1_10\":{\"name\":\"A8\",\"price\":\"200\"},\"c_1_11\":{\"name\":\"A9\",\"price\":\"200\"},\"c_1_12\":{\"name\":\"B1\",\"price\":\"200\"},\"c_1_13\":{\"name\":\"B2\",\"price\":\"200\"},\"c_1_14\":{\"name\":\"B3\",\"price\":\"200\"},\"c_1_16\":{\"name\":\"B4\",\"price\":\"200\"},\"c_1_17\":{\"name\":\"B5\",\"price\":\"200\"},\"c_1_18\":{\"name\":\"B6\",\"price\":\"200\"},\"c_1_20\":{\"name\":\"B7\",\"price\":\"200\"},\"c_1_21\":{\"name\":\"B8\",\"price\":\"200\"},\"c_1_22\":{\"name\":\"B9\",\"price\":\"200\"},\"c_1_23\":{\"name\":\"C1\",\"price\":\"200\"},\"c_1_24\":{\"name\":\"C2\",\"price\":\"200\"},\"c_1_25\":{\"name\":\"C3\",\"price\":\"200\"},\"c_1_27\":{\"name\":\"C4\",\"price\":\"200\"},\"c_1_28\":{\"name\":\"C5\",\"price\":\"200\"},\"c_1_29\":{\"name\":\"C6\",\"price\":\"200\"},\"c_1_31\":{\"name\":\"C7\",\"price\":\"200\"},\"c_1_32\":{\"name\":\"C8\",\"price\":\"200\"},\"c_1_33\":{\"name\":\"C9\",\"price\":\"200\"},\"c_1_34\":{\"name\":\"D1\",\"price\":\"200\"},\"c_1_35\":{\"name\":\"D2\",\"price\":\"200\"},\"c_1_36\":{\"name\":\"D3\",\"price\":\"200\"},\"c_1_38\":{\"name\":\"D4\",\"price\":\"200\"},\"c_1_39\":{\"name\":\"D5\",\"price\":\"200\"},\"c_1_40\":{\"name\":\"D6\",\"price\":\"200\"},\"c_1_42\":{\"name\":\"D7\",\"price\":\"200\"},\"c_1_43\":{\"name\":\"D8\",\"price\":\"200\"},\"c_1_44\":{\"name\":\"D9\",\"price\":\"200\"},\"c_1_45\":{\"name\":\"E1\",\"price\":\"200\"},\"c_1_46\":{\"name\":\"E2\",\"price\":\"200\"},\"c_1_47\":{\"name\":\"E3\",\"price\":\"200\"},\"c_1_49\":{\"name\":\"E4\",\"price\":\"200\"},\"c_1_51\":{\"name\":\"E6\",\"price\":\"200\"},\"c_1_50\":{\"name\":\"E5\",\"price\":\"200\"},\"c_1_53\":{\"name\":\"E7\",\"price\":\"200\"},\"c_1_54\":{\"name\":\"E8\",\"price\":\"200\"},\"c_1_55\":{\"name\":\"E9\",\"price\":\"200\"},\"c_1_56\":{\"name\":\"F1\",\"price\":\"200\"},\"c_1_57\":{\"name\":\"F2\",\"price\":\"200\"},\"c_1_58\":{\"name\":\"F3\",\"price\":\"200\"},\"c_1_60\":{\"name\":\"F4\",\"price\":\"200\"},\"c_1_61\":{\"name\":\"F5\",\"price\":\"200\"},\"c_1_62\":{\"name\":\"F6\",\"price\":\"200\"},\"c_1_64\":{\"name\":\"F7\",\"price\":\"200\"},\"c_1_65\":{\"name\":\"F8\",\"price\":\"200\"},\"c_1_66\":{\"name\":\"F9\",\"price\":\"200\"},\"c_1_67\":{\"name\":\"G1\",\"price\":\"200\"},\"c_1_68\":{\"name\":\"G2\",\"price\":\"200\"},\"c_1_69\":{\"name\":\"G3\",\"price\":\"200\"},\"c_1_71\":{\"name\":\"G4\",\"price\":\"200\"},\"c_1_72\":{\"name\":\"G5\",\"price\":\"200\"},\"c_1_73\":{\"name\":\"G6\",\"price\":\"200\"},\"c_1_75\":{\"name\":\"G7\",\"price\":\"200\"},\"c_1_76\":{\"name\":\"G8\",\"price\":\"200\"},\"c_1_77\":{\"name\":\"G9\",\"price\":\"200\"},\"c_1_78\":{\"name\":\"H1\",\"price\":\"200\"},\"c_1_79\":{\"name\":\"H2\",\"price\":\"200\"},\"c_1_80\":{\"name\":\"H3\",\"price\":\"200\"},\"c_1_82\":{\"name\":\"H4\",\"price\":\"200\"},\"c_1_83\":{\"name\":\"H5\",\"price\":\"200\"},\"c_1_84\":{\"name\":\"H6\",\"price\":\"200\"},\"c_1_86\":{\"name\":\"H7\",\"price\":\"200\"},\"c_1_87\":{\"name\":\"H8\",\"price\":\"200\"},\"c_1_88\":{\"name\":\"H9\",\"price\":\"200\"},\"c_1_89\":{\"name\":\"I1\",\"price\":\"200\"},\"c_1_90\":{\"name\":\"I2\",\"price\":\"200\"},\"c_1_91\":{\"name\":\"I3\",\"price\":\"200\"},\"c_1_93\":{\"name\":\"I4\",\"price\":\"200\"},\"c_1_94\":{\"name\":\"I5\",\"price\":\"200\"},\"c_1_95\":{\"name\":\"I6\",\"price\":\"200\"},\"c_1_97\":{\"name\":\"I7\",\"price\":\"200\"},\"c_1_98\":{\"name\":\"I8\",\"price\":\"200\"},\"c_1_99\":{\"name\":\"I9\",\"price\":\"200\"},\"c_1_100\":{\"name\":\"J1\",\"price\":\"200\"},\"c_1_101\":{\"name\":\"J2\",\"price\":\"200\"},\"c_1_102\":{\"name\":\"J3\",\"price\":\"200\"},\"c_1_104\":{\"name\":\"J4\",\"price\":\"200\"},\"c_1_105\":{\"name\":\"J5\",\"price\":\"200\"},\"c_1_106\":{\"name\":\"J6\",\"price\":\"200\"},\"c_1_108\":{\"name\":\"J7\",\"price\":\"200\"},\"c_1_109\":{\"name\":\"J8\",\"price\":\"200\"},\"c_1_110\":{\"name\":\"J9\",\"price\":\"200\"}}', 90, '2020-01-06 01:16:36', '2020-01-06 01:38:56'),
(3, 'Cinema 2 Premium', 'Cinema 2 Premium template with 33 seats', 'seat', 2, 1, '[{\"parent_cell\":\"c_1\",\"col\":9,\"row\":9}]', '{\"c_1_3\":{\"name\":\"S1\",\"price\":\"500\"},\"c_1_4\":{\"name\":\"S2\",\"price\":\"500\"},\"c_1_6\":{\"name\":\"S3\",\"price\":\"500\"},\"c_1_7\":{\"name\":\"S4\",\"price\":\"500\"},\"c_1_10\":{\"name\":\"S5\",\"price\":\"500\"},\"c_1_11\":{\"name\":\"S6\",\"price\":\"500\"},\"c_1_22\":{\"name\":\"S9\",\"price\":\"500\"},\"c_1_23\":{\"name\":\"S10\",\"price\":\"500\"},\"c_1_24\":{\"name\":\"S11\",\"price\":\"500\"},\"c_1_17\":{\"name\":\"S7\",\"price\":\"500\"},\"c_1_18\":{\"name\":\"S8\",\"price\":\"500\"},\"c_1_28\":{\"name\":\"S12\",\"price\":\"500\"},\"c_1_29\":{\"name\":\"S13\",\"price\":\"500\"},\"c_1_35\":{\"name\":\"S16\",\"price\":\"500\"},\"c_1_36\":{\"name\":\"S17\",\"price\":\"500\"},\"c_1_34\":{\"name\":\"S15\",\"price\":\"500\"},\"c_1_30\":{\"name\":\"S14\",\"price\":\"500\"},\"c_1_40\":{\"name\":\"S18\",\"price\":\"500\"},\"c_1_41\":{\"name\":\"S19\",\"price\":\"500\"},\"c_1_42\":{\"name\":\"S20\",\"price\":\"500\"},\"c_1_52\":{\"name\":\"S23\",\"price\":\"500\"},\"c_1_53\":{\"name\":\"S24\",\"price\":\"500\"},\"c_1_47\":{\"name\":\"S21\",\"price\":\"500\"},\"c_1_48\":{\"name\":\"S22\",\"price\":\"500\"},\"c_1_58\":{\"name\":\"S25\",\"price\":\"500\"},\"c_1_59\":{\"name\":\"S26\",\"price\":\"500\"},\"c_1_60\":{\"name\":\"S27\",\"price\":\"500\"},\"c_1_64\":{\"name\":\"S28\",\"price\":\"500\"},\"c_1_66\":{\"name\":\"S30\",\"price\":\"500\"},\"c_1_70\":{\"name\":\"S31\",\"price\":\"500\"},\"c_1_71\":{\"name\":\"S32\",\"price\":\"500\"},\"c_1_72\":{\"name\":\"S33\",\"price\":\"500\"},\"c_1_65\":{\"name\":\"S29\",\"price\":\"500\"}}', 33, '2020-01-06 02:23:58', '2020-01-06 02:46:24'),
(4, 'Cinema 3', 'sdsdsdsd', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":4,\"row\":4},{\"parent_cell\":\"c_1_1\",\"col\":3,\"row\":3}]', '{}', 0, '2020-01-06 05:27:57', '2020-01-30 08:30:10'),
(5, 'Venue 1', 'Venue 1 template', 'seat', 3, 2, NULL, NULL, 0, '2020-01-06 05:54:50', '2020-01-06 05:54:50'),
(6, 'Cinema 1 Copy', 'Cinema 1 with 90 seats', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":11,\"row\":10}]', '{\"c_1_1\":{\"name\":\"A1\",\"price\":\"200\"},\"c_1_2\":{\"name\":\"A2\",\"price\":\"200\"},\"c_1_3\":{\"name\":\"A3\",\"price\":\"200\"},\"c_1_5\":{\"name\":\"A4\",\"price\":\"200\"},\"c_1_6\":{\"name\":\"A5\",\"price\":\"200\"},\"c_1_7\":{\"name\":\"A6\",\"price\":\"200\"},\"c_1_9\":{\"name\":\"A7\",\"price\":\"200\"},\"c_1_10\":{\"name\":\"A8\",\"price\":\"200\"},\"c_1_11\":{\"name\":\"A9\",\"price\":\"200\"},\"c_1_12\":{\"name\":\"B1\",\"price\":\"200\"},\"c_1_13\":{\"name\":\"B2\",\"price\":\"200\"},\"c_1_14\":{\"name\":\"B3\",\"price\":\"200\"},\"c_1_16\":{\"name\":\"B4\",\"price\":\"200\"},\"c_1_17\":{\"name\":\"B5\",\"price\":\"200\"},\"c_1_18\":{\"name\":\"B6\",\"price\":\"200\"},\"c_1_20\":{\"name\":\"B7\",\"price\":\"200\"},\"c_1_21\":{\"name\":\"B8\",\"price\":\"200\"},\"c_1_22\":{\"name\":\"B9\",\"price\":\"200\"},\"c_1_23\":{\"name\":\"C1\",\"price\":\"200\"},\"c_1_24\":{\"name\":\"C2\",\"price\":\"200\"},\"c_1_25\":{\"name\":\"C3\",\"price\":\"200\"},\"c_1_27\":{\"name\":\"C4\",\"price\":\"200\"},\"c_1_28\":{\"name\":\"C5\",\"price\":\"200\"},\"c_1_29\":{\"name\":\"C6\",\"price\":\"200\"},\"c_1_31\":{\"name\":\"C7\",\"price\":\"200\"},\"c_1_32\":{\"name\":\"C8\",\"price\":\"200\"},\"c_1_33\":{\"name\":\"C9\",\"price\":\"200\"},\"c_1_34\":{\"name\":\"D1\",\"price\":\"200\"},\"c_1_35\":{\"name\":\"D2\",\"price\":\"200\"},\"c_1_36\":{\"name\":\"D3\",\"price\":\"200\"},\"c_1_38\":{\"name\":\"D4\",\"price\":\"200\"},\"c_1_39\":{\"name\":\"D5\",\"price\":\"200\"},\"c_1_40\":{\"name\":\"D6\",\"price\":\"200\"},\"c_1_42\":{\"name\":\"D7\",\"price\":\"200\"},\"c_1_43\":{\"name\":\"D8\",\"price\":\"200\"},\"c_1_44\":{\"name\":\"D9\",\"price\":\"200\"},\"c_1_45\":{\"name\":\"E1\",\"price\":\"200\"},\"c_1_46\":{\"name\":\"E2\",\"price\":\"200\"},\"c_1_47\":{\"name\":\"E3\",\"price\":\"200\"},\"c_1_49\":{\"name\":\"E4\",\"price\":\"200\"},\"c_1_51\":{\"name\":\"E6\",\"price\":\"200\"},\"c_1_50\":{\"name\":\"E5\",\"price\":\"200\"},\"c_1_53\":{\"name\":\"E7\",\"price\":\"200\"},\"c_1_54\":{\"name\":\"E8\",\"price\":\"200\"},\"c_1_55\":{\"name\":\"E9\",\"price\":\"200\"},\"c_1_56\":{\"name\":\"F1\",\"price\":\"200\"},\"c_1_57\":{\"name\":\"F2\",\"price\":\"200\"},\"c_1_58\":{\"name\":\"F3\",\"price\":\"200\"},\"c_1_60\":{\"name\":\"F4\",\"price\":\"200\"},\"c_1_61\":{\"name\":\"F5\",\"price\":\"200\"},\"c_1_62\":{\"name\":\"F6\",\"price\":\"200\"},\"c_1_64\":{\"name\":\"F7\",\"price\":\"200\"},\"c_1_65\":{\"name\":\"F8\",\"price\":\"200\"},\"c_1_66\":{\"name\":\"F9\",\"price\":\"200\"},\"c_1_67\":{\"name\":\"G1\",\"price\":\"200\"},\"c_1_68\":{\"name\":\"G2\",\"price\":\"200\"},\"c_1_69\":{\"name\":\"G3\",\"price\":\"200\"},\"c_1_71\":{\"name\":\"G4\",\"price\":\"200\"},\"c_1_72\":{\"name\":\"G5\",\"price\":\"200\"},\"c_1_73\":{\"name\":\"G6\",\"price\":\"200\"},\"c_1_75\":{\"name\":\"G7\",\"price\":\"200\"},\"c_1_76\":{\"name\":\"G8\",\"price\":\"200\"},\"c_1_77\":{\"name\":\"G9\",\"price\":\"200\"},\"c_1_78\":{\"name\":\"H1\",\"price\":\"200\"},\"c_1_79\":{\"name\":\"H2\",\"price\":\"200\"},\"c_1_80\":{\"name\":\"H3\",\"price\":\"200\"},\"c_1_82\":{\"name\":\"H4\",\"price\":\"200\"},\"c_1_83\":{\"name\":\"H5\",\"price\":\"200\"},\"c_1_84\":{\"name\":\"H6\",\"price\":\"200\"},\"c_1_86\":{\"name\":\"H7\",\"price\":\"200\"},\"c_1_87\":{\"name\":\"H8\",\"price\":\"200\"},\"c_1_88\":{\"name\":\"H9\",\"price\":\"200\"},\"c_1_89\":{\"name\":\"I1\",\"price\":\"200\"},\"c_1_90\":{\"name\":\"I2\",\"price\":\"200\"},\"c_1_91\":{\"name\":\"I3\",\"price\":\"200\"},\"c_1_93\":{\"name\":\"I4\",\"price\":\"200\"},\"c_1_94\":{\"name\":\"I5\",\"price\":\"200\"},\"c_1_95\":{\"name\":\"I6\",\"price\":\"200\"},\"c_1_97\":{\"name\":\"I7\",\"price\":\"200\"},\"c_1_98\":{\"name\":\"I8\",\"price\":\"200\"},\"c_1_99\":{\"name\":\"I9\",\"price\":\"200\"},\"c_1_100\":{\"name\":\"J1\",\"price\":\"200\"},\"c_1_101\":{\"name\":\"J2\",\"price\":\"200\"},\"c_1_102\":{\"name\":\"J3\",\"price\":\"200\"},\"c_1_104\":{\"name\":\"J4\",\"price\":\"200\"},\"c_1_105\":{\"name\":\"J5\",\"price\":\"200\"},\"c_1_106\":{\"name\":\"J6\",\"price\":\"200\"},\"c_1_108\":{\"name\":\"J7\",\"price\":\"200\"},\"c_1_109\":{\"name\":\"J8\",\"price\":\"200\"},\"c_1_110\":{\"name\":\"J9\",\"price\":\"200\"}}', 90, '2020-01-06 07:19:58', '2020-01-06 07:19:58'),
(7, 'Cinema 1 Venue', 'Cinema 1 Venue template with 100 seats', 'seat', 4, 3, '[{\"parent_cell\":\"c_1\",\"col\":3,\"row\":3},{\"parent_cell\":\"c_1_1\",\"col\":4,\"row\":4},{\"parent_cell\":\"c_1_2\",\"col\":4,\"row\":4},{\"parent_cell\":\"c_1_3\",\"col\":4,\"row\":4},{\"parent_cell\":\"c_1_6\",\"col\":4,\"row\":4},{\"parent_cell\":\"c_1_9\",\"col\":4,\"row\":4},{\"parent_cell\":\"c_1_8\",\"col\":4,\"row\":4},{\"parent_cell\":\"c_1_7\",\"col\":4,\"row\":4},{\"parent_cell\":\"c_1_4\",\"col\":4,\"row\":4}]', '{\"c_1_1_1\":{\"name\":\"A1\",\"price\":\"200\"}}', 1, '2020-01-06 08:01:09', '2020-01-06 08:03:52'),
(8, 'Cinema 1 new', 'Cinema 1 with 90 seats', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":11,\"row\":10}]', '{\"c_1_1\":{\"name\":\"A1\",\"price\":\"200\"},\"c_1_2\":{\"name\":\"A2\",\"price\":\"200\"},\"c_1_3\":{\"name\":\"A3\",\"price\":\"200\"},\"c_1_5\":{\"name\":\"A4\",\"price\":\"200\"},\"c_1_6\":{\"name\":\"A5\",\"price\":\"200\"},\"c_1_7\":{\"name\":\"A6\",\"price\":\"200\"},\"c_1_9\":{\"name\":\"A7\",\"price\":\"200\"},\"c_1_10\":{\"name\":\"A8\",\"price\":\"200\"},\"c_1_11\":{\"name\":\"A9\",\"price\":\"200\"},\"c_1_12\":{\"name\":\"B1\",\"price\":\"200\"},\"c_1_13\":{\"name\":\"B2\",\"price\":\"200\"},\"c_1_14\":{\"name\":\"B3\",\"price\":\"200\"},\"c_1_16\":{\"name\":\"B4\",\"price\":\"200\"},\"c_1_17\":{\"name\":\"B5\",\"price\":\"200\"},\"c_1_18\":{\"name\":\"B6\",\"price\":\"200\"},\"c_1_20\":{\"name\":\"B7\",\"price\":\"200\"},\"c_1_21\":{\"name\":\"B8\",\"price\":\"200\"},\"c_1_22\":{\"name\":\"B9\",\"price\":\"200\"},\"c_1_23\":{\"name\":\"C1\",\"price\":\"200\"},\"c_1_24\":{\"name\":\"C2\",\"price\":\"200\"},\"c_1_25\":{\"name\":\"C3\",\"price\":\"200\"},\"c_1_27\":{\"name\":\"C4\",\"price\":\"200\"},\"c_1_28\":{\"name\":\"C5\",\"price\":\"200\"},\"c_1_29\":{\"name\":\"C6\",\"price\":\"200\"},\"c_1_31\":{\"name\":\"C7\",\"price\":\"200\"},\"c_1_32\":{\"name\":\"C8\",\"price\":\"200\"},\"c_1_33\":{\"name\":\"C9\",\"price\":\"200\"},\"c_1_34\":{\"name\":\"D1\",\"price\":\"200\"},\"c_1_35\":{\"name\":\"D2\",\"price\":\"200\"},\"c_1_36\":{\"name\":\"D3\",\"price\":\"200\"},\"c_1_38\":{\"name\":\"D4\",\"price\":\"200\"},\"c_1_39\":{\"name\":\"D5\",\"price\":\"200\"},\"c_1_40\":{\"name\":\"D6\",\"price\":\"200\"},\"c_1_42\":{\"name\":\"D7\",\"price\":\"200\"},\"c_1_43\":{\"name\":\"D8\",\"price\":\"200\"},\"c_1_44\":{\"name\":\"D9\",\"price\":\"200\"},\"c_1_45\":{\"name\":\"E1\",\"price\":\"200\"},\"c_1_46\":{\"name\":\"E2\",\"price\":\"200\"},\"c_1_47\":{\"name\":\"E3\",\"price\":\"200\"},\"c_1_49\":{\"name\":\"E4\",\"price\":\"200\"},\"c_1_51\":{\"name\":\"E6\",\"price\":\"200\"},\"c_1_50\":{\"name\":\"E5\",\"price\":\"200\"},\"c_1_53\":{\"name\":\"E7\",\"price\":\"200\"},\"c_1_54\":{\"name\":\"E8\",\"price\":\"200\"},\"c_1_55\":{\"name\":\"E9\",\"price\":\"200\"},\"c_1_56\":{\"name\":\"F1\",\"price\":\"200\"},\"c_1_57\":{\"name\":\"F2\",\"price\":\"200\"},\"c_1_58\":{\"name\":\"F3\",\"price\":\"200\"},\"c_1_60\":{\"name\":\"F4\",\"price\":\"200\"},\"c_1_61\":{\"name\":\"F5\",\"price\":\"200\"},\"c_1_62\":{\"name\":\"F6\",\"price\":\"200\"},\"c_1_64\":{\"name\":\"F7\",\"price\":\"200\"},\"c_1_65\":{\"name\":\"F8\",\"price\":\"200\"},\"c_1_66\":{\"name\":\"F9\",\"price\":\"200\"},\"c_1_67\":{\"name\":\"G1\",\"price\":\"200\"},\"c_1_68\":{\"name\":\"G2\",\"price\":\"200\"},\"c_1_69\":{\"name\":\"G3\",\"price\":\"200\"},\"c_1_71\":{\"name\":\"G4\",\"price\":\"200\"},\"c_1_72\":{\"name\":\"G5\",\"price\":\"200\"},\"c_1_73\":{\"name\":\"G6\",\"price\":\"200\"},\"c_1_75\":{\"name\":\"G7\",\"price\":\"200\"},\"c_1_76\":{\"name\":\"G8\",\"price\":\"200\"},\"c_1_77\":{\"name\":\"G9\",\"price\":\"200\"},\"c_1_78\":{\"name\":\"H1\",\"price\":\"200\"},\"c_1_79\":{\"name\":\"H2\",\"price\":\"200\"},\"c_1_80\":{\"name\":\"H3\",\"price\":\"200\"},\"c_1_82\":{\"name\":\"H4\",\"price\":\"200\"},\"c_1_83\":{\"name\":\"H5\",\"price\":\"200\"},\"c_1_84\":{\"name\":\"H6\",\"price\":\"200\"},\"c_1_86\":{\"name\":\"H7\",\"price\":\"200\"},\"c_1_87\":{\"name\":\"H8\",\"price\":\"200\"},\"c_1_88\":{\"name\":\"H9\",\"price\":\"200\"},\"c_1_89\":{\"name\":\"I1\",\"price\":\"200\"},\"c_1_90\":{\"name\":\"I2\",\"price\":\"200\"},\"c_1_91\":{\"name\":\"I3\",\"price\":\"200\"},\"c_1_93\":{\"name\":\"I4\",\"price\":\"200\"},\"c_1_94\":{\"name\":\"I5\",\"price\":\"200\"},\"c_1_95\":{\"name\":\"I6\",\"price\":\"200\"},\"c_1_97\":{\"name\":\"I7\",\"price\":\"200\"},\"c_1_98\":{\"name\":\"I8\",\"price\":\"200\"},\"c_1_99\":{\"name\":\"I9\",\"price\":\"200\"},\"c_1_100\":{\"name\":\"J1\",\"price\":\"200\"},\"c_1_101\":{\"name\":\"J2\",\"price\":\"200\"},\"c_1_102\":{\"name\":\"J3\",\"price\":\"200\"},\"c_1_105\":{\"name\":\"J5\",\"price\":\"200\"},\"c_1_106\":{\"name\":\"J6\",\"price\":\"200\"},\"c_1_108\":{\"name\":\"J7\",\"price\":\"200\"},\"c_1_109\":{\"name\":\"J8\",\"price\":\"200\"},\"c_1_110\":{\"name\":\"J9\",\"price\":\"200\"}}', 89, '2020-01-06 08:05:39', '2020-01-06 08:06:08'),
(9, 'Cinema 2 Premium Copy', 'Cinema 2 Premium template with 33 seats', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":9,\"row\":9}]', '{\"c_1_3\":{\"name\":\"S1\",\"price\":\"500\"},\"c_1_4\":{\"name\":\"S2\",\"price\":\"500\"},\"c_1_6\":{\"name\":\"S3\",\"price\":\"500\"},\"c_1_7\":{\"name\":\"S4\",\"price\":\"500\"},\"c_1_10\":{\"name\":\"S5\",\"price\":\"500\"},\"c_1_11\":{\"name\":\"S6\",\"price\":\"500\"},\"c_1_22\":{\"name\":\"S9\",\"price\":\"500\"},\"c_1_23\":{\"name\":\"S10\",\"price\":\"500\"},\"c_1_24\":{\"name\":\"S11\",\"price\":\"500\"},\"c_1_17\":{\"name\":\"S7\",\"price\":\"500\"},\"c_1_18\":{\"name\":\"S8\",\"price\":\"500\"},\"c_1_28\":{\"name\":\"S12\",\"price\":\"500\"},\"c_1_29\":{\"name\":\"S13\",\"price\":\"500\"},\"c_1_35\":{\"name\":\"S16\",\"price\":\"500\"},\"c_1_36\":{\"name\":\"S17\",\"price\":\"500\"},\"c_1_34\":{\"name\":\"S15\",\"price\":\"500\"},\"c_1_30\":{\"name\":\"S14\",\"price\":\"500\"},\"c_1_40\":{\"name\":\"S18\",\"price\":\"500\"},\"c_1_41\":{\"name\":\"S19\",\"price\":\"500\"},\"c_1_42\":{\"name\":\"S20\",\"price\":\"500\"},\"c_1_52\":{\"name\":\"S23\",\"price\":\"500\"},\"c_1_53\":{\"name\":\"S24\",\"price\":\"500\"},\"c_1_47\":{\"name\":\"S21\",\"price\":\"500\"},\"c_1_48\":{\"name\":\"S22\",\"price\":\"500\"},\"c_1_58\":{\"name\":\"S25\",\"price\":\"500\"},\"c_1_59\":{\"name\":\"S26\",\"price\":\"500\"},\"c_1_60\":{\"name\":\"S27\",\"price\":\"500\"},\"c_1_64\":{\"name\":\"S28\",\"price\":\"500\"},\"c_1_66\":{\"name\":\"S30\",\"price\":\"500\"},\"c_1_70\":{\"name\":\"S31\",\"price\":\"500\"},\"c_1_71\":{\"name\":\"S32\",\"price\":\"500\"},\"c_1_72\":{\"name\":\"S33\",\"price\":\"500\"},\"c_1_65\":{\"name\":\"S29\",\"price\":\"500\"}}', 33, '2020-01-06 08:06:20', '2020-01-07 07:52:43'),
(10, 'Cinema 2 Premium Copy', 'Cinema 2 Premium template with 33 seats', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":9,\"row\":9}]', '{\"c_1_3\":{\"name\":\"S1\",\"price\":\"500\"},\"c_1_4\":{\"name\":\"S2\",\"price\":\"500\"},\"c_1_6\":{\"name\":\"S3\",\"price\":\"500\"},\"c_1_7\":{\"name\":\"S4\",\"price\":\"500\"},\"c_1_10\":{\"name\":\"S5\",\"price\":\"500\"},\"c_1_11\":{\"name\":\"S6\",\"price\":\"500\"},\"c_1_22\":{\"name\":\"S9\",\"price\":\"500\"},\"c_1_23\":{\"name\":\"S10\",\"price\":\"500\"},\"c_1_24\":{\"name\":\"S11\",\"price\":\"500\"},\"c_1_17\":{\"name\":\"S7\",\"price\":\"500\"},\"c_1_18\":{\"name\":\"S8\",\"price\":\"500\"},\"c_1_28\":{\"name\":\"S12\",\"price\":\"500\"},\"c_1_29\":{\"name\":\"S13\",\"price\":\"500\"},\"c_1_35\":{\"name\":\"S16\",\"price\":\"500\"},\"c_1_36\":{\"name\":\"S17\",\"price\":\"500\"},\"c_1_34\":{\"name\":\"S15\",\"price\":\"500\"},\"c_1_30\":{\"name\":\"S14\",\"price\":\"500\"},\"c_1_40\":{\"name\":\"S18\",\"price\":\"500\"},\"c_1_41\":{\"name\":\"S19\",\"price\":\"500\"},\"c_1_42\":{\"name\":\"S20\",\"price\":\"500\"},\"c_1_52\":{\"name\":\"S23\",\"price\":\"500\"},\"c_1_53\":{\"name\":\"S24\",\"price\":\"500\"},\"c_1_47\":{\"name\":\"S21\",\"price\":\"500\"},\"c_1_48\":{\"name\":\"S22\",\"price\":\"500\"},\"c_1_58\":{\"name\":\"S25\",\"price\":\"500\"},\"c_1_59\":{\"name\":\"S26\",\"price\":\"500\"},\"c_1_60\":{\"name\":\"S27\",\"price\":\"500\"},\"c_1_64\":{\"name\":\"S28\",\"price\":\"500\"},\"c_1_66\":{\"name\":\"S30\",\"price\":\"500\"},\"c_1_70\":{\"name\":\"S31\",\"price\":\"500\"},\"c_1_71\":{\"name\":\"S32\",\"price\":\"500\"},\"c_1_72\":{\"name\":\"S33\",\"price\":\"500\"},\"c_1_65\":{\"name\":\"S29\",\"price\":\"500\"}}', 33, '2020-01-06 08:06:21', '2020-01-06 08:06:21'),
(13, 'Movie 3D', 'Movie with 100seats', 'seat', 6, 1, '[{\"parent_cell\":\"c_1\",\"col\":2,\"row\":5},{\"parent_cell\":\"c_1_7\",\"col\":3,\"row\":2},{\"parent_cell\":\"c_1_8\",\"col\":3,\"row\":2},{\"parent_cell\":\"c_1_5\",\"col\":3,\"row\":2},{\"parent_cell\":\"c_1_6\",\"col\":3,\"row\":2}]', '{\"c_1_5_1\":{\"name\":\"seatA1\",\"price\":\"350\"},\"c_1_5_2\":{\"name\":\"seatA2\",\"price\":\"450\"}}', 2, '2020-01-10 08:49:01', '2020-01-10 08:51:21'),
(14, 'Cinema 1', 'Something great', 'seat', 7, 4, NULL, NULL, 0, '2020-02-13 12:41:16', '2020-02-13 12:41:16'),
(15, 'Aura Cinema', 'This template is for Cinema 1 with 100 seats', 'seat', 8, 5, '[{\"parent_cell\":\"c_1\",\"col\":3,\"row\":3}]', '{\"c_1_1\":{\"name\":\"A1\",\"price\":\"200\"},\"c_1_2\":{\"name\":\"A2\",\"price\":0},\"c_1_3\":{\"name\":\"A3\",\"price\":0}}', 3, '2020-02-14 07:14:09', '2020-02-14 07:16:23'),
(16, 'Template practice 1', 'Template practice 1 with 10 seats', 'seat', 1, 1, '[{\"parent_cell\":\"c_1\",\"col\":3,\"row\":3},{\"parent_cell\":\"c_1_5\",\"col\":2,\"row\":2}]', '{\"c_1_5_1\":{\"name\":\"S1\",\"price\":0},\"c_1_5_2\":{\"name\":\"S2\",\"price\":0},\"c_1_5_3\":{\"name\":\"S3\",\"price\":0},\"c_1_5_4\":{\"name\":\"S4\",\"price\":0}}', 4, '2020-02-17 02:09:45', '2020-02-17 04:03:32'),
(18, 'delete@gmail.com', 'delete@gmail.com', 'seat', 9, 6, '[{\"parent_cell\":\"c_1\",\"col\":2,\"row\":2}]', '{\"c_1_1\":{\"name\":\"S1\",\"price\":0},\"c_1_2\":{\"name\":\"S2\",\"price\":0},\"c_1_3\":{\"name\":\"S3\",\"price\":0},\"c_1_4\":{\"name\":\"S4\",\"price\":0}}', 4, '2020-02-17 03:24:29', '2020-02-17 03:25:53');

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
(1, NULL, 'Market Market Cinema', 'Taguig City', NULL, NULL, '2020-01-06 01:05:08', '2020-01-06 01:05:08'),
(2, NULL, 'CJ Concerts', 'Makati City', NULL, NULL, '2020-01-06 05:53:31', '2020-01-06 05:53:31'),
(3, NULL, 'SM Aura Cinema', 'Taguig City', NULL, NULL, '2020-01-06 07:56:43', '2020-01-06 07:56:43'),
(4, NULL, 'Testjjjjjnn', 'Testjjjjjjjj', NULL, NULL, '2020-02-13 12:40:27', '2020-02-13 12:40:27'),
(5, NULL, 'Aura Cinema', 'Aura Cinema', NULL, NULL, '2020-02-14 07:10:38', '2020-02-14 07:10:38'),
(6, NULL, 'To delete', 'delete@gmail.com', NULL, NULL, '2020-02-17 03:23:06', '2020-02-17 03:23:06');

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
(1, 3, NULL, 1, 1500, 'online_payment', '2020-01-06 03:33:23', '2020-01-06 03:33:23'),
(2, 1, NULL, 1, 600, 'online_payment', '2020-01-06 03:48:32', '2020-01-06 03:48:32'),
(3, 1, NULL, 1, 200, 'online_payment', '2020-01-06 05:08:37', '2020-01-06 05:08:37'),
(4, 1, NULL, 3, 1800, 'online_payment', '2020-01-06 07:56:57', '2020-01-06 07:56:57'),
(5, 1, NULL, 3, 1400, 'online_payment', '2020-01-06 08:01:14', '2020-01-06 08:01:14'),
(6, 3, NULL, 4, 1500, 'online_payment', '2020-01-06 08:01:35', '2020-01-06 08:01:35'),
(7, 3, NULL, 4, 500, 'online_payment', '2020-01-06 08:01:55', '2020-01-06 08:01:55'),
(8, 1, NULL, 3, 1600, 'online_payment', '2020-01-06 08:04:05', '2020-01-06 08:04:05'),
(9, 1, NULL, 4, 200, 'online_payment', '2020-01-06 08:04:06', '2020-01-06 08:04:06'),
(10, 1, NULL, 3, 1800, 'online_payment', '2020-01-06 08:09:09', '2020-01-06 08:09:09'),
(12, 3, NULL, 5, 1500, 'online_payment', '2020-01-06 08:10:59', '2020-01-06 08:10:59'),
(13, 3, NULL, 4, 2000, 'online_payment', '2020-01-06 08:11:25', '2020-01-06 08:11:25'),
(14, 1, NULL, 5, 1200, 'online_payment', '2020-01-06 08:11:35', '2020-01-06 08:11:35'),
(16, 1, NULL, 1, 200, 'online_payment', '2020-01-21 03:47:35', '2020-01-21 03:47:35');

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
(1, 1, 3, NULL, 1, 'S10', 'c_1_23', 500, '0cPSjY9d', '2020-01-06 03:33:24', '2020-01-06 03:33:24'),
(2, 1, 3, NULL, 1, 'S9', 'c_1_22', 500, 'CVo6dkVK', '2020-01-06 03:33:24', '2020-01-06 03:33:24'),
(3, 1, 3, NULL, 1, 'S11', 'c_1_24', 500, 'HhM44a4j', '2020-01-06 03:33:24', '2020-01-06 03:33:24'),
(4, 2, 1, NULL, 1, 'A4', 'c_1_5', 200, '9VBImUIk', '2020-01-06 03:48:33', '2020-01-06 03:48:33'),
(5, 2, 1, NULL, 1, 'A5', 'c_1_6', 200, 'z7JbNtjl', '2020-01-06 03:48:33', '2020-01-06 03:48:33'),
(6, 2, 1, NULL, 1, 'A6', 'c_1_7', 200, 'x3QCCYjN', '2020-01-06 03:48:33', '2020-01-06 03:48:33'),
(7, 3, 1, NULL, 1, 'F5', 'c_1_61', 200, 'CODMyLcB', '2020-01-06 05:08:38', '2020-01-06 05:08:38'),
(8, 4, 1, NULL, 3, 'I1', 'c_1_89', 200, 'W2tFkPTG', '2020-01-06 07:56:57', '2020-01-06 07:56:57'),
(9, 4, 1, NULL, 3, 'I2', 'c_1_90', 200, 'GEwdaQuh', '2020-01-06 07:56:57', '2020-01-06 07:56:57'),
(10, 4, 1, NULL, 3, 'I3', 'c_1_91', 200, 'grFlcYtB', '2020-01-06 07:56:58', '2020-01-06 07:56:58'),
(11, 4, 1, NULL, 3, 'I4', 'c_1_93', 200, 'jCJ3ubEW', '2020-01-06 07:56:58', '2020-01-06 07:56:58'),
(12, 4, 1, NULL, 3, 'I5', 'c_1_94', 200, 'ZM3uCoR6', '2020-01-06 07:56:58', '2020-01-06 07:56:58'),
(13, 4, 1, NULL, 3, 'I6', 'c_1_95', 200, 'nDMQd1J6', '2020-01-06 07:56:58', '2020-01-06 07:56:58'),
(14, 4, 1, NULL, 3, 'I7', 'c_1_97', 200, 'WDsgoj1q', '2020-01-06 07:56:58', '2020-01-06 07:56:58'),
(15, 4, 1, NULL, 3, 'I8', 'c_1_98', 200, 'R1pRUOxR', '2020-01-06 07:56:58', '2020-01-06 07:56:58'),
(16, 4, 1, NULL, 3, 'I9', 'c_1_99', 200, 'CHy9jv3y', '2020-01-06 07:56:59', '2020-01-06 07:56:59'),
(17, 5, 1, NULL, 3, 'B1', 'c_1_12', 200, 'tRXVOp3k', '2020-01-06 08:01:14', '2020-01-06 08:01:14'),
(18, 5, 1, NULL, 3, 'B3', 'c_1_14', 200, 'KWYRUv9W', '2020-01-06 08:01:14', '2020-01-06 08:01:14'),
(19, 5, 1, NULL, 3, 'D1', 'c_1_34', 200, '1ekRnHDs', '2020-01-06 08:01:15', '2020-01-06 08:01:15'),
(20, 5, 1, NULL, 3, 'E1', 'c_1_45', 200, 'AqwgtZic', '2020-01-06 08:01:15', '2020-01-06 08:01:15'),
(21, 5, 1, NULL, 3, 'E2', 'c_1_46', 200, 'US7J43uR', '2020-01-06 08:01:15', '2020-01-06 08:01:15'),
(22, 5, 1, NULL, 3, 'E3', 'c_1_47', 200, 'sqBq0f5b', '2020-01-06 08:01:15', '2020-01-06 08:01:15'),
(23, 5, 1, NULL, 3, 'D3', 'c_1_36', 200, 'iAOaPVVJ', '2020-01-06 08:01:15', '2020-01-06 08:01:15'),
(24, 6, 3, NULL, 4, 'S14', 'c_1_30', 500, 'PJHNneQp', '2020-01-06 08:01:36', '2020-01-06 08:01:36'),
(25, 6, 3, NULL, 4, 'S13', 'c_1_29', 500, 'aABrGhXu', '2020-01-06 08:01:36', '2020-01-06 08:01:36'),
(26, 6, 3, NULL, 4, 'S21', 'c_1_47', 500, 'i9c9zo5a', '2020-01-06 08:01:36', '2020-01-06 08:01:36'),
(27, 7, 3, NULL, 4, 'S30', 'c_1_66', 500, 'gNDsDQmt', '2020-01-06 08:01:56', '2020-01-06 08:01:56'),
(28, 8, 1, NULL, 3, 'A8', 'c_1_10', 200, 'jIRY9kgf', '2020-01-06 08:04:05', '2020-01-06 08:04:05'),
(29, 8, 1, NULL, 3, 'B8', 'c_1_21', 200, 'ppUO0BG5', '2020-01-06 08:04:05', '2020-01-06 08:04:05'),
(30, 8, 1, NULL, 3, 'C8', 'c_1_32', 200, 'mra4NDiS', '2020-01-06 08:04:05', '2020-01-06 08:04:05'),
(31, 8, 1, NULL, 3, 'D8', 'c_1_43', 200, 'rhqqKbmn', '2020-01-06 08:04:06', '2020-01-06 08:04:06'),
(32, 8, 1, NULL, 3, 'E8', 'c_1_54', 200, '27j8ifRE', '2020-01-06 08:04:06', '2020-01-06 08:04:06'),
(33, 8, 1, NULL, 3, 'G8', 'c_1_76', 200, 'B4Kqh2Gx', '2020-01-06 08:04:06', '2020-01-06 08:04:06'),
(34, 8, 1, NULL, 3, 'F8', 'c_1_65', 200, '5vEGWlQj', '2020-01-06 08:04:06', '2020-01-06 08:04:06'),
(35, 8, 1, NULL, 3, 'H8', 'c_1_87', 200, 'M86rhatC', '2020-01-06 08:04:06', '2020-01-06 08:04:06'),
(36, 9, 1, NULL, 4, 'G2', 'c_1_68', 200, 'lMjYxxIK', '2020-01-06 08:04:07', '2020-01-06 08:04:07'),
(37, 10, 1, NULL, 3, 'J1', 'c_1_100', 200, 'eM3i5lvG', '2020-01-06 08:09:09', '2020-01-06 08:09:09'),
(38, 10, 1, NULL, 3, 'J2', 'c_1_101', 200, '0pA9Pwcj', '2020-01-06 08:09:09', '2020-01-06 08:09:09'),
(39, 10, 1, NULL, 3, 'J3', 'c_1_102', 200, 'jTgaXHXr', '2020-01-06 08:09:09', '2020-01-06 08:09:09'),
(40, 10, 1, NULL, 3, 'J5', 'c_1_105', 200, 'scpran1f', '2020-01-06 08:09:10', '2020-01-06 08:09:10'),
(41, 10, 1, NULL, 3, 'J4', 'c_1_104', 200, '6FJGG39P', '2020-01-06 08:09:10', '2020-01-06 08:09:10'),
(42, 10, 1, NULL, 3, 'J6', 'c_1_106', 200, 'JzljhV9F', '2020-01-06 08:09:10', '2020-01-06 08:09:10'),
(43, 10, 1, NULL, 3, 'J7', 'c_1_108', 200, 'gMP5rQaN', '2020-01-06 08:09:10', '2020-01-06 08:09:10'),
(44, 10, 1, NULL, 3, 'J8', 'c_1_109', 200, 'jUYzRb1T', '2020-01-06 08:09:10', '2020-01-06 08:09:10'),
(45, 10, 1, NULL, 3, 'J9', 'c_1_110', 200, 'FVh7yLJR', '2020-01-06 08:09:11', '2020-01-06 08:09:11'),
(55, 12, 3, NULL, 5, 'S25', 'c_1_58', 500, 'WMGlGhp9', '2020-01-06 08:11:00', '2020-01-06 08:11:00'),
(56, 12, 3, NULL, 5, 'S26', 'c_1_59', 500, 'Cj0mozcH', '2020-01-06 08:11:00', '2020-01-06 08:11:00'),
(57, 12, 3, NULL, 5, 'S27', 'c_1_60', 500, 'IAPstr5Y', '2020-01-06 08:11:00', '2020-01-06 08:11:00'),
(58, 13, 3, NULL, 4, 'S23', 'c_1_52', 500, 'OcgPGgTy', '2020-01-06 08:11:25', '2020-01-06 08:11:25'),
(59, 13, 3, NULL, 4, 'S22', 'c_1_48', 500, '4ZimzsE8', '2020-01-06 08:11:25', '2020-01-06 08:11:25'),
(60, 13, 3, NULL, 4, 'S28', 'c_1_64', 500, 'aM3sGtz5', '2020-01-06 08:11:25', '2020-01-06 08:11:25'),
(61, 13, 3, NULL, 4, 'S29', 'c_1_65', 500, 'Xy1B6PGF', '2020-01-06 08:11:25', '2020-01-06 08:11:25'),
(62, 14, 1, NULL, 5, 'C4', 'c_1_27', 200, 'QxVdnAaQ', '2020-01-06 08:11:36', '2020-01-06 08:11:36'),
(63, 14, 1, NULL, 5, 'C5', 'c_1_28', 200, 'cqF4TLJM', '2020-01-06 08:11:36', '2020-01-06 08:11:36'),
(64, 14, 1, NULL, 5, 'C6', 'c_1_29', 200, 'OV4WCfU3', '2020-01-06 08:11:36', '2020-01-06 08:11:36'),
(65, 14, 1, NULL, 5, 'D6', 'c_1_40', 200, 'XaUGPWK9', '2020-01-06 08:11:36', '2020-01-06 08:11:36'),
(66, 14, 1, NULL, 5, 'D5', 'c_1_39', 200, 'BkzZWv1n', '2020-01-06 08:11:36', '2020-01-06 08:11:36'),
(67, 14, 1, NULL, 5, 'D4', 'c_1_38', 200, 'TJjIekFX', '2020-01-06 08:11:37', '2020-01-06 08:11:37'),
(74, 16, 1, NULL, 1, 'G4', 'c_1_71', 200, 'uKamcfR2', '2020-01-21 03:47:35', '2020-01-21 03:47:35');

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
(1, 'App\\Admin', 1),
(2, 'App\\Admin', 1),
(3, 'App\\Admin', 1),
(4, 'App\\Admin', 1),
(4, 'App\\Admin', 2),
(1, 'App\\Admin', 3),
(2, 'App\\Admin', 3),
(3, 'App\\Admin', 3),
(4, 'App\\Admin', 3),
(1, 'App\\Admin', 4),
(2, 'App\\Admin', 4),
(3, 'App\\Admin', 4),
(4, 'App\\Admin', 4),
(1, 'App\\Admin', 5),
(2, 'App\\Admin', 5),
(1, 'App\\Admin', 6),
(2, 'App\\Admin', 6),
(3, 'App\\Admin', 6),
(4, 'App\\Admin', 6),
(1, 'App\\Admin', 7),
(2, 'App\\Admin', 7),
(3, 'App\\Admin', 7),
(4, 'App\\Admin', 7),
(1, 'App\\Admin', 8),
(2, 'App\\Admin', 8),
(3, 'App\\Admin', 8),
(4, 'App\\Admin', 8),
(1, 'App\\Admin', 9),
(2, 'App\\Admin', 9),
(3, 'App\\Admin', 9),
(4, 'App\\Admin', 9),
(4, 'App\\Admin', 10);

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
(1, '{\"en\": \"bookable_schedule\"}', '{\"en\": \"bookable-schedule\"}', NULL, 1, '2020-01-06 01:05:08', '2020-01-06 01:05:08'),
(2, '{\"en\": \"bookable_template\"}', '{\"en\": \"bookable-template\"}', NULL, 2, '2020-01-06 01:05:09', '2020-01-06 01:05:09'),
(3, '{\"en\": \"staff\"}', '{\"en\": \"staff\"}', NULL, 3, '2020-01-06 01:05:09', '2020-01-06 01:05:09'),
(4, '{\"en\": \"verify_ticket\"}', '{\"en\": \"verify-ticket\"}', NULL, 4, '2020-01-06 01:05:10', '2020-01-06 01:05:10');

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
  `credits` smallint(5) UNSIGNED NOT NULL DEFAULT '10000',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `email_verified_at`, `password`, `credits`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doez', 'Taguig City', 'user1@gmail.com', NULL, '$2y$10$fGgIpJ3niJi3zd2wIe6spOIyPMp5fS2uuT/0JKNRuxxHVKLCJLHMW', 6900, NULL, '2020-01-06 03:02:24', '2020-02-17 01:21:41'),
(2, 'User 2', NULL, 'user2@gmail.com', NULL, '$2y$10$LiR4y0HbOZSWVrzN9jLGxux2Ovj22nopSSsoxATqmyFJ8gBfJNUQC', 10000, NULL, '2020-01-06 03:26:18', '2020-01-06 03:26:18'),
(3, 'Dancing Penguins', NULL, 'dpenguins@mail.com', NULL, '$2y$10$U6Gpj7ZryfLqHHHowx5p2.311snDnMjBvTUw5.5y3MriYpf6YgfZS', 3400, NULL, '2020-01-06 07:56:14', '2020-01-06 08:09:09'),
(4, 'what the', '45245', 'a@a.a', NULL, '$2y$10$qGqXNRPlfjsWNxAbGEnbG.a8ivUZojZmszzVtRx7jripMagROzkKW', 4000, NULL, '2020-01-06 08:00:56', '2020-01-06 08:39:23'),
(5, 'John Doe', NULL, 'john@gmail.com', NULL, '$2y$10$/F3gUeul/ttOqlwW/O3ZGOauVYUdMUBPUaLvht8CMoz2Ou0W9biI2', 7300, NULL, '2020-01-06 08:09:25', '2020-01-06 08:11:35'),
(6, 'christine', NULL, 'christine@mail.com', NULL, '$2y$10$4dxW.z2tCwnj/vypwEEyOupIcfwPmxvv/Ui1aiPGzym9cTLrRDz/q', 8800, NULL, '2020-01-10 08:52:14', '2020-01-10 08:53:07');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bookables`
--
ALTER TABLE `bookables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookable_templates`
--
ALTER TABLE `bookable_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
