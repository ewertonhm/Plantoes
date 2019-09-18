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
$layout->inicio('Cadastro de Usuários','cadastrar-usuario.php');


$layout->fim();