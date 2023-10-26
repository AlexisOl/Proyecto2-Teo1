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
    contrasenia BLOB NOT NULL,
    PRIMARY KEY(idEmpleado)
	);


CREATE TABLE cliente(
    idCliente INT NOT NULL AUTO_INCREMENT,
	nit VARCHAR(10) NOT NULL,
    nombre VARCHAR(75) NOT NULL,
    estadoSuscripcion BOOLEAN NOT NULL,
    fechaInicioPago DATE NOT NULL,
    tipoCliente VARCHAR(2) NOT NULL,
    ubicacion VARCHAR(75) NOT NULL,
    PRIMARY KEY(nit)
	);

CREATE TABLE area(
    idArea INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL UNIQUE,
    precio DECIMAL(9,2) NOT NULL,
    estado BOOLEAN NOT NULL,
    capacidad INT NOT NULL,
    horaInicio TIME NOT NULL,
    horaFin TIME NOT NULL,
    PRIMARY KEY(idArea)
	);

CREATE TABLE anuncios(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    descripcion VARCHAR(3000) NOT NULL,
    fechaInicio DATE NOT NULL,
    fechaFin DATE NOT NULL,
    idEmpleado INT NOT NULL,
    idArea INT NOT NULL,
    PRIMARY KEY(id)
);

ALTER TABLE anuncios 
    ADD KEY `fk_ID_EMPLEADO` (`idEmpleado`),
    ADD KEY `fk_ID_AREA` (`idArea`);

ALTER TABLE anuncios
  ADD CONSTRAINT `fk_ID_EMPLEADO_union` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ID_AREA_union` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

