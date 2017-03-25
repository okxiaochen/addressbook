# Host: localhost  (Version: 5.5.53)
# Date: 2017-03-25 19:12:35
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;


DROP DATABASE IF EXISTS contract;
CREATE DATABASE contract;
USE contract;

#
# Structure for table "contract"
#

DROP TABLE IF EXISTS `contract`;
CREATE TABLE `contract` (
  `id` varchar(40) NOT NULL COMMENT 'id',
  `name` varchar(30) NOT NULL COMMENT '名字',
  `phone` varchar(20) NOT NULL COMMENT '手机号码',
  `photo` varchar(50) DEFAULT NULL COMMENT '头像图片',
  `birthday` datetime DEFAULT NULL COMMENT '出生年月',
  `email` varchar(30) NOT NULL COMMENT '电子邮箱',
  `blog` varchar(30) DEFAULT NULL COMMENT '个人主页',
  `workplace` varchar(30) DEFAULT NULL COMMENT '工作单位',
  `address` varchar(50) NOT NULL COMMENT '家庭住址',
  `postalcode` varchar(10) DEFAULT NULL COMMENT '邮政编码',
  `remark` varchar(30) DEFAULT NULL COMMENT '备注',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='通讯录表';

#
# Data for table "contract"
#

INSERT INTO `contract` VALUES ('1','cx','13427548142',NULL,'2016-08-24 00:00:00','cxliker@qq.com',NULL,NULL,'',NULL,NULL,'2017-03-24 13:50:24',1),('2','happ','1231024919',NULL,'2017-03-08 00:00:00','',NULL,NULL,'scau 8-128',NULL,NULL,'2017-03-24 13:51:34',1);

#
# Structure for table "groups"
#

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` varchar(40) NOT NULL COMMENT '分组id',
  `groups_name` varchar(30) NOT NULL COMMENT '分组名称',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_groupsname` (`groups_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分组记录表';

#
# Data for table "groups"
#


#
# Structure for table "contractgroups"
#

DROP TABLE IF EXISTS `contractgroups`;
CREATE TABLE `contractgroups` (
  `contract_id` varchar(40) NOT NULL DEFAULT '' COMMENT '联系人id',
  `groups_id` varchar(40) NOT NULL DEFAULT '' COMMENT '分组id',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contract_id`,`groups_id`) COMMENT '联合主键',
  KEY `groups_id` (`groups_id`),
  CONSTRAINT `contractgroups_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`),
  CONSTRAINT `contractgroups_ibfk_2` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "contractgroups"
#

