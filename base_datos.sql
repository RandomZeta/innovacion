CREATE DATABASE sistema_innovacion;

USE sistema_innovacion;

CREATE TABLE usuario
(
	id_usuario INTEGER AUTO_INCREMENT,
	tipo_usuario VARCHAR(50),
	contrasena VARCHAR(50),
	PRIMARY KEY (id_usuario)
)ENGINE = InnoDB;

CREATE TABLE estudiante
(
	rut INTEGER,
	nombre VARCHAR(50),
	apellido VARCHAR(50),
	correo_personal VARCHAR(50),
	edad INTEGER,
	telefono INTEGER,
	id_usuario INTEGER,
	PRIMARY KEY (rut),
	FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) on delete cascade on update cascade
)ENGINE = InnoDB;

CREATE TABLE administrador
(
	id_administrador INTEGER AUTO_INCREMENT,
	nombre_adm VARCHAR(50),
	correo_electronico VARCHAR(50),
	id_usuario INTEGER,
	PRIMARY KEY (id_administrador),
	FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) on delete cascade on update cascade
)ENGINE = InnoDB;

CREATE TABLE solicitud
(
	id_solicitud INTEGER AUTO_INCREMENT,
	nombre_solicitante VARCHAR(50),
	apellido_solicitante VARCHAR(50),
	edad_solicitante VARCHAR(50),
	carrera_solicitante VARCHAR(50),
	resumen TEXT,
	descripcion TEXT,
	respuesta TEXT,
	PRIMARY KEY(id_solicitud)
)ENGINE = InnoDB;

CREATE TABLE estudiante_realiza_solicitud
(
	rut INTEGER,
	id_solicitud INTEGER,
	fecha_emision DATE,
	PRIMARY KEY (rut,id_solicitud),
    FOREIGN KEY (rut) REFERENCES estudiante (rut) on delete cascade on update cascade,
    FOREIGN KEY (id_solicitud) REFERENCES solicitud (id_solicitud) on delete cascade on update cascade
)ENGINE = InnoDB;

CREATE TABLE administrador_responde_solicitud
(
	id_administrador INTEGER,
	id_solicitud INTEGER,
	fecha_respuesta DATE,
	PRIMARY KEY (id_administrador,id_solicitud),
	FOREIGN KEY (id_administrador) REFERENCES administrador (id_administrador) on delete cascade on update cascade,
	FOREIGN KEY (id_solicitud) REFERENCES solicitud (id_solicitud) on delete cascade on update cascade
)ENGINE = InnoDB;

CREATE TABLE estado_solcitud
(
	id_estado INTEGER AUTO_INCREMENT,
	nombre_estado VARCHAR(50),
	id_solicitud INTEGER,
	PRIMARY KEY (id_estado),
	FOREIGN KEY (id_solicitud) REFERENCES solicitud (id_solicitud) on delete cascade on update cascade
)ENGINE = InnoDB;

CREATE TABLE tipo_solicitud
(
	id_tipo INTEGER,
	tipo_solicitud VARCHAR(50),
	id_solicitud INTEGER,
	PRIMARY KEY (id_tipo),
	FOREIGN KEY (id_solicitud) REFERENCES solicitud (id_solicitud) on delete cascade on update cascade
)ENGINE = InnoDB;




