# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: BeerBucks
# Generation Time: 2013-06-11 00:29:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table partys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partys`;

CREATE TABLE `partys` (
  `party_id` varchar(13) NOT NULL DEFAULT '',
  `user_id` varchar(32) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_edited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tos` int(1) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `description` varchar(245) DEFAULT NULL,
  `party_img` varchar(32) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `goal` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`party_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `party_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `partys` WRITE;
/*!40000 ALTER TABLE `partys` DISABLE KEYS */;

INSERT INTO `partys` (`party_id`, `user_id`, `date_created`, `date_edited`, `tos`, `title`, `description`, `party_img`, `location`, `address`, `start`, `end`, `goal`)
VALUES
	('51a7d833ef05d','51a6f29fa6c82','2013-05-30 18:52:35','0000-00-00 00:00:00',1,'fewf eff wef','Sum up your party in 145 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51a7d726bd03e.jpg','fawefwef','awefaewf','2013-05-30 12:00:00','2013-05-30 12:00:00',234),
	('51a7d8e5d094f','51a6f29fa6c82','2013-05-30 18:55:33','0000-00-00 00:00:00',1,'awefewaf','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51a7d726bd03e.jpg','awefaewf','awefawef','2013-05-30 12:00:00','2013-05-30 12:00:00',52342),
	('51a7d9e524c6a','51a6f29fa6c82','2013-05-30 18:59:49','0000-00-00 00:00:00',1,'wfwefaw','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51a7d9268ba20.jpg','awefwef','awfwefwef','2013-05-30 12:00:00','2013-05-30 12:00:00',234324),
	('51a7db7042924','51a6f29fa6c82','2013-05-30 19:06:24','0000-00-00 00:00:00',1,'bhjkbhjb','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.) ','51a7db4178dea.jpg','ewfewafr','wefaewaf','2013-05-30 01:38:00','2013-05-30 01:45:00',123213),
	('51a7e0a4932b7','51a6f29fa6c82','2013-05-30 19:28:36','0000-00-00 00:00:00',1,'aberungkjreh','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51a7da4a48285.jpg','fawefwef','awfwef','2013-05-30 12:00:00','2013-05-30 12:00:00',1123),
	('51a7e807c3091','51a6f29fa6c82','2013-05-30 20:00:07','0000-00-00 00:00:00',1,'fawefew','awefwef','51a7e7ee743c4.jpg','fawef','aewfawef','2013-05-30 12:00:00','2013-05-30 12:00:00',24323),
	('51a7e869eb436','51a6f29fa6c82','2013-05-30 20:01:45','0000-00-00 00:00:00',1,'vzvrewf','vserverv','','fawefwae','fawefawe','2013-05-30 12:00:00','2013-05-30 12:00:00',324),
	('51a7eca3e9894','51a6f29fa6c82','2013-05-30 20:19:47','0000-00-00 00:00:00',1,'fawfew','fwaeawef','51a7ec7fef882.jpg','fawefawe','feafew','2013-05-31 01:51:00','2013-05-30 11:59:00',999),
	('51a8273e9d484','51a6f29fa6c82','2013-05-31 00:29:50','0000-00-00 00:00:00',1,'faweaf','fwefew','51a826219d54f.jpg','aewrfew','ewafawef','2013-05-31 12:00:00','2013-06-20 07:33:00',23),
	('51ab691b9a588','51a6f29fa6c82','2013-06-02 11:47:39','0000-00-00 00:00:00',1,'fawefwaef','fweffewf','51ab68fd96a94.png','fawefawef','wefawefew','2013-06-02 12:00:00','2013-06-02 12:00:00',234),
	('51adac40acfd3','51a6f29fa6c82','2013-06-04 04:58:40','0000-00-00 00:00:00',1,'wfaefwef','wefwea','51ada90a526d2.jpg','fweafawef','wefwaef','2013-06-04 12:00:00','2013-06-04 12:00:00',123),
	('51adbd2cb05f6','51a6f29fa6c82','2013-06-04 06:10:52','0000-00-00 00:00:00',1,'parrttyyy','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51adbb4517958.jpg','afwef','awfaewf','2013-06-04 12:00:00','2013-06-04 12:00:00',1234),
	('51adf2c108de1','51a6f29fa6c82','2013-06-04 09:59:29','0000-00-00 00:00:00',1,'fwefwef','wefewfwe','51adf2b0e4d3d.jpg','fwefwef','wefewf','2013-06-04 12:00:00','2013-06-04 12:00:00',111),
	('51adf8ea81d75','51a6f29fa6c82','2013-06-04 10:25:46','0000-00-00 00:00:00',1,'test test','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.) ','51adf8d86275a.jpg','awefawe','fawefwe','2013-06-04 12:00:00','2013-06-04 12:00:00',213),
	('51ae6567508db','51a6f29fa6c82','2013-06-04 18:08:39','0000-00-00 00:00:00',1,'FVSFG','WEFWEF','0','fwefwe','fwefcs','2013-06-04 12:00:00','2013-06-04 12:00:00',324),
	('51ae65ec5a377','51a6f29fa6c82','2013-06-04 18:10:52','0000-00-00 00:00:00',1,'hello','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.) ','51ae65d6ce457.jpg','Orlando, FL','23 wqd','2013-06-04 12:00:00','2013-06-04 12:00:00',231),
	('51af73005c6d2','51a6f29fa6c82','2013-06-05 13:18:56','0000-00-00 00:00:00',1,'fwefwef','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51af72f261a19.jpg','fwefe','ewfew','2013-06-05 12:00:00','2013-06-05 12:00:00',3123),
	('51af73026f20a','51a6f29fa6c82','2013-06-05 13:18:58','0000-00-00 00:00:00',1,'fwefwef','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51af72f261a19.jpg','fwefe','ewfew','2013-06-05 12:00:00','2013-06-05 12:00:00',3123),
	('51af78e263f5b','51a6f29fa6c82','2013-06-05 13:44:02','0000-00-00 00:00:00',1,'cdscas','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51af7335efaff.jpg','fwafew','qwfqwf','2013-06-05 12:00:00','2013-06-05 12:00:00',12313),
	('51b2527659227','51a6f29fa6c82','2013-06-07 17:36:54','0000-00-00 00:00:00',1,'jklnbhjknhbj','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51b25240e6a7f.jpg','hjkbhj','jhbhjkbkhj','2013-06-07 12:00:00','2013-06-07 07:32:00',8768),
	('51b386ca77930','51a6f29fa6c82','2013-06-08 15:32:26','0000-00-00 00:00:00',1,'fwefwe','wefewf','51b38065b197c.jpg','biblbiblbo','wfewfew','2013-06-08 12:00:00','2013-06-08 12:00:00',4324),
	('51b389ea4560a','51a6f29fa6c82','2013-06-08 15:45:46','0000-00-00 00:00:00',1,'fwefwe','dqwdqwd','51b389dab4187.jpg','xxxxx','dewqdqw','2013-06-08 12:00:00','2013-06-08 12:00:00',12312),
	('51b3a7a4c28e8','51b3a76252ab9','2013-06-08 17:52:36','0000-00-00 00:00:00',1,'yayaa','party','51b3a798ef70e.png','fawfewe','wefawef','2013-06-08 12:00:00','2013-06-08 12:00:00',123);

/*!40000 ALTER TABLE `partys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` varchar(32) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pword` varchar(32) DEFAULT NULL,
  `date_of_reg` date NOT NULL,
  `profile_img` varchar(32) DEFAULT NULL,
  `facebook_id` int(30) DEFAULT NULL,
  `user_ip` int(11) DEFAULT NULL,
  `bio` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `email`, `username`, `pword`, `date_of_reg`, `profile_img`, `facebook_id`, `user_ip`, `bio`, `location`, `timezone`)
VALUES
	('51a6f29fa6c82','kolby.sisk@gmail.com','Kolby223','4b18abc8189e9e20b7ce629ecbb1ba52','2013-05-30','51b3923da2209.png',NULL,0,'helllllzzz yyaaaa\n\n','Orlando, Fl','Central'),
	('51ad8c6b77abc','kolby2.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04','51b3995dbd004.jpg',NULL,0,'fwef\n','afwefefweq','Central'),
	('51ad911c2a6bd','kolby3.sisk@gmail.com','kolby3','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04',NULL,NULL,0,NULL,NULL,NULL),
	('51adb4bb24fb6','kolby4.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04','',NULL,0,'','',''),
	('51b0da52dc677','kolby9.sisk@gmail.com','kolby9','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-06',NULL,NULL,0,NULL,NULL,NULL),
	('51b39976ac3a4','kolby10.sisk@gmail.com','kolby10','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-08','51b399b6372fb.png',NULL,0,'hellooooo','Orlando, fl','Central'),
	('51b3a76252ab9','kolby11.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-08','51b3a7879f9ad.jpg',NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impressio','Orlando, Fl','Central');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
