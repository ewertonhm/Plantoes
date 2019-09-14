<?php


namespace App\Controller;


use App\Model\Usuario;
use App\Model\UsuarioDao;

class Login
{
    private $usuario;

    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public function isLogged(){
        if (!isset($_SESSION['logado'])){
            return false;
        } else if ($_SESSION['logado'] == true){
            return true;
        } else {
            return false;
        }
    }

    public function login($login,$senha)
    {
        $this->usuario = new Usuario();
        $this->usuario->setLogin($login);
        $this->usuario->setPassword($senha);
        $usuarioCrud = new UsuarioDao();
        $query = $usuarioCrud->readCheckLogin($this->usuario);
        if(!empty($query)){
            $this->usuario->setId($query['id']);
            $_SESSION['logado'] = true;
            $_SESSION['user_id'] = $this->usuario->getId();
            return $this->usuario;
        }
        $_SESSION['logado'] = false;
        return false;
    }
    public function logout(){
        session_unset();
        session_destroy();
        $this->goToLogin();
    }
    public function goToLogin(){
        header('location: login.php');
    }

}