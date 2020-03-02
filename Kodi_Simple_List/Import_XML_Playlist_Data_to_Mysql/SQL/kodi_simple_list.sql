-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 02:06 AM
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
-- Table structure for table `kodi_simple_list`
--
-- Creation: Mar 02, 2020 at 01:05 AM
-- Last update: Mar 02, 2020 at 01:06 AM
--

DROP TABLE IF EXISTS `kodi_simple_list`;
CREATE TABLE IF NOT EXISTS `kodi_simple_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 NOT NULL,
  `link` text CHARACTER SET utf8 NOT NULL,
  `thumbnail` text CHARACTER SET utf8 NOT NULL,
  `fanart` text CHARACTER SET utf8 NOT NULL,
  `category` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kodi_simple_list`
--

INSERT INTO `kodi_simple_list` (`id`, `title`, `link`, `thumbnail`, `fanart`, `category`) VALUES
(1, '[COLOR lime][B]RADIO CIDADE[/COLOR][/B]', 'http://mcrscast4.mcr.iol.pt:80/cidadefm', 'https://png.kodi.al/tv/albdroid/black.png', 'https://png.kodi.al/tv/albdroid/black.png', 'Media Capital Radios'),
(2, '[COLOR lime][B]RADIO COMERCIAL[/COLOR][/B]', 'http://mcrscast4.mcr.iol.pt:80/comercial', 'https://png.kodi.al/tv/albdroid/black.png', 'https://png.kodi.al/tv/albdroid/black.png', 'Media Capital Radios'),
(3, '[COLOR lime][B]RADIO COMERCIAL[/COLOR][/B]', 'http://mcrscast4.mcr.iol.pt:80/comercial.mp3', 'https://png.kodi.al/tv/albdroid/black.png', 'https://png.kodi.al/tv/albdroid/black.png', 'Media Capital Radios'),
(4, '[COLOR lime][B]RADIO M80[/COLOR][/B]', 'http://mcrscast4.mcr.iol.pt:80/m80', 'https://png.kodi.al/tv/albdroid/black.png', 'https://png.kodi.al/tv/albdroid/black.png', 'Media Capital Radios'),
(5, '[COLOR lime][B]RADIO SMOOTH FM[/COLOR][/B]', 'http://mcrscast4.mcr.iol.pt:80/smoothfm', 'https://png.kodi.al/tv/albdroid/black.png', 'https://png.kodi.al/tv/albdroid/black.png', 'Media Capital Radios'),
(6, '[COLOR lime][B]RADIO VODAFONE FM[/COLOR][/B]', 'http://mcrscast4.mcr.iol.pt:80/vodafone', 'https://png.kodi.al/tv/albdroid/black.png', 'https://png.kodi.al/tv/albdroid/black.png', 'Media Capital Radios');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
