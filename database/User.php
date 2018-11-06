<?php
$user_table = "CREATE TABLE `user` (
`user_id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'User ID',
`login_name` varchar(100) NOT NULL DEFAULT '' COMMENT 'Login Name',
`password` varchar(100) NOT NULL DEFAULT '' COMMENT 'Password',
`password_expires` datetime NOT NULL DEFAULT '2116-01-01 00:00:00' COMMENT 'Password Expiration Date',
`real_name` varchar(100) NOT NULL DEFAULT '' COMMENT 'Real Name',
`email` varchar(100) NOT NULL DEFAULT '' COMMENT 'Email',
`preferences` text COMMENT 'Preferences',
`last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Last Login',
`password_reset` varchar(50) NOT NULL COMMENT 'Password Reset',
`password_reset_time` datetime NOT NULL COMMENT 'Password Reset Time',
`last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last Update',
`last_update_user` int(6) unsigned zerofill DEFAULT '000001' COMMENT 'Last Update User',
`created` datetime DEFAULT NULL,
`deactivated` int(1) DEFAULT '0' COMMENT 'Deactivated',
`last_failed_login` datetime DEFAULT NULL,
PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

