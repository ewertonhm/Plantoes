<?php

use App\Model\Juiz;
use App\Model\JuizDao;
use App\Service\Agenda;
use App\Service\Plantonista;


require_once 'vendor/autoload.php';

$juiz = new Juiz();
$juiz->setId(rand(1,10));

$juizCrud = new JuizDao();
$dados = $juizCrud->readFirst($juiz->getId());
$juiz->setNome($dados['nome']);
echo $juiz->getNome();
echo "<br>";



$agenda = new \App\Model\Agenda();
$agenda->setDataInicio('2019-01-01');
$agenda->setDataFim('2019-01-07');

$plantonista = new Plantonista();

if($plantonista->verificaFeriado($juiz, $agenda)){
    echo "<br>";
    echo "feriado";
    echo "<br>";
} else {
    echo "<br>";
    echo "não é feriado";
    echo "<br>";
}

if($plantonista->verificaDiaIndisponivel($juiz, $agenda)){
    echo "<br>";
    echo "indisponivel";
    echo "<br>";
} else {
    echo "<br>";
    echo "disponível";
    echo "<br>";
}

echo "<br>";



?>