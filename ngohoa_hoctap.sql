-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2018 at 12:39 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Dumping data for table `dm_mon`
--

INSERT INTO `dm_mon` (`mamon`, `tenmon`, `mahocphan`, `manguoitao`) VALUES
(1, 'Hệ phân tán', 'IT3840', 1),
(2, 'Hệ trợ giúp quyết định', 'IT3420', 1),
(6, 'Tin học đại cương', 'IT1010', 1);

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
  `theloai` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'thongbao',
  `thong_bao_cho` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `da_thong_bao_cho` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaydang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dm_tintuc`
--

INSERT INTO `dm_tintuc` (`matintuc`, `id_lophoc`, `tieude`, `noidung`, `file`, `manguoidang`, `theloai`, `thong_bao_cho`, `da_thong_bao_cho`, `ngaydang`) VALUES
(1, 6, 'vì sao', 'lại thế', NULL, 20151588, 'hoidap', NULL, '', '2018-12-13 06:50:28'),
(3, 6, 'adasda', 'àa', NULL, 20151588, 'hoidap', 'a:2:{i:1;s:8:"20154153";i:2;s:1:"1";}', 'a:1:{i:0;s:1:"1";}', '2018-12-14 01:41:58'),
(5, 6, 'mai duoc nghi khong', '123', NULL, 20151588, 'hoidap', 'a:2:{i:1;s:8:"20154153";i:2;s:1:"1";}', 'a:1:{i:0;s:1:"1";}', '2018-12-16 20:11:35'),
(6, 6, 'hoi', '?', NULL, 20151588, 'hoidap', 'a:2:{i:1;s:8:"20154153";i:2;s:1:"1";}', 'a:1:{i:0;s:1:"1";}', '2018-12-17 13:55:13'),
(8, 6, 'thi cuối kì', 'đã có lịch thi cuối kỳ, mọi người vào sis.hust để xem', NULL, 1, 'thongbao', 'a:3:{i:0;s:8:"20151589";i:1;s:8:"12345678";i:2;s:7:"2211232";}', NULL, '2018-12-18 22:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_baigiang`
--

