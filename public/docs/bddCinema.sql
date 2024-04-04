-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema
DROP DATABASE IF EXISTS `cinema`;
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema`;

-- Listage de la structure de table cinema. acteur
DROP TABLE IF EXISTS `acteur`;
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_acteur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK_acteur_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.acteur : ~24 rows (environ)
DELETE FROM `acteur`;
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(1, 6),
	(2, 7),
	(3, 8),
	(4, 9),
	(5, 10),
	(6, 11),
	(7, 12),
	(8, 13),
	(9, 14),
	(10, 15),
	(11, 16),
	(12, 17),
	(13, 18),
	(14, 19),
	(15, 20),
	(16, 21),
	(17, 22),
	(18, 23),
	(19, 24),
	(20, 25),
	(21, 26),
	(22, 27),
	(23, 28),
	(24, 29);

-- Listage de la structure de table cinema. casting
DROP TABLE IF EXISTS `casting`;
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL DEFAULT '0',
  `id_acteur` int NOT NULL DEFAULT '0',
  `id_role` int NOT NULL DEFAULT '0',
  KEY `id_film` (`id_film`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `FK_casting_acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `FK_casting_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_casting_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.casting : ~22 rows (environ)
DELETE FROM `casting`;
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(13, 23, 1),
	(13, 24, 2),
	(12, 21, 3),
	(12, 22, 4),
	(10, 16, 8),
	(10, 17, 9),
	(11, 18, 5),
	(11, 19, 6),
	(11, 20, 7),
	(8, 12, 13),
	(8, 13, 14),
	(9, 14, 15),
	(9, 15, 16),
	(5, 6, 21),
	(5, 7, 22),
	(5, 8, 23),
	(7, 9, 10),
	(7, 11, 11),
	(7, 10, 12),
	(4, 1, 17),
	(4, 4, 24),
	(4, 5, 25);

-- Listage de la structure de table cinema. film
DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `nom_film` varchar(50) NOT NULL,
  `duree` int DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `synopsis` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `note` float DEFAULT NULL,
  `affiche` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_realisateur` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `FK_film_realisateur` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.film : ~9 rows (environ)
