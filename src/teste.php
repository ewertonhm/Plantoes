<?php

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$loader = new \Twig\Loader\FilesystemLoader('classes/View');
$twig = new \Twig\Environment($loader);

$template = $twig->load('Tabela.twig');

$usuarios = UsuariosQuery::create()->find();
if(isset($_GET['ordem'])){
    if($_GET['ordem'] == 'ID'){
        $usuarios = UsuariosQuery::create()->orderById()->find();
    } elseif ($_GET['ordem'] == 'LOGIN') {
        $usuarios = UsuariosQuery::create()->orderByLogin()->find();
    } elseif ($_GET['ordem'] == 'NOME'){
        $usuarios = UsuariosQuery::create()->orderByNome()->find();
    }
}

$array = [];
$index = 0;
$head = ['ID','LOGIN','NOME','',''];

foreach ($usuarios as $usuario){
    $content = [$usuario->getId(),$usuario->getLogin(),$usuario->getNome()];
    $array[$index]['head'] = $head;
    $array[$index]['content']= $content;
    $index++;
}

echo $template->render([
    'title'=>'Pagina Inicial',
    'username'=>Controller\User::getUserName(),
    'usuarios'=>Controller\User::getUsuarios(),
    'ordem'=>'teste.php',
    'table'=>$array,
    'buttons'=>['alterar-usuario.php','deletar-usuario.php']
]);
