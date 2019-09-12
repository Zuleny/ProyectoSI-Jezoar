Magui: Dos clientes "SERVITODO"
Ruddy: Tablas de Volumen revisar 2 veces "Detalle_Nota"
		Falta nota-id_personal
*Triggers para herramientas en Mantinimiento evitar insertar


insert into Rol(cod_rol,descripcion) values (1,'Gerencia'),
											(2,'Administracion');
											
insert into Usuario_Rol(cod_usuario,cod_rol) values (1,1),
													(2,2);
													
insert into Permiso(id_permiso,descripcion) values 
(1,'Gestion de Servicios'),
(2,'Gestion de Clientes'),
(3,'Administracion de Bitacora'),
(4,'Gestion de Presentacion(Propuestas y Cotizaciones)'),
(5,'Gestion de Notas de Almacen'),
(6,'Gestion de Insumos (Productos y Almacen)'),
(7,'Gestion de Personal'),
(8,'Gestion de Usuarios'),
(9,'Gestion de Proveedores');

insert into Rol_Permiso(cod_rol,id_permiso) values 
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(2,1),
(2,2),
(2,3),
(2,4),
(2,5),
(2,6),
(2,7),
(2,8),
(2,9);
												   
insert into Nota(nro_nota,fecha,tipo,cod_almacen,id_personal) values 
(1 ,'2018/05/21','E',1,4),
(2 ,'2018/06/21','E',1,4),
(3 ,'2018/07/21','E',1,4),
(4 ,'2018/08/21','E',1,4),
(5 ,'2018/09/21','E',1,4),
(6 ,'2018/10/21','E',1,4),
(7 ,'2018/12/21','E',1,4),
(8 ,'2019/01/21','E',1,4),
(9 ,'2019/02/21','E',1,4),
(10,'2019/03/21','E',1,4),
(11,'2019/04/21','E',1,4),
(12,'2019/05/21','D',1,4),

(13,'2018/05/29','E',1,9),
(14,'2018/06/05','D',1,9),

(15,'2018/08/11','E',1,20),
(16,'2018/09/11','E',1,20),
(17,'2018/10/11','E',1,20),
(18,'2018/11/11','E',1,20),
(19,'2018/12/11','E',1,20),
(20,'2019/01/11','E',1,20),
(21,'2019/02/11','E',1,20),
(22,'2019/03/11','E',1,20),
(23,'2019/04/11','E',1,20),
(24,'2019/05/11','E',1,20),
(25,'2019/06/11','E',1,20),
(26,'2019/07/11','E',1,20),
(27,'2019/08/11','D',1,20),

(28,'2018/10/02','E',1,9),
(29,'2018/11/02','E',1,9),
(30,'2018/12/02','E',1,9),
(31,'2019/01/02','E',1,9),
(32,'2019/02/02','E',1,9),
(33,'2019/03/02','E',1,1),

(34,'2018/10/02','E',1,25),
(35,'2018/11/02','E',1,25),
(36,'2018/12/02','E',1,25),
(37,'2019/01/02','E',1,25),
(38,'2019/02/02','E',1,25),
(39,'2019/03/02','E',1,25),
(40,'2019/03/02','E',1,25),
(41,'2019/03/02','E',1,25),
(42,'2019/03/02','E',1,25),
(43,'2019/03/02','E',1,25),
(44,'2019/03/02','D',1,1),

(45,'2019/01/10','E',1,4),
(46,'2019/01/16','D',1,4);

insert into Detalle_Nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
(1,1,'Liquido limpiavidrios',10),
(1,2,'Sacasarro',10),
(1,3,'Antisarro',10),
(1,4,'Desinfectante de piso',9),
(1,5,'Aspiradora',1),
(1,6,'Cepillos de mango largo',4),
(1,7,'Gomas o araganas',4),

(2,1,'Sacasarro',8),
(2,2,'Liquido limpiavidrios',7),
(2,3,'Desinfectante de piso',6),
(2,4,'Cepillos de mango largo',1),

(3,1,'Sacasarro',8),
(3,2,'Liquido limpiavidrios',7),
(3,3,'Desinfectante de piso',9),

