<?php


namespace View;


class Tabela
{

    public function __construct($header = [], $fields =[], $buttons = [],$ordem = '')
    {
        if(empty($header) OR empty($fields) OR empty($fields)){
            return true;
        }
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
        ";
        $index = 0;
        foreach ($header as $head){
            echo "<th class='mdl-data-table__cell--non-numeric'>";

            if($ordem){
                echo "<a class='mdl-navigation__link' href='";
                echo $_SERVER['PHP_SELF'];
                echo "?ordem=$head'>";
            }

            echo "$head</th>";

            if ($ordem){
                echo "</a>";
            }
        }
        echo "
        </tr>
        </thead>
        <tbody>
        ";
        $index = 0;
        foreach ($fields[0] as $linha){
            echo "<tr>";
            // para cada campo da tabela
            foreach ($fields as $coluna){
                echo "<td class='mdl-data-table__cell--non-numeric'>$coluna[$index]</td>";
            }
            if(!empty($buttons)){
                foreach ($buttons as $button){
                    echo "<td class='mdl-data-table__cell--non-numeric'>";
                    echo "<a class='mdl-navigation__link' href='";
                    echo $button;
                    echo "?id=";
                    echo $fields[0][$index];
                    echo "'>";
                    echo "<button class='mdl-button mdl-js-button mdl-button--icon'>";
                    if(substr($button,0,3) == 'alt'){
                        echo "<div id='alter-user";
                        echo $fields[0][$index];
                        echo "' class='icon material-icons'>edit</div>";
                        echo "<div class='mdl-tooltip' data-mdl-for='alter-user";
                        echo $fields[0][$index];
                        echo "'>Editar</div>";
                    }
                    if(substr($button,0,3) == 'del'){
                        echo "<div id='del-user";
                        echo $fields[0][$index];
                        echo "' class='icon material-icons'>delete_swip</div>";
                        echo "<div class='mdl-tooltip' data-mdl-for='del-user";
                        echo $fields[0][$index];
                        echo "'>Deletar</div>";
                    }
                    echo "</button>";
                    echo "</a>";
                    echo "</td>";
                }
            }

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