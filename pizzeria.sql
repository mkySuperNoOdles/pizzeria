-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 mei 2024 om 14:45
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeria`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `bestelling_id` int(11) NOT NULL,
  `gebruikerId` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `tijd` time DEFAULT NULL,
  `koerierInfo` varchar(255) DEFAULT NULL,
  `leverAdres` varchar(255) DEFAULT NULL,
  `contactNummer` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`bestelling_id`, `gebruikerId`, `datum`, `tijd`, `koerierInfo`, `leverAdres`, `contactNummer`) VALUES
(26, 5, '2024-05-08', '08:51:24', 'sfsdfsdf', NULL, NULL),
(27, 1, '2024-05-08', '09:11:43', 'dfsqfsf', NULL, NULL),
(28, 1, '2024-05-08', '15:24:29', NULL, 'basculestraat8900ieper', 'x'),
(30, 7, '2024-05-08', '21:32:10', NULL, 'test38900ieper', '0470984747'),
(31, 7, '2024-05-11', '00:30:46', NULL, 'basculestraat8900Ieper', '0470984747'),
(32, 1, '2024-05-11', '02:08:48', NULL, 'xx', 'x'),
(33, 1, '2024-05-11', '11:44:10', NULL, 'xx', 'x'),
(34, 7, '2024-05-13', '04:58:54', NULL, 'test28900Ieper', '0470984747'),
(35, 7, '2024-05-13', '05:03:27', NULL, 'test28900Ieper', '0470984747'),
(36, 7, '2024-05-13', '05:04:24', NULL, 'test28900Ieper', '0470984747'),
(37, 7, '2024-05-13', '05:07:31', NULL, 'test28900Ieper', '0470984747'),
(38, 7, '2024-05-13', '05:07:31', NULL, 'test28900Ieper', '0470984747'),
(39, 7, '2024-05-13', '05:08:01', NULL, 'test28900Ieper', '0470984747'),
(40, 7, '2024-05-13', '05:11:09', NULL, 'test28900Ieper', '0470984747'),
(41, 7, '2024-05-13', '05:15:33', NULL, 'test28900Ieper', '0470984747'),
(42, 7, '2024-05-13', '14:22:51', NULL, 'test28900Ieper', '0470984747'),
(43, 7, '2024-05-13', '15:20:41', NULL, 'test28900Ieper', '0470984747'),
(44, 7, '2024-05-13', '15:22:48', NULL, 'test28900Ieper', '0470984747'),
(45, 7, '2024-05-13', '15:23:08', NULL, 'test28900Ieper', '0470984747'),
(46, 7, '2024-05-13', '15:30:25', NULL, 'test28900Ieper', '0470984747'),
(47, 7, '2024-05-13', '16:58:57', NULL, 'test28900Ieper', '0470984747'),
(48, 7, '2024-05-14', '08:55:46', NULL, 'test28900Ieper', '0470984747'),
(49, 7, '2024-05-14', '09:07:55', NULL, 'test28900Ieper', '0470984747'),
(50, 7, '2024-05-14', '09:09:12', NULL, 'test28900Ieper', '0470984747'),
(51, 7, '2024-05-14', '09:12:51', NULL, 'test28900Ieper', '0470984747'),
(52, 7, '2024-05-14', '09:14:21', NULL, 'test28900Ieper', '0470984747'),
(53, 7, '2024-05-14', '09:18:19', NULL, 'test28900Ieper', '0470984747'),
(54, 7, '2024-05-14', '09:20:38', NULL, 'test28900Ieper', '0470984747'),
(55, 7, '2024-05-14', '09:22:21', NULL, 'test28900Ieper', '0470984747'),
(56, 7, '2024-05-14', '09:23:11', NULL, 'test28900Ieper', '0470984747'),
(57, 7, '2024-05-14', '09:35:37', NULL, 'test28900Ieper', '0470984747'),
(58, 7, '2024-05-14', '09:36:40', NULL, 'test28900Ieper', '0470984747'),
(59, 7, '2024-05-14', '09:37:52', NULL, 'test28900Ieper', '0470984747'),
(60, 7, '2024-05-14', '09:40:24', NULL, 'test28900Ieper', '0470984747'),
(61, 7, '2024-05-14', '09:59:30', NULL, 'kakadeestraat', '0470984747'),
(62, 7, '2024-05-14', '10:14:15', NULL, 'kakadeestraat', '0470984747'),
(63, 7, '2024-05-14', '10:16:31', NULL, 'kakadeestraat', '0470984747'),
(64, 7, '2024-05-14', '10:17:11', NULL, '', ''),
(65, 7, '2024-05-14', '21:34:37', NULL, 'test28900Ieper', '0470984747'),
(66, 7, '2024-05-14', '21:36:02', NULL, 'test28900Ieper', '0470984747'),
(67, 7, '2024-05-14', '21:37:05', NULL, 'test28900Ieper', '0470984747'),
(68, 7, '2024-05-14', '21:41:33', NULL, 'test28900Ieper', '0470984747'),
(69, 7, '2024-05-14', '21:46:56', NULL, 'test28900Ieper', '0470984747'),
(70, 7, '2024-05-14', '21:47:40', NULL, 'test28900Ieper', '0470984747'),
(71, 7, '2024-05-14', '21:55:15', NULL, 'test28900Ieper', '0470984747'),
(72, 7, '2024-05-14', '22:00:24', NULL, 'test28900Ieper', '0470984747'),
(73, 1, '2024-05-14', '22:06:45', NULL, 'sdkfljslfsd8900Ieper', 'x'),
(74, 7, '2024-05-14', '22:15:52', NULL, 'test28900Ieper', '0470984747'),
(75, 7, '2024-05-21', '09:57:59', NULL, 'test28900Ieper', '0470984747'),
(76, 7, '2024-05-21', '14:26:06', NULL, 'test28900Ieper', '0470984747');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling_pizza`
--

