<?php

class Usuario
{
    private string $nome;
    private string $email;
    private string $password;
    private int $tipoUsuario;

    public function __construct(string $nome, string $email, int $tipoUsuario)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->tipoUsuario = $tipoUsuario;
    }
    public function getNome(): string{
        return $this->nome;
    }
    public function getEmail(): string{
        return  $this->email;
    }
    public function getTipoUsuario(): int {
        return $this->tipoUsuario;
    }
    public function getPassword(): string{
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}





