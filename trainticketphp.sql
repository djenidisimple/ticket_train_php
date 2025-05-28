-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 28 mai 2025 à 07:51
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trainticketphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `nameAdmin` varchar(50) NOT NULL,
  `firstNameAdmin` varchar(50) NOT NULL,
  `passwordAdmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `passenger`
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

--
-- Déchargement des données de la table `passenger`
--

INSERT INTO `passenger` (`passId`, `name`, `firstName`, `email`, `Phone`, `dateOfBirth`, `passwordPassenger`) VALUES
(63, 'Djenidi 2', 'Doe 2', 'do4e@gmail.com', '+261381425126', '2006-06-14', '');

-- --------------------------------------------------------

--
-- Structure de la table `place`
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

--
-- Déchargement des données de la table `place`
--

INSERT INTO `place` (`placeId`, `routeId`, `trainId`, `classePas`, `seatNumber`, `EstDisponible`, `price`) VALUES
(3239, 15, 24, 1, 'A1', b'1', 10000),
(3240, 15, 24, 1, 'A2', b'0', 10000),
(3241, 15, 24, 1, 'A3', b'1', 10000),
(3242, 15, 24, 1, 'A4', b'1', 10000),
(3243, 15, 24, 1, 'A5', b'1', 10000),
(3244, 15, 24, 1, 'A6', b'1', 10000),
(3245, 15, 24, 1, 'A7', b'1', 10000),
(3246, 15, 24, 1, 'A8', b'1', 10000),
(3247, 15, 24, 1, 'A9', b'1', 10000),
(3248, 15, 24, 1, 'A10', b'1', 10000),
(3249, 15, 24, 1, 'B11', b'1', 10000),
(3250, 15, 24, 1, 'B12', b'1', 10000),
(3251, 15, 24, 1, 'B13', b'1', 10000),
(3252, 15, 24, 1, 'B14', b'1', 10000),
(3253, 15, 24, 1, 'B15', b'1', 10000),
(3254, 15, 24, 1, 'B16', b'1', 10000),
(3255, 15, 24, 1, 'B17', b'1', 10000),
(3256, 15, 24, 1, 'B18', b'1', 10000),
(3257, 15, 24, 1, 'B19', b'1', 10000),
(3258, 15, 24, 2, 'B20', b'1', 10000),
(3259, 15, 24, 2, 'B21', b'1', 10000),
(3260, 15, 24, 1, 'A1', b'1', 10000),
(3261, 15, 24, 2, 'C22', b'1', 10000),
(3262, 15, 24, 1, 'A2', b'1', 10000),
(3263, 15, 24, 2, 'C23', b'1', 10000),
(3264, 15, 24, 1, 'A3', b'1', 10000),
(3265, 15, 24, 2, 'C24', b'1', 10000),
(3266, 15, 24, 1, 'A4', b'1', 10000),
(3267, 15, 24, 2, 'C25', b'1', 10000),
(3268, 15, 24, 1, 'A5', b'1', 10000),
(3269, 15, 24, 2, 'C26', b'1', 10000),
(3270, 15, 24, 1, 'B6', b'1', 10000),
(3271, 15, 24, 2, 'C27', b'1', 10000),
(3272, 15, 24, 1, 'B7', b'1', 10000),
(3273, 15, 24, 2, 'C28', b'1', 10000),
(3274, 15, 24, 1, 'B8', b'1', 10000),
(3275, 15, 24, 2, 'C29', b'1', 10000),
(3276, 15, 24, 1, 'B9', b'1', 10000),
(3277, 15, 24, 2, 'C30', b'1', 10000),
(3278, 15, 24, 1, 'B10', b'1', 10000),
(3279, 15, 24, 2, 'C31', b'1', 10000),
(3280, 15, 24, 1, 'B11', b'1', 10000),
(3281, 15, 24, 2, 'C32', b'1', 10000),
(3282, 15, 24, 1, 'C12', b'1', 10000),
(3283, 15, 24, 2, 'D33', b'1', 10000),
(3284, 15, 24, 1, 'C13', b'1', 10000),
(3285, 15, 24, 2, 'D34', b'1', 10000),
(3286, 15, 24, 1, 'C14', b'1', 10000),
(3287, 15, 24, 2, 'D35', b'1', 10000),
(3288, 15, 24, 1, 'C15', b'1', 10000),
(3289, 15, 24, 2, 'D36', b'1', 10000),
(3290, 15, 24, 1, 'C16', b'1', 10000),
(3291, 15, 24, 2, 'D37', b'1', 10000),
(3292, 15, 24, 2, 'D38', b'1', 10000),
(3293, 15, 24, 1, 'C17', b'1', 10000),
(3294, 15, 24, 2, 'D39', b'1', 10000),
(3295, 15, 24, 1, 'D18', b'1', 10000),
(3296, 15, 24, 2, 'D40', b'1', 10000),
(3297, 15, 24, 1, 'D19', b'1', 10000),
(3298, 15, 24, 2, 'D41', b'1', 10000),
(3299, 15, 24, 2, 'D20', b'1', 10000),
(3300, 15, 24, 2, 'D42', b'1', 10000),
(3301, 15, 24, 2, 'D21', b'1', 10000),
(3302, 15, 24, 2, 'D43', b'1', 10000),
(3303, 15, 24, 2, 'D22', b'1', 10000),
(3304, 15, 24, 2, 'A44', b'1', 10000),
(3305, 15, 24, 2, 'D23', b'1', 10000),
(3306, 15, 24, 2, 'A24', b'1', 10000),
(3307, 15, 24, 2, 'A45', b'1', 10000);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `resId` int(11) NOT NULL,
  `passId` int(11) DEFAULT NULL,
  `routeId` int(11) DEFAULT NULL,
  `placeId` int(11) DEFAULT NULL,
  `DateReservation` datetime DEFAULT current_timestamp(),
  `Status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`resId`, `passId`, `routeId`, `placeId`, `DateReservation`, `Status`) VALUES
