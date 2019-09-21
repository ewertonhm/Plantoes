<?php


use View\LayoutPadrao;
use View\Tabela;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Usuários','cadastrar-usuario.php');




$usuarios = UsuariosQuery::create()->orderById()->find();
$ids = [];
$logins = [];
$nomes = [];

foreach ($usuarios as $user){
    $ids[] = $user->getId();
    $logins[] = $user->getLogin();
    $nomes[] = $user->getNome();
}

$header = ['ID','NOME','LOGIN','',''];
$fields = [$ids,$nomes,$logins];
$buttons = ['alterar-usuario.php','deletar-usuario.php'];

$table = new Tabela($header,$fields,$buttons);

$layout->fim();