create database login;
use login;

create table usuario(
idUsuario int(11) auto_increment primary key,
usuario varchar(200),
senha varchar(32),
nome varchar(40),
horario datetime);
