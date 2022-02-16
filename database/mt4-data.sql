
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

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mt4-data` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mt4-data`;
DROP TABLE IF EXISTS `Post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `authorId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `Post` WRITE;
/*!40000 ALTER TABLE `Post` DISABLE KEYS */;
INSERT INTO `Post` VALUES (1,'2021-01-21 11:06:42','Je suis un premier article','\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo volutpat dolor, ac placerat erat lacinia ac. Morbi ornare ac risus cursus vehicula. Mauris nec diam pulvinar, imperdiet risus at, convallis purus. Nunc suscipit erat felis, a pellentesque orci rutrum ac. Cras non tempus ipsum. In dictum pretium dui at pharetra. Phasellus eget imperdiet diam, vel dignissim ex. Donec malesuada ac lectus id ornare.\r\n\r\nMorbi diam lacus, consequat eu rutrum auctor, scelerisque non purus. Integer porttitor massa vitae ornare rutrum. Quisque sollicitudin in mi ut condimentum. In vitae gravida ante, sed convallis nisl. Ut faucibus justo ut ex rhoncus tincidunt. Mauris placerat elit volutpat orci elementum imperdiet. Duis vel est pretium, viverra lacus at, varius felis. Suspendisse vitae pulvinar eros. Aliquam at pretium ante. Nullam facilisis id neque sit amet ultricies.\r\n\r\nPellentesque ullamcorper erat sem, sed rutrum elit mattis sed. Nam non justo vehicula, interdum mauris vel, dignissim purus. Etiam elementum urna in magna congue, ut rutrum quam facilisis. Mauris tempus lorem quis nunc gravida, ac sodales nunc feugiat. Suspendisse dapibus dictum dictum. Ut nec nibh velit. Integer dignissim urna diam, ac convallis dui porta vel. Maecenas elit nisl, sollicitudin et suscipit id, imperdiet at risus. Sed scelerisque convallis tellus, vel sollicitudin lectus iaculis ut. Morbi vitae vestibulum nibh. Ut vel ex urna. Praesent at mi ipsum.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras id vestibulum erat, sit amet consectetur sapien. Nullam at porttitor erat. Donec lobortis nec enim a aliquam. Maecenas sodales congue tortor, sit amet maximus ex egestas eget. Aliquam iaculis congue blandit. Phasellus eu laoreet orci. Pellentesque ultricies, nulla in molestie tincidunt, justo sapien mollis augue, id ultricies ligula elit ut risus. Mauris viverra finibus consequat. Duis blandit, libero vel tempor fringilla, sem dui ornare nulla, at condimentum lacus tortor id eros. Donec eleifend felis a felis auctor, id fermentum lorem scelerisque.\r\n\r\nNulla non molestie tellus. Donec velit tortor, lobortis vel mauris vitae, tempor mattis nulla. Aenean sed sapien lectus. Aenean vestibulum libero sed diam blandit, eget suscipit dolor elementum. Cras sed lacus quis nunc aliquam scelerisque vel quis turpis. Nunc rhoncus dapibus eleifend. Suspendisse semper vehicula leo sed vestibulum. Nulla at blandit mauris. Suspendisse in velit metus. Curabitur vitae condimentum orci. Aliquam ullamcorper, felis at tempus rutrum, metus quam elementum dolor, lobortis blandit purus tortor id nulla. Sed tempus augue vel ligula ultricies, non efficitur leo condimentum. ',1),(2,'2022-01-06 10:06:42','Je suis le second article de merde','\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo volutpat dolor, ac placerat erat lacinia ac. Morbi ornare ac risus cursus vehicula. Mauris nec diam pulvinar, imperdiet risus at, convallis purus. Nunc suscipit erat felis, a pellentesque orci rutrum ac. Cras non tempus ipsum. In dictum pretium dui at pharetra. Phasellus eget imperdiet diam, vel dignissim ex. Donec malesuada ac lectus id ornare.\r\n\r\nMorbi diam lacus, consequat eu rutrum auctor, scelerisque non purus. Integer porttitor massa vitae ornare rutrum. Quisque sollicitudin in mi ut condimentum. In vitae gravida ante, sed convallis nisl. Ut faucibus justo ut ex rhoncus tincidunt. Mauris placerat elit volutpat orci elementum imperdiet. Duis vel est pretium, viverra lacus at, varius felis. Suspendisse vitae pulvinar eros. Aliquam at pretium ante. Nullam facilisis id neque sit amet ultricies.\r\n\r\nPellentesque ullamcorper erat sem, sed rutrum elit mattis sed. Nam non justo vehicula, interdum mauris vel, dignissim purus. Etiam elementum urna in magna congue, ut rutrum quam facilisis. Mauris tempus lorem quis nunc gravida, ac sodales nunc feugiat. Suspendisse dapibus dictum dictum. Ut nec nibh velit. Integer dignissim urna diam, ac convallis dui porta vel. Maecenas elit nisl, sollicitudin et suscipit id, imperdiet at risus. Sed scelerisque convallis tellus, vel sollicitudin lectus iaculis ut. Morbi vitae vestibulum nibh. Ut vel ex urna. Praesent at mi ipsum.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras id vestibulum erat, sit amet consectetur sapien. Nullam at porttitor erat. Donec lobortis nec enim a aliquam. Maecenas sodales congue tortor, sit amet maximus ex egestas eget. Aliquam iaculis congue blandit. Phasellus eu laoreet orci. Pellentesque ultricies, nulla in molestie tincidunt, justo sapien mollis augue, id ultricies ligula elit ut risus. Mauris viverra finibus consequat. Duis blandit, libero vel tempor fringilla, sem dui ornare nulla, at condimentum lacus tortor id eros. Donec eleifend felis a felis auctor, id fermentum lorem scelerisque.\r\n\r\nNulla non molestie tellus. Donec velit tortor, lobortis vel mauris vitae, tempor mattis nulla. Aenean sed sapien lectus. Aenean vestibulum libero sed diam blandit, eget suscipit dolor elementum. Cras sed lacus quis nunc aliquam scelerisque vel quis turpis. Nunc rhoncus dapibus eleifend. Suspendisse semper vehicula leo sed vestibulum. Nulla at blandit mauris. Suspendisse in velit metus. Curabitur vitae condimentum orci. Aliquam ullamcorper, felis at tempus rutrum, metus quam elementum dolor, lobortis blandit purus tortor id nulla. Sed tempus augue vel ligula ultricies, non efficitur leo condimentum. ',1);
/*!40000 ALTER TABLE `Post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

