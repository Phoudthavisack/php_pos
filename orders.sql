-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 07:45 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PHP_POS`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `staff_id` int NOT NULL,
  `order_total` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `staff_id`, `order_total`, `date`) VALUES
(13, 3, '7035', '2021-12-21 16:47:55'),
(14, 1, '1235678', '2021-12-21 16:49:46'),
(15, 1, '1235678', '2021-12-21 16:50:13'),
(16, 1, '1235678', '2021-12-21 16:51:48'),
(17, 1, '7035', '2021-12-21 16:51:57'),
(18, 1, '8633331', '2021-12-21 16:52:40'),
(19, 1, '54690', '2021-12-22 06:31:29'),
(20, 1, '16000', '2021-12-22 06:32:19'),
(21, 2, '6345', '2021-12-22 06:33:21'),
(22, 1, '120070', '2021-12-22 07:01:26'),
(23, 1, '58000', '2021-12-22 07:11:56'),
(24, 1, '0', '2021-12-22 07:15:00'),
(25, 1, '256000', '2021-12-22 07:15:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
