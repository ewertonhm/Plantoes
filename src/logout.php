<?php

use App\Controller\Login;

require_once "config.php";

$login = new Login();
$login->logout();
$login->isLogged();