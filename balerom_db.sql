-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 04:17 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balerom_db`
--
CREATE DATABASE IF NOT EXISTS `balerom_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `balerom_db`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('8ce75b7fd163e93101aaef377a4fa12185d06e91', '::1', 1447981089, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373938313037323b6c6f675f7374617475737c733a373a2273756363657373223b),
('956556c324f055321b05e17454fd132f394bba2a', '::1', 1445382887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353338323834333b6c6f675f7374617475737c733a373a2273756363657373223b),
('a78d6b154ef6400b9174006b30fad012cdf3e1a8', '::1', 1445417957, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353431373934393b6c6f675f7374617475737c733a373a2273756363657373223b),
('c7c3a0f9260fff57357874d6c0fa58ff165178b6', '::1', 1445382843, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353338323834333b6c6f675f7374617475737c733a373a2273756363657373223b),
('dc73c8d5eea06b92bd4b86c476235f6fd2bde4ab', '::1', 1445378145, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353337383133383b6c6f675f7374617475737c733a373a2273756363657373223b),
('fbe42acb7d2686c4ef657a1cf0bb3c866000b3c5', '::1', 1447980924, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434373938303732343b6c6f675f7374617475737c733a373a2273756363657373223b);

-- --------------------------------------------------------

--
-- Table structure for table `db_account`
--

CREATE TABLE IF NOT EXISTS `db_account` (
  `acc_username` varchar(10) NOT NULL DEFAULT 'balerom',
  `acc_password` varchar(256) NOT NULL,
  `acc_last_access` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_account`
--

INSERT INTO `db_account` (`acc_username`, `acc_password`, `acc_last_access`) VALUES
('balerom', '$2y$10$YAoOH4YLLh4wAUMZ2QpmIumTln.t9Vf0W42JyVJpBwFksGuRswz9K', '2015-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `db_album`
--

CREATE TABLE IF NOT EXISTS `db_album` (
  `album_id` int(11) NOT NULL DEFAULT '4096',
  `album_title` varchar(50) NOT NULL,
  `album_year` year(4) NOT NULL,
  `album_price` double NOT NULL,
  `isFeatured` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_album`
--

INSERT INTO `db_album` (`album_id`, `album_title`, `album_year`, `album_price`, `isFeatured`) VALUES
(4096, 'Balerom VOLL II.', 2010, 10, 1),
(4097, 'Sentimiento Antisocial', 2005, 10, 1),
(4098, 'Solo Soy', 2008, 10, 1),
(4099, 'Viaje Salvaje', 2013, 10, 1),
(4100, 'Amor Artificial', 2007, 10, 0),
(4101, 'Evolución en Vivo', 2010, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_album_track`
--

CREATE TABLE IF NOT EXISTS `db_album_track` (
  `track_id` int(11) NOT NULL,
  `track_title` varchar(50) NOT NULL,
  `track_album` int(11) NOT NULL DEFAULT '0',
  `track_price` double NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_album_track`
--

INSERT INTO `db_album_track` (`track_id`, `track_title`, `track_album`, `track_price`) VALUES
(4096, '01 - Tal Vez', 4097, 2);

-- --------------------------------------------------------

--
-- Table structure for table `db_bundle`
--

CREATE TABLE IF NOT EXISTS `db_bundle` (
  `bundle_id` int(11) NOT NULL DEFAULT '4096',
  `bundle_title` varchar(60) NOT NULL,
  `bundle_price` int(11) NOT NULL,
  `isFeatured` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_bundle_item`
--

CREATE TABLE IF NOT EXISTS `db_bundle_item` (
  `bundle_id` int(11) NOT NULL,
  `item_type` int(11) NOT NULL DEFAULT '3',
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_order`
--

CREATE TABLE IF NOT EXISTS `db_order` (
  `order_id` int(11) NOT NULL DEFAULT '1024',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_token` varchar(64) DEFAULT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0',
  `order_email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_order`
--

INSERT INTO `db_order` (`order_id`, `order_date`, `order_token`, `order_status`, `order_email`) VALUES
(1026, '2015-10-16 22:10:56', '24146db4eb48c718b84cae0a0799dcfc', 1, 'nosreg216@gmail.com'),
(1027, '2015-10-16 23:25:50', '883e881bb4d22a7add958f2d6b052c9f', 1, 'nosreg216@outlook.com'),
(1028, '2015-10-16 23:30:58', '3806734b256c27e41ec2c6bffa26d9e7', 1, 'nosreg216@gmail.com'),
(1029, '2015-10-17 06:58:06', '84d2004bf28a2095230e8e14993d398d', 1, 'nosreg216@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `db_order_item`
--

CREATE TABLE IF NOT EXISTS `db_order_item` (
  `order_id` int(11) NOT NULL DEFAULT '1024',
  `item_id` int(11) NOT NULL,
  `item_type` int(11) NOT NULL,
  `item_subtotal` int(11) NOT NULL,
  `downloaded` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_order_item`
--

INSERT INTO `db_order_item` (`order_id`, `item_id`, `item_type`, `item_subtotal`, `downloaded`) VALUES
(1026, 4096, 1, 10, 6),
(1027, 4096, 2, 2, 1),
(1028, 4096, 2, 2, 5),
(1029, 4096, 2, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `db_song`
--

CREATE TABLE IF NOT EXISTS `db_song` (
  `song_id` int(11) NOT NULL DEFAULT '1024',
  `song_title` varchar(50) NOT NULL,
  `song_year` year(4) NOT NULL,
  `song_price` double NOT NULL DEFAULT '2',
  `isFeatured` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_video`
--

CREATE TABLE IF NOT EXISTS `db_video` (
  `video_id` int(11) NOT NULL DEFAULT '4096',
  `video_title` varchar(50) NOT NULL,
  `video_format` varchar(6) NOT NULL,
  `video_year` year(4) NOT NULL,
  `video_price` double NOT NULL,
  `isFeatured` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_video`
--

INSERT INTO `db_video` (`video_id`, `video_title`, `video_format`, `video_year`, `video_price`, `isFeatured`) VALUES
(4096, 'Video 1', '', 2015, 10, 1),
(4097, 'Video 2', '', 2015, 20, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `db_account`
--
ALTER TABLE `db_account`
  ADD PRIMARY KEY (`acc_username`);

--
-- Indexes for table `db_album`
--
ALTER TABLE `db_album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `db_album_track`
--
ALTER TABLE `db_album_track`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `song_artist` (`track_album`);

--
-- Indexes for table `db_bundle`
--
ALTER TABLE `db_bundle`
  ADD PRIMARY KEY (`bundle_id`);

--
-- Indexes for table `db_bundle_item`
--
ALTER TABLE `db_bundle_item`
  ADD PRIMARY KEY (`item_type`,`item_id`);

--
-- Indexes for table `db_order`
--
ALTER TABLE `db_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_token` (`order_token`);

--
-- Indexes for table `db_order_item`
--
ALTER TABLE `db_order_item`
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `db_song`
--
ALTER TABLE `db_song`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `db_video`
--
ALTER TABLE `db_video`
  ADD PRIMARY KEY (`video_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_album_track`
--
ALTER TABLE `db_album_track`
  ADD CONSTRAINT `db_album_track_ibfk_1` FOREIGN KEY (`track_album`) REFERENCES `db_album` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_order_item`
--
ALTER TABLE `db_order_item`
  ADD CONSTRAINT `db_order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `db_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
