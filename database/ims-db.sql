-- CREATE TABLE `customer_table` (
-- `customer_id` int PRIMARY KEY AUTO_INCREMENT,
--   `customer_name` varchar(255),
--   `address` text,
--   `contact_number` varchar(255),
--   `isle_number` int,
--   `shelf` int
-- );

-- CREATE TABLE `product_table` (
--   `product_id` int PRIMARY KEY  AUTO_INCREMENT,
--   `brand_model` varchar(255),
--   `supplier_id` int,
--   `sales` int
-- );

-- CREATE TABLE `suppliers_table` (
--   `supplier_id` int PRIMARY KEY  AUTO_INCREMENT,
--   `supplier_name` varchar(255),
--   `branch_address` text
-- );

-- CREATE TABLE `transactions_table` (
--   `transaction_id` int PRIMARY KEY AUTO_INCREMENT,
--   `customer_id` int,
--   `product_id` int,
--   `quantity` int,
--   `total_price` decimal,
--   `purchase_date` date
-- );

-- CREATE TABLE `stock_table` (
--   `product_id` int PRIMARY KEY AUTO_INCREMENT,
--   `stock_quantity` int
-- );

-- ALTER TABLE `product_table` ADD FOREIGN KEY (`supplier_id`) REFERENCES `suppliers_table` (`supplier_id`);

-- ALTER TABLE `transactions_table` ADD FOREIGN KEY (`customer_id`) REFERENCES `customer_table` (`customer_id`);

-- ALTER TABLE `transactions_table` ADD FOREIGN KEY (`product_id`) REFERENCES `product_table` (`product_id`);

-- ALTER TABLE `stock_table` ADD FOREIGN KEY (`product_id`) REFERENCES `product_table` (`product_id`);

-- -- Insert Suppliers
-- INSERT INTO suppliers_table (supplier_id, supplier_name, branch_address) VALUES
-- (1, 'Yamaha Motors PH', 'Makati City'),
-- (2, 'Honda Philippines', 'Quezon City'),
-- (3, 'Kawasaki Trading', 'Cebu City'),
-- (4, 'Suzuki Philippines', 'Davao City'),
-- (5, 'KTM Philippines', 'Taguig City'),
-- (6, 'CFMoto Philippines', 'Laguna Province');
-- -- Insert Products (Motorcycles)
-- INSERT INTO product_table (product_id, brand_model, supplier_id, sales) VALUES
-- (101, 'Yamaha Mio i125', 1, 50),
-- (102, 'Honda Click 125i', 2, 70),
-- (103, 'Kawasaki Barako II', 3, 40),
-- (104, 'Suzuki Raider R150 Fi', 4, 60),
-- (105, 'Suzuki Burgman Street 125', 4, 45),
-- (106, 'KTM Duke 200', 5, 30),
-- (107, 'KTM RC 390', 5, 20),
-- (108, 'CFMoto 300NK', 6, 25),
-- (109, 'CFMoto 400NK', 6, 15);

-- -- Insert Customers
-- INSERT INTO customer_table (customer_id, customer_name, address, contact_number, isle_number, shelf) VALUES
-- (1, 'John Cruz', 'San Juan, Metro Manila', '09171234567', 1, 3),
-- (2, 'Maria Lopez', 'Davao City', '09283456789', 2, 5),
-- (3, 'Alex Reyes', 'Baguio City', '09091239876', 3, 2);

-- -- Insert Transactions
-- INSERT INTO transactions_table (transaction_id, customer_id, product_id, quantity, total_price, purchase_date) VALUES
-- (1, 1, 101, 1, 70900.00, '2025-04-15 10:30:00'),
-- (2, 2, 102, 1, 76800.00, '2025-04-15 11:00:00'),
-- (3, 3, 103, 1, 87900.00, '2025-04-15 11:30:00');

-- -- Insert Stock
-- INSERT INTO stock_table (product_id, stock_quantity) VALUES
-- (101, 15),
-- (102, 12),
-- (103, 8),
-- (104, 10),
-- (105, 7),
-- (106, 5),
-- (107, 3),
-- (108, 4),
-- (109, 2);

-- ALTER TABLE product_table
-- ADD COLUMN price DECIMAL(10,2) AFTER brand_model;
-- UPDATE product_table
-- SET price = 79900
-- WHERE product_id = 101;

-- UPDATE product_table
-- SET price = 76800
-- WHERE product_id = 102;

-- UPDATE product_table
-- SET price = 87900
-- WHERE product_id = 103;

-- UPDATE product_table
-- SET price = 121900
-- WHERE product_id = 104;

-- UPDATE product_table
-- SET price = 83400
-- WHERE product_id = 105;

-- UPDATE product_table
-- SET price = 159000
-- WHERE product_id = 106;

-- UPDATE product_table
-- SET price = 300000
-- WHERE product_id = 107;

-- UPDATE product_table
-- SET price = 158000
-- WHERE product_id = 108;

-- UPDATE product_table
-- SET price = 219800
-- WHERE product_id = 109;

