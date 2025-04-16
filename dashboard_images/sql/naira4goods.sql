-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2025 at 12:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naira4goods`
--

-- --------------------------------------------------------

--
-- Table structure for table `natives`
--

CREATE TABLE `natives` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text DEFAULT NULL,
  `productImage_path` varchar(255) NOT NULL,
  `product_size` varchar(50) DEFAULT NULL,
  `product_color` varchar(50) DEFAULT NULL,
  `product_brand` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `natives`
--

INSERT INTO `natives` (`id`, `product_name`, `product_price`, `product_quantity`, `product_description`, `productImage_path`, `product_size`, `product_color`, `product_brand`, `created_at`, `updated_at`) VALUES
(1, 'Native Ankara Dress', 50000.00, 10, 'Elegant Ankara dress suitable for all occasions.', 'shirts_hood_gallery/native_1.jpg', 'L', 'Blue', 'Ankara Luxe', '2024-12-16 10:38:40', '2024-12-16 11:32:11'),
(2, 'Native Kente Wear', 40000.00, 8, 'Traditional Kente wear with vibrant colors.', 'shirts_hood_gallery/native_2.jpg', 'XL', 'Multicolor', 'Kente Originals', '2024-12-16 10:38:40', '2024-12-16 11:32:35'),
(3, 'Native Kaftan', 100000.00, 15, 'Comfortable and stylish kaftan for men.', 'shirts_hood_gallery/native_3.jpg', 'M', 'White', 'Kaftan Designs', '2024-12-16 10:38:40', '2024-12-16 11:32:45'),
(4, 'Native Agbada', 35000.00, 5, 'Luxurious agbada for special events.', 'shirts_hood_gallery/native_4.jpg', 'XL', 'Black', 'Elite Agbada', '2024-12-16 10:38:40', '2024-12-16 11:32:57'),
(5, 'Native Wrapper and Blouse', 50000.00, 12, 'Classic wrapper and blouse combo.', 'shirts_hood_gallery/native_5.jpg', 'L', 'Green', 'Wrapper Styles', '2024-12-16 10:38:40', '2024-12-16 11:33:09'),
(6, 'Native Dashiki', 60000.00, 18, 'Casual dashiki with intricate patterns.', 'shirts_hood_gallery/native_6.jpg', 'M', 'Yellow', 'Dashiki Vibes', '2024-12-16 10:38:40', '2024-12-16 11:33:16'),
(7, 'Native Senator Wear', 45000.00, 7, 'Sophisticated senator wear for men.', 'shirts_hood_gallery/native_7.jpg', 'L', 'Gray', 'Senator Couture', '2024-12-16 10:38:40', '2024-12-16 11:33:28'),
(8, 'Native Buba and Sokoto', 80000.00, 20, 'Traditional buba and sokoto set.', 'shirts_hood_gallery/native_8.jpg', 'M', 'Brown', 'Buba Heritage', '2024-12-16 10:38:40', '2024-12-16 11:33:40'),
(9, 'Native Aso Oke Cap', 76000.00, 25, 'Stylish Aso Oke cap for men.', 'shirts_hood_gallery/native_9.jpg', 'One Size', 'Red', 'Aso Oke Fashions', '2024-12-16 10:38:40', '2024-12-16 11:33:50'),
(10, 'Native Gele Headwrap', 70000.00, 30, 'Elegant gele headwrap for women.', 'shirts_hood_gallery/native_10.jpg', 'One Size', 'Gold', 'Gele Glam', '2024-12-16 10:38:40', '2024-12-16 11:33:59'),
(11, 'Native Isi Agu', 45000.00, 9, 'Traditional Isi Agu top with lion motif.', 'shirts_hood_gallery/native_11.jpg', 'L', 'Black and Gold', 'Isi Agu Classics', '2024-12-16 10:38:40', '2024-12-16 11:34:12'),
(12, 'Native Maxi Gown', 120000.00, 14, 'Flowing maxi gown for formal events.', 'shirts_hood_gallery/native_12.jpg', 'XL', 'Purple', 'Maxi Elegance', '2024-12-16 10:38:40', '2024-12-16 11:34:17'),
(13, 'Native Lace Attire', 55000.00, 6, 'Exquisite lace attire for weddings.', 'shirts_hood_gallery/native_13.jpg', 'L', 'Pink', 'Lace Royale', '2024-12-16 10:38:40', '2024-12-16 11:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `shirts`
--

CREATE TABLE `shirts` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) DEFAULT 0,
  `product_description` text DEFAULT NULL,
  `productImage_path` varchar(255) NOT NULL,
  `product_size` varchar(50) DEFAULT NULL,
  `product_color` varchar(50) DEFAULT NULL,
  `product_brand` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shirts`
