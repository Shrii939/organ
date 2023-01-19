-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2023 at 04:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organn`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `Did` int(11) NOT NULL,
  `DName` varchar(20) NOT NULL,
  `dAddr` varchar(50) NOT NULL,
  `dCont` bigint(20) NOT NULL,
  `dDetls` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`Did`, `DName`, `dAddr`, `dCont`, `dDetls`) VALUES
(1, 'shridhar', 'koteshwara', 123456789, 'healthy');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Hname` varchar(20) NOT NULL,
  `Haddr` varchar(50) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `dt` date DEFAULT NULL,
  `Oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organ`
--

CREATE TABLE `organ` (
  `Oid` int(11) NOT NULL,
  `Did` int(11) NOT NULL,
  `Otype` varchar(20) DEFAULT NULL,
  `Odetails` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organ_bank`
--

CREATE TABLE `organ_bank` (
  `Oid` int(11) NOT NULL,
  `tdetails` varchar(20) DEFAULT NULL,
  `Otype` varchar(20) DEFAULT NULL,
  `oissue` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `organ_bank`
--
DELIMITER $$
CREATE TRIGGER `tiggera` AFTER INSERT ON `organ_bank` FOR EACH ROW insert into triggerA values(new.Oid , new.tdetails,new.Otype,new.oissue )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `triggerA`
--

CREATE TABLE `triggerA` (
  `Oid` int(11) DEFAULT NULL,
  `tdetails` varchar(20) DEFAULT NULL,
  `Otype` varchar(20) DEFAULT NULL,
  `oissue` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`Did`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Hname`,`Oid`),
  ADD KEY `Oid` (`Oid`);

--
-- Indexes for table `organ`
--
ALTER TABLE `organ`
  ADD PRIMARY KEY (`Oid`,`Did`),
  ADD KEY `Did` (`Did`);

--
-- Indexes for table `organ_bank`
--
ALTER TABLE `organ_bank`
  ADD PRIMARY KEY (`Oid`);

--
-- Indexes for table `triggerA`
--
ALTER TABLE `triggerA`
  ADD KEY `Oid` (`Oid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `Did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Oid`) REFERENCES `organ` (`Oid`) ON DELETE CASCADE;

--
-- Constraints for table `organ`
--
ALTER TABLE `organ`
  ADD CONSTRAINT `organ_ibfk_1` FOREIGN KEY (`Did`) REFERENCES `donor` (`Did`) ON DELETE CASCADE;

--
-- Constraints for table `organ_bank`
--
ALTER TABLE `organ_bank`
  ADD CONSTRAINT `organ_bank_ibfk_1` FOREIGN KEY (`Oid`) REFERENCES `organ` (`Oid`) ON DELETE CASCADE;

--
-- Constraints for table `triggerA`
--
ALTER TABLE `triggerA`
  ADD CONSTRAINT `triggerA_ibfk_1` FOREIGN KEY (`Oid`) REFERENCES `organ` (`Oid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
