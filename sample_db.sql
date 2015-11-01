DROP TABLE IF EXISTS `products`;

CREATE TABLE `products`(
  prod_id     VARCHAR(6),
  vend_id     VARCHAR(50),
  prod_name   VARCHAR(20) NOT NULL,
  -- The following is used for money, it means
  -- 13 digits including ones after decimal point
  -- 2 digits after the decimal point
  prod_price  NUMERIC(13, 2),
  PRIMARY KEY (prod_id)
);


-- Sample Data
INSERT INTO `products` VALUES ('BNBG01','BRS01','Fish bean bag toy',  '3.49');
INSERT INTO `products` VALUES ('BNBG02','BRS01','Bird bean bag toy',  '3.49');
INSERT INTO `products` VALUES ('BNBG03','BRS01','Rabbit bean bag toy','3.49');
INSERT INTO `products` VALUES ('BR01',  'DLL01','8 inch teddy bear',  '5.99');
INSERT INTO `products` VALUES ('BR02',  'DLL01','12 inch teddy bear', '8.99');
INSERT INTO `products` VALUES ('BR03',  'DLL01','18 inch teddy bear', '11.99');
INSERT INTO `products` VALUES ('RGAN01','DLL01','Raggedy Ann',        '4.99');
INSERT INTO `products` VALUES ('RYL01', 'FNG01','King doll',          '9.49');
INSERT INTO `products` VALUES ('RYL02', 'FNG01','Queen doll',         '9.49');