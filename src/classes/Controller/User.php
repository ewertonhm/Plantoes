<?php


namespace Controller;


class User
{
    public static function getUserName(){
        if(isset($_SESSION['user_id'])) {
            $usuario = \UsuariosQuery::create()->findOneById($_SESSION['user_id']);
            return $usuario->getNome();
        } else { return false; }
    }
    public static function getUsuarios(){
        if(isset($_SESSION['user_id'])) {
            return \UsuariosQuery::create()->find();
        } else { return false; }
    }
}