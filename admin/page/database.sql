CREATE TABLE LoaiPhong (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    TenLoai VARCHAR(225) NULL,
    MoTaLoai VARCHAR(225) NULL,
    GiaPhongChung DECIMAL(10, 2)
);

CREATE TABLE Phong (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    TenPhong VARCHAR(20) NULL,
    ViTriPhong VARCHAR(225) NULL,
    TrangThaiPhong VARCHAR(225) NULL,
    AnhPhong Varchar(225) NULL,
    SoLuongDichVu INT,
    TongGiaDichVu DECIMAL(10, 2),
    ThuocLoaiPhong INT, 
    FOREIGN KEY (ThuocLoaiPhong) REFERENCES LoaiPhong(ID)
);

CREATE TABLE DichVuPhong (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    TenDichVu VARCHAR(225) NULL,
    GiaDichVu DECIMAL(10,2) NULL
);

CREATE TABLE GanDichVuPhong (
    IDPhong INT,
    IDDichVuPhong INT,
    FOREIGN KEY (IDPhong) REFERENCES Phong(ID),
    FOREIGN KEY (IDDichVuPhong) REFERENCES DichVuPhong(ID),
    PRIMARY KEY (IDPhong, IDDichVuPhong)
);

--Phần này sẽ còn phải sửa lại, viết hơi lỗi.
CREATE TABLE DatPhong (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    IDKhachHang INT,
    NgayDat DATE,
    NgayCheckIn DATE,
    NgayCheckOut DATE,
    SoNguoiLon INT,
    SoTreEm INT,
    TienPhongChuaDichVu DECIMAL(10, 2),                                                                           
    DaThanhToan BOOLEAN,
    IDPhong INT,
    FOREIGN KEY (IDKhachHang) REFERENCES KhachHang(ID),
    FOREIGN KEY (IDPhong) REFERENCES Phong(ID)
);

CREATE TABLE KhachHang (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Email VARCHAR(255) UNIQUE NOT NULL,
    TenDangNhap VARCHAR(50) NOT NULL,
    MatKhau VARCHAR(50) NOT NULL,
    NgaySinh DATE,
    DiaChi VARCHAR(225) NULL,
    HinhAnhXacMinh VARCHAR(225) NULL
);

-- Bảng LoaiPhong
INSERT INTO LoaiPhong (ID, TenLoai, MoTaLoai, GiaPhongChung)
VALUES (1, 'Phòng Standard', 'Phòng tiêu chuẩn', 100.00),
       (2, 'Phòng Deluxe', 'Phòng sang trọng', 150.00);

-- Bảng Phong
INSERT INTO Phong (ID, TenPhong, ViTriPhong, TrangThaiPhong, AnhPhong, SoLuongDichVu, TongGiaDichVu, ThuocLoaiPhong)
VALUES (101, '101A', 'Tầng 1', 'Trống', 'path/to/image1.jpg', 3, 50.00, 1),
       (102, '202B', 'Tầng 2', 'Đang ở', 'path/to/image2.jpg', 2, 30.00, 2);

-- Bảng DichVuPhong
INSERT INTO DichVuPhong (ID, TenDichVu, GiaDichVu)
VALUES (1, 'Dịch vụ Wifi', 5.00),
       (2, 'Dịch vụ đồ ăn sáng', 10.00);

-- Bảng GanDichVuPhong
INSERT INTO GanDichVuPhong (IDPhong, IDDichVuPhong)
VALUES (101, 1),
       (102, 2);

