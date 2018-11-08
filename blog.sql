-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `blog`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `blog` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `blog`;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `imageName` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `categorie_id` (`category_id`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (83,'Hackathon spécial Halloween','Retour en images sur le hackathon spécial Hallowen qui vient de s\'achever à la WildCodeSchool de Lyon ! Js Php Java\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n\r\nMerci à tous les élèves de l\'école !!\r\n\r\nRendez au prochain hackathon, en décembre.',1,2,'image5bdc4764a1386.jpg','2018-10-31 16:15:25'),(97,'BIPP','Aujourd\'hui, nos Wilders ont découvert les composantes d\'un système d\'information en entreprise, avec un focus sur le fonctionnement d\'un système décisionnel. Merci à Laurent-Xavier Gusse, directeur de BIPP Consulting pour cette intervention très intéressante !\r\n\r\nAujourd\'hui, nos Wilders ont découvert les composantes d\'un système d\'information en entreprise, avec un focus sur le fonctionnement d\'un système décisionnel. Merci à Laurent-Xavier Gusse, directeur de BIPP Consulting pour cette intervention très intéressante !',1,6,'image5bdc47736c1c3.jpg','2018-10-25 14:45:58'),(98,'Wild Apéro du 23/10/18','Curieux de découvrir à quoi ressemble un campus qui fourmille de (futurs) développeurs ? Viens nous rencontrer à l\'occasion de notre prochain Wild Apero, mercredi 23 octobre à 18h, à la Wild Code School ! Pour t\'inscrire, c\'est ici https://www.meetup.com/fr-FR/wild-code-school-lyon/events/255637498/ …',1,1,'image5bdc4749a9b91.jpg','2018-11-02 09:05:31'),(99,'Manpower France','Merci Manpower France pour l\'atelier sur le thème de l\'insertion professionnelle des développeurs web juniors Dans 4 mois 52 Wilders débarqueront sur le marché de l\'emploi lyonnais !  JavaScript PHP Java\r\n\r\nMerci Manpower France pour l\'atelier sur le thème de l\'insertion professionnelle des développeurs web juniors Dans 4 mois 52 Wilders débarqueront sur le marché de l\'emploi lyonnais !  JavaScript PHP Java.\r\nMerci Manpower France pour l\'atelier sur le thème de l\'insertion professionnelle des développeurs web juniors Dans 4 mois 52 Wilders débarqueront sur le marché de l\'emploi lyonnais !  JavaScript PHP Java.\r\n\r\nMerci à Jessica pour son professionnalisme.',1,6,'image5bdc478458bcc.jpg','2018-10-04 18:50:19'),(100,'Eleves VS Formateur ','C\'est ça l\'esprit wild à la WildSchool_Lyon ! Élève VS formateur javascript ! ',1,7,'image5bdc479ad1cf1.jpg','2018-10-02 19:36:58'),(101,'Découverte de la méthode Agile','Après-midi atelier agile à la WildSchool_Lyon ! Mise en pratique du scrum Kanban et autres pratiques agiles. Donnons de la liberté aux developpeurs pour créer de la valeur !',1,7,'image5bdc47b5c835b.jpg','2018-09-27 18:06:10'),(102,'Levée de 3M d\'euro','Nous venons de lever 3M d\'euro à la WildCodeSchool avec alterequity pour nous développer en Europe et diversifier notre offre de formation. Une nouvelle page s\'ouvre dans l\'aventure de la Wild Code School.\r\nArticle sur : https://www.lesechos.fr/pme-regions/innovateurs/0302281988991-wild-code-school-reconvertit-les-adultes-en-specialistes-du-numerique-2208810.php',1,7,'image5bdc47be50a8c.jpeg','2018-09-27 12:32:03'),(103,'Wild Apéro du 27/09/18','Merci à tous les participants du Wild Apero à la WildSchool_Lyon ! Rencontres et échanges avec nos Wilders sur leurs projets et leur formation de 5 mois ',1,1,'image5bdc485b864a2.jpg','2018-09-27 00:20:59'),(104,'Le gagnant du concours \"Je code sans chaussure\"','Notre Wilder Mathieu Thomas, grand gagnant du concours twitter JeCodeSansChaussure à la WildSchoolReims a apparement bien reçu notre cadeau : des chaussettes + de la pizza ! La base pour un futur developpeur non ? On lui souhaite beaucoup de succès \r\n\r\n',1,7,'image5bdc481861fbf.jpg','2018-09-20 09:00:54'),(105,'Demoday du Projet 1','Première Demoday pour nos Wilders à la WildSchool_Lyon ! C\'est avec grande fierté que nous découvrons vos projets, un grand bravo à tous et à toutes. Ça annonce du lourd pour la suite ! Apprends à coder en 5 mois développement web PHP Java JavaScript agilité',1,7,'image5bdc47d82587b.jpg','2018-09-23 00:26:34'),(106,'Pollen Metrology','Aujourd\'hui nos Wilders découvrent l\'Intelligence Artificielle avec Pollen Metrology ! Merci au co-fondateur Johann Foucher pour ce sujet passionnant.',1,6,'image5bdc47e834c22.jpg','2018-09-20 20:11:55'),(107,'Anciens Wilders','Merci à nos anciens Wilders pour vos témoignages sur la formation de developpeur web et mobile à la WildSchool_Lyon ! Nous sommes fiers de vos parcours et de vos belles réussites',1,6,'image5bdc482208988.jpg','2018-09-13 22:00:39'),(108,'Je code sans chaussure!','Le concours de chaussons est officiellement lancé à la WildSchool_Lyon ! Les sans-chaussures font la révolution du numérique !',1,7,'image5bdc482eccfd4.jpg','2018-09-07 00:03:18'),(109,'C\'est la rentrée!','54 Wilders ont fait leur rentrée à la WildSchool_Lyon ! Bienvenue à vous tous, et à la nouvelle team de formateurs ! C\'est parti pour 5 mois intensifs de challenge personnel et professionnel JavaScript PHP javaee',1,7,'image5bdc48367fa9c.jpg','2018-09-03 15:36:01'),(111,'Venez nous rencontrer autour d\'un croissant','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum !!!!!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',NULL,4,'logo_orange_pastille.png','2018-11-07 17:49:54');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Wild Apéro '),(2,'Hackathon'),(4,'Wild Breakfast'),(6,'Interventions'),(7,'Divers');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (108,'merci manpower',99,NULL,'2018-11-03 13:22:21'),(111,'merci manpower',99,NULL,'2018-11-03 14:38:16'),(113,'zuper',99,NULL,'2018-11-03 19:10:05'),(114,'zuper',99,NULL,'2018-11-03 19:10:15'),(120,'Le meilleur apéro de toute ma vie. Quand la bière est gratuite, elle est encore meilleure !!!!',98,25,'2018-11-07 16:29:30'),(121,'SCRUM MASTER FOR LIFE !!',101,25,'2018-11-07 16:30:15'),(122,'Super méthode de travail.',101,26,'2018-11-07 16:31:42'),(123,'Intervention passionnante, vive les tableaux, les graphiques et les requêtes SQL avec triple jointure !!  ',97,26,'2018-11-07 16:33:40'),(124,'Votre blog a vraiment un style de merde, vous êtes vraiment des salopes, bande de merde. ',83,21,'2018-11-07 16:39:07'),(125,'Je trouve que tu vas un peu loin John. Tenir de tel propos est totalement intolérable. \r\nFranchement, je te plains !! ',83,27,'2018-11-07 16:41:07'),(127,'sur la vie de ma mère, donne ton adresse grosse pu... , on va venir te faire manger ton commentaire ',83,28,'2018-11-07 16:46:38'),(128,'Plus d\'apéro à l\'école',103,28,'2018-11-07 16:57:31'),(129,'yeaaaaaaaaaaahhhhhhhhh',98,29,'2018-11-07 17:02:43'),(130,'Ouiiii ! J\'adore ',98,27,'2018-11-07 17:07:36'),(131,'Merci pour ton intervention Jessica, j ai adoré ton style, bisous.',99,24,'2018-11-07 17:09:22'),(132,'Félix ? Tu es tombé sous le charme de womanPower ? ',99,27,'2018-11-07 17:10:14'),(134,' Attention au débarquement !!',99,24,'2018-11-07 17:12:55'),(135,'C\'est bien, mais j\'ai toujours du mal à coller mes post-it.',101,30,'2018-11-07 17:19:12'),(136,'Vous êtes les bienvenues à l\'école pour découvrir notre équipe.\r\nMathieu, Greg et Huber. les profs au top de la wild !!!!!',111,1,'2018-11-07 17:54:49');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text,
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaire`
--

LOCK TABLES `commentaire` WRITE;
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '2',
  `password` varchar(255) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `is_validate` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'root','root','root@yahoo.fr',1,'$2y$10$dNOeJ5bzFjKRfYwpYKTSy.2VvQXrGmr0igI03nmS3JwOTjeavDY.S','2018-10-25 17:05:52',NULL,0),(21,'Smith','John','John@gmail.com',2,'$2y$10$E2IIxoFbGs4bryjV17bdYOSapD.OJ1dTdaVZ0vcowilEBqKEhT1hG','2018-10-25 17:05:52',NULL,0),(24,'Tuff','felix','liiinx@laposte.net',2,'$2y$10$DFZfU7swHo.hc5KkbAuRNu8Z2pMdjE/bjtsYnNumHIVWoFTthapT2','2018-11-03 13:23:03',NULL,0),(25,'approx','Camilo','approx@camilo.fr',1,'$2y$10$Obevr3VdOif.Wr4eMrcA5urPki1l4yIsQElZsxiytyzPs60uo7bp2','2018-11-07 16:26:32',NULL,1),(26,'Chef','Lauriane','laulau@chef.com',1,'$2y$10$S/j313qVCz5WY352llHav.3bvtSU3b6KCuMBjrrlkEzDlwrVhDBcm','2018-11-07 16:27:18',NULL,1),(27,'susboule','dvd','susboule@dvd.fr',2,'$2y$10$1lHZ4L17Nj7EYowQmaRg3O2xmYscHYawm3Az.pxhbr0/ojfHS7FYa','2018-11-07 16:28:10',NULL,1),(28,'bobby','fred','fred@bobby.fr',1,'$2y$10$NU6PfLMNxY/MFMgv/zq0QeQEbO0pkasjo2Ngp0NU.BEKaMcXZQr8O','2018-11-07 16:44:44',NULL,1),(29,'kef','kev','kev@kef.fr',2,'$2y$10$Yds8NTFzNrQlAkIovGnz1.kyiA7pn7AEpnf6f3SkzgjbHFufsPx8i','2018-11-07 17:02:12',NULL,1),(30,'de la tremblette','gilles','gilles@tremble.fr',2,'$2y$10$3Y0qrzhDBx6tX/bZpZcvEuJLGksE2A.horyXsphkgGkGqD2LuPtbW','2018-11-07 17:17:23',NULL,1),(31,'test','test','test@test.fr',2,'$2y$10$935KKlWBg3aWHmc.msSVwO2nhC.oZhZn0bMQd6lDDMs7h.q6vn4sq','2018-11-08 15:35:41','36313632363336343635363636373638363936613662366336643665366637303731373237333734373537363737373837393761',0),(32,'test','test','test@test.fr',2,'$2y$10$pBuaU7VROjxs/DG7/VRMNOnE.y5hWpjEuvYlBFKz7P7JRh3f6vtlK','2018-11-08 15:36:26','36313632363336343635363636373638363936613662366336643665366637303731373237333734373537363737373837393761',0),(33,'test','test','test@test.fr',2,'$2y$10$TfiEc4bcsK8QKqQ5y2pT/e7Pgrh7L4vZSjWJtCfwl3NoMPHOxUrTe','2018-11-08 15:36:37','36313632363336343635363636373638363936613662366336643665366637303731373237333734373537363737373837393761',0),(34,'jean','dupond','jean@dupond.fr',2,'$2y$10$hBvlPCx31dWjAqRruAfYEOADrnLwFyliT8HR.8B8tPYIFq8aIdTB2','2018-11-08 15:37:43','36313632363336343635363636373638363936613662366336643665366637303731373237333734373537363737373837393761',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-08 15:42:00
