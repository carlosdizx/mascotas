/**
  Creacion y uso de la base da datos
 */
CREATE DATABASE IF NOT EXISTS mascotas;
USE mascotas;

/*
 Eliminacion de las tablas para crearlas de manera adecuada
 */
DROP TABLE IF EXISTS mascotas;
DROP TABLE IF EXISTS tipo_mascotas;
DROP TABLE IF EXISTS personas;

/**
  Creacion de las bases de datos
 */
CREATE TABLE IF NOT EXISTS personas
(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    documento VARCHAR(30) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS tipo_mascotas
(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombres VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS mascotas
(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    ruta_foto VARCHAR(255) NOT NULL,
    edad INT NOT NULL,
    raza VARCHAR(100) NOT NULL,
    procedimiento VARCHAR(255) NOT NULL,
    tipo INT NOT NULL,
    dueño INT NOT NULL,
    CONSTRAINT tmm FOREIGN KEY (tipo) REFERENCES tipo_mascotas(id),
    CONSTRAINT dm FOREIGN KEY (dueño) REFERENCES personas(id)
);