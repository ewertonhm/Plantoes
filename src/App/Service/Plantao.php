<?php


namespace App\Service;


use App\Model\Juiz;
use App\Model\JuizDao;

class Plantao
{
    public function IncrementarCoeficiente($juiz_id){
        $juiz = new Juiz();
        $juiz->setId($juiz_id);
        $juizCrud = new JuizDao();
        $juizData = $juizCrud->readFirst($juiz->getId());
        $juiz->setNome($juizData['nome']);
        $juiz->setCidadeId($juizData['cidade_id']);
        var_dump($juiz);




    }
    public function decrementarCoefiente($juiz_id){
        // TODO: implement class.
    }
    public function incrementarNumeroDePlantoes($juiz_id){
        // TODO: implement class.
    }
    public function decrementarNumeroDePlantoes($juiz_id){
        // TODO: implement class.
    }
    public function lerCoeficiente($juiz_id){
        // TODO: implement class.
    }
    public function lerNumeroDePlantoes($juiz_id){
        // TODO: implement class.
    }
    public function marcarPlantao($juiz_id, $numeroSemana){
        // TODO: implement class.
    }
    public function desmarcarPlantao($juiz_id, $numeroSemana){
        // TODO: implement class.
    }
    public function encontrarProxPlantonista($numeroSemanaAtual){
        // TODO: implement class.
    }
}