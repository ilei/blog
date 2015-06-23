CREATE TABLE `demand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `mobile` varchar(12) DEFAULT '',
  `mail` varchar(50) DEFAULT '',
  `com` varbinary(100) DEFAULT '',
  `con` text,
  `created_time` char(15) DEFAULT '',
  `updated_time` char(15) DEFAULT '',
  `status` int(5) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

