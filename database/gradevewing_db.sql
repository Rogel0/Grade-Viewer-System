-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 04:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradevewing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `email` varchar(55) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(22) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `middlename`, `email`, `birthdate`, `sex`, `user_type`) VALUES
(2, 'admin', '12345678', 'Rogel', 'Gerodiaz', 'R', 'admin@gmail.com', '2001-06-10', 'Male', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `first_quarter_grade` double DEFAULT NULL,
  `second_quarter_grade` double DEFAULT NULL,
  `third_quarter_grade` double DEFAULT NULL,
  `fourth_quarter_grade` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `subject_id`, `semester`, `subject_name`, `first_quarter_grade`, `second_quarter_grade`, `third_quarter_grade`, `fourth_quarter_grade`) VALUES
(246, 61, 4, 1, 'Oral Communication', 95, 95, NULL, NULL),
(248, 61, 3, 2, 'Science', NULL, NULL, 95, 95),
(278, 77, 2, 1, 'General Mathematics', 95, 95, NULL, NULL),
(279, 54, 2, 1, 'General Mathematics', 95, 95, NULL, NULL),
(280, 54, 4, 1, 'Oral Communication', 85, 85, NULL, NULL),
(281, 54, 13, 1, 'Practical Research 1', 85, 85, NULL, NULL),
(282, 54, 15, 1, 'Physical Education 1', 85, 85, NULL, NULL),
(283, 54, 3, 2, 'Science', NULL, NULL, 85, 85),
(286, 54, NULL, 2, 'Understanding The Self', NULL, NULL, 95, 95),
(287, 72, 4, 1, 'Oral Communication', 95, 95, NULL, NULL),
(288, 72, 2, 1, 'General Mathematics', 95, 95, NULL, NULL),
(289, 72, 6, 1, 'Earth and life Sciences', 85, 85, NULL, NULL),
(290, 72, 14, 1, 'Computer Software Serving NC II', 95, 95, NULL, NULL),
(291, 72, 3, 2, 'Science', NULL, NULL, 95, 95),
(292, 72, NULL, 2, 'Understanding The Self', NULL, NULL, 85, 85),
(293, 91, 2, 1, 'General Mathematics', 95, 95, NULL, NULL),
(294, 91, 4, 1, 'Oral Communication', 85, 85, NULL, NULL),
(295, 91, 6, 1, 'Earth and life Sciences', 85, 85, NULL, NULL),
(296, 91, 14, 1, 'Computer Software Serving NC II', 95, 95, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_id` int(11) NOT NULL COMMENT 'AUTO INCREMENT',
  `student_no` varchar(255) DEFAULT NULL,
  `lastname` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_number` varchar(55) DEFAULT NULL,
  `parent_name` varchar(32) NOT NULL,
  `permanent_address` varchar(50) NOT NULL,
  `student_course` varchar(32) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `student_section` varchar(32) NOT NULL,
  `student_subject` varchar(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `student_no`, `lastname`, `firstname`, `middlename`, `gender`, `date_of_birth`, `address`, `contact_number`, `parent_name`, `permanent_address`, `student_course`, `year_level`, `school_year`, `student_section`, `student_subject`, `username`, `password`, `user_type`, `email`) VALUES
(54, '4542', 'Daniel', 'Ottilie', 'Amparo Lubowitz', 'Female', '2023-07-15', '4435 Kara Squares', '165', 'Amos Gusikowski', '93056 Yolanda Plaza', 'Industrial Arts', 'SHS 11', '2022-2023', 'Section 5', '', 'Jane.Roob6', 'bJgvAU0QIDIMjHA', 'student', NULL),
(61, '53', 'Bergstrom', 'Tess', 'Jaunita Terry', 'Female', '2024-11-22', '9959 Schamberger Drive', '439', 'Rosendo Langworth', '495 Elvis Port', 'Information & Communication Tech', 'SHS 12', '2022-2023', 'Section 3', '', 'Bessie96', 'GoGx39FAWXYobjy', 'student', NULL),
(62, '512', 'Gerhold', 'Sterling', 'Ignacio Schneider', 'Female', '2024-01-31', '87100 Bahringer Centers', '150', 'Damian Schumm-Feest', '93227 Delfina Ports', 'Home Economics', 'SHS 12', '2023-2024', 'Section 1', '', 'Brionna.Legros40', 'aDnDMaIW5BDMsuh', 'student', NULL),
(63, '597', 'Walsh', 'Asa', 'Celestino Koss', 'Female', '2023-04-23', '36442 Marquise Court', '459', 'Darby Kuhn', '275 Bashirian Meadow', 'Industrial Arts', 'SHS 12', '2022-2023', 'Section 1', '', 'Constance.Runolfsdottir', 'FYbsXQ5uB4j_MWl', 'student', NULL),
(65, '25', 'Green', 'Shanel', 'Jayda Wolff', 'Female', '2023-06-15', '937 Mason Harbors', '1', 'Mervin Kunde', '86945 Foster Forest', 'Home Economics', 'SHS 11', '2023-2024', 'Section 3', '', 'Chandler11', '3JDIFaeRv1Aubij', 'student', NULL),
(66, '589', 'Hirthe', 'Lonny', 'Madyson Sporer', 'Female', '2024-10-15', '636 Hickle Islands', '489', 'Jermey Metz', '43481 Patience Light', 'Information & Communication Tech', 'SHS 11', '2022-2023', 'Section 3', '', 'Bret21', 'irjtc9tzL_ql6_n', 'student', NULL),
(67, '210', 'Mayer', 'Sim', 'Maia Ortiz-Smitham', 'Female', '2023-08-11', '630 Kacie Lake', '373', 'Imani Heaney', '819 Ned Flats', 'Information & Communication Tech', 'SHS 11', '2022-2023', 'Section 2', '', 'Alexys33', 'UC0o3kdxhh7SHys', 'student', NULL),
(68, '134', 'Spencer', 'Gino', 'Edgardo Champlin', 'Female', '2023-11-08', '559 Bridgette Row', '638', 'Alisha Ullrich', '321 Leffler Ridge', 'Information & Communication Tech', 'SHS 11', '2022-2023', 'Section 2', '', 'Jabari.Wolf', 'JiwvoXUDVVvrUGn', 'student', NULL),
(72, '1169-21', 'Gerodiaz', 'Rogel', 'Ramos', 'Male', '2001-06-10', 'Laspinas City', '09093136754', 'Evelyn Gerodiaz', 'Laspinas City', 'Information & Communication Tech', 'SHS 11', '2023-2024', 'Section 1', '', '1169-21', '12345678', 'student', 'gerodiazrogel1@gmail.com'),
(73, '202', 'Herzog', 'Dave', 'Alexander Hand', 'Female', '2023-08-05', '883 Jaqueline Bypass', '647', 'Deion McDermott-Windler', '287 Spinka-Hintz Grove', 'Information & Communication Tech', 'SHS 12', '2023-2024', 'Section 5', '', 'Marques78', '3eDr3_eD3uxNDWI', 'student', NULL),
(76, '310', 'Fadel', 'Guy', 'Gregory Miller', 'Female', '2023-03-28', '949 Amari Forks', '614', 'Peggie Brakus-Macejkovic', '434 Muller Well', 'Home Economics', 'SHS 11', '2022-2023', 'Section 3', '', 'Maribel49', 'JncXjurUUtW3cyQ', 'student', NULL),
(77, '431', 'Wolff', 'Lucio', 'Yoshiko Bahringer', 'Female', '2024-01-10', '24075 Gertrude Fork', '614', 'Emmitt Thiel', '815 Shakira Views', 'Home Economics', 'SHS 12', '2022-2023', 'Section 2', '', 'Ashlee.Murray', 'QA7NWMQrZAQ98UI', 'student', NULL),
(78, '313', 'DuBuque', 'Tia', 'Beth Brakus', 'Female', '2023-12-18', '8597 Heller Estate', '265', 'Shea Breitenberg', '586 Norbert Gardens', 'Home Economics', 'SHS 12', '2022-2023', 'Section 4', '', 'Kelley.Lemke', 'Dck30CsrrvgFrXN', 'student', NULL),
(83, '656', 'Bailey', 'Ariel', 'Tiana Koelpin', 'Female', '2023-04-07', '344 Schuppe Fields', '595', 'Janae Murazik', '480 McGlynn Spur', 'Home Economics', 'SHS 12', '2023-2024', 'Section 5', '', 'Elyse.Goldner42', 'Rvfe7d5QLRx8Ml8', 'student', NULL),
(84, '278', 'Heaney', 'Freida', 'Leif Tromp', 'Female', '2023-11-05', '3284 Vinnie Square', '84', 'Maida Lind', '5999 Davis Harbor', 'Home Economics', 'SHS 11', '2022-2023', 'Section 5', '', 'Urban.Lueilwitz62', 'Sbagz5JL7fRBVa_', 'student', NULL),
(85, '65', 'Dach', 'Jamison', 'Lambert Bashirian-Be', 'Female', '2023-06-02', '4183 Sheridan Streets', '239', 'Jakayla Osinski', '6799 Lang Brooks', 'Industrial Arts', 'SHS 12', '2022-2023', 'Section 1', '', 'Chasity.Sauer', 'z_D5x2qPzPZkGnI', 'student', NULL),
(86, '43', 'Shields', 'Eriberto', 'Jasen Wyman', 'Female', '2025-01-12', '421 Jaclyn Canyon', '116', 'Humberto Little', '885 Roob-VonRueden Ville', 'Home Economics', 'SHS 12', '2022-2023', 'Section 5', '', 'Ronaldo.Balistreri62', '9_2DqrTz5IcYqZw', 'student', NULL),
(87, '405', 'Schmeler', 'Hubert', 'Reginald Spinka-Fay', 'Male', '2024-10-27', '11657 Kuvalis Drive', '594', 'Simeon Bergnaum', '302 Jones Walk', '#', '#', '2022-2023', 'Section 5', '', 'Dejah_Kemmer55', 'Nkq6LQny3bswepD', 'student', NULL),
(88, '427', 'Goyette', 'Rickie', 'Vicente Bailey', 'Female', '2024-03-10', '4999 Bartell Fork', '56', 'Lue Kuhic', '113 Rippin-Ziemann Coves', 'Home Economics', 'SHS 12', '2022-2023', 'Section 3', '', 'Magdalena_Stokes73', 'GhLruhd8TFPs1rg', 'student', NULL),
(89, '335', 'Wilderman', 'Grayson', 'Brendon Fay', 'Female', '2023-03-21', '77340 Botsford Spurs', '354', 'Michaela Pacocha', '199 Stuart Fork', 'Information & Communication Tech', 'SHS 11', '2023-2024', 'Section 4', '', 'Curt_Stanton21', 'b9F40xRTE9k5uxz', 'student', NULL),
(91, '1169-24', 'Curry', 'Stephen', 'G', 'Male', '2001-06-10', 'USA', '097361732', 'Josefa', 'USA', 'Home Economics', 'SHS 11', '2022-2023', 'Section 1', '', '1169-24', '06102001', 'student', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL COMMENT 'AUTO INCREMENT',
  `subject_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(1, 'Ethics'),
(2, 'General Mathematics'),
(3, 'Science'),
(4, 'Oral Communication'),
(5, '21st Century Literature From the Philippines and the World'),
(6, 'Earth and Life Sciences'),
(9, 'English for Academic and Profess'),
(13, 'Practical Research 1'),
(14, 'Computer Software Serving NC II'),
(15, 'Physical Education 1'),
(16, 'Household 1'),
(17, 'Housekeeping 1'),
(18, 'EIM NC II'),
(19, 'Driving Mechanic NC II');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `teacher_info_id` int(11) NOT NULL,
  `teacher_number` varchar(22) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(55) NOT NULL,
  `date_of_birth` varchar(22) NOT NULL,
  `contact_number` varchar(22) NOT NULL,
  `gender` varchar(22) NOT NULL,
  `username` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`teacher_info_id`, `teacher_number`, `lastname`, `firstname`, `middlename`, `date_of_birth`, `contact_number`, `gender`, `username`, `password`, `user_type`) VALUES
(9, '1189-21', 'Banag', 'Andro', 'G', '2024-04-23', '531', 'Male', 12345, '87654321', 'teacher'),
(11, '120', 'Crona', 'Bailee', 'Elise Schimmel', '2023-10-01', '122', 'Female', 0, 'WFbtGF_0ucKIiGd', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_no` (`student_no`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`teacher_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO INCREMENT', AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO INCREMENT', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `teacher_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`student_id`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
