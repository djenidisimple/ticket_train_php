-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 11:18 AM
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
-- Database: `trainticketphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `nameAdmin` varchar(50) NOT NULL,
  `firstNameAdmin` varchar(50) NOT NULL,
  `passwordAdmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `passwordPassenger` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `placeId` int(11) NOT NULL,
  `routeId` int(11) DEFAULT NULL,
  `trainId` int(11) DEFAULT NULL,
  `classePas` int(11) NOT NULL DEFAULT 2,
  `seatNumber` varchar(10) NOT NULL,
  `EstDisponible` bit(1) DEFAULT b'1',
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `resId` int(11) NOT NULL,
  `passId` int(11) DEFAULT NULL,
  `routeId` int(11) DEFAULT NULL,
  `placeId` int(11) DEFAULT NULL,
  `DateReservation` datetime DEFAULT current_timestamp(),
  `Status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `routeId` int(11) NOT NULL,
  `placeOfDeparture` varchar(100) NOT NULL,
  `placeOfArrival` varchar(100) NOT NULL,
  `dateLeave` datetime DEFAULT NULL,
  `dateArrived` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `IsActive` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `reference` varchar(50) NOT NULL,
  `routeId` int(11) DEFAULT NULL,
  `qrCode` varchar(40) DEFAULT NULL,
  `passId` int(11) DEFAULT NULL,
  `placeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `trainId` int(11) NOT NULL,
  `nameTrain` varchar(50) NOT NULL,
  `CapacityTrain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainbyroute`
--

CREATE TABLE `trainbyroute` (
  `idTBR` int(11) NOT NULL,
  `trainId` int(11) DEFAULT NULL,
  `routeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passId`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`placeId`),
  ADD KEY `routeId` (`routeId`),
  ADD KEY `trainId` (`trainId`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`resId`),
  ADD KEY `FK_Reservation_Pass` (`passId`),
  ADD KEY `FK_Reservation_Trajet` (`routeId`),
  ADD KEY `FK_Reservation_Place` (`placeId`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`routeId`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`reference`),
  ADD KEY `routeId` (`routeId`),
  ADD KEY `passId` (`passId`),
  ADD KEY `placeId` (`placeId`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`trainId`);

--
-- Indexes for table `trainbyroute`
--
ALTER TABLE `trainbyroute`
  ADD PRIMARY KEY (`idTBR`),
  ADD KEY `FK_Train_Route_Train` (`trainId`),
  ADD KEY `FK_Train_Route_Trajet` (`routeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `placeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `resId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `routeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `trainId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainbyroute`
--
ALTER TABLE `trainbyroute`
  MODIFY `idTBR` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`) ON DELETE CASCADE,
  ADD CONSTRAINT `place_ibfk_2` FOREIGN KEY (`trainId`) REFERENCES `train` (`trainId`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Reservation_Pass` FOREIGN KEY (`passId`) REFERENCES `passenger` (`passId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Reservation_Place` FOREIGN KEY (`placeId`) REFERENCES `place` (`placeId`),
  ADD CONSTRAINT `FK_Reservation_Trajet` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`passId`) REFERENCES `passenger` (`passId`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`placeId`) REFERENCES `place` (`placeId`);

--
-- Constraints for table `trainbyroute`
--
ALTER TABLE `trainbyroute`
  ADD CONSTRAINT `FK_Train_Route_Train` FOREIGN KEY (`trainId`) REFERENCES `train` (`trainId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Train_Route_Trajet` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
