-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 10:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerybag`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblsaveitems`
--

CREATE TABLE `tblsaveitems` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Item` varchar(50) DEFAULT NULL,
  `Quantity` varchar(50) DEFAULT NULL,
  `Status` enum('PENDING','BOUGHT','NOT AVAILABLE') NOT NULL,
  `AddedDate` date DEFAULT NULL,
  `UpdateDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsaveitems`
--

INSERT INTO `tblsaveitems` (`Id`, `UserId`, `Item`, `Quantity`, `Status`, `AddedDate`, `UpdateDate`) VALUES
(2, 1, 'Tomato', '2 Pcs.', 'BOUGHT', '2021-03-11', '0000-00-00'),
(3, 1, 'Chicken', '2Kgs', 'NOT AVAILABLE', '2021-03-03', '0000-00-00'),
(4, 1, 'Posto', '50gms', 'PENDING', '2021-03-04', '0000-00-00'),
(5, 1, 'Milk', '1 Ltr.', 'PENDING', '2021-03-03', '0000-00-00'),
(6, 1, 'Egg', '1 Dzn.', 'BOUGHT', '2021-03-05', '0000-00-00'),
(7, 3, 'Pepsi', '1', 'PENDING', '2021-03-05', '0000-00-00'),
(8, 1, 'Potato', '5 Kg', 'NOT AVAILABLE', '2021-03-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`Id`, `Name`, `Email`, `Username`, `Password`, `CreateDate`) VALUES
(1, 'abcd', 'abcd@gmmail.com', 'abcd', 'abcd', '2021-03-02 18:25:57'),
(3, 'anil khute', 'anil@gmail.com', 'anil', 'anil', '2021-03-03 14:40:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblsaveitems`
--
ALTER TABLE `tblsaveitems`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblsaveitems`
--
ALTER TABLE `tblsaveitems`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
