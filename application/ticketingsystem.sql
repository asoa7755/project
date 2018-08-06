-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 01:54 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptid` int(11) NOT NULL,
  `departmentname` char(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departmentservices`
--

CREATE TABLE `departmentservices` (
  `serviceID` int(11) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_staff`
--

CREATE TABLE `department_staff` (
  `userID` int(11) NOT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` int(11) NOT NULL,
  `departmetnID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `ticketDate` datetime NOT NULL,
  `statusID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticketsssigned`
--

CREATE TABLE `ticketsssigned` (
  `assignmentID` int(11) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `ticketID` int(11) NOT NULL,
  `datesssigned` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `name` char(30) NOT NULL,
  `email` char(30) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `name`, `email`, `role`) VALUES
('shafeeq', 'abc', 'Muhammad Shafeeq', 'a@gmail.com', 1),
('tree', 'erer', 'erer', 'erer', 2),
('ahmed2', '123', 'Ahmed', 'a@gmail.com', 2),
('ahmed', '123', 'Ahmed', 'a@gmail.com', 1),
('ahmed3', '123', 'Ahmed', 'a@gmail.com', 3),
('ahmed4', '123', 'Ahmed', 'a@gmail.com', 3),
('ahmed5', '123', 'Ahmed', 'a@gmail.com', 3),
('ahmed6', '123', 'Ahmed', 'a@gmail.com', 3),
('ahmed7', '123', 'Ahmed', 'a@gmail.com', 3),
('ahmed8', '123', 'Ahmed', 'a@gmail.com', 3),
('ahmed9', '123', 'ahmed9', 'a@gmail.com', 3),
('ahmed10', '123', 'ahmed', 'a@gmail.com', 2),
('ahmed11', '123', 'Ahmed', 'a@gmail.com', 1),
('ahmed12', '123', 'Ahmed', 'a@gmail.com', 1),
('ahmed13', '1', 'Ahmed', 'a@gmail.com', 1),
('a1', '1', 'Ahmed', 'a@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `departmentservices`
--
ALTER TABLE `departmentservices`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `ticketsssigned`
--
ALTER TABLE `ticketsssigned`
  ADD PRIMARY KEY (`assignmentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departmentservices`
--
ALTER TABLE `departmentservices`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticketsssigned`
--
ALTER TABLE `ticketsssigned`
  MODIFY `assignmentID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
