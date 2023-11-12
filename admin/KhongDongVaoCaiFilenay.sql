-- Bảng về Loại Phòng
CREATE TABLE LoaiPhong (
    MaLoaiPhong INT PRIMARY KEY,
    TenLoaiPhong VARCHAR(50) NOT NULL,
    GiaCoBan DECIMAL(10, 2) NOT NULL,
    QuyDinh TEXT,
    PRIMARY KEY (MaLoaiPhong)
);

-- Bảng về Phòng
CREATE TABLE Phong (
    MaPhong INT PRIMARY KEY,
    SoPhong INT NOT NULL,
    MaLoaiPhong INT,
    FOREIGN KEY (MaLoaiPhong) REFERENCES LoaiPhong(MaLoaiPhong),
    PRIMARY KEY (MaPhong)
);

-- Bảng về Dịch Vụ
CREATE TABLE DichVu (
    MaDichVu INT PRIMARY KEY,
    TenDichVu VARCHAR(50) NOT NULL,
    Gia DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (MaDichVu)
);

-- Bảng về Giảm Giá
CREATE TABLE GiamGia (
    MaGiamGia INT PRIMARY KEY,
    TenGiamGia VARCHAR(50) NOT NULL,
    TiLe DECIMAL(5, 2) NOT NULL,
    PRIMARY KEY (MaGiamGia)
);

-- Bảng về Người Dùng
CREATE TABLE NguoiDung (
    MaNguoiDung INT PRIMARY KEY,
    TenNguoiDung VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    MatKhau VARCHAR(100) NOT NULL,
    LaAdmin BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (MaNguoiDung)
);

-- Bảng về Đặt Phòng
CREATE TABLE DatPhong (
    MaDatPhong INT PRIMARY KEY,
    MaNguoiDung INT,
    MaPhong INT,
    SoNguoi INT NOT NULL,
    NgayCheckIn DATE NOT NULL,
    NgayCheckOut DATE NOT NULL,
    NgayDatPhong TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    TongTien DECIMAL(10, 2) NOT NULL,
    DaThanhToan BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (MaDatPhong),
    FOREIGN KEY (MaNguoiDung) REFERENCES NguoiDung(MaNguoiDung),
    FOREIGN KEY (MaPhong) REFERENCES Phong(MaPhong)
);

-- Bảng về Chi Tiết Đặt Phòng (Lưu thông tin về từng người đặt trong một đặt phòng)
CREATE TABLE ChiTietDatPhong (
    MaChiTietDatPhong INT PRIMARY KEY,
    MaDatPhong INT,
    TenKhachHang VARCHAR(50) NOT NULL,
    ThoiGianDen TIME,
    ThoiGianDi TIME,
    PRIMARY KEY (MaChiTietDatPhong),
    FOREIGN KEY (MaDatPhong) REFERENCES DatPhong(MaDatPhong)
);

-- Bảng về Dịch Vụ Đặt Phòng (Liên kết dịch vụ với mỗi đặt phòng)
CREATE TABLE DichVuDatPhong (
    MaDichVuDatPhong INT PRIMARY KEY,
    MaDatPhong INT,
    MaDichVu INT,
    PRIMARY KEY (MaDichVuDatPhong),
    FOREIGN KEY (MaDatPhong) REFERENCES DatPhong(MaDatPhong),
    FOREIGN KEY (MaDichVu) REFERENCES DichVu(MaDichVu)
);

-- Bảng về Giảm Giá Đặt Phòng (Áp dụng giảm giá cho mỗi đặt phòng)
CREATE TABLE GiamGiaDatPhong (
    MaGiamGiaDatPhong INT PRIMARY KEY,
    MaDatPhong INT,
    MaGiamGia INT,
    PRIMARY KEY (MaGiamGiaDatPhong),
    FOREIGN KEY (MaDatPhong) REFERENCES DatPhong(MaDatPhong),
    FOREIGN KEY (MaGiamGia) REFERENCES GiamGia(MaGiamGia)
);

-- Bảng về Bình Luận (Nhận xét)
CREATE TABLE BinhLuan (
    MaBinhLuan INT PRIMARY KEY,
    MaNguoiDung INT,
    NoiDung TEXT,
    NgayBinhLuan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (MaBinhLuan),
    FOREIGN KEY (MaNguoiDung) REFERENCES NguoiDung(MaNguoiDung)
);
