-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 03:02 AM
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
(1, 'นายวรีชน', 'วิญญาณนักรบ ณ อยุธยา', 'werachon@gmail.com', '095-411-9781', 5, 10, 25, 88, 'werachon', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-07-31 06:34:36'),
(2, 'นายณเรศ', 'สิริรางค์กุญจกร', 'mekin@gmail.com', '095-413-3022', 3, 3, 15, 43, 'mekin', 'd0970714757783e6cf17b26fb8e2298f', 2, '2024-08-01 08:48:21'),
(3, 'นายฐิติวิชญ์', 'ณธายุภักดี', 'komkit@gmail.com', '064-656-5165', 1, 6, 2, 4, 'hirun', 'e10adc3949ba59abbe56e057f20f883e', 2, '2024-08-06 06:48:41'),
(4, 'นางสาวเขมณัฏฐ์', 'คุณานนท์', 'kamanut@gmail.com', '065-136-2326', 5, 10, 24, 85, 'kamanut', 'fcea920f7412b5da7be0cf42b8c93759', 2, '2024-08-07 03:20:02'),
(5, 'นายศาสตร์', 'ศิลป์ไทย', 'sath@gmail.com', '096-566-2602', 3, 3, 15, 43, 'sath', 'e10adc3949ba59abbe56e057f20f883e', 2, '2024-08-07 08:44:32'),
(6, 'นายจิระศักดิ์', 'โชติวรรธน์', 'sam@gmail.com', '260-502-6062', 4, 9, 21, 73, 'sam', 'e10adc3949ba59abbe56e057f20f883e', 2, '2024-08-07 08:48:34'),
(7, 'นายตฤณภัทร', 'สุริยะกานต์', 'ram@gmail.com', '096-869-6295', 5, 10, 24, 86, 'ram', 'e10adc3949ba59abbe56e057f20f883e', 2, '2024-08-07 08:49:54'),
(8, 'นางสาวภัทรณัฏฐ์', 'เลิศวรรธน์', 'ravince@gmail.com', '0847595412', 1, 6, 1, 1, 'ravince', 'e10adc3949ba59abbe56e057f20f883e', 2, '2024-09-26 04:26:38'),
(9, 'กุลนันท์', 'กรภัทร์', 'kunranun@gmail.com', '0874512562', 6, 11, 28, 99, 'kunranun', 'e10adc3949ba59abbe56e057f20f883e', 2, '2024-09-26 08:07:16'),
(10, 'นางสาวนาฎญา', 'บุญศิริรังสิกุล', 'natthaya@htomail.com', '0845120314', 2, 1, 9, 26, 'natthaya', 'e10adc3949ba59abbe56e057f20f883e', 2, '2024-09-26 09:06:04'),
(11, 'นายบุเรณศ์', 'นเรศน์ ณ เชืยงใหม่', 'burenz@hotmail.com', '0845897521', 8, 13, 33, 114, 'burenz', 'e10adc3949ba59abbe56e057f20f883e', 2, '2024-09-26 09:09:39'),
(12, 'นางสาวเรวตีย์', 'ศรีสุริโยดม', 'ravatee@gmail.com', '0254187594', 7, 12, 31, 108, 'ravatee', '25f9e794323b453885f5181f1b624d0b', 2, '2024-09-26 09:13:38'),
(13, 'นางสาวศิริณทญ์', 'แสวงหาทรัพย์', 'silin@gmail.com', '082-135-1315', 8, 13, 32, 111, 'silin', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-10-03 03:30:26'),
(14, 'นายผดุงเดช', 'รักษาอำนาจ', 'maw@hotmail.com', '056-523-2233', 9, 14, 41, 118, 'mawmaw', '36b0b45001be7a636286844ac9f2e03e', 1, '2024-10-03 04:17:47'),
(15, 'นายพีรดนย์', 'เรืองปัญญา', 'yamyam@/*htom;df,com', '065-161-6351', 8, 13, 32, 112, 'yamyam', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-10-03 04:40:45'),
(16, 'นายยศพัฒน์ ', 'ยุกตนันท์', 'san@', '058-808-8048', 2, 1, 9, 26, 'rawan', 'e10adc3949ba59abbe56e057f20f883e', 2, '2024-12-27 02:49:06'),
(17, 'นายกษิต', 'จิตตรี', 'kasit@gmai.com', '028-415-3221', 6, 11, 27, 97, 'kasit', '$2y$10$FCKQ/djtAcdmxuXehQrQWu8p/L5MhP6uT5nYmjzz9HFs8GDG4LxDy', 2, '2025-01-02 05:40:58'),
(18, 'นายชนนาน', 'ชธศิต', 'connan@hotmail.com', '086-456-6351', 3, 3, 16, 46, 'connan', '$2y$10$GtPfVaQWfww62H7BaD04IeSSpzxpFmrvwfZpv3QVCGy4j1N2P3iua', 2, '2025-01-02 06:24:42'),
(19, 'นางสาวกาญจนา', 'วิชยุตม์', 'kanjana@outlook.com', '041-516-3135', 2, 1, 9, 26, 'kanjana', '$2y$10$yrLlGY7XCtIvcoLaJMEjYeC7jcURUHoQbg6Vwbb.TQY3eC6th4S86', 2, '2025-01-02 06:25:55'),
(20, 'นางสาวมนัสวี', 'พีรวิชญ์', 'runcapon@hotmail.co.th', '095-411-2315', 3, 3, 16, 45, 'runcapon', '$2y$10$vw9fBvAKiFlzF.m1ODLf9eURj5K5ZxO6uEHoVaoTvZLbQIANT16om', 2, '2025-01-02 06:48:40'),
(21, 'นายชาเย็น', 'เย็นชา', 'chayen@yahoo.com', '085-415-5220', 3, 4, 18, 51, 'chayen', '$2y$10$ZXeHtFdNcV11os8pm55TeuAhNIkBWUmZWzlN8iY.vPeSYHSt3MCKO', 1, '2025-01-02 07:48:45'),
(22, 'นางสาวสิริญญา', 'กานต์เกตุเกล้า', 'sirinya@hotmail.com', '098-745-1200', 7, 12, 31, 108, 'sirinya', '$2y$10$j4BhBGLRAtYoM/Z1sfRvoeNIvxTeqBs4OfY3uMCOhXYJ9dDN79oky', 1, '2025-01-02 09:00:59'),
(23, 'นายธนาคาร', 'ทรัพมั่นคง', 'thanakan@gmail.com', '098-745-612', 3, 4, 19, 54, 'thanakan', '$2y$10$vwgjP9JSlPXTyTGEaxhjR.NlEC0H1GziDPG9b2G8sh316bmPTdBGS', 2, '2025-01-03 03:19:57'),
(24, 'นายแสง', 'ราชสีห์', 'sangracchasi.285@gamil.com', '084-646-5165', 1, 6, 3, 7, 'sangzz', 'e10adc3949ba59abbe56e057f20f883e', 1, '2025-01-06 08:51:23'),
(25, 'นายเอกธนัช', 'อนันต์ธวัช', 'fang@gmail.com', '087-454-1111', 4, 9, 21, 73, 'fukfang', '432f45b44c432414d2f97df0e5743818', 1, '2025-01-06 08:59:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `email_address` (`email_address`),
  ADD KEY `phone` (`phone`),
  ADD KEY `department` (`department`),
  ADD KEY `username` (`username`),
  ADD KEY `department` (`department`),
  ADD KEY `segment` (`segment`),
  ADD KEY `division` (`division`),
  ADD KEY `working` (`working`),
  ADD KEY `urole` (`urole`),
  ADD KEY `created_at` (`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
