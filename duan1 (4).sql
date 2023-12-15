-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2023 lúc 02:08 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `id_author` int(10) NOT NULL,
  `name_author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`id_author`, `name_author`) VALUES
(1, 'Shinkai Makoto'),
(2, 'Nguyễn Nhật Ánh'),
(3, 'Frank Herbert'),
(4, 'Reki Kawahara'),
(5, 'Tappei Nagatsuki'),
(6, 'Maryyam'),
(7, 'Phạm Hồng Anh'),
(8, 'Hàn Khải My'),
(9, 'Connan Doyle'),
(10, 'Gillian Flynn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(10) NOT NULL,
  `id_book` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `ngaydang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_binhluan`, `id_book`, `id_user`, `noidung`, `ngaydang`) VALUES
(84, 25, 6, 'Tuyệt vời', '12/13/2023'),
(85, 30, 6, 'Bộ này bánh cuốn', '12/13/2023'),
(86, 30, 6, 'Được của ló', '12/13/2023'),
(87, 31, 6, 'Bộ này nv9 ngu', '12/13/2023'),
(88, 32, 6, 'Tôi bắt đầu ảo tưởng', '12/13/2023'),
(89, 40, 3, 'Cười vc', '12/13/2023'),
(90, 42, 3, 'Sợ quá đi mà', '12/13/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id_book` int(10) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `img` varchar(50) NOT NULL,
  `id_author` int(10) NOT NULL,
  `id_nhaxuatban` int(10) NOT NULL,
  `ngayxuatban` varchar(255) NOT NULL,
  `price` int(12) NOT NULL,
  `id_theloai` int(10) NOT NULL,
  `xoasp` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id_book`, `tieude`, `img`, `id_author`, `id_nhaxuatban`, `ngayxuatban`, `price`, `id_theloai`, `xoasp`) VALUES
(25, 'Dune', 'sach1.jpg', 3, 1, '24/10/2004', 120000, 1, b'0'),
(26, 'The Great Gatsby', 'sach2.jpg', 1, 1, '24/01/2005', 50000, 1, b'0'),
(27, 'To Kill a mockingbird', 'sach3.jpg', 3, 1, '10/01/2008', 75000, 1, b'0'),
(28, 'Bright Side', 'sach4.jpg', 3, 1, '24/10/2004', 80000, 1, b'0'),
(29, 'Elden Ring', 'sach5.jpg', 1, 1, '10/01/2008', 200000, 1, b'0'),
(30, 'Sword Art Online', 'sach6.jpg', 4, 1, '22/02/2022', 110000, 2, b'0'),
(31, 'Re:Zero : Bắt đầu lại thế giới khác', 'sach7.jpg', 5, 1, '24/10/2004', 140000, 2, b'0'),
(32, 'Over Lord', 'sach8.jpg', 6, 1, '10/01/2008', 210000, 2, b'0'),
(33, 'Sự im Lặng của Bầy Cừu', 'sach9.jpg', 7, 1, '10/01/2009', 57000, 3, b'0'),
(34, 'Lần cuối em yêu anh', 'sach10.jpg', 8, 1, '10/01/2009', 120000, 3, b'0'),
(35, 'Em thuộc về Anh', 'sach11.jpg', 8, 1, '10/01/2008', 30000, 3, b'0'),
(36, 'Sherlock Holmes', 'sach12.jpg', 9, 1, '10/01/2009', 300000, 4, b'0'),
(37, 'Cô gái mất tích', 'sach13.jpg', 10, 1, '22/02/2022', 350000, 17, b'0'),
(38, 'The Hobbit', 'sach14.jpg', 10, 1, '22/02/2022', 250000, 17, b'0'),
(39, 'Destination Moon', 'sach15.jpg', 10, 1, '10/01/2008', 120000, 16, b'0'),
(40, 'Don Quixote', 'sach16.jpg', 10, 1, '10/01/2008', 120000, 16, b'0'),
(41, 'Three Men in a Boat', 'sach17.jpg', 10, 1, '24/10/2004', 150000, 17, b'0'),
(42, 'Dracula', 'sach18.jpg', 10, 1, '10/01/2008', 107000, 17, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `ngaymua` varchar(55) NOT NULL,
  `total` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `ngaymua`, `total`) VALUES
(81, 6, '13/12/2023', 345000),
(82, 6, '13/12/2023', 325000),
(83, 3, '13/12/2023', 395000),
(84, 3, '13/12/2023', 660000),
(85, 3, '13/12/2023', 525000),
(86, 3, '13/12/2023', 365000),
(87, 3, '13/12/2023', 405000),
(88, 3, '13/12/2023', 205000),
(89, 3, '13/12/2023', 450000),
(90, 1, '13/12/2023', 885000),
(91, 1, '13/12/2023', 120000000),
(92, 1, '13/12/2023', 360000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_chitiet` int(10) NOT NULL,
  `id_donhang` int(10) NOT NULL,
  `id_book` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `gia_sanpham` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_chitiet`, `id_donhang`, `id_book`, `soluong`, `gia_sanpham`) VALUES
(56, 28, 26, 1, 50000),
(57, 28, 27, 1, 75000),
(58, 28, 28, 1, 80000),
(59, 28, 31, 1, 140000),
(60, 29, 25, 1, 120000),
(61, 29, 26, 1, 50000),
(62, 29, 27, 1, 75000),
(63, 29, 28, 1, 80000),
(64, 30, 26, 2, 50000),
(65, 30, 27, 1, 75000),
(66, 30, 28, 1, 80000),
(67, 30, 31, 1, 140000),
(68, 31, 29, 1, 200000),
(69, 31, 30, 1, 110000),
(70, 31, 31, 1, 140000),
(71, 31, 32, 1, 210000),
(72, 32, 25, 1, 120000),
(73, 32, 26, 1, 50000),
(74, 32, 27, 1, 75000),
(75, 32, 28, 1, 80000),
(76, 32, 29, 1, 200000),
(77, 33, 27, 1, 75000),
(78, 33, 28, 1, 80000),
(79, 33, 32, 1, 210000),
(80, 34, 27, 1, 75000),
(81, 34, 28, 1, 80000),
(82, 34, 30, 1, 110000),
(83, 34, 31, 1, 140000),
(84, 35, 26, 1, 50000),
(85, 35, 27, 1, 75000),
(86, 35, 28, 1, 80000),
(87, 36, 34, 1, 120000),
(88, 36, 35, 1, 30000),
(89, 36, 36, 1, 300000),
(90, 37, 25, 3, 120000),
(91, 37, 26, 3, 50000),
(92, 37, 27, 5, 75000),
(93, 38, 25, 1000, 120000),
(94, 39, 25, 3, 120000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_book`
--

