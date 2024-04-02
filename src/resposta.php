<?php 

class Resposta
{
    private string $dataResposta;
    private string $descricao;
    private Usuario $usuario;
    private bool $isRespostaSatisfatoria;

    public function __construct(string $descricao, Usuario $usuario)
    {
        $this->descricao = $descricao;
        $this->usuario = $usuario;
        $this->dataResposta = date('y-m-d H:i:s');
        $this->isRespostaSatisfatoria = true;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getDataResposta(): string
    {
        return $this->dataResposta;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }
    public function getIsRespostaSatisfatoria(): bool
    {
        return $this->isRespostaSatisfatoria;
    }

    public function setIsRespostaSatisfatoria(bool $resposta): void
    {
        $this->isRespostaSatisfatoria = $resposta;
    }
}

