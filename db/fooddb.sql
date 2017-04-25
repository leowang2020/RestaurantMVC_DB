DROP DATABASE IF EXISTS restaurant_db;

CREATE DATABASE restaurant_db;

USE restaurant_db;
 
CREATE TABLE users (
  userID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  isAdmin           TINYINT(1)     NOT NULL   DEFAULT 0,             
  PRIMARY KEY (userID)
);

CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);


CREATE TABLE foods (
  foodID           INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID       INT(11)        NOT NULL,
  imgID            VARCHAR(20)    NOT NULL   UNIQUE,
  foodName         VARCHAR(255)   NOT NULL,
  foodPrice        DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (foodID)
);


INSERT INTO categories VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Drink');


INSERT INTO foods VALUES
(1, 1, '101', 'Fresh Start Breakfast', '8.99'),
(2, 1, '102', 'Grandpa Country Fried Breakfast', '9.99'),
(3, 1, '103', 'The Cracker Barrel CountryBoy', '10.99'),
(4, 2, '104', 'Bento Box', '15.99'),
(5, 2, '105', 'Grill Chicken and Fruit Salad', '19.99'),
(6, 3, '106', 'Pita & Grill', '29.99'),
(7, 3, '107', 'Sushi Boat', '59.99'),
(8, 4, '108', 'Magerita', '15.99'),
(9, 4, '109', 'Hot Tea', '3.99'),
(10, 4, '110', 'Fresh Juice', '5.99');

INSERT INTO users (userID, emailAddress, password, firstName, lastName, isAdmin) VALUES
(1, 'admin@yahoo.com', '$2y$10$JRIII.sSHoatOvARajUvqu5y3Vo.AFI5zPNB2CcEunVjlkqXBrJuy', 'admin', 'admin', 1),
(2, 'peter@yahoo.com', '$2y$10$JRIII.sSHoatOvARajUvqu5y3Vo.AFI5zPNB2CcEunVjlkqXBrJuy', 'Peter', 'Lee', 0);

GRANT SELECT, INSERT, DELETE, UPDATE
ON restaurant_db.*
TO admin@localhost
IDENTIFIED BY 'pass@word';


GRANT SELECT
ON foods
TO peter@localhost
IDENTIFIED BY 'pass@word';
