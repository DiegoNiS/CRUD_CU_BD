CREATE DATABASE dietas_alimenticias;

USE dietas_alimenticias;

CREATE TABLE empresa(
  EmpCod INT(11) PRIMARY KEY AUTO_INCREMENT,
  EmpNom VARCHAR(20) NOT NULL,
  DelPetCod VARCHAR(255) NOT NULL
);

CREATE TABLE granja(
  GraCod CHAR(11) PRIMARY KEY NOT NULL,
  GraNom VARCHAR(60) NOT NULL,
  GraDir VARCHAR(60) NOT NULL,
  GraNot TEXT, 
  GraEstReg CHAR(1) NOT NULL,
  EmpCod INT(11),
  FOREIGN KEY (EmpCod) REFERENCES empresa(EmpCod) 
);

CREATE TABLE almacen(
  AlmCod CHAR(10) PRIMARY KEY NOT NULL,
  AlmNot TEXT, 
  AlmEstReg CHAR(1) NOT NULL,
  GraCod CHAR(11),
  EmpCod INT(11),
  FOREIGN KEY (GraCod) REFERENCES granja(GraCod),  
  FOREIGN KEY (EmpCod) REFERENCES empresa(EmpCod)  
);

DESCRIBE empresa;
DESCRIBE granja;
DESCRIBE almacen;