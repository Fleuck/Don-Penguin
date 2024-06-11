create database projetoDonPenguin;
use projetoDonPenguin;

create table filme (
id_filme int NOT NULL AUTO_INCREMENT,
url_filme Varchar(800),
sinopse TEXT,
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

INSERT INTO filme (url_filme, sinopse, capa_filme, nome_filme, nota_filme, lancamento, genero_filme) 
values(
'https://www.youtube.com/watch?v=YDXOioU_OKM&list=PL_OoyT4hX9xE2LdRJQxJQwGGXeDwqAQ47&index=24', 
'Uma estranha criatura corre contra o tempo para fazer a mais importante e bela criação de sua vida.',
'https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg',
'The Maker', 8, '2011-11-05', 'animação');


ALTER TABLE usuario
ADD adm boolean;

INSERT INTO filme (url_filme, sinopse, capa_filme, nome_filme, nota_filme, lancamento, genero_filme) 
VALUES
('https://www.youtube.com/watch?v=p3UJMdn74DA&t=126s', 
'Em uma série de quadros clínicos que compreendem uma espécie de diário de viagem apocalíptico pelas ruas de Los Angeles, um sem-teto agressivo repreende o espectador em relação às circunstâncias de sua vida e ao erro de tudo.', 
'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXqWzf9Xp5Drnko0-9uSgmB5jnfyCAfRYQnw&s',
 'CEST LA VIE',
 9, 
 '2018-02-15', 
 'Comédia');


INSERT INTO filme (url_filme, sinopse, capa_filme, nome_filme, nota_filme, lancamento, genero_filme) 
VALUES
('https://www.youtube.com/watch?v=Uis1JoAGfr8&t=571s', 
'Uma montagem vibrante inspirada na Pixar (pense na sequência do casamento em Up) em que uma mãe, incapaz de enfrentar a dor de seu filho indo para a faculdade, atrasa sua partida, deixando-o doente. Infelizmente, ela vai longe demais, é incapaz de reverter o que desencadeou e é forçada a enfrentar as consequências insondáveis ​​do seu egoísmo.', 
'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpjVV0wAHf9sVtjt9zBPnfO-wfY3eHLGYp2g&s',
 'MUNCHAUSEN',
 10, 
 '2013-02-11', 
 'Terror');
 
 INSERT INTO filme (url_filme, sinopse, capa_filme, nome_filme, nota_filme, lancamento, genero_filme) 
VALUES
('https://www.youtube.com/watch?v=NTUcSno9MpI', 'Uma comédia sobre um salão de beleza incomum e seus clientes ainda mais incomuns.', 'https://m.media-amazon.com/images/I/61Dt-FhQiuL._AC_UF1000,1000_QL80_.jpg', 'Curl Up and Dye', 7.5, '2018-02-15', 'Comédia'),
('https://www.youtube.com/watch?v=P5_Msrdg3Hk', 'Um explorador espacial encontra um buraco negro e descobre algo inesperado.', 'https://m.media-amazon.com/images/M/MV5BNjllYzYzMzYtNmY2MS00MzVhLTliYTgtZWE5MGExZjg4MjUyXkEyXkFqcGdeQXVyMTI0Nzk5NTQ2._V1_FMjpg_UX1000_.jpg', 'The Black Hole', 8.2, '2016-09-22', 'Ficção Científica'),
('https://www.youtube.com/watch?v=U-0Xy9HOaLg', 'Uma história animada sobre um esquilo que perde seu cachecol e embarca em uma jornada para encontrá-lo.', 'https://upload.wikimedia.org/wikipedia/en/0/0f/The_Missing_Scarf.jpg', 'The Missing Scarf', 8.9, '2013-09-26', 'Animação'),
('https://www.youtube.com/watch?v=ulde8n7cC68', 'Um curta-metragem da Pixar sobre um filhote de pássaro que enfrenta seus medos na busca por comida.', 'https://m.media-amazon.com/images/M/MV5BNzhhMDkwNWItMmRlMS00ODg1LTkzMzAtZGM3NTAwNzViZGU5XkEyXkFqcGdeQXVyOTI3MDg0NzA@._V1_.jpg', 'Piper', 9.1, '2016-06-16', 'Animação');

INSERT INTO filme (url_filme, sinopse, capa_filme, nome_filme, nota_filme, lancamento, genero_filme) 
VALUES
('https://www.youtube.com/watch?v=CCQ9v6XMC6c', 'Um menino aprende o trabalho de seu pai e avô de uma maneira única sob a luz da lua.', 'https://m.media-amazon.com/images/M/MV5BZThmZjNjOTctNjhjNy00OGE5LTlhODEtNTRkMWE3NzJjMjdmXkEyXkFqcGdeQXVyNDQxNjcxNQ@@._V1_.jpg', 'La Luna', 8.4, '2011-06-06', 'Animação'),
('https://www.youtube.com/watch?v=XrqSF2OOz_M', 'Um conto de amor em preto e branco sobre um homem que conhece uma mulher em uma estação de trem.', 'https://m.media-amazon.com/images/S/pv-target-images/6aaebbfcdc8c569a9184bb16e879db1066c5f399505f672708c8cce1bcb1ddea.jpg', 'Paperman', 8.3, '2012-11-02', 'Animação'),
('https://www.youtube.com/watch?v=f5CcgFTO274', 'Uma mulher chinesa se emociona ao encontrar um baozi vivo.', 'https://upload.wikimedia.org/wikipedia/pt/c/cf/Bao_2018.jpg', 'Bao', 8, '2018-06-15', 'Animação'),
('https://www.youtube.com/watch?v=AZS5cgybKcI', 'A história de uma improvável amizade entre um gatinho e um pit bull.', 'https://upload.wikimedia.org/wikipedia/en/thumb/4/45/Kitbull.jpg/220px-Kitbull.jpg', 'Kitbull', 8.4, '2019-02-18', 'Animação'),
('https://www.youtube.com/watch?v=4wVTQmbWuu4', 'A história de um cachorro e sua jornada através das estações da vida.', 'https://static.tvtropes.org/pmwiki/pub/images/newdesktop.jpg', 'Feast', 8, '2014-11-07', 'Animação'),
('https://www.youtube.com/watch?v=uMVtpCPx8ow', 'Um homem idoso joga uma partida de xadrez contra si mesmo em um parque.', 'https://upload.wikimedia.org/wikipedia/en/thumb/0/08/Geri%27s_Game_poster.jpg/220px-Geri%27s_Game_poster.jpg', 'Geri''s Game', 8.2, '1997-11-24', 'Animação'),
('https://www.youtube.com/watch?v=D4Dnm6dkOVI', 'Um mágico tenta fazer um truque com seu coelho, mas as coisas não saem como planejado.', 'https://m.media-amazon.com/images/M/MV5BYzRlYTU1NTgtMTU5NS00MTUyLWE0ZGUtODcyZjlkNmQ2NGQ3XkEyXkFqcGdeQXVyNDgyODgxNjE@._V1_.jpg', 'Presto', 8, '2008-06-19', 'Animação'),
('https://www.youtube.com/watch?v=PfyJQEIsMt0', 'As nuvens criam bebês, que são entregues às cegonhas.', 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4f/Partly_Cloudy_poster.jpg/220px-Partly_Cloudy_poster.jpg', 'Partly Cloudy', 8, '2009-05-28', 'Animação'),
('https://www.youtube.com/watch?v=3sWpq81qlDE', 'Dois personagens, representando o dia e a noite, descobrem suas diferenças.', 'https://m.media-amazon.com/images/M/MV5BMTYyMTk1MjE3NF5BMl5BanBnXkFtZTgwMjkxMDgwMjE@._V1_FMjpg_UX1000_.jpg', 'Day & Night', 8.1, '2010-06-17', 'Animação'),
('https://www.youtube.com/watch?v=920PLE0QiqU', 'Um pai descobre que seu filho pode flutuar, o que o leva a esconder essa habilidade do mundo.', 'https://upload.wikimedia.org/wikipedia/en/thumb/3/33/PixarFloat2019Poster.jpeg/220px-PixarFloat2019Poster.jpeg', 'Float', 8.1, '2019-11-12', 'Animação'),
('https://www.youtube.com/watch?v=xmjEvfKBAvE', 'Dois alunos do ensino médio com dificuldades de comunicação são colocados juntos em um exercício de orientação.', 'https://upload.wikimedia.org/wikipedia/en/thumb/8/87/Loop_Short_Film_Poster.png/220px-Loop_Short_Film_Poster.png', 'Loop', 7.5, '2020-01-10', 'Animação'),
('https://www.youtube.com/watch?v=apx1aUP3MqA', 'Um coelho jovem e ambicioso tenta construir a toca dos seus sonhos, mas descobre que a vida subterrânea é mais complicada do que parece.', 'https://upload.wikimedia.org/wikipedia/en/c/c5/Burrow_Film_Poster.png', 'Burrow', 7.7, '2020-12-25', 'Animação'),
('https://www.youtube.com/watch?v=_hDVd3-kR7A', 'Uma grande história sobre um homem e o vento.', 'https://upload.wikimedia.org/wikipedia/en/8/88/Wind_Short_Film_Poster.png', 'Wind', 8.2, '2019-06-11', 'Animação'),
('https://www.youtube.com/watch?v=yYcpRSQ-irs', 'A história de uma menina chinesa que sonha em se tornar astronauta.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKGTOX1Glz1DzL31IVUluODyzgSoiBASIJWA&s', 'One Small Step', 8.3, '2018-06-08', 'Animação');

SELECT * FROM usuario;

UPDATE usuario SET email = "admin@g.com" WHERE id_usuario = 1;

select * from filme;

UPDATE usuario SET adm = True WHERE id_usuario = 2;
UPDATE usuario set email = "admin@a.com" WHERE id_usuario = 80;

drop database projetodonpenguin;
