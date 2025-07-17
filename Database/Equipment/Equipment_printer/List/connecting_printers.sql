-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 04:54 AM
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
-- Database: `equipment_printer`
--

-- --------------------------------------------------------

--
-- Table structure for table `connecting_printers`
--

CREATE TABLE `connecting_printers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `printer_kind_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `connecting_printers`
--

INSERT INTO `connecting_printers` (`id`, `name`, `printer_kind_id`) VALUES
(1, 'USB 2.0', 1),
(2, 'USB 2.0', 2),
(3, 'USB 2.0', 3),
(4, 'USB 2.0', 4),
(5, 'USB 2.0 / LAN', 5),
(6, 'USB 2.0', 6),
(7, 'USB 2.0', 7),
(8, 'USB 2.0 / LAN WIRELESS / LAN', 8),
(9, 'USB 2.0', 9),
(10, 'USB 2.0', 10),
(11, 'USB 2.0', 11),
(12, 'USB 2.0', 12),
(13, 'USB 2.0 / LAN WIRELESS / LAN', 13),
(14, 'USB 2.0', 14),
(15, 'USB 2.0 / LAN WIRELESS / LAN', 15),
(16, 'USB 2.0', 16),
(17, 'USB 2.0', 17),
(18, 'USB 2.0 / LAN WIRELESS', 18),
(19, 'USB 2.0 / LAN WIRELESS / LAN', 19),
(20, 'USB 2.0 / LAN WIRELESS / LAN', 20),
(21, 'USB 2.0 / LAN WIRELESS / LAN', 21),
(22, 'USB 2.0 / LAN WIRELESS / LAN', 22),
(23, 'USB 2.0 / LAN WIRELESS / LAN', 23),
(24, 'USB 2.0', 24),
(25, 'USB 2.0', 25),
(26, 'USB 2.0', 26),
(27, 'USB 2.0', 27),
(28, 'USB 2.0', 28),
(29, 'USB 2.0', 29),
(30, 'USB 2.0', 30),
(31, 'USB 2.0', 31),
(32, 'USB 2.0', 32),
(33, 'USB 2.0', 33),
(34, 'USB 2.0', 34),
(35, ' USB 2.0 / LAN WIRELESS', 35),
(36, 'USB 2.0', 36),
(37, 'USB 2.0 / LAN WIRELESS / LAN', 37),
(38, 'USB 2.0 / LAN WIRELESS / LAN', 38),
(39, 'USB 2.0 / LAN WIRELESS / LAN', 39),
(40, 'USB 2.0', 40),
(41, 'USB 2.0', 41),
(42, 'USB 2.0', 42),
(43, 'USB 2.0', 43),
(44, 'USB 2.0', 44),
(45, 'USB 2.0', 45),
(46, 'USB 2.0', 46),
(47, 'USB 2.0', 47),
(48, 'USB 2.0', 48),
(49, 'USB 2.0', 49),
(50, 'USB 2.0', 50),
(51, 'USB 2.0', 51),
(52, 'USB 2.0 / LAN WIRELESS / LAN', 52),
(53, 'USB 2.0 / LAN WIRELESS / LAN', 53),
(54, 'USB 2.0 / LAN WIRELESS / LAN', 54),
(55, 'USB 2.0 / LAN WIRELESS / LAN', 55),
(56, 'USB 2.0 / LAN', 56),
(57, 'USB 2.0 / LAN WIRELESS', 57),
(58, 'USB 2.0 / LAN WIRELESS / LAN', 58),
(59, 'USB 2.0', 59),
(60, 'USB 2.0', 60),
(61, 'USB 2.0 / LAN WIRELESS / LAN', 61),
(62, 'USB 2.0', 62),
(63, 'USB 2.0', 63),
(64, 'USB 2.0', 64),
(65, 'USB 2.0', 65),
(66, 'USB 2.0', 66),
(67, 'USB 2.0', 67),
(68, 'USB 2.0', 68),
(69, 'USB 2.0', 69),
(70, 'USB 2.0 / LAN WIRELESS / LAN', 70),
(71, 'USB 2.0 / LAN WIRELESS', 71),
(72, 'USB 2.0 / LAN WIRELESS / LAN', 72),
(73, 'USB 2.0', 73),
(74, 'USB 2.0 / LAN WIRELESS / LAN', 74),
(75, 'USB 2.0', 75),
(76, 'USB 2.0', 76),
(77, 'USB 2.0 / LAN', 77),
(78, 'USB 2.0', 78),
(79, 'USB 2.0 / LAN', 79),
(80, 'USB 2.0 / LAN WIRELESS / LAN', 80),
(81, 'USB 2.0 / LAN WIRELESS / LAN', 81);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connecting_printers`
--
ALTER TABLE `connecting_printers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connecting_printers`
--
ALTER TABLE `connecting_printers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
