-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 02:44 PM
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
-- Database: `happy_birds`
--

-- --------------------------------------------------------

--
-- Table structure for table `kooi`
--

CREATE TABLE `kooi` (
  `id` int(11) NOT NULL,
  `kooiNummer` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kooi`
--

INSERT INTO `kooi` (`id`, `kooiNummer`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `koppel`
--

CREATE TABLE `koppel` (
  `id` int(11) NOT NULL,
  `manVogelId` int(11) DEFAULT NULL,
  `vrVogelId` int(11) DEFAULT NULL,
  `gekoppeldOp` date DEFAULT NULL,
  `notities` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ronde`
--

CREATE TABLE `ronde` (
  `id` int(11) NOT NULL,
  `rondeNummer` enum('1','2','3') DEFAULT NULL,
  `jaar` year(4) DEFAULT NULL,
  `koppelId` int(11) DEFAULT NULL,
  `gezetOp` date DEFAULT NULL,
  `verwachtOp` date DEFAULT NULL,
  `uitgekomenOp` date DEFAULT NULL,
  `aantalEieren` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soort`
--

CREATE TABLE `soort` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soort`
--

INSERT INTO `soort` (`id`, `naam`) VALUES
(1, 'Papegaai'),
(2, 'Kanarie'),
(3, 'Duif'),
(4, 'Parkiet'),
(5, 'Kaketoe'),
(6, 'Merel'),
(7, 'Specht'),
(8, 'Fazant'),
(9, 'Kolibrie'),
(10, 'Grasparkiet');

-- --------------------------------------------------------

--
-- Table structure for table `vogel`
--

CREATE TABLE `vogel` (
  `id` int(11) NOT NULL,
  `soortId` int(2) DEFAULT NULL,
  `geslacht` enum('Man','Vrouw','Onbekend') DEFAULT NULL,
  `kleur` varchar(255) DEFAULT NULL,
  `geborenOp` date DEFAULT NULL,
  `afkomst` enum('Eigen kweek','Aangekocht') DEFAULT NULL,
  `vererving` enum('Dominante','Geslachtsgebonden','Recessieve') DEFAULT NULL,
  `geringdOp` date DEFAULT NULL,
  `ringnummer` varchar(8) DEFAULT NULL,
  `ringmaat` float DEFAULT NULL,
  `uitgevlogenOp` date DEFAULT NULL,
  `kooiId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kooi`
--
ALTER TABLE `kooi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koppel`
--
ALTER TABLE `koppel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manVogelId` (`manVogelId`),
  ADD KEY `vrVogelId` (`vrVogelId`);

--
-- Indexes for table `ronde`
--
ALTER TABLE `ronde`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koppelId` (`koppelId`);

--
-- Indexes for table `soort`
--
ALTER TABLE `soort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vogel`
--
ALTER TABLE `vogel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kooiId` (`kooiId`),
  ADD KEY `fk_vogel_soort` (`soortId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kooi`
--
ALTER TABLE `kooi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `koppel`
--
ALTER TABLE `koppel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ronde`
--
ALTER TABLE `ronde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soort`
--
ALTER TABLE `soort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vogel`
--
ALTER TABLE `vogel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `koppel`
--
ALTER TABLE `koppel`
  ADD CONSTRAINT `koppel_ibfk_1` FOREIGN KEY (`manVogelId`) REFERENCES `vogel` (`id`),
  ADD CONSTRAINT `koppel_ibfk_2` FOREIGN KEY (`vrVogelId`) REFERENCES `vogel` (`id`);

--
-- Constraints for table `ronde`
--
ALTER TABLE `ronde`
  ADD CONSTRAINT `ronde_ibfk_1` FOREIGN KEY (`koppelId`) REFERENCES `koppel` (`id`);

--
-- Constraints for table `vogel`
--
ALTER TABLE `vogel`
  ADD CONSTRAINT `fk_vogel_soort` FOREIGN KEY (`soortId`) REFERENCES `soort` (`id`),
  ADD CONSTRAINT `vogel_ibfk_1` FOREIGN KEY (`kooiId`) REFERENCES `kooi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
