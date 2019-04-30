/*
Navicat MySQL Data Transfer

Source Server         : 12
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : chuanqi_login

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2019-04-09 19:18:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL COMMENT '后台登录用户',
  `password` varchar(100) DEFAULT NULL COMMENT '后台登录密码',
  `login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '登录时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台登录用户表';

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin128', '147258', '2019-04-08 15:50:31');
