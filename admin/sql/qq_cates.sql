CREATE TABLE `qq_cates` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) DEFAULT '' COMMENT '类别名称',
  `cate_mark` varchar(100) DEFAULT '' COMMENT '类别标识',
  `created_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_time` int(11) DEFAULT '0' COMMENT '更新时间',
  `status` int(2) DEFAULT '1' COMMENT '0删除，1未删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
