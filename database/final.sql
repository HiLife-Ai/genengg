-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 11:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clnId` varchar(100) NOT NULL,
  `clnName` varchar(255) NOT NULL,
  `clnMail` varchar(50) NOT NULL,
  `consName` varchar(255) NOT NULL,
  `contName` varchar(255) NOT NULL,
  `contPhone` varchar(10) NOT NULL,
  `clnAdd` varchar(255) NOT NULL,
  `orderDate` date NOT NULL,
  `clnRating` int(5) NOT NULL,
  `clnStatus` varchar(255) NOT NULL,
  `clnremark` varchar(255) NOT NULL,
  `clnnote` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empId` varchar(100) NOT NULL,
  `empName` varchar(255) NOT NULL,
  `empMail` varchar(50) NOT NULL,
  `empPwd` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `empPhone` varchar(10) NOT NULL,
  `empGender` varchar(255) NOT NULL,
  `empAdd` varchar(255) NOT NULL,
  `empSkill` varchar(255) NOT NULL,
  `empRole` varchar(255) NOT NULL,
  `joinDate` date NOT NULL,
  `endDate` date NOT NULL,
  `experience` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empId`, `empName`, `empMail`, `empPwd`, `dob`, `empPhone`, `empGender`, `empAdd`, `empSkill`, `empRole`, `joinDate`, `endDate`, `experience`, `remark`, `created_at`, `updated_at`) VALUES
('GET-001', 'Admin', 'admin@admin.com', '123456', '2002-09-05', '8344187125', 'Male', '118/9-3,kamaraj nagar\r\nElavamalai', 'php', 'General Manager', '2021-09-05', '0000-00-00', '', 'good', '2006-09-21 06:29:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(30) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `proId` varchar(100) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `scopeWork` varchar(255) NOT NULL,
  `planSdate` date NOT NULL,
  `planEdate` date NOT NULL,
  `proMem` varchar(255) NOT NULL,
  `proMemStatus` varchar(255) NOT NULL DEFAULT 'Pending',
  `clnprono` varchar(255) NOT NULL,
  `actualDate` date NOT NULL,
  `proStatus` varchar(255) NOT NULL,
  `project_start_time` varchar(100) NOT NULL,
  `project_end_time` varchar(100) NOT NULL,
  `proRemarks` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_time`
--

CREATE TABLE `project_time` (
  `id` int(11) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `process_type` varchar(100) NOT NULL,
  `starting_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`) VALUES
('GEB-001', 'General Manager', '2005-09-21 09:01:24', '0000-00-00 00:00:00'),
('GEB-003', 'HR Manager', '2005-09-21 08:54:13', '0000-00-00 00:00:00'),
('GEB-004', 'Project Manager', '2005-09-21 08:54:31', '0000-00-00 00:00:00'),
('GEB-005', 'Employee', '2005-09-21 08:54:49', '0000-00-00 00:00:00'),
('GEB-006', 'director', '2006-10-21 14:48:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `taskId` varchar(100) NOT NULL,
  `taskTitle` varchar(255) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `taskDesc` varchar(255) NOT NULL,
  `taskSdate` date NOT NULL,
  `taskEdate` date NOT NULL,
  `taskStatus` varchar(255) NOT NULL,
  `taskMem` varchar(255) NOT NULL,
  `taskMemStatus` varchar(255) NOT NULL DEFAULT 'Pending',
  `priority` varchar(255) NOT NULL,
  `assign_to` int(10) NOT NULL,
  `assign_from` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_time`
--

CREATE TABLE `task_time` (
  `id` int(11) NOT NULL,
  `task_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `process_type` varchar(100) NOT NULL,
  `starting_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task_users`
--

CREATE TABLE `task_users` (
  `id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `task_id` varchar(100) NOT NULL,
  `emp_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clnId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empId`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proId`);

--
-- Indexes for table `project_time`
--
ALTER TABLE `project_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskId`);

--
-- Indexes for table `task_time`
--
ALTER TABLE `task_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_users`
--
ALTER TABLE `task_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_time`
--
ALTER TABLE `project_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_time`
--
ALTER TABLE `task_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_users`
--
ALTER TABLE `task_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
