/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.19-MariaDB : Database - news_project
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`news_project` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `news_project`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

LOCK TABLES `category` WRITE;

insert  into `category`(`category_id`,`category_name`,`post`) values (34,'HTML5',1),(37,'PYTHON',3),(38,'PHP8',1),(33,'CSS3',0),(40,'C++',1),(43,'JAVASCRIPT',1),(42,'VISUAL BASIC',1),(44,'kuch b',0);

UNLOCK TABLES;

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `post` */

LOCK TABLES `post` WRITE;

insert  into `post`(`post_id`,`title`,`description`,`category`,`post_date`,`author`,`post_img`) values (55,'PYTHON','Python is emerging language.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores saepe temporibus deserunt excepturi recusandae accusantium nam, aliquam provident quam doloribus illum! Dicta cumque doloremque blanditiis ut? At doloribus labore distinctio dolores quia. Quidem nam est, fugiat quasi atque aperiam labore minima placeat enim, natus voluptatem asperiores dignissimos alias beatae quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Id recusandae dolore, minima molestiae iure rem neque saepe pariatur sequi deserunt voluptas eius! Mollitia itaque cum id vitae, rerum eligendi quo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde temporibus quidem eius repellendus iusto fuga recusandae, expedita odio necessitatibus voluptatibus vitae autem culpa eligendi nesciunt a laborum eveniet blanditiis dolore.','37','10 Aug, 2021 14:41:03',36,'22 & 23 january 2020 (17).jpg'),(54,'PHP','PHP is best server side language.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores saepe temporibus deserunt excepturi recusandae accusantium nam, aliquam provident quam doloribus illum! Dicta cumque doloremque blanditiis ut? At doloribus labore distinctio dolores quia. Quidem nam est, fugiat quasi atque aperiam labore minima placeat enim, natus voluptatem asperiores dignissimos alias beatae quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Id recusandae dolore, minima molestiae iure rem neque saepe pariatur sequi deserunt voluptas eius! Mollitia itaque cum id vitae, rerum eligendi quo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde temporibus quidem eius repellendus iusto fuga recusandae, expedita odio necessitatibus voluptatibus vitae autem culpa eligendi nesciunt a laborum eveniet blanditiis dolore.','38','10 Aug, 2021 14:40:13',27,'22 & 23 january 2020 (21).jpg'),(51,'JS','js sjs  js js jsjsLorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores saepe temporibus deserunt excepturi recusandae accusantium nam, aliquam provident quam doloribus illum! Dicta cumque doloremque blanditiis ut? At doloribus labore distinctio dolores quia. Quidem nam est, fugiat quasi atque aperiam labore minima placeat enim, natus voluptatem asperiores dignissimos alias beatae quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Id recusandae dolore, minima molestiae iure rem neque saepe pariatur sequi deserunt voluptas eius! Mollitia itaque cum id vitae, rerum eligendi quo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde temporibus quidem eius repellendus iusto fuga recusandae, expedita odio necessitatibus voluptatibus vitae autem culpa eligendi nesciunt a laborum eveniet blanditiis dolore.','43','10 Aug, 2021 06:44:24',37,'22 & 23 january 2020 (10).jpg'),(45,'HTML4','Hypertext Markup Language FOURLorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores saepe temporibus deserunt excepturi recusandae accusantium nam, aliquam provident quam doloribus illum! Dicta cumque doloremque blanditiis ut? At doloribus labore distinctio dolores quia. Quidem nam est, fugiat quasi atque aperiam labore minima placeat enim, natus voluptatem asperiores dignissimos alias beatae quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Id recusandae dolore, minima molestiae iure rem neque saepe pariatur sequi deserunt voluptas eius! Mollitia itaque cum id vitae, rerum eligendi quo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde temporibus quidem eius repellendus iusto fuga recusandae, expedita odio necessitatibus voluptatibus vitae autem culpa eligendi nesciunt a laborum eveniet blanditiis dolore.','34','07 Aug, 2021 06:58:34',37,'22 & 23 january 2020 (9).jpg'),(46,'PYTHON','LKSDKHJFLorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores saepe temporibus deserunt excepturi recusandae accusantium nam, aliquam provident quam doloribus illum! Dicta cumque doloremque blanditiis ut? At doloribus labore distinctio dolores quia. Quidem nam est, fugiat quasi atque aperiam labore minima placeat enim, natus voluptatem asperiores dignissimos alias beatae quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Id recusandae dolore, minima molestiae iure rem neque saepe pariatur sequi deserunt voluptas eius! Mollitia itaque cum id vitae, rerum eligendi quo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde temporibus quidem eius repellendus iusto fuga recusandae, expedita odio necessitatibus voluptatibus vitae autem culpa eligendi nesciunt a laborum eveniet blanditiis dolore.','37','07 Aug, 2021 07:31:22',37,'22 & 23 january 2020 (14).jpg'),(47,'VB','Visual Basic.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores saepe temporibus deserunt excepturi recusandae accusantium nam, aliquam provident quam doloribus illum! Dicta cumque doloremque blanditiis ut? At doloribus labore distinctio dolores quia. Quidem nam est, fugiat quasi atque aperiam labore minima placeat enim, natus voluptatem asperiores dignissimos alias beatae quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Id recusandae dolore, minima molestiae iure rem neque saepe pariatur sequi deserunt voluptas eius! Mollitia itaque cum id vitae, rerum eligendi quo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde temporibus quidem eius repellendus iusto fuga recusandae, expedita odio necessitatibus voluptatibus vitae autem culpa eligendi nesciunt a laborum eveniet blanditiis dolore.','42','07 Aug, 2021 07:31:52',37,'22 & 23 january 2020 (10).jpg'),(49,'C++','C++ is a procedural language.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores saepe temporibus deserunt excepturi recusandae accusantium nam, aliquam provident quam doloribus illum! Dicta cumque doloremque blanditiis ut? At doloribus labore distinctio dolores quia. Quidem nam est, fugiat quasi atque aperiam labore minima placeat enim, natus voluptatem asperiores dignissimos alias beatae quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Id recusandae dolore, minima molestiae iure rem neque saepe pariatur sequi deserunt voluptas eius! Mollitia itaque cum id vitae, rerum eligendi quo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde temporibus quidem eius repellendus iusto fuga recusandae, expedita odio necessitatibus voluptatibus vitae autem culpa eligendi nesciunt a laborum eveniet blanditiis dolore.','40','07 Aug, 2021 14:45:21',36,'22 & 23 january 2020 (12).jpg'),(57,'PYTHON3','Python is very popular language nowadays.is very popular language nowadaysis very popular language nowadaysis very popular language nowadaysis very popular language nowadaysis very popular language nowadaysis very popular language nowadaysis very popular language nowadaysis very popular language nowadaysis very popular language nowadaysis very popular language nowadaysis very popular language nowadays                ','37','16 Aug, 2021 09:09:05',37,'22 & 23 january 2020 (25).jpg');

