<?php

require_once 'config.php';


use View\LayoutPadrao;
use View\Login;

$login = new Controller\Login();

if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Trocar de Usuário');
$body = new Login($_GET['id']);
if(isset($_POST['btn-login'])){
    $u = UsuariosQuery::create()->filterByPassword(md5($_POST['password']))->findOneById($_GET['id']);
    $usuario = NULL;
    if(isset($u)){
        if($u->getId() == $_GET['id']){
            $usuario = $login->loginById($u->getId(),$_POST['password']);
        }
    }
    if(isset($usuario) AND $usuario != NULL AND $usuario != false){
        $id = $usuario->getId();
    }
    if(isset($id) AND $id != NULL){
        echo "<script>";
        echo "window.location.href = '\index.php';";
        echo "window.location.replace('\index.php');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Login ou Senha incorreto!');";
        echo "</script>";
    }
}
$layout->fim();

