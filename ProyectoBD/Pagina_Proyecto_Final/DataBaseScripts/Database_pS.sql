CREATE SCHEMA BD_PROYECTO_FINAL;
use BD_PROYECTO_FINAL;

CREATE TABLE Empleados
(
	E_ID int(15) NOT NULL,
	E_PrimerNombre text NOT NULL,
	E_PrimerApellido text NOT NULL,
	E_Genero VARCHAR(1) NOT NULL,
	E_Activo VARCHAR (1) NOT NULL,
	E_GrupoPersonal VARCHAR (20) NOT NULL,
	E_NombreTrabajo	text NOT NULL,
	Usuario_ID int(20) NOT NULL,
	Compania_ID VARCHAR(100) NOT NULL,
	Area_ID INT NOT NULL,
	Supervisor_ID INT NOT NULL,
	Curso_ID VARCHAR(60) NOT NULL,
	CONSTRAINT PK_Empleados PRIMARY KEY (E_ID)
);


CREATE TABLE Usuario
(
	U_ID int (20) NOT NULL,
	Empleados_ID int(15) NOT NULL,
	CONSTRAINT PK_Usuario PRIMARY KEY (U_ID)
);

CREATE TABLE C_asociados
(
	ID int (15) auto_increment,
	Empleados_ID int(15) NOT NULL,
	Curso_ID varchar(30) NOT NULL,
    cCur_Calificacion INT(10) ,
	cCur_EstadoProgreso VARCHAR(150) ,
    cCur_FechaFin VARCHAR(150) ,
	cCur_HorasTotale VARCHAR(50) ,
    
	CONSTRAINT PK_C_Asociado PRIMARY KEY(ID)
	
);

CREATE TABLE Curso
(
	C_ID varchar(60) NOT NULL,
	C_Activo CHAR(1) ,
    C_origen varchar(30),
	C_DescripcionCategoriatematica text,
	C_AreaConocimiento text,
	C_PropositoFormacion text,
	C_TipoContenido text,
	C_Tipoart text,
	C_Tituloart text ,
	C_Contenidocurso text,
    C_Descripcion text,
	C_FechaCreacion varchar(20),
	C_Idioma varchar(20),
	C_Costo NUMERIC(15,0)NULL,
	C_Proovedor VARCHAR(50)NULL,
	C_Responsable VARCHAR(50)NULL,
	C_Duracion NUMERIC(4,0)NULL,
	C_HorasCredito NUMERIC(4,0)NULL,
    Empleados_ID int(15),
	
	CONSTRAINT PK_Curso PRIMARY KEY(C_ID)
);

CREATE TABLE Area
(
	A_ID int auto_increment,
	A_Vicepresidencia VARCHAR(100) NOT NULL,
	A_NombreArea VARCHAR(100) NOT NULL,
    Empleados_ID	int(15) NOT NULL,
	CONSTRAINT PK_Area PRIMARY KEY (A_ID)
);



CREATE TABLE RecursosHumanos
(
	Usuario_HR VARCHAR(25) NOT NULL,
	HR_PrimerNombre	VARCHAR(50) NOT NULL,
	HR_Apellido	VARCHAR(50) NOT NUll,
	CONSTRAINT PK_RecursosHumanos PRIMARY KEY(Usuario_HR)
);


CREATE TABLE Supervisor
(
	S_ID INT NOT NULL,
	S_Nombre VARCHAR(50) NOT NULL,
	S_Apellido VARCHAR(50) NOT NULL,
	CONSTRAINT PK_Supervisor PRIMARY KEY(S_ID)
);


CREATE TABLE Compania
(
	Comp_ID int auto_increment,
	Comp_Nombre VARCHAR(50) NOT NULL,
	Area_ID INT NOT NULL,
	UbicacionPrincipal_ID VARCHAR(20) NOT NULL,
	CONSTRAINT PK_Compania PRIMARY KEY(Comp_ID)
);


CREATE TABLE Ubi_Principal
(
	uPri_ID VARCHAR(20) NOT NULL,
	uPri_Nombre	VARCHAR(30),
	Ciudad_ID int NOT NULL,
	CONSTRAINT PK_UbicacionPrincipal PRIMARY KEY(uPri_ID)
);

CREATE TABLE Ciudad
(
	Ciu_ID int NOT NULL,
	Estado_ID int NOT NULL,
	Ciu_Nombre VARCHAR(30) NOT NULL,
	CONSTRAINT PK_Ciudad PRIMARY KEY(Ciu_ID)
);

CREATE TABLE Estado
(
	Est_ID int(20) NOT NULL,
	Pais_ID VARCHAR(20) NOT NULL,
	Est_Nombre VARCHAR(30),
	CONSTRAINT PK_Estado PRIMARY KEY(Est_ID)
);

CREATE TABLE Pais
(
	P_ID VARCHAR(20) NOT NULL,
	P_Nombre VARCHAR(30) NOT NULL,
	CONSTRAINT PK_Pais PRIMARY KEY(P_ID)
);