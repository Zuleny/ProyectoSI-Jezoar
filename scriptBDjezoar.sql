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
    IS 'database php-postgresql for clean service "jezoar"';

/*alter table Cliente add tipo tinyint not null;
alter table Presentacion  add tipo tinyint not null;
alter table Insumo add tipo tinyint not null
*/
create table Cliente (
	cod_cliente int not null primary key,
	nombre varchar(100) not null,
	direccion varchar(200) null,
	email varchar(50) null,
	tipo tinyint not null
);

create table Telefono (
	cod_cliente_telefono int not null primary key,
	telefono varchar(10) not null,
	foreign key (cod_cliente_telefono) references Cliente(cod_cliente)
	on update cascade
	on delete cascade
);

create table Presentacion (
	cod_presentacion int not null primary key,
	fecha date not null,
	estado varchar(10) not null,	--Aceptado,Denegado,Rechazado
	precio_total decimal not null,
	cod_cliente_presentacion int not null,
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
  nombre varchar(100),
  descripcion varchar(500)
);

create table Presentacion_Servicio(
   cod_presentacion int not null,
   id_servicio int not null ,
   area_trabajo varchar(100),	--lugar a trabajar
   cant_personal int not null,
   precio_unitario decimal(12,2) not null,
   foreign key(cod_presentacion) references Presentacion(cod_presentacion)
   on update cascade  on delete cascade,
   foreign key(id_servicio) references Servicio(id_servicio)
   on update cascade  on delete cascade,
   primary key(cod_presentacion,id_servicio)   
);

create table Detalle_Servicio(
   id_servicio int not null,
   id_detalle int not null,
   detalle varchar(500) not null,	--descripcion de servicions que solicita el cliente
   foreign key (id_servicio) references Servicio(id_servicio)
   on update cascade  on delete cascade,
   primary key(id_servicio,id_detalle)
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
   nombre varchar(30) not null,
   descripcion varchar(200) --descripcion del insumo
   tipo tinyint not null
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
	estado char(1) not null,
	foreign key (cod_insumo_herramienta) references insumo(cod_insumo)
		on update cascade
		on delete cascade
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
	tamanio decimal(12,2),
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
	nombre_proveedor varchar(25) not null,
	nombre_empresa varchar(25),
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
	cod_proveedor integer not null
);

ALTER TABLE Nota_Ingreso add
FOREIGN KEY(cod_almacen)
REFERENCES Almacen(cod_almacen);
ALTER TABLE Nota_Ingreso add 
FOREIGN KEY(cod_proveedor)
REFERENCES Proveedor(cod_proveedor);

create table Detalle_Ingreso
(
	id_ingreso int not null,
	nombre_insumo varchar(30) not null,
	cantidad decimal(12,2) not null,
	precio_unitario decimal(12,2) not null,
	nro_ingreso int not null,
	primary key (id_ingreso,nro_ingreso)
);

ALTER TABLE Detalle_Ingreso
ADD
foreign key (nro_ingreso)
REFERENCES Nota_Ingreso(nro_ingreso);

create table Personal
(
	id_personal int not null,
	nombre varchar(100) not null,
	tipo varchar(20) not null,
	cargo varchar(200) not null,
	primary key (id_personal)
);

create table Usuario
(
	cod_usuario int not null primary key,
	nombre varchar(25) not null,
	contrasenia varchar(200) not null,
	id_personal_usuario int not null,
	foreign key (id_personal_usuario) references Personal(id_personal)
	on delete cascade
	on update cascade
);

create table Rol
(
	cod_rol int not null primary key,
	descripcion varchar(100) not null
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
	tipo char(1) not null,
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
	nombre_insumo varchar(30) not null,
	cantidad_insumo float not null,
	primary key (nro_nota,id_detalle),
	foreign key (nro_nota) references Nota(nro_nota)
	on update cascade
	on delete cascade
);

