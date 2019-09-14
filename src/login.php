<?php

require_once 'vendor/autoload.php';

use App\View\Foot;
use App\View\Head;
use App\View\Login;

$login = new \App\Controller\Login();
if($login->isLogged()){
    header('location: index.php');
} else {
    $head = new Head();
    $body = new Login();
    $foot = new Foot();
    if(isset($_POST['btn-login'])){
        $usuario = $login->login($_POST['login'],$_POST['password']);
        if(isset($usuario) AND $usuario != false){
            $id = $usuario->getId();
        }
        if(isset($id) AND $id != NULL){
            header('location: index.php');
        }
        echo "<script>";
        echo "alert('Login ou Senha incorreto!');";
        echo "</script>";
    }
}
?>