<?php

require_once 'config.php';

use App\View\LayoutPadrao;
use App\View\Login;

$login = new \App\Controller\Login();
if($login->isLogged()){
    header('location: index.php');
} else {
    $layout = new LayoutPadrao();
    $layout->inicio('Login');
    $body = new Login();
    $layout->fim();
    if(isset($_POST['btn-login'])){
        $usuario = $login->login($_POST['login'],$_POST['password']);
        if(isset($usuario) AND $usuario != false){
            $id = $usuario->id;
            var_dump($usuario);
        }
        if(isset($id) AND $id != NULL){
            echo "<script>";
            echo "location.reload();";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Login ou Senha incorreto!');";
            echo "</script>";
        }
    }
}
?>