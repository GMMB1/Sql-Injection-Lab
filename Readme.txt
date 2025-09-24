# SQL Injection Lab

## Overview

This is a **SQL Injection vulnerable lab** designed for educational purposes.  
It allows students or security enthusiasts to safely **practice SQL injection attacks** in a controlled environment.  

> ⚠️ **Warning:** This lab contains intentionally insecure code. Do **not** deploy it in production.

---

## Purpose

- Teach **SQL injection concepts** and how attackers exploit them.  
- Demonstrate the impact of poorly coded SQL queries.  
- Help learners understand the importance of **prepared statements and input validation**.

---

## Requirements

To run this lab, you need:

- Docker ≥ 20.x  
- Docker Compose ≥ 1.29.x  
- A basic understanding of PHP and MySQL  

---

## Project Structure

sql-injection-lab/
│
├─ docker-compose.yml # Docker services for Nginx, PHP-FPM, MySQL
├─ php.dockerfile # PHP 8 FPM build with mysqli
├─ default.conf # Nginx configuration
├─ index.html # Login page
├─ login.php # Vulnerable PHP login script
├─ users.sql # Initial database users
├─ sql_injection_lab2/ # Project source code folder
└─ mysql/ # Optional MySQL setup folder



---

## Setup Instructions

1. Clone this repository:


git clone <your-repo-url>
cd sql-injection-lab/sql-injection-lab


2. Build and start Docker containers:

sudo docker-compose up --build -d

3. Open your browser and navigate to:


http://127.0.0.1:8080


## Database Initialization Issue (`users.sql`)

If you encounter errors like:

Table 'injection_lab.users' doesn't exist
or
Can't create database 'injection_lab'; database exists

Follow these steps to fix it:

1. Stop the containers:

sudo docker-compose down

2. Remove the existing MySQL volume (this deletes old database data):

docker volume ls
docker volume rm sql_injection_lab2_mysql_data

3. Make sure the `users.sql` file exists in your project root. It should contain:

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

INSERT INTO users (username, password) VALUES
('admin','admin123'),
('user','pass123');

4. Start the containers again:

sudo docker-compose up --build -d

5. Verify the table exists:

sudo docker exec -it <mysql_container_name> mysql -u dbuser -p
# Enter password: dbpassword
USE injection_lab;
SHOW TABLES;
SELECT * FROM users;

👨‍💻 Author: GMM

🔗 Maintainer: GMM (https://github.com/GMMB1)

☕️ Support: https://ko-fi.com/ghostman77506







