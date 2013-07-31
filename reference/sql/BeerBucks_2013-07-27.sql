# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: BeerBucks
# Generation Time: 2013-07-28 03:13:23 +0000
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
	('51e9b28b20c8a','51c18a5e65394','0','51e9b28b17ff6',0,'2013-07-19 23:41:31',1),
	('51ee6153e8cba','51ee5d9e7ebb3','0','51ee6153de5ce',0,'2013-07-23 12:56:19',1),
	('51f1e35909e12','51c18a5e65394','0','51f1e35897bff',0,'2013-07-26 04:47:52',1),
	('51f1e4b7afd9c','51c18a5e65394','0','51f1e4b7a5063',0,'2013-07-26 04:53:43',1),
	('51f1e908e8a9b','51c18a5e65394','0','51f1e908de4ad',0,'2013-07-26 05:12:08',1),
	('51f1ea4e3ad6e','51c18a5e65394','0','51f1ea4e3984b',0,'2013-07-26 05:17:34',1),
	('51f2fe2ce3ee0','51c18a5e65394','0','51f2fe2cd9f95',0,'2013-07-27 00:54:36',1),
	('51f42cb29f45e','51c18a5e65394','0','51f42cb28785a',0,'2013-07-27 22:25:22',1),
	('51f42eb961d48','51c18a5e65394','0','51f42eb95d008',0,'2013-07-27 22:34:01',1),
	('51f430210d362','51c18a5e65394','0','51f4302108e83',0,'2013-07-27 22:40:01',1),
	('51f4400042591','51c18a5e65394','0','51f440004067a',0,'2013-07-27 23:47:44',1);

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
	('51e76e1597743','51c18a5e65394','2013-07-18 06:24:53','0000-00-00 00:00:00',1,'Choose a catchy title for your party.','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e0336a0a.jpg','Orlando, Florida','123 wefwef','2013-07-21 06:00:00','2013-07-22 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e76e3838a46','51c18a5e65394','2013-07-18 06:25:28','0000-00-00 00:00:00',1,'wfewfew','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e26aa72f.jpg','Orlando, Florida','123wef','2013-07-22 06:00:00','2013-07-23 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e76e52f0866','51c18a5e65394','2013-07-18 06:25:54','0000-00-00 00:00:00',1,'wegrewgre','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e4429c77.jpg','Orlando, Florida','23rfwwef','2013-07-28 06:00:00','2013-07-29 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51e76e6aa1ec2','51c18a5e65394','2013-07-18 06:26:18','0000-00-00 00:00:00',1,'rewgwgf','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e5c7c3de.jpg','Orland, California','123wefw','2013-07-30 06:00:00','2013-07-31 06:00:00',123,0,0,-6,39.7474,-122.196),
	('51e76e8d40594','51c18a5e65394','2013-07-18 06:26:53','0000-00-00 00:00:00',1,'wefewsdv','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76e7cac615.jpg','Orlando, Florida','wefwefewf','2013-07-23 06:00:00','2013-07-24 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e76eb702ce8','51c18a5e65394','2013-07-18 06:27:35','0000-00-00 00:00:00',1,'fwefewf','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e76ea62929b.jpg','Orlando, Florida','fefewf','2013-07-19 06:00:00','2013-07-20 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e76ee20b8c1','51c18a5e65394','2013-07-18 06:28:18','0000-00-00 00:00:00',1,'fwefewf','efwefwef','51e76ecfa6c3a.jpg','Orlando, Florida','23rweffe','2013-07-25 06:00:00','2013-07-26 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e770e07e8cb','51c18a5e65394','2013-07-18 06:36:48','0000-00-00 00:00:00',1,'regerg','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e770ce8bec6.jpg','Orlando, Florida','234324rgregre','2013-07-24 06:00:00','2013-07-25 06:00:00',213,0,1,-6,28.5383,-81.3792),
	('51e7710e661d8','51c18a5e65394','2013-07-18 06:37:34','0000-00-00 00:00:00',1,'fewfwef','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e770fc3b20d.jpg','Orlando, Florida','ewfwef','2013-07-19 06:00:00','2013-07-20 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e79a57e7f10','51c18a5e65394','2013-07-18 09:33:43','0000-00-00 00:00:00',1,'wfwerfew','wefewfw','51e79a4a99b43.jpg','Orlando, Florida','fewfew','2013-07-22 06:00:00','2013-07-23 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e79a68a0ab0','51c18a5e65394','2013-07-18 09:34:00','0000-00-00 00:00:00',1,'wfwerfew','wefewfw','51e79a4a99b43.jpg','Orlando, Florida','fewfew','2013-07-22 06:00:00','2013-07-23 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e79a937ac98','51c18a5e65394','2013-07-18 09:34:43','0000-00-00 00:00:00',1,'fwefewf','wefwefwef','51e79a839a077.jpg','Winter Park, Florida','wefwefwe','2013-07-29 06:00:00','2013-07-30 06:00:00',123123,0,0,-6,28.6,-81.3392),
	('51e7b6b0e76db','51c18a5e65394','2013-07-18 11:34:40','0000-00-00 00:00:00',1,'wfwefew','wefwefwefew','51e7b6a00e822.jpg','Orlando, Florida','123fewefw','2013-07-19 06:00:00','2013-07-20 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e7ee84aca6c','51e7eaf57f2a2','2013-07-18 15:32:52','0000-00-00 00:00:00',1,'werfewf','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e7ee6e7beca.jpg','Orlando, Florida','23rsdf','2013-07-19 06:00:00','2013-07-20 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51e8e9ee73904','51c18a5e65394','2013-07-19 09:25:34','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e8e8d079ac3.jpg','Orlando, Florida','123ewfewf','2013-07-28 06:00:00','2013-07-30 06:00:00',1243,0,0,-6,28.5383,-81.3792),
	('51e9b28b17ff6','51c18a5e65394','2013-07-19 23:41:31','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51e9b2234e3bf.jpg','Orlando, Florida','erregre','2013-07-20 11:17:00','2013-07-21 06:00:00',123,0,1,-6,28.5383,-81.3792),
	('51ee6153de5ce','51ee5d9e7ebb3','2013-07-23 12:56:19','0000-00-00 00:00:00',1,'testttt','just another test party.','51ee610aa6a7d.jpg','Winter Park, Florida','123 no where','2013-07-25 06:00:00','2013-07-26 06:00:00',123,0,1,-6,28.6,-81.3392),
	('51f1e35897bff','51c18a5e65394','2013-07-26 04:47:52','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51f1cfa01a6d4.jpg','Orlando, Florida','123no','2013-07-27 06:00:00','2013-07-30 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51f1e4b7a5063','51c18a5e65394','2013-07-26 04:53:43','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51f1e3d045335.jpg','Orlando, Florida','123no','2013-07-27 06:00:00','2013-07-28 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51f1e908de4ad','51c18a5e65394','2013-07-26 05:12:08','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51f1e8b8c79e6.jpg','Orlando, Florida','123noi','2013-07-28 06:00:00','2013-07-30 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51f1ea4e3984b','51c18a5e65394','2013-07-26 05:17:34','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51f1ea14a22ea.jpg','Orlando, Florida','123mjo','2013-07-28 06:00:00','2013-07-29 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51f2fe2cd9f95','51c18a5e65394','2013-07-27 00:54:36','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51f2d79965906.jpg','Orlando, Florida','1123123','2013-07-28 06:00:00','2013-07-30 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51f42cb28785a','51c18a5e65394','2013-07-27 22:25:22','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51f4208196464.jpg','Orlando, Florida','123 no','2013-07-28 06:00:00','2013-07-29 06:00:00',90000,0,0,-6,28.5383,-81.3792),
	('51f42eb95d008','51c18a5e65394','2013-07-27 22:34:01','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51f42d0eb8c46.jpg','Orlando, Florida','123123','2013-07-29 06:00:00','2013-07-30 06:00:00',123,0,0,-6,28.5383,-81.3792),
	('51f4302108e83','51c18a5e65394','2013-07-27 22:40:01','0000-00-00 00:00:00',1,'Bobby\'s 21st birthday bash','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51f42ec96364b.jpg','Orlando, Florida','12331','2013-07-28 06:00:00','2013-07-29 06:00:00',4322,0,0,-6,28.5383,-81.3792),
	('51f440004067a','51c18a5e65394','2013-07-27 23:47:44','0000-00-00 00:00:00',1,'bob123','Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)','51f43fb3477fb.jpg','Orlando, Florida','to everyone who ha','2013-07-29 06:00:00','2013-07-30 06:00:00',213,0,0,-6,28.5383,-81.3792);

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
	('51e7ee97797b2','51e7ee84aca6c','51e7eaf57f2a2','fewewfwef','2013-07-18 15:33:11'),
	('51f113b583662','51e9b28b17ff6','51c18a5e65394','wefwef','2013-07-25 14:01:57'),
	('51f114d1cf725','51e9b28b17ff6','51c18a5e65394','fewfwe','2013-07-25 14:06:41'),
	('51f114d474bf3','51e9b28b17ff6','51c18a5e65394','wefwf','2013-07-25 14:06:44'),
	('51f114d696e41','51e9b28b17ff6','51c18a5e65394','dqwdwdqwd','2013-07-25 14:06:46'),
	('51f114df10d1c','51e9b28b17ff6','51c18a5e65394','qwdqwdqwd','2013-07-25 14:06:55'),
	('51f114e50834f','51e9b28b17ff6','51c18a5e65394','dqwdqwd','2013-07-25 14:07:01'),
	('51f114e81375f','51e9b28b17ff6','51c18a5e65394','qwdqwdqwd','2013-07-25 14:07:04'),
	('51f116a857824','51e9b28b17ff6','51c18a5e65394','cdscsdcs','2013-07-25 14:14:32'),
	('51f11738cac02','51e9b28b17ff6','51c18a5e65394','wefew','2013-07-25 14:16:56'),
	('51f11763265cd','51e9b28b17ff6','51c18a5e65394','fwefewf','2013-07-25 14:17:39'),
	('51f117cf55680','51e8e9ee73904','51c18a5e65394','fewfewf','2013-07-25 14:19:27'),
	('51f117d1d72c2','51e8e9ee73904','51c18a5e65394','weewxexwx','2013-07-25 14:19:29'),
	('51f117d48a853','51e8e9ee73904','51c18a5e65394','awefewafewa','2013-07-25 14:19:32'),
	('51f117d66e44f','51e8e9ee73904','51c18a5e65394','wefwaeff','2013-07-25 14:19:34'),
	('51f117d84904b','51e8e9ee73904','51c18a5e65394','cewcewcw','2013-07-25 14:19:36'),
	('51f117da7a7a5','51e8e9ee73904','51c18a5e65394','cwecewcew','2013-07-25 14:19:38'),
	('51f117dc58b9e','51e8e9ee73904','51c18a5e65394','qwdqwdqw','2013-07-25 14:19:40'),
	('51f117de54859','51e8e9ee73904','51c18a5e65394','dqwdqwdqwd','2013-07-25 14:19:42'),
	('51f117e0e41f0','51e8e9ee73904','51c18a5e65394','wqdwqdw','2013-07-25 14:19:44'),
	('51f117e2da03a','51e8e9ee73904','51c18a5e65394','csacsacs','2013-07-25 14:19:46'),
	('51f117e522cf7','51e8e9ee73904','51c18a5e65394','wqdqwdqwd','2013-07-25 14:19:49'),
	('51f117e810ec3','51e8e9ee73904','51c18a5e65394','dawdawd','2013-07-25 14:19:52');

