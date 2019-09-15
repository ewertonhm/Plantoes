<?php

use App\Controller\Login;

require_once "vendor/autoload.php";

$login = new Login();
$login->logout();
$login->isLogged();