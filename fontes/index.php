<?php
date_default_timezone_set("America/Sao_Paulo");
include 'src/enumtiporelato.php';
include 'src/enumtipousuario.php';
include 'src/enumstatusreclamacao.php';
include 'src/enumtiporesposta.php';
include 'src/relato.php';
include 'src/reclamacao.php';
include 'src/resposta.php';
include 'src/usuario.php';

// $sugestao01 = new Relato(
//     "Novo curso",
//     "Criação de um novo FIC de jogos digitais",
//     EnumTipoRelato::SUGESTAO
// );

// $elogio01 = new Relato(
//     "Parabéns",
//     "Parabéns pelo seu aniversário",
//     EnumTipoRelato::ELOGIO
// );

$usuario01 = new Usuario('user01', 'user01@email.com', EnumTipoUsuario::USUARIO);

$reclamacao01 = new Reclamacao('Ar condicionado', 'Ar condicionado quebrado no lab 30', EnumTipoRelato::RECLAMACAO, $usuario01);

// $resposta01 = n
echo '<pre>';
// var_dump($sugestao01, $elogio01, $usuario01, $reclamacao01);

$reclamacao01->setStatusReclamacao(EnumStatusReclamacao::EM_ATENDIMENTO);
// var_dump($reclamacao01);

$employee01 = new Usuario("employee01", 'employee01@email.com', EnumTipoUsuario::FUNCIONARIO);

$resposta01 = new Resposta("Ar condicionado será trocado essa semana.", $employee01);
$resposta01->setIsRespostaSatisfatoria(false);
$reclamacao01->adicionarResposta($resposta01);

$resposta02 = new Resposta("Ainda não foi trocado.", $usuario01);
$reclamacao01->adicionarResposta($resposta02);

var_dump($reclamacao01);
