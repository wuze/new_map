/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50151
Source Host           : localhost:3306
Source Database       : map_sys

Target Server Type    : MYSQL
Target Server Version : 50151
File Encoding         : 65001

Date: 2013-04-26 13:23:35
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `map_adminlog`
-- ----------------------------
DROP TABLE IF EXISTS `map_adminlog`;
CREATE TABLE `map_adminlog` (
  `logid` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键字段增长',
  `adminid` int(5) NOT NULL DEFAULT '0' COMMENT '记录用户ID',
  `adminname` varchar(40) DEFAULT NULL COMMENT '记录用户名',
  `controller_name` varchar(32) NOT NULL DEFAULT '' COMMENT '操作对象',
  `action_name` varchar(32) NOT NULL DEFAULT '' COMMENT '操作描述',
  `url` varchar(128) NOT NULL DEFAULT '' COMMENT '请求的地址',
  `summary` text COMMENT '备注',
  `logtime` int(11) NOT NULL COMMENT '日志时间',
  `logip` char(16) NOT NULL DEFAULT '' COMMENT '日志ip',
  PRIMARY KEY (`logid`),
  KEY `adminid` (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='后台日志表';

-- ----------------------------
-- Records of map_adminlog
-- ----------------------------
INSERT INTO map_adminlog VALUES ('10', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365648166', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('11', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658290', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('12', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658430', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('13', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658473', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('14', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658530', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('15', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658588', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('16', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658688', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('17', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658702', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('18', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658704', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('19', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658705', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('20', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658766', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('21', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658816', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('22', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658842', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('23', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365658864', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('24', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365670881', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('25', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671611', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('26', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/index.php', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671619', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('27', '0', '0', 'company', 'com_edit', 'http://www.map.tmc/admin/index.php/company/com_edit', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671621', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('28', '0', '0', 'company', 'index', 'http://www.map.tmc/admin/index.php/company', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671621', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('29', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/index.php', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671623', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('30', '0', '0', 'contactus', 'index', 'http://www.map.tmc/admin/index.php/contactus', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671624', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('31', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/index.php', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671626', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('32', '0', '0', 'viewlist', 'index', 'http://www.map.tmc/admin/index.php/viewlist', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671627', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('33', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/index.php', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671628', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('34', '0', '0', 'product', 'upload_index', 'http://www.map.tmc/admin/index.php/product/upload_index', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671629', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('35', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/index.php', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31\'', '1365671632', '127.0.0.1');
INSERT INTO map_adminlog VALUES ('36', '0', '0', 'welcome', 'index', 'http://www.map.tmc/admin/', 'GET:array (\n)	POST:array (\n)	USER_AGENT:\'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31\'', '1365735472', '127.0.0.1');

-- ----------------------------
-- Table structure for `map_area`
-- ----------------------------
DROP TABLE IF EXISTS `map_area`;
CREATE TABLE `map_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='地区表';

-- ----------------------------
-- Records of map_area
-- ----------------------------
INSERT INTO map_area VALUES ('1', '0', '福州市', '0000-00-00 00:00:00');
INSERT INTO map_area VALUES ('2', '1', '晋安区', '2013-04-23 10:59:22');
INSERT INTO map_area VALUES ('3', '1', '台江区', '2013-04-23 11:03:24');

-- ----------------------------
-- Table structure for `map_category`
-- ----------------------------
DROP TABLE IF EXISTS `map_category`;
CREATE TABLE `map_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` tinyint(2) NOT NULL DEFAULT '1' COMMENT '文化信息1,文化传统2',
  `catname` varchar(20) NOT NULL,
  `parentid` tinyint(2) NOT NULL COMMENT '父目录分类',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='分类管理';

-- ----------------------------
-- Records of map_category
-- ----------------------------
INSERT INTO map_category VALUES ('20', '1', '图书馆', '0', '2013-04-22 17:32:41');
INSERT INTO map_category VALUES ('23', '1', '电影院', '20', '2013-04-22 17:44:29');
INSERT INTO map_category VALUES ('24', '1', '福州师大图书馆', '20', '2013-04-22 17:32:43');
INSERT INTO map_category VALUES ('25', '1', 'AAA', '0', '2013-04-22 17:45:11');
INSERT INTO map_category VALUES ('26', '1', 'CCC', '25', '2013-04-22 17:45:19');
INSERT INTO map_category VALUES ('27', '2', '水蜜桃', '26', '2013-04-15 22:52:27');
INSERT INTO map_category VALUES ('30', '1', '公园门票', '21', '2013-04-16 11:44:29');
INSERT INTO map_category VALUES ('29', '2', '伊丽莎白', '26', '2013-04-15 22:51:19');
INSERT INTO map_category VALUES ('31', '1', 'KTV欢唱', '21', '2013-04-16 11:45:04');
INSERT INTO map_category VALUES ('34', '2', '分类是乱码吗', '0', '2013-04-21 16:37:29');

-- ----------------------------
-- Table structure for `map_content`
-- ----------------------------
DROP TABLE IF EXISTS `map_content`;
CREATE TABLE `map_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `addr_name` varchar(30) NOT NULL COMMENT '名称',
  `telephone` varchar(20) NOT NULL COMMENT '电话号码',
  `address` varchar(50) NOT NULL COMMENT '地址',
  `zipcode` varchar(10) NOT NULL COMMENT '邮编',
  `img_url` varchar(200) NOT NULL COMMENT '大图片的URL',
  `web_url` varchar(200) NOT NULL COMMENT '网站URL',
  `lng` decimal(20,5) NOT NULL DEFAULT '0.00000' COMMENT '百度地图的纬度',
  `lat` decimal(20,5) NOT NULL DEFAULT '0.00000' COMMENT '百度地图的经度',
  `cat_id` int(10) NOT NULL COMMENT '对应category具体一类',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cid` tinyint(2) NOT NULL COMMENT '索引还是传统分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

-- ----------------------------
-- Records of map_content
-- ----------------------------
INSERT INTO map_content VALUES ('27', '福州市仓山区图书馆', '(0591)83441243', '福州市仓山区图书馆', '198987', 'upload/1.jpg', 'http://www.baidu.com', '119.32537', '26.04984', '23', '2013-04-26 13:10:45', '2');
INSERT INTO map_content VALUES ('28', '晋安区图书馆', '324234234', '晋安区图书馆', '324234', 'upload/2.jpg', 'http://www.baidu.com', '119.36450', '26.08014', '23', '2013-04-26 13:10:52', '2');
INSERT INTO map_content VALUES ('29', '乐乐绘本图书馆鼓山店', '(021)342423', '福州开发区图书馆', '342234', 'upload/3.jpg', 'http://www.baidu.com', '119.45299', '26.00860', '23', '2013-04-26 13:11:01', '2');
INSERT INTO map_content VALUES ('30', '福州市台江区图书馆', '453535', '福州市台江区图书馆', '5654654', 'upload/4.jpg', 'http://www.baidu.com', '119.31084', '26.06156', '24', '2013-04-26 13:11:06', '2');
INSERT INTO map_content VALUES ('31', '福州大学阳光学院图书馆', '435435', '福州大学阳光学院图书馆', '7567567', 'upload/5.jpg', 'http://xiaoma.com', '119.45356', '26.00935', '25', '2013-04-26 13:11:11', '2');
INSERT INTO map_content VALUES ('33', '这次可以存入数据库并且从数据库删除吗', '3242342', '三元桥', '34234234', 'upload/6.jpg', 'http://xiaoma', '116.46362', '39.96641', '27', '2013-04-26 13:13:00', '2');
INSERT INTO map_content VALUES ('34', '怎么这样', '3413', '中关村', '324234', 'upload/c7.png', 'http://xiaoma', '116.32307', '39.98996', '25', '2013-04-26 13:11:19', '2');
INSERT INTO map_content VALUES ('35', '第一个索引类文化信息', '3424324', '北京', '5435435', 'upload/163fa26f30fa2fc100912d3379d85040.png', 'http://xiaoma', '116.40387', '39.91489', '25', '2013-04-21 17:47:46', '2');
INSERT INTO map_content VALUES ('37', '第三个索引类', '234234', '中国', '3453', 'upload/c39d86566d8ea1e24bdf2752f8f8d1cb.png', 'http://xiaoma', '104.11413', '37.55034', '0', '2013-04-26 13:04:09', '1');

-- ----------------------------
-- Table structure for `map_group`
-- ----------------------------
DROP TABLE IF EXISTS `map_group`;
CREATE TABLE `map_group` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `group` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_group
-- ----------------------------
INSERT INTO map_group VALUES ('1', '2');
INSERT INTO map_group VALUES ('2', '3');
INSERT INTO map_group VALUES ('3', '4');
INSERT INTO map_group VALUES ('4', '5');
INSERT INTO map_group VALUES ('5', '1');

-- ----------------------------
-- Table structure for `map_logs`
-- ----------------------------
DROP TABLE IF EXISTS `map_logs`;
CREATE TABLE `map_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL COMMENT '登录id',
  `action` varchar(500) NOT NULL COMMENT '进行的操作',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='日志信息表';

-- ----------------------------
-- Records of map_logs
-- ----------------------------

-- ----------------------------
-- Table structure for `map_other`
-- ----------------------------
DROP TABLE IF EXISTS `map_other`;
CREATE TABLE `map_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oname` varchar(50) NOT NULL COMMENT '名称',
  `ocontent` text NOT NULL COMMENT '内容',
  `svar` varchar(50) DEFAULT NULL COMMENT '备用字段1',
  `nvar` int(10) DEFAULT NULL COMMENT '备用字段2',
  `fvar` decimal(12,2) DEFAULT NULL COMMENT '备用字段3',
  `uid` int(10) NOT NULL COMMENT '创建人ID',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='地图系统其它信息';

-- ----------------------------
-- Records of map_other
-- ----------------------------
INSERT INTO map_other VALUES ('22', '关于我们', '<h2>&nbsp; &nbsp; &nbsp;<span style=\"color:#009900;font-family:NSimSun;font-size:24px;\"> &nbsp;我们都是中国人，来自同一个国家！我爱你中国！</span></h2>', null, null, null, '1', '2013-04-13 15:47:15');
INSERT INTO map_other VALUES ('23', 'about_us', '<img src=\"http://www.map.tmc/admin/js/kindeditor/attached/2013/04/20130421214936_40020.png\" alt=\"\" border=\"0\" /><img src=\"http://www.map.tmc/admin/js/kindeditor/plugins/emoticons/10.gif\" alt=\"\" border=\"0\" /><p>第三方山东分舵是否 发斯蒂芬斯蒂芬 第三方斯蒂芬斯蒂芬斯蒂芬</p>\r\n<p>&nbsp;</p>\r\n<p>斯蒂芬斯蒂芬</p>\r\n<p>&nbsp;</p>\r\n<p>第三方斯蒂芬的萨芬</p>', null, null, null, '0', '2013-04-21 21:50:17');
INSERT INTO map_other VALUES ('24', 'friends', 'http://www.shwhmap.com', '上海文化地图系统', null, null, '0', '2013-04-21 22:52:20');
INSERT INTO map_other VALUES ('27', 'content_us', '有任何意见或建议请联系我们：电话：18701412795 898780<br />', null, null, null, '0', '2013-04-23 11:35:43');

-- ----------------------------
-- Table structure for `map_photo`
-- ----------------------------
DROP TABLE IF EXISTS `map_photo`;
CREATE TABLE `map_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `out_id` varchar(30) DEFAULT NULL COMMENT '外部引用id',
  `describe` varchar(300) DEFAULT NULL COMMENT '文字描述',
  `img_name` varchar(50) DEFAULT NULL,
  `img_url` varchar(200) DEFAULT NULL COMMENT '大图片的URL',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='信息管理';

-- ----------------------------
-- Records of map_photo
-- ----------------------------
INSERT INTO map_photo VALUES ('20', '27', '2222', '落日', '/upload/1.jpg', '2013-04-22 14:48:30');
INSERT INTO map_photo VALUES ('21', '27', '2222222', '大海', '/upload/2.jpg', '2013-04-22 14:48:32');
INSERT INTO map_photo VALUES ('22', '27', 'CCCC', '白云', '/upload/3.jpg', '2013-04-22 14:48:34');
INSERT INTO map_photo VALUES ('23', '27', 'DDDD', 'aaaa ', '/upload/2.jpg', '2013-04-22 14:48:38');
INSERT INTO map_photo VALUES ('24', '27', 'CCC', '小白', '/upload/4.jpg', '2013-04-22 14:55:38');
INSERT INTO map_photo VALUES ('25', '37', '测试', 'test.jpg', 'upoad/test.jpg', '2013-04-26 13:04:46');
INSERT INTO map_photo VALUES ('27', '37', 'test3', 'test2.jpg', 'upoad/test2.jpg', '2013-04-26 13:15:16');
INSERT INTO map_photo VALUES ('28', '35', 'aaa', 'test2 (1).jpg', 'upoad/test2 (1).jpg', '2013-04-26 13:20:55');
INSERT INTO map_photo VALUES ('29', '35', 'cccc', 'cccc.jpg', 'upoad/cccc.jpg', '2013-04-26 13:21:48');
INSERT INTO map_photo VALUES ('30', '31', 'fff', 'est2.jpg', 'upoad/est2.jpg', '2013-04-26 13:22:11');

-- ----------------------------
-- Table structure for `map_user`
-- ----------------------------
DROP TABLE IF EXISTS `map_user`;
CREATE TABLE `map_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phonenum` varchar(15) NOT NULL COMMENT '手机号',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

-- ----------------------------
-- Records of map_user
-- ----------------------------
INSERT INTO map_user VALUES ('20', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '13890121902', '2013-04-26 13:01:43');
