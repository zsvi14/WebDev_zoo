-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 déc. 2024 à 15:19
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddzoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

DROP TABLE IF EXISTS `animaux`;
CREATE TABLE IF NOT EXISTS `animaux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `nombre` int NOT NULL,
  `id_enclos` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `nom`, `nombre`, `id_enclos`) VALUES
(2, 'Panda roux ', 10, 1),
(4, 'Python', 10, 2),
(5, 'Tortue', 15, 138),
(6, 'Iguane', 8, 3),
(7, 'Ara Perroquet', 5, 4),
(8, 'Grand Hocco', 4, 5),
(9, 'Rhinocéros', 3, 6),
(10, 'Oryx Beisa', 6, 7),
(11, 'Gnou', 12, 8),
(12, 'Coatis', 7, 9),
(13, 'Saimiris', 20, 10),
(14, 'Autruches', 10, 11),
(15, 'Gazelles', 18, 12),
(16, 'Girafes', 6, 13),
(17, 'Grivets Cercopithèques', 10, 14),
(18, 'Eléphants', 4, 15),
(19, 'Varan de Komodo', 2, 16),
(20, 'Binturong', 6, 17),
(21, 'Loutres', 8, 18),
(22, 'Antilopes', 20, 19),
(23, 'Daims', 15, 20),
(24, 'Nilgauts', 5, 21),
(25, 'Dromadaires', 7, 22),
(26, 'Anes de Provence', 10, 23),
(27, 'Emeu', 4, 24),
(28, 'Wallaby', 6, 25),
(29, 'Flamant Roses', 30, 26),
(30, 'Nandou', 15, 27),
(31, 'Tamanoirs', 5, 28),
(32, 'Tortues', 25, 29),
(33, 'Ibis', 12, 30),
(34, 'Cigognes', 18, 31),
(35, 'Marabouts', 7, 32),
(36, 'Oryx Algazelle', 9, 33),
(37, 'Watusi', 6, 34),
(38, 'Anes de Somalie', 8, 35),
(39, 'Yack', 5, 36),
(40, 'Moutons Noir', 10, 37),
(3, 'Capucin', 16, 38),
(41, 'Ouistiti Gibon', 11, 39),
(111, 'Pécaris', 3, 40),
(110, 'Porc-Epic', 15, 41),
(109, 'Bisons', 7, 42),
(108, 'Tigres', 5, 43),
(107, 'Chiens des Buissons', 22, 44),
(106, 'Servals', 13, 45),
(104, 'Loups dEurope', 18, 46),
(103, 'Vautours', 24, 47),
(102, 'Cerfs', 32, 48),
(105, 'Lynx', 9, 49),
(100, 'Mouflons', 27, 50),
(101, 'Macaques Crabiers', 36, 51),
(98, 'Lémuriens', 54, 52),
(99, 'Chèvres Naines', 14, 53),
(89, 'Tapirs', 16, 54),
(90, 'Guépards', 8, 55),
(91, 'Casoars', 38, 56),
(92, 'Crocodiles Nains', 10, 57),
(93, 'Lions', 12, 58),
(94, 'Hippopotames', 21, 59),
(95, 'Zèbres', 15, 60),
(96, 'Hyènes', 23, 61),
(97, 'Loups à Crinières', 40, 62),
(87, 'Suricates', 48, 63),
(88, 'Fennec', 33, 64),
(86, 'Panthère', 6, 101),
(162, 'Tortue', 21, 137);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
