-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: c9
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `postComment`
--

DROP TABLE IF EXISTS `postComment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postComment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) DEFAULT NULL,
  `userId` varchar(50) DEFAULT NULL,
  `comment` text,
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postComment`
--

LOCK TABLES `postComment` WRITE;
/*!40000 ALTER TABLE `postComment` DISABLE KEYS */;
INSERT INTO `postComment` VALUES (22,13,'litattic@naver.com','test1','2017-10-03 00:00:00'),(23,13,'litattic@naver.com','test2','2017-10-03 00:00:00'),(24,13,'litattic@naver.com','hi','2017-10-03 00:00:00'),(25,13,'litattic@naver.com','hello','2017-10-03 00:00:00'),(26,13,'litattic@naver.com','so cute','2017-10-03 00:00:00'),(27,13,'litattic@naver.com','so cool','2017-10-03 18:20:02'),(28,13,'litattic@naver.com','good','2017-10-03 18:54:38'),(29,13,'litattic@naver.com','hi','2017-10-09 03:00:46'),(30,13,'litattic@naver.com','hi','2017-10-09 03:00:47'),(31,13,'litattic@naver.com','hi','2017-10-09 03:00:48'),(32,13,'litattic@naver.com','hi','2017-10-09 03:00:48'),(33,13,'litattic@naver.com','hi','2017-10-09 03:00:48'),(34,13,'litattic@naver.com','hi','2017-10-09 03:00:49'),(35,13,'litattic@naver.com','hi','2017-10-09 03:00:49'),(36,13,'litattic@naver.com','hi','2017-10-09 03:00:50'),(37,20,'litattic@naver.com','awesome','2017-10-09 03:08:23'),(38,20,'litattic@naver.com','hi!!','2017-10-09 03:08:36'),(39,20,'litattic@naver.com','awesome','2017-10-22 22:03:43'),(40,17,'hoon1@naver.com','beautiful..','2017-10-22 22:04:28'),(41,12,'kjh@naver.com','Have a good day!','2017-10-22 22:05:21'),(42,7,'kjh@naver.com','awesome!!','2017-10-22 22:05:51');
/*!40000 ALTER TABLE `postComment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postLike`
--

DROP TABLE IF EXISTS `postLike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postLike` (
  `postId` int(11) DEFAULT NULL,
  `userId` varchar(50) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postLike`
--

LOCK TABLES `postLike` WRITE;
/*!40000 ALTER TABLE `postLike` DISABLE KEYS */;
INSERT INTO `postLike` VALUES (2,'litattic@naver.com','2017-09-24 02:42:12'),(NULL,NULL,'2017-10-03 14:11:22'),(13,'litattic@naver.com','2017-10-03 14:11:48'),(13,'litattic@naver.com','2017-10-03 18:08:25'),(4,'litattic@naver.com','2017-10-03 18:08:36'),(5,'litattic@naver.com','2017-10-03 18:54:54');
/*!40000 ALTER TABLE `postLike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(50) DEFAULT NULL,
  `image` text,
  `comment` text,
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (2,'litattic@naver.com','sample1.jpg','awesome','2017-09-21 00:00:00'),(3,'litattic@naver.com','sample2.jpg','awesome','2017-09-21 00:00:00'),(4,'litattic@naver.com','20170505_205729.jpg',NULL,'2017-09-23 00:00:00'),(5,'litattic@naver.com','20170504_172112.jpg','cute','2017-09-23 00:00:00'),(6,'litattic@naver.com','20170511_191805.jpg','','2017-09-23 00:00:00'),(7,'kjh@naver.com','IMG_0077.JPG','a mountain','2017-09-23 00:00:00'),(8,'kjh@naver.com','IMG_0006.JPG','','2017-09-23 00:00:00'),(9,'kjh@naver.com','IMG_0008.JPG','LEGO','2017-09-23 00:00:00'),(10,'kjh@naver.com','IMG_0044.JPG','hi','2017-09-23 00:00:00'),(11,'kjh@naver.com','IMG_0015.JPG','','2017-09-23 20:25:58'),(12,'kjh@naver.com','20170402_171435.jpg','','2017-09-24 01:21:15'),(13,'litattic@naver.com','img_4741_litattic.jpg','','2017-09-27 22:32:15'),(14,'hoon1@naver.com','dddsample7.jpg','good','2017-09-28 16:28:04'),(15,'hoon2@naver.com','aaaasample2.jpg','Very good','2017-09-28 17:10:14'),(16,'hruwqq@gmail.com','cccsample8.jpg','TestPanicPost','2017-09-28 17:35:04'),(17,'hoon1@naver.com','Tulips.jpg','this is cool','2017-10-03 18:07:08'),(18,'hoon5@naver.com','sample8 - Copy.jpg','first post','2017-10-03 18:56:21'),(19,'hoon11@naver.com','Jellyfish - Copy.jpg','first post','2017-10-08 21:54:34'),(20,'litattic@naver.com','IMG_0055.JPG','','2017-10-09 02:13:56'),(21,'litattic@naver.com','Screen 1.png','','2017-10-24 15:02:54'),(22,'litattic@naver.com','Screen5.png','','2017-10-24 15:04:54'),(23,'litattic@naver.com','Screen6.png','','2017-10-24 15:06:46');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `image` text,
  `registerDate` date NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('','$2y$10$siihWjwPhGze6UVPWPgrPehio6KWPZ6jAFZLcjLVc6o','',NULL,'2017-10-03'),('aa','$2y$10$ptapabsOYnwjB4OXmLIhy./zYxq0JDLYVwyGV0vUjjE','bb',NULL,'2017-09-28'),('aaa@naver.com','$2y$10$nZhY6jHcxNRNcXSP8oJi6ui.dd6Ix7qKwv5h4lNbQM8','aaa',NULL,'2017-09-28'),('abc@naver.com','$2y$10$Pah9euhfGgOhaQoFuVo89u1wjoQivVyeC34wCdaUjyD','abc',NULL,'2017-09-28'),('abcd','$2y$10$tL/vOXhQ9hoJDw0M9vKhJe5VGHYggPD3zL3ktC1nsIT','abcd',NULL,'2017-09-28'),('bbb','$2y$10$TWB.AaMrxw/jj6DYBSlsd.zjlHLzp6qp3J/VhFhrCjH','ccc',NULL,'2017-09-28'),('hoon11@naver.com','1111','hoon11',NULL,'2017-10-03'),('hoon1@naver.com','1111','hoon1','Tulips_sss.jpg','2017-09-28'),('hoon2@naver.com','0000','hoon222','ccccccsample3.jpg','2017-09-28'),('hoon3@naver.com','2222','hoon3',NULL,'2017-10-03'),('hoon5@naver.com','1111','hoon55555','sample9 - Copy.jpg','2017-10-03'),('hoon@naver.com','$2y$10$KfHdq5qNUv89yyP.TgUcHe.LOFkzuvWJMRnFhDUN.rM','hoon',NULL,'2017-09-28'),('hruwqq@gmail.com','123','TrueSerhii','bbbsample9.jpg','2017-09-28'),('kjh12@gmail.com','1234','kim jh',NULL,'2019-03-08'),('kjh@gmail.com','$2y$10$SYE.83.MA8p3tjVnMDg3i.cHS.YO7DGWpWbZqI/sLqq','kkj',NULL,'2017-09-28'),('kjh@naver.com','1234','hero',NULL,'2017-09-23'),('kkk@naver.com','$2y$10$wQ0CHmRCKaoq2eNwurM4weTOSe7HT/0vX7T3bm4LMzJ','kjh',NULL,'2017-09-28'),('litattic2@naver.com','$2y$10$MmPHyia6D273lKURpKOuf.KubtSD6qN/y5G2i0i8inJ',' jkh',NULL,'2017-09-28'),('litattic@naver.com','1234','cotton11','IMG_0050.JPG','2017-09-21'),('nnn','$2y$10$OH02nAdjJa9PhqHlJTYGxuzy/3zflk4Q/B9Got.IlQ7','nnn',NULL,'2017-09-28'),('ss','$2y$10$Ka.Haxpfbeo5yKLWt45Qs.iDjQJ49.0BVrg.cXzr65D','kk',NULL,'2017-09-28'),('test1','$2y$10$OeLtCG.P8Tzh0yQCM3fcAuCY8LPLdZXLKBpaA88ux36','test1',NULL,'2017-10-03'),('test2','$2y$10$Ou1YP2fNWl9v5dwjVgq89OAXsMSfUNyB3HNu4z33hNy','test2',NULL,'2017-10-03'),('test3','1111','test3',NULL,'2017-10-03'),('xxx','$2y$10$TsDpqv.ShTnvE/VZNqkLy.jJenjT1kJUpEAQQqiKbr4','xxx',NULL,'2017-09-28');
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

-- Dump completed on 2019-03-11  2:11:05
