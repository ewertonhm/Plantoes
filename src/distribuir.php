<?php

use App\Service\DistribuicaoAutomatica;

require_once 'config.php';

$distribuicao = new DistribuicaoAutomatica();
$distribuicao->distribuir(2019);