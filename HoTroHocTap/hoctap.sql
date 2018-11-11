-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 11:26 AM
-- Server version: 10.1.36-MariaDB
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
-- Database: `hoctap`
--

-- --------------------------------------------------------

--
-- Table structure for table `dm_mon`
--

CREATE TABLE `dm_mon` (
  `mamon` int(10) NOT NULL,
  `tenmon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mahocphan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manguoitao` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_nhomcauhoi`
--

CREATE TABLE `dm_nhomcauhoi` (
  `manhom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tennhom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chuthich` text COLLATE utf8_unicode_ci NOT NULL,
  `stt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dm_nhomcauhoi`
--

INSERT INTO `dm_nhomcauhoi` (`manhom`, `tennhom`, `chuthich`, `stt`) VALUES
('de', 'nhóm câu hỏi dễ', 'dễ', 1),
('kho', 'nhóm câu hỏi khó', 'khó', 3),
('khohn', 'nhóm câu hỏi khó hơn', 'khó hơn', 4),
('tb', 'nhóm câu hỏi trung bình', 'trung bình', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dm_quyen`
--

CREATE TABLE `dm_quyen` (
  `maquyen` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tenquyen` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dm_quyen`
--

INSERT INTO `dm_quyen` (`maquyen`, `tenquyen`) VALUES
('admin', 'Admin'),
('giaovien', 'Giáo viên');

-- --------------------------------------------------------

--
-- Table structure for table `dm_tintuc`
--

CREATE TABLE `dm_tintuc` (
  `matintuc` int(10) NOT NULL,
  `id_lophoc` int(11) NOT NULL,
  `tieude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manguoidang` int(11) NOT NULL,
  `ngaydang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_baigiang`
--

CREATE TABLE `tbl_baigiang` (
  `mabg` int(11) NOT NULL,
  `mamon` int(10) NOT NULL,
  `tieude` text COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `stt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cauhoi`
--

CREATE TABLE `tbl_cauhoi` (
  `macauhoi` int(10) NOT NULL,
  `mamon` int(10) NOT NULL,
  `manhom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cautraloi`
--

CREATE TABLE `tbl_cautraloi` (
  `macautraloi` int(10) NOT NULL,
  `macauhoi` int(10) NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 3, 'this is test comment', '2018-10-20 00:00:00', 5),
(2, 3, 'this is test comment2', '2018-10-20 03:00:00', 5),
(5, 3, 'this is test comment3', '2018-10-21 20:27:53', 5),
(6, 3, 'this is test comment4', '2018-10-21 20:34:19', 5),
(7, 1, 'sad', '2018-10-21 20:34:36', 5),
(8, 12, 'ok', '2018-10-21 21:16:44', 5),
(9, 13, 'hoan hô', '2018-10-22 13:53:26', 5),
(10, 13, 'm', '2018-10-22 14:07:55', 5),
(11, 13, 'demo', '2018-10-22 14:49:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dapandung`
--

CREATE TABLE `tbl_dapandung` (
  `macauhoi` int(10) NOT NULL,
  `macautraloi` int(10) NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dethi`
--

CREATE TABLE `tbl_dethi` (
  `madethi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mamon` int(10) NOT NULL,
  `thoigiantao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thoigianlambai` int(11) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dethi_cauhoi`
--

CREATE TABLE `tbl_dethi_cauhoi` (
  `madethi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `macauhoi` int(10) NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kyhoc`
--

CREATE TABLE `tbl_kyhoc` (
  `makyhoc` int(11) NOT NULL,
  `tenkyhoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lophoc`
--

CREATE TABLE `tbl_lophoc` (
  `id_lophoc` int(11) NOT NULL,
  `malophoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mamon` int(10) NOT NULL,
  `kyhoc` int(11) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quantri`
--

CREATE TABLE `tbl_quantri` (
  `maquantri` int(10) NOT NULL,
  `tentaikhoan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` text COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '1',
  `maquyen` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_quantri`
--

INSERT INTO `tbl_quantri` (`maquantri`, `tentaikhoan`, `matkhau`, `hoten`, `trangthai`, `maquyen`) VALUES
(1, 'duyhoa', '202cb962ac59075b964b07152d234b70', 'Duy Hòa', 1, 'giaovien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_mon`
--
ALTER TABLE `dm_mon`
  ADD PRIMARY KEY (`mamon`),
  ADD KEY `manguoitao` (`manguoitao`);

--
-- Indexes for table `dm_nhomcauhoi`
--
ALTER TABLE `dm_nhomcauhoi`
  ADD PRIMARY KEY (`manhom`);

--
-- Indexes for table `dm_quyen`
--
ALTER TABLE `dm_quyen`
  ADD PRIMARY KEY (`maquyen`);

--
-- Indexes for table `dm_tintuc`
--
ALTER TABLE `dm_tintuc`
  ADD PRIMARY KEY (`matintuc`),
  ADD KEY `id_lophoc` (`id_lophoc`);

--
-- Indexes for table `tbl_baigiang`
--
ALTER TABLE `tbl_baigiang`
  ADD PRIMARY KEY (`mabg`),
  ADD KEY `mamon` (`mamon`);

--
-- Indexes for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  ADD PRIMARY KEY (`macauhoi`),
  ADD KEY `mamon` (`mamon`),
  ADD KEY `manhom` (`manhom`);

--
-- Indexes for table `tbl_cautraloi`
--
ALTER TABLE `tbl_cautraloi`
  ADD PRIMARY KEY (`macautraloi`),
  ADD KEY `macauhoi` (`macauhoi`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`macomment`);

--
-- Indexes for table `tbl_dapandung`
--
ALTER TABLE `tbl_dapandung`
  ADD PRIMARY KEY (`macauhoi`,`macautraloi`),
  ADD KEY `macautraloi` (`macautraloi`);

--
-- Indexes for table `tbl_dethi`
--
ALTER TABLE `tbl_dethi`
  ADD PRIMARY KEY (`madethi`),
  ADD KEY `mamon` (`mamon`);

--
-- Indexes for table `tbl_dethi_cauhoi`
--
ALTER TABLE `tbl_dethi_cauhoi`
  ADD PRIMARY KEY (`madethi`,`macauhoi`),
  ADD KEY `macauhoi` (`macauhoi`);

--
-- Indexes for table `tbl_kyhoc`
--
ALTER TABLE `tbl_kyhoc`
  ADD PRIMARY KEY (`makyhoc`);

--
-- Indexes for table `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  ADD PRIMARY KEY (`id_lophoc`),
  ADD KEY `kyhoc` (`kyhoc`),
  ADD KEY `mamon` (`mamon`);

--
-- Indexes for table `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  ADD PRIMARY KEY (`maquantri`),
  ADD KEY `maquyen` (`maquyen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_tintuc`
--
ALTER TABLE `dm_tintuc`
  MODIFY `matintuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_baigiang`
--
ALTER TABLE `tbl_baigiang`
  MODIFY `mabg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  MODIFY `macauhoi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cautraloi`
--
ALTER TABLE `tbl_cautraloi`
  MODIFY `macautraloi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `macomment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_kyhoc`
--
ALTER TABLE `tbl_kyhoc`
  MODIFY `makyhoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  MODIFY `id_lophoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  MODIFY `maquantri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dm_mon`
--
ALTER TABLE `dm_mon`
  ADD CONSTRAINT `dm_mon_ibfk_1` FOREIGN KEY (`manguoitao`) REFERENCES `tbl_quantri` (`maquantri`);

--
-- Constraints for table `dm_tintuc`
--
ALTER TABLE `dm_tintuc`
  ADD CONSTRAINT `dm_tintuc_ibfk_1` FOREIGN KEY (`id_lophoc`) REFERENCES `tbl_lophoc` (`id_lophoc`);

--
-- Constraints for table `tbl_baigiang`
--
ALTER TABLE `tbl_baigiang`
  ADD CONSTRAINT `tbl_baigiang_ibfk_1` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`);

--
-- Constraints for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  ADD CONSTRAINT `tbl_cauhoi_ibfk_1` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`),
  ADD CONSTRAINT `tbl_cauhoi_ibfk_2` FOREIGN KEY (`manhom`) REFERENCES `dm_nhomcauhoi` (`manhom`);

--
-- Constraints for table `tbl_cautraloi`
--
ALTER TABLE `tbl_cautraloi`
  ADD CONSTRAINT `tbl_cautraloi_ibfk_1` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`);

--
-- Constraints for table `tbl_dapandung`
--
ALTER TABLE `tbl_dapandung`
  ADD CONSTRAINT `tbl_dapandung_ibfk_1` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`),
  ADD CONSTRAINT `tbl_dapandung_ibfk_2` FOREIGN KEY (`macautraloi`) REFERENCES `tbl_cautraloi` (`macautraloi`);

--
-- Constraints for table `tbl_dethi`
--
ALTER TABLE `tbl_dethi`
  ADD CONSTRAINT `tbl_dethi_ibfk_1` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`);

--
-- Constraints for table `tbl_dethi_cauhoi`
--
ALTER TABLE `tbl_dethi_cauhoi`
  ADD CONSTRAINT `tbl_dethi_cauhoi_ibfk_1` FOREIGN KEY (`madethi`) REFERENCES `tbl_dethi` (`madethi`),
  ADD CONSTRAINT `tbl_dethi_cauhoi_ibfk_2` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`);

--
-- Constraints for table `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  ADD CONSTRAINT `tbl_lophoc_ibfk_1` FOREIGN KEY (`kyhoc`) REFERENCES `tbl_kyhoc` (`makyhoc`),
  ADD CONSTRAINT `tbl_lophoc_ibfk_2` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`);

--
-- Constraints for table `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  ADD CONSTRAINT `tbl_quantri_ibfk_1` FOREIGN KEY (`maquyen`) REFERENCES `dm_quyen` (`maquyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
