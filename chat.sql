-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 08:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_msg`
--

CREATE TABLE `chat_msg` (
  `id` bigint(20) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `msg` longtext DEFAULT NULL,
  `msg_read` enum('0','1') NOT NULL DEFAULT '0',
  `attachment` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `file_type` char(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_msg`
--

INSERT INTO `chat_msg` (`id`, `sender_id`, `receiver_id`, `msg`, `msg_read`, `attachment`, `file_name`, `file_type`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'hello', '0', NULL, NULL, NULL, '2020-09-01 10:22:23', '2020-09-01 10:37:13'),
(5, 3, 2, 'hello', '1', NULL, NULL, NULL, '2020-09-02 04:57:48', '2020-09-02 10:45:24'),
(6, 3, 2, NULL, '1', 'upload/chat_attachments/149248284_pan_card.jpg', 'pan card.jpg', 'jpg', '2020-09-02 04:58:13', '2020-09-03 11:21:55'),
(7, 3, 2, 'ss', '1', NULL, NULL, NULL, '2020-09-02 04:59:57', '2020-09-02 10:45:24'),
(9, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-02 05:00:35', '2020-09-02 10:45:24'),
(10, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-02 05:01:32', '2020-09-02 10:45:24'),
(11, 3, 2, '52', '1', NULL, NULL, NULL, '2020-09-02 05:06:40', '2020-09-02 10:45:24'),
(12, 3, 2, '52', '1', NULL, NULL, NULL, '2020-09-02 05:06:42', '2020-09-02 10:45:24'),
(13, 3, 2, 'ko', '1', NULL, NULL, NULL, '2020-09-02 05:09:09', '2020-09-02 10:45:24'),
(15, 3, 2, 'ss', '1', NULL, NULL, NULL, '2020-09-02 05:22:22', '2020-09-02 10:56:03'),
(16, 2, 3, NULL, '1', 'upload/chat_attachments/409344770_aadhar.jpeg', 'aadhar.jpeg', 'jpeg', '2020-09-02 05:24:38', '2020-09-03 11:22:02'),
(17, 3, 2, 'ss', '1', NULL, NULL, NULL, '2020-09-02 05:25:01', '2020-09-02 10:56:03'),
(19, 3, 2, 'ffff', '1', NULL, NULL, NULL, '2020-09-02 05:35:16', '2020-09-02 11:06:51'),
(20, 2, 3, 'JAKLSJDF K;KASDF L;KA S;LKF AKS;LDF LJASD\'F ASDJF ;JASDFJ AKJSDK JASDJ JFAKLSJDF JA FADSF;LASD LF;\'L', '1', NULL, NULL, NULL, '2020-09-02 05:51:47', '2020-09-02 11:24:03'),
(21, 3, 2, NULL, '1', 'upload/chat_attachments/588967476_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-02 07:22:42', '2020-09-05 08:18:59'),
(22, 3, 2, NULL, '1', 'upload/chat_attachments/140231248_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-02 07:22:49', '2020-09-05 08:18:59'),
(23, 3, 2, NULL, '1', 'upload/chat_attachments/273025012_aadhar.jpeg', 'aadhar.jpeg', 'jpeg', '2020-09-02 07:30:19', '2020-09-05 08:18:59'),
(24, 3, 2, NULL, '1', 'upload/chat_attachments/580586513_pan_card.jpg', 'pan card.jpg', 'jpg', '2020-09-02 07:42:58', '2020-09-05 08:18:59'),
(25, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-03 05:28:38', '2020-09-05 08:18:59'),
(26, 3, 2, NULL, '1', 'upload/chat_attachments/842272951_OpTransactionHistory31-08-2020.pdf', 'OpTransactionHistory31-08-2020.pdf', 'pdf', '2020-09-03 05:42:44', '2020-09-05 08:18:59'),
(27, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-03 23:42:32', '2020-09-05 08:18:59'),
(28, 3, 2, NULL, '1', 'upload/chat_attachments/137141169_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-03 23:42:45', '2020-09-05 08:18:59'),
(29, 3, 2, 'asdf', '1', NULL, NULL, NULL, '2020-09-05 02:48:28', '2020-09-05 08:18:59'),
(30, 2, 3, 'qwerty', '1', NULL, NULL, NULL, '2020-09-05 02:49:06', '2020-09-05 08:22:00'),
(31, 2, 3, NULL, '1', 'upload/chat_attachments/531040632_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-05 02:50:09', '2020-09-05 08:22:00'),
(32, 2, 3, NULL, '1', 'upload/chat_attachments/741803007_pan_card.jpg', 'pan card.jpg', 'jpg', '2020-09-05 02:52:13', '2020-09-05 08:25:20'),
(34, 2, 3, NULL, '1', 'upload/chat_attachments/354372467_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-05 02:56:52', '2020-09-05 08:37:22'),
(35, 3, 2, '123', '1', NULL, NULL, NULL, '2020-09-05 03:21:01', '2020-09-05 09:52:35'),
(36, 3, 2, 'as', '1', NULL, NULL, NULL, '2020-09-05 03:39:56', '2020-09-05 09:52:35'),
(37, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-05 04:12:24', '2020-09-05 09:52:35'),
(38, 3, 2, 'test', '1', NULL, NULL, NULL, '2020-09-05 04:19:50', '2020-09-05 09:52:35'),
(39, 2, 3, NULL, '1', 'upload/chat_attachments/147662388_aadhar.jpeg', 'aadhar.jpeg', 'jpeg', '2020-09-05 04:22:47', '2020-09-05 09:53:02'),
(40, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-05 04:23:02', '2020-09-05 09:53:13'),
(41, 2, 3, '123', '1', NULL, NULL, NULL, '2020-09-05 04:23:13', '2020-09-05 09:56:57'),
(42, 3, 2, '4567', '1', NULL, NULL, NULL, '2020-09-05 04:27:05', '2020-09-05 09:58:17'),
(44, 6, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-05 05:13:58', '2020-09-05 10:45:14'),
(45, 2, 6, 'hi', '1', NULL, NULL, NULL, '2020-09-05 05:15:17', '2020-09-05 10:45:27'),
(46, 2, 5, 'hi', '1', NULL, NULL, NULL, '2020-09-05 07:49:58', '2020-09-05 13:20:09'),
(47, 5, 2, 'hello', '1', NULL, NULL, NULL, '2020-09-05 07:50:15', '2020-09-05 13:20:35'),
(48, 2, 5, 'hr', '1', NULL, NULL, NULL, '2020-09-05 07:50:35', '2020-09-05 13:20:54'),
(49, 2, 5, 'asd', '1', NULL, NULL, NULL, '2020-09-05 07:51:13', '2020-09-05 13:21:18'),
(50, 5, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-05 07:51:18', '2020-09-05 13:21:30'),
(51, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 07:52:27', '2020-09-05 13:30:01'),
(52, 2, 5, 'asd', '1', NULL, NULL, NULL, '2020-09-05 08:00:06', '2020-09-05 13:31:17'),
(53, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 08:00:56', '2020-09-05 13:31:17'),
(54, 5, 2, '456', '1', NULL, NULL, NULL, '2020-09-05 08:01:17', '2020-09-05 13:31:56'),
(55, 5, 2, '253', '1', NULL, NULL, NULL, '2020-09-05 08:02:08', '2020-09-05 13:37:25'),
(56, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 08:07:25', '2020-09-05 13:40:13'),
(57, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 08:07:26', '2020-09-05 13:40:13'),
(58, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 08:07:27', '2020-09-05 13:40:13'),
(59, 5, 2, '987', '1', NULL, NULL, NULL, '2020-09-05 08:10:26', '2020-09-05 13:46:11'),
(61, 6, 2, 'HI', '1', NULL, NULL, NULL, '2020-09-05 08:14:44', '2020-09-05 13:46:06'),
(62, 6, 2, NULL, '1', 'upload/chat_attachments/625276344_149248284_pan_card.jpg', '149248284_pan_card.jpg', 'jpg', '2020-09-05 08:14:54', '2020-09-05 13:46:06'),
(63, 2, 6, NULL, '1', 'upload/chat_attachments/714569364_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-05 08:15:04', '2020-09-08 13:43:16'),
(64, 3, 2, 'Hi', '1', NULL, NULL, NULL, '2020-09-08 00:29:51', '2020-09-08 05:59:56'),
(65, 2, 3, 'hello', '1', NULL, NULL, NULL, '2020-09-08 00:30:06', '2020-09-08 06:01:10'),
(66, 2, 3, 'hi', '1', NULL, NULL, NULL, '2020-09-08 00:37:30', '2020-09-08 06:07:46'),
(67, 2, 3, 'hi', '1', NULL, NULL, NULL, '2020-09-08 00:37:32', '2020-09-08 06:07:46'),
(68, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-08 00:37:51', '2020-09-08 06:08:17'),
(69, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-08 00:50:59', '2020-09-08 06:39:23'),
(70, 3, 2, 'das', '1', NULL, NULL, NULL, '2020-09-08 01:07:58', '2020-09-08 06:39:23'),
(71, 2, 3, 'asd', '1', NULL, NULL, NULL, '2020-09-08 01:09:23', '2020-09-08 06:41:58'),
(72, 3, 2, 'asdf', '1', NULL, NULL, NULL, '2020-09-08 01:12:38', '2020-09-08 06:50:53'),
(73, 3, 2, 'jil', '1', NULL, NULL, NULL, '2020-09-08 01:15:28', '2020-09-08 06:50:53'),
(74, 2, 3, '152', '1', NULL, NULL, NULL, '2020-09-08 01:20:56', '2020-09-08 06:51:43'),
(75, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-08 01:21:43', '2020-09-08 06:52:05'),
(76, 2, 3, 'erw', '1', NULL, NULL, NULL, '2020-09-08 01:22:05', '2020-09-08 06:52:19'),
(77, 3, 2, 'wret', '1', NULL, NULL, NULL, '2020-09-08 01:22:19', '2020-09-08 07:04:43'),
(78, 3, 2, '456', '1', NULL, NULL, NULL, '2020-09-08 01:31:53', '2020-09-08 07:04:43'),
(79, 3, 2, '45', '1', NULL, NULL, NULL, '2020-09-08 01:32:19', '2020-09-08 07:04:43'),
(80, 3, 2, NULL, '1', 'upload/chat_attachments/871909617_149248284_pan_card.jpg', '149248284_pan_card.jpg', 'jpg', '2020-09-08 01:34:27', '2020-09-08 07:04:43'),
(81, 2, 3, 'asd', '1', NULL, NULL, NULL, '2020-09-08 01:34:47', '2020-09-08 07:04:55'),
(82, 3, 2, 'asdasdsda', '1', NULL, NULL, NULL, '2020-09-08 01:34:55', '2020-09-08 07:05:09'),
(83, 2, 3, 'adsf', '1', NULL, NULL, NULL, '2020-09-08 01:35:44', '2020-09-08 07:05:54'),
(84, 3, 2, 'asdf', '1', NULL, NULL, NULL, '2020-09-08 01:36:01', '2020-09-08 07:06:05'),
(85, 2, 3, 'asdf', '1', NULL, NULL, NULL, '2020-09-08 01:36:05', '2020-09-08 07:06:39'),
(86, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-08 01:36:42', '2020-09-08 07:06:49'),
(87, 2, 3, 'asd', '0', NULL, NULL, NULL, '2020-09-08 01:36:49', '2020-09-08 01:36:49'),
(88, 2, 6, 'Hi', '1', NULL, NULL, NULL, '2020-09-08 08:14:50', '2020-09-08 13:45:09'),
(89, 6, 2, 'Hello', '1', NULL, NULL, NULL, '2020-09-08 08:15:09', '2020-09-08 13:45:22'),
(90, 2, 6, 'how r u', '0', NULL, NULL, NULL, '2020-09-08 08:15:22', '2020-09-08 08:15:22'),
(91, 6, 2, NULL, '1', 'upload/chat_attachments/128277825_149248284_pan_card.jpg', '149248284_pan_card.jpg', 'jpg', '2020-09-08 08:15:38', '2020-09-08 13:47:20'),
(92, 2, 6, NULL, '0', 'upload/chat_attachments/574202639_Salary_Calculation.xlsx', 'Salary Calculation.xlsx', 'xlsx', '2020-09-08 08:15:58', '2020-09-08 08:15:58'),
(93, 2, 8, 'hi', '1', NULL, NULL, NULL, '2021-07-03 01:56:31', '2021-07-03 07:27:20'),
(94, 8, 2, 'hello', '0', NULL, NULL, NULL, '2021-07-03 01:57:29', '2021-07-03 01:57:29');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('john@gmail.com', '$2y$10$5aXl2SEEmldydnHoUXvIAuHoIJZngmKOLH7xb.5BZo667lAUU24GK', '2020-09-01 05:31:48');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '#4584',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `is_active`, `avatar`, `chat_color`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '2020-09-01 05:43:24', '$2y$10$q14A/2H67Nuwalut5gMOku.EVOuLYOo9r5J.zYpJP.CtExKp.aBsC', NULL, '1', '1', '166878028_149248284_pan_card.jpg', '#4584', '2020-09-01 00:13:10', '2020-09-05 08:13:20'),
(2, 'test user', 'test@admin.com', '2020-09-01 09:15:06', '$2y$10$r8t.bQNemffKZpQrr3jds.ZZLchtqAjJdnMvZ.8ZnE4vvnXpzLTaG', NULL, '0', '1', '436404415_get_start.jpg', '#069810', '2020-09-01 03:44:28', '2020-09-08 08:17:51'),
(3, 'jigss', 'jigs@gmail.com', '2020-09-01 09:50:50', '$2y$10$wWWuS1nxLaoQqzxNgzA9aefPvwSQ4MQ1I61ZdbiHFvtb.qsmT.rNO', 'r4Ve0bbz8hrTRqczgS4DdGetazZZMUD95BuWWQqItaQAj8ACguL8OFV1PtI5', '0', '1', '391578096_get_start.jpg', '#db8fcf', '2020-09-01 03:47:20', '2020-09-08 00:11:48'),
(5, 'john wick', 'john@gmail.com', '2020-09-01 09:15:06', '$2y$10$rULxa1r9Qs7ImDF.6TXj7.jv2drS22dVTJHmQ3ixFNBnTfMZ9hjMG', NULL, '0', '1', NULL, '#4584', '2020-09-01 03:44:28', '2020-09-01 03:44:28'),
(6, 'mac', 'mac@gmail.com', '2020-09-05 13:41:32', '$2y$10$cG9tVHSh/T3DBA79ak4//On7S5C5Z4D5KosT8wp8vN7xZpcfgd7uO', NULL, '0', '1', '89391656_149248284_pan_card.jpg', '#a25858', '2020-09-05 04:58:34', '2020-09-08 08:14:00'),
(7, 'bravo', 'bravo@test.com', '2020-09-08 11:34:36', '$2y$10$paicPBXo1Fo94ZBAwo3L/OuBP5dvBpUjXy4SDud1sQKD0vIbCmMkG', NULL, '0', '0', '466254066_149248284_pan_card.jpg', NULL, '2020-09-08 06:03:46', '2020-09-08 08:12:09'),
(8, 'amb', 'amb@gmail.com', NULL, '$2y$10$r8t.bQNemffKZpQrr3jds.ZZLchtqAjJdnMvZ.8ZnE4vvnXpzLTaG', NULL, '0', '1', '', NULL, '2021-07-03 01:51:41', '2021-07-03 01:52:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_msg`
--
ALTER TABLE `chat_msg`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_msg`
--
ALTER TABLE `chat_msg`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
