-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 01:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE `cartdetail` (
  `Id` int(11) NOT NULL,
  `cartID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `Id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`Id`, `userID`, `createdDate`) VALUES
(1, 9, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `Id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`Id`, `categoryName`, `description`, `icon`) VALUES
(1, 'Rolex', 'Luxury watches from Switzerland.', 'Rolex.png'),
(2, 'Omega', 'High-precision watches from Switzerland.', 'Omega.png'),
(3, 'Tag Heuer', 'Sporty and elegant watches from Switzerland.', 'TagHeuer.png'),
(4, 'Casio', 'Affordable and reliable watches from Japan.', 'Casio.png'),
(5, 'Seiko', 'Innovative and stylish watches from Japan.', 'Seiko.png'),
(6, 'Citizen', 'Eco-friendly and durable watches from Japan.', 'Citizen.png'),
(7, 'Tissot', 'Swiss watches with a long tradition.', 'Tissot.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Id` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `commentText` text NOT NULL,
  `commentDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `Id` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `orderDate` datetime NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productdetail`
--

CREATE TABLE `productdetail` (
  `Id` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productdetail`
--

INSERT INTO `productdetail` (`Id`, `productID`, `description`, `material`, `size`, `color`) VALUES
(1, 1, 'The Rolex Submariner is the classic dive watch.', 'Steel', '40mm', 'Black'),
(2, 2, 'The Rolex Daytona is the ultimate chronograph.', 'Steel and Gold', '40mm', 'White'),
(3, 3, 'The Omega Seamaster is a professional diver\'s watch.', 'Steel', '42mm', 'Blue'),
(4, 4, 'The Omega Speedmaster is the first watch on the moon.', 'Steel', '42mm', 'Black'),
(5, 5, 'The Tag Heuer Carrera is an iconic racing watch.', 'Steel', '43mm', 'Black'),
(6, 6, 'The Tag Heuer Monaco is known for its square case.', 'Steel', '39mm', 'Blue'),
(7, 7, 'The Casio G-Shock is known for its durability.', 'Resin', '50mm', 'Black'),
(8, 8, 'The Casio Edifice combines style and functionality.', 'Steel', '45mm', 'Blue'),
(9, 9, 'The Seiko Presage offers timeless elegance.', 'Steel', '40mm', 'White'),
(10, 10, 'The Seiko Prospex is designed for adventure.', 'Steel', '44mm', 'Black'),
(11, 11, 'The Citizen Eco-Drive harnesses light to power the watch.', 'Steel', '42mm', 'Black'),
(12, 12, 'The Citizen Promaster is designed for professionals.', 'Steel', '44mm', 'Silver'),
(13, 13, 'The Tissot Le Locle is named after the Swiss town where it was founded.', 'Steel', '39mm', 'Silver'),
(14, 14, 'The Tissot PRX combines vintage design with modern technology.', 'Steel', '40mm', 'Blue'),
(15, 15, 'The Rolex Oyster Perpetual is a timeless classic.', 'Steel', '41mm', 'Silver'),
(16, 16, 'The Omega Constellation is known for its star design.', 'Steel', '38mm', 'Blue'),
(17, 17, 'The Tag Heuer Aquaracer is perfect for underwater adventures.', 'Steel', '43mm', 'Black'),
(18, 18, 'The Casio Baby-G is a durable and stylish watch for women.', 'Resin', '45mm', 'Pink'),
(19, 19, 'The Seiko Astron is the world\'s first GPS solar watch.', 'Steel', '42mm', 'Black'),
(20, 20, 'The Citizen Chronomaster is known for its precision.', 'Steel', '42mm', 'White'),
(21, 21, 'The Tissot Seastar is a reliable diving watch.', 'Steel', '43mm', 'Black'),
(22, 22, 'The Rolex Explorer is built for adventure.', 'Steel', '39mm', 'Black'),
(23, 23, 'The Omega Planet Ocean is a robust diving watch.', 'Steel', '45mm', 'Orange'),
(24, 24, 'The Tag Heuer Link combines elegance with performance.', 'Steel', '42mm', 'Silver'),
(25, 25, 'The Casio Pro Trek is designed for outdoor enthusiasts.', 'Resin', '50mm', 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `Id` int(11) NOT NULL,
  `path` varchar(350) NOT NULL,
  `sortOrder` int(11) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`Id`, `path`, `sortOrder`, `productId`) VALUES
(1, 'img1.jpg', 1, 1),
(2, 'img2.jpg', 2, 1),
(3, 'img3.jpg', 3, 1),
(4, 'img4.jpg', 4, 1),
(5, 'img1.jpg', 1, 2),
(6, 'img2.jpg', 2, 2),
(7, 'img3.jpg', 3, 2),
(8, 'img4.jpg', 4, 2),
(9, 'img1.jpg', 1, 3),
(10, 'img2.jpg', 2, 3),
(11, 'img3.jpg', 3, 3),
(12, 'img4.jpg', 4, 3),
(13, 'img1.jpg', 1, 4),
(14, 'img2.jpg', 2, 4),
(15, 'img3.jpg', 3, 4),
(16, 'img4.jpg', 4, 4),
(17, 'img1.jpg', 1, 5),
(18, 'img2.jpg', 2, 5),
(19, 'img3.jpg', 3, 5),
(20, 'img4.jpg', 4, 5),
(21, 'img1.jpg', 1, 6),
(22, 'img2.jpg', 2, 6),
(23, 'img3.jpg', 3, 6),
(24, 'img4.jpg', 4, 6),
(25, 'img1.jpg', 1, 7),
(26, 'img2.jpg', 2, 7),
(27, 'img3.jpg', 3, 7),
(28, 'img4.jpg', 4, 7),
(29, 'img1.jpg', 1, 8),
(30, 'img2.jpg', 2, 8),
(31, 'img3.jpg', 3, 8),
(32, 'img4.jpg', 4, 8),
(33, 'img1.jpg', 1, 9),
(34, 'img2.jpg', 2, 9),
(35, 'img3.jpg', 3, 9),
(36, 'img4.jpg', 4, 9),
(37, 'img1.jpg', 1, 10),
(38, 'img2.jpg', 2, 10),
(39, 'img3.jpg', 3, 10),
(40, 'img4.jpg', 4, 10),
(41, 'img1.jpg', 1, 11),
(42, 'img2.jpg', 2, 11),
(43, 'img3.jpg', 3, 11),
(44, 'img4.jpg', 4, 11),
(45, 'img1.jpg', 1, 12),
(46, 'img2.jpg', 2, 12),
(47, 'img3.jpg', 3, 12),
(48, 'img4.jpg', 4, 12),
(49, 'img1.jpg', 1, 13),
(50, 'img2.jpg', 2, 13),
(51, 'img3.jpg', 3, 13),
(52, 'img4.jpg', 4, 13),
(53, 'img1.jpg', 1, 14),
(54, 'img2.jpg', 2, 14),
(55, 'img3.jpg', 3, 14),
(56, 'img4.jpg', 4, 14),
(57, 'img1.jpg', 1, 15),
(58, 'img2.jpg', 2, 15),
(59, 'img3.jpg', 3, 15),
(60, 'img4.jpg', 4, 15),
(61, 'img1.jpg', 1, 16),
(62, 'img2.jpg', 2, 16),
(63, 'img3.jpg', 3, 16),
(64, 'img4.jpg', 4, 16),
(65, 'img1.jpg', 1, 17),
(66, 'img2.jpg', 2, 17),
(67, 'img3.jpg', 3, 17),
(68, 'img4.jpg', 4, 17),
(69, 'img1.jpg', 1, 18),
(70, 'img2.jpg', 2, 18),
(71, 'img3.jpg', 3, 18),
(72, 'img4.jpg', 4, 18),
(73, 'img1.jpg', 1, 19),
(74, 'img2.jpg', 2, 19),
(75, 'img3.jpg', 3, 19),
(76, 'img4.jpg', 4, 19),
(77, 'img1.jpg', 1, 20),
(78, 'img2.jpg', 2, 20),
(79, 'img3.jpg', 3, 20),
(80, 'img4.jpg', 4, 20),
(81, 'img1.jpg', 1, 21),
(82, 'img2.jpg', 2, 21),
(83, 'img3.jpg', 3, 21),
(84, 'img4.jpg', 4, 21),
(85, 'img1.jpg', 1, 22),
(86, 'img2.jpg', 2, 22),
(87, 'img3.jpg', 3, 22),
(88, 'img4.jpg', 4, 22),
(89, 'img1.jpg', 1, 23),
(90, 'img2.jpg', 2, 23),
(91, 'img3.jpg', 3, 23),
(92, 'img4.jpg', 4, 23),
(93, 'img1.jpg', 1, 24),
(94, 'img2.jpg', 2, 24),
(95, 'img3.jpg', 3, 24),
(96, 'img4.jpg', 4, 24),
(97, 'img1.jpg', 1, 25),
(98, 'img2.jpg', 2, 25),
(99, 'img3.jpg', 3, 25),
(100, 'img4.jpg', 4, 25);

-- --------------------------------------------------------

--
-- Table structure for table `productpromotion`
--

CREATE TABLE `productpromotion` (
  `Id` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `promotionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `percent` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `productName`, `categoryID`, `price`, `stock`, `percent`, `status`) VALUES
(1, 'Rolex Submariner', 1, 8000.00, 10, NULL, 1),
(2, 'Rolex Daytona', 1, 12000.00, 5, NULL, 1),
(3, 'Omega Seamaster', 2, 6000.00, 8, NULL, 1),
(4, 'Omega Speedmaster', 2, 7000.00, 7, NULL, 1),
(5, 'Tag Heuer Carrera', 3, 5000.00, 12, NULL, 1),
(6, 'Tag Heuer Monaco', 3, 5500.00, 6, NULL, 1),
(7, 'Casio G-Shock', 4, 150.00, 50, NULL, 1),
(8, 'Casio Edifice', 4, 200.00, 40, NULL, 1),
(9, 'Seiko Presage', 5, 400.00, 20, NULL, 1),
(10, 'Seiko Prospex', 5, 600.00, 15, NULL, 1),
(11, 'Citizen Eco-Drive', 6, 350.00, 25, NULL, 1),
(12, 'Citizen Promaster', 6, 450.00, 18, NULL, 1),
(13, 'Tissot Le Locle', 7, 700.00, 10, NULL, 1),
(14, 'Tissot PRX', 7, 650.00, 12, NULL, 1),
(15, 'Rolex Oyster Perpetual', 1, 9000.00, 7, NULL, 1),
(16, 'Omega Constellation', 2, 7500.00, 6, NULL, 1),
(17, 'Tag Heuer Aquaracer', 3, 5200.00, 8, NULL, 1),
(18, 'Casio Baby-G', 4, 100.00, 60, NULL, 1),
(19, 'Seiko Astron', 5, 800.00, 10, NULL, 1),
(20, 'Citizen Chronomaster', 6, 900.00, 5, NULL, 1),
(21, 'Tissot Seastar', 7, 800.00, 8, 5, 1),
(22, 'Rolex Explorer', 1, 10000.00, 4, 30, 1),
(23, 'Omega Planet Ocean', 2, 8500.00, 6, 15, 1),
(24, 'Tag Heuer Link', 3, 6000.00, 7, 10, 1),
(25, 'Casio Pro Trek', 4, 250.00, 30, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `Id` int(11) NOT NULL,
  `promotionCode` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `discount` decimal(5,2) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Id`, `roleName`, `description`) VALUES
(1, 'admin', 'Quản trị hệ thống với quyền truy cập đầy đủ.'),
(2, 'manager', 'Quản lý các hoạt động và người dùng trong hệ thống.'),
(3, 'staff', 'Nhân viên có quyền hạn hạn chế để xử lý các nhiệm vụ cụ thể.'),
(4, 'customer', 'Khách hàng sử dụng dịch vụ và sản phẩm.');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `Id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`Id`, `userID`, `roleID`) VALUES
(4, 6, 4),
(5, 7, 4),
(6, 8, 4),
(7, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `password`, `email`, `createdDate`, `phone`) VALUES
(1, 'ninh', '$2y$10$C7XbNATeEQ3VGBMdVd2rQ.iq3N7tyxb0Emb/nfzJKEpZIloTIk2vO', 'ninh@gmail.com', '2024-07-22 06:47:03', 0),
(2, 'ninh', '$2y$10$B8SUoyMum9tH68xFRZROCuSz1NwXd8d7eFVCcUt74aJ.oy78jGCBW', 'ninhk@gmail.com', '2024-07-22 06:48:24', 0),
(3, 'ninh', '$2y$10$3Ix6mI.NTvXRzJ0lR3xA4OMZDsku3zEKcDtPQVFQdTPYk6iw9S1ai', 'ninhkk@gmai.com', '2024-07-22 06:49:42', 0),
(4, 'ninh', '$2y$10$RN5XUqDIWuWvrBSG.tRfYuiIm9ZlBH49Ocqh5hh7p3RHVA1etYkpy', 'ninhkkk@gmai.com', '2024-07-22 06:52:01', 0),
(5, 'ninh', '$2y$10$.c9uebT0N/jfhxraeGf4qOXuiP/LXhcMCwDGUPAPEThQjA4HuDswe', 'ninhkki@gmai.com', '2024-07-22 06:56:31', 0),
(6, 'ninh', '$2y$10$25sGGkgSxnP/IFvCRAepBuvaHEmyVtmWvgmO6x84n0nbm0LuLD34W', 'ninhkkdi@gmai.com', '2024-07-22 06:59:13', 0),
(7, 'ninh', '$2y$10$k0n6T8tR.qKaCdAFarfhiOdoBqoDg5BzfAlXSAzT.k32WgqpuFbdG', 'qweqwe@gmail.com', '2024-07-22 09:15:19', 0),
(8, 'qwe', '$2y$10$CDnRtX2kXUEorul8nUi2t.1L.PfCVPldVKdw7OqnkqxiTq8yQAG7S', 'qwe@gmail.com', '2024-07-22 11:49:52', 0),
(9, 'ninh', '$2y$10$ezbl.ar3G2ehOl3qcdMEheL.rAf.Eg7bh/yQAgd2Fb9cfFLHzZLSC', 'ert@gmail.com', '2024-07-22 11:53:41', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cartID` (`cartID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `productID` (`productID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `productID` (`productID`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `productpromotion`
--
ALTER TABLE `productpromotion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `productID` (`productID`),
  ADD KEY `promotionID` (`promotionID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `roleName` (`roleName`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `userID` (`userID`,`roleID`),
  ADD KEY `roleID` (`roleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartdetail`
--
ALTER TABLE `cartdetail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `productpromotion`
--
ALTER TABLE `productpromotion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartdetail_ibfk_1` FOREIGN KEY (`cartID`) REFERENCES `carts` (`Id`),
  ADD CONSTRAINT `cartdetail_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`Id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`Id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`Id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`Id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`Id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`Id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`Id`);

--
-- Constraints for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `productdetail_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`Id`);

--
-- Constraints for table `productimages`
--
ALTER TABLE `productimages`
  ADD CONSTRAINT `productId` FOREIGN KEY (`productId`) REFERENCES `products` (`Id`);

--
-- Constraints for table `productpromotion`
--
ALTER TABLE `productpromotion`
  ADD CONSTRAINT `productpromotion_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`Id`),
  ADD CONSTRAINT `productpromotion_ibfk_2` FOREIGN KEY (`promotionID`) REFERENCES `promotions` (`Id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categorys` (`Id`);

--
-- Constraints for table `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `userrole_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `userrole_ibfk_2` FOREIGN KEY (`roleID`) REFERENCES `roles` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
