-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2026 at 10:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cow`
--
CREATE DATABASE db_cow;
USE db_cow;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disease`
--

CREATE TABLE `tbl_disease` (
  `Cow_ID` int(11) NOT NULL,
  `D_Name` varchar(50) NOT NULL,
  `Symptoms` varchar(50) NOT NULL,
  `Diagnosis_Date` date NOT NULL,
  `Treatment` varchar(250) NOT NULL,
  `Store_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_disease`
--

INSERT INTO `tbl_disease` (`Cow_ID`, `D_Name`, `Symptoms`, `Diagnosis_Date`, `Treatment`, `Store_date`) VALUES
(0, 'Foot and Mouth Disease', 'Fever and mouth sores', '2026-05-13', 'Antibiotics and isolation', '0000-00-00'),
(2, 'Mastitis', 'Swollen udder and pain', '2026-05-16', 'Udder cleaning and antibiotics', '2026-05-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_disease`
--
ALTER TABLE `tbl_disease`
  ADD PRIMARY KEY (`Cow_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
