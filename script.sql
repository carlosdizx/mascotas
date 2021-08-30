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
DROP TABLE IF EXISTS propietarios;

/**
  Creacion de las bases de datos
 */
CREATE TABLE IF NOT EXISTS propietarios
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
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS mascotas
(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    ruta_foto VARCHAR(255) NOT NULL,
    edad VARCHAR(50) NOT NULL,
    raza VARCHAR(100) NOT NULL,
    procedimiento VARCHAR(255) NOT NULL,
    tipo INT NOT NULL,
    dueño INT NOT NULL,
    CONSTRAINT tmm FOREIGN KEY (tipo) REFERENCES tipo_mascotas(id),
    CONSTRAINT dm FOREIGN KEY (dueño) REFERENCES propietarios(id)
);

/**
  Insercion de datos
 */

INSERT INTO tipo_mascotas (nombre) VALUES ('perros'), ('gatos'), ('loros'), ('hámster'), ('conejos'), ('palomas'),('Otro');

INSERT INTO propietarios (nombres, apellidos, documento, direccion, telefono) VALUES
(
    'Juan Carlos','Burgos','1085','Calle 18 No 34 – 104','318'
);
INSERT INTO propietarios (nombres, apellidos, documento, direccion, telefono) VALUES
(
    'Maria','Santander','1086','Mza 20 casa 3 B/gualcaloma','317'
);

INSERT INTO mascotas(nombre, ruta_foto, edad, raza, procedimiento, tipo, dueño) VALUES
(
    'Yuya','yuya.jpg','12 Meses','Labrador','',1,1
);
INSERT INTO mascotas(nombre, ruta_foto, edad, raza, procedimiento, tipo, dueño) VALUES
(
    'Felix','felix.jpg','10 Meses','Mestizo','',2,2
);

ALTER TABLE propietarios ADD correo VARCHAR(100) NOT NULL;