CREATE TABLE `tbl_baigiang` (
  `mabg` int(11) NOT NULL,
  `mamon` int(10) NOT NULL,
  `tieude` text COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `stt` int(11) DEFAULT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_baigiang`
--

INSERT INTO `tbl_baigiang` (`mabg`, `mamon`, `tieude`, `noidung`, `stt`, `file`, `ngaydang`) VALUES
(1, 1, 'ddd ', 'ddasd 								', NULL, '1-s2.0-S1877050918311426-main.pdf', '17/12/2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bailam`
--

CREATE TABLE `tbl_bailam` (
  `masinhvien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `madethi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thoigiannopbai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `socaudung` int(11) NOT NULL,
  `sodiem` float NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_bailam`
--

INSERT INTO `tbl_bailam` (`masinhvien`, `madethi`, `thoigiannopbai`, `socaudung`, `sodiem`, `file`) VALUES
('20151589', '47821', '2018/12/19 00:20:09', 0, 0, '47821_20151589.txt');

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

--
-- Dumping data for table `tbl_cauhoi`
--

INSERT INTO `tbl_cauhoi` (`macauhoi`, `mamon`, `manhom`, `noidung`, `ghichu`) VALUES
(25, 6, 'de', 'Để chọn toàn bộ các ô trên bảng tính bằng tổ họp phím bạn chọn:', NULL),
(26, 6, 'de', 'Để che giấu hay hiển thị các thanh công cụ, bạn chọn mục nào trong số các mục sau:', NULL),
(27, 6, 'de', 'Để ghi lưu một sổ bảng tính đang mở dưới một tên khác, bạn vào thực đơn lệnh File, chọn lệnh:', NULL),
(28, 6, 'kho', 'Bộ nhớ RAM và ROM là bộ nhớ gì', NULL),
(29, 6, 'kho', 'Phát biểu nào sau đây là sai', NULL),
(30, 6, 'kho', 'Dữ liệu là gì', NULL),
(31, 6, 'kho', ' Bit là gì', NULL),
(32, 6, 'kho', ' Hex là hệ đếm', NULL),
(33, 6, 'kho', 'Các thà nh phần: bộ nhớ chính, bộ xử lý trung ương, bộ phận nhập xuất, các loại hệ điều hành là', NULL),
(36, 6, 'tb', 'Danh sách các mục chọn trong thực đơn gọi là:', NULL),
(37, 6, 'tb', 'Hộp điều khiển việc phóng to, thu nhỏ, đóng cửa sổ gọi là', NULL),
(38, 6, 'tb', 'Windows Explorer có các thành phần: Explorer bar, Explorer view, Tool bar, menu bar. Còn lại là gì', NULL),
(39, 6, 'tb', 'Shortcut là biểu tượng đại diện cho một chương trình hay một tập tin để khởi động một chương trình hay một tập tin. Vậy có mấy loại shortcut', NULL),
(40, 6, 'tb', 'Để chạy một ứng dụng trong Windows, bạn làm thế nào', NULL),
(41, 6, 'tb', 'Chương trình cho phép định lại cấu hình hệ thống thay đổi môi trường làm việc cho phù hợp', NULL),
(42, 6, 'tb', 'Các ký tự sau đây ký tự nào không được sử dụng để đặt tên của tập tin, thư mục', NULL),
(43, 6, 'tb', ' Có mấy cách tạo mới một văn bản trong Word:', NULL),
(44, 6, 'tb', 'Sử dụng Office Clipboard, bạn có thể lưu trữ tối đa bao nhiêu clipboard trong đấy', NULL),
(45, 6, 'tb', 'Thao tác Shift + Enter có chức năng gì', NULL),
(46, 6, 'tb', 'Muốn xác định khoảng cách và vị trí ký tự, ta vào', NULL),
(47, 6, 'tb', 'Phím nóng Ctrl + Shift + =, có chức năng gì', NULL),
(48, 6, 'tb', 'Để gạch dưới mỗi từ một nét đơn, ngoài việc và o Format/Font, ta có thể dùng tổ hợp phím nào', NULL),
(49, 6, 'tb', 'Khoảng cách các đoạn, các dòng, còn dùng làm chức năng nào sau đây', NULL),
(50, 6, 'tb', ' Trong phần File/ Page Setup mục Gutter có chức năng gì', NULL),
(51, 6, 'de', 'Để thay đổi đơn vị đo của thức, ta chọn', NULL),
(52, 6, 'de', 'Ký hiệu này trên thanh thước có nghĩa là gì', NULL),
(53, 6, 'de', 'Trong trang Format/Bullets and Numbering, nếu muốn chọn thông số khác ta vào mục Customize. Trong này, phần Number Format dùng để', NULL),
(54, 6, 'de', 'Trong mục Format/Drop Cap, phần Distance form text dùng để xác định khoảng cách', NULL),
(56, 1, 'de', 'Để chọn toàn bộ các ô trên bảng tính bằng tổ họp phím bạn chọn:', NULL),
(57, 1, 'de', 'Để che giấu hay hiển thị các thanh công cụ, bạn chọn mục nào trong số các mục sau:', NULL),
(58, 1, 'de', 'Để ghi lưu một sổ bảng tính đang mở dưới một tên khác, bạn vào thực đơn lệnh File, chọn lệnh:', NULL);

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

--
-- Dumping data for table `tbl_cautraloi`
--

INSERT INTO `tbl_cautraloi` (`macautraloi`, `macauhoi`, `noidung`, `ghichu`) VALUES
(81, 25, 'Nhấn tổ hợp phím Ctrl + A', NULL),
(82, 25, 'Nhấn tổ hợp phím Ctrl + All', NULL),
(83, 25, 'Nhấn tổ hợp phím Ctrl + Alt +Space', NULL),
(84, 25, 'Cả hai cách thứ nhất và thứ 3 đều được', NULL),
(85, 26, 'Vào thực đơn lệnh File, chọn lệnh Page Setup', NULL),
(86, 26, 'Vào thực đơn lệnh View, chọn lệnh Toolbars', NULL),
(87, 26, 'Vào thực đơn lệnh Insert, chọn lệnh Object', NULL),
(88, 26, 'Vào thực đơn lệnh Tools, chọn lệnh Options', NULL),
(89, 27, 'Open', NULL),
(90, 27, 'Save', NULL),
(91, 27, 'Save As', NULL),
(92, 27, 'Send To', NULL),
(93, 28, 'Secondary memory', NULL),
(94, 28, 'Receive memory', NULL),
(95, 28, 'Random access memory', NULL),
(96, 28, 'Primary memory ', NULL),
(97, 29, 'Đơn vị điều khiển (Control Unit) chứa CPU, điều khiển tất cả các hoạt động của máy', NULL),
(98, 29, 'CPU là bộ nhớ xử lý trung ương, thực hiện việc xử lý thông tin lưu trữ trong bộ nhớ', NULL),
(99, 29, 'ALU là đơn vị số học và luận lý và các thanh ghi cũng nằm trong CPU', NULL),
(100, 29, 'Memory Cell là tập hợp các ô nhớ.', NULL),
(101, 30, 'Là các số liệu hoặc là tà i liệu cho trước chưa được xử lý.', NULL),
(102, 30, 'Là khái niệm có thể được phát sinh, lưu trữ , tìm kiếm, sao chép, biến đổi…', NULL),
(103, 30, 'Là các thông tin được thể hiện dưới nhiều dạng khác nhau.', NULL),
(104, 30, 'Tất cả đều đúng', NULL),
(105, 31, 'Là đơn vị nhỏ nhất của thông tin được sử dụng trong máy tính', NULL),
(106, 31, 'là một phần tử nhỏ mang một trong 2 giá trị 0 và 1', NULL),
(107, 31, 'Là một đơn vị đo thông tin', NULL),
(108, 31, 'Tất cả đều đúng.', NULL),
(109, 32, 'Hệ nhị phân', NULL),
(110, 32, 'Hệ bát phân', NULL),
(111, 32, 'Hệ thập phân', NULL),
(112, 32, ' Hệ thập lục phân', NULL),
(113, 33, 'Phần cứng', NULL),
(114, 33, 'Phần mềm', NULL),
(115, 33, 'Thiết bị lưu trữ', NULL),
(116, 33, 'Tất cả đều sai', NULL),
(125, 36, 'Menu bar', NULL),
(126, 36, 'Menu pad', NULL),
(127, 36, 'Menu options  ', NULL),
(128, 36, 'Tất cả đều sai', NULL),
(129, 37, 'Dialog box', NULL),
(130, 37, 'list box', NULL),
(131, 37, 'Control box  ', NULL),
(132, 37, 'Text box', NULL),
(133, 38, 'Status bar             ', NULL),
(134, 38, 'Menu bar', NULL),
(135, 38, 'Task bar', NULL),
(136, 38, 'tất cả đều sai', NULL),
(137, 39, '1 loại', NULL),
(138, 39, '3 loại', NULL),
(139, 39, '2 loại', NULL),
(140, 39, '4 loại', NULL),
(141, 40, 'Nhấp phải vào biểu tượng và chọn Open', NULL),
(142, 40, 'Nhấp đúp vào biểu tượng', NULL),
(143, 40, 'tất cả đều sai', NULL),
(144, 40, 'Tất cả đều đúng', NULL),
(145, 41, 'Display  ', NULL),
(146, 41, 'Control panel', NULL),
(147, 41, 'Sreen Saver ', NULL),
(148, 41, 'Tất cả đều có thể', NULL),
(149, 42, '@, 1, %', NULL),
(150, 42, ' - (,)', NULL),
(151, 42, '~, “, ? , @, #, $ ', NULL),
(152, 42, ' *, /, \\, <, >', NULL),
(153, 43, '2 cách', NULL),
(154, 43, '3 cách', NULL),
(155, 43, '4 cách', NULL),
(156, 43, '1 cách', NULL),
(157, 44, '11', NULL),
(158, 44, '13', NULL),
(159, 44, '17', NULL),
(160, 44, '20', NULL),
(161, 45, 'Xuống hàng chưa kết thúc paragraph', NULL),
(162, 45, 'Xuống một trang màn hình     ', NULL),
(163, 45, 'Nhập dữ liệu theo hàng dọc', NULL),
(164, 45, 'Tất cả đều sai', NULL),
(165, 46, 'Format/Paragragh', NULL),
(166, 46, 'Format/Font', NULL),
(167, 46, 'Format/Style', NULL),
(168, 46, 'Format/Object', NULL),
(169, 47, 'Bật hoặc tắt gạch dưới nét đôi', NULL),
(170, 47, ' Bật hoặc tắt chỉ số trên', NULL),
(171, 47, 'Bật hoặc tắt chỉ số dưới  ', NULL),
(172, 47, 'Trả về dạng mặc định', NULL),
(173, 48, 'Ctrl + Shift + D', NULL),
(174, 48, 'Ctrl + Shift + A', NULL),
(175, 48, 'Ctrl + Shift + K', NULL),
(176, 48, 'Ctrl + Shift + W  ', NULL),
(177, 49, ' Định dạng cột ', NULL),
(178, 49, 'Thay đổi font chữ', NULL),
(179, 49, 'Canh chỉnh Tab', NULL),
(180, 49, 'Tất cả đều sai', NULL),
(181, 50, 'Quy định khoảng cách từ mép đến trang in', NULL),
(182, 50, 'Chia văn bản thà nh số đoạn theo ý muốn', NULL),
(183, 50, ' Phần chừ a trống để đóng thành tập', NULL),
(184, 50, 'Quy định lề của trang in', NULL),
(185, 51, 'Format/Tabs', NULL),
(186, 51, 'Format/Object', NULL),
(187, 51, 'Tools/Option/General ', NULL),
(188, 51, 'Tools/Option/View', NULL),
(189, 52, 'Bar tab ', NULL),
(190, 52, 'Decinal Tab', NULL),
(191, 52, 'Hanging indent', NULL),
(192, 52, 'Frist line indent ', NULL),
(193, 53, 'Hiệu chỉnh ký hiệu của Number  ', NULL),
(194, 53, 'Thêm văn bản ở trước, sau dấu hoa thị', NULL),
(195, 53, 'Hiệu chỉnh ký hiệu của Bullets   ', NULL),
(196, 53, 'Thay đổi font chữ', NULL),
(197, 54, 'Giữ a ký tự Drop Cap với lề trái ', NULL),
(198, 54, 'Giữ a ký tự Drop Cap với ký tự tiếp theo', NULL),
(199, 54, 'Giữ a ký tự Drop Cap với lề phải', NULL),
(200, 54, 'Giữ a ký tự Drop Cap với toà n văn bản', NULL),
(205, 56, 'Nhấn tổ hợp phím Ctrl + A', NULL),
(206, 56, 'Nhấn tổ hợp phím Ctrl + All', NULL),
(207, 56, 'Nhấn tổ hợp phím Ctrl + Alt +Space', NULL),
(208, 56, 'Cả hai cách thứ nhất và thứ 3 đều được', NULL),
(209, 57, 'Vào thực đơn lệnh File, chọn lệnh Page Setup', NULL),
(210, 57, 'Vào thực đơn lệnh View, chọn lệnh Toolbars', NULL),
(211, 57, 'Vào thực đơn lệnh Insert, chọn lệnh Object', NULL),
(212, 57, 'Vào thực đơn lệnh Tools, chọn lệnh Options', NULL),
(213, 58, 'Open', NULL),
(214, 58, 'Save', NULL),
(215, 58, 'Save As', NULL),
(216, 58, 'Send To', NULL);

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
(12, 20, 'sao k lam dc bai v a', '2018-12-03 12:54:46', 20151589),
(13, 20, 'k bieets gi', '2018-12-03 07:43:58', 20151589),
(14, 20, 'anjcaac', '2018-12-03 07:44:10', 20151589),
(15, 20, 'Em tu lam di', '2018-12-03 15:03:24', 1),
(16, 4, 'dasd', '2018-12-14 23:54:27', 1),
(17, 1, 'abc', '2018-12-16 13:43:38', 1),
(18, 1, 'abcd', '2018-12-16 13:49:23', 20154153),
(19, 6, 'tra loi', '2018-12-17 13:55:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dapandung`
--

CREATE TABLE `tbl_dapandung` (
  `macauhoi` int(10) NOT NULL,
  `macautraloi` int(10) NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dapandung`
--

INSERT INTO `tbl_dapandung` (`macauhoi`, `macautraloi`, `ghichu`) VALUES
(25, 81, ''),
(26, 86, ''),
(27, 91, ''),
(28, 93, ''),
(29, 99, ''),
(30, 104, ''),
(31, 108, ''),
(32, 110, ''),
(33, 115, ''),
(36, 127, ''),
(37, 132, ''),
(38, 136, ''),
(39, 138, ''),
(40, 143, ''),
(41, 145, ''),
(42, 152, ''),
(43, 156, ''),
(44, 157, ''),
(45, 164, ''),
(46, 167, ''),
(47, 170, ''),
(48, 175, ''),
(49, 178, ''),
(50, 184, ''),
(51, 185, ''),
(52, 191, ''),
(53, 194, ''),
(54, 200, ''),
(56, 205, ''),
(57, 210, ''),
(58, 215, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dethi`
--

CREATE TABLE `tbl_dethi` (
  `madethi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mamon` int(10) NOT NULL,
  `thoigiantao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thoigianlambai` int(11) NOT NULL,
  `trangthai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dethi`
--

INSERT INTO `tbl_dethi` (`madethi`, `mamon`, `thoigiantao`, `thoigianlambai`, `trangthai`) VALUES
('47609', 6, '2018/12/18 22:40', 60, 1),
('47821', 1, '2018/12/18 22:44', 15, 1),
('54172', 1, '2018/12/19 00:29', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dethi_cauhoi`
--

CREATE TABLE `tbl_dethi_cauhoi` (
  `madethi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `macauhoi` int(10) NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dethi_cauhoi`
--

INSERT INTO `tbl_dethi_cauhoi` (`madethi`, `macauhoi`, `ghichu`) VALUES
('47609', 27, NULL),
('47609', 28, NULL),
('47609', 30, NULL),
('47609', 33, NULL),
('47609', 38, NULL),
('47609', 45, NULL),
('47609', 48, NULL),
('47609', 49, NULL),
('47609', 51, NULL),
('47609', 52, NULL),
('47609', 53, NULL),
('47609', 54, NULL),
('47821', 56, NULL),
('47821', 57, NULL),
('47821', 58, NULL),
('54172', 56, NULL),
('54172', 57, NULL),
('54172', 58, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kyhoc`
--

CREATE TABLE `tbl_kyhoc` (
  `makyhoc` int(11) NOT NULL,
  `tenkyhoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_kyhoc`
--

INSERT INTO `tbl_kyhoc` (`makyhoc`, `tenkyhoc`, `trangthai`) VALUES
(1, '20171', 0),
(2, '20172', 0),
(3, '20181', 0),
(4, '20182', 1);

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

--
-- Dumping data for table `tbl_lophoc`
--

INSERT INTO `tbl_lophoc` (`id_lophoc`, `malophoc`, `mamon`, `kyhoc`, `trangthai`) VALUES
(5, '23215', 1, 3, 1),
(6, '123456', 1, 4, 1),
(9, '123453', 1, 4, 1);

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
(1, 'duyhoa', '202cb962ac59075b964b07152d234b70', 'Duy Hòa', 1, 'giaovien'),
(2, 'giaovien', '202cb962ac59075b964b07152d234b70', 'ddh', 1, 'giaovien'),
(3, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sinhvien`
--

CREATE TABLE `tbl_sinhvien` (
  `masinhvien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anhdaidien` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sinhvien`
--

INSERT INTO `tbl_sinhvien` (`masinhvien`, `email`, `matkhau`, `hoten`, `ngaysinh`, `anhdaidien`, `gioitinh`) VALUES
('20151588', 'hoa.daoduy@gmail.com', '202cb962ac59075b964b07152d234b70', 'Duy Hòa', '1997-07-12', '2018-02-01 (2).png', 'nam'),
('20151589', 'duyhoa.dao1207@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đào Duy Hòa', '1997-07-12', 'hoanq13.jpg', 'nam'),
('20154153', 'tuan.vda@gmail.com', '202cb962ac59075b964b07152d234b70', 'Vũ đức anh tuấn', '1997-08-23', NULL, 'nam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sinhvien_lophoc`
--

CREATE TABLE `tbl_sinhvien_lophoc` (
  `masinhvien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hotensv` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_lophoc` int(11) NOT NULL,
  `trangthai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sinhvien_lophoc`
--

INSERT INTO `tbl_sinhvien_lophoc` (`masinhvien`, `hotensv`, `id_lophoc`, `trangthai`, `thoigian`) VALUES
('20151589', 'Đào Duy Hòa', 6, 't', '2018/12/17'),
('12345678', 'Nguyễn Văn A', 6, 'f', '2018/12/17'),
('2211232', 'Nguyễn Văn C', 6, 'f', '2018/12/17');

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
-- Indexes for table `tbl_bailam`
--
ALTER TABLE `tbl_bailam`
  ADD PRIMARY KEY (`masinhvien`,`madethi`),
  ADD KEY `madethi` (`madethi`);

--
-- Indexes for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  ADD PRIMARY KEY (`macauhoi`),
  ADD KEY `manhom` (`manhom`),
  ADD KEY `mamon` (`mamon`);

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
-- Indexes for table `tbl_sinhvien`
--
ALTER TABLE `tbl_sinhvien`
  ADD PRIMARY KEY (`masinhvien`);

--
-- Indexes for table `tbl_sinhvien_lophoc`
--
ALTER TABLE `tbl_sinhvien_lophoc`
  ADD KEY `id_lophoc` (`id_lophoc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_mon`
--
ALTER TABLE `dm_mon`
  MODIFY `mamon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dm_tintuc`
--
ALTER TABLE `dm_tintuc`
  MODIFY `matintuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_baigiang`
--
ALTER TABLE `tbl_baigiang`
  MODIFY `mabg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  MODIFY `macauhoi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tbl_cautraloi`
--
ALTER TABLE `tbl_cautraloi`
  MODIFY `macautraloi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `macomment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_kyhoc`
--
ALTER TABLE `tbl_kyhoc`
  MODIFY `makyhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  MODIFY `id_lophoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  MODIFY `maquantri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dm_mon`
--
ALTER TABLE `dm_mon`
  ADD CONSTRAINT `dm_mon_ibfk_1` FOREIGN KEY (`manguoitao`) REFERENCES `tbl_quantri` (`maquantri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dm_tintuc`
--
ALTER TABLE `dm_tintuc`
  ADD CONSTRAINT `dm_tintuc_ibfk_1` FOREIGN KEY (`id_lophoc`) REFERENCES `tbl_lophoc` (`id_lophoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_baigiang`
--
ALTER TABLE `tbl_baigiang`
  ADD CONSTRAINT `tbl_baigiang_ibfk_1` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_bailam`
--
ALTER TABLE `tbl_bailam`
  ADD CONSTRAINT `tbl_bailam_ibfk_1` FOREIGN KEY (`madethi`) REFERENCES `tbl_dethi` (`madethi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_bailam_ibfk_2` FOREIGN KEY (`masinhvien`) REFERENCES `tbl_sinhvien` (`masinhvien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  ADD CONSTRAINT `tbl_cauhoi_ibfk_2` FOREIGN KEY (`manhom`) REFERENCES `dm_nhomcauhoi` (`manhom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cauhoi_ibfk_3` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cautraloi`
--
ALTER TABLE `tbl_cautraloi`
  ADD CONSTRAINT `tbl_cautraloi_ibfk_1` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dapandung`
--
ALTER TABLE `tbl_dapandung`
  ADD CONSTRAINT `tbl_dapandung_ibfk_1` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_dapandung_ibfk_2` FOREIGN KEY (`macautraloi`) REFERENCES `tbl_cautraloi` (`macautraloi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dethi`
--
ALTER TABLE `tbl_dethi`
  ADD CONSTRAINT `tbl_dethi_ibfk_1` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dethi_cauhoi`
--
ALTER TABLE `tbl_dethi_cauhoi`
  ADD CONSTRAINT `tbl_dethi_cauhoi_ibfk_1` FOREIGN KEY (`madethi`) REFERENCES `tbl_dethi` (`madethi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_dethi_cauhoi_ibfk_2` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  ADD CONSTRAINT `tbl_lophoc_ibfk_1` FOREIGN KEY (`kyhoc`) REFERENCES `tbl_kyhoc` (`makyhoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lophoc_ibfk_2` FOREIGN KEY (`mamon`) REFERENCES `dm_mon` (`mamon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  ADD CONSTRAINT `tbl_quantri_ibfk_1` FOREIGN KEY (`maquyen`) REFERENCES `dm_quyen` (`maquyen`);

--
-- Constraints for table `tbl_sinhvien_lophoc`
--
ALTER TABLE `tbl_sinhvien_lophoc`
  ADD CONSTRAINT `tbl_sinhvien_lophoc_ibfk_1` FOREIGN KEY (`id_lophoc`) REFERENCES `tbl_lophoc` (`id_lophoc`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
