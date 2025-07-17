-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 11:17 AM
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
-- Database: `equipment_scanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `scanner_lists`
--

CREATE TABLE `scanner_lists` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `year_equipment` int(11) NOT NULL,
  `scanner_brand` int(11) NOT NULL,
  `scanner_model` int(11) NOT NULL,
  `printing_speed` int(11) NOT NULL,
  `scanner_paper_size` int(11) NOT NULL,
  `status_equipment` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `segment` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `working` int(11) NOT NULL,
  `owner_scanner` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `scanner_lists`
--

INSERT INTO `scanner_lists` (`id`, `serial_number`, `year_equipment`, `scanner_brand`, `scanner_model`, `printing_speed`, `scanner_paper_size`, `status_equipment`, `department`, `segment`, `division`, `working`, `owner_scanner`, `created_at`) VALUES
(1, '416-59-0922', 2559, 1, 3, 7, 13, 1, 3, 8, 14, 41, 'นางสาวนิรชา จิตตปิญตา', '2024-07-16 02:21:17'),
(2, '416-59-0000', 2559, 1, 2, 5, 9, 1, 6, 11, 29, 100, 'นายพิชญะ ดวงฟู', '2024-07-16 02:27:04'),
(3, '416-59-0000', 2559, 1, 2, 5, 9, 1, 3, 8, 14, 41, 'นางสาวสิริกร สุวรรณศรี', '2024-07-16 02:28:34'),
(4, '416-66-2203', 2566, 2, 6, 18, 35, 1, 1, 6, 1, 2, 'นางสาวอิชยาพร ฟูเต็มวงศ์', '2024-07-16 03:02:37'),
(5, '416-60-1742', 2560, 5, 7, 21, 41, 1, 1, 6, 1, 2, 'นายวรรณเสด็จ รัตนมงคล', '2024-07-16 03:09:14'),
(6, '416-57-0792', 2557, 2, 5, 13, 25, 1, 4, 9, 22, 76, 'นางสาวศิริวรรณ จำปาคำ', '2024-07-16 03:10:58'),
(7, '416-52-0610', 2552, 5, 10, 26, 51, 1, 3, 3, 15, 43, 'นายจักรพันธ์ ฟูสนิท', '2024-07-16 06:04:18'),
(8, '416-61-1315', 2561, 6, 11, 29, 57, 1, 3, 4, 18, 51, 'นายเจษฎาพร ทิพยเนตร', '2024-07-16 06:11:49'),
(9, '416-61-1316', 2561, 3, 12, 30, 58, 1, 3, 4, 18, 51, 'นายสุภชัย นามสกุล', '2024-07-16 06:14:22'),
(10, '416-63-1638', 2563, 3, 8, 25, 49, 1, 2, 7, 8, 20, 'นางสาวศศิพา ธรรมสิทธิ์', '2024-07-16 06:16:14'),
(11, '416-64-1818', 2564, 4, 9, 24, 47, 1, 8, 13, 32, 113, 'นางสาวนันทนีย์ มนะสิการ', '2024-07-16 06:19:18'),
(12, '416-65-1843', 2565, 1, 2, 5, 9, 1, 4, 9, 22, 77, 'นางสาวกนกรัตน์ ตื้อเครือ', '2024-07-16 06:26:26'),
(13, '416-66-0000', 2566, 1, 2, 5, 9, 1, 4, 9, 22, 77, 'นางกนกรัตน์ ตื้อเครือ', '2024-07-16 06:27:34'),
(14, '416-66-0000', 2566, 1, 2, 5, 9, 1, 4, 9, 22, 77, 'นางสาวปิยะพร บุศย์สุข', '2024-07-16 06:28:52'),
(15, '416-66-0000', 2566, 1, 2, 5, 9, 1, 4, 9, 22, 76, 'นายธีรวัฒน์ หนุนนำ', '2024-07-16 06:31:48'),
(16, '416-67-2492', 0, 1, 13, 13, 13, 1, 1, 6, 4, 124, 'ฝ่ายประสานงานองค์กรปกครองส่วนท้องถิ่น', '2025-07-03 06:57:58'),
(17, '416-67-2493', 2567, 1, 13, 13, 13, 1, 1, 6, 7, 127, 'ฝ่่ายนิติการ', '2025-07-03 07:00:26'),
(18, '416-67-2494', 2567, 1, 13, 13, 13, 1, 1, 6, 1, 1, 'งานธุรการ', '2025-07-03 07:04:34'),
(19, '416-67-2495', 2567, 1, 13, 13, 13, 1, 1, 6, 1, 2, 'งานสารบรรณ', '2025-07-03 08:00:10'),
(20, '416-67-2496', 2567, 1, 13, 13, 13, 1, 1, 6, 4, 11, 'งานเลขานุการผู้บริหารและรัฐพิธี', '2025-07-03 08:01:40'),
(21, '416-67-2497', 2567, 1, 13, 13, 13, 1, 1, 6, 4, 11, 'งานเลขานุการผู้บริหารและรัฐพิธี', '2025-07-03 08:02:28'),
(22, '416-66-2324', 0, 2, 6, 6, 6, 1, 1, 6, 1, 1, 'งานธุรการ', '2025-07-04 09:22:37'),
(23, '416-66-2350', 2566, 1, 2, 2, 2, 1, 8, 13, 38, 110, 'งานบริหารทั่วไป', '2025-07-07 08:15:08'),
(24, '416-66-2203', 2566, 2, 6, 6, 6, 1, 1, 6, 1, 121, 'ฝ่ายบริหารงานทั่วไป สำนักปลัด', '2025-07-09 08:30:03'),
(25, '416-68-0000', 2568, 2, 14, 14, 14, 1, 4, 9, 48, 163, 'กองคลัง', '2025-07-16 06:34:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scanner_lists`
--
ALTER TABLE `scanner_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serial_number` (`serial_number`),
  ADD KEY `year_equipment` (`year_equipment`),
  ADD KEY `scanner_brand` (`scanner_brand`),
  ADD KEY `scanner_model` (`scanner_model`),
  ADD KEY `printing_speed` (`printing_speed`),
  ADD KEY `scanner_paper_size` (`scanner_paper_size`),
  ADD KEY `status_equipment` (`status_equipment`),
  ADD KEY `department` (`department`),
  ADD KEY `segment` (`segment`),
  ADD KEY `division` (`division`),
  ADD KEY `working` (`working`),
  ADD KEY `owner_scanner` (`owner_scanner`),
  ADD KEY `created_at` (`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scanner_lists`
--
ALTER TABLE `scanner_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
