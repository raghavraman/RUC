
CREATE TABLE IF NOT Exists `user_login` (
  `user_id` int(11) NOT NULL AUTO INCREMENT,
  `email` varchar(100) DEFAULT NULL UNIQUE,
  `password` varchar(50) DEFAULT NULL,
  CONSTRAINT `user_login_PK` PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT Exists `user_details` (
  `user_id` int(11) NOT NULL UNIQUE,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `refered_by` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL,
  CONSTRAINT `user_details_FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT Exists `signup_token` (
  `token` varchar(32) NOT NULL,
  `genreated_by` int(11) NOT NULL,
  `generated_for` varchar(100) NOT NULL,
  `is_accessed` int(1) DEFAULT 0,
  `created_at` datetime NOT NULL,
   CONSTRAINT courses_PK PRIMARY KEY (`token`),
   CONSTRAINT `signup_token_FK_generated_by` FOREIGN KEY (`genreated_by`) REFERENCES `user_login` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;