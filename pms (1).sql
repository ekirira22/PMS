-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 12:42 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getProjectDetails` ()  SELECT t_projects.project_id,t_projects.project_name,t_departments.dep_name,
t_projects.subcounty,t_projects.start_date,t_projects.end_date
,t_projects.budget,t_financial_year.year_name,t_projects.status FROM t_projects JOIN t_departments ON t_projects.dep_fk = t_departments.dep_id JOIN t_financial_year ON t_projects.f_year = t_financial_year.year_id ORDER BY t_projects.project_id DESC$$

DELIMITER ;

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
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_departments`
--

INSERT INTO `t_departments` (`dep_id`, `dep_name`, `description`) VALUES
(1000, 'IT Department', 'Backbone of IT Structure'),
(1001, 'Finance and Economic Planning', 'The Department of Finance and Economic Planning'),
(1002, 'Agriculture, Livestock & Fisheries', ''),
(1003, 'County Public Service & Solid Waste Management', ''),
(1004, 'Health Services', 'Health Services'),
(1005, 'Transport, Public Works, Infrastructure & Energy', 'Transport, Public Works, Infrastructure & Energy'),
(1006, 'Land, Housing and Urban Development', 'Land, Housing and Urban Development'),
(1007, 'Water, Irrigation, Environment and Climate Change', 'Water, Irrigation, Environment and Climate Change'),
(1008, 'Gender, Youth and Social Services', 'Gender, Youth and Social Services'),
(1009, 'Trade, Tourism, Culture and Cooperative Development', 'Trade, Tourism, Culture and Cooperative Development'),
(1010, 'Education & Sports', 'Education & Sports');

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
(115, 'Build a Dam', 1007, 'tetu', '2021-06-12', '2021-07-10', 3, '1000000', 'complete'),
(119, 'Create a Fun Park', 1006, 'Mathira', '2021-06-15', '2021-06-25', 4, '14000000', 'pending'),
(121, 'Build a dam for Irrigation', 1002, 'Mukurweini', '2021-06-07', '2021-06-28', 3, '1000000', 'pending'),
(122, 'Build a Shelter for Motorbikes', 1003, 'keini', '2021-06-21', '2021-06-27', 3, '543650', 'pending'),
(123, 'Build a County Hospital', 1004, 'Nyeri Town', '2021-06-14', '2022-01-10', 4, '178000000', 'pending'),
(124, 'Build a Road', 1005, 'Othaya', '2021-06-08', '2022-02-28', 4, '505000000', 'pending');

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
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

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
