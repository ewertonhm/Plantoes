<?php

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$loader = new \Twig\Loader\FilesystemLoader('classes/View');
$twig = new \Twig\Environment($loader);

$template = $twig->load('Tabela.twig');

$feriados = FeriadosQuery::create()->find();
if(isset($_GET['ordem'])){
    if($_GET['ordem'] == 'ID'){
        $feriados = FeriadosQuery::create()->orderById()->find();
    } elseif ($_GET['ordem'] == 'CIDADE') {
        $feriados = FeriadosQuery::create()->orderByCidadeId()->find();
    } elseif ($_GET['ordem'] == 'NOME'){
        $feriados = FeriadosQuery::create()->orderByNome()->find();
    } elseif ($_GET['ordem'] == 'DATA'){
        $feriados = FeriadosQuery::create()->orderByData()->find();
    }
}

$array = [];
$index = 0;
$head = ['ID','NOME','DATA','CIDADE','',''];

foreach ($feriados as $feriado){
    $cidade = CidadesQuery::create()->findOneById($feriado->getCidadeId());
    $content = [$feriado->getId(),$feriado->getNome(),$feriado->getData('d-m-Y'),$cidade->getNome()];
    $array[$index]['head'] = $head;
    $array[$index]['content']= $content;
    $index++;
}

echo $template->render([
    'title'=>'Feriados',
    'username'=>Controller\User::getUserName(),
    'usuarios'=>Controller\User::getUsuarios(),
    'ordem'=>'feriados.php',
    'table'=>$array,
    'buttons'=>['alterar-feriado.php','deletar-feriado.php']
]);
