-- users.sql
CREATE DATABASE injection_lab;
USE injection_lab;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

INSERT INTO users (username, password) VALUES
('admin', 'admin123'),
('user1', 'pass123'),
('user2', 'pass456');
