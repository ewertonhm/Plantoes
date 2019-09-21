<?php


namespace Controller;

use Base\AgendasQuery;

class Agenda
{
    public function criarAnoZerado($ano)
    {
        // verifica se ja possui dados no ano
        $query = \AgendasQuery::create()->filterByAno($ano)->find();
        if(!empty($query)){
            foreach ($query as $q){
                $q->delete();
            }
        }

        // estancia a função DateTime
        $data = new \DateTime();
        $data->setDate($ano,1,1);
        $week = 1;

        // cria um objeto do tipo Agenda pra cada semana do ano
        while(($data->format('Y'))<$ano+1){
            $a = new \Agendas();
            $a->setAno($ano);
            $a->setSemana($week);
            $a->setDataInicio($data->format('Y-m-d'));
            $data->add(\DateInterval::createFromDateString('6Days'));
            $a->setDataFim($data->format('Y-m-d'));
            $a->save();

            $data->sub(\DateInterval::createFromDateString('6Days'));
            $data->add(\DateInterval::createFromDateString('7Days'));
            $week++;
        }
    }
    public function marcarAgenda($dataInicio, $juizId)
    {
        $agenda = AgendasQuery::create()->findOneByDataInicio($dataInicio);
        $agenda->setJuizId($juizId);
        $agenda->save();
    }
    public function desmarcarAgenda($dataInicio)
    {
        $agenda = AgendasQuery::create()->findOneByDataInicio($dataInicio);
        $agenda->setJuizId(NULL);
        $agenda->save();
    }
}