-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 03:22 AM
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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `sortname`, `name`) VALUES
(1, 'สป', 'สำนักปลัดเทศบาล'),
(2, 'ศษ', 'สำนักการศึกษา'),
(3, 'สช', 'สำนักช่าง'),
(4, 'กค', 'กองคลัง'),
(5, 'สส', 'กองสาธารณสุขและสิ่งแวดล้อม'),
(6, 'กย', 'กองยุทธศาสตร์และงบประมาณ'),
(7, 'กส', 'กองสวัสดิการสังคม'),
(8, 'กจ', 'กองการเจ้าหน้าที่'),
(9, 'ผบ', 'คณะผู้บริหาร');

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
(52, '-', 2);

-- --------------------------------------------------------

--
-- Table structure for table `os_tablets`
--

CREATE TABLE `os_tablets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tablet_rom_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `os_tablets`
--

INSERT INTO `os_tablets` (`id`, `name`, `tablet_rom_id`) VALUES
(1, 'ANDROID', 1),
(2, 'IOS', 2);

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
(14, '-', 9);

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
-- Table structure for table `tablet_brands`
--

CREATE TABLE `tablet_brands` (
  `id` int(11) NOT NULL,
  `sortname` varchar(2) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tablet_brands`
--

INSERT INTO `tablet_brands` (`id`, `sortname`, `name`) VALUES
(1, 'SS', 'SAMSUNG'),
(2, 'AP', 'APPLE');

-- --------------------------------------------------------

--
-- Table structure for table `tablet_cpus`
--

CREATE TABLE `tablet_cpus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tablet_model_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tablet_cpus`
--

INSERT INTO `tablet_cpus` (`id`, `name`, `tablet_model_id`) VALUES
(1, 'SNAPDRAGON', 1),
(2, 'A13 BIONIC', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `tablet_models`
--

CREATE TABLE `tablet_models` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tablet_brand_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tablet_models`
--

INSERT INTO `tablet_models` (`id`, `name`, `tablet_brand_id`) VALUES
(1, 'TABS7 FE LTE (SM-T735)', 1),
(2, 'IPAD (9TH GEN) ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tablet_rams`
--

CREATE TABLE `tablet_rams` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tablet_speed_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tablet_rams`
--

INSERT INTO `tablet_rams` (`id`, `name`, `tablet_speed_id`) VALUES
(1, '4 GB LPDDR4X SDRAM', 1),
(2, '3 GB LPDDR4X SDRAM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tablet_roms`
--

CREATE TABLE `tablet_roms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tablet_ram_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tablet_roms`
--

INSERT INTO `tablet_roms` (`id`, `name`, `tablet_ram_id`) VALUES
(1, '64 GB', 1),
(2, '64 GB', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tablet_speeds`
--

CREATE TABLE `tablet_speeds` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tablet_cpu_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tablet_speeds`
--

INSERT INTO `tablet_speeds` (`id`, `name`, `tablet_cpu_id`) VALUES
(1, '2.20 GHz', 1),
(2, '2.65 GHz', 2);

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
(172, '-', 41),
(173, '-', 43);

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
-- Indexes for table `os_tablets`
--
ALTER TABLE `os_tablets`
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
-- Indexes for table `tablet_brands`
--
ALTER TABLE `tablet_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablet_cpus`
--
ALTER TABLE `tablet_cpus`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tablet_models`
--
ALTER TABLE `tablet_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablet_rams`
--
ALTER TABLE `tablet_rams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablet_roms`
--
ALTER TABLE `tablet_roms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablet_speeds`
--
ALTER TABLE `tablet_speeds`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `os_tablets`
--
ALTER TABLE `os_tablets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status_equipments`
--
ALTER TABLE `status_equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tablet_brands`
--
ALTER TABLE `tablet_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tablet_cpus`
--
ALTER TABLE `tablet_cpus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tablet_lists`
--
ALTER TABLE `tablet_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tablet_models`
--
ALTER TABLE `tablet_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tablet_rams`
--
ALTER TABLE `tablet_rams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tablet_roms`
--
ALTER TABLE `tablet_roms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tablet_speeds`
--
ALTER TABLE `tablet_speeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workings`
--
ALTER TABLE `workings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
