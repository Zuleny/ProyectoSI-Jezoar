--1.- Muestra al cliente que mayor veces han solicitado los servicios de la empresa el año 2019

select nombre,count(cod_cliente_presentacion)as Cantidad_total 
from Cliente, Presentacion
where cod_cliente=cod_cliente_presentacion  and fecha between '2019/01/01' and '2019/12/31' 
group by nombre,cod_cliente_presentacion
order by Cantidad_total desc,
limit 1;

--2.- Muestra los clientes que han sido acpetados para realizar un contrato el año 2018

select  nombre,fecha,direccion,email 
from Cliente, Presentacion
where cod_cliente=cod_cliente_presentacion and fecha between '2018/01/01' and '2018/12/31' and estado='Aceptado' and tipo_presentacion='C'; 



--3.- Muestra la cantidad de empresas que han solicitado el servicio de postobra

select nombre, count(tipo_servicio) as Total_PostObras
from Cliente, Presentacion, Cotizacion
where cod_cliente=cod_cliente_presentacion and Cliente.tipo='E' and cod_presentacion=cod_presentacion_cotizacion 
Group by  tipo_servicio='Post-Obra'



--4.- Muestra a los clientes que han cerrado contrato con la empresa

select Cliente.nombre, fecha_inicio, fecha_fin,precio_total 
from Cliente, Presentacion, Contrato
where cod_cliente=cod_cliente_presentacion and Presentacion.cod_presentacion=Contrato.cod_presentacion



--5.- Muestra a las personas que han presentado documento de requerimiento de servicios

select nombre, count(cod_cliente_presentacion) as Cantidad_requerida
from Cliente, Presentacion
where cod_cliente=cod_cliente_presentacion and Cliente.tipo='P'  
Group by  cod_cliente_presentacion;



--6 Mostrar los clientes, los cuales han aceptado una propuesta o cotización

select Cliente.cod_cliente,Cliente.nombre
from Cliente,Presentacion
where Presentacion.cod_cliente_presentacion=Cliente.cod_cliente and Presentacion.estado='Aceptado'
group by Cliente.cod_cliente,Cliente.nombre;



--7 Cuantas cotizaciones se relizaron en año 2018 para el servicio de limpieza profunda

select count(*)
from Presentacion,Cotizacion
where Presentacion.cod_presentacion=Cotizacion.cod_presentacion_cotizacion and Presentacion.fecha>='2018/01/01' and Presentacion.fecha<='2018/12/31' and Cotizacion.tipo_servicio='Profunda';


--8 Listar los insumos que se han registrado para una determinada propuesta de un determinado cliente

select Insumo.cod_insumo,Insumo.nombre,Propuesta_Insumo.cant_insumo
from Cliente,Presentacion,Propuesta,Propuesta_Insumo,Insumo
where Cliente.cod_cliente=Presentacion.cod_cliente_presentacion and Presentacion.cod_presentacion=Propuesta.cod_presentacion_propuesta and Propuesta.cod_presentacion_propuesta=Propuesta_Insumo.cod_presentacion_propuesta and Propuesta_Insumo.cod_insumo=Insumo.cod_insumo
      and Propuesta.cod_presentacion_propuesta=1 and Cliente.nombre='SERVITODO';



--9 Mostrar la cantidad de propuestas registradas y aceptadas de un determinado cliente

select count(*)
from Cliente,Presentacion,Propuesta
where Cliente.cod_cliente=Presentacion.cod_cliente_presentacion and Presentacion.cod_presentacion=Propuesta.cod_presentacion_propuesta 
      and Presentacion.estado='Aceptado' and Cliente.nombre='SERVITODO' ; 



--10 Mostrar las cotizaciones que no incluyen material desde una determinada fecha hasta otra fecha

select Presentacion.cod_presentacion,Presentacion.fecha,Cotizacion.material
from Presentacion,Cotizacion
where Presentacion.cod_presentacion=Cotizacion.cod_presentacion_cotizacion and Presentacion.fecha>='2018/01/01' and Presentacion.fecha<='2018/12/31' and 
      Cotizacion.material='N';



--11 Listar los servicio que se han requerido de una determinada presentacion que ha sido aceptada

select Servicio.id_servicio,Servicio.nombre
from Presentacion,Presentacion_Servicio,Servicio
where Presentacion.cod_presentacion=Presentacion_Servicio.cod_presentacion and Presentacion_Servicio.id_servicio=Servicio.id_servicio and Presentacion.estado='Aceptado';

--12. Mostrar las herramientas que no estan disponibles en el almacen

	select cod_insumo,insumo.nombre,herramientas.estado
	from insumo,herramientas
	where cod_insumo=cod_insumo_herramienta and estado<>'D'


--13. Mostrar los informes emitidos en el año 2018

select cod_informe,Informe.fecha,Informe.descripcion,Presentacion.cod_presentacion
from Informe,Cotizacion,Presentacion
where Presentacion.cod_presentacion=Cotizacion.cod_presentacion_cotizacion and Informe.cod_presentacion_cotizacion=Cotizacion.cod_presentacion_cotizacion and Informe.fecha between '2018/01/01' and '2018/12/31'


