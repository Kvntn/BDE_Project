-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 08 nov. 2019 à 11:01
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bde_national`
--

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

DROP TABLE IF EXISTS `centre`;
CREATE TABLE IF NOT EXISTS `centre` (
  `IDCentre` int(11) NOT NULL AUTO_INCREMENT,
  `NomDuCentre` varchar(255) NOT NULL,
  `NTelephoneCentre` text NOT NULL,
  PRIMARY KEY (`IDCentre`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`IDCentre`, `NomDuCentre`, `NTelephoneCentre`) VALUES
(1, 'Nanterre', '01 55 17 80 00'),
(2, 'Orléans', '02 38 22 72 82'),
(3, 'Arras', '01 26 59 84 98'),
(4, 'Lille', '01 26 59 84 98'),
(5, 'La Rochelle', '01 26 59 84 98'),
(6, 'Strasbourg', '01 26 59 84 98'),
(7, 'Grenoble', '01 26 59 84 98'),
(8, 'Nice', '01 26 59 84 98'),
(9, 'Montpellier', '01 26 59 84 98'),
(10, 'Bordeaux', '01 26 59 84 98'),
(11, 'Pau', '01 26 59 84 98'),
(12, 'Rouen', '01 26 59 84 98');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
