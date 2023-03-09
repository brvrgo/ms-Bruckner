
drop table if exists `users`;
create table `users` (
    `id` bigint unsigned auto_increment primary key,
    `name` varchar(255) not null,
    `email` varchar(255) not null
);

drop table if exists `unidad_tipos`;
create table `unidad_tipos` (
    `id` tinyint unsigned auto_increment primary key,
    `nombre` varchar(255) not null,

    `created_by` bigint unsigned default null,
    `updated_by` bigint unsigned default null,
    `created_at` timestamp not null default current_timestamp,
    `updated_at` timestamp not null default current_timestamp on update current_timestamp,
    `deleted_at` timestamp null default null,

    unique key `unique_name`(`nombre`),
    foreign key (`created_by`) references `users`(`id`) on update cascade on delete restrict,
    foreign key (`updated_by`) references `users`(`id`) on update cascade on delete restrict
);


drop table if exists `unidad_marcas`;
create table `unidad_marcas` (
    `id` smallint unsigned auto_increment primary key,
    `nombre` varchar(255) not null,

    `created_by` bigint unsigned default null,
    `updated_by` bigint unsigned default null,
    `created_at` timestamp not null default current_timestamp,
    `updated_at` timestamp not null default current_timestamp on update current_timestamp,
    `deleted_at` timestamp null default null,

    unique key `unique_name`(`nombre`),
    foreign key (`created_by`) references `users`(`id`) on update cascade on delete restrict,
    foreign key (`updated_by`) references `users`(`id`) on update cascade on delete restrict
);


drop table if exists `unidades`;
create table `unidades` (
    `id` mediumint unsigned auto_increment primary key,
    `tipo_id` tinyint unsigned default null,
    `marca_id` smallint unsigned default null,

    `economico` varchar(50) default null,
    `modelo` varchar(255) default null,
    `serie` varchar(50) default null,
    `placa` varchar(20) default null,

    `created_by` bigint unsigned default null,
    `updated_by` bigint unsigned default null,
    `created_at` timestamp not null default current_timestamp,
    `updated_at` timestamp not null default current_timestamp on update current_timestamp,
    `deleted_at` timestamp null default null,

    unique key `unique_serie`(`serie`),
    unique key `unique_placa`(`placa`),

    foreign key (`tipo_id`) references `unidad_tipos`(`id`) on update cascade on delete restrict,
    foreign key (`marca_id`) references `unidad_marcas`(`id`) on update cascade on delete restrict,
    foreign key (`created_by`) references `users`(`id`) on update cascade on delete restrict,
    foreign key (`updated_by`) references `users`(`id`) on update cascade on delete restrict
);


drop table if exists `servicio_pasos`;
create table `servicio_pasos` (
    `id` tinyint unsigned auto_increment primary key,
    `nombre` varchar(100) not null,
    `descripcion` varchar(255) not null,
    `config` json,
    `created_by` bigint unsigned default null,
    `updated_by` bigint unsigned default null,
    `created_at` timestamp not null default current_timestamp,
    `updated_at` timestamp not null default current_timestamp on update current_timestamp,
    `deleted_at` timestamp null default null,

    unique key `unique_name`(`nombre`),
    foreign key (`created_by`) references `users`(`id`) on update cascade on delete restrict,
    foreign key (`updated_by`) references `users`(`id`) on update cascade on delete restrict    
);

/*
drop table if exists `servicio_paso_transiciones`;
create table `servicio_paso_transiciones` (
    `id` tinyint unsigned auto_increment primary key,
    `id` tinyint unsigned auto_increment primary key,
    `from` 
    `to`
     
    `nombre` varchar(100) not null,

    `created_by` bigint unsigned default null,
    `updated_by` bigint unsigned default null,
    `created_at` timestamp not null default current_timestamp,
    `updated_at` timestamp not null default current_timestamp on update current_timestamp,
    `deleted_at` timestamp null default null,

    unique key `unique_name`(`nombre`),
    foreign key (`created_by`) references `users`(`id`) on update cascade on delete restrict,
    foreign key (`updated_by`) references `users`(`id`) on update cascade on delete restrict    
);

*/


drop table if exists `servicio_categorias`;
create table `servicio_categorias` (
    `id` tinyint unsigned auto_increment primary key,
    `nombre` varchar(100) not null,

    `created_by` bigint unsigned default null,
    `updated_by` bigint unsigned default null,
    `created_at` timestamp not null default current_timestamp,
    `updated_at` timestamp not null default current_timestamp on update current_timestamp,
    `deleted_at` timestamp null default null,

    unique key `unique_name`(`nombre`),
    foreign key (`created_by`) references `users`(`id`) on update cascade on delete restrict,
    foreign key (`updated_by`) references `users`(`id`) on update cascade on delete restrict    
);

drop table if exists `servicios`;
create table `servicios` (
    `id` int unsigned auto_increment primary key,
    `categoria_id` tinyint unsigned default null,
    `unidad_id` mediumint unsigned default null,
    
    `notas` varchar(255) default null,

    /*`paso_id` smallint not null default 1,
    `estatus` smallint not null default 1,*/

    `created_by` bigint unsigned default null,
    `updated_by` bigint unsigned default null,
    `created_at` timestamp not null default current_timestamp,
    `updated_at` timestamp not null default current_timestamp on update current_timestamp,
    `deleted_at` timestamp null default null,

    foreign key (`categoria_id`) references `servicio_categorias`(`id`) on update cascade on delete restrict,
    foreign key (`unidad_id`) references `unidades`(`id`) on update cascade on delete restrict,
    foreign key (`created_by`) references `users`(`id`) on update cascade on delete restrict,
    foreign key (`updated_by`) references `users`(`id`) on update cascade on delete restrict    
);


drop table if exists `servicio_seguimiento`;
create table `servicio_seguimiento` (
    `id` bigint unsigned auto_increment primary key,
    `servicio_id` int unsigned default null,
    `paso_id` tinyint unsigned default null,

    `notas` varchar(255) default null,

    `created_by` bigint unsigned default null,
    `updated_by` bigint unsigned default null,
    `created_at` timestamp not null default current_timestamp,
    `updated_at` timestamp not null default current_timestamp on update current_timestamp,

    foreign key (`servicio_id`) references `servicios`(`id`) on update cascade on delete restrict,
    foreign key (`paso_id`) references `servicio_pasos`(`id`) on update cascade on delete restrict,
    foreign key (`created_by`) references `users`(`id`) on update cascade on delete restrict,
    foreign key (`updated_by`) references `users`(`id`) on update cascade on delete restrict        
);







drop table if exists `mecanicos`;
create table `mecanicos` (
    
);

drop table if exists `talleres`;
create table `talleres` (
    
);


drop table if exists `servicio_piezas`;
create table `servicio_piezas` (
    
);

drop table if exists `piezas`;
create table `piezas` (
    
);


drop table if exists `servicio_pasos`;
create table `servicio_pasos` (
    
);

drop table if exists `servicio_seguimiento`;
create table `servicio_seguimiento` (
    
);
