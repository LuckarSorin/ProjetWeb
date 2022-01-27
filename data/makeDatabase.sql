DROP DATABASE IF EXISTS projetWeb;
CREATE DATABASE projetWeb;

create table IF NOT EXISTS projetWeb.users ( 
    userid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username varchar(32) NOT NULL,
    pwd varchar(64) NOT NULL
);

create table IF NOT EXISTS projetWeb.edits (
    equipid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(32) NOT NULL,
    desc varchar(16384) NOT NULL,
    empreint varchar(32) DEFAULT NULL,
    disp bool NOT NULL DEFAULT 0
);

-- ---Insertion for example and tests
DELETE FROM projetWeb.users;
ALTER TABLE projet.users AUTO_INCREMENT = 1;

DELETE FROM projetWeb.edits;
ALTER TABLE projet.edits AUTO_INCREMENT = 1;

-- projet.users

INSERT INTO projet.users(username,pwd) VALUES("admin","admin"); -- administrateur
INSERT INTO projet.users(username,pwd) VALUES("prof1","prof1"); -- prof1
INSERT INTO projet.users(username,pwd) VALUES("prof2","prof2"); -- prof2
INSERT INTO projet.users(username,pwd) VALUES("prof3","prof3"); -- prof3
INSERT INTO projet.users(username,pwd) VALUES("prof4","prof4"); -- prof4
INSERT INTO projet.users(username,pwd) VALUES("prof5","prof5"); -- prof5

-- projet.edits

INSERT INTO projet.edits(name,desc) VALUES ("informatik","salle informatique");
INSERT INTO projet.edits(name,desc) VALUES ("reunion","salle de réunion");
INSERT INTO projet.edits(name,desc) VALUES ("calculator","temps de calcul sur un super calculateur");
INSERT INTO projet.edits(name,desc) VALUES ("amphi","salle de conférence");
INSERT INTO projet.edits(name,desc) VALUES ("kino","salle de vidéo projection");
INSERT INTO projet.edits(name,desc) VALUES ("hdmi3","cable hdmi de 3 mètres");
