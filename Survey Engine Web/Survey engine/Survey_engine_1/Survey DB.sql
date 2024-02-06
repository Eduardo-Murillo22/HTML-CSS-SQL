-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: survey_engine
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `entity_answers`
--

DROP TABLE IF EXISTS `entity_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_answers` (
  `id_answers` int(10) NOT NULL AUTO_INCREMENT,
  `answer` varchar(500) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_answers`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_answers`
--

LOCK TABLES `entity_answers` WRITE;
/*!40000 ALTER TABLE `entity_answers` DISABLE KEYS */;
INSERT INTO `entity_answers` VALUES (1,'Stest1,test2,tes3.MYes,No.MYes,No.Mbluered,black.Mblue,red,black','test??.addquestion test?.addquestion test?.what is your favorite color?.what is your favorite color?'),(2,'Mtest #2,test #2,test #2,test #2','test #2?'),(4,'SYes,No.SYes,No','Do you Like Bananas?.Bananas are good?');
/*!40000 ALTER TABLE `entity_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_survey`
--

DROP TABLE IF EXISTS `entity_survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_survey` (
  `id_survey` int(10) NOT NULL AUTO_INCREMENT,
  `survey_name` varchar(50) DEFAULT NULL,
  `discription` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id_survey`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_survey`
--

LOCK TABLES `entity_survey` WRITE;
/*!40000 ALTER TABLE `entity_survey` DISABLE KEYS */;
INSERT INTO `entity_survey` VALUES (1,'test #1','this is a test survey','2023-05-30','2023-06-30'),(2,'test #2','this is test #2','2023-06-06','2023-06-29'),(4,'Bananas','do you like banana','2023-06-06','2023-06-24');
/*!40000 ALTER TABLE `entity_survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_user`
--

DROP TABLE IF EXISTS `entity_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_user`
--

LOCK TABLES `entity_user` WRITE;
/*!40000 ALTER TABLE `entity_user` DISABLE KEYS */;
INSERT INTO `entity_user` VALUES (1,'Eduardo','ADMIN12','Password1234'),(2,'eduardo','ADMIN12dsa','dsaPassword1234'),(3,'eduardo','ADMIN12dsa','dsaPassword1234'),(4,'eduardo','ADMIN12dsa','dsaPassword1234'),(5,'eduardohj','ADMIN12dsa','ghjghjghj'),(6,'Flamingo Duck','ADMIN12','Password1234'),(7,'Flamingo Duck','ADMIN12','Password1234'),(8,'Flamingo Duck','ADMIN12','Password1234'),(9,'Flamingo Duck','ADMIN12','Password1234'),(10,'Flamingo Duck','ADMIN12','Password1234'),(11,'Flamingo Duck','ADMIN12','Password1234'),(12,'Flamingo Duck','ADMIN12','Password1234'),(13,'Flamingo Duck','ADMIN12','Password1234'),(14,'Flamingo Duck','ADMIN12','Password1234'),(15,'Flamingo Duck','ADMIN12','Password1234'),(16,'eduardo','ADMIN12','Password1234'),(17,'eduardo','ADMIN12','Password1234'),(18,'dsadsa','ADMIN12','Password1234'),(19,'JOE','ADMIN12','Password1234'),(20,'test','ADMIN12','Password1234'),(21,'Eduardo','ADMIN12','Password1234'),(22,'Eduardo','ADMIN12','Password1234'),(23,'Flamingo Duck','ADMIN12','Password1234'),(24,'JOM','ADMIN12','Password1234'),(25,'many','ADMIN12','Password1234'),(26,'Eduardo','ADMIN12','Password1234'),(27,'Eduardo','ADMIN12','Password1234');
/*!40000 ALTER TABLE `entity_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_user_answers`
--

DROP TABLE IF EXISTS `entity_user_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_user_answers` (
  `id_survey_answers` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `survey` varchar(50) DEFAULT NULL,
  `answers` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_survey_answers`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_user_answers`
--

LOCK TABLES `entity_user_answers` WRITE;
/*!40000 ALTER TABLE `entity_user_answers` DISABLE KEYS */;
INSERT INTO `entity_user_answers` VALUES (2,'Flamingo Duck','ADMIN12','Bananas','Q1:11Q2:20'),(3,'test','ADMIN12','test #1','Q1:11Q2:20Q3:30,31Q5:51,52'),(4,'test','ADMIN12','test #1','Q1:11Q2:20Q3:30,31Q5:51,52'),(5,'test','ADMIN12','test #1','Q1:11Q2:20Q3:30,31Q5:51,52'),(6,'test','ADMIN12','test #1','Q1:12Q2:20,21Q3:30Q4:40Q5:50,51'),(7,'test','ADMIN12','test #1','Q1:12Q2:20,21Q3:30Q4:40Q5:50,51'),(8,'test','ADMIN12','test #1','Q1:12Q2:20,21Q3:30Q4:40Q5:50,51'),(9,'test','ADMIN12','test #1','Q1:12Q2:20,21Q3:30Q4:40Q5:50,51'),(10,'test','ADMIN12','test #1','Q1:12Q2:20,21Q3:30Q4:40Q5:50,51'),(11,'test','ADMIN12','test #1','Q1:12Q2:20,21Q3:30Q4:40Q5:50,51'),(12,'test','ADMIN12','test #1','Q1:12Q2:20,21Q3:30Q4:40Q5:50,51'),(13,'test','ADMIN12','test #1','Q1:11Q2:20,21Q3:30Q4:40'),(14,'test','ADMIN12','test #1','Q1:11Q2:20,21Q3:30Q4:40Q5:51,52'),(15,'test','ADMIN12','test #1','Q1:12Q2:21Q3:31Q4:41Q5:52'),(16,'Eduardo','ADMIN12','test #1','Q1:10Q2:20,21Q3:30,31Q4:40,41Q5:50,51,52'),(17,'Eduardo','ADMIN12','Bananas','Q1:10Q2:21'),(18,'Flamingo Duck','ADMIN12','test #2','Q1:10,13'),(19,'Flamingo Duck','ADMIN12','Bananas','Q1:10Q2:20'),(20,'many','ADMIN12','Bananas','Q1:10Q2:21');
/*!40000 ALTER TABLE `entity_user_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xref_survey_answers`
--

DROP TABLE IF EXISTS `xref_survey_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xref_survey_answers` (
  `xref_survey_answers` int(10) NOT NULL,
  `id_survey` int(10) DEFAULT NULL,
  `id_answers` int(10) DEFAULT NULL,
  PRIMARY KEY (`xref_survey_answers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xref_survey_answers`
--

LOCK TABLES `xref_survey_answers` WRITE;
/*!40000 ALTER TABLE `xref_survey_answers` DISABLE KEYS */;
INSERT INTO `xref_survey_answers` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,7,7),(8,8,8),(9,9,9),(10,10,10),(11,11,11),(12,12,12),(13,13,13),(14,14,14),(15,15,15),(16,16,16),(17,17,17),(18,18,18),(19,19,19),(20,20,20),(21,21,21),(22,22,22),(23,23,23),(24,24,24),(25,25,25);
/*!40000 ALTER TABLE `xref_survey_answers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-10  0:41:56
