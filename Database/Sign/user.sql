-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 11:22 AM
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
-- Database: `sign_account`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `department` int(11) NOT NULL,
  `segment` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `working` tinyint(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `urole` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email_address`, `phone`, `department`, `segment`, `division`, `working`, `username`, `password_hash`, `urole`, `created_at`) VALUES
(1, 'นายติณณภพ', 'ถาวรทัพพ์', 'thinnaphob@gmail.com', '098-524-1036', 6, 11, 28, 99, 'thinnaphob', '$2y$10$ZdojRX869gip8uZJ174ze.mClhIhK/2p4k2mgfNt/Jml4zgv8a83O', 1, '2025-07-09 02:26:10'),
(2, 'นายพิรัชย์', 'ยุกตนันท์', 'phirach@gmail.com', '087-145-2300', 8, 13, 33, 115, 'phirach', '$2y$10$pa/uDoOemb7bb/ttXYbyV.SyfMxNinYHv/IOgX4y.ML38eefFoU2q', 2, '2025-07-09 02:36:06'),
(3, 'นายโยธิน', 'วรสิทธิ์', 'yothin.nava@yahoo.com', '024-152-6875', 7, 12, 30, 104, 'yothin', '$2y$10$.zrzDAMn67MTw0COZtmYg.AfIfPY6IuiiWyW.pCHMWCFczpk.NBnG', 1, '2025-07-09 02:38:04'),
(4, 'นายติณณภพ', 'ถาวรทัพพ์', 'admin@gmail.com', '098-745-6211', 4, 9, 21, 72, 'nong.nam', '$2y$10$uqw1.SNfCQH0g3q9WA7u1O2lATGxjH50XbLJBv4stO6HyIF1LLTXS', 2, '2025-07-09 02:38:52'),
(5, 'lampang', 'city', 'lpmuni024@lampang.onmicrosoft.com', '085-412-6451', 4, 9, 21, 72, 'lpmuni', '$2y$10$ywQjH7cWZw8oJq2YGHJF3OXvmG0O8eku2r9Mm2J.LdfXLsGlvxalK', 1, '2025-07-09 02:44:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
