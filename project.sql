-- phpMyAdmin SQL Dump
-- version 3.3.10.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2011 at 04:08 AM
-- Server version: 5.0.91
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bbclip55_pulluptheladder`
--

-- --------------------------------------------------------

--
-- Table structure for table `1OwnedLeaderboards`
--

CREATE TABLE IF NOT EXISTS `1OwnedLeaderboards` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `timeCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `tableName` varchar(255) NOT NULL,
  `permissions` int(11) NOT NULL,
  `publicLink` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `1OwnedLeaderboards`
--

INSERT INTO `1OwnedLeaderboards` (`id`, `timeCreated`, `name`, `tableName`, `permissions`, `publicLink`) VALUES
(1, '2011-12-07 03:39:11', 'StarCraft Leaderboard', '1_0', 0, '959477'),
(2, '2011-12-07 03:43:24', 'Tennis Ladder', '1_1', 0, '1691443'),
(15, '2011-12-09 03:40:22', 'Leaderboard to Share with Bill', '1_11', 0, '1648299');

-- --------------------------------------------------------

--
-- Table structure for table `1_0`
--

CREATE TABLE IF NOT EXISTS `1_0` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `playerName` varchar(255) NOT NULL,
  `playerRank` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `1_0`
--

INSERT INTO `1_0` (`id`, `playerName`, `playerRank`) VALUES
(1, 'Nick', 1),
(2, 'Joey', 2),
(3, 'Sam', 3),
(4, 'Kasey', 4),
(5, 'Ryan', 5),
(6, 'Conner', 6),
(7, 'Andy', 7);

-- --------------------------------------------------------

--
-- Table structure for table `1_1`
--

CREATE TABLE IF NOT EXISTS `1_1` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `playerName` varchar(255) NOT NULL,
  `playerRank` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `1_1`
--

INSERT INTO `1_1` (`id`, `playerName`, `playerRank`) VALUES
(1, 'Troy Reynolds', 4),
(2, 'Mathew Clark', 2),
(3, 'Phillip Cole', 1),
(4, 'Lucas Conner', 6),
(5, 'Roy Varner', 8),
(6, 'Danny Mann', 10),
(7, 'Joseph Fox', 5),
(8, 'Roger Butler', 11),
(9, 'Novak Djokovic', 3),
(10, 'Rafael Nadal', 7),
(15, 'Joe Schluntz', 9),
(14, 'Bob Smith', 12);

-- --------------------------------------------------------

--
-- Table structure for table `1_11`
--

CREATE TABLE IF NOT EXISTS `1_11` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `playerName` varchar(255) NOT NULL,
  `playerRank` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `1_11`
--


-- --------------------------------------------------------

--
-- Table structure for table `2OwnedLeaderboards`
--

CREATE TABLE IF NOT EXISTS `2OwnedLeaderboards` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `timeCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `tableName` varchar(255) NOT NULL,
  `permissions` int(11) NOT NULL,
  `publicLink` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `2OwnedLeaderboards`
--

INSERT INTO `2OwnedLeaderboards` (`id`, `timeCreated`, `name`, `tableName`, `permissions`, `publicLink`) VALUES
(1, '2011-12-07 03:40:12', 'Employees', '2_0', 0, '825320');

-- --------------------------------------------------------

--
-- Table structure for table `2_0`
--

CREATE TABLE IF NOT EXISTS `2_0` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `playerName` varchar(255) NOT NULL,
  `playerRank` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `2_0`
--

INSERT INTO `2_0` (`id`, `playerName`, `playerRank`) VALUES
(1, 'Isabelle Hadley', 1),
(2, 'Lori Field', 2),
(3, 'Fred Brant', 3),
(4, 'Roy Ackerman', 4),
(5, 'Evan Becker', 6),
(6, 'Rick Stephens', 7),
(7, 'Jacob Hamilton', 8),
(8, 'Cyrus Fox', 9),
(9, 'May Harrason', 10),
(10, 'Susan Newitt', 11),
(11, 'Norman Davis', 12),
(12, 'Colin Keller', 13),
(13, 'Elisabeth King', 15),
(14, 'Garth Weber', 16),
(15, 'Annie Stephens', 17),
(16, 'Stuart Oaks', 18),
(17, 'Nadia Harlow', 19),
(18, 'Caley Jefferson', 20),
(19, 'Patricia N. Doyle', 5),
(20, 'Brent P. Cole', 14),
(21, 'Deanna Ford', 21),
(22, 'Vince Garrick', 22),
(23, 'Francis Fletcher', 23),
(24, 'Kay Gibson', 24),
(25, 'Dennis Gram', 25),
(26, 'Lucy Phillips', 26),
(27, 'Debra Johnson', 27),
(28, 'George Scott', 28),
(29, 'Leah Anders', 29),
(30, 'Kyle Fritz', 30),
(31, 'Timothy I. Adams', 31);

-- --------------------------------------------------------

--
-- Table structure for table `9OwnedLeaderboards`
--

CREATE TABLE IF NOT EXISTS `9OwnedLeaderboards` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `timeCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `tableName` varchar(255) NOT NULL,
  `permissions` int(11) NOT NULL,
  `publicLink` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `9OwnedLeaderboards`
--

INSERT INTO `9OwnedLeaderboards` (`id`, `timeCreated`, `name`, `tableName`, `permissions`, `publicLink`) VALUES
(1, '2011-12-09 03:40:35', 'Leaderboard to Share with Bill', '1_11', 1, '1648299');

-- --------------------------------------------------------

--
-- Table structure for table `allLeaderboards`
--

CREATE TABLE IF NOT EXISTS `allLeaderboards` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `timeCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `tableNumber` varchar(255) NOT NULL,
  `publicLink` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `allLeaderboards`
--

INSERT INTO `allLeaderboards` (`id`, `timeCreated`, `tableNumber`, `publicLink`) VALUES
(1, '2011-12-07 03:39:11', '1_0', 959477),
(2, '2011-12-07 03:40:12', '2_0', 825320),
(3, '2011-12-07 03:43:24', '1_1', 1691443),
(19, '2011-12-09 03:40:22', '1_11', 1648299);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `timeCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `numLeaderboardsCreated` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `timeCreated`, `username`, `hash`, `numLeaderboardsCreated`) VALUES
(1, '2011-12-07 03:39:02', 'nickym777@gmail.com', '$1$KlJXbw5c$BHycvyrmYpWpH9p.IMx3Y1', 12),
(2, '2011-12-07 03:40:02', 'owner@business.com', '$1$hBwSKtdb$INd1mz4RHpHm3HVftcu.t1', 1),
(9, '2011-12-09 03:39:35', 'bill@gmail.com', '$1$MVyRAo6D$Wv6PrE4SnskgI2qWgiySU.', 0);
