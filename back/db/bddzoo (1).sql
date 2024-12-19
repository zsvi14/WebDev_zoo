-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 déc. 2024 à 14:27
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
-- Structure de la table `admin_infos`
--

DROP TABLE IF EXISTS `admin_infos`;
CREATE TABLE IF NOT EXISTS `admin_infos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) NOT NULL,
  `password_hash` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin_infos`
--

INSERT INTO `admin_infos` (`id`, `identifiant`, `password_hash`) VALUES
(1, 'service_veterinaire', 'vet'),
(2, 'service_soigneur', 'soin'),
(3, 'service_logistique', 'logi');

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
  `origine` varchar(255) DEFAULT NULL,
  `alimentation` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `nom`, `nombre`, `id_enclos`, `origine`, `alimentation`, `description`) VALUES
(2, 'Panda Roux ', 10, 1, 'Chine', 'Herbivore, principalement bambou, fruits, et racines.\r\n\r\n', 'Petit mammifère, de la taille d’un chat, au pelage rougeâtre, souvent solitaire et principalement actif la nuit.'),
(4, 'Python', 10, 2, 'Asie, Afrique', 'Carnivore, se nourrit de petits mammifères, oiseaux, reptiles', 'Grand serpent constricteur, capable d’engloutir des proies beaucoup plus grandes que sa tête grâce à ses mâchoires extensibles'),
(5, 'Tortue', 15, 138, 'Diverse régions du monde, principalement tropicale et tempérées', 'Herbivore ou omnivore, mange des plantes, des insectes, et des petits animaux', 'Reptile à carapace dure, lente et terrestre ou aquatique selon les espèces'),
(6, 'Iguane', 8, 3, 'Amérique Centrale et du Sud', 'Herbivore, mange principalement des feuilles, des fleurs et des fruits', 'Lézard robuste avec une crête dorsale, souvent vert, et une grande queue'),
(7, 'Ara Perroquet', 5, 4, 'Amérique du Sud et Centrale', 'Omnivore, principalement fruits, graines, noix et parfois des insectes', 'Grand perroquet coloré, connu pour son intelligence et sa capacité à imiter les sons'),
(8, 'Grand Hocco', 4, 5, 'Amérique Centrale et du Sud', 'Herbivore, mange des fruits, graines et parfois des insectes', 'Grand oiseau au plumage coloré, souvent observé dans les forêts tropicales'),
(9, 'Rhinocéros', 3, 6, 'Afrique et Asie ', 'Herbivore, se nourrit principalement d\'herbe, de feuilles, et d\'écorces', 'Grand mammifère avec une peau épaisse et un ou deux cornes sur le nez'),
(10, 'Oryx Beisa', 6, 7, 'Afrique de l\'Est', 'Herbivore, mange de l’herbe et des arbustes', 'Antilope de grande taille, avec de longues cornes droites et un pelage clair'),
(11, 'Gnou', 12, 8, 'Afrique', 'Herbivore, principalement des herbes', 'Antilope robuste, connue pour ses grandes migrations dans les savanes africaines'),
(12, 'Coatis', 7, 9, 'Amérique du Sud', 'Omnivore, mange des fruits, des insectes, des petits vertébrés', 'Mammifère nocturne à museau allongé, souvent vu en groupe'),
(13, 'Saimiris', 20, 10, 'Amérique Centrale et du Sud', 'Omnivore, mange des fruits, insectes, et petits animaux', 'Petit singe avec une grande queue et un visage marqué par des yeux expressifs'),
(14, 'Autruches', 10, 11, 'Afrique', 'Omnivore, se nourrit principalement de plantes, graines, et parfois d’insectes', 'Oiseau non volant de grande taille, avec des plumes duveteuses et un long cou'),
(15, 'Gazelles', 18, 12, 'Afrique et Asie', 'Herbivore, mange de l\'herbe et des plantes', 'Petite antilope élégante, agile, capable de sauts impressionnants pour échapper aux prédateurs'),
(16, 'Girafes', 6, 13, 'Afrique', 'Herbivore, principalement des feuilles d’acacias', 'Le plus grand mammifère terrestre, avec un long cou et des jambes, reconnaissable à ses taches sur la peau'),
(17, 'Grivets Cercopithèques', 10, 14, 'Afrique de l\'Ouest', 'Omnivore, mange des fruits, des feuilles, des insectes', 'Singe petit et agile, souvent vu en groupes dans les arbres'),
(18, 'Eléphants', 4, 15, 'Afrique et Asie', 'Herbivore, mange des plantes, des fruits, des racines', 'Le plus grand mammifère terrestre, avec des oreilles larges et une trompe caractéristique'),
(19, 'Varan de Komodo', 2, 16, 'Indonésie (île de Komodo)', 'Carnivore, se nourrit principalement de cadavres d\'animaux, de petits mammifères', 'Grand lézard carnivore, considéré comme le plus grand lézard vivant'),
(20, 'Binturong', 6, 17, 'Asie du Sud-Est', 'Omnivore, se nourrit de fruits, poissons, petits mammifères', 'Mammifère nocturne avec une queue préhensile, connu pour son odeur de pop-corn'),
(21, 'Loutres', 8, 18, 'Europe, Asie, Amérique du Nord', 'Carnivore, principalement des poissons et des crustacés', 'Mammifère aquatique avec un pelage épais, souvent observé en train de jouer'),
(22, 'Antilopes', 20, 19, 'Afrique et Asie', 'Herbivore, mange de l’herbe et des plantes', 'Groupe d’animaux qui inclut diverses espèces d’antilopes, reconnues pour leur rapidité et agilité'),
(23, 'Daims', 15, 20, 'Europe, Asie, Amérique du Nord', 'Herbivore, se nourrit principalement de feuilles, de herbes, de baies et de fruits', 'Le daim est un cervidé de taille moyenne, facilement reconnaissable à sa fourrure brune parsemée de taches blanches. Il vit souvent dans les forêts et les parcs'),
(24, 'Nilgauts', 5, 21, 'Inde, Sri Lanka', 'Herbivore, mange des herbes, des feuilles et des fruits', 'Le nilgaut est un grand cervidé, aux longues pattes et au pelage gris-bleu. Il est surtout trouvé dans les régions montagneuses et boisées'),
(25, 'Dromadaires', 7, 22, 'Moyen-Orient, Afrique du Nord', 'Herbivore, mange des plantes, des herbes et des fruits', 'Le dromadaire, ou chameau à une bosse, est adapté aux environnements désertiques. Il est connu pour sa capacité à survivre de longues périodes sans eau'),
(26, 'Anes de Provence', 10, 23, 'France, principalement en Provence', 'Herbivore, se nourrit de foin, d\'herbe et de racines', 'L\'âne de Provence est une race d\'âne typique du sud de la France, de petite taille, au pelage gris clair'),
(27, 'Emeu', 4, 24, 'Australie', 'Omnivore, se nourrit de fruits, de graines, d\'insectes et de petites créatures.', 'L\'émeu est un grand oiseau incapable de voler, mais très rapide, capable de courir à plus de 50 km/h. Il a une plumage doux et éparse.'),
(28, 'Wallaby', 6, 25, 'Australie, Nouvelle-Guinée', 'Herbivore, mange des herbes, des racines et des feuilles.', 'Le wallaby est un petit marsupial ressemblant au kangourou, souvent plus petit et vivant dans les zones boisées ou montagneuses.'),
(29, 'Flamant Roses', 30, 26, 'Afrique, Asie, Amérique du Sud', 'Carnivore, principalement des algues, des crustacés et des insectes.', 'Le flamant rose est un oiseau aquatique caractérisé par son plumage rose, ses longues jambes et son bec courbé qui l\'aide à filtrer la nourriture dans l\'eau.'),
(30, 'Nandou', 15, 27, 'Amérique du Sud', 'Herbivore, mange des graminées, des fruits et des graines.', 'Le nandou, également appelé autruche sud-américaine, est un grand oiseau coureur, similaire à l\'autruche mais plus petit, avec des plumes gris-brun.'),
(31, 'Tamanoirs', 5, 28, 'Amérique du Sud', 'Insectivore, principalement des fourmis et des termites.', 'Le tamanoir, ou fourmilier géant, est un grand mammifère terrestre avec un long museau et une langue extensible qui lui permet de capturer des insectes.'),
(32, 'Tortues', 25, 29, 'Présente sur tous les continents sauf l\'Antarctique', 'Herbivore ou omnivore, selon les espèces, mange des plantes, des fruits, des insectes et des poissons.', 'Les tortues sont des reptiles caractérisés par leur carapace dure, leur mobilité lente et leur longévité remarquable.\r\n'),
(33, 'Ibis', 12, 30, 'Afrique, Asie, Europe, Amérique du Sud', 'Carnivore, se nourrit de petits poissons, de crustacés et d\'insectes.', 'L\'ibis est un oiseau aux longues pattes et au bec courbé. Il est souvent observé dans les marais ou les zones humides.'),
(34, 'Cigognes', 18, 31, 'Europe, Asie, Afrique', 'Carnivore, mange des poissons, des grenouilles et des insectes', 'Les cigognes sont des oiseaux migrateurs à long cou et à grandes ailes. Elles sont célèbres pour leur nidification sur les toits des maisons.'),
(35, 'Marabouts', 7, 32, 'Afrique', 'Carnivore, mange des poissons, des insectes et des animaux morts.', 'Le marabout est un oiseau grand et imposant, souvent vu dans les zones marécageuses et à la recherche de charognes.'),
(36, 'Oryx Algazelle', 9, 33, 'Afrique de l\'Est', 'Herbivore, se nourrit de graminées, de plantes succulentes et de baies.', 'L\'oryx algazelle est un antilope au corps robuste, avec de longues cornes droites. Il est capable de résister à des températures très élevées.'),
(37, 'Watusi', 6, 34, 'Afrique Centrale', 'Herbivore, mange principalement de l\'herbe et des plantes.', 'Le Watusi est un grand bétail caractérisé par de longues cornes en forme de croissant. Il est principalement élevé pour sa viande et ses cornes.'),
(38, 'Anes de Somalie', 8, 35, 'Afrique de l\'Est', 'Herbivore, mange principalement de l\'herbe, des feuillages et des branches.', 'Plus petit que l\'âne domestique, cet âne sauvage est adapté aux conditions arides. Il possède une fourrure courte et des oreilles longues. Il est malheureusement menacé d\'extinction.'),
(39, 'Yack', 5, 36, 'Asie', 'Herbivore, se nourrit d\'herbes, de mousse et de lichens.', 'Un grand mammifère robuste et velu, particulièrement adapté aux conditions froides. Utilisé par les peuples des montagnes pour le transport, ainsi que pour leur lait, leur viande et leur fourrure.'),
(40, 'Moutons Noir', 10, 37, 'Europe', 'Herbivore, mange principalement de l\'herbe et d\'autres plantes.', 'Une race de mouton avec une laine noire, reconnue pour sa rusticité et sa capacité à s\'adapter à divers climats.'),
(3, 'Capucin', 16, 38, 'Amérique Central et du Sud', 'Omnivore, il mange des fruits, des noix, des graines, des insectes et de petits animaux.', 'Petit singe de la famille des Cebidae, connu pour son intelligence et sa capacité à utiliser des outils. Les capucins vivent en groupes sociaux et sont actifs en journée.'),
(41, 'Ouistiti Gibon', 11, 39, 'Asie du Sud-Est', 'Frugivore, consomme principalement des fruits, des feuilles et des insectes.', 'Le gibbon est un petit singe de la famille des hominidés, caractérisé par ses bras longs et sa capacité à se déplacer en se balançant d\'arbre en arbre. Il est aussi connu pour ses chants.'),
(111, 'Pécaris', 3, 40, 'Amérique Centrale et du Sud', 'Omnivore, se nourrit de racines, de fruits, de graines, d\'insectes et parfois de petits vertébrés.', 'Un animal ressemblant à un porc, souvent vu en troupeaux. Les pécaris vivent dans les forêts tropicales et sont connus pour leur comportement social.\r\n'),
(110, 'Porc-Epic', 15, 41, 'Amérique, Afrique et Asie', 'Herbivore, mange principalement des racines, des écorces et des fruits.', 'Un mammifère couvert de piquants acérés, qui les utilise pour se défendre contre les prédateurs. Il est principalement nocturne.'),
(109, 'Bisons', 7, 42, 'Amérique du Nord et Europe', 'Herbivore, mange principalement de l\'herbe, des arbustes et des jeunes pousses.', 'Le bison est un grand mammifère ruminant, avec une grande bosse sur les épaules. Il est symbole de la faune américaine et est souvent associé aux plaines d\'Amérique du Nord.'),
(108, 'Tigres', 5, 43, 'Asie', 'Carnivore, chasse principalement des ongulés, comme les cerfs, les sangliers et les buffles.', 'Le plus grand des félins, caractérisé par ses rayures sur la fourrure. Le tigre est un prédateur solitaire et puissant.'),
(107, 'Chiens des Buissons', 22, 44, 'Afrique Subsaharienne', 'Carnivore, il chasse principalement des petits mammifères, des oiseaux et des reptiles.', 'Un chien sauvage qui vit en meute, caractérisé par sa petite taille et ses grandes oreilles. Ils sont connus pour leur comportement social et leur habileté à chasser en groupe.'),
(106, 'Servals', 13, 45, 'Afrique subsaharienne', 'Carnivore, il chasse principalement des rongeurs, des oiseaux et des petits mammifères.', 'Un félin de taille moyenne, au pelage tacheté et aux grandes oreilles, il est un excellent chasseur grâce à sa grande agilité.'),
(104, 'Loups d\'Europe', 18, 46, 'Europe et Asie', 'Carnivore, il chasse des proies comme des cerfs, des sangliers et des petits animaux.', 'Le loup d\'Europe est un prédateur social qui vit et chasse en meute, et est connu pour son hurlement caractéristique.'),
(103, 'Vautours', 24, 47, 'Afrique, Asie et Europe', 'Nécrophage, se nourrit principalement de carcasses d\'animaux morts.', 'Oiseaux de grande taille, avec des ailes larges et une tête déplumée, adaptés à la consommation de charognes.'),
(102, 'Cerfs', 32, 48, 'Europe, Asie et Amérique du Nord', 'Herbivore, se nourrit principalement d\'herbe, de feuillage et de fruits.', 'Un grand mammifère ruminant, avec des bois chez les mâles. Ils sont souvent associés aux forêts et aux prairies.'),
(105, 'Lynx', 9, 49, 'Europe, Asie et Amérique du Nord', 'Carnivore, chasse principalement des ongulés, des lièvres et des oiseaux.', 'Un félin sauvage, avec des oreilles touffues et une fourrure dense. Le lynx est un prédateur discret, chassant principalement la nuit.'),
(100, 'Mouflons', 27, 50, 'Europe et Asie', 'Herbivore, se nourrit de plantes, d\'herbes et de feuilles.', 'Un petit mouton sauvage, avec des cornes recourbées chez les mâles. Ils vivent souvent dans des zones rocheuses et montagneuses.'),
(101, 'Macaques Crabiers', 36, 51, 'Asie du Sud-Est', 'Omnivore, se nourrit de fruits, de graines, d\'insectes et de petits animaux.', 'Un petit singe souvent vu dans les forêts et les montagnes, il est connu pour sa capacité à se nourrir de crustacés.'),
(98, 'Lémuriens', 54, 52, 'Madagascar', 'Omnivore, mange principalement des fruits, des feuilles, des insectes et des fleurs.', 'Un groupe de primates endémique de Madagascar, souvent caractérisé par leur grande queue touffue et leurs yeux expressifs.'),
(99, 'Chèvres Naines', 14, 53, 'Afrique de l\'Ouest', 'Herbivore, mange de l\'herbe, des feuilles, des arbustes et des broussailles.', 'Une race de chèvre de petite taille, très rustique, qui est élevée pour sa viande, son lait et sa laine.'),
(89, 'Tapirs', 16, 54, 'Asie du Sud-Est, Amérique Centrale et du Sud', 'Herbivore, se nourrit principalement de fruits, de feuilles et de jeunes pousses.', 'Un gros mammifère au corps massif et à un long museau préhensile. Ils vivent souvent dans des habitats de forêts tropicales humides.'),
(90, 'Guépards', 8, 55, 'Afrique et Asie', 'Carnivore, principalement des gazelles et autres petits mammifères qu\'il chasse à grande vitesse.', 'Le guépard est un prédateur terrestre extrêmement rapide, capable de courir à des vitesses impressionnantes. Il est souvent reconnaissable à ses taches noires sur un pelage doré.'),
(91, 'Casoars', 38, 56, 'Nouvelle-Guinée et Australie', 'Omnivore, principalement des fruits, des graines, mais aussi des petits animaux et des insectes.', 'Un grand oiseau non volateur avec une crête osseuse sur la tête. Le casoar est réputé pour être très territorial et est capable de causer des blessures graves en cas d\'attaque.'),
(92, 'Crocodiles Nains', 10, 57, 'Afrique de l\'Ouest et Centrale', 'Carnivore, se nourrit de poissons, de petits mammifères, et d\'oiseaux.', 'Un petit crocodile mesurant généralement moins de 2 mètres de long, moins agressif que ses congénères plus grands. Il vit principalement dans les rivières et les marécages.'),
(93, 'Lions', 12, 58, 'Afrique ', 'Carnivore, chasse des grandes proies comme les zèbres, les gazelles et les buffles.', 'Le lion est un grand félin social, vivant en groupes appelés \"meutes\". Il est célèbre pour sa crinière distinctive et son rôle de prédateur au sommet de la chaîne alimentaire.'),
(94, 'Hippopotames', 21, 59, 'Afrique', 'Herbivore, se nourrit principalement d\'herbe, qu\'il broute près des rivières et des lacs.', 'Un grand mammifère semi-aquatique, connu pour sa taille imposante et sa vie en groupe. Il passe beaucoup de temps dans l\'eau pour se refroidir et protéger sa peau.'),
(95, 'Zèbres', 15, 60, 'Afrique ', 'Herbivore, se nourrit principalement d\'herbe et de feuilles.', 'Un cheval sauvage africain, facilement reconnaissable à ses rayures noires et blanches. Les zèbres vivent en groupes et sont des animaux sociaux.'),
(96, 'Hyènes', 23, 61, 'Afrique et Asie', 'Carnivore, principalement des charognes mais elles peuvent aussi chasser en groupe.', 'Les hyènes sont des carnivores nocturnes, connues pour leurs rires caractéristiques. Elles vivent en groupes sociaux appelés clans et sont des opportunistes alimentaires.'),
(97, 'Loups à Crinières', 40, 62, 'Afrique', 'Carnivore, chasse des proies telles que des ongulés et des oiseaux.', 'Une sous-espèce de loup caractérisée par une crinière ressemblant à celle des lions. Ils vivent et chassent en meute.'),
(87, 'Suricates', 48, 63, 'Afrique', 'Insectivore, se nourrit principalement de termites, d\'insectes et de petits reptiles.', 'Petit mammifère de la famille des mangoustes, connu pour son comportement social. Les suricates vivent en groupes et sont souvent vus debout, surveillant les environs.'),
(88, 'Fennec', 33, 64, 'Afrique du Nord', 'Omnivore, se nourrit d\'insectes, de petits rongeurs, de fruits et de plantes.', 'Un petit renard au pelage clair et aux grandes oreilles. Adapté aux conditions désertiques, le fennec est nocturne et a une excellente capacité à entendre des proies sous le sable.'),
(86, 'Panthère', 6, 101, 'Afrique et Asie', 'Carnivore, chasse des ongulés, des primates et d\'autres petits animaux.', 'La panthère est un grand félin connu pour son pelage tacheté ou uni. Elle est également capable de se camoufler dans les arbres et les buissons.'),
(162, 'Tortue', 21, 137, 'Présent sur tous les continents sauf l\'Antarctique', 'Herbivore (pour certaines espèces), omnivore ou carnivore (pour d\'autres espèces).', 'Un reptile à carapace dure qui utilise pour se protéger des prédateurs. Les tortues peuvent vivre sur terre ou dans l\'eau, selon les espèces.');

