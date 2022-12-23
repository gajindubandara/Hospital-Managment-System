-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2022 at 05:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `pid` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `token` varchar(10) NOT NULL,
  `did` varchar(12) NOT NULL,
  `state` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `pid`, `date`, `token`, `did`, `state`) VALUES
(17, '11', '2022-11-28', '1', '2', 'active'),
(18, '11', '2022-11-21', '1', '2', 'active'),
(19, '11', '2022-11-30', '1', '00000', 'active'),
(20, '11', '2022-11-26', '1', '5', 'canceled'),
(21, '11', '2022-11-17', '1', '66', 'active'),
(22, '11', '2022-11-18', '1', '66', 'active'),
(23, '11', '2022-11-24', '1', '22', 'active'),
(24, '11', '2022-11-26', '1', '00000', 'canceled'),
(25, '111', '2022-11-16', '1', '00000', 'completed'),
(26, '11', '2022-11-16', '2', '00000', 'active'),
(27, '11', '2022-11-19', '1', '8', 'active'),
(28, '111', '2022-11-26', '2', '00000', 'active'),
(29, '11', '2022-12-12', '1', '1', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
