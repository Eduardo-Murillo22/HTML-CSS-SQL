-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: store_front_db
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
-- Table structure for table `eduardo_entity_items`
--

DROP TABLE IF EXISTS `eduardo_entity_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eduardo_entity_items` (
  `id_items` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `image_link` varchar(1000) DEFAULT NULL,
  `image_format` varchar(1000) DEFAULT NULL,
  `img_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_items`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eduardo_entity_items`
--

LOCK TABLES `eduardo_entity_items` WRITE;
/*!40000 ALTER TABLE `eduardo_entity_items` DISABLE KEYS */;
INSERT INTO `eduardo_entity_items` VALUES (20,'Flamingo Duck','12','https://amsterdamduckstore.com/wp-content/uploads/2023/02/Flamingo-Rubber-Duck-Holdy-front.jpg','<div>                        <img class=\"imageFormat\" src=\"https://amsterdamduckstore.com/wp-content/uploads/2023/02/Flamingo-Rubber-Duck-Holdy-front.jpg\" /><br>                        <p>Flamingo Duck, $12</p>                        <input type=\"number\" name=\"Flamingo_Duck\" min=\"0\" value=\"\"/>                    </div></br>','Flamingo_Duck'),(21,'IT Duck','22','https://amsterdamduckstore.com/wp-content/uploads/2022/10/IT-Developer-Rubber-Duck-front.jpg','<div>                        <img class=\"imageFormat\" src=\"https://amsterdamduckstore.com/wp-content/uploads/2022/10/IT-Developer-Rubber-Duck-front.jpg\" /><br>                        <p>IT Duck, $22</p>                        <input type=\"number\" name=\"IT_Duck\" min=\"0\" value=\"\"/>                    </div></br>','IT_Duck'),(22,'Basketball Duck','15','https://amsterdamduckstore.com/wp-content/uploads/2016/11/Basketball-Rubber-Duck-front-Amsterdam-Duck-Store.jpg','<div>\r\n                        <img class=\"imageFormat\" src=\"https://amsterdamduckstore.com/wp-content/uploads/2016/11/Basketball-Rubber-Duck-front-Amsterdam-Duck-Store.jpg\" /><br>\r\n                        <p>Basketball Duck, $15</p>\r\n                        <input type=\"number\" name=\"Basketball_Duck\" min=\"0\" value=\"\"/>\r\n                    </div></br>','Basketball_Duck');
/*!40000 ALTER TABLE `eduardo_entity_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eduardo_user_info`
--

DROP TABLE IF EXISTS `eduardo_user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eduardo_user_info` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eduardo_user_info`
--

LOCK TABLES `eduardo_user_info` WRITE;
/*!40000 ALTER TABLE `eduardo_user_info` DISABLE KEYS */;
INSERT INTO `eduardo_user_info` VALUES (1,'ed97857','Eduardo','ewe22pass'),(2,'ed97857','Eduardo','educlan22'),(3,'ed97857','eduardo','educlan22'),(4,'ed97857','eduardo','educlan22'),(5,'ed97857','Eduardo','educlan22'),(6,'ed97857','FDA','educlan22'),(7,'ed97857','Eduardo','educlan22'),(8,'ed97857','Flamingo Duck','educlan22'),(9,'ed97857','Eduardo','educlan22'),(10,'ed97857','eduardo','educlan22'),(11,'ed97857','Obama','educlan22'),(12,'ed97857','Eduardo','educlan22'),(13,'ed97857','Eduardo','educlan22'),(14,'dsa','sad','asdadsadsa'),(15,'ed97857','Eduardo','educlan22'),(16,'ADMIN12','ADMIN12','Password1234'),(17,'ADMIN12','ADMIN','Password1234'),(18,'ADMIN12','Eduardo','Password1234'),(19,'ADMIN12','ADMIN','Password1234'),(20,'ADMIN12','Eduardo','Password1234'),(21,'ADMIN12','Eduardo','Password1234'),(22,'ADMIN12','Eduardo','Password1234'),(23,'ADMIN12','Eduardo','Password1234');
/*!40000 ALTER TABLE `eduardo_user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_order`
--

DROP TABLE IF EXISTS `user_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_order` (
  `id_user_orders` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `order` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user_orders`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_order`
--

LOCK TABLES `user_order` WRITE;
/*!40000 ALTER TABLE `user_order` DISABLE KEYS */;
INSERT INTO `user_order` VALUES (1,'Eduardo','(Item = Flamingo_Duck, Quantity = 3)(Item = Basket','9650, webb st ','9512500761');
/*!40000 ALTER TABLE `user_order` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-10  0:07:21
