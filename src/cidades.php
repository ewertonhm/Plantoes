<?php

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$loader = new \Twig\Loader\FilesystemLoader('classes/View');
$twig = new \Twig\Environment($loader);

$template = $twig->load('Tabela.twig');

$cidades = CidadesQuery::create()->find();
if(isset($_GET['ordem'])){
    if($_GET['ordem'] == 'ID'){
        $cidades = CidadesQuery::create()->orderById()->find();
    } elseif ($_GET['ordem'] == 'NOME'){
        $cidades = CidadesQuery::create()->orderByNome()->find();
    }
}

$array = [];
$index = 0;
$head = ['ID','NOME','',''];

foreach ($cidades as $cidade){
    $content = [$cidade->getId(),$cidade->getNome()];
    $array[$index]['head'] = $head;
    $array[$index]['content']= $content;
    $index++;
}

echo $template->render([
    'title'=>'Cidades',
    'username'=>Controller\User::getUserName(),
    'usuarios'=>Controller\User::getUsuarios(),
    'ordem'=>'cidades.php',
    'table'=>$array,
    'buttons'=>['alterar-cidade.php','deletar-cidade.php']
]);
