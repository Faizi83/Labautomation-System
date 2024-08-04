-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 07:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `is_visible` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `is_visible`) VALUES
(157, 'Bulb', '1'),
(158, 'Fan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repeat_password` varchar(255) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `first_name`, `last_name`, `email`, `password`, `repeat_password`, `role`) VALUES
(31, 'Faizan', 'Khan', 'faizankhan@gmail.com', '$2y$10$7QL75jmzO1ZNt/emucNMJOAXcaja7W8yyvEaNB0/Eff7qI84WH3KG', '12345678', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tested_product`
--

CREATE TABLE `tested_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_unique_id` varchar(50) NOT NULL,
  `product_testing_id` varchar(50) NOT NULL,
  `uploader_name` varchar(100) NOT NULL,
  `prod_date` varchar(100) NOT NULL,
  `result` varchar(20) NOT NULL,
  `testing_type` varchar(200) NOT NULL,
  `rating` int(50) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tested_product`
--

INSERT INTO `tested_product` (`product_id`, `product_name`, `product_unique_id`, `product_testing_id`, `uploader_name`, `prod_date`, `result`, `testing_type`, `rating`, `remarks`, `description`) VALUES
(46, 'Bulb', '5238604719', '5981047236', 'Faizan', '2023-12-15', 'Pass', 'Time-Current Test', 4, 'nyc', 'good'),
(47, 'Fan', '3671095284', '6280341975', 'shafiq', '2023-12-20', 'Fail', 'Capacity Test', 1, 'no', 'failed!');

-- --------------------------------------------------------

--
-- Table structure for table `testing_forms`
--

CREATE TABLE `testing_forms` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `date` varchar(200) NOT NULL,
  `testing_type` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `product_unique_id` bigint(20) NOT NULL,
  `product_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tested_product`
--
ALTER TABLE `tested_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `testing_forms`
--
ALTER TABLE `testing_forms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tested_product`
--
ALTER TABLE `tested_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `testing_forms`
--
ALTER TABLE `testing_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
