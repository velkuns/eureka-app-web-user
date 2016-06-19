CREATE TABLE `user_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_pseudo` varchar(45) CHARACTER SET utf8 NOT NULL,
  `user_firstname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `user_lastname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `user_date_register` datetime DEFAULT NULL,
  `user_is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `user_date_activation` datetime DEFAULT NULL,
  `user_code_activation` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `user_avatar` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'avatar05.png',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
