-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 09:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mercskyafrica`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_sessions`
--

CREATE TABLE `academic_sessions` (
  `session_id` int(11) NOT NULL,
  `session_title` varchar(255) NOT NULL,
  `starting_from` date NOT NULL,
  `ending_on` date NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_sessions`
--

INSERT INTO `academic_sessions` (`session_id`, `session_title`, `starting_from`, `ending_on`, `last_update`) VALUES
(1, 'Term 1', '2019-01-07', '2019-04-05', '2019-03-25 20:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `business_contacts`
--

CREATE TABLE `business_contacts` (
  `contact_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_contacts`
--

INSERT INTO `business_contacts` (`contact_id`, `firstname`, `lastname`, `phone`, `email`, `created_at`) VALUES
(1, 'Solomon', 'Maithya', '254704400725', 'maithyakavyu@outlook.com', '2019-03-04 09:17:31'),
(2, 'Samuel', 'Macharia', '+254704400725', 'maithyakavyu@outlook.com', '2019-03-04 13:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_code`, `class_name`, `created_at`) VALUES
(1, 'F1', 'Form One', '2019-03-22 09:23:35'),
(2, 'F2', 'Form Two', '2019-03-22 09:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `duty_rota`
--

CREATE TABLE `duty_rota` (
  `duty_id` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duty_rota`
--

INSERT INTO `duty_rota` (`duty_id`, `teacher`, `start_date`, `end_date`, `session`) VALUES
(2, 3, '2019-05-05', '2019-05-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events_calendar`
--

CREATE TABLE `events_calendar` (
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `venue` varchar(255) NOT NULL,
  `event_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_calendar`
--

INSERT INTO `events_calendar` (`event_id`, `title`, `description`, `start_date`, `start_time`, `end_date`, `end_time`, `venue`, `event_type`, `created_by`, `created_at`) VALUES
(1, 'School Academic Day', 'School Academic Day', '2019-03-22', '07:30:00', '2019-03-23', '14:00:00', 'Thokoa Primary', 4, 3, '2019-03-22 13:11:28'),
(2, 'School Academic Day', 'School Academic Day', '2019-03-25', '09:00:00', '2019-02-25', '16:00:00', 'Thokoa Primary', 4, 3, '2019-03-22 13:25:00'),
(3, 'School Academic Day', 'School Academic Day', '2019-03-25', '09:00:00', '2019-02-25', '16:00:00', 'Thokoa Primary', 4, 3, '2019-03-22 13:25:30'),
(4, 'School Academic Day', 'School Academic Day', '2019-03-25', '09:00:00', '2019-02-25', '16:00:00', 'Thokoa Primary', 4, 3, '2019-03-22 13:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `event_type_id` int(11) NOT NULL,
  `event_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`event_type_id`, `event_type_name`) VALUES
(1, 'School Openning Day'),
(2, 'School Closing Day'),
(3, 'Visiting Day'),
(4, 'Academic Day');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `marks_scored` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `updated_by` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`result_id`, `student_id`, `session_id`, `subject_id`, `marks_scored`, `grade`, `remarks`, `updated_by`, `last_update`) VALUES
(5, 1, 1, 1, 23, 'A', 'Well done', 3, '2019-03-25 20:36:11'),
(6, 1, 1, 2, 45, 'A', 'Well done', 3, '2019-03-25 20:36:11'),
(7, 1, 1, 3, 67, 'A', 'Well done', 3, '2019-03-25 20:36:11'),
(8, 1, 1, 4, 78, 'A', 'Well done', 3, '2019-03-25 20:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `context` text,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `recipient`, `title`, `message`, `context`, `status`, `timestamp`) VALUES
(1, 3, '+254704400725', 'Project Management', 'Hi Sindy, I just wanted to let you know that project is finished and I\'m waiting for your approval.', 'Hi Sindy, I just wanted to let you know that project is finished and I\'m waiting for your approval.', 1, '2019-02-21 13:53:11'),
(2, 3, '+254704400725', 'Reply', 'Thanks for choosing my offer. I will start working on your project tomorrow.', NULL, 1, '2019-02-21 13:53:11'),
(3, 3, 'Solomon', 'Group SMS', 'Solomon', NULL, 1, '2019-03-05 14:14:30'),
(4, 1, '254704400725', 'Group SMS', 'Hello Migwani Secondary School, Please renew your SMS subscription to avoid disconnection', NULL, 1, '2019-03-27 09:23:08'),
(5, 1, '+254704400725', 'Group SMS', 'Hello Migwani Secondary School, Please renew your SMS subscription to avoid disconnection', NULL, 1, '2019-03-27 09:32:27'),
(6, 1, '+254704400725', 'Group SMS', 'Hello Migwani Secondary School, Please renew your SMS subscription to avoid disconnection', NULL, 1, '2019-03-27 09:33:27'),
(7, 1, '+254704400725', 'Individual SMS', 'Hello Migwani Secondary School, Please renew your SMS subscription to avoid disconnection', NULL, 1, '2019-03-27 09:53:23'),
(8, 1, '+254704400725', 'Individual SMS', 'Hello Migwani Secondary School, Please renew your SMS subscription to avoid disconnection', NULL, 1, '2019-03-27 12:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notication` text NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `recipient`, `sender`, `type`, `title`, `notication`, `status`, `timestamp`) VALUES
(1, 1, 1, 'Alert', 'New Application', 'New job application has been submitted', 1, '2019-02-21 09:37:20'),
(2, 1, 1, 'Alert', 'Interview Invitation', 'You have been invited for an interview', 1, '2019-02-21 09:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `first_name`, `last_name`, `phone`, `email`, `gender`, `relationship`, `timestamp`) VALUES
(1, 'Kavyu', 'Kanga', '+254704400725', 'maithyakavyu@outlook.com', 'Male', 'Father', '2019-02-28 09:59:15'),
(2, 'Kavyu', 'Kanga', '+254704400725', NULL, NULL, 'Father', '2019-03-22 09:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_cat_id` int(11) NOT NULL,
  `amount_paid` double NOT NULL,
  `balance` double NOT NULL,
  `payee_id` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `payment_method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_cat_id`, `amount_paid`, `balance`, `payee_id`, `payment_date`, `last_update`, `updated_by`, `reference_number`, `payment_method`) VALUES
(2, 1, 25000, 2400, 1, '2019-03-22 10:27:27', '0000-00-00 00:00:00', 3, 'NQW356RBF', 4),
(3, 1, 2000, 400, 1, '2019-03-22 11:04:30', '0000-00-00 00:00:00', 3, 'NQW356RBT', 4),
(5, 1, 200, 200, 1, '2019-03-22 11:06:40', '0000-00-00 00:00:00', 3, 'NQW356RBA', 4),
(6, 2, 2000, 4000, 1, '2019-03-22 14:21:26', '0000-00-00 00:00:00', 3, 'NXW356RBA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_categories`
--

CREATE TABLE `payment_categories` (
  `payment_cat_id` int(11) NOT NULL,
  `payment_title` varchar(255) NOT NULL,
  `payment_decription` text NOT NULL,
  `amount` double NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_categories`
--

INSERT INTO `payment_categories` (`payment_cat_id`, `payment_title`, `payment_decription`, `amount`, `last_update`) VALUES
(1, 'Tuition Fees', 'Tuition Fees', 27400, '2019-03-22 08:22:02'),
(2, 'Examination Fees', 'Examination Fees', 6000, '2019-03-22 08:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_method_id`, `payment_method`) VALUES
(1, 'CASH'),
(2, 'MPESA'),
(3, 'CHEQUE'),
(4, 'Bankers Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `stream_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stream_code` varchar(255) NOT NULL,
  `stream_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`stream_id`, `class_id`, `stream_code`, `stream_name`, `created_at`) VALUES
(1, 1, 'F1N', 'Form One North', '2019-03-22 09:24:37'),
(2, 2, 'F2N', 'Form Two North', '2019-03-22 09:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `stream` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `admission_no`, `first_name`, `last_name`, `class`, `stream`, `parent`, `gender`, `timestamp`) VALUES
(1, 'N11/31013/13', 'Solomon', 'Maithya', 1, 1, 2, '', '2019-03-22 09:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `student_attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`student_attendance_id`, `student_id`, `date`, `time`, `last_update`, `updated_by`) VALUES
(2, 1, '2019-03-26', '15:12:12', '2019-03-26 08:33:53', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `student_subject_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`student_subject_id`, `subject_id`, `student_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_code`) VALUES
(1, 'Mathematics', 'MATH'),
(2, 'ENGLISH', 'ENG'),
(3, 'KISWAHILI', 'KIS'),
(4, 'SCIENCE', 'SCI'),
(5, 'SOCIAL STUDIES', 'S/S');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `sub_id` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `amount` double NOT NULL,
  `sms_quantity` int(11) NOT NULL,
  `used_sms` int(11) NOT NULL,
  `remaining_sms` int(11) NOT NULL,
  `bought_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastly_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`sub_id`, `owner`, `amount`, `sms_quantity`, `used_sms`, `remaining_sms`, `bought_on`, `lastly_updated`) VALUES
(3, 7, 5000, 10000, 0, 10000, '2019-03-27 09:50:15', '0000-00-00 00:00:00'),
(4, 1, 5000, 10000, 0, 10000, '2019-03-27 09:53:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `student_attendance_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`student_attendance_id`, `teacher_id`, `date`, `time`, `last_update`, `updated_by`) VALUES
(1, 1, '2019-03-26', '13:00:00', '2019-03-26 09:09:03', 3),
(2, 7, '2019-03-20', '13:00:00', '2019-03-26 09:09:03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `tid` int(11) NOT NULL,
  `stream` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`tid`, `stream`, `subject`, `teacher`, `start_time`, `end_time`, `day`, `created_at`) VALUES
(1, 1, 1, 3, '8:30 AM', '9:30 AM', 'Monday', '2019-04-14 18:14:09'),
(2, 1, 2, 7, '9:30 AM', '10:30 AM', 'Tuesday', '2019-04-14 18:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `organization`, `firstname`, `lastname`, `phone`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'Merc Sky Africa', 'Samuel', 'Machira', '0704400725', 'zOKsERzbKhUegmJWLGLorcvJ545uFKl9', '$2y$13$f12Sok0VkX5wd4vPwdoFk.5GoSpxaegwAo.cYnFSRrrfCR33ctXRS', NULL, 'maithyakavyu@outlook.com', 10, 'Superadmin', 1550741771, 1553117964),
(3, 'david', 'Migwani Secondary School', 'David', 'Mutie', '0704400725', 'h6-8X5KAXdZWUPNt8HxhxWMAj7FPJuKS', '$2y$13$f12Sok0VkX5wd4vPwdoFk.5GoSpxaegwAo.cYnFSRrrfCR33ctXRS', NULL, 'solo.maithya@gmail.com', 10, 'Teacher', 1551171787, 1551171787),
(7, 'Mutiso', 'Migwani Secondary School', 'Robert', 'Mutiso', '+254704400725', '9YDFkSlaA20YqgTXxkidqv5QN48Aj7an', '$2y$13$lI9pV04gjDAobwXE4sQxnuStPFe/fCNe.BIGApDEcq0UD/vMa/BfW', NULL, 'maithya@gmail.com', 10, 'Organization', 1553263803, 1553674398);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `business_contacts`
--
ALTER TABLE `business_contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `duty_rota`
--
ALTER TABLE `duty_rota`
  ADD PRIMARY KEY (`duty_id`),
  ADD KEY `session` (`session`);

--
-- Indexes for table `events_calendar`
--
ALTER TABLE `events_calendar`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `event_type` (`event_type`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`event_type_id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipient` (`recipient`),
  ADD KEY `sender` (`sender`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipient` (`recipient`),
  ADD KEY `sender` (`sender`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payee_id` (`payee_id`),
  ADD KEY `payment_cat_id` (`payment_cat_id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `payment_method` (`payment_method`);

--
-- Indexes for table `payment_categories`
--
ALTER TABLE `payment_categories`
  ADD PRIMARY KEY (`payment_cat_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`stream_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `stream` (`stream`),
  ADD KEY `parent` (`parent`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`student_attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`student_subject_id`),
  ADD KEY `student_subjects_ibfk_1` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`student_attendance_id`),
  ADD KEY `student_id` (`teacher_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `timetable_ibfk_1` (`stream`),
  ADD KEY `subject` (`subject`),
  ADD KEY `teacher` (`teacher`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_contacts`
--
ALTER TABLE `business_contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `duty_rota`
--
ALTER TABLE `duty_rota`
  MODIFY `duty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events_calendar`
--
ALTER TABLE `events_calendar`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `event_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_categories`
--
ALTER TABLE `payment_categories`
  MODIFY `payment_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `stream_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `student_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `student_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `student_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `duty_rota`
--
ALTER TABLE `duty_rota`
  ADD CONSTRAINT `duty_rota_ibfk_1` FOREIGN KEY (`session`) REFERENCES `academic_sessions` (`session_id`);

--
-- Constraints for table `events_calendar`
--
ALTER TABLE `events_calendar`
  ADD CONSTRAINT `events_calendar_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_calendar_ibfk_2` FOREIGN KEY (`event_type`) REFERENCES `event_types` (`event_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD CONSTRAINT `exam_results_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `academic_sessions` (`session_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_results_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_results_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_results_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`sender`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`recipient`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`sender`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`payee_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`payment_cat_id`) REFERENCES `payment_categories` (`payment_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_4` FOREIGN KEY (`payment_method`) REFERENCES `payment_methods` (`payment_method_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `streams`
--
ALTER TABLE `streams`
  ADD CONSTRAINT `streams_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`stream`) REFERENCES `streams` (`stream_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `parents` (`parent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`class`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_attendance_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD CONSTRAINT `student_subjects_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD CONSTRAINT `teacher_attendance_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_attendance_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`stream`) REFERENCES `streams` (`stream_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`teacher`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
