<?php

use App\Model\Agenda;
use App\Model\AgendaDao;
use App\Model\JuizDao;
use App\Model\Plantao;
use App\Model\PlantaoDao;
use App\View\Foot;
use App\View\Head;
use App\View\Navbar;
use App\View\Tabela;

require_once 'vendor/autoload.php';

$login = new \App\Controller\Login();

if(!$login->isLogged()){
    header('location: login.php');
} else {
    $header = new Head('bar');
    $navbar = new Navbar();


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

    $footer = new Foot();
}


?>