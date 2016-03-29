-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2016 at 08:21 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_mac`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint(22) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(22) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `city`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nagola', 'Modinagar', 245101, '2016-03-27 03:36:57', '2016-03-27 08:36:57'),
(2, 22, 'Nangola', 'Hapur', 245101, '2016-03-27 02:57:32', '2016-03-27 07:57:32'),
(3, 25, 'Nagola', 'Modinagar', 245101, '2016-03-27 08:03:28', '2016-03-27 08:03:28'),
(4, 26, 'Nangola', 'Modinagar', 245101, '2016-03-27 08:12:41', '2016-03-27 08:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `on_post` int(10) unsigned NOT NULL DEFAULT '0',
  `from_user` int(10) unsigned NOT NULL DEFAULT '0',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comments_on_post_foreign` (`on_post`),
  KEY `comments_from_user_foreign` (`from_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `on_post`, `from_user`, `body`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 'sfds', '2016-02-04 07:43:36', '2016-02-04 07:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_02_01_033007_posts', 1),
('2016_02_01_033017_comments', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_title_unique` (`title`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_author_id_foreign` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `body`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laravel', 'laravel is good for future.', 'laravel', 1, '2016-02-01 09:34:41', '2016-02-01 09:34:41'),
(2, 1, 'Second', 'SecondSecondSecondSecondSecondSecondSecondSecondSecondSecondSecondSecondSecondSecond', 'second', 1, '2016-02-04 06:59:16', '2016-02-04 06:59:16'),
(3, 1, 'Third', 'ThirdThirdThirdThirdThirdThirdThirdThirdThirdThirdThird', 'third', 1, '2016-02-04 06:59:36', '2016-02-04 06:59:36'),
(4, 1, 'Fourth', 'ThirdThirdThird', 'fourth', 1, '2016-02-04 06:59:55', '2016-02-04 06:59:55'),
(5, 1, 'Fifth', 'FifthFifthFifthFifth', 'fifth', 1, '2016-02-04 07:00:17', '2016-02-04 07:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','author','subscriber') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'author',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mobile` bigint(22) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `profile_image`, `role`, `remember_token`, `created_at`, `updated_at`, `mobile`) VALUES
(1, 'gurudutt sharma', 'guruduttsharma33@gmail.com', '$2y$10$Cn6URzKPz5iO3ZnDNnLsJu56NQXMy0wxlufU7aTTiMZHEZm1GkVWG', 'Male', 'gurudutt sharma_1459049817.jpg', 'admin', 'SzVXP8TYB3qG28jAdXb8bmx0DOdWiPIDlCL5C7ZZWAyjfU2sSCyFAIoCUvE7', '2016-02-01 09:31:59', '2016-03-27 08:36:57', 9988252428),
(22, 'Rahul Tyagi Nangola', 'rahul@tyagi.comq', '', 'Male', 'Rahul Tyagi Nangola_1459047632.jpg', 'author', NULL, '2016-03-27 06:00:14', '2016-03-27 08:05:01', 9760841818),
(25, 'Gurudutt Sharma', 'guruduttsharma333@gmail.com', '', 'Male', 'Gurudutt Sharma_1459047808.jpg', 'author', NULL, '2016-03-27 08:03:28', '2016-03-27 08:04:35', 9988252428),
(26, 'Ankur Tyagi', 'ankur@gmail.com', '', 'Male', 'Ankur Tyagi_1459048361.jpg', 'author', NULL, '2016-03-27 08:12:41', '2016-03-27 08:12:41', 9988776655);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_from_user_foreign` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_on_post_foreign` FOREIGN KEY (`on_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
