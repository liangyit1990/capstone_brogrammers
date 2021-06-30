-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 30, 2021 at 06:51 PM
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
  `cart_foodqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `users_id`, `food_id`, `cart_foodqty`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

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
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_category` varchar(128) NOT NULL,
  `food_subcategory` varchar(128) NOT NULL,
  `food_healthierchoice` smallint(6) DEFAULT '0',
  `food_vegan` smallint(6) NOT NULL,
  `food_price` decimal(10,2) NOT NULL,
  `food_calories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_category`, `food_subcategory`, `food_healthierchoice`, `food_vegan`, `food_price`, `food_calories`) VALUES
(1, 'grilled chicken', 'ala carte', 'meat', 0, 0, '4.99', 280),
(2, 'chicken bento rice', 'bento', 'rice', 0, 0, '12.99', 1800),
(5, 'curry', 'bento', 'gravy', 0, 0, '0.49', 180),
(6, 'chicken bento noodles', 'bento', 'noodles', 0, 0, '12.99', 1750),
(7, 'beef bento noodles', 'bento', 'noodles', 0, 0, '14.99', 1950),
(8, 'curry', 'gravy', 'small container (tbd)', 0, 0, '0.49', 140),
(9, 'lu zhi', 'gravy', 'large container (tbd)', 0, 0, '3.49', 480);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_totalprice` decimal(10,2) NOT NULL,
  `orders_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orders_details` text NOT NULL,
  `orders_status` smallint(6) NOT NULL,
  `users_id` int(11) NOT NULL,
  `vouchers_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_totalprice`, `orders_timestamp`, `orders_details`, `orders_status`, `users_id`, `vouchers_id`) VALUES
(1, '17.98', '2021-06-30 12:42:04', 'structure: food_id, food_id\'s food_name, cart_foodqty, food_price\r\n\r\nExample:\r\n\r\n1 - grilled chicken - 1 - 4.99\r\n2 - chicken bento - 1 - 12.99\r\n\r\nExtra: Total price = Summation(food_price * cart_foodqty)\r\n\r\nExample: (4.99 * 1) + (12.99 * 1) = 17.98', 0, 1, NULL);

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
  `users_address` text NOT NULL,
  `users_phone` varchar(11) NOT NULL,
  `users_age` int(3) NOT NULL,
  `users_gender` smallint(6) NOT NULL,
  `users_permission` smallint(6) NOT NULL DEFAULT '0',
  `users_joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_email`, `users_password`, `users_address`, `users_phone`, `users_age`, `users_gender`, `users_permission`, `users_joindate`) VALUES
(1, 'anselm', 'anselm@email.com', '123', '123 Singapore Road', '123', 12, 1, 0, '2021-06-28 13:47:07');

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
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`vouchers_id`, `vouchers_code`, `vouchers_date`, `vouchers_expirydate`, `vouchers_discount`, `vouchers_status`, `users_id`) VALUES
(3, 'abcd1234\r\nvouchers_status:\r\n0 - available\r\n1 - redeemed\r\n\r\nvouchers_expirydate: populated via a function, +30 or +60 days', '2021-06-30 13:01:47', '2021-07-29 21:00:47', 10, 0, 1);

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `users_id` (`users_id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `vouchers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
