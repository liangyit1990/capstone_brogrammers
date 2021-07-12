-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 12, 2021 at 02:22 PM
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
-- Table structure for table `bento`
--

CREATE TABLE `bento` (
  `bento_id` int(11) NOT NULL,
  `bento_name` varchar(255) NOT NULL,
  `bento_price` decimal(10,2) NOT NULL,
  `bento_calories` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bento`
--

INSERT INTO `bento` (`bento_id`, `bento_name`, `bento_price`, `bento_calories`) VALUES
(1, 'chicken bento', '12.99', 1800);

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
(1, 1, 1, 0, 15, 36),
(2, 2, 1, 0, 15, 36),
(3, 2, 1, 0, 15, 1),
(4, 2, 2, 0, 15, 34),
(5, 2, 3, 0, 15, 35),
(6, 3, 1, 0, 15, 36),
(7, 3, 1, 0, 15, 1),
(8, 3, 1, 0, 15, 35),
(9, 4, 1, 0, 15, 36);

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
  `feedbackothers_file` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedbackothers`
--

INSERT INTO `feedbackothers` (`feedbackothers_id`, `feedbackothers_name`, `feedbackothers_email`, `feedbackothers_topic`, `feedbackothers_message`, `feedbackothers_file`) VALUES
(1, 'kenny', 'kenny@gmail.com', 'test topic', 'test message', NULL),
(2, 'kenny', 'tky@gmail.com', 'test msg', 'test msg 2', NULL),
(3, 'kenny', 'kenny@gmail.com', 'topic 3', 'msg 3', NULL),
(4, 'tky', 'tky@gmail.com', 'topic 4', 'topic 4 with attachement', 'submittedfile/100721-soonkueh.jpg'),
(5, 'tky', 'tky@gmail.com', 'topic 5', 'msg 5', 'submittedfile/100721-soonkueh.jpg1'),
(6, 'kenny', 'kenny@gmail.com', 'topic 6', 'topic 6', 'submittedfile/100721-1-soonkueh.jpg');

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
(2, 'chicken Karaage bento', 'bento', 'base', 0, 0, '12.99', 1800, '..\\images\\chickenkaraagebento.png'),
(5, 'Cuttlefish Bento', 'bento', 'base', 0, 0, '13.99', 1300, '..\\images\\cuttlefishbento.png'),
(34, 'broccoli', 'ala carte', 'vegetable', 0, NULL, '0.90', 50, 'uploads/brocolli.png'),
(35, 'soy sauce egg', 'ala carte', 'meat', 0, NULL, '1.30', 150, 'uploads/soy_sauce_egg.png'),
(36, 'rice', 'ala carte', 'base', 0, NULL, '0.50', 130, 'uploads/bento_menu_rice2.png'),
(37, 'noodle', 'ala carte', 'base', 0, NULL, '0.50', 80, 'uploads/bento_menu_noodles.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_totalprice` decimal(10,2) NOT NULL,
  `orders_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orders_details` text NOT NULL,
  `orders_cartNo` varchar(256) NOT NULL,
  `orders_status` smallint(6) NOT NULL,
  `users_id` int(11) NOT NULL,
  `vouchers_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `users_address` text,
  `users_phone` varchar(11) DEFAULT NULL,
  `users_age` int(3) DEFAULT NULL,
  `users_gender` smallint(6) DEFAULT NULL,
  `users_permission` smallint(6) NOT NULL DEFAULT '0',
  `users_joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_email`, `users_password`, `users_address`, `users_phone`, `users_age`, `users_gender`, `users_permission`, `users_joindate`) VALUES
(2, 'anselm sim new', 'anselmsim@gmail.comnewnew', '$2y$10$T0a/EeWKAN2liNAhURmzbuA0Wt2Lyw2a7gbZEX.VRYaSP.IchQk9.', 'anselm add new new', '91839138', 25, 0, 0, '2021-07-06 07:57:57'),
(6, 'ky', 'ky@gmail.com', '$2y$10$HtGb5WNwO6SBkoY2B/bZOe6QVePW.8ywqgMhmI8LeTV67zy3pQyGu', '', '', NULL, 0, 1, '2021-07-06 08:31:17'),
(8, 'hy', 'hy@gmail.com', '$2y$10$93fTm7vsxDe8B1WY/1w/YO2j36KvcHEnlRy..VYXy02gxWy5fjgVy', NULL, NULL, NULL, NULL, 0, '2021-07-08 11:45:23'),
(15, 'tky', 'tky@gmail.com', '$2y$10$CpUgeO/P9NEE4rComYRp7ObDZLkwCe6vAtYP8WijdlCfLPnVWesgu', '', '', NULL, 0, 0, '2021-07-09 10:59:02'),
(16, 'kenny', 'kenny@outlook.com', '$2y$10$EtHv/A7Sx1EKJlnh8JefyO5wv443goMi5nEfFAWm1dSByiGzZw2mm', NULL, NULL, NULL, NULL, 0, '2021-07-10 08:34:49');

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
-- Indexes for table `bento`
--
ALTER TABLE `bento`
  ADD PRIMARY KEY (`bento_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `vouchers_id` (`vouchers_id`);

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
-- AUTO_INCREMENT for table `bento`
--
ALTER TABLE `bento`
  MODIFY `bento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cartbatch`
--
ALTER TABLE `cartbatch`
  MODIFY `cartbatch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbackothers`
--
ALTER TABLE `feedbackothers`
  MODIFY `feedbackothers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `vouchers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`vouchers_id`) REFERENCES `vouchers` (`vouchers_id`);

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
