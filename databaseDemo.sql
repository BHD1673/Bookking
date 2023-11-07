-- Bảng người dùng (users)
CREATE TABLE users (
    id INT PRIMARY KEY,
    full_name VARCHAR(255),
    email VARCHAR(255),
    numberphone VARCHAR(15),
    password VARCHAR(255),
    role INT,
    created_at TIMESTAMP,
    cmnd VARCHAR(12),
    gender INT,
    address VARCHAR(255)
);

-- Bảng danh mục (categories)
CREATE TABLE categories (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    created_id INT,
    created_at TIMESTAMP,
    FOREIGN KEY (created_id) REFERENCES users(id)
);

-- Bảng sản phẩm hoặc dịch vụ (productions)
CREATE TABLE productions (
    id INT PRIMARY KEY,
    category_id INT,
    created_id INT,
    name VARCHAR(255),
    title VARCHAR(255),
    image_url VARCHAR(255),
    quantity INT,
    price DECIMAL(10, 2),
    description TEXT,
    thumbnail_url VARCHAR(255),
    status INT,
    created_at TIMESTAMP,
    views INT,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (created_id) REFERENCES users(id)
);

-- Bảng dịch vụ (service)
CREATE TABLE service (
    id INT PRIMARY KEY,
    created_id INT,
    name VARCHAR(255),
    price DECIMAL(10, 2),
    description TEXT,
    created_at TIMESTAMP,
    image_url VARCHAR(255),
    FOREIGN KEY (created_id) REFERENCES users(id)
);

-- Bảng hóa đơn (bill)
CREATE TABLE bill (
    id INT PRIMARY KEY,
    created_id INT,
    FOREIGN KEY (created_id) REFERENCES users(id)
);

-- Bảng chi tiết hóa đơn (bill_details)
CREATE TABLE bill_details (
    id INT PRIMARY KEY,
    bill_id INT,
    product_id INT,
    check_in_date DATE,
    check_out_date DATE,
    total_money DECIMAL(10, 2),
    full_name VARCHAR(255),
    email VARCHAR(255),
    address VARCHAR(255),
    numberphone VARCHAR(15),
    FOREIGN KEY (bill_id) REFERENCES bill(id),
    FOREIGN KEY (product_id) REFERENCES productions(id)
);

-- Bảng bình luận (comments)
CREATE TABLE comments (
    id INT PRIMARY KEY,
    created_id INT,
    product_id INT,
    description TEXT,
    created_at TIMESTAMP,
    FOREIGN KEY (created_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES productions(id)
);
