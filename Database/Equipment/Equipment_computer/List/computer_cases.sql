-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 03:56 AM
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
-- Table structure for table `computer_cases`
--

CREATE TABLE `computer_cases` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `computer_type_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `computer_cases`
--

INSERT INTO `computer_cases` (`id`, `name`, `computer_type_id`) VALUES
(1, 'LENOVO', 1),
(2, 'ACER', 1),
(3, 'HP', 1),
(4, 'ASUS', 1),
(5, 'DELL', 1),
(6, 'AMD', 1),
(7, 'SINO', 1),
(8, 'LEMEL', 1),
(9, 'GVIEW', 1),
(10, 'SVOA', 1),
(11, 'COOLNAS', 1),
(12, 'AERO COOL', 1),
(13, 'ANTEC', 1),
(14, 'CUBIC', 1),
(15, 'ITSONAS', 1),
(16, 'VIKINGS', 1),
(17, 'LITEON', 1),
(18, 'LENOVO', 2),
(19, 'ACER', 2),
(20, 'HP', 2),
(21, 'ASUS', 2),
(22, 'DELL', 2),
(23, 'HP', 3),
(24, 'ACER', 3),
(25, 'LENOVO', 3),
(26, 'SAMSUNG', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computer_cases`
--
ALTER TABLE `computer_cases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computer_cases`
--
ALTER TABLE `computer_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
