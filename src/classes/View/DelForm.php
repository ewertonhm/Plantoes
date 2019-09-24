<?php


namespace View;


class DelForm
{
    public function __construct($nome)
    {
        echo <<<TAG
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-cell mdl-shadow--2dp mdl-color--white mdl-cell--12-col">
                <div class="mdl-grid mdl-cell--stretch	">
                    <div class="mdl-cell ">
TAG;
        echo "<p>Tem certeza que deseja deletar o usuário: <b>$nome</b> ?</p>";
        echo <<<TAG
                        <form method="post" action="" autocomplete="off">                           
                            <div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="btn-deletar">
                                  Deletar
                                </button>  
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="btn-cancelar">
                                  Cancelar
                                </button>  
                            </div>
                        </form>                    
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>
            </div>
            <div class="mdl-layout-spacer"></div>
TAG;
    }

}