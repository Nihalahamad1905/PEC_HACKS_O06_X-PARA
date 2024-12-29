-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 09:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_records`
--

CREATE TABLE `academic_records` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_records`
--

INSERT INTO `academic_records` (`id`, `student_name`, `rank`, `year`, `marks`, `image_path`) VALUES
(4, 'Nihalahamad', 1, 'BTECH', 210, 'uploads/1.jpeg'),
(5, 'Aksa', 2, 'BTECH', 205, 'uploads/Aksa.jpg'),
(7, 'Lalit', 3, 'BTECH', 200, 'uploads/IMG-20241022-WA0005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `achievement_type` varchar(255) DEFAULT NULL,
  `achievement_details` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `student_name`, `year`, `achievement_type`, `achievement_details`, `file_path`) VALUES
(1, 'Nihal', 'BTECH', 'Award', 'Hackthon', 'uploads/java assign4.pdf'),
(3, 'Lalit', 'BTECH', 'Patent', 'Hackthon', 'student_upload/Experiment NO 4 swap.pdf'),
(4, 'Sakshi', 'FY', 'Publication', 'Hackthon', 'student_achivement/Experiment NO 4 swap.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `cultural_extra_curricular`
--

CREATE TABLE `cultural_extra_curricular` (
  `id` int(11) NOT NULL,
  `cultural_activities` varchar(255) DEFAULT NULL,
  `student_participation` varchar(255) DEFAULT NULL,
  `collaborations` varchar(255) DEFAULT NULL,
  `nss` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cultural_extra_curricular`
--

INSERT INTO `cultural_extra_curricular` (`id`, `cultural_activities`, `student_participation`, `collaborations`, `nss`) VALUES
(2, 'Event', '20', 'MegaEvent', 'NSS CAMP'),
(3, 'Rangoli Completation', '15', 'Jiotag', 'Awareness ');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `class` varchar(20) DEFAULT NULL,
  `enrolled` int(11) DEFAULT NULL,
  `passed_out` int(11) DEFAULT NULL,
  `scholarship` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `class`, `enrolled`, `passed_out`, `scholarship`) VALUES
(2, 'TY', 100, 20, 10),
(21, 'FY', 210, 120, 65),
(22, 'SY', 120, 100, 100),
(23, 'BTECH', 20, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `doj` date NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `full_name`, `designation`, `dob`, `department`, `address`, `doj`, `image_path`) VALUES
(1, 'Nihal', 'HOD', '2003-02-22', 'CSE', 'Sangli', '2024-02-02', 'uploads/ABC ID.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_achievements`
--

CREATE TABLE `faculty_achievements` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `achievement_type` varchar(255) DEFAULT NULL,
  `achievement_details` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_achievements`
--

INSERT INTO `faculty_achievements` (`id`, `faculty_name`, `designation`, `achievement_type`, `achievement_details`, `file_path`) VALUES
(1, 'Umesh Patil', 'HOD', 'Publication', 'Patent', 'uploads/arti7.docx'),
(2, 'Jasmin Shaikh', 'Assistant Professor', 'Publication', 'Won Best Teacher Award', 'faculty_achievement/Experiment NO 4 swap.pdf'),
(3, 'Balaji Jadhav', 'Assistant Professor', 'Award', 'Award for Best Teacher', '');

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `mode` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `paid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`id`, `student_name`, `duration`, `mode`, `type`, `paid`) VALUES
(1, 'NIhal', '3', 'hybrid', 'placement', 'paid'),
(8, 'Sakshi', '3', 'Online', 'Internship', 'Unpaid'),
(9, 'Sanika', '1', 'Offline', 'Placment', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `sports_achievements`
--

CREATE TABLE `sports_achievements` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `competition_level` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `certificate_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports_achievements`
--

INSERT INTO `sports_achievements` (`id`, `student_name`, `competition_level`, `rank`, `certificate_file`) VALUES
(1, 'Nihal', 'Zonal', '1', NULL),
(2, 'Lalit', 'National', '2', NULL),
(3, 'Sanika', 'National', '2', NULL),
(4, 'Sakshi', 'Inter', '3', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_records`
--
ALTER TABLE `academic_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cultural_extra_curricular`
--
ALTER TABLE `cultural_extra_curricular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_achievements`
--
ALTER TABLE `faculty_achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_achievements`
--
ALTER TABLE `sports_achievements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_records`
--
ALTER TABLE `academic_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cultural_extra_curricular`
--
ALTER TABLE `cultural_extra_curricular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty_achievements`
--
ALTER TABLE `faculty_achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sports_achievements`
--
ALTER TABLE `sports_achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
