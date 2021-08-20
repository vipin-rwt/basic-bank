-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2021 at 08:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `ID` int(5) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Balance` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`ID`, `Name`, `Email`, `Balance`) VALUES
(1, 'Vipin rawat', 'rawat.vipin@gmail.co', 4625),
(2, 'Amish', 'amish@hotmail.com', 12000),
(3, 'Naveen rana', 'naveen@gmail.com', 2000),
(4, 'Ravina poda', 'raveen12@gmail.com', 23000),
(5, 'Ashish bhatia', 'bhatti@gmail.com', 12000),
(6, 'Raman navi', 'raviraman@gmail.com', 50000),
(7, 'Vasudeva', 'vasu@gmail.com', 21000),
(8, 'Srikant', 'kantsri@gmail.com', 234),
(9, 'Naval rohini', 'rohini12@gmail.com', 32000),
(10, 'lalu rijwa', 'lalur@gmail.com', 39000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
