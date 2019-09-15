<?php

use App\View\CadastrarJuiz;
use App\View\Foot;
use App\View\Head;
use App\View\Navbar;

require_once 'vendor/autoload.php';

$head = new Head('','Cadastrar Juiz');
$navbar = new Navbar();
$form = new CadastrarJuiz();
$foot = new Foot();