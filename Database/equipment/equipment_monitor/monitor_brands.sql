-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 04:15 AM
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
-- Database: `equipment_monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `monitor_brands`
--

CREATE TABLE `monitor_brands` (
  `id` int(11) NOT NULL,
  `sortname` varchar(2) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `monitor_brands`
--

INSERT INTO `monitor_brands` (`id`, `sortname`, `name`) VALUES
(1, 'AC', 'ACER'),
(2, 'HP', 'HP'),
(3, 'LV', 'LENOVO'),
(4, 'DL', 'DELL'),
(5, 'AO', 'AOC'),
(6, 'SV', 'SVOA'),
(7, 'LG', 'LG'),
(8, 'BQ', 'BENQ'),
(9, 'PL', 'PHILIPS'),
(10, 'SS', 'SAMSUNG'),
(11, 'VS', 'VIEWSONIC'),
(12, 'DH', 'DAHUA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monitor_brands`
--
ALTER TABLE `monitor_brands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monitor_brands`
--
ALTER TABLE `monitor_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
