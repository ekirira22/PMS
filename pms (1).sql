-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 11:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_county_staff`
--

CREATE TABLE `t_county_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(60) NOT NULL,
  `id_number` int(11) NOT NULL,
  `dep_fk` int(11) NOT NULL,
  `group_id` int(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile_no` varchar(60) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_county_staff`
--

INSERT INTO `t_county_staff` (`staff_id`, `staff_name`, `id_number`, `dep_fk`, `group_id`, `email`, `mobile_no`, `user_name`, `password`, `status`) VALUES
(1000, 'John Waweru', 33478962, 1000, 100, 'jw@msn.com', '0719405599', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'active'),
(1001, 'Judy Gitahi', 34657821, 1001, 200, 'jd@nyeri.go.ke', '0110254789', 'cofficer', 'e10adc3949ba59abbe56e057f20f883e', 'active'),
(1003, 'Alex Macharia', 36784129, 1001, 300, 'amacharia@gmail.com', '0714875623', 'pmanager', 'e10adc3949ba59abbe56e057f20f883e', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `t_departments`
--

CREATE TABLE `t_departments` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(80) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_departments`
--

INSERT INTO `t_departments` (`dep_id`, `dep_name`, `description`, `status`) VALUES
(1000, 'IT Department', 'Backbone of IT Structure', 'active'),
(1001, 'Finance and Economic Planning', 'The Department of Finance and Economic Planning', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `t_financial_year`
--

CREATE TABLE `t_financial_year` (
  `year_id` int(11) NOT NULL,
  `year_name` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_financial_year`
--

INSERT INTO `t_financial_year` (`year_id`, `year_name`, `status`) VALUES
(1, '2018/2019', 'inactive'),
(2, '2019/2020', 'inactive'),
(3, '2020/2021', 'active'),
(4, '2021/2022', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `t_projects`
--

CREATE TABLE `t_projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(60) NOT NULL,
  `dep_fk` int(100) NOT NULL,
  `subcounty` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `f_year` int(11) NOT NULL,
  `budget` decimal(10,0) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_projects`
--

INSERT INTO `t_projects` (`project_id`, `project_name`, `dep_fk`, `subcounty`, `start_date`, `end_date`, `f_year`, `budget`, `status`) VALUES
(107, 'Budget Approval', 1001, 'nyeri', '2021-06-04', '2021-06-17', 3, '1254000', 'pending'),
(108, 'Building WAN Network', 1000, 'nyeri', '2021-06-20', '2021-07-04', 3, '14000000', 'pending'),
(109, 'afsdv', 1001, 'muk', '2021-06-04', '2021-06-23', 4, '5845120', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_county_staff`
--
ALTER TABLE `t_county_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `dep_fk` (`dep_fk`);

--
-- Indexes for table `t_departments`
--
ALTER TABLE `t_departments`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `t_financial_year`
--
ALTER TABLE `t_financial_year`
  ADD PRIMARY KEY (`year_id`);

--
-- Indexes for table `t_projects`
--
ALTER TABLE `t_projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `dep_fk` (`dep_fk`),
  ADD KEY `f_year` (`f_year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_financial_year`
--
ALTER TABLE `t_financial_year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_projects`
--
ALTER TABLE `t_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_county_staff`
--
ALTER TABLE `t_county_staff`
  ADD CONSTRAINT `t_county_staff_ibfk_1` FOREIGN KEY (`dep_fk`) REFERENCES `t_departments` (`dep_id`) ON UPDATE CASCADE;

--
-- Constraints for table `t_projects`
--
ALTER TABLE `t_projects`
  ADD CONSTRAINT `t_projects_ibfk_1` FOREIGN KEY (`dep_fk`) REFERENCES `t_departments` (`dep_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_projects_ibfk_2` FOREIGN KEY (`f_year`) REFERENCES `t_financial_year` (`year_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
