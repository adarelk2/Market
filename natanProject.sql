-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2020 at 05:58 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `natanProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `loading`
--

CREATE TABLE `loading` (
  `id` int(10) NOT NULL,
  `userName` varchar(15) NOT NULL,
  `count` varchar(180) NOT NULL,
  `time` int(20) NOT NULL,
  `mode` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loading`
--

INSERT INTO `loading` (`id`, `userName`, `count`, `time`, `mode`) VALUES
(12, 'adarelk1', 'https://www.blockchain.com/btc/tx/adfd884cf0dc4739cadc4b7e6eca59f316d4726ab5f69280350be1f3e38b3243?fbclid=IwAR0pb2toWuHbvWJVApFD_otoiC_czJItfwdKmViIYT', 1602602583, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `idItem` int(10) NOT NULL,
  `data` varchar(20) NOT NULL,
  `userName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `idItem`, `data`, `userName`) VALUES
(29, 2, '2020/10/11', 'adarelk1'),
(30, 2, '2020/10/11', 'adarelk1'),
(31, 1, '2020/10/11', 'adarelk1'),
(32, 2, '2020/10/12', 'adarelk1'),
(33, 1, '2020/10/12', 'adarelk1'),
(34, 2, '2020/10/12', 'adarelk1'),
(35, 1, '2020/10/12', 'adarelk1'),
(36, 1, '2020/10/12', 'test123'),
(37, 6, '2020/10/13', 'adarelk2'),
(38, 5, '2020/10/13', 'adarelk2'),
(39, 4, '2020/10/13', 'adarelk2'),
(40, 3, '2020/10/13', 'adarelk2');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `my_Keys` varchar(150) NOT NULL,
  `mode` int(1) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(25) NOT NULL,
  `image_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `subject`, `my_Keys`, `mode`, `price`, `category`, `image_url`) VALUES
(8, 'item 6', '   console.log(_ar.items)', '3242343423', 0, 447, 'categoray_1', ''),
(9, 'test123', 't4w5e', '4353456546546', 0, 55, 'category_4', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` int(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `balance`, `password`, `level`) VALUES
(1, 'adarelk1', 'adarelk2@gmail.com', 1790, '123123', 2),
(18, 'adarelk2', 'adarelk5@gmail.com', 347, '681998ae', 0),
(21, 'test123', 'adarelk2@gmail.cofm', 11, '1231231', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loading`
--
ALTER TABLE `loading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loading`
--
ALTER TABLE `loading`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
