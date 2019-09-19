<?php

use App\View\LayoutPadrao;
use App\View\Tabela;

require_once 'config.php';

$login = new \App\Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();

$layout->inicio('Inicio');
// TODO: Tabela
/*
$agendaCrud = new AgendaDao();

$juizCrud = new JuizDao();
$juizes = $juizCrud->read();
$juiz = [];

foreach ($juizes as $j){
    $juiz[] = $j['nome'];
}

// Table
$header = ['INICIO','FIM','JUIZ'];
$fields = ['data_inicio','data_fim','juiz_id'];
$body = $agendaCrud->read();

$table = new Tabela($header,$fields,$body,$juiz);
*/

$layout->fim();