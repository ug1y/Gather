/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : gather

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-01-23 21:36:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `actID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createtime` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`actID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for entity
-- ----------------------------
DROP TABLE IF EXISTS `entity`;
CREATE TABLE `entity` (
  `enID` int(11) NOT NULL AUTO_INCREMENT,
  `proID` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `index` int(11) DEFAULT NULL,
  PRIMARY KEY (`enID`),
  KEY `proID` (`proID`),
  CONSTRAINT `entity_ibfk_1` FOREIGN KEY (`proID`) REFERENCES `property` (`proID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for property
-- ----------------------------
DROP TABLE IF EXISTS `property`;
CREATE TABLE `property` (
  `proID` int(11) NOT NULL AUTO_INCREMENT,
  `actID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `isneed` int(255) DEFAULT NULL,
  `constraint` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`proID`),
  KEY `actID` (`actID`),
  CONSTRAINT `property_ibfk_1` FOREIGN KEY (`actID`) REFERENCES `activity` (`actID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
