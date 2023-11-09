CREATE DATABASE parque;

CREATE USER 'adminstracionParque'@'%' IDENTIFIED BY 'Teori@sistemas1';

GRANT ALL PRIVILEGES ON parque.* TO 'adminstracionParque'@'%';

ALTER USER 'adminstracionParque'@'%' IDENTIFIED WITH mysql_native_password BY 'Teori@sistemas1';

FLUSH PRIVILEGES;
USE parque;

CREATE TABLE rol(
	id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(75) NOT NULL UNIQUE,
    PRIMARY KEY(id)
);

CREATE TABLE empleado(
	id_empleado INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(75) NOT NULL,
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
	nit VARCHAR(10) NOT NULL,
    nombre VARCHAR(75) NOT NULL,
    estado_suscripcion BOOLEAN NOT NULL,
    fecha_inicio_pago DATE NOT NULL,
    tipo_cliente VARCHAR(2) NOT NULL,
    ubicacion VARCHAR(75) NOT NULL,
    PRIMARY KEY(nit)
);

CREATE TABLE area(
    idArea INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL UNIQUE,
    precio DECIMAL(9,2) NOT NULL,
    estado BOOLEAN NOT NULL,
    capacidad INT NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL,
    PRIMARY KEY(idArea)
);

CREATE TABLE anuncios(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
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

CREATE TABLE reservas(
    id INT NOT NULL AUTO_INCREMENT,
    nit_cliente VARCHAR(10) NOT NULL,
    id_area VARCHAR(10) NOT NULL,
    fecha_reserva DATE NOT NULL,
    fecha_fin_reserva DATE NOT NULL,
    descripcion TEXT NOT NULL,

    idEmpleado INT NOT NULL,
    idArea INT NOT NULL,
    PRIMARY KEY(id)
);

ALTER TABLE a 
    ADD KEY `fk_ID_EMPLEADO` (`idEmpleado`),
    ADD KEY `fk_ID_AREA` (`idArea`);

ALTER TABLE anuncios
  ADD CONSTRAINT `fk_ID_EMPLEADO_union` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ID_AREA_union` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;