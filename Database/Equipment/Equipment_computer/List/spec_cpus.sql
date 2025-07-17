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
-- Table structure for table `spec_cpus`
--

CREATE TABLE `spec_cpus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand_cpu_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `spec_cpus`
--

INSERT INTO `spec_cpus` (`id`, `name`, `brand_cpu_id`) VALUES
(1, 'CORE-I3', 1),
(2, 'CORE-I5', 1),
(3, 'CORE-I7', 1),
(4, 'PENTIUM', 1),
(5, 'PENTIUM GOLD', 1),
(6, 'CELERON', 1),
(7, 'CORE2DUO', 1),
(8, 'DUO2CORE', 1),
(9, 'RYZEN 3', 2),
(10, 'RYZEN 5', 2),
(11, 'RYZEN 7', 2),
(12, 'ATHLON 200GE', 2),
(13, 'ATHLON 200GF', 2),
(14, 'ATHLON', 2),
(15, 'AMD', 2),
(16, 'AMD FX8300', 2),
(17, 'AMD FX-8320', 2),
(18, 'AMD FX-6100', 2),
(19, 'AMD FX-6300', 2),
(20, 'AMD PX-83705', 2),
(21, 'XEON', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spec_cpus`
--
ALTER TABLE `spec_cpus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spec_cpus`
--
ALTER TABLE `spec_cpus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
