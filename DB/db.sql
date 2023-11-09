CREATE DATABASE parque;

CREATE USER 'administracionParque'@'localhost' IDENTIFIED BY 'Teori@sistemas1';

GRANT ALL PRIVILEGES ON parque.* TO 'administracionParque'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES;

USE parque;

CREATE TABLE rol(
	id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(75) NOT NULL UNIQUE,
    PRIMARY KEY(id)
);

CREATE TABLE empleado(
	idEmpleado INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(75) NOT NULL,
    usuario VARCHAR(75) NOT NULL UNIQUE,
    rol INT NOT NULL,
    contrasenia BLOB NOT NULL,
    PRIMARY KEY(idEmpleado)
);

ALTER TABLE empleado
    ADD KEY `fk_ID_ROL` (`rol`);

ALTER TABLE empleado
  ADD CONSTRAINT `fk_ROL_EMPLEADO_union` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE TABLE cliente(
    idCliente INT NOT NULL AUTO_INCREMENT,
	nit VARCHAR(10) NOT NULL UNIQUE,
    nombre VARCHAR(75) NOT NULL,
    estadoSuscripcion BOOLEAN NOT NULL,
    fechaInicioPago DATE NOT NULL,
    tipoCliente VARCHAR(2) NOT NULL,
    ubicacion VARCHAR(75) NOT NULL,
    PRIMARY KEY(idCliente)
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
    idAnuncio INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    descripcion TEXT NOT NULL,
    fechaInicio DATE NOT NULL,
    fechaFin DATE NOT NULL,
    idEmpleado INT NOT NULL,
    idArea INT NOT NULL,
    PRIMARY KEY(idAnuncio)
);

ALTER TABLE anuncios 
    ADD KEY `fk_ID_EMPLEADO` (`idEmpleado`),
    ADD KEY `fk_ID_AREA` (`idArea`);

ALTER TABLE anuncios
  ADD CONSTRAINT `fk_ID_EMPLEADO_union` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ID_AREA_union` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE TABLE reserva(
    idReserva INT NOT NULL AUTO_INCREMENT,
    nitCliente VARCHAR(10) NOT NULL,
    idArea INT NOT NULL,
    fecha_reserva DATE NOT NULL,
    fecha_fin_reserva DATE NOT NULL,
    idEmpleado INT NOT NULL,
    PRIMARY KEY(idReserva)
);

ALTER TABLE reserva
    ADD KEY `fk_ID_EMPLEADO` (`idEmpleado`),
    ADD KEY `fk_ID_AREA` (`idArea`);

ALTER TABLE reserva
  ADD CONSTRAINT `fk_ID_EMPLEADO_RESERVA` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ID_AREA_RESERVA` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE TABLE factura(
    idFactura INT NOT NULL AUTO_INCREMENT,
    detalle TEXT NOT NULL,
    nitCliente VARCHAR(10) NOT NULL,
    fecha DATE NOT NULL,
    PRIMARY KEY(idFactura)
);

ALTER TABLE factura
    ADD KEY `fk_NIT_CLIENTE` (`nitCliente`);

ALTER TABLE factura
  ADD CONSTRAINT `fk_NIT_CLIENTE_union` FOREIGN KEY (`nitCliente`) REFERENCES `cliente` (`nit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE TABLE venta(
    idVenta INT NOT NULL AUTO_INCREMENT,
    horas DECIMAL(5,2) NOT NULL,
    idArea INT NOT NULL,
    montoParcial DECIMAL(10,2) NOT NULL,
    descripcion TEXT NOT NULL,
    idFactura INT NOT NULL,
    PRIMARY KEY(idVenta)
);

ALTER TABLE venta
    ADD KEY `fk_ID_AREA` (`idArea`),
    ADD KEY `fk_ID_FACTURA` (`idFactura`);

ALTER TABLE venta
  ADD CONSTRAINT `fk_ID_AREA_VENTA` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ID_FACTURA_VENTA` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;