/*!40000 ALTER TABLE `party_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table party_donations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `party_donations`;

CREATE TABLE `party_donations` (
  `donation_id` varchar(32) NOT NULL DEFAULT '',
  `party_id` varchar(13) DEFAULT NULL,
  `user_id` varchar(13) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `fingerprint` varchar(32) DEFAULT NULL,
  `donation_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`donation_id`),
  KEY `party_id` (`party_id`),
  KEY `poster_id` (`user_id`),
  CONSTRAINT `party_donations_ibfk_1` FOREIGN KEY (`party_id`) REFERENCES `parties` (`party_id`),
  CONSTRAINT `party_donations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `party_donations` WRITE;
/*!40000 ALTER TABLE `party_donations` DISABLE KEYS */;

INSERT INTO `party_donations` (`donation_id`, `party_id`, `user_id`, `amount`, `fingerprint`, `donation_date`)
VALUES
	('ch_2FbcRFodOWF0C2','51e76d9b7176d','51ee5d9e7ebb3',100.00,'tEjb2ErCeAcNB91f','2013-07-23 16:05:01'),
	('ch_2FbdhR5qpDh5GU','51e76decf0eed','51ee5d9e7ebb3',20.00,'tEjb2ErCeAcNB91f','2013-07-23 16:05:26'),
	('ch_2FbHsmOReU4VbQ','51e76e52f0866','51ee5d9e7ebb3',12.00,'tEjb2ErCeAcNB91f','2013-07-23 15:43:33'),
	('ch_2FbIUAtiKHHVX6','51e76e52f0866','51ee88a61afd9',12.00,'tEjb2ErCeAcNB91f','2013-07-23 15:44:22'),
	('ch_2FbIVep3zm2x4n','51e76e52f0866','51ee88ca93e17',11.00,'tEjb2ErCeAcNB91f','2013-07-23 15:44:59'),
	('ch_2FbKq9SiWrxLPK','51e76e52f0866','51ee88f978003',12.00,'tEjb2ErCeAcNB91f','2013-07-23 15:46:44'),
	('ch_2FbL1cBBeHmfBr','51e76e52f0866','51ee89774cc96',99.00,'tEjb2ErCeAcNB91f','2013-07-23 15:47:49'),
	('ch_2FbLuGmoOQyh8I','51e76e52f0866','51ee895b001e4',11.00,'tEjb2ErCeAcNB91f','2013-07-23 15:47:21'),
	('ch_2FSwTKGhvJznwi','51e7ee84aca6c','51c18a5e65394',213.00,'tEjb2ErCeAcNB91f','2013-07-23 07:07:20'),
	('ch_2FSyDdXW3lxIoA','51e7ee84aca6c','51c18a5e65394',123.95,'tEjb2ErCeAcNB91f','2013-07-23 07:09:02'),
	('ch_2FTfbcljsFYUOJ','51e7ee84aca6c','51c18a5e65394',123.00,'tEjb2ErCeAcNB91f','2013-07-23 07:52:12'),
	('ch_2FUPFOkvOgEYQQ','51e76ee20b8c1','51ee1734135fa',10.00,'tEjb2ErCeAcNB91f','2013-07-23 08:38:14'),
	('ch_2FURywD6AOGuuv','51e76e52f0866','51ee1734135fa',10.00,'tEjb2ErCeAcNB91f','2013-07-23 08:39:50'),
	('ch_2FUSaXVWDZQhpJ','51e76e52f0866','51ee1734135fa',20.00,'tEjb2ErCeAcNB91f','2013-07-23 08:41:10'),
	('ch_2FUSvex2sViq9K','51e76e52f0866','51ee1734135fa',50.00,'tEjb2ErCeAcNB91f','2013-07-23 08:40:30'),
	('ch_2FUTIzpFZmsbY6','51e76e52f0866','51ee1734135fa',11.11,'tEjb2ErCeAcNB91f','2013-07-23 08:41:37'),
	('ch_2FV2HWcR1ZG4J6','51e76ee20b8c1','51ee1734135fa',23.00,'tEjb2ErCeAcNB91f','2013-07-23 09:16:59'),
	('ch_2FVNPFGDKKlSSd','51e76d730453d','51ee1734135fa',100.00,'tEjb2ErCeAcNB91f','2013-07-23 09:37:21'),
	('ch_2FWITAIk9fkeH8','51e8e9ee73904','51ee1734135fa',500.00,'tEjb2ErCeAcNB91f','2013-07-23 10:34:50'),
	('ch_2FXab04Gr3C9bS','51e76e52f0866','51ee1734135fa',123.00,'tEjb2ErCeAcNB91f','2013-07-23 11:55:16'),
	('ch_2FXv2ss2PKjuDb','51e79a937ac98','51ee1734135fa',4000.00,'tEjb2ErCeAcNB91f','2013-07-23 12:15:36'),
	('ch_2FYjECEtRXrs62','51ee6153de5ce','51c18a5e65394',23.12,'tEjb2ErCeAcNB91f','2013-07-23 13:06:05'),
	('ch_2FYK5u7K3jObd5','51e79a937ac98','51ee5d9e7ebb3',90000.00,'tEjb2ErCeAcNB91f','2013-07-23 12:41:13'),
	('ch_2FYMIqOoIVMmTW','51e770e07e8cb','51ee5d9e7ebb3',5.00,'tEjb2ErCeAcNB91f','2013-07-23 12:42:43'),
	('ch_2FYWeKGtmeQ4d8','51e7b6b0e76db','51ee5d9e7ebb3',50.00,'tEjb2ErCeAcNB91f','2013-07-23 12:52:54'),
	('ch_2FZ4lcvw28bfm7','51e7ee84aca6c','51c18a5e65394',123.00,'tEjb2ErCeAcNB91f','2013-07-23 13:26:30'),
	('ch_2FZ65Q0lWQ9fHT','51ee6153de5ce','51c18a5e65394',1.00,'tEjb2ErCeAcNB91f','2013-07-23 13:29:13'),
	('ch_2FZ6M8IOioG9Qp','51ee6153de5ce','51c18a5e65394',33.30,'tEjb2ErCeAcNB91f','2013-07-23 13:28:23'),
	('ch_2Gj1UgUWJmLzi5','51ee6153de5ce','51c18a5e65394',23.58,'tEjb2ErCeAcNB91f','2013-07-26 15:48:13'),
	('ch_2GMqXtWIfCRw5Q','51e7ee84aca6c','51c18a5e65394',123.00,'tEjb2ErCeAcNB91f','2013-07-25 16:53:04'),
	('ch_2GMriYMkY2r0kE','51e7ee84aca6c','51c18a5e65394',123.00,'tEjb2ErCeAcNB91f','2013-07-25 16:53:43'),
	('ch_2GpAqRAciDvWZ2','51e7ee84aca6c','51c18a5e65394',20.00,'tEjb2ErCeAcNB91f','2013-07-26 22:09:10'),
	('ch_2Grp9tneVcTSgT','51e7ee84aca6c','51c18a5e65394',10.00,'tEjb2ErCeAcNB91f','2013-07-27 00:53:37');

