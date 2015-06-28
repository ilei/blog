CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '登陆密码',
  `realname` varchar(255) DEFAULT '' COMMENT '真实姓名',
  `mobile` char(15) DEFAULT '' COMMENT '电话号码',
  `salt` char(4) DEFAULT '' COMMENT '登陆salt',
  `last_login` int(15) DEFAULT '0' COMMENT '最后登录时间',
  `created_time` int(15) DEFAULT '0' COMMENT '创建时间',
  `updated_time` int(15) DEFAULT '0' COMMENT '更新时间',
  `status` int(10) DEFAULT '1' COMMENT '状态:0删除1正常',
  `email` varchar(100) DEFAULT '' COMMENT '电子邮件地址',
  `last_ip` int(11) DEFAULT '0' COMMENT '最后登陆IP',
  PRIMARY KEY (`id`),
  KEY `user_status` (`username`,`status`),
  KEY `mobile_status` (`mobile`,`status`),
  KEY `email_status` (`email`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
