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


-- Listage de la structure de la base pour gilla-dep-la
CREATE DATABASE IF NOT EXISTS `gilla-dep-la` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gilla-dep-la`;

-- Listage de la structure de table gilla-dep-la. etats
CREATE TABLE IF NOT EXISTS `etats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(15) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Listage des données de la table gilla-dep-la.etats : ~3 rows (environ)
DELETE FROM `etats`;
INSERT INTO `etats` (`id`, `description`) VALUES
	(1, 'ouvert'),
	(2, 'pris en charge'),
	(3, 'ferme');

-- Listage de la structure de table gilla-dep-la. incidents
CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateHeureOuverture` datetime DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `priorite` int DEFAULT NULL,
  `dateHeureFermeture` datetime DEFAULT NULL,
  `batiment` varchar(15) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `salle` varchar(5) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `poste` varchar(5) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `materiel_id` int DEFAULT NULL,
  `declarant_id` int DEFAULT NULL,
  `etat_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_incidents_materiels` (`materiel_id`),
  KEY `FK_incidents_etats` (`etat_id`),
  KEY `FK_incidents_utilisateurs` (`declarant_id`) USING BTREE,
  CONSTRAINT `FK_incidents_etats` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`),
  CONSTRAINT `FK_incidents_materiels` FOREIGN KEY (`materiel_id`) REFERENCES `materiels` (`id`),
  CONSTRAINT `FK_incidents_utilisateurs` FOREIGN KEY (`declarant_id`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Listage des données de la table gilla-dep-la.incidents : ~7 rows (environ)
DELETE FROM `incidents`;
INSERT INTO `incidents` (`id`, `dateHeureOuverture`, `description`, `priorite`, `dateHeureFermeture`, `batiment`, `salle`, `poste`, `materiel_id`, `declarant_id`, `etat_id`) VALUES
	(1, '2024-11-28 11:23:11', 'desc1', 1, NULL, 'B', NULL, NULL, 1, 1, 1),
	(2, '2024-11-28 11:23:11', 'desc2', 2, NULL, 'A', 'A313', 'P01', 5, 5, 1),
	(3, '2024-11-28 11:23:11', 'desc3', 3, NULL, 'B', NULL, NULL, 8, 1, 1),
	(4, '2024-11-28 11:23:11', 'desc4', 1, NULL, 'B', NULL, NULL, 8, 1, 2),
	(5, '2024-11-28 11:23:11', 'desc5', 2, NULL, 'B', NULL, NULL, 8, 1, 2),
	(6, '2024-12-11 18:36:50', 'dsdsds', 1, NULL, 'batiment 3', '3', '304', 1, 1, 1),
	(7, '2024-12-11 18:36:56', 'dsdsds', 1, NULL, 'batiment 3', '3', '304', 1, 1, 1),
	(8, '2024-12-11 20:28:59', 'hello', 1, NULL, 'batiment 3', '3', '304', 1, 1, 1),
	(10, '2024-12-11 20:31:03', 'popo', 2, NULL, 'batiment 4', '3', '304', 7, 1, 1),
	(11, '2024-12-11 20:33:48', 'panne', 3, NULL, 'batiment2', '3', '304', 5, 1, 1),
	(12, '2024-12-11 20:43:34', 'Proinde die funestis interrogationibus ', 1, NULL, 'batiment 4', '3', '304', 6, 1, 1),
	(15, '2024-12-11 22:24:48', 'test3', 1, NULL, 'A', '3', '304', 1, 1, 1),
	(16, '2024-12-11 22:29:24', 'test4', 1, NULL, 'C', '3', '304', 1, 1, 1),
	(17, '2024-12-11 22:30:02', 'test5', 1, NULL, 'X', '3', '304', 1, 1, 1);

-- Listage de la structure de table gilla-dep-la. materiels
CREATE TABLE IF NOT EXISTS `materiels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `famille` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '0',
  `type` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Listage des données de la table gilla-dep-la.materiels : ~9 rows (environ)
DELETE FROM `materiels`;
INSERT INTO `materiels` (`id`, `famille`, `type`) VALUES
	(1, 'Batiment', 'aeration'),
	(2, 'Batiment', 'Porte'),
	(3, 'Batiment', 'Prise de courant'),
	(4, 'Informatique', 'Clavier'),
	(5, 'Informatique', 'Unite centrale'),
	(6, 'Informatique', 'Ecran'),
	(7, 'Mobilier', 'Armoire'),
	(8, 'Mobilier', 'Chaise'),
	(9, 'Mobilier', 'Table');

-- Listage de la structure de table gilla-dep-la. priseencharges
CREATE TABLE IF NOT EXISTS `priseencharges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateHeureDebut2` datetime DEFAULT NULL,
  `dateHeureFin` datetime DEFAULT NULL,
  `commentaire` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `agent_id` int DEFAULT NULL,
  `incident_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_priseencharges_incidents` (`incident_id`),
  KEY `FK_priseencharges_utilisateurs` (`agent_id`) USING BTREE,
  CONSTRAINT `FK_priseencharges_incidents` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`),
  CONSTRAINT `FK_priseencharges_utilisateurs` FOREIGN KEY (`agent_id`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Listage des données de la table gilla-dep-la.priseencharges : ~2 rows (environ)
DELETE FROM `priseencharges`;
INSERT INTO `priseencharges` (`id`, `dateHeureDebut2`, `dateHeureFin`, `commentaire`, `agent_id`, `incident_id`) VALUES
	(1, '2024-11-28 11:28:56', NULL, 'PEC_I4', 2, 4),
	(2, '2024-11-28 11:28:56', NULL, 'PEC_I5', 2, 5);

-- Listage de la structure de table gilla-dep-la. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `mail` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `passw` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `passhash` varchar(70) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `role` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `telephone` varchar(15) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Listage des données de la table gilla-dep-la.utilisateurs : ~8 rows (environ)
DELETE FROM `utilisateurs`;
INSERT INTO `utilisateurs` (`id`, `nom`, `mail`, `passw`, `passhash`, `role`, `telephone`) VALUES
	(1, 'util1', 'u@u.fr', 'util1', '$2y$10$E0oCQJUg11QzHfsdP1K/X.M6Hp9WcQ98wYGMmUFtFHr7WpHX.A8Aa', 'utilisateur', NULL),
	(2, 'agent1', 'a@a.fr', 'agent1', '$2y$10$6MDMWoa/Ua7esABGsWkMC.eqWrCOn4ugx19Q97LvqElfv/lGNRmtC', 'agent', NULL),
	(3, 'resp1', 'r@r.fr', 'resp1', '$2y$10$jRC.qdzuQiHgHbrVXpmcxeSFTMABj1ji/r15LHr70jHxMzIaWWfSS', 'responsable', NULL),
	(4, 'admin1', 'ad@ad.fr', 'admin1', '$2y$10$d7JKGyCokHpyGP0e383vr.YiHrOIF0oDLfNYS3gguQVUfbUgGZ/oa', 'admin', NULL),
	(5, 'util2', 'u2@u.fr', 'util2', '$2y$10$7hOlTlktoycChB/sFK1.X.LkLgnN46wE8HCreJrPZCDvw5It22JyS', NULL, NULL),
	(6, 'agent2', 'a2@a.fr', 'agent2', '$2y$10$8nJ34mTiZi6CFkkV.lb80e5Jnt.o1YIf.QhFwGyFCe/JykDGp2uLy', NULL, NULL),
	(7, 'util3', 'u3@u.fr', 'util3', '$2y$10$ppeAW/WU9frKebZQMAus5Oj4e0T7I2.JIzUGM2I43Fd7QBHmUNjL.', NULL, NULL),
	(8, 'agent3', 'a3@a.fr', 'agent3', '$2y$10$R9OYkz7Wf763H3tgOOT0SOEpj1yCYIjiNxZmkN1riObxvsaIBTsGi', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
