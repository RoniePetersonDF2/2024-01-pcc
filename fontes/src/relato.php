<?php

class Relato 
{
    protected string $dataRelato;
    protected string $titulo;
    protected string $descricao;
    protected int $tipoRelato;

    public function __construct(string $titulo, string $descricao, int $tipoRelato)
    {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->tipoRelato = $tipoRelato;
        $this->dataRelato = date('y-m-d H:i:s');
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getDataRelato(): string
    {
        return $this->dataRelato;
    }

    public function getTipo(): int
    {
        return $this->tipoRelato;
    }
}
