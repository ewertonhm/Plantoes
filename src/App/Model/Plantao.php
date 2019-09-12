<?php


namespace App\Model;


class Plantao
{
    private $id, $data, $ano, $semana, $juiz_id;

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
    public function getJuizId()
    {
        return $this->juiz_id;
    }

    /**
     * @param mixed $juiz_id
     */
    public function setJuizId($juiz_id)
    {
        $this->juiz_id = $juiz_id;
    }

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param mixed $ano
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    /**
     * @return mixed
     */
    public function getSemana()
    {
        return $this->semana;
    }

    /**
     * @param mixed $semana
     */
    public function setSemana($semana)
    {
        $this->semana = $semana;
    }


}