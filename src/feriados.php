<?php


use View\LayoutPadrao;
use View\Tabela;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Juízes','cadastrar-feriado.php');


$data = FeriadosQuery::create()->orderById()->find();
if(isset($_GET['ordem'])){
    if($_GET['ordem'] == 'DATA'){
        $data = FeriadosQuery::create()->orderByData()->find();
    } elseif ($_GET['ordem'] == 'CIDADE'){
        $data = FeriadosQuery::create()->orderByCidadeId()->find();
    } elseif ($_GET['ordem'] == 'ID'){
        $data = FeriadosQuery::create()->orderById()->find();
    } elseif ($_GET['ordem'] == 'NOME'){
        $data = FeriadosQuery::create()->orderByNome()->find();
    }
}


$ids = [];
$nomes = [];
$datas = [];
$cidades = [];

foreach ($data as $d){
    $ids[] = $d->getId();
    $nomes[] = $d->getNome();
    $datas[] = $d->getData('d-m-Y');
    $c = $d->getCidades();
    $cidades[] = $c->getNome();
}

foreach ($data as $d){
    $c = $d->getCidades();
    $content = [$d->getId(),$d->getNome(),$d->getData(),$c->getNome()];
    $array[$index]['head'] = $head;
    $array[$index]['content']= $content;
    $index++;
}



$header = ['ID','NOME','DATA','CIDADE','',''];
$fields = [$ids,$nomes,$datas,$cidades];
$buttons = ['alterar-feriado.php','deletar-feriado.php'];

$table = new Tabela($header,$fields,$buttons,true);

$layout->fim();