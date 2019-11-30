/******************************Funciones y Procedimientos Almacenados y Triggers*****************/
/*1. Funcion que Devuelve el stock de un insumo en un Almacen especifico
	 (cantidad Disponible del Insumo)*/
create or replace function getStockInsumo(nombreInsumo varchar(35), codAlmacen integer)returns int as $$
begin
	return (select insumo_almacen.stock
			from insumo,insumo_almacen
			where insumo.cod_insumo=insumo_almacen.cod_insumo and nombre=nombreInsumo and cod_almacen=codAlmacen);	
end; $$ 
language plpgsql;

/*2. Funcion que devuelve el codigo de Insumo a traves del su nombre*/
create or replace function getCodInsumo(nombreInsumo varchar(35)) returns integer as $$ begin
	return (select cod_insumo
			from insumo
			where nombre=nombreInsumo);
end; $$ 
language plpgsql;

/*3. Funcion que Devuelve el tipo de Nota, Si es Egreso o Devolucion*/
create or replace function getTipoNota(nroNota integer)returns text as 
$$ begin
	return (select tipo
		 from nota 
		 where nro_nota=nroNota);
end; $$ 
language plpgsql;

/*4. Funcion Auxiliar que devuelve el codigo de almacen de una nota de Egreso o Devolucion.*/
create or replace function getCodAlmacen(nroNota integer)returns integer as $$
begin
	return (select cod_Almacen
		    from nota
		    where nro_nota=nroNota);
end; 
$$ language plpgsql;

/*5. Funcion que devuelve true si el insumo ya esta registrado, falso caso contrario*/
create or replace function existeInsumo(codInsumo integer)returns boolean as 
$$
   declare cantInsumo integer=(select count(*) from Insumo where cod_insumo=codInsumo);
   begin 
      if(cantInsumo=1)then return(true);
	  else return(false);
	  end if;
   end;
$$
language plpgsql;

/*6. Funcion trigger para el proceso de devolucion de Insumos*/
create or replace function DevolucionDetalle() returns trigger as 
$BODY$ 
declare codAlmacen INTEGER;
		codInsumo  INTEGER;
		tipoNota TEXT;
		stockInsumo DECIMAL(12,2);
begin
	if getTipoNota(new.nro_nota)='D' then
		raise notice 'Procesando nota de devolucion...';
		codAlmacen:=getCodAlmacen(new.nro_nota);
		codInsumo:=getCodInsumo(new.nombre_insumo);
		if existeInsumo(codInsumo) then
			update insumo_almacen set stock=stock+new.cantidad_insumo
					where cod_almacen=codAlmacen and cod_insumo=codInsumo;
			raise notice 'Devolucion realizada correctamente :3';
		else
			raise notice 'Error... No existe el insumo a Devolver, registre el nuevo insumo';
			raise exception 'No se registro el insumo % en la nota %',new.nombre_insumo,new.nro_nota;
		end if;
	end if;
	return new;
end; $BODY$ 
language 'plpgsql';

/*7. Trigger para Incrementar el stock de insumos en la Nota de Devolucion*/
create trigger detalleNotaDevolucion after insert
on detalle_Nota
for each row
	execute procedure DevolucionDetalle();

/*8. Funcion trigger para el preceso de decremento del insumo en un almacen*/
create or replace function EgresoDetalle() RETURNS trigger as $BODY$ 
declare codAlmacen INTEGER;
		tipoDeNota TEXT;
		codInsumo INTEGER;
		stockDisponible INTEGER;
