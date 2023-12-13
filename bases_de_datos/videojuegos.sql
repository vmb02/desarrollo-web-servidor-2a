CREATE SCHEMA db_videojuegos;
USE db_videojuegos;

CREATE TABLE videojuegos (
	titulo VARCHAR(40) PRIMARY KEY,
    distribuidora VARCHAR(20) NOT NULL,
	precio NUMERIC(6,2) NOT NULL
);

SELECT * FROM videojuegos;