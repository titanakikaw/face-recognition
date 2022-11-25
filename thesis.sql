-- Adminer 4.8.1 MySQL 5.5.5-10.4.22-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `time` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `student` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `attendance` (`id`, `time`, `date`, `subject`, `student`) VALUES
(29,	'06:15:25pm',	'2022/11/25',	'MATH 101',	'1234');

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_abbr` varchar(10) NOT NULL,
  `course_description` varchar(200) NOT NULL,
  `course_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `course` (`id`, `course_abbr`, `course_description`, `course_status`) VALUES
(1,	'BSIT',	'Bachelor of Science in Information Technology',	1),
(2,	'BSMB',	'Bachelor of Science in Marine Biology',	1),
(3,	'BSFI',	'Bachelor of Science in Fisheries',	1),
(4,	'BSA',	'Bachelor of Science in Agriculture',	1),
(5,	'BAT',	'Bachelor of Agricultural Technology',	1);

DROP TABLE IF EXISTS `enrolled_subjects`;
CREATE TABLE `enrolled_subjects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subject_id` bigint(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `enrolled_subjects_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `enrolled_subjects` (`id`, `subject_id`, `student_id`) VALUES
(2,	3,	'4'),
(3,	3,	'1810155-2');

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE `student_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `email_add` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `year_section` varchar(10) NOT NULL,
  `pic` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `student_info` (`id`, `student_id`, `firstname`, `lastname`, `middle_name`, `email_add`, `gender`, `course`, `contact`, `year_section`, `pic`) VALUES
(3,	'1810155-2',	'MA.  CRISTINE CLAIRE',	'SEDORIOSA',	'Bok',	'macristineclairesedoriosa@gmail.com',	'Female',	1,	'09318391381',	'4-A',	'../stud_images/1810155-2.jpeg'),
(4,	'1234',	'test',	'test',	'test',	'test@email.com',	'Male',	2,	'12312312312',	'1-b',	'../stud_images/1234.jpeg');

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `time_from` varchar(50) NOT NULL,
  `time_to` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `subjects` (`id`, `code`, `desc`, `time_from`, `time_to`) VALUES
(3,	'test code',	'MATH 101',	'00:00',	'02:59'),
(4,	'test subject',	'MATH 102',	'7:00',	'8:59');

-- 2022-11-25 08:22:56
