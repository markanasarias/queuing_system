-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 12:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_amante`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `status`) VALUES
(1, 'Pedia', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `department` varchar(100) NOT NULL,
  `specialization` varchar(150) NOT NULL,
  `contact` int(20) NOT NULL,
  `demail` varchar(150) NOT NULL,
  `docpassword` varchar(150) NOT NULL,
  `licno` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `dname`, `birthday`, `gender`, `address`, `department`, `specialization`, `contact`, `demail`, `docpassword`, `licno`, `status`) VALUES
(1, 'Dr.Mark Palingcod', '2000-07-22', 'Male', 'MUNTINLUPA CITY', '1', 'psychology', 90534873, 'Dr.palingcod@gmail.com', 'qwerty1234', 7421, 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `action_made` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action_made`, `date_created`) VALUES
(1, 1, 'Logged in the system.', '2023-12-15 16:14:20'),
(2, 1, 'Logged in the system.', '2023-12-15 17:54:30'),
(3, 1, 'Logged in the system.', '2023-12-15 17:55:24'),
(4, 1, 'Logged in the system.', '2023-12-15 18:01:14'),
(5, 1, 'Logged in the system.', '2023-12-15 18:06:35'),
(6, 1, 'Logged in the system.', '2023-12-15 18:27:04'),
(7, 1, 'Logged in the system.', '2023-12-15 18:28:38'),
(8, 1, 'Logged in the system.', '2023-12-15 18:36:40'),
(9, 1, 'Logged in the system.', '2023-12-15 18:42:08'),
(10, 1, 'Logged in the system.', '2023-12-15 18:42:42'),
(11, 1, 'Logged in the system.', '2023-12-15 18:56:53'),
(12, 1, 'Logged in the system.', '2023-12-15 18:58:42'),
(13, 1, 'Logged in the system.', '2023-12-15 19:01:00'),
(14, 1, 'Logged in the system.', '2023-12-15 19:02:34'),
(15, 1, 'Logged in the system.', '2023-12-15 19:03:03'),
(16, 1, 'Logged in the system.', '2023-12-15 19:10:46'),
(17, 1, 'Logged in the system.', '2023-12-15 19:19:37'),
(18, 1, 'Logged in the system.', '2023-12-15 19:20:33'),
(19, 1, 'Logged in the system.', '2023-12-15 19:21:18'),
(20, 1, 'Logged in the system.', '2023-12-15 19:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `birthday` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ec_name` varchar(50) NOT NULL,
  `ec_relation` varchar(50) NOT NULL,
  `ec_contact` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fname`, `mname`, `lname`, `birthday`, `gender`, `civil_status`, `address`, `contact`, `email`, `ec_name`, `ec_relation`, `ec_contact`, `status`) VALUES
(1, 'mark', 'a', 'palingcod', '2023-12-07', 'Male', 'Single', 'munti', '09205544192', 'mark@gmail.com', 'ed', 'father', '09205544192', 0),
(2, 'mark', 'a', 'palingcod', '2023-12-07', 'Male', 'Single', 'munti', '09205544192', 'mark@gmail.com', 'ed', 'father', '09205544192', 0),
(3, '', '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `id` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `doctorid` int(11) NOT NULL,
  `allery` varchar(10) NOT NULL,
  `bloodtype` varchar(10) NOT NULL,
  `meintenance_medication` text NOT NULL,
  `exisiting condition` text NOT NULL,
  `operation_history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `doctorid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `doctorid`, `patientid`, `department`, `number`, `status`) VALUES
(1, 0, 1, 'Choose', 0, 0),
(2, 0, 0, 'Choose', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fname` int(11) NOT NULL,
  `mname` int(11) NOT NULL,
  `lname` int(11) NOT NULL,
  `birthday` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `ec_name` int(11) NOT NULL,
  `ec_contact` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `date_created`) VALUES
(1, 'Mark Palingcod A.', 'admin', '58b4e38f66bcdb546380845d6af27187', '2023-12-15 09:21:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
