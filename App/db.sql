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
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO tasks (title, description, start_date, deadline, user_id)
VALUES
('Task 1', 'Description 1', '2021-01-01', '2021-01-10', 1),
('Task 2', 'Description 2', '2021-01-05', '2021-01-15', 1),
('Task 3', 'Description 3', '2021-01-10', '2021-01-20', 1);


CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    owner_id INT NOT NULL,
    FOREIGN KEY (owner_id) REFERENCES users(id)
);

CREATE TABLE project_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    user_id INT NOT NULL,
    description TEXT,
    start_date DATE,
    due_date DATE,
    status ENUM('pending', 'completed') DEFAULT 'pending',
    FOREIGN KEY (project_id) REFERENCES projects(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO projects (name, owner_id)
VALUES ('Project 1', 1);

INSERT INTO project_users (project_id, user_id)
VALUES (1, 1);

INSERT INTO tasks (project_id, user_id, description)
VALUES
(1, 1, 'Task 1'),
(1, 1, 'Task 2'),
(1, 1, 'Task 3');

/* Projekti stāv 'projects' ceļā, kas būs 'tasks' vietā, kur zem projekta nosaikuma ir attēlotas lietotāju bildes. Projektu izkārtojums lapā pašlaik nav svarīgs, bet galvenā ideja ir lai ir uzraksts/nosaukums augšā, pa labi apakšā ir poga un kad peles kursors ir pār to tā paliek sarkana, jo ar to var izdzēst projektu. Projekta sasaistīšana ar lietotāju droši vien arī notiks ar 'project_id' vērtību, piem tabula TASKS - | id | project_id | user_id (identificēs lietotāju, kas ir atbildīgs par šī uzdevuma pildīšanu, ne to, kam pieder projekts kaut vai tas ir iespējams, ja lietotājs uzņemās atbildību) | description (title nevajag manuprāt) | start_date | due_date | status | un tabula PROJECTS - | id | name | owner_id | un tabula PROJECT_USERS - | id | project_id | user_id | */



