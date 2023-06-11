CREATE DATABASE blogVidejuegos;
CREATE DATABASE blogVidejuegos;
use blogVidejuegos;
create table users(
	id int(255) primary key auto_increment not null,
    name varchar(40) not null,
    surname varchar(80) not null,
    email varchar(255) unique not null,
    password varchar(255) not null,
    rol varchar(20)
);

create table categoria(
	id int(255) primary key auto_increment not null,
    name varchar(40) not null
);
 
create table news(
	id int(255) primary key auto_increment not null,
    id_user int(255) not null,
    id_categoria int(255) not null,
    title varchar(60),
    article text,
    imagen varchar(60),
    date_creation date,
    constraint fk_id_user foreign key (id_user) references users(id),
    constraint fk_id_categoria foreign key (id_categoria) references categoria(id)
    
);