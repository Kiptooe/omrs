-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 09:13 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `login_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT current_timestamp(),
  `logout_time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_login`
--

CREATE TABLE `tbl_employee_login` (
  `login_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT current_timestamp(),
  `logout_time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lab_test_results`
--

CREATE TABLE `tbl_lab_test_results` (
  `result_id` int(11) NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lab_test_results_details`
--

CREATE TABLE `tbl_lab_test_results_details` (
  `result_details_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp(),
  `result_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(40) NOT NULL,
  `medicine_price` int(11) NOT NULL DEFAULT 0,
  `medicine_quantity` int(11) NOT NULL DEFAULT 0,
  `unit_id` int(11) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expiry_date` date NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine_prescribed_medicine`
--

CREATE TABLE `tbl_medicine_prescribed_medicine` (
  `prescriped_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine_prescription`
--

CREATE TABLE `tbl_medicine_prescription` (
  `prescription_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `prescribed_by` int(11) NOT NULL,
  `prescribed_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `national_id` int(11) DEFAULT NULL,
  `birth_cert` int(11) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `registered_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_login`
--

CREATE TABLE `tbl_patient_login` (
  `login_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT current_timestamp(),
  `logout_time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_visit`
--

CREATE TABLE `tbl_patient_visit` (
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_date` date NOT NULL DEFAULT current_timestamp(),
  `visit_time` time NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescribed_test`
--

CREATE TABLE `tbl_prescribed_test` (
  `test_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `prescribed_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescribed_test_details`
--

CREATE TABLE `tbl_prescribed_test_details` (
  `test_detail_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `test_type_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_types`
--

CREATE TABLE `tbl_test_types` (
  `test_type_id` int(11) NOT NULL,
  `test_type_name` varchar(25) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(25) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `admin_login` (`admin_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee1` (`role_id`);

--
-- Indexes for table `tbl_employee_login`
--
ALTER TABLE `tbl_employee_login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `employee_login` (`employee_id`);

--
-- Indexes for table `tbl_lab_test_results`
--
ALTER TABLE `tbl_lab_test_results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `lab_test1` (`added_by`);

--
-- Indexes for table `tbl_lab_test_results_details`
--
ALTER TABLE `tbl_lab_test_results_details`
  ADD PRIMARY KEY (`result_details_id`),
  ADD KEY `lab_test_d1` (`result_id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`medicine_id`),
  ADD KEY `medicine2` (`unit_id`);

--
-- Indexes for table `tbl_medicine_prescribed_medicine`
--
ALTER TABLE `tbl_medicine_prescribed_medicine`
  ADD PRIMARY KEY (`prescriped_id`),
  ADD KEY `mpm1` (`medicine_id`),
  ADD KEY `mnm2` (`prescription_id`);

--
-- Indexes for table `tbl_medicine_prescription`
--
ALTER TABLE `tbl_medicine_prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_patient_login`
--
ALTER TABLE `tbl_patient_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_patient_visit`
--
ALTER TABLE `tbl_patient_visit`
  ADD PRIMARY KEY (`visit_id`),
  ADD KEY `visit1` (`patient_id`);

--
-- Indexes for table `tbl_prescribed_test`
--
ALTER TABLE `tbl_prescribed_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `tbl_prescribed_test_details`
--
ALTER TABLE `tbl_prescribed_test_details`
  ADD PRIMARY KEY (`test_detail_id`),
  ADD KEY `ptd1` (`test_id`),
  ADD KEY `ptd2` (`test_type_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_test_types`
--
ALTER TABLE `tbl_test_types`
  ADD PRIMARY KEY (`test_type_id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_login`
--
ALTER TABLE `tbl_employee_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lab_test_results`
--
ALTER TABLE `tbl_lab_test_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lab_test_results_details`
--
ALTER TABLE `tbl_lab_test_results_details`
  MODIFY `result_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_medicine_prescribed_medicine`
--
ALTER TABLE `tbl_medicine_prescribed_medicine`
  MODIFY `prescriped_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_medicine_prescription`
--
ALTER TABLE `tbl_medicine_prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patient_login`
--
ALTER TABLE `tbl_patient_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patient_visit`
--
ALTER TABLE `tbl_patient_visit`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_prescribed_test`
--
ALTER TABLE `tbl_prescribed_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_prescribed_test_details`
--
ALTER TABLE `tbl_prescribed_test_details`
  MODIFY `test_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_test_types`
--
ALTER TABLE `tbl_test_types`
  MODIFY `test_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD CONSTRAINT `admin_login` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `employee1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employee_login`
--
ALTER TABLE `tbl_employee_login`
  ADD CONSTRAINT `employee_login` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lab_test_results`
--
ALTER TABLE `tbl_lab_test_results`
  ADD CONSTRAINT `lab_test1` FOREIGN KEY (`added_by`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lab_test_results_details`
--
ALTER TABLE `tbl_lab_test_results_details`
  ADD CONSTRAINT `lab_test_d1` FOREIGN KEY (`result_id`) REFERENCES `tbl_lab_test_results` (`result_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD CONSTRAINT `medicine1` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicine2` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_medicine_prescribed_medicine`
--
ALTER TABLE `tbl_medicine_prescribed_medicine`
  ADD CONSTRAINT `mnm2` FOREIGN KEY (`prescription_id`) REFERENCES `tbl_medicine_prescription` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mpm1` FOREIGN KEY (`medicine_id`) REFERENCES `tbl_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_patient_visit`
--
ALTER TABLE `tbl_patient_visit`
  ADD CONSTRAINT `visit1` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_prescribed_test_details`
--
ALTER TABLE `tbl_prescribed_test_details`
  ADD CONSTRAINT `ptd1` FOREIGN KEY (`test_id`) REFERENCES `tbl_prescribed_test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ptd2` FOREIGN KEY (`test_type_id`) REFERENCES `tbl_test_types` (`test_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
