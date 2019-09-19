<?php

require_once 'config.php';


use App\View\LayoutPadrao;
use App\View\Login;

$login = new \App\Controller\Login();

if(!$login->isLogged()){
    header('location: login.php');
}

$layout = new LayoutPadrao();
$layout->inicio('Trocar de Usuário');
$body = new Login($_GET['id']);
if(isset($_POST['btn-login'])){
    $usuario = App\Model\Usuario::find_by_id_and_password($_GET['id'],md5($_POST['password']));
    if(isset($usuario) AND $usuario != false){
        $id = $usuario->id;
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

