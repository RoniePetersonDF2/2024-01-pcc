<?php
$id = $_GET['id'] ?? 0;

$dsn = 'mysql:host=localhost;dbname=ouvir_etc_db;charset=utf8;';
$conn = new PDO($dsn, 'root', '');
$query = "SELECT * FROM ouvir_etc_db.relatos WHERE id = $id;";
$stmt = $conn->query($query);
$relato = $stmt->fetch(pdo::FETCH_BOTH);
if ($relato === false) {
    header('location: relatos.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvidoria ETC</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <a href="index.php">
            <img src="assets/img/logoetc.png" alt="Imagem logo etc">
            <h1>Ouvir <span>ETC</span></h1>
        </a>
    </header>

    <main>
        
        <section class="dados">
            <h2>Título</h2>
            <p class="texto"><?= $relato['titulo']; ?></p>
            <h3>Data de abertura</h3>
            <p class="texto"><?= $relato['dataabertura']; ?></p>
            <h3 class="texto">Tipo</h3>
            <p class="texto"><?= $relato['tipo']; ?></p>
            <h3>Status</h3>
            <p class="texto"><?= $relato['status']; ?></p>
            <h3>Descrição</h3>
            <p class="texto"><?= $relato['descricao']; ?></p>
            
            <br>
            <a href="relatos.php" class="btn">Voltar</a>
        </section>    
        
    </main>
    <footer>
        <p>Desenvolvido para <span class="footer-etc">ETC</span> <span class="footer-ano"> 2024</span></p>
    </footer>
</body>

</html>