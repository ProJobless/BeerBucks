# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: BeerBucks
# Generation Time: 2013-07-21 02:12:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;

CREATE TABLE `activity` (
  `activity_id` varchar(13) NOT NULL DEFAULT '',
  `user_id` varchar(13) NOT NULL DEFAULT '',
  `friendship_id` varchar(13) NOT NULL DEFAULT '',
  `party_id` varchar(13) NOT NULL DEFAULT '',
  `seen` int(1) DEFAULT '0',
  `date_created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `public` int(1) DEFAULT '0',
  PRIMARY KEY (`activity_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;

INSERT INTO `activity` (`activity_id`, `user_id`, `friendship_id`, `party_id`, `seen`, `date_created`, `public`)
VALUES
	('51e23c9bb3341','51c18a5e65394','51e23c921c65a','0',0,'2013-07-14 07:52:27',1),
	('51e23c9bb334b','51e22cbe6ad98','51e23c921c65a','0',0,'2013-07-14 07:52:27',1),
	('51e23eff47894','51c18a5e65394','0','51e23eff3e259',0,'2013-07-14 08:02:39',1),
	('51e23f61e0bec','51c18a5e65394','0','51e23f61d6535',0,'2013-07-14 08:04:17',1),
	('51e240172b8c6','51c18a5e65394','0','51e240172a22d',0,'2013-07-14 08:07:19',1),
	('51e2482d5204c','51c18a5e65394','0','51e2482d4799e',0,'2013-07-14 08:41:49',1),
	('51e24b5261c3d','51c18a5e65394','51e24b4ab3115','0',0,'2013-07-14 08:55:14',1),
	('51e24b5261c46','51e24b2914830','51e24b4ab3115','0',0,'2013-07-14 08:55:14',1),
	('51e24b85be4aa','51c18a5e65394','0','51e24b85b7c4d',0,'2013-07-14 08:56:05',1),
	('51e24bdd9cddb','51c18a5e65394','0','51e24bdd8c2d8',0,'2013-07-14 08:57:33',1),
	('51e24bf9d7353','51c18a5e65394','0','51e24bf9bd51d',0,'2013-07-14 08:58:01',1),
	('51e24c17d910f','51c18a5e65394','0','51e24c17cccc0',0,'2013-07-14 08:58:31',1),
	('51e24c5c9bc4f','51c18a5e65394','0','51e24c5c9a7e3',0,'2013-07-14 08:59:40',1),
	('51e2611fc8477','51c18a5e65394','51e260ba89357','0',0,'2013-07-14 10:28:15',1),
	('51e2611fc848b','51e25fbbe939f','51e260ba89357','0',0,'2013-07-14 10:28:15',1),
	('51e26122cc8fd','51c18a5e65394','51e260d2d918b','0',0,'2013-07-14 10:28:18',1),
	('51e26122cc905','51e260c91fc4e','51e260d2d918b','0',0,'2013-07-14 10:28:18',1),
	('51e261254f45d','51c18a5e65394','51e260eb2dbc1','0',0,'2013-07-14 10:28:21',1),
	('51e261254f465','51e260e1b6130','51e260eb2dbc1','0',0,'2013-07-14 10:28:21',1),
	('51e2612a8525c','51c18a5e65394','51e261195b31f','0',0,'2013-07-14 10:28:26',1),
	('51e2612a8526c','51e26113cb346','51e261195b31f','0',0,'2013-07-14 10:28:26',1),
	('51e2615c666a7','51c18a5e65394','51e261538845d','0',0,'2013-07-14 10:29:16',1),
	('51e2615c666b6','51e26147efeac','51e261538845d','0',0,'2013-07-14 10:29:16',1),
	('51e278f08e1fc','51e2619ba037f','51e278e31e7c8','0',0,'2013-07-14 12:09:52',1),
	('51e278f08e21d','51c18a5e65394','51e278e31e7c8','0',0,'2013-07-14 12:09:52',1),
	('51e27da08abcd','51c18a5e65394','0','51e27da082570',0,'2013-07-14 12:29:52',1),
	('51e4ac87ebda9','51c18a5e65394','0','51e4ac87d8f31',0,'2013-07-16 04:14:31',1),
	('51e4ae35c06e1','51c18a5e65394','0','51e4ae35b3f76',0,'2013-07-16 04:21:41',1),
	('51e4ae754a7b4','51c18a5e65394','0','51e4ae753f372',0,'2013-07-16 04:22:45',1),
	('51e4b1efe06ba','51c18a5e65394','0','51e4b1efd36c2',0,'2013-07-16 04:37:35',1),
	('51e4ca575a921','51c18a5e65394','0','51e4ca57591ec',0,'2013-07-16 06:21:43',1),
	('51e4ca85ada7f','51c18a5e65394','0','51e4ca85ac3d5',0,'2013-07-16 06:22:29',1),
	('51e4cade9abdc','51c18a5e65394','0','51e4cade991d3',0,'2013-07-16 06:23:58',1),
	('51e4ccc12b01d','51c18a5e65394','0','51e4ccc11d5b9',0,'2013-07-16 06:32:01',1),
	('51e4e06b047cf','51c18a5e65394','0','51e4e06b02cca',0,'2013-07-16 07:55:55',1),
	('51e4fb28bd984','51c18a5e65394','0','51e4fb28b014e',0,'2013-07-16 09:50:00',1),
	('51e4fb49ce1a3','51c18a5e65394','0','51e4fb49c024a',0,'2013-07-16 09:50:33',1),
	('51e4fb61ab6b2','51c18a5e65394','0','51e4fb61a9f44',0,'2013-07-16 09:50:57',1),
	('51e5c43d1cee5','51c18a5e65394','0','51e5c43d129ce',0,'2013-07-17 00:07:57',1),
	('51e5c46b9e345','51c18a5e65394','0','51e5c46b91b58',0,'2013-07-17 00:08:43',1),
	('51e762163e57e','51c18a5e65394','0','51e762162825f',0,'2013-07-18 05:33:42',1),
	('51e76bb507da8','51c18a5e65394','0','51e76bb4e8e8f',0,'2013-07-18 06:14:44',1),
	('51e76bf976e65','51c18a5e65394','0','51e76bf969860',0,'2013-07-18 06:15:53',1),
	('51e76d73247d8','51c18a5e65394','0','51e76d730453d',0,'2013-07-18 06:22:11',1),
	('51e76d9b8ab95','51c18a5e65394','0','51e76d9b7176d',0,'2013-07-18 06:22:51',1),
	('51e76ded0c830','51c18a5e65394','0','51e76decf0eed',0,'2013-07-18 06:24:12',1),
	('51e76e15af53b','51c18a5e65394','0','51e76e1597743',0,'2013-07-18 06:24:53',1),
	('51e76e3846470','51c18a5e65394','0','51e76e3838a46',0,'2013-07-18 06:25:28',1),
	('51e76e5300f61','51c18a5e65394','0','51e76e52f0866',0,'2013-07-18 06:25:54',1),
	('51e76e6aae548','51c18a5e65394','0','51e76e6aa1ec2',0,'2013-07-18 06:26:18',1),
	('51e76e8d4dc6d','51c18a5e65394','0','51e76e8d40594',0,'2013-07-18 06:26:53',1),
	('51e76eb719a3a','51c18a5e65394','0','51e76eb702ce8',0,'2013-07-18 06:27:35',1),
	('51e76ee220602','51c18a5e65394','0','51e76ee20b8c1',0,'2013-07-18 06:28:18',1),
	('51e770e08eab2','51c18a5e65394','0','51e770e07e8cb',0,'2013-07-18 06:36:48',1),
	('51e7710e72079','51c18a5e65394','0','51e7710e661d8',0,'2013-07-18 06:37:34',1),
	('51e7974fb5b8c','51c18a5e65394','0','51e7974fa78d5',0,'2013-07-18 09:20:47',1),
	('51e7975d017b1','51c18a5e65394','0','51e7975cdcf6d',0,'2013-07-18 09:21:00',1),
	('51e7979ee11d2','51c18a5e65394','0','51e7979ece9ba',0,'2013-07-18 09:22:06',1),
	('51e798496742d','51c18a5e65394','0','51e798495f4d6',0,'2013-07-18 09:24:57',1),
	('51e7985defad5','51c18a5e65394','0','51e7985ddf29c',0,'2013-07-18 09:25:17',1),
	('51e7986ff2214','51c18a5e65394','0','51e7986fe4ee4',0,'2013-07-18 09:25:35',1),
	('51e79a58009a4','51c18a5e65394','0','51e79a57e7f10',0,'2013-07-18 09:33:43',1),
	('51e79a68aeff3','51c18a5e65394','0','51e79a68a0ab0',0,'2013-07-18 09:34:00',1),
	('51e79a9385285','51c18a5e65394','0','51e79a937ac98',0,'2013-07-18 09:34:43',1),
	('51e7b6b0ecac6','51c18a5e65394','0','51e7b6b0e76db',0,'2013-07-18 11:34:40',1),
	('51e7ee84d69bd','51e7eaf57f2a2','0','51e7ee84aca6c',0,'2013-07-18 15:32:52',1),
	('51e7ef45f05d1','51c18a5e65394','51e7eefd0f967','0',0,'2013-07-18 15:36:05',1),
	('51e7ef45f05da','51e7eaf57f2a2','51e7eefd0f967','0',0,'2013-07-18 15:36:05',1),
	('51e8e9eeb34b8','51c18a5e65394','0','51e8e9ee73904',0,'2013-07-19 09:25:34',1),
	('51e9b28b20c8a','51c18a5e65394','0','51e9b28b17ff6',0,'2013-07-19 23:41:31',1);

/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table badges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `badges`;

CREATE TABLE `badges` (
  `badge_id` varchar(13) NOT NULL DEFAULT '',
  `badge_name` varchar(100) DEFAULT NULL,
  `badge_img` varchar(100) DEFAULT NULL,
  `how_to_receive` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`badge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `badges` WRITE;
/*!40000 ALTER TABLE `badges` DISABLE KEYS */;

INSERT INTO `badges` (`badge_id`, `badge_name`, `badge_img`, `how_to_receive`)
VALUES
	('51e79393a9941','Party Starter','badge-party_starter.png','Host your first party');

/*!40000 ALTER TABLE `badges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table friends
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `friendship_id` varchar(13) NOT NULL DEFAULT '',
  `user1_id` varchar(13) DEFAULT NULL,
  `user2_id` varchar(13) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `date_of_req` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `date_of_accept` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`friendship_id`),
  KEY `user1_id` (`user1_id`),
  KEY `user2_id` (`user2_id`),
  CONSTRAINT `user1_id` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `user2_id` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;

INSERT INTO `friends` (`friendship_id`, `user1_id`, `user2_id`, `active`, `date_of_req`, `date_of_accept`)
VALUES
	('51e23c921c65a','51e22cbe6ad98','51c18a5e65394',1,'2013-07-14 07:52:18','2013-07-14 07:52:27'),
	('51e24b4ab3115','51e24b2914830','51c18a5e65394',1,'2013-07-14 08:55:06','2013-07-14 08:55:14'),
	('51e260ba89357','51e25fbbe939f','51c18a5e65394',1,'2013-07-14 10:26:34','2013-07-14 10:28:15'),
	('51e260d2d918b','51e260c91fc4e','51c18a5e65394',1,'2013-07-14 10:26:58','2013-07-14 10:28:18'),
	('51e260eb2dbc1','51e260e1b6130','51c18a5e65394',1,'2013-07-14 10:27:23','2013-07-14 10:28:21'),
	('51e260fd73992','51e260f9b234f','51c18a5e65394',2,'2013-07-14 10:27:41','0000-00-00 00:00:00'),
	('51e261195b31f','51e26113cb346','51c18a5e65394',1,'2013-07-14 10:28:09','2013-07-14 10:28:26'),
	('51e261538845d','51e26147efeac','51c18a5e65394',1,'2013-07-14 10:29:07','2013-07-14 10:29:16'),
	('51e278e31e7c8','51c18a5e65394','51e2619ba037f',1,'2013-07-14 12:09:39','2013-07-14 12:09:52'),
	('51e28be3d95cb','51c18a5e65394','51a6f29fa6c82',0,'2013-07-14 01:30:43','0000-00-00 00:00:00'),
	('51e7eefd0f967','51e7eaf57f2a2','51c18a5e65394',1,'2013-07-18 15:34:53','2013-07-18 15:36:05');

/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table parties
# ------------------------------------------------------------

DROP TABLE IF EXISTS `parties`;

CREATE TABLE `parties` (
  `party_id` varchar(13) NOT NULL DEFAULT '',
  `user_id` varchar(13) NOT NULL DEFAULT '',
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tos` int(1) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `party_img` varchar(32) DEFAULT NULL,
  `party_location` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `goal` decimal(10,0) DEFAULT NULL,
  `attending` int(11) DEFAULT NULL,
  `expired` int(1) DEFAULT NULL,
  `party_timezone` decimal(5,0) DEFAULT NULL,
  `party_lat` float DEFAULT NULL,
  `party_lng` float DEFAULT NULL,
  PRIMARY KEY (`party_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `party_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `parties` WRITE;
/*!40000 ALTER TABLE `parties` DISABLE KEYS */;

INSERT INTO `parties` (`party_id`, `user_id`, `date_created`, `date_edited`, `tos`, `title`, `description`, `party_img`, `party_location`, `address`, `start`, `end`, `goal`, `attending`, `expired`, `party_timezone`, `party_lat`, `party_lng`)
VALUES
	('51e76d730453d','51c18a5e65394','2013-07-18 06:22:11','0000-00-00 00:00:00',1,'testtt','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76d5ae1fb3.jpg','Orlando, Florida','1231 rwefgrwg','2013-05-20 06:00:00','2013-05-21 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e76d9b7176d','51c18a5e65394','2013-07-18 06:22:51','0000-00-00 00:00:00',1,'wefwf','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76d8804589.jpg','Winter Park, Florida','fewfwef','2013-05-24 06:00:00','2013-05-25 06:00:00',123,0,1,-6,28.6,-81.3392),
	('51e76decf0eed','51c18a5e65394','2013-07-18 06:24:12','0000-00-00 00:00:00',1,'Choose a catchy title for your party. Th','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76db2641ed.jpg','Orlando, Florida','123 werfewf','2013-07-19 06:00:00','2013-07-20 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e76e1597743','51c18a5e65394','2013-07-18 06:24:53','0000-00-00 00:00:00',1,'Choose a catchy title for your party.','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e0336a0a.jpg','Orlando, Florida','123 wefwef','2013-07-21 06:00:00','2013-07-22 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51e76e3838a46','51c18a5e65394','2013-07-18 06:25:28','0000-00-00 00:00:00',1,'wfewfew','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e26aa72f.jpg','Orlando, Florida','123wef','2013-07-22 06:00:00','2013-07-23 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51e76e52f0866','51c18a5e65394','2013-07-18 06:25:54','0000-00-00 00:00:00',1,'wegrewgre','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e4429c77.jpg','Orlando, Florida','23rfwwef','2013-07-28 06:00:00','2013-07-29 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51e76e6aa1ec2','51c18a5e65394','2013-07-18 06:26:18','0000-00-00 00:00:00',1,'rewgwgf','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e5c7c3de.jpg','Orland, California','123wefw','2013-07-30 06:00:00','2013-07-31 06:00:00',123,0,0,-6,39.7474,-122.196),
	('51e76e8d40594','51c18a5e65394','2013-07-18 06:26:53','0000-00-00 00:00:00',1,'wefewsdv','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e7cac615.jpg','Orlando, Florida','wefwefewf','2013-07-23 06:00:00','2013-07-24 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51e76eb702ce8','51c18a5e65394','2013-07-18 06:27:35','0000-00-00 00:00:00',1,'fwefewf','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76ea62929b.jpg','Orlando, Florida','fefewf','2013-07-19 06:00:00','2013-07-20 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e76ee20b8c1','51c18a5e65394','2013-07-18 06:28:18','0000-00-00 00:00:00',1,'fwefewf','efwefwef','51e76ecfa6c3a.jpg','Orlando, Florida','23rweffe','2013-07-25 06:00:00','2013-07-26 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51e770e07e8cb','51c18a5e65394','2013-07-18 06:36:48','0000-00-00 00:00:00',1,'regerg','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e770ce8bec6.jpg','Orlando, Florida','234324rgregre','2013-07-24 06:00:00','2013-07-25 06:00:00',213,0,0,-6,28.5383,-81.3792),
	('51e7710e661d8','51c18a5e65394','2013-07-18 06:37:34','0000-00-00 00:00:00',1,'fewfwef','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e770fc3b20d.jpg','Orlando, Florida','ewfwef','2013-07-19 06:00:00','2013-07-20 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e79a57e7f10','51c18a5e65394','2013-07-18 09:33:43','0000-00-00 00:00:00',1,'wfwerfew','wefewfw','51e79a4a99b43.jpg','Orlando, Florida','fewfew','2013-07-22 06:00:00','2013-07-23 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51e79a68a0ab0','51c18a5e65394','2013-07-18 09:34:00','0000-00-00 00:00:00',1,'wfwerfew','wefewfw','51e79a4a99b43.jpg','Orlando, Florida','fewfew','2013-07-22 06:00:00','2013-07-23 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51e79a937ac98','51c18a5e65394','2013-07-18 09:34:43','0000-00-00 00:00:00',1,'fwefewf','wefwefwef','51e79a839a077.jpg','Winter Park, Florida','wefwefwe','2013-07-29 06:00:00','2013-07-30 06:00:00',123123,0,0,-6,28.6,-81.3392),
	('51e7b6b0e76db','51c18a5e65394','2013-07-18 11:34:40','0000-00-00 00:00:00',1,'wfwefew','wefwefwefew','51e7b6a00e822.jpg','Orlando, Florida','123fewefw','2013-07-19 06:00:00','2013-07-20 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e7ee84aca6c','51e7eaf57f2a2','2013-07-18 15:32:52','0000-00-00 00:00:00',1,'werfewf','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e7ee6e7beca.jpg','Orlando, Florida','23rsdf','2013-07-19 06:00:00','2013-07-20 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e8e9ee73904','51c18a5e65394','2013-07-19 09:25:34','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e8e8d079ac3.jpg','Orlando, Florida','123ewfewf','2013-07-28 06:00:00','2013-07-30 06:00:00',1243,0,0,-6,28.5383,-81.3792),
	('51e9b28b17ff6','51c18a5e65394','2013-07-19 23:41:31','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e9b2234e3bf.jpg','Orlando, Florida','erregre','2013-07-20 11:17:00','2013-07-21 06:00:00',123,0,0,-6,28.5383,-81.3792);

/*!40000 ALTER TABLE `parties` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table party_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `party_comments`;

CREATE TABLE `party_comments` (
  `party_comment_id` varchar(13) NOT NULL DEFAULT '',
  `party_id` varchar(13) DEFAULT NULL,
  `poster_id` varchar(13) DEFAULT NULL,
  `party_comment` varchar(400) DEFAULT '',
  `comment_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`party_comment_id`),
  KEY `party_id` (`party_id`),
  KEY `poster_id` (`poster_id`),
  CONSTRAINT `party_comments_ibfk_1` FOREIGN KEY (`party_id`) REFERENCES `parties` (`party_id`),
  CONSTRAINT `party_comments_ibfk_2` FOREIGN KEY (`poster_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `party_comments` WRITE;
/*!40000 ALTER TABLE `party_comments` DISABLE KEYS */;

INSERT INTO `party_comments` (`party_comment_id`, `party_id`, `poster_id`, `party_comment`, `comment_date`)
VALUES
	('51e770edba01e','51e770e07e8cb','51c18a5e65394','hello','2013-07-18 06:37:01'),
	('51e7ee97797b2','51e7ee84aca6c','51e7eaf57f2a2','fewewfwef','2013-07-18 15:33:11');

/*!40000 ALTER TABLE `party_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table party_updates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `party_updates`;

CREATE TABLE `party_updates` (
  `update_id` varchar(13) NOT NULL DEFAULT '',
  `party_id` varchar(13) NOT NULL,
  `update_title` varchar(25) DEFAULT NULL,
  `update` varchar(1000) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`update_id`),
  KEY `user_id` (`party_id`),
  CONSTRAINT `update_ibfk_1` FOREIGN KEY (`party_id`) REFERENCES `parties` (`party_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table reports
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reports`;

CREATE TABLE `reports` (
  `report_id` varchar(13) NOT NULL DEFAULT '',
  `reporter_id` varchar(13) DEFAULT NULL,
  `comment_id` varchar(13) DEFAULT NULL,
  `comment_type` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`report_id`),
  KEY `reporter_id` (`reporter_id`),
  CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`reporter_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;

INSERT INTO `reports` (`report_id`, `reporter_id`, `comment_id`, `comment_type`)
VALUES
	('51e3e50b399f7','51c18a5e65394','51d5aeaf591b1','user_comments'),
	('51e3e69c129ab','51c18a5e65394','51e25b772c545','user_comments'),
	('51e3e6bbc9777','51c18a5e65394','51e25b772c545','user_comments'),
	('51e3e6c895f51','51c18a5e65394','51e25b772c545','user_comments'),
	('51e3e76f38ac2','51c18a5e65394','51da5c2bcb819','user_comments'),
	('51e3e91f0d5be','51e3e8424271c','51de3f7f39d3d','party_comment'),
	('51e3e92523201','51e3e8424271c','51de3f7f39d3d','party_comment'),
	('51e7eef203558','51e7eaf57f2a2','51da3217d1587','user_comments');

/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_badges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_badges`;

CREATE TABLE `user_badges` (
  `user_badge_id` varchar(13) NOT NULL DEFAULT '',
  `user_id` varchar(13) DEFAULT NULL,
  `badge_id` varchar(13) DEFAULT NULL,
  `date_given` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_badge_id`),
  KEY `user_id` (`user_id`),
  KEY `badge_id` (`badge_id`),
  CONSTRAINT `user_badges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `user_badges_ibfk_2` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`badge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_badges` WRITE;
/*!40000 ALTER TABLE `user_badges` DISABLE KEYS */;

INSERT INTO `user_badges` (`user_badge_id`, `user_id`, `badge_id`, `date_given`)
VALUES
	('51e79a68babb1','51c18a5e65394','51e79393a9941','2013-07-18 09:34:00'),
	('51e7ee84e56a0','51e7eaf57f2a2','51e79393a9941','2013-07-18 15:32:52');

/*!40000 ALTER TABLE `user_badges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_comments`;

CREATE TABLE `user_comments` (
  `user_comment_id` varchar(13) NOT NULL DEFAULT '',
  `user_id` varchar(13) DEFAULT NULL,
  `poster_id` varchar(13) DEFAULT NULL,
  `user_comment` varchar(400) DEFAULT '',
  `comment_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_comment_id`),
  KEY `user_id` (`user_id`),
  KEY `poster_id` (`poster_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`poster_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_comments` WRITE;
/*!40000 ALTER TABLE `user_comments` DISABLE KEYS */;

INSERT INTO `user_comments` (`user_comment_id`, `user_id`, `poster_id`, `user_comment`, `comment_date`)
VALUES
	('51d4f2af7a344','51d467d2864c8','51c18a5e65394','fewfwef','2013-07-04 05:57:35'),
	('51d5c5f9e4216','51d5b6052116b','51d5b6052116b','fwefwef','2013-07-04 08:59:05'),
	('51d5c5fd39c7a','51d5b6052116b','51d5b6052116b','fewfewf','2013-07-04 08:59:09'),
	('51d5c6060b8c1','51d5b6052116b','51d5b6052116b','qwewqdas','2013-07-04 08:59:18'),
	('51da3082645ef','51adb4bb24fb6','51c18a5e65394','Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','2013-07-08 05:22:42'),
	('51da312a682ef','51adb4bb24fb6','51c18a5e65394','fewfwefwef','2013-07-08 05:25:30'),
	('51da31469e548','51adb4bb24fb6','51c18a5e65394','fwefwefwef','2013-07-08 05:25:58'),
	('51da31639ae64','51adb4bb24fb6','51c18a5e65394','fwefwef','2013-07-08 05:26:27'),
	('51da318a11ac0','51adb4bb24fb6','51c18a5e65394','wefwefwef','2013-07-08 05:27:06'),
	('51da31a25378f','51adb4bb24fb6','51c18a5e65394','fewfwef','2013-07-08 05:27:30'),
	('51da31a75ab8f','51adb4bb24fb6','51c18a5e65394','wefwef','2013-07-08 05:27:35'),
	('51da31b2bf132','51adb4bb24fb6','51c18a5e65394','wefewf','2013-07-08 05:27:46'),
	('51da31cc67ee8','51adb4bb24fb6','51c18a5e65394','wefwef','2013-07-08 05:28:12'),
	('51da31d62f5f6','51adb4bb24fb6','51c18a5e65394','fwefwef','2013-07-08 05:28:22'),
	('51da31f21a840','51adb4bb24fb6','51c18a5e65394','fwfewfwe','2013-07-08 05:28:50'),
	('51da31f76d659','51adb4bb24fb6','51c18a5e65394','weeeee','2013-07-08 05:28:55'),
	('51da32045fa23','51adb4bb24fb6','51c18a5e65394','fwefewfwef','2013-07-08 05:29:08'),
	('51da320f38de0','51adb4bb24fb6','51c18a5e65394','fwefewf','2013-07-08 05:29:19'),
	('51da3211b00ec','51adb4bb24fb6','51c18a5e65394','fwefwef','2013-07-08 05:29:21'),
	('51da3217d1587','51adb4bb24fb6','51c18a5e65394','ewfewfwef','2013-07-08 05:29:27'),
	('51da3516e5cc4','51ad911c2a6bd','51c18a5e65394','fwewef','2013-07-08 05:42:14'),
	('51da366893868','51ad911c2a6bd','51c18a5e65394','ewfwef','2013-07-08 05:47:52'),
	('51da367849246','51ad911c2a6bd','51c18a5e65394','wefwefw','2013-07-08 05:48:08'),
	('51da495009a6d','51ad911c2a6bd','51c18a5e65394','hellooo','2013-07-08 07:08:32'),
	('51da5c2bcb819','51a6f29fa6c82','51d5b6052116b','fwefwefwef','2013-07-08 08:28:59'),
	('51e0870dc4a8f','51c2a88e99624','51c18a5e65394','hello','2013-07-13 12:45:33'),
	('51e24b9c73390','51c18a5e65394','51c18a5e65394','fwefewf','2013-07-14 08:56:28'),
	('51e24b9ebfa5a','51c18a5e65394','51c18a5e65394','fewfwefwef','2013-07-14 08:56:30'),
	('51e24ba1a0c22','51c18a5e65394','51c18a5e65394','fwefwefwef','2013-07-14 08:56:33'),
	('51e24ba3e1322','51c18a5e65394','51c18a5e65394','vcefefefef','2013-07-14 08:56:35'),
	('51e2661a4cf6f','51c18a5e65394','51c18a5e65394','fewff','2013-07-14 10:49:30'),
	('51e26639803be','51c18a5e65394','51c18a5e65394','fwefwef','2013-07-14 10:50:01'),
	('51e2663bb90f7','51c18a5e65394','51c18a5e65394','dqwdqwdqw','2013-07-14 10:50:03'),
	('51e266406e0a1','51c18a5e65394','51c18a5e65394','aaaa','2013-07-14 10:50:08'),
	('51e26687d987a','51c18a5e65394','51c18a5e65394','bbbbb','2013-07-14 10:51:19'),
	('51e26bf8b2bcd','51e2619ba037f','51c18a5e65394','wefewf','2013-07-14 11:14:32'),
	('51e26bfa240bc','51e2619ba037f','51c18a5e65394','wefwefwef','2013-07-14 11:14:34'),
	('51e26bfc3a09a','51e2619ba037f','51c18a5e65394','wefwefewf','2013-07-14 11:14:36'),
	('51e26bfdc289c','51e2619ba037f','51c18a5e65394','gegewgweg','2013-07-14 11:14:37'),
	('51e26bff5bb01','51e2619ba037f','51c18a5e65394','fwefwefwef','2013-07-14 11:14:39'),
	('51e26c010cd75','51e2619ba037f','51c18a5e65394','weffwefwef','2013-07-14 11:14:41'),
	('51e26c0346793','51e2619ba037f','51c18a5e65394','wefwefwef','2013-07-14 11:14:43'),
	('51e26c0c59383','51e2619ba037f','51c18a5e65394','fwefweffwe','2013-07-14 11:14:52'),
	('51e26c0f5f6f5','51e2619ba037f','51c18a5e65394','fwefwefwef','2013-07-14 11:14:55'),
	('51e2727171aae','51c18a5e65394','51c18a5e65394','qwefwe','2013-07-14 11:42:09'),
	('51e27299ebffb','51c18a5e65394','51c18a5e65394','fewfwef','2013-07-14 11:42:49'),
	('51e3e51a4d168','51ad8c6b77abc','51c18a5e65394','fwefewf','2013-07-15 02:03:38'),
	('51e3e955f311a','51e3e8424271c','51e3e8424271c','fewfewfwef','2013-07-15 02:21:41'),
	('51e7eece00184','51e7eaf57f2a2','51e7eaf57f2a2','wefewf','2013-07-18 15:34:06'),
	('51e7eed0d2143','51e7eaf57f2a2','51e7eaf57f2a2','faFfewe','2013-07-18 15:34:08'),
	('51e7eed38407a','51e7eaf57f2a2','51e7eaf57f2a2','wgweewg','2013-07-18 15:34:11'),
	('51e7f8e9e3ac8','51c18a5e65394','51c18a5e65394','wfefewf','2013-07-18 16:17:13');

/*!40000 ALTER TABLE `user_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_views
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_views`;

CREATE TABLE `user_views` (
  `view_id` varchar(13) NOT NULL DEFAULT '',
  `user1_id` varchar(13) DEFAULT NULL,
  `user2_id` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`view_id`),
  KEY `user1_id` (`user1_id`),
  KEY `user2_id` (`user2_id`),
  CONSTRAINT `user_views_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `user_views_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_views` WRITE;
/*!40000 ALTER TABLE `user_views` DISABLE KEYS */;

INSERT INTO `user_views` (`view_id`, `user1_id`, `user2_id`)
VALUES
	('51d8c2f0035ac','51c18a5e65394','51a6f29fa6c82'),
	('51d8c399bac34','51c18a5e65394','51c2a86fdb7f5'),
	('51d8c3d92740a','51c18a5e65394','51d5b6052116b'),
	('51d8c6513fca3','51c18a5e65394','51ad911c2a6bd'),
	('51d8c65b2f097','51c18a5e65394','51adb4bb24fb6'),
	('51d8c65cd138f','51c18a5e65394','51c2dd1768f27'),
	('51d8c65ebc0e1','51c18a5e65394','51cb80c5a4707'),
	('51d8c6603955a','51c18a5e65394','51cb4c89203b3'),
	('51d8c9359dcce','51c18a5e65394','51ad8c6b77abc'),
	('51d8db3722991','51c18a5e65394','51d467d2864c8'),
	('51d8db3a1febc','51c18a5e65394','51d47f6896087'),
	('51da11ba5070d','51c18a5e65394','51cafabe1f64e'),
	('51da5270455ec','51c18a5e65394','51c2b8246a788'),
	('51da554f2ca8d','51c18a5e65394','51c14dda56f23'),
	('51da5b2606e05','51d5b6052116b','51a6f29fa6c82'),
	('51e086fa5600e','51c18a5e65394','51c2a5da66972'),
	('51e086fdb24be','51c18a5e65394','51c2a88e99624'),
	('51e22c6c88524','51e22c442c8c3','51c18a5e65394'),
	('51e22cc496cc5','51e22cbe6ad98','51c18a5e65394'),
	('51e24b3c585c1','51e24b2914830','51c18a5e65394'),
	('51e24dc6017b5','51c18a5e65394','51e24b2914830'),
	('51e256c670f9b','51e256b4a00d4','51c18a5e65394'),
	('51e25fd1559ac','51e25fbbe939f','51c18a5e65394'),
	('51e260d02b9eb','51e260c91fc4e','51c18a5e65394'),
	('51e260e901b16','51e260e1b6130','51c18a5e65394'),
	('51e260fd7998d','51e260f9b234f','51c18a5e65394'),
	('51e2611962021','51e26113cb346','51c18a5e65394'),
	('51e26151311f3','51e26147efeac','51c18a5e65394'),
	('51e261a33d466','51e2619ba037f','51c18a5e65394'),
	('51e269044edab','51c18a5e65394','51e2619ba037f'),
	('51e5cf9d0d600','51c18a5e65394','51c851e0cc348'),
	('51e7eee5e84be','51e7eaf57f2a2','51adb4bb24fb6'),
	('51e7eefb360ce','51e7eaf57f2a2','51c18a5e65394'),
	('51e7ef3ad4e52','51c18a5e65394','51e7eaf57f2a2');

/*!40000 ALTER TABLE `user_views` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` varchar(13) NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pword` varchar(32) DEFAULT NULL,
  `date_of_reg` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `profile_img` varchar(32) DEFAULT NULL,
  `facebook_id` int(30) DEFAULT NULL,
  `twitter_id` int(30) DEFAULT NULL,
  `user_ip` int(11) DEFAULT NULL,
  `bio` varchar(145) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `timezone` decimal(5,0) DEFAULT NULL,
  `feedback` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL,
  `contributions` int(11) DEFAULT NULL,
  `parties` int(11) DEFAULT NULL,
  `user_lat` float DEFAULT NULL,
  `user_lng` float DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `email`, `username`, `pword`, `date_of_reg`, `profile_img`, `facebook_id`, `twitter_id`, `user_ip`, `bio`, `location`, `timezone`, `feedback`, `views`, `comments`, `contributions`, `parties`, `user_lat`, `user_lng`)
VALUES
	('51a6f29fa6c82','kolby123@kolby.com','Kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-05-30 00:00:00','51bc0a374efbc.jpg',NULL,NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','Orlando, Fl',0,2,5,12,1,9,NULL,NULL),
	('51ad8c6b77abc','kolby2.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04 00:00:00','51b3995dbd004.jpg',NULL,NULL,0,'fwef\n','afwefefweq',0,0,1,0,0,0,NULL,NULL),
	('51ad911c2a6bd','kolby3.sisk@gmail.com','kolby3','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,0,0,1,0,0,0,NULL,NULL),
	('51adb4bb24fb6','kolby4.sisk@gmail.com','kolby','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-04 00:00:00','51bc1252be283.jpg',NULL,NULL,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','',0,0,1,0,0,0,NULL,NULL),
	('51c14dda56f23','kolby.sisk@gmail.com','kolby.sisk',NULL,'2013-06-19 00:00:00','51c14e079be18.png',1028820601,NULL,0,'','Orlando, Flor',0,0,1,0,0,0,NULL,NULL),
	('51c18a5e65394',NULL,'KolbySisk',NULL,'2013-06-19 00:00:00','51d488db03e78.jpg',NULL,708143798,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','Little Rock, Arkansas',-6,0,1,102,0,60,34.7465,-92.2896),
	('51c2a5da66972','kolbya.sisk@gmail.com','kolbya','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,0,0,1,0,0,0,NULL,NULL),
	('51c2a86fdb7f5','kolbyb.sisk@gmail.com','kolbyb','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,0,0,1,0,0,0,NULL,NULL),
	('51c2a88e99624','kolbyc.sisk@gmail.com','kolbyc','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,0,0,1,0,0,0,NULL,NULL),
	('51c2a9a8aebc5','kolbyd.sisk@gmail.com','kolbyd','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,0,0,0,0,0,0,NULL,NULL),
	('51c2b8246a788','kolbye.sisk@gmail.com','kolbye','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,NULL,NULL),
	('51c2dd1768f27',NULL,'thebeerbucks',NULL,'2013-06-20 00:00:00','51ccd078440f8.jpg',NULL,1444671476,0,'This short description about yourself will be the first impression that potential party donators will see.','Orlanod, FL',0,0,1,0,0,0,NULL,NULL),
	('51c5712ca9baf','bob@bob.com','anewguy','e8557d12f6551b2ddd26bbdd0395465c','2013-06-22 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51c6d1d97dc4b','newone@new.com','newone','e3b81d385ca4c26109dfbda28c563e2b','2013-06-23 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51c851e0cc348',NULL,'testtes71503090',NULL,'2013-06-24 00:00:00','51c851dfeda0f.png',NULL,1543375915,0,NULL,NULL,NULL,0,1,0,0,0,NULL,NULL),
	('51cafabe1f64e','kolbyk@gmail.com','kolbyk','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-26 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,NULL,NULL),
	('51caff454a56d','kolbyz@gmail.com','kolbyz','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-26 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51cb4c89203b3','kolbyewe@dfewf.com','kolby2412','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-26 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,NULL,NULL),
	('51cb80c5a4707','fewfewf@fwefe.com','fewfwef','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-27 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,NULL,NULL),
	('51ce0161245be','kolby.sisk@gmai1l.com','kolby12354','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-28 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51d467d2864c8','kolby88@hotmail.com','kolby88','4b18abc8189e9e20b7ce629ecbb1ba52','2013-07-03 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,NULL,NULL),
	('51d47f6896087','bobbb@bob.com','bobbbb','3902aaa840c947e83e43a78f83be8d95','2013-07-03 09:45:44','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,NULL,NULL),
	('51d4d290df72c','kolbya1@kolby.com','kolbya1','4b18abc8189e9e20b7ce629ecbb1ba52','2013-07-04 03:40:32','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51d4d2a2b0814','kolbya2@kolby.com','kolbya2','4b18abc8189e9e20b7ce629ecbb1ba52','2013-07-04 03:40:50','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51d5b6052116b','bobob@bob.com','bobob','3902aaa840c947e83e43a78f83be8d95','2013-07-04 07:51:01','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,6,0,3,NULL,NULL),
	('51e22c442c8c3','beebboop@boop.com','beebboop','d2191965e3712671ab09c8ac1ddfefae','2013-07-14 06:42:44','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e22cbe6ad98','test@test.com','testterr','4728960471f6f8cf6130b05e3a27bf5a','2013-07-14 06:44:46','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e24b2914830','one@one.com','anotherone','c4988dbf8716d62d17180dd114f15c71','2013-07-14 08:54:33','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,1,0,0,NULL,NULL),
	('51e256b4a00d4','testtt@testtt.com','testttt','4728960471f6f8cf6130b05e3a27bf5a','2013-07-14 09:43:48','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e25fbbe939f','11111@11111.com','11111','b0baee9d279d34fa1dfd71aadb908c3f','2013-07-14 10:22:19','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e260c91fc4e','222222@222222.com','222222','e3ceb5881a0a1fdaad01296d7554868d','2013-07-14 10:26:49','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e260e1b6130','333333@333333.com','333333','1a100d2c0dab19c4430e7d73762b3423','2013-07-14 10:27:13','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e260f9b234f','44444@44444.com','44444','79b7cdcd14db14e9cb498f1793817d69','2013-07-14 10:27:37','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e26113cb346','55555@55555.com','55555','c5fe25896e49ddfe996db7508cf00534','2013-07-14 10:28:03','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e26147efeac','66666@66666.com','66666','ae8b5aa26a3ae31612eec1d1f6ffbce9','2013-07-14 10:28:55','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e2619ba037f','888888@888888.com','888888','21218cca77804d2ba1922c33e0151105','2013-07-14 10:30:19','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,0,0,0,NULL,NULL),
	('51e3e8424271c','hello@hello.com','hello','5d41402abc4b2a76b9719d911017c592','2013-07-15 02:17:06','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,1,0,0,NULL,NULL),
	('51e3ed5237f7f','testing@test.com','testing','098f6bcd4621d373cade4e832627b4f6','2013-07-15 02:38:42','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51e7eaf57f2a2','testtter@testtt.com','testtter','06bc60a5136f491fa6711ad1f869517d','2013-07-18 03:17:41','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,4,0,1,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
