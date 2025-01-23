-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 10:38 AM
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
-- Database: `students_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_detail`
--

CREATE TABLE `students_detail` (
  `Id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `DateOfBirth` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `Stream` varchar(255) NOT NULL,
  `StudentContact` varchar(255) NOT NULL,
  `StudentEmail` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `GuardiansName` varchar(255) NOT NULL,
  `GuardiansRelation` varchar(255) NOT NULL,
  `GuardiansContact` varchar(255) NOT NULL,
  `GuardiansEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_detail`
--

INSERT INTO `students_detail` (`Id`, `Name`, `Username`, `DateOfBirth`, `Class`, `Stream`, `StudentContact`, `StudentEmail`, `Address`, `Password`, `Gender`, `GuardiansName`, `GuardiansRelation`, `GuardiansContact`, `GuardiansEmail`) VALUES
(1, 'Sonu Kumar', 'Skumar72525', '2007-07-19', '12', 'Science', '9434853756', 'sonukumarpaw@gmail.com', 'Kendra Colliery, Paschim Barddhaman(713346)', 'fb670e6b3bb5a1b8c0d912cc312a1095', 'Male', 'Lalan Kumar Mandal', 'Father', '8436313658', 'lalanmondalpaw@gmail.com'),
(7, 'Rishav Kumar', 'RishavKumar', '2007-12-24', '12', 'science', '9153437815', 'rishavnwd652@gmail.com', 'Nawada, Bihar', '9ca1457e5a137914d3819bbbb1c2dc16', 'male', '                                             ', 'other', '                                                  ', 'rishavnwd652@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_detail`
--
ALTER TABLE `students_detail`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `StudentContact` (`StudentContact`,`GuardiansContact`,`GuardiansEmail`),
  ADD UNIQUE KEY `StudentEmail` (`StudentEmail`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_detail`
--
ALTER TABLE `students_detail`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
