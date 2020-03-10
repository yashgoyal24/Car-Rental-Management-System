-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2019 at 10:57 PM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.24-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `car_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `gearbox` varchar(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`car_id`, `owner_id`, `name`, `type`, `age`, `period`, `cost`, `seats`, `gearbox`, `location`, `status`) VALUES
(1, 1, 'MERCEDES', 'Sedan', 1, 1, 20, 5, 'Manual', 'Mumbai', 1),
(2, 3, 'CIAZ', 'Sedan', 2, 4, 25, 7, 'Manual', 'Nashik', 1),
(3, 4, 'SCORPIO', 'SUV', 3, 5, 30, 5, 'Manual', 'Mumbai', 1),
(4, 5, 'SAFARI', 'SUV', 4, 6, 25, 6, 'Manual', 'Mumbai', 1),
(5, 6, 'SANTRO', 'HATCHBACK', 5, 7, 20, 7, 'Manual', 'Thane', 0),
(6, 7, 'ALTO-800', 'HATCHBACK', 6, 8, 21, 8, 'Manual', 'Delhi', 1),
(7, 8, 'SWIFT', 'HATCHBACK', 7, 9, 22, 9, 'Manual', 'Mumbai', 1),
(8, 1, 'XL6', 'Sedan', 8, 1, 40, 1, 'Manual', 'Delhi', 0),
(9, 3, 'SANTRO', 'Sedan', 1, 1, 1, 1, 'Manual', 'Kolkata', 0),
(10, 4, '800', 'Sedan', 1, 1, 1, 1, 'Manual', 'Thane', 0),
(11, 5, 'ALTO', 'Sedan', 1, 1, 1, 1, 'Manual', 'Mumbai', 0),
(12, 6, 'S-PRESSO', 'Sedan', 1, 1, 1, 1, 'Manual', 'Kolkata', 0),
(13, 7, 'ERTIGA', 'SUV', 5, 6, 50, 7, 'Manual', 'Thane', 0),
(14, 8, 'SWIFT', 'Hatchback', 10, 45, 10, 5, 'Automatic', 'Mumbai', 0),
(15, 0, 'VERNA', 'Convertible', 8, 15, 32, 2, 'Manual', 'Thane', 0),
(16, 3, 'CIAZ', 'Sports Vehicle', 3, 2, 1, 1, 'Manual', 'Mumbai', 0),
(17, 3, 'SCORPIO', 'Sports Vehicle', 3, 2, 1, 1, 'Manual', 'Mumbai', 0),
(18, 5, 'XUV 500', 'Compact Vehicle', 5, 6, 5, 8, 'Manual', 'Mumbai', 0),
(19, 5, 'XUV 300', 'Convertible', 3, 3, 2, 4, 'Automatic', 'New Delhi', 0),
(20, 1, 'ERTIGA', 'Hatchback', 12, 12, 12, 7, 'Manual', 'New Mumbai', 0),
(21, 1, 'New Car', 'Hatchback', 22, 22, 22, 5, 'Automatic', 'Mumbai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_history`
--

CREATE TABLE `car_history` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `ratings` double DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `kms_driven` int(11) DEFAULT NULL,
  `bor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_history`
--

INSERT INTO `car_history` (`id`, `car_id`, `feedback`, `ratings`, `owner_id`, `kms_driven`, `bor_id`) VALUES
(1, 1, 'Nice', 4, 1, 100, 2),
(2, 14, 'Good', 4, 8, 200, 1),
(4, 2, 'Ok', 4, 8, 150, 2),
(6, 4, 'Ok', 5, 1, 500, 4),
(9, 3, 'Very Good', 4, 4, 240, 5),
(10, 18, 'Good', 5, 5, 500, 6),
(11, 10, 'Good', 4, 4, 350, 7),
(12, 1, NULL, NULL, 3, NULL, 4),
(13, 1, NULL, NULL, 3, NULL, 4),
(14, 1, NULL, NULL, 1, NULL, 3),
(15, 7, NULL, NULL, 8, NULL, 3),
(16, 6, NULL, NULL, 7, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL,
  `ratings` double NOT NULL,
  `status` int(11) NOT NULL,
  `rides` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`id`, `name`, `location`, `cost`, `ratings`, `status`, `rides`) VALUES
(1, 'A', 'KHARGHAR', 10000, 4.5, 0, 10),
(2, 'B', 'KHARGHAR', 10000, 4.5, 1, 9),
(3, 'C', 'KHARGHAR', 10000, 4.5, 0, 8),
(4, 'D', 'KHARGHAR', 10000, 4.5, 1, 7),
(5, 'E', 'ABCD', 20000, 9.5, 0, 10),
(6, 'F', 'ABCD', 20000, 9.5, 0, 10),
(7, 'G', 'ABCD', 20000, 9.5, 0, 10),
(8, 'H', 'ABCD', 20000, 9.5, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `emailid`, `password`, `age`, `contact`) VALUES
(1, 'Yash', 'yash@gmail.com', '123456', 20, '9874563210'),
(3, 'Siddhesh', 'siddhesh@gmail.com', '123456', 20, '9876543210'),
(4, 'Yash Goyal', 'goyalyash225@gmail.com', '12345678', 20, '7894561230'),
(5, 'Dheeraj', 'dheeraj@gmail.com', '12345678', 20, '7894561230'),
(6, 'Jyotsna', 'jyotsna@gmail.com', '87654321', 20, '7896541230'),
(7, 'Sid', 'sid@gmail.com', '123456', 20, '7894561320'),
(8, 'YASH', 'y@gmail.com', '123456', 55, '2121212121'),
(9, 'Heramb Kulkarni', 'heramb@gmail.com', '123456', 20, '9090909090'),
(10, 'Akshay Nair', 'akshay@gmail.com', '123456', 20, '9898989898');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_history`
--
ALTER TABLE `car_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `driver_details`
--
ALTER TABLE `driver_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `car_history`
--
ALTER TABLE `car_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_history`
--
ALTER TABLE `car_history`
  ADD CONSTRAINT `car_history_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car_details` (`car_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
