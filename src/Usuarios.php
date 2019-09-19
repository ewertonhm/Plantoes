<?php

use App\Model\Usuario;
use App\View\LayoutPadrao;
use App\View\Tabela;

require_once 'config.php';

$login = new \App\Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Usuários','cadastrar-usuario.php');

$usuarios = Usuario::all();
// TODO: Tabela;
/*
$header = ['ID','NOME','LOGIN','',''];
$fields = ['id','nome','login'];
$buttons = ['alterar-usuario.php','deletar-usuario.php'];
$body = $usuarios;

$table = new Tabela($header,$fields,$body,'',$buttons);
*/
$layout->fim();