<?php

use App\Model\UsuarioDao;
use App\View\LayoutPadrao;
use App\View\Tabela;

require_once 'vendor/autoload.php';

$login = new \App\Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Usuários','cadastrar-usuario.php');

$usuariosCrud = new UsuarioDao();
$usuarios = $usuariosCrud->read();

$header = ['ID','NOME','LOGIN','',''];
$fields = ['id','nome','login'];
$buttons = ['alterar-usuario.php','deletar-usuario.php'];
$body = $usuarios;

$table = new Tabela($header,$fields,$body,'',$buttons);

$layout->fim();