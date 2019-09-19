<?php


namespace App\Controller;


use App\Model\Usuario;

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
        $query = Usuario::find_by_login_and_password($login,md5($senha));
        if(!empty($query)){
            $_SESSION['logado'] = true;
            $_SESSION['user_id'] = $query->id;
            return $query;
        }
        $_SESSION['logado'] = false;
        return false;
    }
    public function loginById($id,$senha)
    {
        $query = Usuario::find_by_id_and_password($id,md5($senha));
        if(!empty($query)){
            $_SESSION['logado'] = true;
            $_SESSION['user_id'] = $query->id;
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
    public function goToLogin(){
        header('location: login.php');
    }

}