<?php


namespace App\Model;


class FeriadoDao
{
    public function create(Feriado $feriado)
    {
        $sql = 'INSERT INTO feriado(nome, data, cidade_id) VALUES (?,?,?)';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $feriado->getNome());
        $enviar->bindValue(2, $feriado->getData());
        $enviar->bindValue(3, $feriado->getCidadeId());

        $enviar->execute();
    }

    public function read()
    {
        $sql = 'SELECT * FROM feriado';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];    }

    public function readFirst($id)
    {
        $sql = 'SELECT * FROM feriado WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1,$id);

        $enviar->execute();

        if($enviar->rowCount() > 0){
            $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado[0];
        }
        return [];
    }

    public function update(Feriado $feriado)
    {
        $sql = 'UPDATE feriado SET nome = ?, data = ?, cidade_id = ? WHERE id = ?';

        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $feriado->getNome());
        $enviar->bindValue(2, $feriado->getData());
        $enviar->bindValue(3, $feriado->getCidadeId());
        $enviar->bindValue(4, $feriado->getId());

        $enviar->execute();
    }

    public function delete(Feriado $feriado)
    {
        $sql = 'DELETE FROM feriado WHERE id = ?';
        $enviar = Conexao::getConexao()->prepare($sql);

        $enviar->bindValue(1, $feriado->getId());

        $enviar->execute();
    }
}