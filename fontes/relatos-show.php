<?php
$id = $_GET['id'] ?? 0;

$dsn = 'mysql:host=localhost;dbname=ouvir_etc_db;charset=utf8;';
$conn = new PDO($dsn, 'root', '');
$query = "SELECT * FROM ouvir_etc_db.relatos WHERE id = :id;";
$stmt = $conn->prepare($query);
$stmt->bindValue(':id', $id);
$stmt->execute();
$relato = $stmt->fetch(PDO::FETCH_BOTH);

if ($relato === false) {
    header('location: relatos.php?message=Relato não encontrado.');
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
            <h1>Ouvir <span class="caixa-laranja">ETC</span></h1>
        </a>
    </header>

    <main>
        <section class="section-dados">
            <h2>Título</h2>
            <p class="texto"><?= $relato['titulo']; ?></p>
            <h3>Data de abertura</h3>
            <p class="texto"><?= $relato['dataabertura']; ?></p>
            <h3>Tipo</h3>
            <p class="texto"><?= $relato['tipo']; ?></p>
            <h3>Status</h3>
            <p class="texto"><?= $relato['status']; ?></p>
            <h3>Descrição</h3>
            <p class="texto"><?= $relato['descricao']; ?></p>

            <div class="section-btn">
                <a href="relatos.php" class="btn">Voltar</a>
            </div>
        </section>

    </main>
    <br>
    <footer>
        <p>Desenvolvido para <span class="caixa-azul">ETC</span> <span class="caixa-laranja"> 2024</span></p>
    </footer>
</body>

</html>