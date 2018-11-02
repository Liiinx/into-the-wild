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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (83,'Hackathon spécial Halloween','Retour en images sur le hackathon spécial Hallowen qui vient de s\'achever à la WildCodeSchool de Lyon ! Js Php Java',1,2,'image5bdc4764a1386.jpg','2018-10-31 16:15:25'),(97,'BIPP','Aujourd\'hui, nos Wilders ont découvert les composantes d\'un système d\'information en entreprise, avec un focus sur le fonctionnement d\'un système décisionnel. Merci à Laurent-Xavier Gusse, directeur de BIPP Consulting pour cette intervention très intéressante !',1,6,'image5bdc47736c1c3.jpg','2018-10-25 14:45:58'),(98,'Wild Apéro du 23/10/18','Curieux de découvrir à quoi ressemble un campus qui fourmille de (futurs) développeurs ? Viens nous rencontrer à l\'occasion de notre prochain Wild Apero, mercredi 23 octobre à 18h, à la Wild Code School ! Pour t\'inscrire, c\'est ici https://www.meetup.com/fr-FR/wild-code-school-lyon/events/255637498/ …',1,1,'image5bdc4749a9b91.jpg','2018-11-02 09:05:31'),(99,'Manpower France','Merci Manpower France pour l\'atelier sur le thème de l\'insertion professionnelle des développeurs web juniors Dans 4 mois 52 Wilders débarqueront sur le marché de l\'emploi lyonnais !  JavaScript PHP Java',1,6,'image5bdc478458bcc.jpg','2018-10-04 18:50:19'),(100,'Eleves VS Formateur ','C\'est ça l\'esprit wild à la WildSchool_Lyon ! Élève VS formateur javascript ! ',1,7,'image5bdc479ad1cf1.jpg','2018-10-02 19:36:58'),(101,'Découverte de la méthode Agile','Après-midi atelier agile à la WildSchool_Lyon ! Mise en pratique du scrum Kanban et autres pratiques agiles. Donnons de la liberté aux developpeurs pour créer de la valeur !',1,7,'image5bdc47b5c835b.jpg','2018-09-27 18:06:10'),(102,'Levée de 3M d\'euro','Nous venons de lever 3M d\'euro à la WildCodeSchool avec alterequity pour nous développer en Europe et diversifier notre offre de formation. Une nouvelle page s\'ouvre dans l\'aventure de la Wild Code School.\r\nArticle sur : https://www.lesechos.fr/pme-regions/innovateurs/0302281988991-wild-code-school-reconvertit-les-adultes-en-specialistes-du-numerique-2208810.php',1,7,'image5bdc47be50a8c.jpeg','2018-09-27 12:32:03'),(103,'Wild Apéro du 27/09/18','Merci à tous les participants du Wild Apero à la WildSchool_Lyon ! Rencontres et échanges avec nos Wilders sur leurs projets et leur formation de 5 mois ',1,1,'image5bdc485b864a2.jpg','2018-09-27 00:20:59'),(104,'Le gagnant du concours \"Je code sans chaussure\"','Notre Wilder Mathieu Thomas, grand gagnant du concours twitter JeCodeSansChaussure à la WildSchoolReims a apparement bien reçu notre cadeau : des chaussettes + de la pizza ! La base pour un futur developpeur non ? On lui souhaite beaucoup de succès \r\n\r\n',1,7,'image5bdc481861fbf.jpg','2018-09-20 09:00:54'),(105,'Demoday du Projet 1','Première Demoday pour nos Wilders à la WildSchool_Lyon ! C\'est avec grande fierté que nous découvrons vos projets, un grand bravo à tous et à toutes. Ça annonce du lourd pour la suite ! Apprends à coder en 5 mois développement web PHP Java JavaScript agilité',1,7,'image5bdc47d82587b.jpg','2018-09-23 00:26:34'),(106,'Pollen Metrology','Aujourd\'hui nos Wilders découvrent l\'Intelligence Artificielle avec Pollen Metrology ! Merci au co-fondateur Johann Foucher pour ce sujet passionnant.',1,6,'image5bdc47e834c22.jpg','2018-09-20 20:11:55'),(107,'Anciens Wilders','Merci à nos anciens Wilders pour vos témoignages sur la formation de developpeur web et mobile à la WildSchool_Lyon ! Nous sommes fiers de vos parcours et de vos belles réussites',1,6,'image5bdc482208988.jpg','2018-09-13 22:00:39'),(108,'Je code sans chaussure!','Le concours de chaussons est officiellement lancé à la WildSchool_Lyon ! Les sans-chaussures font la révolution du numérique !',1,7,'image5bdc482eccfd4.jpg','2018-09-07 00:03:18'),(109,'C\'est la rentrée!','54 Wilders ont fait leur rentrée à la WildSchool_Lyon ! Bienvenue à vous tous, et à la nouvelle team de formateurs ! C\'est parti pour 5 mois intensifs de challenge personnel et professionnel JavaScript PHP javaee',1,7,'image5bdc48367fa9c.jpg','2018-09-03 15:36:01');
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
INSERT INTO `category` VALUES (1,'Wild Apéro '),(2,'Hackathon'),(4,'Wild Breackfast'),(6,'Interventions'),(7,'Divers');
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
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'root','root','root@yahoo.fr',1,'$2y$10$dNOeJ5bzFjKRfYwpYKTSy.2VvQXrGmr0igI03nmS3JwOTjeavDY.S','2018-10-25 17:05:52',NULL,0),(21,'Smith','John','John@gmail.com',2,'$2y$10$E2IIxoFbGs4bryjV17bdYOSapD.OJ1dTdaVZ0vcowilEBqKEhT1hG','2018-10-25 17:05:52',NULL,0),(23,'gfdgdhg','jfdjdj','fkrlk@nfdnf.com',2,'ggg','2018-10-25 17:14:37',NULL,0);
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

-- Dump completed on 2018-11-02 13:54:20
