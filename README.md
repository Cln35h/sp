# sp
only temp php and mysql
***
MYSQL logic

CREATE TABLE `users1` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `committee_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `chk_role` CHECK (`role` = 'admin' and `committee_id` is null or `role` in ('cc','cm') and `committee_id` is not null)
) 

ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


