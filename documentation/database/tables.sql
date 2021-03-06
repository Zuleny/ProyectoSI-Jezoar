-- Database: jezoar----->30/11/2019

-- DROP DATABASE jezoar;
/*
CREATE DATABASE jezoar 
	with owner=jezoar 
	encoding='UTF8' 
	tablespace=pg_default 
	CONNECTION LIMIT=-1;

*/
COMMENT ON DATABASE jezoar
    IS 'clean service Jezoar';
	
create table Cliente (
	cod_cliente int not null primary key,
	nombre varchar(100) not null,
	direccion varchar(500) null,
	email varchar(50) null,
	tipo char(1) not null	--E:Empresa; P:Persona
);

create table telefono (	
	cod_cliente_telefono int not null,
	telefono varchar(10) not null,
	primary key(cod_cliente_telefono,telefono),
	foreign key (cod_cliente_telefono) references cliente(cod_cliente)
	on update cascade on delete cascade
);

create table Presentacion (
	cod_presentacion int not null primary key,
	fecha date not null,
	estado varchar(10) not null,	--Aceptado,Denegado,Rechazado
	precio_total decimal(12,2) not null,
	cod_cliente_presentacion int not null,
	tipo_presentacion char(1) not null,	--P:Propuesta;O:Cotizacion 
	foreign key (cod_cliente_presentacion) references Cliente (cod_cliente)
	on update cascade
	on delete cascade
);

create table Empresa (
	cod_cliente_empresa int not null primary key,
	nit varchar(15) not null,
	foreign key (cod_cliente_empresa) references Cliente(cod_cliente)
	on update cascade
	on delete cascade
);

create table Persona (
	cod_cliente_persona int not null primary key,
	nro_carnet varchar(10) not null,
	foreign key (cod_cliente_persona) references Cliente(cod_cliente)
	on update cascade
	on delete cascade
);

create table Bitacora (
	codigo serial not null primary key,
	nombre_usuario varchar(25) not null,
	descripcion varchar(200) not null,
	fecha_hora timestamp not null
);

create table Servicio(
	id_servicio int not null primary key,
	nombre varchar(100)not null
);

create table Presentacion_Servicio(
   cod_presentacion int not null,
   id_servicio int not null ,
   area_trabajo varchar(100),	--lugar a trabajar
   cant_personal int not null,
   precio_unitario decimal(12,2) not null,
   descripcionservicios varchar(100) not null,
   foreign key(cod_presentacion) references Presentacion(cod_presentacion)
   on update cascade 
   on delete cascade,
   foreign key(id_servicio) references Servicio(id_servicio)
   on update cascade 
   on delete cascade,
   primary key(cod_presentacion,id_servicio)   
);

create table Propuesta(
  cod_presentacion_propuesta int not null primary key,
  cant_meses int not null,
  foreign key (cod_presentacion_propuesta) references Presentacion(cod_presentacion)
  on update cascade  on delete cascade
);

create table Cotizacion(
   cod_presentacion_cotizacion int not null primary key,
   cant_dias int not null,
   tipo_servicio varchar(25) not null,	--Profunda, Post-Obra, Oficinas
   material char(1) not null, 
   foreign key (cod_presentacion_cotizacion) references Presentacion(cod_presentacion)
);

create table Insumo(
   cod_insumo int not null primary key,
   nombre varchar(35) not null,
   descripcion varchar(500), --descripcion del insumo
   tipo_insumo char(1) not null	--discriminador de insumo(herramienta y producto)
);

create table Propuesta_Insumo(
   cod_presentacion_propuesta int not null,
   cod_insumo int not null,
   cant_insumo decimal(12,2) not null,
   foreign key(cod_presentacion_propuesta) references Propuesta(cod_presentacion_propuesta)
   on update cascade on delete cascade,
   foreign key(cod_insumo) references Insumo(cod_insumo)
   on update cascade on delete cascade,
   primary key(cod_presentacion_propuesta,cod_insumo)
);

create table Producto(
	cod_insumo_producto int not null primary key,
	precio_unitario decimal(12,2) not null,
	marca varchar(20),
	foreign key (cod_insumo_producto) references insumo(cod_insumo)
		on update cascade
		on delete cascade
);

create table Herramienta(
	cod_insumo_herramienta int not null primary key,
	estado char(1) not null,	--M:mantenimento,D:Disponible;N:No Disponible
	foreign key (cod_insumo_herramienta) references insumo(cod_insumo)
	on update cascade on delete cascade
);

create table Categoria(
	cod_categoria int not null primary key,
	nombre varchar(200) not null
);

