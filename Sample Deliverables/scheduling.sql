-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 09:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails`
--

CREATE TABLE `coursedetails` (
  `cono` varchar(10) NOT NULL,
  `labhr` int(5) NOT NULL,
  `lechr` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursedetails`
--

INSERT INTO `coursedetails` (`cono`, `labhr`, `lechr`) VALUES
('CIS 100', 0, 4),
('CIS 115', 2, 2),
('CIS 120', 0, 3),
('CIS 140', 0, 3),
('CIS 155', 2, 3),
('CIS 160', 0, 3),
('CIS 165', 2, 2),
('CIS 180', 0, 4),
('CIS 200', 2, 2),
('CIS 207', 4, 2),
('CIS 220', 0, 4),
('CIS 235', 0, 5),
('CIS 255', 2, 4),
('CIS 280', 0, 4),
('CIS 316', 2, 2),
('CIS 317', 0, 4),
('CIS 325', 0, 4),
('CIS 335', 0, 5),
('CIS 345', 3, 2),
('CIS 359', 2, 2),
('CIS 362', 2, 2),
('CIS 364', 2, 2),
('CIS 365', 0, 5),
('CIS 370', 2, 2),
('CIS 385', 2, 2),
('CIS 390', 2, 2),
('CIS 395', 3, 2),
('CIS 420', 0, 5),
('CIS 440', 0, 4),
('CIS 445', 3, 2),
('CIS 459', 3, 2),
('CIS 465', 5, 5),
('CIS 475', 2, 3),
('CIS 480', 0, 3),
('CIS 485', 2, 2),
('CIS 490', 2, 2),
('CIS 495', 2, 2),
('CSC 101', 2, 2),
('CSC 110', 0, 5),
('CSC 111', 2, 3),
('CSC 210', 3, 2),
('CSC 211', 3, 2),
('CSC 215', 2, 2),
('CSC 230', 3, 3),
('CSC 231', 0, 4),
('CSC 310', 0, 4),
('CSC 330', 0, 4),
('CSC 331', 4, 1),
('CSC 350', 3, 2),
('CSC 410', 0, 4),
('CSC 430', 0, 4),
('CSC 450', 0, 4),
('CSC 470', 2, 3),
('GIS 101', 2, 2),
('GIS 201', 3, 3),
('GIS 261', 2, 2),
('GIS 325', 0, 15),
('GIS 361', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roomweek`
--

CREATE TABLE `roomweek` (
  `roomno` varchar(10) NOT NULL,
  `roomavailibility` varchar(10) DEFAULT NULL,
  `monday` int(11) DEFAULT NULL,
  `tuesday` int(11) DEFAULT NULL,
  `wednesday` int(11) DEFAULT NULL,
  `thursday` int(11) DEFAULT NULL,
  `friday` int(11) DEFAULT NULL,
  `saturday` int(11) DEFAULT NULL,
  `sunday` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scheduledtimes`
--

CREATE TABLE `scheduledtimes` (
  `secno` int(5) NOT NULL,
  `DayMeet1` varchar(10) NOT NULL,
  `DayMeet2` varchar(10) DEFAULT NULL,
  `DayMeet3` varchar(10) DEFAULT NULL,
  `StartTime1` varchar(15) NOT NULL,
  `StartTime2` varchar(15) DEFAULT NULL,
  `StartTime3` varchar(15) DEFAULT NULL,
  `EndTime1` varchar(15) NOT NULL,
  `EndTime2` varchar(15) DEFAULT NULL,
  `EndTime3` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sectiondetails`
--

CREATE TABLE `sectiondetails` (
  `secno` int(5) NOT NULL,
  `roomno` varchar(10) NOT NULL,
  `cono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD PRIMARY KEY (`cono`);

--
-- Indexes for table `roomweek`
--
ALTER TABLE `roomweek`
  ADD PRIMARY KEY (`roomno`);

--
-- Indexes for table `scheduledtimes`
--
ALTER TABLE `scheduledtimes`
  ADD PRIMARY KEY (`secno`);

--
-- Indexes for table `sectiondetails`
--
ALTER TABLE `sectiondetails`
  ADD PRIMARY KEY (`secno`,`roomno`,`cono`),
  ADD KEY `roomno_idx` (`roomno`),
  ADD KEY `cono_idx` (`cono`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sectiondetails`
--
ALTER TABLE `sectiondetails`
  ADD CONSTRAINT `cono_idx` FOREIGN KEY (`cono`) REFERENCES `coursedetails` (`cono`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `roomno_idx` FOREIGN KEY (`roomno`) REFERENCES `roomweek` (`roomno`),
  ADD CONSTRAINT `secno_idx` FOREIGN KEY (`secno`) REFERENCES `scheduledtimes` (`secno`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
