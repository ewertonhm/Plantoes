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
// TODO: Tabela;
/*
$header = ['ID','NOME','LOGIN','',''];
$fields = ['id','nome','login'];
$buttons = ['alterar-usuario.php','deletar-usuario.php'];
$body = $usuarios;

$table = new Tabela($header,$fields,$body,'',$buttons);
*/
$layout->fim();