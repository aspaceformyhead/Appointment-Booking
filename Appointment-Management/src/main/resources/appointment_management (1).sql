-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 10:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `userID` int(11) NOT NULL,
  `doctorID` varchar(255) NOT NULL,
  `appDate` date NOT NULL,
  `appTime` time NOT NULL,
  `concern` varchar(50) NOT NULL,
  `status` enum('Confirmed','Pending','Canceled') NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 1,
  `createdAt` datetime(6) DEFAULT NULL,
  `updatedAt` datetime(6) DEFAULT NULL,
  `cancellationReason` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `userID`, `doctorID`, `appDate`, `appTime`, `concern`, `status`, `display`, `createdAt`, `updatedAt`, `cancellationReason`, `organization`) VALUES
(9, 8, 'YC06939', '2024-10-31', '16:36:00', 'Regular Checkup', 'Confirmed', 1, '2024-10-17 14:04:00.000000', '2024-10-17 14:04:00.000000', NULL, NULL),
(10, 9, 'YC06939', '2024-10-31', '17:00:00', 'Chest', 'Confirmed', 1, '2024-10-20 13:35:38.000000', '2024-10-20 13:35:38.000000', 'Emergency', NULL),
(11, 13, 'YC06939', '2024-11-29', '16:00:00', 'Skin', 'Canceled', 1, '2024-11-07 13:24:56.000000', '2024-11-07 13:24:56.000000', 'okkk', NULL),
(12, 8, 'YC06939', '2024-11-27', '16:45:00', 'Regular Checkup', 'Confirmed', 1, '2024-11-18 13:49:38.000000', '2024-11-18 13:49:38.000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(10) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `avg_time` int(4) NOT NULL,
  `fee` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 1,
  `role` enum('Admin','Doctor','User') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `organization` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `firstName`, `middleName`, `lastName`, `email`, `contact`, `specialization`, `avg_time`, `fee`, `start_time`, `end_time`, `display`, `role`, `password`, `organization`) VALUES
('JQ01522', 'Garima', '', 'Regmi', 'garima.regmi@gmail.com', '9861599238', 'Dermatologist', 8, 750, '14:19:00', '15:20:00', 1, 'Doctor', '$2a$10$slR8P2nWkOGti/Fs2KvndOMepIewfs57AbcQlDsM4oXq5DV5XlBMC', 1),
('RQ69755', 'Ram', '', 'nath', 'ram@gmail.com', '986888999', 'nephro', 15, 800, '07:02:00', '22:02:00', 1, 'Doctor', '$2a$10$j6TwvGlIGzDLmhNSWcFUg.yTMEDp81G4d9HvKr1wCjitN9tzUeNPq', 1),
('SR00397', 'Shyam', '', 'Shrestha', 'shyam.sth@gmail.com', '9845321899', 'Cardiology', 9, 900, '13:17:00', '18:17:00', 1, 'Doctor', '$2a$10$YorflqJBqK1x5sN0v6FRG.CrcDn4IUu0sakrETGM0QCl3LMz1bfPS', 2),
('YC06939', 'Prasanna', 'Raj', 'Pradhan', 'prasnna.pradhan@gmail.com', '9851065158', 'Dermatologist', 9, 750, '15:03:00', '18:04:00', 1, 'Doctor', '$2a$10$JgOr8Qr2h5CtS08RfSiqmeUgY76NrOAgogTguhmC7sfjY1snQszd2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` enum('Organization','Individual') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `email`, `address`, `phone`, `type`) VALUES
(1, 'Sowa HealthCare', 'info@sowahealth.com', 'Ekantakuna Rd, Lalitpur ', '015421004', 'Organization'),
(2, 'Deni Clinic', 'deni@gmail.com', 'Lalitpur', '9877768159', 'Organization');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `p_Id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(50) DEFAULT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `p_firstName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `p_lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Doctor','Admin','User') NOT NULL DEFAULT 'User',
  `display` tinyint(1) NOT NULL DEFAULT 1,
  `updated_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `middleName`, `lastName`, `mobileNumber`, `email`, `password`, `role`, `display`, `updated_at`) VALUES
(8, 'Lijala ', '', 'Tuladhar', '9861599238', 'lijalaa@gmail.com', '$2a$10$XoNui6/d8kxeemZ0Wjm.WesvtTtm3qgVxtNo9XVa2iGB1AA0QxxuK', 'User', 1, '2024-11-19 15:02:32.000000'),
(9, 'Lahana', '', 'Tuladhar', '9860181707', 'lahana@hotmail.com', '$2a$10$DBVXJalWjb3sZjPc1SxCN.HzPE3F/Icqq1K8PjBAmpNFc5YJndVii', 'User', 1, NULL),
(10, 'Bhairaja', 'Ratna', 'Tuladhar', '9851035782', 'vajra@gmail.com', '$2a$10$kIE6fv9sODkwctSj1g2Y/ejmedPfrWbeZJK9ksU4W729Q1gZ0Fm56', 'User', 1, NULL),
(13, 'John', '', 'DOe', '98510655156', 'john.doe@gmail.com', '$2a$10$Hf/EpdoTcvZ2Hl43DSy9m.yeLnbEdpamTedmnSg/vvjKJG2hZNq3G', 'User', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentID`),
  ADD UNIQUE KEY `UKp7yxs1o3jwhehmtvmp9697v3o` (`doctorID`,`appDate`,`appTime`),
  ADD KEY `FKc9mfxp28piqrqq7mk9qovv0on` (`userID`),
  ADD KEY `FKrl8ep4j7sx2wik30hxnv66u7o` (`organization`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FKp8yl7dc7887nefr293eoymfrn` (`organization`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`p_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileNumber` (`mobileNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `p_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FKbtcxt6wbj4ster7ybu8i4hdwo` FOREIGN KEY (`doctorID`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `FKc9mfxp28piqrqq7mk9qovv0on` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `FKrl8ep4j7sx2wik30hxnv66u7o` FOREIGN KEY (`organization`) REFERENCES `organization` (`id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FKp8yl7dc7887nefr293eoymfrn` FOREIGN KEY (`organization`) REFERENCES `organization` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
