-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 08:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(19, 'Category 1', 'category-1', '2020-04-01 17:53:02', NULL),
(20, 'Category 2', 'category-2', '2020-04-01 18:09:17', '2020-04-01 18:19:58'),
(22, 'dsadas', 'asda', '2020-04-01 22:37:12', NULL),
(23, '111111', '1111', '2020-04-02 12:25:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` bigint(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `class_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `instructor_id`, `category_id`, `class_img`, `class_description`, `date_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sdasd', 14, 20, NULL, '<p>dsadas</p>', '2020-04-01 22:37:31', '2020-04-01 22:37:31', NULL, NULL),
(2, 'name', 15, 20, NULL, '<p>sdfas</p>', '04/30/2020 10:46 PM', '2020-04-01 22:47:11', NULL, NULL),
(3, 'name', 15, 20, NULL, '<p>sdfas</p>', '04/30/2020 10:46 PM', '2020-04-01 22:47:22', NULL, NULL),
(4, 'name12', 14, 20, NULL, '<p>sdasd AS</p>', '04/15/2020 11:27 PM', '2020-04-01 23:27:28', NULL, NULL),
(5, 'NEW', 14, 22, NULL, '<p>DFS FAS</p>', '04/23/2020 11:29 PM', '2020-04-01 23:29:15', NULL, NULL),
(6, 'name', 14, 19, NULL, '<p>&nbsp;SADF ASDF ASF AS</p>', '04/29/2020 11:29 PM', '2020-04-01 23:29:54', NULL, NULL),
(7, 'sdasd', 14, 19, NULL, '<p>dfasdfs</p>', '04/30/2020 11:30 PM', '2020-04-01 23:30:35', NULL, NULL),
(8, '33333', 14, 19, NULL, '<p>3333</p>', '04/23/2020 11:29 PM', '2020-04-02 12:26:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` bigint(20) NOT NULL,
  `instructor_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `instructor_name`, `gender`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 'John', 'Male', '2020-04-01 19:18:45', NULL, NULL),
(15, 'ffs', 'Female', '2020-04-01 22:36:21', NULL, NULL),
(16, 'eqweq', 'Female', '2020-04-01 22:36:27', NULL, NULL),
(17, '2222', 'Female', '2020-04-01 22:36:41', NULL, NULL),
(18, '222222', 'Female', '2020-04-02 12:26:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` bigint(20) NOT NULL DEFAULT 2,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `password_reset`, `type`, `created_at`, `updated_at`) VALUES
(6, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
