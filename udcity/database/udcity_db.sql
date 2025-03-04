-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 06:44 AM
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
-- Database: `udcity_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `username`, `fname`, `password`) VALUES
(1, 'admin1', 'Phakapon', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `user_id`, `ip_address`, `user_agent`, `login_time`) VALUES
(1, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-03 03:04:51'),
(2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-03 01:09:25'),
(3, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-03 01:13:33'),
(4, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-03 01:24:32'),
(5, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-03 03:15:59'),
(6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-03 04:37:55'),
(7, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-04 05:32:18'),
(8, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-04 05:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `place_img` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `place_name`, `latitude`, `longitude`, `details`, `place_img`, `type_id`, `village_id`) VALUES
(12, 'Central Plaza Udonthani ', 17.40610000, 102.78170000, 'เซ็นทรัลอุดร (เดิมชื่อ เจริญศรีคอมเพล็กซ์ เซ็นทรัลพลาซา อุดรธานี) เป็นศูนย์การค้าที่ตั้งอยู่บนถนนประจักษ์ศิลปาคมอำเภอเมืองอุดรธานีจังหวัดอุดรธานีเซ็นทรัลพัฒนาได้เข้าซื้ออาคารเจริญศรีคอมเพล็กซ์เดิมเมื่อวันที่ 8 เมษายน 2552 [ 5 ] มีแผนการปรับปรุงและขยายอาคารบน พื้นที่ 7 เอเคอร์ (28,000 ตารางเมตร) ', '0_pic.png', 1, 14),
(13, 'BigC Super Center', 17.38724800, 102.82463400, 'ที่อยู่: 415 หมู่ที่ 3 ถ. นิตโย ตำบลหมากแข้ง อำเภอเมืองอุดรธานี อุดรธานี 41000 ', '1_pic.png', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `place_images`
--

CREATE TABLE `place_images` (
  `image_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `place_types`
--

CREATE TABLE `place_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place_types`
--

INSERT INTO `place_types` (`type_id`, `type_name`) VALUES
(1, 'สถานที่ท่องเที่ยว'),
(2, 'สถานที่ทางศาสนา '),
(3, 'สถานที่พัก'),
(4, 'สถานบริการเชื้อเพลิง'),
(5, 'ร้านขายของชำ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `details` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `village_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `details`, `price`, `product_img`, `village_id`) VALUES
(3, 'ปลาร้าบอง', ' วิสาหกิจชุมชนกลุ่มแม่บ้านเกษตรกรบ้านท่าตูม ต.หมูม่น อ.เมือง จ.อุดรธานี', 50.00, '0_pic.png', 14);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subdistricts`
--

CREATE TABLE `subdistricts` (
  `subdistrict_id` int(11) NOT NULL,
  `subdistrict_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subdistricts`
--

INSERT INTO `subdistricts` (`subdistrict_id`, `subdistrict_name`) VALUES
(1, 'หมากแข้ง'),
(2, 'นิคมสงเคราะห์'),
(3, 'บ้านขาว'),
(4, 'หนองบัว'),
(5, 'บ้านตาด'),
(6, 'โนนสูง'),
(7, 'หมูม่น'),
(8, 'เชียงยืน'),
(9, 'หนองนาคำ'),
(10, 'กุดสระ'),
(11, 'นาดี'),
(12, 'บ้านเลื่อม'),
(13, 'เชียงพิณ'),
(14, 'สามพร้าว'),
(15, 'หนองไฮ'),
(16, 'นาข่า'),
(17, 'บ้านจั่น'),
(18, 'หนองขอนกว้าง'),
(19, 'โคกสะอาด'),
(20, 'นากว้าง'),
(21, 'หนองไผ่');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `village_id` int(11) NOT NULL,
  `village_name` varchar(100) NOT NULL,
  `subdistrict_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`village_id`, `village_name`, `subdistrict_id`) VALUES
(14, 'ไม่มี', 1),
(15, 'ดงอุดม', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `village_id` (`village_id`);

--
-- Indexes for table `place_images`
--
ALTER TABLE `place_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `place_types`
--
ALTER TABLE `place_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `village_id` (`village_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `subdistricts`
--
ALTER TABLE `subdistricts`
  ADD PRIMARY KEY (`subdistrict_id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`village_id`),
  ADD KEY `subdistrict_id` (`subdistrict_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `place_images`
--
ALTER TABLE `place_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place_types`
--
ALTER TABLE `place_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subdistricts`
--
ALTER TABLE `subdistricts`
  MODIFY `subdistrict_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `village_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `place_types` (`type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `places_ibfk_2` FOREIGN KEY (`village_id`) REFERENCES `villages` (`village_id`) ON DELETE CASCADE;

--
-- Constraints for table `place_images`
--
ALTER TABLE `place_images`
  ADD CONSTRAINT `place_images_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`village_id`) REFERENCES `villages` (`village_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_ibfk_1` FOREIGN KEY (`subdistrict_id`) REFERENCES `subdistricts` (`subdistrict_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
