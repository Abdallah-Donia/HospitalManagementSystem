-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 09:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `id` int(11) NOT NULL,
  `doctorName` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` enum('single','married') NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `phone1` varchar(11) NOT NULL,
  `phone2` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `blood_group` varchar(2) NOT NULL,
  `joining_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`id`, `doctorName`, `date`, `status`, `gender`, `country`, `city`, `street`, `phone1`, `phone2`, `email`, `specialization`, `blood_group`, `joining_date`, `departure_date`, `department`) VALUES
(1, 'Magdy Yacoub', '1935-11-16', 'married', 'male', 'Egypt', 'Sharqia', 'Bilbeis', '01084576312', '01285676871', 'magdy@gmail.com', ' heart', 'A+', '2020-12-05', '2030-12-05', 'Surgery'),
(2, 'Mohamed Ghoneim', '1939-03-17', 'married', 'male', 'Egypt', 'Cairo', 'Elmoez', '01084576241', '01285676541', 'Mohamed@gmail.com', 'Kidney', 'A', '2020-12-05', '2025-12-05', 'Nephrology'),
(3, 'Mohamed Mashally', '1944-07-28', 'married', 'male', 'Egypt', 'Tanta', 'station', '01083476241', '01255676541', 'Mohamed22@gmail.com', 'Children', 'A+', '2019-12-05', '2020-12-05', 'Internal Medicine'),
(4, 'Mohamed TaherAl-lozi', '1950-09-30', 'married', 'male', 'Egypt', 'Tanta', 'sea', '01173476241', '01045676541', 'Mohamed_taher@gmail.com', 'surgeon', 'A+', '2019-11-05', '2030-12-05', 'Neurology'),
(5, 'Magdy Shaban', '1980-09-30', 'married', 'male', 'Egypt', 'cairo', 'sea', '01173476241', '01145676541', 'Magdy22@gmail.com', 'Children', 'A+', '2019-11-05', '2027-12-05', 'Pediatric'),
(6, 'Ali Hassan', '1989-09-30', 'married', 'male', 'Egypt', 'Tanta', 'Nile', '01143476242', '01146676541', 'ali22@gmail.com', 'tumor', 'A', '2020-12-05', '2027-12-05', 'Oncology'),
(7, 'Ahmed Elsayed', '1991-09-30', 'married', 'male', 'Egypt', 'Cairo', 'Nile', '01543476242', '0114664541', 'ahmed22@gmail.com', 'heart', 'A', '2020-10-22', '2028-12-05', 'Cardiology'),
(8, 'Mohamed Kotb', '1995-09-30', 'married', 'male', 'Egypt', 'Cairo', 'Al-Ayni Palace', '01523246442', '01146314254', 'mohamed12@gmail.com', 'Gynecology', 'O', '2018-05-25', '2028-01-31', 'Obstetrics & Gynaecology'),
(9, 'Omar Ali', '1996-03-04', 'single', 'male', 'Egypt', 'Cairo', 'Al-Ayni Palace', '01094782312', '01083065761', 'omar12@gmail.com', 'eyes', 'A', '2018-02-04', '2029-03-16', 'Ophthalmologist');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` enum('single','married') NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `street` varchar(20) DEFAULT NULL,
  `phone1` varchar(11) DEFAULT NULL,
  `phone2` varchar(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `entry_date` date NOT NULL,
  `checkout_date` date DEFAULT NULL,
  `department` enum('Internal Medicine','Pediatric','Cardiology','Nephrology','Oncology','Surgery','Obstetrics & Gynaecology','Ophthalmologist','Neurology') NOT NULL,
  `room_no` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`id`, `firstName`, `lastName`, `date`, `status`, `gender`, `country`, `city`, `street`, `phone1`, `phone2`, `email`, `entry_date`, `checkout_date`, `department`, `room_no`, `doctor_name`) VALUES
(1, 'mustafa', 'ahmed', '1975-03-16', 'single', 'male', 'Egypt', 'Tanta', 'saied', '01096783412', '01287645341', 'ali@gmail.com', '2020-09-15', '2020-09-27', 'Obstetrics & Gynaecology', 1, 'Ahmed Elsayed'),
(2, 'ahmed', 'mohamed', '1980-02-12', 'married', 'male', 'Egypt', 'Tanta', 'sea', '01595784321', '01124876456', 'ahmed@yahoo.com', '2020-09-17', '2020-09-25', 'Surgery', 2, 'Magdy Yacoub');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `access` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `access`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@yahoo.com'),
(2, 'abdo', '123', 'abdallah', 'admin', 'abdo@yahoo.com'),
(3, 'test', 'test', 'test', NULL, 'test@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctorName` (`doctorName`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `doctor_name` (`doctor_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor_details`
--
ALTER TABLE `doctor_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_details`
--
ALTER TABLE `patient_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD CONSTRAINT `patient_details_ibfk_1` FOREIGN KEY (`doctor_name`) REFERENCES `doctor_details` (`doctorName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
