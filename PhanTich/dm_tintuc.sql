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
-- Table structure for table `dm_tintuc`
--

CREATE TABLE `dm_tintuc` (
  `matintuc` int(10) NOT NULL,
  `mamonhoc` int(10) NOT NULL,
  `tieude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manguoidang` int(11) NOT NULL,
  `ngaydang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dm_tintuc`
--

INSERT INTO `dm_tintuc` (`matintuc`, `mamonhoc`, `tieude`, `noidung`, `file`, `manguoidang`, `ngaydang`) VALUES
(1, 1, 'thong bao nghi hoc', NULL, NULL, 2, '2018-10-20 00:00:00'),
(2, 2, 'thông báo thi giữa kì', 'ngày 20/10 lớp sẽ thi giữa kỳ nhé', NULL, 2, '2018-10-19 00:00:00'),
(3, 1, 'Chúc mừng  20/10', '20/10 chúc các bạn gái luôn vui vẻ, học tập và tìm được công việc tốt nhé.', NULL, 2, '2018-10-21 16:44:02'),
(13, 3, 'thông báo nghỉ giữa kì', 'tuần sau cả lớp nghỉ nhé~\r\nnho lam bai.', NULL, 2, '2018-10-22 13:53:17'),
(14, 3, 'cc', 'aa', NULL, 2, '2018-10-22 14:50:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_tintuc`
--
ALTER TABLE `dm_tintuc`
  ADD PRIMARY KEY (`matintuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_tintuc`
--
ALTER TABLE `dm_tintuc`
  MODIFY `matintuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
