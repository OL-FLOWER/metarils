-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 02:36 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ola`
--

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`) VALUES
(1, 'first'),
(2, 'second');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `stage_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `stage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(7, 'ola@yahoo.com', '123456', '', 'student'),
(9, 'pitbullali777@gmail.com', '123456', '', 'teacher'),
(10, 'pitbullali777@gmail.com', '123456', '', 'teacher'),
(11, 'pitbullali777@gmail.com', '123456', '', 'teacher'),
(12, 'pitbullali777@gmail.com', '123456', '', 'teacher'),
(13, 'aliahabeb007@gmail.com', '123456', '', 'student'),
(14, 'aliahabeb007@gmail.com', 'ali', '', 'student'),
(15, 'aliahabeb007@gmail.com', 'ali', '', 'student'),
(16, 'pitbullali777@gmail.com', '123456', '', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_user_fk` (`user_id`),
  ADD KEY `student_stage_fk` (`stage_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_stage_fk` (`stage_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_stage_fk` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subject_stage_fk` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teacher_subject_fk` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