--14. Mostrar los contratos que fueron emitidos desde 2019/01/01 hasta la fecha 2019/08/05

select cod_contrato,fecha_inicio,fecha_fin,cod_presentacion_propuesta 
from Contrato,Presentacion
where Contrato.cod_presentacion = Presentacion.cod_presentacion and Contrato.fecha_inicio>='2019/01/01' and Contrato.fecha_fin<='2019/08/05'



--15. Mostrar la cantidad de los productos de cada categorías

select categoria,sum(Producto_Categoria.cod_categoria)
from Producto,Insumo,Categoria,Producto_Categoria
where Producto.cod_insumo_producto=Insumo.cod_insumo and Producto.cod_insumo_producto=Producto_Categoria.cod_insumo_producto and Categoria.cod_categoria= Producto_Categoria.cod_categoria
group by categoría


--16. Mostrar la marca y sus cantidades respectivas de productos en el almacen

select marca,sum(stock)
from Producto,Insumo,Insumo_Almacen
where Producto.cod_insumo_producto=Insumo.cod_insumo and    Insumo.cod_insumo=Insumo_Almacen.cod_insumo
group by marca


--17. Mostrar el insumo con menor stock en el almacen

select Insumo.cod_insumo,Insumo.nombre,stock
from Insumo_Almacen,Insumo
where Insumo.cod_insumo=Insumo_Almacen.cod_insumo and stock= (select min(stock)
from Insumo,Almacen,Insumo_Almacen
where Insumo.cod_insumo=Insumo_Almacen.cod_insumo and Almacen.cod_almacen=Insumo_Almacen.cod_almacen)



--18. Mostrar la cantidad  de veces que cada proveedor suministro en el almacen

select distinct Nota_Ingreso.cod_proveedor,count(Nota_Ingreso.cod_proveedor)
from Nota_Ingreso,Proveedor
where Proveedor.cod_proveedor=Nota_Ingreso.cod_proveedor
group by Nota_Ingreso.cod_proveedor


--19. Mostrar cuantas notas de ingreso se registraron entre 2018/01/01 y 2018/08/01

select count(*)
from Nota_Ingreso
where fecha_ingreso between '2018/01/01' and '2018/08/01'



--20. Mostrar la cantidad de personal tiene el cargo de supervisor

select count(*)
from Personal
where Personal.cargo='Supervisor'


--21. Mostrar la cantidad de pastillas de baño se suministro en el almacen

select sum(Detalle_Ingreso.Cantidad)
from Detalle_Ingreso,Nota_Ingreso
where Nota_Ingreso.nro_ingreso= Detalle_Ingreso.nro_ingreso and Detalle_Ingreso.nombre_insumo='Pastilla de Baño'

--22. Mostrar la cantidad del personal es de tipo eventual

select count(*)
from Personal
where Personal.tipo='E'

--23. Mostral el personal que tiene el rol de administración

select Personal.id_personal,Personal.nombre
from Personal, Usuario, Rol 
where Personal.id_personal=Usuario.id_personal_usuario and Usuario.cod_usuario=Usuario_Rol.cod_usuario
and Rol.cod_rol=Usuario_Rol.cod_rol and Rol.descripcion='Administracion'
--24. Mostrar las nota de Devolucion

select nro_nota,fecha,nota.tipo, almacen.nombre, personal.nombre
from nota,almacen,personal
where nota.cod_almacen=almacen.cod_almacen and 
nota.id_personal=personal.id_personal and
nota.tipo='D';  



--25. mostrar las notas de Egreso

select nro_nota,fecha,nota.tipo, almacen.nombre, personal.nombre
from nota,almacen,personal
where nota.cod_almacen=almacen.cod_almacen and 
	  nota.id_personal=personal.id_personal and
	  nota.tipo='E';

--26. Mostrar los informes de las ultimas cotizaciones

select informe.cod_informe, informe.fecha, cotizacion.tipo_servicio, presentacion.precio_total, cliente.nombre
from informe,cotizacion,presentacion,cliente
where informe.cod_presentacion_cotizacion=cotizacion.cod_presentacion_cotizacion        	and cotizacion.cod_presentacion_cotizacion=presentacion.cod_presentacion
	and presentacion.cod_cliente_presentacion=cliente.cod_cliente 
order by informe.cod_informe desc
limit 5;

--27. Mostrar los contratos que finalizaron

select contrato.cod_contrato,contrato.fecha_inicio,contrato.fecha_fin,presentacion.cod_presentacion,cliente.nombre
from contrato, presentacion, cliente
where contrato.cod_presentacion=presentacion.cod_presentacion and 
	  presentacion.cod_cliente_presentacion=cliente.cod_cliente;

--29. Mostrar las personas y la cantidad de notas de egreso que recibieron en su trabajo

select personal.nombre,count(nota.nro_nota)
from nota,personal
where nota.id_personal=personal.id_personal and nota.tipo='E'
group by personal.nombre;


--30. Mostrar las notas de un almacen organizados por Egreso y Devolucion

select Nota.nro_nota,Nota.tipo
from Nota
where Nota.cod_almacen=1
