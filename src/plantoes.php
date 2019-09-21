<?php


use View\LayoutPadrao;
use View\Tabela;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Plantões');


$layout->fim();