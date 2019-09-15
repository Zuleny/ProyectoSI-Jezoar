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
			delete from detalle_nota where nro_nota=new.nro_nota and id_detalle=new.id_detalle;
			raise notice 'No se registro el insumo % en la nota %',new.nombre_insumo,new.nro_nota;
		end if;
	end if;
	return new;
end; $BODY$ 
language plpgsql;

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
				delete from detalle_nota where nro_nota=new.nro_nota and id_detalle=new.id_detalle;
				raise notice 'No se registro el insumo: % en el nro de Nota: %',new.nombre_insumo,new.nro_nota;
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
end; $BODY$ language plpgsql

/*11. Trigger para la eliminacion de insumo en una Nota de Egreso */
create trigger detalleNotaEgresoAnulacion before delete
on detalle_nota
for each row
	execute procedure detalleEgresoAnulacion();
	
/*12. Funcion Trigger del proceso insertar detalle de la nota de ingreso*/
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
  		   raise notice 'Error: No se registro el detalle % en el Nro de Ingreso: %',new.nombre_insumo,new.nro_ingreso;
		   rollback;
		end if;
		return new;
	end;
$$
language plpgsql;

/*13. Trigger al insertar un detalle de la nota de ingreso aumenta el stock del insumo en un especifico almacen*/
create trigger iDetalleIngreso 
after insert on Detalle_Ingreso
for each row 
	execute procedure ingresoDetalle();

/*14. Funcion que obtiene la fecha realizada de una nota especifica*/
create or replace function getFechaNota(nroNota INTEGER)returns date as 
$$
begin
	return (select fecha
		   	from nota
		   	where nro_nota=nroNota);
end;
$$ language plpgsql;

/*15. Funcion Trigger que Elimina una registro de una nota de Devolucion*/
create or replace function detalleDevolucionAnulacion()returns trigger as $BODY$ 
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
		if cantDiasLimite < 4 then
			update insumo_almacen set stock = stock - old.cantidad_insumo 
				   where cod_almacen = codAlmacen and cod_insumo = codInsumo;
			raise notice 'La anulacion del registro del insumo % fue exitoso. Nota nro: %',old.nombre_insumo,old.nro_nota;
		else 
			raise notice 'Registro de la nota de devolucion nro %, no puede ser eliminado',old.nro_nota;
			raise notice 'Solo tiene permiso de eliminar antes de 3 dias del registro del insumo %',old.nombre_insumo;
			rollback;
		end if;
	end if;
	return old;
end;
$BODY$ language plpgsql;

/*16. Trigger para el proceso de Anulacion de un registro de una Nota de Devolucion*/
create trigger detalleNotaDevolucionAnulacion after delete
on detalle_nota
for each row
	execute procedure detalleDevolucionAnulacion();