CREATE DATABASE project_manager;
USE project_manager;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(15) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL
);

INSERT INTO users (username, password, email)
VALUES ('admin', 'root', 'admin@example.com');

CREATE TABLE tasks (
   id INT AUTO_INCREMENT PRIMARY KEY,
   title VARCHAR(255) NOT NULL,
   description VARCHAR(255),
   end_date DATE
);