CREATE TABLE `customer_table` (
  `customer_id` int PRIMARY KEY AUTO_INCREMENT,
  `customer_name` varchar(255),
  `address` text,
  `contact_number` varchar(255),
  `isle_number` int,
  `shelf` int
);

CREATE TABLE `product_table` (
  `product_id` int PRIMARY KEY AUTO_INCREMENT,
  `brand_model` varchar(255),
  `supplier_id` int,
  `sales` int
);

CREATE TABLE `suppliers_table` (
  `supplier_id` int PRIMARY KEY AUTO_INCREMENT,
  `supplier_name` varchar(255),
  `branch_address` text
);

CREATE TABLE `transactions_table` (
  `transaction_id` int PRIMARY KEY AUTO_INCREMENT,
  `customer_id` int,
  `product_id` int,
  `quantity` int,
  `total_price` decimal,
  `purchase_date` date
);

CREATE TABLE `stock_table` (
  `product_id` int PRIMARY KEY AUTO_INCREMENT,
  `stock_quantity` int
);

ALTER TABLE `product_table` 
  ADD FOREIGN KEY (`supplier_id`) REFERENCES `suppliers_table` (`supplier_id`);

ALTER TABLE `transactions_table` 
  ADD FOREIGN KEY (`customer_id`) REFERENCES `customer_table` (`customer_id`),
  ADD FOREIGN KEY (`product_id`) REFERENCES `product_table` (`product_id`);

ALTER TABLE `stock_table` 
  ADD FOREIGN KEY (`product_id`) REFERENCES `product_table` (`product_id`);

-- Insert Suppliers
INSERT INTO suppliers_table (supplier_id, supplier_name, branch_address) VALUES
(1, 'Yamaha Motors PH', 'Makati City'),
(2, 'Honda Philippines', 'Quezon City'),
(3, 'Kawasaki Trading', 'Cebu City'),
(4, 'Suzuki Philippines', 'Davao City'),
(5, 'KTM Philippines', 'Taguig City'),
(6, 'CFMoto Philippines', 'Laguna Province');

-- Insert Products
INSERT INTO product_table (product_id, brand_model, supplier_id, sales) VALUES
(101, 'Yamaha Mio i125', 1, 50),
(102, 'Honda Click 125i', 2, 70),
(103, 'Kawasaki Barako II', 3, 40),
(104, 'Suzuki Raider R150 Fi', 4, 60),
(105, 'Suzuki Burgman Street 125', 4, 45),
(106, 'KTM Duke 200', 5, 30),
(107, 'KTM RC 390', 5, 20),
(108, 'CFMoto 300NK', 6, 25),
(109, 'CFMoto 400NK', 6, 15);

-- Insert Customers
INSERT INTO customer_table (customer_id, customer_name, address, contact_number, isle_number, shelf) VALUES
(1, 'John Cruz', 'San Juan, Metro Manila', '09171234567', 1, 3),
(2, 'Maria Lopez', 'Davao City', '09283456789', 2, 5),
(3, 'Alex Reyes', 'Baguio City', '09091239876', 3, 2);

-- Insert Transactions
INSERT INTO transactions_table (transaction_id, customer_id, product_id, quantity, total_price, purchase_date) VALUES
(1, 1, 101, 1, 70900.00, '2025-04-15 10:30:00'),
(2, 2, 102, 1, 76800.00, '2025-04-15 11:00:00'),
(3, 3, 103, 1, 87900.00, '2025-04-15 11:30:00');

-- Insert Stock
INSERT INTO stock_table (product_id, stock_quantity) VALUES
(101, 15),
(102, 12),
(103, 8),
(104, 10),
(105, 7),
(106, 5),
(107, 3),
(108, 4),
(109, 2);

-- Add price column and update
ALTER TABLE product_table
ADD COLUMN price DECIMAL(10,2) AFTER brand_model;

UPDATE product_table SET price = 79900 WHERE product_id = 101;
UPDATE product_table SET price = 76800 WHERE product_id = 102;
UPDATE product_table SET price = 87900 WHERE product_id = 103;
UPDATE product_table SET price = 121900 WHERE product_id = 104;
UPDATE product_table SET price = 83400 WHERE product_id = 105;
UPDATE product_table SET price = 159000 WHERE product_id = 106;
UPDATE product_table SET price = 300000 WHERE product_id = 107;
UPDATE product_table SET price = 158000 WHERE product_id = 108;
UPDATE product_table SET price = 219800 WHERE product_id = 109;


-- Drop old table if it exists
DROP TABLE IF EXISTS `stock_table`;

-- Recreate the stock_table
CREATE TABLE `stock_table` (
  `stock_id` INT PRIMARY KEY AUTO_INCREMENT,
  `product_id` INT,
  `stock_quantity` INT,
  FOREIGN KEY (`product_id`) REFERENCES `product_table`(`product_id`)
);

-- Insert your predefined data
INSERT INTO `stock_table` (`product_id`, `stock_quantity`) VALUES
(101, 15),
(102, 12),
(103, 8),
(104, 10),
(105, 7),
(106, 5),
(107, 3),
(108, 4),
(109, 2);