--

INSERT INTO `shirts` (`id`, `product_name`, `product_price`, `product_quantity`, `product_description`, `productImage_path`, `product_size`, `product_color`, `product_brand`, `created_at`, `updated_at`) VALUES
(1, 'GG Pattern round Shirt', 7000.00, 10, 'Made from premium materials like cotton or a cotton blend, ensuring comfort and durability', 'shirts_hood_gallery/shirt_1.png', 'XL, L, XXL', 'Gray', 'Gucci', '2024-10-31 11:47:04', '2024-11-14 17:13:40'),
(2, 'Floral Print Shirt', 10000.00, 20, 'Shirt design with a collar and buttoned placket, offering a refined yet casual style.', 'shirts_hood_gallery/shirt_3.jpg', 'XL, L, XXL', 'Black', 'Brimstone', '2024-10-31 11:47:04', '2024-10-31 11:47:04'),
(3, 'Gucci Hoodie', 20000.00, 25, 'It has a traditional polo shirt design with a collar and buttoned placket, offering a refined yet casual style.', 'shirts_hood_gallery/hoodie1.jpg', 'XL, L, XXL', 'Gray', 'Gucci', '2024-10-31 12:13:47', '2024-10-31 12:13:47'),
(4, ' Web Stripe Shirt', 10000.00, 30, 'Often includes subtle details like the signature green and red web stripe on the collar or sleeve trim', 'shirts_hood_gallery/shirt_2.jpg', 'XL, L, XXL', 'Red', 'Brimstone', '2024-10-31 12:13:47', '2024-10-31 12:13:47'),
(5, 'Round-Neck Shirt', 5000.00, 30, '3 Plain 0-Neck T-shirt', 'shirts_hood_gallery/Round_neck.jpg', 'XL, L, XXL', 'White', 'Brimstone', '2024-11-14 16:08:18', '2024-11-14 16:08:18'),
(6, 'Round Neck Tee', 15000.00, 10, 'Baby Blue Casual Collar Short Sleeve Polyester Plain Embellished Medium Stretch Summer Men Tops', 'shirts_hood_gallery/round_nee.jpg', 'XL, L, XXL', 'Sky Blue', 'Brimstone', '2024-11-14 16:08:18', '2024-11-14 16:08:18'),
(7, 'Round-Neck Short Sleeve Casual T-shirt', 13000.00, 25, 'Men\'s Summer 3pcs Solid colour Round-Neck Short Sleeve Casual T-shirt', 'shirts_hood_gallery/shirt_7.jpg', 'XL, L, XXL', 'Black, Gray and White', 'SHIEN', '2024-11-14 16:08:18', '2024-11-14 16:08:18'),
(8, 'Loose Men Without Tee shirt', 40000.00, 10, 'Loose Men Letter Graphic Colorblock Shirt Without Tee Multicolor Casual Short Sleeve Woven Fabric Colorblock,Letter Shirt Non-Stretch Men Clothing', 'shirts_hood_gallery/shirt_6.jpg', 'XL, L, XXL', 'Multicolour', 'SHIEN', '2024-11-14 16:08:18', '2024-11-14 16:08:18'),
(9, 'Luxury Shirt', 40000.00, 20, 'White design patched shades of black shirt', 'shirts_hood_gallery/shirt_8.jpg', 'XL, L, XXL', 'Multicolour', 'Gucci', '2024-11-14 16:08:18', '2024-11-14 16:08:18'),
(10, 'Branded men\'s Shirt', 40000.00, 25, 'White design patched shades of black shirt', 'shirts_hood_gallery/shirt_9.jpg', 'XL, L, XXL', 'Multicolour', 'Gucci', '2024-11-14 16:08:18', '2024-11-14 16:08:18'),
(11, 'Branded Menn\'s shirt', 40000.00, 25, 'Men shirts made with cotton materials', 'shirts_hood_gallery/shirt_10.jpg', 'XL, L, XXL', 'Multicolour', 'Gucci', '2024-11-14 16:11:25', '2024-11-14 16:11:25'),
(12, 'Men\'s Woven Casual Shirt', 20000.00, 25, 'White Boho Collar Short Sleeve Woven Fabric Geometric,Tribal Shirt Embellished Non-Stretch Men Clothing', 'shirts_hood_gallery/shirt_11.jpg', 'XL, L, XXL', 'Multicolour', 'SHIEN', '2024-11-14 16:11:25', '2024-11-14 16:11:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `natives`
--
ALTER TABLE `natives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shirts`
--
ALTER TABLE `shirts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `natives`
--
ALTER TABLE `natives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shirts`
--
ALTER TABLE `shirts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