begin
	IF getTipoNota(new.nro_nota)='E' then
		codInsumo:=getCodInsumo(new.nombre_insumo);
		if existeInsumo(codInsumo) then
			raise notice 'Procesando Nota de Egreso...';
			codAlmacen:=getCodAlmacen(new.nro_nota);
			stockDisponible:=getStockInsumo(new.nombre_insumo,codAlmacen);
			if stockDisponible >= new.cantidad_insumo then
				if (stockDisponible-new.cantidad_insumo)=0 then 
					raise notice 'Danger: El insumo % ya llego a la cantidad 0 disponible en el almacen Nro: %',new.nombre_insumo,codAlmacen;
				end if;
				update insumo_almacen set stock=stock-new.cantidad_insumo 
					   where cod_insumo=codInsumo and 
							 cod_almacen=codAlmacen;
				raise notice 'Egreso realizado correctamente :3 Insumo: % en el NroNota: %',new.nombre_insumo,new.nro_nota;
			else 
				raise notice 'No se realizo el registro, Stock insuficiente en el almacen Nro %',codAlmacen;
				raise exception 'No se registro el insumo: % en el nro de Nota: %',new.nombre_insumo,new.nro_nota;
				
			end if;
		else 
			raise notice 'No se realizo el registro, Insumo % no registrado',new.nombre_insumo;
			delete from detalle_nota where nro_nota=new.nro_nota and id_detalle=new.id_detalle;
			raise notice 'No se registro el insumo: % en el nro de Nota: %',new.nombre_insumo,new.nro_nota;
		end if;
	end if;
	RETURN new;
end; $BODY$ language plpgsql;

/*9. Trigger para decrementar el stock del insumo que se registra en la 
	  nota de egreso*/
create trigger detalleNotaEgreso after insert
on detalle_nota
for each row
	execute procedure EgresoDetalle();
	
/*10. Funcion Trigger para el proceso de anulacion de salida de un insumo*/
create or replace function detalleEgresoAnulacion() returns trigger as 
$BODY$ 
declare codAlmacen INTEGER;
		codInsumo INTEGER;
begin
	if getTipoNota(old.nro_nota)='E' then
		codInsumo:=getCodInsumo(old.nombre_insumo);
		codAlmacen:=getCodAlmacen(old.nro_nota);
		raise notice 'Procesando Eliminacion de Insumo en Egreso...';
		update insumo_almacen set stock=stock + old.cantidad_insumo 
				where cod_insumo=codInsumo and cod_almacen=codAlmacen;
		raise notice 'Proceso de Devolucion de Insumo fue exitoso :)';
	end if;
	return old;
end; $BODY$ language plpgsql;

/*11. Trigger para la eliminacion de insumo en una Nota de Egreso */
create trigger detalleNotaEgresoAnulacion before delete
on detalle_nota
for each row
	execute procedure detalleEgresoAnulacion();


/*12. Funcion que obtiene la fecha realizada de una nota especifica*/
create or replace function getFechaNota(nroNota INTEGER)returns date as 
$$
begin
	return (select fecha
		   	from nota
		   	where nro_nota=nroNota);
end;
$$ language plpgsql;

/*13. Funcion Trigger que Elimina una registro de una nota de Devolucion*/
create or replace function detalleDevolucionAnulacion()returns trigger 
as $BODY$ 
declare codAlmacen INTEGER;
		codInsumo INTEGER;
		fechaNotaDevolucion DATE;
		fechaActual DATE := cast(now() as DATE);
		cantDiasLimite INTEGER;
begin
	if getTipoNota(old.nro_nota) = 'D' then
		raise notice 'Procesando la anulacion del registro en la nota de Devolucion';
		codAlmacen := getCodAlmacen(old.nro_nota);
		codInsumo := getCodInsumo(old.nombre_insumo);
		fechaNotaDevolucion := getFechaNota(old.nro_nota);
		cantDiasLimite := fechaActual - fechaNotaDevolucion;
		if old.cantidad_insumo<getStockInsumo(old.nombre_insumo, codAlmacen) then
			update insumo_almacen set stock = stock - old.cantidad_insumo 
				where cod_almacen = codAlmacen and cod_insumo = codInsumo;
				raise notice 'La anulacion del registro del insumo % fue exitoso. Nota nro: %',old.nombre_insumo,old.nro_nota;
		else
			raise exception 'Error en La Anulacion, stock negativo no ser posible';
		end if;
	end if;
	return old;
