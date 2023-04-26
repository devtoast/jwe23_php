-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Apr 2023 um 15:39
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `php3`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `id` int(10) UNSIGNED NOT NULL,
  `benutzername` varchar(190) NOT NULL,
  `passwort` varchar(190) NOT NULL,
  `email` varchar(190) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`id`, `benutzername`, `passwort`, `email`) VALUES
(1, 'markus', '$2y$10$rXRibG0wpWHv5r95av4u3u/qgSp6MW6KY4bjle/yt6ZeFqpUvulyG', 'wifi@diebeiden.at');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeuge`
--

CREATE TABLE `fahrzeuge` (
  `id` int(10) UNSIGNED NOT NULL,
  `fin` varchar(50) NOT NULL,
  `marken_id` int(10) UNSIGNED NOT NULL,
  `modell` varchar(250) NOT NULL,
  `farbe` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `fahrzeuge`
--

INSERT INTO `fahrzeuge` (`id`, `fin`, `marken_id`, `modell`, `farbe`) VALUES
(1, 'AT23252345234', 3, 'Rio', 'Hellblau'),
(2, 'DE234324234', 2, '3er', 'Schwarz'),
(3, 'AT327546457', 4, 'Focus', 'Blau'),
(5, 'AT3245246745654', 1, 'Passat', 'Schwarz');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `marken`
--

CREATE TABLE `marken` (
  `id` int(10) UNSIGNED NOT NULL,
  `hersteller` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `marken`
--

INSERT INTO `marken` (`id`, `hersteller`) VALUES
(1, 'Volkswagen'),
(2, 'BMW'),
(3, 'Kia'),
(4, 'Ford');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `benutzername` (`benutzername`);

--
-- Indizes für die Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fin` (`fin`),
  ADD KEY `marken_id` (`marken_id`);

--
-- Indizes für die Tabelle `marken`
--
ALTER TABLE `marken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `marken`
--
ALTER TABLE `marken`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  ADD CONSTRAINT `fahrzeuge_ibfk_1` FOREIGN KEY (`marken_id`) REFERENCES `marken` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
