-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 02:04 PM
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
-- Database: `xml_with_sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `regex_single`
--
-- Creation: Mar 01, 2020 at 12:47 PM
-- Last update: Mar 01, 2020 at 01:04 PM
--

DROP TABLE IF EXISTS `regex_single`;
CREATE TABLE IF NOT EXISTS `regex_single` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fanart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expres` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regex_single`
--

INSERT INTO `regex_single` (`id`, `title`, `thumbnail`, `fanart`, `link`, `name`, `expres`, `page`) VALUES
(1, '[COLOR lime][B]Vibee Radio[/B][/COLOR]', 'https://png.kodi.al/tv/albdroid/black.png', 'https://png.kodi.al/tv/albdroid/black.png', '$doregex[gettrc]|User-Agent=iPhone', 'gettrc', 'mp3: \"(http.*?)\"', 'http://www.vibee.tv/radioplayer/aplayer.html'),
(2, '[COLOR lime][B]We Are The Nightbreed 047 with Sub Sonik FB[/B][/COLOR]', 'https://png.kodi.al/tv/albdroid/black.png', 'https://png.kodi.al/tv/albdroid/black.png', '$doregex[gettrc]|User-Agent=iPhone', 'gettrc', '(http.*?\\w.*)', 'https://demo.kodi.al/Streaming/AIO_Vendors/Facebook/M3U_Player/?url=https://www.facebook.com/Qdance/videos/853918188414298/'),
(3, '[COLOR lime][B]VIMEO TRC4 - MOH 2013[/COLOR][/B]', 'http://png.kodi.al/tv/albdroid/black.png', 'http://png.kodi.al/tv/albdroid/black.png', 'https://demo.kodi.al/Streaming/AIO_Vendors/Vimeo/GET/Smart_TV_Structure.php?id=308734134', '', '', ''),
(4, '[B][COLOR lime]ABC News Albania[/COLOR][/B]', 'https://png.kodi.al/tv/albdroid/black.png', 'https://png.kodi.al/tv/albdroid/black.png', '$doregex[get]', 'get', '.*stream.*(http.*?m3u8.*?)\"', 'http://abcnews.al/livebig.php');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
