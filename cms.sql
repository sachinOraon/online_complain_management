-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2018 at 03:19 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('sachin', 'acer');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `cid` int(11) NOT NULL,
  `reg_no` varchar(8) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `issue` text,
  `subject` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stud_detail`
--

CREATE TABLE `stud_detail` (
  `reg_no` varchar(8) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `sem` tinyint(1) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_detail`
--

INSERT INTO `stud_detail` (`reg_no`, `fname`, `lname`, `branch`, `sem`, `password`) VALUES
('2016CA63', 'Rohindra', 'Murmu', 'M.C.A.', 3, '1234'),
('2017CA17', 'Rohit', 'Ranjan', 'MCA', 3, '1234'),
('2017ca18', 'Jaihind', 'Rao', 'M.C.A.', 3, '1234'),
('2017CA21', 'Lokesh', 'Chandra', 'M.C.A.', 3, '1234'),
('2017CA26', 'Ritesh', 'Kumar', 'M.C.A.', 3, '1234'),
('2017ca60', 'Pratik', 'Bele', 'MCA', 3, '1234'),
('2017CA68', 'Sarvesh', 'Rawat', 'M.C.A.', 3, '1234'),
('2017CA75', 'Sachin', 'Oraon', 'M.C.A', 5, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `reg_no` (`reg_no`);

--
-- Indexes for table `stud_detail`
--
ALTER TABLE `stud_detail`
  ADD PRIMARY KEY (`reg_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `stud_detail` (`reg_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
