<?php

use View\DelForm;
use View\LayoutPadrao;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}
if(isset($_POST['btn-deletar'])){
    $usuario = UsuariosQuery::create()->findOneById($_GET['id']);
    $usuario->delete();
    header('location: usuarios.php');
} elseif (isset($_POST['btn-cancelar'])){
    header("location: usuarios.php");
}

$layout = new LayoutPadrao();
$layout->inicio('Deletar Usuário');

$usuario = UsuariosQuery::create()->findOneById($_GET['id']);
$form = new DelForm($usuario->getNome());

$layout->fim();