<?php

use App\Model\Cidade;
use App\Model\CidadeDao;
use App\Model\Juiz;
use App\Model\JuizDao;
use App\Service\Plantao;

require_once 'vendor/autoload.php';

$data = new DateTime();
$data->setDate(2019,1,1);
$week = 1;
echo "Week $week";
var_dump($data);
while (($data->format('Y'))<2020){
    $data->add(\DateInterval::createFromDateString('7 days'));
    $week++;
    echo "Week $week";
    var_dump($data);
}



?>