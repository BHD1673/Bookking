-- Table for Room Types
CREATE TABLE LoaiPhong (
    Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,        -- Unique identifier for the room type
    TenLoaiPhong VARCHAR(225) NULL      -- Name of the room type
);

-- Table for Rooms
CREATE TABLE Phong (
    Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, -- Auto-incremented unique identifier for the room
    TenPhong VARCHAR(225) NULL,                  -- Name of the room
    TrangThaiPhong INT DEFAULT 1,                -- Room status (default value: 1)
    LoaiPhongId INT,                             -- Foreign key referencing the room type
    FOREIGN KEY (LoaiPhongId) REFERENCES LoaiPhong(Id) -- Establishing a foreign key relationship
);


/* CREATE TABLE KhachHang (
    Id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    TenKhachHang VARCHAR(225) NULL,
    SinhNhat DATE NULL,
    AnhXacNhan VARCHAR NULL,
    TenPhongId int,
    FOREIGN KEY (TenPhongId) REFERENCES Phong(Id),    
); */

/* CREATE TABLE HoaDon (
    Id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    NgayLapHoaDon DATE
) */
