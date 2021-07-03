-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.22-MariaDB-1ubuntu1 - Ubuntu 20.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for chat
CREATE DATABASE IF NOT EXISTS `chat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `chat`;

-- Dumping structure for table chat.chat_msg
CREATE TABLE IF NOT EXISTS `chat_msg` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `msg` longtext DEFAULT NULL,
  `msg_read` enum('0','1') NOT NULL DEFAULT '0',
  `attachment` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `file_type` char(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table chat.chat_msg: ~84 rows (approximately)
DELETE FROM `chat_msg`;
/*!40000 ALTER TABLE `chat_msg` DISABLE KEYS */;
INSERT INTO `chat_msg` (`id`, `sender_id`, `receiver_id`, `msg`, `msg_read`, `attachment`, `file_name`, `file_type`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'hello', '0', NULL, NULL, NULL, '2020-09-01 15:52:23', '2020-09-01 16:07:13'),
	(5, 3, 2, 'hello', '1', NULL, NULL, NULL, '2020-09-02 10:27:48', '2020-09-02 16:15:24'),
	(6, 3, 2, NULL, '1', 'upload/chat_attachments/149248284_pan_card.jpg', 'pan card.jpg', 'jpg', '2020-09-02 10:28:13', '2020-09-03 16:51:55'),
	(7, 3, 2, 'ss', '1', NULL, NULL, NULL, '2020-09-02 10:29:57', '2020-09-02 16:15:24'),
	(9, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-02 10:30:35', '2020-09-02 16:15:24'),
	(10, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-02 10:31:32', '2020-09-02 16:15:24'),
	(11, 3, 2, '52', '1', NULL, NULL, NULL, '2020-09-02 10:36:40', '2020-09-02 16:15:24'),
	(12, 3, 2, '52', '1', NULL, NULL, NULL, '2020-09-02 10:36:42', '2020-09-02 16:15:24'),
	(13, 3, 2, 'ko', '1', NULL, NULL, NULL, '2020-09-02 10:39:09', '2020-09-02 16:15:24'),
	(15, 3, 2, 'ss', '1', NULL, NULL, NULL, '2020-09-02 10:52:22', '2020-09-02 16:26:03'),
	(16, 2, 3, NULL, '1', 'upload/chat_attachments/409344770_aadhar.jpeg', 'aadhar.jpeg', 'jpeg', '2020-09-02 10:54:38', '2020-09-03 16:52:02'),
	(17, 3, 2, 'ss', '1', NULL, NULL, NULL, '2020-09-02 10:55:01', '2020-09-02 16:26:03'),
	(19, 3, 2, 'ffff', '1', NULL, NULL, NULL, '2020-09-02 11:05:16', '2020-09-02 16:36:51'),
	(20, 2, 3, 'JAKLSJDF K;KASDF L;KA S;LKF AKS;LDF LJASD\'F ASDJF ;JASDFJ AKJSDK JASDJ JFAKLSJDF JA FADSF;LASD LF;\'L', '1', NULL, NULL, NULL, '2020-09-02 11:21:47', '2020-09-02 16:54:03'),
	(21, 3, 2, NULL, '1', 'upload/chat_attachments/588967476_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-02 12:52:42', '2020-09-05 13:48:59'),
	(22, 3, 2, NULL, '1', 'upload/chat_attachments/140231248_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-02 12:52:49', '2020-09-05 13:48:59'),
	(23, 3, 2, NULL, '1', 'upload/chat_attachments/273025012_aadhar.jpeg', 'aadhar.jpeg', 'jpeg', '2020-09-02 13:00:19', '2020-09-05 13:48:59'),
	(24, 3, 2, NULL, '1', 'upload/chat_attachments/580586513_pan_card.jpg', 'pan card.jpg', 'jpg', '2020-09-02 13:12:58', '2020-09-05 13:48:59'),
	(25, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-03 10:58:38', '2020-09-05 13:48:59'),
	(26, 3, 2, NULL, '1', 'upload/chat_attachments/842272951_OpTransactionHistory31-08-2020.pdf', 'OpTransactionHistory31-08-2020.pdf', 'pdf', '2020-09-03 11:12:44', '2020-09-05 13:48:59'),
	(27, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-04 05:12:32', '2020-09-05 13:48:59'),
	(28, 3, 2, NULL, '1', 'upload/chat_attachments/137141169_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-04 05:12:45', '2020-09-05 13:48:59'),
	(29, 3, 2, 'asdf', '1', NULL, NULL, NULL, '2020-09-05 08:18:28', '2020-09-05 13:48:59'),
	(30, 2, 3, 'qwerty', '1', NULL, NULL, NULL, '2020-09-05 08:19:06', '2020-09-05 13:52:00'),
	(31, 2, 3, NULL, '1', 'upload/chat_attachments/531040632_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-05 08:20:09', '2020-09-05 13:52:00'),
	(32, 2, 3, NULL, '1', 'upload/chat_attachments/741803007_pan_card.jpg', 'pan card.jpg', 'jpg', '2020-09-05 08:22:13', '2020-09-05 13:55:20'),
	(34, 2, 3, NULL, '1', 'upload/chat_attachments/354372467_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-05 08:26:52', '2020-09-05 14:07:22'),
	(35, 3, 2, '123', '1', NULL, NULL, NULL, '2020-09-05 08:51:01', '2020-09-05 15:22:35'),
	(36, 3, 2, 'as', '1', NULL, NULL, NULL, '2020-09-05 09:09:56', '2020-09-05 15:22:35'),
	(37, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-05 09:42:24', '2020-09-05 15:22:35'),
	(38, 3, 2, 'test', '1', NULL, NULL, NULL, '2020-09-05 09:49:50', '2020-09-05 15:22:35'),
	(39, 2, 3, NULL, '1', 'upload/chat_attachments/147662388_aadhar.jpeg', 'aadhar.jpeg', 'jpeg', '2020-09-05 09:52:47', '2020-09-05 15:23:02'),
	(40, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-05 09:53:02', '2020-09-05 15:23:13'),
	(41, 2, 3, '123', '1', NULL, NULL, NULL, '2020-09-05 09:53:13', '2020-09-05 15:26:57'),
	(42, 3, 2, '4567', '1', NULL, NULL, NULL, '2020-09-05 09:57:05', '2020-09-05 15:28:17'),
	(44, 6, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-05 10:43:58', '2020-09-05 16:15:14'),
	(45, 2, 6, 'hi', '1', NULL, NULL, NULL, '2020-09-05 10:45:17', '2020-09-05 16:15:27'),
	(46, 2, 5, 'hi', '1', NULL, NULL, NULL, '2020-09-05 13:19:58', '2020-09-05 18:50:09'),
	(47, 5, 2, 'hello', '1', NULL, NULL, NULL, '2020-09-05 13:20:15', '2020-09-05 18:50:35'),
	(48, 2, 5, 'hr', '1', NULL, NULL, NULL, '2020-09-05 13:20:35', '2020-09-05 18:50:54'),
	(49, 2, 5, 'asd', '1', NULL, NULL, NULL, '2020-09-05 13:21:13', '2020-09-05 18:51:18'),
	(50, 5, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-05 13:21:18', '2020-09-05 18:51:30'),
	(51, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 13:22:27', '2020-09-05 19:00:01'),
	(52, 2, 5, 'asd', '1', NULL, NULL, NULL, '2020-09-05 13:30:06', '2020-09-05 19:01:17'),
	(53, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 13:30:56', '2020-09-05 19:01:17'),
	(54, 5, 2, '456', '1', NULL, NULL, NULL, '2020-09-05 13:31:17', '2020-09-05 19:01:56'),
	(55, 5, 2, '253', '1', NULL, NULL, NULL, '2020-09-05 13:32:08', '2020-09-05 19:07:25'),
	(56, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 13:37:25', '2020-09-05 19:10:13'),
	(57, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 13:37:26', '2020-09-05 19:10:13'),
	(58, 2, 5, '123', '1', NULL, NULL, NULL, '2020-09-05 13:37:27', '2020-09-05 19:10:13'),
	(59, 5, 2, '987', '1', NULL, NULL, NULL, '2020-09-05 13:40:26', '2020-09-05 19:16:11'),
	(61, 6, 2, 'HI', '1', NULL, NULL, NULL, '2020-09-05 13:44:44', '2020-09-05 19:16:06'),
	(62, 6, 2, NULL, '1', 'upload/chat_attachments/625276344_149248284_pan_card.jpg', '149248284_pan_card.jpg', 'jpg', '2020-09-05 13:44:54', '2020-09-05 19:16:06'),
	(63, 2, 6, NULL, '1', 'upload/chat_attachments/714569364_get_start.jpg', 'get_start.jpg', 'jpg', '2020-09-05 13:45:04', '2020-09-08 19:13:16'),
	(64, 3, 2, 'Hi', '1', NULL, NULL, NULL, '2020-09-08 05:59:51', '2020-09-08 11:29:56'),
	(65, 2, 3, 'hello', '1', NULL, NULL, NULL, '2020-09-08 06:00:06', '2020-09-08 11:31:10'),
	(66, 2, 3, 'hi', '1', NULL, NULL, NULL, '2020-09-08 06:07:30', '2020-09-08 11:37:46'),
	(67, 2, 3, 'hi', '1', NULL, NULL, NULL, '2020-09-08 06:07:32', '2020-09-08 11:37:46'),
	(68, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-08 06:07:51', '2020-09-08 11:38:17'),
	(69, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-08 06:20:59', '2020-09-08 12:09:23'),
	(70, 3, 2, 'das', '1', NULL, NULL, NULL, '2020-09-08 06:37:58', '2020-09-08 12:09:23'),
	(71, 2, 3, 'asd', '1', NULL, NULL, NULL, '2020-09-08 06:39:23', '2020-09-08 12:11:58'),
	(72, 3, 2, 'asdf', '1', NULL, NULL, NULL, '2020-09-08 06:42:38', '2020-09-08 12:20:53'),
	(73, 3, 2, 'jil', '1', NULL, NULL, NULL, '2020-09-08 06:45:28', '2020-09-08 12:20:53'),
	(74, 2, 3, '152', '1', NULL, NULL, NULL, '2020-09-08 06:50:56', '2020-09-08 12:21:43'),
	(75, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-08 06:51:43', '2020-09-08 12:22:05'),
	(76, 2, 3, 'erw', '1', NULL, NULL, NULL, '2020-09-08 06:52:05', '2020-09-08 12:22:19'),
	(77, 3, 2, 'wret', '1', NULL, NULL, NULL, '2020-09-08 06:52:19', '2020-09-08 12:34:43'),
	(78, 3, 2, '456', '1', NULL, NULL, NULL, '2020-09-08 07:01:53', '2020-09-08 12:34:43'),
	(79, 3, 2, '45', '1', NULL, NULL, NULL, '2020-09-08 07:02:19', '2020-09-08 12:34:43'),
	(80, 3, 2, NULL, '1', 'upload/chat_attachments/871909617_149248284_pan_card.jpg', '149248284_pan_card.jpg', 'jpg', '2020-09-08 07:04:27', '2020-09-08 12:34:43'),
	(81, 2, 3, 'asd', '1', NULL, NULL, NULL, '2020-09-08 07:04:47', '2020-09-08 12:34:55'),
	(82, 3, 2, 'asdasdsda', '1', NULL, NULL, NULL, '2020-09-08 07:04:55', '2020-09-08 12:35:09'),
	(83, 2, 3, 'adsf', '1', NULL, NULL, NULL, '2020-09-08 07:05:44', '2020-09-08 12:35:54'),
	(84, 3, 2, 'asdf', '1', NULL, NULL, NULL, '2020-09-08 07:06:01', '2020-09-08 12:36:05'),
	(85, 2, 3, 'asdf', '1', NULL, NULL, NULL, '2020-09-08 07:06:05', '2020-09-08 12:36:39'),
	(86, 3, 2, 'asd', '1', NULL, NULL, NULL, '2020-09-08 07:06:42', '2020-09-08 12:36:49'),
	(87, 2, 3, 'asd', '0', NULL, NULL, NULL, '2020-09-08 07:06:49', '2020-09-08 07:06:49'),
	(88, 2, 6, 'Hi', '1', NULL, NULL, NULL, '2020-09-08 13:44:50', '2020-09-08 19:15:09'),
	(89, 6, 2, 'Hello', '1', NULL, NULL, NULL, '2020-09-08 13:45:09', '2020-09-08 19:15:22'),
	(90, 2, 6, 'how r u', '0', NULL, NULL, NULL, '2020-09-08 13:45:22', '2020-09-08 13:45:22'),
	(91, 6, 2, NULL, '1', 'upload/chat_attachments/128277825_149248284_pan_card.jpg', '149248284_pan_card.jpg', 'jpg', '2020-09-08 13:45:38', '2020-09-08 19:17:20'),
	(92, 2, 6, NULL, '0', 'upload/chat_attachments/574202639_Salary_Calculation.xlsx', 'Salary Calculation.xlsx', 'xlsx', '2020-09-08 13:45:58', '2020-09-08 13:45:58');
/*!40000 ALTER TABLE `chat_msg` ENABLE KEYS */;

-- Dumping structure for table chat.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chat.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table chat.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chat.migrations: ~2 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table chat.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chat.password_resets: ~2 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('john@gmail.com', '$2y$10$5aXl2SEEmldydnHoUXvIAuHoIJZngmKOLH7xb.5BZo667lAUU24GK', '2020-09-01 11:01:48');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table chat.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chat.users: ~6 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `is_active`, `avatar`, `chat_color`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', '2020-09-01 11:13:24', '$2y$10$rW9L7HJQHLJWIY1NqE9B8eKhZ85cfyYpLVvdAp3Q3Sc.FBS6LFDXu', NULL, '1', '1', '166878028_149248284_pan_card.jpg', '#4584', '2020-09-01 05:43:10', '2020-09-05 13:43:20'),
	(2, 'test user', 'test@admin.com', '2020-09-01 14:45:06', '$2y$10$rULxa1r9Qs7ImDF.6TXj7.jv2drS22dVTJHmQ3ixFNBnTfMZ9hjMG', NULL, '0', '1', '436404415_get_start.jpg', '#069810', '2020-09-01 09:14:28', '2020-09-08 13:47:51'),
	(3, 'jigss', 'jigs@gmail.com', '2020-09-01 15:20:50', '$2y$10$wWWuS1nxLaoQqzxNgzA9aefPvwSQ4MQ1I61ZdbiHFvtb.qsmT.rNO', 'r4Ve0bbz8hrTRqczgS4DdGetazZZMUD95BuWWQqItaQAj8ACguL8OFV1PtI5', '0', '1', '391578096_get_start.jpg', '#db8fcf', '2020-09-01 09:17:20', '2020-09-08 05:41:48'),
	(5, 'john wick', 'john@gmail.com', '2020-09-01 14:45:06', '$2y$10$rULxa1r9Qs7ImDF.6TXj7.jv2drS22dVTJHmQ3ixFNBnTfMZ9hjMG', NULL, '0', '1', NULL, '#4584', '2020-09-01 09:14:28', '2020-09-01 09:14:28'),
	(6, 'mac', 'mac@gmail.com', '2020-09-05 19:11:32', '$2y$10$cG9tVHSh/T3DBA79ak4//On7S5C5Z4D5KosT8wp8vN7xZpcfgd7uO', NULL, '0', '1', '89391656_149248284_pan_card.jpg', '#a25858', '2020-09-05 10:28:34', '2020-09-08 13:44:00'),
	(7, 'bravo', 'bravo@test.com', '2020-09-08 17:04:36', '$2y$10$paicPBXo1Fo94ZBAwo3L/OuBP5dvBpUjXy4SDud1sQKD0vIbCmMkG', NULL, '0', '0', '466254066_149248284_pan_card.jpg', NULL, '2020-09-08 11:33:46', '2020-09-08 13:42:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
