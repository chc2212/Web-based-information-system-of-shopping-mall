SET FOREIGN_KEY_CHECKS=0;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `play_orderitems`;
CREATE TABLE `play_orderitems` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `product_idx` int(11) NOT NULL,
  `customer_idx` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `play_orderitems` VALUES ('2', '2', '7', '2', '2015-06-22 19:59:50');
INSERT INTO `play_orderitems` VALUES ('3', '3', '7', '1', '2015-06-24 19:59:41');
INSERT INTO `play_orderitems` VALUES ('4', '5', '7', '3', '2015-06-25 19:59:41');
INSERT INTO `play_orderitems` VALUES ('5', '13', '7', '1', '2015-07-01 20:59:41');