# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: BeerBucks
# Generation Time: 2013-06-21 00:01:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table friends
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `friendship_id` varchar(32) NOT NULL DEFAULT '',
  `user1_id` varchar(32) DEFAULT NULL,
  `user2_id` varchar(32) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `date_of_req` date DEFAULT NULL,
  PRIMARY KEY (`friendship_id`),
  KEY `user1_id` (`user1_id`),
  KEY `user2_id` (`user2_id`),
  CONSTRAINT `user1_id` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `user2_id` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;

INSERT INTO `friends` (`friendship_id`, `user1_id`, `user2_id`, `active`, `date_of_req`)
VALUES
	('51c26dd1bacb0','51c14dda56f23','51a6f29fa6c82',1,'2013-06-20'),
	('51c27582ef6f9','51c14dda56f23','51c18a5e65394',1,'2013-06-20'),
	('51c29e0f97b62','51a6f29fa6c82','51c18a5e65394',1,'2013-06-20'),
	('51c2a6cd06301','51c2a5da66972','51c18a5e65394',1,'2013-06-20'),
	('51c2a85a94853','51c2a5da66972','51a6f29fa6c82',1,'2013-06-20'),
	('51c2a8778841e','51c2a86fdb7f5','51a6f29fa6c82',1,'2013-06-20'),
	('51c2a87d342a8','51c2a86fdb7f5','51c18a5e65394',1,'2013-06-20'),
	('51c2a89381ba3','51c2a88e99624','51c18a5e65394',2,'2013-06-20'),
	('51c2a8988f44a','51c2a88e99624','51a6f29fa6c82',2,'2013-06-20'),
	('51c2a9af1bdca','51c2a9a8aebc5','51a6f29fa6c82',1,'2013-06-20'),
	('51c2a9b50cfae','51c2a9a8aebc5','51c18a5e65394',2,'2013-06-20'),
	('51c2dd26a728e','51c2dd1768f27','51a6f29fa6c82',0,'2013-06-20'),
	('51c2dd2cb7cab','51c2dd1768f27','51ad8c6b77abc',0,'2013-06-20'),
	('51c2dd34b0b5a','51c2dd1768f27','51c14dda56f23',1,'2013-06-20'),
	('51c2de57e7996','51c14dda56f23','51ad8c6b77abc',0,'2013-06-20'),
	('51c2e9c8c02e1','51c14dda56f23','51c2dd1768f27',0,'2013-06-20'),
	('51c2ed6c81960','51c18a5e65394','51a6f29fa6c82',0,'2013-06-20'),
	('51c2efe32d761','51c18a5e65394','51c2dd1768f27',0,'2013-06-20');

/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table parties
# ------------------------------------------------------------

DROP TABLE IF EXISTS `parties`;

