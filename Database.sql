CREATE DATABASE restaurant;

USE restaurant;

CREATE TABLE users( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(100) NOT NULL,
password CHAR(60) NOT NULL,
NbPeople INT NOT NULL,
allergies TEXT,
isAdmin BOOLEAN
);

CREATE TABLE schedules(DAY VARCHAR(10) NOT NULL PRIMARY KEY,
noonOpeningTime TIME NOT NULL,
noonClosingTime TIME NOT NULL,
eveningOpeningTime TIME NOT NULL,
eveningClosingTime TIME NOT NULL,
isClosed BOOLEAN
);

CREATE TABLE tables( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nbSeats INT NOT NULL,
isReserved BOOLEAN
);

CREATE TABLE booktables( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
nbPeople INT NOT NULL,
allergies TEXT,
date date NOT NULL,
time time NOT NULL,
tableId INT NOT NULL,
userId INT,
FOREIGN KEY(tableId) REFERENCES tables(id),
FOREIGN KEY(userId) REFERENCES users(id)
);

CREATE TABLE imagegalleries( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
path VARCHAR(255) NOT NULL
);

CREATE TABLE dishes( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
title TEXT NOT NULL,
description TEXT NOT NULL,
prince INT NOT NULL
);

CREATE TABLE menus( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
title TEXT NOT NULL,
description TEXT NOT NULL,
prince INT NOT NULL
);
