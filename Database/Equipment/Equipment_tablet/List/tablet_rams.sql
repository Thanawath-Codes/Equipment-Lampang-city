-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 03:23 AM
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
-- Database: `equipment_tablet`
--

-- --------------------------------------------------------

--
-- Table structure for table `tablet_rams`
--

CREATE TABLE `tablet_rams` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tablet_speed_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tablet_rams`
--

INSERT INTO `tablet_rams` (`id`, `name`, `tablet_speed_id`) VALUES
(1, '4 GB LPDDR4X SDRAM', 1),
(2, '3 GB LPDDR4X SDRAM', 2),
(3, '6 GB LPDDR4X SDRAM', 3),
(4, '4 GB LPDDR4X SDRAM', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tablet_rams`
--
ALTER TABLE `tablet_rams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tablet_rams`
--
ALTER TABLE `tablet_rams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
