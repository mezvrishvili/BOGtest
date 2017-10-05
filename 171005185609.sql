/*
MySQL Backup
Source Server Version: 10.1.13
Source Database: management
Date: 10/5/2017 18:56:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `payments`
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `category` VALUES ('1','mobile services','0'), ('2','gasoline','0'), ('3','food','0'), ('4','charity','0'), ('5','transport','0');
INSERT INTO `payments` VALUES ('153','maxo','100000','1','2017-10-05 14:00:02','123'), ('154','maxo2','50050','2','2017-10-05 14:00:12','ghghg'), ('155','maxo3','4000','4','2017-10-05 14:00:22','as'), ('156','sachmelii','1070','3','2017-10-05 14:01:27',''), ('157','telefoni','6000','1','2017-10-05 14:01:40',''), ('158','fdfdfd','111100','1','2017-10-05 14:02:03',''), ('159','sdfdfasas','12300','1','2017-10-05 14:02:06',''), ('160','xxxxxx','12312','3','2017-10-05 14:02:12',''), ('161','xxxx','110000','5','2017-08-23 14:02:26',''), ('162','tests','1111100','1','2017-09-07 14:02:36',''), ('163','tests11','159050','1','2017-08-05 14:02:48','comm'), ('164','asdsds','111111','4','2017-08-05 18:40:41',NULL), ('165','sdsdsa','12433','2','2017-07-05 18:40:50',NULL), ('166','fdfsdfsd','1345454','3','2017-07-05 18:40:56',NULL), ('167','dffdsfsd','2323232','5','2017-06-05 18:41:03',NULL), ('168','dfdfsd','11312','3','2017-06-05 18:41:46',NULL), ('169','dfdfssasa','113111','2','2017-06-05 18:41:46',NULL), ('170','tests11','159123','3','2017-08-05 14:02:48','comm'), ('171','dfdf11','343422','2','2017-06-05 18:41:46',NULL), ('172','dfdf11','343411','2','2017-01-05 18:41:46',NULL), ('173','test','1221210','4','2017-10-05 16:45:20','11');
