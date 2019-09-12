<?php


namespace App\Model;


class Agenda
{
    private $id, $dataInicio, $dataFim, $semana, $ano, $juiz_id;

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
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * @param mixed $dataInicio
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;
    }

    /**
     * @return mixed
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * @param mixed $dataFim
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;
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

}