-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2016 at 01:51 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `aid` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`aid`, `class_id`, `title`, `description`, `uploaded_by`, `uploaded_date`) VALUES
(1, 2, 'nice', 'nic', 4, '2016-12-29 19:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_tbl`
--

CREATE TABLE `assignment_tbl` (
  `assignment_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `docs` varchar(350) DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_tbl`
--

INSERT INTO `assignment_tbl` (`assignment_id`, `class_id`, `subject_id`, `docs`, `uploaded_by`) VALUES
(1, 2, 1, 'Quiz.zip', 4);

-- --------------------------------------------------------

--
-- Table structure for table `calender_class`
--

CREATE TABLE `calender_class` (
  `cid` int(11) NOT NULL,
  `date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `destails` varchar(250) NOT NULL,
  `uploaded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calender_school`
--

CREATE TABLE `calender_school` (
  `cid` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calender_school`
--

INSERT INTO `calender_school` (`cid`, `date`, `description`) VALUES
(1, '2016-12-29', 'nice ');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`) VALUES
(2, 'BTECH');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `body` varchar(500) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `from_user`, `to_user`, `subject`, `body`, `date_time`) VALUES
(1, 3, 3, 'hi', 'thanks', '2016-12-28 20:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_class` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`id`, `student_id`, `student_class`) VALUES
(1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `class_id`, `subject_name`) VALUES
(1, 2, 'PHP'),
(3, 2, '.NET');

-- --------------------------------------------------------

--
-- Table structure for table `subject_assigned`
--

CREATE TABLE `subject_assigned` (
  `sid` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE `teacher_tbl` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `teacher_class` int(11) DEFAULT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`id`, `teacher_id`, `teacher_class`, `subject_id`) VALUES
(1, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_attempt`
--

CREATE TABLE `test_attempt` (
  `tapid` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `answer` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_question`
--

CREATE TABLE `test_question` (
  `tq_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `a` varchar(150) NOT NULL,
  `b` varchar(150) NOT NULL,
  `c` varchar(150) NOT NULL,
  `d` varchar(150) NOT NULL,
  `correct_ans` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_question`
--

INSERT INTO `test_question` (`tq_id`, `test_id`, `question`, `a`, `b`, `c`, `d`, `correct_ans`) VALUES
(1, 1, 'Shubham', '1', 'w', '3', '12', 'A'),
(2, 1, 'Shubham', '1', 'w', '3', '12', 'A'),
(3, 1, 'lolo`', '1', '1', '1', '1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `test_tbl`
--

CREATE TABLE `test_tbl` (
  `test_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `quiz_name` varchar(220) NOT NULL,
  `uploaded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_tbl`
--

INSERT INTO `test_tbl` (`test_id`, `subject_id`, `quiz_name`, `uploaded_by`) VALUES
(1, 1, '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(150) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_login_id` varchar(110) DEFAULT NULL,
  `user_password` varchar(220) NOT NULL,
  `user_role` enum('admin','teacher','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_full_name`, `user_email`, `user_contact`, `user_login_id`, `user_password`, `user_role`) VALUES
(1, 'Admin', 'admin@lms.com', '8556093704', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'Shubham', 'aahah@gami.com', '8556086090', '11', '6512bd43d9caa6e02c990b0a82652dca', 'student'),
(4, 'AC', 'ac@gmail.com', '345678901', 'ac', 'e2075474294983e013ee4dd2201c7a73', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `uploaded_by` (`uploaded_by`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `assignment_tbl`
--
ALTER TABLE `assignment_tbl`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `calender_class`
--
ALTER TABLE `calender_class`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `uploaded_by` (`uploaded_by`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `calender_school`
--
ALTER TABLE `calender_school`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `from` (`from_user`),
  ADD KEY `to` (`to_user`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `student_class` (`student_class`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `subject_assigned`
--
ALTER TABLE `subject_assigned`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `teacher_class` (`teacher_class`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `test_attempt`
--
ALTER TABLE `test_attempt`
  ADD PRIMARY KEY (`tapid`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `test_question`
--
ALTER TABLE `test_question`
  ADD PRIMARY KEY (`tq_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `test_tbl`
--
ALTER TABLE `test_tbl`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assignment_tbl`
--
ALTER TABLE `assignment_tbl`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `calender_class`
--
ALTER TABLE `calender_class`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `calender_school`
--
ALTER TABLE `calender_school`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subject_assigned`
--
ALTER TABLE `subject_assigned`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test_attempt`
--
ALTER TABLE `test_attempt`
  MODIFY `tapid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_question`
--
ALTER TABLE `test_question`
  MODIFY `tq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `test_tbl`
--
ALTER TABLE `test_tbl`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
