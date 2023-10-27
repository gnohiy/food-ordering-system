-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 03:37 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `phoneNumber` varchar(13) NOT NULL,
  `IcNumber` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `username`, `pwd`, `phoneNumber`, `IcNumber`) VALUES
(43, 'LOW HUI JUN', 'jun', 'e10adc3949ba59abbe56e057f20f883e', '+60109073971', '010409080480'),
(44, 'GAN YING HUEY', 'yhuey', 'f1253bc7b6c0b1d62eb9b97cfebf0f63', '01110789608', '010112011234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `imgName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `imgName`) VALUES
(30, 'Food', 'Food_Category_976.jpg'),
(31, 'Beverage', 'Food_Category_583.jpg'),
(32, 'Pastry', 'Food_Category_62.WEBP');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_name`, `price`, `img_name`, `category_id`) VALUES
(71, 'Nasi Lemak', '1.50', 'nasi_lemak.jpg', 30),
(72, 'Mee Goreng', '5.00', 'Food_Category_32.jpg', 30),
(73, 'Fried Kway Teow', '5.00', 'kueyteow.jpg', 30),
(74, 'Penang Laksa', '7.50', 'laksa.jpg', 30),
(75, 'Chicken Rice', '5.80', 'Food_Category_406.jpg', 30),
(77, 'Coffee', '1.50', 'Food_Category_147.jpg', 31),
(79, 'Teh Tarik', '1.50', 'Food_Category_545.jpg', 31),
(80, 'Sirap Water', '2.00', 'sirap.jpg', 31),
(81, 'Roti Canai', '1.50', 'Food_Category_298.jpeg', 30),
(82, 'Onde Onde', '1.20', 'Food_Category_693.JPG', 32),
(83, 'Ang Ku Kueh', '2.10', 'Food_Category_168.JPG', 32),
(84, 'Paruppu Vadai', '0.80', 'Food_Category_500.jpg', 32),
(85, 'Barley Water', '2.00', 'barli.jpg', 31),
(87, 'Milo Beng', '1.80', 'milo-ais.jpg', 31);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `cus_name`, `cus_phone`, `cus_email`, `cus_add`) VALUES
(9, 'TAY WEN XUAN', '01119238475', 'wenxuan@gmail.com', 'No 2, Jalan Durian, Taman Kota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
