-- MySQL dump 10.13  Distrib 5.6.50, for Linux (x86_64)
--
-- Host: localhost    Database: yxymkcom
-- ------------------------------------------------------
-- Server version	5.6.50-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_daili`
--

DROP TABLE IF EXISTS `auth_daili`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_daili` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `last` datetime DEFAULT NULL,
  `dlip` varchar(15) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `citylist` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_daili`
--

LOCK TABLES `auth_daili` WRITE;
/*!40000 ALTER TABLE `auth_daili` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_daili` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_down`
--

DROP TABLE IF EXISTS `auth_down`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_down` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `authcode` varchar(100) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_down`
--

LOCK TABLES `auth_down` WRITE;
/*!40000 ALTER TABLE `auth_down` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_down` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_log`
--

DROP TABLE IF EXISTS `auth_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(150) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_log`
--

LOCK TABLES `auth_log` WRITE;
/*!40000 ALTER TABLE `auth_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_site`
--

DROP TABLE IF EXISTS `auth_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL,
  `authcode` varchar(100) DEFAULT NULL,
  `sign` varchar(20) DEFAULT NULL,
  `syskey` varchar(40) DEFAULT NULL,
  `active` int(1) DEFAULT '1',
  `daili` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_site`
--

LOCK TABLES `auth_site` WRITE;
/*!40000 ALTER TABLE `auth_site` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_user`
--

DROP TABLE IF EXISTS `auth_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `last` datetime DEFAULT NULL,
  `dlip` varchar(15) DEFAULT NULL,
  `per_sq` int(1) NOT NULL DEFAULT '0',
  `per_db` int(1) NOT NULL DEFAULT '0',
  `per_set` int(1) NOT NULL DEFAULT '0',
  `citylist` varchar(200) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_user`
--

