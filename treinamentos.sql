CREATE DATABASE treinamentos;
USE treinamentos;

CREATE TABLE treinamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_colaborador VARCHAR(100) NOT NULL,
    matricula VARCHAR(20) NOT NULL UNIQUE,
    funcao VARCHAR(50) NOT NULL,
    treinamento VARCHAR(100) NOT NULL,
    data_inicio DATE NOT NULL,
    data_conclusao DATE,
    status VARCHAR(20) NOT NULL,
    validade DATE
);

SELECT * FROM treinamentos;
