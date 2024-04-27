<?php
    date_default_timezone_set('America/Sao_Paulo');
    
    $dataAbertura = date('d/m/Y H:i:s');
    $tipoRelato = $_GET['tipo'] ?? 'sugestao';
    $tipoEscolhido =  $tipoRelato != 'sugestao' && $tipoRelato != 'elogio'; 
    
    if ($tipoEscolhido !== false) {
        header('location: index.php?message=Página não encontrada.');
        exit();
    }
    $tipoRelato = ($tipoRelato === 'sugestao') ?  'Sugestão' : 'Elogio';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require 'relatos-store.php';
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
        <h1 class="titulo-h2">Novo Relato</h1>
            <form method="post" class="form-dados">
                
                <div class="form-control form-one-row">
                    <span class="form-titulo">Data de abertura</span>
                    <span class="form-titulo">Tipo</span>
                    <span class="form-titulo">Status</span>
                </div>

                <div class="form-one-row">
                    <span class="form-texto-span"><?= $dataAbertura; ?></span>
                    <span class="form-texto-span"><?= $tipoRelato; ?></span>
                    <span class="form-texto-span">Aberto</span>
                </div>

                <div class="form-control">
                    <label for="titulo">Título</label>
                    <input 
                        type="text"
                        name="titulo" 
                        id="titulo" 
                        placeholder="Informe o título." 
                        required
                        autofocus>            
                </div>
                <div class="form-control">
                    <label for="titulo">Título</label>
                    <textarea 
                        name="descricao" 
                        id="descricao" 
                        cols="30" 
                        rows="10"
                        placeholder="Informe a descrição."
                        required
                        ></textarea>            
                </div>
                
                <br>
                <button class="btn btn-relato">Salvar</button>
                <a href="index.php" class="btn ">Voltar</a>
            </form>
        
    </main>
    <footer>
        <p>Desenvolvido para <span class="footer-etc">ETC</span> <span class="footer-ano"> 2024</span></p>
    </footer>
</body>

</html>