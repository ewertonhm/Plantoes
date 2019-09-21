<?php


namespace Controller;


class Login
{
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
        $query = \UsuariosQuery::create()->filterByLogin($login)->filterByPassword(md5($senha))->findOne();
        if(!empty($query)){
            $_SESSION['logado'] = true;
            $_SESSION['user_id'] = $query->getId();
            return $query;
        }
        $_SESSION['logado'] = false;
        return false;
    }
    public function loginById($id,$senha)
    {
        $query = \UsuariosQuery::create()->filterByPassword(md5($senha))->filterById($id)->findOne();
        if(!empty($query)){
            $_SESSION['logado'] = true;
            $_SESSION['user_id'] = $query->getId();
            return $query;
        }
        $_SESSION['logado'] = false;
        return false;
    }
    public function logout(){
        session_unset();
        session_destroy();
        $this->goToLogin();
    }
    public static function sessioDestroy(){
        session_unset();
        session_destroy();
    }
    public function goToLogin(){
        header('location: login.php');
    }

}