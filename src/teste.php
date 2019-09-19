<?php

use App\Model\Cidade;

require_once 'config.php';

$cidade = Cidade::first();
echo "<pre>";
print_r($cidade->feriado);

var_dump($cidade);