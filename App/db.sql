CREATE DATABASE project_manager;
USE project_manager;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(15) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       email VARCHAR(50) NOT NULL
);

INSERT INTO users (username, password, email)
VALUES ('admin', '$2y$10$3iOJb95ihl.2PhkmacrKAeMJE/1PTJ3fhhGNuk5XG5NMAIHVOR1zC', 'admin@example.com');
/* password: root123 */
CREATE TABLE tasks (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       title VARCHAR(50) NOT NULL,
                       description TEXT,
                       start_date DATE,
                       deadline DATE,
                       status ENUM('todo', 'doing', 'done') DEFAULT 'todo',
                       user_id INT,
                       FOREIGN KEY (user_id) REFERENCES users(id)
);




INSERT INTO tasks (title, description, start_date, deadline, user_id)
VALUES ('Task 1', 'Description 1','2021-12-30', '2021-12-31', 1),
       ('Task 2', 'Description 2','2021-12-30', '2021-12-31', 1),
       ('Task 3', 'Description 3','2021-12-30', '2021-12-31', 1);

