-- Names: Samuel Munoz
-- Names: Erik Cohen

CREATE DATABASE  IF NOT EXISTS `ProjectCollections` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ProjectCollections`;
-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: ProjectCollections
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Administrators`
--

DROP TABLE IF EXISTS `Administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Administrators` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Administrators`
--

LOCK TABLES `Administrators` WRITE;
/*!40000 ALTER TABLE `Administrators` DISABLE KEYS */;
/*!40000 ALTER TABLE `Administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Developers`
--

DROP TABLE IF EXISTS `Developers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Developers` (
  `dev_id` int NOT NULL AUTO_INCREMENT,
  `dev_fname` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dev_lname` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dev_imagepath` text COLLATE utf8mb4_unicode_ci,
  `dev_class_year` smallint DEFAULT NULL,
  `dev_description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`dev_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Developers`
--

LOCK TABLES `Developers` WRITE;
/*!40000 ALTER TABLE `Developers` DISABLE KEYS */;
/*!40000 ALTER TABLE `Developers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProjectDeveloper`
--

DROP TABLE IF EXISTS `ProjectDeveloper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ProjectDeveloper` (
  `prj_id` int NOT NULL,
  `dev_id` int NOT NULL,
  PRIMARY KEY (`prj_id`,`dev_id`),
  KEY `dev_id` (`dev_id`),
  CONSTRAINT `ProjectDeveloper_ibfk_1` FOREIGN KEY (`prj_id`) REFERENCES `Projects` (`prj_id`) ON UPDATE CASCADE,
  CONSTRAINT `ProjectDeveloper_ibfk_2` FOREIGN KEY (`dev_id`) REFERENCES `Developers` (`dev_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProjectDeveloper`
--

LOCK TABLES `ProjectDeveloper` WRITE;
/*!40000 ALTER TABLE `ProjectDeveloper` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProjectDeveloper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProjectFrontEnd`
--

DROP TABLE IF EXISTS `ProjectFrontEnd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ProjectFrontEnd` (
  `prj_id` int NOT NULL,
  `pfe_frontend` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`prj_id`,`pfe_frontend`),
  CONSTRAINT `ProjectFrontEnd_ibfk_1` FOREIGN KEY (`prj_id`) REFERENCES `Projects` (`prj_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProjectFrontEnd`
--

LOCK TABLES `ProjectFrontEnd` WRITE;
/*!40000 ALTER TABLE `ProjectFrontEnd` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProjectFrontEnd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Projects`
--

DROP TABLE IF EXISTS `Projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Projects` (
  `prj_id` int NOT NULL AUTO_INCREMENT,
  `prj_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prj_class_year` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prj_class_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prj_demo` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`prj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Projects`
--

LOCK TABLES `Projects` WRITE;
/*!40000 ALTER TABLE `Projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `Projects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-19 16:49:21
