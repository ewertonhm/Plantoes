<?php


namespace App\Model;


class JuizDao
{
    public function create(Juiz $juiz)
    {
        $sql = 'INSERT INTO juiz(nome, cidade_id) VALUES (?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $juiz->getNome());
        $enviar->bindValue(2, $juiz->getCidadeId());

        $enviar->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM juiz ORDER BY id';
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
        $sql = 'SELECT * FROM juiz WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$id);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado[0];
        }
        return [];
    }

    public function update(Juiz $juiz)
    {
        $sql = 'UPDATE juiz SET nome = ?, cidade_id = ? where id = ?';

        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $juiz->getNome());
        $enviar->bindValue(2, $juiz->getCidadeId());
        $enviar->bindValue(3, $juiz->getId());

        $enviar->execute();
    }

    public function delete(Juiz $juiz)
    {
        $sql = 'DELETE FROM juiz WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $juiz->getId());

        $enviar->execute();
    }
}