CREATE TABLE `chitiet_book` (
  `id_chitiet_book` int(11) NOT NULL,
  `id_book` int(10) NOT NULL,
  `soluong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_book`
--

INSERT INTO `chitiet_book` (`id_chitiet_book`, `id_book`, `soluong`) VALUES
(30, 25, 91),
(31, 26, 92),
(32, 27, 87),
(33, 28, 97),
(34, 29, 100),
(35, 30, 100),
(36, 31, 18),
(37, 32, 99),
(38, 33, 100),
(39, 34, 100),
(40, 35, 100),
(41, 36, 100),
(42, 37, 100),
(43, 38, 1000),
(44, 39, 100),
(45, 40, 100),
(46, 41, 100),
(47, 42, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_cart`
--

CREATE TABLE `chitiet_cart` (
  `id_chitiet_cart` int(10) NOT NULL,
  `id_cart` int(10) NOT NULL,
  `id_books` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `date` date NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `total_donhang` int(10) NOT NULL,
  `huy` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `id_user`, `date`, `status`, `total_donhang`, `huy`) VALUES
(27, 6, '2022-09-02', 3, 281000, 0),
(28, 6, '2023-10-02', 4, 345000, 0),
(29, 6, '2023-11-08', 1, 325000, 0),
(30, 3, '2023-12-02', 0, 0, 1),
(31, 3, '2023-12-06', 2, 660000, 0),
(32, 3, '2023-12-11', 0, 525000, 1),
(33, 3, '2023-12-12', 3, 365000, 0),
(34, 3, '2023-12-13', 0, 405000, 0),
(35, 3, '2023-12-13', 0, 205000, 0),
(36, 3, '2023-12-13', 0, 450000, 0),
(37, 1, '2023-12-13', 4, 0, 0),
(38, 1, '2023-12-13', 0, 0, 0),
(39, 1, '2023-12-13', 3, 360000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `language`
--

CREATE TABLE `language` (
  `id_language` int(5) NOT NULL,
  `name_language` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `language`
--

INSERT INTO `language` (`id_language`, `name_language`) VALUES
(1, 'Tiếng Việt'),
(2, 'Tiếng Anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `id_nhaxuatban` int(10) NOT NULL,
  `name_nhaxuatban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`id_nhaxuatban`, `name_nhaxuatban`) VALUES
(1, 'Kim Đồng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id_theloai` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `imgtheloai` varchar(50) DEFAULT NULL,
  `xoa` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id_theloai`, `name`, `imgtheloai`, `xoa`) VALUES
(1, 'tiểu thuyết', 'book1.jpg', b'0'),
(2, 'light novel', 'lightnoveg.jfif', b'0'),
(3, 'Ngôn tình', 'ngontinh.jfif', b'0'),
(4, 'Trinh thám', 'trinhtham1.jpg', b'0'),
(5, 'Phiêu lưu', 'phieuluu.jfif', b'0'),
(15, 'Lãng mạn', 'langman.jfif', b'0'),
(16, 'Hài hước', NULL, b'0'),
(17, 'Kinh dị', NULL, b'0'),
(19, 'Truyện Tranh', '', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `role` bit(1) NOT NULL,
  `xoauser` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `fullname`, `address`, `tel`, `role`, `xoauser`) VALUES
(1, 'quanglocnd123', 'password', 'quanglocnd2401@gmail.com', 'Trần Lộc', 'Nam Định', '0819861426', b'1', b'0'),
(3, 'quanglocnd2401', '123', 'loc@gmail.com', 'Xuân Hải', '213 Phương Canh', '0819861426', b'0', b'0'),
(5, 'locnd1234', '1234', 'quanglocnd2004@gmail.com', '', '', '', b'0', b'0'),
(6, 'sonlc', '123', 'loc@gmail.com', 'Trần Ngọc Sơn', '19/605 Trường Chinh , tp Nam Định', '0819861426', b'0', b'0'),
(7, 'sonlocnd123', '1234', 'locnd1@gmail.com', '', '', '', b'0', b'0'),
(15, 'haiquayxe', 'haibuoito', 'hdao4959@gmail.com', 'Đào Hải', '', '', b'0', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(10) NOT NULL,
  `ma_voucher` varchar(55) NOT NULL,
  `giamgia` float NOT NULL,
  `soluong` int(10) NOT NULL,
  `date` date NOT NULL,
  `huy` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `ma_voucher`, `giamgia`, `soluong`, `date`, `huy`) VALUES
(5, 'LOC1', 80, 23, '2023-12-11', 1),
(6, 'ABC', 80, 20, '2023-12-22', 0),
(7, 'LOCVIP', 75, 20, '2023-12-24', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `lk_bl` (`id_book`),
  ADD KEY `lk_bluser` (`id_user`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `lk_sach` (`id_theloai`),
  ADD KEY `lk_tg` (`id_author`),
  ADD KEY `lk_nxb` (`id_nhaxuatban`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `lk_user_cart` (`id_user`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_chitiet`),
  ADD KEY `lk_donhang` (`id_donhang`),
  ADD KEY `lk_book` (`id_book`);

--
-- Chỉ mục cho bảng `chitiet_book`
--
ALTER TABLE `chitiet_book`
  ADD PRIMARY KEY (`id_chitiet_book`),
  ADD KEY `lk_chitiet` (`id_book`);

--
-- Chỉ mục cho bảng `chitiet_cart`
--
ALTER TABLE `chitiet_cart`
  ADD PRIMARY KEY (`id_chitiet_cart`),
  ADD KEY `lk_cart_detail` (`id_cart`),
  ADD KEY `lk_cart_books` (`id_books`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `lk_user` (`id_user`);

--
-- Chỉ mục cho bảng `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id_language`);

--
-- Chỉ mục cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`id_nhaxuatban`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id_theloai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id_chitiet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `chitiet_book`
--
ALTER TABLE `chitiet_book`
  MODIFY `id_chitiet_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `chitiet_cart`
--
ALTER TABLE `chitiet_cart`
  MODIFY `id_chitiet_cart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `language`
--
ALTER TABLE `language`
  MODIFY `id_language` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `id_nhaxuatban` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id_theloai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_bl` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`),
  ADD CONSTRAINT `lk_bluser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `lk_nxb` FOREIGN KEY (`id_nhaxuatban`) REFERENCES `nhaxuatban` (`id_nhaxuatban`),
  ADD CONSTRAINT `lk_sach` FOREIGN KEY (`id_theloai`) REFERENCES `theloai` (`id_theloai`),
  ADD CONSTRAINT `lk_tg` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_user_cart` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `lk_book` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`),
  ADD CONSTRAINT `lk_donhang` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`);

--
-- Các ràng buộc cho bảng `chitiet_book`
--
ALTER TABLE `chitiet_book`
  ADD CONSTRAINT `lk_chitiet` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`);

--
-- Các ràng buộc cho bảng `chitiet_cart`
--
ALTER TABLE `chitiet_cart`
  ADD CONSTRAINT `lk_cart_books` FOREIGN KEY (`id_books`) REFERENCES `books` (`id_book`),
  ADD CONSTRAINT `lk_cart_detail` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `lk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
