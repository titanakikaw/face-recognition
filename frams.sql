-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 08:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frams`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_abbr` varchar(10) NOT NULL,
  `course_description` varchar(200) NOT NULL,
  `course_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_abbr`, `course_description`, `course_status`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', 1),
(2, 'BSMB', 'Bachelor of Science in Marine Biology', 1),
(3, 'BSFI', 'Bachelor of Science in Fisheries', 1),
(4, 'BSA', 'Bachelor of Science in Agriculture', 1),
(5, 'BAT', 'Bachelor of Agricultural Technology', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `email_add` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `year_section` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `student_id`, `firstname`, `lastname`, `middle_name`, `email_add`, `gender`, `course`, `contact`, `year_section`) VALUES
(1, '1810155-2', 'Jolina', 'Jutba', 'Beoyo', 'jolina@gmail.com', 'Female', 1, '09318391381', '4-A'),
(2, '1810155-2', 'Ma.  Cristine Claire', 'Sedoriosa', 'Bok', 'macristineclairesedoriosa@gmail.com', 'Female', 1, '09958846598', '4-A'),
(3, '1810155-2', 'MA.  CRISTINE CLAIRE', 'SEDORIOSA', 'Bok', 'macristineclairesedoriosa@gmail.com', 'Female', 1, '09318391381', '4-A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
