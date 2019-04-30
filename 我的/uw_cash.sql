# Host: localhost  (Version: 5.5.40)
# Date: 2019-04-11 15:56:51
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "uw_cash"
#

DROP TABLE IF EXISTS `uw_cash`;
CREATE TABLE `uw_cash` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nickName` varchar(255) DEFAULT NULL COMMENT '游戏名称,比如s1.我很美',
  `userName` varchar(100) DEFAULT NULL COMMENT '用户真实姓名',
  `idCard` int(11) unsigned DEFAULT NULL COMMENT '身份证',
  `bankCard` int(2) DEFAULT NULL,
  `alipay` varchar(255) DEFAULT NULL COMMENT '支付宝账号',
  `diamond` int(1) DEFAULT NULL COMMENT '提现元宝',
  `isCash` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否提现。0.未提现; 1.已提现',
  `applyTime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '申请提现时间',
  `cashTime` datetime DEFAULT NULL COMMENT '提现发放完成时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='客户提现表';

#
# Data for table "uw_cash"
#

/*!40000 ALTER TABLE `uw_cash` DISABLE KEYS */;
INSERT INTO `uw_cash` VALUES (5,'s1.我很美','黄大仙3',4294967295,2147483647,'273218496@qq.com',500,0,'2019-04-11 11:52:48',NULL),(6,'s1.我很美','黄大仙2',4294967295,2147483647,'273218496@qq.com',501,0,'2019-04-11 12:07:34',NULL),(7,'s1.我很美','黄大仙1',4294967295,2147483647,'273218496@qq.com',502,0,'2019-04-11 12:07:55',NULL),(8,'s1.我很美','黄大仙4',4294967295,2147483647,'273218496@qq.com',503,0,'2019-04-11 12:08:09',NULL);
/*!40000 ALTER TABLE `uw_cash` ENABLE KEYS */;
