-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2023 lúc 09:02 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dethi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `MACAUHOI` int(11) NOT NULL,
  `NOIDUNGCAUHOI` text NOT NULL,
  `MUCDO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`MACAUHOI`, `NOIDUNGCAUHOI`, `MUCDO`) VALUES
(11, 'x+1=2 thì x bằng mấy', 'Dễ'),
(12, 'x+1=3 thì x bằng mấy', 'Dễ'),
(13, 'x+1=4 thì x bằng mấy', 'Dễ'),
(15, 'Trọng lượng trái đất là bao nhiêu', 'Dễ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi-dapan`
--

CREATE TABLE `cauhoi-dapan` (
  `MACAUHOI` int(11) NOT NULL,
  `MADA` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cauhoi-dapan`
--

INSERT INTO `cauhoi-dapan` (`MACAUHOI`, `MADA`) VALUES
(11, '11DA1'),
(11, '11DA2'),
(11, '11DA3'),
(11, '11DA4'),
(12, '12DA1'),
(12, '12DA2'),
(12, '12DA3'),
(12, '12DA4'),
(12, '12DA5'),
(13, '13DA1'),
(13, '13DA2'),
(13, '13DA3'),
(15, '15DA1'),
(15, '15DA2'),
(15, '15DA3'),
(15, '15DA4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dapan`
--

CREATE TABLE `dapan` (
  `MADA` char(10) NOT NULL,
  `NOIDUNGDAPAN` text NOT NULL,
  `TRANGTHAI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dapan`
--

INSERT INTO `dapan` (`MADA`, `NOIDUNGDAPAN`, `TRANGTHAI`) VALUES
('6DA1', '1', 2),
('6DA2', '3', 4),
('6DA3', '5', 6),
('7DA1', '2', 3),
('7DA2', '4', 5),
('7DA3', '6', 7),
('8DA1', '1', 2),
('8DA2', '3', 4),
('8DA3', '5', 6),
('10DA1', '4', 5),
('10DA2', '6', 7),
('10DA3', '8', 9),
('10DA4', '4', 0),
('11DA1', '1', 1),
('11DA2', '3', 0),
('11DA3', '4', 0),
('11DA4', '3', 0),
('12DA1', '1', 0),
('12DA2', '2', 1),
('12DA3', '3', 0),
('12DA4', '5', 0),
('12DA5', '6', 0),
('13DA1', '1', 0),
('13DA2', '2', 0),
('13DA3', '3', 1),
('14DA1', '10', 2),
('14DA2', '2', 1),
('14DA3', '3', 0),
('14DA4', '4', 0),
('14DA5', '5', 0),
('15DA1', '100kg', 0),
('15DA2', '90kg', 0),
('15DA3', '10g', 0),
('15DA4', 'Khánh ngu', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dethi`
--

CREATE TABLE `dethi` (
  `iddethi` int(11) NOT NULL,
  `tendethi` text NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dethi`
--

INSERT INTO `dethi` (`iddethi`, `tendethi`, `ghichu`) VALUES
(1, 'Đề thi test', 'Các câu hỏi toán lớp 1'),
(3, 'Đề thi test 2', 'Toàn bộ các câu hỏi toán dễ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dethi-cauhoi`
--

CREATE TABLE `dethi-cauhoi` (
  `iddethi` int(11) NOT NULL,
  `idcauhoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dethi-cauhoi`
--

INSERT INTO `dethi-cauhoi` (`iddethi`, `idcauhoi`) VALUES
(1, 11),
(1, 13),
(3, 11),
(3, 12),
(3, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(128) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID`, `NAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'nguyenhuuduy', 'duyyl8a22016@gmail.com', '123454321'),
(2, 'nguyen huu minh duong', 'duyyl12a1@gmail.com', '123454321'),
(3, 'nguyenhuuduy', 'yian1805@gmail.com', '123454321'),
(4, 'Mai Tien Thanh', 'thanh@gmail.com', '12345654321'),
(5, 'Nguyen Dinh Kien', 'kien@gmail.com', '123454321'),
(6, 'Nguyễn Hữu Việt', '123@gmail.com', '123456789');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`MACAUHOI`);

--
-- Chỉ mục cho bảng `cauhoi-dapan`
--
ALTER TABLE `cauhoi-dapan`
  ADD PRIMARY KEY (`MADA`);

--
-- Chỉ mục cho bảng `dethi`
--
ALTER TABLE `dethi`
  ADD PRIMARY KEY (`iddethi`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `MACAUHOI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `dethi`
--
ALTER TABLE `dethi`
  MODIFY `iddethi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
