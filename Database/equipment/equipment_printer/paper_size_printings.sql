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
-- Table structure for table `paper_size_printings`
--

CREATE TABLE `paper_size_printings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color_printing_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `paper_size_printings`
--

INSERT INTO `paper_size_printings` (`id`, `name`, `color_printing_id`) VALUES
(1, 'A4, B5, A6', 1),
(2, 'A4, B5, A5', 2),
(3, 'A4, B5, A5', 3),
(4, 'A4, B5, A5', 4),
(5, 'A4, B5, A5, A6', 5),
(6, 'A4, B5, A5', 6),
(7, 'A4, B5, A5', 7),
(8, 'A4, A5, A6, B5', 8),
(9, 'A4, A5, B5', 9),
(10, 'A4, B5, A5', 10),
(11, 'A4, A5, A6', 11),
(12, 'A4, A5, A6', 12),
(13, 'A4, B5, A6', 13),
(14, 'A4, B5, A5, A6', 14),
(15, 'A4, B5, A6', 15),
(16, 'A4, A5, A6, B5, B6', 16),
(17, 'A4, B5, A5', 17),
(18, 'A4, B5, A5', 18),
(19, 'A4, A5, A6', 19),
(20, 'A4, B5, A6', 20),
(21, 'A4, A5, A3, A6,', 21),
(22, 'A4, A5, A3, A6', 22),
(23, 'A4, A5, A3, A6', 23),
(24, 'A4, B5, A5', 24),
(25, 'A4, B5, A5', 25),
(26, 'A4, B5, A5', 26),
(27, 'A4, B5, A5', 27),
(28, 'A4, B5, A5', 28),
(29, 'A4, B5, A5', 29),
(30, 'A4, B5, A5', 31),
(31, 'A4, B5, A5', 30),
(32, 'A4, A5, B5', 32),
(33, 'A4, A5, B5', 33),
(34, 'A4, A5, B5', 35),
(35, 'A4, A5, B5', 34),
(36, 'A3, A4, A5, B4, B5', 36),
(37, 'A3, A4, A5, B4, B5', 37),
(38, 'A4, A5, B5', 38),
(39, 'A4, A5, A6', 39),
(40, 'A4, B5, A5', 40),
(41, 'A4, A5, A6, B5', 41),
(42, 'A4, A5, A6, B5', 42),
(43, 'A4, A5, A6, B5', 43),
(44, 'A4, A5, A6, B5', 44),
(45, 'A4, B5, A5', 45),
(46, 'A4, B5, A5', 46),
(47, 'A4, B5, A5', 47),
(48, 'A4, B5, A5', 48),
(49, 'A4, B5, A5', 49),
(50, 'A4, B5, A5, B6, A6', 50),
(51, 'A4, B5, A5, B6, A6', 51),
(52, 'A4, A5, B5,', 52),
(53, 'A4, B5, A5', 53),
(54, 'A4, B5, A5, A6', 54),
(55, 'A4, B5, A5', 55),
(56, 'A4, B5, A5', 56),
(57, 'A4, B5, A5, B6, A6', 57),
(58, 'A4, B5, A5, B6, A6', 58),
(59, 'A4, B5, A5', 59),
(60, 'A4, B5, A5', 60),
(61, 'A4, A5, A6, B5', 61),
(62, 'A4, B5, A5', 62),
(63, 'A4, B5, A5', 63),
(64, 'PLOTTER', 64),
(65, 'PLOTTER', 65),
(66, 'A4, B5, A5', 66),
(67, 'A4, B5, A5', 67),
(68, 'A4, B5, A5', 68),
(69, 'A4, B5, A5', 69),
(70, 'A4, A5, A5L, A6, JIS B5, ISO B5, B6', 70),
(71, 'A4, A5, A3, A6', 71),
(72, 'A4, A5, A3, A6', 72),
(73, 'A4, A5, A6, B5, B5, B6', 73),
(74, 'A4, A5, A5L, A6, JIS B5, ISO B5, B6', 74),
(75, 'A4, B5, A5', 75),
(76, 'BOND PAPER, CARBON PAPER', 76);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paper_size_printings`
--
ALTER TABLE `paper_size_printings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paper_size_printings`
--
ALTER TABLE `paper_size_printings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
