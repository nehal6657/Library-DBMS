-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 07:47 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(120) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_pswd` varchar(15) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `A_id` varchar(15) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` int(15) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `publisher` varchar(25) DEFAULT NULL,
  `edition` int(12) DEFAULT NULL,
  `ref_flag` tinyint(1) DEFAULT NULL,
  `t_flag` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `copy`
--

CREATE TABLE `copy` (
  `ISBN` int(15) NOT NULL,
  `C_id` int(11) NOT NULL,
  `purchase_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Cid` int(11) NOT NULL,
  `Cname` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `I_id` int(11) NOT NULL,
  `issuer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issuer`
--

CREATE TABLE `issuer` (
  `issuer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issuer_id` int(11) NOT NULL,
  `ISBN` int(15) NOT NULL,
  `C_id` int(11) NOT NULL,
  `issue_date` datetime DEFAULT NULL,
  `return_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refer`
--

CREATE TABLE `refer` (
  `ISBN` int(15) NOT NULL,
  `I_id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Sid` int(6) NOT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Name` varchar(25) DEFAULT NULL,
  `Pass` varchar(15) DEFAULT NULL,
  `issuer_id` int(11) DEFAULT NULL,
  `type` int(5) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Sid`, `Username`, `Name`, `Pass`, `issuer_id`, `type`, `email`) VALUES
(1, 'shubhanshuagpla', 'shubhanshu0608', '1234', NULL, 0, 'shubhanshuagrawal0608@gmail.com'),
(2, 'b19058', 'ShellLord83', '1234', NULL, 0, 'b19058@students.iitmandi.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `I_id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tex`
--

CREATE TABLE `tex` (
  `ISBN` int(15) NOT NULL,
  `I_id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `univ`
--

CREATE TABLE `univ` (
  `U_id` varchar(15) NOT NULL,
  `U_name` varchar(20) DEFAULT NULL,
  `totalbooks` int(200) DEFAULT NULL,
  `issuer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `written`
--

CREATE TABLE `written` (
  `A_id` varchar(15) NOT NULL,
  `ISBN` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `copy`
--
ALTER TABLE `copy`
  ADD PRIMARY KEY (`C_id`,`ISBN`),
  ADD KEY `FK_ISBN4` (`ISBN`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`I_id`),
  ADD KEY `FK_issuer_id` (`issuer_id`);

--
-- Indexes for table `issuer`
--
ALTER TABLE `issuer`
  ADD PRIMARY KEY (`issuer_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`ISBN`,`C_id`,`issuer_id`),
  ADD KEY `FK_issuer_id5` (`issuer_id`),
  ADD KEY `FK_C_id5` (`C_id`);

--
-- Indexes for table `refer`
--
ALTER TABLE `refer`
  ADD PRIMARY KEY (`ISBN`,`I_id`,`Cid`),
  ADD KEY `FK_I_id` (`I_id`),
  ADD KEY `FK_Cid` (`Cid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Sid`),
  ADD KEY `FK_issuer_id7` (`issuer_id`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`I_id`,`Cid`),
  ADD KEY `FK_Cid1` (`Cid`);

--
-- Indexes for table `tex`
--
ALTER TABLE `tex`
  ADD PRIMARY KEY (`ISBN`,`I_id`,`Cid`),
  ADD KEY `FK_I_id2` (`I_id`),
  ADD KEY `FK_Cid2` (`Cid`);

--
-- Indexes for table `univ`
--
ALTER TABLE `univ`
  ADD PRIMARY KEY (`U_id`),
  ADD KEY `FK_issuer_id6` (`issuer_id`);

--
-- Indexes for table `written`
--
ALTER TABLE `written`
  ADD PRIMARY KEY (`A_id`,`ISBN`),
  ADD KEY `FK_ISBN3` (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Sid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `copy`
--
ALTER TABLE `copy`
  ADD CONSTRAINT `FK_ISBN4` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `FK_issuer_id` FOREIGN KEY (`issuer_id`) REFERENCES `issuer` (`issuer_id`);

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `FK_C_id5` FOREIGN KEY (`C_id`) REFERENCES `copy` (`C_id`),
  ADD CONSTRAINT `FK_ISBN5` FOREIGN KEY (`ISBN`) REFERENCES `copy` (`ISBN`),
  ADD CONSTRAINT `FK_issuer_id5` FOREIGN KEY (`issuer_id`) REFERENCES `issuer` (`issuer_id`);

--
-- Constraints for table `refer`
--
ALTER TABLE `refer`
  ADD CONSTRAINT `FK_Cid` FOREIGN KEY (`Cid`) REFERENCES `courses` (`Cid`),
  ADD CONSTRAINT `FK_ISBN` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `FK_I_id` FOREIGN KEY (`I_id`) REFERENCES `instructor` (`I_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_issuer_id7` FOREIGN KEY (`issuer_id`) REFERENCES `issuer` (`issuer_id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `FK_Cid1` FOREIGN KEY (`Cid`) REFERENCES `courses` (`Cid`),
  ADD CONSTRAINT `FK_I_id1` FOREIGN KEY (`I_id`) REFERENCES `instructor` (`I_id`);

--
-- Constraints for table `tex`
--
ALTER TABLE `tex`
  ADD CONSTRAINT `FK_Cid2` FOREIGN KEY (`Cid`) REFERENCES `courses` (`Cid`),
  ADD CONSTRAINT `FK_ISBN2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `FK_I_id2` FOREIGN KEY (`I_id`) REFERENCES `instructor` (`I_id`);

--
-- Constraints for table `univ`
--
ALTER TABLE `univ`
  ADD CONSTRAINT `FK_issuer_id6` FOREIGN KEY (`issuer_id`) REFERENCES `issuer` (`issuer_id`);

--
-- Constraints for table `written`
--
ALTER TABLE `written`
  ADD CONSTRAINT `FK_A_id3` FOREIGN KEY (`A_id`) REFERENCES `author` (`A_id`),
  ADD CONSTRAINT `FK_ISBN3` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
