CREATE TABLE `website_qq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` int(20) DEFAULT '0' COMMENT 'qq号码',
  `desc` varchar(100) DEFAULT '' COMMENT 'qq描述',
  `create_time` int(11) DEFAULT '0',
  `updated_time` int(11) DEFAULT '0',
  `status` int(5) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
