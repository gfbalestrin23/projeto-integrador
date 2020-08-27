DROP DATABASE loja_virtual;

CREATE DATABASE loja_virtual;

USE loja_virtual;

CREATE TABLE produtos (
    id_produto int not null primary key auto_increment,
    nome varchar(64) not null,
    preco decimal(10, 2) not null,
    imagem varchar(200)
)