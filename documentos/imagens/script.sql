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
    anexo varchar(255) null,
usuarioid int null,
    FOREIGN KEY (usuarioid) REFERENCES ouvir_etc_db.usuarios(id)
);

CREATE TABLE ouvir_etc_db.respostas (
	id int PRIMARY KEY not null,
    dataaresposta datetime not null,
    descricao text,
    statusResposta boolean,
    anexo varchar(255) null,
	usuarioid int null,
    relatoid int not null,
    FOREIGN KEY (usuarioid) REFERENCES ouvir_etc_db.usuarios(id),
    FOREIGN KEY (relatoid) REFERENCES ouvir_etc_db.relatos(id)
);

INSERT INTO ouvir_etc_db.usuarios (id, nome, email, password, tipousuario)
VALUES
(100, 'admin', 'admin@email.com', 'secret', 'ADMIN' ),
(101, 'user01', 'user01@email.com', 'secret', 'USUARIO' ),
(102, 'user02', 'user02@email.com', 'secret', 'USUARIO' ),
(103, 'user03', 'user03@email.com', 'secret', 'USUARIO' ),
(104, 'user04', 'user04@email.com', 'secret', 'USUARIO' ),
(105, 'user05', 'user05@email.com', 'secret', 'USUARIO' );

INSERT INTO ouvir_etc_db.relatos (id, dataabertura, titulo, descricao,  tipo, usuarioid, status, dataconclusao)
VALUES
(10000, '2024-03-01 08:00:00', 'Aumentar número de catracas', 'Aumentar número de catracas na entrada da escola.', 'SUGESTAO', NULL, 'CONCLUIDA','2024-03-01 08:00:00'),
(10001, '2024-03-02 09:00:00', 'Não fechar portão', 'Não fechar portão de entrada e saída na hora do intervalo.', 'SUGESTAO', NULL, 'CONCLUIDA', '2024-03-02 09:00:00'),
(10002, '2024-03-05 10:00:00', 'Biblioteca', 'Muito bom funcionamento da biblioteca', 'ELOGIO', NULL, 'CONCLUIDA', '2024-03-05 10:00:00'),
(10003, '2024-03-07 13:00:00', 'Computador no pátio', 'Poderiam aumentar a quantidade de computadores disponíveis no pátio da escola. Hoje temos somente 3.', 'SUGESTAO', NULL, 'CONCLUIDA', '2024-03-07 13:00:00'),
(10004, '2024-03-07 15:00:00', 'Secretária', 'Ampliar o horário de funcionamento da secretária.', 'SUGESTÃO', NULL, 'CONCLUIDA', '2024-03-07 15:00:00'),
(10005, '2024-03-08 11:00:00', 'Lanche', 'O lanche hoje estava excelente', 'ELOGIO', NULL, 'CONCLUIDA', '2024-03-08 11:00:00'),
(10006, '2024-04-08 08:30:00', 'Cadeiras', 'Existe falta de cadeiras disponíveis na sala 11', 'RECLAMACAO', NULL, 'ABERTA', NULL),
(10007, '2024-04-08 11:00:00', 'Ar Condicionado', 'O ar condicionado do laboratório 36 não está funcionando corretamente.', 'RECLAMACAO', NULL, 'ABERTA', NULL),
(10008, '2024-04-09 16:00:00', 'Teclado e mouse', 'Os equipamentos do laboratório 30 apresentam falhas', 'RECLAMACAO', 101, 'ABERTA', NULL),
(10009, '2024-04-09 08:10:00', 'Vazamento banheiro', 'Vazamento no banheiro masculino do último bloco.', 'RECLAMACAO', 103, 'ABERTA', NULL),
(10010, '2024-04-09 11:20:00', 'Cadeiras quebras', 'Cadeiras quebradas no pátio da escola.', 'RECLAMACAO', 105, 'ABERTA', NULL),
(10011, '2024-04-10 13:40:00', 'Aumentar lanche', 'Diversos alunos repetem antes que todos possam se alimentar. Controlar fila', 'RECLAMACAO', 104, 'ABERTA', NULL),
(10012, '2024-04-11 15:50:00', 'Fechamento portão escola', 'Não concordo com os horários estabelecidos para entrar na escola.', 'RECLAMACAO', 103, 'ABERTA', NULL),
(10013, '2024-04-12 08:20:00', 'Horário secretária', 'Poderiam ampliar o horário de funcionamento da secretária?', 'RECLAMACAO', 104, 'ABERTA', NULL),
(10014, '2024-04-12 10:10:00', 'Mouse com defeito', 'Mouses do laboratório 36 apresentam problemas.', 'RECLAMACAO', 102, 'ABERTA', NULL),
(10015, '2024-04-12 11:20:00', 'Vazamento banheiro', 'Vazamento no banheiro masculino.', 'RECLAMACAO', 101, 'ABERTA', NULL);
