CREATE DATABASE SergioJerez;
USE SergioJerez;

CREATE TABLE registros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    documento VARCHAR(255) NOT NULL,
    tipo_documento VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    genero VARCHAR(50) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    departamento VARCHAR(255) NOT NULL,
    municipio VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    observacion TEXT,
    archivo_nombre VARCHAR(255),
    archivo_ruta VARCHAR(255)
);
