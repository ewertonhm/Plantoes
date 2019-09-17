<?php


namespace App\Model;


class Conexao
{
    private static $instance;

    // singleton
    public static function getConexao()
    {
        if(!isset(self::$instance)){
            self::$instance = new \PDO('pgsql:host=10.84.200.3;port=5432;dbname=plantoes','postgres','A1cdl33$2');
        }
        return self::$instance;
    }
}