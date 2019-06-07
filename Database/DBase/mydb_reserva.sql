-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.36-MariaDB

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
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `DatadaReserva` date NOT NULL,
  `DatadeDevolucao` date NOT NULL,
  `LocalPickUp` varchar(45) NOT NULL,
  `LocalDropOff` varchar(45) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Promocao_idPromocao` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `fk_Reserva_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Reserva_Promoção1_idx` (`Promocao_idPromocao`),
  CONSTRAINT `fk_Reserva_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `utilizador` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,'2019-06-07','2019-06-08','Lisboa','Lisboa',1,0),(2,'2019-06-07','2019-06-08','Lisboa','Lisboa',1,0),(3,'2019-06-07','2019-06-08','Lisboa','Lisboa',1,0),(4,'2019-06-07','2019-06-08','Lisboa','Lisboa',1,0),(5,'2019-06-07','2019-06-08','Lisboa','Lisboa',1,0),(6,'2019-06-07','2019-06-08','Lisboa','Lisboa',1,0),(7,'2019-06-07','2019-06-08','Lisboa','Lisboa',1,0),(8,'2019-06-07','2019-06-08','Lisboa','Lisboa',1,0),(9,'2019-06-07','2019-06-08','Lisboa','Lisboa',1,0),(10,'2019-06-13','2019-06-07','Lisboa','Lisboa',1,0),(11,'2019-06-13','2019-06-07','Lisboa','Lisboa',1,0),(12,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(13,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(14,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(15,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(16,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(17,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(18,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(19,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(20,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(21,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(22,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(23,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(24,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(25,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(26,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0),(27,'2019-06-04','2019-06-18','Lisboa','Lisboa',1,0);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-07  2:40:35
