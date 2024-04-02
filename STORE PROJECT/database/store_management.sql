-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 10:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `inserted_materials`
--

CREATE TABLE `inserted_materials` (
  `material_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inserted_materials`
--

INSERT INTO `inserted_materials` (`material_id`, `name`, `quantity`, `Date`) VALUES
(4, 'cocoa', 12, '2023-10-20 14:47:58'),
(5, 'cocoa', 28, '2023-10-20 14:48:31'),
(6, 'choroko', 28, '2023-10-20 14:50:24'),
(7, 'choroko', 22, '2023-10-20 14:50:53'),
(8, 'mchele ', 5, '2023-10-21 08:39:22'),
(9, 'karanga', 5, '2023-10-21 08:51:54'),
(10, 'karanga', 5, '2023-10-21 14:39:30'),
(11, 'karanga', 12, '2023-10-21 15:26:53'),
(12, 'ulezi', 1000, '2023-10-21 15:38:04'),
(13, 'ulezi', 1000, '2023-10-21 15:39:07'),
(14, 'ulezi', 1000, '2023-10-21 15:40:42'),
(15, 'mahindi', 2000, '2023-10-21 21:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `name`, `quantity`, `update_date`) VALUES
(1, 'food', 1500, NULL),
(4, 'mahindi', 2000, NULL),
(5, 'mtama', 6, NULL),
(7, 'karanga', 101037, NULL),
(8, 'njugu', 7, NULL),
(9, 'mtama', 6, NULL),
(12, 'mchele ', 5, NULL),
(15, 'ufuta', 560, '2023-10-06'),
(16, 'ubuyu', 500, '2023-10-06'),
(17, 'Tea leaf', 1000, '2023-10-16'),
(23, 'cocoa', 40, '2023-10-20'),
(24, 'choroko', 36, '2023-10-20'),
(25, 'ulezi', 3000, '2023-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `taken_out_materials`
--

CREATE TABLE `taken_out_materials` (
  `material_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `worker_id` varchar(11) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `taken_out_materials`
--

INSERT INTO `taken_out_materials` (`material_id`, `name`, `quantity`, `worker_id`, `Date`) VALUES
(3, 'choroko', 0, '0', '2023-10-20 00:00:00'),
(4, 'choroko', 2, '0', '2023-10-20 00:00:00'),
(5, 'choroko', 10, '0', '2023-10-20 00:00:00'),
(6, 'mtama', 10, '0', '2023-10-20 00:00:00'),
(7, 'mtama', 7, '0', '2023-10-20 00:00:00'),
(8, 'mchele ', 315, '0', '2023-10-20 00:00:00'),
(9, 'ufuta', 31, '0', '2023-10-20 15:35:10'),
(10, 'ufuta', 3, '', '2023-10-20 15:45:20'),
(11, 'ufuta', 4, '', '2023-10-20 16:04:36'),
(12, 'ufuta', 4, '', '2023-10-20 16:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `transaction_type` enum('insert','take_out') NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','manager','worker') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`) VALUES
(2, 'shayo', '123', 'worker'),
(3, 'magreth shayo', '12345', 'worker'),
(4, 'baraka phinius', '0712', 'worker'),
(5, 'kessy', 'mbonea', 'manager'),
(6, 'michael', 'shayo', 'admin'),
(7, 'hans', 'shayo', 'manager'),
(8, 'omary', 'mamc', 'admin'),
(9, 'omary', 'mamc', 'admin'),
(10, 'w', 'p', 'worker'),
(11, 'admin', '123', 'admin'),
(12, 'wewe', 'mimi', 'worker'),
(16, 'BRENDER', 'BEST', 'worker'),
(17, 'HANSI', 'SHAYO', 'admin'),
(18, 'LOVENESS', '123', 'worker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inserted_materials`
--
ALTER TABLE `inserted_materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `taken_out_materials`
--
ALTER TABLE `taken_out_materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inserted_materials`
--
ALTER TABLE `inserted_materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `taken_out_materials`
--
ALTER TABLE `taken_out_materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`material_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
