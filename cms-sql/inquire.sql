-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2023 at 05:48 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquire`
--
ALTER TABLE `inquire`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
