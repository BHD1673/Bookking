
CREATE TABLE `datphong` (
  `ID` int NOT NULL,
  `IDKhachHang` int DEFAULT NULL,
  `NgayCheckIn` date DEFAULT NULL,
  `NgayCheckOut` date DEFAULT NULL,
  `SoNgayO` int DEFAULT NULL,
  `TongSoPhong` int DEFAULT NULL,
  `TongTien` decimal(10,3) DEFAULT NULL,
  `TienCoc` decimal(10,3) DEFAULT NULL,
  `TrangThaiDon` varchar(225) DEFAULT NULL,
  `ThoiGianTao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE `ganphong` (
  `ID` int NOT NULL,
  `IDDatPhong` int DEFAULT NULL,
  `IDPhong` int DEFAULT NULL
);

CREATE TABLE `khachhang` (
  `ID` int NOT NULL,
  `TenKhachHang` varchar(225) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChiNha` text,
  `SoDienThoai` int DEFAULT NULL,
  `AnhXacNhan` text,
  `Email` varchar(225) DEFAULT NULL,
  `TenDangNhap` varchar(225) DEFAULT NULL,
  `MatKhau` varchar(225) DEFAULT NULL,
  `Role` int DEFAULT NULL,
  `ThoiGianTao` datetime DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `loaiphong` (
  `ID` int NOT NULL,
  `Ten` varchar(225) DEFAULT NULL,
  `MoTa` text,
  `GiaPhongChung` decimal(10,3) DEFAULT NULL
);


CREATE TABLE `phong` (
  `ID` int NOT NULL,
  `TenPhong` varchar(225) DEFAULT NULL,
  `ViTriPhong` varchar(225) DEFAULT NULL,
  `TrangThaiPhong` varchar(50) DEFAULT NULL,
  `AnhPhong` text,
  `ID_LoaiPhong` int DEFAULT NULL
);

ALTER TABLE `datphong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_IDKhachHang` (`IDKhachHang`);

ALTER TABLE `ganphong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDDatPhong` (`IDDatPhong`),
  ADD KEY `IDPhong` (`IDPhong`);

ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `phong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_LoaiPhong` (`ID_LoaiPhong`);

ALTER TABLE `datphong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `ganphong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `khachhang`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `loaiphong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `phong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `datphong`
  ADD CONSTRAINT `FK_IDKhachHang` FOREIGN KEY (`IDKhachHang`) REFERENCES `khachhang` (`ID`);

ALTER TABLE `ganphong`
  ADD CONSTRAINT `FK_Phong` FOREIGN KEY (`IDPhong`) REFERENCES `phong` (`ID`),
  ADD CONSTRAINT `ganphong_ibfk_1` FOREIGN KEY (`IDDatPhong`) REFERENCES `datphong` (`ID`),
  ADD CONSTRAINT `ganphong_ibfk_2` FOREIGN KEY (`IDPhong`) REFERENCES `phong` (`ID`);

ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`ID_LoaiPhong`) REFERENCES `loaiphong` (`ID`);
COMMIT;


--Truy vấn tìm khách hàng được tạo gần nhất
SELECT * 
FROM khachhang
ORDER BY ThoiGianTao DESC
LIMIT 1;
