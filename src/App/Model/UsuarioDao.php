<?php


namespace App\Model;


class UsuarioDao Implements Dao
{
    public function create(Usuario $usuario)
    {
        $sql = 'INSERT INTO usuario VALUES (?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $usuario->getLogin());
        $enviar->bindValue(2, $usuario->getPassword());

        $enviar->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM usuario';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }

    public function readFirst($id)
    {
        $sql = 'SELECT * FROM usuario WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$id);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }

    public function readCheckLogin(Usuario $usuario)
    {
        $sql = 'SELECT * FROM usuario WHERE login = ? AND password = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$usuario->getLogin());
        $enviar->bindValue(2,$usuario->getPassword());


        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }

    public function update(Usuario $usuario)
    {
        $sql = 'UPDATE usuario SET login = ?, password = ? where id = ?';

        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $usuario->getLogin());
        $enviar->bindValue(2, $usuario->getPassword());
        $enviar->bindValue(3, $usuario->getId());

        $enviar->execute();
    }

    public function delete(Usuario $usuario)
    {
        $sql = 'DELETE FROM usuario WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $usuario->getId());

        $enviar->execute();
    }
}