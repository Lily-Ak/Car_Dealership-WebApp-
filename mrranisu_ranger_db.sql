-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2023 at 09:42 PM
-- Server version: 10.5.22-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrranisu_ranger_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salutation` varchar(4) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `salutation`, `surname`, `email`, `phone_number`) VALUES
(2, 'Morne23', '87acec17cd9dcd20a716cc2cf67417b71c8a7016', 'Mr', 'Morne', 'morne@gmail.com', '0694586379'),
(3, 'ngalula', '87acec17cd9dcd20a716cc2cf67417b71c8a7016', 'Mrs', 'nicole', 'ngalu@gmail.com', '0949595957'),
(4, 'mrchoshi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Mr', 'Choshi', 'choshi@gmail.com', '0739455645');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(1, 1, 3, 'jon', 0, 1, '\r\nWarning:  Undefined array key ');

-- --------------------------------------------------------

--
-- Table structure for table `fusers`
--

CREATE TABLE `fusers` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `cellphone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `number`, `message`) VALUES
(5, 'J B MILOLO', 'jonathanbeya38@gmail.com', '0691146649', 'hello there'),
(6, 'JONATHAN ', 'jonathanbey@gmail.com', '0691146649', 'hi'),
(7, 'JONATHAN ', 'jonathanbey@gmail.com', '0691146649', 'hi'),
(8, 'MILOLO', 'jonathanbeya@gmail.com', '0691146649', 'Hi'),
(9, 'Lily', 'lily@gmail.com', '0691146', 'Nothing happaned'),
(10, 'Nelio', 'nelionhacolo103@gmail.com', '0769466088', 'Hey its Nelio'),
(11, 'dvhjkw', 'jonatheya38@gmail.com', '0691146582', 'here again'),
(12, 'John', 'choshi@gmail.com', '0723445678', 'Hi, may kindly assist'),
(13, 'Potego', 'dphn@webmail.co.za', '015824563', 'I would lke to visit your showroom, Please advice when are you available'),
(14, 'Tebatso Nokana', 'tebatso.nokana@eduvos.com', '827091261', 'I want a free car'),
(15, 'Phillip Choshi', 'spchoshi@gmail.com', '0766121433', 'Can I have a brand new Ford Ranger - Rapture');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `purchase_id` int(6) NOT NULL,
  `name` varchar(125) NOT NULL,
  `surname` varchar(125) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `id_value` varchar(13) NOT NULL,
  `cell_num` varchar(10) NOT NULL,
  `address1` varchar(125) NOT NULL,
  `address2` varchar(125) NOT NULL,
  `total_price` int(100) NOT NULL,
  `suburb` varchar(125) NOT NULL,
  `postal_code` varchar(4) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `city` varchar(125) NOT NULL,
  `total` decimal(13,4) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `transmission` varchar(500) NOT NULL,
  `fuel_type` varchar(500) NOT NULL,
  `engine` varchar(500) NOT NULL,
  `model` varchar(500) NOT NULL,
  `horsepower` varchar(500) NOT NULL,
  `year` varchar(500) NOT NULL,
  `colour` varchar(500) NOT NULL,
  `once_off_price` int(10) NOT NULL,
  `monthly_price` int(10) NOT NULL,
  `image_of_car01` varchar(100) NOT NULL,
  `image_of_car02` varchar(100) NOT NULL,
  `image_of_car03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `transmission`, `fuel_type`, `engine`, `model`, `horsepower`, `year`, `colour`, `once_off_price`, `monthly_price`, `image_of_car01`, `image_of_car02`, `image_of_car03`) VALUES
(1, 'raptor', 'automatic', 'diesel', 'sdbesilu', 'ranger', '300', '2022', 'yellow', 1800750, 32000, 'ford ranger road.jpeg', 'ford ranger T6 4th Gen 2022 Roof rack kit.jpeg', 'ford.jpeg'),
(2, 'For ranger Stormtrak', 'automatic', 'petrol', '500m', 'ranger', '600', '2012', 'black', 679000, 16000, 'ford ranger.jpeg', 'ford ranger 2.jpeg', 'audi.png'),
(3, 'jon', 'manuel', 'petrol', '4518hniu', 'ranger', '800', '2023', 'white', 700000, 20000, 'ford1.jpg', 'ford2.jpg', 'mercedes benz amg.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `salutation` varchar(10) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `salutation`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES
(14, 'Mr', 'simple', 'one', 'simpleone@gmail.com', '0691146649', '$2y$10$gFPcicMZ/V0W0xrx6x.9HOu7hmKK4NqqGSbEFjcZ18AC09v2oYL7S'),
(15, 'Dr', 'wait', 'again', 'waitnah@gmail.com', '0694526649', '$2y$10$v1DH0FnnxHQYoG73wjzPae8BinufLdfpVGysCqeKhoI7wQ35v2Cdq'),
(16, 'Mr', 'chris', 'benoit', 'chris@gmail.com', '0691148524', '$2y$10$VaILrKKakP4f9ALaprdCMONpGm2PnRHyq9k6G5pJCePEK3DfAmHnG'),
(25, 'Mr', 'no', 'yes', 'yesno@gmail.com', '0697458962', '$2y$10$95Rq/beOeJ2kmYjHeQ7UWuUGVLXDAs5h.YYMp/WfZxr/yXn2JLV1i'),
(26, 'Miss', 'Lily', 'Akpanke', 'li@gmail.com', '0657848473', '$2y$10$ahnhs.OccbAMHqinGIy8T.mgfWChHOPIZGVNnIwnP0f/sPKUO9xmO'),
(27, 'Miss', 'Lil', 'Akpanka', 'li1@gmail.com', '0657848474', '$2y$10$PnwqfkhS5a9XnDuNOchWduybGMQtKHZJrof7FzAVGce4rAiMMgRHW'),
(29, 'Mr', 'Nelio', 'Lino', 'Nelionhacolo103@gmail.com', '0769466088', '$2y$10$6s8JrstykGgjMZynmUtOwOPyMgQQ3sE5UkAQLozCB.yjv0sGCk7LS'),
(30, 'Mr', 'morne', 'swart', 'morne@gmail.com', '0657458524', '$2y$10$J6XcNrMXZmTwXn5PxxOol.X1z1w8lN/UuiXqj9dzNzppYV3DDrPoW'),
(31, 'Mr', 'milou', 'chien', 'milou@gmail.com', '0674527896', '$2y$10$tMhurNukvpgyB8qlb1.Oou8o/vJxSZam2vtDXVQgwsS9HH.FvnsaO'),
(33, 'Mr', 'seven', 'chien', 'seven@gmail.com', '0674527885', '$2y$10$YUz0CnPzWU0B.3raIZhn7u09XzkjWJxmqwm7VqSElVWALmLvmy4rC'),
(34, 'Mr', 'Nelio', 'Nhacolo', 'Nelio11@gmail.com', '0639468339', '$2y$10$zdHiXlLHLMy3gdBdnpw5tOpMOoVvwyIkvaK3NVsrrCQ/ih/ZUdNXW'),
(36, 'Mr', 'twenty', 'two', 'twenty@gmail.com', '0364578965', '$2y$10$hsye/4vtIQf0QtwJxqq1tOFXuFmZ5kokEwHf/m1FJe.GDfAFOGptu'),
(37, 'Mr', 'Rei', 'Lino', 'lino3@gmail.com', '0679468331', '$2y$10$4L8VWjSX15hmp5MsOEyrluPLsE2ZqenARA4O5XXZIeFhT6KzdW21a'),
(38, 'Mr', 'seventy', 'ninety', 'ninety@gmail.com', '0647584268', '$2y$10$n.0rOl0BG3/DV4IgSNUE..u1NbL1eipw7hE8xVAXP/g3X/q/ZisRe'),
(39, 'Mr', 'fwvkuwi', 'biuew', 'igfueihq@gmail.com', '0647854896', '$2y$10$KFHFPwy855QzyfGHI711F.GFsGoMDlyAeUem2YKO2QH8JiPU1hD7a'),
(40, 'Mr', 'fnjwiuf', 'iudvniu', 'fenieunf@gmail.com', '0647512589', '$2y$10$vzD1kKONSJnb1HVjcdNYReLERt6InS/knRWbFP3ksSNa4uRqRoiwa'),
(41, 'Miss', 'Daphney', 'Mokwana', 'mokwandr@gmail.com', '0788485899', '$2y$10$rATnbCjUSJatIgpLwoXb5.p7ut7wvgv2pdW7jBf9r5F.kpUVUb9K6'),
(42, 'Mr', 'Daphney', 'Mokwana', 'mokwadr@gmail.com', '0710485899', '$2y$10$NmQxTQ/sBx6FChsKUUO/Muwes8YRjMzUPZzmkf7gK7Htr2toDc3FK'),
(43, 'Mr', 'Phillip', 'Choshi', 'spchoshi@gmail.com', '0766121433', '$2y$10$vJdvS/iTf3dE5rGwVNHdmONxnEI2W3NrzlwuCJDdGASS6VkH6zzoW'),
(44, 'Mr', 'Phillip', 'Choshi', 'choshi@gmail.com', '0736543212', '$2y$10$nU7eux402d6K8Ns6V2DaguKnQ3GKo6Fcb6WWzk9iYnY7qmxwXLDwm'),
(45, 'Mr', 'Phemelo', 'Kenosi', 'phemelokenosi@gmail.com', '0736543210', '$2y$10$BWg4FEsfHRD/lEL/bc3aDuGBOTMr24Ir3pqhdPnk6fA1RFeNuaRMi');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fusers`
--
ALTER TABLE `fusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fusers`
--
ALTER TABLE `fusers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `purchase_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
