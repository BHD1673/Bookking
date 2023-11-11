
CREATE TABLE `dat_phong` (
  `ma_dat_phong` int NOT NULL,
  `ma_phong` int DEFAULT NULL,
  `ma_khach_hang` int DEFAULT NULL,
  `ngay_checkin` date NOT NULL,
  `ngay_checkout` date NOT NULL,
  `so_nguoi_o` int NOT NULL,
  `hinh_anh` text,
  `so_tien_dat_coc` decimal(10,2) NOT NULL,
  `ten_nguoi_dat` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
);


INSERT INTO `dat_phong` (`ma_dat_phong`, `ma_phong`, `ma_khach_hang`, `ngay_checkin`, `ngay_checkout`, `so_nguoi_o`, `hinh_anh`, `so_tien_dat_coc`, `ten_nguoi_dat`, `start_date`, `end_date`) VALUES
(1, 1, 1, '2023-11-15', '2023-11-18', 1, '/images/booking1.jpg', 50.00, NULL, NULL, NULL),
(2, 2, 2, '2023-11-20', '2023-11-25', 2, '/images/booking2.jpg', 75.00, NULL, NULL, NULL);


CREATE TABLE `dat_phong_dich_vu` (
  `ma_dat_phong` int NOT NULL,
  `ma_dich_vu` int NOT NULL
);

INSERT INTO `dat_phong_dich_vu` (`ma_dat_phong`, `ma_dich_vu`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3);


CREATE TABLE `dich_vu_phong` (
  `ma_dich_vu` int NOT NULL,
  `ten_dich_vu` varchar(50) NOT NULL,
  `gia` decimal(10,2) NOT NULL
);

INSERT INTO `dich_vu_phong` (`ma_dich_vu`, `ten_dich_vu`, `gia`) VALUES
(1, 'Wi-Fi', 5.00),
(2, 'Dịch vụ phòng ăn', 15.00),
(3, 'Dịch vụ giặt ủi', 10.00);

CREATE TABLE `hoa_don` (
  `ma_hoa_don` int NOT NULL,
  `ma_dat_phong` int DEFAULT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `trang_thai_thanhtoan` tinyint(1) DEFAULT '0'
);
INSERT INTO `hoa_don` (`ma_hoa_don`, `ma_dat_phong`, `tong_tien`, `trang_thai_thanhtoan`) VALUES
(1, 1, 100.00, 0),
(2, 2, 225.00, 0);


CREATE TABLE `khach_hang` (
  `ma_khach_hang` int NOT NULL,
  `ten_khach_hang` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL
);

INSERT INTO `khach_hang` (`ma_khach_hang`, `ten_khach_hang`, `email`, `so_dien_thoai`) VALUES
(1, 'Nguyen Van A', 'nguyenvana@email.com', '1234567890'),
(2, 'Tran Thi B', 'tranthib@email.com', '0987654321');

CREATE TABLE `loai_phong` (
  `ma_loai_phong` int NOT NULL,
  `ten_loai_phong` varchar(50) NOT NULL,
  `ty_le_giam_gia` decimal(5,2) DEFAULT '0.00'
);

INSERT INTO `loai_phong` (`ma_loai_phong`, `ten_loai_phong`, `ty_le_giam_gia`) VALUES
(1, 'Phòng Đơn', 0.05),
(2, 'Phòng Đôi', 0.10),
(3, 'Phòng VIP', 0.20);


CREATE TABLE `phong` (
  `ma_phong` int NOT NULL,
  `so_phong` varchar(10) NOT NULL,
  `loai_phong` varchar(50) NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `tinh_trang` tinyint(1) DEFAULT '1',
  `ma_loai_phong` int DEFAULT NULL
);

INSERT INTO `phong` (`ma_phong`, `so_phong`, `loai_phong`, `gia`, `tinh_trang`, `ma_loai_phong`) VALUES
(1, '101', 'Phòng Đơn', 100.00, 1, 1),
(2, '201', 'Phòng Đôi', 150.00, 1, 2),
(3, '301', 'Phòng VIP', 200.00, 1, 3);

ALTER TABLE `dat_phong`
  ADD PRIMARY KEY (`ma_dat_phong`),
  ADD KEY `ma_phong` (`ma_phong`),
  ADD KEY `ma_khach_hang` (`ma_khach_hang`);

ALTER TABLE `dat_phong_dich_vu`
  ADD PRIMARY KEY (`ma_dat_phong`,`ma_dich_vu`),
  ADD KEY `ma_dich_vu` (`ma_dich_vu`);

ALTER TABLE `dich_vu_phong`
  ADD PRIMARY KEY (`ma_dich_vu`);

ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hoa_don`),
  ADD KEY `ma_dat_phong` (`ma_dat_phong`);

ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_khach_hang`);

ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`ma_loai_phong`);

ALTER TABLE `phong`
  ADD PRIMARY KEY (`ma_phong`),
  ADD KEY `ma_loai_phong` (`ma_loai_phong`);

ALTER TABLE `dat_phong`
  MODIFY `ma_dat_phong` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `dich_vu_phong`
  MODIFY `ma_dich_vu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `hoa_don`
  MODIFY `ma_hoa_don` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `khach_hang`
  MODIFY `ma_khach_hang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `loai_phong`
  MODIFY `ma_loai_phong` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `phong`
  MODIFY `ma_phong` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `dat_phong`
  ADD CONSTRAINT `dat_phong_ibfk_1` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`),
  ADD CONSTRAINT `dat_phong_ibfk_2` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`);

ALTER TABLE `dat_phong_dich_vu`
  ADD CONSTRAINT `dat_phong_dich_vu_ibfk_1` FOREIGN KEY (`ma_dat_phong`) REFERENCES `dat_phong` (`ma_dat_phong`),
  ADD CONSTRAINT `dat_phong_dich_vu_ibfk_2` FOREIGN KEY (`ma_dich_vu`) REFERENCES `dich_vu_phong` (`ma_dich_vu`);

ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_dat_phong`) REFERENCES `dat_phong` (`ma_dat_phong`);

ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`ma_loai_phong`) REFERENCES `loai_phong` (`ma_loai_phong`);
COMMIT;
