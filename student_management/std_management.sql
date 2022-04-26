-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 03:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `std_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `role_user` varchar(255) DEFAULT NULL,
  `id_user` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration_installment`
--

CREATE TABLE `registration_installment` (
  `id` int(11) NOT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `regist_detail_id` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `installment_status` int(11) NOT NULL,
  `installment_no` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration_detail`
--

CREATE TABLE `registration_detail` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `regist_date` date DEFAULT NULL,
  `regist_payment_method` varchar(255) DEFAULT NULL COMMENT 'payment_method',
  `class` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `regist_status` varchar(255) DEFAULT NULL,
  `activity_status` int(11) NOT NULL DEFAULT 0,
  `activity_fee` int(11) DEFAULT 0,
  `activity_date` date DEFAULT NULL,
  `activity_payment_proof_confirm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(11) NOT NULL,
  `nip` char(7) DEFAULT NULL,
  `lecturer_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `id` int(11) NOT NULL,
  `day_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`id`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `day_id` int(11) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `class` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_code` char(5) NOT NULL DEFAULT '',
  `subject_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_code`, `subject_name`) VALUES
('P0001', 'Database System'),
('P0002', 'Coding and Big Data'),
('P0003', 'Integrative Survival Experience'),
('P0004', 'Object Oriented and Visual Programming'),
('P0005', 'Psychology and Design Thinking'),
('P0006', 'Emotional Intelligence'),
('P0007', 'Digital Literacy'),
('P0008', 'Computing Career'),
('P0009', 'Web Programming'),
('P0010', 'Statistic');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_payment`
--

CREATE TABLE `tuition_payment` (
  `id` int(11) NOT NULL,
  `tuition_payment_date` date DEFAULT NULL,
  `installment_no` int(11) NOT NULL,
  `tuition_status` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nick_name` varchar(50) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `child_no` int(11) DEFAULT NULL,
  `number_of_sibling` int(11) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `birth_place_father` varchar(255) DEFAULT NULL,
  `birth_date_father` date DEFAULT NULL,
  `father_last_education` varchar(50) DEFAULT NULL,
  `father_job` varchar(255) DEFAULT NULL,
  `father_religion` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `birth_place_mother` varchar(255) DEFAULT NULL,
  `birth_date_mother` date DEFAULT NULL,
  `mother_last_education` varchar(255) DEFAULT NULL,
  `mother_job` varchar(255) DEFAULT NULL,
  `mother_religion` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `upload_birth_certificate` varchar(255) DEFAULT NULL,
  `upload_family_card` varchar(255) DEFAULT NULL,
  `child_photo` varchar(255) DEFAULT NULL,
  `family_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` char(6) NOT NULL DEFAULT '0',
  `class` varchar(255) DEFAULT NULL,
  `regist_detail_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `registration_installment`
--
ALTER TABLE `registration_installment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regist_detail_id` (`regist_detail_id`);

--
-- Indexes for table `registration_detail`
--
ALTER TABLE `registration_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `day_id` (`day_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `tuition_payment`
--
ALTER TABLE `tuition_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `registration_installment`
--
ALTER TABLE `registration_installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `registration_detail`
--
ALTER TABLE `registration_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tuition_payment`
--
ALTER TABLE `tuition_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registration_installment`
--
ALTER TABLE `registration_installment`
  ADD CONSTRAINT `registration_installment_ibfk_1` FOREIGN KEY (`regist_detail_id`) REFERENCES `registration_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registration_detail`
--
ALTER TABLE `registration_detail`
  ADD CONSTRAINT `registration_detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_detail_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
