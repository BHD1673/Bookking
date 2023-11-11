-- Bảng cho Danh mục Phòng
CREATE TABLE loai_phong (
    ma_loai_phong INT PRIMARY KEY AUTO_INCREMENT,
    ten_loai_phong VARCHAR(50) NOT NULL,
    ty_le_giam_gia DECIMAL(5, 2) DEFAULT 0.00
);

-- Bảng cho Phòng
CREATE TABLE phong (
    ma_phong INT PRIMARY KEY AUTO_INCREMENT,
    so_phong VARCHAR(10) NOT NULL,
    loai_phong VARCHAR(50) NOT NULL,
    gia DECIMAL(10, 2) NOT NULL,
    tinh_trang BOOLEAN DEFAULT true,
    ma_loai_phong INT,
    FOREIGN KEY (ma_loai_phong) REFERENCES loai_phong(ma_loai_phong)
);

-- Bảng cho Dịch vụ Phòng
CREATE TABLE dich_vu_phong (
    ma_dich_vu INT PRIMARY KEY AUTO_INCREMENT,
    ten_dich_vu VARCHAR(50) NOT NULL,
    gia DECIMAL(10, 2) NOT NULL
);

-- Bảng cho Khách Hàng
CREATE TABLE khach_hang (
    ma_khach_hang INT PRIMARY KEY AUTO_INCREMENT,
    ten_khach_hang VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    so_dien_thoai VARCHAR(20) NOT NULL
);

-- Bảng cho Đặt Phòng
CREATE TABLE dat_phong (
    ma_dat_phong INT PRIMARY KEY AUTO_INCREMENT,
    ma_phong INT,
    ma_khach_hang INT,
    ngay_checkin DATE NOT NULL,
    ngay_checkout DATE NOT NULL,
    so_nguoi_o INT NOT NULL,
    hinh_anh TEXT, -- Dùng kiểu TEXT để lưu trữ đường dẫn đến hình ảnh
    so_tien_dat_coc DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (ma_phong) REFERENCES phong(ma_phong),
    FOREIGN KEY (ma_khach_hang) REFERENCES khach_hang(ma_khach_hang)
);

-- Bảng cho Hóa đơn
CREATE TABLE hoa_don (
    ma_hoa_don INT PRIMARY KEY AUTO_INCREMENT,
    ma_dat_phong INT,
    tong_tien DECIMAL(10, 2) NOT NULL,
    trang_thai_thanhtoan BOOLEAN DEFAULT false,
    FOREIGN KEY (ma_dat_phong) REFERENCES dat_phong(ma_dat_phong)
);

-- Bảng nối cho Dịch vụ Phòng trong một Đặt Phòng
CREATE TABLE dat_phong_dich_vu (
    ma_dat_phong INT,
    ma_dich_vu INT,
    PRIMARY KEY (ma_dat_phong, ma_dich_vu),
    FOREIGN KEY (ma_dat_phong) REFERENCES dat_phong(ma_dat_phong),
    FOREIGN KEY (ma_dich_vu) REFERENCES dich_vu_phong(ma_dich_vu)
);