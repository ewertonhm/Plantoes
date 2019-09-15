<?php


namespace App\Model;


class AgendaDao
{
    public function create(Agenda $agenda)
    {
        $sql = 'INSERT INTO agenda(data_inicio, data_fim, semana, ano, juiz_id) VALUES (?,?,?,?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $agenda->getDataInicio());
        $enviar->bindValue(2, $agenda->getDataFim());
        $enviar->bindValue(3, $agenda->getSemana());
        $enviar->bindValue(4, $agenda->getAno());
        $enviar->bindValue(5, $agenda->getJuizId());

        $enviar->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM agenda ORDER BY data_inicio';
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
        $sql = 'SELECT * FROM agenda WHERE id = ? ';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$id);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado[0];
        }
        return [];
    }

    public function readWithJuizId(Agenda $agenda)
    {
        $sql = 'SELECT * FROM agenda WHERE ano = ? AND juiz_id = ? ORDER BY data_inicio';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$agenda->getAno());
        $enviar->bindValue(2,$agenda->getJuizId());

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }

    public function readWithYear(Agenda $agenda)
    {
        $sql = 'SELECT * FROM agenda WHERE ano = ? ORDER BY data_inicio';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$agenda->getAno());

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }
    public function readWithDay(Agenda $agenda)
    {
        $sql = 'SELECT * FROM agenda WHERE data_inicio = ? ORDER BY data_inicio';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$agenda->getDataInicio());

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado[0];
        }
        return [];
    }

    public function update(Agenda $agenda)
    {
        $sql = 'UPDATE agenda SET 
                  data_inicio = ?,
                  data_fim = ?,
                  semana = ?,
                  ano = ?,
                  juiz_id = ?
                  WHERE id = ?';

        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $agenda->getDataInicio());
        $enviar->bindValue(2, $agenda->getDataFim());
        $enviar->bindValue(3, $agenda->getSemana());
        $enviar->bindValue(4, $agenda->getAno());
        $enviar->bindValue(5, $agenda->getJuizId());
        $enviar->bindValue(6, $agenda->getId());

        $enviar->execute();
    }

    public function delete(Agenda $agenda)
    {
        $sql = 'DELETE FROM agenda WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $agenda->getId());

        $enviar->execute();
    }

    public function deleteYear(Agenda $agenda)
    {
        $sql = 'DELETE FROM agenda WHERE ano = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $agenda->getAno());

        $enviar->execute();
    }
}