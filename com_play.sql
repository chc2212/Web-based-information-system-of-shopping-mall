
SET FOREIGN_KEY_CHECKS=0;

-- --------------------------------------------------------


DROP TABLE IF EXISTS `play_relation`;
CREATE TABLE `play_relation` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `product_idx1` int(11) NOT NULL,
  `product_name1` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `product_idx2` int(11) NOT NULL,
  `product_name2` varchar(50) COLLATE latin1_general_ci NOT NULL,  
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



--
-- Table structure for table `play_cart`
--
DROP TABLE IF EXISTS `play_cart`;
CREATE TABLE `play_cart` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `product_idx` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_cnt` tinyint(4) DEFAULT NULL,
  `reg_time` datetime DEFAULT NULL,
  `order_idx` int(11)  DEFAULT NULL,
  `is_order` varchar(2) DEFAULT NULL,
  `is_delete` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




--
-- Table structure for table `play_order`
--
DROP TABLE IF EXISTS `play_order`;
CREATE TABLE `play_order` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone_num` varchar(20) DEFAULT NULL,
  `order_name` varchar(50) DEFAULT NULL,
  `address_1` varchar(200) DEFAULT NULL,
  `phone_number_1` varchar(20) DEFAULT NULL,
  `receve_name` varchar(50) DEFAULT NULL,
  `reg_time` datetime DEFAULT NULL,
  `pay_type` varchar(20) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `is_delete` varchar(2) DEFAULT NULL,
  `card_num` varchar(30) DEFAULT NULL,
  `card_pass` varchar(5) DEFAULT NULL,
  `card_desYear` varchar(4) DEFAULT NULL,
  `card_desMonth` varchar(2) DEFAULT NULL,
  `Depositor` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `play_orderitems`
--

DROP TABLE IF EXISTS `play_orderitems`;
CREATE TABLE `play_orderitems` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `product_idx` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_sales` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_idx` int(11) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- ----------------------------
-- Table structure for `play_product`
-- ----------------------------
DROP TABLE IF EXISTS `play_product`;
CREATE TABLE `play_product` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `category` tinyint(4) NOT NULL,
  `price` int(11) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of play_product
-- ----------------------------
INSERT INTO `play_product` VALUES ('2', 'soccer-clothes', '1', '280', '2015-06-22 19:59:41');
INSERT INTO `play_product` VALUES ('3', 'soccer-shoes', '1', '940', '2015-06-22 19:59:58');
INSERT INTO `play_product` VALUES ('4', 'soccer-ball2', '1', '120', '2015-06-22 20:00:18');
INSERT INTO `play_product` VALUES ('5', 'baseball-bat', '2', '350', '2015-06-22 20:00:32');
INSERT INTO `play_product` VALUES ('6', 'baseball-ball', '2', '40', '2015-06-22 20:00:56');
INSERT INTO `play_product` VALUES ('7', 'baseball-clothes', '2', '490', '2015-06-22 20:01:05');
INSERT INTO `play_product` VALUES ('8', 'baseball-shoes', '2', '350', '2015-06-22 20:01:13');
INSERT INTO `play_product` VALUES ('9', 'basketball-ball', '3', '280', '2015-06-22 20:01:58');
INSERT INTO `play_product` VALUES ('10', 'basketball-shoes', '3', '210', '2015-06-22 20:02:06');
INSERT INTO `play_product` VALUES ('11', 'basketball-shirts', '3', '270', '2015-06-22 20:02:17');
INSERT INTO `play_product` VALUES ('12', 'basketball-ball', '3', '700', '2015-06-22 20:02:21');
INSERT INTO `play_product` VALUES ('13', 'health-shoes', '4', '310', '2015-06-22 20:02:35');
INSERT INTO `play_product` VALUES ('14', 'health-clothes', '4', '130', '2015-06-22 20:02:41');
INSERT INTO `play_product` VALUES ('15', 'health-gloves', '4', '500', '2015-06-22 20:03:17');
INSERT INTO `play_product` VALUES ('16', 'health-gloves2', '4', '340', '2015-06-22 20:51:41');
INSERT INTO `play_product` VALUES('17', 'soccer-ball', '1', 140, '2015-06-24 20:00:19');

-- ----------------------------
-- Table structure for `play_product_category`
-- ----------------------------
DROP TABLE IF EXISTS `play_product_category`;
CREATE TABLE `play_product_category` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of play_product_category
-- ----------------------------
INSERT INTO `play_product_category` VALUES ('1', 'soccer', '2015-06-22 19:58:41');
INSERT INTO `play_product_category` VALUES ('2', 'baseball', '2015-06-22 19:58:45');
INSERT INTO `play_product_category` VALUES ('3', 'basketball', '2015-06-22 19:58:48');
INSERT INTO `play_product_category` VALUES ('4', 'health', '2015-06-22 19:58:51');

-- ----------------------------
-- Table structure for `play_product_sales`
-- ----------------------------
DROP TABLE IF EXISTS `play_product_sales`;
CREATE TABLE `play_product_sales` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `gidx` int(11) NOT NULL,
  `rate` smallint(6) NOT NULL,
  `sale_start` date NOT NULL,
  `sale_end` date NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of play_product_sales
-- ----------------------------
INSERT INTO `play_product_sales` VALUES ('1', '3', '5', '2015-06-08', '2015-06-29', '2015-06-22 22:48:05');
INSERT INTO `play_product_sales` VALUES ('2', '2', '3', '2015-06-10', '2015-06-19', '2015-06-22 22:48:18');
INSERT INTO `play_product_sales` VALUES ('3', '7', '10', '2015-06-17', '2015-06-27', '2015-06-22 23:44:43');

-- ----------------------------
-- Table structure for `play_user`
-- ----------------------------
DROP TABLE IF EXISTS `play_user`;
CREATE TABLE `play_user` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL DEFAULT '',
  `first_name` varchar(20) NOT NULL DEFAULT '',
  `last_name` varchar(20) NOT NULL,
  `age` smallint(6) NOT NULL,
  `salary` int(11) NOT NULL,
  `type` smallint(6) NOT NULL DEFAULT '1',
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of play_user
-- ----------------------------
INSERT INTO `play_user` VALUES ('1', 'admin01', '1111', 'play', 'admin', '30', '99999', '9', '2015-06-22 15:08:25');
INSERT INTO `play_user` VALUES ('5', 'user01', '1111', 'play', 'user', '33', '333333', '1', '2015-06-23 11:57:25');
INSERT INTO `play_user` VALUES ('6', 'manager01', '1111', 'play', 'manager', '33', '1111', '5', '2015-06-23 13:25:43');
INSERT INTO `play_user` VALUES ('7', 'customer01', '1111', 'play', 'customer', '33', '333333', '2', '2015-06-23 11:57:25');


-- ----------------------------
-- Table structure for `play_related_items`
-- ----------------------------
DROP TABLE IF EXISTS `play_related_items`;
CREATE TABLE `play_related_items` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
   `order_idx` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL,
  `c7` int(11) NOT NULL,
  `c8` int(11) NOT NULL,
  `c9` int(11) NOT NULL,
  `c10` int(11) NOT NULL,
  `c11` int(11) NOT NULL,
  `c12` int(11) NOT NULL,
  `c13` int(11) NOT NULL,
  `c14` int(11) NOT NULL,
  `c15` int(11) NOT NULL,
  `c16` int(11) NOT NULL,
  `c17` int(11) NOT NULL,
  `c18` int(11) NOT NULL,
  `c19` int(11) NOT NULL,
  `c20` int(11) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `play_related_items` VALUES ('1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');

