-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: ab
-- ------------------------------------------------------
-- Server version	5.5.31-0ubuntu0.12.04.1

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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `firstname` (`firstname`,`lastname`),
  KEY `FK_cnt_usr` (`user_id`),
  KEY `FK_cnt_grp` (`group_id`),
  CONSTRAINT `FK_cnt_usr` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cnt_grp` FOREIGN KEY (`group_id`) REFERENCES `ugroup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,1,1,'test1','lastname1','test1@example.com','1234567890'),(2,1,1,'test2','lastname2','test2@example.com','4645654646'),(3,1,1,'test3','lastname3','test3@example.com','3232323232'),(4,1,1,'test4','lastname4','test4@example.com','4545454545'),(5,1,1,'test5','lastname5','test5@example.com','6767676767'),(6,1,1,'test6','lastname6','test6@example.com','8787878787'),(7,1,1,'test7','lastname7','test7@example.com','8282828282'),(8,1,2,'test8','lastname8','test8@example.com','1111111111'),(9,1,2,'test9','lastname9','test9@example.com','2222222222'),(10,1,2,'test10','lastname10','test10@example.com','3333333333'),(11,1,2,'test11','lastname11','test11@example.com','4444444444'),(12,1,3,'test12','lastname12','test12@example.com','5555555555'),(13,1,3,'test13','lastname13','test13@example.com','6666666666'),(14,1,3,'test14','lastname14','test14@example.com','7777777777'),(15,1,3,'test15','lastname15','test15@example.com','8888888888'),(16,1,3,'test16','lastname16','test16@example.com','9999999999'),(17,1,3,'test17','lastname17','test17@example.com','1010101010'),(18,1,3,'test18','lastname18','test18@example.com','2020202020'),(19,1,3,'test19','lastname19','test19@example.com','3030303030'),(20,1,3,'test20','lastname20','test20@example.com','5656565656'),(21,1,3,'test21','lastname21','test21@example.com','9898989898');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ugroup`
--

DROP TABLE IF EXISTS `ugroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ugroup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `groupname` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_group_usr` (`user_id`),
  CONSTRAINT `FK_group_usr` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ugroup`
--

LOCK TABLES `ugroup` WRITE;
/*!40000 ALTER TABLE `ugroup` DISABLE KEYS */;
INSERT INTO `ugroup` VALUES (1,1,'General'),(2,1,'Friends'),(3,1,'Family');
/*!40000 ALTER TABLE `ugroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'test1','test1','test1@example.com'),(2,'test2','pass2','test2@example.com'),(3,'test3','pass3','test3@example.com'),(4,'test4','pass4','test4@example.com'),(5,'test5','pass5','test5@example.com'),(6,'test6','pass6','test6@example.com'),(7,'test7','pass7','test7@example.com'),(8,'test8','pass8','test8@example.com'),(9,'test9','pass9','test9@example.com'),(10,'test10','pass10','test10@example.com'),(11,'test11','pass11','test11@example.com'),(12,'test12','pass12','test12@example.com'),(13,'test13','pass13','test13@example.com'),(14,'test14','pass14','test14@example.com'),(15,'test15','pass15','test15@example.com'),(16,'test16','pass16','test16@example.com'),(17,'test17','pass17','test17@example.com'),(18,'test18','pass18','test18@example.com'),(19,'test19','pass19','test19@example.com'),(20,'test20','pass20','test20@example.com'),(21,'test21','pass21','test21@example.com');
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

-- Dump completed on 2013-10-14  0:39:19
