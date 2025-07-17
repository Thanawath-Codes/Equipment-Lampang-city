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
-- Database: `equipment_scanner`
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
-- Table structure for table `printing_speeds`
--

CREATE TABLE `printing_speeds` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `scanner_model_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `printing_speeds`
--

INSERT INTO `printing_speeds` (`id`, `name`, `scanner_model_id`) VALUES
(1, '23 แผ่น/นาที', 1),
(2, '40 แผ่น/นาที', 2),
(3, '60 แผ่น/นาที', 3),
(4, '60 แผ่น/นาที', 4),
(5, '32 แผ่น/นาที', 5),
(6, '80 แผ่น/นาที', 6),
(7, '130 แผ่น/นาที', 7),
(8, '6 แผ่น/นาที', 8),
(9, '60 แผ่น/นาที', 9),
(10, '23 แผ่น/นาที', 10),
(11, '6 แผ่น/นาที', 11),
(12, '5 แผ่น/นาที', 12),
(13, '80 แผ่น/นาที', 13),
(14, '60 แผ่น/นาที', 14);

-- --------------------------------------------------------

--
-- Table structure for table `scanner_brands`
--

CREATE TABLE `scanner_brands` (
  `id` int(11) NOT NULL,
  `sortname` varchar(2) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `scanner_brands`
--

INSERT INTO `scanner_brands` (`id`, `sortname`, `name`) VALUES
(1, 'HP', 'HP'),
(2, 'BT', 'BROTHER'),
(3, 'CN', 'CANON'),
(4, 'FJ', 'FUJI'),
(5, 'ES', 'EPSON'),
(6, 'CX', 'CONTEX');

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

-- --------------------------------------------------------

--
-- Table structure for table `scanner_models`
--

CREATE TABLE `scanner_models` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `scanner_brand_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `scanner_models`
--

INSERT INTO `scanner_models` (`id`, `name`, `scanner_brand_id`) VALUES
(1, 'PRO 1000 S2', 1),
(2, 'PRO 2000 S2', 1),
(3, 'PRO 3000 S2', 1),
(4, 'ADS-2110W', 2),
(5, 'ADS-1110W', 2),
(6, 'ADS-4300N', 2),
(7, 'DS-860', 5),
(8, 'LIDE-220', 3),
(9, 'SP-1130', 4),
(10, 'GT-2000', 5),
(11, 'TM53D', 6),
(12, 'LIDE-25', 3),
(13, 'PRO 3000 S4', 1),
(14, 'ADS-4900W', 2);

-- --------------------------------------------------------

--
-- Table structure for table `scanner_paper_sizes`
--

CREATE TABLE `scanner_paper_sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `printing_speed_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `scanner_paper_sizes`
--

INSERT INTO `scanner_paper_sizes` (`id`, `name`, `printing_speed_id`) VALUES
(1, 'A4', 1),
(2, 'A4', 2),
(3, 'A4', 3),
(4, 'A4', 4),
(5, 'A4', 5),
(6, 'A4', 6),
(7, 'A4', 7),
(8, 'A4', 8),
(9, 'A4', 9),
(10, 'A4', 10),
(11, 'A4', 11),
(12, 'A4', 12),
(13, 'A4', 13),
(14, 'A4', 14);

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
-- Table structure for table `status_equipments`
--

CREATE TABLE `status_equipments` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `status_equipments`
--

INSERT INTO `status_equipments` (`id`, `sortname`, `name`) VALUES
(1, 'กช', 'กำลังใช้งาน'),
(2, 'ชร', 'ชำรุด/กำลังซ่อมแซม'),
(3, 'อย', 'โอนย้าย'),
(4, 'รจ', 'รอจำหน่าย');

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
-- Indexes for table `printing_speeds`
--
ALTER TABLE `printing_speeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scanner_brands`
--
ALTER TABLE `scanner_brands`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `scanner_models`
--
ALTER TABLE `scanner_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scanner_paper_sizes`
--
ALTER TABLE `scanner_paper_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `segments`
--
ALTER TABLE `segments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_equipments`
--
ALTER TABLE `status_equipments`
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
-- AUTO_INCREMENT for table `printing_speeds`
--
ALTER TABLE `printing_speeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `scanner_brands`
--
ALTER TABLE `scanner_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scanner_lists`
--
ALTER TABLE `scanner_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `scanner_models`
--
ALTER TABLE `scanner_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `scanner_paper_sizes`
--
ALTER TABLE `scanner_paper_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `status_equipments`
--
ALTER TABLE `status_equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workings`
--
ALTER TABLE `workings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
