CREATE TABLE `website`( 
	`id` INT(11) NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) DEFAULT '' COMMENT '网站名称', 
	`url` VARCHAR(255) DEFAULT '' COMMENT '网站url', 
	`created_time` INT(11) DEFAULT 0 COMMENT '创建时间', 
	`updated_time` INT(11) DEFAULT 0 COMMENT '更新时间', 
	`status` INT(5) DEFAULT 1 COMMENT '状态', 
	`users` VARCHAR(100) DEFAULT '' COMMENT '管理账号',
	`passwd` VARCHAR(100) DEFAULT '' COMMENT '管理密码',
   	PRIMARY KEY (`id`) 
) ENGINE=MYISAM CHARSET=utf8 COLLATE=utf8_general_ci; 
