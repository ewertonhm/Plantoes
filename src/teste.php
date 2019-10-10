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

$array = [];
$index = 0;
$head = ['ID','LOGIN','NOME','',''];
$buttons = ['alterar-usuario.php','deletar-usuario.php'];

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
    'table'=>$array,
    'buttons'=>$buttons
]);

echo "<pre>";
var_dump($array);
