-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2023 at 08:41 AM
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
(1, 'shridhar', 'ktoeswara', 123455, 'boy 20yo');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Hname` varchar(20) NOT NULL,
  `Haddr` varchar(20) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `dt` date DEFAULT NULL,
  `Oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Hname`, `Haddr`, `contact`, `dt`, `Oid`) VALUES
('my hst', 'asdf', 1234, '2023-01-19', 2),
('my hst', 'asdf', 1234, '2023-01-19', 3),
('aj', 'banglore', 1234456, '2023-01-17', 5);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `make_history` BEFORE INSERT ON `orders` FOR EACH ROW INSERT INTO triggerA
SELECT * FROM organ
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `organ`
--

CREATE TABLE `organ` (
  `Oid` int(11) NOT NULL,
  `Did` int(11) NOT NULL,
  `Otype` varchar(20) DEFAULT NULL,
  `Odetails` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organ`
--

INSERT INTO `organ` (`Oid`, `Did`, `Otype`, `Odetails`) VALUES
(7, 1, 'eye', 'ha');

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
-- Dumping data for table `organ_bank`
--

INSERT INTO `organ_bank` (`Oid`, `tdetails`, `Otype`, `oissue`) VALUES
(7, 'rejected', 'eye', 'was fine meri marzi');

-- --------------------------------------------------------

--
-- Table structure for table `triggerA`
--

CREATE TABLE `triggerA` (
  `Oid` int(11) NOT NULL,
  `Did` int(11) NOT NULL,
  `Otype` varchar(20) NOT NULL,
  `Odetails` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `triggerA`
--

INSERT INTO `triggerA` (`Oid`, `Did`, `Otype`, `Odetails`) VALUES
(5, 1, 'heart', 'healthy lovable heart');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, '20cs082', '1234'),
(3, '', '1234'),
(4, '', '');

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
  ADD PRIMARY KEY (`Oid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `Did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
