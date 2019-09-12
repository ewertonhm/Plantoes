<?php


namespace App\Service;


use App\Model\Cidade;
use App\Model\Dia;
use App\Model\DiaIndisponivelDao;
use App\Model\Feriado;
use App\Model\FeriadoDao;
use App\Model\Juiz;
use App\Model\JuizDao;

class Plantonista
{
    public function verificaFeriado(Juiz $juiz, \App\Model\Agenda $agenda)
    {
       if($juiz->getCidadeId() == NULL){
           $juizCrud = new JuizDao();
           $dados = $juizCrud->readFirst($juiz->getId());
           $juiz->setCidadeId($dados['cidade_id']);
           $juiz->setNome(['nome']);
       }

       $feriado = new Feriado();
       $feriado->setCidadeId($juiz->getCidadeId());

       $feriadoCrud = new FeriadoDao();
       $feriados = $feriadoCrud->readCidade($juiz->getCidadeId());


       Foreach ($feriados as $feriado){
           $data = new \DateTime();

           $data->setDate(
               substr($agenda->getDataInicio(),0,4),
               substr($agenda->getDataInicio(),5,2),
               substr($agenda->getDataInicio(),8,2)
           );

           $dataFim = new\DateTime();

           $dataFim->setDate(
               substr($agenda->getDataFim(),0,4),
               substr($agenda->getDataFim(),5,2),
               substr($agenda->getDataFim(),8,2)
           );

            while(strtotime($data->format('Y-m-d')) < strtotime($dataFim->format('Y-m-d'))){
                if(strtotime($feriado['data']) == strtotime($data->format('Y-m-d'))){
                    return true;
                }
                $data->add(\DateInterval::createFromDateString('1Days'));
            }
       }
       return false;
    }

    public function verificaDiaIndisponivel(Juiz $juiz, \App\Model\Agenda $agenda)
    {
        $indisponivel = new Dia();
        $indisponivel->setJuizId($juiz->getId());

        $indisponivelCrud = new DiaIndisponivelDao();

        $dias = $indisponivelCrud->readJuiz($juiz->getId());

        $data = new \DateTime();


        Foreach ($dias as $dia){
            $data->setDate(
                substr($agenda->getDataInicio(),0,4),
                substr($agenda->getDataInicio(),5,2),
                substr($agenda->getDataInicio(),8,2)
            );

            $dataFim = new\DateTime();

            $dataFim->setDate(
                substr($agenda->getDataFim(),0,4),
                substr($agenda->getDataFim(),5,2),
                substr($agenda->getDataFim(),8,2)
            );
            while(strtotime($data->format('Y-m-d')) < strtotime($dataFim->format('Y-m-d'))){


                if(strtotime($dia['data']) == strtotime($data->format('Y-m-d'))){
                    return true;
                }
                $data->add(\DateInterval::createFromDateString('1Days'));
            }
        }
        return false;
    }
}