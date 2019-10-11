<?php

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$loader = new \Twig\Loader\FilesystemLoader('classes/View');
$twig = new \Twig\Environment($loader);

$template = $twig->load('Tabela.twig');

$juizes = JuizesQuery::create()->find();
if(isset($_GET['ordem'])){
    if($_GET['ordem'] == 'ID'){
        $juizes = JuizesQuery::create()->orderById()->find();
    } elseif ($_GET['ordem'] == 'TELEFONE') {
        $juizes = JuizesQuery::create()->orderByTelefone()->find();
    } elseif ($_GET['ordem'] == 'NOME'){
        $juizes = JuizesQuery::create()->orderByNome()->find();
    } elseif ($_GET['ordem'] == 'CIDADE'){
        $juizes = JuizesQuery::create()->orderByCidadeId()->find();
    }
}

$array = [];
$index = 0;
$head = ['ID','NOME','TELEFONE','CIDADE','',''];

foreach ($juizes as $juiz){
    $cidade = CidadesQuery::create()->findOneById($juiz->getCidadeId());
    $content = [$juiz->getId(),$juiz->getNome(),$juiz->getTelefone(),$cidade->getNome()];
    $array[$index]['head'] = $head;
    $array[$index]['content']= $content;
    $index++;
}

echo $template->render([
    'title'=>'Juízes',
    'username'=>Controller\User::getUserName(),
    'usuarios'=>Controller\User::getUsuarios(),
    'ordem'=>'juizes.php',
    'table'=>$array,
    'buttons'=>['alterar-juiz.php','deletar-juiz.php']
]);
