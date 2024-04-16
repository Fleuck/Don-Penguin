create database projetoDonPenguin;
use projetoDonPenguin;

create table filme (
id_filme int NOT NULL AUTO_INCREMENT,
capa_filme varchar(255) NOT NULL,
nome_filme varchar(255) NOT NULL,
nota_filme double,
lancamento date,
genero_filme varchar(255),
primary key(id_filme)
);

create table diretor (
id_diretor int NOT NULL auto_increment,
id_filme int NOT NULL,
nome_diretor varchar(255),
descricao_diretor varchar(255),
primary key(id_diretor),
foreign key(id_filme) references filme(id_filme)
);

create table ator (
id_ator int NOT NULL auto_increment,
id_filme int NOT NULL,
nome_ator varchar(255),
descricao_ator varchar(255),
primary key(id_ator),
foreign key(id_filme) references filme(id_filme)
);

create table lista (
id_lista int NOT NULL auto_increment,
id_filme int,
lista varchar(255),
primary key(id_lista),
foreign key(id_filme) references filme(id_filme)
);

create table usuario (
id_usuario int NOT NULL auto_increment,
id_filme int,
id_lista int,
nome_usuario varchar(255),
email varchar(255),
nascimento date,
senha varchar(255),
capa_user blob,
genero varchar(255),
primary key(id_usuario),
foreign key(id_filme) references filme(id_filme),
foreign key(id_lista) references lista(id_lista)
);


