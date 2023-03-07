

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
    `id` int unsigned auto_increment primary key,
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
    foreign key (`created_by`) references `users`(`id`) on update cascade on delete restrict,
    foreign key (`updated_by`) references `users`(`id`) on update cascade on delete restrict
);



