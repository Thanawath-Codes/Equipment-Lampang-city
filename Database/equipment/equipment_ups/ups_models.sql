-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 03:28 AM
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
-- Database: `equipment_ups`
--

-- --------------------------------------------------------

--
-- Table structure for table `ups_models`
--

CREATE TABLE `ups_models` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ups_brand_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ups_models`
--

INSERT INTO `ups_models` (`id`, `name`, `ups_brand_id`) VALUES
(1, 'GALAXY', 1),
(2, 'AX', 1),
(3, 'SMOOTH I', 1),
(4, 'SMOOTH A', 1),
(5, 'SMOOTH D', 1),
(6, 'AI-PLUS', 1),
(7, 'ICT-1', 1),
(8, 'PLUTO OA', 2),
(9, 'GOLD SERIES', 3),
(10, 'SZ PRO SERIES', 3),
(11, 'SIR D SERIES', 4),
(12, 'SIR E SERIES', 4),
(13, 'CHAMP', 5),
(14, 'MD', 6),
(15, 'AI', 6),
(16, 'IPOWER', 6),
(17, 'ICT', 7),
(18, 'EVEREST', 8),
(19, 'THOR', 9),
(20, 'GRAND', 9),
(21, 'EGO', 9),
(22, 'GR 800', 10),
(23, 'BLUE', 12),
(24, 'SMART', 12),
(25, 'BR', 13),
(26, 'NUBOS', 14),
(27, 'SIR O SERIES', 4),
(28, 'GREEN-800', 11),
(29, 'T-3000', 6),
(30, 'NT-LED 800', 1),
(31, 'ECO II-1000 LED', 3),
(32, 'EASY', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ups_models`
--
ALTER TABLE `ups_models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ups_models`
--
ALTER TABLE `ups_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
