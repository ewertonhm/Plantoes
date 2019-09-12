<?php


namespace App\Service;


use App\Model\Juiz;
use App\Model\JuizDao;
use App\Model\PlantaoJuiz;
use App\Model\PlantaoJuizDao;

class Plantao
{
    public function IncrementarCoeficiente($juiz_id, $ano){
        $plantaoJuiz = new PlantaoJuiz();
        $plantaoJuiz->setJuizId($juiz_id);
        $plantaoJuiz->setAno($ano);

        $plantaoJuizCrud = new PlantaoJuizDao();
        $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        if(empty($data)){
            $plantaoJuiz->setNumeroPlantoesRealizados(0);
            $plantaoJuiz->setSemanaUltimoPlantao(0);
            $plantaoJuiz->setCoeficienteDePlantoes(0);
            $plantaoJuizCrud->create($plantaoJuiz);
            $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        }
        $plantaoJuiz->setId($data['id']);
        $plantaoJuiz->setCoeficienteDePlantoes(($data['coeficiente_de_plantoes']+1));
        $plantaoJuiz->setSemanaUltimoPlantao($data['semana_ultimo_plantao']);
        $plantaoJuiz->setNumeroPlantoesRealizados($data['numero_de_plantoes_realizados']);

        $plantaoJuizCrud->update($plantaoJuiz);
    }
    public function decrementarCoefiente($juiz_id, $ano){
        $plantaoJuiz = new PlantaoJuiz();
        $plantaoJuiz->setJuizId($juiz_id);
        $plantaoJuiz->setAno($ano);

        $plantaoJuizCrud = new PlantaoJuizDao();
        $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        if(empty($data)){
            $plantaoJuiz->setNumeroPlantoesRealizados(0);
            $plantaoJuiz->setSemanaUltimoPlantao(0);
            $plantaoJuiz->setCoeficienteDePlantoes(0);
            $plantaoJuizCrud->create($plantaoJuiz);
            $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        }
        $plantaoJuiz->setId($data['id']);
        $plantaoJuiz->setCoeficienteDePlantoes(($data['coeficiente_de_plantoes']-1));
        $plantaoJuiz->setSemanaUltimoPlantao($data['semana_ultimo_plantao']);
        $plantaoJuiz->setNumeroPlantoesRealizados($data['numero_de_plantoes_realizados']);

        $plantaoJuizCrud->update($plantaoJuiz);
    }
    public function incrementarNumeroDePlantoes($juiz_id, $ano){
        $plantaoJuiz = new PlantaoJuiz();
        $plantaoJuiz->setJuizId($juiz_id);
        $plantaoJuiz->setAno($ano);

        $plantaoJuizCrud = new PlantaoJuizDao();
        $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        if(empty($data)){
            $plantaoJuiz->setNumeroPlantoesRealizados(0);
            $plantaoJuiz->setSemanaUltimoPlantao(0);
            $plantaoJuiz->setCoeficienteDePlantoes(0);
            $plantaoJuizCrud->create($plantaoJuiz);
            $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        }
        $plantaoJuiz->setId($data['id']);
        $plantaoJuiz->setCoeficienteDePlantoes(($data['coeficiente_de_plantoes']));
        $plantaoJuiz->setSemanaUltimoPlantao($data['semana_ultimo_plantao']);
        $plantaoJuiz->setNumeroPlantoesRealizados(($data['numero_de_plantoes_realizados']+1));

        $plantaoJuizCrud->update($plantaoJuiz);
    }
    public function decrementarNumeroDePlantoes($juiz_id, $ano){
        $plantaoJuiz = new PlantaoJuiz();
        $plantaoJuiz->setJuizId($juiz_id);
        $plantaoJuiz->setAno($ano);

        $plantaoJuizCrud = new PlantaoJuizDao();
        $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        if(empty($data)){
            $plantaoJuiz->setNumeroPlantoesRealizados(0);
            $plantaoJuiz->setSemanaUltimoPlantao(0);
            $plantaoJuiz->setCoeficienteDePlantoes(0);
            $plantaoJuizCrud->create($plantaoJuiz);
            $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        }
        $plantaoJuiz->setId($data['id']);
        $plantaoJuiz->setCoeficienteDePlantoes(($data['coeficiente_de_plantoes']));
        $plantaoJuiz->setSemanaUltimoPlantao($data['semana_ultimo_plantao']);
        $plantaoJuiz->setNumeroPlantoesRealizados(($data['numero_de_plantoes_realizados']-1));

        $plantaoJuizCrud->update($plantaoJuiz);
    }
    public function lerCoeficiente($juiz_id, $ano){
        $plantaoJuiz = new PlantaoJuiz();
        $plantaoJuiz->setJuizId($juiz_id);
        $plantaoJuiz->setAno($ano);

        $plantaoJuizCrud = new PlantaoJuizDao();
        $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        if(empty($data)){
            $plantaoJuiz->setNumeroPlantoesRealizados(0);
            $plantaoJuiz->setSemanaUltimoPlantao(0);
            $plantaoJuiz->setCoeficienteDePlantoes(0);
            $plantaoJuizCrud->create($plantaoJuiz);
            $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        }
        return $data['coeficiente_de_plantoes'];

    }
    public function lerNumeroDePlantoes($juiz_id, $ano){
        $plantaoJuiz = new PlantaoJuiz();
        $plantaoJuiz->setJuizId($juiz_id);
        $plantaoJuiz->setAno($ano);

        $plantaoJuizCrud = new PlantaoJuizDao();
        $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        if(empty($data)){
            $plantaoJuiz->setNumeroPlantoesRealizados(0);
            $plantaoJuiz->setSemanaUltimoPlantao(0);
            $plantaoJuiz->setCoeficienteDePlantoes(0);
            $plantaoJuizCrud->create($plantaoJuiz);
            $data = $plantaoJuizCrud->readWithJuizId($plantaoJuiz);
        }

        return $data['numero_de_plantoes_realizados'];
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