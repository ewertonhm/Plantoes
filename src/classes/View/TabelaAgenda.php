<?php


namespace View;


class TabelaAgenda
{

    public function __construct($dataInicio = [], $dataFim = [], $juiz = [])
    {
        echo <<<TAG
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-cell mdl-shadow--2dp mdl-color--white mdl-cell--12-col">
                <div class="mdl-grid mdl-cell--stretch	">
                        <div class="mdl-cell ">
TAG;
        echo "
        <table class='mdl-data-table mdl-js-data-table'>
        <thead>
        <tr>
        <th class='mdl-data-table__cell--non-numeric'>INICIO</th>
        <th class='mdl-data-table__cell--non-numeric'>FIM</th>
        <th class='mdl-data-table__cell--non-numeric'>JUIZ</th>
        </tr>
        </thead>
        <tbody>
        ";
        // para cada linha que retornar no banco de dados
        $index = 0;
        foreach ($dataInicio as $row){
            echo "<tr>";

            echo "<td class='mdl-data-table__cell--non-numeric'>$dataInicio[$index]</td>";
            echo "<td class='mdl-data-table__cell--non-numeric'>$dataFim[$index]</td>";
            echo "<td class='mdl-data-table__cell--non-numeric'>$juiz[$index]</td>";
            echo "</tr>";
            $index++;
        }
        echo "
        </tbody>
        </table>
        ";
        echo <<<TAG
                        </div>
                    <div class="mdl-layout-spacer"></div>
                </div>
            </div>
            <div class="mdl-layout-spacer"></div>
TAG;

    }
}