<?php

use View\LayoutPadrao;
use View\UserForm;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}
if(isset($_POST['btn-cadastrar'])){
    $usuario = new Usuarios();
    $usuario->setLogin($_POST['login']);
    $usuario->setNome($_POST['nome']);
    $usuario->setPassword(md5($_POST['password']));
    $usuario->save();
    header('location: usuarios.php');
}


$layout = new LayoutPadrao();
$layout->inicio('Cadastro de Usuários','cadastrar-usuario.php');

$form = new UserForm();

$layout->fim();