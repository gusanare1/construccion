create table clases_planta (id int primary key, nombre_planta varchar(200), descripcion varchar(1000));
INSERT INTO CLASES_PLANTA values (1,'TOMATE','tomatus_comusus');
INSERT INTO CLASES_PLANTA values (2,'PIMIENTO','pimientus comusus');

create table planta (id int primary key, fecha_plantacion date, porcentaje_humedad double, id_clase_planta int, foreign key (id_clase_planta) references clases_planta(id));

--INSERT into planta values (1,CURRENT_DATE() , 12)

