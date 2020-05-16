-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 06:40 AM
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
-- Database: `scheduling2`
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
('CIS495', 2, 2),
('CSC101', 2, 2),
('CSC211', 3, 2),
('CSC350', 3, 2);

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

--
-- Dumping data for table `roomweek`
--

INSERT INTO `roomweek` (`roomno`, `roomavailibility`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
('F1202', 'yes', 13, 8, 12, 10, 6, 6, 0),
('M1218', 'yes', 2, 2, 0, 0, 0, 0, 0),
('M204', 'yes', 2, 0, 2, 0, 0, 0, 0),
('M305', 'yes', 2, 2, 0, 0, 0, 0, 0);

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

--
-- Dumping data for table `scheduledtimes`
--

INSERT INTO `scheduledtimes` (`secno`, `DayMeet1`, `DayMeet2`, `DayMeet3`, `StartTime1`, `StartTime2`, `StartTime3`, `EndTime1`, `EndTime2`, `EndTime3`) VALUES
(1, 'Monday', 'Wednesday', NULL, '8:00 AM', '10:00 AM', '8:00 AM', '9:00 AM', NULL, NULL),
(2, 'Tuesday', 'Thursday', 'Saturday', '8:00 AM', '10:00 AM', '8:00 AM', '9:00 AM', NULL, NULL),
(3, 'Monday', 'Wednesday', 'Friday', '10:00 AM', '12:00 PM', '9:00 AM', '10:00 AM', NULL, NULL),
(4, 'Tuesday', 'Thursday', NULL, '10:00 AM', '12:00 PM', '9:00 AM', '11:00 AM', NULL, NULL),
(6, 'Monday', 'Wednesday', 'Friday', '12:00 PM', '2:00 PM', '10:00 AM', '12:00 PM', '10:00 AM', '11:00 AM'),
(7, 'Tuesday', 'Wednesday', 'Friday', '12:00 PM', '2:00 PM', '11:00 AM', '12:00 PM', NULL, NULL),
(9, 'Monday', 'Friday', 'Saturday', '2:00 PM', '4:00 PM', '12:00 PM', '2:00 PM', '1:00 PM', '2:00 PM'),
(10, 'Monday', 'Wednesday', NULL, '4:00 PM', '7:00 PM', '4:00 PM', '6:00 PM', NULL, NULL),
(11, 'Monday', 'Wednesday', NULL, '7:00 PM', '9:00 PM', '6:00 PM', '8:00 PM', NULL, NULL),
(12, 'Tuesday', 'Thursday', NULL, '2:00 PM', '4:00 PM', '4:00 PM', '6:00 PM', NULL, NULL),
(13, 'Monday', 'Wednesday', NULL, '4:00 PM', '7:00 PM', '4:00 PM', '6:00 PM', NULL, NULL),
(14, 'Monday', 'Wednesday', NULL, '7:00 PM', '9:00 PM', '6:00 PM', '8:00 PM', NULL, NULL),
(15, 'Tuesday', 'Thursday', NULL, '2:00 PM', '4:00 PM', '4:00 PM', '6:00 PM', NULL, NULL),
(16, 'Tuesday', 'Thursday', NULL, '2:00 PM', '4:00 PM', '4:00 PM', '6:00 PM', NULL, NULL);

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
-- Dumping data for table `sectiondetails`
--

INSERT INTO `sectiondetails` (`secno`, `roomno`, `cono`) VALUES
(1, 'F1202', 'CSC101'),
(2, 'F1202', 'CSC101'),
(4, 'F1202', 'CSC101'),
(5, 'F1202', 'CSC101'),
(6, 'F1202', 'CSC350'),
(7, 'F1202', 'CSC350'),
(8, 'F1202', 'CSC350'),
(9, 'F1202', 'CSC211'),
(10, 'F1202', 'CSC211'),
(11, 'F1202', 'CIS100'),
(12, 'F1202', 'CIS495'),
(13, 'M1209', 'CSC211'),
(14, 'M204', 'CSC101'),
(15, 'M1218', 'CIS100'),
(16, 'M305', 'CIS495');

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
  ADD KEY `fk_roomno_idx` (`roomno`),
  ADD KEY `fk_cono_idx` (`cono`),
  ADD KEY `secno_idx` (`secno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sectiondetails`
--
ALTER TABLE `sectiondetails`
  MODIFY `secno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sectiondetails`
--
ALTER TABLE `sectiondetails`
  ADD CONSTRAINT `fk_cono_idx` FOREIGN KEY (`cono`) REFERENCES `coursedetails` (`cono`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roomno_idx` FOREIGN KEY (`roomno`) REFERENCES `roomweek` (`roomno`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_secno_idx` FOREIGN KEY (`secno`) REFERENCES `scheduledtimes` (`secno`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