(4,1,'Sacasarro',4),
(4,2,'Liquido limpiavidrios',5),
(4,3,'Desinfectante de piso',2),
(4,4,'Antisarro',8),

(5,1,'Sacasarro',5),
(5,2,'Liquido limpiavidrios',5),
(5,3,'Desinfectante de piso',5),
(5,4,'Antisarro',2),

(6,1,'Sacasarro',8),
(6,2,'Liquido limpiavidrios',10),
(6,3,'Desinfectante de piso',9),

(7,1,'Sacasarro',10),
(7,2,'Liquido limpiavidrios',9),
(7,3,'Desinfectante de piso',12),

(8,1,'Sacasarro',10),
(8,2,'Desinfectante de piso',8),
(8,3,'Antisarro',8),

(9,1,'Sacasarro',8),
(9,2,'Liquido limpiavidrios',12),
(9,3,'Desinfectante de piso',13),

(10,1,'Sacasarro',12),
(10,2,'Liquido limpiavidrios',10),
(10,3,'Desinfectante de piso',11),

(11,1,'Sacasarro',8),
(11,2,'Liquido limpiavidrios',7),
(11,3,'Desinfectante de piso',12),

(12,1,'Sacasarro',10),
(12,2,'Liquido limpiavidrios',12),
(12,3,'Desinfectante de piso',13),
(12,4,'Aspiradora',1),
(12,5,'Cepillos de mango largo',4),
(12,6,'Gomas o araganas',4),

(13,1,'Liquido aromatizante de piso',10),
(13,2,'Liquido limpiavidrios',11),
(13,3,'Trapeador',2),
(13,4,'Escoba',2),
(13,5,'Avion',1),
(13,6,'Desinfectante de piso',6),

(14,3,'Trapeador',2),
(14,4,'Escoba',2),
(14,5,'Avion',1),
(14,6,'Desinfectante de piso',1),

(15,1,'Liquido limpiavidrios',10),
(15,2,'Sacasarro',10),
(15,3,'Antisarro',10),
(15,4,'Desinfectante de piso',9),
(15,5,'Aspiradora',1),
(15,6,'Cepillos de mango largo',4),
(15,7,'Gomas o araganas',4),

(16,1,'Liquido limpiavidrios',11),
(16,2,'Sacasarro',11),
(16,3,'Antisarro',13),
(16,4,'Desinfectante de piso',9),

(17,1,'Liquido limpiavidrios',9),
(17,2,'Sacasarro',9),
(17,3,'Antisarro',8),
(17,4,'Desinfectante de piso',9),

(18,1,'Liquido limpiavidrios',10),
(18,2,'Sacasarro',12),
(18,3,'Antisarro',10),
(18,4,'Desinfectante de piso',9),

(19,1,'Liquido limpiavidrios',10),
(19,2,'Sacasarro',10),
(19,3,'Antisarro',11),
(19,4,'Desinfectante de piso',8),

(20,1,'Liquido limpiavidrios',10),
(20,2,'Sacasarro',10),
(20,3,'Antisarro',10),
(20,4,'Desinfectante de piso',9),

(21,1,'Liquido limpiavidrios',10),
(21,2,'Sacasarro',10),
(21,3,'Antisarro',10),
(21,4,'Desinfectante de piso',9),

(22,1,'Liquido limpiavidrios',10),
(22,2,'Sacasarro',10),
(22,3,'Antisarro',10),
(22,4,'Desinfectante de piso',9),

(23,1,'Liquido limpiavidrios',10),
(23,2,'Sacasarro',10),
(23,3,'Antisarro',10),
(23,4,'Desinfectante de piso',9),

(24,1,'Liquido limpiavidrios',10),
(24,2,'Sacasarro',10),
(24,3,'Antisarro',10),
(24,4,'Desinfectante de piso',9),

(25,1,'Liquido limpiavidrios',10),
(25,2,'Sacasarro',10),
(25,3,'Antisarro',10),
(25,4,'Desinfectante de piso',9),

