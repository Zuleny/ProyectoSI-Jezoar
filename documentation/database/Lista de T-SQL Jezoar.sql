/*------------1. Funcion que Devuelve el stock de un insumo en un Almacen especifico(cantidad Disponible del Insumo)------------------------------*/
create or replace function getStockInsumo(nombreInsumo varchar(35), codAlmacen integer)returns int
/*------------2. Funcion que devuelve el codigo de Insumo a traves del su nombre------------------------------------------------------------------*/
create or replace function getCodInsumo(nombreInsumo varchar(35)) returns integer
/*------------3. Funcion que Devuelve el tipo de Nota, Si es Egreso o Devolucion------------------------------------------------------------------*/
create or replace function getTipoNota(nroNota integer)returns text
/*------------4. Funcion Auxiliar que devuelve el codigo de almacen de una nota de Egreso o Devolucion.-------------------------------------------*/
create or replace function getCodAlmacen(nroNota integer)returns integer
/*------------5. Funcion que devuelve true si el insumo ya esta registrado, falso caso contrario--------------------------------------------------*/
create or replace function existeInsumo(codInsumo integer)returns boolean 
/*------------6. Funcion trigger para el proceso de devolucion de Insumos-------------------------------------------------------------------------*/
create or replace function DevolucionDetalle() returns trigger
/*------------7. Trigger para Incrementar el stock de insumos en la Nota de Devolucion------------------------------------------------------------*/
create trigger detalleNotaDevolucion after insert on detalle_Nota
/*------------8. Funcion trigger para el preceso de decremento del insumo en un almacen-----------------------------------------------------------*/
create or replace function EgresoDetalle() RETURNS trigger
/*------------9. Trigger para decrementar el stock del insumo que se registra en la nota de egreso------------------------------------------------*/
create trigger detalleNotaEgreso after insert on detalle_nota
/*------------10. Funcion Trigger para el proceso de anulacion de salida de un insumo-------------------------------------------------------------*/
create or replace function detalleEgresoAnulacion() returns trigger 
/*------------11. Trigger para la eliminacion de insumo en una Nota de Egreso---------------------------------------------------------------------*/
create trigger detalleNotaEgresoAnulacion before delete on detalle_nota
/*------------12. Funcion que obtiene la fecha realizada de una nota especifica-------------------------------------------------------------------*/
create or replace function getFechaNota(nroNota INTEGER)returns date
/*------------13. Funcion Trigger que Elimina una registro de una nota de Devolucion--------------------------------------------------------------*/
create or replace function detalleDevolucionAnulacion()returns trigger
/*------------14. Trigger para anular un detalle de una nota de devolucion------------------------------------------------------------------------*/
create trigger detalleNotaDevolucionAnulacion after delete on detalle_nota
/*------------15. Funcion auxiliar para el trigger iDetalleIngreso--------------------------------------------------------------------------------*/
create or replace function ingresoDetalle() returns trigger
/*------------16. Trigger para actualizar el stock de un determinado insumo y almacen al momento de insertar una fila en la tabla Detalle_Ingreso */
create trigger iDetalleIngreso before insert on Detalle_Ingreso
/*------------17. Funcion Auxiliar para el trigger dDetalleIngreso--------------------------------------------------------------------------------*/
create or replace function dIngresoDetalle() returns trigger
/*------------18. Trigger para actualizar el stock de un determinado insumo y almacen al momento de eliminar una fila en la tabla Detalle_Ingreso-*/
create trigger dDetalleIngreso before delete on Detalle_Ingreso
/*------------19. Devuelve el nombre de la categoria a la que pertenece un determinado codigo producto--------------------------------------------*/
CREATE OR REPLACE FUNCTION getcategoriadeproducto(cod_prod integer)RETURNS varchar(200)
/*------------20.Devuelve el codigo de categoria de undeterminado nombre de categoria-------------------------------------------------------------*/
CREATE OR REPLACE FUNCTION getcodcategoriadeproducto(nombrecategoria varchar(200))RETURNS integer
/*21. Devuelve una tabla con el codigo de producto,nombre del insumo,la descripcion,la marca del producto, la categoria a la que pertenece un producto, y el precio*/
create or replace function getListaDeProductos() returns table
/*------------22. Funcion que devuleve el inventario de un especifico almacen a traves de su nombre-----------------------------------------------*/
create or replace function getInventarioDeProductos(nombreAlmacen varchar(20)) returns table
/*------------23. Funcion que devuelve el inventario de herramientas de un especifico almacen a traves de su nombre-------------------------------*/
create or Replace function getHerramientaStock(nombreAlmacen varchar(20)) returns table
/*------------24. Funcion que devuelve el precio Total de una sola nota---------------------------------------------------------------------------*/
create or replace function getPrecioTotalUnaNota(cod_nota integer) returns decimal(12,2) 
/*------------25. Funcion que devuelve una tabla con los precios totales de una nota en el almacen------------------------------------------------*/ 
create or replace function getListaPrecioTotales(nombre_almacen varchar(25)) returns table
/*------------26.Funcion Auxiliar para el trigger-------------------------------------------------------------------------------------------------*/
create function Eliminar_DetalleI() returns trigger
/*------------27.Trigger para eliminar un detalle_ingreso-----------------------------------------------------------------------------------------*/
create trigger Eliminar_Ingreso after delete on Detalle_Ingreso
/*------------28.Funcion que suma los precios unitarios de la tabla Presentacion_Servicio---------------------------------------------------------*/
create or replace FUNCTION Suma_Precio(codPresentacion integer) returns decimal(12,2)
/*------------29.Funcion para contar la cantidad de detalles que tiene una nota de ingreso--------------------------------------------------------*/
create or replace function contarDetalle(nroIngreso integer) returns integer
/*------------30.Funcion Auxiliar para el trigger de insercion------------------------------------------------------------------------------------*/
create or replace function Insertar_PrecioT() returns trigger
/*------------31.Trigger que actualiza el precio total de la presentacion al insertar un servicio-------------------------------------------------*/
create trigger PresentacionServicioInsertar after insert on Presentacion_Servicio
/*------------32.Funcion Trigger para eliminar un servicio de una presentacion--------------------------------------------------------------------*/
create or replace function Eliminar_PrecioT() returns trigger
/*------------33.Trigger para Eliminar un servicio de una Presentacion----------------------------------------------------------------------------*/
create trigger PresentacionServicioEliminar after delete on presentacion_servicio
/*------------34.Funcion que devuelva el nombre de Persona a traves de su codigo------------------------------------------------------------------*/
create or replace function getNombrePersona(codigoPersonal integer)returns text
/*------------35. Funcion que devuelve el id Persona de una persona llevando como parametro su nombre---------------------------------------------*/
create or replace function getIdPersonal(nombrePersonal text)returns integer 
/*------------36.Funcion que devuelva el nombre de Cliente a traves de su codigo------------------------------------------------------------------*/
create or replace function getNombreCliente(codigoCliente integer)returns text
/*------------37. Funcion que devuelve el Codigo Cliente de una persona llevando como parametro su nombre-----------------------------------------*/
create or replace function getCodCliente(nombreCliente text)returns integer 
/*------------38. Devolver Lista de Notas de Devoluciones-----------------------------------------------------------------------------------------*/
create or replace function getListaDeNotasDeDevolucion() returns table
/*------------39. Devuelve el cod_almacen de un almacen por su nombre-----------------------------------------------------------------------------*/
create or replace function getCodAlmacenOnName(nombreAlmacen text)returns integer 