(23, 63, 15, 3240, '2025-05-28 07:53:15', 1);

-- --------------------------------------------------------

--
-- Structure de la table `route`
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

--
-- Déchargement des données de la table `route`
--

INSERT INTO `route` (`routeId`, `placeOfDeparture`, `placeOfArrival`, `dateLeave`, `dateArrived`, `delay`, `IsActive`) VALUES
(15, 'Fianarantsoa', 'Manakara', '2025-05-28 06:51:00', '2025-05-29 06:51:00', NULL, b'1');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
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
-- Structure de la table `train`
--

CREATE TABLE `train` (
  `trainId` int(11) NOT NULL,
  `nameTrain` varchar(50) NOT NULL,
  `CapacityTrain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `train`
--

INSERT INTO `train` (`trainId`, `nameTrain`, `CapacityTrain`) VALUES
(24, 'Tom', 45),
(25, 'Tom', 45),
(26, 'Tom', 45),
(27, 'Tom', 45);

-- --------------------------------------------------------

--
-- Structure de la table `trainbyroute`
--

CREATE TABLE `trainbyroute` (
  `idTBR` int(11) NOT NULL,
  `trainId` int(11) DEFAULT NULL,
  `routeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trainbyroute`
--

INSERT INTO `trainbyroute` (`idTBR`, `trainId`, `routeId`) VALUES
(23, 24, 15),
(24, 25, 15),
(25, 26, 15),
(26, 27, 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Index pour la table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passId`);

--
-- Index pour la table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`placeId`),
  ADD KEY `routeId` (`routeId`),
  ADD KEY `trainId` (`trainId`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`resId`),
  ADD KEY `FK_Reservation_Pass` (`passId`),
  ADD KEY `FK_Reservation_Trajet` (`routeId`),
  ADD KEY `FK_Reservation_Place` (`placeId`);

--
-- Index pour la table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`routeId`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`reference`),
  ADD KEY `routeId` (`routeId`),
  ADD KEY `passId` (`passId`),
  ADD KEY `placeId` (`placeId`);

--
-- Index pour la table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`trainId`);

--
-- Index pour la table `trainbyroute`
--
ALTER TABLE `trainbyroute`
  ADD PRIMARY KEY (`idTBR`),
  ADD KEY `FK_Train_Route_Train` (`trainId`),
  ADD KEY `FK_Train_Route_Trajet` (`routeId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `place`
--
ALTER TABLE `place`
  MODIFY `placeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3308;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `resId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `route`
--
ALTER TABLE `route`
  MODIFY `routeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `train`
--
ALTER TABLE `train`
  MODIFY `trainId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `trainbyroute`
--
ALTER TABLE `trainbyroute`
  MODIFY `idTBR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`) ON DELETE CASCADE,
  ADD CONSTRAINT `place_ibfk_2` FOREIGN KEY (`trainId`) REFERENCES `train` (`trainId`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Reservation_Pass` FOREIGN KEY (`passId`) REFERENCES `passenger` (`passId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Reservation_Place` FOREIGN KEY (`placeId`) REFERENCES `place` (`placeId`),
  ADD CONSTRAINT `FK_Reservation_Trajet` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`passId`) REFERENCES `passenger` (`passId`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`placeId`) REFERENCES `place` (`placeId`);

--
-- Contraintes pour la table `trainbyroute`
--
ALTER TABLE `trainbyroute`
  ADD CONSTRAINT `FK_Train_Route_Train` FOREIGN KEY (`trainId`) REFERENCES `train` (`trainId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Train_Route_Trajet` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