(26,1,'Liquido limpiavidrios',10),
(26,2,'Sacasarro',10),
(26,3,'Antisarro',10),
(26,4,'Desinfectante de piso',9),

(27,1,'Liquido limpiavidrios',2),
(27,2,'Sacasarro',1),
(27,3,'Antisarro',2),
(27,4,'Desinfectante de piso',3),
(27,5,'Aspiradora',1),
(27,6,'Cepillos de mango largo',3),
(27,7,'Gomas o araganas',3),

(28,1,'Liquido limpiavidrios',15),
(28,2,'Sacasarro',15),
(28,3,'Antisarro',12),
(28,4,'Desinfectante de piso',9),
(28,5,'Aspiradora',5),
(28,6,'Cepillos de mango largo',8),
(28,7,'Gomas o araganas',5),

(29,1,'Liquido limpiavidrios',10),
(29,2,'Sacasarro',10),
(29,3,'Antisarro',10),
(29,4,'Desinfectante de piso',9),

(30,1,'Liquido limpiavidrios',11),
(30,2,'Sacasarro',9),
(30,3,'Antisarro',8),
(30,4,'Desinfectante de piso',7),

(31,1,'Liquido limpiavidrios',10),
(31,2,'Sacasarro',10),
(31,3,'Antisarro',10),
(31,4,'Desinfectante de piso',9),

(32,1,'Liquido limpiavidrios',9),
(32,2,'Sacasarro',7),
(32,3,'Antisarro',10),
(32,4,'Desinfectante de piso',6),

(33,1,'Liquido limpiavidrios',1),
(33,2,'Antisarro',2),

(34,1,'Liquido limpiavidrios',12),
(34,2,'Sacasarro',13),
(34,3,'Antisarro',16),
(34,4,'Desinfectante de piso',12),
(34,5,'Aspiradora',2),
(34,6,'Cepillos de mango largo',5),
(34,7,'Gomas o araganas',5),

(35,1,'Liquido limpiavidrios',10),
(35,2,'Sacasarro',9),
(35,3,'Antisarro',7),
(35,4,'Desinfectante de piso',9),

(36,1,'Liquido limpiavidrios',8),
(36,2,'Sacasarro',7),
(36,3,'Antisarro',8),
(36,4,'Desinfectante de piso',7),

(37,1,'Liquido limpiavidrios',11),
(37,2,'Sacasarro',12),
(37,3,'Antisarro',1),
(37,4,'Desinfectante de piso',9),

(38,5,'Liquido limpiavidrios',5),
(38,6,'Desinfectante de piso',1),

(39,1,'Liquido limpiavidrios',10),
(39,2,'Sacasarro',9),
(39,3,'Antisarro',7),
(39,4,'Desinfectante de piso',9),

(40,1,'Liquido limpiavidrios',10),
(40,2,'Sacasarro',9),
(40,3,'Antisarro',7),
(40,4,'Desinfectante de piso',8),

(41,1,'Liquido limpiavidrios',9),
(41,2,'Sacasarro',10),
(41,3,'Antisarro',8),
(41,4,'Desinfectante de piso',9),

(42,1,'Liquido limpiavidrios',11),
(42,2,'Sacasarro',10),
(42,3,'Antisarro',7),
(42,4,'Desinfectante de piso',5),

(43,1,'Liquido limpiavidrios',10),
(43,2,'Sacasarro',10),
(43,3,'Antisarro',4),
(43,4,'Desinfectante de piso',9),

(44,1,'Aspiradora',2),
(44,2,'Cepillos de mango largo',5),
(44,3,'Gomas o araganas',3),

(45,1,'Liquido aromatizante de piso',10),
(45,2,'Liquido limpiavidrios',11),
(45,3,'Trapeador',2),
(45,4,'Escoba',2),
(45,5,'Avion',1),
(45,6,'Desinfectante de piso',6),

(46,1,'Liquido limpiavidrios',10),
(46,2,'Desinfectante de piso',10),
(46,3,'Trapeador',2),
(46,4,'Escoba',2),
(46,5,'Avion',1);



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