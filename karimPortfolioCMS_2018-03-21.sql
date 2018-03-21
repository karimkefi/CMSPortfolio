# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.39)
# Database: karimPortfolioCMS
# Generation Time: 2018-03-21 10:43:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `section` enum('About','Portfolio','Contact') NOT NULL DEFAULT 'Portfolio',
  `title` varchar(100) NOT NULL DEFAULT '',
  `articleText` text,
  `imageID` int(11) unsigned DEFAULT NULL,
  `deleteFlag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;

INSERT INTO `article` (`id`, `section`, `title`, `articleText`, `imageID`, `deleteFlag`)
VALUES
	(1,'About','Where I am from','Born and bred in London. I went to a French school in London (a long story for another day) but switched to English A-levels before going to UCL again in London! \nAt UCL i studied Bio-chemical Engineering which taught me how to make pills from plasmids. I needed a job (any job) and found myself being interviewed in the city and getting a job as a junior accountant for an investment bank where I worked until the big move.',1,0),
	(2,'About','Where I am now','My wife is from Bath and we would come back to visit family and friends. We always talked about brining up our children out of London and couldn?t think of a better place. So in Aug 2017 we picked up and moved 100miles down the M4 to junction 18.\nFor me this was a great opportunity for me to switch career to a new industry as a full stack developer.',2,0),
	(3,'About','Interests','This is me dressed as a MAMIL at the start of my 2 day cycle ride from London to Amsterdam. I really enjoyed cycling 135 miles with a group of friends to raise money for charity. I also support a financial educaiton charity as a Trustee.',3,0),
	(4,'Portfolio','Mayden Logo','Challenge was to copy the Mayden Logo using only CSS! None of this right click business!\nThis is harder than it sounds. Playing around with CSS shapes, border radius, colo(u)rs and alignment. Trick is to use the inspector and arrows!',4,0),
	(5,'Portfolio','Pilot Webpage','Copy a template website, functionality and media queries for resizing depending on the screensize.',5,0),
	(6,'Portfolio','Login Form','First Pair Coding work with James. This was a simple Form to build, but difficult to navigate without diving onto the keyboard and driving!',6,0);

/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table breather
# ------------------------------------------------------------

DROP TABLE IF EXISTS `breather`;

CREATE TABLE `breather` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position` enum('Top','Middle','Bottom') NOT NULL DEFAULT 'Top',
  `title` varchar(60) DEFAULT NULL,
  `ArticleText` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `breather` WRITE;
/*!40000 ALTER TABLE `breather` DISABLE KEYS */;

INSERT INTO `breather` (`id`, `position`, `title`, `ArticleText`)
VALUES
	(1,'Middle','ABOUT ME','Not quite my life story, nor all that I have done. This focuses on my education and career jouney I have been on.'),
	(2,'Top','WHAT I AM LEARNING','Mayden Academy has taken up the challenge of teaching ME to be a FULLSTACK DEVELOPER in just 4 months! Unlikely I hear you say!\nI have high hopes they can...Above show the list of languages which I will be learning'),
	(3,'Bottom','SOME STUFF I HAVE BUILT','Started at Mayden Academy in Feb 2018. During my first 2 weeks we were set a challenges which are shown above.\nAs the challenges get better (and the old ones get embarrassing), this portfolio section will change!');

/*!40000 ALTER TABLE `breather` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Type` enum('telephone','email','address') NOT NULL DEFAULT 'telephone',
  `details` varchar(50) DEFAULT NULL,
  `imageID` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;

INSERT INTO `contact` (`id`, `Type`, `details`, `imageID`)
VALUES
	(1,'telephone','01255 xxx xxxx',7),
	(2,'email','karimkefi@gmail.com',8),
	(3,'address','Bath, BA1 XXX',9);

/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `imageName` varchar(200) NOT NULL DEFAULT '',
  `alt` varchar(400) DEFAULT NULL,
  `source` varchar(400) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `source` (`source`),
  UNIQUE KEY `imageName` (`imageName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `imageName`, `alt`, `source`)
VALUES
	(1,'London St Paul\'s','St Paul\'s','Img/london.jpg'),
	(2,'View from Bath Abbey','View of Bath','Img/bathview-KarimOwn.jpg'),
	(3,'Group Cyclists','Group of Cyclists','Img/CyclingTrafSq.jpg'),
	(4,'Mayden Logo','Mayden Logo','Img/challengeLogo.png'),
	(5,'Pilot Website','Pilot Website','Img/challengePilot.png'),
	(6,'Input form','Input form','Img/challengeForm.png'),
	(7,'Phone Icon','Phone Icon','Img/icons-contactphone-100.png'),
	(8,'Envelope Icon','Envelope Icon','Img/icons-contactletter-100.png'),
	(9,'House Icon','House Icon','Img/icons-contacthome-100.png');

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
