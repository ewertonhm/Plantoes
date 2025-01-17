<?php

require_once 'config.php';

use View\LayoutPadrao;
use View\Login;

$login = new Controller\Login();
if($login->isLogged()){
    header('location: index.php');
} else {
    if(isset($_POST['btn-login'])){
        $usuario = $login->login($_POST['login'],$_POST['password']);
        if(isset($usuario) AND $usuario != false){
            $id = $usuario->getId();
        }
        if(isset($id) AND $id != NULL){
            header("location: index.php");
            echo "<script>";
            echo "location.reload();";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Login ou Senha incorreto!');";
            echo "</script>";
        }
    }
    $layout = new LayoutPadrao();
    $layout->inicio('Login');
    $body = new Login();
    $layout->fim();
}
?>