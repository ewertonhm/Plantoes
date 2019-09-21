<?php


use View\LayoutPadrao;
use View\Tabela;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Cidades','cadastrar-cidade.php');




$cidades = CidadesQuery::create()->orderById()->find();
$ids = [];
$nomes = [];

foreach ($cidades as $c){
    $ids[] = $c->getId();
    $nomes[] = $c->getNome();
}

$header = ['ID','NOME','',''];
$fields = [$ids,$nomes];
$buttons = ['alterar-cidade.php','deletar-cidade.php'];

$table = new Tabela($header,$fields,$buttons);

$layout->fim();