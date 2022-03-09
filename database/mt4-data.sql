-- MariaDB dump 10.19  Distrib 10.6.4-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mt4-data
-- ------------------------------------------------------
-- Server version	10.6.4-MariaDB-1:10.6.4+maria~focal

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `publishedAt` datetime NOT NULL,
  `postId` int(11) NOT NULL,
  `authorId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`postId`),
  KEY `authorId` (`authorId`),
  CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `Post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`authorId`) REFERENCES `User` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comment`
--

LOCK TABLES `Comment` WRITE;
/*!40000 ALTER TABLE `Comment` DISABLE KEYS */;
INSERT INTO `Comment` VALUES (1,'Un gentil commentaire','2022-03-06 10:21:42',1,1),(4,'Une super commentaire\r\n','2022-03-06 14:03:11',1,2),(6,'Test toto\r\n\r\nSeconde ligne','2022-03-06 14:17:05',15,2);
/*!40000 ALTER TABLE `Comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Post`
--

DROP TABLE IF EXISTS `Post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `picture_link` varchar(255) DEFAULT NULL,
  `authorId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Post`
--

LOCK TABLES `Post` WRITE;
/*!40000 ALTER TABLE `Post` DISABLE KEYS */;
INSERT INTO `Post` VALUES (1,'2021-01-21 11:06:42','John-Bob-DIRIENZO le meilleur\n','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo volutpat dolor, ac placerat erat lacinia ac. Morbi ornare ac risus cursus vehicula. Mauris nec diam pulvinar, imperdiet risus at, convallis purus. Nunc suscipit erat felis, a pellentesque orci rutrum ac. Cras non tempus ipsum. In dictum pretium dui at pharetra. Phasellus eget imperdiet diam, vel dignissim ex. Donec malesuada ac lectus id ornare.\r\n\r\nMorbi diam lacus, consequat eu rutrum auctor, scelerisque non purus. Integer porttitor massa vitae ornare rutrum. Quisque sollicitudin in mi ut condimentum. In vitae gravida ante, sed convallis nisl. Ut faucibus justo ut ex rhoncus tincidunt. Mauris placerat elit volutpat orci elementum imperdiet. Duis vel est pretium, viverra lacus at, varius felis. Suspendisse vitae pulvinar eros. Aliquam at pretium ante. Nullam facilisis id neque sit amet ultricies.\r\n\r\nPellentesque ullamcorper erat sem, sed rutrum elit mattis sed. Nam non justo vehicula, interdum mauris vel, dignissim purus. Etiam elementum urna in magna congue, ut rutrum quam facilisis. Mauris tempus lorem quis nunc gravida, ac sodales nunc feugiat. Suspendisse dapibus dictum dictum. Ut nec nibh velit. Integer dignissim urna diam, ac convallis dui porta vel. Maecenas elit nisl, sollicitudin et suscipit id, imperdiet at risus. Sed scelerisque convallis tellus, vel sollicitudin lectus iaculis ut. Morbi vitae vestibulum nibh. Ut vel ex urna. Praesent at mi ipsum.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras id vestibulum erat, sit amet consectetur sapien. Nullam at porttitor erat. Donec lobortis nec enim a aliquam. Maecenas sodales congue tortor, sit amet maximus ex egestas eget. Aliquam iaculis congue blandit. Phasellus eu laoreet orci. Pellentesque ultricies, nulla in molestie tincidunt, justo sapien mollis augue, id ultricies ligula elit ut risus. Mauris viverra finibus consequat. Duis blandit, libero vel tempor fringilla, sem dui ornare nulla, at condimentum lacus tortor id eros. Donec eleifend felis a felis auctor, id fermentum lorem scelerisque.\r\n\r\nNulla non molestie tellus. Donec velit tortor, lobortis vel mauris vitae, tempor mattis nulla. Aenean sed sapien lectus. Aenean vestibulum libero sed diam blandit, eget suscipit dolor elementum. Cras sed lacus quis nunc aliquam scelerisque vel quis turpis. Nunc rhoncus dapibus eleifend. Suspendisse semper vehicula leo sed vestibulum. Nulla at blandit mauris. Suspendisse in velit metus. Curabitur vitae condimentum orci. Aliquam ullamcorper, felis at tempus rutrum, metus quam elementum dolor, lobortis blandit purus tortor id nulla. Sed tempus augue vel ligula ultricies, non efficitur leo condimentum. ','default.png',1),(15,'2021-01-21 11:06:42','John-Bob-DIRIENZO le plus fort\n','\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo volutpat dolor, ac placerat erat lacinia ac. Morbi ornare ac risus cursus vehicula. Mauris nec diam pulvinar, imperdiet risus at, convallis purus. Nunc suscipit erat felis, a pellentesque orci rutrum ac. Cras non tempus ipsum. In dictum pretium dui at pharetra. Phasellus eget imperdiet diam, vel dignissim ex. Donec malesuada ac lectus id ornare.\n\nMorbi diam lacus, consequat eu rutrum auctor, scelerisque non purus. Integer porttitor massa vitae ornare rutrum. Quisque sollicitudin in mi ut condimentum. In vitae gravida ante, sed convallis nisl. Ut faucibus justo ut ex rhoncus tincidunt. Mauris placerat elit volutpat orci elementum imperdiet. Duis vel est pretium, viverra lacus at, varius felis. Suspendisse vitae pulvinar eros. Aliquam at pretium ante. Nullam facilisis id neque sit amet ultricies.\n\nPellentesque ullamcorper erat sem, sed rutrum elit mattis sed. Nam non justo vehicula, interdum mauris vel, dignissim purus. Etiam elementum urna in magna congue, ut rutrum quam facilisis. Mauris tempus lorem quis nunc gravida, ac sodales nunc feugiat. Suspendisse dapibus dictum dictum. Ut nec nibh velit. Integer dignissim urna diam, ac convallis dui porta vel. Maecenas elit nisl, sollicitudin et suscipit id, imperdiet at risus. Sed scelerisque convallis tellus, vel sollicitudin lectus iaculis ut. Morbi vitae vestibulum nibh. Ut vel ex urna. Praesent at mi ipsum.\n\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras id vestibulum erat, sit amet consectetur sapien. Nullam at porttitor erat. Donec lobortis nec enim a aliquam. Maecenas sodales congue tortor, sit amet maximus ex egestas eget. Aliquam iaculis congue blandit. Phasellus eu laoreet orci. Pellentesque ultricies, nulla in molestie tincidunt, justo sapien mollis augue, id ultricies ligula elit ut risus. Mauris viverra finibus consequat. Duis blandit, libero vel tempor fringilla, sem dui ornare nulla, at condimentum lacus tortor id eros. Donec eleifend felis a felis auctor, id fermentum lorem scelerisque.\n\nNulla non molestie tellus. Donec velit tortor, lobortis vel mauris vitae, tempor mattis nulla. Aenean sed sapien lectus. Aenean vestibulum libero sed diam blandit, eget suscipit dolor elementum. Cras sed lacus quis nunc aliquam scelerisque vel quis turpis. Nunc rhoncus dapibus eleifend. Suspendisse semper vehicula leo sed vestibulum. Nulla at blandit mauris. Suspendisse in velit metus. Curabitur vitae condimentum orci. Aliquam ullamcorper, felis at tempus rutrum, metus quam elementum dolor, lobortis blandit purus tortor id nulla. Sed tempus augue vel ligula ultricies, non efficitur leo condimentum. ','default.png',1),(17,'2021-01-21 11:06:42','John-Bob-DIRIENZO le plus sympa\n','\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo volutpat dolor, ac placerat erat lacinia ac. Morbi ornare ac risus cursus vehicula. Mauris nec diam pulvinar, imperdiet risus at, convallis purus. Nunc suscipit erat felis, a pellentesque orci rutrum ac. Cras non tempus ipsum. In dictum pretium dui at pharetra. Phasellus eget imperdiet diam, vel dignissim ex. Donec malesuada ac lectus id ornare.\r\n\r\nMorbi diam lacus, consequat eu rutrum auctor, scelerisque non purus. Integer porttitor massa vitae ornare rutrum. Quisque sollicitudin in mi ut condimentum. In vitae gravida ante, sed convallis nisl. Ut faucibus justo ut ex rhoncus tincidunt. Mauris placerat elit volutpat orci elementum imperdiet. Duis vel est pretium, viverra lacus at, varius felis. Suspendisse vitae pulvinar eros. Aliquam at pretium ante. Nullam facilisis id neque sit amet ultricies.\r\n\r\nPellentesque ullamcorper erat sem, sed rutrum elit mattis sed. Nam non justo vehicula, interdum mauris vel, dignissim purus. Etiam elementum urna in magna congue, ut rutrum quam facilisis. Mauris tempus lorem quis nunc gravida, ac sodales nunc feugiat. Suspendisse dapibus dictum dictum. Ut nec nibh velit. Integer dignissim urna diam, ac convallis dui porta vel. Maecenas elit nisl, sollicitudin et suscipit id, imperdiet at risus. Sed scelerisque convallis tellus, vel sollicitudin lectus iaculis ut. Morbi vitae vestibulum nibh. Ut vel ex urna. Praesent at mi ipsum.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras id vestibulum erat, sit amet consectetur sapien. Nullam at porttitor erat. Donec lobortis nec enim a aliquam. Maecenas sodales congue tortor, sit amet maximus ex egestas eget. Aliquam iaculis congue blandit. Phasellus eu laoreet orci. Pellentesque ultricies, nulla in molestie tincidunt, justo sapien mollis augue, id ultricies ligula elit ut risus. Mauris viverra finibus consequat. Duis blandit, libero vel tempor fringilla, sem dui ornare nulla, at condimentum lacus tortor id eros. Donec eleifend felis a felis auctor, id fermentum lorem scelerisque.\r\n\r\nNulla non molestie tellus. Donec velit tortor, lobortis vel mauris vitae, tempor mattis nulla. Aenean sed sapien lectus. Aenean vestibulum libero sed diam blandit, eget suscipit dolor elementum. Cras sed lacus quis nunc aliquam scelerisque vel quis turpis. Nunc rhoncus dapibus eleifend. Suspendisse semper vehicula leo sed vestibulum. Nulla at blandit mauris. Suspendisse in velit metus. Curabitur vitae condimentum orci. Aliquam ullamcorper, felis at tempus rutrum, metus quam elementum dolor, lobortis blandit purus tortor id nulla. Sed tempus augue vel ligula ultricies, non efficitur leo condimentum. ','default.png',1),(18,'2021-01-21 11:06:42','Merci pour le 20/20 😄','\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo volutpat dolor, ac placerat erat lacinia ac. Morbi ornare ac risus cursus vehicula. Mauris nec diam pulvinar, imperdiet risus at, convallis purus. Nunc suscipit erat felis, a pellentesque orci rutrum ac. Cras non tempus ipsum. In dictum pretium dui at pharetra. Phasellus eget imperdiet diam, vel dignissim ex. Donec malesuada ac lectus id ornare.\r\n\r\nMorbi diam lacus, consequat eu rutrum auctor, scelerisque non purus. Integer porttitor massa vitae ornare rutrum. Quisque sollicitudin in mi ut condimentum. In vitae gravida ante, sed convallis nisl. Ut faucibus justo ut ex rhoncus tincidunt. Mauris placerat elit volutpat orci elementum imperdiet. Duis vel est pretium, viverra lacus at, varius felis. Suspendisse vitae pulvinar eros. Aliquam at pretium ante. Nullam facilisis id neque sit amet ultricies.\r\n\r\nPellentesque ullamcorper erat sem, sed rutrum elit mattis sed. Nam non justo vehicula, interdum mauris vel, dignissim purus. Etiam elementum urna in magna congue, ut rutrum quam facilisis. Mauris tempus lorem quis nunc gravida, ac sodales nunc feugiat. Suspendisse dapibus dictum dictum. Ut nec nibh velit. Integer dignissim urna diam, ac convallis dui porta vel. Maecenas elit nisl, sollicitudin et suscipit id, imperdiet at risus. Sed scelerisque convallis tellus, vel sollicitudin lectus iaculis ut. Morbi vitae vestibulum nibh. Ut vel ex urna. Praesent at mi ipsum.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras id vestibulum erat, sit amet consectetur sapien. Nullam at porttitor erat. Donec lobortis nec enim a aliquam. Maecenas sodales congue tortor, sit amet maximus ex egestas eget. Aliquam iaculis congue blandit. Phasellus eu laoreet orci. Pellentesque ultricies, nulla in molestie tincidunt, justo sapien mollis augue, id ultricies ligula elit ut risus. Mauris viverra finibus consequat. Duis blandit, libero vel tempor fringilla, sem dui ornare nulla, at condimentum lacus tortor id eros. Donec eleifend felis a felis auctor, id fermentum lorem scelerisque.\r\n\r\nNulla non molestie tellus. Donec velit tortor, lobortis vel mauris vitae, tempor mattis nulla. Aenean sed sapien lectus. Aenean vestibulum libero sed diam blandit, eget suscipit dolor elementum. Cras sed lacus quis nunc aliquam scelerisque vel quis turpis. Nunc rhoncus dapibus eleifend. Suspendisse semper vehicula leo sed vestibulum. Nulla at blandit mauris. Suspendisse in velit metus. Curabitur vitae condimentum orci. Aliquam ullamcorper, felis at tempus rutrum, metus quam elementum dolor, lobortis blandit purus tortor id nulla. Sed tempus augue vel ligula ultricies, non efficitur leo condimentum. ','default.png',1),(19,'2021-01-21 11:06:42','Vous êtes le meilleur prof','\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo volutpat dolor, ac placerat erat lacinia ac. Morbi ornare ac risus cursus vehicula. Mauris nec diam pulvinar, imperdiet risus at, convallis purus. Nunc suscipit erat felis, a pellentesque orci rutrum ac. Cras non tempus ipsum. In dictum pretium dui at pharetra. Phasellus eget imperdiet diam, vel dignissim ex. Donec malesuada ac lectus id ornare.\r\n\r\nMorbi diam lacus, consequat eu rutrum auctor, scelerisque non purus. Integer porttitor massa vitae ornare rutrum. Quisque sollicitudin in mi ut condimentum. In vitae gravida ante, sed convallis nisl. Ut faucibus justo ut ex rhoncus tincidunt. Mauris placerat elit volutpat orci elementum imperdiet. Duis vel est pretium, viverra lacus at, varius felis. Suspendisse vitae pulvinar eros. Aliquam at pretium ante. Nullam facilisis id neque sit amet ultricies.\r\n\r\nPellentesque ullamcorper erat sem, sed rutrum elit mattis sed. Nam non justo vehicula, interdum mauris vel, dignissim purus. Etiam elementum urna in magna congue, ut rutrum quam facilisis. Mauris tempus lorem quis nunc gravida, ac sodales nunc feugiat. Suspendisse dapibus dictum dictum. Ut nec nibh velit. Integer dignissim urna diam, ac convallis dui porta vel. Maecenas elit nisl, sollicitudin et suscipit id, imperdiet at risus. Sed scelerisque convallis tellus, vel sollicitudin lectus iaculis ut. Morbi vitae vestibulum nibh. Ut vel ex urna. Praesent at mi ipsum.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras id vestibulum erat, sit amet consectetur sapien. Nullam at porttitor erat. Donec lobortis nec enim a aliquam. Maecenas sodales congue tortor, sit amet maximus ex egestas eget. Aliquam iaculis congue blandit. Phasellus eu laoreet orci. Pellentesque ultricies, nulla in molestie tincidunt, justo sapien mollis augue, id ultricies ligula elit ut risus. Mauris viverra finibus consequat. Duis blandit, libero vel tempor fringilla, sem dui ornare nulla, at condimentum lacus tortor id eros. Donec eleifend felis a felis auctor, id fermentum lorem scelerisque.\r\n\r\nNulla non molestie tellus. Donec velit tortor, lobortis vel mauris vitae, tempor mattis nulla. Aenean sed sapien lectus. Aenean vestibulum libero sed diam blandit, eget suscipit dolor elementum. Cras sed lacus quis nunc aliquam scelerisque vel quis turpis. Nunc rhoncus dapibus eleifend. Suspendisse semper vehicula leo sed vestibulum. Nulla at blandit mauris. Suspendisse in velit metus. Curabitur vitae condimentum orci. Aliquam ullamcorper, felis at tempus rutrum, metus quam elementum dolor, lobortis blandit purus tortor id nulla. Sed tempus augue vel ligula ultricies, non efficitur leo condimentum. ','default.png',1),(21,'2022-03-09 10:36:10','Meilleur prof de php ❤️','sfdfdsfsd','default.png',1);
/*!40000 ALTER TABLE `Post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'admin@gmail.com','$2y$10$gRzFLS5.Eh0w9.rW7Wt8Ze4BWT0kGgNSxNiEVcL/0.sKiJAD7cqfW','Romain','Dreidemy',1),(2,'user@gmail.com','$2y$10$e/ZxYOufpE1RJHveE15aReXuiH99xrJEhtDmdaDrkJgSmmzhcW2Ty','User','Pas admin',0);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-09 15:08:23
