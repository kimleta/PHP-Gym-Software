-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 26, 2022 at 02:51 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymsoftware`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `plan` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`ID`, `email`, `username`, `password`, `plan`) VALUES
(1, 'test@test.com', 'admin', 'admin123', 'Pro'),
(3, 'asddsadas@test.xyz', 'ad', 'ad', 'Free'),
(4, 'asddsadas@test.xyz1', 'admin2', 'ad2', 'Free'),
(5, 'asddsadas@test.xyz11', 'admin22', '12345', 'Free'),
(6, 'dasdasd@test.fs', 'ads', 'asdf', 'Free');

-- --------------------------------------------------------

--
-- Table structure for table `group_sessions`
--

DROP TABLE IF EXISTS `group_sessions`;
CREATE TABLE IF NOT EXISTS `group_sessions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Time Stamp` timestamp NOT NULL,
  `InstructorID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

DROP TABLE IF EXISTS `gym`;
CREATE TABLE IF NOT EXISTS `gym` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `Admin ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `ID` int(11) NOT NULL,
  `Name` varchar(300) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `package_info`
--

DROP TABLE IF EXISTS `package_info`;
CREATE TABLE IF NOT EXISTS `package_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `descripction` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `private_sessions`
--

DROP TABLE IF EXISTS `private_sessions`;
CREATE TABLE IF NOT EXISTS `private_sessions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `InstructorID` int(11) NOT NULL,
  `Date Stamp` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `Address` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `Number` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `Photo Path` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `GymID` int(11) NOT NULL,
  `Start Date` datetime NOT NULL,
  `End Date` datetime NOT NULL,
  `Package ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_archive`
--

DROP TABLE IF EXISTS `user_archive`;
CREATE TABLE IF NOT EXISTS `user_archive` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Time Stamp` timestamp NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
