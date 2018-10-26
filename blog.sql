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
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (73,'kookijiojio','drggf',NULL,NULL,'image5bcf079f3724f.png','2018-10-25 17:05:21'),(77,'hello','doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx pajsc poasjc xpokjaposjc poasjc poskjc poasjc poajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie fajc. \r\nAoeifpoajc paojefpoacpo cpo j doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx pajsc poasjc xpokjaposjc poasjc poskjc poasjc poajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie fajc aoeifpoajc paojefpoacpo cpo j doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx.\r\n\r\nPajsc poasjc xpokjaposjc poasjc poskjc poasjc poajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie fajc aoeifpoajc paojefpoacpo cpo j doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx pajsc poasjc xpokjaposjc poasjc poskjc poasjc poajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie fajc aoeifpoajc paojefpoacpo cpo j doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx pajsc poasjc xpokjaposjc poasjc poskjc poasjc. \r\nPoajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie fajc aoeifpoajc paojefpoacpo cpo j doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx pajsc poasjc xpokjaposjc poasjc poskjc poasjc poajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie.\r\n\r\nFajc aoeifpoajc paojefpoacpo cpo j doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx pajsc poasjc xpokjaposjc poasjc poskjc poasjc poajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie fajc aoeifpoajc paojefpoacpo cpo j doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx pajsc poasjc xpokjaposjc poasjc poskjc poasjc poajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie fajc aoeifpoajc paojefpoacpo cpo j ',NULL,NULL,'image5bd2e305517a9.jpg','2018-10-26 08:30:25'),(78,'bidule','doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx pajsc poasjc xpokjaposjc poasjc poskjc poasjc poajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie fajc aoeifpoajc paojefpoacpo cpo j doizadozahdzohdoiz joisjoijsoj sojcoasjcoajcx pojsc apojcx pajsc poasjc xpokjaposjc poasjc poskjc poasjc poajc poajc pojcspoja pocjaspocj oajcpoasjc pasjc oaejf pocao cpoajf pojc poacapoc poa apojc poajc poj cpojc poajc ôau aozjkpoajcoaejpaojfd apjca efoau pos jcaoeif poacjaoef a cpos caie fajc aoeifpoajc paojefpoacpo cpo j ',NULL,NULL,'image5bd2e1d071af6.jpg','2018-10-26 08:35:23');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
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
INSERT INTO `comment` VALUES (5,'C\'est null!!!!!!',73,1,'2018-10-24 16:39:50'),(6,'jdjccxixcjdsdc',73,1,'2018-10-24 16:39:50'),(30,'bojour',73,21,'2018-10-19 16:39:50'),(38,'vvvvvv',73,21,'2018-10-24 16:49:02'),(100,'sdazdzdzadfhj,fbey',78,NULL,'2018-10-26 08:50:11'),(101,'test',77,21,'2018-10-26 08:52:59'),(102,'kcizu',77,23,'2018-10-26 08:52:59'),(104,'fjsicjie',77,23,'2018-10-26 08:52:59'),(105,'J\'adore votre article!!!!',77,NULL,'2018-10-26 11:50:26'),(106,'J\'adore votre article!!!!!',77,21,'2018-10-26 11:51:22'),(107,'Oh il est trop mignon ce petit chat!!!!',78,21,'2018-10-26 11:51:44');
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
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'root','root','root@yahoo.fr',1,'$2y$10$dNOeJ5bzFjKRfYwpYKTSy.2VvQXrGmr0igI03nmS3JwOTjeavDY.S','2018-10-25 17:05:52'),(21,'Smith','John','John@gmail.com',2,'$2y$10$E2IIxoFbGs4bryjV17bdYOSapD.OJ1dTdaVZ0vcowilEBqKEhT1hG','2018-10-25 17:05:52'),(23,'gfdgdhg','jfdjdj','fkrlk@nfdnf.com',2,'ggg','2018-10-25 17:14:37');
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

-- Dump completed on 2018-10-26 11:53:35
