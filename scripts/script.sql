DROP DATABASE IF EXISTS ouvir_etc_db;

CREATE DATABASE ouvir_etc_db;

USE ouvir_etc_db;

CREATE TABLE ouvir_etc_db.usuarios (
id int PRIMARY KEY not null,
nome varchar(150) not null,
email varchar(200) not null unique,
password varchar(80) not null,
tipousuario ENUM('ADMIN', 'USUARIO', 'ANALISTA') NOT NULL DEFAULT('USUARIO'),
statususuario boolean DEFAULT(true)
);
CREATE TABLE ouvir_etc_db.relatos (
id int PRIMARY KEY not null,
    dataabertura datetime not null,
    dataconclusao datetime null,
    titulo varchar(100) not null,
    descricao text,
    tipo ENUM('SUGESTAO', 'ELOGIO', 'RECLAMACAO') NOT NULL DEFAULT('RECLAMACAO'),
    status ENUM('ABERTA', 'CANCELADA', 'CONCLUIDA', 'PENDENTE') NOT NULL DEFAULT('ABERTA'),
usuarioid int null,
    FOREIGN KEY (usuarioid) REFERENCES ouvir_etc_db.usuarios(id)
);

INSERT INTO ouvir_etc_db.usuarios (id, nome, email, password, tipousuario)
VALUES
(100, 'admin', 'admin@email.com', 'secret', 'ADMIN' ),
(101, 'user01', 'user01@email.com', 'secret', 'USUARIO' );

INSERT INTO ouvir_etc_db.relatos (id, dataabertura, titulo, descricao,  tipo, usuarioid, status, dataconclusao)
VALUES
(10000, '2024-03-01 08:00:00', 'Aumentar número de catracas', 'Aumentar número de catracas na entrada da escola.', 'SUGESTAO', NULL, 'CONCLUIDA','2024-03-01 08:00:00'),
(10001, '2024-03-02 09:00:00', 'Não fechar portão', 'Não fechar portão de entrada e saída na hora do intervalo.', 'SUGESTAO', NULL, 'CONCLUIDA', '2024-03-02 09:00:00'),
(10002, '2024-03-05 10:00:00', 'Biblioteca', 'Muito bom funcionamento da biblioteca', 'ELOGIO', NULL, 'CONCLUIDA', '2024-03-05 10:00:00'),
(10003, '2024-04-05 11:00:00', 'Ar Condicionado', 'O ar condicionado do laboratório 36 não está funcionando corretamente.', 'RECLAMACAO', NULL, 'ABERTA', NULL),
(10004, '2024-04-05 16:00:00', 'Teclado e mouse', 'Os equipamentos do laboratório 30 apresentam falhas', 'RECLAMACAO', 101, 'ABERTA', NULL),
(10005, '2024-04-05 19:20:00', 'Vazamento banheiro', 'Vazamento no banheiro masculino do último bloco.', 'RECLAMACAO', 101, 'ABERTA', NULL);