<?php


namespace App\Model;


class Dia
{
    private $id, $data, $juiz_id;

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


}