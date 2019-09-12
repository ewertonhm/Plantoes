<?php

use App\Model\Cidade;
use App\Model\CidadeDao;
use App\Model\Juiz;
use App\Model\JuizDao;
use App\Service\Agenda;
use App\Service\Plantao;

require_once 'vendor/autoload.php';

$a = new Agenda();
$a->criarAnoZerado(2019);



?>