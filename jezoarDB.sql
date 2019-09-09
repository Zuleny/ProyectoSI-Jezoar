-- Database: jezoar

-- DROP DATABASE jezoar;

CREATE DATABASE jezoar
    WITH 
    OWNER = jezoar
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_Spain.1252'
    LC_CTYPE = 'Spanish_Spain.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = 5;

COMMENT ON DATABASE jezoar
    IS 'clean service Jezoar';
	
create table Cliente (
	cod_cliente int not null primary key,
	nombre varchar(100) not null,
	direccion varchar(200) null,
	email varchar(50) null
);

create table Contacto_Cliente (
	cod_cliente int not null primary key,
	telefono varchar(10) not null,
	foreign key (cod_cliente) references Cliente(cod_cliente)
	on update cascade
	on delete cascade
);

create table Empresa (
	cod_cliente int not null primary key,
	nit varchar(15) not null,
	foreign key (cod_cliente) references Cliente(cod_cliente)
	on update cascade
	on delete cascade
);

create table Persona (
	cod_cliente int not null primary key,
	nro_carnet varchar(10) not null,
	foreign key (cod_cliente) references Cliente(cod_cliente)
	on update cascade
	on delete cascade
);

create table Bitacora (
	codigo serial not null primary key,
	nombre_usuario varchar(25) not null,
	descripcion varchar(200) not null,
	fecha_hora timestamp not null
);

create table Permiso (
	id_permiso int not null primary key,
	descripcion varchar(100) not null
);

create table Rol (
	id_rol int not null primary key,
	descripcion varchar(100) not null
);

create function suma(integer, integer) returns interger
as $$
select $1+$2;
$$
languaje sql