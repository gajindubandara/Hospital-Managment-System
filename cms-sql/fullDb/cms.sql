-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2023 at 05:46 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
(31, '11', '2022-12-24', '1', '00000', 'active'),
(32, '11', '2022-12-23', '1', '00000', 'completed'),
(33, '11', '2022-12-28', '1', '00000', 'active'),
(34, '11', '2022-12-23', '2', '00000', 'active'),
(35, '11', '2023-01-31', '1', '00000', 'canceled'),
(36, '11', '2023-01-23', '1', '13241234', 'active'),
(37, '11', '2023-01-30', '1', '00000', 'active'),
(38, '11', '2023-01-27', '1', '00000', 'active'),
(39, '111', '2023-02-13', '1', '2', 'active'),
(40, '111', '2023-02-27', '1', '13241234', 'active');

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
(4, '11', '1', '2022-11-12', 'asdasda', 'sadada', 'asdasd'),
(9, '111', '1', '2022-09-08', 'jigiadisgfigi', 'sdfsdf', 'dsfdsfsfsf'),
(11, '111', '1', '2022-11-21', 's', 'a', 'a'),
(12, '111', '1', '2022-12-14', 's', 's', 's'),
(13, '111', '1', '2022-09-16', 'sa', 'as', 'as');

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
  `state` varchar(10) NOT NULL,
  `imgUrl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `nic`, `email`, `password`, `no`, `gender`, `sField`, `qual`, `address`, `rps`, `ppd`, `days`, `state`, `imgUrl`) VALUES
(2, 'Bruce', '13241234', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', 'MBBS', '21/A ,Wasanakanda Road', '1500', '9', 'Monday', 'inactive', 'https://www.meme-arsenal.com/memes/c84b011e5940d554f2cf8018ddf32ed2.jpg'),
(9, 'Saman', '1', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Female', 'Endocrinologist', 'sa', '21/A ,Wasanakanda Road', '100000', '2', 'Monday', 'active', 'https://www.pngitem.com/pimgs/m/43-432350_funny-ugly-face-cartoon-hd-png-download.png'),
(10, 'Ben', '2', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', '21', '21/A ,Wasanakanda Road', '3000', '4', 'Sunday,Monday', 'active', 'https://dm0qx8t0i9gc9.cloudfront.net/thumbnails/image/rDtN98Qoishumwih/cartoon-funny-teasing-face_Qk6e-G_thumb.jpg'),
(11, 'Tony Stark', '5', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Female', 'Nephrologist', 'asdasd', '21/A ,Wasanakanda Road KAtu', '4500', '10', 'Sunday,Monday,Saturday', 'active', 'https://img.freepik.com/premium-vector/cartoon-stupid-face-happy-smile-vector-emoji-with-open-mouth-long-sticking-tongue-joyful-facial-expression-with-goggle-eyes-funny-glad-character-positive-feelings-isolated-white-background_8071-8342.jpg?w=2000'),
(13, 'Iraj', '8', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Nephrologist', 'asdasd', '21/A ,Wasanakanda Road', '1', '1', 'Sunday,Monday,Tuesday,Thursday,Friday,Saturday', 'active', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0dcuSp8xhNbTXYZEFpchZDxlZYDx88B_rbQ&usqp=CAU'),
(14, 'Gajindu Bandara', '00000', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', 'asdasd', '21/A ,Wasanakanda Road', '1000', '10', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active', 'https://www.nicepng.com/png/detail/12-120844_happy-memes-sticker-funny-faces-cartoon-troll.png'),
(15, 'Steven', '22', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', '12', '21/A ,Wasanakanda Road', '100', '12', 'Sunday,Monday,Wednesday,Thursday,Saturday', 'active', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUoNgS608Jys2nu3eftRk2A_wUoYwNmAHiUA&usqp=CAU'),
(16, 'Sadakalum', '777', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Anesthesiologist', 'asdasd', '21/A ,Wasanakanda Road', '1', '1', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXPh1rZ4lB62qQpyEGmqdJDwupKn6lVZKyWg&usqp=CAU'),
(17, 'Devanam Piyathissa', '66', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Family medicine', 'asdasd', '21/A ,Wasanakanda Road', '1', '1', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkPcnAwApmqjkvXM_ZeKPTr1Dv5l2EiGaQ1g&usqp=CAU'),
(18, 'Dutu Gamunu', '1234', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Obstetricians', 'asdasd', '21/A ,Wasanakanda Road', '1', '1', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdtrKQaSsNFx4h3nIqXHfy-PDlsHcU69VkuA&usqp=CAU'),
(19, 'Saman Edirimuni', '99', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Anesthesiologist', 'sad', '21/A ,Wasanakanda Road', '3500', '5', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvfIVGB8yZ5kfTJJguyyg81IF-WcittMKQ6BGdNhxSdwSsl2oTwhmT6B5CVnQfZNrO4XA&usqp=CAU'),
(20, 'Kevin Levin', '9900', 'kevin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', 'sad', 'asdadad', '2500', '8', 'Sunday', 'active', 'https://www.meme-arsenal.com/memes/c84b011e5940d554f2cf8018ddf32ed2.jpg'),
(21, 'xz', '77', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', 'ret', '21/A ,Wasanakanda Road', '5647', '5', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0lI5BjRkSP7ZWYlIM4SXYuGUO9yf2IrYNiPYibLhbNagsRM5VYNnDpaKM-5o9JI-egUk&usqp=CAU'),
(22, 'dfhdgh', '7766', 'gajindukb@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0766786225', 'Male', 'Cardiologist', 't', '21/A ,Wasanakanda Road', '567', '6', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTODAWFIViR2xd0TuGnzPfbHaBrwu3HLW43ug&usqp=CAU'),
(24, 'Sanath Nishantha', '6786547', 'a@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '324', 'Male', 'Anesthesiologist', 'mbs', 'qwwa23', '2345', '2', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'active', 'https://cdn5.vectorstock.com/i/1000x1000/92/89/hipster-avatar-image-vector-19639289.jpg');

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
(1, 'hello', 'hh s ahdh hhasd yhiu0a9er tfryusad h ', '2022-11-16', '11', '3'),
(2, 'sdf', 'asd', '2022-11-16', '11', '3'),
(3, 'not working', 'asdasdad asdasd', '2022-11-16', '11', '1'),
(4, 'Poor customer care', 'blah  blah', '2022-12-22', '11', '3'),
(5, 'Bad Quality', 'afafsd sfsdfaf sdaf', '2022-12-22', '11', '2'),
(6, 'sdfds', 'sdf', '2023-01-13', '11', '1'),
(7, 'Bug', 'bah blah', '2023-02-03', '111', '1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
