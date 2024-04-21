<?php
    $dsn = 'mysql:host=localhost;dbname=ouvir_etc_db;charset=utf8;';
    $conn = new PDO($dsn, 'root', '');
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

<main class="principal">
      <section class="section-left">
        <h2>Bem vindo a Ouvidoria ETC</h2>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, omnis? Delectus, dolorum deleniti enim qui possimus distinctio quos consequatur magnam aperiam amet nihil aspernatur optio corrupti aliquam. Voluptates, consectetur rerum.</p>

        <section class="section-btn">
          <a href="#" class="btn btn-sugestao">Sugestão</a>
          <a href="#" class="btn btn-elogio">Elogio</a>
          <a href="#" class="btn btn-reclamacao">Reclamação</a>
        </section>

        <section class="section-btn">
          <a href="relatos.php" class="btn btn-relato">Acessar Relato</a>
        </section>
      </section>
      
      <section class="section-right">
        <img src="assets/img/team.png" alt="imagem">

      </section>
</main>
<footer>
        <p>Desenvolvido para <span class="footer-etc">ETC</span> <span class="footer-ano"> 2024</span></p>
    </footer>
</body>
</html>