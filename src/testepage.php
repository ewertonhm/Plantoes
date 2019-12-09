<?php

require_once 'config.php';
echo  "<pre>";


$juizes = JuizesQuery::create()->find();
$plantoes = PlantoesQuery::create()->find();
var_dump($juizes);
var_dump($plantoes);


function Sorting($arr)
{
    $keys = [];
    $n = sizeof($arr);

    for($i = 0; $i < $n; $i++)
    {
        $swapped = False;

        for ($j = 0; $j < $n - $i - 1; $j++)
        {
            // passa da posição 0 até n-i-1
            // Troca se o elemento encontrado é maior que o proximo
            if ($arr[$j] > $arr[$j+1])
            {
                $t = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $t;
                $swapped = True;

                $keys[$j] = $j+1;
                $keys[$j+1] = $j;
            }
            // se não for, apenas salva a posição
            else {
                $keys[$j] = $j;
            }
        }

        if ($swapped == False)
            break;
    }

    return $keys;
}


$juizes = [1,2,3,4,5,6,7,8,9,10];
$coeficiente = [0,0,0,0,0,0,0,0,0,0];

echo "<pre>";

$semanas = [];

for($x=0;$x<52;$x++){
    $semanas[] = $x;
    $disponivel[] = rand(0,1);
}

print_r($semanas);

$result = array(
    "semana" => $semanas,
    "juiz" => $juizes,
    "disponivel" => $disponivel,
    "coeficiente" => $coeficiente
);
$size = count($result['coeficiente']);

$x = 0;

while($x<52){
    // classificar o coeficiente do maior pro menor, de algum jeito usar a chave dele pra setar o juiz
    $keys = Sorting($result['coeficiente']);
    foreach ($keys as $k){
        // verificar se ele pode aquela semana
        if($result['disponivel'][$k]==1){
            // marcar cada juiz em uma semana na ordem do sort
            $result['semana'][$x] = $k;

            // diminuir 1 do coeficiente dele
            $result['coeficiente'][$k]--;

            // cada semana marcada, somar +1 no $x
            $x++;
        }
    }
    // incrementar o coeficiente em 1 ao fim de cada ciclo
    for($abc = 0;$abc<$size;$abc++){
        $result['coeficiente'][$abc]++;
    }
}

var_dump($result);

