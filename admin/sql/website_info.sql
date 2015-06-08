CREATE TABLE `website_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website_id` int(11) DEFAULT '0' COMMENT '网站id',
  `title` varchar(255) DEFAULT '' COMMENT '网站标题',
  `keywords` varchar(500) DEFAULT '' COMMENT '关键字',
  `desc` varchar(1000) DEFAULT '' COMMENT '网站描述',
  `free_phone` varchar(100) DEFAULT '' COMMENT '免费电话',
  `fix_phone` varchar(100) DEFAULT '' COMMENT '固定电话',
  `mobile` varchar(100) DEFAULT '' COMMENT '手机',
  `meta` varchar(500) DEFAULT NULL COMMENT '自定义meta',
  `bcode` varchar(1000) DEFAULT '' COMMENT '底部代码',
  `created_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_time` int(11) DEFAULT '0' COMMENT '更新时间',
  `status` int(5) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

