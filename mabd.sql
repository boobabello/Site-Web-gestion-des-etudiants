CREATE DATABASE bdtest CHARACTER SET 'utf8';

USE bdtest;

CREATE TABLE Etudiants(
                		nom VARCHAR(30) NOT NULL,
                		prenom VARCHAR(30) NOT NULL,
                		dateDeNaissance DATE NOT NULL,
                		sexe VARCHAR(10) NOT NULL,
                		email VARCHAR(50) PRIMARY KEY,
                		telephone INT UNSIGNED NOT NULL,
                		filiere VARCHAR(15) NOT NULL,
                		mdp VARCHAR(30) NOT NULL);