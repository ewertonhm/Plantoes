<?php


namespace Controller;

use Base\AgendasQuery;
use Base\JuizesQuery;

class DistribuicaoAutomatica
{
    public function distribuir($ano){

        $agendaController = new Agenda();
        $semanas = AgendasQuery::create()->findByAno($ano);

        //////////////////////////////////////////
        echo '<pre>';
        var_dump($semanas);
        /////////////////////////////////////////


        // subistituir futuramente pela ordem real
        $ordem = [];
        foreach($semanas as $semana){
            $ordem[] = rand(1,10);
        }
        $ordemIndex = 0;

        foreach($semanas as $semana){
            $agendaController->marcarAgenda($semana->getDataInicio(),$ordem[$ordemIndex]);
            $ordemIndex+=1;
        }

    }
}