CREATE TABLE `datphong` (
  `ID` int NOT NULL,
  `IDKhachHang` int DEFAULT NULL,
  `IDGanPhong` int DEFAULT NULL,
  `NgayCheckIn` date DEFAULT NULL,
  `NgayCheckOut` date DEFAULT NULL,
  `SoNgayO` int DEFAULT NULL,
  `TongTien` decimal(10,3) DEFAULT NULL,
  `TienCoc` decimal(10,3) DEFAULT NULL,
  `TrangThaiDon` varchar(225) DEFAULT NULL
);


INSERT INTO `datphong` (`ID`, `IDKhachHang`, `IDGanPhong`, `NgayCheckIn`, `NgayCheckOut`, `SoNgayO`, `TongTien`, `TienCoc`, `TrangThaiDon`) VALUES
(1, 4, 4, '2023-01-01', '2023-01-03', 3, 300.000, 90.000, '0'),
(3, 3, 5, '2023-02-01', '2023-02-05', 5, 300.000, 90.000, '0'),
(7, 1, 1, '2023-01-01', '2023-01-05', 5, 500.000, 150.000, '2'),
(8, 2, 2, '2023-02-10', '2023-02-15', 5, 500.000, 150.000, '1');


CREATE TABLE `ganphong` (
  `ID` int NOT NULL,
  `IDDatPhong` int DEFAULT NULL,
  `IDPhong` int DEFAULT NULL
);


INSERT INTO `ganphong` (`ID`, `IDDatPhong`, `IDPhong`) VALUES
(1, 7, 1),
(2, 8, 3),
(4, 1, 2),
(5, 3, 3);


CREATE TABLE `khachhang` (
  `ID` int NOT NULL,
  `TenKhachHang` varchar(225) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChiNha` text,
  `AnhXacNhan` text,
  `Email` varchar(225) DEFAULT NULL,
  `TenDangNhap` varchar(225) DEFAULT NULL,
  `MatKhau` varchar(225) DEFAULT NULL
);


INSERT INTO `khachhang` (`ID`, `TenKhachHang`, `NgaySinh`, `DiaChiNha`, `AnhXacNhan`, `Email`, `TenDangNhap`, `MatKhau`) VALUES
(1, 'John Doe', '1990-01-15', '123 Đường Chính, Thành Phố A', 'duong_dan_anh.jpg', 'john.doe@example.com', 'john_doe', 'password123'),
(2, 'Jane Smith', '1985-05-20', '456 Đường Sồi, Thị Xã B', 'duong_dan_anh.jpg', 'jane.smith@example.com', 'jane_smith', 'pass456'),
(3, 'John Doe', '1990-01-15', '123 Đường Chính, Thành Phố A', 'duong_dan_anh.jpg', 'john.doe@example.com', 'john_doe', 'password123'),
(4, 'Jane Smith', '1985-05-20', '456 Đường Sồi, Thị Xã B', 'duong_dan_anh.jpg', 'jane.smith@example.com', 'jane_smith', 'pass456'),
(5, 'John Doe', '1990-01-01', '123 Main Street', 'path_to_image.jpg', 'john.doe@email.com', 'john_doe', 'password123'),
(6, 'Jane Smith', '1985-05-15', '456 Oak Avenue', 'path_to_image.jpg', 'jane.smith@email.com', 'jane_smith', 'pass456');



CREATE TABLE `loaiphong` (
  `ID` int NOT NULL,
  `Ten` varchar(225) DEFAULT NULL,
  `MoTa` text,
  `GiaPhongChung` decimal(10,3) DEFAULT NULL
);


INSERT INTO `loaiphong` (`ID`, `Ten`, `MoTa`, `GiaPhongChung`) VALUES
(1, 'Phòng Đơn', 'Một phòng đơn ấm cúng với tầm nhìn tuyệt vời', 75.000),
(2, 'Phòng Đôi', 'Phòng rộng rãi cho hai khách', 100.000),
(3, 'Suite', 'Suite sang trọng với tiện nghi cao cấp', 150.000),
(4, 'Phòng Đơn', 'Một phòng đơn ấm cúng với tầm nhìn tuyệt vời', 75.000),
(5, 'Phòng Đôi', 'Phòng rộng rãi cho hai khách', 100.000),
(6, 'Suite', 'Suite sang trọng với tiện nghi cao cấp', 150.000),
(603, 'Phòng tổng thống ', '2', 3333.000);


CREATE TABLE `phong` (
  `ID` int NOT NULL,
  `TenPhong` varchar(225) DEFAULT NULL,
  `ViTriPhong` varchar(225) DEFAULT NULL,
  `TrangThaiPhong` varchar(50) DEFAULT NULL,
  `AnhPhong` text,
  `ID_LoaiPhong` int DEFAULT NULL
);


INSERT INTO `phong` (`ID`, `TenPhong`, `ViTriPhong`, `TrangThaiPhong`, `AnhPhong`, `ID_LoaiPhong`) VALUES
(1, 'Phòng 101', 'Tầng 1', '1', 'duong_dan_anh1.jpg', 1),
(2, 'Phòng 102', 'Tầng 1', '1', 'duong_dan_anh2.jpg', 1),
(3, 'Phòng 103', 'Tầng 1', '2', 'duong_dan_anh3.jpg', 1),
(4, 'Phòng 201', 'Tầng 2', '2', 'duong_dan_anh1.jpg', 2),
(5, 'Phòng 202', 'Tầng 2', '3', 'duong_dan_anh2.jpg', 2),
(6, 'Phòng 202', 'Tầng 2', '3', 'duong_dan_anh3.jpg', 2),s
(7, 'Phòng 301', 'Tầng 3', '3', 'path_to_image.jpg', 3),
(8, 'Phòng 302', 'Tầng 3', '3', 'path_to_image.jpg', 3);

ALTER TABLE `datphong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDGanPhong` (`IDGanPhong`);

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

ALTER TABLE `ganphong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `khachhang`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

ALTER TABLE `loaiphong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

ALTER TABLE `phong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

ALTER TABLE `datphong`
  ADD CONSTRAINT `datphong_ibfk_1` FOREIGN KEY (`IDGanPhong`) REFERENCES `ganphong` (`ID`);

ALTER TABLE `ganphong`
  ADD CONSTRAINT `FK_Phong` FOREIGN KEY (`IDPhong`) REFERENCES `phong` (`ID`),
  ADD CONSTRAINT `ganphong_ibfk_1` FOREIGN KEY (`IDDatPhong`) REFERENCES `datphong` (`ID`),
  ADD CONSTRAINT `ganphong_ibfk_2` FOREIGN KEY (`IDPhong`) REFERENCES `phong` (`ID`);

ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`ID_LoaiPhong`) REFERENCES `loaiphong` (`ID`);
COMMIT;