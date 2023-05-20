-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 06:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evsu_qrcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Userid` int(11) NOT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `qrID` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Userid`, `Firstname`, `Lastname`, `Username`, `Password`, `Email`, `role`, `qrID`, `date`) VALUES
(1, 'Kevin', 'Saludaga', 'kevzkie213', 'e10adc3949ba59abbe56e057f20f883e', 'kevzkie213@gmail.com', 'admin', 'Kevin-67e302c4b9e2f0511d101dcda767f9818208b34e70dd0b4910aa5c226c2c50f6', '2023-05-19 06:46:12'),
(2, 'James', 'Sanchez', 'james123', 'e10adc3949ba59abbe56e057f20f883e', 'dagat213@gmail.com', 'user', 'James-9ba36afc4e560bf811caefc0c7fddddf5bdba06b7669a117a1e194b54205c06a', '2023-05-20 02:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `delete_history`
--

CREATE TABLE `delete_history` (
  `deleteID` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `qrID` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loggedin_history`
--

CREATE TABLE `loggedin_history` (
  `LoggedinID` int(11) NOT NULL,
  `UserID` varchar(255) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `OTP` varchar(255) DEFAULT NULL,
  `login_type` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loggedin_history`
--

INSERT INTO `loggedin_history` (`LoggedinID`, `UserID`, `Username`, `role`, `OTP`, `login_type`, `date`) VALUES
(1, '1', 'kevzkie213', 'user', '518433', 0, '2023-05-19 07:41:04'),
(2, '1', 'kevzkie213', '', NULL, 1, '2023-05-19 07:45:40'),
(3, '2', 'james123', '', NULL, 1, '2023-05-20 02:47:55'),
(4, '2', 'james123', '', NULL, 1, '2023-05-20 03:20:42'),
(5, '2', 'james123', '', NULL, 1, '2023-05-20 03:36:26'),
(6, '2', 'james123', '', NULL, 1, '2023-05-20 03:45:32'),
(7, '1', 'kevzkie213', '', NULL, 1, '2023-05-20 04:13:39'),
(8, '1', 'kevzkie213', '', NULL, 1, '2023-05-20 04:15:09'),
(9, '1', 'kevzkie213', '', NULL, 1, '2023-05-20 04:16:46'),
(10, '2', 'james123', '', NULL, 1, '2023-05-20 04:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `postID` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`postID`, `title`, `description`, `link`) VALUES
(1, 'users', 'shows the list of users', 'users.php');

-- --------------------------------------------------------

--
-- Table structure for table `update_history`
--

CREATE TABLE `update_history` (
  `updateID` int(11) NOT NULL,
  `userID` varchar(255) DEFAULT NULL,
  `qrID` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Userid`);

--
-- Indexes for table `delete_history`
--
ALTER TABLE `delete_history`
  ADD PRIMARY KEY (`deleteID`);

--
-- Indexes for table `loggedin_history`
--
ALTER TABLE `loggedin_history`
  ADD PRIMARY KEY (`LoggedinID`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`postID`);
ALTER TABLE `search` ADD FULLTEXT KEY `title` (`title`,`description`);

--
-- Indexes for table `update_history`
--
ALTER TABLE `update_history`
  ADD PRIMARY KEY (`updateID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delete_history`
--
ALTER TABLE `delete_history`
  MODIFY `deleteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loggedin_history`
--
ALTER TABLE `loggedin_history`
  MODIFY `LoggedinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `update_history`
--
ALTER TABLE `update_history`
  MODIFY `updateID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
