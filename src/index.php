<?php

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$loader = new \Twig\Loader\FilesystemLoader('classes/View');
$twig = new \Twig\Environment($loader);

$template = $twig->load('Index.twig');

$juizes = JuizesQuery::create()->find();
$agenda = AgendasQuery::create()->findByAno(2019);

$dias = [];
$index = 0;

foreach ($agenda as $a){
    $dias[$index]['inicio'] = $a->getDataInicio('d-m-Y');
    $dias[$index]['fim'] = $a->getDataFim('d-m-Y');
    if($a->getJuizId() != NULL){
        $j = $a->getJuizes();
        $dias[$index]['juiz'] = $j->getNome();
    } else {
        $dias[$index]['juiz'] = '';
    }
    $index++;
}

echo $template->render([
    'title'=>'Pagina Inicial',
    'username'=>Controller\User::getUserName(),
    'usuarios'=>Controller\User::getUsuarios(),
    'dias'=>$dias
]);

