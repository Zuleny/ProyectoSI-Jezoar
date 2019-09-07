create database ventas;
use ventas;

create table producto (
    id int auto_increment primary key,
    nombre varchar(100),
    precio int,
    stock int
);

create table venta (
    id int auto_increment primary key,
    fecha datetime,
    total int
);

create table detalle (
    id int auto_increment primary key,
    venta int,
    producto int,
    cantidad int,
    subTotal int
);

insert into producto values(null,'leche','100','10');
insert into producto values(null,'Dulce de Leche','200','20');
insert into producto values(null,'Sal','300','30');
insert into producto values(null,'pimienta','400','40');
insert into producto values(null,'Oregano','500','50');

select * from producto;
select * from venta;
select * from detalle;