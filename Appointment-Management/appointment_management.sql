-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2024 at 11:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment management`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentID` int(11) NOT NULL,
  `appDate` date NOT NULL,
  `appTime` time(6) NOT NULL,
  `cancellationReason` varchar(255) DEFAULT NULL,
  `concern` varchar(50) NOT NULL,
  `createdAt` datetime(6) DEFAULT NULL,
  `display` bit(1) NOT NULL,
  `status` enum('Canceled','Confirmed','Pending') NOT NULL,
  `updatedAt` datetime(6) DEFAULT NULL,
  `doctorID` varchar(255) NOT NULL,
  `organization` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `appDate`, `appTime`, `cancellationReason`, `concern`, `createdAt`, `display`, `status`, `updatedAt`, `doctorID`, `organization`, `userID`) VALUES
(1, '2024-11-27', '16:00:00.156000', NULL, 'Height', '2024-11-28 15:33:43.000000', b'1', 'Confirmed', '2024-11-28 15:33:43.000000', 'IQ16768', 1, 1),
(2, '2024-11-29', '17:00:00.000000', NULL, 'Blood pressure', '2024-11-28 15:46:21.000000', b'1', 'Confirmed', '2024-11-28 15:46:21.000000', 'IQ16768', 1, 2),
(3, '2024-11-29', '16:50:00.182000', NULL, 'Heart', '2024-11-28 15:49:05.000000', b'1', 'Confirmed', '2024-11-28 15:49:05.000000', 'IQ16768', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorid` varchar(255) NOT NULL,
  `avg_time` int(11) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `display` bit(1) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `end_time` time(6) NOT NULL,
  `fee` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `start_time` time(6) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `role` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorid`, `avg_time`, `contact`, `display`, `email`, `end_time`, `fee`, `firstName`, `image`, `lastName`, `middleName`, `password`, `specialization`, `start_time`, `organization_id`, `role`) VALUES
('IQ16768', 10, '9874563211', b'1', 'saman@gmail.com', '18:00:00.000000', 250, 'Saman', NULL, 'gupta', '', '$2a$10$oebjsOFUdXmtx0z4rn6BzeABxASVawASJANxS2qfHrvCWA2gSQYhS', 'Dermatologist', '16:00:00.000000', 1, 2),
('JF84190', 10, '9840156815', b'1', 'drmanish@gmail.com', '17:30:00.000000', 500, 'Dr', NULL, 'Manish', '', '$2a$10$dG.AD9/solVxRJJOmgbsTeYWuen2qnUaisKHEaMpUrNnpwQW5lZye', 'General', '10:00:00.809000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `Organizationid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `display` bit(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`Organizationid`, `address`, `display`, `email`, `name`, `password`, `phone`, `type`) VALUES
(1, 'naxal', b'1', 'test@gmail.com', 'test', 'test@123', '9812345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization_type`
--

CREATE TABLE `organization_type` (
  `typeid` bigint(20) NOT NULL,
  `display` bit(1) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_type`
--

INSERT INTO `organization_type` (`typeid`, `display`, `type`) VALUES
(1, b'1', 'hospital');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` bigint(20) NOT NULL,
  `display` bit(1) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `display`, `role`) VALUES
(1, b'1', 'Doctor'),
(2, b'1', 'Organization');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `display` bit(1) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `role` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `display`, `email`, `firstName`, `image`, `lastName`, `middleName`, `mobileNumber`, `password`, `updated_at`, `role`) VALUES
(1, b'1', 'samyak@gmail.com', 'Samyak', 'DSC_0357_20241128_142324.JPG', 'lama', '', '9818241494', '$2a$10$iLu8wkUm5P7zSiNLoDsTluU6dYwKMETBgMEDYHN.04znsEJSsyl5m', NULL, NULL),
(2, b'1', 'manish@gmail.com', 'Manish', 'DSC_0352_20241128_142411.JPG', 'Sir', '', '9841156816', '$2a$10$DYV8/9pv1j/dpbuoQOX7GedAWtk9OfLD6Dq0vSrgw1iWmPHJLDVva', NULL, NULL),
(3, b'1', 'samanta@gmail.com', 'Samanta', NULL, 'khana', '', '9874632105', '$2a$10$ypTK8PMZAYqcYdG8acB7F.7ge2dOYdHiRDzn3ylvQqjgqMpNMRe.2', NULL, NULL),
(4, b'1', 'march@gmail.com', 'March', NULL, 'Singh', '', '9630214587', '$2a$10$WO9U/Bfec1zGgWtF5hmXL.7qHUX1CygPJpsBcNDYbPdev8bzRi4/W', NULL, NULL),
(5, b'1', 'rabindra@gmail.com', 'Rabindra', NULL, 'tagore', '', '987456200', '$2a$10$6MIKKPOt9/5DBAmhBKUw0uGegHWk16OUF0.3LjvNM.0oqsiCU4nEi', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentID`),
  ADD UNIQUE KEY `UKp7yxs1o3jwhehmtvmp9697v3o` (`doctorID`,`appDate`,`appTime`),
  ADD KEY `FKrl8ep4j7sx2wik30hxnv66u7o` (`organization`),
  ADD KEY `FKc9mfxp28piqrqq7mk9qovv0on` (`userID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorid`),
  ADD KEY `FK33iah31p78b051awxpcln6ai8` (`organization_id`),
  ADD KEY `FKllrkakm2agwbf70niwqldwi28` (`role`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`Organizationid`),
  ADD KEY `FKe9tehe85f34hvynmthu2xxrky` (`type`);

--
-- Indexes for table `organization_type`
--
ALTER TABLE `organization_type`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `FK4v6wipstncd8cj8h5c2vu6rjx` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `Organizationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_type`
--
ALTER TABLE `organization_type`
  MODIFY `typeid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FKbtcxt6wbj4ster7ybu8i4hdwo` FOREIGN KEY (`doctorID`) REFERENCES `doctor` (`doctorid`),
  ADD CONSTRAINT `FKc9mfxp28piqrqq7mk9qovv0on` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `FKrl8ep4j7sx2wik30hxnv66u7o` FOREIGN KEY (`organization`) REFERENCES `organization` (`Organizationid`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FK33iah31p78b051awxpcln6ai8` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`Organizationid`),
  ADD CONSTRAINT `FKllrkakm2agwbf70niwqldwi28` FOREIGN KEY (`role`) REFERENCES `role` (`roleid`);

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `FKe9tehe85f34hvynmthu2xxrky` FOREIGN KEY (`type`) REFERENCES `organization_type` (`typeid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK4v6wipstncd8cj8h5c2vu6rjx` FOREIGN KEY (`role`) REFERENCES `role` (`roleid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
