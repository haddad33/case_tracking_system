-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2020 at 02:11 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LabDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_tbl`
--

CREATE TABLE `client_tbl` (
  `client_Id` int(11) NOT NULL,
  `client_Name` varchar(45) DEFAULT NULL,
  `client_Complex` varchar(45) DEFAULT NULL,
  `dremail` varchar(50) NOT NULL,
  `drmobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `color_tbl`
--

CREATE TABLE `color_tbl` (
  `color_Id` int(1) NOT NULL,
  `color_Name` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mana_Line_tbl`
--

CREATE TABLE `mana_Line_tbl` (
  `mana_Line_Id` int(11) NOT NULL,
  `order_Received` datetime DEFAULT NULL,
  `impression_Pouring` datetime DEFAULT NULL,
  `mpression_Pouring_Status` int(11) NOT NULL DEFAULT '0',
  `order_Designing` datetime DEFAULT NULL,
  `order_Designing_Status` int(11) NOT NULL DEFAULT '0',
  `order_Milling` datetime DEFAULT NULL,
  `order_Milling_Status` int(11) NOT NULL DEFAULT '0',
  `order_Frilling` datetime DEFAULT NULL,
  `order_Frilling_Status` int(11) NOT NULL DEFAULT '0',
  `order_Finshing` datetime DEFAULT NULL,
  `order_Finshing_Status` int(11) NOT NULL DEFAULT '0',
  `order_Delivered` datetime DEFAULT NULL,
  `order_Delivered_Status` int(11) NOT NULL DEFAULT '0',
  `order_tbl_order_Id` int(11) NOT NULL,
  `order_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_Id` int(11) NOT NULL,
  `order_Number` int(11) DEFAULT NULL,
  `upper_Right` varchar(8) DEFAULT NULL,
  `upper_Left` varchar(8) DEFAULT NULL,
  `lower_Right` varchar(8) DEFAULT NULL,
  `lower_Left` varchar(8) DEFAULT NULL,
  `order_Note` varchar(1000) DEFAULT NULL,
  `order_Date_Creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Patient` varchar(30) NOT NULL,
  `datedue` date NOT NULL,
  `client_client_Id` int(11) NOT NULL,
  `type_type_Id` int(11) NOT NULL,
  `color_color_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type_tbl`
--

CREATE TABLE `type_tbl` (
  `type_Id` int(11) NOT NULL,
  `type_Name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_Id` int(11) NOT NULL,
  `user_Name` varchar(45) DEFAULT NULL,
  `user_Password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_tbl`
--
ALTER TABLE `client_tbl`
  ADD PRIMARY KEY (`client_Id`);

--
-- Indexes for table `color_tbl`
--
ALTER TABLE `color_tbl`
  ADD PRIMARY KEY (`color_Id`);

--
-- Indexes for table `mana_Line_tbl`
--
ALTER TABLE `mana_Line_tbl`
  ADD PRIMARY KEY (`mana_Line_Id`,`order_tbl_order_Id`),
  ADD KEY `fk_mana_Line_tbl_order_tbl1_idx` (`order_tbl_order_Id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_Id`,`client_client_Id`,`type_type_Id`,`color_color_Id`),
  ADD KEY `fk_order_client_idx` (`client_client_Id`),
  ADD KEY `fk_order_type1_idx` (`type_type_Id`),
  ADD KEY `fk_order_color1_idx` (`color_color_Id`);

--
-- Indexes for table `type_tbl`
--
ALTER TABLE `type_tbl`
  ADD PRIMARY KEY (`type_Id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_Id`),
  ADD UNIQUE KEY `user_Name_UNIQUE` (`user_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_tbl`
--
ALTER TABLE `client_tbl`
  MODIFY `client_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_tbl`
--
ALTER TABLE `color_tbl`
  MODIFY `color_Id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mana_Line_tbl`
--
ALTER TABLE `mana_Line_tbl`
  MODIFY `mana_Line_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_tbl`
--
ALTER TABLE `type_tbl`
  MODIFY `type_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mana_Line_tbl`
--
ALTER TABLE `mana_Line_tbl`
  ADD CONSTRAINT `fk_mana_Line_tbl_order_tbl1` FOREIGN KEY (`order_tbl_order_Id`) REFERENCES `order_tbl` (`order_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `fk_order_client` FOREIGN KEY (`client_client_Id`) REFERENCES `client_tbl` (`client_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_color1` FOREIGN KEY (`color_color_Id`) REFERENCES `color_tbl` (`color_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_type1` FOREIGN KEY (`type_type_Id`) REFERENCES `type_tbl` (`type_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
