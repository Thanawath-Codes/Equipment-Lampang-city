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
-- Table structure for table `storage_specs`
--

CREATE TABLE `storage_specs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `storage_device_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `storage_specs`
--

INSERT INTO `storage_specs` (`id`, `name`, `storage_device_id`) VALUES
(1, '250 GB', 1),
(2, '500 GB', 1),
(3, '512 GB', 1),
(4, '1 TB', 1),
(5, '2 TB', 1),
(6, '128 GB', 2),
(7, '180 GB', 2),
(8, '256 GB', 2),
(9, '512 GB', 2),
(10, '1 TB', 2),
(11, '1 TB', 3),
(12, '512 GB', 3),
(13, '256 GB', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `storage_specs`
--
ALTER TABLE `storage_specs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `storage_specs`
--
ALTER TABLE `storage_specs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