end;
$BODY$ language plpgsql;

/*14. Trigger para anular un detalle de una nota de devolucion*/
create trigger detalleNotaDevolucionAnulacion after delete
on detalle_nota
for each row
	execute procedure detalleDevolucionAnulacion();

/*15. Funcion auxiliar para el trigger iDetalleIngreso*/	
create or replace function ingresoDetalle() returns trigger as 
$$
    declare codInsumo integer;
            codAlmacen integer;
    begin 
		codInsumo:=getCodInsumo(new.nombre_insumo);
		if(existeInsumo(codInsumo)) then 
		   codAlmacen:=getCodAlmacen(new.nro_ingreso);
		   update Insumo_Almacen set stock=stock+new.cantidad
		   where cod_insumo=codInsumo and cod_almacen=codAlmacen;
		   raise notice 'Insumo registrado exitosamente: insumo: % en el Nro de Ingreso: %',new.nombre_insumo,new.nro_ingreso;
	
		else 
		   raise notice 'Error: Insumo no encontrado, Registre el insumo';
		   RAISE EXCEPTION 'Error: No se registro el detalle % en el Nro de Ingreso: %',new.nombre_insumo,new.nro_ingreso;
		end if;
		return new;
	end;
$$
language plpgsql;

/*16. Trigger para actualizar el stock de un determinado insumo y almacen al momento de insertar una fila en la tabla Detalle_Ingreso */
create trigger iDetalleIngreso 
before insert on Detalle_Ingreso
for each row 
	execute procedure ingresoDetalle();
/*17. Funcion Auxiliar para el trigger dDetalleIngreso*/
create or replace function dIngresoDetalle() returns trigger as 
$$
    declare codInsumo integer;
            codAlmacen integer;
			stocki integer;
    begin
		codInsumo:=getCodInsumo(old.nombre_insumo);
	    codAlmacen:=getCodAlmacen(old.nro_ingreso);
		stocki:=getstockinsumo(old.nombre_insumo,codAlmacen);
		if(old.cantidad<=stocki) then
	       update Insumo_Almacen set stock=stock-old.cantidad
		   where cod_insumo=codInsumo and cod_almacen=codAlmacen;
		   raise notice 'El Insumo % se ha eliminado correctamente del Nro de Ingreso: % ',old.nombre_insumo,old.nro_ingreso;
		else
		   raise exception 'Error: El stock del insumo % es % y la cantidad a eliminar es % del Nro de Ingreso: % ',old.nombre_insumo,stocki,old.cantidad,old.nro_ingreso;
		end if;
	return old;
	end;
$$
language plpgsql;

/*18. Trigger para actualizar el stock de un determinado insumo y almacen al momento de 
eliminar una fila en la tabla Detalle_Ingreso*/
create trigger dDetalleIngreso 
before delete on Detalle_Ingreso
for each row 
	execute procedure dIngresoDetalle();

/*19. Devuelve el nombre de la categoria a la que pertenece un determinado codigo producto*/
CREATE OR REPLACE FUNCTION getcategoriadeproducto(cod_prod integer)RETURNS varchar(200)
AS $BODY$
   begin
   return(select Categoria.nombre from Categoria,Producto_Categoria 
		  where Categoria.cod_categoria=Producto_categoria.cod_categoria and Producto_Categoria.cod_insumo_producto=cod_prod);
   end;
$BODY$
LANGUAGE 'plpgsql';

/*20. Devuelve el codigo de categoria de undeterminado nombre de categoria*/
CREATE OR REPLACE FUNCTION getcodcategoriadeproducto(nombrecategoria varchar(200))RETURNS integer
as
$BODY$
   begin
   return(select cod_categoria from Categoria where nombre=nombreCategoria); 		  
   end;
$BODY$
LANGUAGE 'plpgsql';