DELETE FROM `film`;
INSERT INTO `film` (`id_film`, `nom_film`, `duree`, `date_sortie`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(4, 'Dune', 155, '1984-12-14', 'L\'histoire de Paul Atreides, jeune homme aussi doué que brillant, voué à connaître un destin hors du commun qui le dépasse totalement. Car s\'il veut préserver l\'avenir de sa famille et de son peuple, il devra se rendre sur la planète la plus dangereuse de l\'univers – la seule à même de fournir la ressource la plus précieuse au monde, capable de décupler la puissance de l\'humanité. Tandis que des forces maléfiques se disputent le contrôle de cette planète, seuls ceux qui parviennent à dominer leur peur pourront survivre…', 3.7, 'https://fr.web.img6.acsta.net/pictures/21/08/10/12/20/4633954.jpg', 1),
	(5, 'Elephant Man', 124, '1981-04-08', 'Londres, 1884. Le chirurgien Frederick Treves découvre un homme complètement défiguré et difforme, devenu une attraction de foire. John Merrick, " le monstre ", doit son nom de Elephant Man au terrible accident que subit sa mère. Alors enceinte de quelques mois, elle est renversée par un éléphant.', 3.9, 'https://fr.web.img6.acsta.net/pictures/20/02/21/16/48/4302324.jpg', 1),
	(7, 'Les Dents de la mer', 124, '1976-01-01', 'Les Dents de la mer est un thriller américain sorti en 1975 et réalisé par Steven Spielberg. Le film raconte l\'histoire de la petite station balnéaire d\'Amity, où les habitants sont mis en émoi par la découverte sur le littoral du corps atrocement mutilé d\'une jeune vacancière. Pour Martin Brody, le chef de la police, il ne fait aucun doute que la jeune fille a été victime d\'un requin', 2.6, 'https://fr.web.img6.acsta.net/pictures/210/242/21024272_20130802174854374.jpg', 2),
	(8, 'E.T.', 115, '1982-12-01', 'E.T., l\'extra-terrestre est un film de science-fiction américain réalisé par Steven Spielberg et sorti en 1982. Le film raconte l\'histoire d\'Elliott, un petit garçon solitaire qui se lie d\'amitié avec un extraterrestre abandonné sur Terre. Avec son frère et sa sœur, Elliott va le recueillir puis l\'aider à reprendre contact avec ses congénères, tout en essayant de le garder caché de leur mère et du gouvernement américain.', 2.8, 'https://fr.web.img4.acsta.net/medias/nmedia/00/02/36/52/affet.jpg', 2),
	(9, 'Jurassic Park', 127, '1993-10-20', 'Jurassic Park est un film de science-fiction qui raconte l\'histoire de scientifiques qui ont réussi à cloner des animaux préhistoriques sur une île au large du Costa Rica. Le milliardaire John Hammond a financé leur découverte, qui a permis de créer un parc d\'attractions peuplé de dinosaures. Les dinosaures ont été clonés à partir d\'une goutte de sang absorbée par un moustique fossilisé', 4.4, 'https://fr.web.img4.acsta.net/pictures/20/07/21/16/53/1319265.jpg', 2),
	(10, 'Titanic', 195, '1998-01-07', 'Southampton, 10 avril 1912. Le paquebot le plus grand et le plus moderne du monde, réputé pour son insubmersibilité, le \'Titanic\', appareille pour son premier voyage. Quatre jours plus tard, il heurte un iceberg. A son bord, un artiste pauvre et une grande bourgeoise tombent amoureux.', 3.2, 'https://fr.web.img2.acsta.net/pictures/19/10/25/11/18/5224976.jpg', 3),
	(11, 'Avatar', 162, '2009-12-16', 'Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre. Parce que l\'atmosphère de Pandora est toxique pour les humains, ceux-ci ont créé le Programme Avatar, qui permet à des \'pilotes\' humains de lier leur esprit à un avatar, un corps biologique commandé à distance, capable de survivre dans cette atmosphère létale. Ces avatars sont des hybrides créés génétiquement en croisant l\'ADN humain avec celui des Na\'vi, les autochtones de Pandora.', 4.6, 'https://fr.web.img3.acsta.net/medias/nmedia/18/64/43/65/19150275.jpg', 3),
	(12, 'Bumblebee', 114, '2018-12-26', 'Alors qu\'il est en fuite, l\'Autobot Bumblebee trouve refuge dans la décharge d\'une petite ville balnéaire de Californie. Il est découvert, brisé et couvert de blessures de guerre, par Charlie, une ado qui approche de ses 18 ans et cherche sa place dans le monde.', 4.7, 'https://fr.web.img4.acsta.net/pictures/18/11/12/10/02/5168605.jpg', 5),
	(13, 'Ninja Turtles', 101, '2014-10-15', 'Tenez-vous prêts : quatre héros de légende vont bientôt faire parler d’eux à New York… Leonardo, le leader, Michelangelo, le beau gosse, Raphael, le rebelle et Donatello, le cerveau, vont tout faire pour défendre la ville de New York, prise entre les griffes de Shredder. Entre deux dégustations de pizzas (sans anchois, bien sûr) et un entraînement intense aux arts martiaux, prodigué par leur maître Splinter, ils vont accomplir leur destin, aidés par la courageuse reporter, April O’Neil.', 4.2, 'https://fr.web.img5.acsta.net/pictures/14/09/09/16/31/419889.jpg', 5);

-- Listage de la structure de table cinema. filmotheque
DROP TABLE IF EXISTS `filmotheque`;
CREATE TABLE IF NOT EXISTS `filmotheque` (
  `id_film` int NOT NULL DEFAULT '0',
  `id_genre` int NOT NULL DEFAULT '0',
  KEY `id_film` (`id_film`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `FK_filmotheque_par_genre_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_filmotheque_par_genre_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.filmotheque : ~64 rows (environ)
DELETE FROM `filmotheque`;
INSERT INTO `filmotheque` (`id_film`, `id_genre`) VALUES
	(4, 5),
	(4, 11),
	(4, 1),
	(4, 6),
	(4, 4),
	(4, 14),
	(5, 3),
	(5, 13),
	(5, 4),
	(5, 1),
	(5, 11),
	(5, 15),
	(7, 11),
	(7, 6),
	(7, 4),
	(7, 8),
	(7, 1),
	(7, 3),
	(8, 7),
	(8, 5),
	(8, 1),
	(8, 8),
	(8, 6),
	(8, 4),
	(8, 3),
	(8, 16),
	(9, 11),
	(9, 4),
	(9, 5),
	(9, 8),
	(9, 1),
	(9, 6),
	(9, 14),
	(10, 5),
	(10, 6),
	(10, 11),
	(10, 13),
	(10, 4),
	(10, 7),
	(10, 1),
	(10, 10),
	(10, 8),
	(11, 9),
	(11, 3),
	(11, 1),
	(11, 5),
	(11, 11),
	(11, 8),
	(11, 7),
	(11, 6),
	(12, 5),
	(12, 8),
	(12, 9),
	(12, 6),
	(12, 7),
	(12, 1),
	(12, 3),
	(12, 16),
	(13, 5),
	(13, 3),
	(13, 8),
	(13, 16),
	(13, 6),
	(13, 9);

-- Listage de la structure de table cinema. genre
DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.genre : ~15 rows (environ)
DELETE FROM `genre`;
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Drame'),
	(2, 'Fantastique'),
	(3, 'Comédie'),
	(4, 'Thriller'),
	(5, 'Action'),
	(6, 'Aventure'),
	(7, 'Horreur'),
	(8, 'Science-fiction'),
	(9, 'Animation'),
	(10, 'Historique'),
	(11, 'Documentaire'),
	(13, 'Romance'),
	(14, 'Policier'),
	(15, 'Guerre'),
	(16, 'Film pour enfants');

-- Listage de la structure de table cinema. personne
DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.personne : ~29 rows (environ)
DELETE FROM `personne`;
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `photo`, `date_naissance`) VALUES
	(1, 'Lynch', 'David', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/0/00/David_Lynch_Cannes_2017.jpg', '1946-01-20'),
	(2, 'Spielberg', 'Steven', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/4/4d/MKr25402_Steven_Spielberg_%28Berlinale_2023%29.jpg', '1946-12-18'),
	(3, 'Cameron', 'James', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/James_Cameron_by_Gage_Skidmore.jpg/290px-James_Cameron_by_Gage_Skidmore.jpg', '1954-08-16'),
	(4, 'Jackson', 'Peter', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Peter_Jackson_SDCC_2014.jpg/1200px-Peter_Jackson_SDCC_2014.jpg', '1961-10-31'),
	(5, 'Bay', 'Michael', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/MichaelBay08.jpg/640px-MichaelBay08.jpg', '1965-02-17'),
	(6, 'MacLachlan', 'Kyle', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/6/69/Kyle_McLachlan_Cannes_2017_2.jpg', '1959-02-22'),
	(7, 'Ontkean', 'Michael', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/a/a5/Michael_Ontkean.jpg', '1946-01-24'),
	(8, 'Amick', 'Mädchen', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Madchen_Amick_by_Gage_Skidmore.jpg/640px-Madchen_Amick_by_Gage_Skidmore.jpg', '1970-12-12'),
	(9, 'Madsen', 'Virginia', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Virginia_Madsen_Oscars_2009.jpg/1200px-Virginia_Madsen_Oscars_2009.jpg', '1961-09-11'),
	(10, 'Annis', 'Francesca', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/f/fd/Francesca-annis-trailer.jpg', '1945-05-14'),
	(11, 'Hopkins', 'Anthony', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/4/47/AnthonyHopkins10TIFF.jpg', '1937-12-31'),
	(12, 'Hurt', 'John', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/John_Hurt_at_the_2009_Tribeca_Film_Festival.jpg/800px-John_Hurt_at_the_2009_Tribeca_Film_Festival.jpg', '1940-01-22'),
	(13, 'Bancroft', 'Anne', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/0/0f/Anne_Bancroft_Chrysler_Theatre_1964.jpg', '1931-09-17'),
	(14, 'Scheider', 'Roy', 'Homme', 'https://fr.web.img4.acsta.net/pictures/17/10/16/12/38/4139658.jpg', '1932-11-10'),
	(15, 'Dreyfuss', 'Richard', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Richard_Dreyfuss_Photo_Op_GalaxyCon_Raleigh_2023.jpg/640px-Richard_Dreyfuss_Photo_Op_GalaxyCon_Raleigh_2023.jpg', '1947-10-29'),
	(16, 'Shaw', 'Robert', 'Homme', 'https://fr.web.img5.acsta.net/pictures/210/242/21024282_20130802182144762.jpg', '1927-08-09'),
	(17, 'Thomas', 'Henri', 'Homme', 'https://fr.web.img6.acsta.net/pictures/17/08/02/11/44/356491.jpg', '1971-09-09'),
	(18, 'Barrymore', 'Drew', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Drew_Barrymore_in_2019.jpg/640px-Drew_Barrymore_in_2019.jpg', '1975-02-22'),
	(19, 'Neill', 'Sam', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/a/a6/Sam_Neill_2022_%28cropped%29.jpg', '1947-09-14'),
	(20, 'Dern', 'Laura', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/b/bc/Laura_Dern_Deauville_2017.jpg', '1967-02-10'),
	(21, 'DiCaprio', 'Leonardo', 'Homme', 'https://fr.web.img5.acsta.net/pictures/15/06/24/14/36/054680.jpg', '1974-11-11'),
	(22, 'Winslet', 'Kate', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Kate_Winslet_March_18%2C_2014_%28headshot%29.jpg/640px-Kate_Winslet_March_18%2C_2014_%28headshot%29.jpg', '1975-10-05'),
	(23, 'Worthington', 'Sam', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/2/2b/Avatar_The_Way_of_Water_Tokyo_Press_Conference_Sam_Worthington_%2852563252594%29_%28cropped%29.jpg', '1976-08-02'),
	(24, 'Saldaña', 'Zoe', 'Femme', 'https://fr.web.img2.acsta.net/c_310_420/pictures/18/05/04/11/38/3895826.jpg', '1978-06-19'),
	(25, 'Weaver', 'Sigourney', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Sigourney_Weaver_by_Gage_Skidmore.jpg/640px-Sigourney_Weaver_by_Gage_Skidmore.jpg', '1949-10-08'),
	(26, 'Steinfeld', 'Hailee', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Hailee_Steinfeld_by_Gage_Skidmore.jpg/1200px-Hailee_Steinfeld_by_Gage_Skidmore.jpg', '1996-12-11'),
	(27, 'Lendeborg Jr.', 'Jorge', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/e/e7/Jorge_Lendeborg_Jr._by_Gage_Skidmore.jpg', '1996-01-21'),
	(28, 'Fox', 'Megan', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/1/11/Machine_Gun_Kelly_and_Megan_Fox_%2851914406561%29_%28cropped2%29.jpg', '1986-05-16'),
	(29, 'Arnett', 'Will', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Will_Arnett_%2828575894456%29_%28cropped%29.jpg/1200px-Will_Arnett_%2828575894456%29_%28cropped%29.jpg', '1970-05-04');

-- Listage de la structure de table cinema. realisateur
DROP TABLE IF EXISTS `realisateur`;
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK_realisateur_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.realisateur : ~5 rows (environ)
DELETE FROM `realisateur`;
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5);

-- Listage de la structure de table cinema. role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.role : ~25 rows (environ)
DELETE FROM `role`;
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'April O\'Neil'),
	(2, 'Vern Fenwick'),
	(3, 'Charlie'),
	(4, 'Memo'),
	(5, 'Jake Sully'),
	(6, 'Neytiri'),
	(7, 'Dr. Grace Augustine'),
	(8, 'Jack Dawson'),
	(9, 'Rose Dewitt Bukater'),
	(10, 'Brody'),
	(11, 'Quint'),
	(12, 'Hooper'),
	(13, 'Elliott'),
	(14, 'Gertie'),
	(15, 'Grant'),
	(16, 'Ellie'),
	(17, 'Paul Atreides'),
	(18, 'Special Agent Dale Cooper'),
	(19, 'Sheriff Harry S. Truman'),
	(20, 'Shelly Johnson'),
	(21, 'Dr. Frederick Treves'),
	(22, 'John Merrick'),
	(23, 'Mrs. Kendal'),
	(24, 'Princess Irulan'),
	(25, 'Lady Jessica');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