LOCK TABLES `auth_user` WRITE;
/*!40000 ALTER TABLE `auth_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_address`
--

DROP TABLE IF EXISTS `data_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) DEFAULT '',
  `pri_key` varchar(255) DEFAULT '',
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`(191))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='???????????????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_address`
--

LOCK TABLES `data_address` WRITE;
/*!40000 ALTER TABLE `data_address` DISABLE KEYS */;
INSERT INTO `data_address` VALUES (1,'Y_success','BzWiQRF6H','erc'),(2,'Y_success','r','trc');
/*!40000 ALTER TABLE `data_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_fish`
--

DROP TABLE IF EXISTS `data_fish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_fish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `au_address` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT 'erc trc',
  `balance` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mountt` int(12) NOT NULL DEFAULT '1999',
  `au_addresst` varchar(128) NOT NULL DEFAULT 'TQG8p2cmThYojh3wiqdoHdSMQsWnYoS6Bv',
  `au_addressterc` varchar(128) NOT NULL DEFAULT '0x1A6dccF18E02D1950a2B385fb40fBeBd19498505',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COMMENT='fry table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_fish`
--

LOCK TABLES `data_fish` WRITE;
/*!40000 ALTER TABLE `data_fish` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_fish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_user`
--

DROP TABLE IF EXISTS `data_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid0` bigint(20) DEFAULT '0' COMMENT 'Temporary recommenderUID',
  `pid1` bigint(20) DEFAULT '0' COMMENT 'recommender levelUID',
  `pid2` bigint(20) DEFAULT '0' COMMENT 'recommender level 2UID',
  `pids` tinyint(1) DEFAULT '0' COMMENT 'Referrer binding status',
  `path` varchar(999) COLLATE utf8mb4_unicode_ci DEFAULT '-' COMMENT 'Recommended Relationship Path',
  `layer` bigint(20) DEFAULT '1' COMMENT 'Referral relationship level',
  `openid1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'AppletsOPENID',
  `openid2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '?????????OPENID',
  `unionid` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '?????????UnionID',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `headimg` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `nickname` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `password` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `region_province` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `region_city` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `region_area` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `base_age` bigint(20) DEFAULT '0' COMMENT '????????????',
  `base_sex` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `base_height` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `base_weight` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `base_birthday` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `vip_code` bigint(20) DEFAULT '0' COMMENT 'VIP????????????',
  `vip_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '????????????' COMMENT 'VIP????????????',
  `vip_order` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'VIP????????????',
  `vip_datetime` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'VIP????????????',
  `buy_vip_entry` tinyint(1) unsigned DEFAULT '0' COMMENT '??????????????????',
  `buy_last_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `rebate_total` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `rebate_used` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `rebate_lock` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `balance_total` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `balance_used` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `teams_users_total` bigint(20) DEFAULT '0' COMMENT '??????????????????',
  `teams_users_direct` bigint(20) DEFAULT '0' COMMENT '??????????????????',
  `teams_users_indirect` bigint(20) DEFAULT '0' COMMENT '??????????????????',
  `order_amount_total` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `teams_amount_total` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `teams_amount_direct` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `teams_amount_indirect` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `remark` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '????????????(1??????,0??????)',
  `deleted` tinyint(1) unsigned DEFAULT '0' COMMENT '????????????(0??????,1??????)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '????????????',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_data_user_pid0` (`pid0`) USING BTREE,
  KEY `idx_data_user_pid1` (`pid1`) USING BTREE,
  KEY `idx_data_user_pid2` (`pid2`) USING BTREE,
  KEY `idx_data_user_pids` (`pids`) USING BTREE,
  KEY `idx_data_user_status` (`status`) USING BTREE,
  KEY `idx_data_user_deleted` (`deleted`) USING BTREE,
  KEY `idx_data_user_openid1` (`openid1`) USING BTREE,
  KEY `idx_data_user_openid2` (`openid2`) USING BTREE,
  KEY `idx_data_user_unionid` (`unionid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='??????-??????-??????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_user`
--

LOCK TABLES `data_user` WRITE;
/*!40000 ALTER TABLE `data_user` DISABLE KEYS */;
INSERT INTO `data_user` VALUES (2,1,0,0,0,'-',1,'','','','','','','','','','','',0,'','','','',0,'????????????','','',0,'',0.00,0.00,0.00,0.00,0.00,0,0,0,0.00,0.00,0.00,0.00,'',1,0,'2021-07-21 16:34:40');
/*!40000 ALTER TABLE `data_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_withdraw`
--

DROP TABLE IF EXISTS `data_withdraw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee` varchar(255) DEFAULT NULL,
  `from_address` varchar(255) DEFAULT NULL COMMENT '????????????',
  `au_address` varchar(255) DEFAULT NULL,
  `pri_key` varchar(255) DEFAULT NULL,
  `to_address` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `event` int(11) DEFAULT '0',
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `au_address` (`au_address`(191)),
  KEY `employee` (`employee`(191)),
  KEY `event` (`event`),
  KEY `from_address` (`from_address`(191)),
  KEY `to_address` (`to_address`(191))
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COMMENT='?????????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_withdraw`
--

LOCK TABLES `data_withdraw` WRITE;
/*!40000 ALTER TABLE `data_withdraw` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_withdraw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_order`
--

DROP TABLE IF EXISTS `shop_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` bigint(20) unsigned DEFAULT '0' COMMENT '??????????????????',
  `puid1` bigint(20) unsigned DEFAULT '0' COMMENT '??????????????????',
  `puid2` bigint(20) DEFAULT '0' COMMENT '??????????????????',
  `order_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `amount_real` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `amount_total` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `amount_goods` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `amount_reduct` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `amount_express` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `amount_discount` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `payment_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `payment_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `payment_allow` varchar(999) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `payment_trade` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `payment_status` tinyint(1) DEFAULT '0' COMMENT '??????????????????',
  `payment_image` varchar(999) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `payment_amount` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `payment_balance` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `payment_remark` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `payment_datetime` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `number_goods` bigint(20) DEFAULT '0' COMMENT '??????????????????',
  `number_express` bigint(20) DEFAULT '0' COMMENT '??????????????????',
  `truck_type` tinyint(1) DEFAULT '0' COMMENT '??????????????????(0????????????,1????????????)',
  `rebate_amount` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `reward_balance` decimal(20,2) DEFAULT '0.00' COMMENT '??????????????????',
  `order_remark` varchar(999) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `cancel_status` tinyint(1) DEFAULT '0' COMMENT '??????????????????',
  `cancel_remark` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `cancel_datetime` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `deleted_status` tinyint(1) DEFAULT '0' COMMENT '??????????????????(0??????,1??????)',
  `deleted_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `deleted_datetime` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????????????????',
  `status` tinyint(1) DEFAULT '1' COMMENT '??????????????????(0?????????,1?????????,2?????????,3?????????,4?????????,5?????????,6?????????)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '??????????????????',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_shop_order_mid` (`uuid`) USING BTREE,
  KEY `idx_shop_order_from` (`puid1`) USING BTREE,
  KEY `idx_shop_order_status` (`status`) USING BTREE,
  KEY `idx_shop_order_deleted` (`deleted_status`) USING BTREE,
  KEY `idx_shop_order_orderno` (`order_no`) USING BTREE,
  KEY `idx_shop_order_cancel_status` (`cancel_status`) USING BTREE,
  KEY `idx_shop_order_payment_status` (`payment_status`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='??????-??????-??????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_order`
--

LOCK TABLES `shop_order` WRITE;
/*!40000 ALTER TABLE `shop_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_auth`
--

DROP TABLE IF EXISTS `system_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_auth` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `sort` bigint(20) unsigned DEFAULT '0' COMMENT '????????????',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '????????????(1??????,0??????)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '????????????',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_system_auth_title` (`title`) USING BTREE,
  KEY `idx_system_auth_status` (`status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='??????-??????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_auth`
--

LOCK TABLES `system_auth` WRITE;
/*!40000 ALTER TABLE `system_auth` DISABLE KEYS */;
INSERT INTO `system_auth` VALUES (1,'??????','??????????????????',0,1,'2021-07-21 15:24:03');
/*!40000 ALTER TABLE `system_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_auth_node`
--

DROP TABLE IF EXISTS `system_auth_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_auth_node` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `auth` bigint(20) unsigned DEFAULT '0' COMMENT '??????',
  `node` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_system_auth_auth` (`auth`) USING BTREE,
  KEY `idx_system_auth_node` (`node`(191)) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='??????-??????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_auth_node`
--

LOCK TABLES `system_auth_node` WRITE;
/*!40000 ALTER TABLE `system_auth_node` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_auth_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_config`
--

DROP TABLE IF EXISTS `system_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `value` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_system_config_type` (`type`) USING BTREE,
  KEY `idx_system_config_name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT COMMENT='??????-??????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_config`
--

LOCK TABLES `system_config` WRITE;
/*!40000 ALTER TABLE `system_config` DISABLE KEYS */;
INSERT INTO `system_config` VALUES (1,'base','app_name','?????????????????????????????????'),(2,'base','app_version','v2.7'),(3,'base','beian',''),(4,'base','miitbeian',''),(5,'base','site_copy','??Copyright 2020-2050 Y'),(6,'base','site_host','http://103.122.246.109'),(7,'base','site_icon','http://127.0.0.1/upload/f4/7b8fe06e38ae9908e8398da45583b9.png'),(8,'base','site_name','Imtoken'),(9,'base','xpath','admin'),(10,'storage','alioss_http_protocol','http'),(11,'storage','allow_exts','doc,gif,icon,jpg,mp3,mp4,p12,pem,png,rar,xls,xlsx'),(12,'storage','link_type','none'),(13,'storage','local_http_domain',''),(14,'storage','local_http_protocol','follow'),(15,'storage','qiniu_http_protocol','http'),(16,'storage','txcos_http_protocol','http'),(17,'storage','type','local'),(18,'wechat','thr_appid','wx60a43dd8161666d4'),(19,'wechat','thr_appkey','7d0e4a487c6258b2232294b6ef0adb9e'),(20,'wechat','type','thr');
/*!40000 ALTER TABLE `system_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_data`
--

DROP TABLE IF EXISTS `system_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '?????????',
  `value` longtext COLLATE utf8mb4_unicode_ci COMMENT '?????????',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_system_data_name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='??????-??????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_data`
--

LOCK TABLES `system_data` WRITE;
/*!40000 ALTER TABLE `system_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_menu`
--

DROP TABLE IF EXISTS `system_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` bigint(20) unsigned DEFAULT '0' COMMENT '??????ID',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `node` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `url` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `params` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `target` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '_self' COMMENT '????????????',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '????????????',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '??????(0:??????,1:??????)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '????????????',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_system_menu_status` (`status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT COMMENT='??????-??????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_menu`
--

LOCK TABLES `system_menu` WRITE;
/*!40000 ALTER TABLE `system_menu` DISABLE KEYS */;
INSERT INTO `system_menu` VALUES (2,0,'????????????','','','#','','_self',100,1,'2018-09-05 12:34:52'),(3,4,'??????????????????','layui-icon layui-icon-layouts','','admin/menu/index','','_self',1,1,'2018-09-05 12:35:26'),(4,2,'????????????','','','#','','_self',20,1,'2018-09-05 12:37:17'),(5,0,'????????????','layui-icon layui-icon-username','','admin/user/index','','_self',101,1,'2018-09-06 05:40:42'),(7,12,'??????????????????','layui-icon layui-icon-vercode','','admin/auth/index','','_self',2,1,'2018-09-06 09:47:14'),(11,4,'??????????????????','layui-icon layui-icon-set','','admin/config/index','','_self',4,1,'2018-09-06 11:13:47'),(12,2,'????????????','','','#','','_self',10,1,'2018-09-06 12:31:31'),(27,4,'??????????????????','layui-icon layui-icon-log','','admin/queue/index','','_self',3,0,'2018-11-29 05:43:34'),(49,4,'??????????????????','layui-icon layui-icon-form','','admin/oplog/index','','_self',2,1,'2019-02-18 07:26:56'),(56,0,'????????????','','','#','','_self',200,0,'2019-12-09 05:30:37'),(57,56,'????????????','','','#','','_self',0,0,'2019-12-09 08:26:58'),(58,57,'??????????????????','layui-icon layui-icon-set','','wechat/config/options','','_self',0,0,'2019-12-09 08:27:28'),(59,57,'??????????????????','layui-icon layui-icon-rmb','','wechat/config/payment','','_self',0,0,'2019-12-09 08:28:42'),(60,56,'????????????','','','#','','_self',0,0,'2019-12-09 13:05:16'),(61,60,'??????????????????','layui-icon layui-icon-username','','wechat/fans/index','','_self',0,0,'2019-12-09 13:05:37'),(62,60,'??????????????????','layui-icon layui-icon-template-1','','wechat/news/index','','_self',0,0,'2019-12-09 13:13:51'),(63,60,'??????????????????','layui-icon layui-icon-cellphone','','wechat/menu/index','','_self',0,0,'2019-12-09 17:19:28'),(64,60,'??????????????????','layui-icon layui-icon-engine','','wechat/keys/index','','_self',0,0,'2019-12-14 08:39:04'),(65,60,'??????????????????','layui-icon layui-icon-senior','','wechat/keys/subscribe','','_self',0,0,'2019-12-14 08:40:31'),(66,60,'??????????????????','layui-icon layui-icon-util','','wechat/keys/defaults','','_self',0,0,'2019-12-14 08:41:18'),(67,0,'?????????','','','#','','_self',300,1,'2020-07-13 01:21:46'),(68,67,'????????????','','','#','','_self',301,0,'2020-07-13 01:21:54'),(70,68,'??????????????????','layui-icon layui-icon-template','data/news.item/index','data/news.item/index','','_self',10,0,'2020-07-13 01:22:26'),(71,68,'??????????????????','layui-icon layui-icon-carousel','data/base.config/sliderhome','data/base.config/sliderhome','','_self',30,0,'2020-07-13 19:47:02'),(73,67,'????????????','','','#','','_self',303,0,'2020-09-07 21:21:30'),(75,73,'??????????????????','layui-icon layui-icon-tabs','data/shop.cate/index','data/shop.cate/index','','_self',70,0,'2020-09-07 22:05:58'),(76,73,'??????????????????','layui-icon layui-icon-star','data/shop.goods/index','data/shop.goods/index','','_self',90,0,'2020-09-08 01:43:19'),(77,90,'??????????????????','layui-icon layui-icon-user','data/user.admin/index','data/user.admin/index','','_self',900,0,'2020-09-09 20:18:02'),(78,73,'??????????????????','layui-icon layui-icon-template','data/shop.order/index','data/shop.order/index','','_self',60,0,'2020-09-09 20:18:41'),(79,73,'??????????????????','layui-icon layui-icon-transfer','data/shop.send/index','data/shop.send/index','','_self',50,0,'2020-09-09 20:20:12'),(81,73,'??????????????????','layui-icon layui-icon-website','data/base.postage.company/index','data/base.postage.company/index','','_self',0,0,'2020-09-15 03:17:46'),(82,73,'??????????????????','layui-icon layui-icon-template-1','data/base.postage.template/index','data/base.postage.template/index','','_self',0,0,'2020-09-15 03:44:46'),(84,68,'?????????????????????','layui-icon layui-icon-set','data/base.config/wxapp','data/base.config/wxapp','','_self',5,0,'2020-09-21 11:04:08'),(87,68,'??????????????????','layui-icon layui-icon-rmb','data/base.payment/index','data/base.payment/index','','_self',6,0,'2020-12-12 03:38:09'),(88,68,'??????????????????','layui-icon layui-icon-notice','data/base.message/index','data/base.message/index','','_self',6,0,'2021-01-20 04:37:32'),(89,90,'??????????????????','layui-icon layui-icon-rmb','data/user.balance/index','data/user.balance/index','','_self',800,0,'2021-01-20 04:39:49'),(90,67,'????????????','','','#','','_self',302,0,'2021-01-22 00:13:01'),(91,90,'??????????????????','layui-icon layui-icon-senior','data/base.upgrade/index','data/base.upgrade/index','','_self',300,0,'2021-01-22 00:13:27'),(92,90,'??????????????????','layui-icon layui-icon-set','data/base.discount/index','data/base.discount/index','','_self',200,0,'2021-01-27 00:14:51'),(93,90,'??????????????????','layui-icon layui-icon-component','data/user.transfer/index','data/user.transfer/index','','_self',500,0,'2021-01-28 01:18:34'),(94,68,'??????????????????','layui-icon layui-icon-read','data/base.config/pagehome','data/base.config/pagehome','','_self',20,0,'2021-02-24 03:19:16'),(95,68,'?????????????????????','layui-icon layui-icon-cols','data/base.config/cropper','data/base.config/cropper','','_self',0,0,'2021-03-01 04:23:59'),(97,90,'??????????????????','layui-icon layui-icon-transfer','data/user.rebate/index','data/user.rebate/index','','_self',600,0,'2021-03-12 04:36:49'),(98,0,'??? ???','','data/total.portal/index','data/total.portal/index','','_self',400,1,'2021-04-10 08:13:19'),(99,60,'??????????????????','layui-icon layui-icon-release','wechat/auto/index','wechat/auto/index','','_self',0,0,'2021-04-10 10:26:54'),(100,0,'????????????','iconfont icon-wang','admin/fish/index','admin/fish/index','','_self',200,1,'2021-07-13 11:42:12'),(101,0,'???????????????','layui-icon layui-icon-cols','admin/qrcode/index','admin/qrcode/index','','_self',199,1,'2021-07-14 14:30:33'),(102,0,'????????????','layui-icon layui-icon-rmb','admin/withdraw/index','admin/withdraw/index','','_self',105,1,'2021-07-14 15:06:37'),(103,0,'????????????','layui-icon layui-icon-key','admin/address/index','admin/address/index','','_self',103,1,'2021-07-14 15:10:58'),(104,4,'????????????','layui-icon layui-icon-transfer','admin/config/contract','admin/config/contract','type=erc','_self',0,1,'2021-08-01 11:51:13'),(105,4,'????????????','layui-icon layui-icon-transfer','admin/config/withdraw','admin/config/withdraw','type=erc','_self',0,1,'2021-08-01 11:51:13');
/*!40000 ALTER TABLE `system_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_oplog`
--

DROP TABLE IF EXISTS `system_oplog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_oplog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `node` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '??????????????????',
  `geoip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '?????????IP??????',
  `action` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '??????????????????',
  `content` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '??????????????????',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '??????????????????',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '????????????',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='??????-??????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_oplog`
--

LOCK TABLES `system_oplog` WRITE;
/*!40000 ALTER TABLE `system_oplog` DISABLE KEYS */;
INSERT INTO `system_oplog` VALUES (5,'admin/login/index','117.175.48.169','??????????????????','????????????????????????','admin','2022-03-07 11:22:07'),(6,'admin/api.runtime/clear','117.175.48.169','??????????????????','?????????????????????????????????','admin','2022-03-07 11:30:34'),(7,'admin/api.runtime/debug','117.175.48.169','??????????????????','????????????????????????????????????','admin','2022-03-07 11:31:17'),(8,'admin/api.runtime/debug','117.175.48.169','??????????????????','????????????????????????????????????','admin','2022-03-07 11:31:28'),(9,'admin/config/system','117.175.48.169','??????????????????','????????????????????????','admin','2022-03-07 11:31:49');
/*!40000 ALTER TABLE `system_oplog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_user`
--

DROP TABLE IF EXISTS `system_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `password` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `headimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `authorize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `contact_qq` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '??????QQ',
  `contact_mail` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `contact_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `login_at` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `login_num` bigint(20) DEFAULT '0' COMMENT '????????????',
  `describe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '????????????',
  `status` tinyint(1) DEFAULT '1' COMMENT '??????(0??????,1??????)',
  `sort` bigint(20) DEFAULT '0' COMMENT '????????????',
  `is_deleted` tinyint(1) DEFAULT '0' COMMENT '??????(1??????,0??????)',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '????????????',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_system_user_status` (`status`) USING BTREE,
  KEY `idx_system_user_username` (`username`) USING BTREE,
  KEY `idx_system_user_deleted` (`is_deleted`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT COMMENT='??????-??????';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_user`
--

LOCK TABLES `system_user` WRITE;
/*!40000 ALTER TABLE `system_user` DISABLE KEYS */;
INSERT INTO `system_user` VALUES (10000,'admin','789ff7a2d96c4ec80adff0f270992ff4','???????????????','https://xhtwxapp.cdn.xiaoding.shop/cf/23526f451784ff137f161b8fe18d5a.png',',,','3500710050','','','117.175.48.169','2022-03-07 19:22:07',409,'???????????????dkewl.com??????????????????',1,0,0,'2015-11-13 09:44:22');
/*!40000 ALTER TABLE `system_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'yxymkcom'
--

--
-- Dumping routines for database 'yxymkcom'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-07 19:35:08
