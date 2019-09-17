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
        <table class='mdl-data-table mdl-js-data-table'>
        <thead>
        <tr>
        ";
        foreach ($header as $head){
            echo "<th class='mdl-data-table__cell--non-numeric'>$head</th>";
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
                    $index = $item['juiz_id'] -1;
                    echo "<td class='mdl-data-table__cell--non-numeric'>$juiz[$index]</td>";
                } else {
                    echo "<td class='mdl-data-table__cell--non-numeric'>$item[$field]</td>";
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