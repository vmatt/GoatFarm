-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: nevelde
-- ------------------------------------------------------
-- Server version	5.0.67-community-nt

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `alap`
--

DROP TABLE IF EXISTS `alap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alap` (
  `idalap` int(11) NOT NULL auto_increment,
  `user` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `type` enum('kecske','bojler','heli') NOT NULL,
  `lvl` int(11) NOT NULL default '1',
  `faj` int(2) NOT NULL default '1',
  `gender` enum('him','nosteny') NOT NULL,
  PRIMARY KEY  (`idalap`),
  UNIQUE KEY `user_UNIQUE` (`user`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alap`
--

LOCK TABLES `alap` WRITE;
/*!40000 ALTER TABLE `alap` DISABLE KEYS */;
INSERT INTO `alap` VALUES (1,'8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','admin@localhost.com','37bd45d638c2d11c49c641d2e9c4f49f406caf3ee282743e0c800aa1ed68e2ee','kecske',1,1,'him'),(7,'688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6','asd@asd.asd','688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6','bojler',1,1,'him');
/*!40000 ALTER TABLE `alap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extended`
--

DROP TABLE IF EXISTS `extended`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extended` (
  `user` varchar(64) NOT NULL,
  `xp` int(10) unsigned NOT NULL default '0',
  `money` int(10) unsigned NOT NULL default '0',
  `premium` tinyint(1) unsigned NOT NULL default '0',
  `szomj` tinyint(100) unsigned NOT NULL default '100',
  `hunger` tinyint(100) unsigned NOT NULL default '100',
  `lastkaja` int(10) unsigned NOT NULL default '0',
  `lastpia` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user`),
  UNIQUE KEY `user_UNIQUE` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extended`
--

LOCK TABLES `extended` WRITE;
/*!40000 ALTER TABLE `extended` DISABLE KEYS */;
INSERT INTO `extended` VALUES ('688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6',0,0,0,100,96,1485270343,1485272611);
/*!40000 ALTER TABLE `extended` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-24 16:47:28
