-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 05:21 AM
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
-- Database: `db_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `job_id` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `application_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`job_id`, `member_id`, `application_date`, `status`) VALUES
('7', 'EDA-1', '07/26/2020', 'B'),
('8', 'EDA-1', '07/26/2020', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `application_history`
--

CREATE TABLE `application_history` (
  `job_id` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  `modified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `project_id` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `application_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`project_id`, `member_id`, `application_date`, `status`) VALUES
('1', 'EDA-1', '07/26/2020', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_history`
--

CREATE TABLE `beneficiary_history` (
  `project_id` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  `modified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `company_name` varchar(300) NOT NULL,
  `company_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `user_id`, `company_name`, `company_address`) VALUES
(1, '3', 'ABC WOODWORKZ INC.', 'DAGUPAN CITY, PANGASINAN'),
(2, '7', 'ABC DIGITAL SOLUTIONS', 'DAGUPAN CITY, PANGASINAN');

-- --------------------------------------------------------

--
-- Table structure for table `eda`
--

CREATE TABLE `eda` (
  `id` int(255) NOT NULL,
  `eda_id` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `previous_job` varchar(255) DEFAULT NULL,
  `skills` varchar(1000) DEFAULT NULL,
  `trainings_attended` varchar(255) DEFAULT NULL,
  `drug_type` varchar(1000) DEFAULT NULL,
  `four_p` varchar(255) DEFAULT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eda`
--

INSERT INTO `eda` (`id`, `eda_id`, `lastname`, `firstname`, `middlename`, `birthdate`, `gender`, `address`, `contact_no`, `email_address`, `education`, `previous_job`, `skills`, `trainings_attended`, `drug_type`, `four_p`, `referral`, `picture`) VALUES
(1, 'EDA-1', 'DELA CRUZ', 'JUAN', 'MAKABAYAN', '1997-12-11', 'MALE', 'DAGUPAN CITY, PANGASINAN', '09123456789', 'jmdelacruz@gmail.com', 'ALS', 'Plant and machine operators and assemblers', 'Communication and interpersonal Skills,Social Skills,Teamwork,Time management,Leadership skills,Problem solving skills', '1-2', 'Amphetamines,Cannabis (Marijuana),Ecstasy,Cocaine,Methamphetamine (Shabu)', 'Yes', 'Yes', '../uploads/avatar5.png');

-- --------------------------------------------------------

--
-- Table structure for table `eda_answers`
--

CREATE TABLE `eda_answers` (
  `id` int(255) NOT NULL,
  `eda_id` varchar(255) NOT NULL,
  `q1` varchar(255) NOT NULL,
  `q2` varchar(255) NOT NULL,
  `q3` varchar(255) NOT NULL,
  `q4` varchar(255) NOT NULL,
  `q5` varchar(255) NOT NULL,
  `q6` varchar(255) NOT NULL,
  `q7` varchar(255) NOT NULL,
  `q8` varchar(255) NOT NULL,
  `q9` varchar(255) NOT NULL,
  `q10` varchar(255) NOT NULL,
  `domain1` varchar(255) NOT NULL,
  `domain2` varchar(255) NOT NULL,
  `domain3` varchar(255) NOT NULL,
  `domain4` varchar(255) NOT NULL,
  `domain5` varchar(255) NOT NULL,
  `interests` varchar(1000) NOT NULL,
  `created_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eda_answers`
--

INSERT INTO `eda_answers` (`id`, `eda_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `domain1`, `domain2`, `domain3`, `domain4`, `domain5`, `interests`, `created_on`) VALUES
(5, 'EDA-1', '5', '1', '7', '3', '5', '1', '7', '3', '5', '1', '3', '4', '5', '4', '3', 'A,B,C,D,E,F,G,I,J,M,N', '08/11/2020');

-- --------------------------------------------------------

--
-- Table structure for table `enrolee`
--

CREATE TABLE `enrolee` (
  `training_id` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `application_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolee`
--

INSERT INTO `enrolee` (`training_id`, `member_id`, `application_date`, `status`) VALUES
('3', 'EDA-1', '07/26/2020', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `enrolee_history`
--

CREATE TABLE `enrolee_history` (
  `training_id` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  `modified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `company_id` int(255) NOT NULL,
  `fimage` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `posted_on` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `domain` varchar(1000) NOT NULL,
  `skills` varchar(1000) NOT NULL,
  `education` varchar(1000) NOT NULL,
  `personality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `description`, `company_id`, `fimage`, `posted_by`, `posted_on`, `updated_on`, `updated_by`, `status`, `category`, `domain`, `skills`, `education`, `personality`) VALUES
(7, 'WOOD CRAFTER', '&lt;p&gt;sample description&lt;/p&gt;', 1, '../uploads/How-To-Be-A-Professional-Woodworker.jpg', 'abcwoodworkz', '07/26/2020', '07/26/2020', 'abcwoodworkz', 'show', 'JOB CATEGORY 1,JOB CATEGORY 2,JOB CATEGORY 3', 'Extroversion,Agreeableness,Conscientiousness,Emotional Stability,Openness', 'Communication and interpersonal Skills,Social Skills,Teamwork,Time management,Leadership skills', 'ALS,High school graduate', 'A,B,C,D,E'),
(8, 'WOOD ADMIN', '&lt;p&gt;sample description&lt;/p&gt;', 1, '../uploads/How-To-Be-A-Professional-Woodworker.jpg', 'abcwoodworkz', '07/26/2020', '', '', 'show', 'JOB CATEGORY 1,JOB CATEGORY 2,JOB CATEGORY 3', 'Extroversion,Agreeableness,Conscientiousness,Emotional Stability,Openness', 'Communication and interpersonal Skills,Social Skills,Teamwork,Time management,Leadership skills', 'ALS,High school graduate', 'A,B,C,D,E'),
(9, 'WEB DEVELOPER', '&lt;p&gt;A developer who can write HTML,CSS3&lt;/p&gt;', 2, '../uploads/photo2.png', 'abcds1', '07/27/2020', '', '', 'hide', 'JOB CATEGORY 1,JOB CATEGORY 2,JOB CATEGORY 3', 'Extroversion,Agreeableness,Conscientiousness,Emotional Stability,Openness', 'Communication and interpersonal Skills,Teamwork,Time management,Leadership skills,Problem solving skills', 'High school graduate,College undergraduate,College graduate', 'A,B,C,D,E');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_category`
--

CREATE TABLE `jobs_category` (
  `id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs_category`
--

INSERT INTO `jobs_category` (`id`, `category_name`) VALUES
(2, 'JOB CATEGORY 1'),
(3, 'JOB CATEGORY 2'),
(4, 'JOB CATEGORY 3');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `educational_attainment` varchar(255) NOT NULL,
  `work_status` varchar(255) NOT NULL,
  `seminar_attended` varchar(255) NOT NULL,
  `drug_type` varchar(255) NOT NULL,
  `rehab_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members1`
--

CREATE TABLE `members1` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `educational` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `elementary` varchar(255) NOT NULL,
  `yeargraduated_e` varchar(255) NOT NULL,
  `highschool` varchar(255) NOT NULL,
  `yeargraduated_hs` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `yeargraduated_c` varchar(255) NOT NULL,
  `vocational` varchar(255) NOT NULL,
  `yeargraduated_v` varchar(255) NOT NULL,
  `admissiondate` varchar(255) NOT NULL,
  `petitioner` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `p_cno` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `msws` varchar(255) NOT NULL,
  `problem` varchar(1000) NOT NULL,
  `work_status` varchar(255) NOT NULL,
  `seminars_attended` varchar(255) NOT NULL,
  `drug_type` varchar(255) NOT NULL,
  `rehab_no` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member_qualifications`
--

CREATE TABLE `member_qualifications` (
  `id` int(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `a1` varchar(255) NOT NULL,
  `a2` varchar(255) NOT NULL,
  `a3` varchar(255) NOT NULL,
  `a4` varchar(255) NOT NULL,
  `a5` varchar(255) NOT NULL,
  `a6` varchar(255) NOT NULL,
  `a7` varchar(255) NOT NULL,
  `a8` varchar(255) NOT NULL,
  `b1` varchar(255) NOT NULL,
  `b2` varchar(255) NOT NULL,
  `b3` varchar(255) NOT NULL,
  `b4` varchar(255) NOT NULL,
  `b5` varchar(255) NOT NULL,
  `b6` varchar(255) NOT NULL,
  `b7` varchar(255) NOT NULL,
  `c1` varchar(255) NOT NULL,
  `c2` varchar(255) NOT NULL,
  `c3` varchar(255) NOT NULL,
  `c4` varchar(255) NOT NULL,
  `c5` varchar(255) NOT NULL,
  `c6` varchar(255) NOT NULL,
  `d1` varchar(255) NOT NULL,
  `d2` varchar(255) NOT NULL,
  `d3` varchar(255) NOT NULL,
  `d4` varchar(255) NOT NULL,
  `d5` varchar(255) NOT NULL,
  `d6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `fimage` varchar(255) NOT NULL,
  `posted_on` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `fimage`, `posted_on`, `posted_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'FOOD KART', '&lt;p&gt;Lorem ipsum dolores estes&lt;/p&gt;', '../uploads/How-To-Be-A-Professional-Woodworker.jpg', '07/26/2020', 'dswd1', '', '', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `fimage` varchar(255) NOT NULL,
  `training_date` varchar(255) NOT NULL,
  `posted_on` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `skills` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `name`, `description`, `fimage`, `training_date`, `posted_on`, `posted_by`, `updated_on`, `updated_by`, `status`, `category`, `skills`) VALUES
(3, 'TRAINING 1', '&lt;p&gt;Lorem ipsum dolores estes&lt;/p&gt;', '../uploads/f245874ee25c8a7eb48e601945951e52.jpeg', '07/27/2020', '07/25/2020', 'tesda1', '07/26/2020', 'tesda1', 'open', 'TRAINING CATEGORY 1', 'Communication and interpersonal Skills,Social Skills,Teamwork,Time management,Leadership skills,Problem solving skills');

-- --------------------------------------------------------

--
-- Table structure for table `trainings_category`
--

CREATE TABLE `trainings_category` (
  `id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainings_category`
--

INSERT INTO `trainings_category` (`id`, `category_name`) VALUES
(2, 'TRAINING CATEGORY 1'),
(3, 'TRAINING CATEGORY 2'),
(4, 'TRAINING CATEGORY 3');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `isUpdated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `password`, `user_type`, `isUpdated`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', '1'),
(2, 'peso1', '12c6c8df8462c77b99257ae112ca68ec', 'PESO', '0'),
(3, 'abcwoodworkz', 'b9a6f1848019e4d2df17951cf68898f7', 'COMPANY', '0'),
(4, 'dswd1', '67f114399da3b5fc2ec3054624f4da5a', 'DSWD', '0'),
(5, 'tesda1', '98c1ecad1d62cd06e1550f58facbbee7', 'TESDA', '0'),
(6, 'EDA-1', 'f36e6d9335a5017df5c56aae00686ce2', 'USER', '0'),
(7, 'abcds1', '19bceefeb3c7933b4b30a425b4d326c6', 'COMPANY', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `user_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isProfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`user_id`, `image`, `isProfile`) VALUES
('2', '../uploads/avatar04.png', 'YES'),
('3', '../uploads/woodworking-logo-vintage_71835-209.jpg', 'YES'),
('4', '../uploads/avatar3.png', 'YES'),
('5', '../uploads/avatar2.png', 'YES'),
('7', '../uploads/avatar5.png', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` varchar(255) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `middlename` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `lastname`, `firstname`, `middlename`, `address`, `contact_no`, `email_address`) VALUES
('1', 'DELA CRUZ', 'JUAN', 'MAKABAYAN', 'DAGUPAN CITY, PANGASINAN', '09123456789', 'jmdelacruz@dtrc.gov.ph'),
('2', 'TUTAY', 'DOMINIQUE', 'R', 'MANILA, PHILIPPINES', '09123456789', 'tutaydom@peso.gov.ph'),
('3', 'ENIERGA', 'RENZ', 'BARLAAN', 'DAGUPAN CITY, PANGASINAN', '09123456789', 'sample@gmail.com'),
('4', 'GEAMALA', 'REBECCA', 'P.', 'MANILA, PHILIPPINES', '09123456789', 'geamalareb@dswd.gov.ph'),
('5', 'ISAAC', 'IRENE', 'A.', 'MANILA, PHILIPPINES', '09123456789', 'isaacire@tesda.gov.ph'),
('7', 'PERRERAS', 'ARJAY', 'EDADES', 'DAGUPAN CITY, PANGASINAN', '09123456789', 'arjayperreras@abcds.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `date`, `time`, `description`) VALUES
(0, '08/11/2020', '11:48:58 am', 'admin has logged out.'),
(5, '07/27/2020', '08:57:06 pm', 'admin has logged in.'),
(6, '07/27/2020', '08:57:42 pm', 'admin has logged out.'),
(7, '07/27/2020', '08:57:51 pm', 'admin has logged in.'),
(8, '07/27/2020', '09:05:39 pm', 'admin has logged out.'),
(9, '07/27/2020', '09:05:42 pm', 'admin has logged in.'),
(10, '07/27/2020', '09:52:57 pm', 'admin has logged out.'),
(11, '07/27/2020', '09:53:30 pm', 'admin has logged in.'),
(12, '07/27/2020', '09:56:35 pm', 'admin has logged out.'),
(13, '07/27/2020', '09:56:39 pm', 'peso1 has logged in.'),
(14, '07/27/2020', '09:57:47 pm', 'peso1 has logged out.'),
(15, '07/27/2020', '09:58:00 pm', 'abcwoodworkz has logged in.'),
(16, '07/27/2020', '09:58:37 pm', 'abcwoodworkz has logged out.'),
(17, '07/27/2020', '09:58:49 pm', 'tesda1 has logged in.'),
(18, '07/27/2020', '09:59:56 pm', 'tesda1 has logged out.'),
(19, '07/27/2020', '10:00:01 pm', 'dswd1 has logged in.'),
(20, '07/27/2020', '10:00:26 pm', 'dswd1 has logged out.'),
(21, '07/27/2020', '10:00:30 pm', 'EDA-1 has logged in.'),
(22, '08/11/2020', '11:49:09 am', 'EDA-1 has logged in.'),
(23, '08/11/2020', '12:15:41 pm', 'EDA-1 has logged out.'),
(24, '08/11/2020', '02:25:00 pm', 'EDA-1 has logged in.'),
(25, '08/11/2020', '02:25:25 pm', 'EDA-1 has logged out.'),
(26, '08/12/2020', '12:35:16 pm', 'admin has logged in.'),
(27, '08/12/2020', '12:48:02 pm', 'admin has logged out.'),
(28, '08/12/2020', '12:48:13 pm', 'admin has logged in.'),
(29, '08/12/2020', '12:48:41 pm', 'admin has logged out.'),
(30, '08/12/2020', '12:48:45 pm', 'EDA-1 has logged in.'),
(31, '08/12/2020', '01:19:58 pm', 'EDA-1 has logged in.'),
(32, '08/12/2020', '01:21:44 pm', 'EDA-1 has logged out.'),
(33, '08/12/2020', '01:21:49 pm', 'admin has logged in.'),
(34, '08/12/2020', '01:52:19 pm', 'admin has logged out.'),
(35, '08/12/2020', '01:59:33 pm', 'admin has logged in.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eda`
--
ALTER TABLE `eda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eda_answers`
--
ALTER TABLE `eda_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs_category`
--
ALTER TABLE `jobs_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members1`
--
ALTER TABLE `members1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_qualifications`
--
ALTER TABLE `member_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings_category`
--
ALTER TABLE `trainings_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eda`
--
ALTER TABLE `eda`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eda_answers`
--
ALTER TABLE `eda_answers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs_category`
--
ALTER TABLE `jobs_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members1`
--
ALTER TABLE `members1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_qualifications`
--
ALTER TABLE `member_qualifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainings_category`
--
ALTER TABLE `trainings_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
