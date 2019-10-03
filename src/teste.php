<?php

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$loader = new \Twig\Loader\FilesystemLoader('classes/View');
$twig = new \Twig\Environment($loader);

$template = $twig->load('Tabela.twig');


echo $template->render([
    'title'=>'Pagina Inicial',
    'username'=>Controller\User::getUserName(),
    'usuarios'=>Controller\User::getUsuarios()
]);

$juizes = JuizesQuery::create()->find();
$agenda = AgendasQuery::create()->findByAno(2019);

$juiz = [];
$dataInicio = [];
$dataFim = [];

foreach ($agenda as $a){
    $dataInicio[] = $a->getDataInicio('d-m-Y');
    $dataFim[] = $a->getDataFim('d-m-Y');
    if($a->getJuizId() != NULL){
        $j = $a->getJuizes();
        $juiz[] = $j->getNome();
    } else {
        $juiz[] = '';
    }

}




echo $template->renderBlock('content',[
    'header'=>['INICIO','FIM','JUIZ'],
    'fields'=>$dataFim,
    'ordem'=>''
]);