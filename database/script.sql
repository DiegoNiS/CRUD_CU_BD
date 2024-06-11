-- Crear la base de datos
CREATE DATABASE dietas_alimenticias;

-- Usar la base de datos
USE dietas_alimenticias;

-- Crear la tabla empresa
CREATE TABLE empresa(
  EmpCod INT(11) PRIMARY KEY AUTO_INCREMENT,
  EmpNom VARCHAR(20) NOT NULL,
  DelPetCod VARCHAR(255) NOT NULL
);

-- Crear la tabla granja con una clave foránea que referencia a la tabla empresa
CREATE TABLE granja(
  GraCod CHAR(11) PRIMARY KEY NOT NULL,
  GraNom VARCHAR(60) NOT NULL,
  GraDir VARCHAR(60) NOT NULL,
  GraNot TEXT,  -- Se corrige LONG VARCHAR a TEXT
  GraEstReg CHAR(1) NOT NULL,
  EmpCod INT(11),
  FOREIGN KEY (EmpCod) REFERENCES empresa(EmpCod)  -- Clave foránea
);

-- Crear la tabla almacen con claves foráneas que referencian a las tablas granja y empresa
CREATE TABLE almacen(
  AlmCod CHAR(10) PRIMARY KEY NOT NULL,
  AlmNot TEXT,  -- Se corrige LONG VARCHAR a TEXT
  AlmEstReg CHAR(1) NOT NULL,
  GraCod CHAR(11),
  EmpCod INT(11),
  FOREIGN KEY (GraCod) REFERENCES granja(GraCod),  -- Clave foránea
  FOREIGN KEY (EmpCod) REFERENCES empresa(EmpCod)  -- Clave foránea
);

-- Describir la estructura de las tablas
DESCRIBE empresa;
DESCRIBE granja;
DESCRIBE almacen;