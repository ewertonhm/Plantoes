<?php


namespace App\Model;


class DiaPreferivelDao Implements Dao
{

    public function create(Dia $dia)
    {
        $sql = 'INSERT INTO diaprefererivel(data, juiz_id) VALUES (?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $dia->getData());
        $enviar->bindValue(2, $dia->getJuizId());

        $enviar->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM diaprefererivel';
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
        $sql = 'SELECT * FROM diaprefererivel WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$id);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }

    public function update(Dia $dia)
    {
        $sql = 'UPDATE diaprefererivel SET data = ?, juiz_id = ? where id = ?';

        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $dia->getData());
        $enviar->bindValue(2, $dia->getJuizId());
        $enviar->bindValue(3, $dia->getId());

        $enviar->execute();
    }

    public function delete(Dia $dia)
    {
        $sql = 'DELETE FROM diaprefererivel WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $dia->getId());

        $enviar->execute();
    }
}