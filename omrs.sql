-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 07:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `national_id` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `registered_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `firstname`, `lastname`, `email`, `password`, `national_id`, `gender`, `mobile_number`, `key`, `registered_at`, `updated_at`, `is_deleted`) VALUES
(2, 'Meshack', 'Jackson', 'emmanuel.kiptoo@strathmore.edu', '$2y$10$63vLOf/dzFaxU9VPNHPHQu8btpPSPcd6K15UA3TRYROTZz2KqtbWO', 12345678, 'Male', 1234567890, '$2y$10$FoHORtff.FnSo2dzr9Np2eJ1WpZyyfZnDBb3rXLX.aOgwGLZ/cBaS', '2022-07-21 23:12:21', '2022-07-21 23:12:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`, `is_deleted`) VALUES
(1, 'Administrator', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `national_id` (`national_id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `employee_id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `national_id` varchar(10) NOT NULL DEFAULT 'N/A',
  `mobile_number` varchar(10) NOT NULL DEFAULT 'N/A',
  `gender` enum('Male','Female') NOT NULL,
  `role_id` int(11) NOT NULL,
  `registered_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `firstname`, `lastname`, `email`, `password`, `national_id`, `mobile_number`, `gender`, `role_id`, `registered_at`, `updated_at`, `is_deleted`) VALUES
(3, 'Meshack', 'Jackson', 'myphone136714@gmail.com', '$2y$10$XUOI/jdK46oInRIMZBIzbuH66mYhVCvMBmQkYicy79deKk6nTaoVi', '12345678', '1234567890', 'Male', 2, '2022-07-26', '2022-07-26 22:51:56', 0),
(4, 'Joseph', 'Jackson', 'adwidip@gmail.com', '$2y$10$ANvyWkaOAEmKuY8HxH.iLuq23kOc2sv2VK1wU8dBiSn219EpLD/nO', '12345679', '1234567899', 'Male', 3, '2022-07-27', '2022-07-27 09:04:55', 0),
(5, 'Jane', 'Weru', 'janeweru@gmail.com', '$2y$10$9wERvgzm0yw9j/uBebl29OkPuqRFuEtGD0h/Cv6v0SXpbWbwvjpji', '12345677', '1234567889', 'Male', 4, '2022-07-27', '2022-07-27 09:15:47', 0),
(6, 'Jane', 'Were', 'janewere@gmail.com', '$2y$10$IfsRoLqRgK7Nz3/T11ZmgeiS2KInHOUdO16G8/AM0TIOibyamOW5G', '12345673', '1234567883', 'Male', 5, '2022-07-27', '2022-07-27 09:16:31', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee1` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `employee1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
