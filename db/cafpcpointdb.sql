-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2026 at 03:50 PM
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
-- Database: `cafpcpointdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminuserName` varchar(150) DEFAULT NULL,
  `AdminEmailId` varchar(150) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `AdminName` varchar(150) DEFAULT NULL,
  `MobileNumber` varchar(50) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `UserType` tinyint(4) DEFAULT 0 COMMENT '1 for super admin, 0 for sub-admin',
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminuserName`, `AdminEmailId`, `Password`, `AdminName`, `MobileNumber`, `Email`, `UserType`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', 'admin@cafpcpoint.it', '0192023a7bbd73250516f069df18b500', 'Super Admin', '+390687880399', 'admin@cafpcpoint.it', 1, '2026-03-11 17:23:58', NULL),
(2, 'operator1', 'operator1@cafpcpoint.it', '0192023a7bbd73250516f069df18b500', 'Marco Rossi', '+393456789001', 'operator1@cafpcpoint.it', 0, '2026-03-11 17:23:58', NULL),
(3, 'operator2', 'operator2@cafpcpoint.it', '0192023a7bbd73250516f069df18b500', 'Giulia Bianchi', '+393456789002', 'operator2@cafpcpoint.it', 0, '2026-03-11 17:23:58', NULL),
(4, 'lawyer1', 'lawyer1@cafpcpoint.it', '0192023a7bbd73250516f069df18b500', 'Antonio Verdi', '+393456789003', 'lawyer1@cafpcpoint.it', 0, '2026-03-11 17:23:58', NULL),
(5, 'fenacyfida', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Richard Nicholson', '955', 'vuvidy@mailinator.com', 0, '2026-03-11 17:24:40', NULL),
(6, 'busiteki', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Alfonso Parks', '857', 'dyfekuvuko@mailinator.com', 0, '2026-03-13 14:46:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbookings`
--

