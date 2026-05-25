INSERT IGNORE INTO category (id, name, description) VALUES
(1, 'Electronics', 'Headphones, speakers, gadgets and more'),
(2, 'Fashion', 'Clothing, accessories and footwear'),
(3, 'Books', 'Fiction, non-fiction and educational');

INSERT IGNORE INTO product (id, category_id, name, description, price) VALUES
(1, 1, 'Wireless Headphones', 'Experience premium sound quality with our wireless headphones. Featuring advanced noise cancellation technology, comfortable over-ear design, and up to 30 hours of battery life.', 79.99),
(2, 1, 'Bluetooth Speaker', 'Portable Bluetooth speaker with rich bass and 12-hour battery life. Perfect for outdoor adventures and home entertainment.', 59.99),
(3, 2, 'Classic Leather Jacket', 'Timeless leather jacket crafted from premium genuine leather. Features a comfortable fit and durable construction.', 149.99),
(4, 2, 'Yoga Mat Premium', 'Extra thick yoga mat with excellent grip and cushioning. Ideal for yoga, pilates, and stretching exercises.', 29.99),
(5, 3, 'Web Development Guide', 'Comprehensive guide covering modern web development technologies including HTML, CSS, JavaScript, and more.', 24.99),
(6, 1, 'Smart Plant Sensor', 'Monitor your plants health with real-time data on soil moisture, light, and temperature.', 34.99),
(7, 1, 'Wireless Mouse', 'Ergonomic wireless mouse with precision tracking and long battery life. Perfect for work and play.', 39.99),
(8, 2, 'Travel Backpack', 'Durable and lightweight backpack perfect for travel and daily use.', 49.99);

INSERT IGNORE INTO image (product_id, url, alt) VALUES
(1, 'images/headphones.webp', 'Wireless Headphones'),
(2, 'images/speaker.webp', 'Bluetooth Speaker'),
(3, 'images/jacket.webp', 'Classic Leather Jacket'),
(4, 'images/yogamat.webp', 'Yoga Mat Premium'),
(5, 'images/notebook.webp', 'Web Development Guide'),
(6, 'images/sensor.webp', 'Smart Plant Sensor'),
(7, 'images/mouse.webp', 'Wireless Mouse'),
(8, 'images/thumbnail.webp', 'Travel Backpack');
