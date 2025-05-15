-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 12:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycareertrendz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `idno` varchar(13) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `secondname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `idno`, `firstname`, `secondname`, `password`, `email`, `contactno`, `location`, `status`, `date_time`) VALUES
(1, '8806280465081', 'Bongeka', 'Nkosi', 'Bongeka@!2 ', 'bongeka@gmail.com', '0737256778', '../../profile_images/images (1).jpg', 'approved', '2025-03-21 13:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(13) NOT NULL,
  `active` varchar(1) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`id`, `admin_id`, `active`, `date_time`) VALUES
(1, '8806280465081', '1', '2025-03-21 13:58:44'),
(2, '8806280465081', '1', '2025-03-22 14:35:01'),
(3, '8806280465081', '1', '2025-03-22 14:40:12'),
(4, '8806280465081', '1', '2025-03-25 13:51:48'),
(5, '8806280465081', '1', '2025-03-25 14:10:15'),
(6, '8806280465081', '0', '2025-03-25 14:11:47'),
(7, '8806280465081', '1', '2025-03-25 21:05:47'),
(8, '8806280465081', '1', '2025-03-26 17:28:48'),
(9, '8806280465081', '0', '2025-03-26 19:29:50'),
(10, '8806280465081', '1', '2025-03-26 19:29:57'),
(11, '8806280465081', '1', '2025-04-01 09:13:13'),
(12, '8806280465081', '1', '2025-04-01 19:09:54'),
(13, '8806280465081', '1', '2025-04-08 10:19:37'),
(14, '8806280465081', '0', '2025-04-08 10:27:38'),
(15, '8806280465081', '1', '2025-04-09 22:31:16'),
(16, '8806280465081', '0', '2025-04-09 23:46:09'),
(17, '8806280465081', '1', '2025-04-10 06:54:25'),
(18, '8806280465081', '1', '2025-04-10 16:40:53'),
(19, '8806280465081', '0', '2025-04-10 17:07:41'),
(20, '8806280465081', '1', '2025-04-10 17:50:04'),
(21, '8806280465081', '1', '2025-04-11 00:51:10'),
(22, '8806280465081', '1', '2025-04-13 19:55:52'),
(23, '8806280465081', '1', '2025-04-14 12:46:34'),
(24, '8806280465081', '1', '2025-04-14 12:47:07'),
(25, '8806280465081', '1', '2025-04-15 09:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `teacher_id`, `subject_id`, `grade_id`, `content`, `date_time`) VALUES
(1, '8806280465081', 22, 5, '<p>We have no classes today.</p>\r\n', '2025-03-21 14:00:46'),
(2, '8806280465081', 22, 5, '<p>We have a class test today at 15:00</p>\r\n', '2025-03-25 09:25:21'),
(3, '8806280465081', 22, 5, '<p>The class is removed to friday</p>\r\n', '2025-03-25 11:11:24'),
(4, '8806280465081', 22, 5, '<p>Tomorrow you will have you script for the class test wrote in class</p>\r\n', '2025-03-25 13:06:42'),
(5, '8806280465081', 22, 5, '<p>We dont have a class today and tomorrow</p>\r\n', '2025-03-25 15:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `user_id` varchar(13) NOT NULL,
  `subject_header` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `msg_status` tinyint(1) DEFAULT 0,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `teacher_id`, `user_id`, `subject_header`, `message`, `status`, `msg_status`, `file_name`, `file_path`, `date_time`) VALUES
(1, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Dear Teacher<br />\r\n<br />\r\nMy son is not doing well in&nbsp; computer science</p>', 0, 0, 'Invoice-1242488.pdf', '../../email_documents/1744032011_Invoice-1242488.pdf', '2025-04-07 13:20:11'),
(2, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Can we have a meeting next week</p>', 0, 0, 'ckeditor4-export-pdf-1 (1).pdf', '../../email_documents/1744032049_ckeditor4-export-pdf-1 (1).pdf', '2025-04-07 13:20:49'),
(3, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>He have a meeting</p>', 0, 0, NULL, NULL, '2025-04-07 13:21:46'),
(4, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>We meet you in school</p>\r\n', 0, 0, NULL, NULL, '2025-04-07 13:33:04'),
(5, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>We absent tomorrow</p>\r\n', 0, 0, NULL, NULL, '2025-04-07 13:39:38'),
(6, '8806280465081', '8806280465081', '', '<p>Greeting Parents<br />\r\n<br />\r\nI have announcement to make tomorrow</p>\r\n', 0, 0, NULL, NULL, '2025-04-07 13:40:43'),
(7, '8806280465081', '8806280465081', 'PHP langauge', '<p>Dear Parent<br />\r\n<br />\r\nWe have a problem with php language</p>', 0, 1, 'AFFIDAVIT - Melonz Media (1).pdf', '../../email_documents/1744034711_AFFIDAVIT - Melonz Media (1).pdf', '2025-04-07 14:05:11'),
(8, '8806280465081', '8806280465081', 'PHP langauge', '<p>The meeting in at Holl</p>', 0, 1, NULL, NULL, '2025-04-07 14:21:23'),
(9, '8806280465081', '8806280465081', '', '', 0, 1, NULL, NULL, '2025-04-10 22:10:59'),
(10, '8806280465081', '8806280465081', '', '', 0, 1, 'Blank diagram.pdf', '../../email_documents/1744323217_Blank diagram.pdf', '2025-04-10 22:13:37'),
(11, '8806280465081', '8806280465081', '', '', 0, 1, NULL, NULL, '2025-04-10 22:16:56'),
(12, '8806280465081', '8806280465081', '', '', 0, 1, NULL, NULL, '2025-04-10 22:20:46'),
(13, '8806280465081', '8806280465081', '', '', 0, 1, NULL, NULL, '2025-04-10 22:23:36'),
(14, '8806280465081', '8806280465081', '', '', 0, 1, 'AFFIDAVIT - Melonz Media (1).pdf', '../../email_documents/1744323954_AFFIDAVIT - Melonz Media (1).pdf', '2025-04-10 22:25:54'),
(15, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Here! He</p>', 0, 1, NULL, NULL, '2025-04-10 22:29:05'),
(16, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Here! He</p>', 0, 1, NULL, NULL, '2025-04-10 22:30:48'),
(17, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Today we will write a test</p>', 0, 1, 'AFFIDAVIT - Melonz Media (1).pdf', '../../email_documents/1744324322_AFFIDAVIT - Melonz Media (1).pdf', '2025-04-10 22:32:02'),
(18, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Today we will write a test</p>', 0, 1, 'AFFIDAVIT - Melonz Media (1).pdf', '../../email_documents/1744324339_AFFIDAVIT - Melonz Media (1).pdf', '2025-04-10 22:32:19'),
(19, '8806280465081', '8806280465081', 'C++', '<p>Greeting Maam<br />\r\n<br />\r\nI need tips on how to help my child</p>', 0, 1, NULL, NULL, '2025-04-10 22:34:39'),
(20, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Goodmorning Parent</p>\r\n', 0, 0, NULL, NULL, '2025-04-10 22:46:54'),
(21, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Heeee</p>\r\n', 0, 0, NULL, NULL, '2025-04-10 22:51:26'),
(22, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>heeeer</p>\r\n', 0, 0, 'Blank diagram.pdf', '../../email_documents/1744325730_Blank diagram.pdf', '2025-04-10 22:55:30'),
(23, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Haveeee</p>\r\n', 0, 0, NULL, NULL, '2025-04-10 22:59:39'),
(24, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>heee</p>\r\n', 0, 0, NULL, NULL, '2025-04-10 23:04:32'),
(25, '8806280465081', '8806280465081', 'How to Code in  Java', '<p>Goodmorning Parent<br />\r\n<br />\r\nHi to my child</p>\r\n', 0, 0, 'AFFIDAVIT - Melonz Media (1).pdf', '../../email_documents/1744326470_AFFIDAVIT - Melonz Media (1).pdf', '2025-04-10 23:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `exam_scope`
--

CREATE TABLE `exam_scope` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_scope`
--