/*!40000 ALTER TABLE `party_donations` ENABLE KEYS */;
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

LOCK TABLES `party_updates` WRITE;
/*!40000 ALTER TABLE `party_updates` DISABLE KEYS */;

INSERT INTO `party_updates` (`update_id`, `party_id`, `update_title`, `update`, `update_date`)
VALUES
	('51f11807ad1ca','51e8e9ee73904','test1','test1','2013-07-25 14:20:23'),
	('51f1180c37e27','51e8e9ee73904','test2','test1','2013-07-25 14:20:28'),
	('51f1180e7ce10','51e8e9ee73904','test1','test1','2013-07-25 14:20:30'),
	('51f118114f291','51e8e9ee73904','test1','test1','2013-07-25 14:20:33'),
	('51f118138d6b2','51e8e9ee73904','test1','test1','2013-07-25 14:20:35'),
	('51f11815ac3fe','51e8e9ee73904','test1','test1','2013-07-25 14:20:37'),
	('51f11819900c6','51e8e9ee73904','test1','test1','2013-07-25 14:20:41'),
	('51f1181cdb7f2','51e8e9ee73904','test1','test1','2013-07-25 14:20:44'),
	('51f1181f0306c','51e8e9ee73904','test1','test1','2013-07-25 14:20:47'),
	('51f11820cebf6','51e8e9ee73904','test1','test1','2013-07-25 14:20:48'),
	('51f1186921375','51e8e9ee73904','initPagination(1)','initPagination(1);','2013-07-25 14:22:01'),
	('51f1188fe30bf','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:22:39'),
	('51f11891e789d','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:22:41'),
	('51f11893effe1','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:22:43'),
	('51f118965de5b','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:22:46'),
	('51f1189909849','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:22:49'),
	('51f1189b34990','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:22:51'),
	('51f1189dee6b8','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:22:53'),
	('51f1189fe889f','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:22:55'),
	('51f118a21ff11','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:22:58'),
	('51f118a42ad6c','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:23:00'),
	('51f118a64aad0','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:23:02'),
	('51f118a7e919b','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:23:03'),
	('51f118ad14bca','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:23:09'),
	('51f118b14c69a','51e8e9ee73904','A short title.1','A short title.','2013-07-25 14:23:13'),
	('51f118b3d6234','51e8e9ee73904','A short title.2','A short title.','2013-07-25 14:23:15'),
	('51f118b86d9b5','51e8e9ee73904','A short title.3','A short title.','2013-07-25 14:23:20'),
	('51f118d55a1f0','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:23:49'),
	('51f118d973132','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:23:53'),
	('51f118dbbd934','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:23:55'),
	('51f118dd52c3e','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:23:57'),
	('51f118df75341','51e8e9ee73904','A short title.','A short title.','2013-07-25 14:23:59'),
	('51f118eb750ac','51e8e9ee73904','your update1','your update.','2013-07-25 14:24:11'),
	('51f118ee76363','51e8e9ee73904','your update2','your update.','2013-07-25 14:24:14'),
	('51f118f0e9834','51e8e9ee73904','your update3','your update.','2013-07-25 14:24:16'),
	('51f118f39bc8e','51e8e9ee73904','your update4','your update.','2013-07-25 14:24:19'),
	('51f118f62b710','51e8e9ee73904','your update5','your update.','2013-07-25 14:24:22'),
	('51f118fcc52b3','51e8e9ee73904','your update6','your update.','2013-07-25 14:24:28');

