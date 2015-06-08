CREATE TABLE `website_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) DEFAULT '' COMMENT '开户行',
  `bank_user` varchar(100) DEFAULT '' COMMENT '开户人',
  `bank_account` varchar(100) DEFAULT '' COMMENT '账号',
  `created_time` int(11) DEFAULT '0',
  `updated_time` int(11) DEFAULT '0',
  `status` int(5) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
