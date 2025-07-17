-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 02:52 AM
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
-- Table structure for table `tablet_lists`
--

CREATE TABLE `tablet_lists` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(20) NOT NULL,
  `year_equipment` int(11) NOT NULL,
  `tablet_brand` int(11) NOT NULL,
  `tablet_model` int(11) NOT NULL,
  `imei_number` varchar(20) NOT NULL,
  `tablet_cpu` int(11) NOT NULL,
  `tablet_speed` int(11) NOT NULL,
  `tablet_ram` int(11) NOT NULL,
  `tablet_rom` int(11) NOT NULL,
  `os_tablet` int(11) NOT NULL,
  `status_equipment` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `segment` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `working` int(11) NOT NULL,
  `owner_tablet` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tablet_lists`
--

INSERT INTO `tablet_lists` (`id`, `serial_number`, `year_equipment`, `tablet_brand`, `tablet_model`, `imei_number`, `tablet_cpu`, `tablet_speed`, `tablet_ram`, `tablet_rom`, `os_tablet`, `status_equipment`, `department`, `segment`, `division`, `working`, `owner_tablet`, `created_at`) VALUES
(1, '416-65-1847', 2565, 1, 1, '35843-42712-67261', 1, 1, 1, 1, 1, 1, 5, 10, 25, 91, 'นางสาวนันทพัทธ์ นรรัตน์ปพน', '2024-07-03 04:35:35'),
(2, '416-65-1846', 2565, 1, 1, '35843-42712-67532', 1, 1, 1, 1, 1, 1, 4, 9, 23, 83, 'นายอิทธิพล รัตนเดชา', '2024-07-03 04:44:14'),
(3, '416-65-1848', 2565, 1, 1, '35843-42712-75264', 1, 1, 1, 1, 1, 1, 4, 9, 23, 80, 'นายรัชชา นามสกุล', '2024-07-03 04:50:14'),
(4, '416-65-1245', 2565, 1, 1, '35843-42712-67287', 1, 1, 1, 1, 1, 1, 4, 9, 23, 81, 'นางสาวแคทรียา ตาอ้ายเทือก', '2024-07-03 04:56:13'),
(5, '416-66-9753', 2566, 2, 1, '19425-23201-11165', 2, 2, 2, 2, 2, 1, 9, 14, 41, 118, 'นางสาวดวงเดือน ไชยชนะ', '2024-07-03 05:04:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tablet_lists`
--
ALTER TABLE `tablet_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serial_number` (`serial_number`),
  ADD KEY `year_equipment` (`year_equipment`),
  ADD KEY `tablet_brand` (`tablet_brand`),
  ADD KEY `tablet_model` (`tablet_model`),
  ADD KEY `tablet_cpu` (`tablet_cpu`),
  ADD KEY `tablet_speed` (`tablet_speed`),
  ADD KEY `tablet_ram` (`tablet_ram`),
  ADD KEY `tablet_rom` (`tablet_rom`),
  ADD KEY `os_tablet` (`os_tablet`),
  ADD KEY `department` (`department`),
  ADD KEY `segment` (`segment`),
  ADD KEY `division` (`division`),
  ADD KEY `working` (`working`),
  ADD KEY `owner_tablet` (`owner_tablet`),
  ADD KEY `created_at` (`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tablet_lists`
--
ALTER TABLE `tablet_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
