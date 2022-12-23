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

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `pid` varchar(12) NOT NULL,
  `did` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `diagnosis` varchar(250) NOT NULL,
  `med` varchar(250) NOT NULL,
  `remarks` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `pid`, `did`, `date`, `diagnosis`, `med`, `remarks`) VALUES
(2, '11', '1', '2022-11-12', '1', '1', '1'),
(3, '111', '1', '2022-11-12', 'Heart Attack', 'Morphine', 'hello world!'),
(4, '11', '1', '2022-11-12', 'asdasda', 'sadada', 'asdasd'),
(8, '111', '1', '2022-11-12', 'asdsad', 'asdsadad', 'asdasd');

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

-- --------------------------------------------------------

--
-- Table structure for table `inquire`
--

CREATE TABLE `inquire` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `dis` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquire`
--

INSERT INTO `inquire` (`id`, `title`, `dis`, `date`, `pid`, `state`) VALUES
(1, 'hello', 'hh s ahdh hhasd yhiu0a9er tfryusad h ', '2022-11-16', '11', 'open'),
(2, 'sdf', 'asd', '2022-11-16', '11', 'open'),
(3, 'not working', 'asdasdad asdasd', '2022-11-16', '11', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `no` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `bg` varchar(5) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `nic`, `email`, `password`, `no`, `address`, `dob`, `bg`, `gender`) VALUES
(1, 'Gajindu Bandara', '111', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', '21/A ,Wasanakanda Road', '2022-11-15', 'A+', 'Male'),
(2, 'helo', '11', 'saman@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', '21/A,river road', '2022-11-22', 'A-', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- Indexes for table `inquire`
--
ALTER TABLE `inquire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
