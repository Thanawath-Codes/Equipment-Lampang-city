-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 04:54 AM
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
-- Table structure for table `printer_kinds`
--

CREATE TABLE `printer_kinds` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `printer_type_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `printer_kinds`
--

INSERT INTO `printer_kinds` (`id`, `name`, `printer_type_id`) VALUES
(1, '-', 1),
(2, '-', 2),
(3, '-', 3),
(4, '-', 4),
(5, '-', 5),
(6, '-', 6),
(7, '-', 7),
(8, 'MULTIFUNCTION', 8),
(9, 'MULTIFUNCTION', 9),
(10, '-', 10),
(11, '-', 11),
(12, '-', 12),
(13, 'MULTIFUNCTION', 13),
(14, '-', 14),
(15, '-', 15),
(16, '-', 16),
(17, '-', 17),
(18, '-', 18),
(19, 'MULTIFUNCTION', 19),
(20, 'MULTIFUNCTION', 20),
(21, '-', 21),
(22, 'MULTIFUNCTION', 22),
(23, 'MULTIFUNCTION', 24),
(24, '-', 23),
(25, '-', 25),
(26, '-', 26),
(27, '-', 27),
(28, '-', 28),
(29, '-', 29),
(30, '-', 30),
(31, '-', 31),
(32, '-', 33),
(33, '-', 32),
(34, '-', 34),
(35, '-', 36),
(36, '-', 35),
(37, '-', 37),
(38, '-', 38),
(39, '-', 39),
(40, '-', 40),
(41, '-', 41),
(42, '-', 42),
(43, '-', 43),
(44, '-', 45),
(45, '-', 44),
(46, '-', 46),
(47, '-', 47),
(48, '-', 48),
(49, '-', 49),
(50, '-', 50),
(51, '-', 51),
(52, 'MULTIFUNCTION', 52),
(53, '-', 53),
(54, '-', 54),
(55, '-', 55),
(56, '-', 56),
(57, 'MULTIFUNCTION', 57),
(58, 'MULTIFUNCTION', 58),
(59, '-', 59),
(60, '-', 60),
(61, 'MULTIFUNCTION', 61),
(62, '-', 62),
(63, '-', 63),
(64, '-', 64),
(65, '-', 65),
(66, '-', 66),
(67, '-', 67),
(68, '-', 68),
(69, '-', 69),
(70, 'MULTIFUNCTION', 70),
(71, '-', 71),
(72, 'MULTIFUNCTION', 72),
(73, 'MULTIFUNCTION', 73),
(74, '-', 74),
(75, '-', 75),
(76, 'DOT MATRIX', 76),
(77, '-', 77),
(78, '-', 78),
(79, 'MULTIFUNCTION', 79),
(80, 'MULTIFUNCTION', 80),
(81, 'MULTIFUNCTION', 81);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `printer_kinds`
--
ALTER TABLE `printer_kinds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `printer_kinds`
--
ALTER TABLE `printer_kinds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
