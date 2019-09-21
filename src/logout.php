<?php

use Controller\Login;

require_once "config.php";

$login = new Login();
$login->logout();
$login->isLogged();