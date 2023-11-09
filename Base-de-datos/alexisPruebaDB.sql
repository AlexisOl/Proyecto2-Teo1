CREATE DATABASE parque;

-----
----PARA MI
--- CREATE USER 'adminstracionParque'@'localhost' IDENTIFIED BY 'TuContrasenaSegura';
---GRANT ALL PRIVILEGES ON parque.* TO 'adminstracionParque'@'localhost';
----FLUSH PRIVILEGES;
--- no me habia dando con  @'%'
CREATE USER 'adminstracionParque'@'%' IDENTIFIED BY 'Teori@sistemas1';

GRANT ALL PRIVILEGES ON parque.* TO 'adminstracionParque'@'%';

ALTER USER 'adminstracionParque'@'%' IDENTIFIED WITH mysql_native_password BY 'Teori@sistemas1';

FLUSH PRIVILEGES;
USE parque;


CREATE TABLE empleado(
	idEmpleado INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(75) NOT NULL,
    rol VARCHAR(2) NOT NULL,
    contrasenia VARCHAR(25) NOT NULL,
    PRIMARY KEY(idEmpleado)
	);



CREATE TABLE cliente(
    idCliente INT NOT NULL AUTO_INCREMENT,
	  nit VARCHAR(10) NOT NULL,
    nombre VARCHAR(75) NOT NULL,
    estado BOOLEAN NOT NULL,
    ubicacion VARCHAR(75) NOT NULL,
    PRIMARY KEY(idCliente)
	);

CREATE TABLE area(
    idArea INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL,
 -- PORQUE NO INTERESA ELEMENTALMENTE SOLO EN LAS FAUCTURAS   estado BOOLEAN NOT NULL,
    capacidad INT NOT NULL,
    costoHora INT NOT NULL,
    PRIMARY KEY(idArea)
);

--CREATE TABLE ventas (

--);

--CREATE TABLE facturas (

----);


--------- VALORES UNICOS
 ALTER TABLE `empleado`
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);
 ALTER TABLE `cliente`
  ADD UNIQUE KEY `nit_UNIQUE` (`nit`);