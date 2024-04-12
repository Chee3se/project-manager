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
/*
Sākotnēji izstrādā tīmekļa vietnes pamata dizainu un lietotāja saskarni, kurā iekļauj šādas funkcionalitātes:
a. Lietotāja reģistrācija un pieteikšanās sistēma.

b. Darba uzdevumu pievienošana, kur katram uzdevumam ir šādas informācijas vienības:
Nosaukums
Apraksts
Termiņš

c. Uzdevumu saraksta attēlošana, kur lietotāji var apskatīt savus pievienotos uzdevumus.

d. Uzdevumu atzīmēšana kā pabeigtus vai nepabeigtus.

e. Uzdevumu dzēšana.

f. Darba plānošanas kalendārs, kur var apskatīt visus uzdevumu termiņus.

g. Meklēšanas funkcija, lai ātri atrastu konkrētu uzdevumu.

Izveido datu bāzi, kurā tiek glabāti lietotāju reģistrācijas dati un uzdevumu informācija. Lietotājiem jāvar piekļūt savam personīgajam kontam un datiem, un jābūt iespējai atgūt paroli, ja to aizmirsuši.

Nodrošini, lai tīmekļa vietne būtu responsīva un pielāgojas dažādām ierīcēm un ekrāna izmēriem.

Papildini tīmekļa vietni ar kādu papildu funkcionalitāti, piemēram, iespēju izveidot projektus vai kategorijas uzdevumiem, sadalīt uzdevumus atbilstoši to prioritātei vai sarežģītībai, un iestatīt atgādinājumus termiņu tuvošanās gadījumā.
*/

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description TEXT,
    deadline DATE,
    completed BOOLEAN DEFAULT 0,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO tasks (title, description, deadline, user_id)
VALUES ('Task 1', 'Description 1', '2021-12-31', 1),
       ('Task 2', 'Description 2', '2021-12-31', 1),
       ('Task 3', 'Description 3', '2021-12-31', 1);