/*21. Devuelve una tabla con el codigo de producto,nombre del insumo,la descripcion,la marca del producto,
la categoria a la que pertenece un producto, y el precio*/
create or replace function getListaDeProductos()
returns table (codProducto integer,nombreInsumo varchar,descripcionInsumo varchar,marcaProducto varchar,categoriaProducto varchar,precioProducto decimal(12,2)) 
as $$
begin
	return query SELECT Producto.cod_insumo_producto,Insumo.nombre,Insumo.descripcion,Producto.marca,getCategoriaDeProducto(Producto.cod_insumo_producto),Producto.precio_unitario 
                 from Insumo,Producto,Producto_Categoria
                 where Insumo.cod_insumo=Producto.cod_insumo_producto and Producto.cod_insumo_producto=Producto_Categoria.cod_insumo_producto;
end; $$
language 'plpgsql';
	
	
/*22. Funcion que devuleve el inventario de un especifico almacen a traves de su nombre*/
create or replace function getInventarioDeProductos(nombreAlmacen varchar(20))
returns table (nombre varchar,InsumoNombre varchar,ProductoMarca varchar,stockInsumo DECIMAL(12,2)) 
as $$
begin
	return query select categoria.nombre,Insumo.nombre,Producto.marca,Sum(Insumo_Almacen.stock)as stockInsumo
	 from Producto,Insumo,Categoria,Producto_Categoria,Insumo_Almacen,Almacen
	 where Producto.cod_insumo_producto=Insumo.cod_insumo and 
	 	   Producto.cod_insumo_producto=Producto_Categoria.cod_insumo_producto and 
		   Categoria.cod_categoria= Producto_Categoria.cod_categoria and 
		   Insumo.cod_insumo=Insumo_Almacen.cod_insumo and 
		   Almacen.cod_almacen=Insumo_Almacen.cod_almacen and almacen.nombre=nombreAlmacen
	 group by categoria.nombre,Insumo.nombre,Producto.marca;
end; $$
language 'plpgsql';

/*23. Funcion que devuelve el inventario de herramientas de un especifico almacen a traves de su nombre*/
create or Replace function getHerramientaStock(nombreAlmacen varchar(20)) returns table (codigo integer,nombre varchar, estado char,stock decimal(12,2))
as $$
begin
	return query select Insumo.cod_insumo,Insumo.nombre,Herramienta.estado,sum(Insumo_Almacen.stock)
			from Herramienta,Insumo,Insumo_Almacen,Almacen
			where Herramienta.cod_insumo_herramienta=Insumo.cod_insumo and Insumo.cod_insumo=Insumo_Almacen.cod_insumo and 
				  Almacen.cod_almacen=Insumo_Almacen.cod_almacen and Almacen.nombre=nombreAlmacen
			group by Insumo.cod_insumo,Insumo.nombre,Herramienta.estado;
		end; 
$$
language'plpgsql';

/*24. Funcion que devuelve el precio Total de una sola nota*/
create or replace function getPrecioTotalUnaNota(cod_nota integer) returns decimal(12,2) as $$
begin
	return (select coalesce(cast(sum(cantidad*precio_unitario)as decimal(12,2)),0)
			from Detalle_Ingreso
			where cod_nota=nro_ingreso
			);
end;
$$
language plpgsql;

/*25. Funcion que devuelve una tabla con los precios totales de una nota en el almacen */ 
create or replace function getListaPrecioTotales(nombre_almacen varchar(25))
returns table (codigo_nota integer, fecha_de_Ingreso date,nombre_del_receptor varchar,nombre_del_proveedor varchar,
			   nombreDelAlmacen varchar, cantidad decimal(12,2)) as $$	
begin
	return query select nro_ingreso, fecha_ingreso, nombre_recibe,nombre_proveedor,Almacen.nombre ,getPrecioTotalUnaNota(nro_ingreso)
				 from Almacen, Proveedor,nota_ingreso
				 where Almacen.cod_almacen = nota_ingreso.cod_almacen and Proveedor.cod_proveedor = nota_ingreso.cod_proveedor 
				 		and Almacen.nombre=nombre_almacen;
