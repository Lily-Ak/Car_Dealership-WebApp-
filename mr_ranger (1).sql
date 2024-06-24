-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 02:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mr_ranger`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `id` int(6) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `name` varchar(125) NOT NULL,
  `price` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`id`, `picture`, `name`, `price`) VALUES
(1, 'https://www.ford.co.uk/content/dam/guxeu/rhd/central/cars/2022-ranger-raptor/pre-launch/gallery/exterior/ford-ranger-eu-P703R_005-16x9-2160x1215.jpg.renditions.extra-large.jpeg', 'Next-Gen Ranger XLT', '632 000'),
(2, 'https://cdn.motor1.com/images/mgl/7JjRJ/s1/ford-ranger-by-carlex.jpg', 'LARAIT', '35 500');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `purchase_id` int(6) NOT NULL,
  `name` varchar(125) NOT NULL,
  `surname` varchar(125) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `id_value` varchar(13) NOT NULL,
  `cell_num` varchar(10) NOT NULL,
  `address1` varchar(125) NOT NULL,
  `address2` varchar(125) NOT NULL,
  `suburb` varchar(125) NOT NULL,
  `postal_code` varchar(4) NOT NULL,
  `city` varchar(125) NOT NULL,
  `total` decimal(13,4) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`purchase_id`, `name`, `surname`, `id_type`, `id_value`, `cell_num`, `address1`, `address2`, `suburb`, `postal_code`, `city`, `total`, `date_time`) VALUES
(1, 'Lily', 'Akpanke', 'id', '1111111111111', '0658858973', '782 Frhensch Street', '', 'Pretoria', '0181', 'wertyui', '632.0000', '0000-00-00 00:00:00'),
(2, 'Lily', 'Akpanke', 'passport', 'A3333', '0658858973', '782 Frhensch Street', '', 'Pretoria', '0181', 'Pretoria', '632.0000', '0000-00-00 00:00:00'),
(3, 'Lily', 'Akpanke', 'passport', 'A3333', '0658858973', 'Frhensch Street', '9', 'Pretoria', '0181', 'jjj', '632.0000', '0000-00-00 00:00:00'),
(4, 'Lily', 'Akpanke', 'id', '4444444444444', '0658858973', 'Frhensch Street', '88', 'moreleta park', '0181', 'Pretoria', '632.0000', '0000-00-00 00:00:00'),
(5, 'Lily', 'Akpanke', 'passport', '6', '0658858973', 'Frhensch Street', '77', 'moreleta park', '0181', 'Pretoria', '632.0000', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`purchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `purchase_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
