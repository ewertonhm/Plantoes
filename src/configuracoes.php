<?php


use Controller\Agenda;
use Controller\DistribuicaoAutomatica;
use View\LayoutPadrao;
use View\Tabela;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Configurações');

if(isset($_GET['toggle']) AND $_GET['toggle'] == 'del'){
    Agenda::criarAnoZerado(2019);
}
if(isset($_GET['toggle']) AND $_GET['toggle'] == 'rand'){
    DistribuicaoAutomatica::distribuir(2019);
}


echo "<a class='mdl-navigation__link' href='configuracoes.php?toggle=del'><button class='mdl-button mdl-js-button mdl-button--raised'>Zerar Ano</button></a>";
echo "<a class='mdl-navigation__link' href='configuracoes.php?toggle=rand'><button class='mdl-button mdl-js-button mdl-button--raised'>Juizes Aleatórios</button></a>";



$layout->fim();