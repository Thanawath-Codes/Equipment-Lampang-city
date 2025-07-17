-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 04:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equipment_monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `monitor_models`
--

CREATE TABLE `monitor_models` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `monitor_brand_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `monitor_models`
--

INSERT INTO `monitor_models` (`id`, `name`, `monitor_brand_id`) VALUES
(1, 'K202HQL', 1),
(2, 'V196HQL', 1),
(3, 'V206HQL', 1),
(4, 'VG220Q', 1),
(5, 'V202HL', 1),
(6, 'V203HL', 1),
(7, 'V247Y', 1),
(8, 'AL1711', 1),
(9, 'S230HL', 1),
(10, '22P', 2),
(11, 'V185E', 2),
(12, 'V24I-G5', 2),
(13, 'VP17', 2),
(14, 'FV584A', 2),
(15, '20WD', 2),
(16, '2009V', 2),
(17, 'L22E-40', 3),
(18, 'L1710', 2),
(19, 'HP2309M', 2),
(20, 'V20HD', 2),
(21, 'VP15S', 2),
(22, 'COMPAQ L1502', 2),
(23, '20KD', 2),
(24, 'W2072B', 2),
(25, 'E960SW', 5),
(26, 'THINKVISION S24E-20', 3),
(27, 'E2054A', 3),
(28, 'Y4299', 4),
(29, 'E170SC', 4),
(30, 'E2216H', 4),
(31, 'E960S', 5),
(32, 'E960SWN', 5),
(33, 'E2243FW', 5),
(34, 'E943FWS', 5),
(35, 'E970SWNL', 5),
(36, '20E1H', 5),
(37, 'E2180SW', 13),
(38, 'E1941SBN', 7),
(39, '19M38AB', 7),
(40, 'FLATRON E2040', 7),
(41, 'W2043SE', 7),
(42, 'GL950', 8),
(43, 'GL2023', 8),
(44, 'BRILLIANCE 175', 9),
(45, 'EX1920', 10),
(46, 'SYNCMASTER E1920', 10),
(47, 'SA300', 10),
(48, 'M9DLA', 6),
(49, 'VA2038WN', 11),
(50, 'VA2201-H', 11),
(51, 'LM19 A200', 12),
(52, 'E2070SWNE', 5),
(53, 'L1710', 2),
(54, 'Z24N-G3', 2),
(55, 'GL931', 8),
(56, 'K222HQL', 1),
(57, 'AL1716', 1),
(58, 'V18ES', 2),
(59, 'L1506', 2),
(60, 'SYNCMASTER 740N', 10),
(61, 'VH22 V9E67AA', 2),
(62, 'V247Y', 1),
(63, 'SYNCMASTER E1920', 10),
(64, 'SYNCMASTER S19B310', 10),
(65, 'FLATRON E2041', 7),
(66, 'COMPAQ LE1911', 2),
(67, '2309M', 2),
(68, 'MR410-B', 7),
(69, 'GW2283', 8),
(70, 'SYNCMASTER 940BW', 10),
(71, 'W2261V', 7),
(72, 'S230HLB', 1),
(73, 'S19B310B', 10),
(74, 'THINKVISION L12054A', 3),
(75, 'VG220Q', 1),
(76, '22YH', 2),
(77, 'E970SWNL', 5),
(78, 'SA241YABI', 1),
(79, 'G925HDA', 8),
(80, 'SE2422H', 4),
(81, 'E943FWS', 5),
(82, 'E1941S', 7),
(83, 'VA1903H', 11),
(84, 'L1742S-PF', 7),
(85, '19M38A-B', 7),
(86, '227E7QDSB', 9),
(87, 'E2423H', 4),
(88, 'E2180SWN', 5),
(89, 'ZR2240W', 2),
(90, 'VL2040', 8),
(91, 'E2180SWN', 6),
(92, 'G702AD', 8),
(93, 'COMPAQ LE1711', 2),
(94, 'V24G5', 3),
(95, 'V22I G5', 2),
(96, 'E200Q BI', 1),
(97, 'V227Q E3BI', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monitor_models`
--
ALTER TABLE `monitor_models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monitor_models`
--
ALTER TABLE `monitor_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
