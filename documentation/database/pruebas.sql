-- Database: jezoar

-- DROP DATABASE jezoar;

CREATE DATABASE jezoar
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_Spain.1252'
    LC_CTYPE = 'Spanish_Spain.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

COMMENT ON DATABASE jezoar
    IS 'clean service Jezoar';
	
select * from insumo;
select getStockInsumo('Balde', 1);
select * from insumo;
select getCodInsumo('Lustradora');
select * from nota;
select getTipoNota(27);
select * from nota;
select getCodAlmacen(27);
select * from insumo;
select existeInsumo(34);
select existeInsumo(12);
select * from detalle_nota;
/**Prueba**/
select max(nro_nota) from nota
select * from nota
select * from personal
select * from detalle_nota where nro_nota=47;
select * from insumo 
insert into nota(nro_nota,fecha,tipo,cod_almacen,id_personal) values 
				(47,now(),'D',1,19);
select * from insumo_almacen where cod_insumo=25				
insert into detalle_nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
				(47,1,'Paños de algodon',10);
insert into detalle_nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
				(47,2,'Paños de algodon',1);
insert into detalle_nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
				(47,3,'Cepillos de mano',3);
insert into detalle_nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
				(47,4,'Sopapas',5);

insert into nota(nro_nota,fecha,tipo,cod_almacen,id_personal) values 
				(48,now(),'E',1,15);
select * from insumo;
select * from insumo_almacen;
select * from detalle_nota where nro_nota=48
insert into detalle_nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
				(48,1,'Sopapas',10);
insert into detalle_nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
				(48,2,'Sopapas',2);
insert into detalle_nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
				(48,3,'Sopapas',5);
insert into detalle_nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
				(48,4,'limpiavodrios',10);
insert into detalle_nota(nro_nota,id_detalle,nombre_insumo,cantidad_insumo) values 
				(48,4,'Antisarro',10);
rollback;
select * from insumo
select * from insumo_almacen
delete from detalle_nota where nro_nota=48 and detalle_nota.id_detalle=2

select * from detalle_ingreso where detalle_ingreso.nro_ingreso=9
insert into detalle_ingreso(nro_ingreso,id_ingreso,nombre_insumo,cantidad,precio_unitario) values 
	(9,167,'Sopapas',9,7.5);
insert into detalle_ingreso(nro_ingreso,id_ingreso,nombre_insumo,cantidad,precio_unitario) values 
	(9,168,'Sopapa',9,7.70);
	
select * from nota order by nro_nota desc
select * from detalle_nota where detalle_nota.nro_nota=47
select * from insumo
select * from insumo_almacen where insumo_almacen.cod_insumo=25
delete from detalle_nota where detalle_nota.nro_nota=47 and detalle_nota.id_detalle=3; 

update nota set fecha='2019/09/10' where nro_nota=47
