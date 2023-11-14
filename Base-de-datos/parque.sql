CREATE DATABASE parque;
-- parque2 prueba
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

CREATE TABLE tipoCliente(
    idTipoCliente INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL UNIQUE,
    PRIMARY KEY(idTipoCliente)
);

CREATE TABLE cliente(
    idCliente INT NOT NULL AUTO_INCREMENT,
	nit VARCHAR(10) NOT NULL UNIQUE,
    nombre VARCHAR(75) NOT NULL,
    tipoCliente INT NOT NULL,
    direccion VARCHAR(80) NOT NULL,
    PRIMARY KEY(idCliente)
);

ALTER TABLE cliente
    ADD KEY `fk_ID_TIPO_CLIENTE` (`tipoCliente`);

ALTER TABLE cliente
  ADD CONSTRAINT `fk_TIPO_CLIENTE` FOREIGN KEY (`tipoCliente`) REFERENCES `tipoCliente` (`idTipoCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE TABLE tipoArea(
    idTipoArea INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL UNIQUE,
    PRIMARY KEY(idTipoArea)
);

CREATE TABLE area(
    idArea INT NOT NULL AUTO_INCREMENT,
    tipoArea INT NOT NULL,
    nombre VARCHAR(80) NOT NULL UNIQUE,
    precio DECIMAL(9,2) NOT NULL,
    descripcion TEXT NOT NULL,
    capacidad INT NOT NULL,
    horaInicio TIME NOT NULL,
    horaFin TIME NOT NULL,
    PRIMARY KEY(idArea)
);

ALTER TABLE area
    ADD KEY `fk_ID_AREA` (`tipoArea`);

ALTER TABLE area
  ADD CONSTRAINT `fk_TIPO_AREA` FOREIGN KEY (`tipoArea`) REFERENCES `tipoArea` (`idTipoArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE TABLE anuncio(
    idAnuncio INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    descripcion TEXT NOT NULL,
    fechaPublicacion DATE NOT NULL,
    urlImagen TEXT NOT NULL,
    PRIMARY KEY(idAnuncio)
);

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
    fecha DATE NOT NULL,
    -- cambio de venta alexis
    horainicial INT NOT NULL,
    horafinal INT NOT NULL,
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
('Recepcionista');

INSERT INTO empleado(nombre,usuario,rol,contrasenia) values 
('Jose Lopez','jlopez',1,AES_ENCRYPT("123a", "teo1_2023")),
('Luisa Loarca','lloarca',1,AES_ENCRYPT("123a", "teo1_2023")),
('Eduardo Pozuelo','jpoz',2,AES_ENCRYPT("123a", "teo1_2023")),
('Marta Diaz','mdiaz',2,AES_ENCRYPT("123a", "teo1_2023"));

INSERT INTO tipoCliente(nombre) values 
('Visitante'),
('Inquilino');

INSERT INTO cliente(nit, tipoCliente, nombre, direccion) values
('459874564',1,'Marcelo Bravo','Quetzaltenango'),
('425987458',1,'Ivan Villa','Salcaja'),
('536987421',1,'Marta Valenzuela','La esperanza'),
('485963158',1,'Riquelme Arraya', 'Quetzaltenango'),
('103698026',1,'Maria Castillo','Quetzaltenango'),
('503698745',1,'David Quiroa','Huehuetenango'),
('100236984',1,'Enda Ortiz','Guatemala'),
('452003689',2,'Amefin', 'Quetzaltenango'),
('105398014',2,'Sabores en Armonía','Quetzaltenango'),
('112559860',2,'La Mesa Real','Quetzaltenango'),
('103369854',2,'Aventura Culinaria','Quetzaltenango');

INSERT INTO  tipoArea( nombre ) VALUES
('Restaurante'),
('Recreativa'),
('Salon');

INSERT INTO area(nombre, tipoArea, precio, capacidad, horaInicio, horaFin, descripcion) values
('Amefin',1,5,75,'8:00:00','21:00:00','Restaurante dentro de las instalaciones'),
('Sabores en Armonía',1,5,45,'8:00:00','20:00:00','Restaurante dentro de las instalaciones'),
('La Mesa Real',1,5,75,'8:00:00','20:00:00','Restaurante dentro de las instalaciones'),
('Aventura Culinaria',1,7,75,'8:00:00','21:00:00','Restaurante dentro de las instalaciones'),
('Cancha sintetica Gol',2,100,22,'8:00:00','20:00:00','Cancha sintetica para futbol 11'),
('Piscina Deluxe',2,95,10,'8:00:00','20:30:00','Piscina aclimatizada privada'),
('Piscina Splash',2,1,35,'8:00:00','19:30:00','Piscina para todo publico para disfrutar en familia y amigos'),
('Area de juegos Refugio',2,0,45,'8:00:00','20:30:00','Area de juegos al aire libre para niños y adultos'),
('Rincón Bohemio',3,5,250,'8:00:00','21:00:00','Salon para eventos especiales La elegancia se encuentra en cada detalle, desde la iluminación ambiental hasta la disposición de los muebles. Creamos un ambiente sofisticado que se adapta a la ocasión y resalta la belleza de cada evento.'),
('Gala Brillante',3,7,170,'8:00:00','21:00:00','Equipado con las últimas tecnologías audiovisuales, nuestro salón es el escenario perfecto para presentaciones impactantes y experiencias multimedia inolvidables.'),
('Salón del Encanto',3,4,125,'8:00:00','21:00:00','La elegancia se encuentra en cada detalle, desde la iluminación ambiental hasta la disposición de los muebles. Creamos un ambiente sofisticado que se adapta a la ocasión y resalta la belleza de cada evento.'),
('La Cúpula',3,4,100,'8:00:00','21:00:00',' Nuestro salón ha sido meticulosamente diseñado para proporcionar un ambiente único y versátil. Ya sea una boda íntima, una celebración corporativa o cualquier ocasión especial, aquí encontrarás el espacio perfecto.'),
('De los altos',3,2,110,'8:00:00','21:00:00','Desde la primera consulta hasta el último brindis, nuestro equipo experimentado estará a tu disposición para asegurar que cada detalle refleje tu visión. Nos enorgullece ofrecer un enfoque personalizado y flexible para satisfacer todas tus necesidades.'),
('Sashimi',3,5,185,'8:00:00','21:00:00','Desde la entrada hasta cada rincón del salón, nuestra arquitectura refleja la simplicidad y la serenidad del diseño japonés. La decoración minimalista y los elementos naturales crean un ambiente zen que eleva la experiencia de cualquier evento.');

INSERT INTO anuncio (titulo, descripcion, fechaPublicacion,urlImagen) values
('Gimnasio','Proximamente contaremos con Gimnasio', '2023-11-13','pendiente'),
('Nueva área de picnic','Disfruta próximamente de nuestra nueva área de picnic', '2023-11-13','pendiente'),
('Nueva cancha sintetica','Disfruta de nuestra nueva cancha sintetica', '2023-11-09','pendiente'),
('Salón para graduaciones','Salones disponibles para las graduaciones de la época', '2023-11-09','pendiente'),
('Nueva piscina privada','Disfruta de nuestra nueva piscina privada', '2023-11-08','pendiente'),
('Nuevos restaurantes','Visita nuestras instalaciones y prueba la comida de nuestros restaurantes', '2023-11-09','pendiente');
