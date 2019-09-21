<?php

use App\Controller\Agenda;
use App\Controller\DistribuicaoAutomatica;

require_once 'config.php';

$a = AgendasQuery::create()->find();
$b = \Base\AgendasQuery::create()->find();

$da = $a[0]->getDataInicio('Y-m-d');
$db = $b[0]->getDataInicio(NULL);

var_dump($da);
var_dump($db);