SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS CosmicAssets;
CREATE DATABASE CosmicAssets;

USE CosmicAssets;

CREATE TABLE cart (
  id int(8) NOT NULL,
  product_id int(2) NOT NULL,
  cust_id int(6) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE products (
  product_id int(2) NOT NULL,
  name varchar(255) NOT NULL,
  planet_type varchar(255) NOT NULL,
  description varchar(2550) NOT NULL,
  image text NOT NULL,
  price double(10,2) NOT NULL,
  PRIMARY KEY (product_id)
);

CREATE TABLE cust_info (
  cust_id int(6),
  fname varchar(50),
  lname varchar(50),
  email varchar(255),
  pnumber int(10),
  PRIMARY KEY (cust_id)
);

CREATE TABLE transaction_history (
  cust_id int(6),
  ccname varchar(255),
  ccnumber bigint(16),
  valid_thru int(4),
  cvv int(3),
  charge varchar(20),
  PRIMARY KEY (cust_id)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON CosmicAssets.cart TO dbadmin@localhost;
GRANT all privileges ON CosmicAssets.products TO dbadmin@localhost;
GRANT all privileges ON CosmicAssets.cust_info TO dbadmin@localhost;
GRANT all privileges ON CosmicAssets.transaction_history TO dbadmin@localhost;

INSERT INTO products (product_id, name, planet_type, description, image, price) VALUES
(1, 'Mercury', 'Rock Planet', 'Add Mercury Description Here', 'product-images/Mercury.jpg', 1.00),
(2, 'Venus', 'Rock Planet', 'Add Venus Description Here', 'product-images/Venus.jpg', 5.00),
(3, 'Mars', 'Rock Planet', 'Add Mars Description Here', 'product-images/Mars.jpg', 50.00),
(4, 'Jupiter', 'Gas Giant', 'Add Jupiter Description Here', 'product-images/Jupiter.jpg', 100.00),
(5, 'Saturn', 'Gas Giant', 'Add Saturn Description Here', 'product-images/Saturn.jpg', 500.00),
(6, 'Uranus', 'Ice Giant', 'Add Uranus Description Here', 'product-images/Uranus.jpg', 1000.00),
(7, 'Neptune', 'Ice Giant', 'Add Neptune Description Here', 'product-images/Neptune.jpg', 5000.00),
(8, 'Pluto', 'Dwarf Planet', 'Add Pluto Description Here', 'product-images/Pluto.jpg', 10000.00),
(9, 'Ceres', 'Dwarf Planet', 'Add Ceres Description Here', 'product-images/Ceres.jpg', 50000.00),
(10, 'Haumea', 'Dwarf Planet', 'Add Haumea Description Here', 'product-images/Haumea.jpg', 10.00)
;

ALTER TABLE cart
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE products
  MODIFY product_id int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;