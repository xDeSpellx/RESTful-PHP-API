-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2018 at 04:20 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `authorID` int(10) NOT NULL AUTO_INCREMENT,
  `authorName` varchar(256) NOT NULL,
  PRIMARY KEY (`authorID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorID`, `authorName`) VALUES
(1, 'John Wick'),
(2, 'Mathew Smith'),
(3, 'Smith Brown');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `blogID` int(10) NOT NULL AUTO_INCREMENT,
  `blogName` varchar(256) NOT NULL,
  `blogDescription` varchar(256) NOT NULL,
  `authorID` int(11) NOT NULL,
  PRIMARY KEY (`blogID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogID`, `blogName`, `blogDescription`, `authorID`) VALUES
(1, 'Flowers & Other', 'A blog about flowers', 2),
(2, 'Dogs & Cats', 'A blog about dogs & cats', 1),
(3, 'Home & Decoration', 'A blog about house decoration', 3),
(4, 'Cars', 'A blog about cars', 1),
(5, 'Spaceships', 'A blog about spaceships', 3),
(6, 'Sleep', 'A blog all about sleep', 2),
(8, 'Music', 'A blog about music', 2),
(9, 'Comics', 'A blog about comics', 2),
(11, 'Foods and beverages', 'A really tasty blog', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
