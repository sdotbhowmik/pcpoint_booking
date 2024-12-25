-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 11:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtbsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserType` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`) VALUES
(2, 'Subrata K. Bhowmik', 'admin', 1818224947, 'info@subrata.tech', 'f925916e2754e5e03f75dd58a5733251', '2023-05-21 18:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblbookings`
--

CREATE TABLE `tblbookings` (
  `id` int(11) NOT NULL,
  `bookingNo` bigint(12) DEFAULT NULL,
  `fullName` varchar(200) DEFAULT NULL,
  `emailId` varchar(200) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `bookingDate` varchar(50) DEFAULT NULL,
  `bookingTime` varchar(100) DEFAULT NULL,
  `noAdults` varchar(100) DEFAULT NULL,
  `noChildrens` varchar(100) DEFAULT NULL,
  `tableId` int(11) DEFAULT NULL,
  `adminremark` varchar(255) DEFAULT NULL,
  `boookingStatus` varchar(15) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbookings`
--

INSERT INTO `tblbookings` (`id`, `bookingNo`, `fullName`, `emailId`, `phoneNumber`, `bookingDate`, `bookingTime`, `noAdults`, `noChildrens`, `tableId`, `adminremark`, `boookingStatus`, `postingDate`, `updationDate`) VALUES
(12, 3762888536, 'Dana Gallagher', 'dizirekeb@mailinator.com', '765555', '0000-00-00', '11 : 38 PM', 'SERVIZI VARI', 'xjdsdlskdjlsdjlksjlkdjlks', 12, 'Assigned', 'Accepted', '2024-12-24 17:39:07', '2024-12-24 17:42:12'),
(13, 2658814470, 'ABC', 'a@bc.com', '121213232323', '0000-00-00', '12 : 30 AM', 'PATRONATO', '23232fdfd34232', NULL, NULL, NULL, '2024-12-25 01:52:06', NULL),
(14, 2726710947, 'Linda Harrell', 'rarybawusu@mailinator.com', '121212112', '0000-00-00', '8 : 16 AM', 'CAF - CENTRO ASSISTENZA FISCAL', 'Aliquip tempora cons', NULL, NULL, NULL, '2024-12-25 02:17:16', NULL),
(15, 5021747625, 'Kasper Weaver', 'qanezeqib@mailinator.com', '5465566656465', '0000-00-00', '8 : 18 AM', 'CONSULENZA DEL LAVORO', 'Et doloribus Nam rer', NULL, NULL, NULL, '2024-12-25 02:19:43', NULL),
(16, 447715401, 'avi', 'avi@som.com', '2311212112', '0000-00-00', '9 : 10 AM', 'CAF - CENTRO ASSISTENZA FISCAL', '32232jjfdkfjkd32', NULL, NULL, NULL, '2024-12-25 03:11:15', NULL),
(17, 4646688648, 'nibash', 'n@abc.com', '43434343', '0000-00-00', '3 : 22 PM', 'SERVIZI VARI', 'fdfldkfjldk', 11, 'test', 'Accepted', '2024-12-25 09:18:52', '2024-12-25 09:20:27'),
(18, 541427307, 'Rooney Roberson', 'jeri@mailinator.com', '+1 (836) 599-7645', '0000-00-00', '4 : 09 PM', 'SERVIZI VARI', 'Sit ipsum irure nu', NULL, NULL, NULL, '2024-12-25 10:09:36', NULL),
(19, 8094105669, 'George Norman', 'qewuzabat@mailinator.com', '+1 (267) 258-5178', '20-Jul-1980', '4 : 11 PM', 'CAF - CENTRO ASSISTENZA FISCAL', 'Corrupti harum opti', 0, 'wrong date', 'Rejected', '2024-12-25 10:11:10', '2024-12-25 10:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblrestables`
--

CREATE TABLE `tblrestables` (
  `id` int(11) NOT NULL,
  `tableNumber` varchar(100) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `AddedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrestables`
--

INSERT INTO `tblrestables` (`id`, `tableNumber`, `creationDate`, `AddedBy`) VALUES
(10, 'Nibash Chakraborty', '2024-12-24 17:41:16', 2),
(11, 'Md. Sakib Uddin', '2024-12-24 17:41:26', 2),
(12, 'Subrata Kumar Bhowmik', '2024-12-24 17:41:35', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbookings`
--
ALTER TABLE `tblbookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrestables`
--
ALTER TABLE `tblrestables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblbookings`
--
ALTER TABLE `tblbookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblrestables`
--
ALTER TABLE `tblrestables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
