<?php

use View\LayoutPadrao;
use View\UserForm;

require_once 'config.php';

$login = new Controller\Login();
if(!$login->isLogged()){
    header('location: login.php');
}


$layout = new LayoutPadrao();
$layout->inicio('Cadastro de Usuários','cadastrar-usuario.php');

$form = new UserForm();
var_dump($_POST['btn-cadastrar']);
if(isset($_POST['btn-cadastrar'])){
    echo "<script>alert('ggizi');</script>";
}
$layout->fim();