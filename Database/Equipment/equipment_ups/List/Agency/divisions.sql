-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 11:09 AM
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
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `segment_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `segment_id`) VALUES
(1, 'ฝ่ายบริหารงานทั่วไป', 6),
(2, 'ฝ่ายอำนวยการ', 6),
(3, 'ฝ่ายปกครอง', 6),
(4, 'ฝ่ายประสานงานองค์กรปกครองส่วนท้องถิ่น', 6),
(5, 'ฝ่ายทะเบียนราษฎรและบัตรประจำตัวประชาชน', 6),
(6, 'ฝ่ายบริหารงานขนส่ง', 6),
(7, 'ฝ่ายนิติการ', 6),
(8, 'ฝ่ายบริหารงานทั่วไป', 7),
(9, 'ฝ่ายกิจการโรงเรียน', 1),
(10, 'ฝ่ายวิชาการ', 1),
(11, 'ฝ่ายการศึกษานอกระบบและตามอัธยาศัย', 2),
(12, 'ฝ่ายกิจกรรมเด็กและเยาวชน', 2),
(13, 'ฝ่ายส่งเสริมศาสนา ศิลปะ และวัฒนธรรม', 2),
(14, 'ฝ่ายบริหารงานทั่วไป', 8),
(15, 'ฝ่ายควบคุมอาคาร', 3),
(16, 'ฝ่ายผังเมือง', 3),
(18, 'ฝ่ายวิศวกรรมโยธา', 4),
(19, 'ฝ่ายสถาปัตยกรรม', 4),
(20, 'ฝ่ายสาธารณูปโภค', 5),
(21, 'ฝ่ายบริหารงานทั่วไป', 9),
(22, 'ฝ่ายบริหารงานคลัง', 9),
(23, 'ฝ่ายพัฒนารายได้', 9),
(24, 'ฝ่ายบริหารงานทั่วไป', 10),
(25, 'ฝ่ายบริหารงานสาธารณสุข', 10),
(26, 'ฝ่ายบริการสาธารณสุข', 10),
(27, 'ฝ่ายบริหารงานทั่วไป', 11),
(28, 'ฝ่ายบริการและเผยแพร่วิชาการ', 11),
(29, 'ฝ่ายแผนงานและงบประมาณ', 11),
(30, 'ฝ่ายสังคมสงเคราะห์', 12),
(31, 'ฝ่ายพัฒนาชุมชน', 12),
(32, 'ฝ่ายสรรหาและบรรจุแต่งตั้ง', 13),
(33, 'ฝ่ายส่งเสริมและพัฒนาบุคลากร', 13),
(34, '-', 3),
(35, '-', 4),
(36, 'ฝ่ายสวนสาธารณะ', 5),
(37, '-', 12),
(38, '-', 13),
(39, 'ฝ่ายงานเครื่องจักรกล', 5),
(40, 'ฝ่ายงานระบบการจราจร', 5),
(41, '-', 14),
(42, 'ฝ่ายช่างสุขาภิบาล', 5),
(43, '-', 5),
(44, 'ฝ่ายศึกษานิเทศก์', 7),
(45, '-', 6),
(46, '-', 7),
(47, '-', 8),
(48, '-', 9),
(49, '-', 10),
(50, '-', 11),
(51, '-', 1),
(52, '-', 2),
(53, '-', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
