create database crud_php;
use crud_php;

create table people(
    id int(11) auto_increment primary key,
    name varchar(30) not null,
    email varchar(30) not null
);