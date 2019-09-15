<?php


namespace App\View;


class Tabela
{

    public function __construct($header = [], $fields =[], $body = [], $juiz = [])
    {
        if(empty($header) OR empty($body) OR empty($fields) OR empty($juiz)){
            return true;
        }
        echo "
        <table class='table'>
        <thead>
        <tr>
        ";
        foreach ($header as $head){
            echo "<th scope='col'>$head</th>";
        }
        echo "
        </tr>
        </thead>
        <tbody>
        ";
        // para cada linha que retornar no banco de dados
        foreach ($body as $item){
            echo "<tr>";
            // para cada campo da tabela
            foreach ($fields as $field){
                if($field == 'juiz_id' AND $item['juiz_id'] != NULL){
                    echo "<td>$juiz[$item]</td>";
                } else {
                    echo "<td>$item[$field]</td>";
                }
            }
            echo "</tr>";
        }
        echo "
        </tbody>
        </table>
        ";
    }
}