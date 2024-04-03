-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 12:04 PM
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
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30);

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

--
-- Dumping data for table `koppel`
--

INSERT INTO `koppel` (`id`, `manVogelId`, `vrVogelId`, `gekoppeldOp`, `notities`) VALUES
(6, 174, 171, '2024-04-02', NULL),
(7, 179, 176, '2024-04-02', NULL),
(8, 180, 177, '2024-04-02', NULL),
(9, 173, 170, '2024-04-02', NULL),
(10, 175, 172, '2024-04-02', NULL),
(11, 169, 165, '2024-04-02', NULL),
(12, 168, 164, '2024-04-02', NULL),
(13, 181, 178, '2024-04-03', NULL),
(14, 187, 184, '2024-04-03', NULL),
(15, 189, 198, '2024-04-03', NULL);

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
(3, 'Duif');

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
-- Dumping data for table `vogel`
--

INSERT INTO `vogel` (`id`, `soortId`, `geslacht`, `kleur`, `geborenOp`, `afkomst`, `vererving`, `geringdOp`, `ringnummer`, `ringmaat`, `uitgevlogenOp`, `kooiId`) VALUES
(164, 1, 'Vrouw', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.5, '2023-03-09', 6),
(165, 1, 'Vrouw', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 8),
(166, 1, 'Vrouw', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 1),
(167, 1, 'Man', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.5, '2023-03-09', 1),
(168, 1, 'Man', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 6),
(169, 1, 'Man', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 8),
(170, 2, 'Vrouw', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.5, '2023-03-09', 5),
(171, 2, 'Vrouw', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 3),
(172, 2, 'Vrouw', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 7),
(173, 2, 'Man', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.5, '2023-03-09', 5),
(174, 2, 'Man', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 3),
(175, 2, 'Man', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 7),
(176, 3, 'Vrouw', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.5, '2023-03-09', 4),
(177, 3, 'Vrouw', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 2),
(178, 3, 'Vrouw', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 9),
(179, 3, 'Man', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.5, '2023-03-09', 4),
(180, 3, 'Man', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 2),
(181, 3, 'Man', 'Grey', '2024-04-03', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 9),
(183, 1, 'Man', 'Red', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R82789', NULL, NULL, NULL),
(184, 2, 'Vrouw', 'Blue', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R26178', NULL, NULL, 12),
(185, 3, 'Man', 'Green', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R52523', NULL, NULL, NULL),
(186, 1, 'Vrouw', 'Yellow', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R84080', NULL, NULL, NULL),
(187, 2, 'Man', 'Purple', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R72831', NULL, NULL, 12),
(188, 3, 'Vrouw', 'Orange', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R11916', NULL, NULL, NULL),
(189, 1, 'Man', 'Black', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R11090', NULL, NULL, 13),
(190, 2, 'Vrouw', 'White', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R99700', NULL, NULL, NULL),
(191, 3, 'Man', 'Brown', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R95231', NULL, NULL, NULL),
(192, 1, 'Vrouw', 'Gray', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R77055', NULL, NULL, NULL),
(193, 2, 'Man', 'Cyan', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R89581', NULL, NULL, NULL),
(194, 3, 'Vrouw', 'Magenta', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R26743', NULL, NULL, NULL),
(195, 1, 'Man', 'Lime', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R34971', NULL, NULL, NULL),
(196, 2, 'Vrouw', 'Teal', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R84625', NULL, NULL, NULL),
(197, 3, 'Man', 'Pink', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R38213', NULL, NULL, NULL),
(198, 1, 'Vrouw', 'Silver', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R17193', NULL, NULL, 13),
(199, 2, 'Man', 'Gold', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R51325', NULL, NULL, NULL),
(200, 3, 'Vrouw', 'Indigo', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R15048', NULL, NULL, NULL),
(201, 1, 'Man', 'Maroon', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R91266', NULL, NULL, NULL),
(202, 2, 'Vrouw', 'Navy', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R41184', NULL, NULL, NULL),
(203, 3, 'Man', 'Olive', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R12124', NULL, NULL, NULL),
(204, 1, 'Vrouw', 'Sky Blue', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R17069', NULL, NULL, NULL),
(205, 2, 'Man', 'Turquoise', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R38973', NULL, NULL, NULL),
(206, 3, 'Vrouw', 'Violet', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R43657', NULL, NULL, NULL),
(207, 1, 'Man', 'Aquamarine', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R91365', NULL, NULL, NULL),
(208, 2, 'Vrouw', 'Beige', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R45858', NULL, NULL, NULL),
(209, 3, 'Man', 'Coral', '2024-04-03', 'Eigen kweek', 'Dominante', NULL, 'R35194', NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `koppel`
--
ALTER TABLE `koppel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

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
