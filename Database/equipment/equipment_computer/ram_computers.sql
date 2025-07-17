-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 03:57 AM
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
-- Database: `equipment_computer`
--

-- --------------------------------------------------------

--
-- Table structure for table `ram_computers`
--

CREATE TABLE `ram_computers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `storage_spec_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ram_computers`
--

INSERT INTO `ram_computers` (`id`, `name`, `storage_spec_id`) VALUES
(1, '2 GB DDR2', 3),
(2, '2 GB DDR2', 4),
(3, '2 GB DDR3', 1),
(4, '2 GB DDR3', 2),
(5, '2 GB DDR3', 3),
(6, '2 GB DDR3', 4),
(7, '3 GB DDR3', 1),
(8, '4 GB DDR3', 2),
(9, '4 GB DDR3', 3),
(10, '4 GB DDR3', 4),
(11, '4 GB DDR4', 5),
(12, '4 GB DDR4', 3),
(13, '4 GB DDR4', 4),
(14, '8 GB DDR4', 5),
(15, '8 GB DDR4', 4),
(16, '16 GB DDR4', 5),
(17, '16 GB DDR4', 4),
(18, '2 GB DDR2', 6),
(19, '2 GB DDR2', 7),
(20, '2 GB DDR2', 8),
(21, '2 GB DDR3', 6),
(22, '2 GB DDR3', 8),
(23, '4 GB DDR3', 6),
(24, '4 GB DDR3', 7),
(25, '4 GB DDR3', 8),
(26, '4 GB DDR3', 9),
(27, '4 GB DDR4', 6),
(28, '4 GB DDR4', 7),
(29, '4 GB DDR4', 8),
(30, '4 GB DDR4', 9),
(31, '8 GB DDR4', 6),
(32, '8 GB DDR4', 7),
(33, '8 GB DDR4', 8),
(34, '8 GB DDR4', 9),
(35, '4 GB DDR4', 10),
(36, '16 GB DDR4', 6),
(37, '16 GB DDR4', 7),
(38, '16 GB DDR4', 8),
(40, '16 GB DDR4', 9),
(41, '8 GB DDR4', 10),
(42, '4 GB DDR4', 11),
(43, '8 GB DDR4', 11),
(44, '16 GB DDR4', 11),
(45, '16 GB DDR4', 10),
(46, '4 GB DDR3', 1),
(47, '8 GB DDR3', 2),
(48, '12 GB DDR3', 5),
(49, '8 GB DDR3', 6),
(50, '8 GB DDR3', 7),
(51, '8 GB DDR3', 8),
(52, '8 GB DDR3', 9),
(53, '8 GB DDR3', 10),
(54, '12 GB DDR3', 1),
(55, '12 GB DDR3', 2),
(56, '12 GB DDR3', 3),
(57, '12 GB DDR3', 4),
(58, '12 GB DDR3', 6),
(59, '12 GB DDR3', 7),
(60, '12 GB DDR3', 8),
(61, '12 GB DDR3', 9),
(62, '12 GB DDR3', 10),
(63, '8 GB DDR4', 3),
(64, '4 GB DDR4', 12),
(65, '8 GB DDR4', 12),
(66, '16 GB DDR4', 12),
(67, '4 GB DDR4', 13),
(68, '8 GB DDR4', 13),
(69, '16 GB DDR4', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ram_computers`
--
ALTER TABLE `ram_computers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ram_computers`
--
ALTER TABLE `ram_computers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
