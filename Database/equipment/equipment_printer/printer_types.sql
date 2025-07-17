-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 04:49 AM
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
-- Table structure for table `printer_types`
--

CREATE TABLE `printer_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `printer_model_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `printer_types`
--

INSERT INTO `printer_types` (`id`, `name`, `printer_model_id`) VALUES
(1, 'INKJET TANK ALL IN ONE', 1),
(2, 'LASERJET', 2),
(3, 'LASERJET', 3),
(4, 'LASERJET', 4),
(5, 'LASERJET', 5),
(6, 'LASERJET', 6),
(7, 'LASERJET', 7),
(8, 'INKJET TANK ALL IN ONE', 8),
(9, 'LASERJET', 9),
(10, 'LASERJET', 10),
(11, 'INKJET TANK ALL IN ONE', 11),
(12, 'INKJET TANK ALL IN ONE', 12),
(13, 'INKJET TANK ALL IN ONE', 13),
(14, 'INKJET ALL IN ONE', 14),
(15, 'LASERJET', 15),
(16, 'LASERJET', 16),
(17, 'LASERJET', 17),
(18, 'LASERJET', 18),
(19, 'LASERJET ALL IN ONE', 19),
(20, 'LASER ALL IN ONE', 20),
(21, 'INKJET ALL IN ONE', 21),
(22, 'INKJET TANK ALL IN ONE', 22),
(23, 'INKJET ALL IN ONE', 23),
(24, 'LASERJET', 24),
(25, 'LASERJET', 25),
(26, 'INKJET', 26),
(27, 'INKJET', 27),
(28, 'INKJET', 28),
(29, 'INKJET', 29),
(30, 'INKJET', 30),
(31, 'INKJET TANK ALL IN ONE', 31),
(32, 'INKJET', 32),
(33, 'INKJET TANK ALL IN ONE', 33),
(34, 'INKJET TANK ALL IN ONE', 34),
(35, 'INKJET TANK ALL IN ONE', 35),
(36, 'INKJET', 36),
(37, 'INKJET', 37),
(38, 'LASERJET', 38),
(39, 'LASERJET', 39),
(40, 'LASERJET', 40),
(41, 'INKJET TANK ALL IN ONE', 41),
(42, 'INKJET TANK ALL IN ONE', 42),
(43, 'INKJET ALL IN ONE', 43),
(44, 'INKJET ALL IN ONE', 44),
(45, 'INKJET ALL IN ONE', 45),
(46, 'INKJET', 46),
(47, 'INKJET', 47),
(48, 'INKJET', 48),
(49, 'INKJET', 49),
(50, 'INKJET ALL IN ONE', 50),
(51, 'INKJET ALL IN ONE', 51),
(52, 'INKJET', 52),
(53, 'LASERJET', 53),
(54, 'LASERJET', 54),
(55, 'LASERJET', 55),
(56, 'LASERJET', 56),
(57, 'INKJET ALL IN ONE', 57),
(58, 'INKJET ALL IN ONE', 58),
(59, 'LASERJET', 59),
(60, 'LASERJET', 60),
(61, 'LASERJET', 61),
(62, 'LASERJET', 62),
(63, 'LASERJET', 63),
(64, 'PIGMENT INK', 64),
(65, 'PIGMENT INK', 65),
(66, 'LASERJET', 66),
(67, 'LASERJET', 67),
(68, 'LASERJET', 68),
(69, 'LASERJET', 69),
(70, 'LASERJET', 70),
(71, 'INKJET', 71),
(72, 'INKJET ALL IN ONE', 72),
(73, 'INKJET ALL IN ONE', 73),
(74, 'LASERJET', 74),
(75, 'INKJET', 75),
(76, 'RIBBON INKJET', 76);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `printer_types`
--
ALTER TABLE `printer_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `printer_types`
--
ALTER TABLE `printer_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
