-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 04:55 AM
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
-- Database: `equipment_printer`
--

-- --------------------------------------------------------

--
-- Table structure for table `printer_models`
--

CREATE TABLE `printer_models` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `printer_brand_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `printer_models`
--

INSERT INTO `printer_models` (`id`, `name`, `printer_brand_id`) VALUES
(1, 'INK TANK 315', 1),
(2, 'P1102', 1),
(3, 'P1160', 1),
(4, 'P1006', 1),
(5, 'M203DN', 1),
(6, 'P107A', 1),
(7, 'PRO M12A', 1),
(8, 'OFFICEJET PRO 7720', 1),
(9, 'DCP-L3551CDW', 2),
(10, 'DCP-1510', 2),
(11, 'DCP-T310', 2),
(12, 'DCP-T220', 2),
(13, 'DCP-T720DW', 2),
(14, 'DCP-J100', 2),
(15, 'HL-L3270CDW', 2),
(16, 'HL-L2320D', 2),
(17, 'HL-L1210W', 2),
(18, 'HL-1210W', 2),
(19, 'MFC-L2715DW', 2),
(20, 'MFC-9140CDN', 2),
(21, 'MFC-J2320', 2),
(22, 'MFC-T920DW', 2),
(23, 'MFC-J2330DW', 2),
(24, 'LBP6000', 3),
(25, 'F158200', 3),
(26, 'E500', 3),
(27, 'E510', 3),
(28, 'IP1880', 3),
(29, 'IP1980', 3),
(30, 'PIXMA IP2770', 3),
(31, 'PIXMA G1010', 3),
(32, 'PIXMA MP287', 3),
(33, 'PIXMA G2000', 3),
(34, 'PIXMA G2010', 3),
(35, 'PIXMA G4010', 3),
(36, 'PIXMA IX6710', 3),
(37, 'PIXMA IX6870', 3),
(38, 'XEROX P265DW', 4),
(39, 'XEROX CP315DW', 4),
(40, 'XEROX CP305D', 4),
(41, 'L120', 5),
(42, 'L130', 5),
(43, 'L210', 5),
(44, 'L220', 5),
(45, 'L360', 5),
(46, 'K300', 5),
(47, 'K100', 5),
(48, 'PLQ-20', 5),
(49, 'LQ-590II', 5),
(50, 'L3110', 5),
(51, 'L3210', 5),
(52, 'L5190', 5),
(53, 'P2500W', 6),
(54, 'M6800FDW', 6),
(55, 'P3010DW', 6),
(56, 'HL-L2370DN', 2),
(57, 'L565', 5),
(58, 'L5190', 5),
(59, 'K100', 5),
(60, 'K200', 5),
(61, 'ENTERPRISE 700 PRINTER M712 SERIES', 1),
(62, 'P1005', 1),
(63, '1020', 1),
(64, 'T520', 1),
(65, 'TM-5300', 3),
(66, 'LASER LBP-1210', 3),
(67, 'LASER LBP-6000', 3),
(68, 'LASER LBP-6030', 3),
(69, 'LASER F158200', 3),
(70, 'M6800FDW', 6),
(71, 'MFC-J430W', 2),
(72, 'MFC-T920DW', 2),
(73, 'MFC-1815', 2),
(74, 'HL-L3170CDW', 2),
(75, 'PLQ-20', 5),
(76, 'LQ-590 II', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `printer_models`
--
ALTER TABLE `printer_models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `printer_models`
--
ALTER TABLE `printer_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
