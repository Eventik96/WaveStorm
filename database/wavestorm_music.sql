CREATE DATABASE  IF NOT EXISTS `wavestorm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wavestorm`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: wavestorm
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.33-MariaDB

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
-- Table structure for table `music`
--

DROP TABLE IF EXISTS `music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `music` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Artist` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Album` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Genre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Track` int(11) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Picture` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `music`
--

LOCK TABLES `music` WRITE;
/*!40000 ALTER TABLE `music` DISABLE KEYS */;
INSERT INTO `music` VALUES (1,'Watercolour','Pendulum','Immersion','Drum & Bass',2010,3,'musics/Immersion/03 Watercolour.mp3','musics/Immersion/immersion.jpg'),(2,'Encoder','Pendulum','Immersion','Drum & Bass',2010,15,'musics/Immersion/15 Encoder.mp3','musics/Immersion/immersion.jpg'),(3,'The Island - Pt I (Dawn)','Pendulum','Immersion','Drum & Bass',2010,8,'musics/Immersion/08 The Island Pt.1 (Dawn).mp3','musics/Immersion/immersion.jpg'),(4,'The Fountain (ft. Steven Wilson)','Pendulum','Immersion','Drum & Bass',2010,14,'musics/Immersion/14 The Fountain.mp3','musics/Immersion/immersion.jpg'),(5,'Angelos (Lumidelic Remix)','Alex H','Angelos (Remixes)','Progressive House',2017,4,'musics/Progressive House/Alex H-Angelos (Lumidelic Remix).mp3','musics/Progressive House/Alex H-Angelos (Lumidelic Remix)'),(6,'Would U','Dezza','AC35 / Would U','Progressive House',2017,2,'musics/Progressive House/Dezza-Would U (Extended Mix).mp3','musics/Progressive House/Dezza-Would U (Extended Mix)'),(7,'Our Story','Eugene Becker','Our Story','Progressive House',2017,7,'musics/Progressive House/Eugene Becker - Our Story (Original Mix).mp3','musics/Progressive House/Eugene Becker - Our Story (Original Mix)'),(8,'Alba (Original Mix)','Druce','Alba','Progressive House',2017,1,'musics/Progressive House/Druce - Alba.mp3','musics/Progressive House/Druce - Alba'),(9,'Breathe (Ft. Rob Swire) (Blaynoise x Klllazy Remix)','Eric Prydz','Breathe Remix','Drum & Bass',2016,1,'musics/Drum & Bass/Eric Prydz - Breathe (Ft. Rob Swire) (Blaynoise x Klllazy Remix).mp3','musics/Drum & Bass/Eric Prydz - Breathe (Ft. Rob Swire) (Blaynoise x Klllazy Remix)'),(10,'Hold (Fred V & Grafix Remix)','Dabin ft Daniela Andrade','Hold Remixes','Drum & Bass',2016,4,'musics/Drum & Bass/Dabin ft Daniela Andrade-Hold (Fred V x Grafix Remix).mp3','musics/Drum & Bass/Dabin ft Daniela Andrade-Hold (Fred V x Grafix Remix)'),(11,'Days Like These','Monrroe','Days Like These','Drum & Bass',2015,1,'musics/Drum & Bass/Monrroe-Days Like These (Original Mix).mp3','musics/Drum & Bass/Monrroe-Days Like These (Original Mix)'),(12,'Day For Night','Malaky & Changing Faces','','Drum & Bass',2017,0,'musics/Drum & Bass/Changing Faces & Malaky-Day For Night.mp3','musics/Drum & Bass/Changing Faces & Malaky-Day For Night');
/*!40000 ALTER TABLE `music` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-02 19:19:24
