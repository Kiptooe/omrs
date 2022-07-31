-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2022 at 11:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
(1, 'Emmanuel', 'Kip', 'emmanuel.kiptoo@strathmore.edu', '$2y$10$CiFoVvXKsePXlMDKV8PQw.uYxyY/0DKtFngnywarfDbgdQqdCXMAO', 38897893, 'Male', 1234567891, '$2y$10$OE1gtgK.8hJnf3QIBIPaT.ttMwa.ngN.MFW2yIDo3xyzQbOXqYFqm', '2022-07-31 23:31:23', '2022-07-31 23:31:23', 0);

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

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`login_id`, `admin_id`, `ip_address`, `login_time`, `logout_time`, `is_deleted`) VALUES
(1, 1, '127.0.0.1', '2022-07-31 15:34:21', '2022-07-31 23:34:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosis`
--

CREATE TABLE `tbl_diagnosis` (
  `diagnosis_id` int(11) NOT NULL,
  `diagnosis` varchar(40) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diagnosis`
--

INSERT INTO `tbl_diagnosis` (`diagnosis_id`, `diagnosis`, `doctor_id`, `patient_id`, `visit_id`, `date`, `is_deleted`) VALUES
(1, 'Typhoid', 3, 1, 1, '2022-07-27', 0);

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
(1, 'Ann', 'Mwende', 'kipngolo@gmail.com', '$2y$10$o62Yc7SfL7R2HUj2w1iRoudFXzInRCE2F6Dw2AyIsUXUXJrPGLiJS', '12345678', '0798877654', 'Female', 2, '2022-07-31', '2022-07-31 23:54:39', 0);

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

--
-- Dumping data for table `tbl_employee_login`
--

INSERT INTO `tbl_employee_login` (`login_id`, `employee_id`, `ip_address`, `login_time`, `logout_time`, `is_deleted`) VALUES
(1, 1, '127.0.0.1', '2022-07-31 15:57:20', '2022-07-31 23:57:20', 0);

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
-- Table structure for table `tbl_medicine_prescription_details`
--

CREATE TABLE `tbl_medicine_prescription_details` (
  `prescriped_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
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

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `firstname`, `lastname`, `national_id`, `birth_cert`, `email`, `password`, `gender`, `mobile_number`, `registered_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Joe', 'Doe', 98765432, 0, 'kiptoo.emmanuel.sammy@gmail.com', '$2y$10$mmOG5eMnCqrZKgJv2QChCOUKDMj7E1XCuN3d/SrxG7JUB06F57Buy', 'Male', 724257753, '2022-07-31', '2022-07-31 23:58:41', 0);

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

--
-- Dumping data for table `tbl_patient_visit`
--

INSERT INTO `tbl_patient_visit` (`visit_id`, `patient_id`, `visit_date`, `visit_time`, `is_deleted`) VALUES
(1, 1, '2022-07-31', '23:58:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescribed_test`
--

CREATE TABLE `tbl_prescribed_test` (
  `test_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
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
  `detail_name` varchar(40) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
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

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`, `is_deleted`) VALUES
(1, 'Administrator', 0),
(2, 'Receptionist', 0),
(3, 'Patient', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signsymp`
--

CREATE TABLE `tbl_signsymp` (
  `signsymp_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_signsymp`
--

INSERT INTO `tbl_signsymp` (`signsymp_id`, `patient_id`, `visit_id`, `added_by`, `is_deleted`) VALUES
(1, 1, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signsymp_details`
--

CREATE TABLE `tbl_signsymp_details` (
  `signsympdetails_id` int(11) NOT NULL,
  `signsympdetails_name` varchar(40) NOT NULL,
  `signsymp_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_signsymp_details`
--

INSERT INTO `tbl_signsymp_details` (`signsympdetails_id`, `signsympdetails_name`, `signsymp_id`, `visit_id`, `patient_id`, `is_deleted`) VALUES
(1, 'Fever', 1, 1, 1, 0),
(2, 'Diarrhoea', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(25) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vitals`
--

CREATE TABLE `tbl_vitals` (
  `vital_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `systolic_pressure` varchar(4) NOT NULL,
  `diastolic_pressure` varchar(4) NOT NULL,
  `temperature` varchar(40) NOT NULL,
  `weight` int(5) NOT NULL,
  `pulse_rate` varchar(40) NOT NULL,
  `examined_by` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vitals`
--

INSERT INTO `tbl_vitals` (`vital_id`, `date`, `systolic_pressure`, `diastolic_pressure`, `temperature`, `weight`, `pulse_rate`, `examined_by`, `patient_id`, `visit_id`, `is_deleted`) VALUES
(1, '2022-07-12 16:56:38', '120', '80', '37', 65, '70', 2, 1, 1, 0);

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
-- Indexes for table `tbl_diagnosis`
--
ALTER TABLE `tbl_diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `visit_id` (`visit_id`);

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
-- Indexes for table `tbl_medicine_prescription`
--
ALTER TABLE `tbl_medicine_prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `tbl_medicine_prescription_details`
--
ALTER TABLE `tbl_medicine_prescription_details`
  ADD PRIMARY KEY (`prescriped_id`),
  ADD KEY `mpm1` (`medicine_id`),
  ADD KEY `mnm2` (`prescription_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `visit_id` (`visit_id`);

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
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `visit_id` (`visit_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `tbl_prescribed_test_details`
--
ALTER TABLE `tbl_prescribed_test_details`
  ADD PRIMARY KEY (`test_detail_id`),
  ADD KEY `ptd1` (`test_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_signsymp`
--
ALTER TABLE `tbl_signsymp`
  ADD PRIMARY KEY (`signsymp_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `visit_id` (`visit_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_signsymp_details`
--
ALTER TABLE `tbl_signsymp_details`
  ADD PRIMARY KEY (`signsympdetails_id`),
  ADD KEY `signsymp_id` (`signsymp_id`),
  ADD KEY `visit_id` (`visit_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `tbl_vitals`
--
ALTER TABLE `tbl_vitals`
  ADD PRIMARY KEY (`vital_id`),
  ADD KEY `examined_by` (`examined_by`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `visit_id` (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_diagnosis`
--
ALTER TABLE `tbl_diagnosis`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_login`
--
ALTER TABLE `tbl_employee_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `tbl_medicine_prescription`
--
ALTER TABLE `tbl_medicine_prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_medicine_prescription_details`
--
ALTER TABLE `tbl_medicine_prescription_details`
  MODIFY `prescriped_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_patient_login`
--
ALTER TABLE `tbl_patient_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patient_visit`
--
ALTER TABLE `tbl_patient_visit`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_signsymp`
--
ALTER TABLE `tbl_signsymp`
  MODIFY `signsymp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_signsymp_details`
--
ALTER TABLE `tbl_signsymp_details`
  MODIFY `signsympdetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vitals`
--
ALTER TABLE `tbl_vitals`
  MODIFY `vital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `tbl_medicine_prescription_details`
--
ALTER TABLE `tbl_medicine_prescription_details`
  ADD CONSTRAINT `mnm2` FOREIGN KEY (`prescription_id`) REFERENCES `tbl_medicine_prescription` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mpm1` FOREIGN KEY (`medicine_id`) REFERENCES `tbl_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_medicine_prescription_details_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient` (`patient_id`),
  ADD CONSTRAINT `tbl_medicine_prescription_details_ibfk_2` FOREIGN KEY (`visit_id`) REFERENCES `tbl_patient_visit` (`visit_id`);

--
-- Constraints for table `tbl_patient_visit`
--
ALTER TABLE `tbl_patient_visit`
  ADD CONSTRAINT `visit1` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_prescribed_test`
--
ALTER TABLE `tbl_prescribed_test`
  ADD CONSTRAINT `tbl_prescribed_test_ibfk_1` FOREIGN KEY (`visit_id`) REFERENCES `tbl_patient_visit` (`visit_id`),
  ADD CONSTRAINT `tbl_prescribed_test_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient` (`patient_id`);

--
-- Constraints for table `tbl_prescribed_test_details`
--
ALTER TABLE `tbl_prescribed_test_details`
  ADD CONSTRAINT `ptd1` FOREIGN KEY (`test_id`) REFERENCES `tbl_prescribed_test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_prescribed_test_details_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient` (`patient_id`),
  ADD CONSTRAINT `tbl_prescribed_test_details_ibfk_2` FOREIGN KEY (`visit_id`) REFERENCES `tbl_patient_visit` (`visit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
