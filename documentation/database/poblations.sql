insert into Cliente values(1,'SERVITODO ','San Martin,2do Anillo','servitodo_100@gmail.com','E');
insert into Cliente values(2,'Yerba Buena','Av. Roca y Coronado,3er Anillo','yerba.buena@gmail.bo','E');
insert into Cliente values(3,'MBI ','Av. La Salle, 4to anillo','mbi.santacruz@gmail.com','E');
insert into Cliente values(4,'FONPLATA ','San Martin,2do Anillo','fonplataSC@gmail.com','E');
insert into Cliente values(5,'Maria Leon Perez','Av. Centenario,1er anillo',null,'P');
insert into Cliente values(6,'Michael Espada Lopez','Av. Noel Kempff Mercado','espada_michael@hotmail.com','P');

insert into Telefono(cod_cliente_telefono,telefono) values(1,'65646261');
insert into Telefono(cod_cliente_telefono,telefono) values(1,'78451296');
insert into Telefono(cod_cliente_telefono,telefono) values(2,'75124587');
insert into Telefono(cod_cliente_telefono,telefono) values(3,'65646261');
insert into Telefono(cod_cliente_telefono,telefono) values(3,'68451232');
insert into Telefono(cod_cliente_telefono,telefono) values(4,'70002145');
insert into Telefono(cod_cliente_telefono,telefono) values(5,'70784515');
insert into Telefono(cod_cliente_telefono,telefono) values(6,'62155489');
insert into Telefono(cod_cliente_telefono,telefono) values(6,'78964546');


insert  into Empresa values (1,'2031215562');
insert  into Empresa values (2,'3265412017');
insert  into Empresa values (3,'3265412017');
insert  into Empresa values (4,'3265412017');

insert  into Persona values (5,1064211018);
insert  into Persona values (6,2515421018);

insert into Presentacion values(1,'2018/05/21','Aceptado',141000,1,'P');  
insert into Presentacion values(2,'2018/05/25','Denegado',27500,2,'C');
insert into Presentacion values(3,'2018/05/29','Aceptado',45250,2,'C');
insert into Presentacion values(4,'2018/07/21','Aceptado',180220,3,'P'); 
insert into Presentacion values(5,'2018/08/11','Aceptado',40000,4,'P');
insert into Presentacion values(6,'2018/09/15','Denegado',374400,4,'P');
insert into Presentacion values(7,'2018/10/02','Aceptado',12560,3,'C');
insert into Presentacion values(8,'2019/01/10','Aceptado',13500,5,'C');
insert into Presentacion values(9,'2019/02/05','Denegado',11500,2,'P');
insert into Presentacion values(10,'2019/02/20','Denegado',430000,6,'P');
insert into Presentacion values(11,'2019/04/21','Espera',30000,5,'P');

insert into Servicio values(1,'Limpieza general de oficinas');
insert into Servicio values(2,'Limpieza general de oficinas');
insert into Servicio values(3,'Limpieza general de oficinas');
insert into Servicio values(4,'Limpieza de vidrios');
insert into Servicio values(5,'Limpieza de vidrios');
insert into Servicio values(6,'Limpieza de vidrios');
insert into Servicio values(7,'Limpieza de pisos');
insert into Servicio values(8,'Limpieza de escaleras');
insert into Servicio values(9,'Limpieza de escaleras');
insert into Servicio values(10,'Limpieza general de postobra');
insert into Servicio values(11,'Limpieza general de postobra');
insert into Servicio values(12,'Limpieza general de postobra');
insert into Servicio values(13,'Servicio de supervicion');
insert into Servicio values(14,'Servicio de supervicion');
insert into Servicio values(15,'Limpieza general profunda');
insert into Servicio values(16,'Limpieza general profunda');
insert into Servicio values(17,'Limpieza general profunda');
insert into Servicio values(18,'Prestacion de materiales');
insert into Servicio values(19,'Prestacion de materiales');

insert into Detalle_Servicio values(1,1,'Incluye IVA');
insert into Detalle_Servicio values(2,1,'Incluye materiales');
insert into Detalle_Servicio values(3,1,'Mano de obra');
insert into Detalle_Servicio values(4,1,'Incluye IVA');
insert into Detalle_Servicio values(5,1,'Sin material');
insert into Detalle_Servicio values(6,1,'Incluye IVA');
insert into Detalle_Servicio values(7,1,'Sin material');
insert into Detalle_Servicio values(8,1,'Sin material');
insert into Detalle_Servicio values(9,1,'Incluye IVA');
insert into Detalle_Servicio values(10,1,'Con material');
insert into Detalle_Servicio values(11,1,'Incluye IVA');
insert into Detalle_Servicio values(12,1,'Mano de obra');
insert into Detalle_Servicio values(13,1,'Con material');
insert into Detalle_Servicio values(14,1,'Incluye IVA');
insert into Detalle_Servicio values(15,1,'Con material');
insert into Detalle_Servicio values(16,1,'Incluye IVA');
insert into Detalle_Servicio values(17,1,'Mano de obra');
insert into Detalle_Servicio values(18,1,'Con material');
insert into Detalle_Servicio values(19,1,'Mano de obra');

