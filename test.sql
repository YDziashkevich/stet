/*
SQLyog Ultimate v11.52 (64 bit)
MySQL - 5.5.37-log : Database - st_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`st_test` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `st_test`;

/*Table structure for table `st_directory` */

DROP TABLE IF EXISTS `st_directory`;

CREATE TABLE `st_directory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parentId` int(10) unsigned DEFAULT NULL,
  `size` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

/*Data for the table `st_directory` */

insert  into `st_directory`(`id`,`name`,`parentId`,`size`) values (1,'README.md',NULL,12),(2,'css',NULL,NULL),(3,'directoryTree.txt',NULL,10),(4,'fonts',NULL,NULL),(5,'ico',NULL,NULL),(6,'inc',NULL,NULL),(7,'index.php',NULL,48),(8,'js',NULL,NULL),(9,'test.sql',NULL,1439),(10,'bootstrap-theme.css',2,20249),(11,'bootstrap-theme.min.css',2,17714),(12,'bootstrap.css',2,133529),(13,'bootstrap.min.css',2,102905),(14,'popup.css',2,3267),(15,'search.css',2,44),(16,'style.css',2,475),(17,'glyphicons-halflings-regular.eot',4,20290),(18,'glyphicons-halflings-regular.svg',4,63078),(19,'glyphicons-halflings-regular.ttf',4,41236),(20,'glyphicons-halflings-regular.woff',4,23292),(21,'apple-touch-icon-114-precomposed.png',5,11392),(22,'apple-touch-icon-144-precomposed.png',5,16780),(23,'apple-touch-icon-57-precomposed.png',5,4026),(24,'apple-touch-icon-72-precomposed.png',5,5681),(25,'favicon.ico',5,1150),(26,'favicon.png',5,2711),(27,'glyphicons-halflings-white.png',5,8777),(28,'glyphicons-halflings.png',5,12799),(29,'controllers',6,NULL),(30,'directory.php',29,6531),(31,'main.php',29,220),(32,'inc.php',6,95),(33,'models',6,NULL),(34,'directory.php',33,3029),(35,'service',6,NULL),(36,'app.php',35,494),(37,'autoloaders.php',35,1056),(38,'constants.php',35,368),(39,'controller.php',35,231),(40,'model.php',35,579),(41,'view.php',35,288),(42,'views',6,NULL),(43,'directory.php',42,2696),(44,'footer.php',42,42),(45,'header.php',42,512),(46,'main.php',42,2089),(47,'bootstrap.js',8,60329),(48,'bootstrap.min.js',8,27756);

/*Table structure for table `st_workers` */

DROP TABLE IF EXISTS `st_workers`;

CREATE TABLE `st_workers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `st_workers` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