CREATE TABLE `parties` (
  `party_id` varchar(13) NOT NULL DEFAULT '',
  `user_id` varchar(32) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_edited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tos` int(1) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `description` varchar(245) DEFAULT NULL,
  `party_img` varchar(32) DEFAULT NULL,
  `party_location` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `goal` decimal(10,0) DEFAULT NULL,
  `attending` int(11) DEFAULT NULL,
  PRIMARY KEY (`party_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `party_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `parties` WRITE;
/*!40000 ALTER TABLE `parties` DISABLE KEYS */;

INSERT INTO `parties` (`party_id`, `user_id`, `date_created`, `date_edited`, `tos`, `title`, `description`, `party_img`, `party_location`, `address`, `start`, `end`, `goal`, `attending`)
VALUES
	('51a7d833ef05d','51a6f29fa6c82','2013-06-17 19:32:00','0000-00-00 00:00:00',1,'Jazy Jeff\'s Jazzy Party','Jazzy Jeff\'s throwing a huge jazzy jaz party for all his jazzy jaz fans. If you\'re a jaz fan and want to jaz out with Jazzy Jeff donate now!','51a7d726bd03e.jpg','Orlando, FL','123 red rock rd.','2013-05-30 12:00:00','2013-05-30 12:00:00',234,0),
	('51a7d8e5d094f','51a6f29fa6c82','2013-06-12 00:28:18','0000-00-00 00:00:00',1,'awefewaf','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51a7d726bd03e.jpg','awefaewf','awefawef','2013-05-30 12:00:00','2013-05-30 12:00:00',52342,0),
	('51a7d9e524c6a','51a6f29fa6c82','2013-06-12 00:28:20','0000-00-00 00:00:00',1,'wfwefaw','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51a7d9268ba20.jpg','awefwef','awfwefwef','2013-05-30 12:00:00','2013-05-30 12:00:00',234324,0),
	('51a7db7042924','51a6f29fa6c82','2013-06-12 00:28:21','0000-00-00 00:00:00',1,'bhjkbhjb','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.) ','51a7db4178dea.jpg','ewfewafr','wefaewaf','2013-05-30 01:38:00','2013-05-30 01:45:00',123213,0),
	('51a7e0a4932b7','51a6f29fa6c82','2013-06-12 00:28:22','0000-00-00 00:00:00',1,'aberungkjreh','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51a7da4a48285.jpg','fawefwef','awfwef','2013-05-30 12:00:00','2013-05-30 12:00:00',1123,0),
	('51a7e807c3091','51a6f29fa6c82','2013-06-12 00:28:23','0000-00-00 00:00:00',1,'fawefew','awefwef','51a7e7ee743c4.jpg','fawef','aewfawef','2013-05-30 12:00:00','2013-05-30 12:00:00',24323,0),
	('51a7eca3e9894','51a6f29fa6c82','2013-06-12 00:28:23','0000-00-00 00:00:00',1,'fawfew','fwaeawef','51a7ec7fef882.jpg','fawefawe','feafew','2013-05-31 01:51:00','2013-05-30 11:59:00',999,0),
	('51a8273e9d484','51a6f29fa6c82','2013-06-12 00:28:24','0000-00-00 00:00:00',1,'faweaf','fwefew','51a826219d54f.jpg','aewrfew','ewafawef','2013-05-31 12:00:00','2013-06-20 07:33:00',23,0),
	('51adac40acfd3','51a6f29fa6c82','2013-06-12 00:28:26','0000-00-00 00:00:00',1,'wfaefwef','wefwea','51ada90a526d2.jpg','fweafawef','wefwaef','2013-06-04 12:00:00','2013-06-04 12:00:00',123,0),
	('51adbd2cb05f6','51a6f29fa6c82','2013-06-12 00:28:27','0000-00-00 00:00:00',1,'parrttyyy','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51adbb4517958.jpg','afwef','awfaewf','2013-06-04 12:00:00','2013-06-04 12:00:00',1234,5),
	('51adf2c108de1','51a6f29fa6c82','2013-06-12 00:28:28','0000-00-00 00:00:00',1,'fwefwef','wefewfwe','51adf2b0e4d3d.jpg','fwefwef','wefewf','2013-06-04 12:00:00','2013-06-04 12:00:00',111,2),
	('51adf8ea81d75','51a6f29fa6c82','2013-06-12 00:28:31','0000-00-00 00:00:00',1,'test test','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.) ','51adf8d86275a.jpg','awefawe','fawefwe','2013-06-04 12:00:00','2013-06-04 12:00:00',213,12),
	('51ae65ec5a377','51a6f29fa6c82','2013-06-12 00:28:34','0000-00-00 00:00:00',1,'hello','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.) ','51ae65d6ce457.jpg','Orlando, FL','23 wqd','2013-06-04 12:00:00','2013-06-04 12:00:00',231,0),
	('51af73005c6d2','51a6f29fa6c82','2013-06-12 00:28:34','0000-00-00 00:00:00',1,'fwefwef','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51af72f261a19.jpg','fwefe','ewfew','2013-06-05 12:00:00','2013-06-05 12:00:00',3123,0),
	('51af73026f20a','51a6f29fa6c82','2013-06-12 00:28:35','0000-00-00 00:00:00',1,'fwefwef','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51af72f261a19.jpg','fwefe','ewfew','2013-06-05 12:00:00','2013-06-05 12:00:00',3123,0),
	('51af78e263f5b','51a6f29fa6c82','2013-06-12 00:28:36','0000-00-00 00:00:00',1,'cdscas','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51af7335efaff.jpg','fwafew','qwfqwf','2013-06-05 12:00:00','2013-06-05 12:00:00',12313,0),
	('51b2527659227','51a6f29fa6c82','2013-06-12 00:28:37','0000-00-00 00:00:00',1,'jklnbhjknhbj','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51b25240e6a7f.jpg','hjkbhj','jhbhjkbkhj','2013-06-07 12:00:00','2013-06-07 07:32:00',8768,0),
	('51bf8918f212a','51a6f29fa6c82','2013-06-17 18:09:28','0000-00-00 00:00:00',1,'Parttyyy','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51bf88f3df396.jpg','Orlando, Fl','12321edewfdwe','2013-06-17 12:00:00','2013-06-17 08:26:00',324,0),
	('51bfe67232c53','51a6f29fa6c82','2013-06-18 00:47:46','0000-00-00 00:00:00',1,'efwfewf','wefewfwe','51bfe6348c551.jpg','Orlando, Fl','123213 ','2013-06-18 12:00:00','2013-06-18 12:00:00',3213,0),
	('51c006c814208','51a6f29fa6c82','2013-06-18 03:05:44','0000-00-00 00:00:00',1,'Yoooo','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51c002a193312.jpg','Orlando, FL','fawefwe','2013-06-18 12:00:00','2013-06-18 12:00:00',123,0),
	('51c228fc5cbd1','51c18a5e65394','2013-06-19 17:56:12','0000-00-00 00:00:00',1,'Party title','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51c228c011ed2.jpg','Orlando, Fl','123 Orlando','2013-06-19 10:00:00','2013-06-20 12:00:00',123,0),
	('51c22b5debf6d','51c18a5e65394','2013-06-19 18:06:21','0000-00-00 00:00:00',1,'Partty','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51c22b21383fe.jpg','Orlando, FL','23dsaf','2013-06-19 03:46:00','2013-06-19 12:00:00',23421,0);

/*!40000 ALTER TABLE `parties` ENABLE KEYS */;
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
  `bio` varchar(145) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `timezone` decimal(5,0) DEFAULT NULL,
  `feedback` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL,
  `contributions` int(11) DEFAULT NULL,
  `parties` int(11) DEFAULT NULL,
  `twitter_id` int(30) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `email`, `username`, `pword`, `date_of_reg`, `profile_img`, `facebook_id`, `user_ip`, `bio`, `location`, `timezone`, `feedback`, `views`, `comments`, `contributions`, `parties`, `twitter_id`)
VALUES
	('51a6f29fa6c82','kolby123@kolby.com','Kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-05-30','51bc0a374efbc.jpg',NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','Orlando, Fl',0,2,5,12,1,9,NULL),
	('51ad8c6b77abc','kolby2.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04','51b3995dbd004.jpg',NULL,0,'fwef\n','afwefefweq',0,0,0,0,0,0,NULL),
	('51ad911c2a6bd','kolby3.sisk@gmail.com','kolby3','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04',NULL,NULL,0,NULL,NULL,-100,0,0,0,0,0,NULL),
	('51adb4bb24fb6','kolby4.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04','51bc1252be283.jpg',NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','',-400,0,0,0,0,0,NULL),
	('51c14dda56f23','kolby.sisk@gmail.com','kolby.sisk',NULL,'2013-06-19','51c14e079be18.png',1028820601,0,'','Orlando, Flor',-20,0,0,0,0,0,NULL),
	('51c18a5e65394',NULL,'KolbySisk',NULL,'2013-06-19','51c190aba1b98.jpg',NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','Orlando, FL',0,0,0,0,0,0,708143798),
	('51c2a5da66972','kolbya.sisk@gmail.com','kolbya','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20',NULL,NULL,0,NULL,NULL,0,0,0,0,0,0,NULL),
	('51c2a86fdb7f5','kolbyb.sisk@gmail.com','kolbyb','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20',NULL,NULL,0,NULL,NULL,0,0,0,0,0,0,NULL),
	('51c2a88e99624','kolbyc.sisk@gmail.com','kolbyc','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20',NULL,NULL,0,NULL,NULL,0,0,0,0,0,0,NULL),
	('51c2a9a8aebc5','kolbyd.sisk@gmail.com','kolbyd','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20',NULL,NULL,0,NULL,NULL,0,0,0,0,0,0,NULL),
	('51c2b8246a788','kolbye.sisk@gmail.com','kolbye','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL),
	('51c2dd1768f27',NULL,'thebeerbucks',NULL,'2013-06-20',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,1444671476);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
