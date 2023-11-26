
CREATE TABLE `phong` (
  `ID` int NOT NULL,
  `TenPhong` varchar(20) DEFAULT NULL,
  `ViTriPhong` varchar(225) DEFAULT NULL,
  `TrangThaiPhong` varchar(225) DEFAULT NULL,
  `AnhPhong` varchar(225) DEFAULT NULL,
  `ThuocLoaiPhong` int DEFAULT NULL
);


INSERT INTO `phong` (`ID`, `TenPhong`, `ViTriPhong`, `TrangThaiPhong`, `AnhPhong`, `ThuocLoaiPhong`) VALUES
(102, '202B', 'Tầng 2', 'Đang ở', 'image2.jpg', 2),
(103, '301A', 'Tầng 3', 'Trống', NULL, 1),
(104, '102B', 'Tầng 1', 'Đang ở', NULL, 2),
(105, '401A', 'Tầng 4', 'Trống', 'image4.jpg', 1),
(106, 'VIP001', 'Tầng VIP', 'Trống', 'vip_room.jpg', 3),
(107, '201C', 'Tầng 2', 'Đang ở', NULL, 1),
(108, '103A', 'Tầng 1', 'Trống', NULL, 2),
(109, '301A', 'Tầng 3', 'Trống', NULL, 1),
(110, '102B', 'Tầng 1', 'Đang ở', NULL, 2),
(111, '401A', 'Tầng 4', 'Trống', 'image4.jpg', 1),
(112, 'VIP001', 'Tầng VIP', 'Trống', 'vip_room.jpg', 3),
(113, '201C', 'Tầng 2', 'Đang ở', NULL, 1),
(114, '103A', 'Tầng 1', 'Trống', NULL, 2);

ALTER TABLE `phong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ThuocLoaiPhong` (`ThuocLoaiPhong`);

ALTER TABLE `phong`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`ThuocLoaiPhong`) REFERENCES `loaiphong` (`ID`);
COMMIT;