create table Producto_Categoria(
	cod_insumo_producto int not null,
	cod_categoria int not null,
	primary key(cod_insumo_producto,cod_categoria),
	foreign key (cod_insumo_producto) references Producto(cod_insumo_producto)
		on update cascade
		on delete cascade,
	foreign key (cod_categoria) references Categoria(cod_categoria)
		on update cascade
		on delete cascade
);

create table Almacen(
	cod_almacen int not null primary key,
	nombre varchar(20) not null,
	direccion varchar(200) not null
);

create table Insumo_Almacen(
	cod_insumo int not null,
	cod_almacen int not null,
	stock decimal(12,2) not null,
	primary key(cod_insumo,cod_almacen),
	foreign key (cod_insumo) references insumo(cod_insumo)
		on update cascade
		on delete cascade,
	foreign key (cod_almacen) references Almacen(cod_almacen)
		on update cascade
		on delete cascade
);

create table Proveedor
(
	cod_proveedor int not null primary key,
	nombre_proveedor varchar(100) not null,
	nombre_empresa varchar(100),
	telefono varchar(10),
	email varchar(50),
	direccion varchar(100)
);

create table Nota_Ingreso
(
	nro_ingreso int not null primary key,
	fecha_ingreso date not null,
	nombre_recibe varchar(25) not null,
	cod_almacen integer not null,
	cod_proveedor integer not null,
	FOREIGN KEY(cod_almacen) REFERENCES Almacen(cod_almacen)
	on update cascade on delete cascade,
	FOREIGN KEY(cod_proveedor) REFERENCES Proveedor(cod_proveedor)
	on update cascade on delete cascade
);

create table Detalle_Ingreso
(
	id_ingreso int not null,
	nombre_insumo varchar(30) not null,
	cantidad decimal(12,2) not null,
	precio_unitario decimal(12,2) not null,
	nro_ingreso int not null,
	primary key (id_ingreso,nro_ingreso),
	FOREIGN KEY(nro_ingreso) REFERENCES Nota_Ingreso(nro_ingreso)
	on update cascade on delete cascade
);

create table Personal
(
	id_personal int not null,
	nombre varchar(100) not null,
	tipo char(1) not null,	--F:fijo; E:eventual
	cargo varchar(200) not null,
	primary key (id_personal)
);

create table Usuario
(
	cod_usuario int not null primary key,
	nombre varchar(25) not null,
	contrasenia varchar(200) not null,
	question varchar(200) not null,
	answer varchar(200) not null,
	id_personal_usuario int not null,
	foreign key (id_personal_usuario) references Personal(id_personal)
	on delete cascade
	on update cascade
);

create table Rol
(
	cod_rol int not null primary key,
	descripcion varchar(20) not null
);

create table Usuario_Rol (
	cod_rol int not null,
	cod_usuario int not null,
	primary key (cod_rol,cod_usuario),
	foreign key (cod_rol) references Rol(cod_rol)
	on update cascade
	on delete cascade,
	foreign key (cod_usuario) references Usuario(cod_usuario)
	on update cascade
	on delete cascade
);

create table Permiso (
	id_permiso int not null primary key,
	descripcion varchar(100) not null
);

create table Rol_Permiso (
	id_permiso int not null,
	cod_rol int not null,
	primary key (id_permiso,cod_rol),
	foreign key (id_permiso) references Permiso(id_permiso)
	on update cascade
	on delete cascade,
	foreign key (cod_rol) references Rol(cod_rol)
	on update cascade
	on delete cascade
);

create table Nota (
	nro_nota int not null primary key,
	fecha date not null,
	tipo char(1) not null,	--E:Egreso; D:Devolucion
	cod_almacen int not null,
	id_personal int not null,
	foreign key (cod_almacen) references Almacen(cod_almacen)
	on update cascade
	on delete cascade,
	foreign key (id_personal) references Personal(id_personal)
	on update cascade
	on delete cascade
);

create table Detalle_Nota (
	nro_nota int not null,
	id_detalle int not null,
	nombre_insumo varchar(35) not null,
	cantidad_insumo decimal(12,2) not null,
	primary key (nro_nota,id_detalle),
	foreign key (nro_nota) references Nota(nro_nota)
	on update cascade
	on delete cascade
);

create table Informe (
	cod_informe int not null primary key,
	fecha date not null,
	descripcion varchar(10000) not null,
	cod_presentacion_cotizacion int not null,
	imageBefore text null,
	imageAfter text null,
	foreign key (cod_presentacion_cotizacion) references Cotizacion(cod_presentacion_cotizacion)
	on update cascade
	on delete cascade
);

create table Contrato (
	cod_contrato int not null primary key,
	fecha_inicio date not null,
	fecha_fin date not null,
	cod_presentacion int not null,
	foreign key (cod_presentacion) references Presentacion(cod_presentacion)
	on update cascade
	on delete cascade
);