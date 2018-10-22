-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2018 at 03:47 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotrohoctap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `macomment` int(10) NOT NULL,
  `matintuc` int(10) DEFAULT NULL,
  `noidung` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` datetime DEFAULT NULL,
  `manguoidang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`macomment`, `matintuc`, `noidung`, `ngaydang`, `manguoidang`) VALUES
(1, 3, 'this is test comment', '2018-10-20 00:00:00', 2),
(2, 3, 'this is test comment2', '2018-10-20 03:00:00', 2),
(5, 3, 'this is test comment3', '2018-10-21 20:27:53', 2),
(6, 3, 'this is test comment4', '2018-10-21 20:34:19', 2),
(7, 1, 'sad', '2018-10-21 20:34:36', 2),
(8, 12, 'ok', '2018-10-21 21:16:44', 2),
(9, 13, 'hoan hô', '2018-10-22 13:53:26', 2),
(10, 13, 'm', '2018-10-22 14:07:55', 2),
(11, 13, 'demo', '2018-10-22 14:49:30', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`macomment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `macomment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
