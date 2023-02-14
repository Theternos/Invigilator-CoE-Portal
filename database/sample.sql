-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2023 at 04:41 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invigilation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$aXV2rd1fVuByIDTk9XXDdulpRyAsh3dJAgQx/VdY4p0MkeZ4uV2PK');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_details`
--

DROP TABLE IF EXISTS `classroom_details`;
CREATE TABLE IF NOT EXISTS `classroom_details` (
  `Column_1` double DEFAULT NULL,
  `Column_2` varchar(10) DEFAULT NULL,
  `Column_3` varchar(10) DEFAULT NULL,
  `Column_4` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classroom_details`
--

INSERT INTO `classroom_details` (`Column_1`, `Column_2`, `Column_3`, `Column_4`) VALUES
(1, 'OLD AGRI B', 'First floo', 'AG21'),
(2, 'OLD AGRI B', 'First floo', 'AG22'),
(3, 'OLD AGRI B', 'First floo', 'AG23'),
(4, 'OLD AGRI B', 'First floo', 'AG24'),
(5, 'OLD AGRI B', 'First floo', 'AG25'),
(6, 'OLD AGRI B', 'First floo', 'AG26'),
(7, 'OLD AGRI B', 'Second flo', 'AG31'),
(8, 'OLD AGRI B', 'Second flo', 'AG32'),
(9, 'OLD AGRI B', 'Second flo', 'AG33'),
(10, 'OLD AGRI B', 'Second flo', 'AG34'),
(11, 'OLD AGRI B', 'Second flo', 'AG35'),
(12, 'EEE BLOCK', 'First floo', 'EE21'),
(13, 'EEE BLOCK', 'First floo', 'EE22'),
(14, 'EEE BLOCK', 'First floo', 'EE23'),
(15, 'EEE BLOCK', 'First floo', 'EE24'),
(16, 'EEE BLOCK', 'First floo', 'EE25'),
(17, 'EEE BLOCK', 'First floo', 'EE26'),
(18, 'EEE BLOCK', 'Second flo', 'EE31'),
(19, 'EEE BLOCK', 'Second flo', 'EE32'),
(20, 'EEE BLOCK', 'Second flo', 'EE33'),
(21, 'EEE BLOCK', 'Second flo', 'EE34'),
(22, 'EEE BLOCK', 'Second flo', 'EE35'),
(23, 'CT BLOCK', 'First floo', 'CT21'),
(24, 'CT BLOCK', 'First floo', 'CT22'),
(25, 'CT BLOCK', 'First floo', 'CT23'),
(27, 'CT BLOCK', 'First floo', 'CT25'),
(28, 'CT BLOCK', 'First floo', 'CT26'),
(29, 'AIDS BLOCK', 'Second flo', 'AIDS31'),
(30, 'AIDS BLOCK', 'Second flo', 'AIDS33'),
(31, 'AIDS BLOCK', 'Second flo', 'AIDS34'),
(32, 'AIDS BLOCK', 'Second flo', 'AIDS35'),
(33, 'IB BLOCK', 'First floo', 'IB102'),
(34, 'IB BLOCK', 'First floo', 'IB103'),
(35, 'IB BLOCK', 'First floo', 'IB104'),
(36, 'IB BLOCK', 'First floo', 'IB105'),
(37, 'IB BLOCK', 'First floo', 'IB106'),
(38, 'IB BLOCK', 'First floo', 'IB107'),
(39, 'IB BLOCK', 'First floo', 'IB108'),
(40, 'IB BLOCK', 'First floo', 'IB111'),
(41, 'IB BLOCK', 'First floo', 'IB112'),
(42, 'IB BLOCK', 'Second flo', 'IB201'),
(43, 'IB BLOCK', 'Second flo', 'IB202'),
(44, 'IB BLOCK', 'Second flo', 'IB203'),
(45, 'IB BLOCK', 'Second flo', 'IB204'),
(46, 'IB BLOCK', 'Second flo', 'IB205'),
(47, 'IB BLOCK', 'Second flo', 'IB206'),
(48, 'IB BLOCK', 'Second flo', 'IB207'),
(49, 'IB BLOCK', 'Second flo', 'IB208'),
(50, 'IB BLOCK', 'Second flo', 'IB209'),
(51, 'IB BLOCK', 'Second flo', 'IB210'),
(52, 'IB BLOCK', 'Second flo', 'IB211'),
(53, 'IB BLOCK', 'Second flo', 'IB212'),
(54, 'TT BLOCK', 'First floo', 'TT21'),
(55, 'TT BLOCK', 'First floo', 'TT22'),
(56, 'TT BLOCK', 'First floo', 'TT23'),
(57, 'TT BLOCK', 'First floo', 'TT24'),
(58, 'TT BLOCK', 'First floo', 'TT25'),
(59, 'TT BLOCK', 'First floo', 'TT26'),
(60, 'TT BLOCK', 'Second flo', 'TT31'),
(61, 'TT BLOCK', 'Second flo', 'TT32'),
(62, 'TT BLOCK', 'Second flo', 'TT33'),
(63, 'TT BLOCK', 'Second flo', 'TT34'),
(64, 'TT BLOCK', 'Second flo', 'TT35'),
(65, 'TT BLOCK', 'Second flo', 'TT36'),
(66, 'ECE BLOCK', 'First floo', 'EC21'),
(67, 'ECE BLOCK', 'First floo', 'EC22'),
(68, 'ECE BLOCK', 'First floo', 'EC23'),
(70, 'ECE BLOCK', 'First floo', 'EC25'),
(71, 'ECE BLOCK', 'First floo', 'EC26'),
(72, 'ECE BLOCK', 'Second flo', 'EC31'),
(73, 'ECE BLOCK', 'Second flo', 'EC32'),
(74, 'ECE BLOCK', 'Second flo', 'EC33'),
(75, 'ECE BLOCK', 'Second flo', 'EC34'),
(76, 'ECE BLOCK', 'Second flo', 'EC35'),
(77, 'ECE BLOCK', 'Second flo', 'EC36'),
(78, 'CIVIL BLOC', 'First floo', 'CE21'),
(79, 'CIVIL BLOC', 'First floo', 'CE22'),
(80, 'CIVIL BLOC', 'First floo', 'CE23'),
(81, 'CIVIL BLOC', 'First floo', 'CE24'),
(82, 'CIVIL BLOC', 'First floo', 'CE25'),
(83, 'CIVIL BLOC', 'First floo', 'CE26'),
(84, 'CIVIL BLOC', 'Second flo', 'CE31'),
(85, 'CIVIL BLOC', 'Second flo', 'CE32'),
(86, 'CIVIL BLOC', 'Second flo', 'CE33'),
(87, 'CIVIL BLOC', 'Second flo', 'CE34'),
(88, 'CIVIL BLOC', 'Second flo', 'CE35'),
(89, 'CIVIL BLOC', 'Second flo', 'CE36'),
(90, 'MECHANICAL', 'First floo', 'ME102'),
(91, 'MECHANICAL', 'First floo', 'ME103'),
(92, 'MECHANICAL', 'First floo', 'ME104'),
(93, 'MECHANICAL', 'First floo', 'ME105'),
(94, 'MECHANICAL', 'First floo', 'ME106'),
(95, 'MECHANICAL', 'First floo', 'ME107'),
(96, 'MECHANICAL', 'First floo', 'ME108'),
(97, 'MECHANICAL', 'Second flo', 'ME201'),
(98, 'MECHANICAL', 'Second flo', 'ME202'),
(99, 'MECHANICAL', 'Second flo', 'ME203'),
(100, 'MECHANICAL', 'Second flo', 'ME204'),
(101, 'MECHANICAL', 'Second flo', 'ME205'),
(102, 'MECHANICAL', 'Second flo', 'ME206'),
(103, 'MECHANICAL', 'Third floo', 'ME301'),
(104, 'MECHANICAL', 'Third floo', 'ME302'),
(105, 'MECHANICAL', 'Third floo', 'ME303'),
(106, 'MECHANICAL', 'Third floo', 'ME304'),
(107, 'MECHANICAL', 'Third floo', 'ME305'),
(108, 'MECHANICAL', 'Third floo', 'ME306'),
(109, 'SF BLOCK', 'Basement', 'IT001'),
(110, 'SF BLOCK', 'Basement', 'IT002'),
(111, 'SF BLOCK', 'Basement', 'IT003'),
(112, 'SF BLOCK', 'First floo', 'IT101'),
(113, 'SF BLOCK', 'First floo', 'IT102'),
(114, 'SF BLOCK', 'Second flo', 'CS201'),
(115, 'SF BLOCK', 'Second flo', 'CS202'),
(116, 'SF BLOCK', 'Second flo', 'CS203'),
(117, 'SF BLOCK', 'Third floo', 'AM301'),
(118, 'SF BLOCK', 'Third floo', 'CS302'),
(119, 'SF BLOCK', 'Third floo', 'CS303');

-- --------------------------------------------------------

--
-- Table structure for table `dept_sub`
--

DROP TABLE IF EXISTS `dept_sub`;
CREATE TABLE IF NOT EXISTS `dept_sub` (
  `id` double DEFAULT NULL,
  `Regulation` double DEFAULT NULL,
  `Department` varchar(10) DEFAULT NULL,
  `Sem_1` double DEFAULT NULL,
  `Sem_2` double DEFAULT NULL,
  `Sem_3` double DEFAULT NULL,
  `Sem_4` double DEFAULT NULL,
  `Sem_5` double DEFAULT NULL,
  `Sem_6` double DEFAULT NULL,
  `Sem_7` double DEFAULT NULL,
  `Sem_8` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dept_sub`
--

INSERT INTO `dept_sub` (`id`, `Regulation`, `Department`, `Sem_1`, `Sem_2`, `Sem_3`, `Sem_4`, `Sem_5`, `Sem_6`, `Sem_7`, `Sem_8`) VALUES
(1, 2018, 'Aeronautic', 4, 4, 6, 6, 8, 6, 6, 0),
(2, 2018, 'Agricultur', 4, 5, 6, 6, 7, 6, 6, 1),
(3, 2018, 'Automobile', 4, 4, 6, 6, 6, 6, 7, 3),
(4, 2018, 'Biomedical', 4, 5, 6, 6, 6, 6, 6, 3),
(5, 2018, 'Civil Engi', 4, 5, 6, 6, 8, 7, 9, 4),
(6, 2018, 'Computer S', 4, 5, 6, 6, 10, 9, 7, 2),
(7, 2018, 'Electrical', 4, 5, 6, 6, 8, 6, 7, 0),
(8, 2018, 'Electronic', 4, 6, 6, 6, 8, 9, 8, 1),
(9, 2018, 'Electronic', 4, 5, 6, 6, 5, 8, 7, 3),
(10, 2018, 'Informatio', 5, 5, 6, 6, 6, 7, 7, 0),
(11, 2018, 'Mechanical', 4, 5, 5, 6, 10, 11, 10, 2),
(12, 2018, 'Mechatroni', 4, 5, 6, 6, 7, 6, 6, 1),
(13, 2018, 'Artificial', 5, 5, 6, 6, 7, 0, 0, 0),
(14, 2018, 'Artificial', 5, 5, 6, 6, 0, 0, 0, 0),
(15, 2018, 'Biotechnol', 4, 6, 5, 6, 9, 8, 8, 0),
(16, 2018, 'Computer S', 5, 5, 6, 6, 7, 6, 7, 0),
(17, 2018, 'Computer T', 6, 5, 6, 6, 7, 7, 6, 0),
(18, 2018, 'Food Techn', 4, 5, 6, 6, 7, 7, 7, 0),
(19, 2018, 'Fashion Te', 4, 5, 6, 6, 6, 6, 6, 1),
(20, 2018, 'Informatio', 4, 5, 6, 6, 7, 8, 6, 1),
(21, 2018, 'Textile Te', 4, 5, 6, 6, 6, 7, 7, 1),
(22, 2021, 'Master of ', 6, 6, 8, 6, 0, 0, 0, 0),
(23, 2022, 'Biomedical', 5, 0, 0, 0, 0, 0, 0, 0),
(24, 2022, 'Civil Engi', 5, 0, 0, 0, 0, 0, 0, 0),
(25, 2022, 'Computer S', 5, 0, 0, 0, 0, 0, 0, 0),
(26, 2022, 'Computer S', 5, 0, 0, 0, 0, 0, 0, 0),
(27, 2022, 'Electrical', 5, 0, 0, 0, 0, 0, 0, 0),
(28, 2022, 'Electronic', 5, 0, 0, 0, 0, 0, 0, 0),
(29, 2022, 'Electronic', 5, 0, 0, 0, 0, 0, 0, 0),
(30, 2022, 'Informatio', 5, 0, 0, 0, 0, 0, 0, 0),
(31, 2022, 'Mechanical', 5, 0, 0, 0, 0, 0, 0, 0),
(32, 2022, 'Mechatroni', 5, 0, 0, 0, 0, 0, 0, 0),
(33, 2022, 'B.Tech Agr', 5, 0, 0, 0, 0, 0, 0, 0),
(34, 2022, 'Artificial', 5, 0, 0, 0, 0, 0, 0, 0),
(35, 2022, 'Artificial', 5, 0, 0, 0, 0, 0, 0, 0),
(36, 2022, 'Biotechnol', 5, 0, 0, 0, 0, 0, 0, 0),
(37, 2022, 'Computer S', 5, 0, 0, 0, 0, 0, 0, 0),
(38, 2022, 'Computer T', 5, 0, 0, 0, 0, 0, 0, 0),
(39, 2022, 'Food Techn', 5, 0, 0, 0, 0, 0, 0, 0),
(40, 2022, 'Fashion Te', 5, 0, 0, 0, 0, 0, 0, 0),
(41, 2022, 'Informatio', 5, 0, 0, 0, 0, 0, 0, 0),
(42, 2022, 'Textile Te', 5, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

DROP TABLE IF EXISTS `exam_details`;
CREATE TABLE IF NOT EXISTS `exam_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `batch` varchar(45) DEFAULT NULL,
  `exam_name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `ftime` varchar(45) DEFAULT NULL,
  `ttime` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT 'UPCOMING',
  `status` varchar(45) DEFAULT 'NOT RECRUITED',
  `date_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`id`, `batch`, `exam_name`, `date`, `ftime`, `ttime`, `state`, `status`, `date_time`) VALUES
(1, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30', '09:30', '11:00', 'UPCOMING', 'RECRUITED', '2023-03-30 / 09:30 - 11:00'),
(2, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30', '14:45', '15:15', 'UPCOMING', 'NOT RECRUITED', '2023-03-30 / 14:45 - 15:15'),
(3, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-31', '09:30', '11:00', 'UPCOMING', 'NOT RECRUITED', '2023-03-31 / 09:30 - 11:00'),
(4, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-31', '14:45', '15:15', 'UPCOMING', 'NOT RECRUITED', '2023-03-31 / 14:45 - 15:15'),
(5, 'UG 2nd Year Even Semester', 'PT - 1', '2023-04-01', '09:30', '11:00', 'UPCOMING', 'NOT RECRUITED', '2023-04-01 / 09:30 - 11:00'),
(6, 'UG 2nd Year Even Semester', 'PT - 1', '2023-04-01', '14:45', '15:15', 'UPCOMING', 'NOT RECRUITED', '2023-04-01 / 14:45 - 15:15');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

DROP TABLE IF EXISTS `leave`;
CREATE TABLE IF NOT EXISTS `leave` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `leave_type` varchar(45) DEFAULT NULL,
  `batch` varchar(45) DEFAULT NULL,
  `exam` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `alt_mail` varchar(100) DEFAULT NULL,
  `reaosn` varchar(45) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  `alt_staff` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'INITIATED',
  `state` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `name`, `leave_type`, `batch`, `exam`, `mail`, `alt_mail`, `reaosn`, `date_time`, `alt_staff`, `status`, `state`) VALUES
(1, 'test', 'test', 'test', 'test', 'gokulk@bitsathy.ac.in', 'test', 'test', '2023-03-30 / 09:30 - 11:00', 'test', 'REJECTED', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

DROP TABLE IF EXISTS `room_info`;
CREATE TABLE IF NOT EXISTS `room_info` (
  `id` bigint NOT NULL,
  `block_name` varchar(200) NOT NULL,
  `floor` varchar(200) NOT NULL,
  `seating_capacity` bigint NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `projector` varchar(200) NOT NULL,
  `wifi` varchar(200) NOT NULL,
  `systems` varchar(200) NOT NULL,
  `speaker` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `batch` varchar(45) DEFAULT NULL,
  `exam_name` varchar(45) DEFAULT NULL,
  `date_time` varchar(200) DEFAULT NULL,
  `staff` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'UPCOMING',
  `bio_time` time DEFAULT NULL,
  `mail_date` date DEFAULT NULL,
  `bio_out` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `batch`, `exam_name`, `date_time`, `staff`, `email`, `status`, `bio_time`, `mail_date`, `bio_out`) VALUES
(1, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30 / 09:30 - 11:00', 'Dr.BHARATHI A', 'bharathia@bitsathy.ac.in', 'UPCOMING', '09:15:00', '2023-03-29', '11:00:00'),
(2, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30 / 09:30 - 11:00', 'Dr.BHARANI KUMAR R', 'BHARANIKUMARR@BITSATHY.AC.IN', 'UPCOMING', '09:15:00', '2023-03-29', '11:00:00'),
(3, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30 / 09:30 - 11:00', 'Dr.SADASIVAM K', 'SADASIVAMK@BITSATHY.AC.IN', 'UPCOMING', '09:15:00', '2023-03-29', '11:00:00'),
(4, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30 / 09:30 - 11:00', 'Dr.SENTHIL KUMAR', 'SENTHILKUMARKL@BITSATHY.AC.IN', 'UPCOMING', '09:15:00', '2023-03-29', '11:00:00'),
(5, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30 / 09:30 - 11:00', 'Dr.POONGODI C', 'POONGODIC@BITSATHY.AC.IN', 'UPCOMING', '09:15:00', '2023-03-29', '11:00:00'),
(6, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30 / 09:30 - 11:00', 'Dr.RAVI KUMAR M', 'RAVIKUMARM@bitsathy.ac.in', 'UPCOMING', '09:15:00', '2023-03-29', '11:00:00'),
(7, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30 / 09:30 - 11:00', 'Dr.SENTHILKUMAR G', 'SENTHILKUMARG@BITSATHY.AC.IN', 'UPCOMING', '09:15:00', '2023-03-29', '11:00:00'),
(8, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30 / 09:30 - 11:00', 'Dr.SASIKUMAR C', 'sasikumarc@bitsathy.ac.in', 'UPCOMING', '09:15:00', '2023-03-29', '11:00:00'),
(9, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-30 / 09:30 - 11:00', 'Mr.GOKUL K', 'gokulk@bitsathy.ac.in', 'UPCOMING', '09:15:00', '2023-03-29', '11:00:00'),
(10, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-31 / 09:30 - 11:00', 'Mr.GOKUL K', 'gokulk@bitsathy.ac.in', 'UPCOMING', '09:15:00', '2023-03-30', '11:00:00'),
(11, 'UG 2nd Year Even Semester', 'PT - 1', '2023-03-29 / 09:30 - 11:00', 'Mr.GOKUL K', 'gokulk@bitsathy.ac.in', 'UPCOMING', '09:15:00', '2023-03-28', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_todo`
--

DROP TABLE IF EXISTS `staff_todo`;
CREATE TABLE IF NOT EXISTS `staff_todo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `staff_mail` varchar(100) DEFAULT NULL,
  `description` longtext,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'ternos', '$2y$10$LvhZ5PeI1PHdZGFJdfxUBeManXBPbcXWWKuCrt5YgqhkPCalNPdzm', '2022-10-18 14:21:51'),
(2, 'gokulk@bitsathy.ac.in', '$2y$10$2YEw9xCN84raBYZtmsaxoOZOiZbz6Nc1j8t3gtz2LweXxqbpxFIhm', '2023-02-10 19:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `Roll_No` varchar(100) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `student_official_email_id` varchar(100) DEFAULT NULL,
  `column_3` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`Roll_No`, `Year`, `student_official_email_id`, `column_3`) VALUES
('1025', 'Dr.BHARATHI A', 'bharathia@bitsathy.ac.in', ''),
('1040', 'Dr.BHARANI KUMAR R', 'BHARANIKUMARR@BITSATHY.AC.IN', ''),
('1054', 'Dr.SADASIVAM K', 'SADASIVAMK@BITSATHY.AC.IN', ''),
('1071', 'Dr.SENTHIL KUMAR', 'SENTHILKUMARKL@BITSATHY.AC.IN', ''),
('1072', 'Dr.POONGODI C', 'POONGODIC@BITSATHY.AC.IN', ''),
('1093', 'Dr.RAVI KUMAR M', 'RAVIKUMARM@bitsathy.ac.in', ''),
('1094', 'Dr.SENTHILKUMAR G', 'SENTHILKUMARG@BITSATHY.AC.IN', ''),
('1107', 'Dr.SASIKUMAR C', 'sasikumarc@bitsathy.ac.in', ''),
('1108', 'Dr.SUNDARA MURTHY S', 'SUNDARAMURTHYS@bitsathy.ac.in', ''),
('1110', 'Dr.SASIKALA D', 'SASIKALAD@BITSATHY.AC.IN', ''),
('1131', 'Dr.GOPALAKRISHNAN B', 'GOPALAKRISHNANB@BITSATHY.AC.IN', ''),
('1195', 'Mrs.SRINITYA G', 'NITYA@bitsathy.ac.in', ''),
('1226', 'Dr.LAKSHMI NARAYANA M MOHAN', 'LAKSHMINARAYANAMMOHAN@BITSATHY.AC.IN', ''),
('1238', 'Dr.DANIEL MADAN RAJA S', 'DANIEL@bitsathy.ac.in', ''),
('1276', 'Dr.GANESH BABU C', 'GANESHBABUC@bitsathy.ac.in', ''),
('1303', 'Dr.INDIRANI C', 'INDIRANIC@bitsathy.ac.in', ''),
('1311', 'Dr.SRINIVASAN M', 'SRINIVASANM@BITSATHY.AC.IN', ''),
('1312', 'Dr.UVARAJA V C', 'UVARAJAVC@bitsathy.ac.in', ''),
('1325', 'Dr.RAJALASHMI K', 'RAJALASHMIK@BITSATHY.AC.IN', ''),
('1327', 'Dr.THULASIMANI T', 'THULASIMANIT@bitsathy.ac.in', ''),
('1329', 'Dr.SIVARAMAN P', 'SIVARAMANPSR@BITSATHY.AC.IN', ''),
('1334', 'Dr.PRABHAVATHI K', 'PRABHAVATHIK@bitsathy.ac.in', ''),
('1335', 'Dr.AMARKARTHIK A', 'AMARKARTHIK@bitsathy.ac.in', ''),
('1340', 'Dr.VIJAY FRANKLIN J', 'VIJAYFRANKLINJ@BITSATHY.AC.IN', ''),
('1342', 'Dr.VINOTHINI V R', 'VINOTHINIVR@bitsathy.ac.in', ''),
('1349', 'Dr.MURUGESAN P', 'MURUGESANP@BITSATHY.AC.IN', ''),
('1362', 'Dr.SATHISHKUMAR P', 'SATHISHKUMARP@BITSATHY.AC.IN', ''),
('1373', 'Dr.SARAVANA MOORTHI P', 'SARAVANAMOORTHIP@bitsathy.ac.in', ''),
('1385', 'Dr.RAMESH C', 'RAMESHC@bitsathy.ac.in', ''),
('1388', 'Dr.KANNAN K P', 'kannankp@bitsathy.ac.in', ''),
('1407', 'Dr.VIJAYAKUMAR V N', 'vijayakumarvn@bitsathy.ac.in', ''),
('1410', 'Dr.RAMESH KUMAR T', 'RAMESHKUMART@BITSATHY.AC.IN', ''),
('1417', 'Dr.HARIKUMAR R', 'HARIKUMARR@BITSATHY.AC.IN', ''),
('1429', 'Dr.DEEPA D', 'DDEEPA@BITSATHY.AC.IN', ''),
('1437', 'Dr.VEERAKUMAR S', 'VEERAKUMARS@BITSATHY.AC.IN', ''),
('1438', 'Dr.VAIRAVEL K S', 'VAIRAVELKS@BITSATHY.AC.IN', ''),
('1441', 'Dr.PAARIVALLAL RA.', 'PARIVALLALR@BITSATHY.AC.IN', ''),
('1442', 'Dr.PALANISAMY C', 'CPALANISAMY@BITSATHY.AC.IN', ''),
('1444', 'Dr.GOMATHI R', 'GOMATHIR@BITSATHY.AC.IN', ''),
('1449', 'Dr.SANGARAVADIVEL P', 'SANGARAVADIVELP@bitsathy.ac.in', ''),
('1453', 'Dr.PRAKASH S P', 'PRAKASHSP@bitsathy.ac.in', ''),
('1465', 'Dr.PRAKASH K', 'PRAKASHK@bitsathy.ac.in', ''),
('1472', 'Dr.SIVAKUMAR K', 'SIVAKUMARK@bitsathy.ac.in', ''),
('1477', 'Dr.TAMILSELVI S', 'TAMILSELVIS@BITSATHY.AC.IN', ''),
('1493', 'Dr.SUBHAPRIYA P', 'SUBHAPRIYAP@BITSATHY.AC.IN', ''),
('1537', 'Dr.PUSHPAVALLI M', 'PUSHPAVALLIM@BITSATHY.AC.IN', ''),
('1543', 'Dr.ANANDHA MOORTHY A', 'ANANDHAMOORTHYA@bitsathy.ac.in', ''),
('1544', 'Dr.PRAKASH E', 'PRAKASHE@bitsathy.ac.in', ''),
('1557', 'Dr.VIJAYANAND P S', 'VIJAYANANDPS@bitsathy.ac.in', ''),
('1558', 'Dr.PRAVEENA R', 'praveenar@bitsathy.ac.in', ''),
('1560', 'Dr.SHANKAR N', 'SHANKARN@bitsathy.ac.in', ''),
('1566', 'Dr.PARIMALA M', 'PARIMALAM@BITSATHY.AC.IN', ''),
('1578', 'Dr.KAVITHA C', 'KAVITHAC@BITSATHY.AC.IN', ''),
('1606', 'Dr.BALAKRISHNARAJA R', 'BALAKRISHNARAJAR@BITSATHY.AC.IN', ''),
('1618', 'Dr.PREMALATHA K', 'PREMALATHAK@bitsathy.ac.in', ''),
('1627', 'Dr.RAJIEV R', 'rajievr@bitsathy.ac.in', ''),
('1636', 'Dr.VIVEKANANDAN J', 'vivekanandanj@bitsathy.ac.in', ''),
('1644', 'Dr.GOPALAKRISHNAN M', 'GOPALAKRISHNANM@bitsathy.ac.in', ''),
('1653', 'Dr.PONGALI SATHYA PRABU N', 'pongalispn@bitsathy.ac.in', ''),
('1661', 'Dr.MURUGAPPAN S', 'MURUGAPPANS@BITSATHY.AC.IN', ''),
('1682', 'Dr.MAHESWARI K T', 'MAHESWARIKT@bitsathy.ac.in', ''),
('1686', 'Dr.RAJASEKAR L', 'RAJASEKARL@bitsathy.ac.in', ''),
('1688', 'Dr.SUDHAHAR S', 'SUDHAHARS@BITSATHY.AC.IN', ''),
('1695', 'Mr.NANDHAKUMAR A', 'NANDHAKUMARA@bitsathy.ac.in', ''),
('1700', 'Mr.MANIVANNAN S', 'MANIVANNANS@bitsathy.ac.in', ''),
('1702', 'Dr.UMAMAGESWARI D', 'UMAMAGESWARID@BITSATHY.AC.IN', ''),
('1703', 'Dr.JAYARAMAN A', 'JAYARAMANA@BITSATHY.AC.IN', ''),
('1721', 'Mr.NIRMAL KUMAR R', 'NIRMALKUMARR@bitsathy.ac.in', ''),
('1723', 'Dr.ABRAHAM BENJAMIN SAMUEL', 'ABRAHAMBENJAMINSAMUEL@bitsathy.ac.in', ''),
('1737', 'Dr.SIVARAJ G', 'SIVARAJG@BITSATHY.AC.IN', ''),
('1744', 'Dr.RAMYA P', 'RAMYAP@bitsathy.ac.in', ''),
('1747', 'Mrs.SRITHA P', 'SRITHAP@BITSATHY.AC.IN', ''),
('1754', 'Mr.ASHOKKUMAR R', 'ASHOKKUMARR@bitsathy.ac.in', ''),
('1764', 'Mr.SATHIS KUMAR K', 'SATHISKUMARK@bitsathy.ac.in', ''),
('1781', 'Dr.BHUVANESWARI S', 'BHUVANESWARIS@bitsathy.ac.in', ''),
('1785', 'Mrs.MOHANAPRIYA V', 'mohanapriyav@bitsathy.ac.in', ''),
('1797', 'Dr.KARTHIGA  SHENBAGAM N', 'KARTHIGASHENBAGAMN@BITSATHY.AC.IN', ''),
('1819', 'Mr.DINESH D', 'DINESHD@BITSATHY.AC.IN', ''),
('1820', 'Dr.MATHANKUMAR P', 'MATHANKUMARP@bitsathy.ac.in', ''),
('1834', 'Dr.SANJOY DEB', 'SANJOYDEB@BITSATHY.AC.IN', ''),
('1841', 'Mr.LAKSHMANAN D', 'LAKSHMANAND@bitsathy.ac.in', ''),
('1843', 'Dr.SENTHILKUMAR P', 'SENTHILKUMARP@bitsathy.ac.in', ''),
('1846', 'Mrs.NAVEENA S', 'NAVEENA@bitsathy.ac.in', ''),
('1849', 'Dr.KIRUPA SANKAR M', 'KIRUPASANKARM@BITSATHY.AC.IN', ''),
('1859', 'Mrs.PREETHA V', 'PREETHAV@bitsathy.ac.in', ''),
('1865', 'Mrs.GEETHAMANI R', 'GEETHAMANIR@bitsathy.ac.in', ''),
('1869', 'Dr.VELMURUGAN S', 'VELMURUGANS@BITSATHY.AC.IN', ''),
('1877', 'Mr.SATHISHKUMAR C', 'SATHISHKUMARC@BITSATHY.AC.IN', ''),
('1878', 'Dr.JEGADHEESWARAN S', 'JEGADHEESWARANS@BITSATHY.AC.IN', ''),
('1880', 'Dr.SURESHKUMAR M', 'SURESHKUMARM@bitsathy.ac.in', ''),
('1884', 'Dr.SANTHOSH N', 'SANTHOSHN@BITSATHY.AC.IN', ''),
('1887', 'Dr.SHOUKATH ALI K', 'SHOUKATHALI@BITSATHY.AC.IN', ''),
('1889', 'Mrs.ROHINI P', 'ROHINIP@BITSATHY.AC.IN', ''),
('1892', 'Mr.LOGANAYAGAN S', 'LOGANAYAGANS@bitsathy.ac.in', ''),
('1893', 'Dr.ELANGO S', 'ELANGOS@bitsathy.ac.in', ''),
('1894', 'Dr.MALATHI MAHALINGAM ', 'malathimahalingamm@bitsathy.ac.in', ''),
('1895', 'Dr.VIJAYAKUMAR V', 'VIJAYAKUMARV@BITSATHY.AC.IN', ''),
('1901', 'Dr.MEGALINGAM @ MURUGAN A', 'MEGALINGAMA@BITSATHY.AC.IN', ''),
('1906', 'Mrs.RAMYA R', 'RAMYARV@BITSATHY.AC.IN', ''),
('1908', 'Mr.SUNDAR S', 'SUNDARS@BITSATHY.AC.IN', ''),
('1911', 'Mr.DANIEL RAJ A', 'DANIELRAJA@bitsathy.ac.in', ''),
('1912', 'Dr.SAJAN P PHILIP', 'SAJANPPHILIP@BITSATHY.AC.IN', ''),
('1926', 'Mr.SATHYAKUMAR N', 'SATHYAKUMARN@bitsathy.ac.in', ''),
('1928', 'Dr.ARUN SHALIN L V', 'ARUNSHALINLV@bitsathy.ac.in', ''),
('1930', 'Dr.PAVITHRA M K S', 'PAVITHRAMKS@bitsathy.ac.in', ''),
('1938', 'Mr.RAMKUMAR R', 'RAMKUMARR@bitsathy.ac.in', ''),
('1939', 'Ms.POOMANI K', 'POOMANIK@bitsathy.ac.in', ''),
('1943', 'Mrs.JAYANTHI V', 'JAYANTHIV@bitsathy.ac.in', ''),
('1945', 'Mrs.KANIMOZHI T', 'KANIMOZHIT@bitsathy.ac.in', ''),
('1954', 'Mr.RAJENDRAN M', 'RAJENDRANM@bitsathy.ac.in', ''),
('1957', 'Dr.SUNDARRAJU G', 'SUNDARRAJUG@bitsathy.ac.in', ''),
('1959', 'Mr.ARAVINDHAN C', 'ARAVINDHANC@BITSATHY.AC.IN', ''),
('1963', 'Ms.NANDHINI S S', 'NANDHINISS@BITSATHY.AC.IN', ''),
('1970', 'Mr.RAMAKRISHNAN A', 'RAMAKRISHNANA@bitsathy.ac.in', ''),
('1974', 'Mr.SAKTHIVEL MURUGAN E', 'SAKTHIVELMURUGANE@bitsathy.ac.in', ''),
('1975', 'Dr.TAJDEEN A', 'TAJDEENA@BITSATHY.AC.IN', ''),
('1982', 'Dr.SARAVANAKUMAR K', 'SARAVANAKUMARK@bitsathy.ac.in', ''),
('1993', 'Dr.DEEPA R', 'deepar@bitsathy.ac.in', ''),
('1996', 'Dr.ARUN JAYAKAR S', 'ARUNJAYAKARS@BITSATHY.AC.IN', ''),
('2014', 'Mr.SARANGAN K', 'SARANGANK@BITSATHY.AC.IN', ''),
('2022', 'Dr.GUNASEKARAN M', 'GUNASEKARANM.LB@bitsathy.ac.in', ''),
('2024', 'Dr.JEYARAMAN R', 'JEYARAMANR@bitsathy.ac.in', ''),
('2078', 'Mr.PRABHU P S', 'PRABHUPS@bitsathy.ac.in', ''),
('2204', 'Dr.NIRMALA S', 'NIRMALAS@bitsathy.ac.in', ''),
('2241', 'Dr.KODIESWARI A', 'kodieswaria@bitsathy.ac.in', ''),
('2351', 'Mr.RANGANATHAN A', 'RANGANATHANA@bitsathy.ac.in', ''),
('2635', 'Mr.MURUGAKANI S', 'MURUGAKANI@BITSATHY.AC.IN', ''),
('2771', 'Mr.NATARAJ N', 'nataraj@bitsathy.ac.in', ''),
('10003', 'Dr.SATHISH V', 'sathishv@bitsathy.ac.in', ''),
('10005', 'Dr.SANNASI CHAKRAVARTHY S R', 'sannasi@bitsathy.ac.in', ''),
('10010', 'Dr.MOHANRAJ A', 'MOHANRAJA@BITSATHY.AC.IN', ''),
('10025', 'Mr.DINESH P S', 'dineshps@bitsathy.ac.in', ''),
('10035', 'Mr.VADIVELU P', 'vadivelup@bitsathy.ac.in', ''),
('10044', 'Mr.PONMURUGAN M', 'PONMURUGANM@BITSATHY.AC.IN', ''),
('10051', 'Mr.GOKUL L S', 'GOKULLS@BITSATHY.AC.IN', ''),
('10053', 'Dr.GAYATHIRI N R', 'GAYATHIRINR@BITSATHY.AC.IN', ''),
('10058', 'Mr.MANJUNATH N V', 'MANJUNATHNV@BITSATHY.AC.IN', ''),
('10059', 'Mr.SANTHOSH KUMAR S', 'SANTHOSHKUMARS@BITSATHY.AC.IN', ''),
('10061', 'Mrs.RAMYA R', 'RAMYARCS@BITSATHY.AC.IN', ''),
('10071', 'Mrs.PREETHA R', 'PREETHA@BITSATHY.AC.IN', ''),
('10081', 'Dr.KUMARESAN G', 'KUMARESAN@BITSATHY.AC.IN', ''),
('10085', 'Dr.AMIRTHAVALLI K', 'AMIRTHAVALLI@BITSATHY.AC.IN', ''),
('10091', 'Mr.SARAVANAKUMAR R', 'null', ''),
('10092', 'Dr.VASUDEVAN M', 'VASUDEVAN@BITSATHY.AC.IN', ''),
('10097', 'Mr.SANTHOSH KUMAR K V', 'santhoshkumar@bitsathy.ac.in', ''),
('10098', 'Mr.PRADEEP A D', 'pradeep@bitsathy.ac.in', ''),
('10119', 'Mrs.SARANYA D', 'SARANYAD@BITSATHY.AC.IN', ''),
('10123', 'Dr.PACHAMUTHU P', 'PACHAMUTHU@BITSATHY.AC.IN', ''),
('10127', 'Mr.GNANASUNDAR V M', 'GNANASUNDAR@BITSATHY.AC.IN', ''),
('10128', 'Mr.NAVEEN R', 'NAVEEN@BITSATHY.AC.IN', ''),
('10129', 'Mrs.DURGADEVI S', 'DURGADEVI@BITSATHY.AC.IN', ''),
('10144', 'Dr.PURUSOTHAMAN P', 'PURUSOTHAMAN@bitsathy.ac.in', ''),
('10149', 'Mr.SIVABALAKRISHNAN R', 'sivabalakrishnan@bitsathy.ac.in', ''),
('10151', 'Mr.JAYAKUMAR N', 'JAYAKUMAR@BITSATHY.AC.IN', ''),
('10155', 'Mr.ALEX STANLEY RAJA T', 'ALEXSTANLEYRAJA@bitsathy.ac.in', ''),
('10163', 'Dr.ARUN KUMAR D', 'ARUNKUMAR@BITSATHY.AC.IN', ''),
('10172', 'Mr.VINOTH KUMAR J', 'VINOTHKUMAR@BITSATHY.AC.IN', ''),
('10173', 'Mr.RAJESH KANNA P', 'RAJESHKANNA@BITSATHY.AC.IN', ''),
('10174', 'Mr.MADHESWARAN S', 'MADHESWARAN@BITSATHY.AC.IN', ''),
('10176', 'Ms.SUDHA R', 'sudha@bitsathy.ac.in', ''),
('10179', 'Mr.NANDAKUMAR K', 'NANDAKUMAR@BITSATHY.AC.IN', ''),
('10184', 'Dr.VINOTH KUMAR N', 'vinoth@bitsathy.ac.in', ''),
('10186', 'Dr.SAMPOORNAM K P', 'SAMPOORNAM@BITSATHY.AC.IN', ''),
('10187', 'Dr.BALAMURUGAN V T', 'BALAMURUGAN@BITSATHY.AC.IN', ''),
('10194', 'Mr.KARTHIKEYAN S', 'KARTHIKEYAN@BITSATHY.AC.IN', ''),
('10195', 'Mr.RAJU C', 'RAJU@BITSATHY.AC.IN', ''),
('10198', 'Dr.INDU RANI B', 'INDURANI@BITSATHY.AC.IN', ''),
('10202', 'Mr.KARUPPUSAMY M', 'KARUPPUSAMY@BITSATHY.AC.IN', ''),
('10204', 'Dr.PARASURAMAN P', 'PARASURAMAN@BITSATHY.AC.IN', ''),
('10218', 'Dr.ASHOKAN S', 'ashokan@bitsathy.ac.in', ''),
('10224', 'Mrs.SARANYA D V', 'SARANYADV@BITSATHY.AC.IN', ''),
('10225', 'Dr.MUTHUKUMAR P', 'muthukumar@bitsathy.ac.in', ''),
('10229', 'Mrs.SARANYA N', 'saranyan@bitsathy.ac.in', ''),
('10233', 'Mr.SUBRAMANIYAN C', 'subramaniyan@bitsathy.ac.in', ''),
('10239', 'Mrs.KARTHIGA M', 'KARTHIGAM@BITSATHY.AC.IN', ''),
('10247', 'Mrs.LEELAVATHI R', 'LEELAVATHI@BITSATHY.AC.IN', ''),
('10249', 'Mr.DHANASEKAR R', 'DHANASEKAR@BITSATHY.AC.IN', ''),
('10255', 'Mr.SELVAMUTHUKUMARAN D', 'SELVAMUTHUKUMARAN@BITSATHY.AC.IN', ''),
('10262', 'Ms.SABARMATHI K R', 'sabarmathi@bitsathy.ac.in', ''),
('10264', 'Mrs.PUNITHA V', 'PUNITHA@BITSATHY.AC.IN', ''),
('10266', 'Mrs.HARITHA J', 'haritha@bitsathy.ac.in', ''),
('10268', 'Mrs.GANAGAVALLI K', 'GANAGAVALLI@BITSATHY.AC.IN', ''),
('10270', 'Ms.NANDHINI K M', 'nandhinikm@bitsathy.ac.in', ''),
('10273', 'Mr.BHUVANESH N', 'BHUVANESH@BITSATHY.AC.IN', ''),
('10289', 'Dr.SUBRATA DAS', 'subratadas@bitsathy.ac.in', ''),
('10291', 'Ms.BHARATHI A', 'bharathi@bitsathy.ac.in', ''),
('10298', 'Mr.OORAPPAN G M', 'oorappan@bitsathy.ac.in', ''),
('10299', 'Mr.VIGNESH S', 'vignesh@bitsathy.ac.in', ''),
('10306', 'Mrs.MEGAVARTHINI K K', 'megavarthini@bitsathy.ac.in', ''),
('10308', 'Mr.MOHAN KUMAR  V', 'mohankumar@bitsathy.ac.in', ''),
('10313', 'Dr.MUTHUKUMAR K', 'muthukumarkm@bitsathy.ac.in', ''),
('10314', 'Dr.VISWANATHAN G', 'viswanathan@bitsathy.ac.in', ''),
('10317', 'Mr.ARUN CHENDHURAN R', 'arunchendhuran@bitsathy.ac.in', ''),
('10328', 'Mr.RAMACHANDRA RAJU K', 'ramachandraraju@bitsathy.ac.in', ''),
('10333', 'Dr.MURALI KRISHNAN M', 'muralikrishnan@bitsathy.ac.in', ''),
('10336', 'Mr.GNANAPRAKASH V', 'gnanaprakash@bitsathy.ac.in', ''),
('10339', 'Mr.NARENDRA ILAYA PALLAVAN P', 'narendrailayapallavan@bitsathy.ac.in', ''),
('10346', 'Mrs.NANDHINI B', 'nandhinib@bitsathy.ac.in', ''),
('10347', 'Mrs.KARTHIKA M', 'karthikam@bitsathy.ac.in', ''),
('10348', 'Mrs.NISHANTHINI V', 'nishanthini@bitsathy.ac.in', ''),
('10363', 'Dr.USHA K S', 'usha@bitsathy.ac.in', ''),
('10367', 'Mrs.VIDHYA K ', 'vidhya@bitsathy.ac.in', ''),
('10369', 'Dr.NIJANDHAN K', 'nijandhan@bitsathy.ac.in', ''),
('10371', 'Dr.VIMALRAJ V', 'vimalraj@bitsathy.ac.in', ''),
('10372', 'Dr.RAMESHKUMAR A', 'rameshkumar@bitsathy.ac.in', ''),
('10373', 'Dr.MALATHI BALASUBRAMANIYAN', 'malathibalasubramaniyan@bitsathy.ac.in', ''),
('10375', 'Mr.ASHWIN  RAJ S', 'ashwinraj@bitsathy.ac.in', ''),
('10380', 'Dr.SELVAKUMAR K', 'selvakumark@bitsathy.ac.in', ''),
('10383', 'Mr.IKRAM N', 'ikram@bitsathy.ac.in', ''),
('10388', 'Mrs.SELVI S', 'selvi@bitsathy.ac.in', ''),
('10395', 'Ms.SRI VINITHA V', 'srivinitha@bitsathy.ac.in', ''),
('10397', 'Mr.SATHISHKUMAR S', 'sathishkumars@bitsathy.ac.in', ''),
('10399', 'Mr.SOUNDRAPANDIAN E', 'soundrapandian@bitsathy.ac.in', ''),
('10403', 'Mr.SAKTHIYA RAM S', 'SAKTHIYARAM@bitsathy.ac.in', ''),
('10408', 'Ms.RAMYA K', 'ramyak@bitsathy.ac.in', ''),
('10412', 'Mr.RAGHUNATH M', 'raghunath@bitsathy.ac.in', ''),
('10414', 'Mr.DEEPANKUMAR S', 'deepankumar@bitsathy.ac.in', ''),
('10416', 'Mr.KAMAL BASHA K', 'kamalbasha@bitsathy.ac.in', ''),
('10418', 'Mr.JEEVANANTHAM V', 'jeevanantham@bitsathy.ac.in', ''),
('10421', 'Mrs.RANJITHAM M', 'ranjitham@bitsathy.ac.in', ''),
('10424', 'Dr.SARAVANAN K', 'SARAVANANKC@BITSATHY.AC.IN', ''),
('10427', 'Mrs.MEKALA N', 'mekalan@bitsathy.ac.in', ''),
('10428', 'Mrs.KALAIYARASI M', 'KALAIYARASIM@bitsathy.ac.in', ''),
('10432', 'Ms.ABIRAMI M', 'abirami@bitsathy.ac.in', ''),
('10433', 'Ms.RAMYA R', 'ramyark@bitsathy.ac.in', ''),
('10436', 'Mrs.THARSANEE R M', 'tharsanee@bitsathy.ac.in', ''),
('10440', 'Mr.TAMILSELVAN A', 'tamilselvan@bitsathy.ac.in', ''),
('10443', 'Mr.BARANIDHARAN V', 'baranidharan@bitsathy.ac.in', ''),
('10447', 'Mr.TAMILARASAN V D', 'tamilarasan@bitsathy.ac.in', ''),
('10448', 'Dr.VINU KUMAR S M', 'vinukumar@bitsathy.ac.in', ''),
('10449', 'Mrs.PRABHA DEVI D', 'prabhadevi@bitsathy.ac.in', ''),
('10450', 'Mr.DHINESH S K', 'DHINESHSK@BITSATHY.AC.IN', ''),
('10452', 'Mr.KALAISELVAN S', 'kalaiselvan@bitsathy.ac.in', ''),
('10454', 'Mr.MOHAMED ISMAIL A', 'mohamedismail@bitsathy.ac.in', ''),
('10456', 'Dr.MANIVANNAN C', 'manivannanc@bitsathy.ac.in', ''),
('10457', 'Dr.THIRUMOORTHY M', 'thirumoorthy@bitsathy.ac.in', ''),
('10459', 'Mr.PRAVIN SAVARIDASS M', 'pravinsavaridass@bitsathy.ac.in', ''),
('10466', 'Mr.BALAMURUGAN R', 'balamuruganrs@bitsathy.ac.in', ''),
('10470', 'Mr.YUVARAJ K', 'yuvarajk@bitsathy.ac.in', ''),
('10473', 'Ms.SOUNDARIYA R S', 'soundariya@bitsathy.ac.in', ''),
('10480', 'Ms.PONNARMADHA S', 'ponnarmadha@bitsathy.ac.in', ''),
('10485', 'Mr.KALIMUTHU M', 'kalimuthu@bitsathy.ac.in', ''),
('10489', 'Dr.BAZILA BANU A', 'bazilabanu@bitsathy.ac.in', ''),
('10492', 'Mr.PRAKASH K B', 'prakashkb@bitsathy.ac.in', ''),
('10493', 'Mr.VIVEK KUMAR P', 'vivekkumar@bitsathy.ac.in', ''),
('10499', 'Dr.BALAJI M', 'balajim@bitsathy.ac.in', ''),
('10500', 'Mrs.MANIMEGALAI S', 'manimegalai@bitsathy.ac.in', ''),
('10503', 'Dr.CHELLADURAI V', 'chelladurai@bitsathy.ac.in', ''),
('10508', 'Ms.PRIYADARSHINI K', 'priyadarshinik@bitsathy.ac.in', ''),
('10518', 'Dr.PRABAKARAN P', 'prabakaran@bitsathy.ac.in', ''),
('10519', 'Mr.KRISHNAMOORTHY V', 'krishnamoorthy@bitsathy.ac.in', ''),
('10521', 'Mr.SARAN KUMAR A', 'sarankumar@bitsathy.ac.in', ''),
('10524', 'Mr.VAIDEESWARAN V', 'vaideeswaran@bitsathy.ac.in', ''),
('10538', 'Mr.PRAVEEN V', 'praveen@bitsathy.ac.in', ''),
('10539', 'Mrs.ROHINI D', 'rohini@bitsathy.ac.in', ''),
('10541', 'Ms.SOWMMIYA S', 'sowmmiya@bitsathy.ac.in', ''),
('10543', 'Mr.RANJITH G', 'ranjith@bitsathy.ac.in', ''),
('10544', 'Mr.VINOTH M', 'vinothm@bitsathy.ac.in', ''),
('10549', 'Mr.VIGNESH PRABU V', 'VIGNESHPRABU@BITSATHY.AC.IN', ''),
('10550', 'Mr.BALAVIGNESH S', 'balavignesh@bitsathy.ac.in', ''),
('10560', 'Dr.SWATHYPRIYADHARSINI P', 'swathypriyadharsini@bitsathy.ac.in', ''),
('10566', 'Dr.THIRUMURUGAN V', 'thirumurugan@bitsathy.ac.in', ''),
('10568', 'Mr.BOOPATHI C', 'boopathic@bitsathy.ac.in', ''),
('10571', 'Mrs.SOBIYAA P', 'sobiyaa@bitsathy.ac.in', ''),
('10572', 'Mr.RAJA T', 'raja@bitsathy.ac.in', ''),
('10575', 'Mr.SHANMUGA PRAKASH R', 'shanmugaprakash@bitsathy.ac.in', ''),
('10578', 'Mr.SUDHIR KUMAR V', 'sudhirkumar@bitsathy.ac.in', ''),
('10580', 'Ms.PRIYA J', 'priyajn@bitsathy.ac.in', ''),
('10581', 'Mr.TAMILSELVAN S', 'tamilselvans@bitsathy.ac.in', ''),
('10582', 'Mr.THAMARAI SELVAN V', 'thamaraiselvan@bitsathy.ac.in', ''),
('10584', 'Ms.RESHMI T S', 'reshmits@bitsathy.ac.in', ''),
('10594', 'Mr.SAKTHI SURIYA RAJ J S', 'sakthisuriyaraj@bitsathy.ac.in', ''),
('10595', 'Mrs.UMA MAHESWARI S', 'UMAMAHESWARI@BITSATHY.AC.IN', ''),
('10597', 'Mr.RAGHAVENDRA PRABHU S', 'raghavendraprabhu@bitsathy.ac.in', ''),
('10600', 'Ms.ASHWATHI R', 'ashwathi@bitsathy.ac.in', ''),
('10602', 'Dr.KANTHIMATHI N', 'kanthimathi@bitsathy.ac.in', ''),
('10603', 'Mr.RAJA SEKAR S', 'rajasekar@bitsathy.ac.in', ''),
('10607', 'Dr.JANARTHANAN M', 'janarthanan@bitsathy.ac.in', ''),
('10608', 'Mr.NAGARAJAN S', 'nagarajans@bitsathy.ac.in', ''),
('10611', 'Mr.SARAVANAN B', 'saravananb@bitsathy.ac.in', ''),
('10616', 'Mrs.NITHYA G', 'nithyag@bitsathy.ac.in', ''),
('10617', 'Ms.UMAMAHESWARI M', 'umamaheswarim@bitsathy.ac.in', ''),
('10619', 'Mrs.MADHUMITHA J', 'madhumithaj@bitsathy.ac.in', ''),
('10625', 'Mr.SIBI JOHN A', 'sibijohn@bitsathy.ac.in', ''),
('10628', 'Mr.ARUN KUMAR R', 'arunkumarr@bitsathy.ac.in', ''),
('10632', 'Mrs.KOTHAI A', 'kothai@bitsathy.ac.in', ''),
('10639', 'Mrs.SARANYA M K', 'saranyamk@bitsathy.ac.in', ''),
('10640', 'Mrs.BHUVANESWARI S', 'bhuvaneswari@bitsathy.ac.in', ''),
('10642', 'Mrs.DEEPIKA R', 'deepikar@bitsathy.ac.in', ''),
('10644', 'Dr.SARAVANA KUMAR R', 'saravanakumar@bitsathy.ac.in', ''),
('10645', 'Mr.DHAYANEETHI S', 'dhayaneethi@bitsathy.ac.in', ''),
('10647', 'Dr.SENTHIL KUMAR J', 'senthilkumarj@bitsathy.ac.in', ''),
('10648', 'Dr.DHEEPANCHAKKRAVARTHY A', 'dheepanchakkravarthy@bitsathy.ac.in', ''),
('10652', 'Mr.RISHIKESH N', 'rishikesh@bitsathy.ac.in', ''),
('10653', 'Ms.PONNILA P', 'ponnila@bitsathy.ac.in', ''),
('10654', 'Mr.RAJESH KUMAR S', 'rajeshkumars@bitsathy.ac.in', ''),
('10655', 'Mrs.PRIYANKA B', 'priyankab@bitsathy.ac.in', ''),
('10659', 'Dr.THANGA PARVATHI B', 'THANGA PARVATHI74@BITSATHY.AC.IN', ''),
('10664', 'Mr.SIDDHARTHAN B', 'SIDDHARTHAN@BITSATHY.AC.IN', ''),
('10665', 'Mr.SARAVANAN S', 'saravanansa@bitsathy.ac.in', ''),
('10667', 'Dr.SAKTHISHARMILA P', 'sakthisharmila@bitsathy.ac.in', ''),
('10668', 'Mr.MANU RAJU', 'manuraju@bitsathy.ac.in', ''),
('10669', 'Mrs.SUPRIYA U', 'supriya@bitsathy.ac.in', ''),
('10670', 'Mr.PRATHAP M R', 'prathap@bitsathy.ac.in', ''),
('10673', 'Mr.BOOPATHIRAJA K P', 'boopathiraja@bitsathy.ac.in', ''),
('10674', 'Mrs.KARTHIKA M S', 'karthikams@bitsathy.ac.in', ''),
('10675', 'Mr.AJIN R NAIR', 'ajinrnair@bitsathy.ac.in', ''),
('10678', 'Dr.LEEBAN MOSES M', 'leebanmoses@bitsathy.ac.in', ''),
('10680', 'Dr.PERARASI T', 'perarasi@bitsathy.ac.in', ''),
('10684', 'Mr.KARTHICK K N', 'karthickkn@bitsathy.ac.in', ''),
('10685', 'Mrs.ANDRIL ALAGUSABAI', 'andrilalagusabai@bitsathy.ac.in', ''),
('10687', 'Mr.PRABHU V', 'prabhuv@bitsathy.ac.in', ''),
('10689', 'Mrs.KALAIVANI R', 'kalaivani@bitsathy.ac.in', ''),
('10691', 'Ms.PARVATHY V', 'parvathy@bitsathy.ac.in', ''),
('10692', 'Mrs.GAYATHRI R', 'gayathrir@bitsathy.ac.in', ''),
('10696', 'Dr.BHARATHIRAJA M', 'BHARATHIRAJA@BITSATHY.AC.IN', ''),
('10697', 'Mr.VADIVEL VIVEK V', 'VADIVELVIVEK@bitsathy.ac.in', ''),
('10698', 'Mrs.VANEESWARI N', 'vaneeswari@bitsathy.ac.in', ''),
('10699', 'Dr.PRAVIN M C', 'pravin@bitsathy.ac.in', ''),
('10700', 'Mr.PRASATH M S', 'prasathms@bitsathy.ac.in', ''),
('10705', 'Ms.ABINAYA R', 'abinaya@bitsathy.ac.in', ''),
('10707', 'Ms.MATHU PRIYA J', 'mathupriyaj@bitsathy.ac.in', ''),
('10708', 'Mr.RAJASEETHARAMA S', 'rajaseetharama@bitsathy.ac.in', ''),
('10709', 'Mrs.RENUKA K', 'renukak@bitsathy.ac.in', ''),
('10714', 'Mr.CHANDRASEKARAN M', 'chandrasekaran@bitsathy.ac.in', ''),
('10716', 'Ms.SUGANYA DEVI C R', 'suganyadevi@bitsathy.ac.in', ''),
('10719', 'Mrs.MEENAKSHI DHANALAKSHMI M', 'meenakshidhanalakshmi@bitsathy.ac.in', ''),
('10720', 'Mr.MATHISELVAN G', 'mathiselvan@bitsathy.ac.in', ''),
('10721', 'Mrs.GOPIKA N P', 'gopika@bitsathy.ac.in', ''),
('10723', 'Dr.CAROLINE CYNTHIA P', 'carolinecynthia@bitsathy.ac.in', ''),
('10724', 'Mrs.SARANYA S', 'saranyas@bitsathy.ac.in', ''),
('10725', 'Mrs.ABINAYA M', 'abinayam@bitsathy.ac.in', ''),
('10727', 'Mr.KRISHNAKUMAR S', 'krishnakumars@bitsathy.ac.in', ''),
('10729', 'Dr.NAGARAJAN P', 'nagarajanp@bitsathy.ac.in', ''),
('10733', 'Ms.SWATHI G', 'swathi@bitsathy.ac.in', ''),
('10734', 'Ms.SHARON CHRIS HEPZEBAH P', 'SHARONCHRISHEPZEBAHP@bitsathy.ac.in', ''),
('10736', 'Mrs.JANANI T', 'jananit@bitsathy.ac.in', ''),
('10739', 'Dr.ARULMURUGAN L', 'arulmurugan@bitsathy.ac.in', ''),
('10742', 'Mrs.SHREE LALEITHA G', 'shreelaleitha@bitsathy.ac.in', ''),
('10743', 'Mrs.SANGEETHA K', 'sangeetha@bitsathy.ac.in', ''),
('10746', 'Dr.ARULMANI S', 'arulmani@bitsathy.ac.in', ''),
('10747', 'Mr.ASHOK KUMAR A', 'ashokkumar@bitsathy.ac.in', ''),
('10750', 'Mrs.SINDUJA M E ', 'sindujame@bitsathy.ac.in', ''),
('10751', 'Mr.NIMKAR AMEY SANJAY', 'nimkarameysanjay@bitsathy.ac.in', ''),
('10753', 'Dr.SUGUNA R', 'sugunar@bitsathy.ac.in', ''),
('10754', 'Mr.GOWTHAM RAJ G', 'gowthamraj@bitsathy.ac.in', ''),
('10755', 'Mr.GOWRISHANKAR L', 'gowrishankar@bitsathy.ac.in', ''),
('10757', 'Dr.PRADEESH E L', 'pradeeshel@bitsathy.ac.in', ''),
('10760', 'Dr.NARESH KUMAR M', 'nareshkumar@bitsathy.ac.in', ''),
('10763', 'Dr.REVATHI V M ', 'revathivm@bitsathy.ac.in', ''),
('10764', 'Mrs.SOUNDARYA B', 'soundarya@bitsathy.ac.in', ''),
('10767', 'Mr.MAGESH KUMAR B', 'mageshkumar@bitsathy.ac.in', ''),
('10770', 'Mr.PRAKASH M', 'PRAKASHMG@bitsathy.ac.in', ''),
('10774', 'Mr.KRISHNARAJ R', 'krishnarajr@bitsathy.ac.in', ''),
('10775', 'Mrs.MYTHILI S', 'mythilis@bitsathy.ac.in', ''),
('10776', 'Mr.SUSEENDRAN S', 'suseendrans@bitsathy.ac.in', ''),
('10777', 'Dr.DEEPIKA J', 'deepikaj@bitsathy.ac.in', ''),
('10781', 'Mrs.DHANAPRIYA G', 'dhanapriyag@bitsathy.ac.in', ''),
('10782', 'Mr.JEYAVEL KARTHICK P', 'JEYAVELKARTHICK@bitsathy.ac.in', ''),
('10783', 'Mr.JEYANTH B', 'jeyanth@bitsathy.ac.in', ''),
('10784', 'Mr.YUVARAJ D', 'yuvarajdk@bitsathy.ac.in', ''),
('10786', 'Dr.MANOJKUMAR P', 'manojkumarp@bitsathy.ac.in', ''),
('10787', 'Mr.PARTHASARATHI P', 'parthasarathip@bitsathy.ac.in', ''),
('10789', 'Dr.DHIVYA P', 'dhivyap@bitsathy.ac.in', ''),
('10791', 'Mr.CHANDRU K S', 'chandruks@bitsathy.ac.in', ''),
('10792', 'Mrs.YAMUNA S', 'yamunas@bitsathy.ac.in', ''),
('10794', 'Ms.DIVYA P', 'divyap@bitsathy.ac.in', ''),
('10795', 'Mrs.PADMASHREE A', 'padmashreea@bitsathy.ac.in', ''),
('10797', 'Dr.SANGEETHAA SN', 'sangeethaasn@bitsathy.ac.in', ''),
('10798', 'Mrs.JOTHIMANI S', 'jothimanis@bitsathy.ac.in', ''),
('10800', 'Dr.SRI VIGNA HEMA V', 'srivignahemav@bitsathy.ac.in', ''),
('10803', 'Mrs.PRIYA L', 'priyal@bitsathy.ac.in', ''),
('10804', 'Mrs.RUPASHINI P R', 'rupashinipr@bitsathy.ac.in', ''),
('10805', 'Ms.SOWMYA C M', 'sowmyacm@bitsathy.ac.in', ''),
('10809', 'Mr.MOHAN BHARATHI C', 'mohanbharathic@bitsathy.ac.in', ''),
('10811', 'Ms.POUSIA S', 'pousias@bitsathy.ac.in', ''),
('10813', 'Ms.SHARMILA A', 'sharmilaa@bitsathy.ac.in', ''),
('10814', 'Ms.SUGANYA G', 'suganyagk@bitsathy.ac.in', ''),
('10818', 'Dr.ESWARAMOORTHY V', 'eswaramoorthyv@bitsathy.ac.in', ''),
('10819', 'Ms.BHARANI N', 'bharanin@bitsathy.ac.in', ''),
('10820', 'Dr.RAJESH KANNA P', 'RAJESHKANNAP@bitsathy.ac.in', ''),
('10821', 'Ms.MUNEESWARI ALIAS SURYA S', 'suryasl@bitsathy.ac.in', ''),
('10823', 'Mr.GOPAL R', 'gopalr@bitsathy.ac.in', ''),
('10824', 'Dr.CHANDRAPRABHA K', 'chandraprabhak@bitsathy.ac.in', ''),
('10825', 'Ms.KIRUTHIKA V R', 'kiruthikavr@bitsathy.ac.in', ''),
('10827', 'Dr.MURUGAN K', 'murugank@bitsathy.ac.in', ''),
('10828', 'Mr.SENTHIL T', 'senthilt@bitsathy.ac.in', ''),
('10829', 'Mr.PANDIYAN M', 'pandiyanm@bitsathy.ac.in', ''),
('10830', 'Dr.NIRMALADEVI J', 'nirmaladevij@bitsathy.ac.in', ''),
('10831', 'Dr.LAKSHMANAPRAKASH S', 'LAKSHMANAPRAKASHS@bitsathy.ac.in', ''),
('10838', 'Mrs.NITHYAPRIYA S', 'nithyapriyas@bitsathy.ac.in', ''),
('10839', 'Mrs.PHILO SUMI', 'philosumi@bitsathy.ac.in', ''),
('10841', 'Mr.VIGNESH S', 'vigneshs@bitsathy.ac.in', ''),
('10843', 'Mrs.NITHYA R', 'nithyars@bitsathy.ac.in', ''),
('10844', 'Ms.KANCHANADEVI P', 'kanchanadevip@bitsathy.ac.in', ''),
('10845', 'Mr.VENKATESAN R', 'venkatesanr@bitsathy.ac.in', ''),
('10846', 'Mr.SELVAKUMAR M', 'selvakumarm@bitsathy.ac.in', ''),
('10847', 'Ms.ARCHANA J', 'archanaj@bitsathy.ac.in', ''),
('10850', 'Ms.POORNIMA A', 'poornimaa@bitsathy.ac.in', ''),
('10852', 'Ms.RAGAMATHI S', 'ragamathis@bitsathy.ac.in', ''),
('10853', 'Ms.KAVYA G S', 'kavyags@bitsathy.ac.in', ''),
('10855', 'Ms.DAPHNE MEDONA J', 'DAPHNEMEDONAJ@bitsathy.ac.in', ''),
('10861', 'Ms.SANGAVI N', 'sangavin@bitsathy.ac.in', ''),
('10862', 'Ms.ASHRA SINDHIKKAA M', 'ASHRASINDHIKKAA@bitsathy.ac.in', ''),
('10863', 'Mrs.ABIRAMI A', 'abiramia@bitsathy.ac.in', ''),
('10864', 'Mr.NAVEEN SANKAR A', 'NAVEENSANKARA@bitsathy.ac.in', ''),
('10865', 'Mr.EDAMAKANTI RAMANJI REDDY', 'edamakantiramanjireddy@bitsathy.ac.in', ''),
('10866', 'Ms.NITHYA BALA SUNDARI S', 'nithyabalasundaris@bitsathy.ac.in', ''),
('10869', 'Mr.ABHISHEK VATS', 'abhishekvats@bitsathy.ac.in', ''),
('10870', 'Dr.VANITHA K', 'vanithak@bitsathy.ac.in', ''),
('10871', 'Ms.DHIVYA K T', 'dhivyakt@bitsathy.ac.in', ''),
('10873', 'Dr.CHINNADURRAI CL', 'chinnadurraicl@bitsathy.ac.in', ''),
('10874', 'Ms.JANAGI R', 'janagir@bitsathy.ac.in', ''),
('10875', 'Mr.MUNIRATHINAM T', 'munirathinamt@bitsathy.ac.in', ''),
('10876', 'Mr.SATHISHKANNAN R', 'sathishkannanr@bitsathy.ac.in', ''),
('10877', 'Ms.MENAHA R', 'menahar@bitsathy.ac.in', ''),
('10878', 'Mrs.LAVANYA C', 'lavanyac@bitsathy.ac.in', ''),
('10880', 'Mrs.KALAIVANI E', 'kalaivanie@bitsathy.ac.in', ''),
('10882', 'Mrs.SANTHIYA B', 'santhiyab@bitsathy.ac.in', ''),
('10883', 'Dr.GOLDVIN SUGIRTHA DHAS B', 'goldvinsugirthadhasb@bitsathy.ac.in', ''),
('10884', 'Mr.RAJAKUMAR P', 'rajakumarp@bitsathy.ac.in', ''),
('10885', 'Mr.FREDDY CHRIS M', 'freddychris@bitsathy.ac.in', ''),
('10886', 'Dr.GOKULNATH B V', 'gokulnathbv@bitsathy.ac.in', ''),
('10887', 'Mr.GOKUL K', 'gokulk@bitsathy.ac.in', ''),
('10888', 'Ms.MERCY P', 'mercyp@bitsathy.ac.in', ''),
('10889', 'Dr.POOJITHA P', 'POOJITHAP@BITSATHY.AC.IN', ''),
('10890', 'Ms.YUVALATHA S', 'yuvalathas@bitsathy.ac.in', ''),
('10892', 'Dr.HARWINDER SINGH', 'harwindersinghs@bitsathy.ac.in', ''),
('10893', 'Dr.SUDEV DUTTA', 'sudevdutta@bitsathy.ac.in', ''),
('10894', 'Ms.ANANTHI P', 'ananthip@bitsathy.ac.in', ''),
('10895', 'Ms.ANANTHI D', 'ananthid@bitsathy.ac.in', ''),
('10897', 'Ms.VAISHNAVI M', 'vaishnavim@bitsathy.ac.in', ''),
('10902', 'Ms.BHARANI PRIYA A', 'bharanipriyaa@bitsathy.ac.in', ''),
('10903', 'Dr.PAYAL', 'payal@bitsathy.ac.in', ''),
('10905', 'Ms.SHOBIKA S T', 'shobikast@bitsathy.ac.in', ''),
('10906', 'Dr.SARANYA K ', 'SARANYAKS@BITSATHY.AC.IN', ''),
('10907', 'Dr.RAJASEKAR S S', 'RAJASEKARSS@BITSATHY.AC.IN', ''),
('10909', 'Mr.DIVAKAR R', 'DIVAKARR@BITSATHY.AC.IN', ''),
('10910', 'Ms.SANGEETHA R', 'SANGEETHAR@BITSATHY.AC.IN', ''),
('10914', 'Dr.ABDUL AZEEZ N', 'ABDULAZEEZN@bitsathy.ac.in', ''),
('10915', 'Mr.STEPHEN SAGAYARAJ A', 'STEPHENSAGAYARAJA@bitsathy.ac.in', ''),
('10916', 'Mrs.KARTHIGA M', 'karthiga@bitsathy.ac.in', ''),
('10918', 'Dr.DINESH KUMAR L', 'DINESHKUMARL@bitsathy.ac.in', ''),
('10920', 'Dr.SYAMA R', 'SYAMAR@bitsathy.ac.in', ''),
('10921', 'Ms.RENUGA DEVI S', 'RENUGADEVIS@bitsathy.ac.in', ''),
('10922', 'Ms.GAYATHRI K', 'GAYATHRIK@bitsathy.ac.in', ''),
('10923', 'Ms.MILINTHA MARY  T P', 'MILNTHAMARY@BITSATHY.AC.IN', ''),
('10924', 'Ms.GAYATRI A', 'GAYATRIA@bitsathy.ac.in', ''),
('10925', 'Dr.SOLANKE KRISHNA RUSTUMRAO ', 'KRISHNASOLANKE@bitsathy.ac.in', ''),
('10926', 'Dr.BALAGANESH P ', 'BALAGANESH@BITSATHY.AC.IN', ''),
('10928', 'Mrs.NISHA DEVI K', 'NISHADEVIK@bitsathy.ac.in', ''),
('10929', 'Mrs.INDIRANI A', 'INDIRANIA@bitsathy.ac.in', ''),
('10930', 'Ms.ANUGEETHA SHINE', 'ANUGEETHASHINE@bitsathy.ac.in', ''),
('10931', 'Mr.BALASAMY K', 'BALASAMYK@bitsathy.ac.in', ''),
('10932', 'Mrs.GOWTHAMI S', 'gowthamis@bitsathy.ac.in', ''),
('10933', 'Ms.PRASANNAKIRUBA G S', 'PRASANNAKIRUBA@bitsathy.ac.in', ''),
('10934', 'Mr.VINOTHKUMAR N', 'vinothkumarn@bitsathy.ac.in', ''),
('10935', 'Ms.NITHYA M', 'nithyam@bitsathy.ac.in', ''),
('10936', 'Mr.PRABANAND S C', 'PRABANANDSC@bitsathy.ac.in', ''),
('10937', 'Dr.SUNDAR RAJ M', 'SUNDARRAJM@bitsathy.ac.in', ''),
('10938', 'Mrs.MOUNIKA S', 'mounikas@bitsathy.ac.in', ''),
('10939', 'Ms.CAROLINE VINNETIA S', 'CAROLINEVINNETIAS@bitsathy.ac.in', ''),
('10940', 'Ms.SUJITHRA S', 'sujithras@bitsathy.ac.in', ''),
('10941', 'Ms.NIKITHA M', 'nikitham@bitsathy.ac.in', ''),
('10942', 'Mrs.MEKALA R', 'MEKALAR@bitsathy.ac.in', ''),
('10943', 'Mr.SATHISH S', 'SATHISHS@bitsathy.ac.in', ''),
('10944', 'Mr.SOMASUNDARAM K', 'SOMASUNDARAMK@bitsathy.ac.in', ''),
('10945', 'Mr.SATHEESH N P', 'satheeshnp@bitsathy.ac.in', ''),
('10946', 'Mr.RAMASAMI S', 'RAMASAMIS@bitsathy.ac.in', ''),
('10947', 'Ms.ABHINAYA N', 'ABHINAYAN@bitsathy.ac.in', ''),
('10948', 'Dr.SHANMUGA SUNDARI I ', 'SUNDARIBIOINFO.S@GMAIL.COM', ''),
('10949', 'Mrs.MADHUMITHA A', 'madhumithaa@bitsathy.ac.in', ''),
('10950', 'Ms.DHIVYA DHARSHINI U', 'dhivyadharshiniu@bitsathy.ac.in', ''),
('10951', 'Dr.SHUBHAM JOSHI', 'shubhamjoshi@bitsathy.ac.in', ''),
('10952', 'Mr.LIKHIL GOPALAN', 'likhilgopalan@bitsathy.ac.in', ''),
('10953', 'Mr.RAJ KUMAR V S', 'rajkumarvs@bitsathy.ac.in', ''),
('10954', 'Mrs.HARI PRIYA R', 'haripriyar@bitsathy.ac.in', ''),
('10955', 'Ms.ESAKKI MADURA E', 'ESAKKIMADURAE@bitsathy.ac.in', ''),
('10956', 'Ms.KARTHIKA S', 'KARTHIKAS@bitsathy.ac.in', ''),
('10957', 'Dr.DEEPHA V', 'deephav@bitsathy.ac.in', ''),
('10958', 'Dr.KUMARESAN T', 'kumaresant@bitsathy.ac.in', ''),
('10959', 'Ms.PIDATHALA SAHITYA', 'pidathalasahitya@bitsathy.ac.in', ''),
('10960', 'Mr.ANANDHAKUMAR R', 'anandhakumarr@bitsathy.ac.in', ''),
('10961', 'Ms.GOPIKA RAM P', 'gopikaramp@bitsathy.ac.in', ''),
('10962', 'Ms.DEEPA UNNIKRISHNAN', 'deepaunnikrishnan@bitsathy.ac.in', ''),
('10963', 'Dr.RAJESHKUMAR G', 'rajeshkumarg@bitsathy.ac.in', ''),
('10964', 'Mrs.JAYASANKARI J S', 'jayasankarijs@bitsathy.ac.in', ''),
('10965', 'Mr.GUNALAN K', 'gunalank@bitsathy.ac.in', ''),
('10966', 'Ms.NITHIYA PRIYA B T', 'nithiyapriyabt@bitsathy.ac.in', ''),
('10967', 'Ms.PUJAA SAKTHY M R K', 'PUJAASAKTHYMRK@bitsathy.ac.in', ''),
('10968', 'Ms.PAVITHRA SHEN G T', 'PAVITHRASHENGT@bitsathy.ac.in', ''),
('10969', 'Dr.VENKATESHKUMAR U', 'venkateshkumaru@bitsathy.ac.in', ''),
('10971', 'Mr.NITHIN P', 'NITHINP@bitsathy.ac.in ', ''),
('10972', 'Mr.VELLINGIRI A', 'VELLINGIRIA@bitsathy.ac.in', ''),
('10973', 'Mrs.ANNAPOORANI B T', 'ANNAPOORANIBT@bitsathy.ac.in', ''),
('10974', 'Mr.STEEPHAN AMALRAJ J', 'steephanamalrajj@bitsathy.ac.in ', ''),
('10975', 'Ms.SAMYUKTHA V', 'samyukthav@bitsathy.ac.in ', ''),
('10976', 'Dr.EASUBATHAM ARMSTRONG ANAND J', 'EASUBATHAMARMSTRONGANAND@bitsathy.ac.in', ''),
('10977', 'Mr.UDAYKUMAR BABUBHAI ACHARYA ', 'UDAYKUMARBABUBHAIACHARYA@bitsathy.ac.in', ''),
('10978', 'Mrs.SAKTHISHOBANA K', 'SAKTHISHOBANAK@bitsathy.ac.in', ''),
('10979', 'Dr.KAMAL RAJ D', 'KAMALRAJD@bitsathy.ac.in', ''),
('10980', 'Mr.SRIRAM S', 'SRIRAMS@bitsathy.ac.in', ''),
('10981', 'Dr.SUNDARAM S', 'SUNDARAMs@bitsathy.ac.in', ''),
('10982', 'Dr.HEMALATHA K', 'HEMALATHAK@bitsathy.ac.in', ''),
('10983', 'Mrs.KAVITHA R', 'KAVITHAR@bitsathy.ac.in', ''),
('10984', 'Mrs.MAHIMA P', 'mahimap@bitsathy.ac.in ', ''),
('10985', 'Ms.SANCHITA MUKHERJEE', 'SANCHITAMUKHERJEE@bitsathy.ac.in', ''),
('10986', 'Dr.GOMATHI M', 'GOMATHIM@bitsathy.ac.in', ''),
('10987', 'Dr.ANANDHA BABU G', 'ANANDHABABUG@bitsathy.ac.in', ''),
('10988', 'Dr.SANDHYARANI R', 'SANDHYARANIR@bitsathy.ac.in', ''),
('10989', 'Mr.VISHNU SAJAN', 'VISHNUSAJAN@bitsathy.ac.in', ''),
('10990', 'Ms.RAMYA M', 'RAMYAM@bitsathy.ac.in', ''),
('10991', 'Mr.BALAJI SADHASIVAM', 'BALAJISADHASIVAM@bitsathy.ac.in', ''),
('10992', 'Mrs.SARANYA N', 'SARANYANJ@bitsathy.ac.in', ''),
('10993', 'Ms.QUALITHA BEGUM Z', 'QUALITHABEGUMZ@bitsathy.ac.in', ''),
('10994', 'Mr.MUTHUKUMARAVEL K', 'MUTHUKUMARAVELK@bitsathy.ac.in', ''),
('10995', 'Mrs.KRISHNAMMAL N', 'KRISHNAMMAL@bitsathy.ac.in', ''),
('10996', 'Ms.MARAGATHAM D S', 'MARAGATHAM@bitsathy.ac.in', ''),
('10997', 'Mr.KARTHIKEYAN S', 'KARTHIKEYANS@bitsathy.ac.in ', ''),
('10998', 'Dr.NAVEEN P Y', 'NAVEENPY@bitsathy.ac.in', ''),
('10999', 'Ms.TNA ARUNASREE', 'arunasreetna@bitsathy.ac.in', ''),
('11000', 'Ms.POOJA HARI', 'POOJAHARI@bitsathy.ac.in', ''),
('11001', 'Ms.SARULATHA R', ' SARULATHAR@bitsathy.ac.in', ''),
('11002', 'Ms.LIMSA S', 'LIMSAS@bitsathy.ac.in', ''),
('11003', 'Dr.ANANTHAN S', 'ANANTHANS@bitsathy.ac.in', ''),
('11004', 'Mr.ANBURAJ M', 'anburajm@bitsathy.ac', ''),
('11005', 'Ms.SUBHARATHNA N', 'SUBHARATHNAN@bitsathy.ac.in', ''),
('11006', 'Ms.AKSHAYA R', 'AKSHAYAR@bitsathy.ac.in', ''),
('11007', 'Mr.SARATHKUMAR S R', 'SARATHKUMARSR@bitsathy.ac.in', ''),
('11008', 'Mr.ABHINANDH K A', 'ABHIJOB234@GMAIL.COM', ''),
('41012', 'Dr.SARASWATHI C', 'SARASWATHIC@BITSATHY.AC.IN', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
