-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 01:53 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kodi_php_structure`
--
CREATE DATABASE IF NOT EXISTS `kodi_php_structure` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kodi_php_structure`;

-- --------------------------------------------------------

--
-- Table structure for table `kodi_albania`
--
-- Creation: Mar 06, 2020 at 12:52 AM
-- Last update: Mar 06, 2020 at 12:53 AM
--

DROP TABLE IF EXISTS `kodi_albania`;
CREATE TABLE IF NOT EXISTS `kodi_albania` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Enable or Disable Categories',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Kodi Categories';

--
-- Dumping data for table `kodi_albania`
--

INSERT INTO `kodi_albania` (`id`, `title`, `link`, `thumbnail`, `active`, `description`, `added_date`) VALUES
(1, 'Albania', 'http://66.55.93.204/hls-live/livepkgr/_definst_/report/stream.m3u8', 'https://png.kodi.al/flags/albania.png', 'Yes', 'Albania Description', '2020-03-06 00:00:00'),
(2, 'Italia', 'http://66.55.93.204/hls-live/livepkgr/_definst_/report/stream.m3u8', 'https://png.kodi.al/flags/italia.png', 'Yes', 'Italia Description', '2020-03-06 00:00:00'),
(3, 'Greece', 'http://66.55.93.204/hls-live/livepkgr/_definst_/report/stream.m3u8', 'https://png.kodi.al/flags/greqia.png', 'Yes', 'Greece Description', '2020-03-06 00:00:00'),
(4, 'Germany', 'http://66.55.93.204/hls-live/livepkgr/_definst_/report/stream.m3u8', 'https://png.kodi.al/flags/gjermania.png', 'Yes', 'Germany Description', '2020-03-06 00:00:00'),
(5, 'Holland', 'https://vod.kodi.al/Hardcore_Hardstyle/Hardcore/Video_Clips/Partyraiser/Partyraiser%20&%20Scrape%20Face%20-%20Enjoy%20the%20Noise.mp4', 'https://png.kodi.al/flags/hollanda.png', 'Yes', 'Holland Description', '2020-03-06 00:00:00'),
(6, 'America', 'http://66.55.93.204/hls-live/livepkgr/_definst_/report/stream.m3u8', 'https://png.kodi.al/flags/usa.png', 'Yes', 'America Description', '2020-03-06 00:00:00'),
(7, 'Canada', 'http://66.55.93.204/hls-live/livepkgr/_definst_/report/stream.m3u8', 'https://png.kodi.al/flags/canada.png', 'Yes', 'Canada Description', '2020-03-06 00:00:00'),
(8, 'Sweden', 'http://66.55.93.204/hls-live/livepkgr/_definst_/report/stream.m3u8', 'https://png.kodi.al/flags/suedia.png', 'Yes', 'Sweden Description', '2020-03-06 00:00:00'),
(9, 'France', 'http://66.55.93.204/hls-live/livepkgr/_definst_/report/stream.m3u8', 'https://png.kodi.al/flags/franca.png', 'Yes', 'Brussels Description', '2020-03-06 00:00:00'),
(10, 'Belgium', 'http://66.55.93.204/hls-live/livepkgr/_definst_/report/stream.m3u8', 'https://png.kodi.al/flags/belgjika.png', 'Yes', 'Belgium Description', '2020-03-06 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
