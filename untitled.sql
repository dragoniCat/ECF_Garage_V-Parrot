CREATE DATABASE IF NOT EXISTS gvp_database;

-- DROP TABLES SI BESOIN -----------------------------------------------------------------------

/*
ALTER TABLE gvp_database.vehicule DISCARD TABLESPACE;
DROP TABLE gvp_database.vehicule;

ALTER TABLE gvp_database.avis DISCARD TABLESPACE;
DROP TABLE gvp_database.avis;

ALTER TABLE gvp_database.horaires DISCARD TABLESPACE;
DROP TABLE gvp_database.horaires;

ALTER TABLE gvp_database.services DISCARD TABLESPACE;
DROP TABLE gvp_database.services;

ALTER TABLE gvp_database.utilisateurs DISCARD TABLESPACE;
DROP TABLE gvp_database.utilisateurs;
*/

-- UTILISATEURS --------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS gvp_database.utilisateurs (
    id INT(11) NOT NULL PRIMARY KEY,
    nom VARCHAR(10) NOT NULL,
    prenom VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mdp VARCHAR(20) NOT NULL
);
INSERT INTO gvp_database.utilisateurs (id, nom, prenom, email, mdp) 
    VALUES ('1', 'Parrot', 'Vincent', 'vincent.parrot@xxx.com', '123')
    ON DUPLICATE KEY UPDATE nom='Parrot';

INSERT INTO gvp_database.utilisateurs (id, nom, prenom, email, mdp) 
    VALUES ('2', 'Doe', 'John', 'john.doe@xxx.com', 'j-doe')
    ON DUPLICATE KEY UPDATE nom='Doe';

-- Pour ajouter un nouvel employé, copier INSERT INTO et changer les valeurs en accordance

-- VEHICULES D'OCCASION DISPONIBLES ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS gvp_database.vehicule (
    nom VARCHAR(100) PRIMARY KEY,
    image VARCHAR(100),
    prix DECIMAL(8,2),
    annee DECIMAL(4,0),
    kilometrage INT,
    carburant VARCHAR(10)
);

INSERT IGNORE INTO gvp_database.vehicule (nom, image, prix, annee, kilometrage, carburant)
    VALUES ('OPEL CORSA 1.3 CDCI 75 CH DIESEL', 'opel_corsa.jpg', 4790.00, 2008, 177220, 'Diesel'), 
        ('LAND ROVER FREELANDER SX 112CH 4X4', 'land_rover.JPG', 7290.00, 2001, 184200, 'Diesel'),
        ('VOLKSWAGEN POLO 1.6 TDI 75CH', 'volkswagen.jpg', 7290.00, 2010, 177261, 'Diesel'),
        ('VOITURE', 'voiture.jpg', 4790.00, 2003, 189390, 'Diesel'),
        ('ENCORE UNE VOITURE', 'voiture.jpg', 9190.00, 2017, 150642, 'Eléctrique');


-- AVIS ----------------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS gvp_database.avis (
    nom VARCHAR(30),
    note TINYINT,
    message TEXT,
    estValide BOOLEAN
);

INSERT IGNORE INTO gvp_database.avis (nom, note, message, estValide)
    VALUES ('John Doe', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. Etiam tempor orci eu lobortis elementum 
            nibh tellus molestie nunc. Elit eget gravida cum sociis natoque penatibus et. 
            Arcu cursus euismod quis viverra nibh cras pulvinar. Curabitur gravida arcu ac tortor.',
            1), 
        ('Jane Smith', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. Etiam tempor orci eu lobortis elementum 
            nibh tellus molestie nunc. Elit eget gravida cum sociis natoque penatibus et. 
            Arcu cursus euismod quis viverra nibh cras pulvinar. Curabitur gravida arcu ac tortor.', 
            1),
        ('M. Untel', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. Etiam tempor orci eu lobortis elementum 
            nibh tellus molestie nunc. Elit eget gravida cum sociis natoque penatibus et. 
            Arcu cursus euismod quis viverra nibh cras pulvinar. Curabitur gravida arcu ac tortor.', 
            1),
        ('Mme Dupont', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. Etiam tempor orci eu lobortis elementum 
            nibh tellus molestie nunc. Elit eget gravida cum sociis natoque penatibus et. 
            Arcu cursus euismod quis viverra nibh cras pulvinar. Curabitur gravida arcu ac tortor.', 
            1);

-- HORAIRES ------------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS gvp_database.horaires (
    jour VARCHAR(10) PRIMARY KEY,
    horaire VARCHAR(30)
);

INSERT IGNORE INTO gvp_database.horaires (jour, horaire)
    VALUES ("Lundi","08:45 - 12:00,  14:00 - 18:00"), ("Mardi", "08:45 - 12:00,  14:00 - 18:00"), 
        ("Mercredi", "08:45 - 12:00,  14:00 - 18:00"), ("Jeudi", "08:45 - 12:00,  14:00 - 18:00"), 
        ("Vendredi", "08:45 - 12:00,  14:00 - 18:00"), ("Samedi", "08:45 - 12:00"), 
        ("Dimanche", "Fermé");

-- SERVICES ------------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS gvp_database.services (
    id DECIMAL(1,0) PRIMARY KEY,
    contenu TEXT
);

INSERT INTO gvp_database.services (id, contenu) 
    VALUES ('1', 'Réparation de la carrosserie et de la mécanique des voitures')
    ON DUPLICATE KEY UPDATE contenu='Réparation de la carrosserie et de la mécanique des voitures';

INSERT INTO gvp_database.services (id, contenu) 
    VALUES ('2', 'Entretien de vos véhicules pour garantir leur performance et leur sécurité')
    ON DUPLICATE KEY UPDATE contenu='Entretien de vos véhicules pour garantir leur performance et leur sécurité';

INSERT INTO gvp_database.services (id, contenu) 
    VALUES ('3', "Vente de véhicules d'occasion")
    ON DUPLICATE KEY UPDATE contenu="Vente de véhicules d'occasion";


SELECT * FROM gvp_database.horaires;