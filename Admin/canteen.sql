-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 08:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `f_id` int(5) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`f_id`, `f_name`, `f_price`) VALUES
(1, 'momo', 190),
(2, 'Pizza', 369),
(3, 'Crunchy fried yomari', 69),
(4, 'dal bhat', 200);

-- --------------------------------------------------------

--
-- Table structure for table `foodordered`
--

CREATE TABLE `foodordered` (
  `o_id` int(5) NOT NULL,
  `s_ids` int(5) NOT NULL,
  `f_ids` int(5) NOT NULL,
  `fo_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodordered`
--

INSERT INTO `foodordered` (`o_id`, `s_ids`, `f_ids`, `fo_ts`, `quantity`) VALUES
(7, 2, 2, '2022-04-14 16:42:27', 0),
(9, 2, 3, '2022-04-14 16:53:03', 0),
(10, 1, 3, '2022-04-14 16:53:51', 0),
(11, 4, 1, '2022-04-15 10:12:52', 0),
(12, 4, 2, '2022-04-16 15:12:29', 0),
(13, 4, 2, '2022-04-18 15:25:44', 0),
(14, 1, 2, '2022-05-01 05:40:36', 8);

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `sm_id` int(5) NOT NULL,
  `sm_name` varchar(125) NOT NULL,
  `sm_location` varchar(75) NOT NULL,
  `sm_number` int(10) NOT NULL,
  `sm_email` varchar(69) NOT NULL,
  `sm_pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`sm_id`, `sm_name`, `sm_location`, `sm_number`, `sm_email`, `sm_pass`) VALUES
(1, 'kushal', 'parbat', 2147483647, 'kushal@gmail.com', '12345'),
(2, 'bikalpa', 'thamel', 2147483647, 'bikalpa@gmail.com', '66666');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(5) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_contact` varchar(10) NOT NULL,
  `s_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_email`, `s_contact`, `s_location`) VALUES
(1, 'ajay', 'ajay@gmail.com', '9835324305', 'banasthali'),
(2, 'fsdf', 'aja22y@gmail.com', '9835312430', 'afaf'),
(4, 'Bibash', 'bibash1@gmail.com', '9840989329', 'bagbazar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `foodordered`
--
ALTER TABLE `foodordered`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `item id` (`f_ids`),
  ADD KEY `student id` (`s_ids`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_contact` (`s_contact`),
  ADD UNIQUE KEY `s_name` (`s_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foodordered`
--
ALTER TABLE `foodordered`
  MODIFY `o_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `sm_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodordered`
--
ALTER TABLE `foodordered`
  ADD CONSTRAINT `food id` FOREIGN KEY (`f_ids`) REFERENCES `food` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student id` FOREIGN KEY (`s_ids`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
