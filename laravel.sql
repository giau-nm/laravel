-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 08:50 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel`
--
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Uncategorized', 33, '2013-10-24 09:41:57', '2014-01-28 08:25:19'),
(2, 'Acer', 1, '2013-10-18 08:57:00', '2016-04-24 12:31:24'),
(25, 'News', 24, '2013-10-24 09:40:46', '2013-10-24 09:40:46'),
(31, 'Comics', 18, '2014-01-28 07:59:34', '2014-01-28 09:00:58'),
(32, 'Asus', 3, '2014-01-28 08:25:09', '2016-04-24 12:35:43'),
(33, 'Music', 22, '2014-01-28 08:44:11', '2014-01-28 08:44:11'),
(34, 'Lenovo', 2, '2014-01-28 08:45:15', '2016-04-24 12:34:36'),
(35, 'Film', 20, '2014-01-28 09:00:22', '2014-01-28 09:00:22'),
(36, 'Family', 19, '2014-01-28 09:01:08', '2014-01-28 09:01:08'),
(37, 'Phụ kiện', 13, '2014-01-30 21:11:41', '2016-04-24 12:36:18'),
(39, 'Food', 21, '2014-01-30 21:46:00', '2014-01-30 21:46:00'),
(40, 'Retro', 25, '2014-02-03 21:38:23', '2014-02-03 21:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pic_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vid_url` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_flags`
--

CREATE TABLE IF NOT EXISTS `comment_flags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_votes`
--

CREATE TABLE IF NOT EXISTS `comment_votes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `up` tinyint(1) NOT NULL DEFAULT '0',
  `down` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `vid` tinyint(1) NOT NULL DEFAULT '0',
  `pic` tinyint(1) NOT NULL DEFAULT '1',
  `pic_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vid_url` text COLLATE utf8_unicode_ci,
  `link_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nsfw` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `location` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=226 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `user_id`, `category_id`, `title`, `slug`, `description`, `active`, `vid`, `pic`, `pic_url`, `vid_url`, `link_url`, `tags`, `created_at`, `updated_at`, `nsfw`, `views`, `location`) VALUES
