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
-- Table structure for table `monitor_sizes`
--

CREATE TABLE `monitor_sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `monitor_model_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `monitor_sizes`
--

INSERT INTO `monitor_sizes` (`id`, `name`, `monitor_model_id`) VALUES
(1, '19.5″ LCD MONITOR', 1),
(2, '18.5″ LED MONITOR', 2),
(3, '19.5″ LED MONITOR', 3),
(4, '21.5″ IPS MONITOR', 4),
(5, '20″ LED MONITOR', 5),
(6, '20″ LED MONITOR', 6),
(7, '23.8″ LCD MONITOR', 7),
(8, '17″ LCD MONITOR', 8),
(9, '23″ LED MONITOR', 9),
(10, '21.5″ FHD MONITOR', 10),
(11, '18.5″ LCD MONITOR', 11),
(12, '23.8″ FHD MONITOR', 12),
(13, '17″ LCD MONITOR', 13),
(14, '20″ LCD MONITOR', 14),
(15, '19.5″ LED MONITOR', 15),
(16, '20″ LCD MONITOR', 16),
(17, '23.8″ FHD MONITOR', 17),
(18, '17″ LCD MONITOR', 18),
(19, '23″ LCD MONITOR', 19),
(20, '19.5 LCD MONITOR', 20),
(21, '15″ LCD MONITOR', 21),
(22, '15″ LCD MONITOR', 22),
(23, '19.5″ IPS MONITOR', 23),
(24, '20″ LED MONITOR', 24),
(25, '18.5″ LED MONITOR', 25),
(26, '23.8″ FHD MONITOR', 26),
(27, '19.5″ LED MONITOR', 27),
(28, '17″ LCD MONITOR ', 28),
(29, '17″ LED MONITOR', 29),
(30, '21.5″ LED MONITOR', 30),
(31, '19″ LED MONITOR', 31),
(32, '18.5″ LED MONITOR', 32),
(33, '21.5″ LED MONITOR', 33),
(34, '18.5″ LED MONITOR', 34),
(35, '18.5″ LED MONITOR', 35),
(36, '19.5″ LED MONITOR', 36),
(37, '21″ LED MONITOR', 37),
(38, '18.5″ LED MONITOR', 38),
(39, '18.5″ LED MONITOR', 39),
(40, '20″ LED MONITOR', 40),
(41, '20″ LED MONITOR', 41),
(42, '18.5″ LED MONITOR', 42),
(43, '19″ LED MONITOR', 43),
(44, '17″ LED MONITOR', 44),
(45, '18.5″ LED MONITOR', 45),
(46, '18.5″ LCD MONITOR', 46),
(47, '20″ LED MONITOR', 47),
(48, '19″ LCD MONITOR', 48),
(49, '20″ LED MONITOR', 49),
(50, '22″ LED MONITOR', 50),
(51, '19″ LED MONITOR', 51),
(52, '19.5″ LCD MONITOR', 52),
(53, '17″ LCD MONITOR', 53),
(54, '24″ IPS MONITOR', 54),
(55, '19″ LCD MONITOR', 55),
(56, '21.5″ LED MONITOR', 56),
(57, '17″ LCD MONITOR', 57),
(58, '18.5″ LCD MONITOR', 58),
(59, '14″ LCD MONITOR', 59),
(60, '17″ LCD MONITOR', 60),
(61, '21.5″ LED MONITOR', 61),
(62, '23.8" IPS MONITOR', 62),
(63, '18.5″ LCD MONITOR', 63),
(64, '18.5″ LED MONITOR', 64),
(65, '20″ LED MONITOR', 65),
(66, '19" LCD MONITOR', 66),
(67, '23" LCD MONITOR', 67),
(68, '21.5″ LED MONITOR', 68),
(69, '21.5″ IPS MONITOR', 69),
(70, '19″ LCD MONITOR', 70),
(71, '22" LCD MONITOR', 71),
(72, '23" LED MONITOR', 72),
(73, '19″ LED MONITOR', 73),
(74, '19.5″ LED MONITOR', 74),
(75, '21.5″ IPS MONITOR', 75),
(76, '21.5″ LED MONITOR', 76),
(77, '18.5″ LED MONITOR', 77),
(78, '23.8" FHD MONITOR', 78),
(79, '18.5" FHD MONITOR', 79),
(80, '23.8" IPS MONITOR', 80),
(81, '18.5" LED MONITOR', 81),
(82, '18.5" LED MONITOR', 82),
(83, '18.5" LCD MONITOR', 83),
(84, '17" LCD MONITOR', 84),
(85, '18.5" LED MONITOR', 85),
(86, '21.5" IPS MONITOR', 86),
(87, '23.8" FHD MONITOR', 87),
(88, '20.7" IPS MONITOR', 88),
(89, '21.5" IPS MONITOR', 89),
(90, '20" LED MONITOR', 90),
(91, '20.7" LED MONITOR', 91),
(92, '17" LED MONITOR', 92),
(93, '17" LED MONITOR', 93),
(94, '23.5" FHD MONITOR', 94);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monitor_sizes`
--
ALTER TABLE `monitor_sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monitor_sizes`
--
ALTER TABLE `monitor_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
