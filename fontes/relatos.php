<?php
$dsn = 'mysql:host=localhost;dbname=ouvir_etc_db;charset=utf8;';
$conn = new PDO($dsn, 'root', '');
$query = 'SELECT * FROM ouvir_etc_db.relatos;';
$stmt = $conn->query($query);
$relatos = $stmt->fetchAll(pdo::FETCH_BOTH);
$count = 0;
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
        <p class="btn-align">
            <a href="#" class="btn btn-novo">Novo</a>
        </p>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Data abertura</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Açao</th>
                </tr>
            </thead>

            <tbody>
                <?php if (count($relatos) == 0) : ?>
                    <tr>
                        <td colspan="5"> Não existem relatos cadastrados.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($relatos as $relato) : $count++; ?>
                        <tr>
                            <td><?= $count; ?></td>
                            <td><?= $relato['dataabertura']; ?></td>
                            <td class="texto-esquerda"><?= $relato['titulo']; ?></td>
                            <td><?= $relato['tipo']; ?></td>
                            <td>
                                <a href="relatos-detalhes.php?id=<?= $relato['id']?>">Detalhes</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>Desenvolvido para <span class="footer-etc">ETC</span> <span class="footer-ano"> 2024</span></p>
    </footer>
</body>

</html>