end;  
$$ language 'plpgsql';

/* 26.Funcion Auxiliar para el trigger*/
create function Eliminar_DetalleI() returns trigger as $$
begin
    if(contarDetalle(old.nro_ingreso)=0) then
	    delete from Nota_Ingreso where Nota_Ingreso.nro_ingreso=old.nro_ingreso;
	end if;
  return new;
end; $$
language plpgsql;

/* 27.Trigger para eliminar un detalle_ingreso*/
create trigger Eliminar_Ingreso after delete
on Detalle_Ingreso
for each row 
    execute procedure Eliminar_DetalleI();

/* 28.Funcion que suma los precios unitarios de la tabla Presentacion_Servicio*/
create or replace FUNCTION Suma_Precio(codPresentacion integer) returns decimal(12,2) as $$
begin
    return (select coalesce(sum(precio_unitario),0) from Presentacion_Servicio,Presentacion 
	        where Presentacion.cod_presentacion=Presentacion_Servicio.cod_presentacion and Presentacion_Servicio.cod_presentacion=codPresentacion);
end; $$
language plpgsql;

/* 29.Funcion para contar la cantidad de detalles que tiene una nota de ingreso*/
create or replace function contarDetalle(nroIngreso integer) returns integer as $$
begin
     return (select count(*) from Detalle_Ingreso where Detalle_Ingreso.nro_ingreso=nroIngreso);
end; $$
language plpgsql;

/* 30.Funcion Auxiliar para el trigger de insercion*/		
create or replace function Insertar_PrecioT() returns trigger as $$
   declare
         precioT decimal(12,2);
		 codPresentacion integer;
begin 
    codPresentacion:=new.cod_presentacion;
    precioT:=Suma_Precio(codPresentacion);
    update Presentacion set precio_total=precioT where cod_presentacion=codPresentacion;
  return new;
end; $$
language plpgsql;

/* 31.Trigger que actualiza el precio total de la presentacion al insertar un servicio*/
create trigger PresentacionServicioInsertar after insert
on Presentacion_Servicio
for each row
    execute procedure Insertar_PrecioT();

/* 32.Funcion Trigger para eliminar un servicio de una presentacion*/
create or replace function Eliminar_PrecioT() returns trigger as $$
   declare
         precioT decimal(12,2);
		 codPresentacion integer;
begin 
	raise notice 'Prcesando Eliminacion de Servicio en la Presentacion %',old.cod_presentacion;
    codPresentacion:=old.cod_presentacion;
    precioT:=Suma_Precio(codPresentacion);
    update Presentacion set precio_total=precioT where cod_presentacion=codPresentacion;
	raise notice 'La eliminacion fue un exito';
  return old;
end; $$
language plpgsql;

/* 33.Trigger para Eliminar un servicio de una Presentacion*/
create trigger PresentacionServicioEliminar after delete
on presentacion_servicio
for each row
	execute procedure Eliminar_PrecioT();

/* 34.Funcion que devuelva el nombre de Persona a traves de su codigo*/
create or replace function getNombrePersona(codigoPersonal integer)returns text
as $$ begin
	return(select nombre
			from personal
			where id_personal=codigoPersonal);
end; $$ 
language plpgsql;

/* 35. Funcion que devuelve el id Persona de una persona llevando como parametro su nombre*/
create or replace function getIdPersonal(nombrePersonal text)returns integer 
as $$ begin
	return (select id_personal
			from personal
			where nombre=nombrePersonal );
end $$ language plpgsql;

/* 36.Funcion que devuelva el nombre de Cliente a traves de su codigo*/
create or replace function getNombreCliente(codigoCliente integer)returns text
as $$ begin
	return(select nombre
			from cliente
			where cod_cliente=codigoCliente);
end; $$ 
language plpgsql;

/* 37. Funcion que devuelve el Codigo Cliente de una persona llevando como parametro su nombre*/
create or replace function getCodCliente(nombreCliente text)returns integer 
as $$ begin
	return (select cod_cliente
			from cliente
			where nombre=nombreCliente );
