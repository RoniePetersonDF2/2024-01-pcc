<?php

class Reclamacao extends Relato
{
    protected Usuario $usuario;
    protected $respostas = [];
    protected int $statusReclamacao;
    public function __construct(string $titulo, string $descricao, int $tipoRelato, Usuario $usuario)
    {
        parent::__construct($titulo, $descricao, $tipoRelato);
        $this->usuario = $usuario;
        $this->statusReclamacao = EnumStatusReclamacao::RECEBIDA;
    }
    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }
    public function getRespostas(): array
    {
        return $this->respostas;
    }
    public function getStatusReclamacao(): int
    {
        return $this->statusReclamacao;
    }
    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario =$usuario;
    }
    public function adicionarResposta(Resposta $resposta): void
    {
        $this->respostas[] = $resposta;
    }

    public function setStatusReclamacao(int $statusReclamacao): void
    {
        $this->statusReclamacao = $statusReclamacao;
    }
}
