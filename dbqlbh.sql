-- Tạo bảng 'categorys'
CREATE TABLE categorys (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(255) NOT NULL,
    description TEXT,
    icon VARCHAR(255) NOT NULL,
);

-- Tạo bảng 'products'
CREATE TABLE products (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    categoryID INT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    imageURL VARCHAR(255),
    percent INT,
    FOREIGN KEY (categoryID) REFERENCES categorys(Id)
);

-- Tạo bảng 'productDetail'
CREATE TABLE productDetail (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    productID INT UNIQUE,
    description TEXT,
    material VARCHAR(255),
    size VARCHAR(255),
    color VARCHAR(255),
    FOREIGN KEY (productID) REFERENCES products(Id)
);

-- Tạo bảng 'users'
CREATE TABLE users (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    createdDate DATETIME NOT NULL
);

-- Tạo bảng 'orders'
CREATE TABLE orders (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    orderDate DATETIME NOT NULL,
    totalAmount DECIMAL(10, 2) NOT NULL,
    status VARCHAR(255) NOT NULL,
    FOREIGN KEY (userID) REFERENCES users(Id)
);

-- Tạo bảng 'orderDetail'
CREATE TABLE orderDetail (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    orderID INT,
    productID INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (orderID) REFERENCES orders(Id),
    FOREIGN KEY (productID) REFERENCES products(Id)
);

-- Tạo bảng 'carts'
CREATE TABLE carts (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    createdDate DATETIME NOT NULL,
    FOREIGN KEY (userID) REFERENCES users(Id)
);

-- Tạo bảng 'cartDetail'
CREATE TABLE cartDetail (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    cartID INT,
    productID INT,
    quantity INT NOT NULL,
    FOREIGN KEY (cartID) REFERENCES carts(Id),
    FOREIGN KEY (productID) REFERENCES products(Id)
);

-- Tạo bảng 'comments'
CREATE TABLE comments (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    productID INT,
    userID INT,
    commentText TEXT NOT NULL,
    commentDate DATETIME NOT NULL,
    FOREIGN KEY (productID) REFERENCES products(Id),
    FOREIGN KEY (userID) REFERENCES users(Id)
);

-- Tạo bảng 'promotions'
CREATE TABLE promotions (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    promotionCode VARCHAR(255) NOT NULL,
    description TEXT,
    discount DECIMAL(5, 2) NOT NULL,
    startDate DATETIME NOT NULL,
    endDate DATETIME NOT NULL,
    status VARCHAR(255) NOT NULL
);

-- Tạo bảng 'productPromotion'
CREATE TABLE productPromotion (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    productID INT,
    promotionID INT,
    FOREIGN KEY (productID) REFERENCES products(Id),
    FOREIGN KEY (promotionID) REFERENCES promotions(Id)
);

-- Tạo bảng 'roles'
CREATE TABLE roles (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    roleName VARCHAR(255) NOT NULL UNIQUE,
    description TEXT
);

-- Tạo bảng 'userRole'
CREATE TABLE userRole (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    roleID INT,
    FOREIGN KEY (userID) REFERENCES users(Id),
    FOREIGN KEY (roleID) REFERENCES roles(Id),
    UNIQUE (userID, roleID) -- Đảm bảo rằng mỗi người dùng chỉ có một vai trò cụ thể một lần
);

-- Chèn dữ liệu vào bảng 'categorys'
INSERT INTO categorys (categoryName, description, icon) VALUES
('Rolex', 'Luxury watches from Switzerland.', "Rolex.png"),
('Omega', 'High-precision watches from Switzerland.', "Omega.png"),
('Tag Heuer', 'Sporty and elegant watches from Switzerland.', "TagHeuer.png"),
('Casio', 'Affordable and reliable watches from Japan.', "Casio.png"),
('Seiko', 'Innovative and stylish watches from Japan.', "Seiko.png"),
('Citizen', 'Eco-friendly and durable watches from Japan.', "Citizen.png"),
('Tissot', 'Swiss watches with a long tradition.', "Tissot.png");

