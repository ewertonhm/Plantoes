<?php


namespace View;


class UserForm
{
    public function __construct($tip = '')
    {
        echo <<<TAG
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-cell mdl-shadow--2dp mdl-color--white mdl-cell--12-col">
                <div class="mdl-grid mdl-cell--stretch	">
                    <div class="mdl-cell ">
                    <p>$tip</p>
                        <form method="post" action="" autocomplete="off">
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" id="nome" name="nome" pattern="[A-Z,a-z, ]*">
                                <label class="mdl-textfield__label" for="nome">Nome</label>     
                                <span class="mdl-textfield__error">Apenas letras e espaços</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" id="login" name="login"  pattern="[A-Z,a-z,0-9]*">
                                <label class="mdl-textfield__label" for="login">Usuario</label>
                                <span class="mdl-textfield__error">Apensar Letras e números</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="password" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Senha</label>
                            </div> 
                            <div>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="btn-cadastrar">
                                  Salvar
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