-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 05:55 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clienttbl`
--

CREATE TABLE `clienttbl` (
  `ID` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Birthdate` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienttbl`
--

INSERT INTO `clienttbl` (`ID`, `Fullname`, `Birthdate`, `Age`, `Address`, `Contact`, `Gender`, `Email`, `Password`, `Status`) VALUES
(1, 'John Michael Keaton', '1999-07-01', '22', 'Angeles City', '', 'Male', 'dvlpr.keaton@gmail.com', 'Dianetorres0113', 1),
(2, 'John Michael Keaton', '1999-07-01', '22', 'Angeles City', '', 'Male', 'keatonguevarra99@gmail.com', 'Dianetorres0113', 1),
(3, 'John Keaton', '1999-07-01', '22', 'Angeles City', '', 'Male', 'John@gmail.com', 'Dianetorres0113', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documenttbl`
--

CREATE TABLE `documenttbl` (
  `DID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `Filename` varbinary(1024) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Type` tinyint(4) NOT NULL,
  `Approved` tinyint(4) NOT NULL,
  `SubmittedDate` varchar(255) NOT NULL,
  `EvaluatedDate` varchar(255) NOT NULL,
  `ApprovedDate` varchar(255) NOT NULL,
  `PaymentDate` varchar(255) NOT NULL,
  `Paid` tinyint(4) NOT NULL,
  `Payment` varchar(255) NOT NULL,
  `Declined` tinyint(4) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Gross` varchar(255) NOT NULL,
  `ORC` varbinary(1052) NOT NULL,
  `CR` varbinary(1052) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documenttbl`
--

INSERT INTO `documenttbl` (`DID`, `CID`, `Filename`, `Status`, `Type`, `Approved`, `SubmittedDate`, `EvaluatedDate`, `ApprovedDate`, `PaymentDate`, `Paid`, `Payment`, `Declined`, `Remarks`, `Size`, `Gross`, `ORC`, `CR`) VALUES
(3, 1, 0x323037312d5765656b6c795f5265706f72745f54656d706c617465332e706466, 1, 0, 0, '2022/02/05', '2022/02/05', '2022/02/05', '', 0, '', 1, 'Not Qualified for the Application', '', '', '', ''),
(4, 2, 0x353238362d4d41574431312d694c532d47756964656c696e65732e706466, 1, 0, 1, '', '2022/02/06', '2022/02/06', '2022/02/06', 1, '10560', 0, '', 'Medium', '21,500', 0x323834342d323037312d5765656b6c795f5265706f72745f54656d706c617465332e706466, ''),
(5, 2, 0x333334362d353238362d4d41574431312d694c532d47756964656c696e65732e706466, 1, 1, 1, '2022/02/06', '2022/02/06', '2022/02/06', '2022/02/06', 1, '10032', 0, '', 'Medium', '21,500', 0x393231342d323037312d5765656b6c795f5265706f72745f54656d706c617465332e706466, ''),
(6, 3, 0x393136312d353238362d4d41574431312d694c532d47756964656c696e6573202831292e706466, 1, 1, 1, '2022/02/06', '2022/02/06', '2022/02/06', '2022/02/06', 1, '3600', 0, '', 'Light', '2,700', 0x353136312d323834342d323037312d5765656b6c795f5265706f72745f54656d706c617465332e706466, '');

-- --------------------------------------------------------

--
-- Table structure for table `registrationofficialstbl`
--

CREATE TABLE `registrationofficialstbl` (
  `ID` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Birthdate` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrationofficialstbl`
--

INSERT INTO `registrationofficialstbl` (`ID`, `Fullname`, `Birthdate`, `Age`, `Address`, `Gender`, `Position`, `Email`, `Password`, `Status`) VALUES
(1, 'Daryll Torres', '1999-07-01', '22', 'Tarlac City', 'Male', 'Evaluator', 'Daryll@gmail.com', 'Dianetorres0113', 1),
(2, 'Diane Torres', '2000-05-31', '21', 'Tarlac City', 'Female', 'Approving', 'Diane@gmail.com', 'Dianetorres0113', 1),
(3, 'Gilbert James ', '1999-07-01', '22', 'Angeles City', 'Male', 'Cashier', 'Giberlt@gmail.com', 'Dianetorres0113', 1),
(4, 'Michael Guevarra', '1999-07-01', '22', 'Angeles City', 'Male', 'Printing of CR', 'Michael@gmail.com', 'Dianetorres0113', 1);

-- --------------------------------------------------------

--
-- Table structure for table `renewalofficialstbl`
--

CREATE TABLE `renewalofficialstbl` (
  `ID` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Birthdate` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renewalofficialstbl`
--

INSERT INTO `renewalofficialstbl` (`ID`, `Fullname`, `Birthdate`, `Age`, `Address`, `Gender`, `Position`, `Email`, `Password`, `Status`) VALUES
(1, 'Neomie Claire', '1999-07-01', '22', 'Angeles City', 'Female', 'Evaluator', 'Neomie@gmail.com', 'Dianetorres0113', 1),
(2, 'Chirstian Hackett', '1999-07-01', '22', 'Angeles City', 'Male', 'Approving', 'Hackett@gmail.com', 'Dianetorres0113', 1),
(3, 'Keaton Aguilar', '1999-07-01', '22', 'Angeles City', 'Male', 'Cashier', 'Keaton@gmail.com', 'Dianetorres0113', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienttbl`
--
ALTER TABLE `clienttbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `documenttbl`
--
ALTER TABLE `documenttbl`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `registrationofficialstbl`
--
ALTER TABLE `registrationofficialstbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `renewalofficialstbl`
--
ALTER TABLE `renewalofficialstbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienttbl`
--
ALTER TABLE `clienttbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documenttbl`
--
ALTER TABLE `documenttbl`
  MODIFY `DID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registrationofficialstbl`
--
ALTER TABLE `registrationofficialstbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `renewalofficialstbl`
--
ALTER TABLE `renewalofficialstbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
