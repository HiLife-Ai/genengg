-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 07:04 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gen`
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

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clnId`, `clnName`, `clnMail`, `consName`, `contName`, `contPhone`, `clnAdd`, `orderDate`, `clnRating`, `clnStatus`, `clnremark`, `clnnote`, `created_at`, `updated_at`) VALUES
('GEN-CL-001', 'Mohan Raj', 'mohan@gmail.com', 'Sabari', 'Divyabharathi', '8344187125', '118/9-3,kamaraj nagar\r\nElavamalai', '2021-09-06', 5, 'Active', 'good', 'good', '2006-09-21 07:03:50', '0000-00-00 00:00:00'),
('GEN-CL-002', 'Arun', 'arun@gmail.com', 'alex', 'Divyabharathi', '8344187125', '118/9-3,kamaraj nagar\r\nElavamalai', '2021-09-06', 5, 'Active', 'good', 'good', '2006-09-21 07:03:20', '0000-00-00 00:00:00'),
('GEN-CL-003', 'Divya', 'divya@gmail.com', 'Sabari', 'Bharathi', '8344187125', '118/9-3,kamaraj nagar\r\nElavamalai', '2021-09-01', 5, 'Active', 'Good', 'Good', '2006-09-21 11:30:41', '0000-00-00 00:00:00'),
('GEN-CL-004', 'akash', 'on@gmail.com', 'ajay', 'mahesh', '1234567890', 'ujjain', '2021-09-28', 10, 'Active', 'this is remarsk 12', 'tiis is note', '2028-09-21 07:49:44', '2021-09-28 11:10:25');

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
  `remark` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empId`, `empName`, `empMail`, `empPwd`, `dob`, `empPhone`, `empGender`, `empAdd`, `empSkill`, `empRole`, `joinDate`, `endDate`, `remark`, `created_at`, `updated_at`) VALUES
('GEB-001', 'shreebalaji', 'balaji@gmail.com', '123456', '2002-09-05', '8344187125', 'Male', '118/9-3,kamaraj nagar\r\nElavamalai', 'php', 'Admin', '2021-09-05', '0000-00-00', 'good', '2006-09-21 06:29:51', '0000-00-00 00:00:00'),
('GEB-002', 'Renuga', 'renuga@gmail.com', '123456', '2000-06-05', '8344187125', 'Female', '118/9-3,kamaraj nagar\r\nElavamalai', 'Codeigniter', 'Admin', '2021-09-07', '0000-00-00', 'cvbcvbcv', '2005-09-21 09:02:59', '0000-00-00 00:00:00'),
('GEB-003', 'Prabhu', 'prabhu@gmail.com', '123456', '1989-09-05', '8344187125', 'Male', '118/9-3,kamaraj nagar\r\nElavamalai', 'ASP.Net', 'HR', '2021-09-05', '0000-00-00', 'dfsfds', '2005-09-21 09:04:33', '0000-00-00 00:00:00'),
('GEB-004', 'Divya', 'divya@gmail.com', '123456', '1994-12-29', '8344187125', 'Female', '118/9-3,kamaraj nagar\r\nElavamalai', 'divya@gmail.com', 'Project', '2021-09-05', '0000-00-00', 'xaxsxs', '2005-09-21 09:06:19', '0000-00-00 00:00:00'),
('GEB-005', 'Sam', 'sam@gmail.com', '123456', '1998-09-23', '8344187125', 'Male', '118/9-3,kamaraj nagar\r\nElavamalai', 'Laravel', 'Employee', '2021-09-10', '2021-09-29', 'dvsvsd', '2029-09-21 12:47:03', '0000-00-00 00:00:00'),
('GEB-006', 'test', 'test@gmail.com', '123456', '2021-09-17', '8344187125', 'Male', '118/9-3,kamaraj nagar\r\nElavamalai', 'kjdfhd', 'Admin', '2021-09-06', '0000-00-00', 'fxhd', '2006-09-21 15:47:05', '0000-00-00 00:00:00'),
('GEB-007', 'kalai', 'kalai@gmail.com', '123456', '2021-09-19', '8344187125', 'Female', '118/9-3,kamaraj nagar\r\nElavamalai', 'PHP', 'Employee', '2021-09-19', '2021-09-19', 'Test', '2019-09-21 13:29:56', '0000-00-00 00:00:00'),
('GEB-008', 'Bhuvana', 'bhuvana@gmail.com', '123456', '2021-09-19', '8344187125', 'Female', '118/9-3,kamaraj nagar\r\nElavamalai', 'PHP', 'Employee', '2021-09-19', '2021-09-19', 'test1', '2019-09-21 13:30:54', '0000-00-00 00:00:00'),
('GEB-010', 'ajay', 'sam@gmail.com', '123456', '2021-09-28', '1234567892', 'Male', 'bhg', 'php', 'HR', '2021-09-28', '2021-09-28', 'this is remarks', '2028-09-21 11:17:17', '0000-00-00 00:00:00');

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
  `proRemarks` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`proId`, `proName`, `client`, `scopeWork`, `planSdate`, `planEdate`, `proMem`, `proMemStatus`, `clnprono`, `actualDate`, `proStatus`, `proRemarks`, `created_at`, `updated_at`) VALUES
('GET-20-21-001', 'hilife', 'GEN-CL-002', 'Web aplication', '2021-09-06', '2021-09-30', 'GEB-005,GEB-007,GEB-008', 'Complete,Pending,Pending', '1001', '2021-09-06', 'Finished', 'good', '2029-09-21 15:17:23', '0000-00-00 00:00:00'),
('GET-20-21-002', 'vinayagam Computers', 'GEN-CL-001', 'maintanance', '2021-09-06', '2021-09-30', 'GEB-005,GEB-008', 'Complete,Pending', '1002', '2021-09-25', 'In Progress', 'good', '2029-09-21 14:24:20', '0000-00-00 00:00:00'),
('GET-20-21-003', 'paar', 'GEN-CL-002', 'maintanance', '2021-09-10', '2021-09-09', 'GEB-007,GEB-008', 'Pending,Pending', '1002', '2021-09-07', 'Not Started', 'fdfdf', '2028-09-21 19:08:09', '0000-00-00 00:00:00'),
('GET-20-21-004', 'hilifeai', 'GEN-CL-004', 'maintanance', '2021-09-10', '2021-09-30', 'GEB-005', 'Pending', '1001', '2021-09-08', 'Not Started', 'fsafasf', '2028-09-21 19:07:51', '0000-00-00 00:00:00'),
('GET-20-21-005', 'Mark Solutions', 'GEN-CL-002', 'maintanance', '2021-09-19', '2021-09-19', 'GEB-007,GEB-008', 'Pending,Pending', '1001', '2021-09-19', 'In Progress', 'test', '2028-09-21 19:07:30', '0000-00-00 00:00:00'),
('GET-20-21-006', 'ak', 'GEN-CL-002', '2', '2021-09-21', '2021-09-21', 'GEB-005,GEB-008', 'Pending,Pending', '2', '2021-09-22', 'In Progress', 'this is stafrt 121', '2028-09-21 19:06:10', '0000-00-00 00:00:00'),
('GET-20-21-007', 'ajay', 'GEN-CL-002', '2', '2021-09-22', '2021-09-22', 'GEB-005,GEB-007', 'Pending,Pending', '2', '2021-09-22', 'In Progress', 'hjfdsh', '2028-09-21 19:07:08', '0000-00-00 00:00:00'),
('GET-20-21-008', 'ajay', 'GEN-CL-002', 'fjkdls', '2021-09-28', '2021-09-28', 'GEB-005,GEB-008', 'Pending,Pending', '2', '2021-09-28', 'In Progress', 'it is progress', '2029-09-21 13:14:41', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `project_time`
--

INSERT INTO `project_time` (`id`, `project_id`, `user_id`, `process_type`, `starting_time`, `end_time`) VALUES
(2, 'GET-20-21-001', 'GEB-005', 'Complete', '29-09-21 07:23:22', '29-09-21 07:24:53'),
(3, 'GET-20-21-002', 'GEB-005', 'Complete', '29-09-21 10:09:53', '29-09-21 15:29:38'),
(4, 'GET-20-21-002', 'GEB-005', 'Complete', '29-09-21 15:28:58', '29-09-21 15:29:38');

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
('GEB-001', 'Admin', '2005-09-21 09:01:24', '0000-00-00 00:00:00'),
('GEB-002', 'General Manager', '2005-09-21 08:52:07', '0000-00-00 00:00:00'),
('GEB-003', 'HR Manager', '2005-09-21 08:54:13', '0000-00-00 00:00:00'),
('GEB-004', 'Project Manager', '2005-09-21 08:54:31', '0000-00-00 00:00:00'),
('GEB-005', 'Employee', '2005-09-21 08:54:49', '0000-00-00 00:00:00'),
('GEB-006', 'Test', '2006-09-21 11:40:03', '0000-00-00 00:00:00'),
('GEB-007', 'co-admin', '2006-09-21 16:00:41', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskId`, `taskTitle`, `projectName`, `taskDesc`, `taskSdate`, `taskEdate`, `taskStatus`, `taskMem`, `taskMemStatus`, `priority`, `assign_to`, `assign_from`, `created_at`, `updated_at`) VALUES
('TAS-20-21-001', 'Contact Form', 'GET-20-21-002', 'test', '2021-09-06', '2021-09-06', 'Completed', 'GEB-005,GEB-007,GEB-008', 'Complete,Pending,Pending', 'medium', 0, 0, '2029-09-21 14:58:00', '0000-00-00 00:00:00'),
('TAS-20-21-002', 'Website Design', 'GET-20-21-003', 'web development', '2021-09-06', '2021-09-06', 'Completed', 'GEB-007,GEB-008', 'Complete,Complete', 'high', 0, 0, '2029-09-21 15:24:22', '0000-00-00 00:00:00'),
('TAS-20-21-005', 'work with login', 'GET-20-21-005', 'this is descriptio ', '2021-09-28', '2021-09-28', 'Incomplete', 'GEB-005,GEB-007,GEB-008', 'Pending,Pending,Pending', 'high', 0, 0, '2029-09-21 15:24:34', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `task_time`
--

INSERT INTO `task_time` (`id`, `task_id`, `user_id`, `process_type`, `starting_time`, `end_time`) VALUES
(5, 'TAS-20-21-001', 'GEB-005', 'Complete', '29-09-21 08:17:11', '29-09-21 15:31:24'),
(6, 'TAS-20-21-001', 'GEB-005', 'Complete', '29-09-21 08:54:15', '29-09-21 15:31:24'),
(7, 'TAS-20-21-001', 'GEB-005', 'Complete', '29-09-21 15:30:08', '29-09-21 15:31:24');

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
-- Dumping data for table `task_users`
--

INSERT INTO `task_users` (`id`, `created_at`, `updated_at`, `task_id`, `emp_id`) VALUES
(1, '0000-00-00', '0000-00-00', 'TAS-20-21-001', 'GEB-002'),
(2, '0000-00-00', '0000-00-00', 'TAS-20-21-001', 'GEB-001'),
(3, '0000-00-00', '0000-00-00', 'TAS-20-21-003', 'GEB-007'),
(4, '0000-00-00', '0000-00-00', 'TAS-20-21-002', 'GEB-007'),
(5, '0000-00-00', '0000-00-00', 'TAS-20-21-004', 'GEB-007'),
(6, '0000-00-00', '0000-00-00', 'TAS-20-21-001', 'GEB-005'),
(7, '0000-00-00', '0000-00-00', 'TAS-20-21-002', 'GEB-008');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_time`
--
ALTER TABLE `task_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task_users`
--
ALTER TABLE `task_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
