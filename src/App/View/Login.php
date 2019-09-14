<?php


namespace App\View;


class Login
{
    public $info;

    public function __construct()
    {
        echo <<<TAG
<body style='background-color: rgb(59,59,59);'>
    <!-- Start: Login Form Clean -->
    <div class='login-clean' style='background-color: rgb(59,59,59);height: 100%;'>
        <form method='post' action=''>
            <h2 class='sr-only'>Login Form</h2>
            <div class='illustration'><i class='icon ion-ios-navigate' style='color: rgb(71,71,71);'></i></div>
            <div class='form-group'><input class='form-control' type='text' name='login' placeholder='Usuario'></div>
            <div class='form-group'><input class='form-control' type='password' name='password' placeholder='Senha'></div>
TAG;
        if($this->info != NULL){
            echo "<small class='form-text' style='color: rgb(255,0,31);'>Usuário ou senha incorreto.</small>";
        }
        echo <<<TAG
            <div class='form-group'><button class='btn btn-primary btn-block' name='btn-login' type='submit' style='background-color: rgb(71,71,71);'>Log In</button></div>
        </form>
    </div>
    <!-- End: Login Form Clean -->
TAG;
    }

}