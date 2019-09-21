<?php


namespace View;


class Tabela
{

    public function __construct($header = [], $fields =[], $body = [], $juiz = [], $buttons = [])
    {
        if(empty($header) OR empty($body) OR empty($fields)){
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
            if(!empty($buttons)){
                foreach ($buttons as $button){
                    echo "<td class='mdl-data-table__cell--non-numeric'>";
                    echo "<a class='mdl-navigation__link' href='";
                    echo $button;
                    echo "?id=";
                    echo $item['id'];
                    echo "'>";
                    echo "<button class='mdl-button mdl-js-button mdl-button--icon'>";
                    if($button == 'alterar-usuario.php'){
                        echo "<div id='alter-user";
                        echo $item['id'];
                        echo "' class='icon material-icons'>edit</div>";
                        echo "<div class='mdl-tooltip' data-mdl-for='alter-user";
                        echo $item['id'];
                        echo "'>Editar</div>";
                    }
                    if($button == 'deletar-usuario.php'){
                        echo "<div id='del-user";
                        echo $item['id'];
                        echo "' class='icon material-icons'>delete_swip</div>";
                        echo "<div class='mdl-tooltip' data-mdl-for='del-user";
                        echo $item['id'];
                        echo "'>Deletar</div>";
                    }
                    echo "</button>";
                    echo "</a>";
                    echo "</td>";
                }
            }

            echo "</tr>";
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