-- Chèn dữ liệu vào bảng 'products'
INSERT INTO products (productName, categoryID, price, stock, imageURL) VALUES
('Rolex Submariner', 1, 8000.00, 10, 'https://example.com/rolex_submariner.jpg'),
('Rolex Daytona', 1, 12000.00, 5, 'https://example.com/rolex_daytona.jpg'),
('Omega Seamaster', 2, 6000.00, 8, 'https://example.com/omega_seamaster.jpg'),
('Omega Speedmaster', 2, 7000.00, 7, 'https://example.com/omega_speedmaster.jpg'),
('Tag Heuer Carrera', 3, 5000.00, 12, 'https://example.com/tag_heuer_carrera.jpg'),
('Tag Heuer Monaco', 3, 5500.00, 6, 'https://example.com/tag_heuer_monaco.jpg'),
('Casio G-Shock', 4, 150.00, 50, 'https://example.com/casio_gshock.jpg'),
('Casio Edifice', 4, 200.00, 40, 'https://example.com/casio_edifice.jpg'),
('Seiko Presage', 5, 400.00, 20, 'https://example.com/seiko_presage.jpg'),
('Seiko Prospex', 5, 600.00, 15, 'https://example.com/seiko_prospex.jpg'),
('Citizen Eco-Drive', 6, 350.00, 25, 'https://example.com/citizen_ecodrive.jpg'),
('Citizen Promaster', 6, 450.00, 18, 'https://example.com/citizen_promaster.jpg'),
('Tissot Le Locle', 7, 700.00, 10, 'https://example.com/tissot_lelocle.jpg'),
('Tissot PRX', 7, 650.00, 12, 'https://example.com/tissot_prx.jpg'),
('Rolex Oyster Perpetual', 1, 9000.00, 7, 'https://example.com/rolex_oyster.jpg'),
('Omega Constellation', 2, 7500.00, 6, 'https://example.com/omega_constellation.jpg'),
('Tag Heuer Aquaracer', 3, 5200.00, 8, 'https://example.com/tag_heuer_aquaracer.jpg'),
('Casio Baby-G', 4, 100.00, 60, 'https://example.com/casio_babyg.jpg'),
('Seiko Astron', 5, 800.00, 10, 'https://example.com/seiko_astron.jpg'),
('Citizen Chronomaster', 6, 900.00, 5, 'https://example.com/citizen_chronomaster.jpg'),
('Tissot Seastar', 7, 800.00, 8, 'https://example.com/tissot_seastar.jpg'),
('Rolex Explorer', 1, 10000.00, 4, 'https://example.com/rolex_explorer.jpg'),
('Omega Planet Ocean', 2, 8500.00, 6, 'https://example.com/omega_planet_ocean.jpg'),
('Tag Heuer Link', 3, 6000.00, 7, 'https://example.com/tag_heuer_link.jpg'),
('Casio Pro Trek', 4, 250.00, 30, 'https://example.com/casio_pro_trek.jpg');

-- Chèn dữ liệu vào bảng 'productDetail'
INSERT INTO productDetail (productID, description, material, size, color) VALUES
(1, 'The Rolex Submariner is the classic dive watch.', 'Steel', '40mm', 'Black'),
(2, 'The Rolex Daytona is the ultimate chronograph.', 'Steel and Gold', '40mm', 'White'),
(3, 'The Omega Seamaster is a professional diver\'s watch.', 'Steel', '42mm', 'Blue'),
(4, 'The Omega Speedmaster is the first watch on the moon.', 'Steel', '42mm', 'Black'),
(5, 'The Tag Heuer Carrera is an iconic racing watch.', 'Steel', '43mm', 'Black'),
(6, 'The Tag Heuer Monaco is known for its square case.', 'Steel', '39mm', 'Blue'),
(7, 'The Casio G-Shock is known for its durability.', 'Resin', '50mm', 'Black'),
(8, 'The Casio Edifice combines style and functionality.', 'Steel', '45mm', 'Blue'),
(9, 'The Seiko Presage offers timeless elegance.', 'Steel', '40mm', 'White'),
(10, 'The Seiko Prospex is designed for adventure.', 'Steel', '44mm', 'Black'),
(11, 'The Citizen Eco-Drive harnesses light to power the watch.', 'Steel', '42mm', 'Black'),
(12, 'The Citizen Promaster is designed for professionals.', 'Steel', '44mm', 'Silver'),
(13, 'The Tissot Le Locle is named after the Swiss town where it was founded.', 'Steel', '39mm', 'Silver'),
(14, 'The Tissot PRX combines vintage design with modern technology.', 'Steel', '40mm', 'Blue'),
(15, 'The Rolex Oyster Perpetual is a timeless classic.', 'Steel', '41mm', 'Silver'),
(16, 'The Omega Constellation is known for its star design.', 'Steel', '38mm', 'Blue'),
(17, 'The Tag Heuer Aquaracer is perfect for underwater adventures.', 'Steel', '43mm', 'Black'),
(18, 'The Casio Baby-G is a durable and stylish watch for women.', 'Resin', '45mm', 'Pink'),
(19, 'The Seiko Astron is the world\'s first GPS solar watch.', 'Steel', '42mm', 'Black'),
(20, 'The Citizen Chronomaster is known for its precision.', 'Steel', '42mm', 'White'),
(21, 'The Tissot Seastar is a reliable diving watch.', 'Steel', '43mm', 'Black'),
(22, 'The Rolex Explorer is built for adventure.', 'Steel', '39mm', 'Black'),
(23, 'The Omega Planet Ocean is a robust diving watch.', 'Steel', '45mm', 'Orange'),
(24, 'The Tag Heuer Link combines elegance with performance.', 'Steel', '42mm', 'Silver'),
(25, 'The Casio Pro Trek is designed for outdoor enthusiasts.', 'Resin', '50mm', 'Green');

-- Chèn dữ liệu vào bảng 'roles'
INSERT INTO roles (roleName, description) VALUES
('admin', 'Quản trị hệ thống với quyền truy cập đầy đủ.'),
('manager', 'Quản lý các hoạt động và người dùng trong hệ thống.'),
('staff', 'Nhân viên có quyền hạn hạn chế để xử lý các nhiệm vụ cụ thể.'),
('customer', 'Khách hàng sử dụng dịch vụ và sản phẩm.');