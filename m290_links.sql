-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 07. Dez 2020 um 12:43
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `m290_links`
--
CREATE DATABASE IF NOT EXISTS `m290_links` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `m290_links`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

DROP TABLE IF EXISTS `kategorie`;
CREATE TABLE IF NOT EXISTS `kategorie` (
  `kategorie_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategorie_de` varchar(50) NOT NULL DEFAULT 'unbekannt',
  `kategorie_en` varchar(45) DEFAULT 'unknown',
  PRIMARY KEY (`kategorie_id`),
  UNIQUE KEY `kategorie_name` (`kategorie_de`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`kategorie_id`, `kategorie_de`, `kategorie_en`) VALUES
(0, '_unbekannt', '_unknown'),
(1, 'Firma', 'Company'),
(2, 'Suchdienst', 'Search engine'),
(3, 'Velogeschäft', 'Bicycles'),
(4, 'Entspannung', 'Entertainement'),
(5, 'Bilder', 'Image'),
(6, 'Einkaufen', 'Shopping'),
(10, 'Spiele', 'Gaming'),
(14, 'Kleider', 'Clothes'),
(18, 'Schulen', 'Schools');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `link_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sprache_id` int(11) NOT NULL DEFAULT 0,
  `kategorie_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`link_id`),
  KEY `ix_link_sprache_id` (`sprache_id`),
  KEY `ix_link_kategorie_id` (`kategorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `link`
--

INSERT INTO `link` (`link_id`, `link_name`, `link_url`, `sprache_id`, `kategorie_id`) VALUES
(2, 'Google', 'http://google.ch', 2, 2),
(6, 'YouTube', 'http://www.youtube.com', 1, 4),
(10, 'Bundesamt', 'https://bag.admin.ch', 1, 1),
(18, 'SBW Haus des Lernens Neu Medien', 'https://sbw-media.ch', 1, 18),
(19, 'Kingsoft', 'https://king.ma', 2, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sprache`
--

DROP TABLE IF EXISTS `sprache`;
CREATE TABLE IF NOT EXISTS `sprache` (
  `sprache_id` int(11) NOT NULL AUTO_INCREMENT,
  `sprache_de` varchar(50) NOT NULL,
  `sprache_en` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sprache_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `sprache`
--

INSERT INTO `sprache` (`sprache_id`, `sprache_de`, `sprache_en`) VALUES
(0, '_unbekannt', '_unknown'),
(1, 'Deutsch', 'German'),
(2, 'Englisch', 'English'),
(3, 'Französisch', 'French'),
(4, 'Niederländisch', 'Dutch'),
(5, 'Italiensich', 'Italian');

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_ibfk_1` FOREIGN KEY (`sprache_id`) REFERENCES `sprache` (`sprache_id`),
  ADD CONSTRAINT `link_ibfk_2` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorie` (`kategorie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
