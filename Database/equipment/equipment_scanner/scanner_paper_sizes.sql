-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 02:38 AM
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
-- Database: `equipment_scanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `scanner_paper_sizes`
--

CREATE TABLE `scanner_paper_sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `printing_speed_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `scanner_paper_sizes`
--

INSERT INTO `scanner_paper_sizes` (`id`, `name`, `printing_speed_id`) VALUES
(1, 'A4', 1),
(2, 'A3', 1),
(3, 'A4', 2),
(4, 'A3', 2),
(5, 'A4', 3),
(6, 'A3', 3),
(7, 'A4', 4),
(8, 'A3', 4),
(9, 'A4', 5),
(10, 'A3', 5),
(11, 'A4', 6),
(12, 'A3', 6),
(13, 'A4', 7),
(14, 'A3', 7),
(15, 'A4', 8),
(16, 'A3', 8),
(17, 'A4', 9),
(18, 'A3', 9),
(19, 'A4', 10),
(20, 'A3', 10),
(21, 'A4', 11),
(22, 'A3', 11),
(23, 'A4', 12),
(24, 'A3', 12),
(25, 'A4', 13),
(26, 'A3', 13),
(27, 'A4', 14),
(28, 'A3', 14),
(29, 'A4', 15),
(30, 'A3', 15),
(31, 'A4', 16),
(32, 'A3', 16),
(33, 'A4', 17),
(34, 'A3', 17),
(35, 'A4', 18),
(36, 'A3', 18),
(37, 'A4', 19),
(38, 'A3', 19),
(39, 'A4', 20),
(40, 'A3', 20),
(41, 'A4', 21),
(42, 'A3', 21),
(43, 'A4', 22),
(44, 'A3', 22),
(45, 'A4', 23),
(46, 'A3', 23),
(47, 'A4', 24),
(48, 'A3', 24),
(49, 'A4', 25),
(50, 'A3', 25),
(51, 'A4', 26),
(52, 'A3', 26),
(53, 'A4', 27),
(54, 'A3', 27),
(55, 'A4', 28),
(56, 'A3', 28),
(57, 'PLOTTER', 29),
(58, 'A4', 30),
(59, 'A3', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scanner_paper_sizes`
--
ALTER TABLE `scanner_paper_sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scanner_paper_sizes`
--
ALTER TABLE `scanner_paper_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
