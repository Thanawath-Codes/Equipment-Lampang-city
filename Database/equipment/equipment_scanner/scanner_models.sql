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
-- Table structure for table `scanner_models`
--

CREATE TABLE `scanner_models` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `scanner_brand_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `scanner_models`
--

INSERT INTO `scanner_models` (`id`, `name`, `scanner_brand_id`) VALUES
(1, 'PRO 1000 S2', 1),
(2, 'PRO 2000 S2', 1),
(3, 'PRO 3000 S2', 1),
(4, 'ADS-2110W', 2),
(5, 'ADS-1110W', 2),
(6, 'ADS-4300N', 2),
(7, 'DS-860', 5),
(8, 'LIDE-220', 3),
(9, 'SP-1130', 4),
(10, 'GT-2000', 5),
(11, 'TM53D', 6),
(12, 'LIDE-25', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scanner_models`
--
ALTER TABLE `scanner_models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scanner_models`
--
ALTER TABLE `scanner_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
