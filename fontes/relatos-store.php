<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dsn = 'mysql:host:127.0.0.1;dbname=ouvir_etc_db;charset=utf8;';

    $conn = new PDO($dsn, 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $titulo = filter_input(INPUT_POST, 'titulo');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $tipoRelato = ($tipoRelato === 'Sugestão') ?  'SUGESTAO' : 'ELOGIO';
    $statusRelato = 'ABERTA';
    $anexo = null; 
    
    $query = '
        INSERT INTO ouvir_etc_db.relatos (id, dataabertura, titulo, descricao, tipo, status, anexo)
        VALUES
        (:id, :dataabertura, :titulo, :descricao, :tipo, :status, :anexo);
        ';

    $stmt = $conn->prepare($query);
    $stmt->bindValue(':id', rand(10016, 11000), PDO::PARAM_INT);
    $stmt->bindValue(':dataabertura', date('Y-m-d H:i:s'), PDO::PARAM_STR);
    $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
    $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
    $stmt->bindValue(':tipo', $tipoRelato , PDO::PARAM_STR);
    $stmt->bindValue(':status', $statusRelato, PDO::PARAM_STR);
    $stmt->bindValue(':anexo', $anexo, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('location: relatos.php?message=sucesso');
        exit;
    }
}