INSERT INTO `exam_scope` (`id`, `teacher_id`, `subject_id`, `grade_id`, `exam`, `date_time`) VALUES
(1, '8806280465081', 22, 5, '<p>We have a exam test next week&nbsp;</p>\r\n', '2025-03-21 13:59:47'),
(2, '8806280465081', 22, 5, '<p>We have a test next week be present</p>\r\n', '2025-03-24 20:07:33'),
(3, '8806280465081', 22, 5, '<p>There scope is everything we did in class</p>\r\n', '2025-03-25 09:25:51'),
(4, '8806280465081', 22, 5, '<p>We are not writing today</p>\r\n', '2025-03-25 11:02:45'),
(5, '8806280465081', 22, 5, '<p>We do have a test today</p>\r\n', '2025-03-25 11:06:05'),
(6, '8806280465081', 22, 5, '<p>Exam is start on the 1st for April 2025</p>\r\n', '2025-03-25 15:20:36'),
(7, '811301180089', 32, 1, '<p>We have class test tomorrow</p>\r\n', '2025-04-01 19:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `grade_no` varchar(3) DEFAULT NULL,
  `grade_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `grade_no`, `grade_name`) VALUES
(1, '8', 'Grade 8'),
(2, '9', 'Grade 9'),
(3, '10', 'Grade 10'),
(4, '11', 'Grade 11'),
(5, '12', 'Grade 12');

-- --------------------------------------------------------

--
-- Table structure for table `learner`
--

CREATE TABLE `learner` (
  `id` int(11) NOT NULL,
  `idno` varchar(13) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `grade_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learner`
--

INSERT INTO `learner` (`id`, `idno`, `name`, `surname`, `email`, `password`, `contactno`, `location`, `grade_id`, `school_id`, `date_time`) VALUES
(1, '0009156309081', 'Mncedisi', 'Mthembu', 'mncedisimthembu27@gmail.com', 'Mncedisi@12', '0732756778', '../../profile_images/Mncedisi Mthembu.jpg', 5, 1, '2025-03-21 14:10:37'),
(2, '0101275989081', 'Philani', 'Vundla', 'philani@gmail.com', 'Philani@12', '0687654321', '../../image/download.png', 5, 2, '2025-03-25 13:58:27'),
(3, '1201016997085', 'Mpendula', 'Mabunzana', 'mpendula@gmail.com', 'Mpendula@12', '0612345678', '../../image/download.png', 1, 5, '2025-04-01 19:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `learner_admission`
--

CREATE TABLE `learner_admission` (
  `id` int(11) NOT NULL,
  `idno` varchar(13) NOT NULL,
  `title` varchar(5) DEFAULT NULL,
  `initials` varchar(5) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `secondname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `language` varchar(255) NOT NULL,
  `ethnic` varchar(12) DEFAULT NULL,
  `pstatus` varchar(12) DEFAULT NULL,
  `citizen` varchar(5) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `streetname` varchar(255) DEFAULT NULL,
  `suburbname` varchar(255) DEFAULT NULL,
  `postalcode` varchar(4) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learner_admission`
--

INSERT INTO `learner_admission` (`id`, `idno`, `title`, `initials`, `firstname`, `secondname`, `surname`, `gender`, `dob`, `language`, `ethnic`, `pstatus`, `citizen`, `mobileno`, `email`, `streetname`, `suburbname`, `postalcode`, `status`, `date_time`) VALUES
(1, '0009156309081', 'Mr', 'M.M', 'Mncedisi', 'Mozisi', 'Mthembu', 'Male', '2000-09-15', 'English', 'African', 'Single', 'Yes', '0737256778', 'mncedisimthembu27@gmail.com', 'Mthembu street 1243', 'Vryheid', '3100', 'Approved', '2025-03-21 12:52:59'),
(3, '0101275989081', 'Mr', 'P.S', 'Philani', 'Syabonga', 'Vundla', 'Male', '2001-01-27', 'IsiZulul', 'African', 'Single', 'Yes', '0737256778', 'philani@gmail.com', 'Mthembu street 1243', 'Newcastle', '9003', 'Approved', '2025-03-21 13:22:42'),
(4, '0105100822086', 'Ms', 'N.S', 'Nothemba', 'Smangele', 'Sikhonde', 'Female', '2001-05-10', 'IsiZulul', 'African', 'Single', 'Yes', '0612345678', 'nothemba7@gmail.com', 'Mthembu street 1243', 'Vryheid', '3100', 'Pending', '2025-03-21 13:27:11'),
(5, '1201016997085', 'Mr', 'M.A', 'MPENDULA', 'ALPHEUS', 'MABUNZANA', 'Male', '2012-01-01', 'SeSwati', 'African', 'Single', 'Yes', '0841234567', 'strikekunene001@gmail.com', 'Soshanguve VV', 'Mabopane', '0200', 'Approved', '2025-04-01 15:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `learner_assignment`
--

CREATE TABLE `learner_assignment` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `assignment_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learner_assignment`
--

INSERT INTO `learner_assignment` (`id`, `learner_id`, `assignment_id`, `subject_id`, `grade_id`, `file_name`, `file_path`, `assignment_name`, `description`, `marks`, `date_time`) VALUES
(1, '0009156309081', 1, 1, 5, 'ckeditor4-export-pdf-1.pdf', '../../assignments/1742569477_ckeditor4-export-pdf-1.pdf', 'Mncedisi Assgn 1', 'Mncedisi Assgn 1', 100, '2025-03-21 15:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `learner_class_test`
--

CREATE TABLE `learner_class_test` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `test_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `class_test_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learner_class_test`
--

INSERT INTO `learner_class_test` (`id`, `learner_id`, `test_id`, `subject_id`, `grade_id`, `file_name`, `file_path`, `class_test_name`, `description`, `score`, `date_time`) VALUES
(1, '0009156309081', 1, 1, 5, 'Invoice-1242488.pdf', '../../class_tests/1742569539_Invoice-1242488.pdf', 'Class Test 1', 'Mncedisi Class Test 1', 90, '2025-03-21 15:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `learner_class_test_score`
--

CREATE TABLE `learner_class_test_score` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `test_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `score` double NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learner_class_test_score`
--

INSERT INTO `learner_class_test_score` (`id`, `learner_id`, `test_id`, `subject_id`, `grade_id`, `score`, `date_time`) VALUES
(1, '0009156309081', 1414860, 1, 5, 50, '2025-04-10 23:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `learner_documents`
--

CREATE TABLE `learner_documents` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `birth_certificate` varchar(255) NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  `school_report` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learner_documents`
--

INSERT INTO `learner_documents` (`id`, `learner_id`, `birth_certificate`, `parent_id`, `school_report`, `date_time`) VALUES
(1, '0009156309081', '../../learner_documents/1742565335_ckeditor4-export-pdf-1.pdf', '../../learner_documents/1742565335_AFFIDAVIT - Melonz Media.pdf', '../../learner_documents/1742565335_MYCareerTrendz App.pdf', '2025-03-21 13:55:35'),
(3, '0101275989081', '../../learner_documents/1742567062_ckeditor4-export-pdf-1.pdf', '../../learner_documents/1742567062_Invoice-1242488.pdf', '../../learner_documents/1742567062_ckeditor4-export-pdf-1.pdf', '2025-03-21 14:24:22'),
(4, '0105100822086', '../../learner_documents/1742567389_Invoice-1242488.pdf', '../../learner_documents/1742567389_ckeditor4-export-pdf-1.pdf', '../../learner_documents/1742567389_Invoice-1242488.pdf', '2025-03-21 14:29:49'),
(5, '1201016997085', '../../learner_documents/1743521767_ckeditor4-export-pdf-1 (1).pdf', '../../learner_documents/1743521767_AFFIDAVIT - Melonz Media (1).pdf', '../../learner_documents/1743521767_Invoice-1242488.pdf', '2025-04-01 15:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `learner_log`
--

CREATE TABLE `learner_log` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `active` varchar(1) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learner_log`
--

INSERT INTO `learner_log` (`id`, `learner_id`, `active`, `date_time`) VALUES
(1, '0009156309081', '1', '2025-03-21 14:01:11'),
(2, '0009156309081', '0', '2025-03-21 14:01:50'),
(3, '0009156309081', '1', '2025-03-21 14:02:01'),
(4, '0009156309081', '0', '2025-03-21 14:05:39'),
(5, '0009156309081', '1', '2025-03-21 14:52:48'),
(6, '0009156309081', '0', '2025-03-21 15:11:17'),
(7, '0009156309081', '1', '2025-03-21 15:45:39'),
(8, '0009156309081', '0', '2025-03-22 14:02:50'),
(9, '0009156309081', '1', '2025-03-22 14:03:14'),
(10, '0009156309081', '0', '2025-03-22 14:32:31'),
(11, '0009156309081', '1', '2025-03-22 15:53:53'),
(12, '0009156309081', '1', '2025-03-23 13:11:07'),
(13, '0009156309081', '0', '2025-03-23 14:04:18'),
(14, '0009156309081', '1', '2025-03-23 14:06:34'),
(15, '0009156309081', '0', '2025-03-23 14:14:35'),
(16, '0009156309081', '1', '2025-03-23 14:16:00'),
(17, '0009156309081', '0', '2025-03-23 16:57:19'),
(18, '0009156309081', '1', '2025-03-23 17:03:18'),
(19, '0009156309081', '0', '2025-03-23 18:04:16'),
(20, '0009156309081', '1', '2025-03-24 06:48:48'),
(21, '0009156309081', '0', '2025-03-24 08:53:35'),
(22, '0009156309081', '1', '2025-03-24 16:07:05'),
(23, '0009156309081', '1', '2025-03-24 16:43:58'),
(24, '0009156309081', '0', '2025-03-24 16:50:56'),
(25, '0009156309081', '1', '2025-03-24 17:10:28'),
(26, '0009156309081', '0', '2025-03-24 17:26:53'),
(27, '0009156309081', '1', '2025-03-24 17:27:05'),
(28, '0009156309081', '0', '2025-03-24 20:47:04'),
(29, '0009156309081', '1', '2025-03-24 20:51:32'),
(30, '0009156309081', '0', '2025-03-24 20:58:50'),
(31, '0009156309081', '1', '2025-03-24 21:00:28'),
(32, '0009156309081', '0', '2025-03-24 21:07:01'),
(33, '0009156309081', '1', '2025-03-24 21:07:48'),
(34, '0009156309081', '0', '2025-03-24 21:10:22'),
(35, '0009156309081', '1', '2025-03-24 21:28:00'),
(36, '0009156309081', '0', '2025-03-24 22:21:35'),
(37, '0009156309081', '1', '2025-03-24 22:25:15'),
(38, '0009156309081', '0', '2025-03-25 08:49:52'),
(39, '0009156309081', '1', '2025-03-25 08:58:19'),
(40, '0009156309081', '0', '2025-03-25 09:26:23'),
(41, '0009156309081', '1', '2025-03-25 09:26:32'),
(42, '0009156309081', '0', '2025-03-25 09:33:03'),
(43, '0009156309081', '1', '2025-03-25 09:33:11'),
(44, '0009156309081', '0', '2025-03-25 09:45:37'),
(45, '0009156309081', '1', '2025-03-25 10:38:41'),
(46, '0009156309081', '0', '2025-03-25 10:49:08'),
(47, '0009156309081', '1', '2025-03-25 10:52:54'),
(48, '0009156309081', '0', '2025-03-25 10:53:56'),
(49, '0009156309081', '1', '2025-03-25 13:32:33'),
(50, '0009156309081', '0', '2025-03-25 13:42:42'),
(51, '0101275989081', '1', '2025-03-25 13:58:55'),
(52, '0101275989081', '0', '2025-03-25 14:05:19'),
(53, '0009156309081', '1', '2025-03-25 14:06:54'),
(54, '0009156309081', '0', '2025-03-25 14:07:08'),
(55, '0101275989081', '1', '2025-03-25 14:07:22'),
(56, '0101275989081', '0', '2025-03-25 14:07:34'),
(57, '0009156309081', '1', '2025-03-25 14:07:41'),
(58, '0009156309081', '1', '2025-03-25 14:12:02'),
(59, '0009156309081', '0', '2025-03-25 14:16:40'),
(60, '0009156309081', '1', '2025-03-25 14:55:11'),
(61, '0009156309081', '0', '2025-03-25 15:17:17'),
(62, '0009156309081', '1', '2025-03-25 15:21:45'),
(63, '0009156309081', '0', '2025-03-25 15:23:06'),
(64, '0101275989081', '1', '2025-03-25 15:23:18'),
(65, '0101275989081', '0', '2025-03-25 15:23:41'),
(66, '0009156309081', '1', '2025-03-25 15:23:53'),
(67, '0101275989081', '1', '2025-03-25 16:17:30'),
(68, '0101275989081', '0', '2025-03-25 16:18:55'),
(69, '0009156309081', '1', '2025-03-25 16:21:03'),
(70, '0009156309081', '0', '2025-03-25 16:22:30'),
(71, '0101275989081', '1', '2025-03-25 16:22:40'),
(72, '0101275989081', '0', '2025-03-25 16:25:09'),
(73, '0009156309081', '1', '2025-03-25 16:29:49'),
(74, '0009156309081', '0', '2025-03-25 16:31:50'),
(75, '0101275989081', '1', '2025-03-25 16:32:00'),
(76, '0101275989081', '0', '2025-03-25 16:33:40'),
(77, '0009156309081', '1', '2025-03-25 16:35:21'),
(78, '0009156309081', '0', '2025-03-25 16:37:01'),
(79, '0101275989081', '1', '2025-03-25 16:37:10'),
(80, '0101275989081', '0', '2025-03-25 16:39:23'),
(81, '0009156309081', '1', '2025-03-25 16:39:35'),
(82, '0009156309081', '0', '2025-03-25 16:40:53'),
(83, '0101275989081', '1', '2025-03-25 16:41:03'),
(84, '0101275989081', '0', '2025-03-25 16:41:46'),
(85, '0009156309081', '1', '2025-03-25 19:09:27'),
(86, '0009156309081', '0', '2025-03-25 21:05:15'),
(87, '0009156309081', '1', '2025-03-25 22:06:22'),
(88, '0009156309081', '0', '2025-03-26 12:08:02'),
(89, '0009156309081', '1', '2025-03-26 13:31:22'),
(90, '0009156309081', '0', '2025-03-26 13:35:31'),
(91, '0101275989081', '1', '2025-03-26 13:35:42'),
(92, '0101275989081', '0', '2025-03-26 13:39:57'),
(93, '0009156309081', '1', '2025-03-27 15:58:50'),
(94, '0009156309081', '0', '2025-03-29 13:01:14'),
(95, '0009156309081', '1', '2025-03-29 16:31:05'),
(96, '0009156309081', '0', '2025-03-29 16:31:45'),
(97, '0009156309081', '1', '2025-03-29 17:24:54'),
(98, '0009156309081', '0', '2025-03-29 17:32:09'),
(99, '0009156309081', '1', '2025-03-29 21:59:17'),
(100, '0009156309081', '0', '2025-03-29 23:37:51'),
(101, '0009156309081', '1', '2025-03-31 10:01:18'),
(102, '0009156309081', '0', '2025-03-31 10:43:04'),
(103, '0009156309081', '1', '2025-03-31 16:49:25'),
(104, '0009156309081', '0', '2025-03-31 17:00:57'),
(105, '0009156309081', '1', '2025-03-31 17:12:13'),
(106, '0009156309081', '0', '2025-03-31 17:17:44'),
(107, '0009156309081', '1', '2025-03-31 17:19:28'),
(108, '0009156309081', '0', '2025-03-31 17:48:51'),
(109, '0009156309081', '1', '2025-03-31 17:50:29'),
(110, '0009156309081', '1', '2025-03-31 19:02:56'),
(111, '0009156309081', '0', '2025-03-31 20:26:09'),
(112, '0009156309081', '1', '2025-03-31 20:39:19'),
(113, '0009156309081', '0', '2025-03-31 21:33:00'),
(114, '0101275989081', '1', '2025-03-31 21:33:29'),
(115, '0009156309081', '0', '2025-03-31 22:02:49'),
(116, '1201016997085', '1', '2025-04-01 19:21:31'),
(117, '1201016997085', '0', '2025-04-01 19:22:08'),
(118, '0009156309081', '1', '2025-04-01 19:22:15'),
(119, '0009156309081', '0', '2025-04-01 19:22:31'),
(120, '1201016997085', '1', '2025-04-01 19:26:59'),
(121, '1201016997085', '0', '2025-04-01 19:27:50'),
(122, '1201016997085', '1', '2025-04-01 21:28:19'),
(123, '1201016997085', '0', '2025-04-01 21:32:26'),
(124, '0009156309081', '1', '2025-04-02 18:14:34'),
(125, '0009156309081', '0', '2025-04-02 18:14:53'),
(126, '0009156309081', '1', '2025-04-02 18:18:52'),
(127, '0009156309081', '0', '2025-04-02 18:20:16'),
(128, '0009156309081', '1', '2025-04-07 07:50:56'),
(129, '0009156309081', '1', '2025-04-07 08:46:16'),
(130, '0009156309081', '0', '2025-04-07 08:46:24'),
(131, '0009156309081', '1', '2025-04-07 08:47:54'),
(132, '0009156309081', '0', '2025-04-07 08:48:10'),
(133, '0009156309081', '1', '2025-04-07 08:49:18'),
(134, '0009156309081', '0', '2025-04-07 08:49:37'),
(135, '0009156309081', '1', '2025-04-07 08:51:13'),
(136, '0009156309081', '0', '2025-04-07 08:52:00'),
(137, '0009156309081', '1', '2025-04-07 09:57:33'),
(138, '0009156309081', '0', '2025-04-07 10:09:11'),
(139, '0009156309081', '1', '2025-04-08 10:02:04'),
(140, '0009156309081', '0', '2025-04-08 10:06:57'),
(141, '0009156309081', '1', '2025-04-10 18:39:39'),
(142, '0009156309081', '0', '2025-04-10 19:16:55'),
(143, '0009156309081', '1', '2025-04-10 19:17:27'),
(144, '0009156309081', '0', '2025-04-10 19:17:37'),
(145, '0009156309081', '1', '2025-04-10 21:20:51'),
(146, '0009156309081', '0', '2025-04-10 21:23:37'),
(147, '0009156309081', '1', '2025-04-10 23:23:55'),
(148, '0009156309081', '0', '2025-04-10 23:29:58'),
(149, '0009156309081', '1', '2025-04-10 23:49:41'),
(150, '0009156309081', '0', '2025-04-10 23:51:14'),
(151, '0009156309081', '1', '2025-04-11 00:31:36'),
(152, '0009156309081', '0', '2025-04-11 02:06:35'),
(153, '0009156309081', '1', '2025-04-30 10:48:23'),
(154, '0009156309081', '1', '2025-05-05 10:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_content`
--

CREATE TABLE `lesson_content` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson_content`
--

INSERT INTO `lesson_content` (`id`, `teacher_id`, `topic_id`, `subject_id`, `grade_id`, `content`, `date_time`) VALUES
(8, '8806280465081', 4, 22, 5, '<p>Java</p>\r\n', '2025-03-23 12:07:58'),
(10, '0811301180089', 5, 32, 1, '<p>How gears work</p>\r\n', '2025-04-01 19:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_documents`
--

CREATE TABLE `lesson_documents` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `lesson_content_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson_documents`
--

INSERT INTO `lesson_documents` (`id`, `teacher_id`, `topic_id`, `lesson_content_id`, `subject_id`, `grade_id`, `file_name`, `file_path`, `description`, `date_time`) VALUES
(1, '8806280465081', 4, 8, 22, 5, 'MYCareerTrendz App.pdf', '../../lessons/1742735382_MYCareerTrendz App.pdf', 'Note on how to program in java', '2025-03-23 13:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_video`
--

CREATE TABLE `lesson_video` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `lesson_content_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson_video`
--

INSERT INTO `lesson_video` (`id`, `teacher_id`, `topic_id`, `lesson_content_id`, `subject_id`, `grade_id`, `video_name`, `video_path`, `description`, `date_time`) VALUES
(1, '8806280465081', 4, 8, 22, 5, 'nsfas.mp4', '../../lessons/1742735335_nsfas.mp4', 'Learn how to program', '2025-03-23 13:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `user_id` varchar(13) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `msg_status` tinyint(1) DEFAULT 0,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `teacher_id`, `user_id`, `message`, `status`, `msg_status`, `date_time`) VALUES
(1, '8806280465081', '0009156309081', 'Hi Mncedisi', 1, 0, '2025-03-29 20:12:47'),
(2, '8806280465081', '<br />\r\n<b>Wa', NULL, 0, 0, '2025-03-29 20:41:25'),
(3, '8806280465081', '<br />\r\n<b>Wa', NULL, 0, 0, '2025-03-29 20:43:24'),
(4, '8806280465081', '<br />\r\n<b>Wa', NULL, 0, 0, '2025-03-29 20:45:49'),
(5, '8806280465081', '0009156309081', NULL, 1, 0, '2025-03-29 20:47:06'),
(6, '8806280465081', '0009156309081', '', 1, 0, '2025-03-29 20:48:36'),
(7, '8806280465081', '0009156309081', '', 1, 0, '2025-03-29 20:52:27'),
(8, '8806280465081', '0009156309081', '', 1, 0, '2025-03-29 20:57:44'),
(9, '8806280465081', '0009156309081', 'Hello  Mr Mthembu', 1, 0, '2025-03-29 21:00:22'),
(10, '8806280465081', '0009156309081', 'Are You Ok', 1, 0, '2025-03-29 21:00:39'),
(11, '8806280465081', '0009156309081', 'How are ?', 1, 0, '2025-03-29 21:01:29'),
(12, '8806280465081', '', '', 0, 0, '2025-03-29 21:10:31'),
(13, '8806280465081', '0009156309081', 'How are doing', 1, 0, '2025-03-29 21:11:24'),
(14, '8806280465081', '0101275989081', 'Hello', 1, 0, '2025-03-29 21:37:08'),
(15, '8806280465081', '0009156309081', 'Are Fine', 1, 0, '2025-03-29 21:52:51'),
(16, '8806280465081', '0009156309081', 'Hellow Mr Zungu', 1, 1, '2025-03-29 22:59:43'),
(17, '8806280465081', '0009156309081', 'Hi Mthembu', 1, 0, '2025-03-29 23:02:07'),
(18, '8806280465081', '0009156309081', 'I will be abesent on Monday', 1, 1, '2025-03-29 23:03:47'),
(19, '8806280465081', '0009156309081', 'Tomorrow is the holiday mamie', 1, 1, '2025-03-29 23:04:21'),
(20, '8806280465081', '0009156309081', 'Come to school on monday', 1, 0, '2025-03-29 23:05:25'),
(21, '8806280465081', '0009156309081', 'We have a class today ', 1, 0, '2025-03-31 17:08:07'),
(22, '8806280465081', '0009156309081', 'I am sick i won\'t come to tomorrow', 1, 1, '2025-03-31 17:20:54'),
(23, '0811301180089', '1201016997085', 'Hie Mabunzana', 1, 0, '2025-04-01 19:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `online_class_test`
--

CREATE TABLE `online_class_test` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `test_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_answer` enum('A','B','C','D') NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_class_test`
--

INSERT INTO `online_class_test` (`id`, `teacher_id`, `test_id`, `subject_id`, `grade_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `date_time`) VALUES
(4, '8806280465081', 1414860, 22, 5, 'Java is a programming language ?', 'True', 'False', 'None', 'All Above', 'A', '2025-04-10 23:48:19'),
(5, '8806280465081', 1414860, 22, 5, 'PHP is a programming language ?', 'None', 'True', 'All Above', 'False', 'B', '2025-04-10 23:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `online_class_test_details`
--

CREATE TABLE `online_class_test_details` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_class_test_details`
--

INSERT INTO `online_class_test_details` (`id`, `teacher_id`, `test_id`, `subject_id`, `grade_id`, `title`, `total`, `date_time`) VALUES
(4, '8806280465081', 1414860, 22, 5, 'Java', 2, '2025-04-10 23:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `online_quiz`
--

CREATE TABLE `online_quiz` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `test_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_quiz_details`
--

CREATE TABLE `online_quiz_details` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `idno` varchar(13) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `idno`, `name`, `surname`, `email`, `password`, `contactno`, `location`, `date_time`) VALUES
(1, '8806280465081', 'Zama', 'Nkosi', 'zama@gmail.com', 'ZamaNkosi@12', '0737256778', '../../image/download.png', '2025-03-21 15:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `parent_guardian`
--

CREATE TABLE `parent_guardian` (
  `id` int(11) NOT NULL,
  `idno` varchar(13) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `title` varchar(5) DEFAULT NULL,
  `fnames` varchar(255) DEFAULT NULL,
  `pstatus` varchar(15) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `ethnic` varchar(12) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `homecell` varchar(10) DEFAULT NULL,
  `workno` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `reside` varchar(5) DEFAULT NULL,
  `workstatus` varchar(5) DEFAULT NULL,
  `citizen` varchar(5) DEFAULT NULL,
  `streetname` varchar(255) DEFAULT NULL,
  `suburbname` varchar(255) DEFAULT NULL,
  `postalcode` varchar(4) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_guardian`
--

INSERT INTO `parent_guardian` (`id`, `idno`, `learner_id`, `title`, `fnames`, `pstatus`, `language`, `ethnic`, `mobileno`, `homecell`, `workno`, `email`, `reside`, `workstatus`, `citizen`, `streetname`, `suburbname`, `postalcode`, `date_time`) VALUES
(1, '8806280465081', '0009156309081', 'Dr', 'Zama Nkosi', 'Single', 'IsiZulu', 'African', '0737256778', '0812345678', '0112345678', 'zamankosi@gmail.com', 'Yes', 'Yes', 'No', 'Mthembu street 1243', 'Vryheid', '3100', '2025-03-21 12:54:06'),
(2, '8806280465081', '0101275989081', 'Dr', 'Zama Nkosi', 'Single', 'IsiZulu', 'African', '0737256778', '0812345678', '0112345678', 'zama@gmail.com', 'Yes', 'Yes', 'No', 'P.O.Box 3186', 'Vryheid', '3100', '2025-03-21 13:23:17'),
(3, '8806280465081', '0105100822086', 'Dr', 'Zama Nkosi', 'Single', 'IsiZulu', 'African', '0737256778', '0612345678', '0112345678', 'zama@gmail.com', 'Yes', 'No', 'Yes', 'Mthembu street 1243', 'Vryheid', '3100', '2025-03-21 13:28:28'),
(4, '0105100822086', '1201016997085', 'Mrs', 'Nobuhle', 'Married', 'Sesotho (North Sotho)', 'African', '0612345678', '0687654321', '0112345678', 'nobuhle@gmail.com', 'Yes', 'Yes', 'Yes', 'Soshanguve VV', 'Mabopane', '0200', '2025-04-01 15:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `parent_log`
--

CREATE TABLE `parent_log` (
  `id` int(11) NOT NULL,
  `parent_id` varchar(13) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `active` varchar(1) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_log`
--

INSERT INTO `parent_log` (`id`, `parent_id`, `learner_id`, `active`, `date_time`) VALUES
(1, '8806280465081', '0009156309081', '1', '2025-03-21 15:17:41'),
(2, '8806280465081', '0009156309081', '1', '2025-03-23 18:13:45'),
(3, '8806280465081', '0009156309081', '0', '2025-03-24 06:48:18'),
(4, '8806280465081', '0009156309081', '1', '2025-03-24 08:55:57'),
(5, '8806280465081', '0009156309081', '0', '2025-03-24 09:22:47'),
(6, '8806280465081', '0009156309081', '1', '2025-03-25 08:52:30'),
(7, '8806280465081', '0009156309081', '0', '2025-03-25 08:58:01'),
(8, '8806280465081', '0009156309081', '1', '2025-03-25 09:46:20'),
(9, '8806280465081', '0009156309081', '0', '2025-03-25 10:22:27'),
(10, '8806280465081', '0009156309081', '1', '2025-03-25 10:28:54'),
(11, '8806280465081', '0009156309081', '0', '2025-03-25 10:32:04'),
(12, '8806280465081', '0009156309081', '1', '2025-03-25 10:34:31'),
(13, '8806280465081', '0009156309081', '0', '2025-03-25 10:35:02'),
(14, '8806280465081', '0009156309081', '1', '2025-03-25 10:35:24'),
(15, '8806280465081', '0009156309081', '0', '2025-03-25 10:38:32'),
(16, '8806280465081', '0009156309081', '1', '2025-03-25 10:49:44'),
(17, '8806280465081', '0009156309081', '0', '2025-03-25 10:52:45'),
(18, '8806280465081', '0009156309081', '1', '2025-03-25 10:54:32'),
(19, '8806280465081', '0009156309081', '1', '2025-03-25 13:43:19'),
(20, '8806280465081', '0009156309081', '0', '2025-03-25 13:53:02'),
(21, '8806280465081', '0101275989081', '1', '2025-03-25 14:17:39'),
(22, '8806280465081', '0101275989081', '0', '2025-03-25 14:17:49'),
(23, '8806280465081', '0009156309081', '1', '2025-03-25 14:18:27'),
(24, '8806280465081', '0009156309081', '0', '2025-03-25 14:54:49'),
(25, '8806280465081', '0009156309081', '1', '2025-03-25 15:19:07'),
(26, '8806280465081', '0009156309081', '0', '2025-03-25 15:21:26'),
(27, '8806280465081', '0009156309081', '1', '2025-03-26 12:39:55'),
(28, '8806280465081', '0009156309081', '0', '2025-03-26 13:31:15'),
(29, '8806280465081', '0009156309081', '1', '2025-03-29 23:39:36'),
(30, '8806280465081', '0009156309081', '0', '2025-03-31 09:36:00'),
(31, '8806280465081', '0009156309081', '1', '2025-04-02 08:47:37'),
(32, '8806280465081', '0009156309081', '1', '2025-04-04 17:25:04'),
(33, '8806280465081', '0009156309081', '0', '2025-04-04 18:46:54'),
(34, '8806280465081', '0009156309081', '1', '2025-04-04 18:51:42'),
(35, '8806280465081', '0009156309081', '1', '2025-04-05 13:43:24'),
(37, '8806280465081', '0009156309081', '1', '2025-04-07 12:30:26'),
(38, '8806280465081', '0009156309081', '0', '2025-04-07 12:30:32'),
(39, '8806280465081', '0009156309081', '1', '2025-04-07 12:30:49'),
(40, '8806280465081', '0009156309081', '1', '2025-04-07 12:30:58'),
(41, '8806280465081', '000915630908', '1', '2025-04-07 12:31:03'),
(42, '8806280465081', '000915630908', '0', '2025-04-07 12:31:26'),
(43, '8806280465081', '0009156309081', '1', '2025-04-07 12:31:47'),
(44, '8806280465081', '0009156309081', '0', '2025-04-07 13:27:01'),
(45, '8806280465081', '0009156309081', '1', '2025-04-07 13:41:52'),
(46, '8806280465081', '0009156309081', '0', '2025-04-07 15:14:20'),
(47, '8806280465081', '0009156309081', '1', '2025-04-08 10:29:07'),
(48, '8806280465081', '0009156309081', '0', '2025-04-08 10:31:22'),
(49, '8806280465081', '0009156309081', '1', '2025-04-10 17:30:46'),
(50, '8806280465081', '0009156309081', '0', '2025-04-10 17:38:52'),
(51, '8806280465081', '0009156309081', '1', '2025-04-10 21:26:12'),
(52, '8806280465081', '0009156309081', '0', '2025-04-10 22:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `parent_notifications`
--

CREATE TABLE `parent_notifications` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_notifications`
--

INSERT INTO `parent_notifications` (`id`, `teacher_id`, `learner_id`, `subject_id`, `grade_id`, `message`, `status`, `date_time`) VALUES
(1, '8806280465081', '0009156309081', 22, 5, '<p>We do have a test today</p>\r\n Computer Science exam scope', 1, '2025-03-25 12:06:05'),
(2, '8806280465081', '0009156309081', 22, 5, '<p>The class is removed to friday</p>\r\n Computer Science announcements', 1, '2025-03-25 12:11:24'),
(3, '8806280465081', '0009156309081', 22, 5, 'Assignment 3 Computer Science announcements', 1, '2025-03-25 12:16:16'),
(4, '8806280465081', '0009156309081', 22, 5, ' Computer Science announcements', 0, '2025-03-25 12:22:48'),
(5, '8806280465081', '0009156309081', 22, 5, '<p>Class and Objects In java</p>\r\n Computer Science lesson', 0, '2025-03-25 12:27:57'),
(6, '8806280465081', '0009156309081', 22, 5, ' Computer Science lesson', 0, '2025-03-25 12:33:19'),
(7, '8806280465081', '0009156309081', 22, 5, 'Final mark is updated in Computer Science', 0, '2025-03-25 13:25:45'),
(8, '8806280465081', '0009156309081', 22, 5, 'Final mark is updated in Computer Science', 0, '2025-03-25 13:27:27'),
(9, '8806280465081', '0009156309081', 22, 5, 'Class Test final mark is updated in Computer Science', 0, '2025-03-25 13:29:07'),
(10, '8806280465081', '0009156309081', 22, 5, 'Class Test final mark is updated in Computer Science', 0, '2025-03-25 13:29:19'),
(11, '8806280465081', '0009156309081', 22, 5, 'Assignment final mark is updated in Computer Science', 0, '2025-03-25 13:31:12'),
(12, '8806280465081', '0009156309081', 22, 5, 'Final mark is updated in Computer Science', 0, '2025-03-25 13:31:35'),
(13, '8806280465081', '0009156309081', 22, 5, '<p>Tomorrow you will have you script for the class test wrote in class</p>\r\n Computer Science announcements', 0, '2025-03-25 14:06:42'),
(14, '8806280465081', '0101275989081', 22, 5, '<p>Tomorrow you will have you script for the class test wrote in class</p>\r\n Computer Science announcements', 0, '2025-03-25 14:06:43'),
(15, '8806280465081', '0009156309081', 22, 5, '<p>We dont have a class today and tomorrow</p>\r\n Computer Science announcements', 0, '2025-03-25 16:20:01'),
(16, '8806280465081', '0101275989081', 22, 5, '<p>We dont have a class today and tomorrow</p>\r\n Computer Science announcements', 0, '2025-03-25 16:20:01'),
(17, '8806280465081', '0009156309081', 22, 5, '<p>Exam is start on the 1st for April 2025</p>\r\n Computer Science exam scope', 0, '2025-03-25 16:20:36'),
(18, '8806280465081', '0101275989081', 22, 5, '<p>Exam is start on the 1st for April 2025</p>\r\n Computer Science exam scope', 0, '2025-03-25 16:20:36'),
(19, '8806280465081', '0009156309081', 22, 5, 'Class Test final mark is updated in Computer Science', 0, '2025-03-29 16:24:14'),
(20, '8806280465081', '0101275989081', 22, 5, 'Class Test final mark is updated in Computer Science', 0, '2025-03-29 16:24:14'),
(21, '0811301180089', '1201016997085', 32, 1, '<p>How gears work</p>\r\n Technology lesson', 0, '2025-04-01 19:24:42'),
(22, '0811301180089', '1201016997085', 32, 1, '<p>We have class test tomorrow</p>\r\n Technology exam scope', 0, '2025-04-01 19:25:08'),
(23, '8806280465081', '0009156309081', 22, 5, 'Final mark is updated in Computer Science', 0, '2025-04-10 23:48:49'),
(24, '8806280465081', '0101275989081', 22, 5, 'Final mark is updated in Computer Science', 0, '2025-04-10 23:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `term` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `suburb` varchar(255) DEFAULT NULL,
  `postalcode` varchar(4) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `learner_id`, `school_name`, `address`, `suburb`, `postalcode`, `email`, `contact`, `date_time`) VALUES
(1, '0009156309081', 'Kwabhanya Secondary School', 'P.O.Box 3186', 'Vryheid', '3100', 'kwabhanyasec@gmail.com', '0112345678', '2025-03-21 13:55:01'),
(2, '0101275989081', 'Kwabhanya Secondary School', 'P.O.Box 3186', 'Vryheid', '3100', 'kwabhanyasec@gmail.com', '0112345678', '2025-03-21 14:09:32'),
(3, '0105100822086', 'Kwabhanya Secondary School', 'P.O.Box 3186', 'Vryheid', '3100', 'kwabhanyasec@gmail.com', '0112345678', '2025-03-21 14:29:22'),
(4, '8806280465081', 'Kwabhanya Secondary School', 'P.O.Box 3186', 'Vryheid', '3100', 'kwabhanyasec@gmail.com', '0112345678', '2025-03-21 14:37:18'),
(5, '1201016997085', 'Soshanguve High School', 'Soshanguve P.O.Box 3784', 'Mabopane', '0200', 'soshanguvehighschool@gmail.com', '0112345678', '2025-04-01 15:35:04'),
(6, '0811301180089', 'Soshanguve High School', 'Soshanguve P.O.Box 8765', 'Mabopane', '0200', 'soshanguvehighschool@gmail.com', '0112345678', '2025-04-01 19:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `school_announcements`
--

CREATE TABLE `school_announcements` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(13) NOT NULL,
  `user_id` varchar(13) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_announcements`
--

INSERT INTO `school_announcements` (`id`, `admin_id`, `user_id`, `message`, `status`, `date_time`) VALUES
(1, '8806280465081', '8806280465081', '<p>School is closing at 31 March 2025</p>\r\n', 1, '2025-03-25 22:04:14'),
(2, '8806280465081', '0009156309081', '<p>School is closing at 31 March 2025</p>\r\n', 1, '2025-03-25 22:04:14'),
(3, '8806280465081', '0101275989081', '<p>School is closing at 31 March 2025</p>\r\n', 0, '2025-03-25 22:04:14'),
(4, '8806280465081', '8806280465081', '<p>School is closing at 31 March 2025</p>\r\n', 1, '2025-03-25 22:04:43'),
(5, '8806280465081', '0009156309081', '<p>School is closing at 31 March 2025</p>\r\n', 1, '2025-03-25 22:04:44'),
(6, '8806280465081', '0101275989081', '<p>School is closing at 31 March 2025</p>\r\n', 0, '2025-03-25 22:04:44'),
(7, '8806280465081', '8806280465081', '<p>We have sport this week</p>\r\n', 1, '2025-03-26 11:52:15'),
(8, '8806280465081', '0009156309081', '<p>We have sport this week</p>\r\n', 1, '2025-03-26 11:52:16'),
(9, '8806280465081', '0101275989081', '<p>We have sport this week</p>\r\n', 0, '2025-03-26 11:52:16'),
(10, '8806280465081', '8806280465081', '<p>We have parent meeting next month.</p>\r\n', 1, '2025-03-26 11:52:35'),
(11, '8806280465081', '0009156309081', '<p>We have parent meeting next month.</p>\r\n', 1, '2025-03-26 11:52:35'),
(12, '8806280465081', '0101275989081', '<p>We have parent meeting next month.</p>\r\n', 0, '2025-03-26 11:52:35'),
(13, '8806280465081', '8806280465081', '<p>We will have parent meeting the meeting will be about learners progress</p>\r\n', 1, '2025-03-26 12:13:24'),
(14, '8806280465081', '0009156309081', '<p>We will have parent meeting the meeting will be about learners progress</p>\r\n', 1, '2025-03-26 12:13:24'),
(15, '8806280465081', '0101275989081', '<p>We will have parent meeting the meeting will be about learners progress</p>\r\n', 0, '2025-03-26 12:13:24'),
(16, '8806280465081', '8806280465081', '<p>We will have parent meeting the meeting will be about learners progress</p>\r\n', 1, '2025-03-26 12:13:24'),
(17, '8806280465081', '8806280465081', '<p>We have a meeting with parent tomorrow</p>\r\n', 1, '2025-04-10 06:55:10'),
(18, '8806280465081', '0811301180089', '<p>We have a meeting with parent tomorrow</p>\r\n', 1, '2025-04-10 06:55:11'),
(19, '8806280465081', '0009156309081', '<p>We have a meeting with parent tomorrow</p>\r\n', 0, '2025-04-10 06:55:11'),
(20, '8806280465081', '0101275989081', '<p>We have a meeting with parent tomorrow</p>\r\n', 0, '2025-04-10 06:55:11'),
(21, '8806280465081', '1201016997085', '<p>We have a meeting with parent tomorrow</p>\r\n', 0, '2025-04-10 06:55:11'),
(22, '8806280465081', '8806280465081', '<p>We have a meeting with parent tomorrow</p>\r\n', 1, '2025-04-10 06:55:11'),
(23, '8806280465081', '8806280465081', '<p>Dear Collegues<br />\r\n<br />\r\nWe have sport on&nbsp; monday</p>\r\n', 1, '2025-04-10 07:00:18'),
(24, '8806280465081', '0811301180089', '<p>Dear Collegues<br />\r\n<br />\r\nWe have sport on&nbsp; monday</p>\r\n', 0, '2025-04-10 07:00:18'),
(25, '8806280465081', '0009156309081', '<p>Dear Collegues<br />\r\n<br />\r\nWe have sport on&nbsp; monday</p>\r\n', 0, '2025-04-10 07:00:18'),
(26, '8806280465081', '0101275989081', '<p>Dear Collegues<br />\r\n<br />\r\nWe have sport on&nbsp; monday</p>\r\n', 0, '2025-04-10 07:00:18'),
(27, '8806280465081', '1201016997085', '<p>Dear Collegues<br />\r\n<br />\r\nWe have sport on&nbsp; monday</p>\r\n', 0, '2025-04-10 07:00:18'),
(28, '8806280465081', '8806280465081', '<p>Dear Collegues<br />\r\n<br />\r\nWe have sport on&nbsp; monday</p>\r\n', 0, '2025-04-10 07:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  `subjectcode` varchar(255) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `learner_id`, `subjectname`, `subjectcode`, `grade_id`, `location`, `date_time`) VALUES
(1, '0009156309081', 'Computer Science', 'CS', 5, '../../subjects_images/images.jpg', '2025-03-21 12:55:01'),
(2, '0009156309081', 'Economics', 'ECO', 5, '../../subjects_images/images.jpg', '2025-03-21 12:55:01'),
(3, '0009156309081', 'English First Additional Language', 'EFL', 5, '../../subjects_images/images.jpg', '2025-03-21 12:55:01'),
(4, '0009156309081', 'isiZulu Home Language', 'ZHL', 5, '../../subjects_images/images.jpg', '2025-03-21 12:55:01'),
(5, '0009156309081', 'Life Sciences', 'LIFE', 5, '../../subjects_images/images.jpg', '2025-03-21 12:55:01'),
(6, '0009156309081', 'Life Orientation', 'LO', 5, '../../subjects_images/images.jpg', '2025-03-21 12:55:01'),
(12, '0101275989081', 'Accounting', 'ACC', 5, '../../subjects_images/images.jpg', '2025-03-21 13:24:04'),
(13, '0101275989081', 'Business Studies', 'BUS', 5, '../../subjects_images/images.jpg', '2025-03-21 13:24:04'),
(14, '0101275989081', 'Computer Science', 'CS', 5, '../../subjects_images/images.jpg', '2025-03-21 13:24:04'),
(15, '0101275989081', 'Economics', 'ECO', 5, '../../subjects_images/images.jpg', '2025-03-21 13:24:04'),
(16, '0101275989081', 'English Home Language', 'EHL', 5, '../../subjects_images/images.jpg', '2025-03-21 13:24:04'),
(17, '0101275989081', 'Life Sciences', 'LIFE', 5, '../../subjects_images/images.jpg', '2025-03-21 13:24:04'),
(18, '0101275989081', 'Life Orientation', 'LO', 5, '../../subjects_images/images.jpg', '2025-03-21 13:24:04'),
(19, '0105100822086', 'Accounting', 'ACC', 4, '../../subjects_images/images.jpg', '2025-03-21 13:29:22'),
(20, '0105100822086', 'Computer Science', 'CS', 4, '../../subjects_images/images.jpg', '2025-03-21 13:29:22'),
(21, '0105100822086', 'Dance Studies', 'DAN', 4, '../../subjects_images/images.jpg', '2025-03-21 13:29:22'),
(22, '8806280465081', 'Computer Science', 'CS', 5, '../../subjects_images/images.jpg', '2025-03-21 13:37:18'),
(23, '1201016997085', 'Geography', 'GEO', 1, '../../subjects_images/images.jpg', '2025-04-01 15:35:04'),
(24, '1201016997085', 'History', 'HIS', 1, '../../subjects_images/images.jpg', '2025-04-01 15:35:04'),
(25, '1201016997085', 'Mathematics', 'MATH', 1, '../../subjects_images/images.jpg', '2025-04-01 15:35:04'),
(26, '1201016997085', 'Music', 'MUS', 1, '../../subjects_images/images.jpg', '2025-04-01 15:35:04'),
(27, '1201016997085', 'Setswana', 'SET', 1, '../../subjects_images/images.jpg', '2025-04-01 15:35:04'),
(28, '1201016997085', 'Natural Sciences', 'NS', 1, '../../subjects_images/images.jpg', '2025-04-01 15:35:04'),
(29, '1201016997085', 'Social Sciences', 'SOC', 1, '../../subjects_images/images.jpg', '2025-04-01 15:35:04'),
(30, '1201016997085', 'Technology', 'TECH', 1, '../../subjects_images/images.jpg', '2025-04-01 15:35:04'),
(31, '0811301180089', 'Mathematics', 'MATH', 1, '../../subjects_images/images.jpg', '2025-04-01 19:14:25'),
(32, '0811301180089', 'Technology', 'TECH', 1, '../../subjects_images/images.jpg', '2025-04-01 19:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `subject_final_mark`
--

CREATE TABLE `subject_final_mark` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `term_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `quiz_mark` double DEFAULT NULL,
  `class_mark` double DEFAULT NULL,
  `assignment_mark` double DEFAULT NULL,
  `final_mark` double DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_final_mark`
--

INSERT INTO `subject_final_mark` (`id`, `teacher_id`, `learner_id`, `term_id`, `subject_id`, `grade_id`, `quiz_mark`, `class_mark`, `assignment_mark`, `final_mark`, `date_time`) VALUES
(1, '8806280465081', '0009156309081', 1, 22, 5, 8, 89, 90, 90, '2025-03-23 16:58:58'),
(2, '8806280465081', '0101275989081', 1, 22, 5, 70, 70, NULL, 67, '2025-03-25 16:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `subject_overview`
--

CREATE TABLE `subject_overview` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_overview`
--

INSERT INTO `subject_overview` (`id`, `teacher_id`, `message`, `subject_id`, `grade_id`, `date_time`) VALUES
(1, '8806280465081', 'We have to work hard', 22, 5, '2025-04-10 18:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `idno` varchar(13) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `grade_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `idno`, `name`, `surname`, `email`, `password`, `contactno`, `location`, `grade_id`, `school_id`, `date_time`) VALUES
(1, '8806280465081', 'Thando', 'Zungu', 'nothando@gmail.com', 'Nothando@12', '0612345678', '../../image/download.png', 5, 4, '2025-03-21 14:47:48'),
(2, '0811301180089', 'Thembi', 'Mabunzana', 'thembimabunzana@gmail.com', 'Thembi@12', '0687654321', '../../image/download.png', 1, 6, '2025-04-01 19:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_admission`
--

CREATE TABLE `teacher_admission` (
  `id` int(11) NOT NULL,
  `idno` varchar(13) NOT NULL,
  `title` varchar(5) DEFAULT NULL,
  `initials` varchar(5) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `secondname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `language` varchar(255) NOT NULL,
  `ethnic` varchar(12) DEFAULT NULL,
  `pstatus` varchar(12) DEFAULT NULL,
  `citizen` varchar(5) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `streetname` varchar(255) DEFAULT NULL,
  `suburbname` varchar(255) DEFAULT NULL,
  `postalcode` varchar(4) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_admission`
--

INSERT INTO `teacher_admission` (`id`, `idno`, `title`, `initials`, `firstname`, `secondname`, `surname`, `gender`, `dob`, `language`, `ethnic`, `pstatus`, `citizen`, `mobileno`, `email`, `streetname`, `suburbname`, `postalcode`, `status`, `date_time`) VALUES
(1, '8806280465081', 'Ms', 'T.S', 'Thando', 'Sbongile', 'Zungu', 'Female', '1988-06-28', 'IsiZulul', 'African', 'Single', 'Yes', '0612345678', 'thando@gmail.com', 'Mthembu street 1243', 'Vryheid', '3100', 'Approved', '2025-03-21 13:37:04'),
(2, '0811301180089', 'Ms', 'T.K', 'Thembi', 'Kedibone', 'Mabunzana', 'Female', '2008-11-30', 'Setwana', 'African', 'Single', 'Yes', '0737256778', 'mncedisimthembu27@gmail.com', 'Soshanguve P.O.Box 8765', 'Mabopane', '0200', 'Approved', '2025-04-01 19:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assignment`
--

CREATE TABLE `teacher_assignment` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `assignment_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_assignment`
--

INSERT INTO `teacher_assignment` (`id`, `teacher_id`, `subject_id`, `grade_id`, `file_name`, `file_path`, `assignment_name`, `description`, `date_time`) VALUES
(1, '8806280465081', 22, 5, 'Invoice-1242488.pdf', '../../assignments/1742569377_Invoice-1242488.pdf', 'Assignments 1', 'Submission format[LearnerName assgn 1]', '2025-03-21 15:02:57'),
(2, '8806280465081', 22, 5, 'MYCareerTrendz App.pdf', '../../assignments/1742898443_MYCareerTrendz App.pdf', 'Assignment 2', 'Submission format[name assign 2]', '2025-03-25 10:27:23'),
(3, '8806280465081', 22, 5, 'MYCareerTrendz App.pdf', '../../assignments/1742904976_MYCareerTrendz App.pdf', 'Assignment 3', 'Submission Format[name assign3]', '2025-03-25 12:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_test`
--

CREATE TABLE `teacher_class_test` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `class_test_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_class_test`
--

INSERT INTO `teacher_class_test` (`id`, `teacher_id`, `subject_id`, `grade_id`, `file_name`, `file_path`, `class_test_name`, `description`, `date_time`) VALUES
(1, '8806280465081', 22, 5, 'MYCareerTrendz App.pdf', '../../class_tests/1742569330_MYCareerTrendz App.pdf', 'Class Test 1', 'Submission format[LearnerName Class Test 1]', '2025-03-21 15:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_documents`
--

CREATE TABLE `teacher_documents` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `birth_certificate` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_documents`
--

INSERT INTO `teacher_documents` (`id`, `teacher_id`, `birth_certificate`, `qualification`, `date_time`) VALUES
(1, '8806280465081', '../teacher_documents/1742567851_ckeditor4-export-pdf-1.pdf', '../teacher_documents/1742567851_Invoice-1242488.pdf', '2025-03-21 14:37:32'),
(2, '0811301180089', '../teacher_documents/1743534901_AFFIDAVIT - Melonz Media (1).pdf', '../teacher_documents/1743534901_ckeditor4-export-pdf-1.pdf', '2025-04-01 19:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_log`
--

CREATE TABLE `teacher_log` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `active` varchar(1) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_log`
--

INSERT INTO `teacher_log` (`id`, `teacher_id`, `active`, `date_time`) VALUES
(1, '8806280465081', '1', '2025-03-21 14:48:06'),
(2, '8806280465081', '0', '2025-03-22 11:42:40'),
(4, '8806280465081', '1', '2025-03-23 10:58:50'),
(5, '8806280465081', '0', '2025-03-23 13:10:55'),
(6, '8806280465081', '1', '2025-03-23 14:05:09'),
(7, '8806280465081', '0', '2025-03-23 14:06:23'),
(8, '8806280465081', '1', '2025-03-23 14:15:04'),
(9, '8806280465081', '0', '2025-03-23 14:15:52'),
(10, '8806280465081', '1', '2025-03-23 16:58:28'),
(11, '8806280465081', '0', '2025-03-23 17:03:10'),
(12, '8806280465081', '1', '2025-03-24 20:47:54'),
(13, '8806280465081', '0', '2025-03-24 20:51:24'),
(14, '8806280465081', '1', '2025-03-24 20:59:04'),
(15, '8806280465081', '0', '2025-03-24 21:00:19'),
(16, '8806280465081', '1', '2025-03-24 21:07:10'),
(17, '8806280465081', '0', '2025-03-24 21:07:39'),
(18, '8806280465081', '1', '2025-03-24 21:10:32'),
(19, '8806280465081', '0', '2025-03-24 21:27:49'),
(20, '8806280465081', '1', '2025-03-24 22:22:35'),
(21, '8806280465081', '0', '2025-03-24 22:25:03'),
(22, '8806280465081', '1', '2025-03-25 10:23:41'),
(23, '8806280465081', '0', '2025-03-25 10:28:13'),
(24, '8806280465081', '1', '2025-03-25 12:02:05'),
(25, '8806280465081', '1', '2025-03-25 13:08:22'),
(26, '8806280465081', '0', '2025-03-25 13:32:25'),
(27, '8806280465081', '1', '2025-03-25 14:05:54'),
(28, '8806280465081', '0', '2025-03-25 14:06:47'),
(29, '8806280465081', '1', '2025-03-25 15:25:57'),
(30, '8806280465081', '0', '2025-03-25 16:15:03'),
(31, '8806280465081', '1', '2025-03-25 16:19:25'),
(32, '8806280465081', '0', '2025-03-25 16:20:43'),
(33, '8806280465081', '1', '2025-03-26 12:17:24'),
(34, '8806280465081', '0', '2025-03-26 12:31:05'),
(35, '8806280465081', '1', '2025-03-26 12:31:41'),
(36, '8806280465081', '0', '2025-03-26 12:38:57'),
(37, '8806280465081', '1', '2025-03-26 13:43:06'),
(38, '8806280465081', '1', '2025-03-29 13:09:02'),
(39, '8806280465081', '0', '2025-03-29 16:30:47'),
(40, '8806280465081', '1', '2025-03-29 16:32:35'),
(41, '8806280465081', '0', '2025-03-29 17:17:23'),
(42, '8806280465081', '1', '2025-03-29 17:32:51'),
(43, '8806280465081', '1', '2025-03-29 18:31:22'),
(44, '8806280465081', '1', '2025-03-29 18:43:35'),
(45, '8806280465081', '1', '2025-03-29 18:46:12'),
(46, '8806280465081', '0', '2025-03-29 21:59:03'),
(47, '8806280465081', '1', '2025-03-29 23:01:33'),
(48, '8806280465081', '1', '2025-03-31 17:02:39'),
(49, '8806280465081', '0', '2025-03-31 17:12:04'),
(50, '8806280465081', '1', '2025-03-31 17:17:52'),
(51, '8806280465081', '0', '2025-03-31 17:19:17'),
(52, '8806280465081', '1', '2025-03-31 17:49:04'),
(53, '8806280465081', '0', '2025-03-31 17:50:22'),
(54, '8806280465081', '1', '2025-03-31 20:26:46'),
(55, '8806280465081', '0', '2025-03-31 20:39:10'),
(56, '8806280465081', '1', '2025-04-01 19:00:30'),
(57, '8806280465081', '0', '2025-04-01 19:15:26'),
(58, '0811301180089', '1', '2025-04-01 19:18:59'),
(59, '0811301180089', '0', '2025-04-01 19:19:42'),
(60, '0811301180089', '1', '2025-04-01 19:23:53'),
(61, '0811301180089', '0', '2025-04-01 19:26:33'),
(62, '8806280465081', '1', '2025-04-02 09:42:42'),
(63, '8806280465081', '0', '2025-04-02 18:14:20'),
(64, '8806280465081', '1', '2025-04-03 09:15:30'),
(65, '8806280465081', '1', '2025-04-04 08:28:59'),
(66, '0811301180089', '1', '2025-04-04 08:47:26'),
(67, '0811301180089', '0', '2025-04-04 08:47:43'),
(68, '8806280465081', '1', '2025-04-04 08:48:13'),
(69, '8806280465081', '0', '2025-04-04 17:22:03'),
(70, '8806280465081', '0', '2025-04-05 13:40:29'),
(71, '8806280465081', '1', '2025-04-07 13:28:22'),
(72, '8806280465081', '0', '2025-04-07 13:41:04'),
(73, '8806280465081', '1', '2025-04-08 10:10:24'),
(74, '8806280465081', '1', '2025-04-09 23:57:37'),
(75, '8806280465081', '0', '2025-04-10 06:57:33'),
(76, '0811301180089', '1', '2025-04-10 06:58:26'),
(77, '0811301180089', '1', '2025-04-10 06:58:26'),
(78, '0811301180089', '0', '2025-04-10 07:02:57'),
(79, '8806280465081', '1', '2025-04-10 07:03:38'),
(80, '8806280465081', '0', '2025-04-10 12:07:30'),
(81, '8806280465081', '1', '2025-04-10 17:16:40'),
(82, '8806280465081', '0', '2025-04-10 17:30:02'),
(83, '8806280465081', '1', '2025-04-10 17:39:25'),
(84, '8806280465081', '1', '2025-04-10 22:36:33'),
(85, '8806280465081', '0', '2025-04-10 23:23:38'),
(86, '8806280465081', '1', '2025-04-10 23:31:10'),
(87, '8806280465081', '0', '2025-04-10 23:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notifications`
--

CREATE TABLE `teacher_notifications` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `learner_id` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_notifications`
--

INSERT INTO `teacher_notifications` (`id`, `teacher_id`, `learner_id`, `subject_id`, `grade_id`, `message`, `status`, `date_time`) VALUES
(1, '8806280465081', '0009156309081', 22, 5, '<p>We do have a test today</p>\r\n Computer Science exam scope', 1, '2025-03-25 12:06:05'),
(2, '8806280465081', '0009156309081', 22, 5, '<p>The class is removed to friday</p>\r\n Computer Science announcements', 1, '2025-03-25 12:11:24'),
(3, '8806280465081', '0009156309081', 22, 5, 'Assignment 3 Computer Science announcements', 1, '2025-03-25 12:16:16'),
(4, '8806280465081', '0009156309081', 22, 5, ' Computer Science announcements', 1, '2025-03-25 12:22:48'),
(5, '8806280465081', '0009156309081', 22, 5, '<p>Class and Objects In java</p>\r\n Computer Science lesson', 1, '2025-03-25 12:27:57'),
(6, '8806280465081', '0009156309081', 22, 5, ' Computer Science lesson', 1, '2025-03-25 12:33:18'),
(11, '8806280465081', '0009156309081', 22, 5, 'Final mark is updated in Computer Science', 1, '2025-03-25 13:25:44'),
(12, '8806280465081', '0009156309081', 22, 5, 'Final mark is updated in Computer Science', 1, '2025-03-25 13:27:27'),
(13, '8806280465081', '0009156309081', 22, 5, 'Class Test final mark is updated in Computer Science', 0, '2025-03-25 13:29:05'),
(14, '8806280465081', '0009156309081', 22, 5, 'Class Test final mark is updated in Computer Science', 0, '2025-03-25 13:29:19'),
(15, '8806280465081', '0009156309081', 22, 5, 'Assignment final mark is updated in Computer Science', 1, '2025-03-25 13:31:12'),
(16, '8806280465081', '0009156309081', 22, 5, 'Final mark is updated in Computer Science', 1, '2025-03-25 13:31:35'),
(17, '8806280465081', '0009156309081', 22, 5, '<p>Tomorrow you will have you script for the class test wrote in class</p>\r\n Computer Science announcements', 0, '2025-03-25 14:06:42'),
(18, '8806280465081', '0101275989081', 22, 5, '<p>Tomorrow you will have you script for the class test wrote in class</p>\r\n Computer Science announcements', 1, '2025-03-25 14:06:42'),
(19, '8806280465081', '0009156309081', 22, 5, '<p>We dont have a class today and tomorrow</p>\r\n Computer Science announcements', 0, '2025-03-25 16:19:59'),
(20, '8806280465081', '0101275989081', 22, 5, '<p>We dont have a class today and tomorrow</p>\r\n Computer Science announcements', 0, '2025-03-25 16:20:01'),
(21, '8806280465081', '0009156309081', 22, 5, '<p>Exam is start on the 1st for April 2025</p>\r\n Computer Science exam scope', 0, '2025-03-25 16:20:36'),
(22, '8806280465081', '0101275989081', 22, 5, '<p>Exam is start on the 1st for April 2025</p>\r\n Computer Science exam scope', 0, '2025-03-25 16:20:36'),
(23, '8806280465081', '0009156309081', 22, 5, 'Class Test final mark is updated in Computer Science', 0, '2025-03-29 16:24:14'),
(24, '8806280465081', '0101275989081', 22, 5, 'Class Test final mark is updated in Computer Science', 0, '2025-03-29 16:24:14'),
(25, '0811301180089', '1201016997085', 32, 1, '<p>How gears work</p>\r\n Technology lesson', 0, '2025-04-01 19:24:41'),
(26, '0811301180089', '1201016997085', 32, 1, '<p>We have class test tomorrow</p>\r\n Technology exam scope', 0, '2025-04-01 19:25:08'),
(27, '8806280465081', '0009156309081', 22, 5, 'Final mark is updated in Computer Science', 0, '2025-04-10 23:48:49'),
(28, '8806280465081', '0101275989081', 22, 5, 'Final mark is updated in Computer Science', 0, '2025-04-10 23:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_result`
--

CREATE TABLE `teacher_result` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `report_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `term_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term_name`) VALUES
(1, 'Term 1'),
(2, 'Term 2'),
(3, 'Term 3'),
(4, 'Term 4');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(13) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `admin_id`, `grade_id`, `content`, `date_time`) VALUES
(1, '8806280465081', 5, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Date &amp;Time</td>\r\n			<td>Monday</td>\r\n			<td>Tuesday</td>\r\n			<td>Wedsnaday</td>\r\n			<td>Thursday</td>\r\n			<td>Friday</td>\r\n		</tr>\r\n		<tr>\r\n			<td>09:00</td>\r\n			<td>CS</td>\r\n			<td>LO</td>\r\n			<td>MATH</td>\r\n			<td>ENGLISH</td>\r\n			<td>DRAMA</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10:00</td>\r\n			<td>MATH</td>\r\n			<td>DRAMA</td>\r\n			<td>CS</td>\r\n			<td>LO</td>\r\n			<td>ISIZUL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>BREAK</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10:45</td>\r\n			<td>LO</td>\r\n			<td>MATH</td>\r\n			<td>LO</td>\r\n			<td>DRAMA</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '2025-03-21 14:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `teacher_id`, `subject_id`, `grade_id`, `content`, `date_time`) VALUES
(4, '8806280465081', 22, 5, '<p>Programming Language</p>\r\n', '2025-03-23 12:06:57'),
(5, '811301180089', 32, 1, '<p>Gears</p>\r\n', '2025-04-01 19:24:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idno` (`idno`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `exam_scope`
--
ALTER TABLE `exam_scope`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learner`
--
ALTER TABLE `learner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idno` (`idno`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `learner_admission`
--
ALTER TABLE `learner_admission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idno` (`idno`);

--
-- Indexes for table `learner_assignment`
--
ALTER TABLE `learner_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `learner_class_test`
--
ALTER TABLE `learner_class_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `learner_class_test_score`
--
ALTER TABLE `learner_class_test_score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `learner_documents`
--
ALTER TABLE `learner_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `learner_log`
--
ALTER TABLE `learner_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `lesson_content`
--
ALTER TABLE `lesson_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `lesson_documents`
--
ALTER TABLE `lesson_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `lesson_content_id` (`lesson_content_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `lesson_video`
--
ALTER TABLE `lesson_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `lesson_content_id` (`lesson_content_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `online_class_test`
--
ALTER TABLE `online_class_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `online_class_test_details`
--
ALTER TABLE `online_class_test_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_id` (`test_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `online_quiz`
--
ALTER TABLE `online_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `online_quiz_details`
--
ALTER TABLE `online_quiz_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_id` (`test_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idno` (`idno`);

--
-- Indexes for table `parent_guardian`
--
ALTER TABLE `parent_guardian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `learner_id` (`learner_id`);

--
-- Indexes for table `parent_log`
--
ALTER TABLE `parent_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `parent_notifications`
--
ALTER TABLE `parent_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `learner_id` (`learner_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `learner_id` (`learner_id`);

--
-- Indexes for table `school_announcements`
--
ALTER TABLE `school_announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`);

--
-- Indexes for table `subject_final_mark`
--
ALTER TABLE `subject_final_mark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `learner_id` (`learner_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subject_overview`
--
ALTER TABLE `subject_overview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idno` (`idno`),
  ADD KEY `grade_id` (`grade_id`);

--
-- Indexes for table `teacher_admission`
--
ALTER TABLE `teacher_admission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idno` (`idno`);

--
-- Indexes for table `teacher_assignment`
--
ALTER TABLE `teacher_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `teacher_class_test`
--
ALTER TABLE `teacher_class_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `teacher_documents`
--
ALTER TABLE `teacher_documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_log`
--
ALTER TABLE `teacher_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_notifications`
--
ALTER TABLE `teacher_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `learner_id` (`learner_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `teacher_result`
--
ALTER TABLE `teacher_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `exam_scope`
--
ALTER TABLE `exam_scope`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `learner`
--
ALTER TABLE `learner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `learner_admission`
--
ALTER TABLE `learner_admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `learner_assignment`
--
ALTER TABLE `learner_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learner_class_test`
--
ALTER TABLE `learner_class_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learner_class_test_score`
--
ALTER TABLE `learner_class_test_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learner_documents`
--
ALTER TABLE `learner_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `learner_log`
--
ALTER TABLE `learner_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `lesson_content`
--
ALTER TABLE `lesson_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lesson_documents`
--
ALTER TABLE `lesson_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lesson_video`
--
ALTER TABLE `lesson_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `online_class_test`
--
ALTER TABLE `online_class_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `online_class_test_details`
--
ALTER TABLE `online_class_test_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `online_quiz`
--
ALTER TABLE `online_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_quiz_details`
--
ALTER TABLE `online_quiz_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parent_guardian`
--
ALTER TABLE `parent_guardian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parent_log`
--
ALTER TABLE `parent_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `parent_notifications`
--
ALTER TABLE `parent_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_announcements`
--
ALTER TABLE `school_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `subject_final_mark`
--
ALTER TABLE `subject_final_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_overview`
--
ALTER TABLE `subject_overview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_admission`
--
ALTER TABLE `teacher_admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_assignment`
--
ALTER TABLE `teacher_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_class_test`
--
ALTER TABLE `teacher_class_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_documents`
--
ALTER TABLE `teacher_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_log`
--
ALTER TABLE `teacher_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `teacher_notifications`
--
ALTER TABLE `teacher_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `teacher_result`
--
ALTER TABLE `teacher_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD CONSTRAINT `admin_log_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcements_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `exam_scope`
--
ALTER TABLE `exam_scope`
  ADD CONSTRAINT `exam_scope_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_scope_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learner`
--
ALTER TABLE `learner`
  ADD CONSTRAINT `learner_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `learner_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `learner_ibfk_3` FOREIGN KEY (`idno`) REFERENCES `learner_admission` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `learner_assignment`
--
ALTER TABLE `learner_assignment`
  ADD CONSTRAINT `learner_assignment_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `learner_assignment_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learner_class_test`
--
ALTER TABLE `learner_class_test`
  ADD CONSTRAINT `learner_class_test_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `learner_class_test_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learner_class_test_score`
--
ALTER TABLE `learner_class_test_score`
  ADD CONSTRAINT `learner_class_test_score_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `learner_class_test_score_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learner_documents`
--
ALTER TABLE `learner_documents`
  ADD CONSTRAINT `learner_documents_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `learner_admission` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `learner_log`
--
ALTER TABLE `learner_log`
  ADD CONSTRAINT `learner_log_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_content`
--
ALTER TABLE `lesson_content`
  ADD CONSTRAINT `lesson_content_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_content_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_content_ibfk_3` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_documents`
--
ALTER TABLE `lesson_documents`
  ADD CONSTRAINT `lesson_documents_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_documents_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_documents_ibfk_3` FOREIGN KEY (`lesson_content_id`) REFERENCES `lesson_content` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_documents_ibfk_4` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_video`
--
ALTER TABLE `lesson_video`
  ADD CONSTRAINT `lesson_video_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_video_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_video_ibfk_3` FOREIGN KEY (`lesson_content_id`) REFERENCES `lesson_content` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_video_ibfk_4` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `online_class_test`
--
ALTER TABLE `online_class_test`
  ADD CONSTRAINT `online_class_test_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `online_class_test_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `online_class_test_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `online_class_test_details` (`test_id`) ON DELETE CASCADE;

--
-- Constraints for table `online_class_test_details`
--
ALTER TABLE `online_class_test_details`
  ADD CONSTRAINT `online_class_test_details_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `online_class_test_details_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `online_quiz`
--
ALTER TABLE `online_quiz`
  ADD CONSTRAINT `online_quiz_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `online_quiz_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `online_quiz_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `online_quiz_details` (`test_id`) ON DELETE CASCADE;

--
-- Constraints for table `online_quiz_details`
--
ALTER TABLE `online_quiz_details`
  ADD CONSTRAINT `online_quiz_details_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `online_quiz_details_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_guardian`
--
ALTER TABLE `parent_guardian`
  ADD CONSTRAINT `parent_guardian_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `learner_admission` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `parent_log`
--
ALTER TABLE `parent_log`
  ADD CONSTRAINT `parent_log_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `parent_notifications`
--
ALTER TABLE `parent_notifications`
  ADD CONSTRAINT `parent_notifications_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`idno`) ON DELETE CASCADE,
  ADD CONSTRAINT `parent_notifications_ibfk_2` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`idno`) ON DELETE CASCADE,
  ADD CONSTRAINT `parent_notifications_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parent_notifications_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_announcements`
--
ALTER TABLE `school_announcements`
  ADD CONSTRAINT `school_announcements_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_final_mark`
--
ALTER TABLE `subject_final_mark`
  ADD CONSTRAINT `subject_final_mark_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`idno`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_final_mark_ibfk_2` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`idno`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_final_mark_ibfk_3` FOREIGN KEY (`term_id`) REFERENCES `term` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_final_mark_ibfk_4` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_final_mark_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_overview`
--
ALTER TABLE `subject_overview`
  ADD CONSTRAINT `subject_overview_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`idno`) REFERENCES `teacher_admission` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_assignment`
--
ALTER TABLE `teacher_assignment`
  ADD CONSTRAINT `teacher_assignment_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_assignment_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_class_test`
--
ALTER TABLE `teacher_class_test`
  ADD CONSTRAINT `teacher_class_test_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_class_test_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_documents`
--
ALTER TABLE `teacher_documents`
  ADD CONSTRAINT `teacher_documents_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_admission` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_log`
--
ALTER TABLE `teacher_log`
  ADD CONSTRAINT `teacher_log_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_notifications`
--
ALTER TABLE `teacher_notifications`
  ADD CONSTRAINT `teacher_notifications_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`idno`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_notifications_ibfk_2` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`idno`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_notifications_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_notifications_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_result`
--
ALTER TABLE `teacher_result`
  ADD CONSTRAINT `teacher_result_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_result_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`idno`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
