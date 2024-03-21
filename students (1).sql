-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 05:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `studentID` int(11) NOT NULL,
  `name` text NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `result_card` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`studentID`, `name`, `cnic`, `photo`, `result_card`, `email`, `gender`, `department`, `password`) VALUES
(1, 'Zeeshan Afzal', '38404-5577929-3', 'uploads/1697953972622.jpg', 'uploads/images (1).jpg', 'zna152191@gmail.com', 'male', 'se', 'zeeshan123'),
(2, 'Ahmed Naeem', '38404-9988776-3', 'uploads/WhatsApp Image 2024-02-07 at 9.20.49 AM.jpeg', 'uploads/images (2).jpg', 'ahmed@gmail.com', 'male', 'se', 'ahmed123'),
(3, 'Sikandar Kazi', '38404-3322765-3', 'uploads/WhatsApp Image 2024-02-07 at 9.20.48 AM.jpeg', 'uploads/WhatsApp Image 2024-01-31 at 2.50.12 AM.jpeg', 'sikandar@gmail.com', 'male', 'se', 'sikandar123'),
(4, 'Laiba Tanveer', '38404-2175164-1', 'uploads/1703577475630.jpg', 'uploads/WhatsApp Image 2024-01-31 at 2.53.13 AM.jpeg', 'laiba@gmail.com', 'female', 'it', 'laiba123'),
(5, 'Hamza Jamil', '38404-9988776-3', 'uploads/1703146802917.jpg', 'uploads/castle1.jpg', 'hamza@gmail.com', 'male', 'cs', 'hamza123');

-- --------------------------------------------------------

--
-- Table structure for table `approved`
--

CREATE TABLE `approved` (
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approved`
--

INSERT INTO `approved` (`email`) VALUES
('zna152191@gmail.com'),
('ahmed@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Explanation` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Name`, `Email`, `Subject`, `Explanation`) VALUES
(1, 'Zeeshan Afzal', 'zna152191@gmail.com', 'Check Purpose', 'Hello !  checking for database.');

-- --------------------------------------------------------

--
-- Table structure for table `declined`
--

CREATE TABLE `declined` (
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `declined`
--

INSERT INTO `declined` (`email`) VALUES
('laiba@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
