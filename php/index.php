<?php
$nome = 'Gabriel';
$sobrenome = 'Ferrari';
$x = 10;

echo 'Ola ' . $nome . ' ' . $sobrenome . '!<br>';
echo ' O dobro de x é ' . $x * 2;

$familia = array("pai"=>"Ojair",
                 "mae"=>"Neiva",
                 "filho"=>"Gabriel");

echo json_encode($familia);
?>