<?php


namespace App\Model;


class GenericoDao
{
    public function create(Generico $g)
    {
        $sql = 'INSERT INTO generico VALUES (?,?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $g->getId());
        $enviar->bindValue(2, $g->getNome());
        $enviar->bindValue(3, $g->getEtc());

        $enviar->execute();
    }
    public function read()
    {
        $sql = 'SELECT * FROM generico';
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
            return $resultado;
        }
        return [];
    }
    public function update(Generico $g)
    {
        $sql = 'UPDATE generico SET nome = ?, etc = ? where id = ?';

        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $g->getNome());
        $enviar->bindValue(2, $g->getEtc());
        $enviar->bindValue(3, $g->getId());

        $enviar->execute();
    }
    public function delete($codigo)
    {
        $sql = 'DELETE FROM generico WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $g->getId());

        $enviar->execute();
    }

}