CREATE TABLE `tblbookings` (
  `id` int(11) NOT NULL,
  `bookingNo` bigint(12) DEFAULT NULL,
  `fullName` varchar(150) DEFAULT NULL,
  `emailId` varchar(150) DEFAULT NULL,
  `phoneNumber` varchar(150) DEFAULT NULL,
  `bookingDate` date DEFAULT NULL,
  `bookingTime` time DEFAULT NULL,
  `noAdults` varchar(150) DEFAULT NULL COMMENT 'Service Category',
  `noChildrens` varchar(150) DEFAULT NULL COMMENT 'Tax ID',
  `tableId` int(11) DEFAULT NULL,
  `boookingStatus` varchar(150) DEFAULT NULL COMMENT 'Accepted/Rejected',
  `adminremark` varchar(250) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbookings`
--

INSERT INTO `tblbookings` (`id`, `bookingNo`, `fullName`, `emailId`, `phoneNumber`, `bookingDate`, `bookingTime`, `noAdults`, `noChildrens`, `tableId`, `boookingStatus`, `adminremark`, `postingDate`, `updationDate`) VALUES
(1, 1000000001, 'Giovanni Russo', 'giovanni.russo@email.it', '+393456789012', '2026-03-15', '09:00:00', 'CAF - Centro Assistenza Fiscale', 'RSSGNN85T10H501Z', 1, NULL, NULL, '2026-03-10 10:30:00', NULL),
(2, 1000000002, 'Maria Garcia', 'maria.garcia@email.es', '+393556789013', '2026-03-16', '10:00:00', 'Patronato', 'GRCMRA90T10H501Z', 2, NULL, NULL, '2026-03-10 11:00:00', NULL),
(3, 1000000003, 'Ahmed Hassan', 'ahmed.hassan@email.com', '+393456789014', '2026-03-17', '11:00:00', 'Immigrazione', 'HSSMHD85T10H501Z', 1, NULL, NULL, '2026-03-10 12:00:00', NULL),
(4, 1000000004, 'Li Wei', 'li.wei@email.cn', '+393456789015', '2026-03-18', '14:00:00', 'Consulenza del Lavoro', 'WXILIU90T10H501Z', 3, NULL, NULL, '2026-03-10 14:00:00', NULL),
(5, 1000000005, 'Olga Petrov', 'olga.petrov@email.ru', '+393456789016', '2026-03-19', '15:00:00', 'Impresa - Commercialista', 'PTROLG88T10H501Z', 2, NULL, NULL, '2026-03-10 15:30:00', NULL),
(6, 1000000006, 'John Smith', 'john.smith@email.uk', '+393456789017', '2026-03-20', '09:30:00', 'CAF - Centro Assistenza Fiscale', 'SMHJHN90T10H501Z', 1, NULL, NULL, '2026-03-10 16:00:00', NULL),
(7, 1000000007, 'Fatima Al-Hassan', 'fatima.hassan@email.ae', '+393456789018', '2026-03-12', '10:00:00', 'Patronato', 'HSNFAT85T10H501Z', 1, 'Accepted', 'Documents verified. Appointment confirmed.', '2026-03-08 09:00:00', NULL),
(8, 1000000008, 'Carlos Rodriguez', 'carlos.rodriguez@email.es', '+393456789019', '2026-03-12', '11:00:00', 'Immigrazione', 'RDRCRL88T10H501Z', 2, 'Accepted', 'Pending documents received.', '2026-03-08 10:00:00', NULL),
(9, 1000000009, 'Anna Mueller', 'anna.mueller@email.de', '+393456789020', '2026-03-13', '09:00:00', 'CAF - Centro Assistenza Fiscale', 'MLRANN92T10H501Z', 1, 'Accepted', 'Tax declaration scheduled.', '2026-03-07 11:00:00', NULL),
(10, 1000000010, 'Roberto Colombo', 'roberto.colombo@email.it', '+393456789021', '2026-03-13', '14:00:00', 'Consulenza del Lavoro', 'CLBRRT87T10H501Z', 3, 'Accepted', 'Employment verification completed.', '2026-03-07 14:00:00', NULL),
(11, 1000000011, 'Yuki Tanaka', 'yuki.tanaka@email.jp', '+393456789022', '2026-03-14', '10:30:00', 'Impresa - Commercialista', 'TNKYKI89T10H501Z', 2, 'Accepted', 'Business registration confirmed.', '2026-03-09 08:00:00', NULL),
(12, 1000000012, 'Sofia Lombardi', 'sofia.lombardi@email.it', '+393456789023', '2026-03-14', '15:00:00', 'Avvocato', 'LMBSFO91T10H501Z', 1, 'Accepted', 'Legal consultation scheduled.', '2026-03-09 09:30:00', NULL),
(13, 1000000013, 'Mohammed Ali', 'mohammed.ali@email.eg', '+393456789024', '2026-03-15', '11:00:00', 'Immigrazione', 'ALIMHD86T10H501Z', 4, 'Accepted', 'Residency permit appointment set.', '2026-03-09 10:00:00', NULL),
(14, 1000000014, 'Pablo Sanchez', 'pablo.sanchez@email.es', '+393456789025', '2026-03-10', '09:00:00', 'CAF - Centro Assistenza Fiscale', 'SNCPLA88T10H501Z', 1, 'Rejected', 'Missing required documents.', '2026-03-05 10:00:00', NULL),
(15, 1000000015, 'Elena Volkov', 'elena.volkov@email.ru', '+393456789026', '2026-03-11', '10:00:00', 'Patronato', 'VLKELN87T10H501Z', 2, 'Rejected', 'Service not available at this location.', '2026-03-06 11:00:00', NULL),
(16, 1000000016, 'Klaus Weber', 'klaus.weber@email.de', '+393456789027', '2026-03-10', '14:00:00', 'Impresa - Commercialista', 'WBRKLS90T10H501Z', 3, 'Rejected', 'Please contact our Milan office for this service.', '2026-03-05 15:00:00', NULL),
(17, 1000000017, 'Priya Sharma', 'priya.sharma@email.in', '+393456789028', '2026-03-10', '15:00:00', 'Avvocato', 'SHRPRY89T10H501Z', 1, 'Rejected', 'Please rebook with correct service category.', '2026-03-05 16:00:00', NULL),
(18, 1000000018, 'Lucas Martin', 'lucas.martin@email.fr', '+393456789029', '2026-03-11', '09:30:00', 'CAF - Centro Assistenza Fiscale', 'MRTLCS91T10H501Z', 2, 'Rejected', 'Duplicate booking entry.', '2026-03-06 09:00:00', NULL),
(19, 1665159423, 'Colton Herring', 'lihamole@mailinator.com', '+1 (203) 376-4724', '1977-08-04', '07:06:00', '23', '15', 1, 'Accepted', 'test', '2026-03-13 14:43:04', '2026-03-13 14:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblrestables`
--

CREATE TABLE `tblrestables` (
  `id` int(11) NOT NULL,
  `tableNumber` varchar(50) DEFAULT NULL,
  `AddedBy` int(11) DEFAULT NULL,
  `AdminName` varchar(150) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrestables`
--

INSERT INTO `tblrestables` (`id`, `tableNumber`, `AddedBy`, `AdminName`, `creationDate`) VALUES
(1, 'A1 - ROME (Head Office)', 1, 'Super Admin', '2026-01-01 10:00:00'),
(2, 'A2 - ROME (Branch Office)', 1, 'Super Admin', '2026-01-01 10:00:00'),
(3, 'A3 - ROME (North Branch)', 1, 'Super Admin', '2026-01-01 10:00:00'),
(4, 'A4 - MILAN (Branch Office)', 1, 'Super Admin', '2026-01-01 10:00:00'),
(5, 'A5 - NAPLES (Branch Office)', 1, 'Super Admin', '2026-01-01 10:00:00'),
(6, 'Subrata Kumar Bhowmik', 1, NULL, '2026-03-13 14:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblservicepoints`
--

CREATE TABLE `tblservicepoints` (
  `id` int(11) NOT NULL,
  `pointCode` varchar(50) DEFAULT NULL,
  `pointName` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservicepoints`
--

INSERT INTO `tblservicepoints` (`id`, `pointCode`, `pointName`, `address`, `phone`, `email`, `isActive`, `createdDate`) VALUES
(1, 'A1', 'ROME (Head Office)', 'Via di S. Croce in Gerusalemme, 99, 00185 Roma, RM, Italy', '+390698382211', 'a1@cafpcpoint.it', 1, '2026-03-11 17:23:58'),
(2, 'A2', 'ROME (Branch Office)', 'Via Tuscolana, 00175 Roma, Italy', '+390698382212', 'a2@cafpcpoint.it', 1, '2026-03-11 17:23:58'),
(3, 'A3', 'ROME (North Branch)', 'Via Flaminia, 00196 Roma, Italy', '+390698382213', 'a3@cafpcpoint.it', 1, '2026-03-11 17:23:58'),
(4, 'A4', 'MILAN (Branch Office)', 'Via Garibaldi, 20124 Milano, MI, Italy', '+39026938221', 'a4@cafpcpoint.it', 1, '2026-03-11 17:23:58'),
(5, 'A5', 'NAPLES (Branch Office)', 'Via Toledo, 80132 Napoli, NA, Italy', '+39081678221', 'a5@cafpcpoint.it', 1, '2026-03-11 17:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `id` int(11) NOT NULL,
  `serviceName` varchar(200) DEFAULT NULL,
  `serviceDescription` text DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`id`, `serviceName`, `serviceDescription`, `isActive`, `createdDate`) VALUES
(1, 'CAF - Centro Assistenza Fiscale', 'Fiscal assistance and tax declaration services', 1, '2026-03-11 17:23:58'),
(2, 'Consulenza del Lavoro', 'Labor consulting and employment services', 1, '2026-03-11 17:23:58'),
(3, 'Patronato', 'Social welfare and pension assistance', 1, '2026-03-11 17:23:58'),
(4, 'Immigrazione', 'Immigration and residency permit services', 1, '2026-03-11 17:23:58'),
(5, 'Impresa - Commercialista', 'Business accounting and financial services', 1, '2026-03-11 17:23:58'),
(6, 'Servizi Vari', 'Various other services', 1, '2026-03-11 17:23:58'),
(7, 'Pagamento', 'Payment and bill services', 1, '2026-03-11 17:23:58'),
(8, 'Avvocato', 'Legal consultation services', 1, '2026-03-11 17:23:58');

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
-- Indexes for table `tblservicepoints`
--
ALTER TABLE `tblservicepoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblservicepoints`
--
ALTER TABLE `tblservicepoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