insert into Presentacion_Servicio values(1,1,'Oficina',4,9750);
insert into Presentacion_Servicio values(1,6,'Oficina',1,2000);
insert into Presentacion_Servicio values(2,6,'Bloque',10,26900);
insert into Presentacion_Servicio values(2,7,'Bloque',1,600);     
insert into Presentacion_Servicio values(3,7,'Bloque',7,45250);
insert into Presentacion_Servicio values(4,1,'Oficina',6,13919);
insert into Presentacion_Servicio values(4,8,'Oficina',0,900); 
insert into Presentacion_Servicio values(5,1,'Oficina',2,2913.3);
insert into Presentacion_Servicio values(5,8,'Oficina',0,416.7);
insert into Presentacion_Servicio values(6,1,'Oficina',8,28750);
insert into Presentacion_Servicio values(6,8,'Oficina',0,2450);
insert into Presentacion_Servicio values(7,7,'Bloque',3,11000);
insert into Presentacion_Servicio values(7,8,'Bloque',4,1560);
insert into Presentacion_Servicio values(8,5,'Oficina',0,11500);
insert into Presentacion_Servicio values(8,8,'Oficina',0,2500);
insert into Presentacion_Servicio values(9,2,'Oficina',1,3900);
insert into Presentacion_Servicio values(9,3,'Oficina',2,4000);
insert into Presentacion_Servicio values(9,8,'Oficina',0,300); 
insert into Presentacion_Servicio values(10,1,'Oficina',9,33333.3);
insert into Presentacion_Servicio values(10,8,'Oficina',0,2500); 
insert into Presentacion_Servicio values(11,2,'Oficina',1,2000);
insert into Presentacion_Servicio values(11,8,'Oficina',0,500); 

insert into Propuesta values(1,12);
insert into Propuesta values(4,12);
insert into Propuesta values(5,12);
insert into Propuesta values(6,12);
insert into Propuesta values(9,12);
insert into Propuesta values(10,12);
insert into Propuesta values(11,12);

insert into Cotizacion values(2,7,'Profunda','N');
insert into Cotizacion values(3,15,'Post-Obra','S');
insert into Cotizacion values(7,28,'Profunda','S');
insert into Cotizacion values(8,90,'Post-Obra','S');

