-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 10:59 AM
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
-- Database: `thi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dm_mon`
--

CREATE TABLE `dm_mon` (
  `mamon` int(10) UNSIGNED NOT NULL,
  `tenmon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manguoitao` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dm_mon`
--

INSERT INTO `dm_mon` (`mamon`, `tenmon`, `ghichu`, `manguoitao`) VALUES
(1, 'Quản trị mạng', 'QTM', '2'),
(2, 'Mã nguồn mở', 'MNM', '2'),
(3, 'Mạng và truyền thông', 'MTT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dm_nhomcauhoi`
--

CREATE TABLE `dm_nhomcauhoi` (
  `manhom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tennhom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chuthich` text COLLATE utf8_unicode_ci,
  `stt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dm_nhomcauhoi`
--

INSERT INTO `dm_nhomcauhoi` (`manhom`, `tennhom`, `chuthich`, `stt`) VALUES
('de', 'Nhóm câu hỏi dễ', 'Dễ', 1),
('kho', 'Nhóm câu hỏi khó', 'Khó', 3),
('khohn', 'Nhóm câu hỏi khó hơn', 'Khó hơn', 4),
('tbinh', 'Nhóm câu hỏi trung bình', 'Trung bình', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `dm_trangthainopbai`
--

CREATE TABLE `dm_trangthainopbai` (
  `matrangthai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tentrangthai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dm_trangthainopbai`
--

INSERT INTO `dm_trangthainopbai` (`matrangthai`, `tentrangthai`) VALUES
('dung', 'Nộp đúng giờ'),
('mathikhoa', 'Nộp khi mã thi bị khóa'),
('nopmuon', 'Quá thời gian nộp bài');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bailam`
--

CREATE TABLE `tbl_bailam` (
  `mabailam` int(10) UNSIGNED NOT NULL,
  `mathi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `masinhvien` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hotensinhvien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thoigiannopbai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thoigianbatdaulam` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thoigianketthuc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `filelog` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `socaudung` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sodiem` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matrangthai` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'dung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_bailam`
--

INSERT INTO `tbl_bailam` (`mabailam`, `mathi`, `masinhvien`, `hotensinhvien`, `thoigiannopbai`, `thoigianbatdaulam`, `thoigianketthuc`, `filelog`, `socaudung`, `sodiem`, `matrangthai`) VALUES
(4, 'MNM63062', '15A10010128', 'Đỗ Thị Minh Ch&acirc;m', '12:59:18 13/04/2017', '12:58:57 13/04/2017', '13:08:57 13/04/2017', 'MNM63062_15A10010128_1492063137.txt', '5/7', '7.14', 'dung'),
(5, 'MNM63062', '15A10010129', 'Nguyễn Huy Ho&agrave;ng', '13:10:04 13/04/2017', '13:00:04 13/04/2017', '13:10:04 13/04/2017', 'MNM63062_15A10010129_1492063204.txt', '1/7', '1.43', 'dung'),
(6, 'MNM63062', 'a', 'a', '10:28:07 08/06/2017', '08:57:08 08/06/2017', '09:07:08 08/06/2017', 'MNM63062_a_1496887028.txt', '0', '0', 'dung'),
(7, 'MNM63062', 'abc', 'abc', '21:49:17 28/12/2017', '21:48:50 28/12/2017', '21:58:50 28/12/2017', 'MNM63062_abc_1514472530.txt', '1/7', '1.43', 'dung'),
(8, 'MNM63062', 'cham', 'cham', '13:49:45 08/01/2018', '13:39:44 08/01/2018', '13:49:44 08/01/2018', 'MNM63062_cham_1515393584.txt', '0', '0', 'dung'),
(9, 'MNM63062', 'd', 'd', '14:04:33 08/01/2018', '13:55:10 08/01/2018', '14:05:10 08/01/2018', 'MNM63062_d_1515394510.txt', '0/7', '0', 'dung'),
(10, 'MNM63062', 'd', 'd', '14:04:45 08/01/2018', '13:55:10 08/01/2018', '14:05:10 08/01/2018', 'MNM63062_d_1515394510.txt', '0/7', '0', 'dung'),
(11, 'MNM63062', 'd', 'd', '14:05:24 08/01/2018', '13:55:10 08/01/2018', '14:05:10 08/01/2018', 'MNM63062_d_1515394510.txt', '0', '0', 'dung'),
(12, 'MNM63062', 'd', 'e', '14:43:23 08/01/2018', '14:05:36 08/01/2018', '14:15:36 08/01/2018', 'MNM63062_d_1515395136.txt', '1/7', '1.43', 'dung'),
(13, 'MNM63062', 'ư', 'ư', '14:53:37 08/01/2018', '14:43:36 08/01/2018', '14:53:36 08/01/2018', 'MNM63062_ư_1515397416.txt', '1/7', '1.43', 'dung'),
(14, 'MNM63062', 'f', 'f', '15:10:12 08/01/2018', '15:00:11 08/01/2018', '15:10:11 08/01/2018', 'MNM63062_f_1515398411.txt', '0', '0', 'dung'),
(15, 'MNM63062', 's', 's', '23:42:02 08/01/2018', '23:40:28 08/01/2018', '23:50:28 08/01/2018', 'MNM63062_s_1515429628.txt', '1/7', '1.43', 'dung'),
(16, 'MNM63062', 's', 's', '23:42:20 08/01/2018', '23:40:28 08/01/2018', '23:50:28 08/01/2018', 'MNM63062_s_1515429628.txt', '1/7', '1.43', 'dung'),
(17, 'MNM63062', 'e', 'e', '23:42:57 08/01/2018', '23:42:49 08/01/2018', '23:52:49 08/01/2018', 'MNM63062_e_1515429769.txt', '0/7', '0', 'dung'),
(18, 'MNM63062', 'e', 'e', '23:52:50 08/01/2018', '23:42:49 08/01/2018', '23:52:49 08/01/2018', 'MNM63062_e_1515429769.txt', '0', '0', 'dung'),
(19, 'MNM63062', 'd', 'd', '00:21:27 09/01/2018', '00:21:21 09/01/2018', '00:31:21 09/01/2018', 'MNM63062_d_1515432081.txt', '0/7', '0', 'dung'),
(20, 'MNM63062', 'aaa', 'hhhh', '09:24:04 17/01/2018', '09:14:01 17/01/2018', '09:24:01 17/01/2018', 'MNM63062_aaa_1516155241.txt', '0', '0', 'dung'),
(21, 'MNM63062', '1', '1', '16:37:11 19/01/2018', '16:37:02 19/01/2018', '16:47:02 19/01/2018', 'MNM63062_1_1516354622.txt', '1/7', '1.43', 'dung'),
(22, 'MNM63062', '645323', 'cham', '12:12:15 22/09/2018', '12:11:40 22/09/2018', '12:21:40 22/09/2018', 'MNM63062_645323_1537593100.txt', '2/7', '2.86', 'dung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cauhoi`
--

CREATE TABLE `tbl_cauhoi` (
  `macauhoi` int(10) UNSIGNED NOT NULL,
  `mamon` int(11) UNSIGNED NOT NULL,
  `manhom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cauhoi`
--

INSERT INTO `tbl_cauhoi` (`macauhoi`, `mamon`, `manhom`, `noidung`, `ghichu`) VALUES
(27, 2, 'kho', 'Điều nào sau đây sai khi nói về giấy phép Copyleft', NULL),
(28, 2, 'tbinh', 'Thiết kế ban đầu của Linux giống với', NULL),
(29, 2, 'kho', 'Kiến trúc Kernel là', NULL),
(30, 2, 'kho', 'Để liệt kê các file có trong thu mục hiện hành ta dùng lệnh:', NULL),
(31, 2, 'kho', 'Trong hệ thống Linux user nào có quyền cao nhất', NULL),
(32, 1, 'de', 'Card mạng (NIC) thuộc tầng nào trong mô hình OSI?', NULL),
(33, 1, 'de', 'Công nghệ LAN nào sử dụng CSMA/CD?', NULL),
(34, 1, 'de', 'Định dạng đơn vị thông tin tại lớp Liên mạng là', NULL),
(35, 1, 'tbinh', 'Để kiểm tra hoạt động của máy chủ DHCP trong việc cấp phát các địa chỉ IP, ta sử dụng cách thức nào sau đây.', NULL),
(36, 1, 'tbinh', 'Cho địa chỉ IP 192.55.12.120/28, dải địa chỉ IP hợp lệ là?', NULL),
(37, 1, 'tbinh', 'Hai máy tính nối trực tiếp với nhau sử dụng loại cáp nào dưới đây?', NULL),
(38, 1, 'kho', 'Trong mạng máy tính dùng giao thức TCP/IP và đều dùng Subnet Mask là 255.255.255.0', NULL),
(39, 1, 'kho', 'Cho địa chỉ IP 192.55.12.120/28, mặt nạ mạng là?', NULL),
(41, 1, 'de', 'Để chọn toàn bộ các ô trên bảng tính bằng tổ họp phím bạn chọn:', NULL),
(42, 1, 'de', 'Để che giấu hay hiển thị các thanh công cụ, bạn chọn mục nào trong số các mục sau:', NULL),
(43, 1, 'de', 'Để ghi lưu một sổ bảng tính đang mở dưới một tên khác, bạn vào thực đơn lệnh File, chọn lệnh:', NULL),
(44, 1, 'de', 'Để chọn toàn bộ các ô trên bảng tính bằng tổ họp phím bạn chọn:', NULL),
(45, 1, 'de', 'Để che giấu hay hiển thị các thanh công cụ, bạn chọn mục nào trong số các mục sau:', NULL),
(46, 1, 'de', 'Để ghi lưu một sổ bảng tính đang mở dưới một tên khác, bạn vào thực đơn lệnh File, chọn lệnh:', NULL),
(47, 1, 'de', 'Để chọn toàn bộ các ô trên bảng tính bằng tổ họp phím bạn chọn:', NULL),
(48, 1, 'de', 'Để che giấu hay hiển thị các thanh công cụ, bạn chọn mục nào trong số các mục sau:', NULL),
(49, 1, 'de', 'Để ghi lưu một sổ bảng tính đang mở dưới một tên khác, bạn vào thực đơn lệnh File, chọn lệnh:', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cautraloi`
--

CREATE TABLE `tbl_cautraloi` (
  `macautraloi` int(10) UNSIGNED NOT NULL,
  `macauhoi` int(10) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cautraloi`
--

INSERT INTO `tbl_cautraloi` (`macautraloi`, `macauhoi`, `noidung`, `ghichu`) VALUES
(105, 27, 'Được đưa ra dựa trên copyright', NULL),
(106, 27, 'Người dùng có nghĩa vụ phân phối và truy xuất công khai tác phẩm phát sinh', NULL),
(107, 27, 'Người sở hữu được cấp quyền để: sử dụng, sửa đổi, phân phối lại.', NULL),
(108, 27, 'Tồn tại giấy phép copyleft cho cả phần mềm, âm nhạc và nghệ thuật', NULL),
(109, 28, 'Hệ điều hành Unix những với mã nguồn mở', NULL),
(110, 28, 'Hệ điều hành Windows về giao diện đồ họa người dùng', NULL),
(111, 28, 'Hệ điều hành Minix về giao diện đồ họa người dùng', NULL),
(112, 28, 'Hệ điều hành của Mac hay Apple ngày nay nhưng với mã nguồn mở', NULL),
(113, 29, 'Static', NULL),
(114, 29, 'Microkernel', NULL),
(115, 29, 'Distributed', NULL),
(116, 29, 'Monolithic', NULL),
(117, 30, 'lệnh ls', NULL),
(118, 30, 'lệnh df', NULL),
(119, 30, 'lệnh du', NULL),
(120, 30, 'lệnh cp', NULL),
(121, 31, 'User administrator', NULL),
(122, 31, 'User root', NULL),
(123, 31, 'User admin', NULL),
(124, 31, 'User có UID=0', NULL),
(125, 32, 'Layer 5', NULL),
(126, 32, 'Layer 3', NULL),
(127, 32, 'Layer 2', NULL),
(128, 32, 'Layer 4', NULL),
(129, 33, 'Các phương án khác đều đúng', NULL),
(130, 33, 'Token Ring', NULL),
(131, 33, 'Ethernet', NULL),
(132, 33, 'FDDI', NULL),
(133, 34, 'Gói dữ liệu', NULL),
(134, 34, 'Bản tin', NULL),
(135, 34, 'Khung dữ liệu', NULL),
(136, 34, 'Đoạn dữ liệu', NULL),
(137, 35, 'Từ máy Client sử dụng Ping đến máy chủ DHCP', NULL),
(138, 35, 'Các phương án khác đều đúng', NULL),
(139, 35, 'Sử dụng lệnh IPCONFIG tại các Client', NULL),
(140, 35, 'Sử dụng lệnh Telnet đến máy chủ DHCP', NULL),
(141, 36, '192.55.12.254 đến 192.55.12.126', NULL),
(142, 36, '192.55.12.1 đến 192.55.12.254', NULL),
(143, 36, '192.55.12.1 đến 192.55.12.126', NULL),
(144, 36, '192.55.12.113 đến 192.55.12.126', NULL),
(145, 37, 'Cáp thẳng', NULL),
(146, 37, 'Cáp xoắn', NULL),
(147, 37, 'Cáp đồng trục', NULL),
(148, 37, 'Cáp chéo', NULL),
(149, 38, '192.168.100.15 và 192.186.100.16', NULL),
(150, 38, '172.25.11.1 và 172.26.11.2', NULL),
(151, 38, '192.168.15.1 và 192.168.15.254', NULL),
(152, 38, '192.168.1.3 và 192.168.100.1', NULL),
(153, 39, '192.55.12.255', NULL),
(154, 39, '255.255.255.240', NULL),
(155, 39, '192.55.12.28', NULL),
(156, 39, '192.55.12.240', NULL),
(161, 41, 'Nhấn tổ hợp phím Ctrl + A', NULL),
(162, 41, 'Nhấn tổ hợp phím Ctrl + All', NULL),
(163, 41, 'Nhấn tổ hợp phím Ctrl + Alt +Space', NULL),
(164, 41, 'Cả hai cách thứ nhất và thứ 3 đều được', NULL),
(165, 42, 'Vào thực đơn lệnh File, chọn lệnh Page Setup', NULL),
(166, 42, 'Vào thực đơn lệnh View, chọn lệnh Toolbars', NULL),
(167, 42, 'Vào thực đơn lệnh Insert, chọn lệnh Object', NULL),
(168, 42, 'Vào thực đơn lệnh Tools, chọn lệnh Options', NULL),
(169, 43, 'Open', NULL),
(170, 43, 'Save', NULL),
(171, 43, 'Save As', NULL),
(172, 43, 'Send To', NULL),
(173, 44, 'Nhấn tổ hợp phím Ctrl + A', NULL),
(174, 44, 'Nhấn tổ hợp phím Ctrl + All', NULL),
(175, 44, 'Nhấn tổ hợp phím Ctrl + Alt +Space', NULL),
(176, 44, 'Cả hai cách thứ nhất và thứ 3 đều được', NULL),
(177, 45, 'Vào thực đơn lệnh File, chọn lệnh Page Setup', NULL),
(178, 45, 'Vào thực đơn lệnh View, chọn lệnh Toolbars', NULL),
(179, 45, 'Vào thực đơn lệnh Insert, chọn lệnh Object', NULL),
(180, 45, 'Vào thực đơn lệnh Tools, chọn lệnh Options', NULL),
(181, 46, 'Open', NULL),
(182, 46, 'Save', NULL),
(183, 46, 'Save As', NULL),
(184, 46, 'Send To', NULL),
(185, 47, 'Nhấn tổ hợp phím Ctrl + A', NULL),
(186, 47, 'Nhấn tổ hợp phím Ctrl + All', NULL),
(187, 47, 'Nhấn tổ hợp phím Ctrl + Alt +Space', NULL),
(188, 47, 'Cả hai cách thứ nhất và thứ 3 đều được', NULL),
(189, 48, 'Vào thực đơn lệnh File, chọn lệnh Page Setup', NULL),
(190, 48, 'Vào thực đơn lệnh View, chọn lệnh Toolbars', NULL),
(191, 48, 'Vào thực đơn lệnh Insert, chọn lệnh Object', NULL),
(192, 48, 'Vào thực đơn lệnh Tools, chọn lệnh Options', NULL),
(193, 49, 'Open', NULL),
(194, 49, 'Save', NULL),
(195, 49, 'Save As abc', NULL),
(196, 49, 'Send To', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dapandung`
--

CREATE TABLE `tbl_dapandung` (
  `macauhoi` int(10) UNSIGNED NOT NULL,
  `macautraloi` int(10) UNSIGNED NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dapandung`
--

INSERT INTO `tbl_dapandung` (`macauhoi`, `macautraloi`, `ghichu`) VALUES
(27, 108, NULL),
(28, 109, NULL),
(29, 116, NULL),
(30, 117, NULL),
(31, 122, NULL),
(32, 127, NULL),
(33, 131, NULL),
(34, 133, NULL),
(35, 137, NULL),
(36, 144, NULL),
(37, 148, NULL),
(38, 151, NULL),
(39, 154, NULL),
(41, 161, NULL),
(42, 166, NULL),
(43, 171, NULL),
(44, 173, NULL),
(45, 178, NULL),
(46, 183, NULL),
(47, 185, NULL),
(48, 190, NULL),
(49, 195, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dethi`
--

CREATE TABLE `tbl_dethi` (
  `madethi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manhomde` int(10) UNSIGNED NOT NULL,
  `danhsachcau` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mathi`
--

CREATE TABLE `tbl_mathi` (
  `mathi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `maquantri` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `thoigiantao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thoigianlambai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '1',
  `mamon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mathi`
--

INSERT INTO `tbl_mathi` (`mathi`, `maquantri`, `thoigiantao`, `thoigianlambai`, `trangthai`, `mamon`) VALUES
('MNM63062', '3', '12:58 13/04/2017', '10', 1, 2),
('QTM68502', '3', '02:29 13/04/2017', '10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhomcauhoi_mathi`
--

CREATE TABLE `tbl_nhomcauhoi_mathi` (
  `mathi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manhom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `soluongcauhoi` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_nhomcauhoi_mathi`
--

INSERT INTO `tbl_nhomcauhoi_mathi` (`mathi`, `manhom`, `soluongcauhoi`) VALUES
('MNM63062', 'de', 3),
('MNM63062', 'kho', 3),
('MNM63062', 'tbinh', 1),
('QTM68502', 'de', 3),
('QTM68502', 'kho', 2),
('QTM68502', 'tbinh', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhomdethi`
--

CREATE TABLE `tbl_nhomdethi` (
  `manhomde` int(10) UNSIGNED NOT NULL,
  `mamon` int(10) UNSIGNED NOT NULL,
  `maquantri` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `thoigiantao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `soluongde` int(11) NOT NULL,
  `tenfile` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhomdethi_manhom`
--

CREATE TABLE `tbl_nhomdethi_manhom` (
  `manhomde` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `soluongcauhoi` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quantri`
--

CREATE TABLE `tbl_quantri` (
  `maquantri` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
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
('1', 'trantiendung', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Trần Tiến Dũng', 1, 'giaovien'),
('2', 'trinhthixuan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Trịnh Thị Xuân', 1, 'giaovien'),
('3', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 1, 'admin'),
('4', 'h0aday_nd', '202cb962ac59075b964b07152d234b70', 'Đào Duy Hòa', 1, 'admin'),
('5', 'duyhoa', '202cb962ac59075b964b07152d234b70', 'Duy Hòa', 1, 'giaovien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_mon`
--
ALTER TABLE `dm_mon`
  ADD PRIMARY KEY (`mamon`);

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
  ADD PRIMARY KEY (`matintuc`);

--
-- Indexes for table `dm_trangthainopbai`
--
ALTER TABLE `dm_trangthainopbai`
  ADD PRIMARY KEY (`matrangthai`);

--
-- Indexes for table `tbl_bailam`
--
ALTER TABLE `tbl_bailam`
  ADD PRIMARY KEY (`mabailam`),
  ADD KEY `mathi` (`mathi`),
  ADD KEY `matrangthai` (`matrangthai`);

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
  ADD KEY `mamon` (`macauhoi`),
  ADD KEY `macautraloi` (`macautraloi`);

--
-- Indexes for table `tbl_dethi`
--
ALTER TABLE `tbl_dethi`
  ADD PRIMARY KEY (`madethi`),
  ADD KEY `manhomde` (`manhomde`);

--
-- Indexes for table `tbl_mathi`
--
ALTER TABLE `tbl_mathi`
  ADD PRIMARY KEY (`mathi`),
  ADD KEY `mamon` (`mamon`),
  ADD KEY `maquantri` (`maquantri`);

--
-- Indexes for table `tbl_nhomcauhoi_mathi`
--
ALTER TABLE `tbl_nhomcauhoi_mathi`
  ADD PRIMARY KEY (`mathi`,`manhom`),
  ADD KEY `mathi` (`mathi`),
  ADD KEY `manhom` (`manhom`);

--
-- Indexes for table `tbl_nhomdethi`
--
ALTER TABLE `tbl_nhomdethi`
  ADD PRIMARY KEY (`manhomde`),
  ADD KEY `mamon` (`mamon`,`maquantri`),
  ADD KEY `maquantri` (`maquantri`);

--
-- Indexes for table `tbl_nhomdethi_manhom`
--
ALTER TABLE `tbl_nhomdethi_manhom`
  ADD PRIMARY KEY (`manhomde`,`manhom`),
  ADD KEY `manhom` (`manhom`);

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
-- AUTO_INCREMENT for table `dm_mon`
--
ALTER TABLE `dm_mon`
  MODIFY `mamon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dm_tintuc`
--
ALTER TABLE `dm_tintuc`
  MODIFY `matintuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_bailam`
--
ALTER TABLE `tbl_bailam`
  MODIFY `mabailam` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  MODIFY `macauhoi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_cautraloi`
--
ALTER TABLE `tbl_cautraloi`
  MODIFY `macautraloi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `macomment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_nhomdethi`
--
ALTER TABLE `tbl_nhomdethi`
  MODIFY `manhomde` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bailam`
--
ALTER TABLE `tbl_bailam`
  ADD CONSTRAINT `fk_matrangthai` FOREIGN KEY (`matrangthai`) REFERENCES `dm_trangthainopbai` (`matrangthai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_bailam_ibfk_1` FOREIGN KEY (`mathi`) REFERENCES `tbl_mathi` (`mathi`);

--
-- Constraints for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  ADD CONSTRAINT `tbl_cauhoi_ibfk_1` FOREIGN KEY (`manhom`) REFERENCES `dm_nhomcauhoi` (`manhom`),
  ADD CONSTRAINT `tbl_cauhoi_ibfk_2` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`);

--
-- Constraints for table `tbl_cautraloi`
--
ALTER TABLE `tbl_cautraloi`
  ADD CONSTRAINT `tbl_cautraloi_ibfk_1` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`);

--
-- Constraints for table `tbl_dapandung`
--
ALTER TABLE `tbl_dapandung`
  ADD CONSTRAINT `tbl_dapandung_ibfk_1` FOREIGN KEY (`macautraloi`) REFERENCES `tbl_cautraloi` (`macautraloi`),
  ADD CONSTRAINT `tbl_dapandung_ibfk_2` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`);

--
-- Constraints for table `tbl_dethi`
--
ALTER TABLE `tbl_dethi`
  ADD CONSTRAINT `tbl_dethi_ibfk_1` FOREIGN KEY (`manhomde`) REFERENCES `tbl_nhomdethi` (`manhomde`);

--
-- Constraints for table `tbl_mathi`
--
ALTER TABLE `tbl_mathi`
  ADD CONSTRAINT `tbl_mathi_ibfk_1` FOREIGN KEY (`maquantri`) REFERENCES `tbl_quantri` (`maquantri`),
  ADD CONSTRAINT `tbl_mathi_ibfk_2` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`);

--
-- Constraints for table `tbl_nhomcauhoi_mathi`
--
ALTER TABLE `tbl_nhomcauhoi_mathi`
  ADD CONSTRAINT `tbl_nhomcauhoi_mathi_ibfk_1` FOREIGN KEY (`mathi`) REFERENCES `tbl_mathi` (`mathi`),
  ADD CONSTRAINT `tbl_nhomcauhoi_mathi_ibfk_2` FOREIGN KEY (`manhom`) REFERENCES `dm_nhomcauhoi` (`manhom`);

--
-- Constraints for table `tbl_nhomdethi`
--
ALTER TABLE `tbl_nhomdethi`
  ADD CONSTRAINT `tbl_nhomdethi_ibfk_1` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`),
  ADD CONSTRAINT `tbl_nhomdethi_ibfk_2` FOREIGN KEY (`maquantri`) REFERENCES `tbl_quantri` (`maquantri`);

--
-- Constraints for table `tbl_nhomdethi_manhom`
--
ALTER TABLE `tbl_nhomdethi_manhom`
  ADD CONSTRAINT `tbl_nhomdethi_manhom_ibfk_1` FOREIGN KEY (`manhomde`) REFERENCES `tbl_nhomdethi` (`manhomde`),
  ADD CONSTRAINT `tbl_nhomdethi_manhom_ibfk_2` FOREIGN KEY (`manhom`) REFERENCES `dm_nhomcauhoi` (`manhom`);

--
-- Constraints for table `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  ADD CONSTRAINT `tbl_quantri_ibfk_1` FOREIGN KEY (`maquyen`) REFERENCES `dm_quyen` (`maquyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
