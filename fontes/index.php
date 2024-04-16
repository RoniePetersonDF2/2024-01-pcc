<?php
$dsn = 'mysql:host=localhost;dbname=ouvir_etc_db;charset=utf8;';
$conn = new PDO($dsn, 'root', '');
$query = 'SELECT * FROM ouvir_etc_db.relatos;';
$stmt = $conn->query($query);
$relatos = $stmt->fetchAll(PDO::FETCH_BOTH);
$conn = null;
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
        <img src="assets/img/logoetc.png" alt="Imagem logo etc">

        <h1>Ouvir <span>ETC</span></h1>
    </header>

    <main>
        <ul>
            <?php foreach ($relatos as $relato) : ?>
                <li>
                    <h3>
                        <?= $relato['titulo'] ?>
                    </h3>

                    <p>
                        <?= $relato['descricao'] ?>
                    </p>
                    <a href="#">Editar</a>
                </li>
            <?php endforeach ?>
        </ul>

    </main>

    <footer>
        <p>Desenvolvido para <span class="footer-etc">ETC</span> <span class="footer-ano"> 2024</span></p>
    </footer>

</body>

</html>