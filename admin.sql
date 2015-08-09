/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : tmp

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-08-09 16:20:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_text_brief` longtext NOT NULL,
  `product_text` longtext NOT NULL,
  `del_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_type` varchar(255) NOT NULL,
  `project_title` longtext NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `project_text_brief` longtext NOT NULL,
  `project_text` longtext NOT NULL,
  `del_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------

-- ----------------------------
-- Table structure for upload_file
-- ----------------------------
DROP TABLE IF EXISTS `upload_file`;
CREATE TABLE `upload_file` (
  `file_type` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `del_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of upload_file
-- ----------------------------

-- ----------------------------
-- Table structure for webmaster
-- ----------------------------
DROP TABLE IF EXISTS `webmaster`;
CREATE TABLE `webmaster` (
  `admin_name` char(50) NOT NULL,
  `admin_password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of webmaster
-- ----------------------------
INSERT INTO `webmaster` VALUES ('64e1b8d34f425d19e1ee2ea7236d3028', '21232f297a57a5a743894a0e4a801fc3');
