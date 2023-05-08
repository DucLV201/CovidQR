-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2022 lúc 03:37 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diadiem`
--

CREATE TABLE `diadiem` (
  `tentk` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `tendiadiem` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `diadiem`
--

INSERT INTO `diadiem` (`tentk`, `tendiadiem`) VALUES
('Duc', 'Trường Đại Học Sư Phạm Kỹ Thuật'),
('Bao', 'My Home');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doituong`
--

CREATE TABLE `doituong` (
  `Id` int(11) NOT NULL,
  `Cmnnd_Cccd` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `Hoten` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `TrangThai` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Ngaysinh` date DEFAULT NULL,
  `Sdt` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `Thoigian` datetime DEFAULT NULL,
  `tentk` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `doituong`
--

INSERT INTO `doituong` (`Id`, `Cmnnd_Cccd`, `Hoten`, `TrangThai`, `Ngaysinh`, `Sdt`, `Thoigian`, `tentk`) VALUES
(1, '192136641', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2021-11-09 18:14:51', 'Duc'),
(2, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2021-12-23 18:17:21', 'Duc'),
(3, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2021-12-31 18:17:31', 'Duc'),
(4, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2021-12-31 18:17:42', 'Duc'),
(5, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2021-12-31 18:19:16', 'Duc'),
(6, '046305000599', 'HUYNH BAO', 'An toàn', '2005-05-31', '0394688604', '2021-12-31 18:19:59', 'Duc'),
(7, '046305000599', 'HUYNH BAO', 'An toàn', '2005-05-31', '0394688604', '2021-12-30 18:20:22', 'Duc'),
(8, '046305000599', 'HUYNH BAO', 'An toàn', '2005-05-31', '0394688604', '2021-12-31 18:20:40', 'Duc'),
(9, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2021-12-31 18:20:56', 'Duc'),
(10, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2021-12-31 18:21:43', 'Duc'),
(11, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2021-12-31 18:21:57', 'Duc'),
(12, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2022-01-01 18:22:02', 'Duc'),
(13, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2022-01-02 18:38:29', 'Duc'),
(14, '046201004706', 'LUU VAN DUC', 'An toàn', '2001-06-13', '0352284719', '2022-01-02 09:24:28', 'Bao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ten` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `mk` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ten`, `sdt`, `mk`) VALUES
('Bao', '0352284712', '123'),
('Duc', '0352284713', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  ADD KEY `tentk` (`tentk`);

--
-- Chỉ mục cho bảng `doituong`
--
ALTER TABLE `doituong`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ten`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `doituong`
--
ALTER TABLE `doituong`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  ADD CONSTRAINT `diadiem_ibfk_1` FOREIGN KEY (`tentk`) REFERENCES `taikhoan` (`ten`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
