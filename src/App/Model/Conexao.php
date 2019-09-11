<?php


namespace App\Model;


class Conexao
{
    private static $instance;

    // singleton
    public static function getConexao()
    {
        if(!isset(self::$instance)){
            self::$instance = new \PDO('pgsql:...','','','');
        }
        return self::$instance;
    }
}