-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 23, 2021 at 03:57 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calorice`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `addresses_id` int(128) NOT NULL,
  `users_id` int(128) NOT NULL,
  `addresses_default` tinyint(4) NOT NULL DEFAULT '0',
  `addresses_fullName` varchar(256) NOT NULL,
  `addresses_companyName` varchar(256) DEFAULT NULL,
  `addresses_line1` varchar(256) NOT NULL,
  `addresses_line2` varchar(256) DEFAULT NULL,
  `addresses_unitNo` varchar(128) NOT NULL,
  `addresses_country` varchar(256) NOT NULL,
  `addresses_zipCode` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`addresses_id`, `users_id`, `addresses_default`, `addresses_fullName`, `addresses_companyName`, `addresses_line1`, `addresses_line2`, `addresses_unitNo`, `addresses_country`, `addresses_zipCode`) VALUES
(39, 15, 1, 'Kenny', '', 'Test Test Test Address', '', '06-74', 'Singapore', '640757');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `cart_foodqty` int(11) NOT NULL,
  `cart_status` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `users_id`, `food_id`, `cart_foodqty`, `cart_status`) VALUES
(50, 15, 40, 2, 1),
(51, 15, 40, 1, 1),
(52, 15, 39, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cartbatch`
--

CREATE TABLE `cartbatch` (
  `cartbatch_id` int(11) NOT NULL,
  `cartbatch_no` int(11) NOT NULL,
  `cartbatch_foodqty` int(11) NOT NULL,
  `cartbatch_status` tinyint(4) NOT NULL DEFAULT '0',
  `users_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cartbatch`
--

INSERT INTO `cartbatch` (`cartbatch_id`, `cartbatch_no`, `cartbatch_foodqty`, `cartbatch_status`, `users_id`, `food_id`) VALUES
(1, 1, 1, 1, 15, 36),
(2, 1, 1, 1, 15, 36),
(3, 1, 1, 1, 15, 37);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_topic` varchar(128) NOT NULL,
  `feedback_msg` text NOT NULL,
  `feedback_ss` text,
  `feedback_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `feedback_from` smallint(6) NOT NULL,
  `feedback_no` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedbackothers`
--

CREATE TABLE `feedbackothers` (
  `feedbackothers_id` int(11) NOT NULL,
  `feedbackothers_name` varchar(128) NOT NULL,
  `feedbackothers_email` varchar(256) NOT NULL,
  `feedbackothers_topic` varchar(128) NOT NULL,
  `feedbackothers_message` text NOT NULL,
  `feedbackothers_file` varchar(256) DEFAULT NULL,
  `feedbackothers_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedbackothers`
--

INSERT INTO `feedbackothers` (`feedbackothers_id`, `feedbackothers_name`, `feedbackothers_email`, `feedbackothers_topic`, `feedbackothers_message`, `feedbackothers_file`, `feedbackothers_timestamp`) VALUES
(1, 'kenny', 'kenny@gmail.com', 'test topic', 'test message', NULL, '2021-07-21 12:18:41'),
(2, 'kenny', 'tky@gmail.com', 'test msg', 'test msg 2', NULL, '2021-07-21 12:18:41'),
(3, 'kenny', 'kenny@gmail.com', 'topic 3', 'msg 3', NULL, '2021-07-21 12:18:41'),
(4, 'tky', 'tky@gmail.com', 'topic 4', 'topic 4 with attachment', 'submittedfile/100721-soonkueh.jpg', '2021-07-21 12:18:41'),
(5, 'tky', 'tky@gmail.com', 'topic 5', 'msg 5', 'submittedfile/100721-soonkueh.jpg1', '2021-07-21 12:18:41'),
(6, 'kenny', 'kenny@gmail.com', 'topic 6', 'topic 6', 'submittedfile/100721-1-soonkueh.jpg', '2021-07-21 12:18:41'),
(7, 'anselm sim', 'anselmsim@gmail.com', 'abc', 'abc', 'submittedfile/150721-oolong_tea-removebg-preview.png', '2021-07-21 12:18:41'),
(8, 'tky', 'tky@gmail.com', 'test new topic with timestamp', 'new message with timestamp', NULL, '2021-07-21 12:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_category` varchar(128) NOT NULL,
  `food_subcategory` varchar(128) NOT NULL,
  `food_healthierchoice` smallint(6) DEFAULT '0',
  `food_vegan` smallint(6) DEFAULT NULL,
  `food_price` decimal(10,2) NOT NULL,
  `food_calories` int(11) NOT NULL,
  `food_img` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_category`, `food_subcategory`, `food_healthierchoice`, `food_vegan`, `food_price`, `food_calories`, `food_img`) VALUES
(1, 'grilled chicken', 'ala carte', 'meat', 0, 0, '4.99', 280, '..\\images\\chicken.jpeg'),
(34, 'broccoli', 'ala carte', 'vegetable', 0, NULL, '0.90', 50, 'uploads/brocolli.png'),
(35, 'soy sauce egg', 'ala carte', 'meat', 0, NULL, '1.30', 150, 'uploads/soy_sauce_egg.png'),
(36, 'rice', 'ala carte', 'base', 0, NULL, '0.50', 130, 'uploads/bento_menu_rice2.png'),
(37, 'noodle', 'ala carte', 'base', 0, NULL, '0.50', 80, 'uploads/bento_menu_noodles.png'),
(38, 'chicken karaage bento', 'bento', 'meat', 0, NULL, '11.50', 500, 'uploads/chickenkaraagebento.png'),
(39, 'cuttlefish bento', 'bento', 'meat', 0, NULL, '12.10', 500, 'uploads/cuttlefishbento.png'),
(40, 'deep fried ham bento', 'bento', 'meat', 0, NULL, '10.90', 500, 'uploads/deepfriedhambento.png'),
(41, 'ebi fry bento', 'bento', 'meat', 0, NULL, '11.60', 500, 'uploads/ebifrybento.png'),
(43, 'salmon slice bento', 'bento', 'meat', 0, NULL, '12.40', 500, 'uploads/salmonslicebento.png'),
(45, 'sausage bento', 'bento', 'meat', 0, NULL, '13.50', 501, 'uploads/sausagebento.png'),
(46, 'carrot juice', 'ala carte', 'drinks', 0, NULL, '2.50', 150, 'uploads/carrotjuice.png'),
(47, 'curry gravy', 'ala carte', 'gravy', 0, NULL, '2.99', 300, 'uploads/gravycurry.png'),
(48, 'braised soy gravy', 'ala carte', 'gravy', 0, NULL, '2.29', 250, 'uploads/gravybraisedsoy.png'),
(55, 'inari bento', 'bento', 'meat', 0, NULL, '12.30', 399, 'uploads/inaribento.png'),
(56, 'teriyaki chicken bento', 'bento', 'meat', 0, NULL, '15.50', 499, 'uploads/Teriyaki Chicken Bento.png'),
(57, 'black tea', 'ala carte', 'drinks', 0, NULL, '1.99', 75, 'uploads/black_tea-removebg-preview.png'),
(58, 'oolong tea', 'ala carte', 'drinks', 0, NULL, '1.79', 55, 'uploads/oolong_tea-removebg-preview.png'),
(59, 'red tea', 'ala carte', 'drinks', 0, NULL, '1.49', 66, 'uploads/red_tea-removebg-preview.png'),
(60, 'mushroom gravy', 'ala carte', 'gravy', 0, NULL, '4.99', 230, 'uploads/mushroom_gravy-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderdetails_id` int(11) NOT NULL,
  `orderdetails_qty` int(11) NOT NULL,
  `orderdetails_group` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetails_id`, `orderdetails_qty`, `orderdetails_group`, `users_id`, `food_id`, `orders_id`) VALUES
(25, 1, 1, 15, 36, 8),
(26, 1, 1, 15, 36, 9),
(27, 2, 2, 15, 40, 9),
(28, 1, 1, 15, 40, 10),
(29, 1, 1, 15, 37, 11),
(30, 1, 1, 15, 39, 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_totalprice` decimal(10,2) NOT NULL,
  `orders_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orders_address` varchar(256) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_totalprice`, `orders_timestamp`, `orders_address`, `users_id`) VALUES
(8, '0.50', '2021-07-21 12:49:33', ',  ,  ', 15),
(9, '22.30', '2021-07-22 12:36:47', 'Test Test Test Address,  06-74, Singapore 640757', 15),
(10, '10.90', '2021-07-22 13:04:18', 'Test Test Test Address,  06-74, Singapore 640757', 15),
(11, '0.50', '2021-07-22 13:20:56', 'Test Test Test Address,  06-74, Singapore 640757', 15),
(12, '12.10', '2021-07-22 14:47:26', 'Test Test Test Address,  06-74, Singapore 640757', 15);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submission_id` int(11) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `submission_screenshot` text NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_password` varchar(128) NOT NULL,
  `users_phone` varchar(11) DEFAULT NULL,
  `users_age` int(3) DEFAULT NULL,
  `users_gender` smallint(6) DEFAULT NULL,
  `users_permission` smallint(6) NOT NULL DEFAULT '0',
  `users_joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_email`, `users_password`, `users_phone`, `users_age`, `users_gender`, `users_permission`, `users_joindate`) VALUES
(6, 'ky', 'ky@gmail.com', '$2y$10$HtGb5WNwO6SBkoY2B/bZOe6QVePW.8ywqgMhmI8LeTV67zy3pQyGu', '91869647', NULL, 1, 1, '2021-07-21 13:17:32'),
(8, 'hy', 'hy@gmail.com', '$2y$10$93fTm7vsxDe8B1WY/1w/YO2j36KvcHEnlRy..VYXy02gxWy5fjgVy', NULL, NULL, NULL, 0, '2021-07-08 11:45:23'),
(15, 'tky', 'tky@gmail.com', '$2y$10$CpUgeO/P9NEE4rComYRp7ObDZLkwCe6vAtYP8WijdlCfLPnVWesgu', '', NULL, 0, 0, '2021-07-09 10:59:02'),
(16, 'kenny', 'kenny@outlook.com', '$2y$10$EtHv/A7Sx1EKJlnh8JefyO5wv443goMi5nEfFAWm1dSByiGzZw2mm', NULL, NULL, NULL, 0, '2021-07-10 08:34:49'),
(20, 'Anselm Sim', 'anselmsim@gmail.com', '$2y$10$EHuM/EsGBwqPNyhdbTDFBu45VfVMHZm1KDkAQxN78jTKhJs8AwZtO', NULL, NULL, NULL, 0, '2021-07-23 14:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `vouchers_id` int(11) NOT NULL,
  `vouchers_code` varchar(128) NOT NULL,
  `vouchers_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vouchers_expirydate` datetime NOT NULL,
  `vouchers_discount` int(11) NOT NULL,
  `vouchers_status` smallint(6) NOT NULL DEFAULT '0',
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`addresses_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `cartbatch`
--
ALTER TABLE `cartbatch`
  ADD PRIMARY KEY (`cartbatch_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `feedbackothers`
--
ALTER TABLE `feedbackothers`
  ADD PRIMARY KEY (`feedbackothers_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderdetails_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`vouchers_id`),
  ADD KEY `users_id` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `addresses_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `cartbatch`
--
ALTER TABLE `cartbatch`
  MODIFY `cartbatch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbackothers`
--
ALTER TABLE `feedbackothers`
  MODIFY `feedbackothers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderdetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `vouchers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `cartbatch`
--
ALTER TABLE `cartbatch`
  ADD CONSTRAINT `cartbatch_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `cartbatch_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`),
  ADD CONSTRAINT `orderdetails_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
