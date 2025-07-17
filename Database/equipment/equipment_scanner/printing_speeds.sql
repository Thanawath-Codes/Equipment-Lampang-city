-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 02:37 AM
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
-- Table structure for table `printing_speeds`
--

CREATE TABLE `printing_speeds` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `scanner_model_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `printing_speeds`
--

INSERT INTO `printing_speeds` (`id`, `name`, `scanner_model_id`) VALUES
(1, '23 แผ่น/นาที', 1),
(2, '40 แผ่น/นาที', 1),
(3, '60 แผ่น/นาที', 1),
(4, '23 แผ่น/นาที', 2),
(5, '40 แผ่น/นาที', 2),
(6, '60 แผ่น/นาที', 2),
(7, '23 แผ่น/นาที', 3),
(8, '40 แผ่น/นาที', 3),
(9, '60 แผ่น/นาที', 3),
(10, '23 แผ่น/นาที', 4),
(11, '40 แผ่น/นาที', 4),
(12, '60 แผ่น/นาที', 4),
(13, '23 แผ่น/นาที', 5),
(14, '40 แผ่น/นาที', 5),
(15, '60 แผ่น/นาที', 5),
(16, '23 แผ่น/นาที', 6),
(17, '40 แผ่น/นาที', 6),
(18, '60 แผ่น/นาที', 6),
(19, '23 แผ่น/นาที', 7),
(20, '40 แผ่น/นาที', 7),
(21, '60 แผ่น/นาที', 7),
(22, '23 แผ่น/นาที', 9),
(23, '40 แผ่น/นาที', 9),
(24, '60 แผ่น/นาที', 9),
(25, '1 แผ่น/นาที', 8),
(26, '23 แผ่น/นาที', 10),
(27, '40 แผ่น/นาที', 10),
(28, '60 แผ่น/นาที', 10),
(29, '1 แผ่น/นาที', 11),
(30, '1 แผ่น/นาที', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `printing_speeds`
--
ALTER TABLE `printing_speeds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `printing_speeds`
--
ALTER TABLE `printing_speeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