(219, 2, 2, 'Mô tô đẹp', 'mo-to-p', NULL, 1, 0, 1, 'April2016/Motorbike-wallpapers.jpg', NULL, NULL, NULL, '2016-04-28 10:21:01', '2016-04-28 11:58:49', 0, 0, 0),
(221, 2, 1, 'Bán điện thoại', 'ban-i-n-tho-i', NULL, 1, 0, 1, 'April2016/2.jpg', NULL, NULL, NULL, '2016-04-28 10:38:44', '2016-04-28 12:26:21', 0, 0, 0),
(222, 2, 2, 'Trả góp 0 đồng', 'tr-gop-0-ng', NULL, 1, 0, 1, 'May2016/tra gop 0 dong.jpg', NULL, 'http://chiaseaz.com', NULL, '2016-04-28 10:40:02', '2016-05-01 05:57:01', 0, 0, 3),
(223, 2, 2, 'Miễn phí 1 đổi 1', 'mi-n-phi-1-i-1', NULL, 1, 0, 1, 'May2016/mien phi 1 doi 1.png', NULL, 'http://chiaseaz.com', NULL, '2016-04-28 11:00:10', '2016-05-01 03:28:15', 0, 0, 2),
(224, 2, 1, 'Hồ ngọc hà', 'h-ng-c-ha', NULL, 1, 0, 1, 'April2016/1.png', NULL, 'http://chiaseaz.com', NULL, '2016-04-28 11:08:25', '2016-05-01 03:27:57', 0, 0, 0),
(225, 2, 2, 'Xả hàng giảm ngay', 'x-hang-gi-m-ngay', NULL, 1, 0, 1, 'May2016/51642a34d4262bbe707d44b732c38b191249.png', NULL, 'http://chiaseaz.com', NULL, '2016-04-28 11:36:08', '2016-05-01 03:27:30', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_flags`
--

CREATE TABLE IF NOT EXISTS `media_flags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `media_likes`
--

CREATE TABLE IF NOT EXISTS `media_likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `media_likes`
--

INSERT INTO `media_likes` (`id`, `user_id`, `media_id`, `created_at`, `updated_at`) VALUES
(1, 2, 214, '2016-04-23 11:08:24', '2016-04-23 11:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_facebook`
--

CREATE TABLE IF NOT EXISTS `oauth_facebook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `oauth_userid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_google`
--

CREATE TABLE IF NOT EXISTS `oauth_google` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `oauth_userid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `show_in_menu` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `url`, `body`, `order`, `active`, `show_in_menu`, `created_at`, `updated_at`) VALUES
(1, 'giới thiệu', '', '<p>Giới thiệu về trang n&agrave;y</p>', 0, 1, 1, '2016-04-28 12:07:19', '2016-04-28 12:07:19'),
(2, 'Liên hệ', 'lien-he', '<p>Mọi th&ocirc;ng tin li&ecirc;n hệ gửi v&agrave;o đ&acirc;y cho t&ocirc;i</p>', 0, 1, 1, '2016-05-01 10:39:07', '2016-05-01 10:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_reminders`
--

INSERT INTO `password_reminders` (`email`, `token`, `created_at`) VALUES
('vanlien129@gmail.com', '0a8db5aa9d7b97aca8cdaad083747d77fb609989', '2016-04-23 10:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `user_id`, `points`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 200, 'Registration', '2014-08-09 13:02:45', '2014-08-09 13:02:45'),
(2, 1, 5, 'Daily Login', '2014-08-09 13:03:35', '2014-08-09 13:03:35'),
(3, 2, 200, 'Registration', '2016-04-23 10:15:36', '2016-04-23 10:15:36'),
(4, 2, 1, 'Daily Upload', '2016-04-23 11:07:49', '2016-04-23 11:07:49'),
(5, 2, 5, 'Daily Login', '2016-04-23 11:25:45', '2016-04-23 11:25:45'),
(6, 2, 5, 'Daily Login', '2016-04-23 19:53:22', '2016-04-23 19:53:22'),
(7, 2, 5, 'Daily Login', '2016-04-25 09:55:32', '2016-04-25 09:55:32'),
(8, 2, 1, 'Daily Upload', '2016-04-25 10:37:31', '2016-04-25 10:37:31'),
(9, 2, 5, 'Daily Login', '2016-04-28 10:15:59', '2016-04-28 10:15:59'),
(10, 2, 1, 'Daily Upload', '2016-04-28 10:21:00', '2016-04-28 10:21:00'),
(11, 2, 1, 'Daily Upload', '2016-04-28 10:24:45', '2016-04-28 10:24:45'),
(12, 2, 1, 'Daily Upload', '2016-04-28 10:38:44', '2016-04-28 10:38:44'),
(13, 2, 1, 'Daily Upload', '2016-04-28 10:39:34', '2016-04-28 10:39:34'),
(14, 2, 1, 'Daily Upload', '2016-04-28 10:40:02', '2016-04-28 10:40:02'),
(15, 2, 5, 'Daily Login', '2016-05-01 02:53:33', '2016-05-01 02:53:33'),
(16, 2, 5, 'Daily Login', '2016-05-06 11:22:21', '2016-05-06 11:22:21'),
(17, 2, 5, 'Daily Login', '2016-05-06 23:54:04', '2016-05-06 23:54:04'),
(18, 2, 5, 'Daily Login', '2016-05-10 10:48:33', '2016-05-10 10:48:33'),
(19, 2, 5, 'Daily Login', '2016-05-12 08:52:11', '2016-05-12 08:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `product_sale` char(5) DEFAULT NULL,
  `product_code` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content_short` varchar(255) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `hot` smallint(6) NOT NULL,
  `selling` tinyint(1) DEFAULT NULL,
  `views` int(11) NOT NULL,
  `dowload` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `ordering` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `alias`, `price`, `product_sale`, `product_code`, `source`, `origin`, `image`, `content_short`, `description`, `featured`, `hot`, `selling`, `views`, `dowload`, `status`, `ordering`, `created`, `updated_at`, `created_at`, `lang`) VALUES
(13, 34, 'Tivi hoa đẹp ', 'quan-skinny', 200000, '', '', '', '', 'May2016/6b09eeef82ae7bffdfc165a787018a9312491249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 2, 0, 1, 0, '2016-01-06 00:49:23', '2016-05-12 10:20:18', '0000-00-00 00:00:00', 'vietnamese'),
(14, 34, 'Tivi màn hình phẳng 34 in', 'chan-vay-xoe-adoscom', 0, '', '', '', '', 'May2016/032d00f1833759cb6e246bb939b7e8a312491249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 42, 0, 1, 0, '2016-01-06 00:50:06', '2016-05-12 10:20:43', '0000-00-00 00:00:00', 'vietnamese'),
(15, 34, 'Tivi phantom rồng đỏ', 'ao-khoac-runkie', 15000, '', '', '', '', 'May2016/99a59c0783c679896ee2bc2b8c228da212491249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 1, 0, NULL, 38, 0, 1, 0, '2016-01-06 00:50:32', '2016-05-12 10:21:05', '0000-00-00 00:00:00', 'vietnamese'),
(16, 32, 'Tivi laraven sự lôi quấn kỳ diệu', 'quan-jean-bookcua', 15000, '51', '', '', '', 'May2016/880_1f46f0a09590c05c42980353df5608ce12491249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 1, 0, 0, 10, 0, 1, 0, '2016-01-06 00:51:07', '2016-05-12 10:21:32', '0000-00-00 00:00:00', 'vietnamese'),
(17, 34, 'Sieu phẳng siêu nét là siêu phẩm', 'quan-au-nam-khuyen-mai', 150000, '5', '', '', '', 'May2016/880_9454f56221220491d8e3e8c3a720210b12491249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 11, 0, 1, 0, '2016-01-06 01:09:13', '2016-05-12 10:21:55', '0000-00-00 00:00:00', 'vietnamese'),
(19, 32, 'HP corel dure 01', '', 0, NULL, '', '', '', 'May2016/5734c39e07248-880_1f46f0a09590c05c42980353df5608ce12491249_500.jpg', '', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 0, 0, 0, 1, '0000-00-00 00:00:00', '2016-05-12 10:55:42', '2016-04-23 21:42:32', NULL),
(20, 34, 'Tivi Led Samsung', '', 20000, NULL, '', '', '', 'May2016/880_cdb0f8810cb7543ccf8468489eeae60a12491249_500.jpg', '', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 0, 0, 0, 2, '0000-00-00 00:00:00', '2016-05-12 10:22:33', '2016-04-23 21:43:17', NULL),
(21, 34, 'Hoa bạch đằng thuần hoá', '', 120000, NULL, '', '', '', 'May2016/ab0bb014e54fdb8d3137fa9c3f5ae55612491249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 1, 1, NULL, 0, 0, 0, 2, '0000-00-00 00:00:00', '2016-05-12 10:23:02', '2016-04-23 21:48:16', NULL),
(22, 32, 'Tivi về các loài vật', '', 120000, NULL, '', '', '', 'May2016/1249_8e6b71320e101ee6b68a1c37b9322bde1249_500.jpg', '', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 0, 0, 0, 2, '0000-00-00 00:00:00', '2016-05-12 10:23:41', '2016-04-24 11:09:26', NULL),
(23, 37, 'Đại dương mênh mông quá', '', 120000, NULL, '', '', '', 'May2016/1249_7f0006b947bc354146eeeaa010c722c21249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 0, 0, 0, 2, '0000-00-00 00:00:00', '2016-05-12 10:24:07', '2016-04-24 11:11:51', NULL),
(24, 34, 'Nếu em còn tồn tại', '', 120000, NULL, '', '', '', 'May2016/1249_87fe55b1936ee8d3b5005263e9f6ebc71249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 0, 0, 0, 2, '0000-00-00 00:00:00', '2016-05-12 10:24:28', '2016-04-24 11:33:12', NULL),
(25, 37, 'Khi người mình yêu khóc', '', 120000, NULL, '', '', '', 'May2016/1249_9a6200fe15a9111e267ad45ceb1f98791249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 0, 0, 0, 2, '0000-00-00 00:00:00', '2016-05-12 10:24:50', '2016-04-24 11:36:50', NULL),
(26, 37, 'Chỉ còn trong ký ức', '', 120000, NULL, '', '', '', 'May2016/5734bc74cee2c-99a59c0783c679896ee2bc2b8c228da212491249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 0, 0, 0, 2, '0000-00-00 00:00:00', '2016-05-12 10:25:09', '2016-04-24 11:37:54', NULL),
(27, 34, 'Nếu lúc trước em đừng tới', '', 120000, NULL, '', '', '', 'May2016/5734bc8c5a06d-880_9454f56221220491d8e3e8c3a720210b12491249_500.jpg', '<p>M&ocirc; tả ngắn về sản phẩm n&agrave;y</p>', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 0, 0, 0, 2, '0000-00-00 00:00:00', '2016-05-12 10:25:32', '2016-04-24 11:52:55', NULL),
(28, 37, 'Đông về em ở đâu', '', 150000, NULL, '', '', '', 'May2016/5734bca0e6b1e-880_cdb0f8810cb7543ccf8468489eeae60a12491249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 0, NULL, 0, 0, 0, 1, '0000-00-00 00:00:00', '2016-05-12 10:25:53', '2016-05-07 01:08:08', NULL),
(29, 37, 'Ngày mai lại tuyệt vời', '', 170000, NULL, '', '', '', 'May2016/1249_9454f56221220491d8e3e8c3a720210b1249_500.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takim', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 1, 1, NULL, 0, 0, 0, 2, '0000-00-00 00:00:00', '2016-05-12 10:26:15', '2016-05-07 01:10:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_secret_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_page_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_secret_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_page_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_page_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_title_length` int(11) NOT NULL,
  `auto_approve_posts` tinyint(1) NOT NULL,
  `custom_css` text COLLATE utf8_unicode_ci NOT NULL,
  `like_icon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `primary_color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `square_ad` text COLLATE utf8_unicode_ci NOT NULL,
  `color_scheme` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'light',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `analytics` text COLLATE utf8_unicode_ci NOT NULL,
  `user_registration` tinyint(1) NOT NULL DEFAULT '1',
  `infinite_scroll` tinyint(1) NOT NULL DEFAULT '1',
  `random_bar_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `media_description` tinyint(1) NOT NULL DEFAULT '0',
  `inbetween_ads` text COLLATE utf8_unicode_ci,
  `inbetween_ads_repeat` int(11) NOT NULL DEFAULT '5',
  `enable_watermark` tinyint(1) NOT NULL DEFAULT '0',
  `watermark_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'application/assets/img/watermark.png',
  `watermark_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'bottom-right',
  `watermark_offset_x` int(11) NOT NULL DEFAULT '0',
  `watermark_offset_y` int(11) NOT NULL DEFAULT '0',
  `pages_in_menu` tinyint(1) NOT NULL DEFAULT '1',
  `pages_in_menu_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'More',
  `infinite_load_btn` tinyint(1) NOT NULL DEFAULT '0',
  `captcha` tinyint(1) NOT NULL DEFAULT '0',
  `captcha_public_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `captcha_private_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_description`, `logo`, `favicon`, `theme`, `fb_key`, `fb_secret_key`, `facebook_page_id`, `google_key`, `google_secret_key`, `google_page_id`, `twitter_page_id`, `post_title_length`, `auto_approve_posts`, `custom_css`, `like_icon`, `secondary_color`, `primary_color`, `square_ad`, `color_scheme`, `created_at`, `updated_at`, `analytics`, `user_registration`, `infinite_scroll`, `random_bar_enabled`, `media_description`, `inbetween_ads`, `inbetween_ads_repeat`, `enable_watermark`, `watermark_image`, `watermark_position`, `watermark_offset_x`, `watermark_offset_y`, `pages_in_menu`, `pages_in_menu_text`, `infinite_load_btn`, `captcha`, `captcha_public_key`, `captcha_private_key`) VALUES
(1, 'Mẫu website bán hàng trên nền tảng laravel', 'Mô tả Mẫu website bán hàng trên nền tảng laravel', '57263615c79f1-logo.png', '5726363eeb5a3-logo.png', '', '', '', 'https://www.facebook.com/senxavi2014/', '', '', 'envato', 'envato', 0, 1, '', 'fa-thumbs-o-up', '#12c3ee', '#ee222e', '', 'light', '0000-00-00 00:00:00', '2016-05-06 11:28:48', '', 0, 1, 0, 0, '', 5, 0, 'application/assets/img/watermark.png', 'bottom-right', 0, 0, 1, 'More', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `admin`, `active`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `activation_code`, `remember_token`) VALUES
(1, 'admin', 1, 1, 'vanlien129@gmail.com', '$2y$08$bl0ysLol79Tn8tHcZO.XxOlqnm8M3gBo.m32XpQQz9oO/rsRTiv3.', 'default.jpg', '2014-08-09 13:02:45', '2014-08-09 13:03:51', NULL, 'RHMAuzf2Aou6M4ZwVpXdWG84khdiVlN7F2AnXv5ntGw9G5gMBEpRqoDkz0sg'),
(2, 'meocon', 1, 1, 'meocon@gmail.com', '$2y$08$lRFne38K9W8d3/eVnE3qoe4X3sfpWGoZ7n3yZuv.YZPmaHccHEL8e', 'default.jpg', '2016-04-23 10:15:36', '2016-05-12 11:49:09', NULL, 'pSeeEKlHuP4aOX0zobYrlUizccjIqW992NMAMIKgBLAxIyMXLbfPeHCpky1g');

-- --------------------------------------------------------

--
-- Table structure for table `user_flags`
--

CREATE TABLE IF NOT EXISTS `user_flags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_flagged_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