end $$ language plpgsql;

/*38. Devolver Lista de Notas de Devoluciones*/
create or replace function getListaDeNotasDeDevolucion()
returns table (nro_nota integer, nombre_personal varchar, fecha date,nombre_almacen varchar,
			   tipo_nota char) as $BODY$	
begin
	return query select n.nro_nota, p.nombre, n.fecha, a.nombre, n.tipo 
				 from nota as n,personal as p,almacen as a 
				 where p.id_personal=n.id_personal and 
						a.cod_almacen=n.cod_almacen and 
						n.tipo='D' 
				 order by n.nro_nota; 
end;  
$BODY$ language 'plpgsql';

/*39. Devuelve el cod_almacen de un almacen por su nombre*/
create or replace function getCodAlmacenOnName(nombreAlmacen text)returns integer 
as $$ begin
	return (select cod_almacen
			from almacen
			where nombre=nombreAlmacen);
end $$ language 'plpgsql';

/*40. Funcion que retorna la cantidad de insumos que ingresan en un determinado detalle de ingreso de un determinado almacen y nro de ingreso*/
create or replace function getCantidadDetalleIngreso(nroIngreso integer,idIngreso integer,codAlmacen integer) returns int as
$BODY$
 begin
	return (select cantidad
			from nota_ingreso,detalle_ingreso
			where nota_ingreso.nro_ingreso=detalle_ingreso.nro_ingreso and
		    cod_almacen=codAlmacen and id_ingreso=idingreso and detalle_ingreso.nro_ingreso=nroIngreso);
end;
$BODY$
language plpgsql;

/*41. Funcion auxiliar para el trigger uDetalleIngreso*/
create or replace function uDetalleIngreso() returns trigger as
$$
    declare codInsumo integer;
            codAlmacen integer;
            cantidad integer;
    begin
		codInsumo:=getCodInsumo(new.nombre_insumo);
		if(existeInsumo(codInsumo)) then
		   codAlmacen:=getCodAlmacen(new.nro_ingreso);
           cantidad:=getCantidadDetalleIngreso(new.nro_ingreso,new.id_ingreso,codAlmacen);
		   update Insumo_Almacen set stock=(stock-cantidad)+new.cantidad
		   where cod_insumo=codInsumo and cod_almacen=codAlmacen;
		   raise notice 'Insumo actualizado exitosamente: insumo: % en el Nro de Ingreso: %',new.nombre_insumo,new.nro_ingreso;

		else
		   raise notice 'Error: Insumo no encontrado, Registre el insumo';
		   RAISE EXCEPTION 'Error: No se actualizo el detalle % en el Nro de Ingreso: %',new.nombre_insumo,new.nro_ingreso;
		end if;
		return new;
	end;
$$
language plpgsql;

/*42. Trigger para actualizar el stock de un determinado insumo y almacen al momento de actualizar una fila en la tabla Detalle_Ingreso */
create trigger uDetalleIngreso
before update on Detalle_Ingreso
for each row
	execute procedure uDetalleIngreso();

/*43. Funcion que devuelve el devuelve el tipo de cliente de acuerdo a su codigo*/
create or replace function esPersona(codCliente integer)
returns integer
as $BODY$
declare resultado char;
begin
	resultado:=(select tipo from cliente where cod_cliente=codCliente);
	if resultado='E' then
		return 0;
	else
		return 1;
	end if;
end;
$BODY$ language 'plpgsql';

/*44. Funcion que devuelve el CI o Nit de acuerdo a su tipo*/
create or replace function getNIT_CI_Cliente(codCliente integer)
returns integer
as $BODY$
declare resultado integer;
begin
	if esPersona(codCliente)=1 then
		resultado:=(select nro_carnet from persona where cod_cliente_persona=codCliente);
	else
		resultado:=(select nit from empresa where cod_cliente_empresa=codCliente);
	end if;
return resultado;
end;
$BODY$ language 'plpgsql';