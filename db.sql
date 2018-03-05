CREATE TABLE IF NOT Exists `ruc_users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `refered_by` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL,
  CONSTRAINT `user_login_PK` PRIMARY KEY (`user_id`),
  CONSTRAINT `user_details_FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT Exists `ruc_signup_token` (
  `token` varchar(32) NOT NULL,
  `genreated_by` int(11) NOT NULL,
  `generated_for` varchar(100) NOT NULL,
  `is_used` int(1) DEFAULT 0,
  `created_at` datetime NOT NULL,
   CONSTRAINT courses_PK PRIMARY KEY (`token`),
   CONSTRAINT `signup_token_FK_generated_by` FOREIGN KEY (`genreated_by`) REFERENCES `user_login`(`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;