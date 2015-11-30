DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`(
  user_id CHAR(1) PRIMARY KEY,
  user_email VARCHAR(16),
  user_name VARCHAR(32),
  user_kulliyah CHAR(5),
  user_country VARCHAR(16),
  user_password VARCHAR(16),
  user_image_link VARCHAR(32)
);

INSERT INTO `users` VALUES ('1','1@mail.com','Mohammad','KICT','Malaysia','123','images/1.jpg');
INSERT INTO `users` VALUES ('2','2@mail.com','Khalid','AIKOL','Pakistan','456','images/2.jpg');
INSERT INTO `users` VALUES ('3','3@mail.com','Hussain','IRKHS','Morocco','789','images/3.jpg');