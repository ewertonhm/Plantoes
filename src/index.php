<?php

use App\Model\Cidade;
use App\Model\CidadeDao;
use App\Model\Juiz;
use App\Model\JuizDao;

require_once 'vendor/autoload.php';

$juiz = new Juiz();
$juiz->setNome('Ewerton Henrique Marschalk');
$juiz->setCidadeId(1);

$juizCrud = new JuizDao();
$juizCrud->create($juiz);


?>