insert into Insumo values(1,'Liquido aromatizante de piso','Este producto se utiliza para Aromatizar y limpiar pisos elimina grasa, polvo y mugre. Da vida a sus pisos, mejorando 
la apariencia y dejando una agradable fragancia ambiental','P');
insert into Insumo values(2,'Liquido limpiavidrios','Este producto se utiliza para limpiar las manchas y mugre difíciles de quitar en vidrios, espejos, cristales, etc. así como las 
cubiertas plásticas de equipo de cómputo (CPU, impresoras, etc.), escritorios, teléfonos, etcétera. Ya que contiene solventes orgánicos que eliminan fácilmente las manchas. Altamente
rendidor, además posee esencia que deja un aroma agradable en el ambiente','P');

insert into Insumo values(3,'Cera','Este producto se utiliza para pulir pisos','P');

insert into Insumo values(4,'Antisarro','Limpiador desinfectante ácido para sanitarios. Renueva y evita formulación de sarro depósitos minerales y manchas de óxidos. Elimina los malos olores','P');
insert into Insumo values(5,'Pastilla de Baño','Este producto se utiliza para neutralizar olores','P');
insert into Insumo values(6,'Ambientador en spray','Este producto es utilizado para aromatizar ambientes','P'); 
insert into Insumo values(7,'Jabon liquido','Este producto se utiliza para el aseo de manos en los sanitarios','P');
insert into Insumo values(8,'Acido nitrico','Este producto es utilizado para remover residuos de cemento y
mortero en obra nueva','P');
insert into Insumo values(9,'Lustramueble','Este producto es utilizado para la limpieza de muebles','P');
insert into Insumo values(10,'Desinfectante de piso','Combina la acción desinfectante con un excelente poder limpiador. Tiene una acción bactericida, fungicida y sanitizante','P');
insert into Insumo values(11,'Lavandina','Este producto se utiliza para desinfectar materiales','P');
insert into Insumo values(12,'Detergente en polvo','Este producto sirve para la limpieza de materiales de trabajo','P');
insert into Insumo values(13,'Paños de limpieza de vidrio','Este producto sirve para secar vidrios','P');
insert into Insumo values(14,'Bolsas plasticas','Se utiliza para la recoleccion de desechos','P');

insert into Insumo values(15,'Guantes de latex','Este producto es para uso en la cocina','H');
insert into Insumo values(16,'Escoba','Este producto es utilizado para barrer','H');
insert into Insumo values(17,'Trapeador','Este producto es utilizado para sacar el agua y a su ves realizar limpieza','H');
insert into Insumo values(18,'Avion','Este producto es utilizado para realizar limpieza en los vidrios','H');
insert into Insumo values(19,'Mocha','Este producto es utilizdo para realizar limpieza en piso','H');
insert into Insumo values(20,'Alsabasura','Producto utilizado para el recojon de basura','H');
insert into Insumo values(21,'Casco','Esta herramienta sirve para brindar seguridadd','H');
insert into Insumo values(22,'Guantes amarillos','Se utilizarán para limpieza que requiera el uso de agua en BAÑOS','H');
insert into Insumo values(23,'Cepillos de mango largo','Especialmente diseñado para lavar la parte interna del inodoro','H');
insert into Insumo values(24,'Gomas o araganas','Este artículo es utilizado para escurrir el agua a un lugar determinado','H');
insert into Insumo values(25,'Cepillos de mano','Están diseñados para poder efectuar la limpieza de paredes y esquinas','H');
insert into Insumo values(26,'Paños de fibra dura','Para el lavado de pisos','P');
insert into Insumo values(27,'Paños de algodon','Para finalizar el lavado de pisos','P');
insert into Insumo values(28,'Sopapas','Para posible taponeos','H');
insert into Insumo values(29,'Franelas','Para la limpieza en muebles, evitando de esta manera posibles ralladuras','P');
insert into Insumo values(30,'Aspiradora','Este artefacto sirve para aspirar el polvo y otras partículas pequeñas de suciedad, generalmente del suelo','H');
insert into Insumo values(31,'Lustradora','Este artefacto sirve para proporcionar un excelente lustre dando al piso el efecto de “mojado permanente”.
o y de gran capacidad de trabajo, instantáneamente dejan la superficie con billo al máximo','H');
insert into Insumo values(32,'Escalera metalica','Este artefacto sirve alcanzar superficies de mayor altitud','H');
insert into Insumo values(33,'Esponja','Este producto sirve para el fregado de superficies lisas','P');
insert into Insumo values(34,'Balde','Es utilizado para contener agua junto a otras sustancias liquidas de limpieza','H');

insert into Propuesta_Insumo values(1,1,3);
insert into Propuesta_Insumo values(1,2,4);
insert into Propuesta_Insumo values(1,3,4);
insert into Propuesta_Insumo values(1,4,4);
insert into Propuesta_Insumo values(1,5,4);
insert into Propuesta_Insumo values(1,9,4);
insert into Propuesta_Insumo values(1,10,4);
insert into Propuesta_Insumo values(1,11,4);
insert into Propuesta_Insumo values(1,12,8);
insert into Propuesta_Insumo values(1,13,4);
insert into Propuesta_Insumo values(1,14,4);
insert into Propuesta_Insumo values(1,18,4);
insert into Propuesta_Insumo values(1,19,4);
insert into Propuesta_Insumo values(1,22,4);
insert into Propuesta_Insumo values(1,31,1);

insert into Propuesta_Insumo values(4,1,4);
insert into Propuesta_Insumo values(4,2,6);
insert into Propuesta_Insumo values(4,3,6);
insert into Propuesta_Insumo values(4,4,6);
insert into Propuesta_Insumo values(4,5,6);
insert into Propuesta_Insumo values(4,9,6);
insert into Propuesta_Insumo values(4,10,6);
insert into Propuesta_Insumo values(4,11,6);
insert into Propuesta_Insumo values(4,12,12);
insert into Propuesta_Insumo values(4,13,6);
insert into Propuesta_Insumo values(4,14,6);
insert into Propuesta_Insumo values(4,18,6);
insert into Propuesta_Insumo values(4,19,6);
insert into Propuesta_Insumo values(4,22,6);
insert into Propuesta_Insumo values(4,23,6);
insert into Propuesta_Insumo values(4,29,6);
insert into Propuesta_Insumo values(4,31,1);

insert into Propuesta_Insumo values(5,1,2);
insert into Propuesta_Insumo values(5,2,2);
insert into Propuesta_Insumo values(5,3,2);
insert into Propuesta_Insumo values(5,4,2);
insert into Propuesta_Insumo values(5,5,2);
insert into Propuesta_Insumo values(5,9,2);
insert into Propuesta_Insumo values(5,10,2);
insert into Propuesta_Insumo values(5,11,2);
insert into Propuesta_Insumo values(5,12,4);
insert into Propuesta_Insumo values(5,13,2);
insert into Propuesta_Insumo values(5,15,2);
insert into Propuesta_Insumo values(5,18,2);
insert into Propuesta_Insumo values(5,20,2);
insert into Propuesta_Insumo values(5,22,2);
insert into Propuesta_Insumo values(5,30,1);

insert into Propuesta_Insumo values(6,1,8);
insert into Propuesta_Insumo values(6,2,8);
insert into Propuesta_Insumo values(6,3,8);
insert into Propuesta_Insumo values(6,4,8);
insert into Propuesta_Insumo values(6,5,8);
insert into Propuesta_Insumo values(6,9,8);
insert into Propuesta_Insumo values(6,10,8);
insert into Propuesta_Insumo values(6,11,8);
insert into Propuesta_Insumo values(6,12,16);
insert into Propuesta_Insumo values(6,13,8);
insert into Propuesta_Insumo values(6,14,8);
insert into Propuesta_Insumo values(6,23,8);

insert into Propuesta_Insumo values(9,1,3);
insert into Propuesta_Insumo values(9,2,3);
insert into Propuesta_Insumo values(9,3,3);
insert into Propuesta_Insumo values(9,4,3);
insert into Propuesta_Insumo values(9,5,3);
insert into Propuesta_Insumo values(9,6,3);
insert into Propuesta_Insumo values(9,9,3);
insert into Propuesta_Insumo values(9,10,2);
insert into Propuesta_Insumo values(9,13,3);
insert into Propuesta_Insumo values(9,16,3);
insert into Propuesta_Insumo values(9,18,3);
insert into Propuesta_Insumo values(9,19,3);

insert into Propuesta_Insumo values(10,1,9);
insert into Propuesta_Insumo values(10,2,9);
insert into Propuesta_Insumo values(10,3,9);
insert into Propuesta_Insumo values(10,4,9);
insert into Propuesta_Insumo values(10,5,9);
insert into Propuesta_Insumo values(10,7,9);
insert into Propuesta_Insumo values(10,9,9);
insert into Propuesta_Insumo values(10,16,9);
insert into Propuesta_Insumo values(10,17,9);
insert into Propuesta_Insumo values(10,18,9);
insert into Propuesta_Insumo values(10,19,9);
insert into Propuesta_Insumo values(10,20,9);
insert into Propuesta_Insumo values(10,26,9);
insert into Propuesta_Insumo values(10,27,9);
insert into Propuesta_Insumo values(10,30,1);
insert into Propuesta_Insumo values(10,31,1);

insert into Propuesta_Insumo values(11,1,1);
insert into Propuesta_Insumo values(11,2,1);
insert into Propuesta_Insumo values(11,3,1);
insert into Propuesta_Insumo values(11,4,1);
insert into Propuesta_Insumo values(11,7,1);
insert into Propuesta_Insumo values(11,9,1);
insert into Propuesta_Insumo values(11,10,1);
insert into Propuesta_Insumo values(11,11,1);
insert into Propuesta_Insumo values(11,12,2);
insert into Propuesta_Insumo values(11,13,1);
insert into Propuesta_Insumo values(11,14,1);
insert into Propuesta_Insumo values(11,16,1);
insert into Propuesta_Insumo values(11,18,1);
insert into Propuesta_Insumo values(11,23,1);

insert into Producto values(1,45,'EcoClean'); 
insert into Producto values(2,23,'Verlin'); 
insert into Producto values(3,20,'Ola');  
insert into Producto values(4,12,'Ola');  
insert into Producto values(5,12.5,'Glade'); 
insert into Producto values(6,18,'Poett'); 
insert into Producto values(7,21,'Liz');  
insert into Producto values(8,48,'Telchi'); 
insert into Producto values(9,15,'Ola');
insert into Producto values(10,17,'Ola'); 
insert into Producto values(11,18,'X6'); 
insert into Producto values(12,32,'Surf');
insert into Producto values(13,450,'Scott'); 
insert into Producto values(14,21,'Belen');  
insert into Producto values(26,10,'FibraN');
insert into Producto values(27,7,'DonPaño');
insert into Producto values(29,5,'DonPaño');
insert into Producto values(33,5,'Sapolio'); 

insert into Herramienta values(15,'D'); 
insert into Herramienta values(16,'D'); 
insert into Herramienta values(17,'D'); 
insert into Herramienta values(18,'D'); 
insert into Herramienta values(19,'D'); 
insert into Herramienta values(20,'D');
insert into Herramienta values(21,'N'); 
insert into Herramienta values(22,'N'); 
insert into Herramienta values(23,'D'); 
insert into Herramienta values(24,'D');
insert into Herramienta values(25,'D'); 
insert into Herramienta values(28,'D'); 
insert into Herramienta values(30,'M');  
insert into Herramienta values(31,'N'); 
insert into Herramienta values(32,'N');
insert into Herramienta values(34,'D'); 

insert into Categoria values(1,'pisos'); 
insert into Categoria values(2,'vidrios');
insert into Categoria values(3,'sanitario');
insert into Categoria values(4,'mueble');

insert into Producto_Categoria values(1,1); 
insert into Producto_Categoria values(2,2);
insert into Producto_Categoria values(3,1); 
insert into Producto_Categoria values(4,3); 
insert into Producto_Categoria values(5,3); 
insert into Producto_Categoria values(6,3);
insert into Producto_Categoria values(7,3); 
insert into Producto_Categoria values(8,1);  
insert into Producto_Categoria values(9,4); 
insert into Producto_Categoria values(10,1);
insert into Producto_Categoria values(11,1); 
insert into Producto_Categoria values(12,1); 
insert into Producto_Categoria values(13,2); 
insert into Producto_Categoria values(14,1); 
insert into Producto_Categoria values(26,1); 
insert into Producto_Categoria values(27,1); 
insert into Producto_Categoria values(29,4); 
insert into Producto_Categoria values(33,1); 

insert into Almacen values(1,'Almacen1','4to anillo Av. La Salle');

insert into Insumo_Almacen values(1,1,10); 
insert into Insumo_Almacen values(2,1,8); 
insert into Insumo_Almacen values(3,1,12); 
insert into Insumo_Almacen values(4,1,12); 
insert into Insumo_Almacen values(5,1,50); 
insert into Insumo_Almacen values(6,1,15); 
insert into Insumo_Almacen values(7,1,15); 
insert into Insumo_Almacen values(8,1,5); 
insert into Insumo_Almacen values(9,1,18); 
insert into Insumo_Almacen values(10,1,15); 
insert into Insumo_Almacen values(11,1,10); 
insert into Insumo_Almacen values(12,1,15); 
insert into Insumo_Almacen values(13,1,40); 
insert into Insumo_Almacen values(14,1,20); 
insert into Insumo_Almacen values(15,1,24); 
insert into Insumo_Almacen values(16,1,24); 
insert into Insumo_Almacen values(17,1,24); 
insert into Insumo_Almacen values(18,1,10); 
insert into Insumo_Almacen values(19,1,24); 
insert into Insumo_Almacen values(20,1,24); 
insert into Insumo_Almacen values(21,1,17); 
insert into Insumo_Almacen values(22,1,17); 
insert into Insumo_Almacen values(23,1,12); 
insert into Insumo_Almacen values(24,1,20);
insert into Insumo_Almacen values(25,1,12); 
insert into Insumo_Almacen values(26,1,20); 
insert into Insumo_Almacen values(27,1,20);
insert into Insumo_Almacen values(28,1,12); 
insert into Insumo_Almacen values(29,1,20); 
insert into Insumo_Almacen values(30,1,2); 
insert into Insumo_Almacen values(31,1,1); 
insert into Insumo_Almacen values(32,1,4);
insert into Insumo_Almacen values(33,1,24); 
insert into Insumo_Almacen values(34,1,24);

insert into Informe values(1,'2018/06/13','Informe de Trabajo Concluido 
De mi consideración:
Me dirijo a ustedes, a tiempo de saludarlos, hago llegar a su persona mis más sinceros deseos de éxitos en sus funciones.
Al mismo tiempo INFORMALES QUE SE HA CONCLUIDO EL TRABAJO DE LIMPIEZA POST OBRA del area indicada y en el tiempo establecido, adjunto fotos del trabajo concluido.',3);
insert into Informe values(2,'2018/10/30','Informe de Trabajo Concluido 
De mi consideración:
Me dirijo a ustedes, a tiempo de saludarlos, hago llegar a su persona mis más sinceros deseos de éxitos en sus funciones.
Al mismo tiempo INFORMALES QUE SE HA CONCLUIDO EL TRABAJO DE LIMPIEZA PROFUNDA del area indicada y en el tiempo establecido, adjunto fotos del trabajo concluido.',7);
insert into Informe values(3,'2019/04/10','Informe de Trabajo Concluido 
De mi consideración:
Me dirijo a ustedes, a tiempo de saludarlos, hago llegar a su persona mis más sinceros deseos de éxitos en sus funciones.
Al mismo tiempo INFORMALES QUE SE HA CONCLUIDO EL TRABAJO DE LIMPIEZA POST OBRA del area indicada y en el tiempo establecido, adjunto fotos del trabajo concluido.',8);

insert into Contrato values(1,'2018/05/23','2019/05/23',1);
insert into Contrato values(2,'2018/07/25','2019/07/25',4);
insert into Contrato values(3,'2018/08/18','2019/02/18',5);

insert into Proveedor values (1,'Susan Aparicio','COIMSA','3453579','ventas@coimsa.com.bo','Av. Alemana, Calle Tamarindo #2110');
insert into Proveedor(cod_proveedor,nombre_proveedor,nombre_empresa,direccion) values (2,'Juan Perez','MULTI-ECO','Avion Pirata');

insert into Nota_Ingreso values (1,'2018/05/15','Leonor Claros Torrico',1,1);
insert into Nota_Ingreso values (2,'2018/06/23','Leonor Claros Torrico',1,2);
insert into Nota_Ingreso values (3,'2018/07/20','Leonor Claros Torrico',1,1);
insert into Nota_Ingreso values (4,'2018/10/02','Leonor Claros Torrico',1,1);
insert into Nota_Ingreso values (5,'2018/11/15','Leonor Claros Torrico',1,2);
insert into Nota_Ingreso values (6,'2019/01/05','Leonor Claros Torrico',1,1);
insert into Nota_Ingreso values (7,'2019/04/01','Leonor Claros Torrico',1,2);
insert into Nota_Ingreso values (8,'2019/05/15','Leonor Claros Torrico',1,1);
insert into Nota_Ingreso values (9,'2019/08/01','Leonor Claros Torrico',1,1);

insert into Detalle_Ingreso values(1,'Liquido aromatizante de piso',12,45,1);
insert into Detalle_Ingreso values(2,'Liquido limpiavidrios',10,23,1);
insert into Detalle_Ingreso values(3,'Cera',15,20,1);
insert into Detalle_Ingreso values(4,'Antisarro',15,12,1);
insert into Detalle_Ingreso values(5,'Pastilla de Baño',60,12.5,1);
insert into Detalle_Ingreso values(6,'Ambientador en spray',24,18,1); 
insert into Detalle_Ingreso values(7,'Jabon liquido',24,21,1);
insert into Detalle_Ingreso values(8,'Acido nitrico',6,48,1);
insert into Detalle_Ingreso values(9,'Lustramueble',24,15,1);
insert into Detalle_Ingreso values(10,'Desinfectante de piso',18,17,1);
insert into Detalle_Ingreso values(11,'Lavandina',12,18,1);
insert into Detalle_Ingreso values(12,'Detergente en polvo',24,32,1);
insert into Detalle_Ingreso values(13,'Paños de limpieza de vidrio',40,450,1);
insert into Detalle_Ingreso values(14,'Bolsas plasticas',24,21,1);
insert into Detalle_Ingreso values(15,'Guantes de latex',24,8,1);
insert into Detalle_Ingreso values(16,'Escoba',24,28,1);
insert into Detalle_Ingreso values(17,'Trapeador',24,20,1);
insert into Detalle_Ingreso values(18,'Avion',10,140,1);
insert into Detalle_Ingreso values(19,'Mocha',24,28,1);
insert into Detalle_Ingreso values(20,'Alsabasura',24,15,1);
insert into Detalle_Ingreso values(21,'Casco',17,60,1);
insert into Detalle_Ingreso values(22,'Guantes amarillos',17,15,1);
insert into Detalle_Ingreso values(23,'Cepillos de mango largo',12,10,1);
insert into Detalle_Ingreso values(24,'Gomas o araganas',24,12.5,1);
insert into Detalle_Ingreso values(25,'Cepillos de mano',12,8,1);
insert into Detalle_Ingreso values(26,'Paños de fibra dura',24,10,1);
insert into Detalle_Ingreso values(27,'Paños de algodon',24,7,1);
insert into Detalle_Ingreso values(28,'Sopapas',12,8,1);
insert into Detalle_Ingreso values(29,'Franelas',24,5,1);
insert into Detalle_Ingreso values(30,'Aspiradora',2,835.2,1);
insert into Detalle_Ingreso values(31,'Lustradora',1,23016,1);
insert into Detalle_Ingreso values(32,'Escalera metalica',4,800,1);
insert into Detalle_Ingreso values(33,'Esponja',24,5,1);
insert into Detalle_Ingreso values(34,'Balde',24,34,1);

insert into Detalle_Ingreso values(35,'Liquido aromatizante de piso',10,45,2);
insert into Detalle_Ingreso values(36,'Liquido limpiavidrios',8,23,2);
insert into Detalle_Ingreso values(37,'Cera',12,20,2);
insert into Detalle_Ingreso values(38,'Antisarro',12,12,2);
insert into Detalle_Ingreso values(39,'Pastilla de Baño',60,12.5,2);
insert into Detalle_Ingreso values(40,'Ambientador en spray',15,18,2); 
insert into Detalle_Ingreso values(41,'Jabon liquido',15,21,2);
insert into Detalle_Ingreso values(42,'Lustramueble',5,15,2);
insert into Detalle_Ingreso values(43,'Desinfectante de piso',24,17,2);
insert into Detalle_Ingreso values(44,'Lavandina',15,18,2);
insert into Detalle_Ingreso values(45,'Detergente en polvo',12,32,2);
insert into Detalle_Ingreso values(46,'Paños de limpieza de vidrio',40,450,2);
insert into Detalle_Ingreso values(47,'Bolsas plasticas',24,21,2);
insert into Detalle_Ingreso values(48,'Guantes de latex',24,8,2);
insert into Detalle_Ingreso values(49,'Guantes amarillos',17,15,2);
insert into Detalle_Ingreso values(50,'Paños de fibra dura',24,10,2);
insert into Detalle_Ingreso values(51,'Paños de algodon',24,7,2);
insert into Detalle_Ingreso values(52,'Franelas',24,5,2);
insert into Detalle_Ingreso values(53,'Esponja',24,5,2);

insert into Detalle_Ingreso values(54,'Liquido aromatizante de piso',5,45,3);
insert into Detalle_Ingreso values(55,'Liquido limpiavidrios',5,23,3);
insert into Detalle_Ingreso values(56,'Pastilla de Baño',30,12.5,3);
insert into Detalle_Ingreso values(57,'Ambientador en spray',12,18,3); 
insert into Detalle_Ingreso values(58,'Jabon liquido',8,21,3);
insert into Detalle_Ingreso values(59,'Desinfectante de piso',5,17,3);
insert into Detalle_Ingreso values(60,'Detergente en polvo',5,32,3);
insert into Detalle_Ingreso values(61,'Paños de fibra dura',12,10,3);
insert into Detalle_Ingreso values(62,'Paños de algodon',12,7,3);
insert into Detalle_Ingreso values(63,'Franelas',12,5,3);
insert into Detalle_Ingreso values(64,'Esponja',12,5,3);

insert into Detalle_Ingreso values(65,'Liquido aromatizante de piso',12,45,4);
insert into Detalle_Ingreso values(66,'Liquido limpiavidrios',10,23,4);
insert into Detalle_Ingreso values(67,'Cera',15,20,4);
insert into Detalle_Ingreso values(68,'Antisarro',15,12,4);
insert into Detalle_Ingreso values(69,'Pastilla de Baño',60,12.5,4);
insert into Detalle_Ingreso values(70,'Ambientador en spray',24,18,4); 
insert into Detalle_Ingreso values(71,'Jabon liquido',24,21,4);
insert into Detalle_Ingreso values(72,'Acido nitrico',4,48,4);
insert into Detalle_Ingreso values(73,'Lustramueble',18,15,4);
insert into Detalle_Ingreso values(74,'Desinfectante de piso',18,17,4);
insert into Detalle_Ingreso values(75,'Lavandina',12,18,4);
insert into Detalle_Ingreso values(76,'Detergente en polvo',24,32,4);
insert into Detalle_Ingreso values(78,'Paños de limpieza de vidrio',40,450,4);
insert into Detalle_Ingreso values(79,'Bolsas plasticas',24,21,4);
insert into Detalle_Ingreso values(80,'Guantes de latex',24,8,4);
insert into Detalle_Ingreso values(81,'Guantes amarillos',17,15,4);
insert into Detalle_Ingreso values(82,'Paños de fibra dura',12,10,4);
insert into Detalle_Ingreso values(83,'Paños de algodon',12,7,4);
insert into Detalle_Ingreso values(84,'Franelas',12,5,4);
insert into Detalle_Ingreso values(85,'Esponja',12,5,4);

insert into Detalle_Ingreso values(86,'Liquido aromatizante de piso',3,45,5);
insert into Detalle_Ingreso values(87,'Liquido limpiavidrios',5,23,5);
insert into Detalle_Ingreso values(88,'Pastilla de Baño',20,12.5,5);
insert into Detalle_Ingreso values(89,'Ambientador en spray',6,18,5); 
insert into Detalle_Ingreso values(90,'Jabon liquido',5,21,5);
insert into Detalle_Ingreso values(91,'Desinfectante de piso',5,17,5);
insert into Detalle_Ingreso values(92,'Detergente en polvo',5,32,5);
insert into Detalle_Ingreso values(93,'Paños de fibra dura',12,10,5);
insert into Detalle_Ingreso values(94,'Paños de algodon',12,7,5);
insert into Detalle_Ingreso values(95,'Franelas',12,5,5);
insert into Detalle_Ingreso values(96,'Esponja',12,5,5);

insert into Detalle_Ingreso values(97,'Cera',15,20,6);
insert into Detalle_Ingreso values(98,'Antisarro',15,12,6);
insert into Detalle_Ingreso values(99,'Pastilla de Baño',30,12.5,6);
insert into Detalle_Ingreso values(100,'Ambientador en spray',6,18,6); 
insert into Detalle_Ingreso values(101,'Jabon liquido',5,21,6);
insert into Detalle_Ingreso values(102,'Acido nitrico',8,48,6);
insert into Detalle_Ingreso values(103,'Lustramueble',12,15,6);
insert into Detalle_Ingreso values(104,'Desinfectante de piso',18,17,6);
insert into Detalle_Ingreso values(105,'Lavandina',12,18,6);
insert into Detalle_Ingreso values(106,'Detergente en polvo',5,32,6);
insert into Detalle_Ingreso values(107,'Paños de limpieza de vidrio',40,450,6);
insert into Detalle_Ingreso values(108,'Bolsas plasticas',24,21,6);
insert into Detalle_Ingreso values(109,'Guantes de latex',24,8,6);
insert into Detalle_Ingreso values(110,'Escoba',24,28,6);
insert into Detalle_Ingreso values(111,'Trapeador',24,20,6);
insert into Detalle_Ingreso values(112,'Avion',10,140,6);
insert into Detalle_Ingreso values(113,'Mocha',24,28,6);
insert into Detalle_Ingreso values(114,'Alsabasura',24,15,6);
insert into Detalle_Ingreso values(115,'Guantes amarillos',17,15,6);
insert into Detalle_Ingreso values(116,'Cepillos de mango largo',12,10,6);
insert into Detalle_Ingreso values(117,'Gomas o araganas',24,12.5,6);
insert into Detalle_Ingreso values(118,'Cepillos de mano',12,8,6);
insert into Detalle_Ingreso values(119,'Paños de fibra dura',12,10,6);
insert into Detalle_Ingreso values(120,'Paños de algodon',12,7,6);
insert into Detalle_Ingreso values(121,'Sopapas',6,8,6);
insert into Detalle_Ingreso values(122,'Franelas',12,5,6);
insert into Detalle_Ingreso values(123,'Esponja',12,5,6);
insert into Detalle_Ingreso values(124,'Balde',24,34,6);

insert into Detalle_Ingreso values(125,'Liquido aromatizante de piso',10,45,7);
insert into Detalle_Ingreso values(126,'Liquido limpiavidrios',8,23,7);
insert into Detalle_Ingreso values(127,'Pastilla de Baño',30,12.5,7);
insert into Detalle_Ingreso values(128,'Ambientador en spray',12,18,7); 
insert into Detalle_Ingreso values(129,'Jabon liquido',8,21,7);
insert into Detalle_Ingreso values(130,'Desinfectante de piso',5,17,7);
insert into Detalle_Ingreso values(131,'Detergente en polvo',5,32,7);
insert into Detalle_Ingreso values(132,'Paños de fibra dura',12,10,7);
insert into Detalle_Ingreso values(133,'Paños de algodon',12,7,7);
insert into Detalle_Ingreso values(134,'Franelas',12,5,7);
insert into Detalle_Ingreso values(135,'Esponja',12,5,7);

insert into Detalle_Ingreso values(136,'Liquido aromatizante de piso',24,45,8);
insert into Detalle_Ingreso values(137,'Liquido limpiavidrios',20,23,8);
insert into Detalle_Ingreso values(138,'Cera',24,20,8);
insert into Detalle_Ingreso values(139,'Antisarro',24,12,8);
insert into Detalle_Ingreso values(140,'Pastilla de Baño',200,12.5,8);
insert into Detalle_Ingreso values(141,'Ambientador en spray',45,18,8); 
insert into Detalle_Ingreso values(142,'Jabon liquido',45,21,8);
insert into Detalle_Ingreso values(143,'Acido nitrico',15,48,8);
insert into Detalle_Ingreso values(144,'Lustramueble',36,15,8);
insert into Detalle_Ingreso values(145,'Desinfectante de piso',42,17,8);
insert into Detalle_Ingreso values(146,'Lavandina',30,18,8);
insert into Detalle_Ingreso values(147,'Detergente en polvo',48,32,8);
insert into Detalle_Ingreso values(148,'Paños de limpieza de vidrio',120,450,8);
insert into Detalle_Ingreso values(149,'Bolsas plasticas',72,21,8);
insert into Detalle_Ingreso values(150,'Guantes de latex',72,8,8);
insert into Detalle_Ingreso values(151,'Guantes amarillos',51,15,8);
insert into Detalle_Ingreso values(152,'Paños de fibra dura',72,10,8);
insert into Detalle_Ingreso values(153,'Paños de algodon',72,7,8);
insert into Detalle_Ingreso values(154,'Franelas',72,5,8);
insert into Detalle_Ingreso values(155,'Esponja',72,5,8);

insert into Detalle_Ingreso values(156,'Liquido aromatizante de piso',6,45,9);
insert into Detalle_Ingreso values(157,'Liquido limpiavidrios',6,23,9);
insert into Detalle_Ingreso values(158,'Pastilla de Baño',30,12.5,9);
insert into Detalle_Ingreso values(159,'Ambientador en spray',10,18,9); 
insert into Detalle_Ingreso values(160,'Jabon liquido',8,21,9);
insert into Detalle_Ingreso values(161,'Desinfectante de piso',6,17,9);
insert into Detalle_Ingreso values(162,'Detergente en polvo',6,32,9);
insert into Detalle_Ingreso values(163,'Paños de fibra dura',12,10,9);
insert into Detalle_Ingreso values(164,'Paños de algodon',12,7,9);
insert into Detalle_Ingreso values(165,'Franelas',12,5,9);
insert into Detalle_Ingreso values(166,'Esponja',10,5,9);

insert into Personal values (1,'Leonor Claros Torrico','F','Gerente');
insert into Personal values (2,'Stephani Heredia Claros','F','Administrador');
insert into Personal values (3,'Divina Lino Cuellar','F','Operador de Limpieza');
insert into Personal values (4,'Monica Kelly Heredia Zeballos','F','Supervisor');
insert into Personal values (5,'Daniel Valda Torrez','E','Operador de Limpieza');
insert into Personal values (6,'Sonia Arenas Estevez','F','Operador de Limpieza');
insert into Personal values (7,'Adela Enriquez Cochegua','E','Operador de Limpieza');
insert into Personal values (8,'Maria Gloria Aramendaro','E','1Operador de Limpieza');
insert into Personal values (9,'Fernando Espinoza Ardaya','E','Operador de Limpieza');
insert into Personal values (10,'Juan Espinoza Ardaya','E','Operador de Limpieza');
insert into Personal values (11,'Leonarda Apaza','E','Operador de Limpieza');
insert into Personal values (12,'Elsa Morales','E','Operador de Limpieza');
insert into Personal values (13,'Raquel Estrada','E','Operador de Limpieza');
insert into Personal values (14,'Marta Peñaranta','E','Operador de Limpieza');
insert into Personal values (15,'Jorge Airese','E','Operador de Limpieza');
insert into Personal values (16,'Crithian Aleman','E','Operador de Limpieza');
insert into Personal values (17,'Goldy Bayaregua','E','Operador de Limpieza');
insert into Personal values (18,'Alejandria Guancu','E','Operador de Limpieza');
insert into Personal values (19,'Cristian Luna','F','Supervisor');
insert into Personal values (20,'Maritza Lino','F','Supervisor');
insert into Personal values (21,'Nadia Aleman','E','Operador de Limpieza');
insert into Personal values (22,'Yessenia','E','Operador de Limpieza');
insert into Personal values (23,'Veronica Castro','E','Operador de Limpieza');
insert into Personal values (24,'Ines Garcia','E','Operador de Limpieza');
insert into Personal values (25,'Marili Aguilar Sanchez','F','Supervisor');

insert into Usuario values (1,'Leonor','leonorCT71',1);
insert into Usuario values (2,'Stephani','stephaniHC97',2);

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
