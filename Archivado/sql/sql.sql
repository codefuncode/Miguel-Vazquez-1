
--  Creación de la base de datos 
CREATE DATABASE GameShark; 

--  Creación de la tabla inventario
CREATE TABLE inventario (
    --  id del juego  con auto incremento  para signar numero único 
    idjuego int NOT NULL AUTO_INCREMENT, 
    nombre varchar(50) not null,
    estado TINYINT(1) not null,
    fecha DATE NOT NULL,
    -- ==================================
    --  Id  para relacionar  con las tablas exteriores  e incorporar el valor desde 
    -- la tabla primaria  por su id
    idclasificacion int not null,
    idplataforma int not null,
       -- ==================================
    cantidad int not null,
    precio DOUBLE(2, 2) not null,
    PRIMARY KEY (idjuego),
    CONSTRAINT FK_Clasificacion 
    FOREIGN KEY (idclasificacion) REFERENCES clasificacion(idclasificacion),
    CONSTRAINT FK_Plataforma 
    FOREIGN KEY (idplataforma) REFERENCES plataforma(idplataforma)
  
); 


CREATE TABLE clasificacion (
    idclasificacion int NOT NULL AUTO_INCREMENT,
    nombre varchar(50) not null,
    PRIMARY KEY (idclasificacion)
  
   
); 

INSERT INTO clasificacion (nombre)
VALUES ("EC-infancia temprana");

INSERT INTO clasificacion (nombre)
VALUES ("E-todos");

INSERT INTO clasificacion (nombre)
VALUES ("E+10-todos sobre 10 años");

INSERT INTO clasificacion (nombre)
VALUES ("T-adolescentes");

INSERT INTO clasificacion (nombre)
VALUES ("M-adolescentes sobre 17 años");

INSERT INTO clasificacion (nombre)
VALUES ("AO-adultos solamente"); 




CREATE TABLE plataforma (
    idplataforma int NOT NULL AUTO_INCREMENT,
    nombre varchar(50) not null,
    PRIMARY KEY (idplataforma)
  
   
); 




INSERT INTO plataforma (nombre)
VALUES ("3DS");


INSERT INTO plataforma (nombre)
VALUES ("Switch");


INSERT INTO plataforma (nombre)
VALUES ("DS");


INSERT INTO plataforma (nombre)
VALUES ("Wii");


INSERT INTO plataforma (nombre)
VALUES ("Wii U");


INSERT INTO plataforma (nombre)
VALUES ("Gamecube");


INSERT INTO plataforma (nombre)
VALUES ("Xbox Series X");


INSERT INTO plataforma (nombre)
VALUES ("Xbox one");


INSERT INTO plataforma (nombre)
VALUES ("Xbox 360");


INSERT INTO plataforma (nombre)
VALUES ("Xbox");


INSERT INTO plataforma (nombre)
VALUES ("PS1");


INSERT INTO plataforma (nombre)
VALUES ("PS2");


INSERT INTO plataforma (nombre)
VALUES ("PS3");


INSERT INTO plataforma (nombre)
VALUES ("PS4");


INSERT INTO plataforma (nombre)
VALUES ("PS5");


INSERT INTO plataforma (nombre)
VALUES ("PSP");


INSERT INTO plataforma (nombre)
VALUES ("PS Vita"); 



INSERT INTO inventario (nombre , estado , fecha , idclasificacion ,idplataforma ,cantidad ,precio )
VALUES (:nombre , :estado , :fecha , :idclasificacion ,:idplataforma ,:cantidad ,:precio); 
$sth->execute(array(':calories' => 150, ':colour' => 'red'));


SELECT 
inventario.nombre,
inventario.estado,
inventario.fecha ,
clasificacion.nombre ,
plataforma.nombre ,
inventario.cantidad ,
inventario.precio
FROM
inventario,
clasificacion,
plataforma
WHERE inventario.idclasificacion=clasificacion.idclasificacion
AND  inventario.idplataforma=plataforma.idplataforma
ORDER BY inventario.idjuego



CREATE TABLE usuario (
    idusuario int NOT NULL AUTO_INCREMENT,
    nombre varchar(25) NOT NULL,
    usuario varchar(30)  NOT NULL,  
     correo varchar(50)  NOT NULL, 
     pass varchar(50)  NOT NULL,  
    PRIMARY KEY (idusuario)
); 