CREATE TABLE `bestelling_pizza` (
  `bestelling_pizza_id` int(11) NOT NULL,
  `bestellingId` int(11) DEFAULT NULL,
  `pizzaId` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `prijs` decimal(10,2) DEFAULT NULL,
  `extra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling_pizza`
--

INSERT INTO `bestelling_pizza` (`bestelling_pizza_id`, `bestellingId`, `pizzaId`, `aantal`, `prijs`, `extra`) VALUES
(11, 26, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(12, 27, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(13, 28, 1, 8, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(14, 30, 1, 2, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(15, 31, 1, 4, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(16, 32, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(17, 33, 4, 1, 11.99, 'geen idee waar dit voor dient tbh x\'D'),
(18, 34, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(19, 35, 1, 3, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(20, 36, 1, 3, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(21, 37, 1, 2, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(22, 38, 1, 2, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(23, 39, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(24, 40, 1, 2, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(25, 41, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(26, 41, 2, 1, 9.99, 'geen idee waar dit voor dient tbh x\'D'),
(27, 42, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(28, 42, 2, 1, 9.99, 'geen idee waar dit voor dient tbh x\'D'),
(29, 43, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(30, 44, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(31, 45, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(32, 45, 2, 1, 9.99, 'geen idee waar dit voor dient tbh x\'D'),
(33, 46, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(34, 47, 1, 4, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(35, 48, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(36, 49, 1, 1, 5.00, 'geen idee waar dit voor dient tbh x\'D'),
(37, 50, 4, 1, 8.00, 'geen idee waar dit voor dient tbh x\'D'),
(38, 51, 1, 1, 5.00, 'geen idee waar dit voor dient tbh x\'D'),
(39, 52, 1, 1, 5.00, 'geen idee waar dit voor dient tbh x\'D'),
(40, 53, 1, 1, 5.00, 'geen idee waar dit voor dient tbh x\'D'),
(41, 54, 10, 2, 11.69, 'geen idee waar dit voor dient tbh x\'D'),
(42, 55, 1, 3, 5.00, 'geen idee waar dit voor dient tbh x\'D'),
(43, 57, 2, 1, 6.00, 'geen idee waar dit voor dient tbh x\'D'),
(44, 58, 1, 1, 5.99, 'geen idee waar dit voor dient tbh x\'D'),
(45, 59, 1, 1, 5.99, 'geen idee waar dit voor dient tbh x\'D'),
(46, 59, 2, 1, 6.00, 'geen idee waar dit voor dient tbh x\'D'),
(47, 60, 1, 2, 5.99, 'geen idee waar dit voor dient tbh x\'D'),
(48, 61, 1, 2, 5.99, 'geen idee waar dit voor dient tbh x\'D'),
(49, 62, 1, 2, 5.99, 'geen idee waar dit voor dient tbh x\'D'),
(50, 63, 1, 2, 5.99, 'geen idee waar dit voor dient tbh x\'D'),
(55, 73, 1, 1, 8.99, 'geen idee waar dit voor dient tbh x\'D'),
(56, 73, 2, 1, 9.99, 'geen idee waar dit voor dient tbh x\'D'),
(57, 74, 1, 1, 5.99, 'geen idee waar dit voor dient tbh x\'D'),
(58, 74, 2, 1, 6.00, 'geen idee waar dit voor dient tbh x\'D'),
(59, 75, 1, 2, 5.99, 'geen idee waar dit voor dient tbh x\'D'),
(60, 76, 1, 2, 5.99, 'geen idee waar dit voor dient tbh x\'D');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `gebruiker_id` int(11) NOT NULL,
  `rolId` int(11) DEFAULT NULL,
  `naam` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `gemeenteId` int(11) DEFAULT NULL,
  `telefoon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `rechtOpPromotie` tinyint(1) DEFAULT NULL,
  `bemerkingen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`gebruiker_id`, `rolId`, `naam`, `voornaam`, `adres`, `gemeenteId`, `telefoon`, `email`, `wachtwoord`, `rechtOpPromotie`, `bemerkingen`) VALUES
(1, 1, 'guest', 'guest', 'guest', 1, 'guest', 'guest@guest.be', '$2y$10$0qZaQDQUe1/eSINLyuDSpeU2r7Zigvkx2f1mK6AvnCUuTNrPF5Gay', 0, ''),
(2, 1, 'x', 'x', 'x', 1, 'x', 'x@hotmail.com', '$2y$10$pDLtK0KYe.IwyXP4lW1q/uBf8ZdL9Ay1hwsnUgBx0ttVGOLHQ7Hl6', 0, ''),
(3, 1, 'xx', 'xx', 'xx', 1, 'xx', 'xx@xx.xx', '$2y$10$CrTYohC3CeKyMFGYPJSToeWMawn/4E9wXk86AG0p4cZINBNsIMPRO', 0, ''),
(4, 1, 'xxx', 'xxx', 'x', 1, 'x', 'de.mikexxx@hotmail.com', '$2y$10$vbVLuQ29mR0S8jFCZ25OFufNPTPnXQMwybXBRYOewdVK07CKUtqM6', 0, ''),
(5, 1, 't', 't', 't', 1, 't', 't@t.be', '$2y$10$LnW2rhgQc0ufhCwHsQkeWeXn.MeQuhdkNkkuPklKsFJsAIh/BK.DW', 0, ''),
(6, 1, 'test', 'test', 'testadres', 1, '0470984747', 'test@gmail.com', '$2y$10$dNELNt3UNLaRhz3yb4vrKuEGAmh179CKPbqbw7Fap1o7a8S4lZINa', 0, ''),
(7, 1, 'test2', '2', 'test2', 1, '0470984747', 'test2@gmail.com', '$2y$10$zIXtB5VxC9clf5P6ZvNB9uK9CmMvwHOp.3dz7c6toJ0gzgOHee3Em', 1, ''),
(9, 2, 'admin', 'admin', 'admin', 1, '0470984747', 'admin@gmail.com', '$2y$10$rx15SxylDx9mey3zVpKDT.qKT1wA8MVkitpr0otI8oI7yMfmfEAQq', NULL, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gemeente`
--

CREATE TABLE `gemeente` (
  `gemeente_id` int(11) NOT NULL,
  `postcode` int(4) NOT NULL,
  `gemeente` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `gemeente`
--

INSERT INTO `gemeente` (`gemeente_id`, `postcode`, `gemeente`) VALUES
(1, 8900, 'Ieper'),
(2, 8904, 'Boezinge'),
(3, 8900, 'Brielen'),
(4, 8900, 'Dikkebus'),
(5, 8906, 'Elverdinge'),
(6, 8902, 'Hollebeke'),
(7, 8900, 'St. Jan'),
(8, 8908, 'Vlamertinge'),
(9, 8902, 'Voormezele'),
(10, 8902, 'Zillebeke'),
(11, 8904, 'Zuidschote');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pizza`
--

CREATE TABLE `pizza` (
  `pizza_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `beschrijving` varchar(255) DEFAULT NULL,
  `promotieprijs` decimal(10,2) NOT NULL,
  `seizoen_start` date DEFAULT NULL,
  `seizoen_eind` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `pizza`
--

INSERT INTO `pizza` (`pizza_id`, `naam`, `prijs`, `beschrijving`, `promotieprijs`, `seizoen_start`, `seizoen_eind`) VALUES
(1, 'Margherita', 8.99, 'Tomatoes, mozzarella, basil', 5.99, NULL, NULL),
(2, 'Pepperoni', 9.99, 'Pepperoni, mozzarella, tomato sauce', 6.00, NULL, NULL),
(3, 'Hawaiian', 10.99, 'Ham, pineapple, mozzarella, tomato sauce', 7.00, NULL, NULL),
(4, 'Vegetarian', 11.99, 'Mushrooms, onions, bell peppers, olives, mozzarella, tomato sauce', 8.00, NULL, NULL),
(5, 'Meat Lovers', 12.99, 'Pepperoni, sausage, bacon, ham, mozzarella, tomato sauce', 9.00, NULL, NULL),
(6, 'BBQ Chicken', 13.99, 'BBQ sauce, grilled chicken, red onions, cilantro, mozzarella', 12.59, NULL, NULL),
(7, 'Four Cheese', 11.99, 'Mozzarella, cheddar, provolone, feta', 10.79, NULL, NULL),
(8, 'Supreme', 13.99, 'Pepperoni, sausage, bell peppers, onions, black olives, mushrooms, mozzarella, tomato sauce', 12.59, NULL, NULL),
(9, 'BBQ Beef', 12.99, 'BBQ sauce, beef, red onions, cilantro, mozzarella', 11.69, NULL, NULL),
(10, 'Mediterranean', 12.99, 'Spinach, feta cheese, black olives, red onions, tomatoes, mozzarella, garlic olive oil', 11.69, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `naam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `rol`
--

INSERT INTO `rol` (`rol_id`, `naam`) VALUES
(1, 'klant'),
(2, 'admin'),
(3, 'koerier'),
(4, 'intern');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`bestelling_id`),
  ADD KEY `gebruikerId` (`gebruikerId`);

--
-- Indexen voor tabel `bestelling_pizza`
--
ALTER TABLE `bestelling_pizza`
  ADD PRIMARY KEY (`bestelling_pizza_id`),
  ADD KEY `bestellingId` (`bestellingId`),
  ADD KEY `pizzaId` (`pizzaId`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`gebruiker_id`),
  ADD KEY `rolId` (`rolId`),
  ADD KEY `gemeenteId` (`gemeenteId`);

--
-- Indexen voor tabel `gemeente`
--
ALTER TABLE `gemeente`
  ADD PRIMARY KEY (`gemeente_id`);

--
-- Indexen voor tabel `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizza_id`);

--
-- Indexen voor tabel `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `bestelling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT voor een tabel `bestelling_pizza`
--
ALTER TABLE `bestelling_pizza`
  MODIFY `bestelling_pizza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `gebruiker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `gemeente`
--
ALTER TABLE `gemeente`
  MODIFY `gemeente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`gebruikerId`) REFERENCES `gebruiker` (`gebruiker_id`);

--
-- Beperkingen voor tabel `bestelling_pizza`
--
ALTER TABLE `bestelling_pizza`
  ADD CONSTRAINT `bestelling_pizza_ibfk_1` FOREIGN KEY (`bestellingId`) REFERENCES `bestelling` (`bestelling_id`),
  ADD CONSTRAINT `bestelling_pizza_ibfk_2` FOREIGN KEY (`pizzaId`) REFERENCES `pizza` (`pizza_id`);

--
-- Beperkingen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD CONSTRAINT `gebruiker_ibfk_1` FOREIGN KEY (`rolId`) REFERENCES `rol` (`rol_id`),
  ADD CONSTRAINT `gebruiker_ibfk_2` FOREIGN KEY (`gemeenteId`) REFERENCES `gemeente` (`gemeente_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
