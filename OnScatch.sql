CREATE TABLE LoaiPhong (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Ten VARCHAR(225),
    MoTa TEXT,
    GiaPhongChung DECIMAL(10,3)
);

CREATE TABLE Phong (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    TenPhong VARCHAR(225),
    ViTriPhong VARCHAR(225),
    TrangThaiPhong VARCHAR(50),
    AnhPhong TEXT,
    ID_LoaiPhong INT,
    FOREIGN KEY (ID_LoaiPhong) REFERENCES LoaiPhong(ID)
);

CREATE TABLE KhachHang (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    TenKhachHang VARCHAR(225) NULL,
    NgaySinh DATE NULL,
    DiaChiNha TEXT,
    AnhXacNhan TEXT,
    Email VARCHAR(225) NULL,
    TenDangNhap VARCHAR(225) NULL,
    MatKhau VARCHAR(225) NULL
);

CREATE TABLE DatPhong (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    IDKhachHang INT,
    IDGanPhong INT,
    NgayCheckIn DATE NULL,
    NgayCheckOut DATE NULL,
    TongTien DECIMAL(10,3),
    TienCoc DECIMAL(10,3),
    TrangThaiDon VARCHAR(225)
);

CREATE TABLE GanPhong (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    IDDatPhong INT,
    IDPhong INT,
    FOREIGN KEY (IDDatPhong) REFERENCES DatPhong(ID),
    FOREIGN KEY (IDPhong) REFERENCES Phong(ID)
);

-- Add the foreign key constraint for DatPhong after GanPhong is created
ALTER TABLE DatPhong
ADD FOREIGN KEY (IDGanPhong) REFERENCES GanPhong(ID);

-- Thêm vào bảng LoaiPhong
INSERT INTO LoaiPhong (Ten, MoTa, GiaPhongChung)
VALUES ('Phòng Đơn', 'Một phòng đơn ấm cúng với tầm nhìn tuyệt vời', 75.00),
       ('Phòng Đôi', 'Phòng rộng rãi cho hai khách', 100.00),
       ('Suite', 'Suite sang trọng với tiện nghi cao cấp', 150.00);

-- Thêm vào bảng Phong
INSERT INTO Phong (TenPhong, ViTriPhong, TrangThaiPhong, AnhPhong, ID_LoaiPhong)
VALUES ('Phòng 101', 'Tầng 1', 'Còn trống', 'duong_dan_anh1.jpg', 1),
       ('Phòng 202', 'Tầng 2', 'Đang sử dụng', 'duong_dan_anh2.jpg', 2),
       ('Suite A', 'Tầng 3', 'Đã đặt trước', 'duong_dan_anh3.jpg', 3);

-- Thêm vào bảng KhachHang
INSERT INTO KhachHang (TenKhachHang, NgaySinh, DiaChiNha, AnhXacNhan, Email, TenDangNhap, MatKhau)
VALUES ('John Doe', '1990-01-15', '123 Đường Chính, Thành Phố A', 'duong_dan_anh.jpg', 'john.doe@example.com', 'john_doe', 'password123'),
       ('Jane Smith', '1985-05-20', '456 Đường Sồi, Thị Xã B', 'duong_dan_anh.jpg', 'jane.smith@example.com', 'jane_smith', 'pass456');

-- Thêm vào bảng DatPhong
INSERT INTO DatPhong (IDKhachHang, IDGanPhong, NgayCheckIn, NgayCheckOut, TongTien, TienCoc, TrangThaiDon)
VALUES (1, 1, '2023-01-01', '2023-01-05', 375.00, 50.00, 'Xác nhận'),
       (2, 2, '2023-02-10', '2023-02-15', 500.00, 75.00, 'Chờ xác nhận');

-- Thêm vào bảng GanPhong
INSERT INTO GanPhong (IDDatPhong, IDPhong)
VALUES (1, 1),
       (2, 2);
