<?php


namespace App\Model;


class Generico
{
    private $codigo, $nome, $etc;

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEtc()
    {
        return $this->etc;
    }

    /**
     * @param mixed $etc
     */
    public function setEtc($etc)
    {
        $this->etc = $etc;
    }


}