create table Informe (
	cod_informe int not null primary key,
	fecha date not null,
	descripcion varchar(500) not null,
	cod_presentacion_cotizacion int not null,
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

insert into Rol(cod_rol,descripcion) values (1,'Admininstrador'),
											(2,'Inventario'),
											(3,'Supervisor');
											
insert into Permiso(id_permiso,descripcion) values (1,'Gestion de Servicios'),
												   (2,'Gestion de Clientes'),
												   (3,'Administracion de Bitacora'),
												   (4,'Gestion de Presentacion'),
												   (5,'Gestion de Notas de Almacen'),
												   (6,'Gestion de Insumos (Productos y Almacen)'),
												   (7,'Gestion de Personal'),
												   (8,'Gestion de Usuarios');

insert into Rol_Permiso(cod_rol,id_permiso) values (1,1),
												   (1,2),
												   (1,3),
												   (1,4),
												   (1,5),
												   (1,6),
												   (1,7),
												   (1,8),
												   (2,5),
												   (2,6),
												   (3,5);

insert into Nota(nro_nota,fecha,tipo,cod_almacen,id_personal) values (1,'2019/06/06','E',1,1),
																	 (2,'2019/06/20','E',2,1),
																	 (3,'2019/06/30','E',1,1),
																	 (4,'2019/07/05','D',2,1),
																	 (5,'2019/07/20','E',1,1),
																	 (6,'2019/07/30','E',2,1);

insert into Detalle_Nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values (1,1,'Pastilla de Baño',100),
																				   (1,2,'Mocha',3),
																				   (1,3,'Trapeador',2),
																				   (1,4,'Casco',10),
																				   (2,1,'Ambientador',500),
																				   (2,2,'Jabon Liquido',10),
																				   (2,3,'Antisarro',50),
																				   (2,4,'Cera Liquida',20),
																				   (2,5,'Lustra Mueble',10),
																				   (2,6,'Paño de Piso',100),
																				   (3,1,'',50),
																				   (3,2,'',45),
																				   (3,3,'Mopa',1),
																				   (3,4,'',10),
																				   (4,1,'',5),
																				   (4,2,'',3),
																				   (4,3,'',50),
																				   (4,4,'',150),
																				   (5,1,'',45),
																				   (5,2,'',15),
																				   (5,3,'',20),
																				   (5,4,'',10),
																				   (6,1,'',40),
																				   (6,2,'',20),
																				   (6,3,'',30),
																				   (6,4,'',1);
																				   
insert into Informe(cod_informe,fecha,descripcion,cod_presentacion_cotizacion) values 
(1,'2019/08/08','De mi consideración:Me dirijo a ustedes, a tiempo de saludarlos, hago llegar a su persona mis más sinceros deseos de éxitos en sus funciones laborales.
Al mismo tiempo INFORMALES QUE SE HA CONCLUIDO EL TRABAJO DEL Edificio Bloque 4, así mismo confirmarles que el bloque bloque 4 está totalmente en buenas condiciones de limpieza de acuerdo al contrato, adjunto las fotos del trabajo concluido.
',1),
(2,'2019/08/31','De mi consideración:Me dirijo a ustedes, a tiempo de saludarlos, hago llegar a su persona mis más sinceros deseos de éxitos en sus funciones laborales.
Al mismo tiempo INFORMALES QUE SE HA CONCLUIDO EL TRABAJO DE LIMPIEZA EN EL PISO 10, así mismo confirmarles que el piso 10 está totalmente en buenas condiciones de limpieza de acuerdo al contrato, adjunto las fotos del trabajo concluido.
',2),
(3,'2019/09/10','De mi consideración:
Me dirijo a ustedes, a tiempo de saludarlos, hago llegar a su persona mis más sinceros deseos de éxitos en sus funciones laborales.
Al mismo tiempo INFORMALES QUE SE HA CONCLUIDO EL TRABAJO DE LIMPIEZA DEL BLOQUE 1, así mismo confirmarles que el bloque 1 está totalmente en buenas condiciones de limpieza de acuerdo al contrato, adjunto las fotos del trabajo concluido.
',3);

insert into Contrato(cod_contrato,fecha_inicio,fecha_fin,cod_presentacion) values 
(1,'2018/08/10','2019/08/11',1),
(2,'2018/01/11','2019/06/11'.2),
(3,'2019/01/10','2019/06/10',3),
(4,'2019/04/20','2019/12/20',4),
(5,'2019/02/01','2020/02/01',5);

--30. mostrar las nota de Devolucion

select nro_nota,fecha,tipo, almacen.nombre, personal.nombre
from nota,almacen,personal
where nota.cod_almacen=almacen.cod_almacen and 
	  nota.id_personal=personal.personal.id_personal and
	  nota.tipo='D';
	  
--31. mostrar las nota de Egreso
select nro_nota,fecha,tipo, almacen.nombre, personal.nombre
from nota,almacen,personal
where nota.cod_almacen=almacen.cod_almacen and 
	  nota.id_personal=personal.personal.id_personal and
	  nota.tipo='E';

--32. Mostrar los informes de las cotizaciones del ultimo mes
select informe.cod_informe,informe.fecha,cotizacion.tipo_servicio,presentacion.precio_total,cliente.nombre
from informe,cotizacion,presentacion,cliente
where informe.cod_presentacion_cotizacion=cotizacion.cod_presentacion_cotizacion and
	  cotizacion.cod_presentacion_cotizacion=presentacion.cod_presentacion and
	  presentacion.cod_cliente_presentacion=cliente.cod_cliente 
order by informe.cod_informe desc
limit 5;

--33. Mostrar los contratos que finalizaron
select contrato.cod_contrato,contrato.fecha_inicio,contrato.fecha_fin,presentacion.cod_presentacion,cliente.nombre
from contrato, presentacion, cliente
where contrato.cod_presentacion=presentacion.cod_presentacion and 
	  presentacion.cod_cliente_presentacion=cliente.cod_cliente and 
	  contrato.fecha_fin<now();
	  
--34. Mostrar los contratos que finalizaran este mes
select contrato.cod_contrato,contrato.fecha_inicio,contrato.fecha_fin,presentacion.cod_presentacion,cliente.nombre
from contrato, presentacion, cliente
where contrato.cod_presentacion=presentacion.cod_presentacion and 
	  presentacion.cod_cliente_presentacion=cliente.cod_cliente and 
	  contrato.fecha_fin=now();
	  
--35. Mostrar las notas de un almacen oragizados por Egreso y Devolucion
select Nota.nro_nota,Nota.tipo
from Nota
where Nota.cod_almacen=1
order by Nota.tipo desc;




