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
    direccion VARCHAR(80) NOT NULL,
    PRIMARY KEY(idCliente)
);

CREATE TABLE area(
    idArea INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL UNIQUE,
    precio DECIMAL(9,2) NOT NULL,
    descripcion TEXT NOT NULL,
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

CREATE TABLE empleadoFactura(
    idEmpleadoFactura INT NOT NULL AUTO_INCREMENT,
    idEmpleado INT NOT NULL,   
    idFactura INT NOT NULL,
    PRIMARY KEY(idEmpleadoFactura)
);

ALTER TABLE empleadoFactura
    ADD KEY `fk_ID_EMPLEADO_F` (`idEmpleado`),
    ADD KEY `fk_ID_FACTURA_F` (`idFactura`);

ALTER TABLE empleadoFactura
  ADD CONSTRAINT `fk_ID_FACTURA_EMPLEADO` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ID_FACTURA_FACTURA` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE TABLE comentario(
    idComentario INT NOT NULL AUTO_INCREMENT,
    idFactura INT NOT NULL,
    mensaje TEXT NOT NULL,
    fecha DATE NOT NULL,
    PRIMARY KEY(idComentario)
);


ALTER TABLE comentario
    ADD KEY `fk_ID_FACTURA_COMENT` (`idFactura`);

ALTER TABLE comentario
  ADD CONSTRAINT `fk_ID_FACTURA_COMENTARIO` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- INSERTANDO REGISTROS

INSERT INTO rol(nombre) values 
('Administrador'),
('Finanzas'),
('Recepcionista')
;

INSERT INTO empleado(nombre,usuario,rol,contrasenia) values 
('Jose Lopez','jlopez',1,'123'),
('Luisa Loarca','lloarca',1,'123'),
('Eduardo Pozuelo','jpoz',2,'123'),
('Marta Diaz','mdiaz',2,'123'),
('Rocio Castañeda','rcast',3,'123'),
('Marvin Villatoro','mvilla',3,'123');

INSERT INTO cliente(nit, nombre, estadoSuscripcion, fechaInicioPago, direccion) values
('459874564','Marcelo Bravo',TRUE,'2023-11-09','Quetzaltenango'),
('425987458','Ivan Villa',TRUE,'2023-11-09','Salcaja'),
('536987421','Marta Valenzuela',FALSE,'2023-11-09','La esperanza'),
('485963158','Riquelme Arraya',TRUE,'2023-11-09','Quetzaltenango'),
('103698026','Maria Castillo',TRUE,'2023-11-09','Quetzaltenango'),
('503698745','David Quiroa',FALSE,'2023-11-09','Huehuetenango'),
('100236984','Enda Ortiz',TRUE,'2023-11-09','Guatemala');

INSERT INTO area(nombre, precio, estado, capacidad, horaInicio, horaFin, descripcion) values
('Rincón Bohemio',3500,TRUE,150,'8:00:00','21:00:00','Salon para eventos especiales La elegancia se encuentra en cada detalle, desde la iluminación ambiental hasta la disposición de los muebles. Creamos un ambiente sofisticado que se adapta a la ocasión y resalta la belleza de cada evento.'),
('Gala Brillante',3500,TRUE,150,'8:00:00','21:00:00','Equipado con las últimas tecnologías audiovisuales, nuestro salón es el escenario perfecto para presentaciones impactantes y experiencias multimedia inolvidables.'),
('Salón del Encanto',3500,TRUE,150,'8:00:00','21:00:00','La elegancia se encuentra en cada detalle, desde la iluminación ambiental hasta la disposición de los muebles. Creamos un ambiente sofisticado que se adapta a la ocasión y resalta la belleza de cada evento.'),
('La Cúpula',3500,TRUE,150,'8:00:00','21:00:00',' Nuestro salón ha sido meticulosamente diseñado para proporcionar un ambiente único y versátil. Ya sea una boda íntima, una celebración corporativa o cualquier ocasión especial, aquí encontrarás el espacio perfecto.'),
('De los altos',3500,TRUE,150,'8:00:00','21:00:00','Desde la primera consulta hasta el último brindis, nuestro equipo experimentado estará a tu disposición para asegurar que cada detalle refleje tu visión. Nos enorgullece ofrecer un enfoque personalizado y flexible para satisfacer todas tus necesidades.'),
('Sashimi',3500,TRUE,150,'8:00:00','21:00:00','Desde la entrada hasta cada rincón del salón, nuestra arquitectura refleja la simplicidad y la serenidad del diseño japonés. La decoración minimalista y los elementos naturales crean un ambiente zen que eleva la experiencia de cualquier evento.');