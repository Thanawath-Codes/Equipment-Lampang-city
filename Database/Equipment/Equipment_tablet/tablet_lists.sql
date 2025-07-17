-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 11:18 AM
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
(5, '416-66-9753', 2566, 2, 1, '19425-23201-11165', 2, 2, 2, 2, 2, 1, 9, 14, 41, 118, 'นางสาวดวงเดือน ไชยชนะ', '2024-07-03 05:04:33'),
(6, '416-67-2471', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 9, 14, 41, 118, 'นายเอก อิ่มเจริญ ', '2025-06-30 03:18:06'),
(7, '416-66-2318', 2566, 2, 4, '00000-00000-00000', 4, 4, 4, 4, 4, 1, 9, 14, 41, 118, 'นายปุณณสิน มณีนันทน์', '2025-06-30 03:19:40'),
(8, '416-67-2470', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 9, 14, 41, 118, 'นายกฤษฎา พรรัตนพิทักษ์', '2025-06-30 03:21:01'),
(9, '416-67-2472', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 9, 14, 41, 118, 'นางสาวภัทรินญา เดชาวัตธนโชติ', '2025-06-30 03:26:06'),
(10, '416-67-2518', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 8, 13, 38, 167, 'ผู้อำนวยการกองการเจ้าหน้าที่', '2025-06-30 03:31:18'),
(11, '416-67-2472', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 1, 6, 4, 11, 'งานเลขานุการผู้บริหารและรัฐพิธี', '2025-06-30 03:47:47'),
(12, '416-67-2473', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 1, 6, 1, 1, 'งานธุุรการ', '2025-06-30 03:48:59'),
(13, '416-67-2474', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 1, 6, 1, 1, 'งานธุุรการ', '2025-06-30 03:50:27'),
(14, '416-67-2475', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 1, 6, 1, 1, 'งานธุุรการ', '2025-06-30 03:52:11'),
(15, '416-67-2476', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 1, 6, 1, 1, 'งานธุุรการ', '2025-06-30 03:52:43'),
(16, '416-66-2304', 2566, 1, 1, '00000-00000-00000', 1, 1, 1, 1, 1, 1, 1, 6, 1, 121, 'งานบริหารทั่วไป', '2025-07-07 02:41:56'),
(17, '416-67-2520', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 7, 12, 37, 103, 'งานธุรการ', '2025-07-08 04:59:22'),
(18, '416-67-2520', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 7, 12, 37, 103, 'งานธุุรการ', '2025-07-08 06:08:41'),
(19, '416-67-2521', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 7, 12, 37, 103, 'งานธุุรการ', '2025-07-08 08:03:36'),
(20, '416-67-2652', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 2, 7, 46, 161, 'สำนักการศึกษา', '2025-07-08 08:45:05'),
(21, '416-67-2653', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 2, 7, 46, 161, 'สำนักการศึกษา', '2025-07-08 09:21:54'),
(22, '416-67-2654', 2567, 1, 3, '00000-00000-00000', 3, 3, 3, 3, 3, 1, 2, 7, 46, 161, 'สำนักการศึกษา', '2025-07-08 09:22:45'),
(23, '416-66-2477', 2566, 2, 4, '00000-00000-00000', 4, 4, 4, 4, 4, 1, 2, 2, 11, 34, 'สำนักการศึกษา งานพิพิธภัณฑ์', '2025-07-09 06:09:53'),
(24, '416-66-2476', 2566, 2, 4, '00000-00000-00000', 4, 4, 4, 4, 4, 1, 2, 2, 11, 34, 'สำนักการศึกษา งานพิพิธภัณฑ์', '2025-07-09 06:12:36');

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
  ADD KEY `owner_tablet` (`owner_tablet`),
  ADD KEY `created_at` (`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tablet_lists`
--
ALTER TABLE `tablet_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
