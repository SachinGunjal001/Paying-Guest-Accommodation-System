-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 09:30 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paying_guest`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_register`
--

CREATE TABLE `home_register` (
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `family` int(11) NOT NULL,
  `girls` int(11) NOT NULL,
  `boys` int(11) NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ac_service` int(11) NOT NULL,
  `food_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_register`
--

INSERT INTO `home_register` (`email`, `address`, `city`, `state`, `family`, `girls`, `boys`, `no_of_rooms`, `price`, `ac_service`, `food_service`) VALUES
('saket.garg.1234@gmail.com', '1886 sector 8', 'Kurukshetra', 'Haryana', 1, 0, 1, 2, 2000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `person_register`
--

CREATE TABLE `person_register` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person_register`
--

INSERT INTO `person_register` (`email`, `name`, `mobile`, `password`) VALUES
('saket.garg.1234@gmail.com', 'saket garg', '8930606703', 'saket');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_register`
--
ALTER TABLE `home_register`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `person_register`
--
ALTER TABLE `person_register`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
