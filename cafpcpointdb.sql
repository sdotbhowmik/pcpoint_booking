-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2026 at 09:32 AM
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
(1, 'admin', 'admin@cafpcpoint.it', '0192023a7bbd73250516f069df18b500', 'Super Admin', '+390687880399', 'admin@cafpcpoint.it', 1, '2026-03-14 18:59:55', NULL),
(2, 'operator1', 'operator1@cafpcpoint.it', '0192023a7bbd73250516f069df18b500', 'Marco Rossi', '+393456789001', 'operator1@cafpcpoint.it', 0, '2026-03-14 18:59:55', NULL),
(3, 'operator2', 'operator2@cafpcpoint.it', '0192023a7bbd73250516f069df18b500', 'Giulia Bianchi', '+393456789002', 'operator2@cafpcpoint.it', 0, '2026-03-14 18:59:55', NULL),
(4, 'lawyer1', 'lawyer1@cafpcpoint.it', '0192023a7bbd73250516f069df18b500', 'Antonio Verdi', '+393456789003', 'lawyer1@cafpcpoint.it', 0, '2026-03-14 18:59:55', NULL);

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
(1, 1000000001, 'Giovanni Russo', 'giovanni.russo@email.it', '+393456789012', '2026-03-15', '09:00:00', 'CAF - Centro Assistenza Fiscale', 'RSSGNN85T10H501Z', 1, NULL, NULL, '2026-03-10 04:30:00', NULL),
(2, 1000000002, 'Maria Garcia', 'maria.garcia@email.es', '+393556789013', '2026-03-16', '10:00:00', 'Patronato', 'GRCMRA90T10H501Z', 2, NULL, NULL, '2026-03-10 05:00:00', NULL),
(3, 1000000003, 'Ahmed Hassan', 'ahmed.hassan@email.com', '+393456789014', '2026-03-17', '11:00:00', 'Immigrazione', 'HSSMHD85T10H501Z', 1, NULL, NULL, '2026-03-10 06:00:00', NULL),
(4, 1000000004, 'Li Wei', 'li.wei@email.cn', '+393456789015', '2026-03-18', '14:00:00', 'Consulenza del Lavoro', 'WXILIU90T10H501Z', 3, NULL, NULL, '2026-03-10 08:00:00', NULL),
(5, 1000000005, 'Olga Petrov', 'olga.petrov@email.ru', '+393456789016', '2026-03-19', '15:00:00', 'Impresa - Commercialista', 'PTROLG88T10H501Z', 2, NULL, NULL, '2026-03-10 09:30:00', NULL),
(6, 1000000006, 'John Smith', 'john.smith@email.uk', '+393456789017', '2026-03-20', '09:30:00', 'CAF - Centro Assistenza Fiscale', 'SMHJHN90T10H501Z', 1, NULL, NULL, '2026-03-10 10:00:00', NULL),
(7, 1000000007, 'Fatima Al-Hassan', 'fatima.hassan@email.ae', '+393456789018', '2026-03-12', '10:00:00', 'Patronato', 'HSNFAT85T10H501Z', 1, 'Accepted', 'Documents verified. Appointment confirmed.', '2026-03-08 03:00:00', NULL),
(8, 1000000008, 'Carlos Rodriguez', 'carlos.rodriguez@email.es', '+393456789019', '2026-03-12', '11:00:00', 'Immigrazione', 'RDRCRL88T10H501Z', 2, 'Accepted', 'Pending documents received.', '2026-03-08 04:00:00', NULL),
(9, 1000000009, 'Anna Mueller', 'anna.mueller@email.de', '+393456789020', '2026-03-13', '09:00:00', 'CAF - Centro Assistenza Fiscale', 'MLRANN92T10H501Z', 1, 'Accepted', 'Tax declaration scheduled.', '2026-03-07 05:00:00', NULL),
(10, 1000000010, 'Roberto Colombo', 'roberto.colombo@email.it', '+393456789021', '2026-03-13', '14:00:00', 'Consulenza del Lavoro', 'CLBRRT87T10H501Z', 3, 'Accepted', 'Employment verification completed.', '2026-03-07 08:00:00', NULL),
(11, 1000000011, 'Yuki Tanaka', 'yuki.tanaka@email.jp', '+393456789022', '2026-03-14', '10:30:00', 'Impresa - Commercialista', 'TNKYKI89T10H501Z', 2, 'Accepted', 'Business registration confirmed.', '2026-03-09 02:00:00', NULL),
(12, 1000000012, 'Sofia Lombardi', 'sofia.lombardi@email.it', '+393456789023', '2026-03-14', '15:00:00', 'Avvocato', 'LMBSFO91T10H501Z', 1, 'Accepted', 'Legal consultation scheduled.', '2026-03-09 03:30:00', NULL),
(13, 1000000013, 'Mohammed Ali', 'mohammed.ali@email.eg', '+393456789024', '2026-03-15', '11:00:00', 'Immigrazione', 'ALIMHD86T10H501Z', 4, 'Accepted', 'Residency permit appointment set.', '2026-03-09 04:00:00', NULL),
(14, 1000000014, 'Pablo Sanchez', 'pablo.sanchez@email.es', '+393456789025', '2026-03-10', '09:00:00', 'CAF - Centro Assistenza Fiscale', 'SNCPLA88T10H501Z', 1, 'Rejected', 'Missing required documents.', '2026-03-05 04:00:00', NULL),
(15, 1000000015, 'Elena Volkov', 'elena.volkov@email.ru', '+393456789026', '2026-03-11', '10:00:00', 'Patronato', 'VLKELN87T10H501Z', 2, 'Rejected', 'Service not available at this location.', '2026-03-06 05:00:00', NULL),
(16, 1000000016, 'Klaus Weber', 'klaus.weber@email.de', '+393456789027', '2026-03-10', '14:00:00', 'Impresa - Commercialista', 'WBRKLS90T10H501Z', 3, 'Rejected', 'Please contact our Milan office for this service.', '2026-03-05 09:00:00', NULL),
(17, 1000000017, 'Priya Sharma', 'priya.sharma@email.in', '+393456789028', '2026-03-10', '15:00:00', 'Avvocato', 'SHRPRY89T10H501Z', 1, 'Rejected', 'Please rebook with correct service category.', '2026-03-05 10:00:00', NULL),
(18, 1000000018, 'Lucas Martin', 'lucas.martin@email.fr', '+393456789029', '2026-03-11', '09:30:00', 'CAF - Centro Assistenza Fiscale', 'MRTLCS91T10H501Z', 2, 'Rejected', 'Duplicate booking entry.', '2026-03-06 03:00:00', NULL),
(19, 466335470, 'Carson Sears', 'tucy@mailinator.com', '+1 (367) 619-5512', '2022-02-17', '06:38:00', '86', '47', NULL, NULL, NULL, '2026-03-15 04:54:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblceo`
--

CREATE TABLE `tblceo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `signature` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblceo`
--

INSERT INTO `tblceo` (`id`, `name`, `title`, `message`, `photo`, `signature`, `created_at`, `updated_at`) VALUES
(1, 'Nibash Chakraborty', 'Chief Executive Officer', 'We are here to help immigrants and residents with important services in Italy. Our platform makes it easy for you to get professional help with CAF (Fiscal Assistance Centers) for tax and financial matters, as well as Patronato services for social welfare support. We also assist with immigration-related processes, making it easier for you to manage your legal and administrative tasks in Italy.', '1773545714_c3f9ba44.jpg', '', '2026-03-14 18:59:56', '2026-03-15 03:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactmessages`
--

CREATE TABLE `tblcontactmessages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblfaq`
--

CREATE TABLE `tblfaq` (
  `id` int(11) NOT NULL,
  `question` varchar(300) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `order_num` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfaq`
--

INSERT INTO `tblfaq` (`id`, `question`, `answer`, `order_num`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'What services do you offer?', 'We provide CAF (Tax Assistance), Patronato (Social Services), Immigration Services, Accounting, and Legal Advice.', 1, 1, '2026-03-14 18:59:56', NULL),
(2, 'How do I book an appointment?', 'You can book an appointment directly through our online booking system or visit one of our offices.', 2, 1, '2026-03-14 18:59:56', NULL),
(3, 'What documents do I need for tax assistance?', 'Bring your ID, income documents, and any previous tax returns. Our staff will guide you through the process.', 3, 1, '2026-03-14 18:59:56', NULL),
(4, 'Do you offer immigration assistance?', 'Yes, we provide comprehensive immigration services including permit applications and renewals.', 4, 1, '2026-03-14 18:59:56', NULL),
(5, 'What are your working hours?', 'Monday - Friday: 9:00 AM - 6:00 PM | Saturday: 10:00 AM - 4:00 PM', 5, 1, '2026-03-14 18:59:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeatures`
--

CREATE TABLE `tblfeatures` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `title_bn` varchar(100) DEFAULT NULL,
  `title_it` varchar(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `description_bn` varchar(250) DEFAULT NULL,
  `description_it` varchar(250) DEFAULT NULL,
  `modal_content` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT 'fa-star',
  `link` varchar(200) DEFAULT '#',
  `order_num` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfeatures`
--

INSERT INTO `tblfeatures` (`id`, `title`, `title_bn`, `title_it`, `description`, `description_bn`, `description_it`, `modal_content`, `icon`, `link`, `order_num`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'CAF', 'CAF সেবা', 'Servizi CAF', 'CAF Services', 'CAF সেবাসমূহ', 'Servizi CAF', '[{\"name\":\"Modello 730\",\"desc\":\"Income tax return\"},...]', 'fa-file-invoice-dollar', '#', 1, 1, '2026-03-14 18:59:56', '2026-03-15 07:16:41'),
(2, 'Patronato', 'সামাজিক নিরাপত্তা', 'Servizi Patronato', 'Social Services', 'সামাজিক নিরাপত্তা সেবা', 'Servizi di Previdenza Sociale', '[{\"name\": \"Pensioni INPS / Invalidita\", \"desc\": \"Pensions and disability benefits\"}, {\"name\": \"NASpI / Disoccupazione\", \"desc\": \"Unemployment benefits\"}, {\"name\": \"Assegno Unico Familiare\", \"desc\": \"Family and child support\"}, {\"name\": \"Maternita / Bonus\", \"desc\": \"Maternity allowance\"}, {\"name\": \"Prestazioni Sociali\", \"desc\": \"Social security benefits\"}]', 'fa-handshake', '#', 2, 1, '2026-03-14 18:59:56', '2026-03-15 06:50:05'),
(3, 'Immigration', 'অভিবাসন', 'Servizi di Immigrazione', 'Immigration Services', 'অভিবাসন সেবা', 'Servizi di Immigrazione', '[{\"name\": \"Rinnovo Permesso Soggiorno\", \"desc\": \"Residence permit renewal\"}, {\"name\": \"Cittadinanza Italiana\", \"desc\": \"Italian citizenship application\"}, {\"name\": \"Ricongiungimento Famigliare\", \"desc\": \"Family reunification\"}, {\"name\": \"Visti d Ingresso\", \"desc\": \"Entry visas for Italy\"}, {\"name\": \"Conversioni Permessi\", \"desc\": \"Permit conversions\"}]', 'fa-passport', '#', 3, 1, '2026-03-14 18:59:56', '2026-03-15 06:50:05'),
(4, 'Courses', 'কোর্সসমূহ', 'Corsi', 'Professional Courses', 'পেশাদার কোর্স', 'Corsi Professionali', '[{\"name\": \"Italian Language Courses\", \"desc\": \"Learn Italian from beginner to advanced level\"}, {\"name\": \"Computer Training\", \"desc\": \"Basic and advanced computer skills\"}, {\"name\": \"Tax Preparation Classes\", \"desc\": \"Tax filing and preparation training\"}, {\"name\": \"Immigration Document Prep\", \"desc\": \"Document preparation for immigration\"}, {\"name\": \"Business Management\", \"desc\": \"Small business management and accounting\"}]', 'fa-graduation-cap', 'https://corsi.cafpcpoint.it/', 4, 1, '2026-03-14 18:59:56', '2026-03-15 07:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblfooter_content`
--

CREATE TABLE `tblfooter_content` (
  `id` int(11) NOT NULL,
  `about_text` text DEFAULT NULL,
  `about_text_bn` text DEFAULT NULL,
  `contact_address` varchar(250) DEFAULT NULL,
  `contact_phone` varchar(50) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfooter_content`
--

INSERT INTO `tblfooter_content` (`id`, `about_text`, `about_text_bn`, `contact_address`, `contact_phone`, `contact_email`, `website`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, '', '', 'Via Flavio Stilicone 11, 00175 Roma', '39 068 788 0399', 'info@cafpcpoint.it', 'www.cafpcpoint.it', '390687880399', '2026-03-14 18:59:56', '2026-03-15 03:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblhero_slides`
--

CREATE TABLE `tblhero_slides` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `cta_text` varchar(100) DEFAULT NULL,
  `cta_link` varchar(200) DEFAULT '#',
  `image` varchar(200) DEFAULT NULL,
  `order_num` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblhero_slides`
--

INSERT INTO `tblhero_slides` (`id`, `title`, `subtitle`, `cta_text`, `cta_link`, `image`, `order_num`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Your Trusted Partner for Italian Services', 'Professional assistance with CAF, Patronato, Tax Services, and Immigration support in Italy', 'Book Appointment', 'book.php', '1773551303_0fc0eb72.jpeg', 1, 1, '2026-03-14 18:59:56', '2026-03-15 05:08:23'),
(2, 'CAF Services Made Easy', 'Expert tax assistance and fiscal consulting for individuals and businesses', 'Learn More', '#services', '1773551340_652f7b6f.jpeg', 2, 1, '2026-03-14 18:59:56', '2026-03-15 05:09:00'),
(3, 'Immigration Services', 'Complete support for permits, citizenship, and residency matters', 'Contact Us', '#contact', '1773550646_4df1d725.jpeg', 3, 1, '2026-03-14 18:59:56', '2026-03-15 04:57:26'),
(4, 'Patronato Social Services', 'Social welfare and pension assistance for all your needs', 'Get Started', '#contact', '1773550656_5b143ace.jpeg', 4, 1, '2026-03-14 18:59:56', '2026-03-15 04:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblnavbar_links`
--

CREATE TABLE `tblnavbar_links` (
  `id` int(11) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `label_en` varchar(50) DEFAULT NULL,
  `label_it` varchar(50) DEFAULT NULL,
  `label_bn` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `order_num` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnavbar_links`
--

INSERT INTO `tblnavbar_links` (`id`, `label`, `label_en`, `label_it`, `label_bn`, `url`, `order_num`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Services', 'Services', 'Servizi', 'সেবা', '#services', 1, 1, '2026-03-14 18:59:56', NULL),
(2, 'Locations', 'Locations', 'Sedi', 'অবস্থান', '#locations', 2, 1, '2026-03-14 18:59:56', NULL),
(3, 'Contact', 'Contact', 'Contatti', 'যোগাযোগ', '#contact', 3, 1, '2026-03-14 18:59:56', NULL),
(4, 'Book Now', 'Book Now', 'Prenota', 'বুক করুন', 'book.php', 4, 1, '2026-03-14 18:59:56', NULL),
(5, 'Web Mail', 'Web Mail', 'Web Mail', 'ওয়েব মেইল', 'webmail.php', 5, 1, '2026-03-14 18:59:56', NULL);

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
(1, 'A1 - ROME (Head Office)', 1, 'Super Admin', '2026-01-01 04:00:00'),
(2, 'A2 - ROME (Branch Office)', 1, 'Super Admin', '2026-01-01 04:00:00'),
(3, 'A3 - ROME (North Branch)', 1, 'Super Admin', '2026-01-01 04:00:00'),
(4, 'A4 - MILAN (Branch Office)', 1, 'Super Admin', '2026-01-01 04:00:00'),
(5, 'A5 - NAPLES (Branch Office)', 1, 'Super Admin', '2026-01-01 04:00:00');

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
(1, 'A1', 'ROME (Head Office)', 'Via di S. Croce in Gerusalemme, 99, 00185 Roma, RM, Italy', '+390698382211', 'a1@cafpcpoint.it', 1, '2026-03-14 18:59:55'),
(2, 'A2', 'ROME (Branch Office)', 'Via Tuscolana, 00175 Roma, Italy', '+390698382212', 'a2@cafpcpoint.it', 1, '2026-03-14 18:59:55'),
(3, 'A3', 'ROME (North Branch)', 'Via Flaminia, 00196 Roma, Italy', '+390698382213', 'a3@cafpcpoint.it', 1, '2026-03-14 18:59:55'),
(4, 'A4', 'MILAN (Branch Office)', 'Via Garibaldi, 20124 Milano, MI, Italy', '+39026938221', 'a4@cafpcpoint.it', 1, '2026-03-14 18:59:55'),
(5, 'A5', 'NAPLES (Branch Office)', 'Via Toledo, 80132 Napoli, NA, Italy', '+39081678221', 'a5@cafpcpoint.it', 1, '2026-03-14 18:59:55');

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
(1, 'CAF - Centro Assistenza Fiscale', 'Fiscal assistance and tax declaration services', 1, '2026-03-14 18:59:55'),
(2, 'Consulenza del Lavoro', 'Labor consulting and employment services', 1, '2026-03-14 18:59:55'),
(3, 'Patronato', 'Social welfare and pension assistance', 1, '2026-03-14 18:59:55'),
(4, 'Immigrazione', 'Immigration and residency permit services', 1, '2026-03-14 18:59:55'),
(5, 'Impresa - Commercialista', 'Business accounting and financial services', 1, '2026-03-14 18:59:55'),
(6, 'Servizi Vari', 'Various other services', 1, '2026-03-14 18:59:55'),
(7, 'Pagamento', 'Payment and bill services', 1, '2026-03-14 18:59:55'),
(8, 'Avvocato', 'Legal consultation services', 1, '2026-03-14 18:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblservice_categories`
--

CREATE TABLE `tblservice_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `name_bn` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT 'fa-star',
  `description` text DEFAULT NULL,
  `order_num` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservice_categories`
--

INSERT INTO `tblservice_categories` (`id`, `name`, `name_bn`, `icon`, `description`, `order_num`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'CAF - Centro Assistenza Fiscale', 'কর সহায়তা', 'fa-file-invoice-dollar', 'Fiscal assistance and tax declaration services', 1, 1, '2026-03-14 18:59:56', NULL),
(2, 'Consulenza del Lavoro', 'শ্রম পরামর্শ', 'fa-calculator', 'Labor consulting and employment services', 2, 1, '2026-03-14 18:59:56', NULL),
(3, 'Patronato', 'সামাজিক নিরাপত্তা', 'fa-handshake', 'Social welfare and pension assistance', 3, 1, '2026-03-14 18:59:56', NULL),
(4, 'Immigrazione', 'অভিবাসন', 'fa-passport', 'Immigration and residency permit services', 4, 1, '2026-03-14 18:59:56', NULL),
(5, 'Impresa - Commercialista', 'ব্যবসা পরিচালন', 'fa-briefcase', 'Business accounting and financial services', 5, 1, '2026-03-14 18:59:56', NULL),
(6, 'Geometra', 'কারিগরি সেবা', 'fa-ruler-combined', 'Technical and housing services', 6, 1, '2026-03-14 18:59:56', NULL),
(7, 'Avvocato', 'আইনজীবী', 'fa-gavel', 'Legal consultation services', 7, 1, '2026-03-14 18:59:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblservice_items`
--

CREATE TABLE `tblservice_items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `name_bn` varchar(150) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `description_bn` varchar(250) DEFAULT NULL,
  `order_num` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservice_items`
--

INSERT INTO `tblservice_items` (`id`, `category_id`, `name`, `name_bn`, `description`, `description_bn`, `order_num`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Modello 730 / Unico', 'আয়কর জমা', 'Income tax declaration', 'আয়কর সনদ', 1, 1, '2026-03-14 18:59:56', NULL),
(2, 1, 'ISEE / ISEEU', 'আর্থিক অবস্থার সনদ', 'Financial situation certificate', 'আর্থিক অবস্থা সার্টিফিকেট', 2, 1, '2026-03-14 18:59:56', NULL),
(3, 1, 'IMU / TASI / TARI', 'হাউজিং ট্যাক্স', 'Housing taxes', 'বাড়ির কর', 3, 1, '2026-03-14 18:59:56', NULL),
(4, 1, 'Successioni / Voltures', 'উত্তরাধিকার', 'Inheritance and name changes', 'উত্তরাধিকার ও নাম পরিবর্তন', 4, 1, '2026-03-14 18:59:56', NULL),
(5, 2, 'Payroll Management', 'বেতন ব্যবস্থাপনা', 'Employee payroll processing', 'কর্মচারী বেতন প্রক্রিয়াকরণ', 1, 1, '2026-03-14 18:59:56', NULL),
(6, 2, 'Contracts', 'চুক্তি', 'Employment contract management', 'কর্মচারী চুক্তি ব্যবস্থাপনা', 2, 1, '2026-03-14 18:59:56', NULL),
(7, 3, 'Pensioni INPS / Invalidità', 'পেনশন', 'Pension and disability benefits', 'পেনশন ও অক্ষমতা ভাতা', 1, 1, '2026-03-14 18:59:56', NULL),
(8, 3, 'NASpI / Disoccupazione', 'বেকার ভাতা', 'Unemployment benefits', 'বেকার ভাতা আবেদন', 2, 1, '2026-03-14 18:59:56', NULL),
(9, 3, 'Assegno Unico Familiare', 'পারিবারিক সহায়তা', 'Family allowance', 'পারিবারিক শিশু সহায়তা', 3, 1, '2026-03-14 18:59:56', NULL),
(10, 4, 'Rinnovo Permesso Soggiorno', 'সোজিনো নবায়ন', 'Residence permit renewal', 'বসবাসের অনুমতি নবায়ন', 1, 1, '2026-03-14 18:59:56', NULL),
(11, 4, 'Cittadinanza Italiana', 'ইতালীয় নাগরিকত্ব', 'Italian citizenship', 'ইতালীয় নাগরিকত্ব', 2, 1, '2026-03-14 18:59:56', NULL),
(12, 4, 'Ricongiungimento Famigliare', 'পরিবার পুনর্মিলন', 'Family reunification', 'পরিবার পুনর্মিলন', 3, 1, '2026-03-14 18:59:56', NULL),
(13, 5, 'Apertura Partita IVA', 'পার্টিতা ইভা', 'VAT number registration', 'ভ্যাট নম্বর নিবন্ধন', 1, 1, '2026-03-14 18:59:56', NULL),
(14, 5, 'SCIA / Licenze Comunali', 'ট্রেড লাইসেন্স', 'Business licenses', 'ব্যবসা লাইসেন্স', 2, 1, '2026-03-14 18:59:56', NULL),
(15, 5, 'Fatturazione Elettronica', 'ইলেকট্রনিক ইনভয়েস', 'Electronic invoicing', 'ইলেকট্রনিক চালান', 3, 1, '2026-03-14 18:59:56', NULL),
(16, 6, 'Catasto / Visures', 'জমি রেকর্ড', 'Land and property records', 'জমি ও সম্পত্তি রেকর্ড', 1, 1, '2026-03-14 18:59:56', NULL),
(17, 6, 'Certificazione APE', 'এনার্জি সনদ', 'Energy certificate', 'শক্তি সনদ', 2, 1, '2026-03-14 18:59:56', NULL),
(18, 7, 'Consulenza Legale', 'আইনি পরামর্শ', 'Legal consultation', 'আইনি পরামর্শ', 1, 1, '2026-03-14 18:59:56', NULL),
(19, 7, 'Diritto del Lavoro', 'শ্রমিক অধিকার', 'Labor law', 'শ্রম আইন', 2, 1, '2026-03-14 18:59:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsettings`
--

CREATE TABLE `tblsettings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsettings`
--

INSERT INTO `tblsettings` (`id`, `setting_key`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'CAF PC POINT', '2026-03-14 18:59:56', NULL),
(2, 'site_tagline', 'Your Trusted Partner for Italian Immigration and Taxation Services', '2026-03-14 18:59:56', '2026-03-15 03:57:49'),
(3, 'site_email', 'info@cafpcpoint.it', '2026-03-14 18:59:56', NULL),
(4, 'site_phone', '39 068 788 0399', '2026-03-14 18:59:56', '2026-03-15 03:58:43'),
(5, 'site_address', 'Via Flavio Stilicone 11, 00175 Roma', '2026-03-14 18:59:56', NULL),
(6, 'site_website', 'www.cafpcpoint.it', '2026-03-14 18:59:56', NULL),
(7, 'contact_email', 'info@cafpcpoint.it', '2026-03-14 18:59:56', NULL),
(8, 'whatsapp_number', '390687880399', '2026-03-14 18:59:56', '2026-03-15 03:58:43'),
(9, 'default_language', 'it', '2026-03-14 18:59:56', NULL),
(10, 'timezone', 'Europe/Rome', '2026-03-14 18:59:56', NULL),
(11, 'date_format', 'Y-m-d', '2026-03-14 18:59:56', NULL),
(12, 'time_format', 'H:i', '2026-03-14 18:59:56', NULL),
(13, 'currency', 'EUR', '2026-03-14 18:59:56', NULL),
(14, 'logo', '1773545008_98468a1f.png', '2026-03-14 18:59:56', '2026-03-15 03:23:28'),
(15, 'favicon', '', '2026-03-14 18:59:56', NULL),
(16, 'footer_about_text', 'We are a group formed to provide citizens and businesses with a comprehensive range of administrative and contributory services.', '2026-03-14 18:59:56', NULL),
(17, 'footer_about_text_bn', 'আমরা নাগরিক এবং প্রতিষ্ঠানগুলিকে প্রশাসনিক এবং অবদানকারী পরিষেবার একটি ব্যাপক পরিসর প্রদান করার জন্য একটি গঠন।', '2026-03-14 18:59:56', NULL),
(18, 'booking_availability_start', '09:00', '2026-03-14 18:59:56', NULL),
(19, 'booking_availability_end', '18:00', '2026-03-14 18:59:56', NULL),
(20, 'booking_slot_duration', '30', '2026-03-14 18:59:56', NULL),
(21, 'max_advance_booking_days', '30', '2026-03-14 18:59:56', NULL),
(22, 'email_notifications', '1', '2026-03-14 18:59:56', NULL),
(23, 'auto_approve_booking', '0', '2026-03-14 18:59:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsocial`
--

CREATE TABLE `tblsocial` (
  `id` int(11) NOT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `icon` varchar(50) DEFAULT 'fa-facebook',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsocial`
--

INSERT INTO `tblsocial` (`id`, `platform`, `url`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://facebook.com/cafpcpoint', 'fa-facebook-f', 1, '2026-03-14 18:59:56', NULL),
(2, 'WhatsApp', 'https://wa.me/390687880399', 'fa-whatsapp', 1, '2026-03-14 18:59:56', NULL),
(3, 'Phone', 'tel:+390687880399', 'fa-whatsapp', 1, '2026-03-14 18:59:56', '2026-03-15 02:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblstats`
--

CREATE TABLE `tblstats` (
  `id` int(11) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT 'fa-star',
  `order_num` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstats`
--

INSERT INTO `tblstats` (`id`, `label`, `value`, `icon`, `order_num`, `created_at`, `updated_at`) VALUES
(1, 'Year Started', '2020', 'fa-calendar', 1, '2026-03-14 18:59:56', NULL),
(2, 'Awards Won', '3', 'fa-trophy', 2, '2026-03-14 18:59:56', NULL),
(3, 'Years Experience', '6', 'fa-briefcase', 3, '2026-03-14 18:59:56', '2026-03-15 03:33:51'),
(4, 'Customers Served', '10000', 'fa-users', 4, '2026-03-14 18:59:56', '2026-03-15 03:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblthemes`
--

CREATE TABLE `tblthemes` (
  `id` int(11) NOT NULL,
  `theme_name` varchar(50) NOT NULL,
  `primary_color` varchar(20) NOT NULL,
  `secondary_color` varchar(20) NOT NULL,
  `accent_color` varchar(20) NOT NULL,
  `bg_dark` varchar(20) DEFAULT '#212529',
  `bg_light` varchar(20) DEFAULT '#f8f9fa',
  `text_dark` varchar(20) DEFAULT '#212529',
  `text_light` varchar(20) DEFAULT '#ffffff',
  `is_active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblthemes`
--

INSERT INTO `tblthemes` (`id`, `theme_name`, `primary_color`, `secondary_color`, `accent_color`, `bg_dark`, `bg_light`, `text_dark`, `text_light`, `is_active`, `created_at`) VALUES
(1, 'Green', '#228B22', '#1a6b1a', '#FFD700', '#212529', '#f8f9fa', '#212529', '#ffffff', 0, '2026-03-14 18:59:56'),
(2, 'Blue', '#0d6efd', '#0a58ca', '#ffc107', '#212529', '#f8f9fa', '#212529', '#ffffff', 1, '2026-03-14 18:59:56'),
(3, 'Purple', '#6f42c1', '#5a32a3', '#20c997', '#212529', '#f8f9fa', '#212529', '#ffffff', 0, '2026-03-14 18:59:56'),
(4, 'Orange', '#fd7e14', '#d96c00', '#20c997', '#212529', '#f8f9fa', '#212529', '#ffffff', 0, '2026-03-14 18:59:56'),
(5, 'Red', '#dc3545', '#bb2d3b', '#ffc107', '#212529', '#f8f9fa', '#212529', '#ffffff', 0, '2026-03-14 18:59:56'),
(6, 'Dark', '#343a40', '#212529', '#0dcaf0', '#1a1d20', '#2d3238', '#ffffff', '#adb5bd', 0, '2026-03-14 18:59:56');

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
-- Indexes for table `tblceo`
--
ALTER TABLE `tblceo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactmessages`
--
ALTER TABLE `tblcontactmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfaq`
--
ALTER TABLE `tblfaq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfeatures`
--
ALTER TABLE `tblfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfooter_content`
--
ALTER TABLE `tblfooter_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblhero_slides`
--
ALTER TABLE `tblhero_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnavbar_links`
--
ALTER TABLE `tblnavbar_links`
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
-- Indexes for table `tblservice_categories`
--
ALTER TABLE `tblservice_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservice_items`
--
ALTER TABLE `tblservice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsettings`
--
ALTER TABLE `tblsettings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `tblsocial`
--
ALTER TABLE `tblsocial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstats`
--
ALTER TABLE `tblstats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblthemes`
--
ALTER TABLE `tblthemes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblbookings`
--
ALTER TABLE `tblbookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblceo`
--
ALTER TABLE `tblceo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactmessages`
--
ALTER TABLE `tblcontactmessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblfaq`
--
ALTER TABLE `tblfaq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblfeatures`
--
ALTER TABLE `tblfeatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblfooter_content`
--
ALTER TABLE `tblfooter_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblhero_slides`
--
ALTER TABLE `tblhero_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblnavbar_links`
--
ALTER TABLE `tblnavbar_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblrestables`
--
ALTER TABLE `tblrestables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

--
-- AUTO_INCREMENT for table `tblservice_categories`
--
ALTER TABLE `tblservice_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblservice_items`
--
ALTER TABLE `tblservice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblsettings`
--
ALTER TABLE `tblsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tblsocial`
--
ALTER TABLE `tblsocial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstats`
--
ALTER TABLE `tblstats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblthemes`
--
ALTER TABLE `tblthemes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
