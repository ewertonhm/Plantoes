<?php


namespace App\Service;


use App\Model\AgendaDao;

class Agenda
{
    public function criarAnoZerado($ano)
    {
        // verifica se ja possui dados no ano
        $agenda = new \App\Model\Agenda();
        $agenda->setAno($ano);
        $aCrud = new AgendaDao();
        $query = $aCrud->readWithYear($agenda);
        if(!empty($query)){
            $aCrud->deleteYear($agenda);
        }

        // estancia a função DateTime
        $data = new \DateTime();
        $data->setDate($ano,1,1);
        $week = 1;

        // cria um objeto do tipo Agenda pra cada semana do ano
        while(($data->format('Y'))<$ano+1){
            $a = new \App\Model\Agenda();
            $a->setAno($ano);
            $a->setSemana($week);
            $a->setDataInicio($data->format('Y-m-d'));
            $data->add(\DateInterval::createFromDateString('6Days'));
            $a->setDataFim($data->format('Y-m-d'));

            $aCrud = new AgendaDao();
            $aCrud->create($a);

            $data->sub(\DateInterval::createFromDateString('6Days'));
            $data->add(\DateInterval::createFromDateString('7Days'));
            $week++;
        }
    }
    public function marcarAgenda($dataInicio, $juizId)
    {
        $agenda = new \App\Model\Agenda();
        $agendaCrud = new AgendaDao();

        $agenda->setDataInicio($dataInicio);
        $agenda->setJuizId($juizId);

        $dados = $agendaCrud->readWithDay($agenda);
        $agenda->setAno($dados['ano']);
        $agenda->setDataFim($dados['data_fim']);
        $agenda->setSemana($dados['semana']);
        $agenda->setId($dados['id']);
        $agenda->setJuizId($juizId);

        $agendaCrud->update($agenda);
    }
    public function desmarcarAgenda($dataInicio)
    {
        $agenda = new \App\Model\Agenda();
        $agendaCrud = new AgendaDao();

        $agenda->setDataInicio($dataInicio);

        $dados = $agendaCrud->readWithDay($agenda);
        var_dump($dados);
        $agenda->setAno($dados['ano']);
        $agenda->setDataFim($dados['data_fim']);
        $agenda->setSemana($dados['semana']);
        $agenda->setId($dados['id']);
        $agenda->setJuizId(NULL);

        $agendaCrud->update($agenda);
    }



}