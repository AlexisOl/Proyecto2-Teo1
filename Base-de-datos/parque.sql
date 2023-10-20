CREATE DATABASE parque;

CREATE USER 'adminstracionParque'@'%' IDENTIFIED BY 'Teori@sistemas1';

GRANT ALL PRIVILEGES ON parque.* TO 'adminstracionParque'@'%';

ALTER USER 'adminstracionParque'@'%' IDENTIFIED WITH mysql_native_password BY 'Teori@sistemas1';

FLUSH PRIVILEGES;
USE parque;


CREATE TABLE empleado(
	idEmpleado INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(75) NOT NULL,
    rol VARCHAR(2) NOT NULL,
    contrasenia BLOOB NOT NULL,
    PRIMARY KEY(idEmpleado)
	);


CREATE TABLE cliente(
    idCliente INT NOT NULL AUTO_INCREMENT,
	nit VARCHAR(10) NOT NULL,
    nombre VARCHAR(75) NOT NULL,
    estado BOOLEAN NOT NULL,
    ubicacion VARCHAR(75) NOT NULL,
    PRIMARY KEY(nit)
	);

CREATE TABLE area(
    idArea INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL,
    estado BOOLEAN NOT NULL,
    capacidad INT NOT NULL,
    PRIMARY KEY(idArea)
	);
