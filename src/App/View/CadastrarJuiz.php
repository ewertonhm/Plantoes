<?php


namespace App\View;


class CadastrarJuiz
{
    public function __construct()
    {
        echo <<<TAG
    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form class="custom-form">
                <h1>Cadastro de Juiz</h1>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Nome</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Telefone</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="email"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Email</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">Vara Federal</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Cidade</label></div>
                    <div class="col-sm-4 input-column">
                        <div class="dropdown"><button class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Dropdown </button>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                        </div>
                    </div>
                </div><button class="btn btn-light submit-button" type="button" style="background-color: rgb(71,71,71);">Submit Form</button></form>
        </div>
    </div>
TAG;

    }

}