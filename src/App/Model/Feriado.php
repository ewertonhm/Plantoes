<?php


namespace App\Model;


class Feriado
{
    private $id, $nome, $data, $cidade_id;

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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
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