-- --------------------------------------------------------

--
-- Structure de la table `biomes`
--

DROP TABLE IF EXISTS `biomes`;
CREATE TABLE IF NOT EXISTS `biomes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `couleur` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `biomes`
--

INSERT INTO `biomes` (`id`, `couleur`, `nom`) VALUES
(1, '#D2B48C', 'Le belvedere'),
(2, '#228B22', 'Le bois des pins'),
(3, '#FFB6C1', 'Le plateau'),
(4, '#FFD700', 'Les clairieres'),
(5, '#ADD8E6', 'Le vallon de cascades'),
(6, '#A9A9A9', 'La bergerie des reptiles');

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
  `h_repas` varchar(255) DEFAULT '12h',
  PRIMARY KEY (`id`),
  KEY `id_biomes` (`id_biomes`),
  KEY `id_animaux` (`id_animaux`)
) ENGINE=MyISAM AUTO_INCREMENT=682 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `enclos`
--

INSERT INTO `enclos` (`id`, `id_biomes`, `id_animaux`, `repos`, `nom_enclos`, `nom_animal`, `h_repas`) VALUES
(1, 5, 2, 0, 'Enclos des Panda Roux', 'Panda Roux', '12:40'),
(2, 6, 4, 0, 'Enclos des Réptiles', 'Python', '12h'),
(3, 6, 6, 0, 'Enclos des Réptiles', 'Iguane', '12h'),
(4, 5, 7, 0, 'Enclos Volant ', 'Ara Perroquet', '12h'),
(5, 5, 8, 1, 'Enclos Volant', 'Grand Hocco', '12h'),
(6, 1, 9, 0, 'Enclos des Trois Continents', 'Rhinocéroce', '12h'),
(7, 1, 10, 0, 'Enclos des Trois Continents', 'Oryx Beisa', '12h'),
(8, 1, 11, 0, 'Enclos des Trois Continents', 'Gnou', '12h'),
(9, 1, 12, 0, 'Enclos des Acrobates de la Jungle ', 'Coatis ', '12h'),
(10, 1, 13, 0, 'Enclos des Acrobate de la Jungle', 'Saimiris', '12h'),
(11, 1, 14, 0, 'Enclos des Grand Courreur', 'Autruches', '12h'),
(12, 1, 15, 1, 'Enclos des Grand Courreur', 'Gazelles', '12h'),
(13, 3, 16, 0, 'Enclos des Têtes en l\'Air', 'Girafes ', '12h'),
(14, 3, 17, 0, 'Enclos des Têtes en l\'Air', 'Grivets Cercopithèques', '12h'),
(15, 3, 18, 0, 'Enclos des Titans de la nature ', 'Eléphants', '12h'),
(16, 3, 19, 0, 'Enclos des Titans de la nature', 'Varan de Komodo', '12h'),
(17, 5, 20, 0, 'Enclos Ruisseaux des Curieux', 'Binturong', '12h'),
(18, 5, 21, 0, 'Enclos des Ruisseaux Curieux', 'Loutres', '12h'),
(19, 2, 22, 1, 'Enclos Plaine des Elégants', 'Antilopes', '12h'),
(20, 3, 23, 0, 'Enclos Plaine des Elégants', 'Daims', '12h'),
(21, 3, 24, 0, 'Enclos Plaine des Elégants', 'Nilgauts', '12h'),
(22, 4, 25, 0, 'Enclos du Désert Provençal', 'Dromadaires', '12:56'),
(23, 4, 26, 0, 'Enclos du Désert Provençal', 'Anes de Provence', '12h'),
(24, 4, 27, 0, 'Enclos la Terre des Australes', 'Emeu', '12h'),
(25, 4, 28, 0, 'Enclos la Terre des Australes', 'Wallaby', '12h'),
(26, 4, 29, 0, 'Enclos la Savane Tropical', 'Flamant Roses', '12h'),
(27, 4, 30, 0, 'Enclos la Savane Tropical', 'Nandou', '12h'),
(28, 4, 31, 0, 'Enclos la Savane Tropical', 'Tamanoires', '12h'),
(29, 5, 32, 0, 'Enclos Lagune des Explorateurs', 'Tortues', '12h'),
(30, 5, 33, 0, 'Enclos Lagune des Explorateurs', 'Ibis', '12h'),
(31, 4, 34, 0, 'Enclos des Longues Plumes', 'Cigognes', '12h'),
(32, 4, 35, 0, 'Enclos des Longues Plumes', 'Marabouts', '12h'),
(33, 4, 36, 0, 'Enclos des Cornes et des Sabots', 'Oryx Algazelle', '12h'),
(34, 4, 37, 0, 'Enclos des Cornes et des Sabots', 'Watusi', '12h'),
(35, 4, 38, 0, 'Enclos des Cornes et des Sabots', 'Anes de Somalie', '12h'),
(36, 4, 39, 0, 'Enclos le Refuge des Montages ', 'Yack', '12h'),
(37, 4, 40, 0, 'Enclos le Refuge des Montages', 'Moutons Noir', '12h'),
(38, 3, 3, 0, 'Enclos des Capucins', 'Capucin', '12h'),
(39, 3, 41, 0, 'Enclos des Ouistiti', 'Ouistiti Gibon', '12h'),
(40, 4, 111, 0, 'Enclos des Pécaris', 'Pécaris', '12h'),
(41, 4, 110, 0, 'Enclos des Porc-Epic', 'Porc-Epic', '12h'),
(42, 4, 109, 0, 'Enclos des Bisons', 'Bisons', '12h'),
(43, 4, 108, 0, 'Enclos des Tigres', 'Tigres', '12h'),
(44, 4, 107, 0, 'Enclos des Chiens des Buissons', 'Chiens des Buissons', '12h'),
(45, 4, 106, 0, 'Enclos des Servals', 'Servals', '12h'),
(46, 2, 104, 0, 'Enclos des Loups d\'Europe', 'Loups d\'Europe', '12h'),
(47, 2, 103, 0, 'Enclos des Vautours', 'Vautours', '12h'),
(48, 2, 102, 0, 'Enclos des Cerfs', 'Cerfs', '12h'),
(49, 4, 105, 0, 'Enclos des Lynx', 'Lynx', '12h'),
(50, 5, 100, 0, 'Enclos des Mouflons', 'Mouflons ', '12h'),
(51, 2, 101, 0, 'Enclos des Macaques Crabiers', 'Macaques Crabiers', '12h'),
(52, 5, 98, 0, 'Enclos des Lémuriens', 'Lémuriens', '12h'),
(53, 5, 99, 0, 'Enclos des Chèvres Naines', 'Chèvres Naines', '12h'),
(54, 1, 89, 0, 'Enclos des Tapirs', 'Tapirs', '12h'),
(55, 1, 90, 0, 'Enclos des Guépards', 'Guépards', '12h'),
(56, 1, 91, 0, 'Enclos des Casoars', 'Casoars', '12h'),
(57, 1, 92, 0, 'Enclos des Crocodiles Nains', 'Crocodiles Nains', '12h'),
(58, 3, 93, 0, 'Enclos des Lions', 'Lions', '12h'),
(59, 3, 94, 0, 'Enclos des Hippopotames', 'Hippopotames', '12h'),
(60, 3, 95, 0, 'Enclos des Zèbres ', 'Zèbres ', '12h'),
(61, 3, 96, 0, 'Enclos des Hyènes', 'Hyènes ', '12h'),
(62, 3, 97, 0, 'Enclos des Loups à Crinières', 'Loups à Crinières', '12h'),
(63, 1, 87, 0, 'Enclos des Suricates', 'Suricates', '12h'),
(64, 1, 88, 0, 'Enclos des Fennec', 'Fennec', '12h'),
(101, 5, 86, 0, 'Enclos des Panthère', 'Panthère', '12h'),
(137, 5, 32, 0, 'Enclos des Tortues', 'Tortues ', '12h'),
(138, 6, 5, 0, 'Enclos des Réptiles', 'Tortue', '12h');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `location`) VALUES
(1, 'Restaurant du Parc', 'Un restaurant situé au cœur du parc.', 'Le Vallon des cascades'),
(2, 'Boutique', 'Une boutique avec des souvenirs et des produits locaux.', 'Entrée principale'),
(3, 'Aire de pique-nique', 'Espace pour pique-niquer en famille.', 'Le Bois des pins');

-- --------------------------------------------------------

--
-- Structure de la table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(200) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `userinfo`
--

INSERT INTO `userinfo` (`id`, `mail`, `nom`, `prenom`, `password`, `isAdmin`) VALUES
(1, 'a@gmail.com', 'a', '', '$2y$10$4Y3FG9nnn46YIRQvl3fZduqLkbrYKpT1AaCf1nnCqQoYlDm1RsYne', 0),
(2, 's@gmail.com', 's', '', '$2y$10$SvjEKBe8W/MxitIVCNxO9uESze0tKSuZogJx1k2YMuVAoX4RrZ0Xq', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
