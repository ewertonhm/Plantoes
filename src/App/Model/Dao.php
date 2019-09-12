<?php


namespace App\Model;


interface Dao //Data Access Object
{
    public function create(Classe $classe);
    public function read();
    public function readFirst($id);
    public function update(Classe $classe);
    public function delete(Classe $class);
}