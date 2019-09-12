<?php


namespace App\Model;


class PlantaoJuizDao
{

    public function create(PlantaoJuiz $pj)
    {
        $sql = 'INSERT INTO plantao_juiz(coeficiente_de_plantoes, ano, numero_de_plantoes_realizados, semana_ultimo_plantao, juiz_id) VALUES (?,?,?,?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $pj->getCoeficienteDePlantoes());
        $enviar->bindValue(2, $pj->getAno());
        $enviar->bindValue(3, $pj->getNumeroPlantoesRealizados());
        $enviar->bindValue(4, $pj->getSemanaUltimoPlantao());
        $enviar->bindValue(5, $pj->getJuizId());

        $enviar->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM plantao_juiz';
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
        $sql = 'SELECT * FROM plantao_juiz WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$id);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }

    public function update(PlantaoJuiz $pj)
    {
        $sql = 'UPDATE plantao_juiz SET coeficiente_de_plantoes = ?, ano = ?, numero_de_plantoes_realizados = ?, semana_ultimo_plantao = ?, juiz_id = ? where id = ?';

        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $pj->getCoeficienteDePlantoes());
        $enviar->bindValue(2, $pj->getAno());
        $enviar->bindValue(3, $pj->getNumeroPlantoesRealizados());
        $enviar->bindValue(4, $pj->getSemanaUltimoPlantao());
        $enviar->bindValue(5, $pj->getJuizId());
        $enviar->bindValue(6, $pj->getId());

        $enviar->execute();
    }

    public function delete(PlantaoJuiz $pj)
    {
        $sql = 'DELETE FROM plantao_juiz WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $pj->getId());

        $enviar->execute();
    }
}