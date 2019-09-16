<?php

use App\Service\DistribuicaoAutomatica;

require_once 'vendor/autoload.php';

$distribuicao = new DistribuicaoAutomatica();
$distribuicao->distribuir(2019);