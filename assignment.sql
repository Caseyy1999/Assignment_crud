-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 04:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `RegionID` int(11) NOT NULL,
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `RegionID`, `City`) VALUES
(1, 5, 'Batangas'),
(2, 5, 'Cavite'),
(3, 5, 'Laguna'),
(4, 5, 'Quezon'),
(5, 5, 'Rizal'),
(6, 1, 'Manila'),
(7, 2, 'Ilocos Norte'),
(8, 2, 'Ilocos Sur'),
(9, 2, 'La Union'),
(10, 2, 'Pangasinan'),
(11, 3, 'Batanes'),
(12, 3, 'Cagayan'),
(13, 3, 'Isabela'),
(14, 3, 'Nueva Vizcaya'),
(15, 3, 'Quirino'),
(16, 4, 'Aurora'),
(17, 4, 'Bataan'),
(18, 4, 'Bulacan'),
(19, 4, 'Nueva Ecija'),
(20, 4, 'Pampanga'),
(21, 4, 'Tarlac'),
(22, 4, 'Zambales'),
(23, 6, 'Marinduque'),
(24, 6, 'Occidental Mindoro'),
(25, 6, 'Oriental Mindoro'),
(26, 6, 'Palawan'),
(27, 6, 'Romblon'),
(28, 7, 'Albay'),
(29, 7, 'Camarines Norte'),
(30, 7, 'Camarines Sur'),
(31, 7, 'Catanduanes'),
(32, 7, 'Masbate'),
(33, 7, 'Sorsogon'),
(40, 8, 'Aklan'),
(41, 8, 'Antique'),
(42, 8, 'Capiz'),
(43, 8, 'Guimaras'),
(44, 8, 'Iloilo'),
(45, 8, 'Negros Occidental'),
(46, 9, 'Bohol9'),
(47, 9, 'Cebu'),
(48, 9, 'Negros Oriental'),
(49, 9, 'Siquijor'),
(50, 10, 'Biliran'),
(51, 10, 'Eastern Samar'),
(52, 10, 'Leyte'),
(53, 10, 'Northern Samar'),
(54, 10, 'Samar'),
(55, 10, 'Southern Leyte'),
(56, 11, 'Zamboanga del Norte'),
(57, 11, 'Zamboanga del Sur'),
(58, 11, 'Zamboanga Sibugay'),
(59, 12, 'Bukidnon'),
(60, 12, 'Camiguin'),
(61, 12, 'Lanao del Norte'),
(62, 12, 'Misamis Occidental'),
(63, 12, 'Misamis Oriental'),
(64, 13, 'Davao de Oro'),
(65, 13, 'Davao del Norte'),
(66, 13, 'Davao del Sur'),
(67, 13, 'Davao Occidental'),
(68, 13, 'Davao Oriental'),
(69, 14, 'Cotabato'),
(70, 14, 'Sarangani'),
(71, 14, 'South Cotabato'),
(72, 14, 'Sultan Kudarat'),
(73, 15, 'Agusan del Norte'),
(74, 15, 'Agusan del Sur'),
(75, 15, 'Dinagat Islands'),
(76, 15, 'Surigao del Norte'),
(77, 15, 'Surigao del Sur'),
(78, 16, 'Basilan'),
(79, 16, 'Lanao del Sur'),
(80, 16, 'Maguindanao'),
(81, 16, 'Sulu'),
(82, 16, 'Tawi-Tawi'),
(83, 17, 'Abra'),
(84, 17, 'Apayao'),
(85, 17, 'Benguet'),
(86, 17, 'Ifugao'),
(87, 17, 'Kalinga'),
(88, 17, 'Mountain Province');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Middlename` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Address1` varchar(255) NOT NULL,
  `Address2` varchar(255) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Region` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ID`, `Firstname`, `Middlename`, `Lastname`, `Address1`, `Address2`, `Birthday`, `Age`, `Region`, `City`) VALUES
(19, 'Casey Rose', 'Alday', 'De Castro', 'Puting Kahoy', 'Lian', '1999-03-26', 23, 'Region 4A: Calabarzon', 'Batangas'),
(20, 'Camille Rose', 'Alday', 'De Castro', 'Centro', 'Puting Kahoy', '2004-01-01', 18, 'Region 4A: Calabarzon', 'Batangas'),
(21, 'Dion', 'Rodriguez', 'Alday', 'Puting Kahoy', 'Lian', '2020-11-12', 1, 'Region 4A: Calabarzon', 'Cavite');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `ID` int(11) NOT NULL,
  `Region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`ID`, `Region`) VALUES
(1, 'NCR: National Capital Region'),
(2, 'Region 1: Ilocos Region'),
(3, 'Region 2: Cagayan Valley'),
(4, 'Region 3: Central Luzon'),
(5, 'Region 4A: Calabarzon'),
(6, 'Region 4B: MIMAROPA / Southwestern Tagalog'),
(7, 'Region 5: Bicol Region'),
(8, 'Region 6: Western Visayas'),
(9, 'Region 7: Central Visayas'),
(10, 'Region 8: Eastern Visayas'),
(11, 'Region 9: Zamboanga Peninsula'),
(12, 'Region 10: Northern Mindanao\r\n'),
(13, 'Region 11: Davao Region\r\n'),
(14, 'Region 12: Soccskargen\r\n'),
(15, 'Region 13: Caraga Region\r\n'),
(16, 'Barmm: Bangsamoro Autonomous Region in Muslim Mindanao\r\n'),
(17, 'Car: Cordillera Administrative Region');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
