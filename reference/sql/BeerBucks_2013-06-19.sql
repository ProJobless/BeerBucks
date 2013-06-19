# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: BeerBucks
# Generation Time: 2013-06-19 09:00:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
	('51c00fe3d5319','51a6f29fa6c82','2013-06-18 03:44:35','0000-00-00 00:00:00',1,'Party maine','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51c007a279b0a.jpg','Orlando, FL','123 Orlando','2013-06-18 12:00:00','2013-06-18 12:00:00',123,0),
	('51c0171cf02fb','51c0101d648cb','2013-06-18 04:15:24','0000-00-00 00:00:00',1,'fawef','wefwaef','51c014dceb9c0.jpg','fwefweaf','wefawef','2013-06-18 12:00:00','2013-06-18 12:00:00',213,0),
	('51c0192b05edc','51a6f29fa6c82','2013-06-18 04:24:11','0000-00-00 00:00:00',1,'','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0),
	('51c026110899e','51a6f29fa6c82','2013-06-18 05:19:13','0000-00-00 00:00:00',1,'wfefd','wefewf','51c0257e80eb7.png','fwefwef','fweewf','2013-06-18 12:00:00','2013-06-18 12:00:00',34,0),
	('51c028c78bd7d','51a6f29fa6c82','2013-06-18 05:30:47','0000-00-00 00:00:00',1,'fweffew','fwefwefwe','51c028a2f3466.png','wefwef','ewfew','2013-06-18 12:00:00','2013-06-18 12:00:00',12341,0),
	('51c029bfbe586','51a6f29fa6c82','2013-06-18 05:34:55','0000-00-00 00:00:00',1,'ewfefwe','wfefwefwe','51c029b54129d.png','efwef','wefwe','2013-06-18 12:00:00','2013-06-18 12:00:00',213,0),
	('51c02ae7cbb0e','51a6f29fa6c82','2013-06-18 05:39:51','0000-00-00 00:00:00',1,'fwefwef','fwefwfe','51c02adc80baa.png','awfef','waefwaef','2013-06-18 12:00:00','2013-06-18 12:00:00',123,0),
	('51c02b3362de2','51a6f29fa6c82','2013-06-18 05:41:07','0000-00-00 00:00:00',1,'Parttyyy!','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51c02b1f766d9.jpg','New York, NY','123 ny drive','2013-06-18 12:00:00','2013-06-18 12:00:00',234,0),
	('51c02d726d55b','51a6f29fa6c82','2013-06-18 05:50:42','0000-00-00 00:00:00',1,'wefewf','wefwefwe','51c02b81373db.jpg','wqdwq','wdqwdqw','2013-06-18 12:00:00','2013-06-18 12:00:00',123,0),
	('51c032630a0f0','51a6f29fa6c82','2013-06-18 06:11:47','0000-00-00 00:00:00',1,'fewfe','fwefwef','51c03246def75.jpg','fdvfvdf','cewvewre','2013-06-18 12:00:00','2013-06-18 12:00:00',3423,0),
	('51c0337a2a8c1','51a6f29fa6c82','2013-06-18 06:16:26','0000-00-00 00:00:00',1,'fwefwf','fwefwef','51c0336f19c53.jpg','fwefewf','fewfwef','2013-06-18 12:00:00','2013-06-18 12:00:00',3123,0),
	('51c033f1e7f28','51a6f29fa6c82','2013-06-18 06:18:25','0000-00-00 00:00:00',1,'fwefa','fwefwef','51c033e4b90a4.jpg','fwefwef','23ewfewf','2013-06-18 12:00:00','2013-06-18 12:00:00',12312,0),
	('51c03411becbf','51a6f29fa6c82','2013-06-18 06:18:57','0000-00-00 00:00:00',1,'fwefwef','wefwef','51c034095bd15.jpg','wefwef','wefewfwe','2013-06-18 12:00:00','2013-06-18 12:00:00',234,0),
	('51c03444dc1c6','51a6f29fa6c82','2013-06-18 06:19:48','0000-00-00 00:00:00',1,'ewfewewf','fwefwef','51c0343b599c9.jpg','wfewf','wefwefw','2013-06-18 12:00:00','2013-06-18 12:00:00',123,0),
	('51c036d415f17','51a6f29fa6c82','2013-06-18 06:30:44','0000-00-00 00:00:00',1,'fweff','wefewfwefe','51c036c6e147c.jpg','fefee','wefwef','2013-06-18 12:00:00','2013-06-18 12:00:00',324,0),
	('51c03a9f4da19','51a6f29fa6c82','2013-06-18 06:46:55','0000-00-00 00:00:00',1,'fweff','wefewfwefe','51c0397107ffe.jpg','vdsvdsv','vdsdsvdsvsd','2013-06-18 12:00:00','2013-06-18 12:00:00',324,0);

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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `email`, `username`, `pword`, `date_of_reg`, `profile_img`, `facebook_id`, `user_ip`, `bio`, `location`, `timezone`, `feedback`, `views`, `comments`, `contributions`, `parties`)
VALUES
	('51a6f29fa6c82','','Kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-05-30','51bc0a374efbc.jpg',NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','Orlando, Fl',0,0,0,0,0,0),
	('51ad8c6b77abc','kolby2.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04','51b3995dbd004.jpg',NULL,0,'fwef\n','afwefefweq',0,NULL,NULL,NULL,NULL,NULL),
	('51ad911c2a6bd','kolby3.sisk@gmail.com','kolby3','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04',NULL,NULL,0,NULL,NULL,-100,NULL,NULL,NULL,NULL,NULL),
	('51adb4bb24fb6','kolby4.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04','51bc1252be283.jpg',NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','',-400,NULL,NULL,NULL,NULL,NULL),
	('51b0da52dc677','kolby9.sisk@gmail.com','kolby9','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-06',NULL,NULL,0,NULL,NULL,400,NULL,NULL,NULL,NULL,NULL),
	('51b39976ac3a4','kolby10.sisk@gmail.com','kolby10','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-08','51b399b6372fb.png',NULL,0,'hellooooo','Orlando, fl',0,NULL,NULL,NULL,NULL,NULL),
	('51b3a76252ab9','kolby11.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-08','51b3a7879f9ad.jpg',NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impressio','Orlando, Fl',0,NULL,NULL,NULL,NULL,NULL),
	('51bc12a09827f','kolby123@gmail.com','kolby123','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-15','',NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','',0,NULL,NULL,NULL,NULL,NULL),
	('51c0101d648cb','kolby1234@gmial.com','kolby1234','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-18',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('51c14dda56f23','kolby.sisk@gmail.com','kolby.siskfewf',NULL,'2013-06-19','51c14e079be18.png',1028820601,0,'','Orlando, Flor',-20,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
