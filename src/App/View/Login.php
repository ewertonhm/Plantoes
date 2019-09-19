<?php


namespace App\View;


use App\Model\UsuarioDao;

class Login
{
    public function __construct($id='')
    {
        echo <<<TAG
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-cell mdl-shadow--2dp mdl-color--white mdl-cell--6-col">
                <div class="mdl-grid mdl-cell--stretch	">
                    <div class="mdl-layout-spacer"></div>
                        <div class="mdl-cell mdl-cell--4-col ">
                            <br><br><br><br>
                            <form action="" method="post">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
TAG;
        if($id != NULL){
            $dados = \App\Model\Usuario::first($id);
            echo $dados->login;
        } else {
            echo <<<TAG
                                    <input class="mdl-textfield__input" type="text" id="login" name="login">
                                    <label class="mdl-textfield__label" for="login">Usuario</label>
TAG;
        }
        echo <<<TAG
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password" id="password" name="password">
                                    <label class="mdl-textfield__label" for="password">Senha</label>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored " id="btn-login" name="btn-login">
                                    Entrar
                                </button>
                            </form>
                            <br><br><br><br>
                        </div>
                    <div class="mdl-layout-spacer"></div>
                </div>
            </div>
            <div class="mdl-layout-spacer"></div>
TAG;
    }

}