<?php


namespace App\Model;


class PlantaoDao
{

    public function create(Plantao $plantao)
    {
        $sql = 'INSERT INTO plantao(data, ano, semana, juiz_id) VALUES (?,?,?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $plantao->getData());
        $enviar->bindValue(2, $plantao->getAno());
        $enviar->bindValue(3, $plantao->getSemana());
        $enviar->bindValue(4, $plantao->getJuizId());


        $enviar->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM plantao';
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
        $sql = 'SELECT * FROM plantao WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$id);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado[0];
        }
        return [];
    }

    public function update(Plantao $plantao)
    {
        $sql = 'UPDATE plantao SET data = ?, ano = ?, semana = ?, juiz_id = ? where id = ?';

        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $plantao->getData());
        $enviar->bindValue(2, $plantao->getAno());
        $enviar->bindValue(3, $plantao->getSemana());
        $enviar->bindValue(4, $plantao->getJuizId());
        $enviar->bindValue(5, $plantao->getId());

        $enviar->execute();
    }

    public function delete(Plantao $plantao)
    {
        $sql = 'DELETE FROM plantao WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $plantao->getId());

        $enviar->execute();
    }
}