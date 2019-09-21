<?php

use View\LayoutPadrao;
use View\TabelaAgenda;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();

$layout->inicio('Inicio');


$juizes = JuizesQuery::create()->find();
$agenda = AgendasQuery::create()->findByAno(2019);

$juiz = [];
$dataInicio = [];
$dataFim = [];
foreach ($agenda as $a){
    $dataInicio[] = $a->getDataInicio('d-m-Y');
    $dataFim[] = $a->getDataFim('d-m-Y');
    $j = $a->getJuizes();
    $juiz[] = $j->getNome();
}

$table = new TabelaAgenda($dataInicio,$dataFim,$juiz);


$layout->fim();