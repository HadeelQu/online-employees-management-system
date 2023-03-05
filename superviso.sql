-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2022 at 10:26 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superviso`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_number` int(8) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `job_title` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_number`, `first_name`, `last_name`, `job_title`, `password`) VALUES
(1, 20221, 'Mary', ' James', 'Disgner', '$2y$12$QHrGAqdk./jsJupUlfZB2uqmhGtpAQ8B4KhX5xhwVc/jQBTFM5Wu2'),
(2, 20222, 'Sophia', 'james', 'Supervisor', '$2y$12$LrkfL2AgIlJfgwl5ypb8EOKElPrxk9J1SPzbwvCXiPkglUmQ80z/a'),
(3, 20223, 'Emma', 'Andrew', 'senior', '$2y$12$QHrGAqdk./jsJupUlfZB2uqmhGtpAQ8B4KhX5xhwVc/jQBTFM5Wu2'),
(4, 20224, 'Johan', 'Kevin', 'Secretary', '$2y$12$LrkfL2AgIlJfgwl5ypb8EOKElPrxk9J1SPzbwvCXiPkglUmQ80z/a'),
(5, 20225, 'Jeffrey', 'Dean', 'Data Entry', '$2y$12$QHrGAqdk./jsJupUlfZB2uqmhGtpAQ8B4KhX5xhwVc/jQBTFM5Wu2'),
(6, 20226, 'Karen', 'Samh', 'Graphic Designer', '$2y$12$LrkfL2AgIlJfgwl5ypb8EOKElPrxk9J1SPzbwvCXiPkglUmQ80z/a'),
(7, 20227, 'Rose', 'Dean', 'IT Manager', '$2y$12$QHrGAqdk./jsJupUlfZB2uqmhGtpAQ8B4KhX5xhwVc/jQBTFM5Wu2'),
(8, 20228, 'Alia', 'Daniel', 'Data Entry', '$2y$12$LrkfL2AgIlJfgwl5ypb8EOKElPrxk9J1SPzbwvCXiPkglUmQ80z/a'),
(9, 20229, 'Henry', 'Mark', 'DevOps Engineer', '$2y$12$QHrGAqdk./jsJupUlfZB2uqmhGtpAQ8B4KhX5xhwVc/jQBTFM5Wu2'),
(10, 202210, 'Robert', 'Nell', 'Computer Programmer', '$2y$12$LrkfL2AgIlJfgwl5ypb8EOKElPrxk9J1SPzbwvCXiPkglUmQ80z/a'),
(11, 202211, 'Jack', 'Edward', 'Technical Specialist', '$2y$12$QHrGAqdk./jsJupUlfZB2uqmhGtpAQ8B4KhX5xhwVc/jQBTFM5Wu2'),
(12, 202212, 'Steven', 'Oscar', 'Cloud Architect', '$2y$12$LrkfL2AgIlJfgwl5ypb8EOKElPrxk9J1SPzbwvCXiPkglUmQ80z/a'),
(13, 202213, 'John', 'Paul', 'UX Designer ', '$2y$12$QHrGAqdk./jsJupUlfZB2uqmhGtpAQ8B4KhX5xhwVc/jQBTFM5Wu2'),
(14, 202214, 'Peter', 'Jeff', 'Team Leader', '$2y$12$LrkfL2AgIlJfgwl5ypb8EOKElPrxk9J1SPzbwvCXiPkglUmQ80z/a'),
(15, 202215, 'Simon', 'Oscar', 'Software Engineer', '$2y$12$QHrGAqdk./jsJupUlfZB2uqmhGtpAQ8B4KhX5xhwVc/jQBTFM5Wu2');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'David ', 'Ethan', 'DavidEthan', '$2y$12$LrkfL2AgIlJfgwl5ypb8EOKElPrxk9J1SPzbwvCXiPkglUmQ80z/a');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `emp_id` int(4) NOT NULL,
  `service_id` int(4) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `attachment1` varchar(1000) NOT NULL,
  `attachment2` varchar(1000) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `emp_id`, `service_id`, `description`, `attachment1`, `attachment2`, `status`) VALUES
(1, 1, 1, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/22/Mary james emp1.pdf', './upload_files/16/letter-of-resignation.pdf', 'In progress'),
(2, 2, 1, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/16/request foe allowance.pdf', '', 'Approved'),
(3, 1, 2, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/22/Mary james emp1.pdf', './upload_files/16/letter-of-resignation.pdf', 'Approved'),
(4, 4, 1, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/19/IMG2.jpeg', './upload_files/19/IMG.jpeg', 'In progress'),
(5, 5, 2, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/20/Jeffery Dean emp5.pdf', './upload_files/16/letter-of-resignation.pdf', 'In progress'),
(6, 6, 4, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/19/IMG2.jpeg', './upload_files/16/letter-of-resignation.pdf', 'Declined'),
(7, 7, 2, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/20/Rose Dean emp7.pdf', './upload_files/16/letter-of-resignation.pdf', 'Declined'),
(8, 8, 4, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/16/request foe allowance.pdf', '', 'In progress'),
(9, 9, 4, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/25/IMG7.jpg', './upload_files/19/IMG.jpeg', 'Approved'),
(10, 10, 3, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/21/Robert Nell emp10.pdf', './upload_files/16/letter-of-resignation.pdf', 'In progress'),
(11, 11, 3, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/24/IMG5.png', './upload_files/19/IMG.jpeg', 'Declined'),
(12, 12, 3, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/16/request foe allowance.pdf', '', 'Approved'),
(13, 13, 5, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/24/IMG5.png', './upload_files/16/letter-of-resignation.pdf', 'In progress'),
(14, 14, 5, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/19/IMG2.jpeg', './upload_files/19/IMG.jpeg', 'Declined'),
(15, 15, 5, 'I would like to request for promotion to the position of Manger.\r\nI have been in my current role for 6 years.\r\nI believe my experience, achievements and acquired skills make me the best person for promotion to be manager.', './upload_files/21/Simon Oscar emp15.pdf', './upload_files/16/letter-of-resignation.pdf', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `type`) VALUES
(1, 'Promotion'),
(2, 'Leave'),
(3, 'Allowance'),
(4, 'Resignation'),
(5, 'Health Insurance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `Request_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Request_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