/*!40000 ALTER TABLE `party_updates` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table recipients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recipients`;

CREATE TABLE `recipients` (
  `recipient_id` varchar(32) NOT NULL DEFAULT '',
  `user_id` varchar(13) DEFAULT NULL,
  `fingerprint` varchar(32) DEFAULT NULL,
  `creation_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `account` int(4) DEFAULT NULL,
  PRIMARY KEY (`recipient_id`),
  KEY `poster_id` (`user_id`),
  CONSTRAINT `recipients_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `recipients` WRITE;
/*!40000 ALTER TABLE `recipients` DISABLE KEYS */;

INSERT INTO `recipients` (`recipient_id`, `user_id`, `fingerprint`, `creation_date`, `name`, `email`, `account`)
VALUES
	('rp_2HF7xQpDLnZHv1','51c18a5e65394','ohFVJUcRhikG5m4k','2013-07-28 00:58:57','Kolby Siskkk','kolby.sisk@gmail.com',6789);

/*!40000 ALTER TABLE `recipients` ENABLE KEYS */;
UNLOCK TABLES;


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
	('51e7eef203558','51e7eaf57f2a2','51da3217d1587','user_comments'),
	('51f13c101558a','51c18a5e65394','51e7ee97797b2','party_comment');

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
	('51e7ee84e56a0','51e7eaf57f2a2','51e79393a9941','2013-07-18 15:32:52'),
	('51ee6153f3eea','51ee5d9e7ebb3','51e79393a9941','2013-07-23 12:56:19');

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
	('51e7f8e9e3ac8','51c18a5e65394','51c18a5e65394','wfefewf','2013-07-18 16:17:13'),
	('51f11746afcdc','51c18a5e65394','51c18a5e65394','wefewf','2013-07-25 14:17:10');

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
	('51e7ef3ad4e52','51c18a5e65394','51e7eaf57f2a2'),
	('51ee63a3bbc51','51c18a5e65394','51ee5d9e7ebb3'),
	('51ee899a98382','51ee89774cc96','51ad8c6b77abc'),
	('51ee8c79db5e8','51c18a5e65394','51c2a9a8aebc5'),
	('51ee8c9875425','51ee5d9e7ebb3','51c18a5e65394');

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
	('51c18a5e65394',NULL,'KolbySisk',NULL,'2013-06-19 00:00:00','51d488db03e78.jpg',NULL,708143798,0,'Sum up yourself in 145 characters. This short description about yourself will be the first impression that potential party donators will see.','Orlando, Florida',-6,0,1,125,8,69,28.5383,-81.3792),
	('51c2a5da66972','kolbya.sisk@gmail.com','kolbya','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,0,0,1,0,0,0,NULL,NULL),
	('51c2a86fdb7f5','kolbyb.sisk@gmail.com','kolbyb','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,0,0,1,0,0,0,NULL,NULL),
	('51c2a88e99624','kolbyc.sisk@gmail.com','kolbyc','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,0,0,1,0,0,0,NULL,NULL),
	('51c2a9a8aebc5','kolbyd.sisk@gmail.com','kolbyd','4b18abc8189e9e20b7ce629ecbb1ba52','2013-06-20 00:00:00','default.jpg',NULL,NULL,0,NULL,NULL,0,0,1,0,0,0,NULL,NULL),
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
	('51e7eaf57f2a2','testtter@testtt.com','testtter','06bc60a5136f491fa6711ad1f869517d','2013-07-18 03:17:41','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,4,0,1,NULL,NULL),
	('51ee1734135fa','kolbyy@kolby.com','kolbyy','db2db2705a6901cc93bfa985be51d054','2013-07-23 07:40:04','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL),
	('51ee5d9e7ebb3','billybob@bob.com','billybob','e8557d12f6551b2ddd26bbdd0395465c','2013-07-23 12:40:30','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,1,0,3,1,NULL,NULL),
	('51ee88a61afd9','newone2@one.com','newone2','08b1d443ef0ab3677d2af8ef1afb1b28','2013-07-23 15:44:06','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,1,0,NULL,NULL),
	('51ee88ca93e17','newone3@new.com','newone3','08b1d443ef0ab3677d2af8ef1afb1b28','2013-07-23 15:44:42','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,1,0,NULL,NULL),
	('51ee88f978003','another1@one.com','anotherone1','b32d73e56ec99bc5ec8f83871cde708a','2013-07-23 15:45:29','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,1,0,NULL,NULL),
	('51ee895b001e4','another2@one.com','another2','b32d73e56ec99bc5ec8f83871cde708a','2013-07-23 15:47:07','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,1,0,NULL,NULL),
	('51ee89774cc96','last@one.com','lastone','757760bf2b021b05a5a57c01dddca962','2013-07-23 15:47:35','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,1,0,NULL,NULL),
	('51eed8c97b67b','gyggy@grg.com','hgvhjgghv','bbeea713b9b4e2d220bba2ad401e5d63','2013-07-23 21:26:01','default.jpg',NULL,NULL,0,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
