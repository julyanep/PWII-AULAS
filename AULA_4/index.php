<?php

$array = array("abacaxi", "limão", "uva");

// Visualizar o conteúdo de um array - var_dump()
var_dump($array);
echo "<br>";

// print_r() - Visualizar o conteúdo de um array de forma simples
print_r($array);
echo "<br>";

// Arrays Associativos
$array1 = array(
    "nome" => "Julyane",
    "idade" => "18",
    "sexo" => "F"
);
print_r($array1);
echo "<br>";

// A partir da versão 5.4
$array2 = [
    "titulo" => "Fear of the dark",
    "artista" => "Iron Maiden"
];
var_dump($array2);

echo "<br>";
echo $array[1];