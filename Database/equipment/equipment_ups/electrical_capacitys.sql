-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 03:27 AM
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
-- Table structure for table `electrical_capacitys`
--

CREATE TABLE `electrical_capacitys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ups_model_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `electrical_capacitys`
--

INSERT INTO `electrical_capacitys` (`id`, `name`, `ups_model_id`) VALUES
(1, '850VA', 1),
(2, '900VA', 1),
(3, '1000VA', 1),
(4, '800VA', 2),
(5, '1000VA', 2),
(6, '1200VA', 3),
(7, '1500VA', 3),
(8, '2000VA', 3),
(9, '850VA', 4),
(10, '1000VA', 4),
(11, '850VA', 5),
(12, '1000VA', 5),
(13, '1000VA', 6),
(14, '800VA', 7),
(15, '800VA', 8),
(16, '1000VA', 8),
(17, '500VA', 9),
(18, '800VA', 9),
(19, '1000VA', 9),
(20, '800VA', 10),
(21, '1000VA', 10),
(22, '1200VA', 10),
(23, '1500VA', 10),
(24, '800VA', 11),
(25, '1000VA', 11),
(26, '1200VA', 11),
(27, '1500VA', 11),
(28, '800VA', 12),
(29, '850VA', 12),
(30, '1000VA', 12),
(31, '850VA', 13),
(32, '900VA', 13),
(33, '1000VA', 13),
(34, '850VA', 14),
(35, '1000VA', 14),
(36, '800VA', 15),
(37, '1000VA', 15),
(38, '800VA', 16),
(39, '850VA', 16),
(40, '1000VA', 16),
(44, '800VA', 17),
(45, '1000VA', 17),
(46, '800VA ', 18),
(47, '1000VA ', 18),
(48, '800VA', 19),
(49, '850VA', 19),
(50, '1000VA', 19),
(51, '1200VA', 20),
(52, '1500VA', 20),
(53, '2000VA', 20),
(54, '850VA', 21),
(55, '1000VA', 21),
(56, '800VA', 22),
(57, '1000VA', 22),
(58, '800VA', 23),
(59, '1200VA', 23),
(60, '1600VA', 23),
(61, '800VA', 24),
(62, '1000VA', 24),
(63, '1200VA', 24),
(64, '2000VA', 24),
(65, '500VA', 25),
(66, '650VA', 25),
(67, '900VA', 25),
(68, '900VA', 25),
(69, '1200VA', 25),
(70, '1300VA', 25),
(71, '1500VA', 25),
(72, '1600VA', 25),
(73, '850VA', 26),
(74, '900VA', 26),
(75, '1000VA', 26),
(76, '1200VA', 27),
(77, '800VA', 28),
(78, '3000VA', 29),
(79, '800VA', 30),
(80, '1000VA', 31),
(81, '800VA', 32),
(82, '1000VA', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `electrical_capacitys`
--
ALTER TABLE `electrical_capacitys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `electrical_capacitys`
--
ALTER TABLE `electrical_capacitys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
