-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 07:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flightsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE `aircraft` (
  `aircraftNumber` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `airline` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `capacity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aircraft`
--

INSERT INTO `aircraft` (`aircraftNumber`, `name`, `airline`, `office`, `contact`, `capacity`) VALUES
('1', 'Aircraft', 'Egypt', 'Egypt', '123', 100),
('2', 'Aircraft', 'Egypt', 'Egypt', '123', 200),
('3', 'Aircraft', 'Egypt', 'Egypt', '123', 300),
('5', '5', '4', '5', '5', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `flightNumber` varchar(100) NOT NULL,
  `seatClass` varchar(100) NOT NULL,
  `seatNumber` varchar(100) NOT NULL,
  `paymentCard` varchar(100) NOT NULL,
  `cardNumber` varchar(100) NOT NULL,
  `cardPassword` varchar(100) NOT NULL,
  `bookDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `username`, `flightNumber`, `seatClass`, `seatNumber`, `paymentCard`, `cardNumber`, `cardPassword`, `bookDate`) VALUES
(9, 'ahmed', '1', 'Economy', '1', 'Visa', '1', '1', '2020-06-13'),
(10, 'ahmed', '2', 'Premium Economy', '2', 'Master Card', '2', '2', '2020-06-13'),
(14, 'ahmed', '3', 'First Class', '3', 'Master Card', '3', '3', '2020-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flightNumber` varchar(255) NOT NULL,
  `airline` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `capacity` int(10) UNSIGNED NOT NULL,
  `reserved` int(10) UNSIGNED NOT NULL,
  `baggage` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `fare` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flightNumber`, `airline`, `source`, `destination`, `date`, `capacity`, `reserved`, `baggage`, `description`, `fare`) VALUES
('1', 'Egypt', 'Egypt', 'London', '2020-07-15', 234, 102, 100, 'The flight moves on Monday 7/9/2020 at 9:00 pm from Cairo International Airport to Dubai International Airport', 1000),
('2', 'Egypt', 'Egypt', 'Dubai', '2020-09-07', 227, 116, 200, 'The flight moves on Monday 7/9/2020 at 9:00 pm from Cairo International Airport to Dubai International Airport', 2000),
('3', 'Egypt', 'Egypt', 'New York', '2020-08-20', 200, 130, 200, 'The flight moves on Thursday 20/8/2020 at 11:00 pm from Cairo International Airport to New York International Airport', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `role`) VALUES
('ahmed', 'ahmed@yahoo.com', 'ahmed', 'customer'),
('amgad', 'amgad@yahoo.com', 'amgad', 'admin'),
('kamel', 'kamel@yahoo.com', 'kamel', 'admin'),
('sobhy', 'sobhy@yahoo.com', 'sobhy', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`aircraftNumber`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `flightNumber` (`flightNumber`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flightNumber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `flightNumber` FOREIGN KEY (`flightNumber`) REFERENCES `flight` (`flightNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
