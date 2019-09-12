<?php


namespace App\Model;


class Juiz
{
    private $id, $nome, $cidade_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getCidadeId()
    {
        return $this->cidade_id;
    }

    /**
     * @param mixed $cidade_id
     */
    public function setCidadeId($cidade_id)
    {
        $this->cidade_id = $cidade_id;
    }


}