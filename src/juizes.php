<?php


use View\LayoutPadrao;
use View\Tabela;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Juízes','cadastrar-juiz.php');




$data = JuizesQuery::create()->orderById()->find();
$ids = [];
$nomes = [];
$telefones = [];
$cidades = [];

foreach ($data as $d){
    $ids[] = $d->getId();
    $nomes[] = $d->getNome();
    $telefones[] = $d->getTelefone();
    $c = $d->getCidades();
    $cidades[] = $c->getNome();
}

$header = ['ID','NOME','TELEFONE','CIDADE','',''];
$fields = [$ids,$nomes,$telefones,$cidades];
$buttons = ['alterar-juiz.php','deletar-juiz.php'];

$table = new Tabela($header,$fields,$buttons);

$layout->fim();