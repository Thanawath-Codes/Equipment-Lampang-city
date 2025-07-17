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
(2, 'A4', 2),
(3, 'A4', 3),
(4, 'A4', 4),
(5, 'A4', 5),
(6, 'A4', 6),
(7, 'A4', 7),
(8, 'A4', 8),
(9, 'A4', 9),
(10, 'A4', 10),
(11, 'A4', 11),
(12, 'A4', 12),
(13, 'A4', 13),
(14, 'A4', 14);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
