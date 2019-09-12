<?php


namespace App\Model;


class PlantaoJuiz
{
    private $id, $coeficienteDePlantoes, $juiz_id, $ano, $numeroPlantoesRealizados, $semanaUltimoPlantao;

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
    public function getCoeficienteDePlantoes()
    {
        return $this->coeficienteDePlantoes;
    }

    /**
     * @param mixed $coeficienteDePlantoes
     */
    public function setCoeficienteDePlantoes($coeficienteDePlantoes)
    {
        $this->coeficienteDePlantoes = $coeficienteDePlantoes;
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
    public function getNumeroPlantoesRealizados()
    {
        return $this->numeroPlantoesRealizados;
    }

    /**
     * @param mixed $numeroPlantoesRealizados
     */
    public function setNumeroPlantoesRealizados($numeroPlantoesRealizados)
    {
        $this->numeroPlantoesRealizados = $numeroPlantoesRealizados;
    }

    /**
     * @return mixed
     */
    public function getSemanaUltimoPlantao()
    {
        return $this->semanaUltimoPlantao;
    }

    /**
     * @param mixed $semanaUltimoPlantao
     */
    public function setSemanaUltimoPlantao($semanaUltimoPlantao)
    {
        $this->semanaUltimoPlantao = $semanaUltimoPlantao;
    }

}