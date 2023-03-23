-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Mrz 2023 um 15:47
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
-- Datenbank: `php2_2023`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `id` int(10) UNSIGNED NOT NULL,
  `benutzername` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwort` varchar(255) NOT NULL,
  `letztes_login` datetime DEFAULT NULL,
  `anzahl_logins` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`id`, `benutzername`, `email`, `passwort`, `letztes_login`, `anzahl_logins`) VALUES
(1, 'max', 'max@wifi.at', 'passwort', NULL, 0),
(5, 'moritz', 'moritz@wifi.at', 'passwort', NULL, 0),
(6, 'test', NULL, 'pw', NULL, 0),
(7, 'markus', 'markus@gmail.com', '$2y$10$DoMiMvgOnMewDvsRQiRQauntDmRY.jWKB7TVN/uw4vCOFNQBV2B7O', '2023-03-18 13:09:27', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rezepte`
--

CREATE TABLE `rezepte` (
  `id` int(10) UNSIGNED NOT NULL,
  `benutzer_id` int(10) UNSIGNED DEFAULT NULL,
  `titel` varchar(255) DEFAULT NULL,
  `beschreibung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `rezepte`
--

INSERT INTO `rezepte` (`id`, `benutzer_id`, `titel`, `beschreibung`) VALUES
(5, 1, 'Kaiserschmarren', 'Schmeckt gut'),
(9, 1, 'Schnitzel', 'super');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zutaten`
--

CREATE TABLE `zutaten` (
  `id` int(10) UNSIGNED NOT NULL,
  `titel` varchar(190) NOT NULL,
  `kcal_pro_100` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `zutaten`
--

INSERT INTO `zutaten` (`id`, `titel`, `kcal_pro_100`) VALUES
(1, 'Mehl', NULL),
(2, 'Milch', NULL),
(3, 'Honig', 2),
(5, 'Salz', NULL),
(6, 'Mohn', NULL),
(7, 'Wasser', NULL),
(8, 'Zucker', NULL),
(9, 'Wacholder', NULL),
(10, 'Weizen', 13),
(11, 'Kakao', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zutaten_zu_rezepten`
--

CREATE TABLE `zutaten_zu_rezepten` (
  `id` int(10) UNSIGNED NOT NULL,
  `rezepte_id` int(10) UNSIGNED NOT NULL,
  `zutaten_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `zutaten_zu_rezepten`
--

INSERT INTO `zutaten_zu_rezepten` (`id`, `rezepte_id`, `zutaten_id`) VALUES
(1, 5, 1),
(2, 5, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `benutzername` (`benutzername`),
  ADD KEY `email_idx` (`email`);

--
-- Indizes für die Tabelle `rezepte`
--
ALTER TABLE `rezepte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titel_unique` (`titel`),
  ADD KEY `rezepte_beziehung` (`benutzer_id`);

--
-- Indizes für die Tabelle `zutaten`
--
ALTER TABLE `zutaten`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `zutaten_zu_rezepten`
--
ALTER TABLE `zutaten_zu_rezepten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zutaten_zu_rezepten_ibfk_1` (`rezepte_id`),
  ADD KEY `zutaten_id` (`zutaten_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `rezepte`
--
ALTER TABLE `rezepte`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `zutaten`
--
ALTER TABLE `zutaten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `zutaten_zu_rezepten`
--
ALTER TABLE `zutaten_zu_rezepten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `rezepte`
--
ALTER TABLE `rezepte`
  ADD CONSTRAINT `rezepte_beziehung` FOREIGN KEY (`benutzer_id`) REFERENCES `benutzer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `zutaten_zu_rezepten`
--
ALTER TABLE `zutaten_zu_rezepten`
  ADD CONSTRAINT `zutaten_zu_rezepten_ibfk_1` FOREIGN KEY (`rezepte_id`) REFERENCES `rezepte` (`id`),
  ADD CONSTRAINT `zutaten_zu_rezepten_ibfk_2` FOREIGN KEY (`zutaten_id`) REFERENCES `zutaten` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
