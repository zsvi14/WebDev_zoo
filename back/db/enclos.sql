-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 déc. 2024 à 15:36
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
-- Structure de la table `enclos`
--

DROP TABLE IF EXISTS `enclos`;
CREATE TABLE IF NOT EXISTS `enclos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_biomes` int DEFAULT NULL,
  `id_animaux` int DEFAULT NULL,
  `repos` tinyint(1) DEFAULT '0',
  `nom_enclos` varchar(255) DEFAULT NULL,
  `nom_animal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_biomes` (`id_biomes`),
  KEY `id_animaux` (`id_animaux`)
) ENGINE=MyISAM AUTO_INCREMENT=682 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `enclos`
--

INSERT INTO `enclos` (`id`, `id_biomes`, `id_animaux`, `repos`, `nom_enclos`, `nom_animal`) VALUES
(1, 5, 2, 0, 'Enclos des Panda Roux', 'Panda Roux'),
(2, 6, 4, 0, 'Enclos des Réptiles', 'Python'),
(3, 6, 6, 0, 'Enclos des Réptiles', 'Iguane'),
(4, 5, 7, 0, 'Enclos Volant ', 'Ara Perroquet'),
(5, 5, 8, 0, 'Enclos Volant', 'Grand Hocco'),
(6, 1, 9, 0, 'Enclos des Trois Continents', 'Rhinocéroce'),
(7, 1, 10, 0, 'Enclos des Trois Continents', 'Oryx Beisa'),
(8, 1, 11, 0, 'Enclos des Trois Continents', 'Gnou'),
(9, 1, 12, 0, 'Enclos des Acrobates de la Jungle ', 'Coatis '),
(10, 1, 13, 0, 'Enclos des Acrobate de la Jungle', 'Saimiris'),
(11, 1, 14, 0, 'Enclos des Grand Courreur', 'Autruches'),
(12, 1, 15, 0, 'Enclos des Grand Courreur', 'Gazelles'),
(13, 3, 16, 0, 'Enclos des Têtes en l\'Air', 'Girafes '),
(14, 3, 17, 0, 'Enclos des Têtes en l\'Air', 'Grivets Cercopithèques'),
(15, 3, 18, 0, 'Enclos des Titans de la nature ', 'Eléphants'),
(16, 3, 19, 0, 'Enclos des Titans de la nature', 'Varan de Komodo'),
(17, 5, 20, 0, 'Enclos Ruisseaux des Curieux', 'Binturong'),
(18, 5, 21, 0, 'Enclos des Ruisseaux Curieux', 'Loutres'),
(19, 2, 22, 0, 'Enclos Plaine des Elégants', 'Antilopes'),
(20, 3, 23, 0, 'Enclos Plaine des Elégants', 'Daims'),
(21, 3, 24, 0, 'Enclos Plaine des Elégants', 'Nilgauts'),
(22, 4, 25, 0, 'Enclos du Désert Provençal', 'Dromadaires'),
(23, 4, 26, 0, 'Enclos du Désert Provençal', 'Anes de Provence'),
(24, 4, 27, 0, 'Enclos la Terre des Australes', 'Emeu'),
(25, 4, 28, 0, 'Enclos la Terre des Australes', 'Wallaby'),
(26, 4, 29, 0, 'Enclos la Savane Tropical', 'Flamant Roses'),
(27, 4, 30, 0, 'Enclos la Savane Tropical', 'Nandou'),
(28, 4, 31, 0, 'Enclos la Savane Tropical', 'Tamanoires'),
(29, 5, 32, 0, 'Enclos Lagune des Explorateurs', 'Tortues'),
(30, 5, 33, 0, 'Enclos Lagune des Explorateurs', 'Ibis'),
(31, 4, 34, 0, 'Enclos des Longues Plumes', 'Cigognes'),
(32, 4, 35, 0, 'Enclos des Longues Plumes', 'Marabouts'),
(33, 4, 36, 0, 'Enclos des Cornes et des Sabots', 'Oryx Algazelle'),
(34, 4, 37, 0, 'Enclos des Cornes et des Sabots', 'Watusi'),
(35, 4, 38, 0, 'Enclos des Cornes et des Sabots', 'Anes de Somalie'),
(36, 4, 39, 0, 'Enclos le Refuge des Montages ', 'Yack'),
(37, 4, 40, 0, 'Enclos le Refuge des Montages', 'Moutons Noir'),
(38, 3, 3, 0, 'Enclos des Capucins', 'Capucin'),
(39, 3, 41, 0, 'Enclos des Ouistiti', 'Ouistiti Gibon'),
(40, 4, 111, 0, 'Enclos des Pécaris', 'Pécaris'),
(41, 4, 110, 0, 'Enclos des Porc-Epic', 'Porc-Epic'),
(42, 4, 109, 0, 'Enclos des Bisons', 'Bisons'),
(43, 4, 108, 0, 'Enclos des Tigres', 'Tigres'),
(44, 4, 107, 0, 'Enclos des Chiens des Buissons', 'Chiens des Buissons'),
(45, 4, 106, 0, 'Enclos des Servals', 'Servals'),
(46, 2, 104, 0, 'Enclos des Loups d\'Europe', 'Loups d\'Europe'),
(47, 2, 103, 0, 'Enclos des Vautours', 'Vautours'),
(48, 2, 102, 0, 'Enclos des Cerfs', 'Cerfs'),
(49, 4, 105, 0, 'Enclos des Lynx', 'Lynx'),
(50, 5, 100, 0, 'Enclos des Mouflons', 'Mouflons '),
(51, 2, 101, 0, 'Enclos des Macaques Crabiers', 'Macaques Crabiers'),
(52, 5, 98, 0, 'Enclos des Lémuriens', 'Lémuriens'),
(53, 5, 99, 0, 'Enclos des Chèvres Naines', 'Chèvres Naines'),
(54, 1, 89, 0, 'Enclos des Tapirs', 'Tapirs'),
(55, 1, 90, 0, 'Enclos des Guépards', 'Guépards'),
(56, 1, 91, 0, 'Enclos des Casoars', 'Casoars'),
(57, 1, 92, 0, 'Enclos des Crocodiles Nains', 'Crocodiles Nains'),
(58, 3, 93, 0, 'Enclos des Lions', 'Lions'),
(59, 3, 94, 0, 'Enclos des Hippopotames', 'Hippopotames'),
(60, 3, 95, 0, 'Enclos des Zèbres ', 'Zèbres '),
(61, 3, 96, 0, 'Enclos des Hyènes', 'Hyènes '),
(62, 3, 97, 0, 'Enclos des Loups à Crinières', 'Loups à Crinières'),
(63, 1, 87, 0, 'Enclos des Suricates', 'Suricates'),
(64, 1, 88, 0, 'Enclos des Fennec', 'Fennec'),
(101, 5, 86, 0, 'Enclos des Panthère', 'Panthère'),
(137, 5, 32, 0, 'Enclos des Tortues', 'Tortues '),
(138, 6, 5, 0, 'Enclos des Réptiles', 'Tortue');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
