-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: mysql    Database: llwi222
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.12.04.1

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
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `CID` varchar(254) NOT NULL,
  `last_name` varchar(12) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `is_vip` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES ('email@email.com','test2','test1','pass','2014-12-04',0),('example@email.com','Garrett','Grant','pass','2014-11-24',0),('first.last@email.com','Last','First','test','0000-00-00',0),('first.last@gmail.com','Last','First','password','2014-12-12',0),('Jim.shuh@there.com','shuh','jim','gym','2014-12-12',0),('larry.williamson1@uky.edu','Williamson','Larry','password','0000-00-00',0),('larry.williamson2@gmail.com','Williamson','Larry','password','0000-00-00',0),('larry86_06@hotmail.com','Williamson','Larry','pass','2014-11-24',0),('matthew.blanchet@uky.edu','Blanchet','Matthew','cs405','0000-00-00',0);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `EID` int(4) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(12) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `is_manager` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`EID`)
) ENGINE=InnoDB AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1001,'Williamson','Larry','password','2014-11-24',1),(1002,'Blanchet','Matthew','password','2014-11-24',1),(1003,'Daniels','Brittany','password','2014-11-24',0);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_cart`
--

DROP TABLE IF EXISTS `in_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_cart` (
  `CID` varchar(254) NOT NULL,
  `IID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CID`,`IID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_cart`
--

LOCK TABLES `in_cart` WRITE;
/*!40000 ALTER TABLE `in_cart` DISABLE KEYS */;
INSERT INTO `in_cart` VALUES ('jdlubranogmailcom',2,1),('larrywilliamson1ukyedu',3,1),('larrywilliamson1ukyedu',8,1),('larrywilliamson1ukyedu',20,1),('larrywilliamson2gmailcom',1,1),('larrywilliamson2gmailcom',2,1),('larrywilliamson2gmailcom',4,1);
/*!40000 ALTER TABLE `in_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `IID` int(10) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,45,500,'Xbox One'),(2,14,400,'Playstation 4'),(3,21,300,'Wii U'),(4,12,284,'Wii'),(5,14,567,'Playstation 3'),(6,16,348,'Xbox 360'),(7,6,389,'Xbox'),(8,7,259,'Gamecube'),(9,12,395,'Playstation 2'),(10,10,272,'Dreamcast'),(11,13,289,'Nintendo 64'),(12,11,595,'Saturn'),(13,9,446,'Playstation'),(14,3,391,'Jaguar'),(15,1,1095,'3DO'),(16,5,332,'SNES'),(17,4,1125,'NeoGeo'),(18,14,365,'TurboGrafx'),(19,18,346,'Genesis'),(20,13,412,'NES'),(21,11,412,'Master System'),(22,2,410,'ColecoVision'),(23,7,935,'Intellivision'),(24,4,796,'Atari 2600');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `on_sale`
--

DROP TABLE IF EXISTS `on_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `on_sale` (
  `IID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  PRIMARY KEY (`IID`,`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `on_sale`
--

LOCK TABLES `on_sale` WRITE;
/*!40000 ALTER TABLE `on_sale` DISABLE KEYS */;
INSERT INTO `on_sale` VALUES (1,9),(24,10);
/*!40000 ALTER TABLE `on_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordered`
--

DROP TABLE IF EXISTS `ordered`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordered` (
  `TID` int(11) NOT NULL,
  `IID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`TID`,`IID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordered`
--

LOCK TABLES `ordered` WRITE;
/*!40000 ALTER TABLE `ordered` DISABLE KEYS */;
INSERT INTO `ordered` VALUES (19,4,1),(19,6,3),(20,2,2),(21,1,3),(21,3,1),(21,10,1),(22,13,1),(22,18,1),(22,24,1),(23,9,1),(23,16,3),(23,17,1),(24,1,1),(25,7,1),(26,3,1),(26,6,1),(27,1,1),(28,1,1),(29,1,1),(30,1,1),(31,1,1),(32,1,1),(33,1,4),(34,2,3),(35,2,5);
/*!40000 ALTER TABLE `ordered` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotes`
--

DROP TABLE IF EXISTS `promotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotes` (
  `EID` varchar(20) NOT NULL,
  `SID` int(11) NOT NULL,
  PRIMARY KEY (`EID`,`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotes`
--

LOCK TABLES `promotes` WRITE;
/*!40000 ALTER TABLE `promotes` DISABLE KEYS */;
INSERT INTO `promotes` VALUES ('1001',9),('1002',10);
/*!40000 ALTER TABLE `promotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchased`
--

DROP TABLE IF EXISTS `purchased`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchased` (
  `CID` varchar(254) NOT NULL,
  `TID` int(11) NOT NULL,
  PRIMARY KEY (`CID`,`TID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchased`
--

LOCK TABLES `purchased` WRITE;
/*!40000 ALTER TABLE `purchased` DISABLE KEYS */;
INSERT INTO `purchased` VALUES ('firstlastgmailcom',33),('firstlastgmailcom',34),('Jimshuhtherecom',35),('larry8606hotmailcom',20),('larrywilliamson2gmailcom',21),('larrywilliamson2gmailcom',24),('larrywilliamson2gmailcom',26),('matthewblanchetukyedu',19),('matthewblanchetukyedu',22),('matthewblanchetukyedu',23),('matthewblanchetukyedu',25),('matthewblanchetukyedu',27),('matthewblanchetukyedu',28),('matthewblanchetukyedu',29),('matthewblanchetukyedu',30),('matthewblanchetukyedu',31),('matthewblanchetukyedu',32);
/*!40000 ALTER TABLE `purchased` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `SID` int(10) NOT NULL AUTO_INCREMENT,
  `percentage` float DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (9,0.1,'2014-12-11','2014-12-13'),(10,0.75,'2014-12-01','2014-12-13');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `TID` int(10) NOT NULL AUTO_INCREMENT,
  `status` enum('Pending','Shipped') NOT NULL,
  `total` int(11) NOT NULL,
  `tDate` date NOT NULL,
  PRIMARY KEY (`TID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (19,'Shipped',1328,'2014-12-11'),(20,'Shipped',800,'2014-12-11'),(21,'Shipped',2072,'2014-12-11'),(22,'Pending',1607,'2014-12-11'),(23,'Pending',2516,'2014-12-11'),(24,'Pending',500,'2014-12-11'),(25,'Shipped',389,'2014-12-11'),(26,'Shipped',648,'2014-12-11'),(27,'Shipped',500,'2014-12-11'),(28,'Shipped',500,'2014-12-11'),(29,'Pending',500,'2014-12-11'),(30,'Pending',500,'2014-12-11'),(31,'Pending',500,'2014-12-11'),(32,'Pending',500,'2014-12-11'),(33,'Shipped',2000,'2014-12-12'),(34,'Shipped',1200,'2014-12-12'),(35,'Pending',2000,'2014-12-12');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-16 10:50:28
