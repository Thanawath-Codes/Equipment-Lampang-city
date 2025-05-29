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
-- Table structure for table `ups_brands`
--

CREATE TABLE `ups_brands` (
  `id` int(11) NOT NULL,
  `sortname` varchar(2) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ups_brands`
--

INSERT INTO `ups_brands` (`id`, `sortname`, `name`) VALUES
(1, 'ZC', 'ZIRCON'),
(2, 'CP', 'CHUPHOTIC'),
(3, 'SN', 'SYNDOME'),
(4, 'EP', 'EMPOW'),
(5, 'CB', 'CBC'),
(6, 'CL', 'CLEANLINE'),
(7, 'IP', 'IPOWER'),
(8, 'SU', 'SUN'),
(9, 'ET', 'ETECH'),
(10, 'AB', 'ABLEREX'),
(11, 'LO', 'LEONICS'),
(12, 'AV', 'ADVICE'),
(13, 'AP', 'APC'),
(14, 'NB', 'NUBOS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ups_brands`
--
ALTER TABLE `ups_brands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ups_brands`
--
ALTER TABLE `ups_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
