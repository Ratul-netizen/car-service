-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 10:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `somoy` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `userID`, `productID`, `orderid`, `somoy`) VALUES
(17, 1, 8, 38, '2020-03-21 01:59:13'),
(18, 2, 0, 39, '2021-05-04 04:44:27'),
(19, 2, 0, 40, '2021-05-04 04:45:56'),
(20, 2, 0, 41, '2021-05-04 04:46:30'),
(21, 2, 0, 42, '2021-05-04 04:47:07'),
(22, 2, 0, 43, '2021-05-04 04:47:46'),
(23, 2, 0, 44, '2021-05-04 05:06:07'),
(24, -1, 0, 45, '2021-05-05 17:10:19'),
(25, 2, 0, 46, '2021-05-05 17:42:12'),
(26, 2, 0, 47, '2021-05-05 17:45:02'),
(27, 2, 0, 48, '2021-05-05 19:11:14'),
(29, 2, 0, 50, '2021-05-05 19:13:14'),
(36, 2, 0, 0, '2021-05-06 00:40:22'),
(68, 2, 0, 88, '2021-05-06 17:08:54'),
(69, 2, 0, 89, '2021-05-06 17:19:10'),
(70, 2, 0, 90, '2021-05-06 17:19:50'),
(71, -1, 0, 91, '2021-05-06 17:27:11'),
(72, -1, 0, 92, '2021-05-06 17:29:11'),
(73, 2, 0, 93, '2021-05-06 17:30:09'),
(74, 2, 0, 94, '2021-05-06 17:37:32'),
(75, 2, 0, 95, '2021-05-06 17:37:38'),
(76, 2, 0, 96, '2021-05-06 17:37:51'),
(77, -1, 0, 97, '2021-05-06 17:40:55'),
(78, 2, 0, 98, '2021-05-06 19:58:15'),
(79, 3, 0, 99, '2021-05-09 01:50:48'),
(80, 1, 0, 100, '2021-05-09 01:56:13'),
(81, 1, 0, 101, '2021-05-09 08:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(7) DEFAULT NULL,
  `mechanic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carlicense` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enginelicense` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment` date DEFAULT NULL,
  `timing` datetime DEFAULT NULL,
  `state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `postCode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderStatus` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `mechanic`, `firstName`, `lastName`, `address`, `address2`, `telephone`, `phone`, `carlicense`, `enginelicense`, `appointment`, `timing`, `state`, `city`, `postCode`, `item`, `total`, `orderStatus`) VALUES
(88, 2, '1', 'Sakib', 'Apon', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '78', '01951445484', '1234123', '1234123', '0000-00-00', NULL, 'Mymensingh', 'Dhaka', '1212', NULL, NULL, ''),
(89, 2, '1', 'Sakib', 'Apon', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '78', '01951445484', '1234123', '1234123', '0000-00-00', NULL, 'Chittagong', 'Dhaka', '1212', NULL, NULL, 'Approved'),
(90, 2, '2', 'Sakib', 'Apon', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '2', '01951445484', '1234123', '1234123', '0000-00-00', NULL, 'Please Select', 'Dhaka', '1212', NULL, NULL, ''),
(91, -1, '1', 'Sakib', 'Apon', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '', '', '', '', '2021-05-01', NULL, 'Please Select', 'Dhaka', '1212', NULL, NULL, 'Approved'),
(92, -1, '4', 'Sakib', 'Apon', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '', '', '', '', '0000-00-00', NULL, 'Please Select', 'Dhaka', '1212', NULL, NULL, 'Processing'),
(93, 2, '5', 'Sakib', 'Apon', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '', '', '', '', '0000-00-00', NULL, 'Please Select', 'Dhaka', '1212', NULL, NULL, 'Processing'),
(94, 2, '2', '', '', '', '', '', '', '', '', '0000-00-00', NULL, 'Please Select', '', '', NULL, NULL, ''),
(95, 2, '3', '', '', '', '', '', '', '', '', '0000-00-00', NULL, 'Please Select', '', '', NULL, NULL, 'Processing'),
(96, 2, '5', '', '', '', '', '', '', '', '', '2021-06-30', NULL, 'Please Select', '', '', NULL, NULL, 'Approved'),
(97, -1, '2', '', '', '', '', '', '', '', '', '0000-00-00', NULL, 'Please Select', '', '', NULL, NULL, 'Processing'),
(98, 2, '3', 'SakibA', 'AponA', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '01951445484', '019514454842', '123412378', '1234123', '2021-05-12', NULL, 'Dhaka', 'Dhaka', '1212', NULL, NULL, 'Approved'),
(99, 3, '4', 'Sakib', 'Apon', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '', '', '1234123', '1234123', '2021-05-28', NULL, 'Chittagong', 'Dhaka', '1212', NULL, NULL, 'Processing'),
(100, 1, '1', 'Sakib', 'Apon', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '', '', '', '', '0000-00-00', NULL, 'Please Select', 'Dhaka', '1212', NULL, NULL, 'Processing'),
(101, 1, '1', 'Milestone', 'Apon', 'House 80/A', 'Road- 2, Block A, Niketon, Gulshan 1.', '78', '01951445484', '', '', '2021-05-26', NULL, 'Please Select', 'Dhaka', '1212', NULL, NULL, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `somoy` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'ts.apon92@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'sakibapon2', 'sakibapon22@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'qwer', 'tasnim.sakib.apon@g.bracu.ac.bd', '962012d09b8170d912f0669f6d7d9d07'),
(5, 'sakibapon21', 'tester1@gmail.com', '3c59dc048e8850243be8079a5c74d079'),
(6, 'test', 'tester2@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(7, 'sparnabd', 'sabbir.grassford@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
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
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
