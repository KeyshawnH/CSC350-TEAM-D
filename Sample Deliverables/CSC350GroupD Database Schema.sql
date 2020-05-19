-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 04:17 AM
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
('CIS100', 0, 4),
('CIS115', 2, 2),
('CIS120', 0, 3),
('CIS140', 0, 3),
('CIS155', 2, 3),
('CIS160', 0, 3),
('CIS165', 2, 2),
('CIS180', 0, 4),
('CIS200', 2, 2),
('CIS207', 4, 2),
('CIS220', 0, 4),
('CIS235', 0, 5),
('CIS255', 2, 4),
('CIS280', 0, 4),
('CIS316', 2, 2),
('CIS317', 0, 4),
('CIS325', 0, 4),
('CIS335', 0, 5),
('CIS345', 3, 2),
('CIS359', 2, 2),
('CIS362', 2, 2),
('CIS364', 2, 2),
('CIS365', 0, 5),
('CIS370', 2, 2),
('CIS385', 2, 2),
('CIS390', 2, 2),
('CIS395', 3, 2),
('CIS420', 0, 5),
('CIS440', 0, 4),
('CIS445', 3, 2),
('CIS459', 3, 2),
('CIS465', 5, 5),
('CIS475', 2, 3),
('CIS480', 0, 3),
('CIS485', 2, 2),
('CIS490', 2, 2),
('CIS495', 2, 2),
('CSC101', 2, 2),
('CSC110', 0, 5),
('CSC111', 2, 3),
('CSC210', 3, 2),
('CSC211', 3, 2),
('CSC215', 2, 2),
('CSC230', 3, 3),
('CSC231', 0, 4),
('CSC310', 0, 4),
('CSC330', 0, 4),
('CSC331', 4, 1),
('CSC350', 3, 2),
('CSC410', 0, 4),
('CSC430', 0, 4),
('CSC450', 0, 4),
('CSC470', 2, 3),
('GIS101', 2, 2),
('GIS201', 3, 3),
('GIS261', 2, 2),
('GIS325', 0, 15),
('GIS361', 2, 2);

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
