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
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `no` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `sField` varchar(20) NOT NULL,
  `qual` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `rps` varchar(10) NOT NULL,
  `ppd` varchar(10) NOT NULL,
  `days` varchar(100) NOT NULL,
  `state` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `nic`, `email`, `password`, `no`, `gender`, `sField`, `qual`, `address`, `rps`, `ppd`, `days`, `state`) VALUES
(2, 'Bruce', '13241234', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', 'asdasd', '21/A ,Wasanakanda Road', '1500', '9', 'Monday', 'active'),
(9, 'Saman', '1', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Female', 'Endocrinologist', 'sa', '21/A ,Wasanakanda Road', '100000', '2', 'Monday', 'active'),
(10, 'Ben', '2', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', '21', '21/A ,Wasanakanda Road', '3000', '4', 'Sunday,Monday', 'active'),
(11, 'Tony Stark', '5', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Female', 'Nephrologist', 'asdasd', '21/A ,Wasanakanda Road KAtu', '4500', '10', 'Sunday,Monday,Saturday', 'active'),
(13, 'Gajindu Bandara', '8', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Nephrologist', 'asdasd', '21/A ,Wasanakanda Road', '1', '1', 'Sunday,Monday,Tuesday,Thursday,Friday,Saturday', 'active'),
(14, 'Gajindu Bandara', '00000', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', 'asdasd', '21/A ,Wasanakanda Road', '1000', '10', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active'),
(15, 'Steven', '22', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', '12', '21/A ,Wasanakanda Road', '100', '12', 'Sunday,Monday,Wednesday,Thursday,Saturday', 'active'),
(16, 'Gajindu Bandara', '777', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Anesthesiologist', 'asdasd', '21/A ,Wasanakanda Road', '1', '1', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active'),
(17, 'Gajindu Bandara', '66', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Family medicine', 'asdasd', '21/A ,Wasanakanda Road', '1', '1', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active'),
(18, 'Gajindu Bandara', '1234', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Obstetricians', 'asdasd', '21/A ,Wasanakanda Road', '1', '1', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
