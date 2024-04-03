-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 11:43 AM
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
(164, 1, 'Vrouw', 'Grey', '2023-01-09', 'Eigen kweek', 'Recessieve', '2023-02-09', 'R12353', 2.5, '2023-03-09', 6),
(165, 1, 'Vrouw', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 8),
(166, 1, 'Vrouw', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 1),
(167, 1, 'Man', 'Grey', '2023-01-09', 'Eigen kweek', 'Recessieve', '2023-02-09', 'R12353', 2.5, '2023-03-09', 1),
(168, 1, 'Man', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 6),
(169, 1, 'Man', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 8),
(170, 2, 'Vrouw', 'Grey', '2023-01-09', 'Eigen kweek', 'Recessieve', '2023-02-09', 'R12353', 2.5, '2023-03-09', 5),
(171, 2, 'Vrouw', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 3),
(172, 2, 'Vrouw', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 7),
(173, 2, 'Man', 'Grey', '2023-01-09', 'Eigen kweek', 'Recessieve', '2023-02-09', 'R12353', 2.5, '2023-03-09', 5),
(174, 2, 'Man', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 3),
(175, 2, 'Man', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 7),
(176, 3, 'Vrouw', 'Grey', '2023-01-09', 'Eigen kweek', 'Recessieve', '2023-02-09', 'R12353', 2.5, '2023-03-09', 4),
(177, 3, 'Vrouw', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 2),
(178, 3, 'Vrouw', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 9),
(179, 3, 'Man', 'Grey', '2023-01-09', 'Eigen kweek', 'Recessieve', '2023-02-09', 'R12353', 2.5, '2023-03-09', 4),
(180, 3, 'Man', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.9, '2023-03-09', 2),
(181, 3, 'Man', 'Grey', '2023-01-09', 'Eigen kweek', 'Dominante', '2023-02-09', 'R12353', 2.6, '2023-03-09', 9),
(183, 1, 'Man', 'Red', NULL, NULL, NULL, NULL, 'R82789', NULL, NULL, NULL),
(184, 2, 'Vrouw', 'Blue', NULL, NULL, NULL, NULL, 'R26178', NULL, NULL, NULL),
(185, 3, 'Man', 'Green', NULL, NULL, NULL, NULL, 'R52523', NULL, NULL, NULL),
(186, 1, 'Vrouw', 'Yellow', NULL, NULL, NULL, NULL, 'R84080', NULL, NULL, NULL),
(187, 2, 'Man', 'Purple', NULL, NULL, NULL, NULL, 'R72831', NULL, NULL, NULL),
(188, 3, 'Vrouw', 'Orange', NULL, NULL, NULL, NULL, 'R11916', NULL, NULL, NULL),
(189, 1, 'Man', 'Black', NULL, NULL, NULL, NULL, 'R11090', NULL, NULL, NULL),
(190, 2, 'Vrouw', 'White', NULL, NULL, NULL, NULL, 'R99700', NULL, NULL, NULL),
(191, 3, 'Man', 'Brown', NULL, NULL, NULL, NULL, 'R95231', NULL, NULL, NULL),
(192, 1, 'Vrouw', 'Gray', NULL, NULL, NULL, NULL, 'R77055', NULL, NULL, NULL),
(193, 2, 'Man', 'Cyan', NULL, NULL, NULL, NULL, 'R89581', NULL, NULL, NULL),
(194, 3, 'Vrouw', 'Magenta', NULL, NULL, NULL, NULL, 'R26743', NULL, NULL, NULL),
(195, 1, 'Man', 'Lime', NULL, NULL, NULL, NULL, 'R34971', NULL, NULL, NULL),
(196, 2, 'Vrouw', 'Teal', NULL, NULL, NULL, NULL, 'R84625', NULL, NULL, NULL),
(197, 3, 'Man', 'Pink', NULL, NULL, NULL, NULL, 'R38213', NULL, NULL, NULL),
(198, 1, 'Vrouw', 'Silver', NULL, NULL, NULL, NULL, 'R17193', NULL, NULL, NULL),
(199, 2, 'Man', 'Gold', NULL, NULL, NULL, NULL, 'R51325', NULL, NULL, NULL),
(200, 3, 'Vrouw', 'Indigo', NULL, NULL, NULL, NULL, 'R15048', NULL, NULL, NULL),
(201, 1, 'Man', 'Maroon', NULL, NULL, NULL, NULL, 'R91266', NULL, NULL, NULL),
(202, 2, 'Vrouw', 'Navy', NULL, NULL, NULL, NULL, 'R41184', NULL, NULL, NULL),
(203, 3, 'Man', 'Olive', NULL, NULL, NULL, NULL, 'R12124', NULL, NULL, NULL),
(204, 1, 'Vrouw', 'Sky Blue', NULL, NULL, NULL, NULL, 'R17069', NULL, NULL, NULL),
(205, 2, 'Man', 'Turquoise', NULL, NULL, NULL, NULL, 'R38973', NULL, NULL, NULL),
(206, 3, 'Vrouw', 'Violet', NULL, NULL, NULL, NULL, 'R43657', NULL, NULL, NULL),
(207, 1, 'Man', 'Aquamarine', NULL, NULL, NULL, NULL, 'R91365', NULL, NULL, NULL),
(208, 2, 'Vrouw', 'Beige', NULL, NULL, NULL, NULL, 'R45858', NULL, NULL, NULL),
(209, 3, 'Man', 'Coral', NULL, NULL, NULL, NULL, 'R35194', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `vogel`
--
ALTER TABLE `vogel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- Constraints for dumped tables
--

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
