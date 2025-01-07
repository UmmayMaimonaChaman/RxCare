-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 09:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rxcare_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` decimal(7,0) NOT NULL,
  `A_USERNAME` varchar(50) NOT NULL,
  `A_PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `A_USERNAME`, `A_PASSWORD`) VALUES
(1, 'adminCP', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` decimal(6,0) NOT NULL,
  `C_FNAME` varchar(30) NOT NULL,
  `C_LNAME` varchar(30) DEFAULT NULL,
  `C_AGE` int(11) NOT NULL,
  `C_SEX` varchar(6) NOT NULL,
  `C_PHNO` decimal(10,0) NOT NULL,
  `C_MAIL` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_FNAME`, `C_LNAME`, `C_AGE`, `C_SEX`, `C_PHNO`, `C_MAIL`) VALUES
(987101, 'Prova', 'Nazifa', 22, 'Female', 1234567850, 'prova@gmail.com'),
(987102, 'Chaman', 'Ummay', 24, 'Feale', 1234598675, 'umc@gmail.com'),
(987103, 'Onon', 'Goru', 45, 'Female', 5796398236, 'onongoru@yahoo.com'),
(987104, 'Jubaida', 'Biral', 30, 'Female', 123456635, 'jubaidabilai@gmail.com'),
(987105, 'Pritha', 'Anjum', 20, 'Female', 671234567, 'pritha@gmail.com'),
(987106, 'Rizve', 'Gondar', 23, 'Male', 876543234, 'gondar@yahoo.com'),
(987107, 'Bolod', 'Bhai', 35, 'Male', 8765425659, 'bolod@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_ID` decimal(7,0) NOT NULL,
  `E_FNAME` varchar(30) NOT NULL,
  `E_LNAME` varchar(30) DEFAULT NULL,
  `BDATE` date NOT NULL,
  `E_AGE` int(11) NOT NULL,
  `E_SEX` varchar(6) NOT NULL,
  `E_TYPE` varchar(20) NOT NULL,
  `E_JDATE` date NOT NULL,
  `E_SAL` decimal(8,2) NOT NULL,
  `E_PHNO` decimal(10,0) NOT NULL,
  `E_MAIL` varchar(40) DEFAULT NULL,
  `E_ADD` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_ID`, `E_FNAME`, `E_LNAME`, `BDATE`, `E_AGE`, `E_SEX`, `E_TYPE`, `E_JDATE`, `E_SAL`, `E_PHNO`, `E_MAIL`, `E_ADD`) VALUES
(1, 'Admin', '-', '2050-08-20', 21, 'Female', 'Admin', '2009-06-24', 95000.00, 1715003815, 'chaman@gmail.com', 'Dhaka'),
(4567001, 'Admin', '', '2003-08-20', 21, 'Female', 'Owner', '2050-12-23', 25000.00, 1715003815, 'umc@gmail.com', 'Dhaka'),
(4567002, 'Prova', 'Nazifa', '2002-05-10', 22, 'Female', 'Pharmacist', '2050-12-24', 45000.00, 1776334708, 'prova@gmail.com', 'Dhaka'),
(4567003, 'Chaman', 'Maimona', '2002-08-20', 22, 'Female', 'Pharmacist', '2049-12-23', 990000.00, 7854123694, 'chowmein@gmail.com', 'Mirpur'),
(4567005, 'Jubaida', 'Cat', '2003-11-19', 21, 'Female', 'Biotechnologist', '2017-05-16', 32000.00, 7894532165, 'jubaida@gmail.com', 'Mirpur'),
(4567006, 'Rizve', 'Ahmed', '2001-10-07', 23, 'Male', 'Electrician', '2028-12-23', 28000.00, 7896541234, 'rizve@gmail.com', 'Manikgonj'),
(4567009, 'Onon', 'Taznia', '2002-05-26', 22, 'Female', 'Manager', '2010-05-06', 80000.00, 1854123695, 'onon@gmail.com', 'Mugdha'),
(4567010, 'Nazifa', 'Prova', '1993-04-05', 27, 'Female', 'Cleaner', '2036-01-18', 30000.00, 7896541235, 'procg4@gmail.com', 'Mohammadpur');

-- --------------------------------------------------------

--
-- Table structure for table `meds`
--

CREATE TABLE `meds` (
  `MED_ID` decimal(6,0) NOT NULL,
  `MED_NAME` varchar(50) NOT NULL,
  `MED_QTY` int(11) NOT NULL,
  `CATEGORY` varchar(20) DEFAULT NULL,
  `MED_PRICE` decimal(6,2) NOT NULL,
  `LOCATION_RACK` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meds`
--

INSERT INTO `meds` (`MED_ID`, `MED_NAME`, `MED_QTY`, `CATEGORY`, `MED_PRICE`, `LOCATION_RACK`) VALUES
(123001, 'Rapilog', 645, 'Injection', 1.93, 'rack 5'),
(123002, 'Amoxicillin', 90, 'Capsule', 2.50, 'rack 6'),
(123003, 'Ansulin', 25, 'Injection', 5.00, 'rack 3'),
(123004, 'Clindamycin', 440, 'Capsule', 1.25, 'rack 4'),
(123005, 'Doxycycline', 145, 'Tablet', 6.00, 'rack 2'),
(123006, 'Levofloxacine', 35, 'Tablet', 50.00, 'rack 10'),
(123007, 'Tylenol', 15, 'Tablet', 5.00, 'rack 7'),
(123008, 'Maxpro', 90, 'Tablet', 3.00, 'rack 8'),
(123009, 'Napa', 35, 'Tablet', 4.00, 'rack 3'),
(123010, 'Voltalin 50mg', 600, 'Suppository', 3.50, 'rack 9'),
(123011, 'Indever', 115, 'Tablet', 80.00, 'rack 7');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `P_ID` decimal(4,0) NOT NULL,
  `MED_ID` decimal(6,0) NOT NULL,
  `P_QTY` int(11) NOT NULL,
  `P_AMT` decimal(10,2) DEFAULT NULL,
  `PUR_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`P_ID`, `MED_ID`, `P_QTY`, `P_AMT`, `PUR_date`) VALUES
(1001, 123010, 200, 1500.50, '2020-08-24'),
(1002, 123002, 1000, 3000.00, '2020-02-05'),
(1003, 123006, 20, 800.00, '2020-07-03'),
(1004, 123004, 250, 1000.00, '2020-03-30'),
(1005, 123005, 200, 1200.00, '2020-09-14'),
(1006, 123010, 500, 1500.00, '2020-10-17'),
(1007, 123001, 500, 450.00, '2020-11-11');

--
-- Triggers `purchase`
--
DELIMITER $$
CREATE TRIGGER `QTYDELETE` AFTER DELETE ON `purchase` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY-old.P_QTY WHERE meds.MED_ID=old.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `QTYINSERT` AFTER INSERT ON `purchase` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY+new.P_QTY WHERE meds.MED_ID=new.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `QTYUPDATE` AFTER UPDATE ON `purchase` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY-old.P_QTY WHERE meds.MED_ID=new.MED_ID;
UPDATE meds SET MED_QTY=MED_QTY+new.P_QTY WHERE meds.MED_ID=new.MED_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SALE_ID` int(11) NOT NULL,
  `C_ID` decimal(6,0) NOT NULL,
  `S_DATE` date DEFAULT NULL,
  `S_TIME` time DEFAULT NULL,
  `TOTAL_AMT` decimal(8,2) DEFAULT NULL,
  `E_ID` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SALE_ID`, `C_ID`, `S_DATE`, `S_TIME`, `TOTAL_AMT`, `E_ID`) VALUES
(1, 987101, '2020-04-15', '13:23:03', 180.00, 4567009),
(2, 987106, '2020-04-21', '20:19:31', 585.00, 1),
(3, 987103, '2020-04-15', '11:23:53', 120.00, 4567010),
(4, 987104, '2020-04-14', '18:20:00', 955.00, 4567006),
(5, 987103, '2020-04-21', '15:24:43', 45.00, 1),
(6, 987102, '2020-03-11', '10:24:43', 140.00, 4567001),
(7, 987105, '2020-04-24', '00:25:54', 350.00, 1),
(8, 987104, '2020-04-24', '00:47:47', 35.00, 4567001),
(12, 987103, '2020-04-24', '19:33:16', 60.00, 1),
(13, 987104, '2020-04-24', '21:15:56', 62.50, 4567001),
(15, 987107, '2020-12-04', '18:39:46', 420.00, 1),
(16, 987106, '2020-12-04', '18:52:21', 30.00, 1),
(17, 987103, '2020-12-04', '19:35:56', 57.50, 1),
(18, 987105, '2020-12-04', '19:36:56', 160.00, 4567001),
(20, 987103, '2020-12-04', '22:53:18', 150.00, 4567001);

--
-- Triggers `sales`
--
DELIMITER $$
CREATE TRIGGER `SALE_ID_DELETE` BEFORE DELETE ON `sales` FOR EACH ROW BEGIN
DELETE from sales_items WHERE sales_items.SALE_ID=old.SALE_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `SALE_ID` int(11) NOT NULL,
  `MED_ID` decimal(6,0) NOT NULL,
  `SALE_QTY` int(11) NOT NULL,
  `TOT_PRICE` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`SALE_ID`, `MED_ID`, `SALE_QTY`, `TOT_PRICE`) VALUES
(1, 123011, 2, 160.00),
(2, 123003, 75, 225.00),
(2, 123005, 60, 360.00),
(3, 123008, 40, 120.00),
(4, 123010, 250, 875.00),
(4, 123011, 1, 80.00),
(5, 123001, 45, 45.00),
(6, 123006, 2, 100.00),
(6, 123009, 10, 40.00),
(7, 123001, 100, 100.00),
(7, 123003, 50, 250.00),
(8, 123001, 10, 10.00),
(8, 123002, 10, 25.00),
(12, 123005, 10, 60.00),
(13, 123002, 25, 62.50),
(15, 123005, 45, 270.00),
(15, 123006, 3, 150.00),
(16, 123008, 10, 30.00),
(17, 123004, 10, 12.50),
(17, 123007, 5, 25.00),
(17, 123009, 5, 20.00),
(18, 123011, 2, 160.00),
(20, 123001, 1, 1.00);

--
-- Triggers `sales_items`
--
DELIMITER $$
CREATE TRIGGER `SALEDELETE` AFTER DELETE ON `sales_items` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY+old.SALE_QTY WHERE meds.MED_ID=old.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `SALEINSERT` AFTER INSERT ON `sales_items` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY-new.SALE_QTY WHERE meds.MED_ID=new.MED_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stafflogin`
--

CREATE TABLE `stafflogin` (
  `E_ID` decimal(7,0) NOT NULL,
  `E_USERNAME` varchar(20) NOT NULL,
  `E_PASS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stafflogin`
--

INSERT INTO `stafflogin` (`E_ID`, `E_USERNAME`, `E_PASS`) VALUES
(4567003, 'Chaman', 'UMC'),
(4567001, 'ProvaChaman', 'C.P.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_USERNAME`),
  ADD UNIQUE KEY `USERNAME` (`A_USERNAME`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`),
  ADD UNIQUE KEY `C_PHNO` (`C_PHNO`),
  ADD UNIQUE KEY `C_MAIL` (`C_MAIL`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indexes for table `meds`
--
ALTER TABLE `meds`
  ADD PRIMARY KEY (`MED_ID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`P_ID`,`MED_ID`),
  ADD KEY `MED_ID` (`MED_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SALE_ID`),
  ADD KEY `C_ID` (`C_ID`),
  ADD KEY `E_ID` (`E_ID`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`SALE_ID`,`MED_ID`),
  ADD KEY `MED_ID` (`MED_ID`);

--
-- Indexes for table `stafflogin`
--
ALTER TABLE `stafflogin`
  ADD PRIMARY KEY (`E_USERNAME`),
  ADD KEY `E_ID` (`E_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SALE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `employee` (`E_ID`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`MED_ID`) REFERENCES `meds` (`MED_ID`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`E_ID`) REFERENCES `employee` (`E_ID`);

--
-- Constraints for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD CONSTRAINT `sales_items_ibfk_1` FOREIGN KEY (`SALE_ID`) REFERENCES `sales` (`SALE_ID`),
  ADD CONSTRAINT `sales_items_ibfk_2` FOREIGN KEY (`MED_ID`) REFERENCES `meds` (`MED_ID`);

--
-- Constraints for table `stafflogin`
--
ALTER TABLE `stafflogin`
  ADD CONSTRAINT `stafflogin_ibfk_1` FOREIGN KEY (`E_ID`) REFERENCES `employee` (`E_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
