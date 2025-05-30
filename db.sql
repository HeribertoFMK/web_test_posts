CREATE DATABASE blog;
USE blog;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(100) NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    data DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Usuário de teste
INSERT INTO usuarios (usuario, senha) VALUES ('admin', '1234');