UNLOCK TABLES;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `user_pass` varchar(40) DEFAULT NULL,
  `role_type` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

LOCK TABLES `user` WRITE;

insert  into `user`(`user_id`,`first_name`,`last_name`,`username`,`user_pass`,`role_type`) values (30,'Yasir','Soomro','yasir','202cb962ac59075b964b07152d234b70',0),(36,'Maqsood','Noonari','maqoo','202cb962ac59075b964b07152d234b70',1),(37,'Zafar','Sarki','zafar','827ccb0eea8a706c4c34a16891f84e7b',1),(27,'Manzoor','Memon','manzoor','827ccb0eea8a706c4c34a16891f84e7b',1),(29,'Rabnawaz','Dashti','rabnawaz','202cb962ac59075b964b07152d234b70',0),(31,'Abdul','Aziz','aziz','202cb962ac59075b964b07152d234b70',0),(32,'Ahsan Ali','Shaikh','ahsan','202cb962ac59075b964b07152d234b70',0),(33,'Yousuf','Buriro','yousuf','202cb962ac59075b964b07152d234b70',0),(34,'Shahzeb','Sarki','shahzeb','202cb962ac59075b964b07152d234b70',0),(35,'Rosie','Gabriel','rosie','202cb962ac59075b964b07152d234b70',0);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
