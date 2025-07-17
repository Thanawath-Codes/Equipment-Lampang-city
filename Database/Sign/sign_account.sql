-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 10:52 AM
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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `sortname` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `sortname`, `name`) VALUES
(1, 'Municipal', 'สำนักปลัดเทศบาล'),
(2, 'Education', 'สำนักการศึกษา'),
(3, 'Engineer', 'สำนักช่าง'),
(4, 'Finance', 'กองคลัง'),
(5, 'Health', 'กองสาธารณสุขและสิ่งแวดล้อม'),
(6, 'Strategy', 'กองยุทธศาสตร์และงบประมาณ'),
(7, 'Welfare', 'กองสวัสดิการสังคม'),
(8, 'Personnel', 'กองการเจ้าหน้าที่'),
(9, 'Manager', 'คณะผู้บริหาร'),
(10, 'Audit', 'ตรวจสอบภายใน');

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

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE `segments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`id`, `name`, `department_id`) VALUES
(1, 'ส่วนบริหารการศึกษา', 2),
(2, 'ส่วนส่งเสริมการศึกษา ศาสนาและวัฒนธรรม', 2),
(3, 'ส่วนควบคุมอาคารและผังเมือง', 3),
(4, 'ส่วนควบคุมการก่อสร้าง', 3),
(5, 'ส่วนการโยธา', 3),
(6, '-', 1),
(7, '-', 2),
(8, '-', 3),
(9, '-', 4),
(10, '-', 5),
(11, '-', 6),
(12, '-', 7),
(13, '-', 8),
(14, '-', 9),
(15, '-', 10);

-- --------------------------------------------------------

--
-- Table structure for table `uroles`
--

CREATE TABLE `uroles` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uroles`
--

INSERT INTO `uroles` (`id`, `sortname`, `name`) VALUES
(1, 'ADD', 'ADMIN'),
(2, 'PER', 'PERSONNEL');

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

-- --------------------------------------------------------

--
-- Table structure for table `workings`
--

CREATE TABLE `workings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `division_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `workings`
--

