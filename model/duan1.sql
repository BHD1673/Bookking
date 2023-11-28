CREATE TABLE `dichvuphong` (
  `ID` int NOT NULL,
  `TenDichVu` varchar(225) DEFAULT NULL,
  `GiaDichVu` decimal(10,2) DEFAULT NULL
);

INSERT INTO `dichvuphong` (`ID`, `TenDichVu`, `GiaDichVu`) VALUES
(1, 'Dịch vụ Wifi', 5.00),
(2, 'Dịch vụ đồ ăn sáng', 10.00);


CREATE TABLE `gandichvuphong` (
  `IDPhong` int NOT NULL,
  `IDDichVuPhong` int NOT NULL
);

INSERT INTO `gandichvuphong` (`IDPhong`, `IDDichVuPhong`) VALUES
(102, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `ID` int NOT NULL,
  `TenLoai` varchar(225) DEFAULT NULL,
  `MoTaLoai` varchar(225) DEFAULT NULL,
  `GiaPhongChung` decimal(10,2) DEFAULT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`ID`, `TenLoai`, `MoTaLoai`, `GiaPhongChung`) VALUES
(1, 'Phòng Standard', 'Phòng tiêu chuẩn', 100.00),
(2, 'Phòng Deluxe', 'Phòng sang trọng', 150.00),
(3, 'Phòng VIP 2', 'Hơi cao tí, hỏng thang máy lú luôn', 150000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `ID` int NOT NULL,
  `TenPhong` varchar(20) DEFAULT NULL,
  `ViTriPhong` varchar(225) DEFAULT NULL,
  `TrangThaiPhong` varchar(225) DEFAULT NULL,
  `AnhPhong` varchar(225) DEFAULT NULL,
  `SoLuongDichVu` int DEFAULT NULL,
  `TongGiaDichVu` decimal(10,2) DEFAULT NULL,
  `ThuocLoaiPhong` int DEFAULT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`ID`, `TenPhong`, `ViTriPhong`, `TrangThaiPhong`, `AnhPhong`, `SoLuongDichVu`, `TongGiaDichVu`, `ThuocLoaiPhong`) VALUES
(102, '202B', 'Tầng 2', 'Đang ở', 'image2.jpg', 2, 30.00, 2),
(103, '301A', 'Tầng 3', 'Trống', NULL, NULL, NULL, 1),
(104, '102B', 'Tầng 1', 'Đang ở', NULL, 1, 15.00, 2),
(105, '401A', 'Tầng 4', 'Trống', 'image4.jpg', NULL, NULL, 1),
(106, 'VIP001', 'Tầng VIP', 'Trống', 'vip_room.jpg', 3, 200.00, 3),
(107, '201C', 'Tầng 2', 'Đang ở', NULL, NULL, NULL, 1),
(108, '103A', 'Tầng 1', 'Trống', NULL, 2, 50.00, 2),
(109, '301A', 'Tầng 3', 'Trống', NULL, NULL, NULL, 1),
(110, '102B', 'Tầng 1', 'Đang ở', NULL, 1, 15.00, 2),
(111, '401A', 'Tầng 4', 'Trống', 'image4.jpg', NULL, NULL, 1),
(112, 'VIP001', 'Tầng VIP', 'Trống', 'vip_room.jpg', 3, 200.00, 3),
(113, '201C', 'Tầng 2', 'Đang ở', NULL, NULL, NULL, 1),
(114, '103A', 'Tầng 1', 'Trống', NULL, 2, 50.00, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dichvuphong`
--
ALTER TABLE `dichvuphong`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `gandichvuphong`
--
ALTER TABLE `gandichvuphong`
  ADD PRIMARY KEY (`IDPhong`,`IDDichVuPhong`),
  ADD KEY `IDDichVuPhong` (`IDDichVuPhong`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
ADD PRIMARY KEY (`ID`),
ADD KEY `ThuocLoaiPhong` (`ThuocLoaiPhong`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dichvuphong`
--
ALTER TABLE `dichvuphong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `loaiphong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `phong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

ALTER TABLE `gandichvuphong`
  ADD CONSTRAINT `gandichvuphong_ibfk_1` FOREIGN KEY (`IDPhong`) REFERENCES `phong` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `gandichvuphong_ibfk_2` FOREIGN KEY (`IDDichVuPhong`) REFERENCES `dichvuphong` (`ID`);

ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`ThuocLoaiPhong`) REFERENCES `loaiphong` (`ID`);
COMMIT;