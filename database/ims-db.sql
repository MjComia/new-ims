CREATE TABLE `customer_table` (
  `customer_id` int PRIMARY KEY,
  `customer_name` varchar(255),
  `address` text,
  `contact_number` varchar(255),
  `isle_number` int,
  `shelf` int
);

CREATE TABLE `product_table` (
  `product_id` int PRIMARY KEY,
  `brand_model` varchar(255),
  `supplier_id` int,
  `sales` int
);

CREATE TABLE `suppliers_table` (
  `supplier_id` int PRIMARY KEY,
  `supplier_name` varchar(255),
  `branch_address` text
);

CREATE TABLE `transactions_table` (
  `transaction_id` int PRIMARY KEY,
  `customer_id` int,
  `product_id` int,
  `quantity` int,
  `total_price` decimal,
  `purchase_date` datetime
);

CREATE TABLE `stock_table` (
  `product_id` int PRIMARY KEY,
  `stock_quantity` int
);

ALTER TABLE `product_table` ADD FOREIGN KEY (`supplier_id`) REFERENCES `suppliers_table` (`supplier_id`);

ALTER TABLE `transactions_table` ADD FOREIGN KEY (`customer_id`) REFERENCES `customer_table` (`customer_id`);

ALTER TABLE `transactions_table` ADD FOREIGN KEY (`product_id`) REFERENCES `product_table` (`product_id`);

ALTER TABLE `stock_table` ADD FOREIGN KEY (`product_id`) REFERENCES `product_table` (`product_id`);

-- Insert Suppliers
INSERT INTO suppliers_table (supplier_id, supplier_name, branch_address) VALUES
(1, 'Yamaha Motors PH', 'Makati City'),
(2, 'Honda Philippines', 'Quezon City'),
(3, 'Kawasaki Trading', 'Cebu City');

-- Insert Products (Motorcycles)
INSERT INTO product_table (product_id, brand_model, supplier_id, sales) VALUES
(101, 'Yamaha Mio i125', 1, 50),
(102, 'Honda Click 125i', 2, 70),
(103, 'Kawasaki Barako II', 3, 40);

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
(103, 8);