INSERT INTO `workings` (`id`, `name`, `division_id`) VALUES
(1, 'งานธุรการ', 1),
(2, 'งานสารบรรณ', 1),
(3, 'งานศูนย์บริการร่วมและรับเรื่องราวร้องทุกข์', 1),
(4, 'งานส่งเสริมการท่องเที่ยว', 2),
(5, 'งานควบคุมเทศพาณิชย์', 2),
(6, 'งานป้องกันและบรรเทาสาธารณภัย', 3),
(7, 'งานรักษาความสงบ', 3),
(8, 'งานอาสาป้องกันภัยฝ่ายพลเรือน', 3),
(9, 'งานบริหารกิจการสภา', 4),
(10, 'งานกฎหมาย', 4),
(11, 'งานเลขานุการผู้บริหารและรัฐพิธี', 4),
(12, 'งานทะเบียนราษฎร', 5),
(13, 'งานบัตรประจำตัวประชาชน', 5),
(14, 'งานข้อมูลทะเบียนราษฎรและบัตรประจำตัวประชาชน', 5),
(15, 'งานบริหารกิจการสถานีขนส่ง', 6),
(16, 'งานการเงินและบัญชี', 6),
(17, 'งานรับเรื่องราวร้องทุกข์', 7),
(18, 'งานนิติกรรมสัญญา', 7),
(19, 'งานบังคับคดี', 7),
(20, 'งานธุรการ', 8),
(21, 'งานแผนงานและโครงการ', 8),
(22, 'งานระบบสารสนเทศ', 8),
(23, 'งานงบประมาณ', 8),
(24, 'งานพัสดุ', 8),
(25, 'งานการเงินและบัญชี', 8),
(26, 'งานการศึกษาปฐมวัย', 9),
(27, 'งานโรงเรียน', 9),
(28, 'งานกิจการนักเรียน', 9),
(29, 'งานศูนย์พัฒนาเด็กเล็ก', 9),
(30, 'งานส่งเสริมคุณภาพและมาตรฐานหลักสูตร', 10),
(31, 'งานพัฒนาสื่อเทคโนโลยีและนวัตกรรมทางการศึกษา', 10),
(32, 'งานการศึกษานอกระบบและตามอัธยาศัย', 11),
(33, 'งานห้องสมุด', 11),
(34, 'งานพิพิธภัณฑ์และเครือข่ายทางการศึกษา', 11),
(35, 'งานกิจกรรมเด็กและเยาวชน', 12),
(36, 'งานกีฬาและนันทนาการ', 12),
(37, 'งานกิจการศาสนา', 13),
(38, 'งานส่งเสริมประเพณี ศิลปวัฒนธรรม', 13),
(39, 'งานธุรการ (สำนัก)', 14),
(40, 'งานการเงินและบัญชี (สำนัก)', 14),
(41, 'งานสารบรรณ', 14),
(42, 'งานธุรการ', 34),
(43, 'งานควบคุมอาคาร', 15),
(44, 'งานขออนุญาตอาคาร', 15),
(45, 'งานจัดทำผังเมือง', 16),
(46, 'งานควบคุมผังเมือง', 16),
(47, 'งานอนุรักษ์สถาปัตยกรรมและโบราณสถาน', 16),
(48, 'งานธุรการ', 35),
(49, 'งานประมาณราคา', 35),
(50, 'งานแผนงานและโครงการ', 35),
(51, 'งานวิศวกรรมโยธา 1', 18),
(52, 'งานวิศวกรรมโยธา 2', 18),
(53, 'งานสถาปัตยกรรม 1', 19),
(54, 'งานสถาปัตยกรรม 2', 19),
(55, 'งานธุรการ', 43),
(56, 'งานบำรุงรักษาทางและสะพาน', 20),
(57, 'งานบำรุงรักษาสถานที่', 20),
(58, 'งานไฟฟ้าสาธารณะ', 20),
(59, 'งานเรือนเพาะชำและขยายพันธุ์', 36),
(60, 'งานควบคุมและบำรุงรักษาสวนสาธารณะ', 36),
(61, 'งานวางแผนและบริหารเครื่องจักรกลและยานพาหนะ', 39),
(62, 'งานซ่อมและบำรุงเครื่องจักรกลและยานพาหนะ', 39),
(63, 'งานวางระบบจราจร', 40),
(64, 'งานพัฒนาการสอน', 44),
(65, 'งานกำจัดขยะมูลฝอยและสิ่งปฏิกูล', 42),
(66, 'งานเครื่องจักรกลและซ่อมบำรุง', 42),
(67, 'งานควบคุมและตรวจสอบการบำบัดน้ำเสีย', 42),
(68, 'งานวิจัยและประเมินผลและบริการทางการศึกษา', 44),
(69, 'งานวิเคราะห์คุณภาพน้ำ', 42),
(70, 'งานซ่อมแซมและบำรุงรักษา', 42),
(71, 'งานแบบแผนและก่อสร้าง', 42),
(72, 'งานธุรการ', 21),
(73, 'งานการเงินและบัญชี (กอง)', 21),
(74, 'งานการเงินและบัญชี', 22),
(75, 'งานระเบียบและสถิติการคลัง', 22),
(76, 'งานพัสดุ', 22),
(77, 'งานทะเบียนทรัพย์สิน', 22),
(78, 'งานพัฒนารายได้', 23),
(79, 'งานเร่งรัดรายได้', 23),
(80, 'งานผลประโยชน์', 23),
(81, 'งานกิจการพาณิชย์', 23),
(82, 'งานจัดเก็บภาษี', 23),
(83, 'งานแผนที่ภาษีและทะเบียนทรัพย์สิน', 23),
(84, 'งานบริการข้อมูลแผนที่ภาษีและทะเบียนทรัพย์สิน', 23),
(85, 'งานธุรการ', 24),
(86, 'งานการเงินและบัญชี', 24),
(87, 'งานสุขาภิบาลอนามัยและสิ่งแวดล้อม', 25),
(88, 'งานสุขาภิบาลอาหารและคุ้มครองผู้บริโภค', 25),
(89, 'งานรักษาความสะอาด', 25),
(90, 'งานตลาด', 25),
(91, 'งานศูนย์บริการสาธารณสุข', 25),
(92, 'งานทันตกรรม', 25),
(93, 'งานส่งเสริมสุขภาพ', 26),
(94, 'งานป้องกันและควบคุมโรคติดต่อ', 26),
(95, 'งานสัตวแพทย์', 26),
(96, 'งานธุรการ', 27),
(97, 'งานสารบรรณ', 27),
(98, 'งานประชาสัมพันธ์', 28),
(99, 'งานศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร', 28),
(100, 'งานวิเคราะห์นโยบายและแผน', 29),
(101, 'งานจัดทำงบประมาณ', 29),
(102, 'งานวิจัยและประเมินผล', 29),
(103, 'งานธุรการ', 37),
(104, 'งานสังคมสงเคราะห์', 30),
(105, 'งานส่งเสริมและพัฒนาเด็ก สตรี คนพิการ และคนชรา', 30),
(106, 'งานพัฒนาชุมชน', 31),
(107, 'งานชุมชนเมือง', 31),
(108, 'งานส่งเสริมการจัดสวัสดิการสังคม', 31),
(109, 'งานส่งเสริมและพัฒนาอาชีพ', 31),
(110, 'งานธุรการ', 38),
(111, 'งานการเจ้าหน้าที่', 32),
(112, 'งานบุคลากรทางการศึกษา', 32),
(113, 'งานอัตรากำลังและข้อมูลบุคลากร', 32),
(114, 'งานพัฒนาบุคลากร', 33),
(115, 'งานสิทธิสวัสดิการ', 33),
(116, 'งานการรักษาวินัย', 33),
(117, 'งานส่งเสริมคุณธรรม', 33),
(118, '-', 41),
(119, 'งานสัญญาณไฟฟ้าและเครื่องหมายจราจร', 40),
(120, 'งานพัฒนาการนิเทศ', 44),
(121, '-', 1),
(122, '-', 2),
(123, '-', 3),
(124, '-', 4),
(125, '-', 5),
(126, '-', 6),
(127, '-', 7),
(128, '-', 8),
(129, '-', 9),
(131, '-', 10),
(132, '-', 11),
(133, '-', 12),
(134, '-', 13),
(135, '-', 14),
(136, '-', 15),
(137, '-', 16),
(138, '-', 17),
(139, '-', 18),
(140, '-', 19),
(141, '-', 20),
(142, '-', 21),
(143, '-', 22),
(144, '-', 23),
(145, '-', 24),
(146, '-', 25),
(147, '-', 26),
(148, '-', 27),
(149, '-', 28),
(150, '-', 29),
(151, '-', 30),
(152, '-', 31),
(153, '-', 32),
(154, '-', 33),
(155, '-', 36),
(156, '-', 39),
(157, '-', 40),
(158, '-', 42),
(159, '-', 44),
(160, '-', 45),
(161, '-', 46),
(162, '-', 47),
(163, '-', 48),
(164, '-', 49),
(165, '-', 50),
(166, '-', 37),
(167, '-', 38),
(168, '-', 51),
(169, '-', 52),
(170, '-', 34),
(171, '-', 35),
(172, '-', 43),
(173, '-', 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `segments`
--
ALTER TABLE `segments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uroles`
--
ALTER TABLE `uroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workings`
--
ALTER TABLE `workings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `uroles`
--
ALTER TABLE `uroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `workings`
--
ALTER TABLE `workings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
