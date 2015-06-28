CREATE TABLE `qq_sign` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `sign_title` varchar(300) DEFAULT '' COMMENT '签名名称',
  `sign_content` text COMMENT '签名内容',
  `cate_id` int(12) DEFAULT '0' COMMENT '类别ID',
  `created_time` int(11) DEFAULT '0',
  `updated_time` int(11) DEFAULT '0',
  `status` int(2) DEFAULT '1' COMMENT '0删除1未删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

