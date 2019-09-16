<?php


namespace App\Service;


use App\Model\AgendaDao;
use App\Model\Juiz;
use App\Model\JuizDao;

class DistribuicaoAutomatica
{
    public function distribuir($ano){
        $agendaCrud = new AgendaDao();
        $agendaService = new Agenda();

        $agenda = new \App\Model\Agenda();
        $agenda->setAno($ano);
        $semanas = $agendaCrud->readWithYear($agenda);

        $juiz = new Juiz();
        $juizCrud = new JuizDao();
        $juizes = $juizCrud->read();

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

        }

    }
}