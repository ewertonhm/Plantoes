<?php


namespace App\Model;


class Conexao
{
    private static $instance;

    // singleton
    public static function getConexao()
    {
        if(!isset(self::$instance)){
            self::$instance = new \PDO('pgsql:host=ewerton.gq;port=5432;dbname=plantoes','postgres','A1cdl33$2');
        }
        return self::$instance;
    }
}