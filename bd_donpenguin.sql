CREATE DATABASE projetoDon_Penguin;
USE projetoDon_Penguin;

CREATE TABLE filme (
    id_filme INT NOT NULL AUTO_INCREMENT,
    url_filme VARCHAR(800),
    sinopse TEXT,
    capa_filme VARCHAR(255) NOT NULL,
    nome_filme VARCHAR(255) NOT NULL,
    nota_filme DOUBLE,
    lancamento DATE,
    genero_filme VARCHAR(255),
    PRIMARY KEY (id_filme)
);

CREATE TABLE diretor (
    id_diretor INT NOT NULL AUTO_INCREMENT,
    nome_diretor VARCHAR(255),
    descricao_diretor VARCHAR(255),
    PRIMARY KEY (id_diretor)
);

CREATE TABLE ator (
    id_ator INT NOT NULL AUTO_INCREMENT,
    nome_ator VARCHAR(255),
    descricao_ator VARCHAR(255),
    PRIMARY KEY (id_ator)
);

CREATE TABLE lista (
    id_lista INT NOT NULL AUTO_INCREMENT,
    lista VARCHAR(255),
    PRIMARY KEY (id_lista)
);

CREATE TABLE usuario (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nome_usuario VARCHAR(255),
    email VARCHAR(255),
    nascimento DATE,
    senha VARCHAR(255),
    capa_user BLOB,
    genero VARCHAR(255),
    instagram VARCHAR(20),
    PRIMARY KEY (id_usuario)
);

-- Tabela intermediária para muitos-para-muitos entre filme e ator
CREATE TABLE filme_ator (
    id_filme INT NOT NULL,
    id_ator INT NOT NULL,
    PRIMARY KEY (id_filme, id_ator),
    FOREIGN KEY (id_filme) REFERENCES filme(id_filme),
    FOREIGN KEY (id_ator) REFERENCES ator(id_ator)
);

-- Tabela intermediária para muitos-para-muitos entre filme e diretor
CREATE TABLE filme_diretor (
    id_filme INT NOT NULL,
    id_diretor INT NOT NULL,
    PRIMARY KEY (id_filme, id_diretor),
    FOREIGN KEY (id_filme) REFERENCES filme(id_filme),
    FOREIGN KEY (id_diretor) REFERENCES diretor(id_diretor)
);

-- Tabela intermediária para muitos-para-muitos entre filme e lista
CREATE TABLE filme_lista (
    id_filme INT NOT NULL,
    id_lista INT NOT NULL,
    PRIMARY KEY (id_filme, id_lista),
    FOREIGN KEY (id_filme) REFERENCES filme(id_filme),
    FOREIGN KEY (id_lista) REFERENCES lista(id_lista)
);

-- Tabela intermediária para muitos-para-muitos entre usuário e filme
CREATE TABLE usuario_filme (
    id_usuario INT NOT NULL,
    id_filme INT NOT NULL,
    PRIMARY KEY (id_usuario, id_filme),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_filme) REFERENCES filme(id_filme)
);

-- Tabela intermediária para muitos-para-muitos entre usuário e lista
CREATE TABLE usuario_lista (
    id_usuario INT NOT NULL,
    id_lista INT NOT NULL,
    PRIMARY KEY (id_usuario, id_lista),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_lista) REFERENCES lista(id_lista)
);

-- Inserção de exemplo na tabela filme
INSERT INTO filme (url_filme, sinopse, capa_filme, nome_filme, nota_filme, lancamento, genero_filme) 
VALUES (
    'https://www.youtube.com/watch?v=YDXOioU_OKM&list=PL_OoyT4hX9xE2LdRJQxJQwGGXeDwqAQ47&index=24', 
    'Uma estranha criatura corre contra o tempo para fazer a mais importante e bela criação de sua vida.',
    'https://m.media-amazon.com/images/M/MV5BZGY3YjBlOWEtNDA3OC00ZTYwLThmNTktNDI1ODE2OTU2NjlkXkEyXkFqcGdeQXVyMjExNjgyMTc@._V1_.jpg',
    'The Maker', 8, '2011-11-05', 'animação'
);

-- Seleção para verificação
SELECT * FROM filme;
