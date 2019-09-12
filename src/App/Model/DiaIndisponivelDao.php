<?php


namespace App\Model;


class DiaIndisponivelDao
{

    public function create(Dia $dia)
    {
        $sql = 'INSERT INTO diaindisponivel(data, juiz_id) VALUES (?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $dia->getData());
        $enviar->bindValue(2, $dia->getJuizId());

        $enviar->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM diaindisponivel';
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
        $sql = 'SELECT * FROM diaindisponivel WHERE id = ?';
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
        $sql = 'UPDATE diaindisponivel SET data = ?, juiz_id = ? where id = ?';

        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $dia->getData());
        $enviar->bindValue(2, $dia->getJuizId());
        $enviar->bindValue(3, $dia->getId());

        $enviar->execute();
    }

    public function delete(Dia $dia)
    {
        $sql = 'DELETE FROM diaindisponivel WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $dia->getId());

        $enviar->execute();
    }
}