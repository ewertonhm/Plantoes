<?php


use View\LayoutPadrao;
use View\UserForm;

require_once 'config.php';

$login = new Controller\Login();
if (!$login->isLogged()) {
    header('location: login.php');
}
if (isset($_POST['btn-cadastrar'])) {
    $usuario = UsuariosQuery::create()->findOneById($_GET['id']);
    if(isset($_POST['login']) AND $_POST['login'] != NULL){
        $usuario->setLogin($_POST['login']);
    }
    if(isset($_POST['nome']) AND $_POST['nome'] != NULL){
        $usuario->setNome($_POST['nome']);
    }
    if(isset($_POST['password']) AND $_POST['password'] != NULL){
        $usuario->setPassword(md5($_POST['password']));
    }
    $usuario->save();
    header('location: usuarios.php');
}


$layout = new LayoutPadrao();
$layout->inicio('Alterar Usuário');

$tip = "Insira apenas os dados que deseja modificar e click em salvar";

$form = new UserForm($tip);

$layout->fim();