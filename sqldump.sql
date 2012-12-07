-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: collegedemo2
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `title` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES ('iron man',5,'that movie about some man made of iron'),('batman',5,'movie about a bat'),('the social network',4,'facebook copy'),('matrix',5,'there is no spoon'),('George of the jungle',4,'george and his journey in the jungle'),('All about Eve',4,'that girl called eve'),('beauty and the beast',5,'classic cartoon'),('Catch 22',5,'where the named catch 22 was coined. Army man wants to get out of war'),('Fiddler on the roof',2,'musical'),('bourne identity',5,'amnesia assassin '),('my big fat greek wedding',3,'no idea didn\'t see it'),('robocop',4,'half robot half man'),('star wars',4,'war in the stars'),('10 angry men',5,'the whole thing is in one room'),('toy story',5,'classic 90s cartoon'),('Girl with the dragon tattoo',4,'apparently the closest you get to real hacking in the movies '),('ocean\'s 11',5,'the long con');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaries2012`
--

DROP TABLE IF EXISTS `salaries2012`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salaries2012` (
  `staffname` varchar(200) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaries2012`
--

LOCK TABLES `salaries2012` WRITE;
/*!40000 ALTER TABLE `salaries2012` DISABLE KEYS */;
INSERT INTO `salaries2012` VALUES ('john','1500','intern'),('harry','2000','junior dev'),('alanturring','2300','tea maker'),('george','3000','mid-developer'),('iansmith','5000','CEO'),('dudeeee','20','pizza delivery');
/*!40000 ALTER TABLE `salaries2012` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `hash` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('bob','freddy123','fred.jpg',''),('johnsmith','og0g3u2m30','avatar.gif',''),('harry','sally09','picofme.jpg',''),('sally','harry03','summer01.bmp',''),('george3','12345654321','maxh04x312.bmp',''),('andrew','motorbike889','',''),('ianboyle','05081965','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-07 22:06:05
