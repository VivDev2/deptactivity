-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 05:44 AM
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
-- Database: `fex`
--

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

CREATE TABLE `cruds` (
  `event_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `event_date` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `activity_objective` text DEFAULT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cruds`
--

INSERT INTO `cruds` (`event_id`, `activity_name`, `start_time`, `end_time`, `event_date`, `venue`, `activity_objective`, `department`) VALUES
(1, 'cloud devops', '10:32:00', '00:00:00', '2023-10-27', 'jnec lab', 'learn about cloud docker containers', 'mca'),
(3, 'NEXTJS', '11:51:00', '02:52:00', '2023-11-01', 'aryabhatta ', 'REACT JS', 'CSE'),
(4, 'react js', '11:03:00', '01:06:00', '2023-11-02', 'Aryabhatta Hall', ' learn REACT JS', 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `moblie_no` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `name`, `email`, `moblie_no`, `password`, `dept`, `role`) VALUES
(9, 'Vivek Mahajan', 'vivekmahajan256@gmail.com', 2147483647, '111', 'MCA', 'Teacher'),
(10, 'lk', 'lk@gmail.com', 265359835, '222', 'CSE', 'Student'),
(11, 'Prathamesh ', 'prath@gmail.com', 1234567891, '121', 'MCA', 'Student'),
(12, 'karan', 'karan2@gmail.com', 1023564876, '1234', 'MCA', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cruds`
--
ALTER TABLE `cruds`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cruds`
--
ALTER TABLE `cruds`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
