<?php


namespace App\Model;


class CidadeDao
{
    public function create(Cidade $cidade)
    {
        $sql = 'INSERT INTO cidade(nome) VALUES (?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $cidade->getNome());

        $enviar->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM cidade';
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
        $sql = 'SELECT * FROM cidade WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$id);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }

    public function update(Cidade $cidade)
    {
        $sql = 'UPDATE cidade SET nome = ? where id = ?';

        $sql = 'INSERT INTO cidade VALUES (?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(2, $cidade->getId());
        $enviar->bindValue(1, $cidade->getNome());

        $enviar->execute();
    }

    public function delete(Cidade $cidade)
    {
        $sql = 'DELETE FROM cidade WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $cidade->getId());

        $enviar->execute();
    }
}